<?php

//todo: изменить подключение не только к webdb_core
$con = mysqli_connect("localhost","root","","webdb_core");

if(!$con)
{
    die('Connection Failed'. mysqli_connect_error());
}

?>