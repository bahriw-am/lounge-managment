<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>View Comments</h1>

                <br /><br /><br />
                <br><br>

                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>User_Name</th>
                        <th>Comment</th>
                    </tr>

                    <?php 
                        //Get all the orders from database
                        $sql = "SELECT * FROM Comment "; // DIsplay the Latest Order at First
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
                                // $id = $row['id'];
                                $sql="UPDATE comment set status='seen'";
                                $ress = mysqli_query($conn, $sql);
                                $user = $row['user_name'];
                                $comment = $row['comment'];
                                
                                ?>

                                    <tr>
                                        <td><?php echo $sn++; ?>. </td>
                                        <td><?php echo $user; ?></td>
                                        <td><?php echo $comment; ?></td>

                                       
                                    </tr>

                                <?php

                            }
                        }
                        else
                        {
                            //Order not Available
                            echo "<tr><td colspan='12' class='error'>comment not Available</td></tr>";
                        }
                    ?>

 
                </table>
    </div>
    
</div>
<div style="margin-bottom:0px;">
<?php include('partials/footer.php'); ?>
                    </div>