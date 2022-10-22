<?php include('includes/headerAdmin.php')?>
<?php include('message.php'); ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Информация о пользователях
                            <a href="users-create.php" class="btn btn-primary float-end">Добавить пользователя</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Никнейм</th>
                                    <th>Email</th>
                                    <th>Пароль</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = "SELECT * FROM users1";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $users)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $users['id']; ?></td>
                                                <td><?= $users['name']; ?></td>
                                                <td><?= $users['email']; ?></td>
                                                <td><?= $users['password']; ?></td>
                                                <td>
                                                    <a href="users-view.php?id=<?= $users['id']?>" class="btn btn-info btn-sm">Просмотреть</a>
                                                    <a href="users-edit.php?id=<?= $users['id']?>" class="btn btn-success btn-sm">Изменить</a>
                                                    <form action="CreateRemoveUser.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_user" value="<?=$users['id'];?>" class="btn btn-danger btn-sm">Удалить</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> Бд-шка пуста </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('includes/footer.php') ?>   