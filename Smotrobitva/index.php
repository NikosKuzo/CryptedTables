<?php
require 'dbcon.php';
include('includes/header.php') ?>

<div class="container mt-5">
    <h1>
        <p class="text-center fs-1"><strong>Смотробитва</strong></p>    
    </h1>
    <form action="Battle_Anime.php" method="POST">
        <div class="row">
            <h4>
                <p>
                <button type="submit" name="anime_all" value="anime_all" style="border:none;" class="btn text-dark float-left fs-2 text-decoration-none btn-sm"><strong>Аниме-схватки</strong></button>
                <a href="Battle_Anime_Valuable.php" class="btn text-decoration-none float-end fs-6 text-secondary text-opacity-25" style="--bs-text-opacity: .5;"><strong>Эта битва будет легендарной...</strong></a>
                </p>
            </h4>    
        </div>
        <?php
        $query_info = "SELECT * FROM battles_anime";
        $query_info_run = mysqli_query($con, $query_info);
        if(mysqli_num_rows($query_info_run) > 0)
        foreach($query_info_run as $table_row)
        {
            ?>
            <div class="row">
                <div class="col">
                    <p>
                    <button type="submit" name="anime_battle" value=<?= $table_row['battle_number'];?> class="btn text-dark float-left fs-6 text-decoration-none"><strong>Турнир №<?= $table_row['battle_number']; ?>. "<?= $table_row['battle_name']; ?>"</strong></button>
                    </p>
                </div>
                <?php if(is_null($table_row['battle_winner']))
                {
                    ?>
                    <div class="col">
                    <p class="text-dark"><strong>Идет...</strong></p>
                    </div>
                    <?php
                }
                else
                {
                    ?>
                    <div class="col">
                    <p class="text-success"><strong>Победитель: <?= $table_row['battle_winner']; ?></strong></p>
                    </div>
                    <?php
                }
                ?>
            </div>
        <?php
        }
        ?>
    </form>
    <div class="row">
    <h4>
         <p><strong>Мультсериалы</strong></p>
    </h4>    
    </div>
    <div class="row">
            <div class="col">
                <p><strong>Турнир №1. "Ностальгический"</strong></p>
            </div>
            <div class="col">
                <p><strong>Идет...</strong></p>
            </div>
        </div>
</div>

<?php include('includes/footer.php') ?>