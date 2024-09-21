<?php 
require 'session.php'; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello <?php echo $username ?>, welcome to <?php echo $website_name ?></title>
    <link rel="shortcut icon" href="../images/dollar-sign.svg" type="image/x-icon">
    <link rel="stylesheet" href="../assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../assets/dashboard.css">
</head>
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

<body>
    <nav>
        <article>
            <ul>
                <li style="display: flex; align-items: center;">
                    <i class="material-icons" id='bars' style="color: #6494AE;">menu</i>
                    <img src="../images/<?php echo $logo_img ?>" width="110px">
                </li>

                <li style='transform: translateY(-15px)'>
                    <a href="../dashboard/index"><button id="nav-trade-btn">Trade</button></a>
                    <button class='dropdown-btn' style='overflow:hidden; width: 60px; height: 60px; border: 1px solid transparent; transform: translateY(10px)'><img src="../images/avatar.png" width="100%" height='100%' style='border-radius: 50%'></button>
                </li>
            </ul>
        </article>

        <article>
            <ul>
                <li><img src="../images/<?php echo $logo_img ?>" width="130px"></li>

                <li style="display: flex; justify-content: space-between; align-items: center;">
                    <article style="display: flex; padding: 5px;">
                        <img src="../images/dollar-sign.svg" width="40px" style="margin-right: 5px;">
                        <div style="font-size: 15px;">
                            <b style='color: var(--text-color)'>Real Account</b><br>
                            <span style="font-size: 12px; color: #0BC2D2;"><?php echo number_format($balance, 2) ?> USD</span><br>
                            <span style="font-size: 12px; color: #7CBBE3;"><span class="btc"></span> BTC
                            </span>
                        </div>
                    </article>

                    <article style="margin: 0 10px;" id='dropdown-btn'>
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <button style='overflow:hidden; width: 50px; height: 50px; border: 1px solid transparent'><img src="../images/avatar.png" width="100%" height='100%' style='border-radius: 50%'></button>
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
            <li id="side-bal-m" style=" padding: 5px; border-top: 1px solid #bbd8ff70; border-bottom: 1px solid #bbd8ff70; padding: 10px;">
                <img src="../images/dollar-sign.svg" width="40px" style="margin-right: 5px;">
                <div style="font-size: 15px;">
                    <b>Real Account</b><br>
                    <span style="font-size: 12px; color: #0BC2D2;"><?php echo number_format($balance, 2) ?>USD</span><br>
                    <span style="font-size: 12px; color: #7CBBE3;"><span class="btc"></span> BTC
                        <i class="material-icons" style="font-size: 13px; transform: translateX(60px);">keyboard_arrow_down</i>
                    </span>
                </div>
            </li>

            <!-- <li id='side-bal-d'
                style=" padding: 5px; border-top: 1px solid #bbd8ff70; border-bottom: 1px solid #bbd8ff70; padding: 10px;">
                <p style="font-size: 13px;">AVAILABLE BALANCE</p><br>
                <p style="font-size: 15px; color: #0971fe;"><span class="btc"></span> <sub style="font-size: 10px;">BTC</sub></p><br>
                <p style="font-size: 15px;"><?php echo number_format($balance, 2) ?> <sub style="font-size: 10px;">USD</sub></p>
            </li> -->

            <?php
            $activePage = basename($_SERVER['PHP_SELF'], ".php");
            ?>
            <br>

            <a href="index">
                <li class="<?= ($activePage == "index") ? 'active' : ''; ?>"><i class="material-icons">dashboard</i> Dashboard</li>
            </a>
            <span style="font-size: 10px; font-weight: bold; padding: 0 10px; color: #6494AE;">APPS</span>
            <a href="fund">
                <li class="<?= ($activePage == "fund") ? 'active' : ''; ?>"><i class="material-icons">account_balance_wallet</i>Fund Account </li>
            </a>
            <a href="fund_profit">
                <li class="<?= ($activePage == "fund_profit") ? 'active' : ''; ?>"><i class="material-icons">account_balance_wallet</i>Fund Profit </li>
            </a>
            <a href="nfts">
                <li class="<?= ($activePage == "nft") ? 'active' : ''; ?>"><i class="material-icons">image</i>Create NFTs </li>
            </a>
            <a href="nft_collections">
                <li class="<?= ($activePage == "nft_collections") ? 'active' : ''; ?>"><i class="material-icons">edit</i> NFTs Collections</li>
            </a>
            <a href="packages">
                <li class="<?= ($activePage == "packages") ? 'active' : ''; ?>"><i class="material-icons">check_box</i>Approve Packages</li>
            </a>
            <a href="add_packages">
                <li class="<?= ($activePage == "add_packages") ? 'active' : ''; ?>"><i class="material-icons">add</i>Packages Panel</li>
            </a>
            <a href="deposit">
                <li class="<?= ($activePage == "deposit") ? 'active' : ''; ?>"><i class="material-icons">check_box</i>Approve Deposit</li>
            </a>
            
            <a href="withdraw">
                <li class="<?= ($activePage == "withdraw") ? 'active' : ''; ?>"><i class="material-icons">check_box</i>Approve Withdrawal</li>
            </a>
            
            <a href="profit">
                <li class="<?= ($activePage == "profit") ? 'active' : ''; ?>"><i class="material-icons">thumbs_up_down</i>Profit</li>
            </a>
            <a href="trade">
                <li class="<?= ($activePage == "trade") ? 'active' : ''; ?>"><i class="material-icons">compare_arrows</i>Trade Count</li>
            </a>
            <a href="trade_history">
                <li class="<?= ($activePage == "trade_history") ? 'active' : ''; ?>"><i class="material-icons">add</i>Create Trade History</li>
            </a>
            <a href="profit_history">
                <li class="<?= ($activePage == "profit_history") ? 'active' : ''; ?>"><i class="material-icons">insert_chart</i>Profit History</li>
            </a>
            <a href="transaction_history">
                <li class="<?= ($activePage == "transaction_history") ? 'active' : ''; ?>"><i class="material-icons">insert_chart</i>Deposit History</li>
            </a>
            <a href="withdrawal_history">
                <li class="<?= ($activePage == "withdrawal_history") ? 'active' : ''; ?>"><i class="material-icons">insert_chart</i>Withdrawal History</li>
            </a>
            <a href="kyc">
                <li class="<?= ($activePage == "kyc" || $activePage == "kyc-form") ? 'active' : ''; ?>"><i class="material-icons">content_copy</i> AML / KYC</li>
            </a>
            <a href="mail">
                <li class="<?= ($activePage == "mail") ? 'active' : ''; ?>"><i class="material-icons">mail_outline</i> Send Mail</li>
            </a>
            <a href="account_status">
                <li class="<?= ($activePage == "account_status") ? 'active' : ''; ?>"><i class="material-icons">mail_outline</i> Account Status</li>
            </a>
            <a href="settings">
                <li class="<?= ($activePage == "settings" || $activePage == "settings") ? 'active' : ''; ?>"><i class="material-icons">settings</i> Website Settings</li>
            </a>
            <a href="change-password">
                <li class="<?= ($activePage == "change-password" || $activePage == "change-password") ? 'active' : ''; ?>"><i class="material-icons">settings</i> Change Password</li>
            </a>
            <a href="sus_act">
                <li class="<?= ($activePage == "sus_act") ? 'active' : ''; ?>"><i class="material-icons">stop_screen_share</i> Suspend/Activate Account</li>
            </a>
            <a href="../dashboard/logout">
                <li><i class="material-icons">power_settings_new</i> Logout</li>
            </a>
        </ul>
        <br><br><br><br><br><br>
    </div>

    <div class="side-panel-right" style='display: none'><br>
        <h3 style="text-align: center; color: var(--text-color)">New Trade</h3><br><br>
        <label for="" style='color: var(--text-color)'>Real Account <sup><i class="fa fa-question-circle"></i></sup></label>
        <p id='balance'>
            <img src="../images/tron.svg" width="40px">
            <span style="margin: 10px;"><?php echo number_format($balance, 2) ?> USDT</span>
        </p><br><br>
        <label for="" style='color: var(--text-color)'>Pair</label><br>
        <select name="" id="trade_pair">
            <option value="">select pair</option>
            <option value="">USDT</option>
            <option value="">USDT/BTC</option>
            <option value="">USDT/ETH</option>
            <option value="">USDT/USDC</option>
            <option value="">USDT/TRX</option>
            <option value="">USDT/SOL</option>
            <option value="">USDT/LTC</option>
            <option value="">USDT/BNB</option>
            <option value="">USDT/LINK</option>
            <option value="">USDT/FTT</option>
            <option value="">USDT/SHIB</option>
            <option value="">USDT/ETC</option>
            <option value="">USDT/TFUEL</option>
            <option value="">USDT/ADA</option>
            <option value="">USDT/VET</option>
        </select>
        <br><br><br>
        <label for="" style='color: var(--text-color)'>Trade Amount</label><br>
        <span style="color: #6494AE; font-size: 13px; position: relative; top:18px; left: 5px; z-index: 2;">USDT</span>
        <input type="text" id='trade_amount' value=""><br><br><br>
        <div class="side-panel-right-btn">
            <button class='trade_button'>Sell<br>
                19,295.1144
            </button>

            <button class='trade_button'>Buy<br>
                19,295.1144
            </button>
        </div>
    </div>

    <div class="side-dropdown">
        <article style="display: flex;">
            <button style='overflow:hidden; width: 50px; height: 50px; border: 1px solid transparent; border-radius: 100%'><img src="../images/avatar.png" width="100%" style='border-radius: 50%'></button>
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
                <i class="material-icons" style="font-size: 13px;">account_balance_wallet</i> Deposit
                <i style="margin: 0 0px 0 20px; font-size: 13px;" class="material-icons">account_balance_wallet</i> Withdraw
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
                <a href="change-password">
                    <li><i class="material-icons" style="font-size: 20px;">settings</i> Change Password</li>
                </a>
                <a href="../dashboard/logout">
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