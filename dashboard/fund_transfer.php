<?php  include "../includes/header.php"; ?>

<style>
    .container {
        padding: 15px;
        background: var(--dark-blue);
        border-radius: 5px;
        color: var(--text-color);
    }
    form input, select {
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
    #modal {
        position: fixed; 
        display: none;
        top: 60px; 
        background: var(--modal); 
        width: 95%; 
        left: 50%; 
        color: white;
        transform: translateX(-50%); 
        padding: 10px; z-index: 999;
        border-top: 3px solid dodgerblue;
        border-radius: 5px;
    }
    @media screen and (min-width: 768px) {
        #modal {
            width: 60%;
        }
    }

    @media screen and (min-width: 1200px) {
        #modal {
            width: 45%;
        }
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

        <?php 
            $t_amount = $asset = $error = "";
            if (isset($_POST['submit'])) {
                $asset = $_POST['asset'];
                $t_amount = $_POST['amount'];

                if ($asset == "profit") {
                    if ($t_amount > $b_profit || $t_amount <= 0) {
                        $error = "insufficient";
                    }else {
                        $new_balance = $balance + $t_amount;
                        $new_profit = $b_profit - $t_amount;
                        $sql = "UPDATE users SET balance = '$new_balance', profit = '$new_profit'  WHERE user_id = '$user_id'";
                        if ($connection->query($sql)===TRUE) {
                            $error = "success";
                        }else {
                            $error = "error";
                        }    
                    }
                }else if ($asset == "bonus") {
                    if ($t_amount > $b_bonus || $t_amount <= 0) {
                        $error = "insufficient";
                    }else {
                        $new_balance = $balance + $t_amount;
                        $new_bonus = $b_bonus - $t_amount;
                        $sql = "UPDATE users SET balance = '$new_balance', bonus = '$new_bonus'  WHERE user_id = '$user_id'";
                        if ($connection->query($sql)===TRUE) {
                            $error = "success";
                        }else {
                            $error = "error";
                        }    
                    }
                }
            }
        
        ?>

 <div class="container">
        <h4>Fund Transfer</h4><br><br><br>
        <form action="" method="post">
            <label for="">Select Assets</label>
            <select style='text-align: left;' name='asset' required>
        <option value="">Choose Asset</option>
        <option value="profit">Profit To Capital (<?php echo '$'.number_format($b_profit,2)?> - <?php echo '$'.number_format($balance,2)?>)</option>
        <option value="bonus">Bonus To Capital (<?php echo '$'.number_format($b_bonus,2)?> - <?php echo '$'.number_format($balance,2)?>)</option>
            </select>

            <label for="">Amount</label>
            <input type="number" name='amount' required>

            <button type="submit" name='submit' style='padding: 10px; font-weight: bold; text-align: center; background: dodgerblue; color: white;  border-radius: 3px; border: 1px solid transparent'>Transfer</button>

        </form><br>


        <p id="error" style='display: none'><?php echo $error?></p>
        <p id="currency_rate" style='display: none'></p>
        <p id="eth_rate" style='display: none'></p>
 </div>

 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    var error = document.getElementById('error');

    var modal_btn = document.getElementById('modal_btn')
    var modal = document.getElementById('modal')
    var input_amount = document.getElementById('input_amount')
    var select_input = document.getElementById('select_input')
    var cancel = document.getElementById('cancel')
    var modal_btc_rate = document.getElementById('modal_btc_rate')
    var modal_amount = document.getElementById('modal_amount')
    var modal_btc_rate_two = document.getElementById('modal_btc_rate_two')
    var modal_amount_two = document.getElementById('modal_amount_two')
    var modal_type = document.querySelectorAll('.modal_type')
    var currency_rate = document.querySelector('#currency_rate')
    var eth_rate = document.querySelector('#eth_rate')
    var input_item = document.getElementById('input-item');
    var label_amount = document.getElementById('label_amount');
    var post_amount = document.getElementById('post_amount');
    var post_eth = document.getElementById('post_eth');
    var myInput = document.getElementById('myInput');
    var qrcode = document.getElementById('qrcode');
    var rate_price;

    var rate = "https://min-api.cryptocompare.com/data/price?fsym=BTC&tsyms=USD,BTC,ETH"
        fetch(rate)
    .then(response => response.json())
    .then(data => console.log(currency_rate.textContent = data.USD));

    var eth = "https://min-api.cryptocompare.com/data/price?fsym=BTC&tsyms=USD,BTC,ETH"
        fetch(eth)
    .then(response => response.json())
    .then(data => console.log(eth_rate.textContent = data.ETH));


    if (error.textContent == 'insufficient') {
         swal("ERROR!", "Insufficient Funds", "warning");
    }else if (error.textContent == "success") {
        swal("SUCCESS!", "Your fund transfer of $<?php echo number_format($t_amount, 2)?> was successful.", "success");
        setTimeout(() => {
            window.location.href = 'index'
        }, 3000);
    }else if (error.textContent == "error") {
        swal("ERROR!", "Sorry an error occurred. Please try again later", "warning");        
    }

</script>
<?php  include "../includes/footer.php"; ?>
