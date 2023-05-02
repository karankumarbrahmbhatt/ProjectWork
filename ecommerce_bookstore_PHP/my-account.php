<?php
	require "header.php";       
?>

<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area bg-image--6">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="bradcaump__inner text-center">
					<h2 class="bradcaump-title">My Account</h2>
					<nav class="bradcaump-content">
						<a class="breadcrumb_item" href="index.html">Home</a>
						<span class="brd-separetor">/</span>
						<span class="breadcrumb_item active">My Account</span>
					</nav>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Bradcaump area -->


<!--Success Message Area -->
<div class="row">
	<div class="col-lg-6 col-12">
		<div class="btn btn-dark btn-block text-center hideclass mt-2" >
			Congratulations! You've been registered successfully!
		</div>
		<div class="btn btn-danger btn-block text-center hideclass mt-2" >
			Error!
		</div>
	</div>
</div>

<!-- End Message area -->

<!-- Start My Account Area -->
<section class="my_account_area pt--80 pb--55 bg--white">
	<div class="container">
		<div class="row">
			
			<div class="col-lg-6 col-12">
				
				<div class="my__account__wrapper">
					<h3 class="account__title">Login</h3>
					<form action="#">
						<div class="account__form">
							<div class="input__box">
								<label>Email address <span>*</span></label>
								<input type="email" id="email_login" class="form-control" placeholder="Email" required
								value="<?php if(isset($_COOKIE['user'])){echo $_COOKIE['user'];} ?>" >
							</div>
							<div class="input__box">
								<label>Password<span>*</span></label>
								<input type="password" id="password_login" class="form-control" placeholder="Password"  required
								value="<?php if(isset($_COOKIE['pswd'])){echo $_COOKIE['pswd'];} ?>">
							</div>
							<div class="form__btn">
								<button type="button" id="login">Login</button>
								<label class="label-for-checkbox">
									<input id="rememberme" class="input-checkbox" type="checkbox" value="yes">
									<span>Remember me</span>
								</label>
							</div>
							<a class="forget_pass forgot" href="forgot.php">Forgot your password?</a>
						</div>
					</form>
				</div>
			</div>
			
			<div class="col-lg-6 col-12 reg">
				<div class="my__account__wrapper">
					<h3 class="account__title">Register</h3>
					<form action="#">
						<div class="account__form">
							
							<div class="register">
								<div class="input__box">
									<label>Name<span>*</span></label>
									<input type="text" id="name_regiter" class="form-control"  placeholder="Name" required>
								</div>
								<div class="input__box">
									<label>Email address <span>*</span></label>
									<input type="email" id="email_regiter" class="form-control"  placeholder="Email" required>
								</div>
								<div class="input__box">
									<label>Password<span>*</span></label>
									<input type="password" id="password_regiter" class="form-control" placeholder="Password" required>
								</div>
								<div class="form__btn">
									<button type="button" id="register">Register</button>
								</div>
							</div>
							
							
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End My Account Area -->
	<script>
		$(document).ready(function(){
			$('.otp').hide();
			$('.btn-dark').hide();
			$('.btn-danger').hide();
			$('.verify').hide();
			//********** LOGIN FORM ******************//
			$("#login").click(function(){
				var email = $("#email_login").val();
				var pswd = $("#password_login").val();
				
				//..........REMEMBER_ME CHECKING..........//
				var check =$("#rememberme:checked").val();
				
				var remember= 'unchecked';
				if(check=='yes')
				{
					var remember= 'checked';
				}
				
				//...................................//
				
				if(email!="" && pswd!=""){
					$.ajax({
						url:'login_dashboard.php',
						type:'post',
						data:{action_type:'login',email:email,pswd:pswd,check:remember},
						success:function(response){
							
								if(response.status==1)
								{
									location="index.php";
								}
								else if(response.status==0)
								{
									$('.btn-danger').text(response.msg);
									$('.btn-danger').show();
									$('.btn-dark').hide();
											
								}
								else
								{
									$('.btn-danger').text(response.msg);
									$('.btn-danger').show();
									$('.btn-dark').hide();
								}
							
						}
					});
				}
				else{
					$('.btn-danger').text('Fill the fields!');
					$('.btn-danger').show();
					$('.btn-dark').hide();
				}
			});
			
			//********** REGISTER FORM ******************//	
			$("#register").click(function(){
				var name= $('#name_regiter').val(); 
				var email=$('#email_regiter').val(); 
				var pswd= $('#password_regiter').val(); 
				if(name!="" && email!="" && pswd!=""){
					$.ajax({
						url:'login_dashboard.php',
						type:'POST',	
						data:{action_type:'register',name:name,email:email,pswd:pswd},
						success:function(response){
							if(response.status==1)
							{
								$('.btn-dark').show();	
								$('.btn-danger').hide();
							}
							else
							{
								$('.btn-danger').text(response.msg);
								$('.btn-danger').show();
								$('.btn-dark').hide();	
							}
						}
					}); 
				}
				else{
					$('.btn-danger').text('Fill the fields!');
					$('.btn-danger').show();
					$('.btn-dark').hide();
				}
			});
			
			
		});
	</script> 
	
	
	<?php
		require "footer.php";
	?>	