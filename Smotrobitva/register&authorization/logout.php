<?php 
include('includes/header.php'); // подключаем шапку проекта
require "db.php"; // подключаем файл для соединения с БД

$txt = "Пользователь ". $_SESSION['logged_user']->name ." вышел. IP ". $_SERVER['REMOTE_ADDR'];

$sendToTelegram = fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

// Производим выход пользователя
unset($_SESSION['logged_user']);

// Редирект на главную страницу
header('Location: ../index.php');

include('includes/footer.php') // Подключаем подвал проекта
?>