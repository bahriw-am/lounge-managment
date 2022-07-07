<?php include('partials/menu.php'); ?>


        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Employee</h1>

                <br />

                <?php 
                    if(isset($_SESSION['add']))
                    {
                        echo $_SESSION['add']; //Displaying Session Message
                        unset($_SESSION['add']); //REmoving Session Message
                    }

                    if(isset($_SESSION['delete']))
                    {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                    }
                    
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }

                    if(isset($_SESSION['user-not-found']))
                    {
                        echo $_SESSION['user-not-found'];
                        unset($_SESSION['user-not-found']);
                    }

                    if(isset($_SESSION['pwd-not-match']))
                    {
                        echo $_SESSION['pwd-not-match'];
                        unset($_SESSION['pwd-not-match']);
                    }

                    if(isset($_SESSION['change-pwd']))
                    {
                        echo $_SESSION['change-pwd'];
                        unset($_SESSION['change-pwd']);
                    }

                ?>
                <br><br><br>

                <!-- Button to Add Admin -->
                <a href="registerEmp.php" class="btn-primary">Add Employee</a>

                <br /><br /><br />

                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Full Name</th>
                        <th>Gender</th>
                        <!-- <th>Email</th> -->
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        &nbsp;&nbsp;&nbsp;Actions</th>
                    </tr>

                    
                    <?php 
                        //Query to Get all Admin
                        $sql = "SELECT * FROM employees ";
                        //Execute the Query
                        $res = mysqli_query($conn, $sql);

                        //CHeck whether the Query is Executed of Not
                        if($res==TRUE)
                        {
                            // Count Rows to CHeck whether we have data in database or not
                            $count = mysqli_num_rows($res); // Function to get all the rows in database

                            $sn=1; //Create a Variable and Assign the value

                            //CHeck the num of rows
                            if($count>0)
                            {
                                //WE HAve data in database
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    //Using While loop to get all the data from database.
                                    //And while loop will run as long as we have data in database

                                    //Get individual DAta
                                    $id=$rows['id'];
                                    $full_name=$rows['fname']." ". $rows['lname'];
                                    $gender=$rows['gender'];
                                    $phone=$rows['phone'];
                                   // $email=$rows['email'];
                                    $address=$rows['address'];
                                    $role=$rows['role'];
                                    $status=$rows['status'];
                                    //Display the Values in our Table
                                    ?>
                                    <!-- <?php if($role!='customer'){ ?> -->
                                    <tr>
                                        <td><?php echo $sn++; ?>. </td>
                                        <td><?php echo $full_name; ?></td>
                                        <td><?php echo $gender; ?></td>
                                        <!-- <td><?php echo $email; ?></td> -->
                                        <td><?php echo $phone; ?></td>
                                        <td><?php echo $address; ?></td>
                                        <td><?php echo $role; ?></td>
                                        <td><?php echo $status; ?></td>
                                        <td>
                                            <!-- <a href="" class="btn-secondary">Update Account</a> -->
                                            <a href="<?php echo SITEURL; ?>manager/delete-admin.php?id=<?php echo $id; ?>" class="btn-danger"> <?php 
                                               
                                               if($status=="active")
                                               {
                                                   echo "<label>De-Activate</label>";
                                               }
                                               elseif($status=="de-active")
                                               {
                                                   echo "<label >Activate</label>";
                                               }?></a>
                                            <!-- <a href="" class="btn-danger">Deactivate</a> -->
                                        </td>
                                    </tr>

                                    <?php
                                    }
                                }
                            }
                            else
                            {
                                //We Do not Have Data in Database
                            }
                        }

                    ?>


                    
                </table>

            </div>
        </div>
        <!-- Main Content Setion Ends -->

<?php include('partials/footer.php'); ?>