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
        /* text-transform:  capitalize; */
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
     <h4>KYC Details</h4><br><br>
     <div id='container-table'>
 <table id="example" class="display" style='background: var(--dark)' cellspacing="0" width="100%">
					<thead>
						<tr>
                            <th style='width: 14px'>#</th>
                            <th style='width: 14px'>Preview</th>
                            <th style='width: 14px'>User Id</th>
                            <th style='width: 14px'>First Name</th>
                            <th style='width: 14px'>Last Name</th>
                            <th style='width: 14px'>Email</th>
                            <th style='width: 14px'>Front Image</th>
                            <th style='width: 14px'>Back Image</th>
                            <th style='width: 14px'>Phone Number</th>
                            <th style='width: 14px'>Country</th>
                            <th style='width: 14px'>Country Code</th>
                            <th style='width: 14px'>Gender</th>
                            <th style='width: 14px'>Year</th>
                            <th style='width: 14px'>Month</th>
                            <th style='width: 14px'>Day</th>
                            <th style='width: 14px'>Address</th>
                            <th style='width: 14px'>Zip COde</th>
                            <th style='width: 14px'>Apartment Number</th>
                            <th style='width: 14px'>City</th>
                            <th style='width: 14px'>State</th>
                            <th style='width: 14px'>Date</th>
                            <th style='width: 14px'>Status</th>
						</tr>
					</thead>

					<tbody>
                        <?php 
                        if (isset($_GET['auid'], $_GET['aid'])) {
                            $the_auid = $_GET['auid'];
                            $the_aid = $_GET['aid'];

                            $a_sql = "UPDATE kyc SET status = 'active' WHERE kyc_id = '$the_aid' AND kyc_user_id = '$the_auid'";
                            if ($connection->query($a_sql)===TRUE) {
                                echo "<script>
                                        alert('KYC verification approved')
                                        window.location.href = 'kyc'
                                    </script>";
                            $s_sql = "UPDATE users SET status = 'active' WHERE user_id = '$the_auid'";
                            if ($connection->query($s_sql)===TRUE){}                                    
        
                            } else {
                                echo "<script>
                                        alert('Sorry an error occurred. Please try again')
                                        window.location.href = 'kyc'
                                    </script>";
                            }
                        }


                        if (isset($_GET['puid'], $_GET['pid'])) {
                            $the_puid = $_GET['puid'];
                            $the_pid = $_GET['pid'];

                            $p_sql = "UPDATE kyc SET status = 'pending' WHERE kyc_id = '$the_pid' AND kyc_user_id = '$the_puid'";
                            if ($connection->query($p_sql)===TRUE) {
                                echo "<script>
                                        alert('KYC verification Declined')
                                        window.location.href = 'kyc'
                                    </script>";
                            $s_sql = "UPDATE users SET status = 'kyc' WHERE user_id = '$the_puid'";
                            if ($connection->query($s_sql)===TRUE){}                                    

                            } else {
                                echo "<script>
                                        alert('Sorry an error occurred. Please try again')
                                        window.location.href = 'kyc'
                                    </script>";
                            }
                        }


                        if (isset($_GET['did'])) {
                            $the_did = $_GET['did'];

                            $d_sql = "DELETE FROM kyc WHERE kyc_id = '$the_did'";
                            if ($connection->query($d_sql)===TRUE) {
                                echo "<script>
                                        alert('KYC verification Deleted')
                                        window.location.href = 'kyc'
                                    </script>";
                            } else {
                                echo "<script>
                                        alert('Sorry an error occurred. Please try again')
                                        window.location.href = 'kyc'
                                    </script>";
                            }
                        }


                            $i = 1;
                            $sql = "SELECT * FROM kyc";
                            $result = $connection->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                $kyc_user_id = $row['kyc_user_id'];
                                $kyc_id = $row['kyc_id'];
                                $kyc_fname = $row['fname'];
                                $kyc_lname = $row['lname'];
                                $kyc_email = $row['email'];
                                $kyc_phone_number = $row['phone_number'];
                                $kyc_country = $row['country'];
                                $kyc_country_code = $row['country_code'];
                                $kyc_gender = $row['gender'];
                                $kyc_year = $row['year'];
                                $kyc_month = $row['month'];
                                $kyc_day = $row['day'];
                                $kyc_address = $row['address'];
                                $kyc_zip_code = $row['zip_code'];
                                $apartment_number = $row['apartment_number'];
                                $kyc_city = $row['city'];
                                $kyc_state = $row['state'];
                                $kyc_date = $row['date'];
                                $kyc_image = $row['image'];
                                $kyc_image2 = $row['image2'];
                                $kyc_status = $row['status'];
                        ?>
							<tr>
                                <td style='background: var(--dark)'><?php echo $i++?></td>
                                <td style='background: var(--dark)'><a href="view_kyc?id=<?php echo $kyc_id?>"><button style='background: dodgerblue; border: 1px solid transparent; padding: 3px; border-radius: 3px'>Preview</button></a></td>
                                <td style='background: var(--dark)'><?php echo $kyc_kyc_user_id?></td>
                                <td style='background: var(--dark)'><?php echo $kyc_fname?></td>
                                <td style='background: var(--dark)'><?php echo $kyc_lname?></td>
                                <td style='background: var(--dark)'><?php echo $kyc_email?></td>
                                <td style='background: var(--dark)'><img src="../images/new/<?php echo $kyc_image?>" width="70px" height="70px"></td>
                                <td style='background: var(--dark)'><img src="../images/new/<?php echo $kyc_image2?>" width="70px" height="70px"></td>
                                <td style='background: var(--dark)'><?php echo $kyc_phone_number?></td>
                                <td style='background: var(--dark)'><?php echo $kyc_country?></td>
                                <td style='background: var(--dark)'><?php echo $kyc_country_code?></td>
                                <td style='background: var(--dark)'><?php echo $kyc_gender?></td>
                                <td style='background: var(--dark)'><?php echo $kyc_year?></td>
                                <td style='background: var(--dark)'><?php echo $kyc_month?></td>
                                <td style='background: var(--dark)'><?php echo $kyc_day?></td>
                                <td style='background: var(--dark)'><?php echo $kyc_address?></td>
                                <td style='background: var(--dark)'><?php echo $kyc_zip_code?></td>
                                <td style='background: var(--dark)'><?php echo $kyc_apartment_number?></td>
                                <td style='background: var(--dark)'><?php echo $kyc_city?></td>
                                <td style='background: var(--dark)'><?php echo $kyc_state?></td>
                                <td style='background: var(--dark)'><?php echo $kyc_date?></td>
                                <td style='background: var(--dark)'><?php echo $kyc_status?></td>
                                <td style='background: var(--dark)'>
                                    <a href="kyc?auid=<?php echo $kyc_user_id?>&aid=<?php echo $kyc_id?>"><button>Approve</button></a>
                                    <a href="kyc?puid=<?php echo $kyc_user_id?>&pid=<?php echo $kyc_id?>"><button style='margin: 5px'>Pending</button></a>
                                    <a href="kyc?did=<?php echo $kyc_id?>"><button>Delete</button></a>
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
