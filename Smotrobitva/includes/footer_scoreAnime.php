<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>



<script>
    $(document).on('submit', '#add_anime',function (e) {
    e.preventDefault();

    var formData = new FormData(this);
    formData.append("add_anime", true);

    $.ajax({
      type: "POST",
      url: "AddAnimeScore.php",
      data: formData,
      processData: false,
      contentType: false,
      success: function (response) {
        var res = jQuery.parseJSON(response);
        if(res.status == 500)
        {
          alertify.set('notifier','position', 'top-right');
          alertify.success(res.message);
        }
        else if(res.status == 200)
        {
          $('#add_anime')[0].reset();

          

          //$('#anime_scores').load(ScorePage.php + " #anime_scores",{ post: $battle_participant_id });
          var data = {
            anime_battle: <?=$battle_numbers?>
          }
          alertify.set('notifier','position', 'top-right');
          alertify.success(res.message);
          if(data.anime_battle == 0)
          {
            alert(<?=$battle_all?>);
          data2 = { anime_all: <?=$battle_all?>};
          $('#anime_scores_all').load(location.href + " #anime_scores_all", {anime_all: <?=$battle_all?>});
          }
          else
          {
          $('#anime_scores').load(location.href + " #anime_scores", {anime_battle: <?=$battle_numbers?>});
          }
          /*$.post(
            'ScorePage.php',
            { post: '$battle_participant_id' },
            function(data){
              $('#anime_scores').html(data);
            },
            'html'
          );*/
        }
      }
    });
  });
</script>



  </body>
</html>