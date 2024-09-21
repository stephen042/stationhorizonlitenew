<?php 
    session_start();
    $_SESSION['user_id'] = Null;
    echo "<script>window.location.href = '../public/login'</script>";

?>