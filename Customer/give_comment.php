<?php include('partial-front/menu.php');?>
<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search">
    <div class="container">
        
        <h2 class="text-center text-white">Fill this form to confirm your comment.</h2>
        <form action="" method="POST" class="order">
                
            <fieldset>
                <legend>Comment Details</legend>
                <div class="order-label">User Name</div>
                <input type="text" name="full-name" value="<?php echo $_SESSION['user'];?> " class="input-responsive" required>

                <div class="order-label">Comment</div>
                <textarea name="comment" rows="10" placeholder="please give a comment here " class="input-responsive" required></textarea>

                <input type="submit" name="submit" value="Confirm comment" class="btn btn-primary">
            </fieldset>

        </form>

        <?php 

            //CHeck whether submit button is clicked or not
            if(isset($_POST['submit']))
            {
                // Get all the details from the form

                $user =  $_SESSION['user'];
                $comment = $_POST['comment'];

                $sql2 = "INSERT INTO comment SET 
                    user_name = '$user',
                    comment = '$comment',
                    status='new'
                ";

                //echo $sql2; die();

                //Execute the Query
                $res2 = mysqli_query($conn, $sql2);
                $message="<script> alert('commented Successfully thanks for visiting');</script>";

                //Check whether query executed successfully or not
                if($res2==true)
                {
                   //$good='<h1>  commented Successfully thanks for visiting';
                    //Query Executed and Order Saved
               $message="<script> alert('success text-center'>commented Successfully thanks for visiting');</script>";
                    echo '<h1>  commented Successfully thanks for visiting';
                   // $_SESSION['order'] = "<div class='success text-center'>commented Successfully thanks for visiting.</div>";
                   //header('location:'.SITEURL);
                }
                else
                {
                    //Failed to Save Order
                    $_SESSION['order'] = "<div class='error text-center'>Failed comment.</div>";
                    header('location:'.SITEURL);
                }

            }
        
        ?>

    </div>
</section>
<!-- fOOD sEARCH Section Ends Here -->

<?php include('partial-front/footer.php'); ?>