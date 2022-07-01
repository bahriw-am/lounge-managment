<?php include('partial-front/menu.php'); ?>
<?php
                    $user=$_SESSION['user'];
                    $sql="SELECT * FROM tbl_order WHERE status='Delivered' and customer_name='$user'";
                        //Execute Query
                        $res = mysqli_query($conn, $sql);
                        //Count the Rows
                        $count = mysqli_num_rows($res);

                        $sn = 1; //Create a Serial Number and set its initail value as 1

                        if($count>0)
                        {
                            //Order Available
                            while($row=mysqli_fetch_assoc($res))
                            {
                                //Get all the order details
                                $id = $row['id'];
                                $food = $row['food'];
                                $customer_name = $row['customer_name'];
                            }
                        echo "<h1 style='color:green'> <br><br><br><br><br><br><center> Dear  ". $customer_name. " your ".  $food ."  enjoy your meal! </center> </h1>";
                                 $sql="UPDATE tbl_order set status='taken' where status='Delivered'";
                                $ress = mysqli_query($conn, $sql);
                        }
?>