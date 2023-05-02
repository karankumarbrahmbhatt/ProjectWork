<?php
	session_start();
	require('class/db_conn.php');
	$connection = new DatabaseConnection();
	$action = $_POST['action'];
	
	/****************......PLACE ORDER .....*****************/
	if($action == 'order')
	{
		require('order_id.php');
		
		$i = $connection->get_user_by_id($_SESSION['id']);
		
		$row=mysqli_fetch_array($i);
		
		$email=$row['Email'];
	
		$discount=0;
		$total=$_SESSION['total'];
		
		$sub=$_SESSION['total'];
		$customer_id=$_SESSION['id'];
		$b_name=$_POST['b_name'];
		$b_phone=$_POST['b_phone'];
		$b_street=$_POST['b_street'];
		$b_area=$_POST['b_area'];
		$b_city=$_POST['b_city'];
		$b_state=$_POST['b_state'];
		$b_pincode=$_POST['b_pincode'];
		$s_name=$_POST['s_name'];
		$s_phone=$_POST['s_phone'];
		$s_street=$_POST['s_street'];
		$s_area=$_POST['s_area'];
		$s_city=$_POST['s_city'];
		$s_state=$_POST['s_state'];
		$s_pincode=$_POST['s_pincode'];
		$cart = $_SESSION['products'];
		$result = $connection->insert_order($cart,$zippy_order_id,$sub,$discount,$total,$customer_id,$email,$b_name,$b_phone,$b_street,$b_area,$b_city,$b_state,$b_pincode,$s_name,$s_phone,$s_street,$s_area,$s_city,$s_state,$s_pincode);
		
		
		if($result)
		{
			
			unset($_SESSION['discount']);
			unset($_SESSION['total']);
			unset($_SESSION['products']);
			
			$_SESSION['order_id']=$zippy_order_id;
			echo 1;					
			
		}
		else
		{  
			echo 0; 
		}
		
	}	
	
?>