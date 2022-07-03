<?php include('partials/menu.php'); ?>
<html>
    <head>

    </head>

    <body>
        <div class="col-4 text-center">
                    
                    <?php 
                        //Creat SQL Query to Get Total Revenue Generated
                        //Aggregate Function in SQL
                        $sql = "SELECT diposit FROM bank WHERE account_no=1000222";

                        //Execute the Query
                        $res = mysqli_query($conn, $sql);

                        //Get the VAlue
                        $row = mysqli_fetch_assoc($res);
                        
                        //GEt the Total REvenue
                        $total_revenue = $row['diposit'];

                    ?>

                    <h1><?php echo $total_revenue; ?> birr</h1>
                    <br />
                   Total Deposit
                </div>
                <div class="main-content">

    
</div>
    </body>
</html>

