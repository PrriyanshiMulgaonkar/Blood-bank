<?php
include("./database.php");
$name = $_POST['name'];
$emailid = $_POST['emailid'];
$address = $_POST['address'];
$pass = $_POST['password'];
echo"registerPage";
$query = "insert into hospitalRegistration(name, emailid, address, password) value('$name', '$emailid', '$address', '$pass')";
    $res = mysqli_query($con, $query);
    header('location:./about.html');
?>