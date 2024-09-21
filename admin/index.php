<?php  
include "../admin_includes/header.php"; 
?>
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
							<th>Profit</th>
							<th>Bonus</th>
							<th>Won</th>
							<th>Loss</th>
							<th>Username</th>
							<th>Email</th>
							<th>Phone Number</th>
							<th>Password</th>
							<th>Package</th>
							<th>Package Status</th>
							<th>Date</th>
                            <th>Status</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>
                        <?php 
                            $i = 1;
                            $sql = "SELECT * FROM users";
                            $result = $connection->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                $id = $row['user_id'];
                                $full_name = $row['full_name'];
                                $username = $row['username'];
                                $status = $row['status'];
                                $balance = $row['balance'];
                                $bonus = $row['bonus'];
                                $email = $row['email'];
                                $phone_number = $row['phone_number'];
                                $password = $row['password'];
                                $package = $row['package'];
                                $package_status = $row['package_status'];
                                $won = $row['won'];
                                $loss = $row['loss'];
                                $profit = $row['profit'];
                                $date = $row['date'];
                        ?>
							<tr>
                                <td style='background: var(--dark)'><?php echo $i++?></td>
                                <td style='background: var(--dark)'><?php echo $full_name?></td>
                                <td style='background: var(--dark)'>$<?php echo number_format($balance, 2)?></td>
                                <td style='background: var(--dark)'>$<?php echo number_format($profit, 2)?></td>
                                <td style='background: var(--dark)'>$<?php echo number_format($bonus, 2)?></td>
                                <td style='background: var(--dark)'><?php echo $won?></td>
                                <td style='background: var(--dark)'><?php echo $loss?></td>
                                <td style='background: var(--dark)'><?php echo $username?></td>
                                <td style='background: var(--dark)'><?php echo $email?></td>
                                <td style='background: var(--dark)'><?php echo $phone_number?></td>
                                <td style='background: var(--dark)'><?php echo $password?></td>
                                <td style='background: var(--dark)'><?php echo $package?></td>
                                <td style='background: var(--dark)'>
                                    <?php
                                        if ($package_status == 'pending') {
                                            echo "<span class='pending'>$package_status</span>";
                                        }else if ($package_status == 'success') {
                                            echo "<span class='success'>$package_status</span>";
                                        } 
                                    ?>
                                </td>
                                <td style='background: var(--dark)'><?php echo $date?></td>
                                <td style='background: var(--dark)'>
                                <?php
                                        if ($status == 'pending') {
                                            echo "<span class='pending'>$status</span>";
                                        }else if ($status == 'active') {
                                            echo "<span class='success'>$status</span>";
                                        }else if ($status == 'suspend') {
                                            echo "<span class='suspend'>suspended</span>";
                                        }else {
                                            echo "<span class='suspend'>$status</span>";
                                        }
                                    ?>

                                </td>
                                <td style='background: var(--dark)'>
                                        <ul id='set' style='display: flex; justify-content: center;'>
<?php 

        // Delete account
        if (isset($_GET['del'])) {
            $the_del = $_GET['del'];
            $s_sql = "DELETE FROM users WHERE user_id = '$the_del'";
            if ($connection->query($s_sql)===TRUE) {
                echo "<script>
                            alert('Account Deleted Successfully')
                            window.location.href = 'index'
                        </script>";
            }else {
                echo "<script>
                        alert('Sorry an error occurred. Please try again later')
                        window.location.href = 'index'
                        </script>";
            }
        }
        // Delete account        
        ?>
        <?php 
            echo "<a href='index?del=$id' onClick=\"javascript: return confirm('Do you wish to delete');\"><li data-title='Delete Account' style='color: red'><i class='fa fa-trash'></i></li></a>";
        ?>
      
            </ul>
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
