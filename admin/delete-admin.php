<?php 

    // //Include constants.php file here
    // include('../config/constants.php');

    // // 1. get the ID of Admin to be deleted
    // $id = $_GET['id'];

    // //2. Create SQL Query to Delete Admin
    // $sql = "DELETE FROM tbl_admin WHERE id=$id";

    // //Execute the Query
    // $res = mysqli_query($conn, $sql);

    // // Check whether the query executed successfully or not
    // if($res==true)
    // {
    //     //Query Executed Successully and Admin Deleted
    //     //echo "Admin Deleted";
    //     //Create SEssion Variable to Display Message
    //     $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully.</div>";
    //     //Redirect to Manage Admin Page
    //     header('location:'.SITEURL.'admin/manage-admin.php');
    // }
    // else
    // {
    //     //Failed to Delete Admin
    //     //echo "Failed to Delete Admin";

    //     $_SESSION['delete'] = "<div class='error'>Failed to Delete Admin. Try Again Later.</div>";
    //     header('location:'.SITEURL.'admin/manage-admin.php');
    // }

    // //3. Redirect to Manage Admin page with message (success/error)

?>
<?php include('partials/menu.php'); ?>

<?php 
    //CHeck whether id is set or not 
    if(isset($_GET['id']))
    {
        //Get all the details
        $id = $_GET['id'];

        //SQL Query to Get the Selected Food
         $sql = "SELECT * FROM tbl_admin WHERE id='$id'";

        $res2 = mysqli_query($conn, $sql);

        // //Get the value based on query executed
         $row2 = mysqli_fetch_assoc($res2);

         $status = $row2['status'];
       
         if($status=='active'){
            $sql2 = "UPDATE tbl_admin SET 
            status = 'de-active'
            WHERE id=$id
        ";
        }
        else
            $sql2 = "UPDATE tbl_admin SET 
            status = 'active'
            WHERE id=$id
        ";
        
    $res = mysqli_query($conn, $sql2);
         $_SESSION['update'] = "<div class='error'> Account update successfully.</div>";
        header('location:'.SITEURL.'admin/manage-admin.php');

    }
    else
    {
        $_SESSION['update'] = "<div class='error'> Account update faild.</div>";
        //Redirect to Manage Food
        header('location:'.SITEURL.'admin/manage-admin.php');
    }
?>
<?php include('partials/footer.php'); ?>