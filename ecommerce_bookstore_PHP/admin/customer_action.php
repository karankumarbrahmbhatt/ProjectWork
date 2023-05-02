<?php
	include_once("class/Customer.php");
	
	$customer = new Customer();
	
	$action_type = $_POST['action_type'];
	$id = $_POST['id'];
	
	/****************.....DELETE USER.....*****************/
	if($action_type=='del') 
	{
		$result = $customer->delete_user_by_id($id);
		
		if($result){
			echo "1";	
			} else {
			echo "User not deleted!";
		}
	}
	
	/****************....VIEW USER FORM.....*****************/
	if($action_type=='view') 
	{
		$result = $customer->get_user_by_id($id);
		
		$row = mysqli_fetch_array($result);
		
		$output['id'] = $row['ID'];
		$output['name'] = $row['Name'];	
		$output['email'] = $row['Email'];	
		$output['pswd'] =  $row['Password'];	
		
		echo json_encode($output);
		
	}
	
	/****************....EDIT USER FORM.....*****************/
	if($action_type=='edit') 
	{
		$id=$_POST['id'];
		$name=$_POST['name'];
		$email=$_POST['email'];
		$pswd=$_POST['pswd'];
		$pswdMD=md5($pswd);       //....Encrypted pswd.....//
		
		$result = $customer->update_user($id, $name, $email, $pswdMD);
		
		if($result)
		{
			echo "1";
		}
		else{   
			echo "User Not Updated!";  
		}
		
	}
	/****************....ADD USER FORM.....*****************/
	if($action_type=='add') 
	{
		$email = $_POST['email'];
		$check_email=$customer->check_email($email);   
		if(mysqli_num_rows($check_email)>0)                 //......Checking if EMAIL already exists....//
		{                       
			echo "This Email already exists!";			
		}             
		else                                          //..Doesn't exist...Registration proceed..//
		{
			$pswd = $_POST['pswd'];
			$pswdMD= md5($pswd);
			$name = $_POST['name'];
			
			$result = $customer->register_user($name, $email, $pswdMD);
			
			if($result)
			{
				echo "1";}
			else
			{
				echo "Something went wrong!";
			}
		}
		
	}	
	/****************....SHOW USERS TABLE.....*****************/
	if($action_type=='show') 
	{
		
		$result = $customer->get_users();
		
		while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
		
			echo '<tr>';           
			echo '<td>'.$row['ID'].'</td>';              
			echo '<td>'.$row['Name'].'</td>';
			echo '<td>'.$row['Email'].'</td>';
			echo '<td>'.$row['Created At'].'</td>';             
			echo '<td><a href="javascript:void(0)" onClick="$(\'#editForm\').slideDown(); viewUser('.$row['ID'].')" 
			class="btn btn-info btn-sm">&nbsp;&nbsp;Edit&nbsp;&nbsp;</a>
			<a href="javascript:void(0)" class= "btn btn-danger btn-sm"  
			onclick="return confirm(\'Are you sure to delete data?\')?deleteUser('.$row['ID'].'):false;"> 
			Delete  </a>'; 
			
			echo '</td>';				
			echo '</tr>';
		}
		
	}		
	
	
