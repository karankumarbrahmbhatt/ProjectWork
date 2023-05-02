<?php
	include 'head.php';
	include 'sideNavbar.php';
	
	include_once("class/Customer.php");
	
	$customer = new Customer();
    $result = $customer->get_users();
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
							<h3 id="actionLabel">Add Customer</h3>
							<form class="form" id="myform">
								
					
								<div class="form-group">
									<label>Name</label>
									<input type="text" class="form-control" name="name" id="name"/>
								</div>
								<div class="form-group">
									<label>Email </label>
									<input type="email" class="form-control" name="email" id="email"/>
								</div>
								
								<div class="form-group">
									<label>Password</label>
									<input type="password" class="form-control" name="pswd" id="pswd"/>
								</div>
								
								
								<a href="javascript:void(0);" class="btn btn-warning" 
								onClick=" $('#addForm').hide(); $('#showTable').show(); ">Cancel</a>
								<a href="javascript:void(0);" class="btn btn-success" onClick="addUser()">Add User</a>
							</form>
						</div><br>
						<!-- ********* **********ADD FORM END ******* *********   -->	
						
						<!-- ********* **********EDIT FORM Start ******* ***********    -->			
						<div class="panel-body none formData" id="editForm">
							<h3 id="actionLabel">Edit Customers</h3>
							<form class="form" >
								
								<input type="hidden" class="form-control" name="id" id="idEdit"/>  <!-- Hidden ID Field  -->
								
								<div class="form-group">
									<label>Name</label>
									<input type="text" class="form-control" name="name" id="nameEdit"/>
								</div>
								<div class="form-group">
									<label>Email </label>
									<input type="email" class="form-control" name="email" id="emailEdit"/>
								</div>
								
								<div class="form-group">
									<label>Password</label>
									<input type="password" class="form-control" name="pswd" id="pswdEdit"/>
									
								</div>
								
								<a href="javascript:void(0);" class="btn btn-warning" 
								onClick=" $('#editForm').slideUp(); $('#showTable').show(); ">Cancel</a>
								<a href="javascript:void(0);" class="btn btn-success" onClick="editUser()">Update User</a>
							</form>
						</div><br>
						<!-- ********* **********EDIT FORM END ******* *********   -->	
						
						<!-- ********* **********TABLE AREA START ******* *********   -->	
						<div  id="showTable">			
							<h3 class="card-title">Customers Table
								<span class="pull-right btn btn-info text-white" 
								onclick="$('#addForm').show();$('#showTable').hide();">
								Add Customer</span>
							</h3>
							<div class="table-responsive">
								<table class="table table-striped table-bordered zero-configuration">
									<thead>
										<tr>
											<th>ID</th>
											<th>Name</th>
											<th>Email</th>                                           
											<th>Created At</th>
											<th>Action</th>
										</tr>
									</thead>	
									<tbody id="userData">										
										<?php while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ ?>
											<tr>
												<td><?php echo $row['ID']; ?></td>
												<td><?php echo $row['Name']; ?></td>
												<td><?php echo $row['Email']; ?></td>
												<td><?php echo $row['Created At']; ?></td>
												<td> 
													<a href="javascript:void(0)" onClick="$('#editForm').slideDown(); viewUser(<?php echo $row['ID']; ?>) " class="btn btn-info btn-sm"> &nbsp;&nbsp;Edit&nbsp;&nbsp; </a>
													<a href="javascript:void(0)" class= "btn btn-danger btn-sm"
													onclick="return confirm('Are you sure to delete data?')?deleteUser(<?php echo $row['ID']; ?>):false;">  Delete  </a> 
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
			url: 'customer_action.php',
			data: {action_type:'show',id:''},
			success:function(html){
				$('#userData').html(html);
			}
		});
	}
	
	/****************....DELETE USER FORM.....*****************/
	function deleteUser(id){
		$.ajax({
			type: 'POST',
			url: 'customer_action.php',
			data: {action_type:'del',id:id},
			success:function(response){
				
				if(response==1)
				{	
					$('.delete').show();
					$('#deleteMsg').html('User Deleted Successfully!');
					getUsers(); 
				}
				else
				{
					$('.error').show();
					$('#errorMsg').html(response); 
				} 
				
			}   
		});
	}
	/****************....VIEW USER FORM.....*****************/
	function viewUser(id){
		$('#showTable').hide();	
		$.ajax({
			type: 'POST',
			dataType:'JSON',
			url: 'customer_action.php',
			data: {action_type:'view',id:id},
			success:function(data){
				
				console.log(data); 
				$('#idEdit').val(data.id);
				$('#nameEdit').val(data.name);
				$('#emailEdit').val(data.email);
				$('#pswdEdit').val(data.pswd);
				if(data.status==1)
				{        
					$('.status')[0].checked=true;
				}                                      
				else
				{
					$('.status')[1].checked=true;
				}  
				
				
			}	
		});
	}
	/****************....EDIT USER FORM.....*****************/
	function editUser(){
		var id=    $('#idEdit').val();	
		var name=  $('#nameEdit').val();	
		var email= $('#emailEdit').val();	
		var pswd=  $('#pswdEdit').val();
		var status=$(".status:checked").val();
		$.ajax({
			type: 'POST',
			url: 'customer_action.php',
			data: {action_type:'edit',id:id,name:name,email:email,pswd:pswd,status:status},
			success:function(response){
				
				if(response==1) 
				{
					$('#editForm').slideUp();
					$('#showTable').show();	
					$('.alert-success').show();
					$('#successMsg').html('User Updated Successfully!');
					
					getUsers(); 
				}
				else{
					$('.error').show();
					$('#errorMsg').html(response);
				}
				
			}
		});
	}
	
	/****************....ADD USER FORM.....*****************/
	function addUser(){
		var name=  $('#name').val();	
		var email= $('#email').val();	
		var pswd=  $('#pswd').val();	
		if(name=='' || email=='' || pswd=='')
		{
			$('.error').show();
			$('#errorMsg').html('Fill all fields!');	
		}
		else
		{
			$.ajax({
				type: 'POST',
				url: 'customer_action.php',
				data: {action_type:'add',id:'',name:name,email:email,pswd:pswd},
				success:function(response){
					
					if(response==1) 
					{
						$('#addForm').hide();
						document.getElementById('myform').reset();
						$('#showTable').show();	
						$('.alert-success').show();
						$('#successMsg').html('User Added Successfully!');
						getUsers(); 
					}
					else{
						$('.error').show();
						$('#errorMsg').html(response);
					}
					
				}
			});
		}
	}
	
</script>

<?php include 'footer.php'; ?>