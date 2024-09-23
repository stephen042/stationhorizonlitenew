<?php 
session_start();
require "../database/connect.php"; 
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
                                <h4 class="nk-block-title">Login into Account</h4>
                                <div class="nk-block-des mt-2">
                                    <p>Sign in into your account using your email and passcode.</p>
                                </div>
                            </div>
                        </div>

                        <?php include "../database/login_script.php" ?>
                        <form action="" autocomplete="off" method="POST" id="loginForm" class="form-validate is-alter">
                            <input type="hidden" name="_token" value="nVONna1ARiu7WraNqOjAZtgOolffaicCSQPJrrbB">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <label class="form-label" for="username">Email Address <span class="text-danger">*</span></label>
                                </div>
                                <div class="form-control-wrap">
                                    <input name="email" type="email" autocomplete="new-email" class="form-control form-control-lg" id="username" placeholder="Enter your email address" autocomplete="off" data-msg-email="Enter a valid email." data-msg-required="Required." required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <label class="form-label" for="passcode">Password <span class="text-danger">*</span></label>
                                </div>
                                <div class="form-control-wrap">
                                    <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch" data-target="passcode">
                                        <em class="passcode-icon icon-show icon ni ni-eye-off"></em>
                                        <em class="passcode-icon icon-hide icon ni ni-eye"></em>
                                    </a>
                                    <input name="password" autocomplete="new-password" type="password" class="form-control form-control-lg" id="passcode" placeholder="Enter your passcode" minlength="6" data-msg-required="Required." data-msg-minlength="At least 6 chars." required>
                                </div>
                                <div class="form-control-group d-flex justify-between mt-2 mb-gs">
                                    <div class="form-control-wrap">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" name="remember" id="remember-me">
                                            <label class="custom-control-label text-soft" for="remember-me">Remember
                                                Me</label>
                                        </div>
                                    </div>
                                    <div class="form-control-link">
                                        <a tabindex="5" class="link link-primary" href="password/forget">Forgot
                                            Password?</a>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type='submit' name='submit' class="btn btn-lg btn-primary btn-block">Login</button>
                            </div>
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
                                    <a class="nav-link" href="<?php echo $website_url?>" target="_blank">Return to
                                        Homepage</a>
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
                window.location.href = 'session.php'
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