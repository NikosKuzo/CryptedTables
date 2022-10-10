<?php include('includes/headerAdmin.php') ?>
    
    <div class="container mt-5">


        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Просмотр пользователя
                            <a href="FormEditUsers.php" class="btn btn-danger float-end">Назад</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $user_id = mysqli_real_escape_string($con, $_GET['id']) ;
                            $query = "SELECT * FROM users1 WHERE id='$user_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $users = mysqli_fetch_array($query_run);
                                ?>
                                        <div class="mb-3">
                                        <label>Никнейм</label>
                                        <p class="form-control">
                                        <?= $users['name'];?>
                                        </p>
                                        </div>
                                        <div class="mb-3">
                                        <label>Email</label>
                                        <p class="form-control">
                                        <?= $users['email'];?>
                                        </p>
                                        </div>
                                        <div class="mb-3">
                                        <label>Пароль</label>
                                        <p class="form-control">
                                        <?= $users['password'];?>
                                        </p>
                                        </div>
                        <?php
                            }
                            else
                            {
                                echo "<h4> No Such ID Found </h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('includes/footer.php') ?>