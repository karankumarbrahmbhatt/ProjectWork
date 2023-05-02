<?php
	include_once("class/db_conn.php");
	
	$connection = new DatabaseConnection();
	
	
	require('db.php');
	if(!$con)
	{echo "DB not connected"; die;}
	
	//////connection set////////
	
	$perPage = 6;
	if (isset($_POST['page'])) { 
		$page = $_POST['page']; 
		$id=  $_POST['id'];  
		$type =  $_POST['type'];	
		$startFrom = ($page-1) * $perPage;  
		if($id==0)
		{
			$result = $connection->get_products_page($startFrom, $perPage);
		}
		else
		{
			if($type == 'catid'){
				$result = $connection->get_products_by_cat_id_page($startFrom, $perPage);
				
				}else{
				$result = $connection->get_products_by_subcat_id_page($startFrom, $perPage);
			}	
		}
		
		$paginationHtml = '';
		while ($row = mysqli_fetch_assoc($result)) {  
			echo '<div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12 mb-5">
			<div class="product__thumb">									
			<a class="first__img" href="product.php?id='.$row["id"].'"><img src="uploads/'.$row['image'].'"  width="200px" height="300px" alt="'.$row['name'].' Book"></a>
			
			<ul class="prize position__right__bottom d-flex">
			<li>$'.$row["sales_price"].'</li>				  
			<li class="old_prize">$'.$row["regular_price"].'</li>				  
			</ul>
			</div>
			<div class="mt-3 mb-3 text-center">
			<a href="product.php?id='.$row["id"].'">
			'.$row["name"].'</a></div>
			<div class="my-1 text-center">
			<a onclick="addcart('.$row["id"].')" href="javascript:void(0);" class="btn-dark px-4" style="padding:6px;">
			<i class="bi bi-shopping-cart-full mr-2"></i>
			Add to Cart</a>				
			</div>
			</div>'; 
		} 
	}
?>