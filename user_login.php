<?php
include("./database.php");
$user = $_GET['mail'];
$pass = $_GET['pass'];
$query = "select * from user where emailid='$user' and password = '$pass'";
$result = mysqli_query($con, $query);
$res = mysqli_fetch_array($result);
echo("RES");
// echo($res);
session_start();
$_SESSION['bloodgroup'] = $res['bloodgroup'];
$_SESSION['user_id'] = $res['u_id'];
header('location:./user_home.html');

// session_start();
// $res = loginuser($_GET);
// $name = $res['name'];
// $user_id = $res['userid'];
// $_SESSION['username'] = $name;
// $_SESSION['user_id'] = $user_id;
?>