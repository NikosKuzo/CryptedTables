<?php 
$title="Форма авторизации"; // название формы
include('includes/header.php'); // подключаем шапку проекта
require "db.php"; // подключаем файл для соединения с БД
// Создаем переменную для сбора данных от пользователя по методу POST
$data = $_POST;

// Пользователь нажимает на кнопку "Авторизоваться" и код начинает выполняться
if(isset($data['do_login'])) { 

 // Создаем массив для сбора ошибок
 $errors = array();

 // Проводим поиск пользователей в таблице users
 $user = R::findOne('users', 'name = ?', array($data['name']));

 if($user) {

 	// Если логин существует, тогда проверяем пароль
 	if(password_verify($data['password'], $user->password)) {

 		// Все верно, пускаем пользователя
 		$_SESSION['logged_user'] = $user;
 		
 		// Редирект на главную страницу
    header('Location: ../index.php');

 	} else {
    
    $errors[] = 'Пароль неверно введен!';

 	}

 } else {
 	$errors[] = 'Пользователь с таким логином не найден!';
 }

if(!empty($errors)) {

		echo '<div style="color: red; ">' . array_shift($errors). '</div><hr>';

	}

}
?>

<div class="container mt-4">
		<div class="row">
    <div class="col offset-md-4">
		<!-- Форма авторизации -->
		<h2>Авторизация</h2>
		<form action="login.php" method="post">
      <div class="col-md-4 mb-3">
			  <input  type="text" class="form-control" name="name" id="name" placeholder="Введите ник" required>
      </div>
      <div class="col-md-4 mb-3">
			  <input type="password" class="form-control" name="password" id="pass" placeholder="Введите пароль" required>
      </div>
			<button class="btn btn-success" name="do_login" type="submit">Авторизоваться</button>
		</form>
		<br>
		<p>Если вы еще не зарегистрированы, тогда нажмите <a href="signup.php">здесь</a>.</p>
		<p>Вернуться на <a href="../index.php">главную</a>.</p>
			</div>
		</div>
	</div>

  <?php include('includes/footer.php') ?> <!-- Подключаем подвал проекта -->