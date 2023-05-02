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
            <h1 id="homepage-title">BlueCross Doctor's Form</h1>
        </header>
        <nav>
            <ul>
                <li><a href="./index.php">Home</a></li>
                <li><a href="./patientsList.php">Patient</a></li>

            </ul>
        </nav>
    </div>

    <div class="pageH">
    <div class="patientPhp">
        
        <div class="phFlex">
          <label class="" for="Patient" style="font-size: 18px;">Patient</label>
		  <a class="btn btn-primary btn-lg btn-block btn" href="patientsList.php">Patient List</a>
		  <a class="btn btn-primary btn-lg btn-block btn ml-50" href="addpatient.php">Patient Add</a>
        </div>
		<div class="phFlex">
          <label class="" for="Patient" style="font-size: 18px;">Pharmacy</label>
		  <a class="btn btn-primary btn-lg btn-block btn" href="pharmacy.html">Add Pharmacy</a>

        </div>
		<div class="phFlex">
          <label class="" for="Patient" style="font-size: 18px;">Doctor</label>
		  <a class="btn btn-primary btn-lg btn-block btn" href="doctors.html">Add Doctor</a>

        </div>
        
        <div class="phFlex"
          <input  type="submit" name="Submit" id="Submit" value="Click me to add Doctor"
            class="btn btn-primary btn-lg btn-block">
        </div>
      </div>
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
