<?php
include("./database.php");
$name = $_POST['name'];
$emailid = $_POST['emailid'];
$password = $_POST['password'];
$bloodgroup = $_POST['bloodgroup'];
echo"registerPage";
$query = "insert into user(name, emailid, password,bloodgroup) value('$name', '$emailid', '$password','$bloodgroup')";
    $res = mysqli_query($con, $query);
    header('location:./user_login.html');
?>