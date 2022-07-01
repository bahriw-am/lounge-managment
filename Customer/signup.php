<?php include('../partials-front/menu.php'); ?>
<?php 
        //CHeck whether food id is set or not
        if(isset($_GET['food_id']))
        {
            //Get the Food id and details of the selected food
            $food_id = $_GET['food_id'];
        }
            ?>
<?php
$fname = "";
$lname = "";
$email = "";
$sex = "";
$pass1   = "";
$pass2   = "";
$err= array(); 
$congra="";

if(isset($_POST['SIGNUP'])){
  $food_id = mysqli_real_escape_string($conn, $_POST['food_id']);
  $fname = mysqli_real_escape_string($conn, $_POST['fname']);
  $lname = mysqli_real_escape_string($conn, $_POST['lname']);
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $gender = mysqli_real_escape_string($conn, $_POST['sex']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $pass1= md5(mysqli_real_escape_string($conn, $_POST['pass1']));
  $pass2 = md5(mysqli_real_escape_string($conn, $_POST['pass2']));
  $password= (mysqli_real_escape_string($conn, $_POST['pass1']));
  $_SESSION['food_id'] =$food_id;

  //validation
  if ($pass1 != $pass2) {
    
    array_push($err, "The two passwords do not match");
    }

  if(!preg_match("/^[a-zA-Z]*$/",$fname)){
    array_push($err, "first name and last name must be alphabet");
  }
  if(!preg_match('/^[0-9]{10}+$/', $phone)) {
    array_push($err, "inValid Phone Number");
    }
    if(strlen($username)<=3){
    array_push($err, "user name must be at least 4 characer");
    }
      $upercase=preg_match('@[A-Z]@',$password);
      $lowercase=preg_match('@[a-z]@',$password);
      $number=preg_match('@[0-9]@',$password);
      $specialchar=preg_match('@[^\w]@',$password);
      if(!$upercase || !$lowercase || !$number || !$specialchar ||strlen($password)<=7){
        array_push($err, "password must be at least 8 characer and include uppercase,lowercase,number and special characters");
        }
  // if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
  //   $nameErr = "Only letters and white space allowed for name";
  //   array_push($err, $nameErr);
  // }
  // if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
  //   $nameErr = "Only letters and white space allowed for name";
  //   array_push($err, $nameErr);
  // }
    $user_check_query = "SELECT * FROM users WHERE  email='$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);

     if ($user) { // if user exists
    //   if ($user['firstname'] === $fname) {
    //     array_push($err, "user name already exist!");
       
    //   }
  
    if ($email!="" && $user['email'] == $email) {
      array_push($err, "Email already exist!");
     
     }
     if ($user['username'] == $username) {
       array_push($err, "username already exist!");
      
      }}

    
  
     // Finally, register user if there are no errors in the form
  if (count($err) == 0) {
      $query = "INSERT INTO users ( first_name, lname, email,phone,gender) 
            VALUES('$fname', '$lname','$email','$phone',  '$gender')";
      mysqli_query($conn, $query);

      $sql = "INSERT INTO tbl_admin SET 
      full_name='$fname',
      username='$username',
      password='$pass1',
      role='customer',
      status='active'
  ";

  //3. Executing Query and Saving Data into Datbase
  $res = mysqli_query($conn, $sql) or die(mysqli_error());
        //echo "You are successfully registerd! login please!";
        $congra="You are successfully registerd! login please!";
         header('location:'.SITEURL.'customer/login.php');


}}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Sign up system</title>
  <link rel="stylesheet" href="../css/signup_style.css">
</head>
<body>
<div class="box2" style="height:65%;left:50%;width:50%; margin-top: 70px;margin-left: 70px;">
    <h1>SIGN UP HERE</h1>
    <div class="err">
    <?php include('err.php'); 
    ?>
    </div>
    <?php
    echo $congra;
    ?>
    <form action="signup.php" method="post" >
    <div style="float:left;width:45%">
    <input type="text" name="food_id" id="" value="<?php echo  $food_id ?>" hidden>
      <input type="text" name="fname" id="" placeholder="Enter First name"required >
      <input type="text" name="lname" id="" placeholder="Enter Last name"required>
      <input type="text" name="username" id="" placeholder="Enter user name"required>
      <input type="email" name="email" id="" placeholder="Enter Email">
      <input type="number" name="phone" id="" placeholder="Enter phone"required>
      </div>
      <div style="float:right;width:45%">
      <input type="password" name="pass1" id="" placeholder="Enter Password"required>
      <input type="password" name="pass2" id="" placeholder="confirm Password"required>
      <label>Sex</label>
      <input type="radio" name="sex" id="" value="Male"required>Male
      <input type="radio" name="sex" id="" value="Female"required>Female
      <input type="submit" name="SIGNUP" value="SIGNUP">
      Already a member?<a href="login.php" style=" color: #ffc107;">LOGIN</a>
</div>
    </form>
  </div>
</body>
</html>