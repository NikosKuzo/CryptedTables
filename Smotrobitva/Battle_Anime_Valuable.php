<?php
require 'dbcon.php';
?>

<?php include('includes/header.php') ?>

<div class="container-xxl mt-5">
        <div class="row">
            <div class="col-md-12">
                        <h4 class="text-dark fs-1"><strong>Когда-нибудь они сразятся</strong>
                        <a href="index.php" class="btn float-end fs-3"><strong>СМОТРОБИТВА</strong></a>
                        </h4>
                    </div>
                    <div class="col-md-12"><a href="EditPage.php" class="btn text-secondary float-end">Изменить данные</a></div>
                    <div class="card-body">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Название</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $query = "SELECT * FROM battle_anime_valuable";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $anime)
                                        {
                                            //echo $anime['Name'];
                                            ?>
                                                <tr class="table-warning">
                                                <td><?= $anime['Name']; ?></td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Records Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>
            </div>
        </div>
</div>

<?php include('includes/footer.php') ?>