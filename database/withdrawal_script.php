<?php
require "connect.php";
include "../includes/session.php";
$error = $amount = $wallet_address = $account_name = $account_number = $bank_name = $swift_code = $cashapp = $method = "";
if (isset($_POST['submit'])) {
    htmlspecialchars(trim($amount = $_POST['amount']));
    htmlspecialchars(trim($wallet_address = $_POST['wallet_address']));
    htmlspecialchars(trim($eth_address = $_POST['eth_address']));
    htmlspecialchars(trim($account_number = $_POST['account_number']));
    htmlspecialchars(trim($account_name = $_POST['account_name']));
    htmlspecialchars(trim($bank_name = $_POST['bank_name']));
    htmlspecialchars(trim($swift_code = $_POST['swift_code']));
    htmlspecialchars(trim($cashapp = $_POST['cashapp']));
    htmlspecialchars(trim($method = $_POST['method']));
    htmlspecialchars(trim($pin = $_POST['pin']));

    $amount = mysqli_real_escape_string($connection, $amount);
    $wallet_address = mysqli_real_escape_string($connection, $wallet_address);

    $balance_type = $_POST['balance_type'];

   
    if (empty($amount)) {
        $error = "empty";
    } else if ($t_profit <= $amount) {
        // $error = "insufficient";
        if ($balance_type == "capital_balance") {
            $error = "insufficient";
        } else if ($balance_type == "profit_balance") {
            $error = "insufficient";
        } else if ($balance_type == "bonus_balance") {
            $error = "insufficient";
        }
    } else if ($amount <= 999) {
        $error = "minimum";
    } else if ($pin != $withdrawal_code) {
        $error = "pin";
    } else {
        $transaction_status = "pending";
        $transaction_type = "withdrawal";
        $date = date("Y-M-d-h-i-s");
        $d_amount = number_format($amount, 2);
        $st_amount =  str_replace(",", "", $amount);


        $sql = "INSERT INTO transaction (transaction_user_id, transaction_type, transaction_status, transaction_amount, transaction_name) VALUES (?,?,?,?,?)";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("sssss", $user_id, $transaction_type, $transaction_status, $st_amount, $full_name);
        if ($stmt->execute()) {
            $error = "success";
            // send mail
            $to = "$admin_mail";
            $subject = "Hello Admin, somebody made a Withdrawal Request {$date}";
            $message = "
                <div style='background: #E4E9F0'>
                <center><img src='$website_url/images/$logo_img' width='100px;'></center>
                <div style='font-family: sans-serif; padding: 10px; margin: 5px; background: white; margin: 5px 5%; border-radius: 10px;'>
                <center><img src='$website_url/images/mail.png' width='100px'></center>
                <p>Name: <b>$full_name</b></p>
                <p>Amount:  {$d_amount} USDT</p>
                <p>User's Bitcoin Address:  $wallet_address</p>
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

            if (mail($to, $subject, $message, $headers,"-f $website_email")) {
                if ($balance_type == "capital_balance") {
                    if ($balance <= $amount) {
                        $error = "insufficient";
                    } else {
                        $new_balance = $balance - $amount;
                        $sql = "UPDATE users SET balance = '$new_balance' WHERE user_id = '$user_id'";
                        if ($connection->query($sql) === true) {
                            $error = "success";
                        } else {
                            $error = "error";
                        }
                    }
                } else if ($balance_type == "profit_balance") {
                    if ($b_profit <= $amount) {
                        $error = "insufficient";
                    } else {
                        $new_balance = $b_profit - $amount;
                        $sql = "UPDATE users SET profit = '$new_balance' WHERE user_id = '$user_id'";
                        if ($connection->query($sql) === true) {
                            $error = "success";
                        } else {
                            $error = "error";
                        }
                    }
                } else if ($balance_type == "bonus_balance") {
                    if ($b_bonus <= $amount) {
                        $error = "insufficient";
                    } else {
                        $new_balance = $b_bonus - $amount;
                        $sql = "UPDATE users SET bonus = '$new_balance' WHERE user_id = '$user_id'";
                        if ($connection->query($sql) === true) {
                            $error = "success";
                        } else {
                            $error = "error";
                        }
                    }
                }
            }

        }
    }
}
