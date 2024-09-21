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
           echo $the_status = $_POST['status'];
           echo $the_id = $_POST['id'];
            
            $sql = "UPDATE users SET status  = '$the_status' WHERE user_id = '$the_id'";
            if ($connection->query($sql)===TRUE) {
                echo "<script>
                        alert('Account Updated Successfully')
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
        <h4>Suspend / Activate Account</h4><br><br><br>
        <form action="" method="post" enctype="multipart/form-data">
        <label for="">Select Account</label>
            <select name="id" style='color: var(--text); text-align: left' required>
                <option value="">Select Account </option>
                <?php 
                    $sql = "SELECT * FROM users";
                    $result = $connection->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        $db_name = $row['full_name'];
                        $db_status = $row['status'];
                        $db_id = $row['user_id'];
                ?>
                <option value="<?php echo $db_id?>"><?php echo $db_name?> (<?php echo $db_status?>)</option>
                <?php }?>
            </select>

            <label for="">Select Status</label>
            <select name="status" id="" style='color: var(--text); text-align: left' required>
                <option value="">Select Status</option>
                <option value="active">Activate</option>
                <option value="suspend">Suspend</option>
            </select>
            <button type='submit' name='submit'>Update</button><br><hr><br><br>

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
