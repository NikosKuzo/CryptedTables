<?php
include('includes/headerlk.php');
$con = mysqli_connect("localhost","root","","reg");

if(!$con)
{
    die('Connection Failed'. mysqli_connect_error());
}

$name = $_REQUEST['name'];
$password = $_REQUEST['password'];
$email = $_REQUEST['email'];
$user = $_SESSION['logged_user']->name;
$sql = "SELECT password FROM users1 WHERE users1.name = '$user'";
$query = mysqli_query($con, $sql) or die();
$dataFromTable = mysqli_fetch_assoc($query);
$errors = array();

// Проводим проверки
    // trim — удаляет пробелы (или другие символы) из начала и конца строки
if(trim($email) == '') {

    $errors[] = "Email пуст";
}

if(trim($name) == '') {

    $errors[] = "Никнейм пуст";
}
if(trim($name) != $user && R::count('users1', "name = ?", array($name)) > 0) {

    $errors[] = "Никнейм занят";
}

if($password != '' && $password == $email) {
    $errors[] = "Email и пароль не должны совпадать";
}
if($password != '' && $password == $name) {
    $errors[] = "Никнейм и пароль не должны совпадать";
}
     // функция mb_strlen - получает длину строки

if (mb_strlen($name) < 3 || mb_strlen($name) > 50){
    
    $errors[] = "Недопустимая длина имени";

}

if ($password != '' &&(mb_strlen($password) < 5 || mb_strlen($password) > 48)){

    $errors[] = "Недопустимая длина пароля (от 5 до 48 символов)";

}

// проверка на правильность написания Email
if (!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $email)) {

    $errors[] = 'Неверно введен е-mail';

}

// Проверка на уникальность email

if(R::count('users1', "email = ?", array($email)) > 0 && $email != $_SESSION['logged_user']->email) {

    $errors[] = "Пользователь с таким Email существует!";
}

if (empty($errors)) {
    if ($password != ''){
        $sql = "UPDATE users1 set name='$name', password= md5($password), email='$email' WHERE users1.name = '$user'";
        echo " 
        <HTML>
        <HEAD>
            <META HTTP-EQUIV='Refresh' CONTENT='0; URL=lk.php'> 
        </HEAD>";
    }
    else {
        $sql = "UPDATE users1 set name='$name', email='$email' WHERE users1.name = '$user'";
        echo " 
        <HTML>
        <HEAD>
            <META HTTP-EQUIV='Refresh' CONTENT='0; URL=lk.php'> 
        </HEAD>";
    }
} else {
    echo '<div style="color: red; ">' . array_shift($errors). '</div><hr>';
//хз//
}
 
$query = mysqli_query($con, $sql) or die("error update");
mysqli_close($con);
$_SESSION['logged_user'] = R::findOne('users1', 'name = ?', array($name));
?>

