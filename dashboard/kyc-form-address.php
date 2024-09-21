<?php  include "../includes/header.php"; ?>

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
            border-bottom: 1px solid var(--text );
        }

        form input, form select {
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
    @media screen and (min-width: 768px) {
        .input-grid {
            display: grid; 
            grid-template-columns: 1fr 1fr;
        }
        .input-grid article {
            margin: 5px;
        }
        .input-grid:nth-child(2) {
            display: grid; 
            grid-template-columns: 1fr;
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
       <!-- <div class="container-text">
      <center> <img src="../images/<?php echo $image?>" width="100px" height='100px' style='border-radius: 5px'></center>
           <p style='font-size: 34px; text-align: center;'>Begin your ID-Verification</p><br>
           <p style='font-size: 14px; line-height: 30px; padding: 3px 10%; text-align: center; color: var(--text)'>To comply with regulation each participant will have to go through identity verification (KYC/AML) to prevent fraud causes.</p><br><br>
       </div> -->

       <div class="form" style='background: var(--primary-two); padding: 20px'>
            <div style='display: flex; align-items: center; color: var(--text)'>
                <span style='margin-right: 20px; border: 2px solid var(--text); padding: 5px; border-radius: 50%'>02</span>
                <span><h3>Your Address</h3>
                     <p style='font-size: 13px'>Your simple personal information required for identification</p>
                </span>
            </div><br><hr><br>
            <center><button style='background: #163A3A; color: #1AE0A1'> Your profile has been updated. kindly update your address information</button></center>
            <p style='font-size: 13px; color: var(--text); padding: 10px'><i class="fa fa-question-circle-o" style='font-size: 10px'></i> Please type carefully and fill out the form with your personal details. Your can’t edit these details once you submitted the form.</p><br>


            <?php
                 include "../database/kyc_script.php";
                 $kyc_session = '';
                $sql = "SELECT * FROM kyc WHERE kyc_user_id = '$user_id'";
                $result = $connection->query($sql);
                while ($row = $result->fetch_assoc()) {
                    $kyc_session = $row['kyc_session'];
                }    
                if ($kyc_session == 2) {
                    echo "<script>window.location.href = 'kyc_form_upload'</script>";
                } 
            ?>        

        <form action="" method="post">
            <div class="input-grid">
                <article>
                    <label for="">Address Line<sup>*</sup></label>
                    <input type="text" name='address' required>
                </article>

                <article>
                    <label for="">Zip/Postcode <sup>*</sup></label>
                    <input type="text" name='zip_code' required>
                </article>

                <article>
                    <label for="">Apartment Number (Optional)<sup>*</sup></label>
                    <input type="text" name='apartment_number' required>
                </article>

                <article>
                    <label for="">City <sup>*</sup></label>
                    <input type="text" name='city' required>
                </article>
            </div>

            <div class="input-grid">
        <article>
            <label for="">State<sup>*</sup></label>
            <input type="text" name='state' required>
        </article>
        </div>

        <button type='submit' name='submit_two'>Next</button>
        </form>
       </div>
 </div>

 <br><br><br>


<?php  include "../includes/footer.php"; ?>
