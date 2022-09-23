<?php
session_start();
require 'dbcon.php';
?>

<?php include('includes/header.php'); ?>
    <div class="container-xxl mt-5">
        <div class="row">
            <div class="col-md-12">
                        <h4 class="text-dark fs-1"><strong>Аниме-схватки</strong>
                        <a href="index.php" class="btn float-end fs-3"><strong>СМОТРОБИТВА</strong></a>
                        </h4>
                    </div>
                    <div class="col-md-12">
                    <form action="Battle_anime.php" method="POST"><div class="col-md-12"><button name="anime_all" value="anime_all" class="btn text-secondary float-end">Вернуться</a></div></form>
                    <div class="card-body">
                        <table id="anime_scores" class="table table-sm table-borderless">
                            <thead>
                                <tr>
                                    <th>Название</th>
                                    <th>Опенинг</th>
                                    <?php
                                    $query_count ="SELECT count(*)
                                    FROM information_schema.columns
                                    WHERE table_name = 'user_score_nikoskuzo'";//заменить nikoskuzo на <?=currentuser? > (после того как появится система пользователей)
                                    $query_count_run = mysqli_query($con, $query_count);
                                    $query_count_run = $query_count_run->fetch_array();
                                    $count = intval($query_count_run[0]);
                                    for($i = 1; $i < $count-2; $i++)
                                    {
                                        ?>
                                        <th>Серия <?= $i?></th>
                                        <?php
                                    }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = "SELECT * FROM user_score_nikoskuzo";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $anime)
                                        {
                                            ?>
                                            <tr>
                                            <td><?= $anime['Anime_name']?></td>
                                            <td><?= $anime['Opening_score']?></td>
                                            <?php
                                            $query_count ="SELECT count(*)
                                            FROM information_schema.columns
                                            WHERE table_name = 'user_score_nikoskuzo'";//заменить nikoskuzo на <?=currentuser? > (после того как появится система пользователей)
                                            $query_count_run = mysqli_query($con, $query_count);
                                            $query_count_run = $query_count_run->fetch_array();
                                            $count = intval($query_count_run[0]);
                                            for($i = 1; $i < $count-2; $i++)
                                            {
                                                $score = "Episode_score_" . $i
                                                ?>
                                                <td><?= $anime[$score]?></td>
                                                <?php
                                            }
                                            ?>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Records Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>
            </div>
        </div>
    </div>

<div class="container mt-5">
    <form id="add_anime">
        <div class="input-group mb-3">
        <select name="Anime_name" class="form-select" id="inputGroupSelect01">
        <?php
        $query = "SELECT * FROM battle_anime_summary";
        $query_run = mysqli_query($con, $query);
        
        if(mysqli_num_rows($query_run) > 0)
        {
            $index = 0;
            foreach($query_run as $anime)
            {
                ?>
                <option value="<?=$anime['Name']?>"><?= $anime['Name']?></option>
                <?php
                $index++;
            }
        }
        
        ?>
        <span class="input-group-text"></span>
        <input type="text" class="form-control" name="Opening_score" placeholder="Опенинг" aria-label="Opening_score">
        <?php
            $query_count ="SELECT count(*)
            FROM information_schema.columns
            WHERE table_name = 'user_score_nikoskuzo'";//заменить nikoskuzo на <?=currentuser? > (после того как появится система пользователей)
            $query_count_run = mysqli_query($con, $query_count);
            $query_count_run = $query_count_run->fetch_array();
            $count = intval($query_count_run[0]);
            for($i = 1; $i < $count-2; $i++)
            {
                ?>
                <input type="text" class="form-control" name="Episode_score_<?=$i?>" placeholder="<?=$i?> серия" aria-label="Episode<?=$i?>">
                <?php
            }
            ?>
        
            <button class="btn btn-outline-success" type="submit">Добавить</button>
  </form>
</div>

    </div>
</div>

<?php 
include('includes/footer_scoreAnime.php') ?>