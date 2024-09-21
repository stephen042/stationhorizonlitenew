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
        padding: 50px 10px;
        margin: 15px 5px;
        border-radius: 5px;
        background: var(--dark-blue);
        text-align: center;
        line-height: 30px;
    }
    .container-grid article button {
        padding: 10px 20px;
        background: dodgerblue;
        border: 1px solid transparent;
        color: var(--text-color);
        border-radius: 3px;
    }
   
    @media screen and (min-width: 768px) {
        .container-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
        }
    }

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
       <h2>Loyalty Level Upgrade</h2><br>
       <div class="container-grid">
            <article>
                <h2 class='packageText'>Silver</h3>
                <div style='margin: 4px 0; font-weight: bold'>$<span class='price'>500</span> - 4999</div>
                <p style='font-size: 13px; color: var(--text)'><span class='btc-price'>0</span> BTC</p>
                <button class='form-btn'>Choose this plan</button>
            </article>

            <article>
                <h2 class='packageText'>Gold</h3>
                <div style='margin: 4px 0; font-weight: bold'>$<span class='price'>5000</span> - 14999</div>
                <p style='font-size: 13px; color: var(--text)'><span class='btc-price'>0</span> BTC</p>
                <button class='form-btn'>Choose this plan</button>
            </article>

            <article>
                <h2 class='packageText'>Diamond</h3> 
                <div style='margin: 4px 0; font-weight: bold'>$<span class='price'>15000</span> - 49999</div>
                <p style='font-size: 13px; color: var(--text)'><span class='btc-price'>0</span> BTC</p>
                <button class='form-btn'>Choose this plan</button>
            </article>

            <article>
                <h2 class='packageText'>Elite</h3>
                <div style='margin: 4px 0; font-weight: bold'>$<span class='price'>50000</span> - 100000</div>
                <p style='font-size: 13px; color: var(--text)'><span class='btc-price'>0</span> BTC</p>
                <button class='form-btn'>Choose this plan</button>
            </article>
       </div>
 </div>

 <input type="text" name='price' hidden id='price_input' readonly><br>
 <input type="text" name='package' hidden id='package_name' readonly>
 <p id="error" style='display: none; background: red'><?php echo $error?></p>


<script>
    var price = document.querySelectorAll('.price');
    var packageText = document.querySelectorAll('.packageText');
    var btc_price = document.querySelectorAll('.btc-price');
    var form_btn = document.querySelectorAll('.form-btn');
    var price_input = document.querySelector('#price_input');
    var package_name = document.querySelector('#package_name');
    var error = document.getElementById('error');
    
   // get current btc rate
    for (let i = 0; i < price.length; i++) {
    var url = 'https://blockchain.info/tobtc?currency=USD&value='+price[i].textContent
        fetch(url)
    .then(response => response.json())
    .then(data => console.log(btc_price[i].textContent = data));
}
// get current btc rate end

    for (let i = 0; i < form_btn.length; i++) { 
        form_btn[i].addEventListener('click', function () {
            price_input.value = price[i].textContent
            package_name.value = packageText[i].textContent
            if (confirm('Do you wish to continue')) {
                // ajax call to purchase plan
                var xhr = new XMLHttpRequest();
                var data = new FormData()
                data.append('price', price_input.value)
                data.append('package', package_name.value)
                xhr.onreadystatechange = function () {
                    error.textContent = xhr.responseText;
                    if (error.textContent == "insufficient") {
                        swal("ERROR!", "Insufficient Funds", "warning");
                    }else if (error.textContent == "success") {
                        swal("SUCCESS!", "Your Crypto Plan Purchase was successful", "success");        
                        setTimeout(() => {
                            window.location.href = 'trade-history'
                        }, 3000);
                    }else if (error.textContent == "error") {
                        swal("ERROR!", "Sorry an error occurred. Please try again later", "warning");        
                    }

                }
                xhr.open('POST', '../database/package_script.php', true);
                xhr.send(data)
                // ajax call to purchase plan end
            }
        })     
    }
    </script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



<?php  include "../includes/footer.php"; ?>
