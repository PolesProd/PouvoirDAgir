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
/****************************************************
          Création du Custom Post(Ressource).
****************************************************/
add_action('init', 'ressources');
function ressources() {
  $labels = array(
    'name'					      =>	__('Ressources'),
    'menu_name'           => 	__('Ressources'),
    'singular_name'		    =>	__('Ressources'),
    'add_new_item'		    =>	__('Ajouter'),
    'all_items'				    =>	__('Toutes les Ressources'),
    'edit_item'				    =>	__('Modifier la Ressources'),
    'new_item'				    =>	__('Nouvelle Ressource'),
    'view_item'				    =>	__('Voir Ressources'),
    'not_found'				    =>	__('Aucune Ressource trouvé'),
    'not_found_in_trash'	=>	__('Aucune Ressource trouvée dans la corbeille')
  );

  register_post_type('ressources', array(
    'slug'            => 'ressources',
    'public'          => true,
    'labels'          => $labels,
    'menu_position'   => 7,
    'capability_type' => 'post',// Utilise les mêmes permissions que pour les articles.
    'taxonomies'      => array('category', 'post_tag'),
    'supports'        => array('title','editor','author','wpsclocation','comments','thumbnail')
  ));
}

/*******************************************************
          Création du Custom Post(Evenement).
*******************************************************/
add_action('init', 'events');
function events()
{
	$labels = array(
		'name'								=> _x( 'Evénements', 'post type general name' ),
		'singular_name'				=> _x( 'Event', 'post type singular name' ),
		'add_new'							=> _x( 'Ajouter', 'events' ),
		'add_new_item'				=> __( 'Ajouter Événements' ),
		'edit_item'						=> __( 'Editer Événement' ),
		'new_item'						=> __( 'Nouveau' ),
		'all_items'						=> __( 'Tous les Événement' ),
		'view_item'						=> __( 'Voir Événement' ),
		'search_items'				=> __( 'Chercher Événements' ),
		'not_found'						=>  __( 'Aucun Événements Trouvé' ),
		'not_found_in_trash'	=> __( 'Aucun Événements Trouvé Dans La Corbeille' ),
		'parent_item_colon'		=> '',
		'menu_name'						=> 'Événements'
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => false,
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 6,
		'taxonomies'         => array('wpsclocation','category'),
		'supports'           => array('title','editor','thumbnail')
	);
	register_post_type('events',$args);
}

add_action('init', 'events_taxonomies', 0);
function events_taxonomies(){
	$labels = array(
		'name'					=> _x( 'Lieu', 'taxonomy general name' ),
		'singular_name'	=> _x( 'Location', 'taxonomy singular name' ),
		'search_items'	=> __( 'Chercher lieu' ),
		'all_items'			=> __( 'Tous les lieux' ),
		'edit_item'			=> __( 'Editer Lieu' ),
		'update_item'		=> __( 'Update Location' ),
		'add_new_item'	=> __( 'Ajouter' ),
		'new_item_name'	=> __( 'New Location Name' ),
		'menu_name'			=> __( 'Lieux' )
	);

	$args = array(
		'hierarchical'			=> true,
		'labels'						=> $labels,
		'show_ui'						=> true,
		'show_admin_column'	=> true,
		'query_var'					=> true,
		'rewrite'						=> false,
  );
	register_taxonomy('wpsclocation', array('events'), $args);
}

add_filter( 'meta_boxes', 'events_metaboxes' );
function events_metaboxes( array $meta_boxes ) {
	// Start with an underscore to hide fields from custom fields list
	$prefix = 'wpsc_';

	$meta_boxes[] = array(
		'id'         => 'events_event_meta',
		'title'      => 'Détails de l\'évènement',
		'pages'      => array( 'events', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name' => 'Début le:',
				'desc' => '',
				'id'   => $prefix . 'start_date',
				'type' => 'text_date',
			),
			array(
				'name' => 'Fin le:',
				'desc' => 'Laissez en blanc pour des événements uniques',
				'id'   => $prefix . 'end_date',
				'type' => 'text_date',
			),
			array(
	      'name' => 'Commence à:',
	      'desc' => '',
	      'id'   => $prefix . 'start_time',
	      'type' => 'text_time',
	    ),
			array(
	      'name' => 'Fini à:',
	      'desc' => '',
	      'id'   => $prefix . 'end_time',
	      'type' => 'text_time',
	    ),
			array(
				'name' => 'Inscription URL',
				'desc' => 'URL complète, y compris http://',
				'id'   => $prefix . 'url',
				'type' => 'text',
			),
			array(
				'name' => 'Texte lien',
				'desc' => 'Par exemple: \'Cliquez ici\' ou \'Pour plus d\'informations\'',
				'id'   => $prefix . 'reg_text',
				'type' => 'text',
			),
		),
	);
	// Add other metaboxes as needed
	return $meta_boxes;
}
add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );
function cmb_initialize_cmb_meta_boxes() {
	if ( ! class_exists( 'cmb_Meta_Box' ) )
		//include '../wp-content/themes/bakedwp/init.php';
		include get_template_directory().'/init.php';
}
/*************************************************
    Création du Custom Post(Réseaux Impliqués)
*************************************************/
add_action('init', 'partners');
function partners(){
	$labels = array(
		'name'								=> _x( 'Réseaux Impliqués', 'post type general name' ),
		'singular_name'				=> _x( 'Réseau Impliqué', 'post type singular name' ),
		'add_new'							=> _x( 'Ajouter', 'Réseaux Impliqués' ),
		'add_new_item'				=> __( 'Ajouter des Réseaux Impliqués' ),
		'edit_item'						=> __( 'Editer Réseau Impliqué' ),
		'new_item'						=> __( 'Nouveau' ),
		'all_items'						=> __( 'Tous les Réseaux Impliqués' ),
		'view_item'						=> __( 'Voir Réseau Impliqué' ),
		'search_items'				=> __( 'Chercher Réseaux Impliqués' ),
		'not_found'						=>  __( 'Aucun Réseaux Impliqués Trouvé' ),
		'not_found_in_trash'	=> __( 'Aucun Réseaux Impliqués Trouvé Dans La Corbeille' ),
		'parent_item_colon'		=> '',
		'menu_name'						=> 'Réseaux Impliqués'
	);
	$args = array(
		'labels' 							=> $labels,
		'public' 							=> true,
		'publicly_queryable' 	=> true,
		'show_ui' 						=> true,
		'show_in_menu' 				=> true,
		'query_var' 					=> true,
		'rewrite' 						=> false,
		'capability_type' 		=> 'post',
		'has_archive' 				=> true,
		'hierarchical' 				=> false,
		'menu_position' 			=> 6,
		'supports' 						=> array('title','editor','thumbnail')
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
                Auto-Complétion.
*************************************************/
add_action('wp_footer', 'auto_search');
function auto_search(){
  global $wpdb;
  $args = array('posts_per_page' => 100, 'order'=> 'ASC', 'orderby' => 'date');
  $the_query = new WP_Query( $args );
  echo "<script type='text/javascript'>var availableTags = [";
    $url_pattern = '/((http|https)\:\/\/)?[a-zA-Z0-9\.\/\?\:@\-_=#]+\.([a-zA-Z0-9\&\.\/\?\:@\-_=#])*/';
    $url_replace = ' ';
    if ( $the_query->have_posts() ) :
      $completion = '';
      while ( $the_query->have_posts() ) : $the_query->the_post();
        $post_id =  get_the_ID();
        $sqlTitleContent = 'SELECT post_content, post_title FROM wp_posts WHERE  ID ="'.$post_id.'"';
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
    else:endif;
    echo "];console.table(availableTags);";
    echo "jQuery('#s').autocomplete({source:availableTags});";
    echo "jQuery('#s01').autocomplete({source:availableTags});";
    echo "</script>";
}

/*************************************************
                Gallery
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
     echo '<ul class="grid-thumb">';
      foreach ($attachments as $attachment) {
          //echo apply_filters('the_title', $attachment->post_title);
                  echo '<li><img src="'.wp_get_attachment_url($attachment->ID, 'testsize', false, false).'" /></li>';
      }
      echo '</ul>';
  }
}
add_shortcode('my_gallery','gallery_func');

/*************************************************
                Street_Map
*************************************************/

function street_map(){

  echo '<iframe width="100%" height="300px" frameBorder="0" src="http://umap.openstreetmap.fr/en/map/carte-du-pouvoir-dagir_63384?scaleControl=false&miniMap=false&scrollWheelZoom=false&zoomControl=true&allowEdit=false&moreControl=true&searchControl=null&tilelayersControl=null&embedControl=null&datalayersControl=true&onLoadPanel=undefined&captionBar=false"></iframe><p><a href="http://umap.openstreetmap.fr/en/map/carte-du-pouvoir-dagir_63384">Voir en plein écran</a></p>';
}
add_shortcode('map','street_map');




/*************************************************
                Query page auteur.
*************************************************/
function my_post_queries( $query ) {
    // vérifier qu'on n'est pas sur une page admin
    if ( !is_admin() && $query->is_main_query() ) {
        if ( is_author() ) {
            // montrer tous les articles
            $query->set( 'posts_per_page', -1 );
            $query->set( 'post_type', array( 'post' ) );
        }
    }
}
add_action( 'pre_get_posts', 'my_post_queries' );
