<?php
/*
Plugin Name: Fonctions WordPress
Description: L'ensemble des fonctions globales du site.
Version: 0.1
License: No fucking licence
Author: LePoleS
Author URI: https://www.lepoles.org/
*/
/********************************************
    Fonction initialise les Query Posts.
********************************************/
add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
  if( is_category() ) {
    $post_type = get_query_var('post_type');
    if($post_type)
      $post_type = $post_type;
    else
      //
      $post_type = array('nav_menu_item');
    $query->set('post_type',$post_type);
    return $query;
  }
}
/*************************************************
        Création des Réseaux Impliqués
*************************************************/
add_action('init', 'partners');
function partners()
{
	$labels = array(
		'name'					=> _x( 'Réseaux Impliqués', 'post type general name' ),
		'singular_name'			=> _x( 'Réseau Impliqué', 'post type singular name' ),
		'add_new'				=> _x( 'Ajouter', 'Réseaux Impliqués' ),
		'add_new_item'			=> __( 'Ajouter des Réseaux Impliqués' ),
		'edit_item'				=> __( 'Editer Réseau Impliqué' ),
		'new_item'				=> __( 'Nouveau' ),
		'all_items'				=> __( 'Tous les Réseaux Impliqués' ),
		'view_item'				=> __( 'Voir Réseau Impliqué' ),
		'search_items'			=> __( 'Chercher Réseaux Impliqués' ),
		'not_found'				=>  __( 'Aucun Réseaux Impliqués Trouvé' ),
		'not_found_in_trash'	=> __( 'Aucun Réseaux Impliqués Trouvé Dans La Corbeille' ),
		'parent_item_colon'		=> '',
		'menu_name'				=> 'Réseaux Impliqués'
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'query_var' => true,
		'rewrite' => false,
		'capability_type' => 'post',
		'has_archive' => true,
		'hierarchical' => false,
		'menu_position' => 6,
		'supports' => array('title','editor','thumbnail')
	);
	register_post_type('partenaires',$args);
}

add_filter( 'meta_boxes', 'partners_metaboxes' );
function partners_metaboxes( array $meta_boxes ) {
	// Start with an underscore to hide fields from custom fields list
	$prefix = 'part_';
	$meta_boxes[] = array(
		'id'         => 'partners_meta',
		'title'      => 'Lien du Site',
		'pages'      => array( 'partenaires', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => 'Lien du Site',
				'desc' => '',
				'id'   => $prefix . 'lien_du_site',
				'type' => 'text',
			),
		),
	);
	// Add other metaboxes as needed
	return $meta_boxes;
}

/*************************************************
                Auto Complete
*************************************************/

function auto_search(){
    global $wpdb;
    // the query
    $args = array('posts_per_page' => 100, 'order'=> 'ASC', 'orderby' => 'date');
    $the_query = new WP_Query( $args );

    echo "<script type='text/javascript'>var availableTags = [";
    $url_pattern = '/((http|https)\:\/\/)?[a-zA-Z0-9\.\/\?\:@\-_=#]+\.([a-zA-Z0-9\&\.\/\?\:@\-_=#])*/';
    $url_replace = ' ';
    if ( $the_query->have_posts() ) : ?>
        <?php $completion = '';
        while ( $the_query->have_posts() ) : $the_query->the_post();
            $post_id =  get_the_ID();;
            $sqlTitleContent = 'SELECT post_content, post_title
                                FROM  wp_posts
                                WHERE  ID ="'.$post_id.'"';

            $result = $wpdb->get_results($sqlTitleContent);

            $completion .= strip_tags(strtolower($result[0]->post_title));
            $completion .= strip_tags(strtolower($result[0]->post_content));
            $completion = preg_replace('@<a[^>]*?>.*?</a>@si', '', $completion);
        endwhile;
            $completionFormat = str_replace( array( '?', ',', '.', ':', '!', '"','/>','&nbsp;'), ' ', $completion );
            $completion = str_replace( array('É'), 'é', $completionFormat );
            $completionFormat = str_replace(array("\r\n", "\r", "\n"), "<br />", $completion);
            $tablComplet = explode(" ", $completionFormat);
            $cleanTab = array_unique($tablComplet);


        $tablComplet = [];


        for( $i=0; $i<count($cleanTab); $i++ ){

            if(isset($cleanTab[$i]) && !preg_match("/[0-9]{1,2}$/", $cleanTab[$i]) && strlen($cleanTab[$i]) > 3 ){
                echo '"'.rtrim(strtolower($cleanTab[$i])).'",';

            }
        }
        wp_reset_postdata();
    else : endif;
            echo "];console.table(availableTags);";
            echo "jQuery('#s').autocomplete({source:availableTags});";
            //echo "jQuery('#s01').autocomplete({source:availableTags});";
            echo "</script>";

}
add_action( 'wp_footer', 'auto_search' );

/*************************************************
                Aside Widget
*************************************************/

if( function_exists('register_sidebar')){

  $args = array(
  	'name'          => __( 'Aside', 'theme_text_domain' ),
  	'id'            => 'aside',
  	'description'   => '',
          'class'         => '',
  	'before_widget' => '<aside">',
  	'after_widget'  => '</aside>',
  	'before_title'  => '<h2 class="widgettitle">',
  	'after_title'   => '</h2>' );

    register_sidebar($args);
}
// if ( !function_exists(‘dynamic_sidebar’) || !dynamic_sidebar(« sidebar ») ) :
//endif;

/*************************************************
                Gallerie
*************************************************/

function gallery_func(){
    $argsThumb = array(
      'order'          => 'ASC',
      'post_type'      => 'attachment',
      'post_mime_type' => 'image',
      'post_status'    => null
  );
  $attachments = get_posts($argsThumb);
  if ($attachments) {
    ?>
    <ul class="grid-thumb">
    <?php
      foreach ($attachments as $attachment) {
          //echo apply_filters('the_title', $attachment->post_title);
                  echo '<li><img src="'.wp_get_attachment_url($attachment->ID, 'testsize', false, false).'" /></li>';
      }
      ?>
    </ul>
      <?php
  }
}
add_shortcode('gallery','gallery_func');
