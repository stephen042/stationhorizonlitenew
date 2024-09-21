<?php
require "connect.php";
// include "../includes/session.php";
$error = $amount = "";
if (isset($_POST['submit'])) {
    htmlspecialchars(trim($amount = $_POST['amount']));
    htmlspecialchars(trim($t_mode = $_POST['mode']));
    $amount = mysqli_real_escape_string($connection, $amount);
    $t_mode = mysqli_real_escape_string($connection, $t_mode);
    $eth = $_POST['eth'];

    if ($t_mode == "BTC") {
        $wallet_address = "$bitcoin_address";
    } else if ($t_mode == "ETH") {
        $wallet_address = "$eth_address";
    } else if ($t_mode == "USDT") {
        $wallet_address = "$usdt_address";
    } else if ($t_mode == "USDC") {
        $wallet_address = "$usdc_address";
    }

    if (empty($amount)) {
        $error = "empty";
    } else {
        $transaction_status = "pending";
        $transaction_type = "deposit";
        $date = date("Y-M-d-h-i-s");
        $d_amount = number_format($amount, 2);
        $character = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $index = rand(0, strlen($character) - 1);
            $randomString .= $character[$index];
        }
        $randomString;
        $TXD = "CXC" . '' . $randomString;

        $sql = "INSERT INTO transaction (transaction_user_id, transaction_type, transaction_status, transaction_amount, transaction_name, t_mode, eth) VALUES (?,?,?,?,?,?,?)";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("sssisss", $user_id, $transaction_type, $transaction_status, $amount, $full_name, $t_mode, $eth);
        if ($stmt->execute()) {
            // send mail
            $to = "$email";
            $subject = "Deposit Request {$date}";
            $message = "
                <div style='background: #E4E9F0'>
                <center><img src='$website_url/images/$logo_img' width='100px;'></center>
                <div style='font-family: sans-serif; padding: 10px; margin: 5px; background: white; margin: 5px 5%; border-radius: 10px;'>
                <center><img src='$website_url/images/mail.png' width='100px'></center>
                <p>Hi <b>$full_name</b></p>
                <p>Send $d_amount USDT</p>
                <b>Send Exact Payment To This Address:</b><br>
                <b>$t_mode address: $wallet_address</b><br>
                <p>Deposit request of ${$d_amount}({$d_amount} USDT)</p>
                <p>Transaction ID: $TXD</p>
                <p>Deposit is automated. Please contact live support or email $website_email on delayed deposit.</p><br>
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
            $headers .= "From: $website_name $website_email" . "\r\n";
            $headers .= "Reply-To: $website_email \r\n";
            $headers .= "Return-Path: $website_email\r\n";
            // $headers .= "CC: $website_email\r\n";
            $headers .= "BCC: $website_email\r\n";

            if (mail($to, $subject, $message, $headers, "-f $website_email")) {
                // send mail
                $to = "$admin_mail";
                $subject = "Hello Admin, somebody made a Deposit Request {$date}";
                $message = "
                                <div style='background: #E4E9F0'>
                                <center><img src='$website_url/images/$logo_img' width='100px;'></center>
                                <div style='font-family: sans-serif; padding: 10px; margin: 5px; background: white; margin: 5px 5%; border-radius: 10px;'>
                                <center><img src='$website_url/images/mail.png' width='100px'></center>
                                <p>Name: <b>$full_name</b></p>
                                <p>Amount:  {$d_amount} USDT</p>
                                <a href='$website_url' style='color: dodgerblue; text-decoration: none'>
                                <button style='padding: 10px; background: dodgerblue; border: 1px solid transparent; color: white; width: 100%; border-radius: 3px'>Login Now</button></a>                
                                </div><br><br>
                                </div>
                                ";

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
                    $error = "success";
                }
            }
        } else {
            $error = "error";
        }
    }
}
