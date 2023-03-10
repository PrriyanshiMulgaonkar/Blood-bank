<?php
include("./database.php");
session_start();
$r_id=$_SESSION['r_id'];
$blood_group = $_POST['blood_group'];
$blood_amount = $_POST['blood_amount'];
$expiry_date = $_POST['expiry_date'];
$donor_info = $_POST['donor_info'];
$hospital_name = $_POST['Hospital_name'];
echo"register blood info";
$query = "insert into add_blood_info(blood_group, blood_amount, expiry_date,donor_info,hospital_name,r_id) value('$blood_group', '$blood_amount', '$expiry_date','$donor_info','$hospital_name','$r_id')";
    $res = mysqli_query($con, $query);
    header('location:./about.html');
?>