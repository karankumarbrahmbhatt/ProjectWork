<?php
	include_once("class/db_conn.php");
	
	$connection = new DatabaseConnection();
	
	$action_type=$_POST['action_type'];
	
	//*************SHOWING SUBCATS********************//  
	if($action_type=='sub')
	{
		$perPage = 6;
		
		if (isset($_POST['page'])) { 
			$page = $_POST['page']; 
			} else { 
			$page=1; 
		} 
		
		$startFrom = ($page-1) * $perPage;
		
		$id=$_POST['id'];
		
		$result = $connection->get_products_by_cat_id_page($id,$startFrom,$perPage);
		
		if($result)
		{
				
				while($row = mysqli_fetch_assoc($result)) 
				{
					echo '<div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12 mb-5">
					<div class="product__thumb">									
					<a class="first__img" href="product.php?id='.$row["id"].'"> 
					<img src="uploads/'.$row['image'].'" 
					width="200px" height="300px" alt="'.$row['name'].' Book"></a>
					
					<ul class="prize position__right__bottom d-flex">
					<li>$'.$row["sales_price"].'</li>				  
					<li class="old_prize">$'.$row["regular_price"].'</li>				  
					</ul>
					
					</div>
					<div class="mt-3 text-center">
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
		else
		{
			echo "Something went wrong!";
		}
	}
	
	//*************SHOWING PRODUCTS********************// 
	if($action_type=='pro')
	{
		$id=$_POST['id'];
		$x="";
		
		$result=$connection->get_products_by_subcat_id($id);
		
		if($result)
		{
			while($row = mysqli_fetch_assoc($result)) 
			{
				echo '<div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12 mb-5">
				<div class="product__thumb">									
				<a class="first__img" href="product.php?id='.$row["id"].'"> 
				<img src="uploads/'.$row['image'].'" 
				width="200px" height="300px" alt="'.$row['name'].' Book"></a>
				
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
		else
		{
			echo "Something went wrong!";
		}
	}
		
	//*************FILTER BY PRICE********************// 
	if($action_type=='price')
	{
		$min=$_POST['min'];
		$max=$_POST['max'];
		
		$result=$connection->get_products_by_price($min,$max);
		
		//$sql= "select * from products where sales_price between $min and $max" ;
		
		//$result=mysqli_query($con,$sql);
		if(mysqli_num_rows($result)>0)
		{
			
			while($row = mysqli_fetch_assoc($result)) 
			{
				echo '<div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12 mb-5">
				<div class="product__thumb">									
				<a class="first__img" href="product.php?id='.$row["id"].'"> 
				<img src="uploads/'.$row['image'].'" 
				width="200px" height="300px" alt="'.$row['name'].' Book"></a>
				
				<ul class="prize position__right__bottom d-flex">
				<li>$'.$row["sales_price"].'</li>				  
				<li class="old_prize">$'.$row["regular_price"].'</li>				  
				</ul>
				<ul class="prize position__left__bottom d-flex">
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
		else
		{
			echo "No book found in this range!";
		}
	}
		
	//*************SORT BY TYPE********************// 
	if($action_type=='sort')
	{
		$type=$_POST['type'];
		
		$result=$connection->get_products_sort($type);
		
		while($row = mysqli_fetch_assoc($result)) 
		{
			echo '<div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12 mb-5">
			<div class="product__thumb">									
			<a class="first__img" href="product.php?id='.$row["id"].'"> 
			<img src="uploads/'.$row['image'].'" width="200px" height="300px" alt="'.$row['name'].' Book"></a>
			
			<ul class="prize position__right__bottom d-flex">
			<li>$'.$row["sales_price"].'</li>				  
			<li class="old_prize">$'.$row["regular_price"].'</li>				  
			</ul>
			
			</div>
			<div class="mt-3 text-center">
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