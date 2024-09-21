<?php 
    require "../database/connect.php";
        // verify account
    if (isset($_POST['submit'])) {
        $the_token = $_POST['token'];
        $sql = "SELECT * FROM users WHERE token = '$the_token'";
        $result = $connection->query($sql);
        while ($row = $result->fetch_assoc()) {
            $db_name = $row['full_name'];
            $db_id = $row['user_id'];
            $db_status = $row['status'];
            $db_token = $row['token'];
            
        }    

        if ($db_status == "pending") {
            $u_sql = "UPDATE users SET status = 'active' WHERE user_id = '$db_id'";
            if ($connection->query($u_sql)===TRUE) {
                $character = '0123401234567895678901234567890123456789';
                $randomString = '';
                for ($i=0; $i < 8; $i++) { 
                    $index = rand(0, strlen($character) -1);
                    $randomString .=$character[$index];
                }
                $randomString;
        
                $sql = "UPDATE users SET  token = '$randomString'  WHERE user_id = '$db_id'";
                if ($connection->query($sql)===TRUE) {}
                echo "<script>
                        alert('Dear $db_name, your account has been verified. ');
                        window.location.href = 'login'
                    </script>";
            }else {
                echo "<script>
                        alert('Invalid Verification Code. Please try again ');
                        // window.location.href = 'login'
                    </script>";
        
            }    
        }else if ($db_status == "active") {
            echo "<script>
                    alert('Sorry your account has already been verified. Login now... ');
                    window.location.href = 'login'
                </script>";
        } else {
            echo "<script>
                    alert('Invalid Verification Code. Please try again ');
                    // window.location.href = 'login'
                </script>";
    
        }

    }
    // verify account end

?>

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
    <title>Login | <?php echo $website_name?></title>
    <link rel="shortcut icon" href="../images/favicon.ico">
    <link rel="stylesheet" href="assets/css/appsf488.css?ver=1.1.0">
    <!-- System Build v20210628110 @iO -->
</head>

<body class="nk-body npc-cryptlite pg-auth is-dark">
    <div class="nk-app-root">
        <div class="nk-wrap">
            <div class="nk-block nk-block-middle nk-auth-body wide-xs">

                <div class="brand-logo text-center mb-2 pb-4"><a class="logo-link"
                        href="index"><img class="logo-img logo-light logo-img-lg" src='../images/<?php echo $logo_img?>'
                    alt="Coinrave"></a></div>

                <div class="card card-bordered">
                    <div class="card-inner card-inner-lg">
                        <div class="nk-block-head">
                            <div class="nk-block-head-content">
                                <h4 class="nk-block-title text-center">Verification Panel</h4>
                                <div class="nk-block-des mt-2">
                                </div>
                            </div>
                        </div>
                        <!-- <p class='text-center'>Enter your six (6) digit verification code <i class="ion-disc"></i></p> -->
 
                        <form action="" method="post">
                        <div class="form-control-wrap">
                            <input type="text"  name="token" class="form-control form-control-lg text-center" autocomplete="off" placeholder="Enter verification code: 123456" data-msg-required="Required." required>
                        </div><br>
                            <button type='submit' name='submit' class="btn btn-lg btn-primary btn-block">Verify Now</button>
                        </form>
                        <div class="form-note-s2 text-center pt-4"> New on our platform? <a
                                href="register"><strong>Create an account</strong></a>
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
                                <p class="text-soft"><?php echo $website_name?> &copy; 2022. All Rights Reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <p id="error" style='display: none'><?php echo $error?></p>

    <script src="assets/js/bundle.js"></script>
    <script src="assets/js/app.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    var error = document.getElementById('error');

    if (error.textContent == 'empty') {
         swal("ERROR!", "Input's cannot be empty!", "warning");
    }else if (error.textContent == "success") {
        swal("SUCCESS!", "Access Granted", "success");        
        setTimeout(() => {
            window.location.href = '../dashboard/index'
        }, 3000);
    }else if (error.textContent == "error") {
        swal("ERROR!", "Incorrect E-mail address or Password", "warning");        
    }

</script>

</body>

<!-- Mirrored from invest.coinrave.co.uk/public/login by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Sep 2022 15:46:45 GMT -->

</html>