<?php
include('config/constants.php');
$id="";
$fname = "";
$lname = "";
$email = "";
$gender = "";
$phone = "";
$role  = "";
$address   = "";
$status= ""; 
$congra="";
if(isset($_POST['SIGNUP'])){
  $id = mysqli_real_escape_string($conn, $_POST['id']);
  $fname = mysqli_real_escape_string($conn, $_POST['fname']);
  $lname = mysqli_real_escape_string($conn, $_POST['lname']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $gender = mysqli_real_escape_string($conn, $_POST['sex']);
  $phone= mysqli_real_escape_string($conn, $_POST['phone']);
  $role = mysqli_real_escape_string($conn, $_POST['role']);
  $address = mysqli_real_escape_string($conn, $_POST['address']);
  $status = mysqli_real_escape_string($conn, $_POST['status']);
  

  // //validation
  if ($pass1 != $pass2) {
    
    array_push($err, "The two passwords do not match");
    }
  
    $user_check_query = "SELECT * FROM users WHERE firstname='$fname' OR email='$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
      if ($user['firstname'] === $fname) {
        array_push($err, "user name already exist!");
       
      }
  
     else if ($user['email'] === $email) {
       array_push($err, "Email already exist!");
      
      }}

    
  
     // Finally, register user if there are no errors in the form
  // if (count($err) == 0) {
      $query = "INSERT INTO employees (id, fname, lname, gender, email, phone, role , address , status) 
            VALUES('$id' , '$fname', '$lname', '$gender','$email','$phone','$role','$address','$status')";
      mysqli_query($conn, $query);
       // echo "You are successfully registerd! login please!";
         $congra="You are successfully registerd! login please!";
}
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Registrattion system</title>
  <link rel="stylesheet" href="css/signup_style.css">
</head>
<body>
  <div class="box2" style="height:100%">
    <h1>Register Employee</h1>
    <div class="err">
    <?php include('err.php'); 
    ?>
    </div>
    <?php
    echo $congra;
    ?>
    <form action="" method="post" >
    <input type="text" name="id" id="" placeholder="Enter First id"required >
      <input type="text" name="fname" id="" placeholder="Enter First name"required >
      <input type="text" name="lname" id="" placeholder="Enter Last name"required>
      <label>Sex</label>
      <input type="radio" name="sex" id="" value="Male"required>Male
      <input type="radio" name="sex" id="" value="Female"required>Female
      <input type="email" name="email" class="phone" placeholder="Enter Email"required>
      <input type="number" name="phone" id="" placeholder="Enter Phone"required>
      <label> 
        Role :
        </label> 
        <select name="role">
        <option value="Admin">Admin</option>
        <option value="Manager">Manager</option>
        <option value="Casher">Casher</option>
        <option value="Barista">Waiter</option>
        <option value="MBA">Barista</option>
        <option value="Kichen">Kichen</option>
        </select> <br>      
      <label>status</label>
      <input type="radio" name="status" id="" value="active"required>Acttive
      <input type="radio" name="status" id="" value="not-active"required>Not-active
      <input type="text" name="address" id="" placeholder="Enter address"required>
      <input type="submit" name="SIGNUP" value="SIGNUP">
      <!-- Already a member?<a href="login.php" style=" color: #ffc107;">LOGIN</a> -->
    </form>
  </div>
</body>
</html>