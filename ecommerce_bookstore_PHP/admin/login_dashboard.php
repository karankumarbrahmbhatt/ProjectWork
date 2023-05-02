<?php
	session_start();
	include_once("class/Admin.php");
	
	$admin = new Admin();
	
	$action_type = $_POST['action_type'];
	
	/****************......LOGIN FORM.....*****************/
	if($action_type=='login') 
	{	
		$email = $_POST['email'];
		$pswd = $_POST['pswd'];
		$pswdMD= md5($pswd);
		
		
		$check_email=$admin->check_email($email); 
		
		if(mysqli_num_rows($check_email)>0)
		{
			$row=mysqli_fetch_array($check_email);
			if($pswdMD==$row['Password'])
			{
				echo "1";
				$_SESSION['myid']=$row['ID'];
			}
			else{
				
				echo "Wrong Password!";
			}
		}
		else
		{
			echo "Invalid Email!";
		}
		
	}
	
	/***********........REGISTERATION FORM .....***********/	
	if($action_type=='register') 
	{	 
		$email = $_POST['email'];
		$check_email=$admin->check_email($email);   
		if(mysqli_num_rows($check_email)>0)                 //......Checking if EMAIL already exists....//
		{                       
			echo "This Email already exists!";			
		}                  
		else                                          //..Doesn't exist...Registeration proceed..//
		{
			$pswd = $_POST['pswd'];
			$pswdMD= md5($pswd);
			$name = $_POST['name'];
			
			$result = $admin->register_user($name, $email, $pswdMD);
			
			if($result)
			{
				echo "1";}
			else
			{
				echo "Something went wrong!";
			}
			
		}
		
	}
	
	
	
	
	//////..........DB CONNECTED END.........///////
?>