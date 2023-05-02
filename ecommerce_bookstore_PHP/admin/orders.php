<?php
	include 'head.php';
	include 'sideNavbar.php';
	
	
	include_once("class/Order.php");
	
	$order = new Order();
    $result = $order->get_orders();
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
						
						
						
						
						<!-- ********* **********TABLE AREA START ******* *********   -->	
						<div  id="showTable">			
							<h3 class="card-title">Orders Table					 
							</h3>
							<div class="table-responsive">
								<table class="table table-striped table-bordered zero-configuration">
									<thead>
										<tr>
											<th>ID</th>
											<th>Cust_ID</th>
											<th>Net Amount</th>                                               
											<th>Dated</th>                                                                                                                                           
											<th>Action</th>
										</tr>
									</thead>	
									<tbody id="userData">									
										<?php while($row = mysqli_fetch_assoc($result)) { ?>
											
											<tr>
												<td><?php echo $row['id']; ?></td>            
												<td><?php echo $row['customer_id']; ?></td>
												<td>$<?php echo $row['total']; ?></td>			          		
												<td><?php echo $row['order_date']; ?></td>			                  
												<td>
													<a href="javascript:void(0)" class= "btn btn-primary btn-sm"  
													onclick="view(<?php echo $row['id']; ?>)">View Details</a> 
												</td>
											</tr>
											
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
						<!-- ********* **********TABLE AREA END ******* *********   -->		
						
						<section id="content" class="">
							
							<div class="card-title"><h3>Order Details </h3> </div>
							<div id="printbtn" class="basic-invoice-buttons hidden-xs text-right">
                                <button class="btn btn-default" >
								<a href="orders.php"> Back</a></button>
                                
							</div>
							<div id="Reciept_data">
								<div class="panel-body p20" id="invoice-item">
									
									
									<div class="row pb-4 border-bottom" id="invoice-info">
										<div class="col-md-4 border-right mb-3">
											<div class="panel panel-alt">
												<div class="panel-heading pb-3">
													<span class="card-title font-weight-bold"> Bill To: </span>
													
													
												</div>
												<div class="panel-body">
													<b><div id="b_name">sonia</div></b>
													<div><b>Phone: </b><span id="b_phone"></span></div>
													<div><b>Email: </b><span id="email"></span></div>
													
												</div>
											</div>
										</div>
										<div class="col-md-4 border-right mb-3">
											<div class="panel panel-alt">
												<div class="panel-heading pb-3">
													<span class="card-title  font-weight-bold"> Ship To:</span>
													
												</div>
												<div class="panel-body">
													<b><div id="s_name">sonia</div></b>
													<div><span id="s_area"></span>,
													<span id="s_city"></span></div>
													<div><span id="s_state"></span>, <span id="s_pin"></span></div>
												</div>
											</div>
										</div>
										<div class="col-md-4 border-right">
											<div class="panel panel-alt">
												<div class="panel-heading pb-3">
													<span class="card-title"> Invoice Details: </span>
													
													<div class="panel-btns pull-right ml10"></div>
												</div>
												<div class="panel-body">
													<div><b>Order ID #:</b><span id="order_id"> IM-000002</span></div>
													<div><b>Date:</b> <span class="date">2018-09-13 21:49:35 </span></div>
													<div><b>Delievered Date:</b> </div>
												</div>
											</div>
										</div>
									</div>
									
									<div class="row py-1" id="invoice-table">
										<div class="col-md-12">
											<table class="table table-striped">
												<thead>
													<tr>
														<th>Item ID</th>
														<th>Item</th>
														<th>Quantity</th>
														<th>Rate</th>
														<th class="text-right pr10">Total</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="">
															<b>1</b>
														</td>
														<td>Jeans</td>
														
														<td class="">1</td>
														<td class="">5045</td>
														<td class="text-right pr10">456</td>
													</tr>
													
												</tbody> </table>
										</div>
									</div>
									<div class="row" id="invoice-footer">
										<div class="col-md-12">
											<div class="pull-right">
												<table class="table" id="basic-invoice-result">
													<thead>
														<tr>
															<th>
																<b>Sub Total:</b>
															</th>
															<th>$<span id="sub">$5045</span></th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>
																<b>Discount</b>
															</td>
															<td>$<span id="discount">$5045</span></td>
														</tr>
														<tr>
															<td>
																<b>Total</b>
															</td>
															<td>$<span id="total">$5045</span></td>
														</tr>
														
													</tbody>
												</table>
											</div>
											<div class="clearfix"></div>
											
										</div>
									</div>
									
								</div>
								
							</div>
						</section>
						
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- #/ content body end -->






<script>
	$('.alert').hide();
	$('#content').hide();
	/****************....VIEW DETAILS FORM.....*****************/
	function view(id){
		$('#showTable').hide();	
		$('#content').show();	
		$.ajax({
			type: 'POST',
			
			url: 'order_action.php',
			data: {id:id},
			success:function(data){
				$('#Reciept_data').html(data);	
			
			}	
		});
	}
	
</script>

<?php
	include 'footer.php';
?>