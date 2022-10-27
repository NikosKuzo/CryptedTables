<?php
$con = mysqli_connect("localhost","root","","reg");
//В переменную $token нужно вставить токен, который нам прислал @botFather
$token = "5772031631:AAHAFoxkLi5yI7MCRjQiDoxQ5-8Y5BpFIoI";
//Сюда вставляем chat_id
$chat_id = "-867864414";
if(!$con)
{
    die('Connection Failed'. mysqli_connect_error());
}
