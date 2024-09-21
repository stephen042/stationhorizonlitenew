<?php require "../../database/connect.php"; ?>
<!DOCTYPE html>
<html lang="en" class="js">

<!-- Mirrored from invest.coinrave.co.uk/public/password/forget by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Sep 2022 15:48:04 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Reset Password | <?php echo $website_name?></title>
    <link rel="shortcut icon" href="../../images/favicon.ico">
    <link rel="stylesheet" href="../assets/css/appsf488.css?ver=1.1.0">
	<!-- System Build v20210628110 @iO -->
</head>
<body class="nk-body npc-cryptlite pg-auth is-dark">
<div class="nk-app-root">
    <div class="nk-wrap">
        <div class="nk-block nk-block-middle nk-auth-body wide-xs">
        <center><img src="../../images/<?php echo $logo_img?>" width="150px"></center>


            <div class="card card-bordered">
    <div class="card-inner card-inner-lg">
        <div class="nk-block-head">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">Reset password</h4>
                <div class="nk-block-des">
                    <!-- <p>If you forgot your password, well, then we’ll email you instructions to reset your password.</p> -->
                </div>
            </div>
        </div>

        <?php 
            if (isset($_GET['token'])) {
                $the_token = $_GET['token'];
            }

            $db_token = "";
            if (isset($_POST['submit'])) {
                htmlspecialchars(trim($password = $_POST['password']));
                $password = mysqli_real_escape_string($connection, $password);
               $st_password = strtolower($password);

               $db_sql = "SELECT * FROM users WHERE token  = '$the_token'";
               $db_result = $connection->query($db_sql);
               while ($row = $db_result->fetch_assoc()) {
                    $db_token = $row['token'];
                }
                if ($db_token == $the_token) {
                     if (strlen($st_password) <= 5) {
                            echo "<script>
                                    alert('Password cannot be less than 6')
                                </script>";
                    }else {
                        $character = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                        $randomString = '';
                        for ($i=0; $i < 15; $i++) { 
                            $index = rand(0, strlen($character) -1);
                            $randomString .=$character[$index];
                        }
                        $randomString;
                
                        $sql = "UPDATE users SET password = '$st_password', token = '$randomString'  WHERE token = '$the_token'";
                        if ($connection->query($sql)===TRUE) {
                            echo "<script>
                                    alert('Password Reset Status: Success')
                                    window.location.href = '../login'
                                </script>";
                        }else {
                            echo "<script>
                            alert('Sorry an error occurred');
                            window.location.href = '../login'
                        </script>";
                        }
                    }
                }else {
                    echo "<script>
                    alert('Sorry an error occurred');
                    window.location.href = '../login'
                </script>";
                }
            }

        ?>

                <form action="" method="POST" id="forgotPassword" class="form-validate is-alter">
            <input type="hidden" name="_token" value="nVONna1ARiu7WraNqOjAZtgOolffaicCSQPJrrbB">          
              <div class="form-group">
                <div class="form-label-group">
                    <label class="form-label" for="user-email">Enter New Password<span class="text-danger"> &nbsp;*</span></label>
                </div>
                <div class="form-control-wrap">
                    <input name="password" value="" type="text" class="form-control form-control-lg" id="user-email" placeholder="Enter your email address" required>
                </div>
            </div>
            
                        <div class="form-group">
                <button name='submit' class="btn btn-lg btn-primary btn-block">Reset
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
			<a class="nav-link" href="../index" target="_blank">Return to Homepage</a>
		</li>
								<li class="nav-item">
			<a class="nav-link" href="../page/privacy-policy">Privacy Policy</a>
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
<script src="../assets/js/bundle.js"></script>
<script src="../assets/js/app.js"></script>
</body>

<!-- Mirrored from invest.coinrave.co.uk/public/password/forget by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Sep 2022 15:48:04 GMT -->
</html>