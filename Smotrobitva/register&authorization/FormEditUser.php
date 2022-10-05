<?php
$con = mysqli_connect("localhost","root","","register");

if(!$con)
{
    die('Connection Failed'. mysqli_connect_error());
}
?>
<?php include('includes/headerlk.php') ?>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Изменение данных
                            <a href="lk.php" class="btn btn-danger float-end">Назад</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_SESSION['logged_user']))
                        {
                            $user = $_SESSION['logged_user']->name;
                            $student_id = mysqli_real_escape_string($con, $_SESSION['logged_user']) ;
                            $query = "SELECT * FROM users WHERE users.name = '$user'";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $student = mysqli_fetch_array($query_run);
                                ?>
                                <form action="EditUser.php" method="POST">
                                        <div class="mb-3">
                                        <label>Никнейм</label>
                                        <input type="text" name="name" value="<?= $_SESSION['logged_user']->name;?>" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                        <label>Логин</label>
                                        <input type="text" name="email" value="<?= $_SESSION['logged_user']->email;?>" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                        <label>Пароль</label>
                                        <input type="password" name="password" placeholder="Введите пароль" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <button type="submit" name="update_student" class="btn btn-primary">
                                                Изменить
                                            </button>
                                        </div>
                                    </form>
                        <?php
                            }
                            else
                            {
                                echo "<h4> Как ты сюда попал? </h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php') ?>