<?php
session_start();
require "../database/connect.php"
?>
<!DOCTYPE html>
<html lang="en" class="js">

<!-- Mirrored from invest.coinrave.co.uk/public/login by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Sep 2022 15:46:28 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login | <?php echo $website_name ?></title>
    <link rel="shortcut icon" href="../images/favicon.ico">
    <link rel="stylesheet" href="assets/css/appsf488.css?ver=1.1.0">
    <!-- System Build v20210628110 @iO -->
</head>

<body class="nk-body npc-cryptlite pg-auth is-dark">
    <div class="nk-app-root">
        <div class="nk-wrap">
            <div class="nk-block nk-block-middle nk-auth-body wide-xs">

                <div class="brand-logo text-center mb-2 pb-4"><a class="logo-link" href="index"><img class="logo-img logo-light logo-img-lg" src='../images/<?php echo $logo_img ?>' alt="Coinrave"></a></div>

                <div class="card card-bordered">
                    <div class="card-inner card-inner-lg">
                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <h4 class="nk-block-title">Verify Your Email Address</h4>
                                <div class="nk-block-des mt-2">
                                </div>
                            </div>
                        </div>
                        <p>A verification link has been sent to:</p>
                        <p style='font-size: 11px; margin: 0'>Please remember to also check your spam or junk folder and unspam our messages so you can always get our message on your inbox</p>
                        <h4><?php
                            if (isset($_SESSION['email'])) {
                                echo $_SESSION['email'];
                            }
                            ?>
                        </h4>
                        <p>Please click the button in the message to confirm your email address or type in your Email to receive a new activation code.</p>

                        <?php
                        // $db_email = $db_name = ""; 
                        // if (isset($_POST['submit'])) {
                        //     $email = strtolower(htmlspecialchars(trim($_POST['email'])));
                        //     $sql = "SELECT * FROM users WHERE email = '$email'";
                        //     $result = $connection->query($sql);
                        //     while ($row = $result->fetch_assoc()) {
                        //         $db_email = $row['email'];
                        //         $db_name = $row['full_name'];
                        //         $db_token = $row['token'];
                        //     }

                        //     if ($email == $db_email) {
                        //         $date = date("Y-M-d-h-i-s");

                        //         // send mail
                        //         $to = "$db_email";
                        //         $subject = "Registration Info {$date}";
                        //         $message = "
                        //         <div style='background: #E4E9F0'>
                        //         <center><img src='$website_url/images/$logo_img' width='100px;'></center>
                        //         <div style='font-family: sans-serif; padding: 10px; margin: 5px; background: white; margin: 5px 5%; border-radius: 10px;'>
                        //         <center><img src='$website_url/images/mail.png' width='100px'></center>
                        //         <p>Hi <b>$db_name</b></p>
                        //         <p>Welcome to $website_name</p>
                        //         <p>Your login information:</p>
                        //         <p>Login Email: $email</p>
                        //         <p style='text-align: center; font-size: 25px;'><b>$db_token</b></p>
                        //         <p>Click on the link below to verify your account</p>
                        //         <p><a href='$website_url/public/verify' style='color: dodgerblue; text-decoration: none'>Verify Account...</a></p>                    
                        //         <p>Thanks</p>
                        //         <p>Support Team, - $website_name</p>
                        //         <p><a href='$website_url' style='color: dodgerblue; text-decoration: none'>$website_url</a></p>
                        //         <a href='$website_url' style='color: dodgerblue; text-decoration: none'>
                        //         <p style='font-size: 13px'>Please consider all mails from us as confidential.</p><br>
                        //         </div><br>
                        //         </div>";

                        //         // Always set content-type when sending HTML email
                        //         $headers = "MIME-Version: 1.0" . "\r\n";
                        //         $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                        //         // More headers
                        //         $headers .= "rom: $website_email" . "\r\n";
                        //         $headers .= "Reply-To: $website_email \r\n";
                        //         $headers .= "Return-Path: $website_email\r\n";
                        //         // $headers .= "CC: $website_email\r\n";
                        //         $headers .= "BCC: $website_email\r\n";

                        //         if (mail($to,$subject,$message,$headers,"-f $website_email")){
                        //             echo "<script>
                        //                 alert('Verification code sent successfully')
                        //                 // window.location.href = 'mail_verification'                                            
                        //                 window.location.href = 'https://brandstez.com/elite_mail/mail_verification.php?email=$db_email&url=$website_url&logo=$logo_img&db_name=$db_name&web_name=$website_name&token=$db_token'
                        //             </script>";
                        //         }else {
                        //             echo "<script>
                        //             alert('Sorry an error occurred. Please try again later')
                        //             window.location.href = 'mail_verification'
                        //         </script>";

                        //         }

                        //     }else {
                        //         echo "<script>
                        //                 alert('Sorry the email your entered does not exists')
                        //             </script>";
                        //     }

                        // }
                        ?>
                        <form action="" method="post">
                            <div class="form-control-wrap">
                                <input type="email" id="email-address" name="email" class="form-control form-control-lg" autocomplete="off" data-msg-email="Enter a valid email." placeholder="Re-enter your email address" data-msg-required="Required." required>
                            </div><br>
                            <button type='submit' name='submit' class="btn btn-lg btn-primary btn-block">Resend Email</button>
                        </form>
                        <div class="form-note-s2 text-center pt-4"> New on our platform? <a href="register"><strong>Create an account</strong></a>
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
                                    <a class="nav-link" href="index" target="_blank">Return to
                                        Homepage</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="page/privacy-policy">Privacy Policy</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <div class="nk-block-content text-center text-lg-left">
                                <p class="text-soft"><?php echo $website_name ?> &copy; 2022. All Rights Reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p id="error" style='display: none'><?php echo $error ?></p>

    <script src="assets/js/bundle.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        var error = document.getElementById('error');

        if (error.textContent == 'empty') {
            swal("ERROR!", "Input's cannot be empty!", "warning");
        } else if (error.textContent == "success") {
            swal("SUCCESS!", "Access Granted", "success");
            setTimeout(() => {
                window.location.href = '../dashboard/index'
            }, 3000);
        } else if (error.textContent == "error") {
            swal("ERROR!", "Incorrect E-mail address or Password", "warning");
        }
    </script>
     <!-- Begin of Chaport Live Chat code -->
  <script type="text/javascript">
    (function(w, d, v3) {
      w.chaportConfig = {
        appId: '66e77bd87319957c7904ac5f'
      };

      if (w.chaport) return;
      v3 = w.chaport = {};
      v3._q = [];
      v3._l = {};
      v3.q = function() {
        v3._q.push(arguments)
      };
      v3.on = function(e, fn) {
        if (!v3._l[e]) v3._l[e] = [];
        v3._l[e].push(fn)
      };
      var s = d.createElement('script');
      s.type = 'text/javascript';
      s.async = true;
      s.src = 'https://app.chaport.com/javascripts/insert.js';
      var ss = d.getElementsByTagName('script')[0];
      ss.parentNode.insertBefore(s, ss)
    })(window, document);
  </script>
  <!-- End of Chaport Live Chat code -->

</body>

<!-- Mirrored from invest.coinrave.co.uk/public/login by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Sep 2022 15:46:45 GMT -->

</html>