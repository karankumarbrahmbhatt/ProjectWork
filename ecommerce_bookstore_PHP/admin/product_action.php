<?php
	include_once("class/Product.php");
	
	$product = new Product();
	
	$action_type = $_POST['action_type'];
	$id = $_POST['id'];
	
	/****************.....DELETE PRODUCT.....*****************/
	if($action_type=='del') 
	{
		$result = $product->delete_product_by_id($id);
		
		if($result){
			echo "1";	
			} else {
			echo "Product not deleted!";
		}
		
	}
	
	/****************....VIEW PRODUCT FORM.....*****************/
	if($action_type=='view') 
	{
		$result = $product->get_product_by_id($id);
		
		$row = mysqli_fetch_array($result);
		
		$output['id'] = $row['id'];
		$output['name'] = $row['name'];	
		$output['description'] = $row['description'];	
		$output['reg'] = $row['regular_price'];	
		$output['sales'] = $row['sales_price'];	
		$output['image'] =  $row['image'];	
		$output['status'] =  $row['status'];	
		
		echo json_encode($output);
		
	}
	
	/****************....EDIT PRODUCT FORM.....*****************/
	if($action_type=='edit') 
	{
		$id=$_POST['id'];
		$name=$_POST['name'];
		$description=$_POST['description'];	
		$reg=$_POST['reg'];	
		$sales=$_POST['sales'];	
		$status=$_POST['status'];
		$image = $_FILES['image']['name'];
		
		$result = $product->update_product($id, $name, $description, $reg,$sales,$status,$image);
		
		if($result)
		{
			echo "1";
		}
		else{   
			echo "Product Not Updated!";  
		}
	
	}
	/****************....ADD PRODUCT FORM.....*****************/
	if($action_type=='add') 
	{		  
		$cat_id=$_POST['cat'];
		$subcat_id=$_POST['subcat'];
		$name = $_POST['name'];
		$description=$_POST['description'];
		$image = $_FILES['image']['name'];
		$reg = $_POST['reg'];
		$sales = $_POST['sales'];
		$status = 1;
		$sourcePath = $_FILES['image']['tmp_name'];       // Storing source path of the file in a variable
		$targetPath = "../uploads/".$_FILES['image']['name']; // Target path where file is to be stored
		
		if(move_uploaded_file($sourcePath,$targetPath))   // Moving Uploaded file
		{
			$result = $product->register_product($cat_id,$subcat_id,$name, $description, $reg,$sales,$status,$image);
			
			if($result)
			{
				echo "1";
			}
			else{   
				echo "Product Not Added!";  
			}
		}else
		{
			echo "Error uploading image!!Try again!!";
		}
		
	}	
	
	/****************....SHOW PRODUCT Table.....*****************/
	if($action_type=='show') 
	{
		
		$result = $product->get_products();
		
		while($row = mysqli_fetch_assoc($result)) 
		{
			$record = $product->get_category_by_id($row['subcat_id']);
			
			$rec=$product->get_category_by_id($row['cat_id']);
			
			$i = mysqli_fetch_array($record);
			
			$j= mysqli_fetch_array($rec);
			
			echo '<tr>';           
			echo '<td>'.$row['id'].'</td>';
			echo '<td>'.$j['Name'].'</td>';
			echo '<td>'.$i['Name'].'</td>';
			echo '<td>'.$row['name'].'</td>';
			echo '<td>'.$row['description'].'</td>';
			echo '<td><img src="../uploads/' .$row['image']. '" alt="' .$row['name']. ' Book" width="100px" height="100px"></td>';
			echo '<td>'.$row['regular_price'].'</td>';
			echo '<td>'.$row['sales_price'].'</td>';
			echo '<td>'.$row['created_at'].'</td>';
			echo '<td>'.$row['modified_at'].'</td>';
			echo '<td>';
			if($row['status']==1) 
			{ 
				echo '<span class="btn btn-success btn-sm text-white">Active</span>'; 
			} 
			else
			{ 
				echo '<span class="btn btn-danger btn-sm">Inactive</span>';
			}		      
			echo '</td>';
			
			echo '<td><a href="javascript:void(0)" onClick="$(\'#editForm\').slideDown(); viewCategory('.$row['ID'].')" 
			class="btn btn-info btn-sm">&nbsp;&nbsp;Edit&nbsp;&nbsp;</a>
			<a href="javascript:void(0)" class= "btn btn-danger btn-sm"  
			onclick="return confirm(\'Are you sure to delete data?\')?deleteCategory('.$row['ID'].'):false;"> 
			Delete  </a>'; 
			
			
			
			echo '</td>';				
			echo '</tr>';
			
		}
		
		
	}		
	/////////////******///////////////////******///////////////
	
		