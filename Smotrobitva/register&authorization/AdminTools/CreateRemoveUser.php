<?php
require 'includes/db.php';
require './../db.php"';
if(isset($_POST['delete_user']))
{
    $user_id = mysqli_real_escape_string($con, $_POST['delete_user']);

    $query = "DELETE FROM users1 WHERE id='$user_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Пользователь успешно удален";
        header("Location: FormEditUsers.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Пользователь не был удален";
        header("Location: FormEditUsers.php");
        exit(0);
    }
}

if(isset($_POST['update_user']))
{
    $id = mysqli_real_escape_string($con, $_POST['update_user']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $errors = array();
    $bd = R::load('users1', $id);

// Проводим проверки
    // trim — удаляет пробелы (или другие символы) из начала и конца строки
if(trim($email) == '') {

    $errors[] = "Email пуст";
}

if($bd-> name != $name && R::count('users1', "name = ?", array($name)) > 0) {

    $errors[] = "Никнейм занят";
}

if($password == $email) {
    $errors[] = "Email и пароль не должны совпадать";
}
if($password == $name) {
    $errors[] = "Никнейм и пароль не должны совпадать";
}
     // функция mb_strlen - получает длину строки

if (mb_strlen($name) < 3 || mb_strlen($name) > 50){
    
    $errors[] = "Недопустимая длина имени";

}

if (mb_strlen($password) < 5 || mb_strlen($password) > 48){

    $errors[] = "Недопустимая длина пароля (от 5 до 48 символов)";

}

// проверка на правильность написания Email
if (!preg_match("/[0-9a-z_]+@[0-9a-z_^\.]+\.[a-z]{2,3}/i", $email)) {

    $errors[] = 'Неверно введен е-mail';

}

// Проверка на уникальность email

if($bd-> email != $email && R::count('users1', "email = ?", array($email)) > 0 && $email != $_SESSION['logged_user']->email) {

    $errors[] = "Пользователь с таким Email существует!";
}

if (empty($errors)) {
    $password = md5($password);
    $query = "UPDATE users1 SET name='$name', email='$email', password= '$password' WHERE users1.id='$id'";
    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Пользователь был обновлен";
        header("Location: users-edit.php");
        exit(0);
    }
}
else 
{
    $_SESSION['message'] = array_shift($errors);
    header("Location: users-edit.php");
    exit(0);
}
}

if(isset($_POST['save_user']))
{
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $errors = array();

// Проводим проверки
    // trim — удаляет пробелы (или другие символы) из начала и конца строки
if(trim($email) == '') {

    $errors[] = "Email пуст";
}

if(R::count('users1', "name = ?", array($name)) > 0) {

    $errors[] = "Никнейм занят";
}

if($password == $email) {
    $errors[] = "Email и пароль не должны совпадать";
}
if($password == $name) {
    $errors[] = "Никнейм и пароль не должны совпадать";
}
     // функция mb_strlen - получает длину строки

if (mb_strlen($name) < 3 || mb_strlen($name) > 50){
    
    $errors[] = "Недопустимая длина имени";

}

if (mb_strlen($password) < 5 || mb_strlen($password) > 48){

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
    $password = md5($password);
    $query = "INSERT INTO users1 (name, email ,password) VALUES ('$name','$email','$password')";
    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Пользователь был создан";
        header("Location: users-create.php");
        exit(0);
    }
}
else 
{
    $_SESSION['message'] = array_shift($errors);
    header("Location: users-create.php");
    exit(0);
}
}

?>