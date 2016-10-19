<?php
// Theme support options
require_once(get_template_directory().'/assets/functions/theme-support.php');

// WP Head and other cleanup functions
require_once(get_template_directory().'/assets/functions/cleanup.php');

// Register scripts and stylesheets
require_once(get_template_directory().'/assets/functions/enqueue-scripts.php');

// Register custom menus and menu walkers
require_once(get_template_directory().'/assets/functions/menu.php');
require_once(get_template_directory().'/assets/functions/menu-walkers.php');

// Register sidebars/widget areas
require_once(get_template_directory().'/assets/functions/sidebar.php');

// Makes WordPress comments suck less
require_once(get_template_directory().'/assets/functions/comments.php');

// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory().'/assets/functions/page-navi.php');

// Adds support for multiple languages
require_once(get_template_directory().'/assets/translation/translation.php');

// Related post function - no need to rely on plugins
require_once(get_template_directory().'/assets/functions/related-posts.php');

// Customizer support
require_once(get_template_directory().'/assets/functions/customizer.php');

//SDK Facebook
//require_once(get_template_directory().'/assets/js/sdk.js');

function callLib(){
//Call Lib JS (jQuery et jQuery UI)
    wp_enqueue_script('jquery-ui', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/jquery-ui.min.js', array('jquery'), '1.8.6');
    wp_enqueue_script('jquery', get_template_directory().'/assets/js/jquery-3.1.1.min.js');
}
add_action( 'wp_enqueue_scripts', 'callLib' );
?>
