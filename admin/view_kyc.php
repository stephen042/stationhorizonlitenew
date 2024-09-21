<?php  include "../admin_includes/header.php"; ?>

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
        .input-grid:nth-child(2), .input-grid:nth-child(3) {
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

        <?php 
            if (isset($_GET['id'])) {
                $the_id = $_GET['id'];
                $k_sql = "SELECT * FROM kyc WHERE kyc_id = '$the_id'";
                $k_result = $connection->query($k_sql);
                $data = $k_result->fetch_assoc();
            }
        ?>

 <div class="container">
       <div class="container-text" style='display: flex; justify-content: center'>
       <center > <img src="../images/new/<?php echo $data['image']?>" width="98%" height='300px' style='border-radius: 5px; margin-right: 5px'>
       <p>Front</p>
       </center>
       <center > <img src="../images/new/<?php echo $data['image2']?>" width="98%" height='300px' style='border-radius: 5px; margin-right: 5px'>
       <p>Back </p>
       </center><br>
           <!-- <p style='font-size: 34px; text-align: center;'>Begin your ID-Verification</p><br> -->
           <!-- <p style='font-size: 14px; line-height: 30px; padding: 3px 10%; text-align: center; color: var(--text)'>To comply with regulation each participant will have to go through identity verification (KYC/AML) to prevent fraud causes.</p><br><br> -->
       </div>

       <div class="form" style='background: var(--primary-two); padding: 20px'>
            <div style='display: flex; align-items: center; color: var(--text)'>
                <span style='margin-right: 20px; border: 2px solid var(--text); padding: 5px 10px; border-radius: 50%'><i class="fa fa-user"></i></span>
                <span><h3>Profit Details</h3>
                     <p style='font-size: 13px'>Your simple personal information required readonly for identification</p>
                </span>
            </div><br><hr><br>
            <!-- <p style='font-size: 13px; color: var(--text); padding: 10px'><i class="fa fa-question-circle-o" style='font-size: 10px'></i> Please type carefully and fill out the form with your personal details. Your can’t edit these details once you submitted the form.</p><br> -->

          
        <form action="" method="post">
            <div class="input-grid">
                <article>
                    <label for="">First Name<sup>*</sup></label>
                    <input type="text" name='fname' value='<?php echo $data['fname']?>' required readonly>
                </article>

                <article>
                    <label for="">Last Name <sup>*</sup></label>
                    <input type="text" name='lname' value='<?php echo $data['lname']?>' required readonly>
                </article>

                <article>
                    <label for="">Email<sup>*</sup></label>
                    <input type="email" name='email' value='<?php echo $data['email']?>' required readonly>
                </article>

                <article>
                    <label for="">Gender <sup>*</sup></label>
                    <select name='gender' required readonly style='text-align: left'>
                        <option value=""><?php echo $data['gender']?></option>
                    </select>
                </article>
            </div>

            <div class="input-grid">
            <article>
                <label for=""> Country Code <sup>*</sup></label>
                <input type="text" readonly value='<?php echo $data['country_code']?>'>
            </article>

            <article>
                <label for=""> Country  <sup>*</sup></label>
                <input type="text" readonly value='<?php echo $data['country']?>'>
            </article>

        <article>
            <label for="">Phone Number <sup>*</sup></label>
            <input type="text" name='phone_number' value='<?php echo $data['phone_number']?>' required readonly>
        </article>
        </div>

        
        <div class="input-grid">
            <article>
                <label for="">Year (DOB)<sup>*</sup></label>
                <input type="number" name='year' placeholder='1980' value='<?php echo $data['year']?>' required readonly>
            </article>

            <article>
                <label for="">Month (DOB)<sup>*</sup></label>
                <input type="text" name='month' placeholder='<?php echo date('M')?>' value='<?php echo $data['month']?>' required readonly>
            </article>

            <article>
                <label for="">Day (DOB)<sup>*</sup></label>
                <input type="number" name='day' placeholder='<?php echo date('d')?>' value='<?php echo $data['day']?>' required readonly>
            </article>
        </div>

        <div class="input-grid">
            <article>
                <label for="">Address<sup>*</sup></label>
                <input type="text" name='year' placeholder='1980' value='<?php echo $data['address']?>' required readonly>
            </article>

            <article>
                <label for="">Zip Code<sup>*</sup></label>
                <input type="text" name='month' placeholder='<?php echo date('M')?>' value='<?php echo $data['zip_code']?>' required readonly>
            </article>

            <article>
                <label for="">Apartment<sup>*</sup></label>
                <input type="text" name='day' placeholder='<?php echo date('d')?>' value='<?php echo $data['apartment']?>' required readonly>
            </article>

            <article>
                <label for="">City<sup>*</sup></label>
                <input type="text" name='year' placeholder='1980' value='<?php echo $data['city']?>' required readonly>
            </article>

            <article>
                <label for="">State<sup>*</sup></label>
                <input type="text" name='month' placeholder='<?php echo date('M')?>' value='<?php echo $data['state']?>' required readonly>
            </article>

            <article>
                <label for="">Date Created<sup>*</sup></label>
                <input type="text" name='day' placeholder='<?php echo date('d')?>' value='<?php echo $data['date']?>' required readonly>
            </article>
        </div>


        </form>
       </div>
 </div>

 <br><br><br>


<?php  include "../includes/footer.php"; ?>
