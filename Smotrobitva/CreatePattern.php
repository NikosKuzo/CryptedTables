<?php
//session_start();
?>
<?php include('includes/header.php') ?>
    
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Создать новый шаблон
                            <a href="Constructor.php" class="btn btn-danger float-end">НАЗАД</a>
                        </h4>
                    </div>
                </div>
                    <form action="PatternHandler.php" method="POST">
                            <div class="row">
                                <div class="mb-3">
                                    <label>HTML Текст</label>
                                    <input type="text" name="HTML_Text" class="form-control">
                                </div>
                            </div>  
                            <div class="row">
                                <div class="col-md-auto">
                                    <div class="mb-3">
                                    <label>Открывашка</label>
                                    <input type="text" name="Opening_delimiter" class="form-control">
                                    </div>
                                </div>      
                                <div class="col">
                                    <div class="mb-3">
                                    <label>Код открывашки</label>
                                    <input type="text" name="Opening_signature" class="form-control float-end">
                                    </div>
                                </div> 
                            </div> 
                            <div class="row">
                                <div class="col-md-auto">
                                    <div class="mb-3">
                                    <label>Закрывашка</label>
                                    <input type="text" name="Closing_delimiter" class="form-control">
                                    </div>
                                </div>      
                                <div class="col">
                                    <div class="mb-3">
                                    <label>Код закрывашки</label>
                                    <input type="text" name="Closing_signature" class="form-control float-end">
                                    </div>
                                </div> 
                            </div> 
                            <div class="mb-3">
                            <label>Разделитель</label>
                            <input type="text" name="Inside_separator" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="add_pattern" class="btn btn-primary">Добавить шаблон</button>
                            </div>
                        </form>
                </div>
            </div>
        </div>
    </div>

    <?php include('includes/footer.php') ?>