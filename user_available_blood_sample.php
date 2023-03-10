<?php
include('database.php');
session_start();
$userss= $_SESSION["user_id"];
$query="SELECT * FROM add_blood_info";
$res = mysqli_query($con, $query);
$query1="SELECT * FROM add_blood_info WHERE user_id='{$_SESSION['user_id']}'";
$res1 = mysqli_query($con, $query1);
$result = mysqli_fetch_array($res1);
// echo $result;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <nav class="navbar-default p-2" style="background-color: #0A0A0A;">
        <ul class="ms-5 nav ps-4">
            <li class="mr-3 nav-item high ms-3"><a class="nav-link " href="user_home.html"> Home</a></li>
            <li class=" mr-3 nav-item high"><a class=" nav-link bg-light text-dark "
                    href="user_available_blood_sample.php"> Available Blood Samples</a></li>
            <li class=" mr-3 nav-item high"><a class=" nav-link" href="user_about_us.html">About Us</a></li>
            <li class=" mr-4 nav-item high"><a class=" nav-link" href="user_contactUs.html">Contact Us</a></li>
            <li class=" mr-4 nav-item high"><a class=" nav-link" href="logout.php">Log out</a></li>
            <li class="nav-item dropdown ms-auto">
                <a class="nav-link dropdown-toggle text-light" href="#" role="button" aria-expanded="false">
                    Blood-Bank
                </a>

            </li>
        </ul>
        <img src="./logo.png" class="rounded-circle position-absolute top-0 w-6" alt="...">
    </nav>

    <div class="container">
        <h1 class="p-3 ">Available Blood Samples</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Blood Type</th>
                    <th>Hospital</th>
                    <th>Blood amount in ml</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                <!-- <tr>
                    <td>A+</td>
                    <td>ABC Hospital</td>
                    <td>
                        <form action="request.php" method="POST">
                            <input type="hidden" name="blood_id" value="1">
                            <button type="submit" class="btn btn-primary">Request</button>
                        </form>
                    </td>
                </tr> -->
                <?php while ($row = mysqli_fetch_array($res)) { ?>
                    <tr>
                        <td>
                            <?php echo $row['blood_group']; ?>
                        </td>
                        <td>
                            <?php echo $row['hospital_name']; ?>
                        </td>
                        <td>
                            <?php echo $row['blood_amount']; ?>
                        </td>
                        <td>
                            <?php
                            if (!isset($_SESSION['user_id'])) {

                                 ?>
                                    <form action="user_login.html">
                                    <?php } else{
                             ?>
                             <form action="./requesting.php" method="POST">
                                <?php } ?>
                                <input type="hidden" name="blood_id" value="<?php echo $row['blood_id']; ?>">
                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>">
                                <?php
                                if(!($result['user_id'] == $userss)){ ?>
                                <button type="submit" class="btn btn-danger">Request</button>
                                <?php } else{ echo $result['status'];}?>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

</body>

</html>
<?php mysqli_close($con); ?>