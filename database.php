<?php
$con = mysqli_connect('localhost', 'root', '', 'bloodbank') or die("connection failed");

function loginuser($array)
{
    global $con;

    $user = $array['mail'];
    $pass = $array['password'];
    $query = "select * from users where email='$user' and password = '$pass'";
    $result = mysqli_query($con, $query);
    $res = mysqli_fetch_array($result);
    return $res;
}
?>