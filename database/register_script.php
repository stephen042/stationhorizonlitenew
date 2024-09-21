<?php
session_start();
require "connect.php";
if (isset($_SESSION['user_id'])) {
    echo "<script>window.location.href = '../dashboard/index'</script>";
}
$email = $password = $error = $db_email = $db_password = $db_username = $username = $name = $phone_number = $country = "";
if (isset($_POST['submit'])) {
    htmlspecialchars(trim($email = $_POST['email']));
    htmlspecialchars(trim($password = $_POST['password']));
    htmlspecialchars(trim($name = $_POST['name']));
    htmlspecialchars(trim($username = $_POST['username']));
    htmlspecialchars(trim($country = $_POST['country']));
    htmlspecialchars(trim($phone_number = $_POST['phone_number']));
    htmlspecialchars(trim($package = $_POST['package']));

    $email = mysqli_real_escape_string($connection, $email);
    $password = mysqli_real_escape_string($connection, $password);
    $name = mysqli_real_escape_string($connection, $name);
    $username = mysqli_real_escape_string($connection, $username);
    $country = mysqli_real_escape_string($connection, $country);
    $phone_number = mysqli_real_escape_string($connection, $phone_number);
    $package = mysqli_real_escape_string($connection, $package);

    $st_email = strtolower($email);
    $st_password = strtolower($password);
    $st_username = strtolower($username);

    $character = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $randomString = '';
    for ($i = 0; $i < 20; $i++) {
        $index = rand(0, strlen($character) - 1);
        $randomString .= $character[$index];
    }
    $randomString;

    $text = '12123456789034123451123456789021234567890345612345678907890678905678901234567890';
    $text_suff = str_shuffle($text);
    $token = substr($text_suff, 0, 6);



    $sql = "SELECT * FROM users WHERE email = '$st_email' OR username = '$st_username'";
    $result = $connection->query($sql);
    while ($row = $result->fetch_assoc()) {
        $db_email = $row['email'];
        $db_password = $row['password'];
        $db_username = $row['username'];
    }

    if (empty($name) || empty($username) || empty($email) || empty($password)) {
        $error = "empty";
    } else if ($email == $db_email) {
        $error = "exists";
    } else if ($username == $db_username) {
        $error = "exists";
    } else {
        $sql = "INSERT INTO users (full_name, username, email, password, user_id, token, phone_number, country) VALUES (?,?,?,?,?,?,?,?)";
        $smtp = $connection->prepare($sql);
        $smtp->bind_param('ssssssss', $name, $st_username, $st_email, $st_password, $randomString, $token, $phone_number, $country);
        $smtp->execute();
        $date = date("Y-M-d-h-i-s");


        // send mail
        $to = "$email";
        $subject = "Your Registration Verification";
        $message = "
                <div style='background: #E4E9F0'>
                <center><img src='$website_url/app/images/$logo_img' width='100px;'></center>
                <div style='font-family: sans-serif; padding: 10px; margin: 5px; background: white; margin: 5px 5%; border-radius: 10px;'>
                <center><img src='$website_url/app/images/mail.png' width='100px'></center>
                <p>Hi <b>$name</b></p>
                <p>Welcome to $website_name</p>
                <p>Your login information:</p>
                <p>Login Email: $email</p>
                <p style='text-align: center; font-size: 25px;'><b>$token</b></p>
                <p>Click on the link below to verify your account</p>
                <p><a href='$website_url/app/public/verify' style='color: dodgerblue; text-decoration: none'>Verify Account...</a></p>
                <p>Thanks</p>
                <p>Support Team, - $website_name</p>
                <p><a href='$website_url' style='color: dodgerblue; text-decoration: none'>$website_url</a></p>
                <a href='$website_url' style='color: dodgerblue; text-decoration: none'>
                <p style='font-size: 13px'>Please consider all mails from us as confidential.</p><br>
                </div><br>
                </div>";

    
        
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'From: '.$website_name.'<'.$website_email.'>' . "\r\n";
    
        if (mail($to,$subject,$message,$headers)) {
            // send mail
            $to = "$admin_mail";
            $subject = "Hello Admin, somebody created an account {$date}";
            $message = "
                <div style='background: #E4E9F0'>
                <center><img src='$website_url/images/$logo_img' width='100px;'></center>
                <div style='font-family: sans-serif; padding: 10px; margin: 5px; background: white; margin: 5px 5%; border-radius: 10px;'>
                <center><img src='$website_url/images/mail.png' width='100px'></center>
                <p>Name: <b>$name</b></p>
                <p>Email:  $email </p>
                <p>Username:  $username </p>
                <p>Password:  $password</p>  
                <p>Country: $country</p>
                <p>Phone Number: $phone_number</p>              
                <a href='$website_url' style='color: dodgerblue; text-decoration: none'>
                <button style='padding: 10px; background: dodgerblue; border: 1px solid transparent; color: white; width: 100%; border-radius: 3px'>Login Now</button></a>                
                </div><br><br>
                </div>
                ";

            // Always set content-type when sending HTML email
           $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: '.$website_name.'<'.$website_email.'>' . "\r\n";


            if (mail($to,$subject,$message,$headers)) {
                $error = "success";
                $_SESSION['email'] = $email;
            }
        }
    }
}
