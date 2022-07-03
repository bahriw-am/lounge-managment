<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..//style/css/bootstrap.min.css">
    <link rel="stylesheet" href="..//style/css/style.css">
    <script type="text/javascript" src="..//style/JS/jquery-1.4.2.min.js"></script>
    <title>Account Creating Form</title>
</head>

<?php include('partials/menu.php');
 $err= array(); 
  ?>

<body style="background-color: gray;">
    <?php
    // include("..//menu.php");
    ?>
    <div class="container-fluid">
        <hr>
        <div class="row" style="margin-left: 0.5%; margin-right: 0.5%;">

            <?php
            // include("..//r_side_menu.php")
            ?>

            <div class="col-lg-9 bg-secondary rounded" id="body">
                <?php
                $unerror = $passerror = $info = "";
                if (isset($_POST['add'])) {

                    $user_name = $_POST['user_name'];
                   // $full_name = $_POST['full_name'];
                    $id = $_POST['id'];
                    $role = $_POST['role'];
                    $password = $_POST['password'];
                    $re_password = $_POST['re_password'];

                    $upercase=preg_match('@[A-Z]@',$password);
                    $lowercase=preg_match('@[a-z]@',$password);
                    $number=preg_match('@[0-9]@',$password);
                    $specialchar=preg_match('@[^\w]@',$password);
                    if(!$upercase || !$lowercase || !$number || !$specialchar ||strlen($password)<=7){
                      array_push($err, "password must be include uppercase,lowercase,number and special characters");
                      }
                    $unerror = chickString($user_name);

                    $passerror = chickMuch($password, $re_password);

                    $info = $passerror;

                    if ($unerror == "" && $passerror == "") {
                        $password = base64_encode($password);
                        //`username`, `password`, `role`, `user_id`
                        if (($conn->query("INSERT INTO account (`id`, `user_name`,`password`, `role`) VALUES 
                        ('$id','$user_name','$password','$role')")) 

                            // ($conn->query("UPDATE `teacher` SET `role`='$role',`acc`='created' WHERE id = '$m_id'"))&&
                            // ($conn->query("UPDATE `student` SET `acc`='created' WHERE id = '$m_id'"))
                        ) {
                            $info = "<i style='color: green'>User Account is Created</i>";
                        } else {
                            $info = "<i style='color: red'>Smoe Error occoured" . $conn->error . "</i>";
                        }
                    }
                }

                function  chickString($data)
                {
                    if (!preg_match("/^[a-zA-Z- 0-9]*$/", $data)) {
                        return " <i style='color: red'>Invaild  user name </i>";
                    } else {
                        return "";
                    }
                }
                function  chickMuch($data, $data2)
                {
                    if ($data == $data2) {
                        return  "";
                    } else {
                        return "<i style='color: red'>Password is no much</i>";
                    }
                }

                ?>

                <hr>
                <h3 class="rounded">
                    Account Creating Form</h3>
                <div id="inform">
                    <i><?php print $info ?></i>
                </div>
                <hr>

                <div id="re_form">
                <form action="" method="post" >
     <input type="text" name="id" id="" placeholder=" id"required >
      <input type="text" name="user_name" id="" placeholder="Enter user name"required>
     <input type="password" name="password"  placeholder="Enter password"required minlength="8">
      <input type="password" name="re_password" id="" placeholder="Enter password again"required minlength="8">
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
  <input type="submit" name="add" value="Add">
      <!-- Already a member?<a href="login.php" style=" color: #ffc107;">LOGIN</a> -->
    </form>
                </div>

                <hr>

            </div>
        </div>
    </div>
    <!-- <?php include("..//footer.php") ?> -->
    <script src="..//style/js/bootstrap.bundle.min.js"></script>
</body>

</html>