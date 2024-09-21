<?php  include "../admin_includes/header.php"; ?>

<style>
    .container {
        padding: 15px;
        background: var(--dark-blue);
        border-radius: 5px;
        color: var(--text-color);
    }
    form input, textarea, select {
        padding: 10px; 
        border-radius: 3px;
        border: 1px solid var(--hover);
        display: block;
        width: 100%;
        background: var(--primary);
        color: var(--text-color);
        margin: 10px 0;
        font-size: 12px;
    }
    form label {
        margin: 20px 0;
        font-size: 14px;
    }
    form button {
        background: dodgerblue;
        padding: 9px 15px;
        display: flex;
        align-items: center;
        color: white;
        border: 1px solid dodgerblue;
        border-radius: 3px;
        margin: 5px 0;
    }
    .dol {
        position: absolute; 
        right: 40px; 
        transform: translateY(-38px); 
        z-index: 1; 
        width: 24px; 
        height: 23px; 
        border-radius: 50%; 
        background: var(--text-color); 
        color: var(--text);
    }
    @media screen and (min-width: 768px) {}

    @media screen and (min-width: 1200px) {}
</style>

 <div class="container">
    <?php 
        
        if (isset($_POST['submit'])) {
            $st_email = $_POST['email'];
            $sub = $_POST['subject'];
            $msg = $_POST['message'];

            // send mail
            $to = "$st_email";
            $subject = "$sub {$date}";
            $message = "
            <div style='background: #E4E9F0'>
            <center><img src='$website_url/images/$logo_img' width='100px;'></center>
            <div style='font-family: sans-serif; padding: 10px; margin: 5px; background: white; margin: 5px 5%; border-radius: 10px;'>
            <center><img src='$website_url/images/mail.png' width='100px'></center>
            <p>$msg</p>
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
                        alert('Message Sent Successfully')
                        window.location.href = 'index'
                    </script>";
            }else {
                echo "<script>
                            alert('Sorry an error occurred. Please try again later')
                            window.location.href = 'index'
                    </script>";

            }
            
        }
    ?>
        <h4>SEND MAIL</h4><br><br><br>
        <form action="" method="post">
            <label for="">Select User Email</label>
            <select name="email" style='color: var(--text); text-align: left' required>
                <option value="">Select Account </option>
                <?php 
                    $sql = "SELECT * FROM users";
                    $result = $connection->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        $db_name = $row['full_name'];
                        $db_email = $row['email'];
                ?>
                <option value="<?php echo $db_email?>"><?php echo $db_name?>(<?php echo $db_email?>)</option>
                <?php }?>
            </select>

            <label for="">Subject</label>
            <input type="text" name='subject' required><br>

            <label for="">Message</label>
            <textarea name="message" cols="30" rows="10" required></textarea><br>
            
            <button type='submit' name='submit'>Send Mail </button><br><hr><br><br>

        </form>
        <p id="error" style='display: none'><?php echo $error?></p>

        <?php 
            if (isset($_POST['submit2'])) {
                $email = $_POST['email'];
                $msg = $_POST['message'];
                $sub = $_POST['subject'];

            // send mail
            $to = "$email";
            $subject = "$sub {$date}";
            $message = "<div class='container' style='height: auto; background: linear-gradient(#062f5894, #12406e),url($website_url/images/banner.jpg); background-position: center; background-size: cover; color: white; padding: 5px; padding-top: 100px;'>
            <center><img src='$website_url/images/$logo_img' width='200px'></center>
            <center><h4>$sub</h4></center>
            <div class='text-content' style='font-size: 17px; font-family: trebuchet MS;'>
                <br>
                $msg<br><br>
                Best regards,<br>
                $website_name<br><br>
                <center><a href='<?php echo $website_url?>'><button style='color: white; background: dodgerblue; border: 1px solid transparent; padding: 10px; border-radius: 4px;'>Start Trading</button></a></center>
                </p>
            </div>
        </div>";
    
            // Always set content-type when sending HTML email
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    
            // More headers
            $headers .= "from: $website_email" . "\r\n";
            $headers .= "Reply-To: $website_email \r\n";
            $headers .= "Return-Path: $website_email\r\n";
            // $headers .= "CC: $website_email\r\n";
            $headers .= "BCC: $website_email\r\n";

            if (mail($to,$subject,$message,$headers,"-f $website_email")){
                echo "<script>
                        alert('Message Sent Successfully')
                        window.location.href = 'index'
                    </script>";
            }else {
                echo "<script>
                            alert('Sorry an error occurred. Please try again later')
                            window.location.href = 'index'
                    </script>";

            }

            }
        ?>

        <h4>Send Dormant Account Notice</h4>
        <form action="" method="post"><br><br>
            <label for="">Select Email</label>
        <select name="email" style='color: var(--text); text-align: left' required>
                <option value="">Select Account </option>
                <?php 
                    $sql = "SELECT * FROM users";
                    $result = $connection->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        $db_name = $row['full_name'];
                        $db_email = $row['email'];
                ?>
                <option value="<?php echo $db_email?>"><?php echo $db_name?>(<?php echo $db_email?>)</option>
                <?php }?>
            </select>
            
            <label for="">Subject</label>
            <input type="text" name='subject' required><br>

            <label for="">Message</label>
            <textarea name="message" cols="30" rows="10" required></textarea><br>
            <button type='submit' name='submit2'>Send Mail </button><br><hr><br><br>

        </form>
        
        <br><br><br>

 </div>
 

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- <script type="text/javascript" src="//js.nicedit.com/nicEdit-latest.js"></script>  -->
<script type="text/javascript">
 
        bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  </script>
<script>
    var error = document.getElementById('error');

    function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  copyText.setSelectionRange(0, 99999); 
  navigator.clipboard.writeText(copyText.value);
  swal("INFO!", "Copied the text:"+ copyText.value, "info");
}

    if (error.textContent == 'empty') {
         swal("ERROR!", "Input's cannot be empty!", "warning");
    }else if (error.textContent == "success") {
        swal("SUCCESS!", "Your Deposit of $<?php echo number_format($amount, 2)?> is been processed", "success");        
        setTimeout(() => {
            window.location.href = 'trade-history'
        }, 3000);
    }else if (error.textContent == "error") {
        swal("ERROR!", "Sorry an error occurred. Please try again later", "warning");        
    }

</script>
<?php  include "../admin_includes/footer.php"; ?>
