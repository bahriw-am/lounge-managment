<?php include('partials-front/menu.php'); ?>

<?php 
$err= array(); 
//CHeck whether the Submit Button is Clicked or NOt
if(isset($_POST['submit']))
{
    //Process for Login
    //1. Get the Data from Login form
    // $username = $_POST['username'];
    // $password = md5($_POST['password']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
   // $role = mysqli_real_escape_string($conn, $_POST['role']);
    
   $raw_password = md5($_POST['password']);
    //$raw_password = base64_encode($_POST['password']);
    $password = mysqli_real_escape_string($conn, $raw_password);

    //2. SQL to check whether the user with username and password exists or not
    $sql = "SELECT * FROM tbl_admin WHERE username='$username' AND password='$password' and status='active'";
   // $sql = "SELECT * FROM account WHERE user_name='$username' AND password='$password' AND role='$role'";

    //3. Execute the Query
    $res = mysqli_query($conn, $sql);

    //4. COunt rows to check whether the user exists or not
    $count = mysqli_num_rows($res);

    if($count>=1)
    {
       $row = $res->fetch_assoc();
        $role=$row['role'];
        //User AVailable and Login Success
        $_SESSION['login'] = "<div class='success'>Login Successful.</div>";
        $_SESSION['user'] = $username; //TO check whether the user is logged in or not and logout will unset it
        $_SESSION['role'] =$role;
        if( $role=='Manager'){
        //REdirect to HOme Page/Dashboard
      
        header('location:'.SITEURL.'manager/');
       }
     elseif($role=='Admin'){
      header('location:'.SITEURL.'admin/');
     }
     elseif($role=='Casher'){
      header('location:'.SITEURL.'casher/');
     }
     elseif($role=='Waiter'){
      header('location:'.SITEURL.'waiter/');
     }
     elseif($role=='Barista'){
      header('location:'.SITEURL.'barista/');
     }
     elseif($role=='Kichen'){
      header('location:'.SITEURL.'kichen/');
     }
     elseif($role=='customer'){
      header('location:'.SITEURL.'customer/');
     }
     else {
       header('location:'.SITEURL.'login.php');

     }
    }

    else
    {
        //User not Available and Login FAil
       // $_SESSION['login'] = "<div class='error text-center'>Username or Password did not match.</div>";
        //REdirect to HOme Page/Dashboard
        array_push($err, "Username or Password did not match.!");
       // header('location:'.SITEURL.'login.php');
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
    <h1>Login Here</h1>
    <div class="err">
    <?php include('err.php'); ?>
    </div>
    <form action="" method="post" >
      <input type="text" name="username" id="" placeholder="Enter username">
      <input type="password" name="password" id="" placeholder="Enter Password">
        <input type="submit" name="submit" value="LOGIN">
        <a href="forgot_password.php" style=" color: #ffc107;">Forgot Password</a>
     <br/> Not yet a memeber?<a href="signup.php" style=" color: #ffc107;">SIGNUP</a>
    </form>
  </div>
</body>
</html>