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
							<th>Full Name</th>
							<th>Balance</th>
							<th>Username</th>
							<th>Package</th>
							<th>Package Status</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>
                        <?php 
                            $i = 1;
                            $sql = "SELECT * FROM users ";
                            $result = $connection->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                $id = $row['user_id'];
                                $name = $row['full_name'];
                                $username = $row['username'];
                                $status = $row['status'];
                                $balance = $row['balance'];
                                $email = $row['email'];
                                $password = $row['password'];
                                $package = $row['package'];
                                $package_status = $row['package_status'];
                                $date = $row['date'];
                        ?>
							<tr>
                                <td style='background: var(--dark)'><?php echo $i++?></td>
                                <td style='background: var(--dark)'><?php echo $name?></td>
                                <td style='background: var(--dark)'>$<?php echo number_format($balance, 2)?></td>
                                <td style='background: var(--dark)'><?php echo $username?></td>
                                <td style='background: var(--dark)'><?php echo $package?></td>
                                <td style='background: var(--dark)'>
                                    <?php
                                        if ($package_status == 'pending') {
                                            echo "<span class='pending'>$package_status</span>";
                                        }else if ($package_status == 'active') {
                                            echo "<span class='success'>$package_status</span>";
                                        } 
                                    ?>
                                </td>
                                <td style='background: var(--dark)'><?php echo $date?></td>
                                <?php
                                // pending packages end 
                                    if (isset($_GET['pending'])) {
                                        $the_pending = $_GET['pending'];
                                        $sql = "UPDATE users SET package_status = 'pending' WHERE user_id ='$the_pending'";
                                        if ($connection->query($sql)===TRUE) {
                                            echo "<script>
                                                     alert('Package Status: Pending')
                                                     window.location.href = 'packages'
                                                  </script>";
                                        }else {
                                            echo "<script>
                                                    alert('Sorry an error occurred. Please try again later')
                                                    window.location.href = 'packages'
                                                 </script>";
                                        }
                                    }
                                    // pending packages end

                                    //approve packages
                                    if (isset($_GET['approve'], $_GET['name'])) {
                                        $the_approve = $_GET['approve'];
                                        $the_name = $_GET['name'];
                                        $sql = "UPDATE users SET package_status = 'active' WHERE user_id = '$the_approve'";
                                        if ($connection->query($sql)===TRUE) {}
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
                
                                        $d_sql = "SELECT * FROM users WHERE user_id = '$the_approve'";
                                        $d_result = $connection->query($d_sql);
                                        while ($row = $d_result->fetch_assoc()) {
                                            $db_email = $row['email'];
                                        }

                                            // send mail
                                        $to = "$db_email";
                                        $subject = "Package Request {$date}";
                                        $message = "
                                        <div style='background: #E4E9F0'>
                                        <center><img src='$website_url/images/$logo_img' width='100px;'></center>
                                        <div style='font-family: sans-serif; padding: 10px; margin: 5px; background: white; margin: 5px 5%; border-radius: 10px;'>
                                        <center><img src='$website_url/images/mail.png' width='100px'></center>
                                        <p>Hi <b>$the_name</b></p>
                                        <p>Your pending package request  has been <b>approved</b></p>
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
                                                alert('Package Status: Approved')
                                                window.location.href = 'packages'
                                            </script>";
                                        }else {
                                            echo "<script>
                                            alert('Sorry an error occurred. Please try again later')
                                            window.location.href = 'packages'
                                         </script>";
                                            }

                                    }
                                    //approve packages end
                                ?>
                                <td style='background: var(--dark)'>
                                <?php 
                                    if ($package_status != "") {
                                       echo "<a href='packages?approve=$id&name=$name'><button>Approve</button></a>
                                        <a href='packages?pending=$id'><button style='margin: 3px 0'>Pending</button></a>";  
                                    }
                                ?>
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
