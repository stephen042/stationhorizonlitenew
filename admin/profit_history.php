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
    form input, select {
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

    .pause {
        background: #3a1616; 
        color: red;
        padding: 3px 18px;
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
							<th>Profit ID</th>
							<th>User ID</th>
							<th>Full Name</th>
							<th>Amount</th>
							<th>Starting Point</th>
							<th>Ending Point</th>
							<th>Status</th>
							<th>Stage</th>
                            <th>Date</th>
                            <th>Action</th>
						</tr>
					</thead>

					<tbody>

                    <?php 
                        if (isset($_GET['id'], $_GET['pid'])) {
                            $the_id = $_GET['id'];
                            $the_pid = $_GET['pid'];

                            $sql = "DELETE FROM profit WHERE profit_user_id = '$the_id' AND profit_id = '$the_pid'";
                            if ($connection->query($sql)===TRUE) {
                                echo "<script>
                                alert('Profit Status: SUCCESS')
                                window.location.href = 'profit_history'
                                </script>";            
                            }else {
                                echo "<script>
                                alert('Profit Status: ERROR')
                                window.location.href = 'profit_history'
                                </script>";            
                            }
                        }

                        if (isset($_GET['playId'], $_GET['playPid'])) {
                            $the_playId = $_GET['playId'];
                            $the_playPid = $_GET['playPid'];

                            $sql = "UPDATE profit SET status = 'inprogress' WHERE profit_user_id = '$the_playId' AND profit_id = '$the_playPid'";
                            if ($connection->query($sql)===TRUE) {
                                echo "<script>
                                alert('Profit Status: SUCCESS')
                                window.location.href = 'profit_history'
                                </script>";            
                            }else {
                                echo "<script>
                                alert('Profit Status: ERROR')
                                window.location.href = 'profit_history'
                                </script>";            
                            }
                        }

                        if (isset($_GET['pauseId'], $_GET['pausePid'])) {
                            $the_pauseId = $_GET['pauseId'];
                            $the_pausePid = $_GET['pausePid'];

                            $sql = "UPDATE profit SET status = 'pause' WHERE profit_user_id = '$the_pauseId' AND profit_id = '$the_pausePid'";
                            if ($connection->query($sql)===TRUE) {
                                echo "<script>
                                alert('Profit Status: SUCCESS')
                                window.location.href = 'profit_history'
                                </script>";            
                            }else {
                                echo "<script>
                                alert('Profit Status: ERROR')
                                window.location.href = 'profit_history'
                                </script>";            
                            }

                        }
                    ?>

                        <?php 
                            $i = 1;
                            $sql = "SELECT * FROM profit";
                            $result = $connection->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                $p_id = $row['profit_id'];
                                $id = $row['profit_user_id'];
                                $profit_amount = $row['profit_amount'];
                                $start = $row['start'];
                                $end = $row['end'];
                                $profit_status = $row['status'];
                                $profit_date = $row['date'];
                                $stage = $row['stage'];

                                $dd_sql = "SELECT * FROM users WHERE user_id = '$id'";
                                $dd_result = $connection->query($dd_sql);
                                $data = $dd_result->fetch_assoc();     
                        ?>
							<tr>
                                <td style='background: var(--dark)'><?php echo $i++?></td>
                                <td style='background: var(--dark)'><?php echo $p_id?></td>
                                <td style='background: var(--dark)'><?php echo $id?></td>
                                <td style='background: var(--dark)'><?php echo $data['full_name']?></td>
                                <td style='background: var(--dark)'>$<?php echo number_format($profit_amount, 2)?></td>
                                <td style='background: var(--dark)'><?php echo $start?></td>
                                <td style='background: var(--dark)'><?php echo $end?></td>
                                <td style='background: var(--dark)'>
                                    <?php
                                        if ($profit_status == 'inprogress') {
                                            echo "<span class='suspend'>$profit_status</span>";
                                        }else if ($profit_status == 'completed') {
                                            echo "<span class='success'>$profit_status</span>";
                                        }else if ($profit_status == 'pause') {
                                            echo "<span class='pause'>$profit_status</span>";
                                        }
                                    ?>
                                </td>
                                <td><?php echo $stage?></td>
                                <td style='background: var(--dark)'><?php echo $profit_date?></td>
                                <td>
                                <a href="profit_history?id=<?php echo $id?>&pid=<?php echo $p_id?>" style='color:red'><i class="fa fa-trash"></i></a>
                                <?php 
                                    if ($profit_status == "pause") {
                                        echo "<a href='profit_history?playId=$id&playPid=$p_id' style='color:#1AE0A1; margin-left: 20px'><i class='fa fa-play'></i></a>";
                                    }else {
                                        echo "<a href='profit_history?pauseId=$id&pausePid=$p_id' style='color:dodgerblue; margin-left: 20px'><i class='fa fa-pause'></i></a>";
                                    }
                                
                                ?>
                                </td>
							</tr>
                            <?php }?>
					</tbody>
				</table>
                </div><br><br>

                <h4>Update Profit History</h4>
                <?php 
                    if (isset($_POST['submit'])) {
                        $p_id = $_POST['profit_id'];   
                        $pu_id = $_POST['user_id'];   
                        $p_amount = $_POST['amount']; 
                        
                        $sql = "UPDATE profit SET profit_amount = '$p_amount' WHERE profit_user_id = '$pu_id' AND profit_id = '$p_id'";
                        if ($connection->query($sql)===TRUE) {
                            echo "<script>
                            alert('Profit Status: SUCCESS')
                            window.location.href = 'profit_history'
                            </script>";            
                        }else {
                            echo "<script>
                            alert('Profit Status: ERROR')
                            window.location.href = 'profit_history'
                            </script>";            
                        }
                    }
                
                ?>
        <form action="" method="post"><br><br>

            <label for="">Profit ID</label>
            <input type="text" name='profit_id' required><br>

            <label for="">User ID</label>
            <input type="text" name='user_id' required><br>

            <label for="">Amount</label>
            <input type="text" name='amount' required><br>

            <button type='submit' name='submit'>Update Profit</button><br><hr><br><br>

        </form>

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
