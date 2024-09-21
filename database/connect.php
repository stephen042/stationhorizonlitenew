<?php
$connection = mysqli_connect('localhost', 'statscvu_stationhorizonlite', 'statscvu_stationhorizonlite', 'statscvu_stationhorizonlite');
// $connection = mysqli_connect('localhost', 'root', '', 'accurate_database', 3308);
if (!$connection) {
    die('error connecting to database');
} else {
    // echo "we are connected";
}
error_reporting(0);
$settings_sql = "SELECT * FROM settings";
$settings_result = $connection->query($settings_sql);
while ($row = $settings_result->fetch_assoc()) {
    $website_name = $row['website_name'];
    $website_url = $row['website_url'];
    $website_email = $row['website_email'];
    $admin_mail = $row['admin_mail'];
    $tidio_link = $row['tidio_link'];
    $bitcoin_address = $row['bitcoin_address'];
    $eth_address = $row['eth_address'];
    $usdt_address = $row['usdt_address'];
    $usdc_address = $row['usdc_address'];
    $withdrawal_code = $row['withdrawal_pin'];
    $bitcoin_img = $row['bitcoin_img'];
    $eth_img = $row['eth_img'];
    $usdt_img = $row['usdt_img'];
    $usdc_img = $row['usdc_img'];
    $logo_img = $row['logo_img'];
}
