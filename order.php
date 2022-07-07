
<?php include('customer/partial-front/menu.php'); ?>

    <?php 
        //CHeck whether food id is set or not

            //Get the Food id and details of the selected food
            $food_id = $_SESSION['food_id'];

            //Get the DEtails of the SElected Food
            $sql = "SELECT * FROM tbl_food WHERE id=$food_id";
            //Execute the Query
            $res = mysqli_query($conn, $sql);
            //Count the rows
            $count = mysqli_num_rows($res);
            //CHeck whether the data is available or not
            if($count==1)
            {
                //WE Have DAta
                //GEt the Data from Database
                $row = mysqli_fetch_assoc($res);

                $title = $row['title'];
                $price = $row['price'];
                $image_name = $row['image_name'];
            }
            else
            {
                //Food not Availabe
                //REdirect to Home Page
              //  header('location:'.SITEURL);
            }
        
    ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method="POST" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                        <?php 
                        
                            //CHeck whether the image is available or not
                            if($image_name=="")
                            {
                                //Image not Availabe
                                echo "<div class='error'>Image not Available.</div>";
                            }
                            else
                            {
                                //Image is Available
                                ?>
                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" class="img-responsive img-curve">
                                <?php
                            }
                        
                        ?>
                        
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title; ?></h3>
                        <input type="hidden" name="food" value="<?php echo $title; ?>">

                        <p class="food-price"><?php echo $price; ?> birr</p>
                        <input type="hidden" name="price" value="<?php echo $price; ?>">

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required min="1">
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <?php $user=$_SESSION['user'];?>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" value="<?php echo $user ?>" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="number" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" min="0" required pattern="[0-9]{10}" title="Phone must be 10 in length" minlength="10">

                    <div class="order-label">Account_No</div>
                    <input type="number" name="account" placeholder="bank account" class="input-responsive" min="0" required>

                    <div class="order-label">Pincode</div>
                    <input type="number" name="pincode" placeholder="pin" class="input-responsive"min="0" required>

                   
                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

            <?php 
                 $err= array(); 
                $user=$_SESSION['user'];
                //CHeck whether submit button is clicked or not
                if(isset($_POST['submit']))
                {
                    // Get all the details from the form

                    $food = $_POST['food'];
                    $price = $_POST['price'];
                    $qty = $_POST['qty'];

                    $total = $price * $qty; // total = price x qty 

                    $order_date = date("Y-m-d h:i:sa"); //Order DAte

                    $status = "Ordered";  // Ordered, On Delivery, Delivered, Cancelled

                    $customer_name = $_POST['full-name'];
                    $customer_contact = $_POST['contact'];
                    $customer_account = $_POST['account'];
                    $account_pincode = $_POST['pincode'];
                    if(!preg_match('/^[0-9]{10}+$/',  $customer_contact)) {
                        //  echo "<center>";
                        //   echo "<p style='color:red'>inValid Phone Number Must</p>";
                        //   echo "</center>";
                          array_push($err, "inValid Phone Number");
                          }
                    // $customer_email = $_POST['email'];
                    // $customer_address = $_POST['address'];

                    if (count($err) == 0) {
                    $sql = "SELECT * FROM bank WHERE account_no=$customer_account AND pincode=$account_pincode";
                    //Execute the Query
                    $res = mysqli_query($conn, $sql);
                    $count = mysqli_num_rows($res);
                    //CHeck whether the data is available or not
                    if($count==1)
                    {
                        //WE Have DAta
                        //GEt the Data from Database
                        $row = mysqli_fetch_assoc($res);
        
                        $diposit = $row['diposit'];
                        if($diposit >= $total){
                            //Save the Order in Databaase
                            //Create SQL to save the data

                            $sql2 = "INSERT INTO tbl_order SET 
                                food = '$food',
                                price = $price,
                                qty = $qty,
                                total = $total,
                                order_date = '$order_date',
                                status = '$status',
                                customer_name = '$customer_name',
                                customer_contact = '$customer_contact'
                            ";

                            //echo $sql2; die();

                            //Execute the Query
                            $res2 = mysqli_query($conn, $sql2);

                            //Check whether query executed successfully or not
                            if($res2==true)
                            {
                                 //Query Executed and Order Saved
                                $message="<script> alert('Food Ordered Successfully');</script>";
                                echo $message;
                              //  $_SESSION['order'] = "<div class='success text-center'>Food Ordered Successfully.</div>";
                                $sql="UPDATE bank set diposit=diposit-$total WHERE account_no=$customer_account";
                                $res = mysqli_query($conn, $sql);
                                $sql1="UPDATE bank set diposit=diposit+$total WHERE account_no=1000222";
                                $ress = mysqli_query($conn, $sql1);
                                $message="<script> alert('Food Ordered Successfully');</script>";
                                $user_check_query = "SELECT diposit FROM bank WHERE account_no=$customer_account AND pincode=$account_pincode";
                                $result = mysqli_query($conn, $user_check_query);
                                $diposit = mysqli_fetch_assoc($result);
                                $deposit= $diposit['diposit'];
                                $balance= "your current balance is ".$deposit;
                                $message2="<script> alert(' $balance'+' Birr');</script>";
                                echo $message.$message2;
                              //  header('location:'.SITEURL);
                            }}
                            else
                            {
                                //Failed to Save Order
                                $message="<script> alert('Failed to Order Food');</script>";
                                echo $message;
                              //  $_SESSION['order'] = "<div class='error text-center'>Failed to Order Food.</div>";
                              //  header('location:'.SITEURL);
                            }  
                        }
                        else
                        {
                            //Failed to Save Order
                            $message="<script> alert('you have no suficient ballance');</script>";
                            echo $message;
                         //   $_SESSION['order'] = "<div class='error text-center'>you have no suficient ballance.</div>";
                         //  header('location:'.SITEURL);
                        }
                    }
                    else
                    {
                        //Failed to Save Order
                        $message="<script> alert('accouunt number doesn't exist.');</script>";
                        echo $message;
                        $_SESSION['order'] = "<div class='error text-center'>accouunt number doesn't exist.</div>";
                      //  header('location:'.SITEURL);
                    }

                }
            
            ?>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <?php include('partials-front/footer.php'); ?>