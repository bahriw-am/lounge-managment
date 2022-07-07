<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tewodros Lounge</title>
    <style>
        #contact {
            padding: 5%;
            box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
            background-color: #fff;
            margin-left: 10%;
            margin-right: 10%;
            margin-top: 2%;
            margin-bottom: 2%;
            width: 80%;
        }

        label {
            font-family: 'Times New Roman';
            font-weight: bold;
            font-size: 120%;
            color: black;
        }
         li{
            color: black;
            list-style-type: none;

        }
    </style>
</head>

<body style="background: rgb(153, 149, 149);" id="body">
    <?php
include('partials-front/menu.php');
    $info = "";
    ?>

    <div class="container-fluid">
        <hr>
        <div class="row" style="margin-left: 0.5%; margin-right: 0.5%;" id="index">
            <div class="col-lg-12 rounded bg-secondary body1" style="color: white;">

                <form class="form-horizontal" method="post">
                    <div class="row col-md-5 rounded" id="contact">
                        <fieldset style="margin-left: 10%;">
                            <div class="col-md-8" style="margin-left: 5%;width:50%;float:left">
                                <h3 class="text-center rounded">Contact</h3>

                                <?php
                                if (isset($_POST['send'])) {
                                    $sender = $_POST['email'];
                                    $message = $_POST['message'];
                                    $date = date("d-m-y");
                                    //`id`, `sender`, `message`, `date`
                                    if (!empty($message)) {
                                        if ($conn->query("INSERT INTO fedback(sender, message, date) 
                                    VALUES ('$sender','$message','$date')")) {
                                            $info = "<i style='color: green'>Your message is successfuly sent</i>";
                                        } else {
                                            print "some error occured ";
                                        }
                                    } else {
                                        $info = "Sorry ! The Message Area is Empity";
                                    }
                                }
                              //  print "$info";
                                ?>
                                <hr>
                            

                            <!-- Email input-->
                            <div class="mb-3">
                                <label class="col-md-4 control-label" for="email">Your E-mail</label>
                                <div class="col-md-8">
                                    <input name="email" type="email" placeholder="Your email" class="form-control" required>
                                </div>
                            </div>

                            <!-- Message body -->
                            <div class="mb-3">
                                <label class="col-md-3 control-label">Your message</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" name="message" placeholder="Please enter your message here..." rows="5"></textarea>
                                </div>
                            </div>

                            <!-- Form actions -->
                            <div class="mb-3">
                                <div class="col-md-8">
                                    <button type="submit" name="send" class="btn btn-primary">Submit</button>
                                </div>
                            </div> 
                            </div>
                            <div style="width:40%;float:right;">
                            
                            <br>
                          <li> <b><i> Address</i></b></li>
                            <hr>
                                <ul>
                                <li>Facbook :<a href="" style=" color: #ffc107;">www.facbook.com/tewedros_lounge</a> </li>
                                <li>Telegram :<a href="" style=" color: #ffc107;">T.me/tewodrosL</a></li>
                                <li>Tell :<a href="" style=" color: #ffc107;">0582201212</a></li>
                                <li>Website :<a href="<?php echo SITEURL; ?>" style=" color: #ffc107;">www.tewodros-lounge.org</a></li>
                            </ul>
                            </div>
                        </fieldset>
                </form>


            </div>
        </div>
    </div>
<?php include('partials-front/footer.php'); ?>

</body>

</html>