<?php
/*
Plugin Name: Fonctions WordPress
Description: L'ensemble des fonctions globales du site.
Version: 0.1
License: No fucking licence
Author: Kevin CHERUEL
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
// add_action('init', 'ressources');
// function ressources() {
//   $labels = array(
//     'name'					      =>	__('Ressources'),
//     'menu_name'           => 	__('Ressources'),
//     'singular_name'		    =>	__('Ressources'),
//     'add_new_item'		    =>	__('Ajouter'),
//     'all_items'				    =>	__('Toutes les Ressources'),
//     'edit_item'				    =>	__('Modifier la Ressources'),
//     'new_item'				    =>	__('Nouvelle Ressource'),
//     'view_item'				    =>	__('Voir Ressources'),
//     'not_found'				    =>	__('Aucune Ressource trouvé'),
//     'not_found_in_trash'	=>	__('Aucune Ressource trouvée dans la corbeille')
//   );
//
//   register_post_type('ressources', array(
//     'slug'            => 'ressources',
//     'public'          => true,
//     'labels'          => $labels,
//     'menu_position'   => 7,
//     'capability_type' => 'post',// Utilise les mêmes permissions que pour les articles.
//     'taxonomies'      => array('post_tag'),
//     'supports'        => array('title','editor','author','wpsclocation','comments','thumbnail')
//   ));
// }

// add_action('init', 'ressources_taxonomies', 0);

// function ressources_taxonomies(){
// 	$labels = array(
// 		'name'					=> _x('Catégorie', 'taxonomy general name'),
// 		'singular_name'	=> _x('Catégorie', 'taxonomy singular name'),
// 		'search_items'	=> __('Chercher une catégorie'),
// 		'all_items'			=> __('Toutes les catégories'),
// 		'edit_item'			=> __('Editer une Catégorie'),
// 		'update_item'		=> __('Mise a jour de la Catégorie'),
// 		'add_new_item'	=> __('Ajouter'),
// 		'new_item_name'	=> __('Nouvelle Catégorie'),
// 		'menu_name'			=> __('Catégorie')
// 	);
//
// 	$args = array(
// 		'hierarchical'			=> true,
// 		'labels'						=> $labels,
// 		'show_ui'						=> true,
// 		'show_admin_column'	=> true,
// 		'query_var'					=> true,
// 		'rewrite'						=> false,
//   );
// 	register_taxonomy('ressources', 'ressources', $args);
// }
//
// add_filter('meta_boxes', 'ressources_metaboxes');
// function ressources_metaboxes(array $meta_boxes) {
// 	// Start with an underscore to hide fields from custom fields list
// 	$prefix = 'ressources_';
// 	$meta_boxes[] = array(
// 		'id'         => 'ressources_meta',
// 		'title'      => 'Méta des ressources',
// 		'pages'      => array('ressources'), // Post type
// 		'context'    => 'normal',
// 		'priority'   => 'high',
// 		'show_names' => true, // Show field names on the left
// 		'fields'     => array(
// 			array(
// 				'name' => 'Date : ',
// 				'desc' => '',
// 				'id'   => $prefix . 'date',
// 				'type' => 'text',
// 			),
// 			array(
// 				'name' => ' Lien vers la Ressource Externe :',
// 				'desc' => '',
// 				'id'   => $prefix . 'externes',
// 				'type' => 'text',
// 			),
// 			array(
// 	      'name' => 'En-tête de l\'article',
// 	      'desc' => '',
// 	      'id'   => $prefix . 'chapeau',
// 	      'type' => 'textarea',
// 	    ),
// 		),
// 	);
// 	// Add other metaboxes as needed
// 	return $meta_boxes;
// }
/*******************************************************
          Création du Custom Post(Evenement).
*******************************************************/
add_filter('manage_wpscevents_posts_columns', 'events_add_column'/*, 10*/);
function events_add_column($defaults) {
	unset( $defaults['date'] );
	$new = array();
	// Changer l'ordre pour que ce soit pas la dernière colonne
	foreach($defaults as $key => $value) {
		if ($key=='taxonomy-wpsccategory') {
			$new['wpsc_start_date'] = 'Event Start Date';
		}
		$new[$key] = $value;
	}
	return $new;
}

add_action('init', 'events');
function events(){
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
		'taxonomies'         => array('wpsclocation','wpsccategory'),
		'supports'           => array('title','editor','thumbnail','author')
	);

	register_post_type('events',$args);
}

add_action('init', 'events_taxonomies'/*, 0*/);
function events_taxonomies(){
	// Définition de la taxonomie pour les catégories.
	$labels = array(
		'name'							=> _x('Catégories', 'taxonomy general name'),
		'singular_name'			=> _x('Catégorie', 'taxonomy singular name'),
		'search_items'			=> __('Recherche Catégories'),
		'all_items'					=> __('Toutes les Catégories'),
		'parent_item'				=> __('Catégories Parentes'),
		'parent_item_colon'	=> __('Categorie Parente:'),
		'edit_item'					=> __('Editer Catégorie'),
		'update_item'				=> __('Mettre à jour Catégorie'),
		'add_new_item'			=> __('Ajouter Catégorie'),
		'new_item_name'			=> __('Nouveau Nom Catégorie'),
		'menu_name'					=> __('Catégories')
	);

	$args = array(
		'hierarchical'			=> true,
		'labels'						=> $labels,
		'show_ui'						=> true,
		'show_admin_column'	=> true,
		'query_var'					=> true,
		'rewrite'						=> false
  );
	register_taxonomy( 'wpsccategory', array( 'events' ), $args );

	// Définition de la taxonomie pour les lieux.
	$labels = array(
		'name'					=> _x('Lieu', 'taxonomy general name'),
		'singular_name'	=> _x('Location', 'taxonomy singular name'),
		'search_items'	=> __('Chercher lieu'),
		'all_items'			=> __('Tous les lieux'),
		'edit_item'			=> __('Editer Lieu'),
		'update_item'		=> __('Update Location'),
		'add_new_item'	=> __('Ajouter'),
		'new_item_name'	=> __('New Location Name'),
		'menu_name'			=> __('Lieux')
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

add_action('manage_wpscevents_posts_custom_column', 'events_columns_content'/*, 10, 2*/);
function events_columns_content($column_name, $post_ID) {
	if ($column_name == 'wpsc_start_date') {
		echo get_post_meta( $post_ID, $column_name, true );
	}
}

add_filter( 'meta_boxes', 'events_metaboxes' );
function events_metaboxes( array $meta_boxes ) {
	// Commencez avec un trait de soulignement pour cacher les champs de la liste des champs personnalisés
	$prefix = 'wpsc_';

	$meta_boxes[] = array(
		'id'         => 'events_event_meta',
		'title'      => 'Détails de l\'évènement',
		'pages'      => array( 'events', ), // Type de post
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Afficher les noms des champs sur la gauche
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
	// Ajouter d'autres Metaboxes au besoin
	return $meta_boxes;
}

add_action( 'init', 'initialize_events_meta_boxes', 9999 );
function initialize_events_meta_boxes() {
	if (! class_exists( 'cmb_Meta_Box' ))
		include get_template_directory().'/init.php';
}
/*************************************************
        Création des Réseaux Impliqués
*************************************************/
add_action('init', 'partners');
function partners()
{
	$labels = array(
		'name'								=> _x('Réseaux Impliqués', 'post type general name' ),
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
		'menu_name'				=> 'Réseaux Impliqués'
	);

	$args = array(
		'labels' 							=> $labels,
		'public' 							=> true,
		'publicly_queryable' 	=> true,
		'show_ui' 						=> true,
		'show_in_menu'				=> true,
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
add_filter('meta_boxes', 'partners_metaboxes');

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
          $post_id =  get_the_ID();
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
    endif;
    echo "];";
    echo "jQuery('#s').autocomplete({source:availableTags});";
    echo "jQuery('#s01').autocomplete({source:availableTags});";
    echo "</script>";

}
add_action( 'wp_footer', 'auto_search' );


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
/*************************************************
                Galerie
*************************************************/
// function gallery_func(){
//     $argsThumb = array(
//       'order'          => 'ASC',
//       'post_type'      => 'attachment',
//       'post_mime_type' => 'image',
//       'post_status'    => null
//   );
//   $attachments = get_posts($argsThumb);
//   if ($attachments) {
//       foreach ($attachments as $attachment) {
//         echo '<img src="'.wp_get_attachment_url($attachment->ID, 'testsize', false, false).'" />';
//       }
//   }
// }
// add_shortcode('gallery','gallery_func');

/*************************************************
    Trier les articles selon une taxonomie
*************************************************/
//allows queries to be sorted by taxonomy term name
add_filter('posts_clauses', 'posts_clauses_with_tax', 10, 2);
function posts_clauses_with_tax( $clauses, $wp_query ) {
	global $wpdb;
	//array of sortable taxonomies
	$taxonomies = array('wpsclocation');
	if (isset($wp_query->query['orderby']) && in_array($wp_query->query['orderby'], $taxonomies)) {
		$clauses['join'] .= "
			LEFT OUTER JOIN {$wpdb->term_relationships} AS rel2 ON {$wpdb->posts}.ID = rel2.object_id
			LEFT OUTER JOIN {$wpdb->term_taxonomy} AS tax2 ON rel2.term_taxonomy_id = tax2.term_taxonomy_id
			LEFT OUTER JOIN {$wpdb->terms} USING (term_id)
		";
		$clauses['where'] .= " AND (taxonomy = '{$wp_query->query['orderby']}' OR taxonomy IS NULL)";
		$clauses['groupby'] = "rel2.object_id";
		$clauses['orderby'] = "GROUP_CONCAT({$wpdb->terms}.name ORDER BY name ASC) ";
		$clauses['orderby'] .= ( 'ASC' == strtoupper( $wp_query->get('order') ) ) ? 'ASC' : 'DESC';
	}
	return $clauses;
}
/*************************************************
                Query page auteurs.
*************************************************/
function my_post_queries($query){
    // vérifier qu'on n'est pas sur une page admin
    if (!is_admin() && $query->is_main_query()){
        if (is_author()){
            // montrer tous les articles
            $query->set('posts_per_page', -1);
            $query->set('post_type', array('post'));
        }
    }
}

add_action('pre_get_posts', 'my_post_queries');

/*************************************************
            Requête Ajax événements.
*************************************************/
add_action('wp_enqueue_scripts', 'add_js_scripts');
function add_js_scripts() {
	wp_enqueue_script( 'script', get_template_directory_uri().'/assets/js/test.js', array('jquery'), '1.0', true );

	// Passer Ajax Url à script.js
	wp_localize_script('script', 'ajaxurl', admin_url( 'admin-ajax.php' ) );
}

add_action( 'wp_ajax_call_events_ajax', 'call_events_ajax' );
add_action( 'wp_ajax_nopriv_call_events_ajax', 'call_events_ajax' );
function call_events_ajax() {
	/*$args = array(
		    'post_type' => 'events',
		    'posts_per_page' => -1
		);
		$ajax_query = new WP_Query($args);
		//var_dump($ajax_query);
		if ($ajax_query->have_posts()) : while ($ajax_query->have_posts()) : $ajax_query->the_post();*/
				get_template_part('article');
			/*endwhile;
		endif;
		die();*/

		/*global $post;
	  $offset = $_POST['offset'];
	  $args = array(
		   'post_type' =>'events',
		   'offset' => $offset
		);

		$ajax_query = new WP_Query($args);
		if ( $ajax_query->have_posts() ) : while ( $ajax_query->have_posts() ) : $ajax_query->the_post();
	    get_template_part( 'article' );
	    // OU
	    include(locate_template('article.php'));
	    // si vous avez besoin d'accéder aux variables dans le template
		 endwhile;
		endif;

		die();*/
}

add_action( 'pre_get_posts', 'my_post_queries' );


/*************************************************
                Ressources
*************************************************/
add_action('init', 'ressources');
function ressources(){
	$labels = array(
		'name'								=> _x( 'Ressource', 'post type general name' ),
		'singular_name'				=> _x( 'Ressource', 'post type singular name' ),
		'add_new'							=> _x( 'Ajouter', 'une Ressource' ),
		'add_new_item'				=> __( 'Ajouter des Ressources' ),
		'edit_item'						=> __( 'Editer une Ressource' ),
		'new_item'						=> __( 'Nouveau' ),
		'all_items'						=> __( 'Toutes les Ressources' ),
		'view_item'						=> __( 'Voir Ressources' ),
		'search_items'				=> __( 'Chercher Ressources' ),
		'not_found'						=>  __( 'Aucune Ressource Trouvée' ),
		'not_found_in_trash'	=> __( 'Aucune Ressource Trouvée Dans La Corbeille' ),
		'parent_item_colon'		=> '',
		'menu_name'						=> 'Ressources'
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
		'supports' 						=> array('title','editor','thumbnail','author','category'),
    'taxonomies'         => array('ressources'),
	);
	register_post_type('ressources',$args);
}

add_action('init', 'analyse_taxonomies', 0);
function analyse_taxonomies(){
	$labels = array(
		'name'					=> _x( 'Analyse', 'taxonomy general name' ),
		'singular_name'	=> _x( 'Analyse', 'taxonomy singular name' ),
		'search_items'	=> __( 'Chercher une Analyse' ),
		'all_items'			=> __( 'Toutes les Analyse' ),
		'edit_item'			=> __( 'Editer une Analyse' ),
		'update_item'		=> __( 'Mise a jour de la Analyse' ),
		'add_new_item'	=> __( 'Ajouter' ),
		'new_item_name'	=> __( 'Nouvelle Analyse' ),
		'menu_name'			=> __( 'Analyse' )
	);
	$args = array(
		'hierarchical'			=> true,
		'labels'						=> $labels,
		'show_ui'						=> true,
		'show_admin_column'	=> true,
		'query_var'					=> true,
		'rewrite'						=> false,
  );
	register_taxonomy('analyse', 'ressources', $args);
}

add_action('init', 'methodologie_taxonomies', 0);
function methodologie_taxonomies(){
	$labels = array(
		'name'					=> _x( 'Méthodologie', 'taxonomy general name' ),
		'singular_name'	=> _x( 'Méthodologie', 'taxonomy singular name' ),
		'search_items'	=> __( 'Chercher une Méthodologie' ),
		'all_items'			=> __( 'Toutes les Méthodologie' ),
		'edit_item'			=> __( 'Editer une Méthodologie' ),
		'update_item'		=> __( 'Mise a jour de la Méthodologie' ),
		'add_new_item'	=> __( 'Ajouter' ),
		'new_item_name'	=> __( 'Nouvelle Méthodologie' ),
		'menu_name'			=> __( 'Méthodologie' )
	);
	$args = array(
		'hierarchical'			=> true,
		'labels'						=> $labels,
		'show_ui'						=> true,
		'show_admin_column'	=> true,
		'query_var'					=> true,
		'rewrite'						=> false,
  );
	register_taxonomy('methodologie', 'ressources', $args);
}

add_action('init', 'temoignage_taxonomies', 0);
function temoignage_taxonomies(){
	$labels = array(
		'name'					=> _x( 'Témoignage', 'taxonomy general name' ),
		'singular_name'	=> _x( 'Témoignage', 'taxonomy singular name' ),
		'search_items'	=> __( 'Chercher une Témoignage' ),
		'all_items'			=> __( 'Toutes les Témoignage' ),
		'edit_item'			=> __( 'Editer une Témoignage' ),
		'update_item'		=> __( 'Mise a jour de la Témoignage' ),
		'add_new_item'	=> __( 'Ajouter' ),
		'new_item_name'	=> __( 'Nouvelle Témoignage' ),
		'menu_name'			=> __( 'Témoignage' )
	);
	$args = array(
		'hierarchical'			=> true,
		'labels'						=> $labels,
		'show_ui'						=> true,
		'show_admin_column'	=> true,
		'query_var'					=> true,
		'rewrite'						=> false,
  );
	register_taxonomy('temoignage', 'ressources', $args);
}


add_filter( 'meta_boxes', 'ressources_metaboxes' );
function ressources_metaboxes( array $meta_boxes ) {
	// Start with an underscore to hide fields from custom fields list
	$prefix = 'ressources_';
	$meta_boxes[] = array(
		'id'         => 'ressources_meta',
		'title'      => 'Méta des ressources',
		'pages'      => array( 'ressources', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(

      array(
	      'name' => 'En-tête de l\'article',
	      'desc' => '',
	      'id'   => $prefix . 'chapeau',
	      'type' => 'textarea',
	    ),
			array(
				'name' => ' Lien vers la Ressource Externe :',
				'desc' => 'Mettre le lien Complet http:// compris',
				'id'   => $prefix . 'externes',
				'type' => 'text',
			),

		),
	);
	// Add other metaboxes as needed
	return $meta_boxes;
}



add_filter( 'meta_boxes', 'post_metaboxes' );
function post_metaboxes( array $meta_boxes ) {
	// Start with an underscore to hide fields from custom fields list
	$prefix = 'post_';
	$meta_boxes[] = array(
		'id'         => 'post_meta',
		'title'      => 'Post Méta',
		'pages'      => array( 'post', ), // Post type
		'context'    => 'normal',
		'priority'   => 'high',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
	      'name' => 'En-tête de l\'article',
	      'desc' => '',
	      'id'   => $prefix . 'chapeau',
	      'type' => 'textarea',
	    ),
		),
	);
	// Add other metaboxes as needed
	return $meta_boxes;
}
