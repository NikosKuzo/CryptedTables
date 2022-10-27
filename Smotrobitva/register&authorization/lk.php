<?php include('includes/headerlk.php') ?>
<?php

$user = $_SESSION['logged_user']->name; ?>
<a href="AdminTools/FormEditUsers.php" type="button" id="sudoEdit" class="btn btn-outline-secondary">Для модеров</a>
<a href="FormEditUser.php" type="button" class="btn btn-outline-secondary">Изменить данные</a>
<button type="button" class="btn btn-outline-secondary" onclick="deleteUser()" name="delete_user">Удалить эту страницу</button>
<button type="button" id = "funcButton" class="btn btn-outline-secondary" onclick="createButtons('Часы, time(), Дата, date(), Стеганография, steg()')" name="delete_user">Простые функции</button>

<script>
  function deleteUser(){
    if (confirm("Вы подтверждаете удаление?")) {
      console.log("yes");
      window.location.href = 'delete.php'
    }
  }
  function steg(){
    window.location.href = 'steg.php'
  }
  function time(){
    oldElements = document.getElementsByClassName("date/time");
    for (const element of oldElements) {
      element.remove();
    }
    document.querySelector("body").innerHTML += "<span class=\"date/time\">" + new Date().toLocaleTimeString()+ " </span>"
  }
  function date(){
    oldElements = document.getElementsByClassName("date/time");
    for (const element of oldElements) {
      element.remove();
    }
    document.querySelector("body").innerHTML += "<span class=\"date/time\">" + new Date().toLocaleDateString()+ " </span>"
  }

  function createButtons(buttonsName){
    const oldButton = document.getElementById("funcButton");
    oldButton.remove();
    let buttons = buttonsName.split(', ');
    numButtons = buttons.length;
    for (let i = 0; i < numButtons; i+=2) {
      createButton(buttons[i], buttons[i+1]);   
    }
  }

  function createButton(value ,func) {
    const body = document.querySelector("body");
    const button = document.createElement("input");
    button.setAttribute("type", "button");
    button.setAttribute("id", "button");
    button.setAttribute("class", "btn btn-outline-secondary");
    button.setAttribute("style.display", "flex");
    button.setAttribute("value", value);
    button.setAttribute("onclick", func);
    button.set = function(value, func) {
      button.setAttribute("value", value);
      button.setAttribute("onclick", func);
      button.visible();
    };

    body.appendChild(button);
  }
  if (<?php echo $_SESSION['logged_user']-> su ?> ==0){
    var btn = document.getElementById('sudoEdit')
    btn.remove()
  }
</script>

<?php include('includes/footer.php') ?>