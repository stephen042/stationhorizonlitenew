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
        if (isset($_GET['id'])) {
            $the_id = $_GET['id'];

            $sql = "SELECT * FROM nft WHERE nft_id = '$the_id'";
            $result = $connection->query($sql);
            while ($row = $result->fetch_assoc()) {
                $nft_name = $row['name'];
                $nft_amount = $row['amount'];
                $nft_description = $row['description'];
                $nft_image = $row['image'];
            }
        }

        if (isset($_POST['submit'])) {
            $nft_name = $_POST['name'];
            $nft_amount = $_POST['amount'];
            $nft_description = $_POST['description'];

            $img = $_FILES["image"]["name"];
            $tempname = $_FILES["image"]["tmp_name"];
            $folder = "../nft-images/$img";
                
            if (move_uploaded_file($tempname, $folder)) {
                $sql = "UPDATE nft SET name = '$nft_name', amount = '$nft_amount', description = '$nft_description', image = '$img' WHERE nft_id = '$the_id'";
                if ($connection->query($sql)===TRUE) {
                    echo "<script>
                            alert('NFT Collection Updated Successfully');
                            window.location.href = 'nft_collections'  
                          </script>";
                }else {
                    echo "<script>
                            alert('Sorry an error occurred. Please try again later');
                            window.location.href = 'nft_collections'  
                          </script>";
                }
            }else {
                echo "error";
            }


        }
    ?>
        <h4>Edit NFT Info</h4><br><br><br>
        <form action="" method="post"  enctype="multipart/form-data">
            <img src="../nft-images/<?php echo $nft_image?>" width="100px" style='border-radius: 5px'><br>
            <label for="">Name</label>
            <input type="text" name='name' value='<?php echo $nft_name?>' required><br>

            <label for="">Amount (ETH)</label>
            <input type="text" name='amount' value='<?php echo $nft_amount?>' required><br>

            <label for="">Description</label>
            <textarea name="description" required  cols="30" rows="10"><?php echo $nft_description?></textarea>

            <label for="">Image Upload</label>
            <input type="file" name='image' value='<?php echo $nft_image?>' required><br>

            <button type='submit' name='submit'>Update </button><br><hr><br><br>

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
