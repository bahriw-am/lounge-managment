<?php include('../partials-front/menu.php'); ?>

<?php 
        //CHeck whether food id is set or not
        if(isset($_GET['food_id']))
        {
            //Get the Food id and details of the selected food
            $food_id = $_GET['food_id'];
         }
         else{
          $food_id =  $_SESSION['food_id'];
         }
    ?>
    <!-- <?php 
        //CHeck whether food id is set or not
        if(isset($_POST['food_id']))
        {
            //Get the Food id and details of the selected food
            $food_id = $_POST['food_id'];
         }
    ?> -->
<?php 

//CHeck whether the Submit Button is Clicked or NOt
if(isset($_POST['submit']))
{
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $food_id = mysqli_real_escape_string($conn, $_POST['food_id']);
   $raw_password = md5($_POST['password']);
    $password = mysqli_real_escape_string($conn, $raw_password);
    $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);

    if($count>=1)
    {
       $row = $res->fetch_assoc();
        $role=$row['role'];
        //User AVailable and Login Success
       // $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
        $_SESSION['user'] = $username; //TO check whether the user is logged in or not and logout will unset it
        $_SESSION['role'] =$role;
        $_SESSION['food_id'] =$food_id;

    //  if($role=='customer'){
      header('location:'.SITEURL.'order.php');
    //  }
    //  else {
    //    header('location:'.SITEURL.'login.php');

    //  }
    }

    else
    {
        //User not Available and Login FAil
        $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
        //REdirect to HOme Page/Dashboard
        header('location:'.SITEURL.'login.php');
    }


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Login System</title>
  <link rel="stylesheet" href="css/login_style.css">
</head>
<body>
  <div class="box">
    <h1>Login please: Food order required it! </h1>
    <div class="err">
      <!-- <?php echo $err; ?> -->
    </div>
    <form action=" " method="post" >
      <input type="text" name="food_id" id="" value="<?php echo  $food_id ?>" hidden>
      <input type="text" name="username" id="" placeholder="Enter username">
      <input type="password" name="password" id="" placeholder="Enter Password">
      <input type="submit" name="submit" value="LOGIN">
      Not yet a memeber?  <a href="<?php echo SITEURL; ?>customer/signup.php?food_id=<?php echo $food_id; ?>" class="btn btn-primary">SIGNUP</a>

      <!-- Not yet a memeber?<a href="signup.php" style=" color: #ffc107;">SIGNUP food_id=</a> -->
    </form>
  </div>
</body>
</html>