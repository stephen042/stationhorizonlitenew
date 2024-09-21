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
    @media screen and (min-width: 768px) {
        .container-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
        }
        .container-grid article:nth-child(1) {
            text-align: center;
            transform: translateX(100%)
        }
        .container-grid article:nth-child(2) {
            transform: translateX(-100%);
            margin-left: 10%;
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
       <div class="container-text">
           <p style='font-size: 34px; text-align: center;'>Nice, <?php echo $full_name?></p><br>
           <p style='font-size: 14px; line-height: 30px; padding: 3px 10%; text-align: center; color: var(--text)'>To comply with regulations each participant is required to go through identity verification (KYC/AML) to prevent fraud, money laundering operations, transactions banned under the sanctions regime or those which fund terrorism. Please, complete our fast and secure verification process to participate in our programs.</p><br><br>

           <div class="container-grid">

                <article>
                    <svg xmlns="http://www.w3.org/2000/svg" width='40%' viewBox="0 0 114 113.9">
											<path d="M87.84,110.34l-48.31-7.86a3.55,3.55,0,0,1-3.1-4L48.63,29a3.66,3.66,0,0,1,4.29-2.8L101.24,34a3.56,3.56,0,0,1,3.09,4l-12.2,69.52A3.66,3.66,0,0,1,87.84,110.34Z" transform="translate(-4 -2.1)" fill="#c4cefe"></path>
											<path d="M33.73,105.39,78.66,98.1a3.41,3.41,0,0,0,2.84-3.94L69.4,25.05a3.5,3.5,0,0,0-4-2.82L20.44,29.51a3.41,3.41,0,0,0-2.84,3.94l12.1,69.11A3.52,3.52,0,0,0,33.73,105.39Z" transform="translate(-4 -2.1)" fill="#c4cefe"></path>
											<rect x="22" y="17.9" width="66" height="88" rx="3" ry="3" fill="#6576ff"></rect>
											<rect x="31" y="85.9" width="48" height="10" rx="1.5" ry="1.5" fill="#fff"></rect>
											<rect x="31" y="27.9" width="48" height="5" rx="1" ry="1" fill="#e3e7fe"></rect>
											<rect x="31" y="37.9" width="23" height="3" rx="1" ry="1" fill="#c4cefe"></rect>
											<rect x="59" y="37.9" width="20" height="3" rx="1" ry="1" fill="#c4cefe"></rect>
											<rect x="31" y="45.9" width="23" height="3" rx="1" ry="1" fill="#c4cefe"></rect>
											<rect x="59" y="45.9" width="20" height="3" rx="1" ry="1" fill="#c4cefe"></rect>
											<rect x="31" y="52.9" width="48" height="3" rx="1" ry="1" fill="#e3e7fe"></rect>
											<rect x="31" y="60.9" width="23" height="3" rx="1" ry="1" fill="#c4cefe"></rect>
											<path d="M98.5,116a.5.5,0,0,1-.5-.5V114H96.5a.5.5,0,0,1,0-1H98v-1.5a.5.5,0,0,1,1,0V113h1.5a.5.5,0,0,1,0,1H99v1.5A.5.5,0,0,1,98.5,116Z" transform="translate(-4 -2.1)" fill="#9cabff"></path>
											<path d="M16.5,85a.5.5,0,0,1-.5-.5V83H14.5a.5.5,0,0,1,0-1H16V80.5a.5.5,0,0,1,1,0V82h1.5a.5.5,0,0,1,0,1H17v1.5A.5.5,0,0,1,16.5,85Z" transform="translate(-4 -2.1)" fill="#9cabff"></path>
											<path d="M7,13a3,3,0,1,1,3-3A3,3,0,0,1,7,13ZM7,8a2,2,0,1,0,2,2A2,2,0,0,0,7,8Z" transform="translate(-4 -2.1)" fill="#9cabff"></path>
											<path d="M113.5,71a4.5,4.5,0,1,1,4.5-4.5A4.51,4.51,0,0,1,113.5,71Zm0-8a3.5,3.5,0,1,0,3.5,3.5A3.5,3.5,0,0,0,113.5,63Z" transform="translate(-4 -2.1)" fill="#9cabff"></path>
											<path d="M107.66,7.05A5.66,5.66,0,0,0,103.57,3,47.45,47.45,0,0,0,85.48,3h0A5.66,5.66,0,0,0,81.4,7.06a47.51,47.51,0,0,0,0,18.1,5.67,5.67,0,0,0,4.08,4.07,47.57,47.57,0,0,0,9,.87,47.78,47.78,0,0,0,9.06-.87,5.66,5.66,0,0,0,4.08-4.09A47.45,47.45,0,0,0,107.66,7.05Z" transform="translate(-4 -2.1)" fill="#2ec98a"></path>
											<path d="M100.66,12.81l-1.35,1.47c-1.9,2.06-3.88,4.21-5.77,6.3a1.29,1.29,0,0,1-1,.42h0a1.27,1.27,0,0,1-1-.42c-1.09-1.2-2.19-2.39-3.28-3.56a1.29,1.29,0,0,1,1.88-1.76c.78.84,1.57,1.68,2.35,2.54,1.6-1.76,3.25-3.55,4.83-5.27l1.35-1.46a1.29,1.29,0,0,1,1.9,1.74Z" transform="translate(-4 -2.1)" fill="#fff"></path>
										</svg>
               </article>

               <article>
                   <h3>Complete Your KYC</h3>
                   <p style='font-size: 11px; padding: 7px 0; color: var(--text)'>7 minutes</p><br>
                   <p style='line-height: 25px; font-size: 14px; color: var(--text)'>Looks like your have not verified your identity yet. Please verify yourself to get full access to our platform.</p><br>
                   <div style='font-size: 13px; color: var(--text); line-height: 25px'>
                        <i class="fa fa-check-square"></i> Fiat Currency Wallet (USD, EUR, GBP)<br>
                        <i class="fa fa-check-square"></i> 10+ Digital Crypto Wallet (ETH, BTC, LTC etc)<br>
                        <i class="fa fa-check-square"></i> Receive payments from <?php echo $website_name?> <br>
                   </div>
                   <a href="kyc-form"><button>Get Started</button></a>
               </article>
           </div>
       </div>
 </div>

 <br><br><br>


<?php  include "../includes/footer.php"; ?>
