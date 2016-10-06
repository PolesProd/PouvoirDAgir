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
    Fonction initialise les Query Posts
********************************************/
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
add_filter('pre_get_posts', 'query_post_type');
/********************************************
          Création des Custom Posts
********************************************/
function ressources() {
  $labels = array(
    'name'					      =>	__('Ressources'),
    'menu_name'           => 	__('Ressources'),
    'singular_name'		    =>	__('Ressources'),
    'add_new_item'		    =>	__('Ajouter une Ressource'),
    'all_items'				    =>	__('Toutes les Ressources'),
    'edit_item'				    =>	__('Modifier la Ressources'),
    'new_item'				    =>	__('Nouvelle Ressource'),
    'view_item'				    =>	__('Voir Ressources'),
    'not_found'				    =>	__('Aucune Ressource trouvé'),
    'not_found_in_trash'	=>	__('Aucune Ressource trouvée dans la corbeille')
  );

  register_post_type('ressources', array(
    'slug' => 'ressources',
    'public' => true,
    'labels' => $labels,
    'menu_position' => 7,
    'capability_type' => 'post',// Utilise les mêmes permissions que pour les articles
    'taxonomies' => array( 'category', 'post_tag' ),
    'supports' => array('title','editor','author','category','comments','thumbnail')
  ));
}
add_action( 'init', 'ressources' );
