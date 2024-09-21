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

        if (isset($_GET['id'])) {
            $the_id = $_GET['id'];
            $sql = "SELECT * FROM packages WHERE package_id = '$the_id'";
            $result = $connection->query($sql);
            $data = $result->fetch_assoc();
        }

    //     echo "<script>
    //     alert('Profit Updated Successfully')
    //     window.location.href = 'index'
    // </script>";

      
       
        if (isset($_POST['submit'])) {
            $package_name = $_POST['package_name'];
            $package_min = $_POST['package_min'];
            $package_max = $_POST['package_max'];
            $package_interest = $_POST['package_interest'];
            
            $sql = "UPDATE packages SET package_name  = '$package_name', package_min = '$package_min', package_max = '$package_max', package_interest = '$package_interest' WHERE package_id = '$the_id'";
            if ($connection->query($sql)===TRUE) {
                echo "<script>
                        alert('Package Updated Successfully')
                        window.location.href = 'add_packages'
                    </script>";
                }else {
                    echo "<script>
                    alert('Sorry an error occurred. Please try again later')
                    window.location.href = 'index'
                    </script>";
                }
        }
    ?>
        <h4>Edit Packages</h4><br><br><br>
        <form action="" method="post" enctype="multipart/form-data">

            <label for="">Package Name</label>
            <input type="text" name='package_name' value='<?php echo $data['package_name'] ?>' required><br>

            <label for="">Package Min </label>
            <input type="number" name='package_min' value='<?php echo $data['package_min'] ?>' required><br>

            <label for="">Package Max </label>
            <input type="number" name='package_max' value='<?php echo $data['package_max'] ?>' required><br>

            <label for="">Package Interest </label>
            <input type="number" name='package_interest' value='<?php echo $data['package_interest'] ?>' required><br>


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
