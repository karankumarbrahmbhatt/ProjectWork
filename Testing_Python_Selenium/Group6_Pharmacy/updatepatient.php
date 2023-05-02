<?php 

$PID = $_GET['ID'];
$con = mysqli_connect('localhost', 'root', '','group6_pharmacy');

$HG ="";

    if(isset($_POST['update']))
    {
        $PID = $_GET['ID'];
        $PNAME =  $_POST['txtName'];
        $PADD =  $_POST['txtAddress'];
        $PPHONE = $_POST['txtPhone'];
        $PDOB=  $_POST['txtDOB'];
        $PPRES =  $_POST['txtPrescription'];

        $query = " update patients set Patient_Name = '".$PNAME."', 
        Patients_DOB='".$PDOB."',  Patients_Prescription='".$PPRES."', 
        Patients_Address='".$PADD."',Patients_ContactNumber='".$PPHONE."' where idPatients='".$PID."'";
        $result = mysqli_query($con,$query);

        if($result)
        {
            $HG = 'Patient detail updated successfully';
        }
        else
        {
            echo ' Please Check Your Query ';
        }
    }
    else
    {
        echo 'Vasu';
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
 <div class="container flex heading">
    <header>
      <h1 id="homepage-title"><a href="./index.php">BlueCross Doctor Form</a></h1>
    </header>
    <nav>
      <ul>
		<li><a href="./index.php">Home</a></li>
        <li><a href="./patientsList.php">Patient</a></li>

      </ul>
    </nav>
  </div>
    <div class="pageB">

<h1><label for="Name"><?php echo $HG ?> </label></h1>
    <div>
<div class="container">
            <div class=" footer_marg">
                <div>&copy;Dhwani Dedhia (8739992)</div>
          <div>&copy;Karankumar Bhrambhatt (7126535)</div>
          <div>&copy;Shrey Naik (8804683)</div>
          <div>&copy;Dwayne Justin (8694417)</div>
            </div>
        </div>
        </body>
        </html>