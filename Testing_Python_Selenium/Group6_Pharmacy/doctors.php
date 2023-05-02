<?php
// database connection code
if(isset($_POST['txtDocName']))
{
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');
$con = mysqli_connect('localhost', 'root', '','group6_pharmacy');
$HG ="";
$digit = mt_rand(0, 999999);
// get the post records

$txtDocName = $_POST['txtDocName'];
$txtSpecilization = $_POST['txtSpecilization'];
$txtExperience = $_POST['txtExperience'];

// database insert SQL code
$sql = "INSERT INTO `doctors` (`idDoctors`,`Doctors_Name`,`Doctors_Specialization`,`Doctors_Experience`) 
VALUES ('$digit','$txtDocName','$txtSpecilization',  '$txtExperience')";

// insert in database 
$rs = mysqli_query($con, $sql);

if($rs)
{
	$HG = "Doctor Records Inserted Successfully";
}
}
else
{
	echo "Are you a genuine visitor?";
	
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors Page</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/4031b26978.js" crossorigin="anonymous"></script>
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Merriweather&family=Montserrat&family=Sacramento&display=swap"
    rel="stylesheet" />
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

    <div class="pageH">
    <h1><label for="Name"><?php echo $HG ?> </label></h1>
</div>
    <footer>
    <div class="container">
            <div class=" footer_marg">
                <div>&copy;Dhwani Dedhia (8739992)</div>
          <div>&copy;Karankumar Bhrambhatt (7126535)</div>
          <div>&copy;Shrey Naik (8804683)</div>
          <div>&copy;Dwayne Justin (8694417)</div>
            </div>
        </div>
  </footer>
    
</body>
</html>
