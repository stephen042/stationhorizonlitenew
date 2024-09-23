<div id="mode" style='display: none'><?php echo $mode ?></div>
</div>

<div id="random_count" style='display: none'></div>

<script src="../assets/dashboard.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Begin of Chaport Live Chat code -->
<script type="text/javascript">
    (function(w, d, v3) {
        w.chaportConfig = {
            appId: '66e77bd87319957c7904ac5f'
        };

        if (w.chaport) return;
        v3 = w.chaport = {};
        v3._q = [];
        v3._l = {};
        v3.q = function() {
            v3._q.push(arguments)
        };
        v3.on = function(e, fn) {
            if (!v3._l[e]) v3._l[e] = [];
            v3._l[e].push(fn)
        };
        var s = d.createElement('script');
        s.type = 'text/javascript';
        s.async = true;
        s.src = 'https://app.chaport.com/javascripts/insert.js';
        var ss = d.getElementsByTagName('script')[0];
        ss.parentNode.insertBefore(s, ss)
    })(window, document);
</script>
<!-- End of Chaport Live Chat code -->
<script>
    // get current btc rate
    var btc = document.querySelectorAll('.btc')
    for (let i = 0; i < btc.length; i++) {
        var url = 'https://blockchain.info/tobtc?currency=USD&value=<?php echo $balance ?>'
        fetch(url)
            .then(response => response.json())
            .then(data => console.log(btc[i].textContent = data));
    }
    // get current btc rate end

    // dark/light mode toggle
    var mode = document.getElementById('mode');
    if (mode.textContent == "light") {
        root.classList.add('dark-mode')
    } else if (mode.textContent == "dark") {
        root.classList.remove('dark-mode')
    }
    // dark/light mode toggle end

    var trade_button = document.querySelectorAll('.trade_button');
    var trade_amount = document.getElementById('trade_amount');
    var trade_pair = document.getElementById('trade_pair');
    var trade_pair1 = document.getElementById('trade_pair_one');
    var trade_pair2 = document.getElementById('trade_pair_two');
    var trade_pair3 = document.getElementById('trade_pair_three');

    var trade_pair_v1 = document.getElementById('trade_pair_one_v');
    var trade_pair_v2 = document.getElementById('trade_pair_two_v');
    var trade_pair_v3 = document.getElementById('trade_pair_three_v');

    var account_type = document.getElementById('account_type');
    var loader_img = document.getElementById('loader_img');
    var random_count = document.getElementById('random_count');
    var ac_item = document.getElementById('ac_item');
    var ac_name = document.getElementById('ac_name');
    var ac_price = document.getElementById('ac_price');
    var type_exe = document.getElementById('type_exe');
    var stop_loss = document.getElementById('stop_loss');
    var take_profit = document.getElementById('take_profit');


    var x = Math.random() * 2;
    var y = Math.floor(x);
    random_count.textContent = y

    account_type.addEventListener('change', function() {
        if (account_type.value == 'demo') {
            ac_item.style.display = 'block'
            ac_name.textContent = 'Demo Account'
            ac_price.textContent = '100,000.00'
            if (trade_pair1.value == "" && trade_pair2.value == "" && trade_pair3.value == "" && trade_amount.value == "") {
                swal("ERROR!", "Input's cannot be empty", "warning");
            } else {
                for (let i = 0; i < trade_button.length; i++) {
                    trade_button[i].addEventListener('click', function() {
                        if (trade_amount.value == "") {
                            alert("Input's cannot be empty")
                        } else {
                            loader_img.style.display = 'block'
                            setTimeout(() => {
                                loader_img.style.display = 'none'
                                if (random_count.textContent == 0) {
                                    swal("Trade Status!", "Trade Won", "success");
                                    setTimeout(() => {
                                        window.location.href = 'index'
                                    }, 3000);
                                } else {
                                    swal("Trade Status!", "Trade Loss", "error");
                                    setTimeout(() => {
                                        window.location.href = 'index'
                                    }, 3000);
                                }
                            }, 3000);

                        }
                    })
                }
            }
        } else {
            for (let i = 0; i < trade_button.length; i++) {
                ac_item.style.display = 'block'
                ac_name.textContent = 'Real Account'
                ac_price.textContent = '<?php echo number_format($balance, 2) ?>'

                trade_button[i].addEventListener('click', function() {
                    if (trade_pair1.value == "" && trade_pair2.value == "" && trade_pair3.value == "" && trade_amount.value == "") {
                        swal("ERROR!", "Input's cannot be empty", "warning");
                    } else {
                        var xhr = new XMLHttpRequest();
                        var data = new FormData();
                        data.append('trade_pair', trade_pair.value)
                        data.append('pair', trade_pair_one_v.value)
                        data.append('pair2', trade_pair_two_v.value)
                        data.append('pair3', trade_pair_three_v.value)
                        data.append('trade_amount', trade_amount.value)
                        data.append('trade_pair', trade_pair.value)
                        data.append('type_exe', type_exe.value)
                        data.append('stop_loss', stop_loss.value)
                        data.append('take_profit', take_profit.value)
                        xhr.onreadystatechange = function() {
                            if (xhr.responseText == 'minimum') {
                                swal("INFO!", "Minimum Trade is 100 USD", "info");
                            } else if (xhr.responseText == 'insufficient') {
                                swal("ERROR!", "Insufficient Balance", "warning");
                            } else if (xhr.responseText == 'success') {
                                trade_button[i].disabled = true
                                swal("SUCCESS!", "Your Trade Request was successful", "success");
                                setTimeout(() => {
                                    window.location.href = 'index'
                                }, 3000);
                            }
                        }
                        xhr.open('POST', '../database/trade_script.php', true);
                        xhr.send(data);
                        // swal("INFO!", "Unable to complete trade at this time", "info");
                    }
                })

                trade_pair.addEventListener('change', function() {
                    if (trade_pair.value == 'cryptocurrency') {
                        trade_pair1.style.display = 'block'
                        trade_pair2.style.display = 'none'
                        trade_pair3.style.display = 'none'
                        for (let i = 0; i < trade_button.length; i++) {
                            trade_button[i].addEventListener('click', function() {
                                if (trade_pair1.value == "" && trade_amount.value == "") {
                                    swal("ERROR!", "Input's cannot be empty", "warning");
                                } else {
                                    // swal("INFO!", "Unable to complete trade at this time", "info");
                                }
                            })
                        }
                    } else if (trade_pair.value == 'stock') {
                        trade_pair1.style.display = 'none'
                        trade_pair2.style.display = 'block'
                        trade_pair3.style.display = 'none'
                    } else if (trade_pair.value == 'indices') {
                        trade_pair1.style.display = 'none'
                        trade_pair2.style.display = 'none'
                        trade_pair3.style.display = 'block'
                    }
                })
            }
        }
    })
</script>
</body>

</html>