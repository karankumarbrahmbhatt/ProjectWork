<?php
	include_once("class/Category.php");
	
	$category = new Category();
	$action_type = $_POST['action_type'];
	$id = $_POST['id'];
	
	/****************.....DELETE CATEGORY.....*****************/
	if($action_type=='del') 
	{
		$result = $category->delete_category_by_id($id);
		
		if($result){
			echo "1";	
			} else {
			echo "Category not deleted!";
		}
	}
	
	/****************....VIEW CATEGORY FORM.....*****************/
	if($action_type=='view') 
	{
		$result = $category->get_category_by_id($id);
		
		$row = mysqli_fetch_array($result);
		
		$output['id'] = $row['ID'];
		$output['parent'] = $row['Parent_ID'];
		$output['name'] = $row['Name'];	
		$output['description'] = $row['Description'];	
		
		$output['status'] =  $row['Status'];	
		
		echo json_encode($output);
		
	}
	
	/****************....EDIT CATEGORY FORM.....*****************/
	if($action_type=='edit') 
	{
		$id=$_POST['id'];
		$parent=$_POST['parent'];
		$name=$_POST['name'];
		$description=$_POST['description'];	
		$status=$_POST['status'];
	    
		$result = $category->update_category($id, $parent, $name, $description,$status);
		
		if($result)
		{
			echo "1";
		}
		else{   
			echo "Category Not Updated!";  
		}
		
		
	}
	/****************....ADD CATEGORY FORM.....*****************/
	if($action_type=='add') 
	{		  
		$name = $_POST['name'];
		$description=$_POST['description'];
		$parent_id=$_POST['parent'];
		$result = $category->register_category($parent_id, $name, $description);
			
		if($result)
		{
			echo "1";}
		else
		{
			echo "Something went wrong!";
		}
	}	
	
	/****************....SHOW CATEGORY Table.....*****************/
	if($action_type=='show') 
	{
		
		$result = $category->get_categories();
		
		
		while($row = mysqli_fetch_assoc($result)) 
		{
			
			echo '<tr>';           
			echo '<td>'.$row['ID'].'</td>';
			echo '<td>'.$row['Parent_ID'].'</td>';
			echo '<td>'.$row['Name'].'</td>';
			echo '<td>'.$row['Description'].'</td>';
			echo '<td>'.$row['Created At'].'</td>';
			echo '<td>'.$row['Modified_At'].'</td>';
			echo '<td>';
			if($row['Status']==1) 
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
	
