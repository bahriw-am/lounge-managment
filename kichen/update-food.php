<?php include('partials/menu.php'); ?>

<?php 
    //CHeck whether id is set or not 
    if(isset($_GET['id']))
    {
        //Get all the details
        $id = $_GET['id'];

        //SQL Query to Get the Selected Food
         $sql = "SELECT * FROM tbl_food WHERE id=$id";

        $res2 = mysqli_query($conn, $sql);

        // //Get the value based on query executed
         $row2 = mysqli_fetch_assoc($res2);

         $active = $row2['active'];
       
         if($active=='Yes'){
            $sql2 = "UPDATE tbl_food SET 
            active = 'No'
            WHERE id=$id
        ";
        }
        elseif($active=='No'){
            $sql2 = "UPDATE tbl_food SET 
            active = 'Yes'
            WHERE id=$id
        ";
        }

      
         $res = mysqli_query($conn, $sql2);
         $_SESSION['update'] = "<div class='error'> Food updated successfully.</div>";
        header('location:'.SITEURL.'kichen/manage-food.php');

    }
    else
    {
        //Redirect to Manage Food
        header('location:'.SITEURL.'kichen/manage-food.php');
    }
?>
<?php include('partials/footer.php'); ?>