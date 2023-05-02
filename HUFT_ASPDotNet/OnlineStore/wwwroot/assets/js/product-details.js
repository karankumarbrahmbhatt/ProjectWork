// Js for Dynamic Product Content
$('.single-product').hide();
let id = location.search.split('?')[1];
console.log(id);
if(id){
	$('.product-'+id).show();
}else{
	window.location.href = 'products.html';
}


//Js for Clickable Photo Gallery 
var ProductImage = document.getElementById("productImg"+id);
var SmallImage = document.getElementsByClassName("small-img"+id);

SmallImage[0].onclick = function()
{
	ProductImage.src = SmallImage[0].src;
}

SmallImage[1].onclick = function()
{
	ProductImage.src = SmallImage[1].src;
}

SmallImage[2].onclick = function()
{
	ProductImage.src = SmallImage[2].src;
}

SmallImage[3].onclick = function()
{
	ProductImage.src = SmallImage[3].src;
}


// JS for Add to cart 

// update cart
function updateCart() {
  // save cart to local storage
  localStorage.setItem("CART", JSON.stringify(cart));
  window.location.href="cart.html";

}

// cart array
let cart = JSON.parse(localStorage.getItem("CART")) || [];
function addToCart(id) {

	let qty = $("#qty"+id).val();
	
	let getcolor = $("#color"+id).val();
	if(!getcolor){
		alert("Please select color");
		return false;
	}
	
	
	let getsize = $("#size"+id).val();
	if(!getsize){
		alert("Please select size");
		return false;
	}
	
	
	
	// check if prodcut already exist in cart
	if (cart.some((item) => item.id === id)) {
		changeNumberOfUnits("plus", id);
	} else {
		const item = products.find((product) => product.id === id);

		cart.push({
		  ...item,
		  numberOfUnits: qty,
		  size: getsize,
		  color: getcolor,
		});
	}
	  
	updateCart();

}


// change number of units for an item
function changeNumberOfUnits(action, id) {
  cart = cart.map((item) => {
	let numberOfUnits = item.numberOfUnits;

	if (item.id === id) {
	  if (action === "minus" && numberOfUnits > 1) {
		numberOfUnits--;
	  } else if (action === "plus" && numberOfUnits < item.instock) {
		numberOfUnits++;
	  }
	}

	return {
	  ...item,
	  numberOfUnits,
	};
  });

  updateCart();
}
