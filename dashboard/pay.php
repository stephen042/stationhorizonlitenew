<?php include "../includes/header.php"; ?>

<style>
    .container {
        padding: 15px;
        background: var(--dark-blue);
        border-radius: 5px;
        color: var(--text-color);
    }

    form input,
    select {
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
        padding: 10px;
        z-index: 999;
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


<div class="container">
    <h4>DEPOSIT</h4><br><br><br>
    <?php include "../database/deposit_script.php" ?>
    <form action="" method="post">

        <div id="modal">
            <?php
            $character = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
            $randomString = '';
            for ($i = 0; $i < 10; $i++) {
                $index = rand(0, strlen($character) - 1);
                $randomString .= $character[$index];
            }
            $randomString;
            $TXD = "CXC" . '' . $randomString;

            ?>
            <h3 style='color: white'>Payment Confirmation</h3><br>
            <hr style='border: 1px solid transparent; border-bottom: 1px solid #1D2D40'><br>
            <p style='font-size: 13px; color: white'>Your Order no. <?php echo $TXD ?> has been placed successfully.</p><br>
            <p style='font-size: 13px; color: white'>Please send USD <span id='modal_btc_rate'>0</span>  ($<span id='modal_amount'></span>) to the address below. The balance will appear in your account only after transaction gets confirmed by our team.</p><br>
            <h4>Payment to the following <span class='modal_type'>BTC</span> Wallet Address</h4><br>
            <div style='display: grid; grid-template-columns: 1fr 4fr'>

                <article>
                    <!-- <img src="../images/qrcode.jpg" id='qrcode' width="100px" height="100px" style='border-radius: 5px'> -->
                    <div id="qrcode" width="100px" height="100px" style='border-radius: 5px;padding:5px;background-color:#fff;'></div>
                </article>

                <article style='padding: 5px 10px'><br>
                    <p style='font-size: 14px'>Send Amount: USD <span style='color: white'><span id='modal_btc_rate_two'>0</span>  ($<span id='modal_amount_two'>0</span>)</span></p>
                    <input type="text" readonly id="myInput" style='padding: 10px 30px' value=''>
                    <p onclick="myFunction()" class='dol' style='background: transparent; color: #1AE0A1'><i class='material-icons'>content_copy </i></p><br>
                    <hr style='border: 1px solid transparent; border-bottom: 1px solid #1D2D40'><br>
                    <div style='display: flex'>
                        <input type="hidden" name='amount' id='post_amount' required>
                        <input type="hidden" name='eth' id='post_eth' required>
                        <button type='submit' name='submit'>Confirm</button>
                        <p id='cancel' style='padding: 10px 7px; text-align: center; background: transparent; color: #d32929; width: 100px; border-radius: 3px; height: 35px; margin: 6px 5px; border:  1px solid #d32929; font-size: 13px'>Cancel</p>
                    </div>
                </article>
            </div>
            <p style='font-size: 13px; color: white;'><i class="fa fa-info-circle"></i> Kindly ensure you select the appropriate networks for deposit.</p>
            <p style='font-size: 13px; color: #d32929; margin: 5px 0'> <i class="fa fa-info-circle"></i> Kindly ensure you send exact amount as added in your deposit</p>
            <p style='font-size: 13px; color: orange; margin: 5px 0'> <i class="fa fa-info-circle"></i>
                Important Notice: After sending the appropriate amount you want to deposit to the wallet, kindly send your name, email and transaction ID to this email: <?php echo $website_email; ?>
                then click on confirm to confirm your deposit so that your account will be funded immediately.
            </p>
        </div>

        <label for="">Select Assets</label>
        <!-- <input type="text" value='BTC' readonly><br> -->
        <select name="mode" id='select_input' style='text-align: left;' required>
            <option value="">Choose Asset</option>
            <option value="BTC">BTC</option>
            <option value="ETH">ETH</option>
            <option value="USDT">USDT</option>
            <option value="USDC">USDC</option>
            <!-- <option value="bank">Bank Transfer</option>
                <option value="paypal">Paypal</option>
                <option value="western">Wester Union</option> -->
        </select>

        <div id="input-item" style='display: none'>
            <label for="" id=''>Amount</label>
            <input type="text" id='input_amount'>
            <p class='dol'><i class='material-icons'>&#xe227;</i></p> <br>
        </div>
        <i style='font-size: 13px; color: var(--text); padding: 10px 0'><i class="fa fa-question-circle-o" style='font-size: 5px'></i> Deposit will appear in your account after payment is successfully made and approved by our team.</i><br><br><br><br>
    </form>

    <p id='modal_btn' style='padding: 10px 7px; font-weight: bold; text-align: center; background: dodgerblue; color: white; width: 130px; border-radius: 3px'>Make Payment</p>

    <p id="error" style='display: none'><?php echo $error ?></p>
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



    input_amount.addEventListener('keyup', function() {
        modal_amount.textContent = input_amount.value
        modal_amount_two.textContent = input_amount.value

    })

    select_input.addEventListener('change', function() {
        for (let i = 0; i < modal_type.length; i++) {
            modal_type[i].textContent = select_input.value
            input_item.style.display = 'block'
            if (select_input.value == "BTC") {
                label_amount.textContent = 'Amount (BTC)'
            } else if (select_input.value == "ETH") {
                label_amount.textContent = 'Amount (ETH)'
            } else if (select_input.value == "USDT") {
                label_amount.textContent = 'Amount (USDT)'
            } else if (select_input.value == "USDC") {
                label_amount.textContent = 'Amount (USDC)'
            } else if (select_input.value == 'bank') {
                swal("INFO!", "Contact Account Team to complete this request, Thank you. ", "info");
                setTimeout(() => {
                    window.location.href = 'pay'
                }, 5000);
            } else if (select_input.value == 'paypal') {
                swal("INFO!", "Contact Account Team to complete this request, Thank you. ", "info");
                setTimeout(() => {
                    window.location.href = 'pay'
                }, 5000);
            } else if (select_input.value == 'western') {
                swal("INFO!", "Contact Account Team to complete this request, Thank you. ", "info");
                setTimeout(() => {
                    window.location.href = 'pay'
                }, 5000);
            }
        }
    })

    modal_btn.addEventListener('click', function() {
        if (input_amount.value != "" || input_amount.value != 0) {
            if (select_input.value != "") {
                modal.style.display = 'block'

                if (select_input.value == "BTC") {
                    modal_amount.textContent = input_amount.value
                    modal_amount_two.textContent = input_amount.value

                    modal_btc_rate.textContent = input_amount.value
                    modal_btc_rate_two.textContent = input_amount.value
                    post_eth.value = ''
                    post_amount.value = input_amount.value
                    myInput.value = "<?php echo $bitcoin_address ?>"
                    console.log(qrcode.src = '../images/qrcode_img/<?php echo $bitcoin_img ?>')
                    changeQrcode("<?php echo $bitcoin_address ?>")
                } else if (select_input.value == "ETH") {
                    modal_amount.textContent = input_amount.value
                    modal_amount_two.textContent = input_amount.value

                    modal_btc_rate.textContent = input_amount.value
                    modal_btc_rate_two.textContent = input_amount.value
                    post_eth.value = ''
                    post_amount.value = input_amount.value
                    myInput.value = "<?php echo $eth_address ?>"
                    console.log(qrcode.src = '../images/qrcode_img/<?php echo $eth_img ?>')
                    changeQrcode("<?php echo $eth_address ?>")

                } else if (select_input.value == "USDT") {
                    modal_amount.textContent = input_amount.value
                    modal_amount_two.textContent = input_amount.value

                    modal_btc_rate.textContent = input_amount.value
                    modal_btc_rate_two.textContent = input_amount.value
                    post_eth.value = ''
                    post_amount.value = input_amount.value
                    myInput.value = "<?php echo $usdt_address ?>"
                    console.log(qrcode.src = '../images/qrcode_img/<?php echo $usdt_img ?>')
                    changeQrcode("<?php echo $usdt_address ?>")
                } else if (select_input.value == "USDC") {
                    modal_amount.textContent = input_amount.value
                    modal_amount_two.textContent = input_amount.value

                    modal_btc_rate.textContent = input_amount.value
                    modal_btc_rate_two.textContent = input_amount.value
                    post_eth.value = ''
                    post_amount.value = input_amount.value
                    myInput.value = "<?php echo $usdc_address ?>"
                    console.log(qrcode.src = '../images/qrcode_img/<?php echo $usdc_img ?>')
                    changeQrcode("<?php echo $usdc_address ?>")
                }

            } else {
                alert("Input's cannot be empty")
            }
        } else {
            alert("Input's cannot be empty")
        }
    })

    cancel.addEventListener('click', function() {
        modal.style.display = 'none'
    })


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
        setTimeout(() => {
            swal("SUCCESS!", "Your Transaction is been processed...", "success");
            window.location.href = 'trade-history'
        }, 3000);
    } else if (error.textContent == "error") {
        swal("ERROR!", "Sorry an error occurred. Please try again later", "warning");
    }



    // var xhr = new XMLHttpRequest();
    //         xhr.onreadystatechange = function () {
    //             console.log(xhr.responseText)
    //         }
    //         xhr.open('GET', 'https://min-api.cryptocompare.com/data/price?fsym=BTC&tsyms=USD,BTC,ETH', true)
    //         xhr.send()
</script>
<?php include "../includes/footer.php"; ?>
<script src="js/jquery.min.js"></script>
<script src="js/qrcode.min.js"></script>
<script>
    function changeQrcode(data) {
        // document.getElementById("qrcode").innerHtml = ""
        $("#qrcode").empty()
        var qrcode = new QRCode(document.getElementById("qrcode"), {
            text: data,
            width: 100,
            height: 100,
            colorDark: "#000000",
            colorLight: "#ffffff",
            padding: 1,
            correctLevel: QRCode.CorrectLevel.H
        });
    }
</script>