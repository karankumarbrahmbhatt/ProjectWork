<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>Bookstor</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://kit.fontawesome.com/a076d05399.js"></script>
		<!-- Favicons -->
		<link rel="shortcut icon" href="images/favicon.ico">
		
		<!-- Google font (font-family: 'Roboto', sans-serif; Poppins ; Satisfy) -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet"> 
		<link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet"> 
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
		<!-- Stylesheets -->
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/plugins.css">
		<link rel="stylesheet" href="style.css">
		
		<!-- Cusom css -->
		<link rel="stylesheet" href="css/custom.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<!-- Modernizer js -->
		<script src="js/vendor/modernizr-3.5.0.min.js"></script>
		<script src="simple-bootstrap-paginator.js"></script>
	</head>
	<body>
		
		
		<!-- Main wrapper -->
		<div class="wrapper" id="wrapper">
			<!-- Header -->
			<header id="wn__header" class="header__area header__absolute sticky__header">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-6 col-sm-6 col-6 col-lg-2">
							<div class="logo">
								<a href="index.php">
									<img src="images/logo/logo.png" alt="logo images">
								</a>
							</div>
						</div>
						<div class="col-lg-8 d-none d-lg-block">
							<nav class="mainmenu__nav">
								<ul class="meninmenu d-flex justify-content-start">
									<li class="drop with--one--item"><a href="index.php">Home</a></li>
									<?php
										include_once("class/db_conn.php");
										
										$connection = new DatabaseConnection();
										$result_c=$connection->get_categories_parent();
										
									?>
									
									<li class="drop"><a href="books.php">Books</a>
										<div class="megamenu mega04">
											<?php while($row_c = mysqli_fetch_assoc($result_c)) { ?>
												<ul class="item item03">
													
													<li class="title" ><?php echo $row_c['Name']; ?></li>
													<?php 
														$result_c_p=$connection->get_catgories_by_parent_id($row_c['ID']);
														while($row2_c_p = mysqli_fetch_assoc($result_c_p)) {
														?>
														<li><a href="books.php?subcatid=<?php echo $row2_c_p['ID']; ?>"><?php echo $row2_c_p['Name']; ?> </a></li>
													<?php } ?>
													
												</ul>
											<?php } ?>
											
										</div>
									</li>
									<li><a href="contact.php">Contact</a></li>
								</ul>
							</nav>
						</div>
						<div class="col-md-6 col-sm-6 col-6 col-lg-2">
							<ul class="header__sidebar__right d-flex justify-content-end align-items-center">
								
								
								<li class="shopcart"><a href="cart.php"><span class="product_qun">
									<?php if (isset($_SESSION['products'])) 
										{ echo count($_SESSION['products']); }
										else
										{echo 0;}
									?>
								</span></a></li>
								<li class="setting__bar__icon"><a class="setting__active" href="#"></a>
									<div class="searchbar__content setting__block">
										<div class="content-inner">
											
											<div class="switcher-currency">
												<strong class="label switcher-label">
													<span>My Account</span>
												</strong>
												<?php if( !isset($_SESSION['id'])) { ?>
													<div class="switcher-options">
														<div class="switcher-currency-trigger">
															<div class="setting__menu">										
																<span><a href="my-account.php">Log In</a></span>
																
															</div>
														</div>
													</div>
													<?php } else { ?>
													<div class="switcher-options">
														<div class="switcher-currency-trigger">
															<div class="setting__menu">
																<span><a href="myorders.php">My Orders</a></span>
																<span><a href="logout.php">Log Out</a></span>
															</div>
														</div>
													</div>
												<?php } ?>
											</div>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<!-- Start Mobile Menu -->
					<div class="row d-none">
						<div class="col-lg-12 d-none">
							<nav class="mobilemenu__nav">
								<ul class="meninmenu">
									<li><a href="index.php">Home</a></li>
									
									<li><a href="books.php">Books</a></li>
									
									<li><a href="contact.php">Contact</a></li>
								</ul>
							</nav>
						</div>
					</div>
					<!-- End Mobile Menu -->
					<div class="mobile-menu d-block d-lg-none">
					</div>
					<!-- Mobile Menu -->	
				</div>		
			</header>
			<!-- //Header -->
			
				