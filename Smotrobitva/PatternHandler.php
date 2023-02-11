<?php
session_start();
require 'webdb_con.php';

if(isset($_POST['add_pattern']))
{
    $HTML_Text = mysqli_real_escape_string($con, $_POST['HTML_Text']);
    $Opening_delimiter = mysqli_real_escape_string($con, $_POST['Opening_delimiter']);
    $Opening_signature = mysqli_real_escape_string($con, $_POST['Opening_signature']);
    $Closing_delimiter = mysqli_real_escape_string($con, $_POST['Closing_delimiter']);
    $Closing_signature = mysqli_real_escape_string($con, $_POST['Closing_signature']);
    $Inside_separator = mysqli_real_escape_string($con, $_POST['Inside_separator']);
    

    $query = "INSERT INTO patterns (HTML_Text,Opening_delimiter,Opening_signature,Closing_delimiter,Closing_signature,Inside_separator) 
    VALUES ('$HTML_Text','$Opening_delimiter','$Opening_signature','$Closing_delimiter','$Closing_signature','$Inside_separator')";
    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Шаблон успешно добавлен";
        header("Location: Constructor.php");
        exit(0);
    }
    else 
    {
        $_SESSION['message'] = "Шаблон не создан";
        header("Location: Constructor.php");
        exit(0);
    }
}

?>