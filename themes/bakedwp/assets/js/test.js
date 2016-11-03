(function($) {
  /*$.post(
    ajaxurl,
    {
      'action': 'call_events_ajax',
      'param': 'pouvoir'
    },
    function(response){
      // on affiche la réponse ou l'on veut
      $('.list').append(response);
    }
  );*/

  var offset = 10;
  $('body').on('click','.event', function(){

    jQuery.post(
      ajaxurl,
      {
        'action': 'call_events_ajax',
        'offset': offset
      },
      function(response){
        offset= offset + 10;
        $('.list').append(response);
      }
    );
  });

  /*$.ajaxSetup({cache:false});
  $(".event").click(function(){
    var post_link = $(this).attr("href");

    $("#single-post-container").html("content loading");
    $("#single-post-container").load(post_link);
    return false;
  });*/

})(jQuery);
