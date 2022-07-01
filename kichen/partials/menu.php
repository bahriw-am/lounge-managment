<?php 

    include('../config/constants.php'); 
    include('login-check.php');

?>


<html>
    <head>
        <title>Food Order Website - Casher Page</title>

        <link rel="stylesheet" href="../css/admin.css">
    </head>
    
    <body>
        <?php 
            $not=0;
            $r1=$conn->query("SELECT * FROM `tbl_order` WHERE `status`='On Delivery'");
            $not=$r1->num_rows;
            $notc=0;
            $r=$conn->query("SELECT * FROM `comment`  WHERE `status`='new'");
            $notc=$r->num_rows;
        ?>
        <!-- Menu Section Starts -->
        <div class="menu text-center" style="background-color:#111">
            <div class="wrapper">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <!-- <li><a href="manage-category.php">Category</a></li> -->
                    <li><a href="manage-food.php">Food</a></li>
                    <li><a href="manage-order.php">Orders<sup style="color:red"><?php if($not>0){
                        echo $not;
                    }?></sup></a></li>
                    <li><a href="comments.php">Comments<sup style="color:red"><?php if($notc>0){
                        echo $notc;
                    }?></sup></a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>kichen/profile.php""><?php echo $_SESSION['user'].'('.$_SESSION['role'].')' ?></a>
                    </li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
        <!-- Menu Section Ends -->