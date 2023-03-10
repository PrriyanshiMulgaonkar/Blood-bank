<?php
// echo "aagya";
include('database.php');
session_start();
$name = $_SESSION['username'];
$user_id = $_SESSION['user_id'];
// echo "name is : ".$name;
$query = "select * from history WHERE user_id = $user_id";
$res = mysqli_query($con, $query);

?>
<!-- select a.post_id, a.apply_date, n.paper_name, p.type, n.price from apply_for a, post p, newspaper n WHERE a.post_id = p.post_id AND p.paper_name = n.paper_name; -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css_styles/home_page.css">
    <style>
        .user {
            position: relative;
            display: inline-block;
        }

        #ui {
            width: 20px;
            height: 20px;
            margin-right: 0;
        }

        .user_menu {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 80px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            padding: 5px;
            z-index: 2;
            text-align: center;
        }

        .user:hover .user_menu {
            display: block;
        }

        .user_menu a {
            text-decoration: none;
            color: black;
            margin-top: 10px;
        }

        .his_note {
            /* margin: 0;
            padding: 0; */
            background-color: #0F149F;
            color: white;
            width: 100%;
            height: 200px;
            text-align: center;
            align-items: center;
            justify-content: center;
        }

        .his_note p {
            margin-top: 10px;
            padding: 5px;
        }

        .his_tbl {
            background-color: #9EC7EC;
            width: 100%;
            /* height: 200px; */
            text-align: center;
            align-items: center;
            justify-content: center;
            padding-bottom: 20px;
        }

        table {
            /* margin-top: 20px; */
            border: 2px solid black;
        }

        table,
        th,
        td {
            border: 1px Solid black;
            text-align: center;
        }
    </style>
</head>

<body>
    <section class="nav_bar">
        <div class="logo">
            <img src="../images/logo.png" alt="news.net">
        </div>
        <div class="button">
            <a href="logged_home.php"><button class="btn">Home</button></a>
            <a href="help.html"><button class="btn">Help</button></a>
            <img src="../images/user.png" alt="user" id="ui">
            <div class="user">
                <button class="btn"><?php echo $name; ?></button>
                <div class="user_menu">
                    <a href="history.html">My History</a><br>
                    <hr>
                    <hr>
                    <a href="../php/delete.php">Delete Account</a>
                    <hr>
                    <hr>
                    <a href="../php/logout.php">Log Out</a>
                    <hr>
                    <hr>
                </div>
            </div>
        </div>
    </section>

    <section class="his_note">
        <div>
            <b>
                <p style="font-size: 30px;">Your Order History</p>
            </b>
            <p style="font-size: 15px;">Find Your Order History Below in the Page</p>
        </div>
    </section>

    <section class="his_tbl">
        <center>
            <br><br>
            <div>
                <table align="center">
                    <tr>
                        <th>Post Id</th>
                        <th>Apply Date</th>
                        <th>Paper Name</th>
                        <th>Post Category</th>
                        <th>Amount</th>
                        <th>Approval Status</th>
                        <!-- <th>Pay Now</th> -->
                    </tr>
                    <tr>
                        <?php

                        while ($arr = mysqli_fetch_array($res)) {
                        ?>
                    <tr>
                        <td><?php echo $arr['post_id'] ?></td>
                        <td><?php echo $arr['apply_date'] ?></td>
                        <td><?php echo $arr['paper_name']; ?></td>
                        <td><?php echo $arr['type']; ?></td>
                        <td><?php echo $arr['price']; ?></td>
                        <td><?php echo $arr['approval_status']; ?></td>
                    </tr>
                <?php
                        }
                ?>
                </tr>
                </table>
            </div>
        </center>
    </section>
    <section class="footer">
        <center>
            <b>
                <p style="font-size: 20px;">Follow us</h3>
            </b><br>
            <a href="www.facebook.com"><img src="../images/facebook.png" alt="facebook"></a>
            <a href="www.instagram.com"><img src="../images/instagram.png" alt="instagram"></a>
            <a href="www.twitter.com"><img src="../images/twitter.png" alt="twitter"></a>
            <br>
            <em>
                <p style="font-size: 10px;">COPYRIGHT © 2021 NEWS.NET - ALL RIGHTS RESERVED</p>
            </em>
        </center>
    </section>

</body>

</html>