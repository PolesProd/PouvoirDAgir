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
<<<<<<< HEAD
    'taxonomies'      => array('post_tag'),
=======
    'taxonomies'      => array('category', 'post_tag'),
>>>>>>> 5f4b7d728f27209218bec9ae31d01b435528ea4d
    'supports'        => array('title','editor','author','category','comments','thumbnail')
  ));
}

<<<<<<< HEAD
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

=======
>>>>>>> 5f4b7d728f27209218bec9ae31d01b435528ea4d
/*******************************************************
          Création du Custom Post(Evenement).
*******************************************************/
add_action( 'init', 'evenements');
function evenements() {
  $labels = array(
      'name'               => _x('Événements', 'post type general name'),
      'singular_name'      => _x('Événements', 'post type singular name'),
      'add_new'            => _x('Ajouter', 'Événements'),
      'add_new_item'       => __('Ajouter Événements'),
      'edit_item'          => __('Editer Événements'),
      'new_item'           => __('Nouveau Événements'),
      'view_item'          => __('Voir Événements'),
      'search_items'       => __('Rechercher Événements'),
      'not_found'          => __('Pas d\'Événements trouvé'),
      'not_found_in_trash' => __('Pas d\'Événements trouvé dans la corbeille'),
      'parent_item_colon'  => '',
  );

  $args = array(
      'label'             => __('Événements'),
      'labels'            => $labels,
      'public'            => true,
      'can_export'        => true,
      'show_ui'           => true,
      '_builtin'          => false,
      'capability_type'   => 'post',
      'hierarchical'      => false,
      'rewrite'           => array( "slug" => "Événements" ),
      'supports'          => array('title', 'thumbnail', 'excerpt', 'editor') ,
      'show_in_nav_menus' => true,
      'menu_position'     => 8,
      'taxonomies'        => array( 'eventcategory', 'post_tag')
  );
  register_post_type( 'events', $args);
}

/************************************************************
<<<<<<< HEAD
          Category Field Required
************************************************************/

add_action('admin_print_scripts-post.php', 'my_publish_admin_hook');
add_action('admin_print_scripts-post-new.php', 'my_publish_admin_hook');
function my_publish_admin_hook(){
    global $typenow;
    if (in_array($typenow, array('post','page','mm_photo '))){
        ?>
        <script language="javascript" type="text/javascript">
            jQuery(document).ready(function() {
                jQuery('#post').submit(function() {
                    if (jQuery("#set-post-thumbnail").find('img').size() > 0) {
                        jQuery('#ajax-loading').hide();
                        jQuery('#publish').removeClass('button-primary-disabled');
                        return true;
                    }else{
                        alert("please set a featured image!!!");
                        jQuery('#ajax-loading').hide();
                        jQuery('#publish').removeClass('button-primary-disabled');
                        return false;
                    }
                    return false;
                });
            });
        </script>

        <?php
    }
}



/************************************************************
=======
>>>>>>> 5f4b7d728f27209218bec9ae31d01b435528ea4d
          Création des Custom Taxonomies(Evenement).
************************************************************/
add_action( 'init', 'eventcategory_taxonomy');
function eventcategory_taxonomy() {
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

  register_taxonomy('eventcategory','events', array(
      'label' => __('Catégorie de l\'événement'),
      'labels' => $labels,
      'hierarchical' => true,
      'show_ui' => true,
      'query_var' => true,
      'rewrite' => array( 'slug' => 'event-category' ),
  ));
}

/*************************************************
      Création des Colonnes dans l'admin.
*************************************************/
add_filter ("manage_edit-events_columns", "events_edit_columns");
function events_edit_columns($columns) {
  $columns = array(
      "cb" => "<input type=\"checkbox\" />",
      "tf_col_ev_cat"   => "Catégorie",
      "tf_col_ev_date"  => "Date",
      "tf_col_ev_times" => "Heure",
      "tf_col_ev_thumb" => "Image",
      "title"           => "Événement",
      "tf_col_ev_desc"  => "Description",
  );
  return $columns;
}

add_action ("manage_posts_custom_column", "events_custom_columns");
function events_custom_columns($column){
  global $post;
  $custom = get_post_custom();
  switch ($column){
    case "tf_col_ev_cat":
        // - Voir les termes taxonomies -
        $eventcats = get_the_terms($post->ID, "eventcategory");
        $eventcats_html = array();
        if ($eventcats) {
        foreach ($eventcats as $eventcat)
        array_push($eventcats_html, $eventcat->name);
        echo implode($eventcats_html, ", ");
        } else {
        _e('None', 'themeforce');;
        }
    break;
    case "tf_col_ev_date":
        // - Voir la date -
        $startd = $custom["events_startdate"][0];
        $endd = $custom["events_enddate"][0];
        $startdate = date("j F Y", $startd);
        $enddate = date("j F Y", $endd);
        echo $startdate . '<br /><em>' . $enddate . '</em>';
    break;
    case "tf_col_ev_times":
        // - Voir l'heure -
        $startt = $custom["tf_events_startdate"][0];
        $endt = $custom["tf_events_enddate"][0];
        $time_format = get_option('time_format');
        $starttime = date($time_format, $startt);
        $endtime = date($time_format, $endt);
        echo $starttime . ' - ' .$endtime;
    break;
    case "tf_col_ev_thumb":
        // - Voir l'image-
        $post_image_id = get_post_thumbnail_id(get_the_ID());
        if ($post_image_id) {
        $thumbnail = wp_get_attachment_image_src( $post_image_id, 'post-thumbnail', false);
        if ($thumbnail) (string)$thumbnail = $thumbnail[0];
        echo '<img src="';
        echo bloginfo('template_url');
        echo '/timthumb/timthumb.php?src=';
        echo $thumbnail;
        echo '&h=60&w=60&zc=1" alt="" />';
    }
    break;
    case "tf_col_ev_desc";
        the_excerpt();
    break;
  }
}

/*************************************************
            Affichage de la Meta-Box.
*************************************************/
add_action( 'admin_init', 'events_create' );
function events_create() {
    add_meta_box('events_meta', 'Events', 'events_meta', 'events');
}

function events_meta () {
  // - les données d'appui -
  global $post;
  $custom = get_post_custom($post->ID);
  $meta_sd = $custom["events_startdate"][0];
  $meta_ed = $custom["events_enddate"][0];
  $meta_st = $meta_sd;
  $meta_et = $meta_ed;
  // - format de l'heure saisi -
  $date_format = get_option('date_format'); // Not required in my code
  $time_format = get_option('time_format');
  // - aujourd'hui si vide, 00:00 pour le temps -
  if ($meta_sd == null) { $meta_sd = time(); $meta_ed = $meta_sd; $meta_st = 0; $meta_et = 0;}
  // - convertir à ce formats -
  $clean_sd = date("D, M d, Y", $meta_sd);
  $clean_ed = date("D, M d, Y", $meta_ed);
  $clean_st = date($time_format, $meta_st);
  $clean_et = date($time_format, $meta_et);
  // - security -
  echo '<input type="hidden" name="tf-events-nonce" id="tf-events-nonce" value="' .
  wp_create_nonce( 'tf-events-nonce' ) . '" />';
  // - output -
  ?>
  <div class="tf-meta">
  <ul>
      <li><label>Commence le:</label><input name="events_startdate" class="tfdate" value="<?php echo $clean_sd; ?>" /></li>
      <li><label>à</label><input name="events_starttime" value="<?php echo $clean_st; ?>" /><em>Utiliser le format 24h (7pm = 19:00)</em></li>
      <li><label>Fini le:</label><input name="events_enddate" class="tfdate" value="<?php echo $clean_ed; ?>" /></li>
      <li><label>à</label><input name="events_endtime" value="<?php echo $clean_et; ?>" /><em>Utiliser le format 24h (7pm = 19:00)</em></li>
  </ul>
  </div>
  <?php
}

/*************************************************
            Enregistrer les données.
*************************************************/
add_action ('save_post', 'save_events');
function save_events(){
  global $post;
  // - Requiert nonce
  if ( !wp_verify_nonce( $_POST['tf-events-nonce'], 'tf-events-nonce' )) {
      return $post->ID;
  }
  if ( !current_user_can( 'edit_post', $post->ID ))
      return $post->ID;
  // - reconvertir au format unix & mettre à jour après.
  if(!isset($_POST["events_startdate"])):
  return $post;
  endif;
  $updatestartd = strtotime ( $_POST["events_startdate"] . $_POST["events_starttime"] );
  update_post_meta($post->ID, "events_startdate", $updatestartd );

  if(!isset($_POST["events_enddate"])):
  return $post;
  endif;
  $updateendd = strtotime ( $_POST["events_enddate"] . $_POST["events_endtime"]);
  update_post_meta($post->ID, "events_enddate", $updateendd );
}

/*************************************************
        Personnaliser messages mise à jour.
*************************************************/
add_filter('post_updated_messages', 'events_updated_messages');
function events_updated_messages( $messages ) {
  global $post, $post_ID;
  $messages['events'] = array(
    0 => '', // Inutilisé. Messages commencent à l'index 1.
    1 => sprintf( __('Event updated. <a href="%s">View item</a>'), esc_url( get_permalink($post_ID) ) ),
    2 => __('Champ personnalisé mis à jour.'),
    3 => __('Champ personnalisé supprimé.'),
    4 => __('Evénement mis à jour.'),
    /* traducteurs: %s: la date et l'heure de la révision */
    5 => isset($_GET['revision']) ? sprintf( __('Événement restauré à la révision de la %s'), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
    6 => sprintf( __('Evénement publié. <a href="%s">Voir l\'événement</a>'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Evénement enregistré.'),
    8 => sprintf( __('Evénement valider. <a target="_blank" href="%s">Aperçu événement</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Événement prévu pour: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Aperçu événement</a>'),
      // traducteurs: Publie format de la date de la boîte, voir http://php.net/date
      date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Projet de l\'événement mis à jour. <a target="_blank" href="%s">Aperçu événement</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );
  return $messages;
}

/*************************************************
                JS Datepicker UI.
*************************************************/
add_action('admin_print_styles-post.php', 'events_styles', 1000);
add_action('admin_print_styles-post-new.php', 'events_styles', 1000);
function events_styles() {
    global $post_type;
    if('events' != $post_type)
        return;
    wp_enqueue_style('ui-datepicker', get_bloginfo('template_url') . '/css/jquery-ui-1.8.9.custom.css');
}

add_action('admin_print_scripts-post.php', 'events_scripts', 1000);
add_action('admin_print_scripts-post-new.php', 'events_scripts', 1000);
function events_scripts() {
    global $post_type;
    if( 'events' != $post_type )
        return;
    wp_enqueue_script('jquery-ui', get_bloginfo('template_url') . '/js/jquery-ui-1.8.9.custom.min.js', array('jquery'));
    wp_enqueue_script('ui-datepicker', get_bloginfo('template_url') . '/js/jquery.ui.datepicker.min.js');
    wp_enqueue_script('custom_script', get_bloginfo('template_url').'/js/pubforce-admin.js', array('jquery'));
}

/*************************************************
          Shortcode pour les événements.
*************************************************/
add_shortcode('tf-events-full', 'events_full'); // On peut maintenant appeler ce shortcode avec [tf-events-plein limite = '20 ']
function tf_events_full ( $atts ) {
  // - Définir des arguments -
  extract(shortcode_atts(array(
      'limit' => '10', // # of events to show
   ), $atts));
  // ===== FONCTION DE SORTIE =====
  ob_start();
  // ===== BOUCLE: SECTION EVENEMENTS COMPLET =====
  // - cacher les événements qui sont plus ancien que 6 heures aujourd'hui -
  $today6am = strtotime('today 6:00') + ( get_option( 'gmt_offset' ) * 3600 );
  // - Requêtes -
  global $wpdb;
  $querystr = "
      SELECT *
      FROM $wpdb->posts wposts, $wpdb->postmeta metastart, $wpdb->postmeta metaend
      WHERE (wposts.ID = metastart.post_id AND wposts.ID = metaend.post_id)
      AND (metaend.meta_key = 'tf_events_enddate' AND metaend.meta_value > $today6am )
      AND metastart.meta_key = 'tf_events_enddate'
      AND wposts.post_type = 'tf_events'
      AND wposts.post_status = 'publish'
      ORDER BY metastart.meta_value ASC LIMIT $limit
   ";
  $events = $wpdb->get_results($querystr, OBJECT);
  // - déclarer le jour courant -
  $daycheck = null;
  // - boucle -
  if ($events):
  global $post;
  foreach ($events as $post):
  setup_postdata($post);
  // - variables personnalisées -
  $custom = get_post_custom(get_the_ID());
  $sd = $custom["events_startdate"][0];
  $ed = $custom["events_enddate"][0];
  // - determine if it's a new day -
  $longdate = date("l, j F Y", $sd);
  if ($daycheck == null) { echo '<h2 class="full-events">' . $longdate . '</h2>'; }
  if ($daycheck != $longdate && $daycheck != null) { echo '<h2 class="full-events">' . $longdate . '</h2>'; }
  // - format de l'heure locale -
  $time_format = get_option('time_format');
  $stime = date($time_format, $sd);
  $etime = date($time_format, $ed);
  // - sortie - ?>
  <div class="full-events">
      <div class="text">
          <div class="title">
              <div class="time"><?php echo $stime . ' - ' . $etime; ?></div>
              <div class="eventtext"><?php the_title(); ?></div>
          </div>
      </div>
       <div class="desc"><?php if (strlen($post->post_content) > 150) { echo substr($post->post_content, 0, 150) . '...'; } else { echo $post->post_content; } ?></div>
  </div>
  <?php
  // - remplir daycheck avec le jour courant -
  $daycheck = $longdate;
  endforeach;
  else :
  endif;
  // ===== RETOURNE: SECTION EVENEMENTS COMPLET =====
  $output = ob_get_contents();
  ob_end_clean();
  return $output;
}
