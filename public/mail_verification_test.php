<?php


// if (isset($_GET['email'], $_GET['url'], $_GET['logo'], $_GET['db_name'], $_GET['web_name'], $_GET['token'])) {
//     $db_email       = $_GET['email'];
//     $db_name        = $_GET['db_name'];
//     $website_url    = $_GET['url'];
//     $website_name   = $_GET['web_name'];
//     $logo_img       = $_GET['logo'];
//     $db_token       = $_GET['token'];
// }

//  $website_email = "Elitecryptotrade@brandstez.com";
//  $date = date("Y-M-d-h-i-s");

// // send mail
// $to = "$db_email";
// $subject = "Registration Info {$date}";
// $message = "
// <div style='background: #E4E9F0'>
// <center><img src='$website_url/images/$logo_img' width='100px;'></center>
// <div style='font-family: sans-serif; padding: 10px; margin: 5px; background: white; margin: 5px 5%; border-radius: 10px;'>
// <center><img src='$website_url/images/mail.png' width='100px'></center>
// <p>Hi <b>$db_name</b></p>
// <p>Welcome to $website_name</p>
// <p>Your login information:</p>
// <p>Login Email: $db_email</p>
// <p style='text-align: center; font-size: 25px;'><b>$db_token</b></p>
// <p>Click on the link below to verify your account</p>
// <p><a href='$website_url/public/verify' style='color: dodgerblue; text-decoration: none'>Verify Account...</a></p>                    
// <p>Thanks</p>
// <p>Support Team, - $website_name</p>
// <p><a href='$website_url' style='color: dodgerblue; text-decoration: none'>$website_url</a></p>
// <a href='$website_url' style='color: dodgerblue; text-decoration: none'>
// <p style='font-size: 13px'>Please consider all mails from us as confidential.</p><br>
// </div><br>
// </div>";

// // Always set content-type when sending HTML email
// $headers = "MIME-Version: 1.0" . "\r\n";
// $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// // More headers
// $headers .= "rom: $website_email" . "\r\n";
// $headers .= "Reply-To: $website_email \r\n";
// $headers .= "Return-Path: $website_email\r\n";
// // $headers .= "CC: $website_email\r\n";
// $headers .= "BCC: $website_email\r\n";

// if (mail($to,$subject,$message,$headers,"-f $website_email")){
//     // echo "success";
//     echo "<script>
//         window.location.href = 'https://elitecryptofxtrade.com/en/public/mail_verification'
//     </script>";
// }else {
//     // echo "error";
//     echo "<script>
//     alert('Sorry an error occurred. Please try again later')
//     window.location.href = 'https://elitecryptofxtrade.com/en/public/mail_verification'
// </script>";

// }
