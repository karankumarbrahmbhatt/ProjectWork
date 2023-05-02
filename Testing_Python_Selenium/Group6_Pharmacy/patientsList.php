<?php 

    $con = mysqli_connect('localhost', 'root', '','group6_pharmacy');
    $query = " select * from patients ";
    $result = mysqli_query($con,$query);


// database insert SQL code

// insert in database 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Patient records</title>
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
      <h1 id="homepage-title"><a href="./index.php">BlueCross Doctor Form</a></h1>
    </header>
    <nav>
      <ul>
		<li><a href="./index.php">Home</a></li>
        <li><a href="./patientsList.php">Patient</a></li>

      </ul>
    </nav>
  </div>
    <br>
    <div>
        <a href="./patients.html" class="button">Add Patient</a>
    </div>

    <br>
    <br>
    <table>
        <tr>
            <th> ID </th>
            <th> Name </th>
            <th> Address </th>
            <th> Birth Date </th>
            <th> Phone </th>
            <th> Prescription </th>
            <th> View </th>
            <th> Edit </th>
            <th> Delete </th>
        </tr>

        <?php 
                                    
        while($row=mysqli_fetch_assoc($result))
          {
            $PID = $row['idPatients'];
            $PNAME = $row['Patient_Name'];
            $PADD = $row['Patients_Address'];
            $PPHONE = $row['Patients_ContactNumber'];
            $PDOB= $row['Patients_DOB'];
            $PPRES = $row['Patients_Prescription'];
          ?>
        <tr>
            <td><?php echo $PID ?></td>
            <td><?php echo $PNAME ?></td>
            <td><?php echo $PADD ?></td>
            
            <td><?php echo $PDOB ?></td>
			<td><?php echo $PPHONE ?></td>
            <td><?php echo $PPRES ?></td>
            <td><a class="EditButton" href="viewpatients.php?GetID=<?php echo $PID ?>">View</a></td>
            <td><a class="EditButton" href="editpatients.php?GetID=<?php echo $PID ?>">Edit</a></td>
            <td><a class="DeleteButton" id="<?php echo $PID ?>" href="deletepatients.php?Del=<?php echo $PID ?>">Delete</a></td>
        </tr>
        <?php 
           }  
          ?>
    </table>

    <br>
    <br>
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