<?php include('config/constants.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Tewodros Lounge  </title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <!-- <div>
        <div class="logo">
        <img src="images/logo.png" alt="Restaurant Logo" class="img-responsive">
        </div>
        <div>mmmm</div>
        <div>mmmm</div>
    </div> -->
    <section class="navbar" style="background-color:#111">
        <div class="container" >
            <div class="logo">
               
                    <!-- <img src="images/log.jfif" alt="Restaurant Logo" class="img-responsive"> -->
           
                <b><h3 style="color:#ffffff">Tewodros Lounge</h3></b>
            </div>

            <div class="menu text-right">
           <!-- <h1 style="color:white"> Tewodros Lounge</h1> -->
                <ul>
                    <li>
                        <a href="<?php echo SITEURL; ?>">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>foods.php">Foods</a>
                    </li>
                   
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                    <li>
                        <a href="service.php">Service</a>
                    </li>
                    <li>
                        <a href="about.php">About</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL; ?>login.php">Login</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->