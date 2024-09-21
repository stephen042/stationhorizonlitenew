<?php include "../admin_includes/header.php"; ?>
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

    form input,
    select {
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
        /* background: transparent;
        width: 0;
        height: 0; */
    }

    table {
        border-collapse: collapse;
        border-radius: 5px;
        width: 100%;
        /* border: 1px solid var(--text); */
    }

    th,
    td {
        background: var(--dark);
        font-size: 13px;
        color: var(--text-color);
        border: 1px solid var(--text);
        text-transform: capitalize;
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
    <h4>Trade Panel</h4><br><br>
    <div id='container-table'>
        <table id="example" class="display" style='background: var(--dark)' cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th style='width: 14px'>#</th>
                    <th>Transaction ID</th>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Transaction Type</th>
                    <th>Transaction Status</th>
                    <th>Date</th>
                    <th>Won</th>
                    <th>Loss</th>
                    <th>Stop loss</th>
                    <th>Take Profit</th>
                    <th>Type</th>
                    <th>Pair</th>
                    <th>Action</th>


                </tr>
            </thead>

            <tbody>
                <?php
                $i = 1;
                $sql = "SELECT * FROM transaction WHERE transaction_type = 'trade'";
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
                    $trade_won = $row['trade_won'];
                    $trade_loss = $row['trade_loss'];
                    $type_exe         = $row['type_exe'];
                    $stop_loss        = $row['stop_loss'];
                    $take_profit      = $row['take_profit'];
                    $pair_trade       = $row['pair_trade'];
                    
                    //won packages
                                    if (isset($_GET['won'], $_GET['p_id'])) {
                                        $the_won = $_GET['won'];
                                        $the_t_id = $_GET['p_id'];
                                        $sql = "UPDATE transaction SET transaction_status = 'won' WHERE transaction_user_id ='$the_won' AND transaction_id = '$the_t_id'";
                                        if ($connection->query($sql)===TRUE) {
                                            echo "<script>
                                                     alert('Transaction Status: won')
                                                     window.location.href = 'trade'
                                                  </script>";
                                        }else {
                                            echo "<script>
                                                    alert('Sorry an error occurred. Please try again later')
                                                    window.location.href = 'trade'
                                                 </script>";
                                        }
                                    }
                                    //Won packages end
                                    
                                    //pending packages
                                    if (isset($_GET['loss'], $_GET['p_id'])) {
                                        $the_loss = $_GET['loss'];
                                        $the_t_id = $_GET['p_id'];
                                        $sql = "UPDATE transaction SET transaction_status = 'loss' WHERE transaction_user_id ='$the_loss' AND transaction_id = '$the_t_id'";
                                        if ($connection->query($sql)===TRUE) {
                                            echo "<script>
                                                     alert('Transaction Status: loss')
                                                     window.location.href = 'trade'
                                                  </script>";
                                        }else {
                                            echo "<script>
                                                    alert('Sorry an error occurred. Please try again later')
                                                    window.location.href = 'trade'
                                                 </script>";
                                        }
                                    }
                                    //pending packages end
                                    
                                    

                ?>
                    <tr>
                        <td style='background: var(--dark)'><?php echo $i++ ?></td>
                        <td style='background: var(--dark)'><?php echo $t_id ?></td>
                        <td style='background: var(--dark)'><?php echo $id ?></td>
                        <td style='background: var(--dark)'><?php echo $name ?></td>
                        <td style='background: var(--dark)'>$<?php echo number_format($transaction_amount, 2) ?></td>
                        <td style='background: var(--dark)'><?php echo $transaction_type ?></td>
                        <td style='background: var(--dark)'>
                            <?php
                            if ($transaction_status == "pending") {
                                echo "<span class='pending'>pending</span>";
                            } else if ($transaction_status == "success") {
                                echo "<span class='success'>success</span>";
                            } else if ($transaction_status == "won") {
                                echo "<span class='success'>won</span>";
                            } else if ($transaction_status == "loss") {
                                echo "<span class='pending'>loss</span>";
                            }
                            ?>
                        </td>
                        <td style='background: var(--dark)'><?php echo $date ?></td>
                        <td style='background: var(--dark)'><?php echo $trade_won ?></td>
                        <td style='background: var(--dark)'><?php echo $trade_loss ?></td>
                        <td style='background: var(--dark)'><?php echo $stop_loss ?></td>
                        <td style='background: var(--dark)'><?php echo $take_profit ?></td>
                        <td style='background: var(--dark)'><?php echo $type_exe ?></td>
                        <td style='background: var(--dark)'><?php echo $pair_trade ?></td>
                        
                         <td style='background: var(--dark)'>
                                    <!--<a href="deposit?approve=<?php echo $id?>&a_id=<?php echo $t_id?>&amount=<?php echo $transaction_amount?>&name=<?php echo $name?>&mode=<?php echo $t_mode?>&type=<?php echo $eth?>"><button>Approve</button></a>-->
                                    <a href="trade?won=<?php echo $id?>&p_id=<?php echo $t_id?>"><button style='margin: 3px 0'>Won</button></a>
                                    <a href="trade?loss=<?php echo $id?>&p_id=<?php echo $t_id?>"><button style='margin: 3px 0'>Loss</button></a>
                                </td>


                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <?php

    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $t_won = $_POST['won'];
        $t_loss = $_POST['loss'];
        $t_status = $_POST['t_status'];
        $t_id = $_POST['t_id'];

        $sql = "UPDATE users SET won = '$t_won', loss = '$t_loss' WHERE user_id = '$id'";
        if ($connection->query($sql) === TRUE) {
            $t_sql = "UPDATE transaction SET trade_won = '$t_won', trade_loss = '$t_loss', transaction_status = '$t_status' WHERE transaction_user_id = '$id' AND transaction_id = '$t_id'";
            if ($connection->query($t_sql) === TRUE) {
                echo "<script>
                    alert('TRADE COUNT STATUS: Updated Successfully')
                    window.location.href = 'trade'
                  </script>";
            }
        } else {
            echo "<script>
                        alert('TRADE COUNT STATUS: ERROR')
                        window.location.href = 'trade'
                  </script>";
        }
    }
    ?>
    <br><br>
    <form action="" method="post">
        <label for="">Select User </label>
        <select name="id" style='color: var(--text); text-align: left' required>
            <option value="">Select Account </option>
            <?php
            $sql = "SELECT * FROM users";
            $result = $connection->query($sql);
            while ($row = $result->fetch_assoc()) {
                $db_name = $row['full_name'];
                $db_id = $row['user_id'];
            ?>
                <option value="<?php echo $db_id ?>"><?php echo $db_name ?>(<?php echo $db_id ?>)</option>
            <?php } ?>
        </select>

        <label for="">Trade Won</label>
        <input type="number" name='won' required><br>

        <label for="">Trade Loss</label>
        <input type="text" name='loss' required><br>

        <label for="">Trade Status</label>
        <select name="t_status" id="" required>
            <option value=""></option>
            <option value="won">Won</option>
            <option value="loss">Loss</option>
        </select>

        <label for="">Transaction ID</label>
        <input type="text" name='t_id' required><br>


        <button type='submit' name='submit'>Update</button><br>
        <hr><br><br>

    </form>
</div>


<script>
    function applyDataTable() {

        $('#example').DataTable({
            dom: 'Bfrtip',
            buttons: [{
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
        });


    }


    $(document).ready(function() {
        $('#trigger-update').click(function() {
            $('#example').DataTable().destroy();

            setTimeout(function() {
                applyDataTable();
            }, 2000);

        });

        applyDataTable();

    });
</script>

<?php include "../admin_includes/footer.php"; ?>