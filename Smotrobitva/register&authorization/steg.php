<?php include('includes/headerlk.php') ?>
<script src="steg/steganography.js"></script>
<div class="container">
  <div class="row">
    <div class="col" align="center">
      <div class="file-upload">
        <div class="file-select">
          <div class="file-select-button" id="fileName">Выбрать файл</div>
          <div class="file-select-name" id="noFile">Файл не выбран...</div>
          <input class="form-control-file" type="file" name="pic" accept="image/*" onchange="readURL(this);" />
        </div>
      </div>
      <input id="text" type="text" class="form-control" />
      <button class="btn btn-outline-secondary align-center" onclick="hideText()">
        Спрятать текст в изображении
      </button>
    </div>

    <div class="row">
      <div class="col" align="center">
        <h5>Исходное</h5>
        <img id="image1" class="img-fluid rounded float-left " src="" alt="" />
      </div>
      <div class="col" align="center">
        <h5>Модифицированное</h5>
        <img id="image2" class="img-fluid rounded float-right" src="" alt="" />
      </div>
    </div>
    <div class="col" align="center">
      <div class="file-upload">
        <div class="file-select">
          <div class="file-select-button" id="fileName">Выбрать файл</div>
          <div class="file-select-name" id="noFile">Файл не выбран...</div>
          <input class="form-control-file" type="file" name="pic" accept="image/*" onchange="decode(this);" />
          <img class="" src="data:image/png;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" alt="">
        </div>
      </div>
      <h5>Расшифровка:</h5>
      <h2 id="decoded"></h2>
    </div>
  </div>
</div>
<script src="steg/index.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-1.10.2.min.js">
  $("#chooseFile").bind("change", function() {
    var filename = $("#chooseFile").val();
    if (/^\s*$/.test(filename)) {
      $(".file-upload").removeClass("active");
      $("#noFile").text("No file chosen...");
    } else {
      $(".file-upload").addClass("active");
      $("#noFile").text(filename.replace("C:\\fakepath\\", ""));
    }
  });
</script>

<?php include('includes/footer.php') ?>