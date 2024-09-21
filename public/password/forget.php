<?php require "../../database/connect.php"; ?>
<!DOCTYPE html>
<html lang="en" class="js">

<!-- Mirrored from invest.coinrave.co.uk/public/password/forget by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Sep 2022 15:48:04 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Forget Password | <?php echo $website_name ?></title>
    <link rel="shortcut icon" href="../../images/favicon.ico">
    <link rel="stylesheet" href="../assets/css/appsf488.css?ver=1.1.0">
    <!-- System Build v20210628110 @iO -->
</head>

<body class="nk-body npc-cryptlite pg-auth is-dark">
    <div class="nk-app-root">
        <div class="nk-wrap">
            <div class="nk-block nk-block-middle nk-auth-body wide-xs">
                <center><img src="../../images/<?php echo $logo_img ?>" width="150px"></center>


                <div class="card card-bordered">
                    <div class="card-inner card-inner-lg">
                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <h4 class="nk-block-title">Reset password</h4>
                                <div class="nk-block-des">
                                    <p>If you forgot your password, well, then we’ll email you instructions to reset your password.</p>
                                </div>
                            </div>
                        </div>

                        <?php
                        $db_email = $db_token = $db_token = "";
                        if (isset($_POST['submit'])) {
                            htmlspecialchars(trim($email = $_POST['email']));
                            $email = mysqli_real_escape_string($connection, $email);
                            $st_email = strtolower($email);
                            $sql = "SELECT * FROM users WHERE email = '$st_email'";
                            $result = $connection->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                $db_token = $row['token'];
                                $db_email = $row['email'];
                                $db_name = $row['full_name'];
                            }

                            if ($db_email != $st_email) {
                                echo "<script>
                            alert('Sorry the email you entered does not exists')
                          </script>";
                            } else if ($db_email == $st_email) {
                                $date = date("Y-M-d-h-i-s");

                                // send mail
                                $to = "$email";
                                $subject = "Forget Password Verification";
                                $message = "
                <div style='background: #E4E9F0'>
                <center><img src='$website_url/images/$logo_img' width='100px;'></center>
                <div style='font-family: sans-serif; padding: 10px; margin: 5px; background: white; margin: 5px 5%; border-radius: 10px;'>
                <center><img src='$website_url/images/mail.png' width='100px'></center>
                <p>Hi <b>$db_name</b></p>
                <p>Click the link below to verify and retrieve your account </p>
                <p><a href='$website_url/public/password/confirm_account?token=$db_token' style='color: dodgerblue; text-decoration: none'>$website_url/public/password/confirm_account?token=$db_token</a></p>
                <p>Thanks</p>
                <p>Support Team, - $website_name</p>
                <p><a href='$website_url' style='color: dodgerblue; text-decoration: none'>$website_url</a></p>
                <a href='$website_url' style='color: dodgerblue; text-decoration: none'>
                <button style='padding: 10px; background: dodgerblue; border: 1px solid transparent; color: white; width: 100%; border-radius: 3px'>Login Now</button></a>
                <p style='font-size: 13px'>Please consider all mails from us as confidential.</p><br>
                </div><br>
                </div>";

                                // Always set content-type when sending HTML email
                                $headers = "MIME-Version: 1.0" . "\r\n";
                                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                                // More headers
                                $headers .= "from: $website_name $website_email" . "\r\n";
                                $headers .= "Reply-To: $website_email \r\n";
                                $headers .= "Return-Path: $website_email\r\n";
                                // $headers .= "CC: $website_email\r\n";
                                $headers .= "BCC: $website_email\r\n";

                                if (mail($to, $subject, $message, $headers, "-f $website_email")) {
                                    echo "<script>
                            alert('Verification Sent. Please check your mail to retrieve your account')
                            window.location.href = '../login'
                          </script>";
                                }
                            }
                        }
                        ?>

                        <form action="" method="POST" id="forgotPassword" class="form-validate is-alter">
                            <input type="hidden" name="_token" value="nVONna1ARiu7WraNqOjAZtgOolffaicCSQPJrrbB">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <label class="form-label" for="user-email">Email<span class="text-danger"> &nbsp;*</span></label>
                                </div>
                                <div class="form-control-wrap">
                                    <input name="email" value="" type="text" class="form-control form-control-lg" id="user-email" placeholder="Enter your email address" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <button name='submit' class="btn btn-lg btn-primary btn-block">Send Reset Link
                                </button>
                            </div>
                        </form>
                        <div class="form-note-s2 text-center pt-4">
                            <a href="../login"><strong>Return to login</strong></a>
                        </div>
                    </div>
                </div>



            </div>

            <div class="nk-footer nk-auth-footer-full">
                <div class="container wide-lg">
                    <div class="row g-3">
                        <div class="col-lg-6 order-lg-last">
                            <ul class="nav nav-sm justify-content-center justify-content-lg-end">

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo $website_url?>" target="_blank">Return to Homepage</a>
                                </li>
                                



                            </ul>



                        </div>
                        <div class="col-lg-6">
                            <div class="nk-block-content text-center text-lg-left">
                                <p class="text-soft"><?php echo $website_name ?> &copy; 2024. All Rights Reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/bundle.js"></script>
    <script src="../assets/js/app.js"></script>
</body>

<!-- Mirrored from invest.coinrave.co.uk/public/password/forget by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Sep 2022 15:48:04 GMT -->

</html>