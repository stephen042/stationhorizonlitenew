<?php 
require 'session.php'; 

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Smartsupp Live Chat script -->
<script type="text/javascript">
var _smartsupp = _smartsupp || {};
_smartsupp.key = '08999d0d4094fef8fd37cfa15a551a78b78e02cc';
window.smartsupp||(function(d) {
  var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
  s=d.getElementsByTagName('script')[0];c=d.createElement('script');
  c.type='text/javascript';c.charset='utf-8';c.async=true;
  c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
})(document);
</script>
<noscript> Powered by <a href=“https://www.smartsupp.com” target=“_blank”>Smartsupp</a></noscript>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello <?php echo $username ?>, welcome to <?php echo $website_name ?></title>
    <link rel="shortcut icon" href="../images/$logo_img" type="image/x-icon">
    <link rel="stylesheet" href="../assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../assets/dashboard.css">
    <link rel="stylesheet" href="../includes/selectable/jquery-select7.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../includes/selectable/jquery-select7.js"></script>
    <!-- <script src="../includes/selectable/alert.js"></script> -->
    <style>
        .select7__current {
            background: var(--dark-blue);
            color: var(--text);
            width: 240px;
            border: 1px solid transparent;
        }

        @media screen and (max-width: 789px) {
            .select7__current {
                width: 280px;
            }
        }
    </style>
</head>

<body>
    <?php
    $activePage = basename($_SERVER['PHP_SELF'], ".php");
    ?>

    <nav>
        <article>
            <ul>
                <li style="display: flex; align-items: center;">
                    <i class="material-icons" id='bars' style="color: #6494AE;">menu</i>
                    <img src="../images/<?php echo $logo_img ?>" width="110px">
                </li>

                <?php
                if ($activePage == "index") {
                    echo "<li style='transform: translateY(-15px)'>
                                <button id='nav-trade-btn'>Trade</button>
                                <button class='dropdown-btn' style='overflow:hidden; width: 60px; height: 60px; border: 1px solid transparent; transform: translateY(10px)'><img src='../images/$image' width='100%' height='100%' style='border-radius: 50%'></button>
                             </li>";
                } else {
                    echo "<li style='transform: translateY(-15px)'>
                                <a href ='index'><button id='nav-trade-btn'>Trade</button></a>
                                <button class='dropdown-btn' style='overflow:hidden; width: 60px; height: 60px; border: 1px solid transparent; transform: translateY(10px)'><img src='../images/$image' width='100%' height='100%' style='border-radius: 50%'></button>
                             </li>";
                }
                ?>
            </ul>
        </article>

        <article>
            <ul>
                <!-- <li
                    style="display: flex; align-items: center; justify-content: center; font-size: 14px; font-weight: bold;">
                    <span style="color: var(--text);">CXC</span>
                    <span style="color: #0fec73; margin: 0 20px; transform: translateY(-5px);"><i
                            class="material-icons">keyboard_arrow_up</i> +29.6%</span>
                </li> -->
                <li><img src="../images/<?php echo $logo_img ?>" width="130px"></li>
                <li style="display: flex; justify-content: space-between; align-items: center;">
                    <article style="display: flex; padding: 5px;">
                        <img src="../images/dollar-sign.svg" width="40px" style="margin-right: 5px;">
                        <div style="font-size: 15px;">
                            <b style='color: var(--text-color)'>Real Account</b><br>
                            <span style="font-size: 12px; color: #0BC2D2;"><?php echo number_format($balance, 2) ?> USD</span><br>
                            <span style="font-size: 12px; color: #7CBBE3;"><span class="btc"></span> BTC <br>
                                <span style="font-size: 12px; color: #7CBBE3; display: none"><span><?php echo $eth_balance ?></span> ETH

                                </span>
                        </div>
                    </article>

                    <article style="margin: 0 10px;" id='dropdown-btn'>
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <button style='overflow:hidden; width: 50px; height: 50px; border: 1px solid transparent'><img src="../images/<?php echo $image ?>" width="100%" height='100%' style='border-radius: 50%'></button>
                            <span style="font-size: 12px; margin: 0 10px;">
                                <span style="color: #0fec73;">verified</span><br>
                                <span style="color: var(--text-color);"><?php echo $full_name ?></span>
                            </span>
                        </div>
                    </article>
                </li>
            </ul>

        </article>

    </nav>

    <br><br>
    <br><br>
    <div class="side-panel-left" style="padding: 10px;">
        <ul>
            <!-- <li id="side-bal-m"
                style=" padding: 5px; border-top: 1px solid #bbd8ff70; border-bottom: 1px solid #bbd8ff70; padding: 10px;">
                <img src="../images/dollar-sign.svg" width="40px" style="margin-right: 5px;">
                <div style="font-size: 15px;">
                    <b>Real Account</b><br>
                    <span style="font-size: 12px; color: #0BC2D2;"><?php echo number_format($balance, 2) ?>USD</span><br>
                    <span style="font-size: 12px; color: #7CBBE3;"><span class="btc"></span> BTC<br>
                    <span style="font-size: 12px; color: #7CBBE3;"><span><?php echo $eth_balance ?></span> ETH
                    </span>
                </div>
            </li> -->

            <!-- <li id='side-bal-d'
                style=" padding: 5px; border-top: 1px solid #bbd8ff70; border-bottom: 1px solid #bbd8ff70; padding: 10px;"><br>
                <p style="font-size: 13px;">AVAILABLE BALANCE</p><br>
                <p style="font-size: 15px; color: #0971fe;"><span class="btc"></span> <sub style="font-size: 10px;">BTC</sub></p><br>
                <p style="font-size: 15px;"><?php echo number_format($balance, 2) ?> <sub style="font-size: 10px;">USD</sub></p>
                <p style="font-size: 15px;"><?php echo $eth_balance ?> <sub style="font-size: 10px;">ETH</sub></p>
            </li> -->

            <br>
            <?php
            if ($role == "admin") {
                echo "<br> <a href ='../admin/index'><li>Admin Dashboard</li></a>";
            }
            ?>
            <a href="index">
                <li class="<?= ($activePage == "index") ? 'active' : ''; ?>"><i class="material-icons">dashboard</i> Dashboard</li>
            </a>
            <span style="font-size: 10px; font-weight: bold; padding: 0 10px; color: #6494AE;">APPS</span>
            <a href="market">
                <li class="<?= ($activePage == "market") ? 'active' : ''; ?>"><i class="material-icons">insert_chart</i> Market</li>
            </a>
            <a href="pay">
                <li class="<?= ($activePage == "pay") ? 'active' : ''; ?>"><i class="material-icons"> credit_card</i> Deposit</li>
            </a>
            <a href="fund_transfer">
                <li class="<?= ($activePage == "fund_transfer") ? 'active' : ''; ?>"><i class="material-icons"> credit_card</i> Fund Transfer</li>
            </a>
            <a href="withdrawal">
                <li class="<?= ($activePage == "withdrawal") ? 'active' : ''; ?>"><i class="material-icons">account_balance_wallet</i> Withdrawal </li>
            </a>
            <!-- <a href="nfts"><li class="<?= ($activePage == "nft") ? 'active' : ''; ?>"><i class="material-icons">image</i> NFTs </li></a> -->
            <a href="trade-history">
                <li class="<?= ($activePage == "trade-history") ? 'active' : ''; ?>"><i class="material-icons">repeat</i> History </li>
            </a>
            <a href="t_history">
                <li class="<?= ($activePage == "t_history") ? 'active' : ''; ?>"><i class="material-icons">repeat</i> Trade History </li>
            </a>
            <a href="crypto">
                <li class="<?= ($activePage == "crypto") ? 'active' : ''; ?>"><i class="material-icons">verified_user</i> Packages</li>
            </a>
            <a href="signal">
                <li class="<?= ($activePage == "signal") ? 'active' : ''; ?>"><i class="material-icons">online_prediction</i> Signal</li>
            </a>
            <a href="kyc">
                <li class="<?= ($activePage == "kyc" || $activePage == "kyc-form") ? 'active' : ''; ?>"><i class="material-icons">content_copy</i> AML / KYC</li>
            </a>
            <a href="settings">
                <li class="<?= ($activePage == "settings" || $activePage == "change_password" || $activePage == "change_avatar") ? 'active' : ''; ?>"><i class="material-icons">settings</i> Settings</li>
            </a>
            <a href="logout">
                <li><i class="material-icons">power_settings_new</i> Logout</li>
            </a>
        </ul>
        <br><br><br><br><br><br>
    </div>

    <div class="side-panel-right"><br>
        <h3 style="text-align: center; color: var(--text-color)">New Trade</h3><br><br>
        <label for="" style='color: var(--text-color)'>Select Account Type</label><br><br>
        <select name="" id="account_type">
            <option value="">---</option>
            <option value="demo">Demo Account ($100,000.00)</option>
            <option value="real">Real Account (<?php echo number_format($balance, 2) ?>)</option>
        </select><br><br>

        <style>
            #ac_item {
                display: none;
            }

            .select7 {
                color: red;
                font-size: 14px;
                text-overflow: ellipsis;
                width: 100%;
                white-space: nowrap;
            }
        </style>

        <div id="ac_item">
            <label for="" style='color: var(--text-color)'><span id='ac_name'></span> <sup><i class="fa fa-question-circle"></i></sup></label>
            <p id='balance'>
                <img src="../images/dollar-sign.svg" width="40px">
                <span style="margin: 10px;"><span id="ac_price"></span> USD</span>
                <!-- <span style="margin: 10px;"><?php echo number_format($balance, 2) ?> USD</span> -->
            </p><br><br>
        </div>

        <label for="" style='color: var(--text-color);'>Markets</label><br><br>
        <select name="trade_pair" id="trade_pair" style='text-align: left'>
            <option value="cryptocurrency">Cryptocurrency</option>
            <option value="stock">Stock</option>
            <option value="indices">Indices</option>
        </select>
        <br><br><br>

        <label for="" style='color: var(--text-color);'>Pair</label><br><br>
        <div id="trade_pair_one" style='text-align: left;'>
            <select name="pair" id="trade_pair_one_v" class="select7" style='text-align: left;'>
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
            </select>
        </div>


        <div id="trade_pair_two" style='text-align: left; display: none'>
            <select name="pair2" id="trade_pair_two_v" class="select7">
                <option value="FACEBOOK INC" data-icon='../includes/icons/facebook.png'>FACEBOOK INC</option>
                <option value="BOEING CO" data-icon='../includes/icons/boeing.png'>BOEING CO</option>
                <option value="APPLE INC" data-icon='../includes/icons/apple.png'>APPLE INC</option>
                <option value="AMAZON COM INC" data-icon='../includes/icons/amazon.png'>AMAZON COM INC</option>
                <option value="MICROSOFT CORP" data-icon='../includes/icons/microsoft.png'>MICROSOFT CORP</option>
                <option value="NETFLIX INC" data-icon='../includes/icons/netflix.png'>NETFLIX INC</option>
                <option value="MICRON TECHNOLOGY INC" data-icon='../includes/icons/mircon.png'>MICRON TECHNO...</option>
                <option value="NVIDIA CORP" data-icon='../includes/icons/nvidia.png'>NVIDIA CORP</option>
                <option value="CANOPY GROWTH INCORPORATION" data-icon='../includes/icons/canopy.png'>CANOPY GROW...</option>
                <option value="TESLA INC" data-icon='../includes/icons/tesla.png'>TESLA INC</option>
                <option value="TWITTER INC" data-icon='../includes/icons/twitter.png'>TWITTER INC</option>
                <option value="SBERBANK RUSSIA" data-icon='../includes/icons/sberbank.png'>SBERBANK RUS...</option>
                <option value="CRONOS GROUP INC" data-icon='../includes/icons/cronos.png'>CRONOS GROUP INC</option>
                <option value="PENNYMAC FINCANCIAL SERVICES INC" data-icon='../includes/icons/pennymac.png'>PENNYMAC FINCA...</option>
                <option value="PAN AMERICAN SILVER CORP" data-icon='../includes/icons/pan.png'>PAN AME...</option>
                <option value="BANK OF AMERICAN CORPORATION" data-icon='../includes/icons/bank.png'>BANK OF AMERI...</option>
                <option value="INTEL CORP" data-icon='../includes/icons/intel.png'>INTEL CORP</option>
                <option value="RELIANCE INDS" data-icon='../includes/icons/reliance.png'>RELIANCE INDS</option>
                <option value="ELECTRONIC ARTS INC" data-icon='../includes/icons/electronic.png'>ELECTRONIC AR...</option>
                <option value="SAMSUNG LIFE" data-icon='../includes/icons/samsung.png'>SAMSUNG LIFE</option>
                <option value="SHOPIFY INC" data-icon='../includes/icons/shopify.png'>SHOPIFY INC</option>
                <option value="PAYPAL HONDINGS INC" data-icon='../includes/icons/paypal.png'>PAYPAL HONDINGS INC</option>
            </select>
        </div>

        <div id="trade_pair_three" style='text-align: left;  display: none '>
            <select name="pair3" id="trade_pair_three_v" class="select7">
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
        </div>
        <br><br>

        <label for="" style='color: var(--text-color);'>Time <i class="fa fa-clock-o"></i></label><br><br>
        <select name="" id='time_select' onchange='time_value(this)'>
            <option value="0">1min</option>
            <option value="1">2min</option>
            <option value="2">3min</option>
            <option value="3">4min</option>
            <option value="4">5min</option>
            <option value="5">6min</option>
            <option value="6">7min</option>
            <option value="7">8min</option>
            <option value="8">9min</option>
            <option value="9">10min</option>
            <option value="10">11min</option>
            <option value="11">12min</option>
            <option value="12">13min</option>
            <option value="13">14min</option>
            <option value="14">15min</option>
            <option value="15">16min</option>
            <option value="16">17min</option>
            <option value="17">18min</option>
            <option value="18">19min</option>
            <option value="19">20min</option>
            <option value="20">21min</option>
            <option value="21">22min</option>
            <option value="22">23min</option>
            <option value="23">24min</option>
            <option value="24">25min</option>
            <option value="25">26min</option>
            <option value="26">27min</option>
            <option value="27">28min</option>
            <option value="28">29min</option>
            <option value="29">30min</option>
        </select>

        <br><br><br>

        <label for="" style='color: var(--text-color)'>Type</label><br><br>
        <select name="type_exe" id="type_exe">
            <option value="Market Execuation">Market Execuation</option>
            <option value="Pending Order">Pending Order</option>
        </select>
        <br><br>

        <label for="" style='color: var(--text-color)'>Stop Loss</label><br><br>
        <input type="text" name='stop_loss' id='stop_loss' value="0.0000">
        <br><br>

        <label for="" style='color: var(--text-color)'>Take Profit</label><br><br>
        <input type="text" name='take_profit' id='take_profit' value="0.0000">
        <br><br>

        <label for="" style='color: var(--text-color)'>Trade Amount</label><br>
        <span style="color: #6494AE; font-size: 13px; position: relative; top:18px; left: 5px; z-index: 2;">USDT</span>
        <input type="text" name='trade_amount' id='trade_amount' value="">
        <center><img src="../images/loader.svg" width="50px" id='loader_img' style='display: none'></center>
        <div class="side-panel-right-btn">
            <button name='submit' class='trade_button'>Sell<br></button>
            <button name='submit' class='trade_button'>Buy<br></button>
        </div>
        <br><br>
        <br><br>
        <br><br>
        <br><br>
        <br><br>

    </div>

    <div class="side-dropdown">
        <article style="display: flex;">
            <button style='overflow:hidden; width: 50px; height: 50px; border: 1px solid transparent; border-radius: 100%'><img src="../images/<?php echo $image ?>" width="100%" style='border-radius: 50%'></button>
            <p style="margin: 0 10px;">
                <b style="color: var(--text);"><?php echo $full_name ?></b><br>
                <span style="font-size: 13px; color: #6494AE;"><?php echo $email ?></span>
            </p>
        </article>

        <article style="color: #6494AE; line-height: 20px;"><br>
            <span style="font-size: 10px; font-weight: bold; color: var(--text-color)">REAL ACCOUNT</span><br>
            <span style="font-size: 17px; color: dodgerblue; font-weight: bold;"><span class="btc"></span> <sub>BTC</sub></span><br>
            <span style="font-size: 13px;"><?php echo number_format($balance, 2) ?> <sub>USD</sub></span><br>
            <div style="display: flex; align-items: center; font-size: 13px; color: dodgerblue;">
                <a href="pay" style='color: dodgerblue'><i class="material-icons" style="font-size: 13px;">account_balance_wallet</i> Deposit </a>
                <a href="withdrawal" style='color: dodgerblue'><i style="margin: 0 0px 0 20px; font-size: 13px;" class="material-icons">account_balance_wallet</i> Withdraw </a>
            </div>
        </article>

        <article>
            <ul style="font-size: 14px;">
                <a href="index">
                    <li><i class="material-icons" style="font-size: 20px;">account_balance_wallet</i> Wallet</li>
                </a>
                <a href="settings">
                    <li><i class="material-icons" style="font-size: 20px;">person</i> View Profile</li>
                </a>
                <a href="settings">
                    <li><i class="material-icons" style="font-size: 20px;">settings</i> settings</li>
                </a>
                <a href="logout">
                    <li><i class="material-icons" style="font-size: 20px;">power_settings_new</i> Sign Out</li>
                </a>
                <span>
                    <h5>Mode Settings</h5><br>
                    <!-- update mode settings -->
                    <?php
                    if (isset($_GET['light'])) {
                        $the_light = $_GET['light'];
                        $sql = "UPDATE users SET mode  = 'light' WHERE user_id = '$the_light'";
                        if ($connection->query($sql) === TRUE) {
                            echo "<script>window.location.href = 'index'</script>";
                        }
                    }

                    if (isset($_GET['dark'])) {
                        $the_light = $_GET['dark'];
                        $sql = "UPDATE users SET mode  = 'dark' WHERE user_id = '$the_light'";
                        if ($connection->query($sql) === TRUE) {
                            echo "<script>window.location.href = 'index'</script>";
                        }
                    }

                    ?>


                    <!-- update mode settings end-->
                    <a href="<?php echo $activePage ?>?light=<?php echo $user_id ?>">
                        <button style='background: white; color: var(--text); border: 1px solid var(--text); padding: 5px; border-radius: 3px;'>Light</button>
                    </a>
                    <a href="<?php echo $activePage ?>?dark=<?php echo $user_id ?>">
                        <button style='background: var(--text); color: white; border: 1px solid transparent; padding: 5px; border-radius: 3px'>Dark</button>
                    </a>
                </span>

            </ul>
        </article>
    </div>
    <div class="fixed-width"><br><br><br>
        <?php
        if ($acct_status == 0) {
            echo "<div style='padding: 5px; background: orange; font-size: 12px; border-radius: 3px;'><i class='fa fa-info-circle'></i> Complete your account info. <a href='withdrawal_info' style='color: white'><b>Click Here</b></a></div><br>";
        }
        if ($status == 'support') {
            echo "<div style='padding: 5px; background: #ff3b3b; font-size: 12px; border-radius: 3px;'><i class='fa fa-info-circle'></i> Sorry an error occurred. Please contact our customer service for more info about this error. Thank you</div><br>";
        }
        
         if ($bill == "active") {
    echo "<div style='display: none; padding: 5px; background: blue; font-size: 12px; border-radius: 3px;'><i class='fa fa-info-circle'></i> $bill</div><br>";
} else {
    echo "<div style='padding: 5px; background: blue; font-size: 12px; border-radius: 3px;'><i class='fa fa-info-circle'></i> $bill</div><br>";
}


        if ($status == 'tax') {
            echo "<div style='padding: 5px; background: #ff3b3b; font-size: 12px; border-radius: 3px;'><i class='fa fa-info-circle'></i> Dear $full_name, please provide your Tax Payment Proof. For more information, please contact support team. Thank you</div><br>";
        }

        if ($status == 'upgrade') {
            echo "<div style='padding: 5px; background: #ff3b3b; font-size: 12px; border-radius: 3px;'><i class='fa fa-info-circle'></i> Dear $full_name, Your account has exceeded the Minimum Threshold for your Account type. Your trading account required compulsory account upgrade to process your withdrawal</div><br>";
        }

        if ($status == 'kyc') {
            echo "<div style='padding: 5px; background: orange; font-size: 12px; border-radius: 3px;'><i class='fa fa-info-circle'></i> Dear $full_name, Please complete your kyc verification info </div><br>";
        }

        // if ($status == 'active') {
        //     echo "<div style='padding: 5px; background: #ff3b3b; font-size: 12px; border-radius: 3px;'><i class='fa fa-info-circle'></i> Dear $full_name, please provide your Tax Payment Proof. For more information, please contact support team. Thank you</div><br>";
        // }
        ?>

        <script>
            $(".select7").select7();
        </script>