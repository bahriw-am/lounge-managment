<?php 

    include('../config/constants.php'); 
   // include('login-check.php');

?>


<html>
    <head>
        <title>Food Order Website - Home Page</title>

        <link rel="stylesheet" href="../css/admin.css">
    </head>
    
    <body>
        <!-- Menu Section Starts -->
        <div class="menu text-center" style="background-color:#111">
            <div class="wrapper">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <!-- <li><a href="manage-admin.php">Admin</a></li>
                    <li><a href="manage-category.php">Category</a></li>
                    <li><a href="manage-food.php">Food</a></li> -->
                    <li><a href="manege-employee.php">Manage_Emloyee</a></li>
                    <li><a href="manage-schedule.php">Mange-Schedule</a></li>
                    <li><a href="report.php">See-Reports</a></li>
                    <li><a href="manage-order.php">Orders</a></li>
                    <li>
                        <a href="<?php echo SITEURL; ?>manager/profile.php""><?php echo $_SESSION['user'].'('.$_SESSION['role'].')' ?></a>
                    </li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
        <!-- Menu Section Ends -->