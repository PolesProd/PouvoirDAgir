jQuery(document).foundation();

jQuery(document).ready(function() {

  jQuery("#owl-demo").owlCarousel({
    navigation : false, // Show next and prev buttons
    slideSpeed : 300,
    paginationSpeed : 400,
    singleItem:true,
    pagination:false,
    autoPlay:true,
    // "singleItem:true" is a shortcut for:
    // items : 1,
    // itemsDesktop : false,
    // itemsDesktopSmall : false,
    // itemsTablet: false,
    // itemsMobile : false
  });
});

(function($){
    $( function(){
        /*var $container = $('.isotope').isotope({
            itemSelector: '.element-item',
            layoutMode: 'fitRows'
        });

        $('#filters').on('click', 'button', function(){
            var filterValue = $(this).attr('data-filter');
            $container.isotope({ filter: filterValue });
        });*/

		// init Isotope
		var $grid = $('.isotope').isotope({
		  // options
		});
		// filter items on button click
		$('.button-group').on( 'click', 'button', function() {
		  var filterValue = $(this).attr('data-filter');
		  $grid.isotope({ filter: filterValue });
		});
    });
})(jQuery);
