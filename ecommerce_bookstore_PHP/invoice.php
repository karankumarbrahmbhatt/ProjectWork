<?php
	include_once("class/db_conn.php");
		
	$connection = new DatabaseConnection();
	
	session_start();
	require_once './fpdf184/fpdf.php';
	require('db.php');
	
	if(isset($_GET['order'])){
		$order = $_GET['order'];
	} else {
		echo "Empty query!";
		exit;
	}

	if(!isset($order)){
		echo "Something went wrong!";
		exit;
	}
	
	$result_order=$connection->get_order_by_orderid($order);
	
	if(!$result_order){
		echo "Can't retrieve data " . mysqli_error($con);
		exit;
	}
	
	$order_details = mysqli_fetch_assoc($result_order);
	

	//customer and invoice details
	$info=[
		"customer"=>$order_details['s_name'],
		"address"=>$order_details['s_street']." ".$order_details['s_area'],
		"address_details"=>$order_details['s_city']." ".$order_details['s_state']." ".$order_details['s_pincode']." ".'Canada',
		"invoice_no"=>$order_details['order_id'],
		"invoice_date"=>date('m-d-Y', strtotime($order_details['order_date'])),
		"total_amt"=>$order_details['total']
	];
	
	
	
	
	// get order data
	
	$result_order_item = $connection->get_orderitem_by_id($order);
	if(!$result_order_item){
		echo "Can't retrieve data " . mysqli_error($con);
		exit;
	}

	
	//invoice Products
	$products_info=[];
	foreach($result_order_item as $order_item){
		$products_info[] = ["name"=>$order_item['book_title'],"price"=>$order_item['price'],"qty"=>$order_item['quantity'],"total"=>number_format((intval($order_item['price'])*intval($order_item['quantity'])),2)];
	}
	

	class PDF extends FPDF
	{
		function Header(){
		  
		  //Display Company Info
		  $this->SetFont('Arial','B',14);
		  $this->Cell(50,10,"BOOKSTOR",0,1);
		  $this->SetFont('Arial','',14);
		  $this->Cell(50,7,"Fairview Mall,",0,1);
		  $this->Cell(50,7,"Kitchener N2A 2N6.",0,1);
		  $this->Cell(50,7,"Phone: +15197814723",0,1);
		  
		  //Display INVOICE text
		  $this->SetY(15);
		  $this->SetX(-40);
		  $this->SetFont('Arial','B',18);
		  $this->Cell(50,10,"INVOICE",0,1);
		  
		  //Display Horizontal line
		  $this->Line(0,48,210,48);
		}

		function body($info,$products_info){
		  
		  //Billing Details
		  $this->SetY(55);
		  $this->SetX(10);
		  $this->SetFont('Arial','B',12);
		  $this->Cell(50,10,"Bill To: ",0,1);
		  $this->SetFont('Arial','',12);
		  $this->Cell(50,7,$info["customer"],0,1);
		  $this->Cell(50,7,$info["address"],0,1);
		  $this->Cell(50,7,$info["address_details"],0,1);
		  
		  //Display Invoice no
		  $this->SetY(55);
		  $this->SetX(-60);
		  $this->Cell(50,7,"Invoice No: ".$info["invoice_no"]);
		  
		  //Display Invoice date
		  $this->SetY(63);
		  $this->SetX(-60);
		  $this->Cell(50,7,"Invoice Date: ".$info["invoice_date"]);
		  
		  //Display Table headings
		  $this->SetY(95);
		  $this->SetX(10);
		  $this->SetFont('Arial','B',12);
		  $this->Cell(80,9,"DESCRIPTION",1,0);
		  $this->Cell(40,9,"PRICE",1,0,"C");
		  $this->Cell(30,9,"QTY",1,0,"C");
		  $this->Cell(40,9,"TOTAL",1,1,"C");
		  $this->SetFont('Arial','',12);
		  
		  //Display table product rows
		  foreach($products_info as $row){
			$this->Cell(80,9,$row["name"],"LR",0);
			$this->Cell(40,9,'$'.$row["price"],"R",0,"R");
			$this->Cell(30,9,$row["qty"],"R",0,"C");
			$this->Cell(40,9,'$'.$row["total"],"R",1,"R");
		  }
		  //Display table empty rows
		  for($i=0;$i<12-count($products_info);$i++)
		  {
			$this->Cell(80,9,"","LR",0);
			$this->Cell(40,9,"","R",0,"R");
			$this->Cell(30,9,"","R",0,"C");
			$this->Cell(40,9,"","R",1,"R");
		  }
		  //Display table total row
		  $this->SetFont('Arial','B',12);
		  $this->Cell(150,9,"TOTAL",1,0,"R");
		  $this->Cell(40,9,'$'.$info["total_amt"],1,1,"R");
		  
		  //Display amount in words
		  $this->SetY(225);
		  $this->SetX(10);
		  $this->SetFont('Arial','B',12);
		  $this->Cell(0,9,"Thank you for your purchase",0,1);
		  $this->SetFont('Arial','',12);
		  $this->Cell(0,9,"If you have any concerns regarding this invoice please contact us",0,1);
		  
		}
		function Footer(){
		  
		  //set footer position
		  $this->SetY(-50);
		  $this->SetFont('Arial','B',12);
		  $this->Cell(0,10,"for BOOKSTOR",0,1,"R");
		  $this->Ln(15);
		  $this->SetFont('Arial','',12);
		  $this->Cell(0,10,"Authorized Signature",0,1,"R");
		  $this->SetFont('Arial','',10);
		  
		  //Display Footer Text
		  $this->Cell(0,10,"This is a computer generated invoice",0,1,"C");
		  
		}

	}
	//Create A4 Page with Portrait 
	$pdf=new PDF("P","mm","A4");
	$pdf->AddPage();
	$pdf->body($info,$products_info);
	$pdf->Output();

?>
