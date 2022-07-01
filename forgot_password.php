<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/signup_style.css">
    <title>Tewodros Lounge</title>
</head>
<?php
include('partials-front/menu.php');
?>

<body style="background-color: gray;">
    ?>
    <div class="box2" style="height:65%;left:45%;width:50%; margin-top: 70px;margin-left: 70px;padding: 10px;">
        <b>
            
        </b>
        <div class="row" style="margin-left: 0.5%; margin-right: 0.5%;">

            <?php
            $info = "";
            $err= array(); 

            ?>
            <div class="col-lg-12" id="body">
                <?php
                $unerror = $passerror = "";
                if (isset($_POST['save'])) {

                    $user_name = $_POST['user_name'];
                    $password = $_POST['password'];
                    $re_password = $_POST['r_password'];

                    $upercase=preg_match('@[A-Z]@',$password);
                    $lowercase=preg_match('@[a-z]@',$password);
                    $number=preg_match('@[0-9]@',$password);
                    $specialchar=preg_match('@[^\w]@',$password);
                    if(!$upercase || !$lowercase || !$number || !$specialchar ||strlen($password)<=7){
                      array_push($err, "password must be include uppercase,lowercase,number and special characters");
                      }

                    $passerror = chickMuch($password, $re_password);

                    $info = $passerror;

                    $sql_query = "SELECT * FROM tbl_admin WHERE username = '$user_name'";

                    $result = $conn->query($sql_query);

                    if ($result->num_rows > 0) {
                        if ($info == "" && $passerror == "" && count($err) == 0) {

                            $password = md5($password);

                            if ($conn->query("UPDATE `tbl_admin` SET  `password`= '$password'
                                     WHERE `username` = '$user_name'")) {
                                $info = "<h5 style='color: blue;'>You are successfully reset your password now you can <a href='login.php'><b>login</b></a>!!</h5>";
                                $_SESSION['no_login_message']=$info;
                            } else {
                                $info = "<i style='color: red'>Some Errors occured. please try again</i>";
                            }
                            
                        }
                    } else {
                        $info = "<i  style='color: red' >You Enterd Inavalid User Name !!</i>";
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

                <form class="row g-4" method="post">
                    <div class="row col-md-8 rounded" id="login">

                        <h3 class="text-center rounded">Forgot password</h3>
                        <div class="err">
    <?php include('err.php'); 
    ?>
    </div>
                        <hr>
                        <?php print $info; ?>

                        <div class="mb-3">
                            <label for="" class="form-label">Pleae Enter User Name *</label>
                            <input type="text" class="form-control" name="user_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Enter New Password *</label>
                            <input type="password" minlength="8" class="form-control" name="password" required>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Re Enter New Password *</label>
                            <input type="password"  minlength="8" class="form-control" name="r_password" required>
                        </div>
                        <div>
                         <div class="col-6" >
                            <button type="submit" name="save" style="width: 40%; float:left" class="btn btn-primary">Save</button>
                        </div>
                        <div class="col-6">
                            <button type="reset" style="width: 40%;float:right" class="btn btn-danger">Clear</button>
                        </div> 
                        </div>
                      
                </form>
            </div>
        </div>
        <hr>
    </div>
</body>

</html>