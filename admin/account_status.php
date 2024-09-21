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
            $status = $_POST['status'];

            $sql = "UPDATE users SET status = '$status' WHERE user_id = '$id'";
            if ($connection->query($sql)===TRUE) {
                echo "<script>
                        alert('Account Status Updated')
                        window.location.href = 'account_status'
                    </script>";
            }else {
                echo "<script>
                            alert('Sorry an error occurred. Please try again later')
                            window.location.href = 'account_status'
                    </script>";
        }
    }
    
    // billing code
    if (isset($_POST['btn_bill'])) {
            $id = $_POST['id'];
            $bill = $_POST['bill'];

            $sql = "UPDATE users SET bill = '$bill' WHERE user_id = '$id'";
            if ($connection->query($sql)===TRUE) {
                echo "<script>
                        alert('Account Bill Updated')
                        window.location.href = 'account_status'
                    </script>";
            }else {
                echo "<script>
                            alert('Sorry an error occurred. Please try again later')
                            window.location.href = 'account_status'
                    </script>";
        }
    }
    
    //bill code end
    
    
    
    
    ?>

        <h4>Account Status Panel</h4><br><br><br>
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


            <label for="">Account Status</label>
            <select name="status" >
                <option value="">Select Account Status</option>
                <option value="active">Active</option>
                <option value="suspend">Suspend</option>
                <!--<option value="say">say</option>-->
                <option value="support">Contact support</option>
                <option value="tax">Tax Payment Proof</option>
                <option value="insurance">Trading and Loss insurance fee required </option>
                <option value="inactive">Account Inactive </option>
                <option value="upgrade">Account Upgrade </option>
                <option value="kyc">Complete KYC Verification </option>
            </select>
            <br>
            <!--<Label>Type Billing Here</Label>-->
            <!--<input name="status" value="" >
             <textarea class="form-control" name="status" value="" id="exampleFormControlTextarea1" rows="3"></textarea>-->
                        
            <button type='submit' name='submit'>Activate</button><br><hr><br><br>

        </form>
        
        <form method="post">
             <h4>Type Billing Here</h4><br><br><br>
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
            <br
            <Label>Type Billing Here</Label>
            <!--<input name="status" value="" >-->
             <textarea class="form-control" name="bill" value="" id="exampleFormControlTextarea1" rows="3"></textarea>
                        
            <button type='submit' name='btn_bill'>Activate</button><br><hr><br><br>
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
