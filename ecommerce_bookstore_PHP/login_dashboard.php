<?php
	session_start();
	include_once("class/db_conn.php");
	
	$connection = new DatabaseConnection();
	
	$action_type = $_POST['action_type'];
	
	
	/****************......LOGIN FORM.....*****************/
	if($action_type=='login') 
	{	
		$email = $_POST['email'];
		$pswd = $_POST['pswd'];
		$pswdMD= md5($pswd);
		$check= $_POST['check'];			 
		//..............SAVE COOKIES..........//
		if($check=="checked")
		{
			setcookie("user",$email,time()+3600000);
			setcookie("pswd",$pswd, time()+3600000);
		}
		else{
			setcookie("user","");
			setcookie("pswd","");	
		}
		//..................COOKIES END.......................//
		
		
		$check_email=$connection->check_email($email); 
		
		if(mysqli_num_rows($check_email)>0)
		{
			$row=mysqli_fetch_array($check_email);
			if($pswdMD==$row['Password'])
			{
				
				$_SESSION['id']=$row['ID'];
				$_SESSION['email']=$row['Email'];
				
				header('Content-Type: application/json');
				echo json_encode(array('status' => 1 ,'msg'=>'Successs'));
				exit;
			}
			else{
				header('Content-Type: application/json');
				echo json_encode(array('status' => 0,'msg'=>'Wrong Password!'));
				exit;
			}
		}
		else
		{
			header('Content-Type: application/json');
			echo json_encode(array('status' => 0,'msg'=>'Invalid Email!'));
			exit;
		}
	}
	
	/***********........REGISTERATION FORM .....***********/	
	if($action_type=='register') 
	{	 
		$email = $_POST['email'];
		
		$check_email=$connection->check_email($email); 
		
		if(mysqli_num_rows($check_email)>0)                 //......Checking if EMAIL already exists....//
		{                       
			
			header('Content-Type: application/json');
			echo json_encode(array('status' => 0,'msg'=>'This Email already exists!'));
			exit;
		}             
		else                                          //..Doesn't exist...Registeration proceed..//
		{
			$pswd = $_POST['pswd'];
			$pswdMD= md5($pswd);
			$name = $_POST['name'];
			$_SESSION['email']=$email;
			
			$result_check = $connection->register_user($name, $email, $pswdMD);
			
			if($result_check)
			{
				header('Content-Type: application/json');
				echo json_encode(array('status' => 1,'msg'=>'Success'));
				exit;
				
			}
			else	
			{ 
				header('Content-Type: application/json');
				echo json_encode(array('status' => 0,'msg'=>'Error'));
				exit;
			}			
			
		}
	}				
	
	
?>