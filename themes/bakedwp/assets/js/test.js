(function($) {
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
})(jQuery);
