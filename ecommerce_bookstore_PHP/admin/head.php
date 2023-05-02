<?php
	session_start();
	if(!isset($_SESSION['myid']))
	{header('location:login.php');}
	
	
?>
<!DOCTYPE html>
<html lang="en">
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>Admin- Bookstor</title>
		<!-- Favicon icon -->
		<link rel="icon" type="image/png" sizes="16x16" href="../images/favicon.ico">
		<!-- Pignose Calender -->
		<link href="plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
		<!-- Chartist -->
		<link rel="stylesheet" href="plugins/chartist/css/chartist.min.css">
		<link rel="stylesheet" href="plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
		<link href="plugins/tables/css/datatable/dataTables.bootstrap4.min.css" rel="stylesheet">
		<!-- Custom Stylesheet -->
		<link href="css/style.css" rel="stylesheet">
		<script src="https://kit.fontawesome.com/a076d05399.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	</head>
	
	<body>
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
		
		
		<!--**********************************
			Main wrapper start
		***********************************-->
		<div id="main-wrapper">
			
			<!--**********************************
				Nav header start
			***********************************-->
			<div class="nav-header">
				<div class="brand-logo">
					<a href="index.html">
						<b class="logo-abbr"><img src="images/logo.png" alt="logo"> </b>
						<span class="logo-compact"><img src="images/logo.png" alt="logo"></span>
						<span class="brand-title">
							<img src="images/logo.png" alt="logo">
						</span>
					</a>
				</div>
			</div>
			<!--**********************************
				Nav header end
			***********************************-->
			
			<!--**********************************
				Header start
			***********************************-->
			<div class="header">    
				<div class="header-content clearfix">
					
					<div class="nav-control">
						<div class="hamburger">
							<span class="toggle-icon"><i class="icon-menu"></i></span>
						</div>
					</div>
					<div class="header-left">
						<div class="input-group icons">
							<div class="input-group-prepend">
								<span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
							</div>
							<input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
							<div class="drop-down animated flipInX d-md-none">
								<form action="#">
									<input type="text" class="form-control" placeholder="Search">
								</form>
							</div>
						</div>
					</div>
					<div class="header-right">
						<ul class="clearfix">
							
							<li class="icons dropdown">
								<div class="user-img c-pointer position-relative"   data-toggle="dropdown">
									<span class="activity active"></span>
									<img src="images/user/1.png" height="40" width="40" alt="user">
								</div>
								<div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
									<div class="dropdown-content-body">
										<ul>
											
											<li><a href="logout.php"><i class="icon-key"></i> <span>Logout</span></a></li>
										</ul>
									</div>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!--**********************************
				Header end ti-comment-alt
			***********************************-->			