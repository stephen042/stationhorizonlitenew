<?php require "../../database/connect.php"?>
<!DOCTYPE html>
<html lang="en" class="js">

<!-- Mirrored from invest.coinrave.co.uk/public/page/contact-us by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Sep 2022 15:53:52 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <meta name="author" content="Softnio">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Contact Us | <?php echo $website_name?></title>
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" href="../assets/css/apps8a54.css?ver=1.0.0">
	<!-- System Build v20210628110 @iO -->
</head>
<body class="nk-body npc-cryptlite bg-white">
<div class="nk-app-root">
    <div class="nk-main">
        <header class="header bg-gray-900">
            <div class="header-main header-dark bg-gray-900 on-dark is-sticky is-transparent">
                <div class="container header-container wide-lg">
                    <div class="header-wrap">
                        <img src="../../images/<?php echo $logo_img?>" width="150px">


                        <div class="header-toggle">
                            <button class="menu-toggler" data-target="main-hmenu">
                                <em class="menu-on icon ni ni-menu"></em>
                                <em class="menu-off icon ni ni-cross"></em>
                            </button>
                        </div>

                        <nav class="header-menu"  data-content="main-hmenu">
                            <ul class="menu-list ml-lg-auto">
                                                                <li class="menu-item"><a href="../index" class="menu-link nav-link">Home</a></li>
                                                                                                <li class="menu-item"><a href="../investments" class="menu-link nav-link">Investment</a></li>
                                                                <li class="menu-item">
		    <a href="../index" class="menu-link nav-link" target="_blank">
		        <span class="menu-text">Return to Homepage</span>
		    </a>
		</li>
								<li class="menu-item active">
		    <a href="contact-us" class="menu-link nav-link">
		        <span class="menu-text">Contact</span>
		    </a>
		</li>
					
		
	


                                                                <li class="menu-item"><a href="../register" class="menu-link nav-link">Register</a></li>
                                                            </ul>

                                                        <ul class="menu-btns">
                                <li>
                                    <a href="../login" class="btn btn-round btn-primary"><em class="icon ni ni-user-alt"></em> <span>Login</span></a>
                                </li>
                            </ul>
                                                    </nav>
                    </div>
                </div>
            </div>
        </header>

        <div class="nk-page-content bg-lighter">
                        <section class="section section-lg section-page">
                <div class="container wide-lg">
                    <div class="content-page">
    <div class="nk-block-head nk-block-head-lg text-center wide-xs mx-auto">
        <div class="nk-block-head-content">
            <h2 class="nk-block-title">Contact Us</h2>
                    </div>
    </div>

    <div class="nk-block card card-bordered card-stretch">
        <div class="card-inner card-inner-lg">
            <article class="entry">
                <h4>Get In Touch</h4>
<p>If you need advice or have any question in mind or technical assistance, do not hesitate to contact our specialists.</p>
<p><strong>Email Address:</strong> <?php echo $website_email?></p>
            </article>

<?php 
    if (isset($_POST['submit'])) {
        htmlspecialchars(trim($name = $_POST['name']));
        htmlspecialchars(trim($email = $_POST['email']));
        htmlspecialchars(trim($phone = $_POST['phone']));
        htmlspecialchars(trim($subject = $_POST['subject']));
        htmlspecialchars(trim($message = $_POST['message']));

        $name = mysqli_real_escape_string($connection, $name);
        $email = mysqli_real_escape_string($connection, $email);
        $phone = mysqli_real_escape_string($connection, $phone);
        $sub = mysqli_real_escape_string($connection, $subject);
        $msg = mysqli_real_escape_string($connection, $message);

        $sql = "INSERT INTO contact (name, email, phone, subject, message) VALUES (?,?,?,?,?)";
        $smtp = $connection->prepare($sql);
        $smtp->bind_param("sssss", $name, $email, $phone, $sub, $msg);
        if ($smtp->execute()) {
            // send mail
                $date = date("Y-M-d-h-i-s");
                $to = "$admin_mail";
                $subject = "Hello Admin, somebody made a Contact Request {$date}";
                $message = "
                <div style='background: #E4E9F0'>
                <center><img src='$website_url/images/<?php echo $logo_img?>' width='100px;'></center>
                <div style='font-family: sans-serif; padding: 10px; margin: 5px; background: white; margin: 5px 5%; border-radius: 10px;'>
                <center><img src='$website_url/images/mail.png' width='100px'></center>
                <p>Name: <b>$name</b></p>
                <p>EMAIl: <b>$email</b></p>
                <p>TEL: <b>$tel</b></p>
                <p>SUBJECT: <b>$sub</b></p>
                <p>MESSAGE: <b>$msg</b></p>
                <a href='$website_url' style='color: dodgerblue; text-decoration: none'>
                <button style='padding: 10px; background: dodgerblue; border: 1px solid transparent; color: white; width: 100%; border-radius: 3px'>Login Now</button></a>                
                </div><br><br>
                </div>
                ";
        
                // Always set content-type when sending HTML email
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        
                // More headers
                $headers .= "rom: $website_email" . "\r\n";
                $headers .= "Reply-To: $website_email \r\n";
                $headers .= "Return-Path: $website_email\r\n";
                // $headers .= "CC: $website_email\r\n";
                $headers .= "BCC: $website_email\r\n";
    
                if (mail($to,$subject,$message,$headers,"-f $website_email")){
                    echo "<script>
                            alert('Request Sent Successfully ')
                            window.location.href = 'contact-us'
                     </script>";

                }

        }else {
            echo "<script>
                    alert('Sorry an error occurred ')
                    window.location.href = 'contact-us'
             </script>";

        }



    }

?>

    <form method="POST" action="">
    <h4>Support Form</h4>
    <p>Contact us using the contact form and we will respond immediately.</p>
    <div class="row g-3">
                <div class="col-12">
            <div class="form-group">
                <label for="name" class="form-label">Your Name <span class="text-danger">*</span></label>
                <div class="form-control-wrap">
                    <input type="text" class="form-control form-control-lg " name="name" id="name" value="">
                                        
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="email" class="form-label">Email Address <span class="text-danger">*</span></label>
                <div class="form-control-wrap">
                    <input type="email" class="form-control form-control-lg " name="email" id="email" value="" required>
                                        
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="phone" class="form-label">Phone Number</label>
                <div class="form-control-wrap">
                     <input type="text" class="form-control form-control-lg " name="phone" id="phone" value="">
                                        
                </div>
            </div>
        </div>
                <div class="col-12">
            <div class="form-group">
                <label for="subject" class="form-label">Subject <span class="text-danger">*</span></label>
                <div class="form-control-wrap">
                    <input type="text" class="form-control form-control-lg " name="subject" id="subject" value="" required>
                                    </div>
            </div>
            <div class="form-group">
                <label for="message" class="form-label">Message <span class="text-danger">*</span></label>
                <div class="form-control-wrap">
                    <textarea name="message" class="form-control " id="message" placeholder="Enter your message here..." required></textarea>
                                    </div>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group mt-1">
            <button name='submit' type='submit' class="btn btn-primary btn-lg btn-mw ">
                    <span class="spinner-border spinner-border-sm hide" role="status" aria-hidden="true"></span>
                    <span>Submit</span>
                </button>
            </div>
        </div>  
    </div>
</form>                    </div>
    </div>
</div>
                </div>
            </section>
                    </div>

        <footer class="section footer bg-white border-top" id="footer">
    <div class="container wide-lg">
        <div class="row">
            <div class="col-12">
                <div class="footer-content text-center">
                    

                    <div class="text-base"><?php echo $website_name?> &copy; 2022. All Rights Reserved.</div>

                    <ul class="nav nav-sm justify-content-center py-3">
	
						<li class="nav-item">
			<a class="nav-link" href="../index" target="_blank">Return to Homepage</a>
		</li>
								<li class="nav-item">
			<a class="nav-link" href="privacy-policy">Privacy Policy</a>
		</li>
				
		

		</ul>
		
	


                                    </div>
            </div>
        </div>
    </div>
</footer>    </div>
</div>


<script src="../assets/js/bundle.js"></script>
<script src="../assets/js/app.js"></script>
<script src="//<?php echo $tidio_link?>" async></script>
</body>

<!-- Mirrored from invest.coinrave.co.uk/public/page/contact-us by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Sep 2022 15:53:52 GMT -->
</html>
