<?php 

    include('../config/constants.php'); 
    include('login-check.php');

?>


<html>
    <head>
        <title>Food Order Website - Home Page</title>

        <link rel="stylesheet" href="../css/admin.css">
    </head>
    
    <body >
        <!-- Menu Section Starts -->
        <div class="menu text-center" style="background-color:#111">
            <div class="wrapper">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <!-- <li><a href="manage-accounts.php">Accounts</a></li> -->
                    <li><a href="manage-admin.php">Accounts</a></li>
                    <li><a href="database.php">Mange-Database</a></li>
                    <!-- <li><a href="manage-category.php">Category</a></li>
                    <li><a href="manage-food.php">Food</a></li>
                    <li><a href="manage-order.php">Order</a></li> -->
                    <li><a href="logout.php">Logout</a></li>
                    <li>
                        <a href="" style="color:pink;"><?php echo $_SESSION['user'].'('.$_SESSION['role'].')' ?></a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Menu Section Ends -->