<?php
session_start();
require "../database/connect.php";

if (isset($_GET['id'])) {

   // htmlspecialchars(trim($id = $_POST['id']));
   // htmlspecialchars(trim($role = $_POST['role']));

   // $id = mysqli_real_escape_string($connection, $id);
   // $role = mysqli_real_escape_string($connection, $role);

   // $the_id = $_GET['id'];
   // $_SESSION['user_id'] = $id;
   // $role = $_GET['role'];
   // $_SESSION['user_id'];



   // if ($role == "admin") {
   //    echo "<script>window.location.href = '../admin/index'</script>";
   // } else {
   //    echo "<script>window.location.href = '../dashboard/index'</script>";
   // }
}
