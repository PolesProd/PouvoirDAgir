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
				'type' => 'text_date',
			),
		),
	);
	// Add other metaboxes as needed
	return $meta_boxes;
}



add_action( 'init', 'partners_initialize_partners_meta_boxes', 9999 );
function partners_initialize_partners_meta_boxes() {
	if ( ! class_exists( 'cmb_Meta_Box' ) )
	 include(TEMPLATEPATH . "\init.php");
}
