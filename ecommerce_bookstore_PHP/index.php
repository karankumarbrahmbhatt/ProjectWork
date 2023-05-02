<?php
	include_once("class/db_conn.php");
		
	$connection = new DatabaseConnection();
	session_start();
	
	require "header.php";
	
	
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
                            <a class="shopbtn" href="books1.php">shop now</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <!-- End Single Slide -->
	
</div>
<!-- End Slider area -->

<!-- Start New Products Area -->
<section class="wn__product__area brown--color pt--80  pb--30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section__title text-center">
                    <h2 class="title__be--2">New <span class="color--theme">Products</span></h2>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered
					lebmid alteration in some ledmid form</p>
				</div>
			</div>
		</div>
        <!-- Start Single Tab Content -->
        <div class="furniture--4 border--round arrows_style owl-carousel owl-theme row mt--50">
            <?php 
				$result_products=$connection->get_new_products();
				while($row = mysqli_fetch_assoc($result_products)) 
				{
				?>
				
				<!-- Start Single Product -->
				<div class="product product__style--3">
					<div class="col-lg-3 col-md-4 col-sm-6 col-12">
						<div class="product__thumb">
							<a class="first__img" href=" product.php?id=<?php echo $row['id'];?>">
								<img src="uploads/<?php echo $row['image'];?>" width="200px" height="300px"
                                alt="<?php echo $row['name'];?> Book">
							</a>
							<ul class="prize position__right__bottom d-flex">
								<li>$
									<?php echo $row["sales_price"];?>
								</li>
								<li class="old_prize">$
									<?php echo $row["regular_price"];?>
								</li>
							</ul>
							<div class="hot__box">
								<span class="hot-label">NEW</span>
							</div>
						</div>
						<div class="mt-3 mb-3 text-center">
							<a href="product.php?id=<?php echo $row['id'];?>">
								<?php echo $row['name'];?>
							</a>
						</div>
						<div class="my-1 text-center">
							<a onclick="addcart(<?php echo $row['id']; ?>)" href="javascript:void(0);" class="btn-dark px-4"
                            style="padding:6px;">
								<i class="bi bi-shopping-cart-full mr-2"></i>
							Add to Cart</a>
						</div>
					</div>
				</div>
				<!-- End Single Product -->
			<?php   } ?>
		</div>
        <!-- End Single Tab Content -->
	</div>
</section>
<!-- End New Products Area -->

<!-- Start NEwsletter Area -->
<section class="wn__newsletter__area bg-image--2">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 col-12 ptb--150">
                <div class="section__title text-center">
                    <h2><span id="congo">Stay With Us</span></h2>
				</div>
                <div id="subscribe" class="newsletter__block text-center">
                    <p>Subscribe to our newsletters now and stay up-to-date with new collections, the latest lookbooks
					and exclusive offers.</p>
                    <form action="javascript:void(0);">
                        <div class="newsletter__box">
                            <input type="email" id="mail" placeholder="Enter your e-mail" value="">
                            <button>Subscribe</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End Newsletter Area -->

<!----- Best Sale Area ------>
<section class="wn__bestseller__area pt--80  pb--30">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section__title text-center">
                    <h2 class="title__be--2">Best <span class="color--theme">Seller</span></h2>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered
					lebmid alteration in some ledmid form</p>
				</div>
			</div>
		</div>
		
		
        <div class="tab__container mt--60">
			
            <div class="row single__tab tab-pane fade show active mx-2" id="nav-all" role="tabpanel">
                <div class="product__indicator--4 arrows_style owl-carousel owl-theme">
                    <?php 
						
						
						$result_best_seller=$connection->get_best_seller_products();
						
						while($row2 = mysqli_fetch_assoc($result_best_seller)) 
						{
							
						?>
						<div class="single__product">
							
							
							<!-- Start Single Product -->
							<div class="col-lg-3 col-md-4 col-sm-6 col-12">
								<div class="product product__style--3">
									<div class="product__thumb">
										<a class="first__img" href=" product.php?id=<?php echo $row2['product_id'];?>">
											<img src="uploads/<?php echo $row2['image'];?>" width="200px"
                                            height="300px" alt="<?php echo $row2['name'];?> Book">
										</a>
										<ul class="prize position__right__bottom d-flex">
											<li>$
												<?php echo $row2["sales_price"];?>
											</li>
											<li class="old_prize">$
												<?php echo $row2["regular_price"];?>
											</li>
										</ul>
										<div class="hot__box">
											<span class="hot-label">BEST SELLER</span>
										</div>
									</div>
									<div class="mt-3 mb-3 text-center">
										<a href="product.php?id=<?php echo $row2['product_id'];?>">
											<?php echo $row2['name'];?>
										</a>
									</div>
									<div class="my-1 text-center">
										<a onclick="addcart(<?php echo $row2['product_id']; ?>)" href="javascript:void(0);"
                                        class="btn-dark px-4" style="padding:6px;">
											<i class="bi bi-shopping-cart-full mr-2"></i>
										Add to Cart</a>
									</div>
								</div>
							</div>
							
						</div>
					<?php   } ?>
				</div>
			</div>
		</div>
	</div>
</section>
<!------ End Best Sale Area---- -->
<script>
    function addcart(id) {
        $.ajax({
            url: "manage_cart.php",
            type: "POST",
            data: { action: 'add', qty: 1, id: id }
			}).done(function (data) {
            location.reload();
		})
		
	}
	
</script>


<?php
	require "footer.php";
?>