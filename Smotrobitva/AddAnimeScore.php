<?php
require 'dbcon.php';

if(isset($_POST['add_anime']))
{
    //echo $_POST['Anime_name'];
    $Anime_name = mysqli_real_escape_string($con, $_POST['Anime_name']);
    $Opening_score = mysqli_real_escape_string($con, $_POST['Opening_score']);
    $Episode_score_1 = mysqli_real_escape_string($con, $_POST['Episode_score_1']);
    $Episode_score_2 = mysqli_real_escape_string($con, $_POST['Episode_score_2']);
    $Episode_score_3 = mysqli_real_escape_string($con, $_POST['Episode_score_3']);
    $Episode_score_4 = mysqli_real_escape_string($con, $_POST['Episode_score_4']);

    $query = "INSERT INTO user_score_nikoskuzo (Anime_name,Opening_score,Episode_score_1,Episode_score_2,Episode_score_3,Episode_score_4) 
    VALUES ('$Anime_name','$Opening_score','$Episode_score_1','$Episode_score_2','$Episode_score_3','$Episode_score_4')";
    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $res = [
            'status' => 200,
            'message' => 'Оценка аниме успешно добавлена'
        ];
        echo json_encode($res);
        return;
    }
    else 
    {
        $res = [
            'status' => 500,
            'message' => 'Оценка не добавлена'
        ];
        echo json_encode($res);
        return false;
    }
}

