<?php require "db.php";
  $con = mysqli_connect("localhost","root","","register");
  $user = $_SESSION['logged_user']->name;
  $sql = "DELETE FROM users WHERE users.name = '$user'";
  $query = mysqli_query($con, $sql);
  unset($_SESSION['logged_user']);
  header('Location: ../index.php');
?>