//Sort by price
$(document).on("change", ".price-sorting", function() {

	var sortingMethod = $(this).val();

	if(sortingMethod == 'l2h')
	{
		sortProductsPriceAscending();
	}
	else if(sortingMethod == 'h2l')
	{
		sortProductsPriceDescending();
	}

});

// Sort price by ascending
function sortProductsPriceAscending()
{
	var products = $('.product');
	products.sort(function(a, b){ return $(a).data("price")-$(b).data("price")});
	$(".products-grid").html(products);

}

//sort price descending
function sortProductsPriceDescending()
{
	var products = $('.product');
	products.sort(function(a, b){ return $(b).data("price") - $(a).data("price")});
	$(".products-grid").html(products);

}

	
	
//Search
$("#search").keyup(function() {
	
	var value = this.value.toLowerCase();
	$('.products-grid .product').each(function(){
		var id = $(this).text().toLowerCase();
		$(this).toggle(id.indexOf(value) !== -1);
	});
	
});


$(document).ready(function() {
  var $products = $('.product'),
	  $filters = $("#filters input[type='checkbox']"),
	  product_filter = new ProductFilterLevel2($products, $filters);
  product_filter.init();
});

function ProductFilterLevel2(products, filters) {
  var _this = this;

  this.init = function() {
	this.products = products;
	this.filters = filters;
	this.bindEvents();
  };

  this.bindEvents = function() {
	this.filters.click(this.filterGridProducts);
	$('#none').click(this.removeAllFilters);
  };

  this.filterGridProducts = function() {
	//hide all
	_this.products.hide();
	var filteredProducts = _this.products;
	//filter by colour, size, shape etc
	var filterAttributes = $('.filter-attributes'); 
	// for each attribute check the corresponding attribute filters selected
	filterAttributes.each(function(){
	  var selectedFilters = $(this).find('input:checked');
	  // if selected filter by the attribute
	  if (selectedFilters.length) {
		var selectedFiltersValues = [];
		selectedFilters.each(function() {
		  var currentFilter = $(this);
		  selectedFiltersValues.push("[data-" + currentFilter.attr('name') + "='" + currentFilter.val() + "']");
		});
		filteredProducts = filteredProducts.filter(selectedFiltersValues.join(','));
	  }
	});
	  filteredProducts.show();
  };

  this.removeAllFilters = function() {
	_this.filters.prop('checked', false);
	_this.products.show();
  }
}


//Pagination

// Returns an array of maxLength (or less) page numbers
// where a 0 in the returned array denotes a gap in the series.
// Parameters:
//   totalPages:     total number of pages
//   page:           current page
//   maxLength:      maximum size of returned array
function getPageList(totalPages, page, maxLength) {
  if (maxLength < 5) throw "maxLength must be at least 5";

  function range(start, end) {
	return Array.from(Array(end - start + 1), (_, i) => i + start);
  }

  var sideWidth = maxLength < 9 ? 1 : 2;
  var leftWidth = (maxLength - sideWidth * 2 - 3) >> 1;
  var rightWidth = (maxLength - sideWidth * 2 - 2) >> 1;
  if (totalPages <= maxLength) {
	// no breaks in list
	return range(1, totalPages);
  }
  if (page <= maxLength - sideWidth - 1 - rightWidth) {
	// no break on left of page
	return range(1, maxLength - sideWidth - 1)
	  .concat([0])
	  .concat(range(totalPages - sideWidth + 1, totalPages));
  }
  if (page >= totalPages - sideWidth - 1 - rightWidth) {
	// no break on right of page
	return range(1, sideWidth)
	  .concat([0])
	  .concat(
		range(totalPages - sideWidth - 1 - rightWidth - leftWidth, totalPages)
	  );
  }
  // Breaks on both sides
  return range(1, sideWidth)
	.concat([0])
	.concat(range(page - leftWidth, page + rightWidth))
	.concat([0])
	.concat(range(totalPages - sideWidth + 1, totalPages));
}

$(function() {
  // Number of items and limits the number of items per page
  var numberOfItems = $(".products-grid .product").length;
  var limitPerPage = 8;
  // Total pages rounded upwards
  var totalPages = Math.ceil(numberOfItems / limitPerPage);
  // Number of buttons at the top, not counting prev/next,
  // but including the dotted buttons.
  // Must be at least 5:
  var paginationSize = 7;
  var currentPage;

  function showPage(whichPage) {
	if (whichPage < 1 || whichPage > totalPages) return false;
	currentPage = whichPage;
	$(".products-grid .product")
	  .hide()
	  .slice((currentPage - 1) * limitPerPage, currentPage * limitPerPage)
	  .show();
	// Replace the navigation items (not prev/next):
	$(".pagination li").slice(1, -1).remove();
	getPageList(totalPages, currentPage, paginationSize).forEach(item => {
	  $("<li>")
		.addClass(
		  "page-item " +
			(item ? "current-page " : "") +
			(item === currentPage ? "active " : "")
		)
		.append(
		  $("<a>")
			.addClass("page-link")
			.attr({
			  href: "javascript:void(0)"
			})
			.text(item || "...")
		)
		.insertBefore("#next-page");
	});
	return true;
  }

  // Include the prev/next buttons:
  $(".pagination").append(
	$("<li>").addClass("page-item").attr({ id: "previous-page" }).append(
	  $("<a>")
		.addClass("page-link")
		.attr({
		  href: "javascript:void(0)"
		})
		.html('&#8592;')
	),
	$("<li>").addClass("page-item").attr({ id: "next-page" }).append(
	  $("<a>")
		.addClass("page-link")
		.attr({
		  href: "javascript:void(0)"
		})
		.html('&#8594;')
	)
  );
  // Show the page links
  $(".products-grid").show();
  showPage(1);

  // Use event delegation, as these items are recreated later
  $(document).on("click", ".pagination li.current-page:not(.active)", function() {
	return showPage(+$(this).text());
  });
  
  $("#next-page").on("click", function() {
	return showPage(currentPage + 1);
  });

  $("#previous-page").on("click", function() {
	return showPage(currentPage - 1);
  });
  
});
