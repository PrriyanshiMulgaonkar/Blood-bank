<?php
include("./database.php");
$user = $_GET['mail'];
$pass = $_GET['pass'];
$query = "select * from hospitalregistration where emailid='$user' and password = '$pass'";
$result = mysqli_query($con, $query);
$res = mysqli_fetch_array($result);
echo("RES");
// echo($res);
session_start();
$_SESSION['name'] = $res['name'];
$_SESSION['r_id'] = $res['r_id'];
// $_SESSION['mobile'] = $res['mobile'];
header('location:./about.html');
echo $_SESSION['r_id'];
?>