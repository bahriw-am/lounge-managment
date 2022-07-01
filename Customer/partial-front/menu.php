<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tewodros Lounge</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body >
    <!-- Navbar Section Starts Here -->
    <section class="navbar" style="background-color: #111">
        <div class="container">
        <!-- <?php echo 'welcome'. $_SESSION['user'].$_SESSION['role']?> -->
            <div class="logo">
                <!-- <a href="#" title="Logo">
                    <img src="images/logo.png" alt="Restaurant Logo" class="img-responsive">
                </a> -->
                <b><h3 style="color:white">Tewodros Lounge</h3></b>
            </div>
            <?php 
            $not=0;
            $user=$_SESSION['user'];
            $r1=$conn->query("SELECT * FROM `tbl_order` WHERE `status`='Delivered' and `customer_name`='$user'");
            $not=$r1->num_rows;
            $r11=$conn->query("SELECT * FROM `tbl_order` WHERE `status`='Delivering' and `customer_name`='$user'");
            $nott=$r11->num_rows;
        ?>
            <div class="menu text-right">
                <div class="menubar" style="width:100%">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>customer/">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>customer/categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>customer/foods.php">Food-Menu</a>
                    </li>
                   
                    <li>
                        <a href="#">Contact</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>customer/give_comment.php">Comment</a>
                    </li>
                    <?php if($not>0){?>
                    <li><a href="notfication.php">Notfication<sup style="color:red"><?php {
                        echo $not;
                    }?></sup></a></li>  <?php } ?>               
                    <li>
                    <?php if($nott>0){?>
                    <li><a href="notfication1.php">Delivery_Notfication<sup style="color:red"><?php {
                        echo $nott;
                    }?></sup></a></li>  <?php } ?>               
                    <li>
                        <a href="<?php echo SITEURL; ?>Logout.php">Logout</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>customer/profile.php""><?php echo $_SESSION['user'].'('.$_SESSION['role'].')' ?></a>
                    </li>
                </ul>
                </div>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->