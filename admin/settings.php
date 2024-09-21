<?php include "../admin_includes/header.php"; ?>

<style>
    .container {
        padding: 15px;
        background: var(--dark-blue);
        border-radius: 5px;
        color: var(--text-color);
    }

    form input,
    textarea {
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
    $img = $img2 = "";
    if (isset($_POST['submit'])) {
        $website_name = $_POST['website_name'];
        $website_email = $_POST['website_email'];
        $website_url = $_POST['website_url'];
        $admin_mail = $_POST['admin_mail'];
        $bitcoin_address = $_POST['bitcoin_address'];
        $eth_address = $_POST['eth_address'];
        $usdt_address = $_POST['usdt_address'];
        $usdc_address = $_POST['usdc_address'];
        $tidio_link = $_POST['tidio_link'];
        $withdrawal_pin = $_POST['withdrawal_pin'];

        //     $extension = ['jpeg', 'JPEG', 'jpg', 'png', 'PNG'];
        //     $img = $_FILES['img']['name'];
        //     $img_temp = $_FILES['img']['tmp_name'];
        //     $folder = "../images/qrcode_img/$img";
        //     $ext = pathinfo($img, PATHINFO_EXTENSION); 
        //    $ext_name = str_replace('.'.$ext, '', $img);
        //    $replace_name = time().'.'.$ext;
        //     if (in_array($ext, $extension)) {
        //         $x = '.'.$ext;
        //          $new_folder = str_replace($x, $replace_name, $folder);
        //          move_uploaded_file($img_temp, $new_folder);
        //          $x_replace_name = $ext_name.$replace_name; 

        //     }else {
        //         $x_replace_name = $bitcoin_img; 
        //         echo "<script>
        //                 alert('The file extension name is not supported')
        //              </script>";
        //     }
        $x_replace_name = $bitcoin_img;

        // $extension = ['jpeg', 'JPEG', 'jpg', 'png', 'PNG'];
        // $img2 = $_FILES['img2']['name'];
        // $img_temp2 = $_FILES['img2']['tmp_name'];
        // $folder2 = "../images/qrcode_img/$img2";
        // $ext2 = pathinfo($img2, PATHINFO_EXTENSION); 
        // $ext_name2 = str_replace('.'.$ext2, '', $img2);
        // $replace_name2 = time().'.'.$ext2;
        //   if (in_array($ext2, $extension)) {
        //     $x2 = '.'.$ext2;
        //      $new_folder2 = str_replace($x2, $replace_name2, $folder2);
        //      move_uploaded_file($img_temp2, $new_folder2);
        //      $x_replace_name2 = $ext_name2.$replace_name2; 
        // }else {
        //     $x_replace_name2 = $eth_img; 
        //     echo "<script>
        //             alert('The file extension name is not supported')
        //          </script>";
        // }
        $x_replace_name2 = $eth_img;

        // $extension = ['jpeg', 'JPEG', 'jpg', 'png', 'PNG'];
        // $img3 = $_FILES['img3']['name'];
        // $img_temp3 = $_FILES['img3']['tmp_name'];
        // $folder3 = "../images/qrcode_img/$img3";
        // $ext3 = pathinfo($img3, PATHINFO_EXTENSION); 
        // $ext_name3 = str_replace('.'.$ext3, '', $img3);
        // $replace_name3 = time().'.'.$ext3;
        //   if (in_array($ext3, $extension)) {
        //     $x3 = '.'.$ext3;
        //      $new_folder3 = str_replace($x3, $replace_name3, $folder3);
        //      move_uploaded_file($img_temp3, $new_folder3);
        //      $x_replace_name3 = $ext_name3.$replace_name3; 
        // }else {
        //     $x_replace_name3 = $usdt_img; 
        //     echo "<script>
        //             alert('The file extension name is not supported')
        //          </script>";
        // }
        $x_replace_name3 = $usdt_img;

        // $extension = ['jpeg', 'JPEG', 'jpg', 'png', 'PNG'];
        // $img5 = $_FILES['img5']['name'];
        // $img_temp5 = $_FILES['img5']['tmp_name'];
        // $folder5 = "../images/qrcode_img/$img5";
        // $ext5 = pathinfo($img5, PATHINFO_EXTENSION); 
        // $ext_name5 = str_replace('.'.$ext5, '', $img5);
        // $replace_name5 = time().'.'.$ext5;
        //   if (in_array($ext5, $extension)) {
        //     $x5 = '.'.$ext5;
        //      $new_folder5 = str_replace($x5, $replace_name5, $folder5);
        //      move_uploaded_file($img_temp5, $new_folder5);
        //      $x_replace_name5 = $ext_name5.$replace_name5; 
        // }else {
        //     $x_replace_name5 = $usdc_img; 
        //     echo "<script>
        //             alert('The file extension name is not supported')
        //          </script>";
        // }
        $x_replace_name5 = $usdc_img;

        $extension = ['jpeg', 'JPEG', 'jpg', 'png', 'PNG'];
        $img4 = $_FILES['img4']['name'];
        if ($img4 != "") {
            $img_temp4 = $_FILES['img4']['tmp_name'];
            $folder4 = "../images/$img4";
            $ext4 = pathinfo($img4, PATHINFO_EXTENSION);
            $ext_name4 = str_replace('.' . $ext4, '', $img4);
            $replace_name4 = time() . '.' . $ext4;
            if (in_array($ext4, $extension)) {
                $x4 = '.' . $ext4;
                $new_folder4 = str_replace($x4, $replace_name4, $folder4);
                move_uploaded_file($img_temp4, $new_folder4);
                $x_replace_name4 = $ext_name4 . $replace_name4;
            } else {
                $x_replace_name4 = $logo_img;
                echo "<script>
                        alert('The file extension name for website logo is not supported')
                     </script>";
            }
        } else {
            $x_replace_name4 = $logo_img;
        }


        $sql  = "UPDATE settings SET website_name = '$website_name', website_email = '$website_email', website_url = '$website_url', admin_mail = '$admin_mail', bitcoin_address = '$bitcoin_address', eth_address = '$eth_address', usdt_address = '$usdt_address', usdc_address = '$usdc_address', tidio_link = '$tidio_link', withdrawal_pin = '$withdrawal_pin', bitcoin_img = '$x_replace_name', eth_img = '$x_replace_name2', usdt_img = '$x_replace_name3', usdc_img = '$x_replace_name5', logo_img = '$x_replace_name4' WHERE id = 1";
        if ($connection->query($sql) === TRUE) {
            echo "<script>
                            alert('Website Settings Updated successfully');
                            window.location.href = 'settings.php'
                        </script>";
        } else {
            echo "<script>
                            alert('Sorry an error occurred');
                            // window.location.href = 'settings.php'
                        </script>";
            echo $sql . '' . $connection->error;
        }
    }
    ?>
    <h4>Update Website Info</h4><br><br><br>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="">Website Name</label>
        <input type="text" name='website_name' value='<?php echo $website_name ?>' required><br>

        <label for="">Website Email</label>
        <input type="text" name='website_email' value='<?php echo $website_email ?>' required><br>

        <label for="">Website URl</label>
        <input type="text" name='website_url' value='<?php echo $website_url ?>' required><br>

        <label for="">Admin Email</label>
        <input type="text" name='admin_mail' value='<?php echo $admin_mail ?>' required><br>

        <label for="">Bitcoin Address</label>
        <input type="text" name='bitcoin_address' value='<?php echo $bitcoin_address ?>' required><br>

        <label for="">Eth Address</label>
        <input type="text" name='eth_address' value='<?php echo $eth_address ?>' required><br>

        <label for="">USDT Address</label>
        <input type="text" name='usdt_address' value='<?php echo $usdt_address ?>' required><br>

        <label for="">USDC Address</label>
        <input type="text" name='usdc_address' value='<?php echo $usdc_address ?>' required><br>

        <label for="">WIthdrawal pin</label>
        <input type="text" name='withdrawal_pin' value='<?php echo $withdrawal_code ?>' required><br>

        <label for="">Tidio Link</label>
        <input type="text" name='tidio_link' value='<?php echo $tidio_link ?>' placeholder="code.tidio.co/zdpvdsrtypf3xit2rnt351vowt1kd7zk.js" required><br>

        <!-- <label for="">Bitcoin QR-code</label>
        <input type="file" name='img'><br>

        <label for="">Ethereum QR-code</label>
        <input type="file" name='img2'><br>

        <label for="">USDT QR-code</label>
        <input type="file" name='img3'><br>

        <label for="">USDC QR-code</label>
        <input type="file" name='img5'><br> -->

        <label for="">Website Logo (812 x 307)px </label>
        <input type="file" name='img4'><br>

        <button type='submit' name='submit'>Update </button><br>
        <hr><br><br>

    </form>
    <p id="error" style='display: none'><?php echo $error ?></p>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    var error = document.getElementById('error');

    function myFunction() {
        var copyText = document.getElementById("myInput");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        navigator.clipboard.writeText(copyText.value);
        swal("INFO!", "Copied the text:" + copyText.value, "info");
    }

    if (error.textContent == 'empty') {
        swal("ERROR!", "Input's cannot be empty!", "warning");
    } else if (error.textContent == "success") {
        swal("SUCCESS!", "Your Deposit of $<?php echo number_format($amount, 2) ?> is been processed", "success");
        setTimeout(() => {
            window.location.href = 'trade-history'
        }, 3000);
    } else if (error.textContent == "error") {
        swal("ERROR!", "Sorry an error occurred. Please try again later", "warning");
    }
</script>
<?php include "../admin_includes/footer.php"; ?>