<?php include('includes/headerlk.php') ?>
<div class="row">
  <div class="col-md-4 mb-3" id="work">
    <button type="button" class="btn btn-outline-secondary" onclick="encryptButtons()" id="element" name="delete_user">Зашифровать</button>
    <button type="button" class="btn btn-outline-secondary" onclick="decryptButtons()" id="element" name="delete_user">Расшифровать</button>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js">
</script>
<script>
  function encryptButtons() {
    clearElements()
    creteInput1()
    creteInput2()
    createButtons("AES, AES(), DES, DES(), Rabbit, rabbit(), SHA512, SHA512(), BASE64, base64(), Назад, back()")
  }

  function decryptButtons() {
    clearElements()
    creteInput1()
    creteInput2()
    createButtons("AES, AESdec(), DES, DESdec(), Rabbit, rabbitdec(), BASE64, base64dec(), Назад, back()")
  }

  function AES() {
    const input = document.getElementById("input1");
    const secret = document.getElementById("input2");
    let message = input.value;
    let secretPhrase = secret.value;
    putResult(CryptoJS.AES.encrypt(message, secretPhrase))
  }

  function AESdec() {
    const input = document.getElementById("input1");
    const secret = document.getElementById("input2");
    let message = input.value;
    let secretPhrase = secret.value;
    putResult(CryptoJS.AES.decrypt(message, secretPhrase))
  }

  function DES() {
    const input = document.getElementById("input1");
    const secret = document.getElementById("input2");
    let message = input.value;
    let secretPhrase = secret.value;
    putResult(CryptoJS.DES.encrypt(message, secretPhrase))
  }

  function DESdec() {
    const input = document.getElementById("input1");
    const secret = document.getElementById("input2");
    let message = input.value;
    let secretPhrase = secret.value;
    putResult(CryptoJS.DES.decrypt(message, secretPhrase))
  }

  function rabbit() {
    const input = document.getElementById("input1");
    const secret = document.getElementById("input2");
    let secretPhrase = secret.value;
    putResult(CryptoJS.Rabbit.encrypt(message, secretPhrase))
  }

  function rabbitdec() {
    const input = document.getElementById("input1");
    const secret = document.getElementById("input2");
    let message = input.value;
    let secretPhrase = secret.value;
    putResult(CryptoJS.Rabbit.decrypt(message, secretPhrase))
  }

  function SHA512() {
    const input = document.getElementById("input1");
    let message = input.value;
    var words = CryptoJS.enc.Utf8.parse(message);
    putResult(CryptoJS.SHA512(words))
  }

  function base64() {
    const input = document.getElementById("input1");
    const secret = document.getElementById("input2");
    let message = input.value;
    let secretPhrase = secret.value;
    var words = CryptoJS.enc.Utf8.parse(message);
    var base64 = CryptoJS.enc.Base64.stringify(words);
    putResult(base64)
  }

  function base64dec() {
    const input = document.getElementById("input1");
    const secret = document.getElementById("input2");
    let message = input.value;
    let secretPhrase = secret.value;
    var words = CryptoJS.enc.Base64.parse(message);
    var textString = CryptoJS.enc.Utf8.stringify(words);

    putResult(textString)
  }


  function back() {
    clearElements()
    createButtons("Зашифровать, encryptButtons(), Расшифровать, decryptButtons()")
  }

  function putResult(text) {
    document.querySelectorAll('[id=text]').forEach(element =>
      element.remove())
    document.getElementById("work").innerHTML += "<p id=\"text\">" + text + "</p>";
  }

  function creteInput1() {
    const div = document.getElementById("work");
    const input = document.createElement("input");
    input.placeholder = "Введите сообщение";
    input.type = "text";
    input.className = "form-control";
    input.id = "input1";
    div.appendChild(input)
  }

  function creteInput2() {
    const div = document.getElementById("work");
    const input = document.createElement("input");
    input.placeholder = "Введите кодовое слово (если нужно)";
    input.type = "text";
    input.className = "form-control";
    input.id = "input2";
    div.appendChild(input)
  }

  function clearElements() {
    document.querySelectorAll('[id=element]').forEach(element =>
      element.remove());
    document.querySelectorAll('[id=input1]').forEach(element =>
      element.remove())
    document.querySelectorAll('[id=input2]').forEach(element =>
      element.remove())
    document.querySelectorAll('[id=text]').forEach(element =>
      element.remove())
  }

  function createButtons(buttonsName) {
    let buttons = buttonsName.split(', ');
    numButtons = buttons.length;
    for (let i = 0; i < numButtons; i += 2) {
      createButton(buttons[i], buttons[i + 1]);
    }
  }

  function createButton(value, func) {
    const div = document.getElementById("work");
    const button = document.createElement("input");
    button.setAttribute("type", "button");
    button.setAttribute("id", "element");
    button.setAttribute("class", "btn btn-outline-secondary");
    button.setAttribute("style.display", "flex");
    button.setAttribute("value", value);
    button.setAttribute("onclick", func);
    button.set = function(value, func) {
      button.setAttribute("value", value);
      button.setAttribute("onclick", func);
      button.visible();
    };

    div.appendChild(button);
  }
</script>
<?php include('includes/footer.php') ?>