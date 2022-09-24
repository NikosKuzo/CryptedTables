<?php 
$title="Форма регистрации"; // название формы
include('includes/header.php'); // подключаем шапку проекта
require "db.php"; // подключаем файл для соединения с БД
// Создаем переменную для сбора данных от пользователя по методу POST
$data = $_POST;

// Пользователь нажимает на кнопку "Зарегистрировать" и код начинает выполняться
if(isset($data['do_signup'])) {

        // Регистрируем
        // Создаем массив для сбора ошибок
	$errors = array();

	// Проводим проверки
        // trim — удаляет пробелы (или другие символы) из начала и конца строки
	if(trim($data['email']) == '') {

		$errors[] = "Введите Email";
	}

	if(trim($data['name']) == '') {

		$errors[] = "Введите Имя";
	}

	if($data['password'] == '') {
		$errors[] = "Введите пароль";
	}
	if($data['password'] == $data['name']) {
		$errors[] = "Никнейм и пароль не должны совпадать";
	}

	if($data['password'] == $data['email']) {
		$errors[] = "Email и пароль не должны совпадать";
	}

	if($data['password_2'] != $data['password']) {

		$errors[] = "Повторный пароль введен не верно!";
	}
         // функция mb_strlen - получает длину строки

    if (mb_strlen($data['name']) < 3 || mb_strlen($data['name']) > 50){
	    
	    $errors[] = "Недопустимая длина имени";

    }

    if (mb_strlen($data['password']) < 5 || mb_strlen($data['password']) > 48){
	
	    $errors[] = "Недопустимая длина пароля (от 5 до 48 символов)";

    }

    // проверка на правильность написания Email
    if (!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $data['email'])) {

	    $errors[] = 'Неверно введен е-mail';
    
    }

	// Проверка на уникальность email

	if(R::count('users', "email = ?", array($data['email'])) > 0) {

		$errors[] = "Пользователь с таким Email существует!";
	}


	if(empty($errors)) {

		// Все проверено, регистрируем
		// Создаем таблицу users
		$user = R::dispense('users');
    // добавляем в таблицу записи
		$user->email = $data['email'];
		$user->name = $data['name'];

		// Хешируем пароль
		$user->password = password_hash($data['password'], PASSWORD_DEFAULT);

		// Сохраняем таблицу
		R::store($user);
        echo '<div style="color: green; ">Вы успешно зарегистрированы! Можно <a href="login.php">авторизоваться</a>.</div><hr>';

	} else {
                // array_shift() извлекает первое значение массива array и возвращает его, сокращая размер array на один элемент. 
		echo '<div style="color: red; ">' . array_shift($errors). '</div><hr>';
	}
}
?>

<div class="container mt-5">
  <div class="row">
    <div class="col offset-md-4">
	   <!-- Форма регистрации -->
		  <h2>Регистрация</h2>
		  <form action="signup.php" method="post">
      <div class="col-md-4 mb-3">
        <label for="exampleInputEmail1" class="form-label" >Адрес электронной почты</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="Введите Email" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">Мы никогда никому не передадим вашу электронную почту.</div>
      </div>
      <div class="col-md-4 mb-3">
			  <input type="text" class="form-control" name="name" id="name" placeholder="Введите ник" required>
      </div>
      <div class="col-md-4 mb-3">
			  <input type="password" class="form-control" name="password" id="password" placeholder="Введите пароль">
      </div>
      <div class="col-md-4 mb-3" >
			  <input type="password" class="form-control" name="password_2" id="password_2" placeholder="Повторите пароль" >
      </div>
			  <button class="btn btn-success" name="do_signup" type="submit">Зарегистрировать</button>
		  </form>
		  <br>
		  <p>Если вы зарегистрированы, тогда нажмите <a href="login.php">здесь</a>.</p>
		  <p>Вернуться на <a href="../index.php">главную</a>.</p>
		</div>
	</div>
</div>
<?php include('includes/footer.php') ?> <!-- Подключаем подвал проекта -->