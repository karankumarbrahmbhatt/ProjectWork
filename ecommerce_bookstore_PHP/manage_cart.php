<?php
	
	session_start();
	$action=$_POST['action'];
	
	if($action=='add')
	{
		$id = $_POST['id'];	
		$qty = $_POST['qty'];	
		
	    foreach ($_SESSION["products"] as $select => &$val) 
	    {
			if($val['id'] == $id)
			{                           ////....IF PRODUCT ALREADY EXISTS...////
				$val['qty']+=$qty;
				$add='no';
			}
			
		}
	    if(isset($add))
		{
			return true;
		}
		else
		{                            ////....IF PRODUCT IS NEW...////
	        $book=array(
			'id'=>$id,
			'qty'=>$qty,    
	        );
			
			$_SESSION['products'][]=$book;
		}
	}
	
	if($action=='del')
	{
		foreach ($_SESSION["products"] as $select => $val) 
		{
			if($val['id'] == $_POST['id'])
			{
				unset($_SESSION['products'][$select]);
				echo 1;
			}
			
		}
		
	}
	
	if($action=='edit')
	{
		foreach ($_SESSION["products"] as $select => &$val) 
		{
			if($val['id'] == $_POST['id'])
			{
				$val['qty']=$_POST['qty'];
				echo 1;
			}
			
		}
		
	}
	
	if($action=='empty')
	{
		unset($_SESSION['products']);
		unset($_SESSION['total']);
		unset($_SESSION['discount']);
		
	}
	
?>