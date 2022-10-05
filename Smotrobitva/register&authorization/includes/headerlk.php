<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Личный кабинет</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php require "./db.php"; // подключаем файл для соединения с БД?>
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
      <a class="navbar-brand" href="../index.php">
        <img src="../../assets/brand.svg" width="40" height="40" alt="WatchButtle">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Аниме</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Манга</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#">Персонажи</a>
          </li>
          <li class="nav-item"><hr class="dropdown-divider"></li>
          <li class="nav-item">
            <a class="btn" data-bs-toggle="collapse" href="#collapseSearch" role="button" aria-expanded="false" aria-controls="collapseSearch">
              <img src="../../assets/search.svg" width="30" height="30" alt="Поиск">
            </a>
          </li>
          
          
            <div class="collapse collapse-horizontal mt-1" id="collapseSearch">
              <form class="d-flex" role="search" style="width: 300px">
                <input class="form-control me-2" type="search" placeholder="Введите запрос" aria-label="Search">
                <button class="btn btn-outline-success " type="submit">Поиск</button>
              </form>
          </div>
        </ul>
        
        <div class="dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">  
            <img src="../../assets/simpleUser.svg" width="40" height="40" border-radius: 50% alt="Фото пользователя">
            <?php if(isset($_SESSION['logged_user'])) : ?>
            <?php echo $_SESSION['logged_user']->name; ?>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="lk.php">Личный кабинет</a></li>
              <li><a class="dropdown-item" href="#">Действие 2</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="logout.php">Выйти</a></li>
            </ul>
            </a>
            <?php endif; ?>
        </div>
      </div>
    </div>
  </nav>