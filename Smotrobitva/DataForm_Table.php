<?php
require 'dbcon.php';
include('includes/header.php');

if(isset($_POST['SelectDatabase']))
{ ?>
  <div class="container mt-5">
    <h1>
        <p class="text-center fs-1"><strong>Смотробитва</strong></p>    
    </h1>
    <h1>
        <p class="text-center fs-3"><strong>Выберите таблицу</strong></p>    
    </h1>
    <h1>
    
        <p class="text-center fs-3"><strong><?=$Database = mysqli_real_escape_string($con,$_POST['Database_name']);?></strong></p>    
    </h1>
    <form action="CryptData.php" method="POST">
      <div class="input-group mb-3">
        <select name="Table_name" class="form-select" id="inputGroupSelect01">
        <?php
        $Database = mysqli_real_escape_string($con,$_POST['Database_name']);
        $query = "SHOW TABLES";
        $query_run = mysqli_query($con, $query);
        
        if(mysqli_num_rows($query_run) > 0)
        {
            $index = 0;
            foreach($query_run as $table)
            {
                ?>
                <h1>    
                     <p class="text-center fs-3"><strong><?=$table?></strong></p>
                </h1>
                <option value="<?=$table['Tables_in_'.$Database]?>"><?= $table['Tables_in_'.$Database]?></option>
                <?php
                $index++;
            }
        }
        ?>
      <span class="input-group-text"></span>
      <input type="text" class="form-control" name="Message" placeholder="Сообщение" aria-label="Сообщение">
      <input type="text" class="form-control" name="Key" placeholder="Ключ" aria-label="Ключ">
      <input type="hidden" class="form-control" name="Hidden_Kostil" placeholder="Я не знаю почему оно не работает без лишней плашки, но так нужно" aria-label="Opening_score">   
      <select name="CryptStatus" class="form-select" id="inputGroupSelect02">
        <option name="EnCryptData" value="EnCryptData">Зашифровать</option>
        <option name="DeCryptData" value="DeCryptData">Расшифровать</option>
        <span class="input-group-text"></span>
        <input type="hidden" class="form-control" name="Hidden_Kostil2" placeholder="Я не знаю почему оно не работает без лишней плашки, но так нужно" aria-label="Opening_score">   
      <button type="submit" class="btn btn-primary">Выбрать</button>
    </form>
  </div>
</div>  
<?php 
}


include('includes/footer.php') ?>