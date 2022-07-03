<!DOCTYPE html>
<html lang="en">
<head>
  
  <title>Sign up system</title>
  <link rel="stylesheet" href="../css/signup_style.css">
</head>
<body>
<?php include('partials/menu.php'); ?>
<?php
$err= array(); 
$congra="";

if(isset($_POST['SIGNUP'])){
  $account = mysqli_real_escape_string($conn, $_POST['account']);
  $pincode = mysqli_real_escape_string($conn, $_POST['pincode']);
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $diposit = mysqli_real_escape_string($conn, $_POST['diposit']);

  //validation

    $user_check_query = "SELECT * FROM bank";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);

     if ($user) { 
       // if user exists
      if ($user['account_no'] === $account) {
        array_push($err, "Account already exist!");
       
      }
     // Finally, register user if there are no errors in the form
  if (count($err) == 0) {
      $query = "INSERT INTO bank ( user, account_no, pincode,diposit) 
            VALUES('$username', '$account','$pincode','$diposit')";
      mysqli_query($conn, $query);


  //3. Executing Query and Saving Data into Datbase
  $res = mysqli_query($conn, $query) or die(mysqli_error());
        //echo "You are successfully registerd! login please!";
        $congra="You are successfully registerd! account Info!";
}}
}
?>


  <div class="box2" style="height:65%;left:45%;width:50%; margin-top:1%;margin-left: 70px;padding: 10px;">
    <h1>SIGN UP Here</h1>
    <div class="err">
    <?php include('../err.php'); 
    ?>
    </div>
    <?php
    echo $congra;
    ?>
    <form action="#" method="post" >
      <input type="text" name="username" id="" placeholder="Enter user name"required minlength="4">
      <input type="number" name="account" id="" placeholder="Enter Account Nimber" required min="0">
      <input type="number" name="pincode" id="" placeholder="Enter Pin code"required  min="0">
      <input type="number" name="diposit" id="" placeholder="Enter diposit Amount"required  min="0">
      <input type="submit" name="SIGNUP" value="Save">

    </form>
  </div>
</body>
</html>