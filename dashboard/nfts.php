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
        height: 250px;
        margin-bottom:5px; 
        border-radius: 10px;
    }
    @media screen and (min-width: 768px) {
        .nft-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
        }
        .nft-container article {
            width: 250px;
        }
    }

    @media screen and (min-width: 1200px) {
        .nft-container article {
            width: 300px;
        }
        .nft-container {
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
        <h4>NFT Collections</h4><br><br><br>
        <div class="nft-container">
            <?php 
                $sql = "SELECT * FROM nft";
                $result = $connection->query($sql);
                while ($row = $result->fetch_assoc()) {
                    $nft_id = $row['nft_id'];
                    $name = $row['name'];
                    $image = $row['image'];
                    $amount = $row['amount'];
            ?>
            <article>
                <img src="../nft-images/<?php echo $image?>">
                <h4 style='color: var(--text)'><?php echo $name?></h4>
                <p style='font-size: 13px; margin: 5px 0; display: flex; justify-content: space-between'>
                <span><span class='eth_price'><?php echo $amount?></span> ETH</span>
                <span><span class='eth_us'><?php echo $amount?></span> USD</span>
                </p>
                <a href="nft_checkout?id=<?php echo $nft_id?>"><p style='color: dodgerblue; font-weight: bold'>Place a bid</p></a>
            </article>
            <?php }?>

        </div><br><br><br><br><br><br><br><br><br><br>
 </div>        
        <p id="currency" style='display:none'></p>
        <p id="eth_rate" style='display:none'></p>
        <input type="hidden" id="x_rate">


<script>
var eth_price = document.querySelectorAll('.eth_price');
var eth_us = document.querySelectorAll('.eth_us');
var currency = document.getElementById('currency');
var eth_rate = document.getElementById('eth_rate');
var x_rate = document.getElementById('x_rate');

    var rate = "https://min-api.cryptocompare.com/data/price?fsym=BTC&tsyms=USD,BTC,ETH"
        fetch(rate)
    .then(response => response.json())
    .then(data => console.log(currency.textContent = data.USD));

    var eth = "https://min-api.cryptocompare.com/data/price?fsym=BTC&tsyms=USD,BTC,ETH"
        fetch(eth)
    .then(response => response.json())
    .then(data => console.log(eth_rate.textContent = data.ETH));

setTimeout(() => {
    x_rate.value = currency.textContent / eth_rate.textContent
    for (let i = 0; i < eth_price.length; i++) {
        eth_us[i].textContent = Math.round(eth_price[i].textContent * x_rate.value)
    }
}, 3000);

</script>

<?php  include "../includes/footer.php"; ?>
