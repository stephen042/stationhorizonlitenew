<?php  include "../includes/header.php"; ?>

<style>
    .container {
        padding: 15px;
        border-radius: 5px;
        color: var(--text-color);
    }
    form input {
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
    #dol {
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

    .container-grid article{
        padding: 10px;
        margin: 15px 5px;
        border-radius: 5px;
        background: var(--dark-blue);
        text-align: left;
        line-height: 30px;
    }
    .container-grid article ul {
        padding: 5px 20px;
        font-size: 13px
    }
    .container-grid article ul .fa {
        color: dodgerblue;
        margin-right: 10px;
    }
    .container-grid article button {
        padding: 10px 100px;
        margin: 10px 0;
        background: dodgerblue;
        border: 1px solid transparent;
        color: var(--text-color);
        border-radius: 3px;
    }
    .container-grid-2 {
        text-align: center;
        display: none;
    }
    .container-grid-2 ul li {
        padding: 10px;
        border: 2px solid dodgerblue;
        margin: 30px 20%;
        color: dodgerblue;
    }
    .container-grid-2 ul li:hover {
        background: dodgerblue;
        color: white;
    }
    .countdown button{
        padding: 5px 30px;
        margin: 5px;
        background: dodgerblue;
        color: white;
        border-radius: 3px;
        border: 1px solid transparent;
    }
    .countdown ul {
        display: flex; 
        justify-content: center; 
        background: #808080; 
        width:120px; 
        padding: 0px 15px; 
        border-radius: 3px;
    }
    .countdown li {
        background: black;
        padding: 5px 8px;
        border-radius: 3px;
        margin: 5px;
    }
    #address {
        color: orange;
        background: transparent;
        border: 1px solid transparent;
        font-weight: bold;
    }
   
    @media screen and (min-width: 768px) {
        .container-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
        }
    }

    @media screen and (min-width: 1200px) {
        .container-grid {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
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
       <h3>TRADING SIGNAL PLANS</h3><br>
       <div class="container-grid" >
            <article>
                <h4 style='color: dodgerblue' class='signal'>1 Month Plan</h4>
                <ul>
                    <li><i class="fa fa-check-circle"></i> Direct Trading Signals from the Brokerage.</li>
                    <li><i class="fa fa-check-circle"></i> 24/7 access to trading.</li>
                    <li><i class="fa fa-check-circle"></i> Increased asset leverage: up-to 70x.</li>
                </ul>
                <h4 style='color: var(--text)'>Price: $<span class='price'>1,500</span></h4>
                <center><button class='btn'>BUY PLAN</button></center>
            </article>

            <article>
                <h4 style='color: dodgerblue' class='signal'>2 Months Plan</h4>
                <ul>
                    <li><i class="fa fa-check-circle"></i> Direct Trading Signals from the Brokerage.</li>
                    <li><i class="fa fa-check-circle"></i> 24/7 access to trading.</li>
                    <li><i class="fa fa-check-circle"></i> Exclusive Account manager features.</li>
                    <li><i class="fa fa-check-circle"></i> Daily Market Reviews and Financial research.</li>
                    <li><i class="fa fa-check-circle"></i> Increased asset leverage: up-to 70x.</li>
                </ul>
                <h4 style='color: var(--text)'>Price: $<span class='price'>2,000</span></h4>
                <center><button class='btn'>BUY PLAN</button></center>
            </article>

            <article>
                <h4 style='color: dodgerblue' class='signal'>3 Months Plan</h4>
                <ul>
                    <li><i class="fa fa-check-circle"></i> Direct Trading Signals from the Brokerage.</li>
                    <li><i class="fa fa-check-circle"></i> 24/7 access to trading.</li>
                    <li><i class="fa fa-check-circle"></i> Exclusive Account manager features.</li>
                    <li><i class="fa fa-check-circle"></i> Daily Market Reviews and Financial research.</li>
                    <li><i class="fa fa-check-circle"></i> Priority Futures Market trading.</li>
                    <li><i class="fa fa-check-circle"></i> Increased asset leverage: up-to 70x.</li>
                </ul>
                <h4 style='color: var(--text)'>Price: <strike style='color: red'>$3,500</strike> $<span class='price'>2,500</span></h4>
                <center><button class='btn'>BUY PLAN</button></center>
            </article>
       </div>

       <div class="container-grid-2">
           <h4>Choose a coin to pay with </h4><br>
           <ul>
                <li class='type_btn'>BITCOIN</li>
                <li class='type_btn'>ETHEREUM</li>
                <li class='type_btn'>USDT</li>
           </ul>
       </div>

       <center>
       <div class="countdown" style='display: none'>
           <h4>Payment will cancel in...</h4><br>
              <ul>
                 <li id='min'>9</li>
                 <li style='padding: 5px 10px'>:</li>
                 <li id='sec'>00</li>
              </ul><br>
              <p>Generated Wallet Address</p>
              <input type="text" value="" id='address'><br>
              <button class='countdown_btn' onclick='myFunction()'>Copy</button>
              <div>
                <button class='countdown_btn' style='background: #26A69A' onclick='done_btn()'>Done</button>
                <button class='countdown_btn' style='background: #EF5350' onclick='cancel_btn()'>Cancel</button>
              </div>
       </div>
       </center>
 </div>

 <input type="text" name='price' hidden id='price_input' readonly><br>
 <input type="text" name='signal_name' hidden id='signal_name' readonly>
 <input type="text" name='type' hidden id='type' readonly>
 <p id="error" style='display: none; background: red'><?php echo $error?></p>


<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    var btn = document.querySelectorAll('.btn');
    var price = document.querySelectorAll('.price');
    var signal = document.querySelectorAll('.signal');
    var type_btn = document.querySelectorAll('.type_btn');
    var price_input = document.getElementById('price_input');
    var signal_name = document.getElementById('signal_name');
    var type = document.getElementById('type');
    var container_grid = document.querySelector('.container-grid');
    var container_grid2 = document.querySelector('.container-grid-2');
    var countdown = document.querySelector('.countdown');
    var min = document.getElementById('min');
    var sec = document.getElementById('sec');
    var address = document.getElementById('address');

    for (let i = 0; i < btn.length; i++) {
        btn[i].addEventListener('click', function () {
            let price_text = price[i].textContent.replace(",", "")
            price_input.value = price_text
            signal_name.value = signal[i].textContent
            container_grid.style.display = 'none'
            container_grid2.style.display = 'block'
        })

        type_btn[i].addEventListener('click', function () {
                type.value = type_btn[i].textContent
                container_grid2.style.display = 'none'
                countdown.style.display = 'block'

                if (type.value == "BITCOIN") {
                    address.value = "<?php echo $bitcoin_address?>";
                }
                else if (type.value == "ETHEREUM") {
                    address.value = "<?php echo $eth_address?>"
                }else if (type.value == "USDT") {
                    address.value = "<?php echo $usdt_address?>"
                }

            })
    }

    setInterval(() => {
        sec.textContent--;
        if (sec.textContent <= -1) {
            sec.textContent = 59;
            min.textContent--
        }

        if (min.textContent == 0 && sec.textContent == 0) {
            window.location.href = 'index'
        }
    }, 1000);

    function done_btn() {
        data = new FormData();
        data.append("price", price_input.value);
        data.append("signal_name", signal_name.value)
        data.append("type", type.value)
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.responseText == "insufficient") {
                swal("ERROR!", "Insufficient Funds", "error");
            }else if (xhr.responseText == "error") {
                swal("ERROR!", "Sorry an error occurred. Please try again", "error");                
            }else if (xhr.responseText == "success") {
                swal("INFO!", "Your payment is pending, check history to see the status of your payment", "info"); 
                setTimeout(() => {
                    window.location.href = 'trade-history'
                }, 4000);               
            }
        }
        xhr.open("POST", "../database/signal_script.php", true);
        xhr.send(data);
    }

    function myFunction() {
        var copyText = document.getElementById("address");
        copyText.select();
        copyText.setSelectionRange(0, 99999); 
        navigator.clipboard.writeText(copyText.value);
        swal("INFO!", "Copied the text:"+ copyText.value, "info");
    }

    function cancel_btn() {
        window.location.href = 'index'
    }
</script>


<?php  include "../includes/footer.php"; ?>
