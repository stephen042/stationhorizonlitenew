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

    #label-file {
        position: relative;
        width: 100%;
        height: 200px;
        border-radius: 25px;
        background: transparent;
        box-shadow: 0 4px 7px rgba(0, 0, 0, 0.4);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-weight: bold;
        cursor: pointer;
        transition: transform .2s ease-out;
        overflow: hidden;
    }

    #file {
        opacity: 0;
        width: 100%;
        height: 100%;
        position: absolute;
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
        <a href="change_avatar" class='active-list'>
            <li>Avatar</li>
        </a>
        <a href="change_password">
            <li>Security</li>
        </a>
        <a href="withdrawal_info">
            <li>Account Info</li>
        </a>
    </ul><br>

    <?php
    $img = "";
    // if (isset($_POST['submit'])) {

    //     $img = $_FILES["image"]["name"];
    //     $tempname = $_FILES["image"]["tmp_name"];
    //     $folder = "../images/$img";

    //     if (move_uploaded_file($tempname, $folder)) {
    //         $sql = "UPDATE users SET image = '$img' WHERE user_id = '$user_id'";
    //         if ($connection->query($sql)===TRUE) {
    //             echo "<script>
    //                     alert('Profile Updated Successfully')
    //                     window.location.href = 'index'
    //                   </script>";
    //         }else {
    //             echo "<script>
    //             alert('Sorry an error occurred. Please try again later')
    //             window.location.href = 'kyc'
    //           </script>";
    //         }
    //     }        
    // }
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <br>
        <label for="" id='label-file'>
            <i class="fa fa-image"></i>
            <input type="file" name="image" id='file' required>
        </label>
        <button name='submit'>Upload</button>
    </form>
</div>
</div>

<br><br><br>


<?php include "../includes/footer.php"; ?>