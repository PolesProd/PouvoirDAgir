<?php
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
    'taxonomies'      => array('post_tag'),
    'supports'        => array('title','editor','author','category','comments','thumbnail')
  ));
}

/************************************************************
          Création des Custom Taxonomies(Ressource).
************************************************************/
add_action( 'init', 'ressourcecategory_taxonomy');
function ressourcecategory_taxonomy() {
  $labels = array(
      'name'                        => _x( 'Catégories', 'taxonomy general name' ),
      'singular_name'               => _x( 'Catégorie', 'taxonomy singular name' ),
      'search_items'                =>  __( 'Rechercher Catégories' ),
      'popular_items'               => __( 'Catégories populaires' ),
      'all_items'                   => __( 'Toutes Catégories' ),
      'parent_item'                 => null,
      'parent_item_colon'           => null,
      'edit_item'                   => __( 'Editer Catégorie' ),
      'update_item'                 => __( 'Mettre à jour' ),
      'add_new_item'                => __( 'Ajouter Catégorie' ),
      'new_item_name'               => __( 'Nouveau Nom de la catégorie' ),
      'separate_items_with_commas'  => __( 'Catégories séparées par des virgules' ),
      'add_or_remove_items'         => __( 'Ajouter ou supprimer des catégories' ),
      'choose_from_most_used'       => __( 'Choisissez parmi les catégories les plus utilisées' ),
  );

  register_taxonomy('ressourcecategory','ressources', array(
      'label' => __('Catégorie de la ressource'),
      'labels' => $labels,
      'hierarchical' => true,
      'show_ui' => true,
      'query_var' => true,
      'rewrite' => array( 'slug' => 'ressource-category' ),
  ));
}
?>