(function($) {
    jQuery.post(
        ajaxurl,
        {
            'action': 'call_events_ajax',
            'param': 'pouvoir'
        },
        function(response){
        	// on affiche la réponse ou l'on veut
    		$('.day-event').append(response);
    	}
    );
})(jQuery);
