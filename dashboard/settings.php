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
            <li class='active-list'>Personal Data</li>
        </a>

        <a href="change_password">
            <li>Security</li>
        </a>
        <a href="withdrawal_info">
            <li>Account Info</li>
        </a>
    </ul><br>

    <?php
    if (isset($_POST['submit'])) {
        htmlspecialchars(trim($name = $_POST['name']));
        htmlspecialchars(trim($phone_number = $_POST['phone_number']));
        htmlspecialchars(trim($gender = $_POST['gender']));

        $sql = "UPDATE users SET full_name = '$name', phone_number = '$phone_number', gender = '$gender' WHERE user_id = '$user_id'";
        if ($connection->query($sql) === TRUE) {
            echo "<script>
                            alert('Profile Details Updated Successfully');
                            window.location.href = 'settings'
                        </script>";
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
                <label for="">Email<sup>*</sup></label>
                <input type="email" name='email' value="<?php echo $email ?>" readonly required>
            </article>

            <article>
                <label for="">Username <sup>*</sup></label>
                <input type="text" name='username' value="<?php echo $username ?>" readonly required>
            </article>

            <article>
                <label for="">Full Name<sup>*</sup></label>
                <input type="text" name='name' value="<?php echo $full_name ?>" required>
            </article>

            <article>
                <label for="">Phone Number<sup>*</sup></label>
                <input type="text" value="<?php echo $phone_number ?>" name='phone_number' required>
            </article>

            <article>
                <label for="">Country</label>
                <input type="text" readonly value="<?php echo $country ?>" required>
            </article>

            <article>
                <label for="">Gender <sup>*</sup></label>
                <select name='gender' required style='text-align: left'>
                    <option value="">select option</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </article>
        </div>

        <button type='submit' name='submit'>Update Profile</button>
    </form>
</div>
</div>

<br><br><br>


<?php include "../includes/footer.php"; ?>