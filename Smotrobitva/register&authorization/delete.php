<?php require "db.php";
  $con = mysqli_connect("localhost","root","","reg");
  $user = $_SESSION['logged_user']->name;
  $sql = "DELETE FROM users1 WHERE users1.name = '$user'";
  $query = mysqli_query($con, $sql);
  $txt = "Пользователь ". $_SESSION['logged_user']->name ." удалил свою страницу.";
  $sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");
  unset($_SESSION['logged_user']);
  header('Location: ../index.php');
?>