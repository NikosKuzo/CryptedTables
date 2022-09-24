<?php
require 'dbcon.php';

include('includes/header.php');

if(isset($_POST['anime_all']))
{
    ?>
    <div class="container-xxl mt-5">
        <div class="row">
            <div class="col-md-12">
                        <h4 class="text-dark fs-1"><strong>Аниме-схватки</strong>
                        <a href="index.php" class="btn float-end fs-3"><strong>СМОТРОБИТВА</strong></a>
                        </h4>
                    </div>
                    <form action="ScorePage.php" method="POST"><div class="col-md-12"><button name="anime_all" value="anime_all" class="btn text-secondary float-end">Мои оценки</a></div></form>
                    <div class="card-body">
                        <table class="table table-sm table-borderless">
                        <caption>Цветы зла дисквалифицированы за рисовку</caption> <!-- заменить на вывод всех battle_caption из таблицы battles_anime-->
                            <thead>
                                <tr>
                                    <th>Название</th>
                                    <th>Статус</th>
                                    <th>Озвучка</th>
                                    <th>Общая оценка</th>
                                    <th>Оценка опенинга</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = "SELECT * FROM battle_anime_summary";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $anime)
                                        {
                                            //echo $anime['Name'];
                                            if($anime['Status'] == 'Дроп')
                                            {
                                                ?>
                                                <tr class="table-danger">
                                                <td><?= $anime['Name']; ?></td>
                                                <td><?= $anime['Status']; ?></td>
                                                <td><?= $anime['VoiceOver']; ?></td>
                                                <td><?= $anime['OverallScore']; ?></td>
                                                <td><?= $anime['OpeningScore']; ?></td>
                                                </tr>
                                            <?php
                                            }
                                            else if($anime['Status'] == 'Победитель')
                                            {
                                                ?>
                                                <tr class="table-success">
                                                <td><?= $anime['Name']; ?></td>
                                                <td><?= $anime['Status']; ?></td>
                                                <td><?= $anime['VoiceOver']; ?></td>
                                                <td><?= $anime['OverallScore']; ?></td>
                                                <td><?= $anime['OpeningScore']; ?></td>
                                                </tr>
                                            <?php
                                            }
                                            else if($anime['Status'] == 'Финалист')
                                            {
                                                ?>
                                                <tr class="table-info">
                                                <td><?= $anime['Name']; ?></td>
                                                <td><?= $anime['Status']; ?></td>
                                                <td><?= $anime['VoiceOver']; ?></td>
                                                <td><?= $anime['OverallScore']; ?></td>
                                                <td><?= $anime['OpeningScore']; ?></td>
                                                </tr>
                                            <?php
                                            }
                                            else if($anime['Status'] == 'На досуге')
                                            {
                                                ?>
                                                <tr class="table-light">
                                                <td><?= $anime['Name']; ?></td>
                                                <td><?= $anime['Status']; ?></td>
                                                <td><?= $anime['VoiceOver']; ?></td>
                                                <td><?= $anime['OverallScore']; ?></td>
                                                <td><?= $anime['OpeningScore']; ?></td>
                                                </tr>
                                            <?php
                                            }
                                            else if($anime['Status'] == 'Легенда')
                                            {
                                                ?>
                                                <tr class="table-warning">
                                                <td><?= $anime['Name']; ?></td>
                                                <td><?= $anime['Status']; ?></td>
                                                <td><?= $anime['VoiceOver']; ?></td>
                                                <td><?= $anime['OverallScore']; ?></td>
                                                <td><?= $anime['OpeningScore']; ?></td>
                                                </tr>
                                            <?php
                                            }
                                            else if($anime['Status'] == 'Просмотр')
                                            {
                                                ?>
                                                <tr>
                                                <td><?= $anime['Name']; ?></td>
                                                <td><?= $anime['Status']; ?></td>
                                                <td><?= $anime['VoiceOver']; ?></td>
                                                <td><?= $anime['OverallScore']; ?></td>
                                                <td><?= $anime['OpeningScore']; ?></td>
                                                </tr>
                                            <?php
                                            }
                                            else
                                            {
                                                ?>
                                                <tr class="table-primary">
                                                <td><?= $anime['Name']; ?></td>
                                                <td><?= $anime['Status']; ?></td>
                                                <td><?= $anime['VoiceOver']; ?></td>
                                                <td><?= $anime['OverallScore']; ?></td>
                                                <td><?= $anime['OpeningScore']; ?></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                            
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
    <?php
}
?>


<?php
if(isset($_POST['anime_battle']))
{
    $battle_number = $_POST['anime_battle'];
    $query_info = "SELECT * FROM battles_anime WHERE battle_number = '$battle_number'";
    $query_info_run = mysqli_query($con, $query_info);
    $table_info = mysqli_fetch_array($query_info_run);
    ?>
    <div class="container-xxl mt-5">
        <div class="row">
            <div class="col-md-12">
                        <h4 class="text-dark fs-1"><strong>Турнир №<?= $table_info['battle_number']; ?>. "<?= $table_info['battle_name']; ?>"</strong>
                        <a href="index.php" class="btn float-end fs-3"><strong>СМОТРОБИТВА</strong></a>
                        </h4>
                    </div>
                    <form action="ScorePage.php" method="POST"><div class="col-md-12"><button name="anime_battle" value=<?= $_POST['anime_battle']?> class="btn text-secondary float-end">Мои оценки</a></div></form>
                    <div class="card-body">
                        <table class="table table-sm table-borderless">
                        <caption><?= $table_info['battle_caption']; ?></caption>
                            <thead>
                                <tr>
                                    <th>Название</th>
                                    <th>Статус</th>
                                    <th>Озвучка</th>
                                    <th>Общая оценка</th>
                                    <th>Оценка опенинга</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $battle_participant_id = $table_info['battle_participants'];
                                    $query_participants = "SELECT * FROM battle_participants WHERE battle_id = $battle_participant_id";
                                    $query_participants_run = mysqli_query($con, $query_participants);
                                    $query_where = "";
                                    if(mysqli_num_rows($query_participants_run) > 0)
                                    {
                                        $index = 1;
                                        $query_count ="SELECT count(*)
                                        FROM information_schema.columns
                                        WHERE table_name = 'battle_participants'";
                                        $query_count_run = mysqli_query($con, $query_count);
                                        $query_count_run = $query_count_run->fetch_array();
                                        $count = intval($query_count_run[0]);
                                        foreach($query_participants_run as $key)
                                        {
                                            while($index < $count)
                                            {
                                            $anime_participant_name = "anime_name_" . $index;
                                            if(!is_null($key[$anime_participant_name]))
                                            {
                                                if($index == 1)
                                                {
                                                    $query_where .= "name = '" . $key[$anime_participant_name] . "'";
                                                }
                                                else
                                                {
                                                    $query_where .= " OR name = '" . $key[$anime_participant_name] . "'";
                                                }
                                            }
                                            $index++;
                                            }
                                        }
                                    }
                                    $query = "SELECT * FROM battle_anime_summary WHERE " . $query_where;
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $anime)
                                        {
                                            //echo $anime['Name'];
                                            if($anime['Status'] == 'Дроп')
                                            {
                                                ?>
                                                <tr class="table-danger">
                                                <td><?= $anime['Name']; ?></td>
                                                <td><?= $anime['Status']; ?></td>
                                                <td><?= $anime['VoiceOver']; ?></td>
                                                <td><?= $anime['OverallScore']; ?></td>
                                                <td><?= $anime['OpeningScore']; ?></td>
                                                </tr>
                                            <?php
                                            }
                                            else if($anime['Status'] == 'Победитель')
                                            {
                                                ?>
                                                <tr class="table-success">
                                                <td><?= $anime['Name']; ?></td>
                                                <td><?= $anime['Status']; ?></td>
                                                <td><?= $anime['VoiceOver']; ?></td>
                                                <td><?= $anime['OverallScore']; ?></td>
                                                <td><?= $anime['OpeningScore']; ?></td>
                                                </tr>
                                            <?php
                                            }
                                            else if($anime['Status'] == 'Финалист')
                                            {
                                                ?>
                                                <tr class="table-info">
                                                <td><?= $anime['Name']; ?></td>
                                                <td><?= $anime['Status']; ?></td>
                                                <td><?= $anime['VoiceOver']; ?></td>
                                                <td><?= $anime['OverallScore']; ?></td>
                                                <td><?= $anime['OpeningScore']; ?></td>
                                                </tr>
                                            <?php
                                            }
                                            else if($anime['Status'] == 'На досуге')
                                            {
                                                ?>
                                                <tr class="table-light">
                                                <td><?= $anime['Name']; ?></td>
                                                <td><?= $anime['Status']; ?></td>
                                                <td><?= $anime['VoiceOver']; ?></td>
                                                <td><?= $anime['OverallScore']; ?></td>
                                                <td><?= $anime['OpeningScore']; ?></td>
                                                </tr>
                                            <?php
                                            }
                                            else if($anime['Status'] == 'Легенда')
                                            {
                                                ?>
                                                <tr class="table-warning">
                                                <td><?= $anime['Name']; ?></td>
                                                <td><?= $anime['Status']; ?></td>
                                                <td><?= $anime['VoiceOver']; ?></td>
                                                <td><?= $anime['OverallScore']; ?></td>
                                                <td><?= $anime['OpeningScore']; ?></td>
                                                </tr>
                                            <?php
                                            }
                                            else if($anime['Status'] == 'Просмотр')
                                            {
                                                ?>
                                                <tr>
                                                <td><?= $anime['Name']; ?></td>
                                                <td><?= $anime['Status']; ?></td>
                                                <td><?= $anime['VoiceOver']; ?></td>
                                                <td><?= $anime['OverallScore']; ?></td>
                                                <td><?= $anime['OpeningScore']; ?></td>
                                                </tr>
                                            <?php
                                            }
                                            else
                                            {
                                                ?>
                                                <tr class="table-primary">
                                                <td><?= $anime['Name']; ?></td>
                                                <td><?= $anime['Status']; ?></td>
                                                <td><?= $anime['VoiceOver']; ?></td>
                                                <td><?= $anime['OverallScore']; ?></td>
                                                <td><?= $anime['OpeningScore']; ?></td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                            
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
    <?php
}
?>

<?php include('includes/footer.php') ?>