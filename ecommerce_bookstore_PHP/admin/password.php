<?php
include 'head.php';
include 'sideNavbar.php';

require('db.php');

		    $sql="select * from register_admin where id=". $_SESSION['myid'];
	        $result=mysqli_query($con,$sql);
			$row=mysqli_fetch_array($result);
				
				$pswd=$row['Password'];
				
?>

        <!--**********************************
            Content body start
        ***********************************-->
     <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                    </ol>
                </div>
            </div>
           <!----------- row--------- -->
		   
 <!----- Start Message area ---------->
<div class="h-100 justify-content-center row">
	<div class="col-5 alert alert-danger alert-dismissible">
		<span id="errorMsg"></span>
		<button type="button" class="close" data-dismiss="alert"> &times;</button>
		<br>
	</div>
	<div class="col-5 alert alert-success alert-dismissible">
		<span id="successMsg"></span>
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<br>
	</div>
</div>		<br>
	 <!------ End Message area ------>
		 
			
<div class="login-form-bg h-100">
        <div class="container h-100">
		
            <div class="row justify-content-center h-100">
			
                <div class="col-xl-6">
                    <div class="form-input-content">
					
                        <div class="card login-form mb-0">
						
                            <div class="card-body pt-5">
                                
                               
								
                                    <a class="text-center" href="index.html"> <h4>Change Password</h4></a>
        
                          <form onsubmit="event.preventDefault();" id="myForm" class="mt-5 mb-5 login-input">
                                    <div class="form-group">
                                        
                                        <input type="password" id="id0" class="form-control"  placeholder="Old Password" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" id="id1" class="form-control"  placeholder="New Password" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" id="id2" class="form-control" placeholder="Confirm New Password" required>
                                    </div>
                                    <button id="submit" class="btn login-form__btn submit w-100">Submit</button>
                            </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        *************************************-->

<script>	
	$('.alert-success').hide();
	$('.alert-danger').hide();
	
	$(document).ready(function(){
	$("#submit").click(function(){	
	var old=  $("#id0").val();
	var new1= $("#id1").val();
	var new2= $("#id2").val();
	
		if(new1!=new2)
		{
		 $('#errorMsg').text("Fill same passwords!");
		 $('.alert-danger').show();
		 $('.alert-success').hide();
		  return false;
		}
		
		else{
	       $.ajax({
			url:'Login_dashboard.php',
			type:'post',
			data:{action_type:'password',old:old,pswd:new2},
		
			success:function(response){
				if(response==1){
				
					$('#successMsg').text('Password changed successfully!');	
					$('.alert-success').show();
					$('.alert-danger').hide();
					document.getElementById("myForm").reset();
				}
				else
				{
					$('#errorMsg').text(response);
				    $('.alert-danger').show();
					$('.alert-success').hide();
				}
	        }
	        });
		}
	});
	});
	</script>
<?php
include('footer.php');
?>