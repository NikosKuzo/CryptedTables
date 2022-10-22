<?php
// Подключаем библиотеку RedBeanPHP
require "rb-mysql.php";

// Подключаемся к БД
R::setup( 'mysql:host=localhost;dbname=reg',
        'root', '' );

// Проверка подключения к БД
if(!R::testConnection()) die('No DB connection!');

//В переменную $token нужно вставить токен, который нам прислал @botFather
$token = "5772031631:AAHAFoxkLi5yI7MCRjQiDoxQ5-8Y5BpFIoI";
//Сюда вставляем chat_id
$chat_id = "-867864414";

session_start(); // Создаем сессию для авторизации
?>