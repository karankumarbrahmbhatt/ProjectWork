<?php
	include 'head.php';
	include 'sideNavbar.php';
	
	
	include_once("class/Category.php");
	
	$category = new Category();
?>    
<!--**********************************
	Content body start
***********************************-->
<div class="content-body">
	
	<div class="container-fluid">
		
		<!--.....MESSAGE AREA..... -->	
		<div class="alert alert-danger alert-dismissible error">
			<span id="errorMsg"></span>
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<br>
		</div>
		<div class="alert alert-success alert-dismissible">
			<span id="successMsg"></span>
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<br>
		</div>
		<div class="alert alert-danger alert-dismissible delete">
			<span id="deleteMsg"></span>
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<br>
		</div>
		<!-- ....END MESSAGE AREA.... -->	
		
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						
						<!-- ********* **********ADD FORM Start ******* ***********    -->			
						<div class="panel-body none formData" id="addForm">
							<h3 id="actionLabel">Add Category</h3>
							<form class="form" id="form" enctype="multipart/form-data">
								
								<div class="form-group">
									<label>Name</label>
									<input type="text" class="form-control" name="name" id="name"/>
								</div>
								<div class="form-group">
									<label>Description </label>
									<input type="text" class="form-control" name="description" id="description"/>
								</div>
								<div>
									<label>Parent Category </label>
									<select  class="form-control" name="parent">
										<option value="0">Select Category</option>
										<?php
										
											$result = $category->get_catgories_parent();
											
											while($row = mysqli_fetch_assoc($result)) 
											{ ?>
											
											<option value="<?php echo $row['ID']; ?>"><?php echo $row['Name']; ?></option>            
										<?php } ?>
									</select>
								</div>
								
								<a href="javascript:void(0);" class="btn btn-warning" 
								onClick=" $('#addForm').hide(); $('#showTable').show(); ">Cancel</a>
								<a href="javascript:void(0);" class="btn btn-success" onClick="addCategory()">Add</a>
							</form>
						</div><br>
						<!-- ********* **********ADD FORM END ******* *********   -->	
						
						<!-- ********* **********EDIT FORM Start ******* ***********    -->			
						<div class="panel-body none formData" id="editForm">
							<h3 id="actionLabel">Edit category</h3>
							<form class="form" id="edit"  enctype="multipart/form-data">
								
								<input type="hidden" class="form-control" name="id" id="idEdit"/>  <!-- Hidden ID Field  -->
								
								<div class="form-group">
									<label>Name</label>
									<input type="text" class="form-control" name="name" id="nameEdit"/>
								</div>
								<div class="form-group">
									<label>Description </label>
									<input type="email" class="form-control" name="description" id="descriptionEdit"/>
								</div>
								<div>
									<label>Parent Category </label>
									<select  class="form-control" name="parent" id="parent">
										<option value="0">Select Category</option>
										<?php
											require('db.php');
											if(!$con)
											{echo "DB not connected"; die;}
											
											$sql="select * from categories where Parent_ID=0";
											$result=mysqli_query($con,$sql);
											
											while($row = mysqli_fetch_assoc($result)) 
											{ ?>
											
											<option value="<?php echo $row['ID']; ?>"><?php echo $row['Name']; ?></option>            
										<?php } ?>
									</select>
								</div>
								
								<div class="form-group">
									<label>Status:</label>
									<input type="radio" class="status" name="status"  value="1" />Active
									<input type="radio" class="status" name="status" value="0"/>Inactive
								</div>
								
								<a href="javascript:void(0);" class="btn btn-warning" 
								onClick=" $('#editForm').slideUp(); $('#showTable').show(); ">Cancel</a>
								<a href="javascript:void(0);" class="btn btn-success" onClick="editCategory()">Update</a>
							</form>
						</div><br>
						<!-- ********* **********EDIT FORM END ******* *********   -->	
						
						<!-- ********* **********TABLE AREA START ******* *********   -->	
						<div  id="showTable">			
							<h3 class="card-title">Categories Table
								<span class="pull-right btn btn-info text-white" 
								onclick="$('#addForm').show();$('#showTable').hide();">
								Add Category</span>
							</h3>
							<div class="table-responsive">
								<table class="table table-striped table-bordered zero-configuration">
									<thead>
										<tr>
											<th>ID</th>
											<th>Parent_ID</th>
											<th>Name</th>
											<th>Description</th>
											<th>Created At</th>
											<th>Modified At</th>
											<th>Status</th>
											<th>Action</th>
										</tr>
									</thead>	
									<tbody id="userData">									
										<?php
											$result_c = $category->get_categories();
											
											while($row_c = mysqli_fetch_assoc($result_c)) 
											{ ?>
											<tr>
												<td><?php echo $row_c['ID']; ?></td>
												<td><?php echo $row_c['Parent_ID']; ?></td>
												<td><?php echo $row_c['Name']; ?></td>
												<td><?php echo $row_c['Description']; ?></td>
												 
												<td><?php echo $row_c['Created At']; ?></td>			
												<td><?php echo $row_c['Modified_At']; ?></td>			
												<td> <?php if($row_c['Status']==1) 
													{?> <span class="btn btn-success btn-sm text-white">Active</span> <?php } 
												else {?> <span class="btn btn-danger btn-sm">Inactive</span> <?php } ?>
												</td>        
												<td> <a href="javascript:void(0)" onClick="$('#editForm').slideDown(); viewCategory(<?php echo $row_c['ID']; ?>) " class="btn btn-info btn-sm"> &nbsp;&nbsp;Edit&nbsp;&nbsp; </a>
													<a href="javascript:void(0)" class= "btn btn-danger btn-sm"  
													onclick="return confirm('Are you sure to delete data?')?deleteCategory(<?php echo $row_c['ID']; ?>):false;">  Delete  </a> 
												</td>
											</tr>
											
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
						<!-- ********* **********TABLE AREA END ******* *********   -->				
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- #/ content body end -->






<script>
	$('#editForm').slideUp();
	$('#addForm').hide();
	$('.alert').hide();
	
	function getUsers(){
		$.ajax({
			type: 'POST',
			url: 'category_action.php',
			data: {action_type:'show',id:''},
			success:function(html){
				$('#userData').html(html);
			}
		});
	}
	
	/****************....DELETE CATEGORY FORM.....*****************/
	function deleteCategory(id){
		$.ajax({
			type: 'POST',
			url: 'category_action.php',
			data: {action_type:'del',id:id},
			success:function(response){
				
				if(response==1)
				{	
					getUsers();  
					$('.delete').show();
					$('#deleteMsg').html('Category Deleted Successfully!');
					
				}
				else
				{
					$('.error').show();
					$('#errorMsg').html(response); 
				} 
				
			}   
		});
	}
	/****************....VIEW CATEGORY FORM.....*****************/
	function viewCategory(id){
		console.log(id);
		$('#showTable').hide();	
		$.ajax({
			type: 'POST',
			dataType:'JSON',
			url: 'category_action.php',
			data: {action_type:'view',id:id},
			success:function(data){
				
				$('#idEdit').val(data.id);
				$('#nameEdit').val(data.name);
				$('#descriptionEdit').val(data.description);
				$('#parent').val(data.parent);
				
				if(data.status==1)
				{        
					$('.status')[0].checked=true;
				}                                      //......RADIO CHECKING .......//
				else
				{
					$('.status')[1].checked=true;
				}  	
				
			}	
		});
	}
	/****************....EDIT CATEGORY FORM.....*****************/
	function editCategory(){
		var myForm = $("#edit")[0];
		var data=new FormData(myForm);
		data.append("action_type", "edit");   
		$.ajax({
			type: 'POST',
			url: 'category_action.php',
			data: data,
			contentType: false,
			cache: false,
			processData:false,
			success:function(response){
				
				if(response==1) 
				{
					$('#editForm').slideUp();
					$('#showTable').show();	
					$('.alert-success').show();
					getUsers();
					$('#successMsg').html('Category Updated Successfully!');
					
					
				}
				else{
					$('.error').show();
					$('#errorMsg').html(response);
				}
				
			}
		});
	}
	
	/****************....ADD CATEGORY FORM.....*****************/
	function addCategory(){
		var myForm = $("#form")[0];
		var data=new FormData(myForm);
		data.append("action_type", "add");   
		data.append("id", "");   
		$.ajax({
			type: 'POST',
			url: 'category_action.php',
			data: data,
			contentType: false,
			cache: false,
			processData:false,
			success:function(response){
				
				if(response==1) 
				{
					getUsers();
					$('#addForm').hide();
					document.getElementById('form').reset();
					$('#showTable').show();	
					$('.alert-success').show();
					$('#successMsg').html('Category Added Successfully!');
					
				}
				else{
					$('.error').show();
					$('#errorMsg').html(response);
				}
			}	
			
		});
		
	}
	
	
	
</script>

<?php
	include 'footer.php';
?>