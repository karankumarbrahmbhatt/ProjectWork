<?php
// database connection code
if(isset($_POST['txtName']))
{
// $con = mysqli_connect('localhost', 'database_user', 'database_password','database');
$con = mysqli_connect('localhost', 'root', '','group6_pharmacy');

// get the post records

$UserID = $_GET['GetID'];
$query = " select * from customer where idCustomer='".$UserID."'";
$result = mysqli_query($con,$query);

while($row=mysqli_fetch_assoc($result))
{
    $UserID = $row['idCustomer'];
    $UserName = $row['name'];
    $UserAdd = $row['adress'];
    $UserDob = $row['dob'];
}
?>
