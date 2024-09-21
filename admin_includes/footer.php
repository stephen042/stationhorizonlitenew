
   <div id="mode" style='display: none'><?php echo $mode?></div>
   </div>
    <script src="../assets/dashboard.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
    }else if (mode.textContent == "dark") {
        root.classList.remove('dark-mode')
    }
// dark/light mode toggle end

var trade_button = document.querySelectorAll('.trade_button');
var trade_amount = document.getElementById('trade_amount');
var trade_pair = document.getElementById('trade_pair');
for (let i = 0; i < trade_button.length; i++) {
    trade_button[i].addEventListener('click', function () {
        if (trade_pair.value == "" && trade_amount.value == "") {
            swal("ERROR!", "Input's cannot be empty", "warning");        
        }else {
            swal("INFO!", "Unable to complete trade at this time", "info");        
        }
    })
}
    </script>
</body>
</html>