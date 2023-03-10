<?php
include('database.php');
session_start();
// $blood_id = $_SESSION['blood_id'];
$query = "SELECT * FROM add_blood_info";
$res = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Available blood sample</title>

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
      <li class=" mr-3 nav-item high"><a class=" nav-link " href="add_blood_info.html"> Add Blood
          Info</a></li>
      <li class=" mr-3 nav-item high"><a class=" nav-link bg-light text-dark" href="available_blood_sample.php">Available Blood Samples</a></li>
      <li class=" mr-4 nav-item high"><a class=" nav-link" href="view_request.php">View Requests</a></li>
      <li class=" mr-4 nav-item high"><a class=" nav-link" href="logout.php">Log out</a></li>
      <li class="nav-item dropdown ms-auto">
        <a class="nav-link dropdown-toggle text-light" href="#" role="button" aria-expanded="false">
          Blood-Bank
        </a>
      </li>
    </ul>
    <img src="./logo.png" class="rounded-circle position-absolute top-0 w-6" alt="...">
  </nav>
  <body>
    <div class="container">
        <h1 class="p-3 ">Available Blood Samples</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Blood Type</th>
                    <th>Donor info</th>
                    <th>Blood amount in ml</th>
                    <th>Hospital name</th>
                    <th>Exipry date</th>
                </tr>
            </thead>
            <tbody>
              
                <!-- Add more rows for other blood types and hospitals -->
                <?php while ($row = mysqli_fetch_array($res)) { ?>
                    <tr>
                        <td>
                            <?php echo $row['blood_group']; ?>
                        </td>
                        <td>
                            <?php echo $row['donor_info']; ?>
                        </td>
                        <td>
                            <?php echo $row['blood_amount']; ?>
                        </td>
                        <td>
                            <?php echo $row['hospital_name']; ?>
                        </td>
                        <td>
                            <?php echo $row['expiry_date']; ?>
                        </td>
                        <td>
                            <?php
                            
                             ?>
                             <form action="available_blood_sample.php" method="POST">
                                <?php } ?>
                                
                            </form>
                        </td>
                    </tr>
                <?php  ?>
            </tbody>
  
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>