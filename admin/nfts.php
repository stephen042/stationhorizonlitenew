<?php  include "../admin_includes/header.php"; ?>

<style>
    .container {
        padding: 15px;
        background: var(--dark-blue);
        border-radius: 5px;
        color: var(--text-color);
    }
    form input, textarea {
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
        $img = "";
        if (isset($_POST['submit'])) {
            $name =  $_POST['name'];  
            $amount =  $_POST['amount'];  
            $description =  $_POST['description'];  
            $img = $_FILES["image"]["name"];
            $tempname = $_FILES["image"]["tmp_name"];
            $folder = "../nft-images/$img";
        
            if (move_uploaded_file($tempname, $folder)) {
                $sql = "INSERT INTO nft (name, amount, image, description) VALUES ('$name', '$amount', '$img', '$description')";
                if ($connection->query($sql)===TRUE) {
                    echo "<script>
                            alert('NFT Image Created Successfully')
                            window.location.href = '../dashboard/nfts'
                        </script>";        
                }else {
                    echo "err".$sql.''.$connection->error;
                    echo "<script>
                        alert('Sorry an error occurred')
                            // window.location.href = 'nfts'
                        </script>";        
                }
            }

        }
    ?>
        <h4>Create NFTs</h4><br><br><br>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="">Name</label>
            <input type="text" name='name' required><br>

            <label for="">ETH Amount</label>
            <input type="text" name='amount' required><br>

            <label for="">NFT Image</label>
            <input type="file" name='image' required><br>

            <label for="">Description</label>
            <textarea name="description" required cols="30" rows="10"></textarea>

            <button type='submit' name='submit'>Create </button><br><hr><br><br>

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
