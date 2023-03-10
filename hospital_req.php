<?php
include("./database.php");
if (isset($_POST['submit_button'])) {
    // Perform actions for submit button
    $user = $_POST['blood_id'];
    // $user1 = $_POST['user_id'];
    // $pass = $_GET['pass'];
    $query = "UPDATE add_blood_info SET status = 'accept' WHERE blood_id='$user'";
} elseif (isset($_POST['reject_button'])) {
    // Perform actions for reject button
    $user = $_POST['blood_id'];
    // $pass = $_GET['pass'];
    $query = "UPDATE add_blood_info SET status = 'reject' WHERE blood_id='$user'";
}


$result = mysqli_query($con, $query);
header('location:./view_request.php');

?>