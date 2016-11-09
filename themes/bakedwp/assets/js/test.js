(function($) {
<<<<<<< HEAD
=======
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

>>>>>>> Test fonction ajax
  var offset = 10;
  $('body').on('click','.event', function(){

    jQuery.post(
      ajaxurl,
      {
        'action': 'events_ajax',
        'offset': offset
      },
      function(response){
        offset= offset + 10;
        $('.list').append(response);
      }
    );
  });
})(jQuery);
