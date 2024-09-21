<?php  include "../includes/header.php"; ?>

<style>
    .container {
        padding: 15px;
        background: var(--dark-blue);
        border-radius: 5px;
        color: var(--text-color);
    }
    .nft-container article {
        border: 1px solid var(--text);
        padding: 20px;
        margin: 10px 50%;
        transform: translateX(-50%);
        width: 300px;
        border-radius: 10px;
    }
    .nft-container img {
        width: 100%;
        height: 300px;
        margin-bottom:5px; 
        border-radius: 10px;
    }
    #bid ul li {
        padding: 10px 20px;
        margin: 5px;
        border-radius: 3px;
    }
    #bid2 ul li {
        padding: 10px 20px;
        margin: 5px;
        border-radius: 3px;
    }

    #bid ul li:nth-child(2) {
        background: #0EE36F;
    }
    #bid ul li:nth-child(1) {
        background: dodgerblue;
    }
    #bid2 ul li:nth-child(1) {
        /* background: dodgerblue; */
    }

    #bid2 input {
        width: 80px;
        border: 1px solid transparent;
        padding: 10px;
        background: transparent;
        border-bottom: 1px solid var(--text);
        transform: translateY(-10px);
        color: var(--text-color);

    }
    @media screen and (min-width: 768px) {
        .nft-container img {
            width: 50%;
        }

        /* .nft-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
        }
        .nft-container article {
            width: 250px;
        } */
    }

    @media screen and (min-width: 1200px) {
        /* .nft-container article {
            width: 300px;
        } */
    }
</style>


<style>
        @media screen and (min-width: 768px) {
            .fixed-width {
                width: 100%;
                margin: 0 0%;
            }
            
            .side-panel-right {
                display: none;
                width: 30%;
            }
        }

        @media screen and (min-width: 1200px) {
            .fixed-width {
                width: 80%;
                transform: translateX(5%);
                margin: 0 15%;
            }

            .side-panel-left {
                width: 20%;
                display: block;
            }
        }
    </style>

 <div class="container">
        <h4>NFT Collections Details</h4><br><br><br>
        <div class="nft-container">
        <?php 
            if (isset($_GET['id'])) {
                $the_id = $_GET['id'];
            }

            $sql = "SELECT * FROM nft WHERE nft_id = '$the_id'";
            $result = $connection->query($sql);
            while ($row = $result->fetch_assoc()) {
                $nft_id = $row['nft_id'];
                $name = $row['name'];
                $nft_image = $row['image'];
                $amount = $row['amount'];
                $description = $row['description'];
            }

            if (isset($_POST['submit'])) {
               $bid_amount = $_POST['amount'];
               $bid_image = $_POST['image'];
               $bid_name = $_POST['name'];
               $current_price = $_POST['current'];

                if ($eth_balance <= $bid_amount) {
                    echo "<script>
                            alert('Insufficient Ethereum Balance')
                         </script>";
                }else {
                    $t_nft_balance = $eth_balance - $bid_amount;
                    $sql = "INSERT INTO nft_collections (collections_name, collections_image, collections_price, collections_bid_price) VALUES (?, ?, ?, ?)";
                    $smtp = $connection->prepare($sql);
                    $smtp->bind_param('ssss', $bid_name, $bid_image, $current_price, $bid_amount);
                    if ($smtp->execute()) {
                        $u_sql = "UPDATE users SET eth_balance = '$t_nft_balance' WHERE user_id = '$user_id'";
                        if ($connection->query($u_sql)===TRUE) {} 
                        $date = date("Y-M-d-h-i-s");
                        $d_amount = number_format($bid_amount, 2);
                        $character = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                        $randomString = '';
                        for ($i=0; $i < 10; $i++) { 
                            $index = rand(0, strlen($character) -1);
                            $randomString .=$character[$index];
                        }
                        $randomString;
                        $TXD = "CXC".''.$randomString;
            
                    // send mail
                    $to = "$email";
                    $subject = "Bidding Request {$date}";
                    $message = "
                    <div style='background: #E4E9F0'>
                    <center><img src='$website_url/images/$logo_img' width='100px;'></center>
                    <div style='font-family: sans-serif; padding: 10px; margin: 5px; background: white; margin: 5px 5%; border-radius: 10px;'>
                    <center><img src='$website_url/images/mail.png' width='100px'></center>
                    <p>Hi <b>$full_name</b></p>
                    <p>Send $d_amount ETH</p>
                    <b>Send Exact Payment To This Address:</b><br>
                    <b>Ethereum Address: $eth_address</b><br>
                    <p>Bidding request of $d_amount ETH</p>
                    <p>Transaction ID: $TXD</p>
                    <p>Deposit is automated. Please contact live support or email $website_email on delayed deposit.</p><br>
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
                                // send mail
                                $to = "$admin_mail";
                                $subject = "Hello Admin, somebody made a Bidding Request {$date}";
                                $message = "
                                <div style='background: #E4E9F0'>
                                <center><img src='$website_url/images/$logo_img' width='100px;'></center>
                                <div style='font-family: sans-serif; padding: 10px; margin: 5px; background: white; margin: 5px 5%; border-radius: 10px;'>
                                <center><img src='$website_url/images/mail.png' width='100px'></center>
                                <p>Name: <b>$full_name</b></p>
                                <p>Amount:  {$d_amount} ETH</p>
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
                                            alert('Your request is been processed...')
                                            window.location.href = 'nfts'
                                     </script>";    
                                }
                            }
                        }           
                    }
                }

    ?>  

        <center><img src="../nft-images/<?php echo $nft_image?>" width="50%">
        <p style='line-height: 25px'><?php echo $description?></p><br>
        <div id='bid'>
            <ul style='display: flex; justify-content: space-around'>
                <li>Current Price</li>
                <li>Your Bid</li>
            </ul>
        </div>

        <form action="" method="post">
        <div id='bid2'>
            <ul style='display: flex; justify-content: space-around'>
                <li><?php echo $amount?> [ETH]</li>
                <li><input type="text" name='amount' placeholder='0.00' required></li>
            </ul>
            Wallet Address: <br>
            <input type="text" id="myInput" value='<?php echo $eth_address?>' style='border: 1px solid transparent;transform: translateY(0px); width: 50%' readonly> <i class="fa fa-copy" onclick="myFunction()" style='color: #0EE36F; border: 1px solid #0EE36F; padding: 5px'></i>
        </div>
        <input type="text" name='image' value=<?php echo $nft_image?> hidden>
        <input type="text" name='name' value=<?php echo $name?> hidden>
        <input type="text" name='current' value=<?php echo $amount?> hidden>
<br>
        <button style='padding: 10px 10%; border-radius: 3px; background: dodgerblue; border: 1px solid transparent; color: white;' name='submit'>Submit</button>
        </form>
        </center>
        </div><br>
 </div>

 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
     function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  copyText.setSelectionRange(0, 99999); 
  navigator.clipboard.writeText(copyText.value);
  swal("INFO!", "Copied the text:"+ copyText.value, "info");
}
</script>

<?php  include "../includes/footer.php"; ?>
