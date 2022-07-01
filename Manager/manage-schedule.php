<?php include('partials/menu.php'); ?>


        <!-- Main Content Section Starts -->
        <div class="main-content">
            <div class="wrapper">
                <h1>Manage Schedule</h1>

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
                <a href="schedule.php" class="btn-primary">Add Schdule</a>

                <br /><br /><br />

                <table class="tbl-full">
                    <tr>
                        <th>S.N.</th>
                        <th>Morning(2:00am-8:00pm)</th>
                        <th>Afternoon(8:00pm-4:00pm)</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>

                    
                    <?php 
                        //Query to Get all Admin
                        $sql = "SELECT * FROM schedule";
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

                                    $casherM=$rows['casherM'];
                                    $casherA=$rows['casherA'];
                                    $waiterM=$rows['waiterM'];
                                    $waiterA=$rows['waiterA'];
                                    $baristaM=$rows['baristaM'];
                                    $baristaA=$rows['baristaA'];
                                    $kichenM=$rows['kichenM'];
                                    $kichenA=$rows['kichenA'];



                                    // $id=$rows['id'];
                                    // $full_name=$rows['full_name'];
                                    // $username=$rows['username'];
                                    // $role=$rows['role'];
                                    //Display the Values in our Table
                                    ?>
                                    <tr>
                                        <td><?php echo $sn++; ?>. </td>
                                        <td><?php echo  $casherM; ?></td>
                                        <td><?php echo $casherA ?></td>
                                        <td><?php echo "Casher"; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>manager/manage-schedule.php?id=<?php echo $id; ?>" class="btn-secondary">Update</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $sn++; ?>. </td>
                                        <td><?php echo  $baristaM; ?></td>
                                        <td><?php echo  $baristaA ?></td>
                                        <td><?php echo "Barista"; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>manager/manage-schedule.php?id=<?php echo $id; ?>" class="btn-secondary">Update</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $sn++; ?>. </td>
                                        <td><?php echo   $kichenM; ?></td>
                                        <td><?php echo  $kichenA ?></td>
                                        <td><?php echo "Kichen"; ?></td>
                                        <td>
                                          <a href="<?php echo SITEURL; ?>manager/manage-schedule.php?id=<?php echo $id; ?>" class="btn-secondary">Update</a>
                                         </td>
                                    </tr>
                                    <tr>
                                        <td><?php echo $sn++; ?>. </td>
                                        <td><?php echo  $casherM; ?></td>
                                        <td><?php echo $casherA ?></td>
                                        <td><?php echo "Casher"; ?></td>
                                        <td>
                                            <a href="<?php echo SITEURL; ?>manager/manage-schedule.php?id=<?php echo $id; ?>" class="btn-secondary">Update</a>
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
                        

                    ?>


                    
                </table>

            </div>
        </div>
        <!-- Main Content Setion Ends -->

<?php include('partials/footer.php'); ?>