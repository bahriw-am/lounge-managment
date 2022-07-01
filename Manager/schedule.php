<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Schedule</h1>

        <br><br>

        <?php 
            if(isset($_SESSION['add'])) //Checking whether the SEssion is Set of Not
            {
                echo $_SESSION['add']; //Display the SEssion Message if SEt
                unset($_SESSION['add']); //Remove Session Message
            }
        ?>

        <form action="" method="POST">

            <table class="tbl-30">
                <tr>
                    <td>Casher: </td>
                    <td>
                        <input type="text" name="casher_morning" placeholder="casher_morning">
                    </td>                    
                    <td>
                        <input type="text" name="casher_afternoon" placeholder="casher_afternoon">
                    </td>
                </tr>

                <tr>
                    <td>Waiter: </td>
                    <td>
                        <input type="text" name="waiter_morning" placeholder="waiter_morning">
                    </td>
                    <td>
                        <input type="text" name="waiter_afternoon" placeholder="waiter_afternoon">
                    </td>
                </tr>

                 <tr>
                    <td>Barista: </td>
                    <td>
                        <input type="text" name="barista_morning" placeholder="barista_morning">
                    </td>
                    <td>
                        <input type="text" name="barista_afternoon" placeholder="barista_afternoon">
                    </td>
                </tr>
                 <tr>
                    <td>Kichen: </td>
                    <td>
                        <input type="text" name="kichen_morning" placeholder="kichen_morning">
                    </td>
                    <td>
                        <input type="text" name="kichen_afternoon" placeholder="kichen_afternoon">
                    </td>
                </tr>
                <!-- <tr>
                    <td>Role: </td>
                    <td>
        <select name="role">
        <option value="Admin">Admin</option>
        <option value="Manager">Manager</option>
        <option value="Casher">Casher</option>
        <option value="Waiter">Waiter</option>
        <option value="Barista">Barista</option>
        <option value="Kichen">Kichen</option>
        </select> <br> 
                    </td>
                </tr> -->

                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Schedule" class="btn-secondary">
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
        $casherM= $_POST['casher_morning'];
        $casherA = $_POST['casher_afternoon'];
        $waiterM= $_POST['waiter_morning'];
        $waiterA = $_POST['waiter_afternoon'];
        $baristaM= $_POST['barista_morning'];
        $baristaA = $_POST['barista_afternoon'];
        $kichenM= $_POST['kichen_morning'];
        $kichenA= $_POST['kichen_afternoon'];
        // $role = $_POST['role']; 
        // $password = md5($_POST['password']); //Password Encryption with MD5

        //2. SQL Query to Save the data into database
        $sql = "INSERT INTO schedule SET 
           casherM='$casherM',
           casherA='$casherA',
           waiterM='$waiterM',
           waiterA='$waiterA',
           baristaM='$baristaM',
           baristaA='$baristaA',
           kichenM='$kichenM',
           kichenA='$kichenA'
        ";
 
        //3. Executing Query and Saving Data into Datbase
        $res = mysqli_query($conn, $sql) or die(mysqli_error());

        //4. Check whether the (Query is Executed) data is inserted or not and display appropriate message
        if($res==TRUE)
        {
            //Data Inserted
            //echo "Data Inserted";
            //Create a Session Variable to Display Message
            $_SESSION['add'] = "<div class='success'>Scheduled Successfully.</div>";
            //Redirect Page to Manage Admin
            header("location:".SITEURL.'manager/schedule.php');
        }
        else
        {
            //FAiled to Insert DAta
            //echo "Faile to Insert Data";
            //Create a Session Variable to Display Message
            $_SESSION['add'] = "<div class='error'>Failed to Add Admin.</div>";
            //Redirect Page to Add Admin
            header("location:".SITEURL.'manager/schedule.php');
        }

    }
    
?>