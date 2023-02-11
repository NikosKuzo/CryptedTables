<?php
require 'webdb_con.php';
require 'parser.php';
include('includes/header.php') ?>

<div class="container mt-5">
    <div class="row">
        <div class="col">
            
            <div class="row">
                
                <h5>
                    <p class="text-center fs-5"><strong>Шаблон сайта</strong></p>    
                </h5>
                <h5>
                    <p class="text-center fs-5"><strong>Новый элемент</strong></p>    
                </h5>
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
                <?php $perem = '<div class="row mb-3">
                <div class="col"><button type="submit" class="btn btn-dark float-left fs-6 text-decoration-none">Кнопка 1</button></div>
                <div class="col"><button type="submit" class="btn btn-dark float-left fs-6 text-decoration-none">Кнопка 2</button></div>
                <div class="col"><button type="submit" class="btn btn-dark float-left fs-6 text-decoration-none">Кнопка 3</button></div>
                </div>
                <div class="row mb-3">
                <div class="col"><button type="submit" class="btn btn-dark float-left fs-6 text-decoration-none">Кнопка 4</button></div>
                <div class="col"><button type="submit" class="btn btn-dark float-left fs-6 text-decoration-none">Кнопка 5</button></div>
                </div>
                ';?>
                <?= "". $perem;?>
            </div>
        </div>
        <div class="col">
            <div class="row">
                <h5>
                    <a href="CreatePattern.php" class="btn fs-5 float-end"><strong>Создать шаблон</strong></a>    
                </h5>
            </div>
            <p class="text-center fs-1"><strong>Кнопки</strong></p>
            <?php $query = "SELECT ID, HTML_text FROM patterns";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {?>
                                        <div class="row"><?php
                                        foreach($query_run as $text)
                                        {   ?>
                                            
                                                <div class="col-md-auto">
                                                    <p>
                                                    <button type="submit" name=<?="pattern_" . $text['ID'];?>  value=<?= $text['HTML_text'];?> class="btn btn-primary float-left fs-6 text-decoration-none"><strong><?= $text['HTML_text'];?></strong></button>
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