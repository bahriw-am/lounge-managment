<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Manage Order</h1>

                <br /><br /><br />

                <?php 
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                ?>
                <br><br>

                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Food</th>
                        <th>Price</th>
                        <th>Qty.</th>
                        <th>Total</th>
                        <th>Order Date</th>
                        <th>Status</th>
                        <th>Customer Name</th>
                        <th>Contact</th>
                        <!-- <th>Email</th>
                        <th>Address</th> -->
                        <th>Actions</th>
                    </tr>

                    <?php 
                        //Get all the orders from database
                        $sql = "SELECT * FROM tbl_order where status='On Delivery' ORDER BY id DESC"; // DIsplay the Latest Order at First
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
                                $price = $row['price'];
                                $qty = $row['qty'];
                                $total = $row['total'];
                                $order_date = $row['order_date'];
                                $status = $row['status'];
                                $customer_name = $row['customer_name'];
                                $customer_contact = $row['customer_contact'];
                                // $customer_email = $row['customer_email'];
                                // $customer_address = $row['customer_address'];
                                // $sql="UPDATE tbl_order set status='Delivering' where status='On Delivery'";
                                // $ress = mysqli_query($conn, $sql);
                               // $catagory_id=$row['category_id'];
                                $sqll = "SELECT category_id FROM tbl_food where title='$food'";
                                $resss = mysqli_query($conn, $sqll);
                                $roww=mysqli_fetch_assoc($resss);
                                $catagory_id=$roww['category_id'];
                                $sqlll = "SELECT title FROM tbl_category where id='$catagory_id'";
                                $re = mysqli_query($conn, $sqlll);
                                $rowww=mysqli_fetch_assoc($re);
                                    $catagory_name=$rowww['title'];
                                    if($catagory_name!='drinking'){
                                ?>

                                    <tr>
                                        <td><?php echo $sn++; ?>. </td>
                                        <td><?php echo $food; ?></td>
                                        <td><?php echo $price; ?></td>
                                        <td><?php echo $qty; ?></td>
                                        <td><?php echo $total; ?></td>
                                        <td><?php echo $order_date; ?></td>

                                        <td>
                                            <?php 
                                                // Ordered, On Delivery, Delivered, Cancelled

                                               
                                                    echo $status;
                                            ?>
                                        </td>

                                        <td><?php echo $customer_name; ?></td>
                                        <td><?php echo $customer_contact; ?></td>
                                        <!-- <td><?php echo $customer_email; ?></td>
                                        <td><?php echo $customer_address; ?></td> -->
                                        <td>
                                            <a href="<?php echo SITEURL; ?>kichen/update-order.php?id=<?php echo $id; ?>" class="btn-secondary">Update Order Status</a>
                                        </td>
                                    </tr>

                                <?php
                                    
                            }}
                        }
                        else
                        {
                            //Order not Available
                            echo "<tr><td colspan='12' class='error'> New Orders not Available</td></tr>";
                        }
                    ?>

 
                </table>
    </div>
    
</div>

<?php include('partials/footer.php'); ?>