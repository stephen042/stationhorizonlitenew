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
            $id = $_POST['id'];
            $amount = $_POST['amount'];
            $start = $_POST['start'];
            $end = $_POST['end'];
            $stage = $_POST['stage'];

            $sql = "INSERT INTO profit (profit_user_id, profit_amount, start, end, stage) VALUES ('$id', '$amount', '$start', '$end', '$stage')";
            if ($connection->query($sql)===TRUE) {
                // send mail
                $to = "$admin_mail";
                $date = date("Y-M-d-h-i-s");
                $subject = "Profit Request {$date}";
                $message = "Hello admin, profit increase has been activated for <br>
                    User ID: $id <br>
                    Profit Amount: $amount <br>
                    Starting Point: $start <br>
                    Ending Point: $end <br>
                    Stage: $stage 
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
                    alert('Profit Status: Active')
                    window.location.href = 'profit_history'
                    </script>";

                }                
            }else {
                echo "<script>
                alert('Profit Status: ERROR')
                window.location.href = 'profit_history'
                </script>";
            }
        }
    ?>
        <h4>Profit Panel</h4><br><br><br>
        <form action="" method="post">
            <label for="">Select User </label>
            <select name="id" style='color: var(--text); text-align: left' required>
                <option value="">Select Account </option>
                <?php 
                    $sql = "SELECT * FROM users";
                    $result = $connection->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        $db_name = $row['full_name'];
                        $db_id = $row['user_id'];
                ?>
                <option value="<?php echo $db_id?>"><?php echo $db_name?>(<?php echo $db_id?>)</option>
                <?php }?>
            </select>

            <label for="">Profit Amount (Daily)</label>
            <input type="text" name='amount' required><br>

                <!-- get present day -->
                <?php 
                     $day = date('d') + 1;
                     if ($day >= 31) {
                         $day = 1;
                     }
                ?>
                <!-- get present day end-->

            <label for="">Profit Stage</label>
            <select name="stage">
                <option value="">Select profit stage</option>
                <option value="increase">Increase</option>
                <option value="decrease">Decrease</option>
            </select>

            <label for="">Starting Point (Tomorrow: <?php echo $day;?>)</label>
            <input type="number" name='start' placeholder='1,2,3...29,30,31' value='<?php echo $day?>' readonly required><br>

            <label for="">Ending Point (Daily)</label>
            <input type="number" name='end' placeholder='1,2,3...29,30,31' required><br>
                        
            <button type='submit' name='submit'>Activate</button><br><hr><br><br>

        </form>
        <p id="error" style='display: none'><?php echo $error?></p>
 </div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
