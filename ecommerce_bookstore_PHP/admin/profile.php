<?php
if(isset($_POST['update']))
{echo "abc";}
include 'head.php';
include 'sideNavbar.php';

require('db.php');

		    $sql="select * from register_admin where id=". $_SESSION['myid'];
	        $result=mysqli_query($con,$sql);
			$row=mysqli_fetch_array($result);
				$name=$row['Name'];
				$email=$row['Email'];
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
            <!-- row -->

            <div class="container-fluid">
                <div class="row justify-content-center">
                   
					<div class="col-lg-10 col-xl-10">
                        <div class="card">
                            <div class="card-body">
							
                               <div class="media align-items-center mb-4">
							    
                                    <img class="mr-3" src="images/avatar/11.png" width="80" height="80" alt="user">
                                    <div class="media-body">
								    
                                    </div>	
								
                                 </div>
								  <h3>About</h3> 	

							  <div class="profile">
                                    <form>
									<div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Name</label>
                                            <div class="col-sm-9">
                                                
                                                <input type="text" readonly="readonly" class="form-control-plaintext" value="<?php echo $name;  ?>">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">Email</label>
                                            <div class="col-sm-9">
                                                
                                                <input type="text" readonly="readonly" class="form-control-plaintext" value="<?php echo $email;  ?>">
                                            </div>
                                        </div>
                                       
                                    </form>
                                
									<button id="edit" data-toggle="collapse" data-target="#form" class="btn btn-danger">
								   Edit your profile</button>
								</div>
								<div id="form" method="post" class="collapse form">
									
									<form id="form2" onsubmit="event.preventDefault();"  class="mt-5 mb-5 login-input">
                                      <div class="form-group">
                                        <input type="text" id="id1" class="form-control"  placeholder="Name" value="<?php echo $name;?>" required>
                                      </div>
                                      <div class="form-group">
                                        <input type="email" id="id2" class="form-control"  placeholder="Email"  value="<?php echo $email;?>" required>
                                      </div>
                                      
                                      <button id="update" name="update" class="btn login-form__btn submit">Update</button>
									  <br><br><div id="demo" class="alert alert-success"></div>
                                    </form>
									
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
        ***********************************-->
	<script>	
	$(document).ready(function(){
    $("#edit").click(function(){
	$(".profile").hide();
	$("#demo").hide();
	});
	
	$("#update").click(function(){	
	var name= $("#id1").val();
	var email=$("#id2").val();
        
	       $.ajax({
			url:'Login_dashboard.php',
			type:'post',
			data:{action_type:'update',name:name,email:email},
		
			success:function(response){
				if(response==1){
				location="profile.php";	}
				else
				{alert(response);}
	        }
	        });
	});
	
	
	});
	</script>
    <?php    include('footer.php');    ?>
    