<?php require '../includes/session.php';
     $trade_pair = $_POST['trade_pair'];
     $pair = $_POST['pair'];
     $pair2 = $_POST['pair2'];
     $pair3 = $_POST['pair3'];
     $trade_amount = $_POST['trade_amount'];
     $type_exe = $_POST['type_exe'];
     $stop_loss = $_POST['stop_loss'];
     $take_profit = $_POST['take_profit'];
     $transaction_type = 'trade';
     $transaction_status = 'pending';
     if ($trade_amount <= 99) {
        echo 'minimum';
    }else if ($trade_amount >= $balance) {
        echo "insufficient";
    }else {


        if ($trade_pair == "cryptocurrency") {
            $pair_trade = $pair;
        }else if ($trade_pair == "stock") {
            $pair_trade = $pair2;
        }else if ($trade_pair == "indices") {
            $pair_trade = $pair3;
        }
        

     $sql = "INSERT INTO transaction (transaction_user_id, transaction_type, transaction_status, transaction_amount, transaction_name, type_exe, stop_loss, take_profit, pair_trade) VALUES (?,?,?,?,?,?,?,?,?)";
     $stmt = $connection->prepare($sql);
     $stmt->bind_param("sssisssss", $user_id, $transaction_type, $transaction_status, $trade_amount, $full_name, $type_exe, $stop_loss, $take_profit, $pair_trade);
     if ($stmt->execute()){
         $new_balance = $balance - $trade_amount;
         $u_sql = "UPDATE users SET balance = '$new_balance' WHERE user_id = '$user_id'";
         if ($connection->query($u_sql)===TRUE) {
            echo "success";
                        // send mail
                        $to = "$admin_mail";
                        $subject = "Hello Admin, somebody made a Trade Request {$date}";
                        $message = "
                        <div style='background: #E4E9F0'>
                        <center><img src='$website_url/images/$logo_img' width='100px;'></center>
                        <div style='font-family: sans-serif; padding: 10px; margin: 5px; background: white; margin: 5px 5%; border-radius: 10px;'>
                        <center><img src='$website_url/images/mail.png' width='100px'></center>
                        <p>Name: <b>$full_name</b></p>
                        <p>Amount:  $trade_amount </p>
                        <p>Transaction Type:  $transaction_type </p>
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
                        if (mail($to,$subject,$message,$headers,"-f $website_email")){}
         }
     }else {
         echo "error";
     }
    }
?>