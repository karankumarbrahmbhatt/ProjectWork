<!DOCTYPE html>
<html class="h-100" lang="en">
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Admin</title>
		<!-- Favicon icon -->
		<link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.html">
		
		<link href="css/style.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<style>
			#msg,#msg2{
			display:none;
			}
		</style>
	</head>
	
	<body class="h-100">
		
		<!--*******************
			Preloader start
		********************-->
		<div id="preloader">
			<div class="loader">
				<svg class="circular" viewBox="25 25 50 50">
					<circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
				</svg>
			</div>
		</div>
		<!--*******************
			Preloader end
		********************-->
		
		<div class="login-form-bg h-100">
			<div class="container h-100">
				
				<div class="row justify-content-center h-100">
					
					<div class="col-xl-6">
						<div class="form-input-content">
							<div class="card login-form mb-0">
								<div class="card-body pt-5">
									<div id="msg" class="alert alert-info">Congratulations! Log in from the link below!</div>
									<div id="msg2" class="alert alert-info"></div>
									
									
                                    <a class="text-center" href="index.html"> <h4>Sign Up</h4></a>
									
									<form onsubmit="event.preventDefault();"  class="mt-5 mb-5 login-input">
										<div class="form-group">
											<input type="text" id="name" class="form-control"  placeholder="Name" required>
										</div>
										<div class="form-group">
											<input type="email" id="email" class="form-control"  placeholder="Email" required>
										</div>
										<div class="form-group">
											<input type="password" id="password" class="form-control" placeholder="Password" required>
										</div>
										<button  class="btn login-form__btn submit w-100">Sign Up</button>
									</form>
                                    <p class="mt-5 login-form__footer">Have account <a href="login.php" class="text-primary">Log In</a> now</p>
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(function(){
		$("form").submit(function(){
			var name= $('#name').val(); 
			var email=$('#email').val(); 
			var pswd= $('#password').val(); 
			
			$.ajax({
				url:'login_dashboard.php',
				type:'POST',	
				data:{action_type:'register',name:name,email:email,pswd:pswd},
				success:function(response){
					if(response=="1")
					{
						$("#msg").css("display","block");
						$("#msg2").css("display","none");
						$('#id1').val(''); 
						$('#id2').val(''); 
						$('#id3').val(''); 
					}
					else{
						$("#msg2").css("display","block");
						$("#msg").css("display","none");
						$("#msg2").html(response);
					}
				}
			});
			
		});   
	});   
</script>
<!--**********************************
	Scripts
***********************************-->
<script src="plugins/common/common.min.js"></script>
<script src="js/custom.min.js"></script>
<script src="js/settings.js"></script>
<script src="js/gleek.js"></script>
<script src="js/styleSwitcher.js"></script>
</body>
</html>





