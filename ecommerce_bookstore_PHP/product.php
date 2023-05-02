<?php
	include_once("class/db_conn.php");
		
	$connection = new DatabaseConnection();
	
	session_start();

	require "header.php";  
	
	
	if(isset($_GET['id']))
	{
		$id = $_GET['id'];
	}
	else{
		$id = 0;
	}
	

    $record=$connection->get_product_category_by_id($id);
	
	$row = mysqli_fetch_array($record);
	
	$id=$row['id']; 	
	$name=$row['name']; 	
	$sales_price=$row['sales_price']; 	
	$regular_price=$row['regular_price']; 	
	$description=$row['description']; 	
	$image=$row['image']; 	
	$category=$row['category_name']; 	
	
?>

<!-- Start Slider area -->
<div class="slider-area brown__nav slider--15 slide__activation slide__arrow01 owl-carousel owl-theme">
    <!-- Start Single Slide -->
    <div class="slide animation__style10 bg-image--1 fullscreen align__center--left">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="slider__content">
                        <div class="contentbox">
                            <h2>Buy <span>your </span></h2>
                            <h2>favourite <span>Book </span></h2>
                            <h2>from <span>Here </span></h2>
                            <a class="shopbtn" href="#">shop now</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!-- End Single Slide -->
</div>
<!-- End Slider area -->
<!-- Start Shop Page -->
<div class="page-shop-sidebar left--sidebar bg--white section-padding--lg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-12 order-1 order-lg-2">
                <div class="wn__single__product">
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <img alt="<?php echo $name; ?> Book" src="uploads/<?php echo $image; ?>" class="border-1"
							style="width: 419.735px; height: 527px; left: 0.132743px; top: 0px;">
						</div>
						<div class="col-lg-6 col-12">
							<div class="product__info__main">
								<h1><?php echo $name; ?></h1>
								<div class="product-reviews-summary d-flex">
									<ul class="rating-summary d-flex">
										<li><i class="zmdi zmdi-star-outline"></i></li>
										<li><i class="zmdi zmdi-star-outline"></i></li>
										<li><i class="zmdi zmdi-star-outline"></i></li>
										<li class="off"><i class="zmdi zmdi-star-outline"></i></li>
										<li class="off"><i class="zmdi zmdi-star-outline"></i></li>
									</ul>
								</div>
								<div class="price-box">
									<span><b> $<?php echo $sales_price; ?></b>
										<del class="ml-2"> $<?php echo $regular_price; ?></del>
									</span>
								</div>
								<div class="product__overview">
									<p><?php echo $description;?></p>
								</div>
								<form class="product-form" action="javascript:void(0);">
									<div class="box-tocart d-flex">
										
										<span>Qty</span>
										<input id="qty" class="input-text qty" name="qty" min="1" value="1" title="Qty" type="number">
										<input id="product_id" name="product_id" type="hidden" value="<?php echo $row['id']; ?>">
										<div class="addtocart__actions">
											<button class="tocart" type="submit" title="Add to Cart">Add to
												Cart
											</button>
										</div>
										<div class="product-addto-links clearfix">
											<a class="wishlist" href="#"></a>
											<a class="compare" href="#"></a>
										</div>
										
									</div>
								</form>
								<div class="product_meta">
									<span class="posted_in">Categories:
										<a href="#"><?php echo $category; ?></a>
										
									</span>
								</div>
								<div class="product-share">
									<ul>
										<li class="categories-title">Share :</li>
										<li>
											<a href="#">
												<i class="icon-social-twitter icons"></i>
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-social-tumblr icons"></i>
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-social-facebook icons"></i>
											</a>
										</li>
										<li>
											<a href="#">
												<i class="icon-social-linkedin icons"></i>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
						
					</div>
				</div>
                <div class="product__info__detailed">
                    <div class="pro_details_nav nav justify-content-start" role="tablist">
						<a class="nav-item nav-link active" data-toggle="tab" href="#nav-details" role="tab">Details</a>
						<a class="nav-item nav-link" data-bs-toggle="tab" href="#nav-review" role="tab">Reviews</a>
					</div>
                    <div class="tab__container">
                        <!-- Start Single Tab Content -->
                        <div class="pro__tab_label tab-pane fade show active" id="nav-details" role="tabpanel">
                            <div class="description__attribute">
                                <?php echo $description;?>
							</div>
						</div>
                        <!-- End Single Tab Content -->
						
					</div>
				</div>
				
			</div>
		</div>
		
	</div>
</div>
<!-- End Shop Page -->
<script>
    $(".product-form").submit(function () {
        var qty = $('#qty').val();
        var id = $('#product_id').val();
        var button_content = $(this).find('button[type=submit]');
        button_content.html('Adding...');
        $.ajax({
            url: "manage_cart.php",
            type: "POST",
            data: { action: 'add', qty: qty, id: id }
			}).done(function (data) {
            location.reload();
		})
		
	});
	
</script>
<?php
	require "footer.php";
?>