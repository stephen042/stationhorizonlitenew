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

 <?php 

// Approve Transaction account
if (isset($_GET['id'], $_GET['type'], $_GET['amount'], $_GET['uid'])) {
    $the_id = $_GET['id'];
    $the_type = $_GET['type'];
    $the_amount = $_GET['amount'];
    $the_user = $_GET['uid'];

    $sql = "SELECT * FROM users WHERE user_id = '$the_user'";
    $result = $connection->query($sql);
    while ($row = $result->fetch_assoc()) {
        $the_balance = $row['balance'];
    }

    if ($the_type == "deposit") {
        $new_balance = $the_balance + $the_amount;
        $a_sql = "UPDATE transaction SET transaction_status = 'success' WHERE transaction_id = '$the_id'";
        if ($connection->query($a_sql)===TRUE) {
            $aa_sql = "UPDATE users SET balance = '$new_balance' WHERE user_id = '$the_user'";
            if ($connection->query($aa_sql)===TRUE) {
                echo "<script>
                        alert('Transaction Approved Successfully')
                        window.location.href = 'transaction_history'
                    </script>";
             }
        }else {
            echo "<script>
                    alert('Sorry an error occurred. Please try again later')
                    window.location.href = 'transaction_history'
                </script>";
        }
    }else if ($the_type == "withdrawal") {
        $new_balance = $the_balance - $the_amount;
        $sql = "UPDATE transaction SET transaction_status = 'success' WHERE transaction_id = '$the_id'";
        if ($connection->query($sql)===TRUE) {
            $u_sql = "UPDATE users SET balance = '$new_balance' WHERE user_id = '$the_user'";
            if ($connection->query($u_sql)===TRUE) {
                echo "done";
                echo "<script>
                        alert('Transaction Approved Successfully')
                        window.location.href = 'transaction_history'
                    </script>";
             }
        }else {
            echo "<script>
                    alert('Sorry an error occurred. Please try again later')
                   window.location.href = 'transaction_history'
                </script>";
        }
    }

}
// Approve Transaction account end
?>

					<thead>
                    <tr>
							<th style='width: 14px'>#</th>
                            <th>Full Name</th>
							<th>TYPE</th>
							<th>AMOUNT</th>
							<th>STATUS</th>
							<th>DATE</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>
                    <?php 
                            $i = 1;
                            $sql = "SELECT * FROM transaction WHERE transaction_type = 'withdrawal' ";
                            $result = $connection->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                $transaction_status = $row['transaction_status'];
                                $transaction_amount = $row['transaction_amount'];
                                $transaction_date = $row['transaction_date'];
                                $transaction_type = $row['transaction_type'];                        
                                $transaction_id = $row['transaction_id'];                        
                                $transaction_user_id = $row['transaction_user_id'];  
                                
                                $dd_sql = "SELECT * FROM users WHERE user_id = '$transaction_user_id'";
                                $dd_result = $connection->query($dd_sql);
                                $data = $dd_result->fetch_assoc();     

                        ?>
							<tr>
                                <td style='background: var(--dark)'><?php echo $i++?></td>
                                <td style='background: var(--dark)'><?php echo $data['full_name']?></td>
                                <td style='background: var(--dark)'><?php echo $transaction_type?></td>
                                <td style='background: var(--dark)'>$<?php echo number_format($transaction_amount, 2)?></td>
                                <td style='background: var(--dark)'>
                                    <?php
                                        if ($transaction_status == 'pending') {
                                            echo "<span class='pending'>$transaction_status</span>";
                                        }else if ($transaction_status == 'success') {
                                            echo "<span class='success'>$transaction_status</span>";
                                        } 
                                    ?>
                                </td>
                                <td style='background: var(--dark)'><?php echo $transaction_date?></td>
                                <td style='background: var(--dark)'>
                                        <ul id='set' style='display: flex; justify-content: center;'>

        <?php 
            if ($transaction_status  == "pending") {
                echo "<button style='background: transparent' ><a href='transaction_history?id=$transaction_id&type=$transaction_type&amount=$transaction_amount&uid=$transaction_user_id' onClick=\"javascript: return confirm('Do you wish to Approve');\"><li class='success' >Approve</li></a></button>";
            }

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
