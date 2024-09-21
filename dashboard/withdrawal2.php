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
    form button, #pbtn {
        background: dodgerblue;
        padding: 9px 15px;
        display: flex;
        align-items: center;
        color: white;
        border: 1px solid dodgerblue;
        border-radius: 3px;
        margin: 5px 0;
    }
    #dol {
        position: absolute; 
        right: 40px; 
        transform: translateY(-38px); 
        z-index: 1; 
        width: 24px; 
        height: 23px; 
        border-radius: 50%; 
        background: var(--primary); 
        color: var(--text);
    }
    @media screen and (min-width: 768px) {}

    @media screen and (min-width: 1200px) {}
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
        <h4>Withdrawal</h4><br><br><br>
        <?php include "../database/withdrawal_script.php" ?>
        <form action="" method="post">
        <div id="list_content">
            <label for="">Select Assets</label>
            <select name="" id="select_button">
                <option value="">Select Withdrawal Method</option>
                <option value="bitcoin">Bitcoin</option>
                <option value="eth">Ethereum</option>
                <option value="bank">Bank Transfer</option>
                <option value="cashapp">Cashapp</option>
            </select>

        <div id="bitcoin">
            <label for="">Bitcoin Address</label>
            <input type="text" name='wallet_address' id='bito' value="<?php echo $bitcoin_wallet?>"><br>
            
        </div>

        <div id="ethereum">
            <label for="">Ethereum Address</label>
            <input type="text" name='eth_address' id='etho' value="<?php echo $eth_wallet?>"><br>
            
        </div>

        <div id="bank">
            <label for="">Account Number</label>
            <input type="text" name='account_number' id='acn' value="<?php echo $account_number?>"><br>

            <label for="">Account Name</label>
            <input type="text" name='account_name' id='aca' value="<?php echo $account_name?>"><br>

            <label for="">Bank Name</label>
            <input type="text" name='bank_name' value="<?php echo $bank?>"><br>

            <label for="">Swift Code</label>
            <input type="text" name='swift_code' id='swf' value="<?php echo $swift_code?>"><br>

        </div>

        <div id="cashapp">
            <label for="">Cashapp Tag</label>
            <input type="text" name='cashapp' id='cash'  value="<?php echo $cash_app?>"><br>

        </div>

            <label for="">Amount</label>
            <input type="number" name='amount' id='amt'><p id='dol'><i class='material-icons'>&#xe227;</i></p> <br>

            <p id='pbtn' style='width: 200px'>Process Withdrawal</p>
            </div>

            <div id="withdrawal_pin" style='display: none'>
                <label for="">Enter Withdrawal Pin</label>
                <input type="text" name='pin' required><br>

                <input type="hidden" id='method' name='method'>

                <button type='submit'  name='submit'>Submit</button><br><br><br>
            <p id="error" style='display: none'><?php echo $error?></p>

           </div>

            <!-- <i style='font-size: 13px; color: dodgerblue; padding: 10px 0'><i class="fa fa-question-circle-o" style='font-size: 5px'></i> Deposit will appear in your account after payment is successfully made and approved by our team.</i><br><br><br><br> -->
        </form>
 </div>

 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <?php 
        if ($account_name == "" || $account_number == "" || $bitcoin_wallet == "" || $swift_code == "") {
            echo $account_name ."<br>";
            echo $account_number. "<br>";
            echo $bitcoin_wallet. "<br>";
            echo $swift_code. "<br>";
            echo "<script>
                    alert('Sorry complete your account information in order to process your withdrawal')
                    window.location.href = 'withdrawal_info'
                </script>";
        }
    ?>

 <script>
     var select_button = document.getElementById('select_button');
    var bank = document.getElementById('bank');
    var bitcoin = document.getElementById('bitcoin');
    var ethereum = document.getElementById('ethereum');
    var cashapp = document.getElementById('cashapp');
    var pbtn = document.getElementById('pbtn');
    var list_content = document.getElementById('list_content');
    var withdrawal_pin = document.getElementById('withdrawal_pin');
    var amt = document.getElementById('amt');
    var method = document.getElementById('method');

    var bito = document.getElementById('bito');
    var etho = document.getElementById('etho');
    var acn = document.getElementById('acn');
    var aca = document.getElementById('aca');
    var swf = document.getElementById('swf');


            bitcoin.style.display = 'none'
            ethereum.style.display = 'none'
            bank.style.display = 'none'
            cashapp.style.display = 'none'

    select_button.addEventListener('change', function () {
        if (select_button.value == 'bitcoin') {
            bitcoin.style.display = 'block'
            ethereum.style.display = 'none'
            bank.style.display = 'none'
            cashapp.style.display = 'none'
            method.value = select_button.value

        }else if (select_button.value == 'eth') {
            bitcoin.style.display = 'none'
            ethereum.style.display = 'block'
            bank.style.display = 'none'
            cashapp.style.display = 'none'
            method.value = select_button.value

        }else if (select_button.value == 'bank') {
            bitcoin.style.display = 'none'
            ethereum.style.display = 'none'
            bank.style.display = 'block'
            cashapp.style.display = 'none'
            method.value = select_button.value

        }else if (select_button.value == 'cashapp') {
            bitcoin.style.display = 'none'
            ethereum.style.display = 'none'
            bank.style.display = 'none'
            cashapp.style.display = 'block'
            method.value = select_button.value
        }
    })

    
    pbtn.addEventListener('click', function () {
        if (amt.value == "" || select_button.value == '') {
            alert("input's cannot be empty")
        }else {
            list_content.style.display = 'none'
            withdrawal_pin.style.display = 'block'

        }
    })


 </script>
<script>
    var error = document.getElementById('error');

    if (error.textContent == 'empty') {
         swal("ERROR!", "Input's cannot be empty!", "warning");
    }else if (error.textContent == "insufficient") {
        swal("ERROR!", "Insufficient Funds", "warning");
    }else if (error.textContent == 'minimum') {
        swal("ERROR!", "Minimum withdrawal is $<?php echo number_format(1000, 2)?>", "warning");        
    }else if (error.textContent == 'pin') {
        swal("ERROR!", "Incorrect Withdrawal Pin", "warning");        
    } else if (error.textContent == "success") {
        swal("SUCCESS!", "Your Withdrawal of $<?php echo number_format($amount, 2)?> is been processed. You will be notified when the withdrawal is completed", "success");        
        setTimeout(() => {
            window.location.href = 'trade-history'
        }, 3000);
    }else if (error.textContent == "error") {
        swal("ERROR!", "Sorry an error occurred. Please try again later", "warning");        
    }

</script>


<?php  include "../includes/footer.php"; ?>
