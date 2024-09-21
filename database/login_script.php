<?php 
session_start();
require "connect.php";
if (isset($_SESSION['user_id'])) {
    $db_id = $_SESSION['user_id'];
    $db_role = $_SESSION['role'];
    // echo "<script>window.location.href = '../public/session.php?id=$db_id&role=$db_role'</script>";
    if ($db_role == "admin") {
        echo "<script>window.location.href = '../admin/index'</script>";
    } else {
        echo "<script>window.location.href = '../dashboard/index'</script>";
    }
}

$email = $password = $error = $db_email = $db_password = $db_id = "";
    if (isset($_POST['submit'])) {
        
         if (empty($_POST["email"])) {
            $error =  "Email is required";
          } else {
            htmlspecialchars(trim($email = $_POST['email']));
            $email = mysqli_real_escape_string($connection, $email);
          }
          
          if (empty($_POST["password"])) {
            $error = "Password is required";
          } else {
            htmlspecialchars(trim($password = $_POST['password']));
            $password = mysqli_real_escape_string($connection, $password);
          }

        if($email == "" || $password == ""){
            $error = "Email or Password fields cannot be empty!";
        }else{
            $sql = "SELECT * FROM users WHERE email = '$email' AND password  = '$password'";
            $result = $connection->query($sql);
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                $db_email = $row['email'];
                $db_password = $row['password'];
                $db_id = $row['user_id'];
                $db_role = $row['role'];
                
                $_SESSION['user_id'] = $db_id;
                $_SESSION['role'] = $db_role;
                $error = 'success';
                
                if ($db_role == "admin") {
                    echo "<script>window.location.href = '../admin/index'</script>";
                } else {
                    echo "<script>window.location.href = '../dashboard/index'</script>";
                }            
            }else{
                $error = 'error';
            }
            
          
        }
    }










// if (isset($_POST['submit'])) {
//     htmlspecialchars(trim($email = $_POST['email']));
//     htmlspecialchars(trim($password = $_POST['password']));

//     $email = mysqli_real_escape_string($connection, $email);
//     $password = mysqli_real_escape_string($connection, $password);

//     $st_email = strtolower($email);
//     $st_password = strtolower($password);

//     $sql = "SELECT * FROM users WHERE email = '$st_email' AND password  = '$st_password'";
//     $result = $connection->query($sql);
//     while ($row = $result->fetch_assoc()) {
//         $db_email = $row['email'];
//         $db_password = $row['password'];
//         $db_id = $row['user_id'];
//         $db_role = $row['role'];
//     }

//     if (empty($st_email) || empty($st_password)) {
//         $error = "empty";
//     } else if ($db_email == $st_email || $db_password == $st_password) {
        
//         // echo "<script>window.location.href = '../public/session.php?id=$db_id&role=$db_role'</script>";
        
//     } else {
//         $error = "error";
//     }
// }
