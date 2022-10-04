<?php include('includes/headerlk.php') ?>
<?php

$user = $_SESSION['logged_user']->name; ?>
<script>
  function deleteUser(){
    if (confirm("Вы подтверждаете удаление?")) {
      console.log("yes");
      window.location.href = 'delete.php'
    }
  }
</script>


<a href="FormEditUser.php" type="button" class="btn btn-outline-secondary">Изменить данные</a>
<button type="button" class="btn btn-outline-secondary" onclick="deleteUser()" name="delete_user">Удалить эту страницу</button>
<?php include('includes/footer.php') ?>