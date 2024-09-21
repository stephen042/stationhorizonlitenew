<?php  include "../admin_includes/header.php"; ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.0.3/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/select/1.0.1/js/dataTables.select.min.js"></script>

<style>
    .container {
        padding: 15px;
        background: var(--dark-blue);
        border-radius: 5px;
        color: var(--text-color);
    }
    form input {
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
    #dol {
        position: absolute; 
        right: 40px; 
        transform: translateY(-38px); 
        z-index: 1; 
        width: 24px; 
        height: 23px; 
        border-radius: 50%; 
        background: var(--text-color); 
        color: var(--text);
    }
    #container-table {
        width: 100%;
        overflow-x: scroll;
    }
    #container-table::-webkit-scrollbar {
        background: transparent;
        width: 0;
        height: 0;
    }
    table {
        border-collapse: collapse;
        border-radius: 5px;
        width: 100%;
        /* border: 1px solid var(--text); */
    }
	th, td {
		background: var(--dark);
        font-size: 13px;
        color: var(--text-color);
		border: 1px solid var(--text);
        text-transform:  capitalize;
        text-align: center;
	}
    .pending {
        background: #3a1716; 
        color: #e01a1a;
        padding: 5px;
        font-size: 10px;
        text-transform: lowercase;
        border-radius: 3px;
    }

    .success {
        background: #163A3A; 
        color: #1AE0A1;
        padding: 3px;
        text-transform: lowercase;
        border-radius: 3px;
    }

    .suspend {
        background: #3a3616; 
        color: #e0ab1a;
        padding: 3px;
        text-transform: lowercase;
        border-radius: 3px;
    }

    @media screen and (min-width: 768px) {}

    @media screen and (min-width: 1200px) {}
</style>

 <div class="container">
     <div id='container-table'>
 <table id="example" class="display" style='background: var(--dark)' cellspacing="0" width="100%">
					<thead>
						<tr>
							<th style='width: 14px'>#</th>
							<th>User ID</th>
							<th>Name</th>
							<th>Amount</th>
							<th>Transaction Status</th>
							<th>Transaction Type</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>
                    <?php
                                // approve packages end 
                                    if (isset($_GET['approve'], $_GET['a_id'], $_GET['amount'], $_GET['name'], $_GET['mode'], $_GET['type'])) {
                                        $the_approve = $_GET['approve'];
                                        $the_t_id = $_GET['a_id'];
                                        $the_amount = $_GET['amount'];
                                        $the_name = $_GET['name'];
                                        $the_mode = $_GET['mode'];
                                        $the_type = $_GET['type'];

                                        $sql = "UPDATE transaction SET transaction_status = 'success' WHERE transaction_user_id ='$the_approve' AND transaction_id = '$the_t_id'";
                                        if ($connection->query($sql)===TRUE) {
                                            $date = date("Y-M-d-h-i-s");
                                            $d_amount = number_format($the_amount, 2);
                                            $character = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
                                            $randomString = '';
                                            for ($i=0; $i < 10; $i++) { 
                                                $index = rand(0, strlen($character) -1);
                                                $randomString .=$character[$index];
                                            }
                                            $randomString;
                                            $TXD = "CXC".''.$randomString;
                    
                                            $d_sql = "SELECT * FROM users WHERE user_id = '$the_approve' LIMIT 1";
                                            $d_result = $connection->query($d_sql);
                                            while ($row = $d_result->fetch_assoc()) {
                                                $db_email = $row['email'];
                                                $db_balance = $row['balance'];
                                                $db_eth_balance = $row['eth_balance'];
                                            }

                                            $new_balance = $db_balance + $the_amount;
                                            if ($the_mode == "ETH") {
                                                $new_eth_balance = "$db_eth_balance" + "$the_type";
                                                $e_sql = "UPDATE users SET eth_balance = '$new_eth_balance' WHERE user_id = '$the_approve'";
                                                if ($connection->query($e_sql)===TRUE) {}
                                            }

                                            $u_sql = "UPDATE users SET balance = '$new_balance' WHERE user_id = '$the_approve'";
                                            if ($connection->query($u_sql)===TRUE) {}

                                                // send mail
                                            $to = "$db_email";
                                            $subject = "Deposit Request {$date}";
                                            $message = "
                                            <div style='background: #E4E9F0'>
                                            <center><img src='$website_url/images/$logo_img' width='100px;'></center>
                                            <div style='font-family: sans-serif; padding: 10px; margin: 5px; background: white; margin: 5px 5%; border-radius: 10px;'>
                                            <center><img src='$website_url/images/mail.png' width='100px'></center>
                                            <p>Hi <b>$the_name</b></p>
                                            <p>Your Pending Deposit of $d_amount USD has been <b>approved</b></p>
                                            <p>Deposit is automated. Please contact live support or email $website_email on delayed deposit.</p><br>
                                            <p>Thanks</p>
                                            <p>Support Team, - $website_name</p>
                                            <p><a href='$website_url' style='color: dodgerblue; text-decoration: none'>$website_url</a></p>
                                            <a href='$website_url' style='color: dodgerblue; text-decoration: none'>
                                            <button style='padding: 10px; background: dodgerblue; border: 1px solid transparent; color: white; width: 100%; border-radius: 3px'>Login Now</button></a>
                                            <p style='font-size: 13px'>Please consider all mails from us as confidential.</p><br>
                                            </div><br>
                                            </div>";
                                    
                                            // Always set content-type when sending HTML email
                                            $headers = "MIME-Version: 1.0" . "\r\n";
                                            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                                    
                                            // More headers
                                            $headers .= "rom: $website_email" . "\r\n";
                                            $headers .= "Reply-To: $website_email \r\n";
                                            $headers .= "Return-Path: $website_email\r\n";
                                            // $headers .= "CC: $website_email\r\n";
                                            $headers .= "BCC: $website_email\r\n";

                                            if (mail($to,$subject,$message,$headers,"-f $website_email")){
                                                echo "<script>
                                                    alert('Transaction Status: Approved')
                                                    window.location.href = 'deposit'
                                                </script>";
                                            }else {
                                                echo "<script>
                                                alert('Sorry an error occurred. Please try again later')
                                                window.location.href = 'deposit'
                                             </script>";
                                                }
                                            }else {
                                            echo "<script>
                                                    alert('Sorry an error occurred. Please try again later')
                                                    window.location.href = 'deposit'
                                                 </script>";
                                        }
                                    }
                                    // approve packages end

                                    //pending packages
                                    if (isset($_GET['pending'], $_GET['p_id'])) {
                                        $the_pending = $_GET['pending'];
                                        $the_t_id = $_GET['p_id'];
                                        $sql = "UPDATE transaction SET transaction_status = 'pending' WHERE transaction_user_id ='$the_pending' AND transaction_id = '$the_t_id'";
                                        if ($connection->query($sql)===TRUE) {
                                            echo "<script>
                                                     alert('Transaction Status: Pending')
                                                     window.location.href = 'deposit'
                                                  </script>";
                                        }else {
                                            echo "<script>
                                                    alert('Sorry an error occurred. Please try again later')
                                                    window.location.href = 'deposit'
                                                 </script>";
                                        }
                                    }
                                    //pending packages end
                                    
                                     //Rejected packages
                                    if (isset($_GET['Rejected'], $_GET['p_id'])) {
                                        $the_reject = $_GET['Rejected'];
                                        $the_t_id = $_GET['p_id'];
                                        $sql = "UPDATE transaction SET transaction_status = 'Rejected' WHERE transaction_user_id ='$the_reject' AND transaction_id = '$the_t_id'";
                                        if ($connection->query($sql)===TRUE) {
                                            echo "<script>
                                                     alert('Transaction Status: Rejected')
                                                     window.location.href = 'deposit'
                                                  </script>";
                                        }else {
                                            echo "<script>
                                                    alert('Sorry an error occurred. Please try again later')
                                                    window.location.href = 'deposit'
                                                 </script>";
                                        }
                                    }
                                    //Rejected packages end
                                ?>

                        <?php 
                            $i = 1;
                            $sql = "SELECT * FROM transaction WHERE transaction_type = 'deposit'  ";
                            $result = $connection->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                $id = $row['transaction_user_id'];
                                $t_id = $row['transaction_id'];
                                $transaction_type = $row['transaction_type'];
                                $transaction_status = $row['transaction_status'];
                                $transaction_amount = $row['transaction_amount'];
                                $date = $row['transaction_date'];
                                $t_mode = $row['t_mode'];
                                $eth = $row['eth'];
                                $name = $row['transaction_name'];
                        ?>
							<tr>
                                <td style='background: var(--dark)'><?php echo $i++?></td>
                                <td style='background: var(--dark)'><?php echo $id?></td>
                                <td style='background: var(--dark)'><?php echo $name?></td>
                                <td style='background: var(--dark)'>$<?php echo number_format($transaction_amount, 2)?></td>
                                <td style='background: var(--dark)'><?php echo $transaction_type?></td>
                                <td style='background: var(--dark)'>
                                    <?php
                                        if ($transaction_status == 'pending') {
                                            echo "<span class='pending'>$transaction_status</span>";
                                        }else if ($transaction_status == 'success') {
                                            echo "<span class='success'>$transaction_status</span>";
                                        } else if ($transaction_status == 'Rejected') {
                                            echo "<span class='Rejected'>$transaction_status</span>";
                                        } 
                                    ?>
                                </td>
                                <td style='background: var(--dark)'><?php echo $date?></td>
                                <td style='background: var(--dark)'>
                                    <a href="deposit?approve=<?php echo $id?>&a_id=<?php echo $t_id?>&amount=<?php echo $transaction_amount?>&name=<?php echo $name?>&mode=<?php echo $t_mode?>&type=<?php echo $eth?>"><button>Approve</button></a>
                                    <a href="deposit?pending=<?php echo $id?>&p_id=<?php echo $t_id?>"><button style='margin: 3px 0'>Pending</button></a>
                                    <a href="deposit?Rejected=<?php echo $id?>&p_id=<?php echo $t_id?>"><button style='margin: 3px 0'>Reject</button></a>
                                </td>
							</tr>
                            <?php }?>
					</tbody>
				</table>
                </div>
 </div>


<script>
   function applyDataTable(){
  
  $('#example').DataTable( {
		dom: 'Bfrtip',
		buttons: [
			{
				extend: 'print',
				text: 'Print all'
			},
			{
				extend: 'print',
				text: 'Print current page',
				exportOptions: {
					modifier: {
						  page: 'current'
					}
				}
			}
		],
		select: true
	} );
  
  
}


$(document).ready(function() {
  $('#trigger-update').click(function(){
      $('#example').DataTable().destroy();
    
      setTimeout(function(){
        applyDataTable();
      },2000);
       
  });
  
  applyDataTable();
	
} );


</script>

<?php  include "../admin_includes/footer.php"; ?>
