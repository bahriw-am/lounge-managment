<?php include('partials/menu.php'); ?>

<?php 
    //CHeck whether id is set or not 
    if(isset($_GET['id']))
    {
        //Get all the details
        $id = $_GET['id'];

        //SQL Query to Get the Selected Food
         $sql = "SELECT * FROM employees WHERE id='$id'";

        $res2 = mysqli_query($conn, $sql);

        // //Get the value based on query executed
         $row2 = mysqli_fetch_assoc($res2);

         $active = $row2['status'];
       
         if($active=='active'){
            $sql2 = "UPDATE employees SET 
            status = 'de-active'
            WHERE id=$id
        ";
        }
        elseif($active=='de-active'){
            $sql2 = "UPDATE tbl_food SET 
            active = 'active'
            WHERE id=$id
        ";
        }

      
         $res = mysqli_query($conn, $sql2);
         $_SESSION['update'] = "<div class='error'> Employee update successfully.</div>";
        header('location:'.SITEURL.'manager/manege-employee.php');

    }
    else
    {
        //Redirect to Manage Food
        header('location:'.SITEURL.'manager/manage-employee.php');
    }
?>
<?php include('partials/footer.php'); ?>