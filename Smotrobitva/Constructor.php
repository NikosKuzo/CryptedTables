<?php
require 'webdb_con.php';
require 'parser.php';
include('includes/header.php') ?>

<div class="container mt-5">
    <div class="row">
        <div class="col">
            <div class="row">
                <h1>
                    <a href="CreatePattern.php" class="btn fs-5"><strong>Создать шаблон</strong></a>    
                </h1>
            </div>
            <div class="row">
                
                <h1>
                    <p class="text-center fs-1"><strong>Шаблон сайта</strong></p>    
                </h1>
                <h1>
                    <p class="text-center fs-3"><strong>Новый элемент</strong></p>    
                </h1>
                <form action="Construct.php" method="POST">
                <div class="mb-3">
                    <label for="Name" class="form-label">Сигнатурный код</label>
                    <input type="text" class="form-control" name="DATABASE_Name" id="Name" aria-describedby="DATABASE_Create">
                    <div id="DATABASE_Create" class="form-text"></div>
                </div>
                <button type="submit" name="Create_Database" class="btn btn-primary">Создать</button>
                </form>
            </div>
            <div class="row">
                <p class="text-center fs-1"><strong>Шаблон</strong></p> 
                <?php $perem = '<div class="col"><button type="submit" class="btn text-dark float-left fs-6 text-decoration-none">я кнопка</button></div>';?>
                <?= "". $perem;?>
                <?php $perem = parseTagsToHTML("Shablon", "index");?>
                <?= $perem?>
            </div>
        </div>
        <div class="col">
            <p class="text-center fs-1"><strong>Кнопки</strong></p>
            <?php $query = "SELECT ID, HTML_text FROM patterns";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $text)
                                        {   ?>
                                            <div class="row">
                                                <div class="col">
                                                    <p>
                                                    <button type="submit" name=<?="pattern_" . $text['ID'];?>  value=<?= $text['HTML_text'];?> class="btn text-dark float-left fs-6 text-decoration-none"><strong><?= $text['HTML_text'];?></strong></button>
                                                    </p>
                                                </div> 
                                        <?php
                                        }
                                    }
            ?>
        </div>
    </div>
</div>

<?php include('includes/footer.php') ?>