<?php 
    require "connect.php";
    include "../includes/session.php";

   $amount = $_POST['price'];
   $package = $_POST['package'];
   $error = "";
   if ($balance <= $amount) {
      echo $error = "insufficient";
   }else {
      $transaction_status = "pending";
      $transaction_type = "plan";
      $date = date("Y-M-d-h-i-s");
      $d_amount = number_format($amount, 2);
      $character = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
      $randomString = '';
      for ($i=0; $i < 10; $i++) { 
          $index = rand(0, strlen($character) -1);
          $randomString .=$character[$index];
      }
      $randomString;
      $TXD = "CXC".''.$randomString;

      $new_balance = $balance - $amount;
      $sql = "UPDATE users SET balance = '$new_balance', package = '$package', package_status = 'pending' WHERE user_id = '$user_id'";
      if ($connection->query($sql)===TRUE) {

      }


      $sql = "INSERT INTO transaction (transaction_user_id, transaction_type, transaction_status, transaction_amount) VALUES (?,?,?,?)";
      $stmt = $connection->prepare($sql);
      $stmt->bind_param("sssi", $user_id, $transaction_type, $transaction_status, $amount);
      if ($stmt->execute()){
          // send mail
          $to = "$email";
          $subject = "Crypto Purchase Request {$date}";
          $message = "
          <div style='background: #E4E9F0'>
          <center><img src='$website_url/images/$logo_img' width='100px;'></center>
          <div style='font-family: sans-serif; padding: 10px; margin: 5px; background: white; margin: 5px 5%; border-radius: 10px;'>
          <center><img src='$website_url/images/mail.png' width='100px'></center>
          <p>Hi <b>$full_name</b></p>
          <p>Your pending package purchase of $d_amount USDT ({$package}) <br> is been processed. You will be notified when your purchased is <b>Active</b></p>
          <p>Transaction ID: $TXD</p>
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
          $headers .= "rom: $website_email" . "\r\n";
          $headers .= "Reply-To: $website_email \r\n";
          $headers .= "Return-Path: $website_email\r\n";
          // $headers .= "CC: $website_email\r\n";
          $headers .= "BCC: $website_email\r\n";

          if (mail($to,$subject,$message,$headers,"-f $website_email")){
         echo $error = "success";
                          // send mail
                          $to = "$admin_mail";
                          $subject = "Hello Admin, somebody made a Crypto Plan Request {$date}";
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
                          $headers .= "rom: $website_email" . "\r\n";
                          $headers .= "Reply-To: $website_email \r\n";
                          $headers .= "Return-Path: $website_email\r\n";
                          // $headers .= "CC: $website_email\r\n";
                          $headers .= "BCC: $website_email\r\n";
              
                          if (mail($to,$subject,$message,$headers,"-f $website_email")){
                          $error = "success";
                          }    
                     }
                  }else {
                        echo $error = "error";
            }
         }
?>