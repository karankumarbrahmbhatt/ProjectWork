<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Patient Page</title>
  <link rel="stylesheet" href="style.css">
     <!-- FontAwesome -->
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
      <h1 id="homepage-title"><a href="./index.php">BlueCross Pharmacy Form</a></h1>
    </header>
    <nav>
      <ul>
		<li><a href="./index.php">Home</a></li>
        <li><a href="./patientsList.php">Patient</a></li>

      </ul>
    </nav>
  </div>
  <!-- <nav>
    <ul class="links">

      <li><a href="./patients.html">Patient</a></li>

      <li><a href="./pharmacy.html">Pharmacy</a></li>

      <li><a href="./doctors.html">Doctors </a></li>

  </nav>
  <header>
    <div class="header_container">
      <a href="./patientsList.php" style="text-decoration: none ; color: white;">Patient Form</a>
    </div>
  </header> -->

  <form name="frmContact" method="post" action="patients.php">
    <div class="patientPhp">
    <div class="phFlex">
      <label class="phLabel" for="Name">Name </label>
      <input type="text" class="form-control" name="txtName" id="txtName" placeholder="Name" value="" required>
    </div>
	<div class="phFlex">
      <label class="phLabel" for="Gender">Gender</label>
      <select name="txtGender" class="form-control" id="txtGender" placeholder="Gender" required>
		<option value="">Select</option>
		<option value="Male">Male</option>
		<option value="Female">Female</option>
		</select>
    </div>
    <div class="phFlex">
      <label class="phLabel" for="DOB">DOB</label>
      <input type="date" class="form-control" name="txtDOB" id="txtDOB" placeholder="DOB" value="" required>
    </div>
    <div class="phFlex">
      <label class="phLabel" for="phone">Phone</label>
      <input type="text" class="form-control" name="txtPhone" id="txtPhone" placeholder="Phone" value="" required>
    </div>
    <div class="phFlex">
      <label class="phLabel" for="Address">Address</label>
      <textarea name="txtAddress" class="form-control" id="txtAddress" placeholder="Address" required></textarea>
    </div>
    <div class="phFlex">
      <label class="phLabel" for="Prescription">Prescription</label>
      <textarea name="txtPrescription" class="form-control" id="txtPrescription" placeholder="Prescription"
        required></textarea>
    </div>
	
    <div class="phFlex">
      <input type="submit" name="Submit" id="Submit" value="Add Patient" class="btn btn-primary btn-lg btn-block">
		<a class="btn btn-primary btn-lg btn-block back" href="patientsList.php">Back</a>
    </div>
	
  </div>
  </form>
  </fieldset>
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