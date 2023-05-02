<?php
	include 'head.php';
	include 'sideNavbar.php';
	
	include_once("class/Product.php");
	
	$product = new Product();
    
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
							<h3 id="actionLabel">Add Product</h3><br>
							<form class="form" id="form" enctype="multipart/form-data">
								<div class="row">
									<div class="col-lg-8">
										<div class="form-group">
											<label>Name</label>
											<input type="text" class="form-control" name="name" id="name"/>
										</div>
										<div class="form-group">
											<label>Description </label>
											<input type="text" class="form-control" name="description" id="description"/>
										</div>
										
										
										<div class="form-group">
											<label>Regular price</label>
											<input type="text" class="form-control" name="reg" id="reg"/>
										</div>
										<div class="form-group">
											<label>Sales price</label>
											<input type="text" class="form-control" name="sales" id="sales"/>
										</div>
										<div class="form-group">
											<label>Image:</label>
											<input type="file" class="" name="image" id="pic"/>
										</div>
										
									</div>
									<div class="col-lg-4">
										<!-- ******** categories checkbox ************   -->
										<div class="form-group">   
											<div><label><h3>Select Category:</h3></div>   
												
												<?php
													
													$result_category = $product->get_catgories_parent();
													
													while($row_c = mysqli_fetch_assoc($result_category)) 
													{ ?>                   
													
													<div class="form-check form-check-inline">
														<label class="form-check-label">
														<input type="checkbox" class="form-check-input" name="cat" value="<?php echo $row_c['ID'];?>"><?php echo $row_c['Name'];?></label>
													</div>
													
													<!-- ******** sub-categories checkbox ************   -->			
													<div class="form-group ml-4">     
														
														<?php
															$record = $product->get_catgories_by_parent_id($row_c['ID']);
															
															while($roww = mysqli_fetch_assoc($record)) 
															{ ?>                   
															
															<div class="form-check form-check-inline">
																<label class="form-check-label">
																<input type="checkbox" class="form-check-input" name="subcat" value="<?php echo $roww['ID'];?>"><?php echo $roww['Name'];?></label>
															</div>
															
														<?php } ?>						
													</div>
													<!--  END SUBCAT CHECKBOX      -->
												<?php } ?>						
											</div>
											
											
											<!--*** ******** checkboxes end*************   -->		
											
											
										</div>
									</div>
									<a href="javascript:void(0);" class="btn btn-warning" 
									onClick=" $('#addForm').hide(); $('#showTable').show(); ">Cancel</a>
									<a href="javascript:void(0);" class="btn btn-success" onClick="addProduct()">Add</a>
								</form>
								
							</div><br>
							<!-- ********* **********ADD FORM END ******* *********   -->	
							
							<!-- ********* **********EDIT FORM Start ******* ***********    -->			
							<div class="panel-body none formData" id="editForm">
								<h3 id="actionLabel">Edit Product</h3>
								<form class="form" id="edit"  enctype="multipart/form-data">
									
									<input type="hidden" class="form-control" name="id" id="idEdit"/>  <!-- Hidden ID Field  -->
									
									<div class="form-group">
										<label>Name</label>
										<input type="text" class="form-control" name="name" id="nameEdit"/>
									</div>
									<div class="form-group">
										<label>Description </label>
										<input type="text" class="form-control" name="description" id="descriptionEdit"/>
									</div>
									<div class="form-group">
										<label>Regular Price </label>
										<input type="text" class="form-control" name="reg" id="regEdit"/>
									</div>
									<div class="form-group">
										<label>Sales Price </label>
										<input type="text" class="form-control" name="sales" id="salesEdit"/>
									</div>
									<div class="form-group">
										<label>Image</label>
										<input type="file" class="" name="image" id="imageEdit"/>
									</div>
									<div class="form-group">
										<label>Status:</label>
										<input type="radio" class="status" name="status"  value="1" />Active
										<input type="radio" class="status" name="status" value="0"/>Inactive
									</div>
									
									<a href="javascript:void(0);" class="btn btn-warning" 
									onClick=" $('#editForm').slideUp(); $('#showTable').show(); ">Cancel</a>
									<a href="javascript:void(0);" class="btn btn-success" onClick="editProduct()">Update</a>
								</form>
							</div><br>
							<!-- ********* **********EDIT FORM END ******* *********   -->	
							
							<!-- ********* **********TABLE AREA START ******* *********   -->	
							<div  id="showTable">			
								<h3 class="card-title">Products Table
									<span class="pull-right btn btn-info text-white" 
									onclick="$('#addForm').show();$('#showTable').hide();">
									Add Product</span>
								</h3>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Category</th>
                                                <th>Sub-Category</th>
                                                <th>Name</th>
                                                <th>Description</th>                                                                                             
                                                <th>Image</th>
                                                <th>Regular Price</th>                                               
                                                <th>Sales Price</th>
                                                <th>Created At</th>
                                                <th>Modified At</th>
                                                <th>Status</th>
												<th>Action</th>
											</tr>
										</thead>	
										<tbody id="userData">									
											<?php
												
												$result = $product->get_products();
												
												while($row = mysqli_fetch_assoc($result)) 
												{
													$record = $product->get_category_by_id($row['subcat_id']);
													
													$rec=$product->get_category_by_id($row['cat_id']);
													
													$i = mysqli_fetch_array($record);
													$j= mysqli_fetch_array($rec);
												?>
												
												<tr>
													<td><?php echo $row['id']; ?></td>
													<td><?php echo $j['Name']; ?></td>
													<td><?php echo $i['Name']; ?></td>
													<td><?php echo $row['name']; ?></td>
													<td><?php echo $row['description']; ?></td>
													<td><img src="../uploads/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?> Book" width="100px" height="100px"></td>  
													<td><?php echo $row['regular_price']; ?></td>
													<td><?php echo $row['sales_price']; ?></td>
													<td><?php echo $row['created_at']; ?></td>			
													<td><?php echo $row['modified_at']; ?></td>			
													<td> <?php if($row['status']==1) 
														{?> <span class="btn btn-success btn-sm text-white">Active</span> <?php } 
													else {?> <span class="btn btn-danger btn-sm">Inactive</span> <?php } ?>
													</td>        
													<td> <a href="javascript:void(0)" onClick="$('#editForm').slideDown(); viewProduct(<?php echo $row['id']; ?>) " class="btn btn-info btn-sm"> &nbsp;&nbsp;Edit&nbsp;&nbsp; </a>
														<a href="javascript:void(0)" class= "btn btn-danger btn-sm"  
														onclick="return confirm('Are you sure to delete data?')?deleteProduct(<?php echo $row['id']; ?>):false;">  Delete  </a> 
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
				url: 'product_action.php',
				data: {action_type:'show',id:''},
				success:function(html){
					$('#userData').html(html);
				}
			});
		}
		
		/****************....DELETE PRODUCT FORM.....*****************/
		function deleteProduct(id){
			$.ajax({
				type: 'POST',
				url: 'product_action.php',
				data: {action_type:'del',id:id},
				success:function(response){
					
					if(response==1)
					{	
						getUsers();  
						$('.delete').show();
						$('#deleteMsg').html('Product Deleted Successfully!');
						
					}
					else
					{
						$('.error').show();
						$('#errorMsg').html(response); 
					} 
					
				}   
			});
		}
		/****************....VIEW PRODUCT FORM.....*****************/
		function viewProduct(id){
			
			$('#showTable').hide();	
			$.ajax({
				type: 'POST',
				dataType:'JSON',
				url: 'product_action.php',
				data: {action_type:'view',id:id},
				success:function(data){
					
					$('#idEdit').val(data.id);
					$('#nameEdit').val(data.name);
					$('#descriptionEdit').val(data.description);
					$('#regEdit').val(data.reg);
					$('#salesEdit').val(data.sales);
					
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
		/****************....EDIT PRODUCT FORM.....*****************/
		function editProduct(){
			var myForm = $("#edit")[0];
			var data=new FormData(myForm);
			data.append("action_type", "edit");   
			$.ajax({
				type: 'POST',
				url: 'product_action.php',
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
						$('#successMsg').html('Product Updated Successfully!');
						
						
					}
					else{
						$('.error').show();
						$('#errorMsg').html(response);
					}
					
				}
			});
		}
		
		/****************....ADD PRODUCT FORM.....*****************/
		function addProduct(){
			var myForm = $("#form")[0];
			var data=new FormData(myForm);
			data.append("action_type", "add");   
			data.append("id", "");   
			$.ajax({
				type: 'POST',
				url: 'product_action.php',
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
						$('#successMsg').html('Product Added Successfully!');
						
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