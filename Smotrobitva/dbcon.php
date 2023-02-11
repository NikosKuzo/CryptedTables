<?php

//todo: изменить подключение не только к смотробитве
$con = mysqli_connect("localhost","root","","smotrobitva");

if(!$con)
{
    die('Connection Failed'. mysqli_connect_error());
}

?>