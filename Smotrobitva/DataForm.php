<?php
require 'dbcon.php';
include('includes/header.php') ?>

<div class="container mt-5">
    <h1>
        <p class="text-center fs-1"><strong>Смотробитва</strong></p>    
    </h1>
    <h1>
        <p class="text-center fs-3"><strong>Выберите базу данных</strong></p>    
    </h1>
    <form action="DataForm_Table.php" method="POST">
      <div class="input-group mb-3">
        <select name="Database_name" class="form-select" id="inputGroupSelect01">
        <?php
        $query = "SHOW DATABASES";
        $query_run = mysqli_query($con, $query);
        
        if(mysqli_num_rows($query_run) > 0)
        {
            $index = 0;
            foreach($query_run as $database)
            {
                ?>
                <option value="<?=$database['Database']?>"><?= $database['Database']?></option>
                <?php
                $index++;
            }
        }
        ?>
      <span class="input-group-text"></span>
      <input type="hidden" class="form-control" name="Hidden_Kostil" placeholder="Я не знаю почему оно не работает без лишней плашки, но так нужно" aria-label="Opening_score">   
      <button type="submit" name="SelectDatabase" class="btn btn-primary">Выбрать</button>
    </form>
  </div>
</div>

<?php include('includes/footer.php') ?>