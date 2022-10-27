<?php include('includes/headerAdmin.php') ?>

<div class="container mt-5">

    <?php include('message.php'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Создание пользователя
                        <a href="FormEditUsers.php" class="btn btn-danger float-end">Назад</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="CreateRemoveUser.php" method="POST">

                        <div class="mb-3">
                            <label>Никнейм</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Пароль</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="save_user" class="btn btn-primary">Создать</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php') ?>