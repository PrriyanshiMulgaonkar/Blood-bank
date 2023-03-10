<?php
include("./database.php");

    $blood = $_POST['blood_id'];
    $user = $_POST['user_id'];

    $query = "UPDATE add_blood_info SET user_id = '$user' WHERE blood_id='$blood'";



$result = mysqli_query($con, $query);
header('location:./user_available_blood_sample.php');

?>