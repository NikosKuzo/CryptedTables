<?php include('includes/headerAdmin.php') ?>

<div class="container mt-5">

    <?php include('message.php'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Изменение пользователя
                        <a href="FormEditUsers.php" class="btn btn-danger float-end">Назад</a>
                    </h4>
                </div>
                <div class="card-body">

                    <?php
                    if (isset($_GET['id'])) {
                        $user_id = mysqli_real_escape_string($con, $_GET['id']);
                        $query = "SELECT * FROM users1 WHERE id='$user_id' ";
                        $query_run = mysqli_query($con, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            $user = mysqli_fetch_array($query_run);
                    ?>
                            <form action="CreateRemoveUser.php" method="POST">
                                <div class="mb-3">
                                    <label>Никнейм</label>
                                    <input type="text" name="name" value="<?= $user['name']; ?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Email</label>
                                    <input type="text" name="email" value="<?= $user['email']; ?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Пароль</label>
                                    <input type="password" name="password" placeholder="Введите пароль" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <button type="submit" name="update_user" value="<?= $user['id']; ?>" class="btn btn-primary">
                                        Изменить
                                    </button>
                                </div>
                            </form>
                    <?php
                        } else {
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