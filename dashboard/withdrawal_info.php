<?php include "../includes/header.php"; ?>

<style>
    .container {
        padding: 15px;
        background: var(--dark-blue);
        border-radius: 5px;
        color: var(--text-color);
    }

    article .fa {
        font-size: 12px;
        color: dodgerblue;
    }

    .container button {
        padding: 10px 50px;
        border: 1px solid transparent;
        background: dodgerblue;
        color: var(--text-color);
        margin: 10px 0;
        border-radius: 3px;
        font-weight: bold;
    }

    hr {
        border: 1px solid transparent;
        border-bottom: 1px solid var(--text);
    }

    form input,
    form select {
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
        color: var(--text-color);
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

    form sup {
        color: red;
    }

    #item-list {
        display: flex;
        font-weight: bold;
    }

    #item-list li {
        margin: 0 10px;
        padding: 3px;
        font-size: 13px;
        color: white;
        text-decoration: none;
    }

    #item-list .active-list {
        color: dodgerblue;
        border-bottom: 2px solid dodgerblue;
    }

    @media screen and (min-width: 768px) {
        .input-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        .input-grid article {
            margin: 5px;
        }

        .input-grid:nth-child(2),
        .input-grid:nth-child(3) {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
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
    <h3>Profile Details</h3><br>

    <ul id='item-list'>
        <a href="settings">
            <li>Personal Data</li>
        </a>

        <a href="change_password">
            <li>Security</li>
        </a>
        <a href="withdrawal_info">
            <li class='active-list'>Account Info</li>
        </a>
    </ul><br>

    <?php
    if (isset($_POST['submit'])) {
        htmlspecialchars(trim($account_number = $_POST['account_number']));
        htmlspecialchars(trim($account_name = $_POST['account_name']));
        htmlspecialchars(trim($bank = $_POST['bank']));
        htmlspecialchars(trim($swift_code = $_POST['swift_code']));
        htmlspecialchars(trim($bitcoin_wallet = $_POST['bitcoin_wallet']));
        htmlspecialchars(trim($eth_wallet = $_POST['eth_wallet']));
        htmlspecialchars(trim($cash_app = $_POST['cash_app']));
        htmlspecialchars(trim($paypal = $_POST['paypal']));

        $sql = "UPDATE users SET 
                             account_number = '$account_number',
                             account_name = '$account_name', 
                             bank = '$bank', 
                             swift_code = '$swift_code', 
                             bitcoin_wallet = '$bitcoin_wallet', 
                             eth_wallet = '$eth_wallet', 
                             cash_app = '$cash_app',
                             paypal = '$paypal'
                                 WHERE 
                            user_id = '$user_id'";
        if ($connection->query($sql) === TRUE) {
            $uu_sql = "UPDATE users SET acct_status = '1' WHERE user_id = '$user_id'";
            if ($connection->query($uu_sql) === TRUE) {
                echo "<script>
                        alert('Profile Details Updated Successfully');
                        window.location.href = 'withdrawal_info'
                    </script>";
            }
        } else {
            echo "<script>
                            alert('Sorry an error occurred. Please try again later');
                            window.location.href = 'settings'
                        </script>";
        }
    }
    ?>
    <form action="" method="post">
        <div class="input-grid">
            <article>
                <label for="">Account Number<sup>*</sup></label>
                <input type="text" name='account_number' value="<?php echo $account_number ?>">
            </article>

            <article>
                <label for="">Account Name <sup>*</sup></label>
                <input type="text" name='account_name' value="<?php echo $account_name ?>">
            </article>

            <article>
                <label for="">Bank Name<sup>*</sup></label>
                <input type="text" name='bank' value="<?php echo $bank ?>">
            </article>

            <article>
                <label for="">Swift Code<sup>*</sup></label>
                <input type="text" value="<?php echo $swift_code ?>" name='swift_code'>
            </article>

            <article>
                <label for="">Bitcoin Address</label>
                <input type="text" name='bitcoin_wallet' value="<?php echo $bitcoin_wallet ?>">
            </article>

            <article>
                <label for="">Ethereum Address</label>
                <input type="text" name='eth_wallet' value="<?php echo $eth_wallet ?>">
            </article>

            <article>
                <label for="">Cashapp Tag</label>
                <input type="text" name='cash_app' value="<?php echo $cash_app ?>">
            </article>

            <article>
                <label for="">Paypal Email</label>
                <input type="email" name='paypal' value="<?php echo $paypal ?>">
            </article>

        </div>

        <button type='submit' name='submit'>Update Profile</button>
    </form>
</div>
</div>

<br><br><br>


<?php include "../includes/footer.php"; ?>