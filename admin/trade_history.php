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

        <h4>Create Trade History</h4><br><br><br>


        <?php 
            if (isset($_POST['submit'])) {
                $t_user_id   = htmlspecialchars(trim($_POST['id']));
                $trade_type  = htmlspecialchars(trim($_POST['trade_type']));
                $amount      = htmlspecialchars(trim($_POST['amount']));
                $t_status      = htmlspecialchars(trim($_POST['status']));
                $stop_loss   = htmlspecialchars(trim($_POST['stop_loss']));
                $take_profit = htmlspecialchars(trim($_POST['take_profit']));
                $type        = htmlspecialchars(trim($_POST['type']));
                $trade_won        = htmlspecialchars(trim($_POST['trade_won']));
                $trade_loss        = htmlspecialchars(trim($_POST['trade_loss']));

                $d_sql = "SELECT * FROM users WHERE user_id = '$t_user_id'";
                $d_result = $connection->query($d_sql);
                while ($row = $d_result->fetch_assoc()) {
                    $t_name = $row['full_name'];
                }
                

                $transaction_type = 'trade';
                
                $sql = "INSERT INTO transaction (transaction_user_id, transaction_name, transaction_type, transaction_status, transaction_amount, trade_won, trade_loss, type_exe, stop_loss, take_profit, pair_trade) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
                $stmp = $connection->prepare($sql);
                $stmp->bind_param("sssssssssss", $t_user_id, $t_name, $transaction_type, $t_status, $amount, $trade_won, $trade_loss, $type, $stop_loss, $take_profit, $type);
                if ($stmp->execute()) {
                    echo "<script>
                            alert('Trade History Created Successfully')
                            window.location.href = 'trade'
                        </script>";
                }else {
                    echo "<script>
                            alert('Sorry an error occurred. Please try again later')
                            window.location.href = 'trade'
                        </script>";
                }
                
            }
        
        ?>


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

            <label for="">Trade Type</label>
            <select name="trade_type" required>
                <option value="Market Execuation">Market Execuation</option>
                <option value="Pending Order">Pending Order</option>
            </select>

            <label for="">Amount</label>
            <input type="text" name='amount' required>

            <label for="">Trade Status</label>
            <select name="status" required>
                <option value="pending">Pending</option>
                <option value="won">Won</option>
                <option value="loss">Loss</option>
            </select>

            <label for="">Stop Loss</label>
            <input type="text" name='stop_loss' value='0.0000'  required>

            <label for="">Take Profit</label>
            <input type="text" name='take_profit' value='0.0000' required>

            <label for="">Trade Won</label>
            <input type="text" name='trade_won' required>

            <label for="">Trade Loss</label>
            <input type="text" name='trade_loss' required>

            <label for="">Market Type</label>
            <select name="type" required>
                <option value="">========= Cryptocurrency Market =========</option>

                <option value="USDT/BTC" data-icon='../includes/icons/bitcoin.png'>USDT/BTC</option>
                <option value="USDT/ETH" data-icon='../includes/icons/eth.png'>USDT/ETH</option>
                <option value="USDT/TRX" data-icon='../includes/icons/tron.png'>USDT/TRX</option>
                <option value="USDT/SOL" data-icon='../includes/icons/Solana_logo.png'>USDT/SOL</option>
                <option value="USDT/LTC" data-icon='../includes/icons/lite.png'>USDT/LTC</option>
                <option value="USDT/BNB" data-icon='../includes/icons/bnb.png'>USDT/BNB</option>
                <option value="USDT/LINK" data-icon='../includes/icons/link.png'>USDT/LINK</option>
                <option value="USDT/FTT" data-icon='../includes/icons/ftt.png'>USDT/FTT</option>
                <option value="USDT/SHIB" data-icon='../includes/icons/shib.png'>USDT/SHIB</option>
                <option value="USDT/ETC" data-icon='../includes/icons/etc.png'>USDT/ETC</option>
                <option value="USDT/TFUEL" data-icon='../includes/icons/tfuel.png'>USDT/TFUEL</option>
                <option value="USDT/ADA" data-icon='../includes/icons/ada.png'>USDT/ADA</option>
                <option value="USDT/VET" data-icon='../includes/icons/vet.png'>USDT/VET</option>

                <option value="">========= Stock Market =========</option>

                <option value="FACEBOOK INC" data-icon='../includes/icons/facebook.png' >FACEBOOK INC</option>
                <option value="BOEING CO" data-icon='../includes/icons/boeing.png' >BOEING CO</option>
                <option value="APPLE INC" data-icon='../includes/icons/apple.png' >APPLE INC</option>
                <option value="AMAZON COM INC" data-icon='../includes/icons/amazon.png' >AMAZON COM INC</option>
                <option value="MICROSOFT CORP" data-icon='../includes/icons/microsoft.png' >MICROSOFT CORP</option>
                <option value="NETFLIX INC" data-icon='../includes/icons/netflix.png' >NETFLIX INC</option>
                <option value="MICRON TECHNOLOGY INC" data-icon='../includes/icons/mircon.png' >MICRON TECHNO...</option>
                <option value="NVIDIA CORP" data-icon='../includes/icons/nvidia.png' >NVIDIA CORP</option>
                <option value="CANOPY GROWTH INCORPORATION" data-icon='../includes/icons/canopy.png' >CANOPY GROW...</option>
                <option value="TESLA INC" data-icon='../includes/icons/tesla.png' >TESLA INC</option>
                <option value="TWITTER INC" data-icon='../includes/icons/twitter.png' >TWITTER INC</option>
                <option value="SBERBANK RUSSIA" data-icon='../includes/icons/sberbank.png' >SBERBANK RUS...</option>
                <option value="CRONOS GROUP INC" data-icon='../includes/icons/cronos.png' >CRONOS GROUP INC</option>
                <option value="PENNYMAC FINCANCIAL SERVICES INC" data-icon='../includes/icons/pennymac.png' >PENNYMAC FINCA...</option>
                <option value="PAN AMERICAN SILVER CORP" data-icon='../includes/icons/pan.png' >PAN AME...</option>
                <option value="BANK OF AMERICAN CORPORATION" data-icon='../includes/icons/bank.png' >BANK OF AMERI...</option>
                <option value="INTEL CORP" data-icon='../includes/icons/intel.png' >INTEL CORP</option>
                <option value="RELIANCE INDS" data-icon='../includes/icons/reliance.png' >RELIANCE INDS</option>
                <option value="ELECTRONIC ARTS INC" data-icon='../includes/icons/electronic.png' >ELECTRONIC AR...</option>
                <option value="SAMSUNG LIFE" data-icon='../includes/icons/samsung.png' >SAMSUNG LIFE</option>
                <option value="SHOPIFY INC" data-icon='../includes/icons/shopify.png' >SHOPIFY INC</option>
                <option value="PAYPAL HONDINGS INC" data-icon='../includes/icons/paypal.png' >PAYPAL HONDINGS INC</option>

                <option value="">========= Indicies Market =========</option>

                <option value="GBPUSD" data-icon='../includes/icons/gbpusd.png'>GBPUSD, Pound vs US Dollar</option>
                <option value="EURAUD" data-icon='../includes/icons/euraud.png'>EURAUD, Euro vs Australian Dollar</option>
                <option value="EURCHF" data-icon='../includes/icons/eurchf.png'>EURCHF, Euro vs Swiss Franc</option>
                <option value="EURGBP" data-icon='../includes/icons/eurgbp.png'>EURGBP, Euro vs Great Britain</option>
                <option value="GBPCAD" data-icon='../includes/icons/gbpcad.png'>GBPCAD, Great Britain Pound vs Canadian Dollar</option>
                <option value="NZDUSD" data-icon='../includes/icons/nzdusd.png'>NZDUSD, New Zealand vs US Dollar</option>
                <option value="EURNZD" data-icon='../includes/icons/eurusd.png'>EURNZD, Euro vs New Zealand</option>
                <option value="CADJPYm" data-icon='../includes/icons/cadjpym.png'>CADJPYm, Canadian Dollar vs Japanise Yen AUDJPYm, Australian Dollar vs Japanise Yen</option>
                <option value="USDCHF" data-icon='../includes/icons/eurchf.png'>USDCHF, US Dollar vs Swiss Franc</option>
                <option value="GBPAUD" data-icon='../includes/icons/gbpaud.png'>GBPAUD, Great Britain Pound vs Australian Dollar</option>
                <option value="USDTRY" data-icon='../includes/icons/usdtry.png'>USDTRY, US Dollar vs Turkish New Lira</option>
                <option value="USD vs THB" data-icon='../includes/icons/usdthb.png'>USD vs THB</option>
                <option value="AUD vS USD" data-icon='../includes/icons/gbpaud.png'>AUD vS USD</option>
                <option value="CAD vs JPY" data-icon='../includes/icons/cadjpym.png'>CAD vs JPY</option>
                <option value="EURUSD" data-icon='../includes/icons/eurusd.png'>EURUSD, Euro vs US Dollar</option>
                <option value="USDRUB" data-icon='../includes/icons/usdrub.png'>USDRUB, US Dollar vs Russian Ruble</option>
                <option value="XAUUSD" data-icon='../includes/icons/xauusd.png'>XAUUSD, Gold vs US Dollar</option>
                <option value="NZDJPY" data-icon='../includes/icons/cadjpym.png'> NZDJPY, New Zealand Dollar vs Japanise Yen</option>

            </select>

            <button type='submit' name='submit'>Create</button><br><hr><br><br>

        </form>
        <p id="error" style='display: none'><?php echo $error?></p>
 </div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php  include "../admin_includes/footer.php"; ?>
