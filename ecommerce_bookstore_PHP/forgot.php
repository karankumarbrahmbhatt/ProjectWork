<?php
	require "header.php";
?>


<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area bg-image--6">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="bradcaump__inner text-center">
					<h2 class="bradcaump-title"></h2>
					<nav class="bradcaump-content">
						<a class="breadcrumb_item" href="index.html"></a>
						<span class="brd-separetor">/</span>
						<span class="breadcrumb_item active"></span>
					</nav>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Bradcaump area -->

<!-- Start Reset Password Area -->
<section class="my_account_area pt--80 pb--55 bg--white">
	
	<div class="row justify-content-center">
		
		<div class="col-lg-6 col-10">
			<div class="my__account__wrapper">
				<h3 class="account__title text-center">Reset Your Password</h3>
				<form action="#">
					<div class="account__form">
						
						<div class="email">
							<div class="input__box">
								<label>Email address <span>*</span></label>
								<input type="email" id="id1" class="form-control"  placeholder="Email" required>
							</div>
							<div class="form__btn text-center">
								<button type="button">Reset Password</button>
							</div><br>
						</div>
						
					</div>
				</form>
			</div>
		</div>
	</div>
	
</section>

<?php
	require "footer.php";
?>