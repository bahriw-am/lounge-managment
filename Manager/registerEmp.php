<?php
include('partials/menu.php'); 
$fname = "";
$lname = "";
$email = "";
$gender = "";
$phone = "";
$role  = "";
$address   = "";
$status= ""; 
$congra="";
$err= array(); 
if(isset($_POST['SIGNUP'])){
  $fname = mysqli_real_escape_string($conn, $_POST['fname']);
  $lname = mysqli_real_escape_string($conn, $_POST['lname']);
  // $email = mysqli_real_escape_string($conn, $_POST['email']);
  $gender = mysqli_real_escape_string($conn, $_POST['sex']);
  $phone= mysqli_real_escape_string($conn, $_POST['phone']);
  $role = mysqli_real_escape_string($conn, $_POST['role']);
  $address = mysqli_real_escape_string($conn, $_POST['address']);
  $status = mysqli_real_escape_string($conn, $_POST['status']);
  

  // //validation
  // if ($pass1 != $pass2) {
    
  //   array_push($err, "The two passwords do not match");
  //   }
  
  //   $user_check_query = "SELECT * FROM users WHERE firstname='$fname' OR email='$email' LIMIT 1";
  //   $result = mysqli_query($conn, $user_check_query);
  //   $user = mysqli_fetch_assoc($result);

  //   if ($user) { // if user exists
  //     if ($user['firstname'] === $fname) {
  //       array_push($err, "user name already exist!");
       
  //     }
  
  //    else if ($user['email'] === $email) {
  //      array_push($err, "Email already exist!");
      
  //     }}

  if(!preg_match("/^[a-zA-Z]*$/",$fname)){
    array_push($err, "first name and last name must be alphabet");
  }
  if(!preg_match('/^[0-9]{10}+$/', $phone)) {
  //  echo "<center>";
  //   echo "<p style='color:red'>inValid Phone Number Must</p>";
  //   echo "</center>";
    array_push($err, "inValid Phone Number");
    }
    // if(strlen($username)<=3){
    // array_push($err, "user name must be at least 4 characer");
    // }
      // $upercase=preg_match('@[A-Z]@',$password);
      // $lowercase=preg_match('@[a-z]@',$password);
      // $number=preg_match('@[0-9]@',$password);
      // $specialchar=preg_match('@[^\w]@',$password);
      // if(!$upercase || !$lowercase || !$number || !$specialchar ||strlen($password)<=7){
      //   array_push($err, "password must be at least 8 characer and include uppercase,lowercase,number and special characters");
      //   }
  
     // Finally, register user if there are no errors in the form
   if (count($err) == 0) {
      $query = "INSERT INTO employees ( fname, lname, gender, phone, role , address , status) 
            VALUES( '$fname', '$lname', '$gender','$phone','$role','$address','$status')";
      mysqli_query($conn, $query);
      //  echo "You are successfully registerd! login please!";
         $congra="You are successfully registerd!";
}
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Registrattion system</title>
  <link rel="stylesheet" href="../css/signup_style.css">
</head>
<body>
<div class="box2" style="height:65%;left:50%;width:65%; margin-top: 40px;margin-left: 70px;padding:10px">
    <h1>Register Employee</h1>
    <div class="err">
    <?php include('../err.php'); 
    ?>
    </div>
    <?php
    echo $congra;
    ?>
    <form action="" method="post" >
    <div style="float:left;width:45%">
      <input type="text" name="fname" id="" placeholder="Enter First name"required >
      <input type="text" name="lname" id="" placeholder="Enter Last name"required>
      <input type="number" name="phone" id="" placeholder="Enter Phone"required>
      <label>Sex</label>
      <input type="radio" name="sex" id="" value="Male"required>Male
      <input type="radio" name="sex" id="" value="Female"required>Female
      <!-- <input type="email" name="email" id="" placeholder="Enter Email"required> -->
      </div>
      <div style="float:right;width:45%">
      <label>status</label>
      <input type="radio" name="status" id="" value="active"required>Acttive
      <input type="radio" name="status" id="" value="not-active"required>Not-active
      <br><label> 
        Role :
        </label> 
        <select name="role">
        <option value="Admin">Admin</option>
        <option value="Manager">Manager</option>
        <option value="Casher">Casher</option>
        <option value="Waiter">Waiter</option>
        <option value="Barista">Barista</option>
        <option value="Kichen">Kichen</option>
        </select>
             <br>
     <input type="text" name="address" id="" placeholder="Enter address"required>
     <input type="submit" name="SIGNUP" value="Regiser">
</div>
      <!-- Already a member?<a href="login.php" style=" color: #ffc107;">LOGIN</a> -->
    </form>
  </div>
</body>
</html>