<?php
include "../includes/header.php";
?>

<style>
    .refer {
        padding: 10px;
    }

    .refer article {
        padding: 20px 10px;
        border-radius: 3px;
        border: 1px solid var(--dark-blue);
        background: var(--dark-blue);
    }

    .refer article:nth-child(2) {
        display: flex;
        align-items: center;
        justify-content: center;
        background: transparent;
        padding: 25px 0;
    }

    .refer input {
        padding: 6.5px 10px;
        background-color: var(--dark-blue);
        color: #6494AE;
        border: 2px solid transparent;
        outline: 2px solid transparent;
    }

    .refer span {
        background: var(--dark-blue);
        padding: 7px 5%;
    }

    .container-grid article,
    .container-grid2 article {
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: var(--text);
        padding: 10px;
        background: red;
        border-radius: 5px;
        background: linear-gradient(#0e8eca, #0e85ca);
        line-height: 25px;
        color: white;
        border-bottom: 3px solid #114575;
        margin: 5px;
    }

    .container-grid article:nth-child(2),
    .container-grid2 article {
        background: linear-gradient(#0eca82, #0eca82);
        border-bottom: 3px solid #11754f;
    }

    .container-grid article:nth-child(3) {
        background: linear-gradient(#6494AE, #162133);
        border-bottom: 3px solid #6494AE;
        /* padding: 30px 20px; */
    }

    .container-grid article:nth-child(4) {
        background: linear-gradient(#ebce4a, #e9bc40);
        border-bottom: 3px solid #ebb609;
    }

    .container-grid article i {
        font-size: 25px;
    }

    @media screen and (min-width: 768px) {
        .container-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

    }

    @media screen and (min-width: 1200px) {
        .refer {
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        .help {
            display: grid;
            grid-template-columns: 1fr 2fr 2fr;
        }

        .container-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

    }
</style>

<!-- TradingView Widget BEGIN -->
<div class="tradingview-widget-container">
    <div class="tradingview-widget-container__widget"></div>
    <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/markets/" rel="noopener"
            target="_blank"><span class="blue-text"></span></a></div>
    <script type="text/javascript"
        src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
        {
            "symbols": [{
                    "proName": "FOREXCOM:SPXUSD",
                    "title": "S&P 500"
                },
                {
                    "proName": "FOREXCOM:NSXUSD",
                    "title": "US 100"
                },
                {
                    "proName": "FX_IDC:EURUSD",
                    "title": "EUR/USD"
                },
                {
                    "proName": "BITSTAMP:BTCUSD",
                    "title": "Bitcoin"
                },
                {
                    "proName": "BITSTAMP:ETHUSD",
                    "title": "Ethereum"
                }
            ],
            "showSymbolLogo": true,
            <?php
            if ($mode == "light") {
                echo "\"colorTheme\": \"light\",";
            } else {
                echo "\"colorTheme\": \"dark\",";
            }
            ?> "isTransparent": false,
            "displayMode": "adaptive",
            "locale": "en"
        }
    </script>
</div>
<!-- TradingView Widget END -->

<!-- <div id="marquee"><marquee behavior="" direction=""><span id="demo"></span></marquee></div><br> -->
<script>
    var demo = document.getElementById('demo')
    setInterval(() => {
        code()
        // setTimeout(() => {
        // // demo.style.display = 'none'
        // }, 7000);
    }, 11000);


    function code() {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            demo.innerHTML = xhr.responseText
            demo.classList.add('demo-scroll')
            demo.style.display = 'block'
        }
        xhr.open('GET', '../random2.php', true);
        xhr.send();
    }
</script>

<div class="container">
    <div class="container-grid">
        <article>
            <span>
                <b style='font-size: 13px'>Capital</b><br>
                <span style='font-size: 18px;'>$<?php echo number_format($balance, 2) ?></span><br>
                <span style='font-size: 11px'>BTC <span class="btc"></span></span><br>
            </span>

            <span>
                <i class="material-icons">account_balance_wallet</i>
            </span>
        </article>

        <article>
            <span>
                <b style='font-size: 13px'>Accumulating Balance</b><br>
                <span class='btc-rate' hidden><?php echo $t_profit ?></span>
                <span style='font-size: 18px;'>$<span><?php echo number_format($t_profit, 2) ?></span></span><br>
                <span style='font-size: 11px'>BTC <span class="btc-amount"></span></span><br>
            </span>

            <span>
                <i class="material-icons">compare_arrows</i><br>
                <span>Bonus <br> <?php echo '$' . number_format($b_bonus, 2) ?></span>
            </span>
        </article>

        <article>
            <div style='display: unset'>
                <b style='font-size: 13px'>Trade Status</b><br>
                <div style='display: flex; justify-content: space-between'>
                    <span style='display: flex; align-items: center'>
                        <i class="fa fa-caret-up" style='font-size: 25px; color: #0ECA82;'></i>
                        <span style='padding: 0 10px; font-size: 14px;'><b><?php echo $won ?></b> <br>Total Won</span>
                    </span>

                    <span style='display: flex; align-items: center; transform: translateX(80%)'>
                        <i class="fa fa-caret-down" style='font-size: 25px; color: #EA4C47; '></i>
                        <span style='padding: 0 10px; font-size: 14px;'> <b><?php echo $loss ?></b> <br>Total Loss</span>
                    </span>
                </div>
            </div>
        </article>

        <article>
            <span>
                <b style='font-size: 13px'>Crypto Plan</b><br>
                <span style='font-size: 18px;'>
                    <?php
                    if ($package == "") {
                        echo "---";
                    } else {
                        echo $package;
                    }
                    ?>
                </span><br>
                <span style='font-size: 11px'>Package Status: <?php echo $package_status ?></span><br>
            </span>

            <span>
                <i class="material-icons">card_giftcard</i>
            </span>
        </article>
    </div>

    <div class='container-grid2'>
        <article>
            <span>
                <b style='font-size: 13px'>Profit</b><br>
                <span class='btc-rate' hidden><?php echo $b_profit ?></span>
                <span style='font-size: 18px;'>$<span><?php echo number_format($b_profit, 2) ?></span></span><br>
                <span style='font-size: 11px'>BTC <span class="btc-amount"></span></span><br>
            </span>

            <span>
                <i class="material-icons">compare_arrows</i>
            </span>
        </article>

    </div>
</div>

<div class="graph-widget" style="width: 95%; overflow: hidden; margin: 10px">
    <!-- TradingView Widget BEGIN -->
    <div id="tradingview_01a5c-wrapper" style="position: relative;box-sizing: content-box;width: 100%;height: calc(550px - 32px);margin: 0 auto !important;padding: 0 !important;font-family:Arial,sans-serif;">
        <div style="width: 100%;height: calc(550px - 32px);background: transparent;padding: 0 !important;"><iframe id="tradingview_01a5c" src="https://s.tradingview.com/widgetembed/?frameElementId=tradingview_01a5c&amp;symbol=COINBASE%3ABTCUSD&amp;interval=1&amp;hidesidetoolbar=0&amp;symboledit=1&amp;saveimage=1&amp;toolbarbg=f1f3f6&amp;studies=BB%40tv-basicstudies&amp;theme=<?php
                                                                                                                                                                                                                                                                                                                                                                                            if ($mode == "light") {
                                                                                                                                                                                                                                                                                                                                                                                                echo "light";
                                                                                                                                                                                                                                                                                                                                                                                            } else {
                                                                                                                                                                                                                                                                                                                                                                                                echo "dark";
                                                                                                                                                                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                                                                                                                                                                            ?>&amp;style=9&amp;timezone=Etc%2FUTC&amp;studies_overrides=%7B%7D&amp;overrides=%7B%7D&amp;enabled_features=%5B%5D&amp;disabled_features=%5B%5D&amp;locale=en&amp;utm_source=ppgg.cdfswave.com&amp;utm_medium=widget_new&amp;utm_campaign=chart&amp;utm_term=COINBASE%3ABTCUSD" style="width: 100%; height: 100%; margin: 0 !important; padding: 0 !important;" frameborder="0" allowtransparency="true" scrolling="no" allowfullscreen=""></iframe></div>
    </div>

    <div class="trading-graph"></div>
    <br><br>
    <div class="refer">
        <article style="line-height: 30px;">
            <h3 style="color: var(--text-color);">Refer Us & Earn</h3>
            <p style="font-size: 13px; color: #7CBBE3;">Use the link to invite your friends</p>
        </article>

        <article>
            <span style="padding: 7px 5px"><i class="fa fa-link"></i></span>
            <input type="text" id="myInput" readonly value="<?php echo $website_url ?>/public/register?ref=<?php echo $username ?>">
            <div style="font-size: 13px; padding: 8.5px 5px; color: dodgerblue;" onclick="myFunction()"><i class="fa fa-copy"></i>
                Copy</div>
        </article>
    </div>

    <div class="help" style="background: var(--dark-blue); margin: 2%; padding: 15px;">
        <article>
            <svg xmlns="http://www.w3.org/2000/svg" width='100px' viewBox="0 0 120 118">
                <path
                    d="M8.916,94.745C-.318,79.153-2.164,58.569,2.382,40.578,7.155,21.69,19.045,9.451,35.162,4.32,46.609.676,58.716.331,70.456,1.845,84.683,3.68,99.57,8.694,108.892,21.408c10.03,13.679,12.071,34.71,10.747,52.054-1.173,15.359-7.441,27.489-19.231,34.494-10.689,6.351-22.92,8.733-34.715,10.331-16.181,2.192-34.195-.336-47.6-12.281A47.243,47.243,0,0,1,8.916,94.745Z"
                    transform="translate(0 -1)" fill="#f6faff"></path>
                <rect x="18" y="32" width="84" height="50" rx="4" ry="4" fill="#fff"></rect>
                <rect x="26" y="44" width="20" height="12" rx="1" ry="1" fill="#e5effe"></rect>
                <rect x="50" y="44" width="20" height="12" rx="1" ry="1" fill="#e5effe"></rect>
                <rect x="74" y="44" width="20" height="12" rx="1" ry="1" fill="#e5effe"></rect>
                <rect x="38" y="60" width="20" height="12" rx="1" ry="1" fill="#e5effe"></rect>
                <rect x="62" y="60" width="20" height="12" rx="1" ry="1" fill="#e5effe"></rect>
                <path
                    d="M98,32H22a5.006,5.006,0,0,0-5,5V79a5.006,5.006,0,0,0,5,5H52v8H45a2,2,0,0,0-2,2v4a2,2,0,0,0,2,2H73a2,2,0,0,0,2-2V94a2,2,0,0,0-2-2H66V84H98a5.006,5.006,0,0,0,5-5V37A5.006,5.006,0,0,0,98,32ZM73,94v4H45V94Zm-9-2H54V84H64Zm37-13a3,3,0,0,1-3,3H22a3,3,0,0,1-3-3V37a3,3,0,0,1,3-3H98a3,3,0,0,1,3,3Z"
                    transform="translate(0 -1)" fill="#798bff"></path>
                <path
                    d="M61.444,41H40.111L33,48.143V19.7A3.632,3.632,0,0,1,36.556,16H61.444A3.632,3.632,0,0,1,65,19.7V37.3A3.632,3.632,0,0,1,61.444,41Z"
                    transform="translate(0 -1)" fill="#6576ff"></path>
                <path
                    d="M61.444,41H40.111L33,48.143V19.7A3.632,3.632,0,0,1,36.556,16H61.444A3.632,3.632,0,0,1,65,19.7V37.3A3.632,3.632,0,0,1,61.444,41Z"
                    transform="translate(0 -1)" fill="none" stroke="#6576ff" stroke-miterlimit="10"
                    stroke-width="2"></path>
                <line x1="40" y1="22" x2="57" y2="22" fill="none" stroke="#fffffe" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2"></line>
                <line x1="40" y1="27" x2="57" y2="27" fill="none" stroke="#fffffe" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2"></line>
                <line x1="40" y1="32" x2="50" y2="32" fill="none" stroke="#fffffe" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2"></line>
                <line x1="30.5" y1="87.5" x2="30.5" y2="91.5" fill="none" stroke="#9cabff" stroke-linecap="round"
                    stroke-linejoin="round"></line>
                <line x1="28.5" y1="89.5" x2="32.5" y2="89.5" fill="none" stroke="#9cabff" stroke-linecap="round"
                    stroke-linejoin="round"></line>
                <line x1="79.5" y1="22.5" x2="79.5" y2="26.5" fill="none" stroke="#9cabff" stroke-linecap="round"
                    stroke-linejoin="round"></line>
                <line x1="77.5" y1="24.5" x2="81.5" y2="24.5" fill="none" stroke="#9cabff" stroke-linecap="round"
                    stroke-linejoin="round"></line>
                <circle cx="90.5" cy="97.5" r="3" fill="none" stroke="#9cabff" stroke-miterlimit="10"></circle>
                <circle cx="24" cy="23" r="2.5" fill="none" stroke="#9cabff" stroke-miterlimit="10"></circle>
            </svg>
        </article>

        <article>
            <h4 style="color: var(--text-color);">We’re here to help you!</h4><br>
            <p style="font-size: 15px; line-height: 20px; color: #6494AE;">Ask a question by using the live chat
                button. Our support team will get back to you by email.</p>
        </article>

        <article>
            <a href="mailto:<?php echo $website_email ?>" style='color:dodgerblue'><button style="padding: 10px 15px; margin: 10px 0; color: dodgerblue; background: transparent; border: 2px solid dodgerblue; border-radius: 3px;">Get Support Now</button></a>
        </article>
    </div>

</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    function myFunction() {
        var copyText = document.getElementById("myInput");
        copyText.select();
        copyText.setSelectionRange(0, 99999);
        navigator.clipboard.writeText(copyText.value);
        swal("INFO!", "Copied the text:" + copyText.value, "info");
    }

    // get current btc rate
    var btc_rate = document.querySelectorAll('.btc-rate');
    var btc_amount = document.querySelectorAll('.btc-amount');

    for (let i = 0; i < btc_rate.length; i++) {
        var url = 'https://blockchain.info/tobtc?currency=USD&value=' + btc_rate[i].textContent
        fetch(url)
            .then(response => response.json())
            .then(data => console.log(btc_amount[i].textContent = data));
        btc_rate[i].textContent
    }
    // get current btc rate end

    // https://min-api.cryptocompare.com/data/price?fsym=BTC&tsyms=USD,BTC,ETH
</script>

<?php include "../includes/footer.php"; ?>