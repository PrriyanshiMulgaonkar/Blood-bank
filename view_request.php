<?php
include('database.php');
session_start();
$r_id = $_SESSION['r_id'];
$query = "SELECT * FROM add_blood_info as a, user as b WHERE a.r_id='$r_id';";
$res = mysqli_query($con, $query);
// if (isset($_SESSION['blood_id'])) {
//     if (!$res) {
//         die('Error executing query: ' . mysqli_error($con));
//     }
// } else {
//     echo "Session variable blood_id not set.";
//     exit();
// }
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
  <script src="https://kit.fontawesome.com/8b764168a3.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">

  <!-- <link rel="stylesheet" href="./style1.css"> -->
</head>

<body>
  <nav class="navbar-default p-2" style="background-color: #0A0A0A;">
    <ul class="ms-5 nav ps-4">
      <li class="mr-3 nav-item high ms-3"><a class="nav-link " href="about.html"> Home</a></li>
      <li class=" mr-3 nav-item high"><a class=" nav-link" href="add_blood_info.html"> Add Blood
          Info</a></li>
      <li class=" mr-3 nav-item high"><a class=" nav-link" href="available_blood_sample.php">Available Blood
          Samples</a></li>
      <li class=" mr-4 nav-item high"><a class=" nav-link bg-light text-dark" href="view_request.php">View Requests</a>
      </li>
      <li class=" mr-4 nav-item high"><a class=" nav-link" href="logout.php">Log out</a></li>
      <li class="nav-item dropdown ms-auto">
        <a class="nav-link dropdown-toggle text-light" href="#" role="button" aria-expanded="false">
          Blood-Bank
        </a>
      </li>
    </ul>
    <img src="./logo.png" class="rounded-circle position-absolute top-0 w-6" alt="...">
  </nav>
  <div class="container my-4">
    <h2>View Requests</h2>
    <table class="table table-striped">
      <thead>
        <tr>

          <th>Blood Group</th>
          <th>Receiver Name</th>
          <th>Blood Amount</th>
          <th>Accept/Reject</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($row = mysqli_fetch_array($res)) { ?>
          <tr>
            <td>
              <?php echo $row['blood_group']; ?>
            </td>
            <td>
              <?php echo $row['name']; ?>
            </td>
            <td>
              <?php echo $row['blood_amount']; ?>
            </td>
            <td>

            <?php
                            if ($row['status']=='PENDING') {
                                 ?>
              <form action="./hospital_req.php" method="POST">

                <input type="hidden" name="blood_id" value="<?php echo $row['blood_id']; ?>">
                <button type="submit"class="mx-5" name="submit_button">
                  <i class="fa-solid fa-check"></i>
                </button>

                <button type="submit" class="mx-5" name="reject_button">
                  <i class="fa-solid fa-xmark"></i>
                </button>
              </form>
              <?php } else{
                echo $row['status'];
              } ?> 
            </td>

          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>

</body>

</html>