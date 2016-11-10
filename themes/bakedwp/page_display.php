<?php
/*
Template Name: Category
*/
get_header();
$post_type = get_post_types();
$string_arr = implode(',',$post_type);
$tab_array = explode(',',$string_arr);
$taxonomies = get_taxonomies();
$str_taxo = implode(',',$taxonomies);
$tab_taxo = explode(',',$str_taxo);
$argsTaxo = array(
  'current_category' => 0
);
?>
<div class='button-group float-center'>
  <p>
<button  data-filter="*">Toutes Les Catégories</button><?php
  $terms = get_terms( array(
    'taxonomy' => array('category','analyse','methodologie','temoignage','wpsclocation','wpsccategory'),
    'hide_empty' => false,
) );
  for($j = 0; $j < sizeof($terms);$j++){
    echo '<button  data-filter=".'.$terms[$j]->slug.'">'.$terms[$j]->name.'</button>';
  }
  echo '</p></div>';
   ?>
<div class='button-group float-center'>
 <p>
  <button  data-filter="*">Tous Les Post Type</button><?php
  foreach($tab_array as $menu){
    if($menu === 'page' || $menu === 'attachment' || $menu === 'revision' || $menu === 'nav_menu_item' || $menu === 'ressources' || $menu === 'wpcf7_contact_form'){
    }else{
     //var_dump($ajax_query);
     echo '<button  data-filter=".'.$menu.'">'.$menu.'</button>';
    }
  }
echo '</p></div>';
echo '<div class="isotope">';
for($i = 0; $i<count($tab_array);$i++){
  $args = array(
      'post_type' => $tab_array[$i],
      'posts_per_page' => 10
  );
  $ajax_query = new WP_Query($args);
  if ( $ajax_query->have_posts() ) : while ( $ajax_query->have_posts() ) : $ajax_query->the_post();
    if($args['post_type'] === 'page' || $args['post_type'] === 'attachment' || $args['post_type'] === 'revision' || $args['post_type'] === 'nav_menu_item' || $args['post_type'] === 'ressources' || $args['post_type'] === 'wpcf7_contact_form'){
    }else if($args['post_type'] === 'post'){
      // echo '<p> Type Post :';
      // print_r($post);
      // echo '</p>';
      $cat = get_the_category($post->ID);?>
       <div class="grid-item <?=$tab_array[$i];?> <?=$cat[0]->category_nicename;?>" data-category='transtition'>
       <h2><?php the_title(); ?></h2>

        <?php the_excerpt(); ?>
        <a href="<?php the_permalink(); ?>">Lire</a>
       </div>
     <?php
    }
      else{
        $terms = '';
        if($post->post_type == 'events'){
          $termsFirst = wp_get_post_terms( $post->ID, 'wpsccategory');
          $termsSecond = wp_get_post_terms( $post->ID, 'wpsclocation');
          $terms = $termsFirst[0]->slug . ' ';
          $terms .= $termsSecond[0]->slug;
        }else if($post->post_type == 'analyse'){
          $termsFirst = wp_get_post_terms( $post->ID, 'analyse' );
          $terms = $termsFirst[0]->slug;
        }else if($post->post_type == 'methodologie'){
          $termsFirst = wp_get_post_terms( $post->ID, 'methodologie' );
          $terms = $termsFirst[0]->slug;
        }else if($post->post_type == 'temoignage'){
          $termsFirst = wp_get_post_terms( $post->ID, 'temoignage' );
          $terms = $termsFirst[0]->slug;
        }
          ?>
        
      <div class="grid-item <?=$tab_array[$i] .' '. $terms;?>" data-category='transtition'>
      <h2><?php the_title(); ?> </h2>
       <?php the_excerpt(); ?>
       <a href="<?php the_permalink(); ?>">Lire</a>
      </div>
<?php }
endwhile;
endif;
}
echo '</div>';
get_footer();