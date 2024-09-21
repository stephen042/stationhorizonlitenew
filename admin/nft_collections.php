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
							<th>Amount (ETH)</th>
							<th>Description</th>
							<th>Image</th>
							<th>Date</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>
                        <?php 
                            $i = 1;
                            $sql = "SELECT * FROM nft";
                            $result = $connection->query($sql);
                            while ($row = $result->fetch_assoc()) {
                                $nft_id = $row['nft_id'];
                                $nft_image = $row['image'];
                                $nft_name = $row['name'];
                                $nft_amount = $row['amount'];
                                $nft_description = $row['description'];
                                $date = $row['date'];
                        ?>
							<tr>
                                <td style='background: var(--dark)'><?php echo $i++?></td>
                                <td style='background: var(--dark)'><?php echo $nft_name?></td>
                                <td style='background: var(--dark)'><?php echo $nft_amount?></td>
                                <td style='background: var(--dark)'><?php echo $nft_description?></td>
                                <td style='background: var(--dark)'><img src="../nft-images/<?php echo $nft_image?>" width="50px" height='50px' ></td>
                                <td style='background: var(--dark)'><?php echo $date?></td>
                                <td style='background: var(--dark)'>
                                    <ul style='list-style-type: none; display: flex; justify-content: space-evenly; padding: 5px'>
                                        <a href="edit_nft?id=<?php echo $nft_id?>" style='color: dodgerblue'><li><i class="fa fa-edit"></i></li></a>

        <?php 
        // Delete account
        if (isset($_GET['del'])) {
            $the_del = $_GET['del'];
            $s_sql = "DELETE FROM nft WHERE nft_id = '$the_del'";
            if ($connection->query($s_sql)===TRUE) {
                echo "<script>
                            alert('NFT Deleted Successfully')
                            window.location.href = 'nft_collections'
                        </script>";
            }else {
                echo "<script>
                        alert('Sorry an error occurred. Please try again later')
                        window.location.href = 'nft_collections'
                        </script>";
            }
        }
        // Delete account        
        ?>
        <?php 
            echo "<a href='nft_collections?del=$nft_id' onClick=\"javascript: return confirm('Do you wish to delete');\"><li data-title='Delete Account' style='color: red'><i class='fa fa-trash'></i></li></a>";
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
