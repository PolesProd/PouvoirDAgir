<script>
    /*var url = window.location.href;

	if(url.indexOf("?") != -1) {
	    var resUrl = url.split("?");

	    if(typeof window.history.pushState == 'function') {
	        window.history.pushState({}, "Hide", resUrl[0]);
	    }
	}*/
	window.history.pushState("?", "hide", "http://wordpress.lepoles.com/");
</script>
<?php
$time = current_time( 'timestamp', $gmt = 0 );
$mois = array(
	'Janvier',
	'Février',
	'Mars',
	'Avril',
	'Mai',
	'Juin',
	'Juillet',
	'Août',
	'Septembre',
	'Octobre',
	'Novembre',
	'Décembre');
// Setup the date and month navigation
if( isset( $_GET['mnth'] ) ) {
	$month = absint( $_GET['mnth'] );

} else {
	$month = date( 'm', $time );
}

if( isset( $_GET['yr'] ) ) {
	$year = absint( $_GET['yr'] );
} else {
	$year = date( 'Y', $time );
}
$next_month_link		= '<a href="?mnth='.($month != 12 ? $month + 1 : 1).'&yr='.($month != 12 ? $year : $year + 1).'" class="control next">></a>';
$previous_month_link	= '<a href="?mnth='.($month != 1 ? $month - 1 : 12).'&yr='.($month != 1 ? $year : $year - 1).'" class="control last"><</a>';

// Load the date and month navigation
echo '<form id="wpsc-grid-nav" method="get">' . $previous_month_link . ' &nbsp;&nbsp;&nbsp;<strong>' .  $mois[$month-1] . ' ' . $year . '</strong>&nbsp;&nbsp;&nbsp; ' . $next_month_link . '</form>';

// Load calendar grid
echo wpsimplecalendar_setup_grid( $month, $year, $category, $location );