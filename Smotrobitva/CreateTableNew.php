<?php
require 'dbcon.php';
include('includes/header.php') ?>

<div class="container mt-5">
    <h1>
        <p class="text-center fs-1"><strong>Смотробитва</strong></p>    
    </h1>
    <h1>
        <p class="text-center fs-3"><strong>Новая база данных</strong></p>    
    </h1>
    <form action="Construct.php" method="POST">
      <div class="mb-3">
        <label for="Name" class="form-label">Название</label>
        <input type="text" class="form-control" name="DATABASE_Name" id="Name" aria-describedby="DATABASE_Create">
        <div id="DATABASE_Create" class="form-text"></div>
      </div>
      <button type="submit" name="Create_Database" class="btn btn-primary">Создать</button>
    </form>
</div>

<?php include('includes/footer.php') ?>