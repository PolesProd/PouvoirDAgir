<?php
function joints_scripts_and_styles() {
  global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
    $theme_version = wp_get_theme()->Version;

    // Modernizr from bower_components
    wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/vendor/foundation/js//modernizr-min.js', array(), '2.8.3', true );

    // Adding Foundation scripts file in the footer
    wp_enqueue_script( 'foundation', get_template_directory_uri() . '/assets/vendor/foundation/js/foundation.min.js', array( 'jquery' ), '', true );

    // Adding scripts file in the footer
    wp_enqueue_script('isotope', get_template_directory_uri(). '/assets/js/isotope.js', array('jquery'), '', true);

    // Adding scripts file in the footer
    wp_enqueue_script( 'bakedwo-site-js', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), '', true );

    // Adding scripts file in the footer
    wp_enqueue_script( 'simplecalendar', get_template_directory_uri() . '/assets/js/simplecalendar.js', array( 'jquery' ), '', true );

    // Adding scripts file in the footer
    wp_enqueue_script('test', get_template_directory_uri() . '/assets/js/test.js', array('jquery'), '', true);

    // Register customized Foundation stylesheets, includes normalize
    wp_enqueue_style( 'foundationcss', get_template_directory_uri() . '/assets/css/foundation.css', array(), '', 'all' );

    // Register main stylesheet
    wp_enqueue_style( 'bakedwp-site-css', get_template_directory_uri() . '/style.css', array(), '', 'all' );

    // Register calendar style
    wp_enqueue_style( 'calendar', get_template_directory_uri() . '/assets/css/style-personal.css', array(), '', 'all' );

    // Register customized Foundation stylesheets, includes normalize
    wp_enqueue_style( 'foundation', get_template_directory_uri() . '/assets/css/foundation.css', array(), '', 'all' );

    // Register customized Foundation font 3
    wp_enqueue_style( 'foundationFont', get_template_directory_uri() . '/assets/typo/foundation-icons/foundation-icons.css', array(), '', 'all' );

    // Register perso stylesheet
    wp_enqueue_style( 'custom-css', get_template_directory_uri() . '/assets/css/pouvoirAgir.css', array(), '', 'all' );


    // Register owl carousel CSS
    wp_enqueue_style( 'owl-css', get_template_directory_uri() . '/assets/owl-carousel/owl.carousel.css', array(), '', 'all' );

    wp_enqueue_style( 'owl-theme-css', get_template_directory_uri() . '/assets/owl-carousel/owl.theme.css', array(), '', 'all' );

    // Adding scripts file in the footer
    wp_enqueue_script( 'owl-js', get_template_directory_uri() . '/assets/owl-carousel/owl.carousel.js', array( 'jquery' ), '', true );

    // wp_enqueue_script( 'bakedwo-site-js', get_template_directory_uri() . '/assets/js/scripts.js', array( 'jquery' ), '', true );


    // Comment reply script for threaded comments
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
    }
}
add_action('wp_enqueue_scripts', 'joints_scripts_and_styles', 999);
?>
