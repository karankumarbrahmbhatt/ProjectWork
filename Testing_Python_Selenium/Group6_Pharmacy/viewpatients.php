<?php 
    $PID = $_GET['GetID'];
    $con = mysqli_connect('localhost', 'root', '','group6_pharmacy');
    $query = " select * from patients where idPatients='".$PID."'";
    $result = mysqli_query($con,$query);

    while($row=mysqli_fetch_assoc($result))
    {
        $PID = $row['idPatients'];
        $PNAME = $row['Patient_Name'];
        $PADD = $row['Patients_Address'];
        $PPHONE = $row['Patients_ContactNumber'];
        $PDOB= $row['Patients_DOB'];
        $PPRES = $row['Patients_Prescription'];
        $PGENDER = $row['Patient_Gender'];
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

<body >
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
    <form>
        <div  class="patientPhp">
            <div class="phFlex">
                <label class="phLabel" for="Name">Name </label>
                <input type="text" class="form-control" name="txtName" id="txtName" placeholder="Name" required
                    value="<?php echo $PNAME ?>">
            </div>
			<div class="phFlex">
			  <label class="phLabel" for="Gender">Gender</label>
			  <select name="txtGender" class="form-control" id="txtGender" placeholder="Gender" required>
				<option value="Male" <?php if($PGENDER == 'Male'){ ?>selected <?php } ?>>Male</option>
				<option value="Female" <?php if($PGENDER == 'Female'){ ?>selected <?php } ?>>Female</option>
				</select>
			</div>
            <div class="phFlex">
                <label class="phLabel" for="DOB">DOB</label>
                <input type="date" class="form-control" name="txtDOB" id="txtDOB" placeholder="DOB"
                    value="<?php echo $PDOB ?>" required>
            </div>
            <div class="phFlex">
                <label class="phLabel" for="phone">Phone</label>
                <input type="text" class="form-control" name="txtPhone" id="txtPhone" placeholder="Phone"
                    value="<?php echo $PPHONE ?>" required>
            </div>
            <div class="phFlex">
                <label class="phLabel" for="Address">Address</label>
                <input type="text" class="form-control" name="txtAddress" id="txtAddress" placeholder="Address"
                    value="<?php echo $PADD ?>" required>
            </div>
            <div class="phFlex">
                <label class="phLabel" for="Prescription">Prescription</label>
                <input type="text" class="form-control" name="txtPrescription" id="txtPrescription"
                    placeholder="Prescription" value="<?php echo $PPRES ?>" required>
            </div>
            <div class="phFlex">
               <a class="btn btn-primary btn-lg btn-block back" href="patientsList.php">Back</a>
            </div>
        </div>
    </form>

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
