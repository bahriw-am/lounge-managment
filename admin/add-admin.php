<?php include('partials/menu.php');
  $err= array(); 
  $paserr=""; ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Account</h1>

        <br><br>

        <?php 
            if(isset($_SESSION['add'])) //Checking whether the SEssion is Set of Not
            {
                echo $_SESSION['add']; //Display the SEssion Message if SEt
                unset($_SESSION['add']); //Remove Session Message
            }
        ?>

        <form action="" method="POST">
        <div class="err">
    <?php include('../err.php'); 
    ?>
    </div>
            <table class="tbl-30">
                <tr>
                    <td>Full Name: </td>
                    <td>
                        <!-- <input type="text" name="full_name" placeholder="Enter Your Name"> -->
                        <select name="full_name" required> 

                            <?php 
                                //Create PHP Code to display categories from Database
                                //1. CReate SQL to get all active categories from database
                                $sql = "SELECT * FROM employees WHERE status='active' and account=0";
                                
                                //Executing qUery
                                $res = mysqli_query($conn, $sql);

                                //Count Rows to check whether we have categories or not
                                $count = mysqli_num_rows($res);

                                //IF count is greater than zero, we have categories else we donot have categories
                                if($count>0)
                                {
                                    //WE have categories
                                    while($row=mysqli_fetch_assoc($res))
                                    {
                                        //get the details of categories
                                        $id = $row['id'];
                                        $rolee = $row['role'];
                                        $full_name = $row['fname'];

                                        ?>
                                        <?php 
                                     $sqll = "SELECT * FROM tbl_admin";
                                     $ress = mysqli_query($conn, $sqll);
                                     $roww=mysqli_fetch_assoc($ress);
                                         $fullN=$roww['full_name'];
                                        if($full_name!=$fullN){ ?>
                                        <option value="<?php echo $full_name; ?>">
                                       <?php echo $full_name;}?></option>
                                     
                                       
                                        <?php 
                                    }
                                }
                                else
                                {
                                    //WE do not have category
                                    ?>
                                    <option value="0">No new Employee Found</option>
                                    <?php
                                }
                            

                                //2. Display on Drpopdown
                            ?>

                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder="Your Username" required minlength="4">
                    </td>
                </tr>

                <tr>
                    <td>Password: </td>
                    <td>
                        <input type="password" name="password" id="pass" placeholder="Your Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required minlength="8">
                        <input type="checkbox" onclick="myFunction()">Show

<script>
function myFunction() {
  var x = document.getElementById("pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script></td>
                </tr>

                <tr>
                    <td>Re-Password: </td>
                    <td>
                        <input type="password" name="repassword" id="repass" placeholder="confirm Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required minlength="8">
                        <input type="checkbox" onclick="myFunction2()">Show

<script>
function myFunction2() {
  var x = document.getElementById("repass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script> </td>
                </tr>

                <tr>
                    <td>Role: </td>
                    <td>
        <select name="role" required>
        <option value="Admin">Admin</option>
        <option value="Manager">Manager</option>
        <option value="Casher">Casher</option>
        <option value="Waiter">Waiter</option>
        <option value="Barista">Barista</option>
        <option value="Kichen">Kichen</option>
        </select> <br> 
                    </td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Account" class="btn-secondary">
                    </td>
                </tr>

            </table>

        </form>


    </div>
</div>

<?php include('partials/footer.php'); ?>


<?php 
    //Process the Value from Form and Save it in Database

    //Check whether the submit button is clicked or not

    if(isset($_POST['submit']))
    {
        // Button Clicked
        //echo "Button Clicked";
        //1. Get the Data from form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $role = $_POST['role']; 
        $password = md5($_POST['password']); //Password Encryption with MD5
        $repassword = md5($_POST['repassword']); //Password Encryption with MD5
        if ($password != $repassword) {
    
            array_push($err, "The two passwords do not match");
            }
            $pass = md5($_POST['password']); //Password Encryption with MD5
            $upercase=preg_match('@[A-Z]@',$pass);
            $lowercase=preg_match('@[a-z]@',$pass);
            $number=preg_match('@[0-9]@',$pass);
            $specialchar=preg_match('@[^\w]@',$pass);
            if(!$upercase || !$lowercase || !$number || !$specialchar){
              array_push($err, "password must be include uppercase,lowercase,number and special characters");
              $paserr="password must be include uppercase,lowercase,number and special characters";}
     if (count($err) == 0) {
        //2. SQL Query to Save the data into database
        $sql = "INSERT INTO tbl_admin SET 
            full_name='$full_name',
            username='$username',
            password='$password',
            role='$role',
            status='Yes'
        ";
 
        //3. Executing Query and Saving Data into Datbase
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
        if($res==TRUE)
        {
            //Data Inserted
            //echo "Data Inserted";
            //Create a Session Variable to Display Message
            $_SESSION['add'] = "<div class='success'>Account Added Successfully.</div>";
            $sqls="UPDATE employees set account=1 where  fname='$full_name' and role='$role'";
            $ress = mysqli_query($conn, $sqls);
            //Redirect Page to Manage Admin
            //header("location:".SITEURL.'admin/manage-admin.php');
        }}
        else
        {
            //FAiled to Insert DAta
            //echo "Faile to Insert Data";
            //Create a Session Variable to Display Message
            $_SESSION['add'] = "<div class='error'>Failed to Add Account.</div>";
            echo $paserr;
           include('../err.php');
            //Redirect Page to Add Admin
            header("location:".SITEURL.'admin/manage-admin.php');
        }

    }
    
?>