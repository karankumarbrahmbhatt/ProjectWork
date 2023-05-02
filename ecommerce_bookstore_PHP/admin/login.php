
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
									<div id="demo"></div>
									<span class="text-center"> <h4>Log In</h4></span>
									
									<form class="mt-5 mb-5 login-input" method="post" >
										<div class="form-group">
											<input type="email" id="email" class="form-control" placeholder="Email" value="admin@gmail.com">
										</div>
										<div class="form-group">
											<input type="password" id="password" class="form-control" placeholder="Password" value="12345678">
										</div>
										
										<button type="button" class="btn login-form__btn submit w-100">Log In</button>
									</form>
									<p class="mt-5 login-form__footer">Dont have account? <a href="register.php" class="text-primary">Sign Up</a> now</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script>
			$(document).ready(function(){
				$("button").click(function(){
					var email = $("#email").val();
					var pswd = $("#password").val();
					
					if(email!="" && pswd!=""){
						$.ajax({
							url:'login_dashboard.php',
							type:'post',
							data:{action_type:'login',email:email,pswd:pswd},
							success:function(response){
								if(response==1)
								{
									$("#demo").attr("class","alert alert-success");
									$("#demo").html("Logging in....");
									
									setTimeout(
									function(){location="index.php";}, 3000 );
								}
								else{
									$("#demo").html(response);
									$("#demo").attr("class","alert alert-danger");
								}	 
							}
							
						});
					}
					else{
						$("#demo").html('Fill the fields!');
						$("#demo").attr("class","alert alert-danger");
					}
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





