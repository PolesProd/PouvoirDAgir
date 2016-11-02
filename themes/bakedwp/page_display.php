<?php
/*
Template Name: Category
*/
?>
<?php
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
echo wp_list_categories($args);
?>
<div class='button-group float-center'>
  <p>
<button  data-filter="*">Toutes Les Catégories</button><?php

  //print_r($tab_taxo);
  foreach ( $tab_taxo as $taxonomy ) {
    if($taxonomy === 'post_tag' || $taxonomy === 'nav_menu' || $taxonomy === 'link_category' || $taxonomy === 'post_format' ){
    }else{
     //var_dump($ajax_query);
     echo '<button  data-filter=".'.$taxonomy.'">'.$taxonomy.'</button>';
     if($taxonomy !== 'category'){
       $taxoFirst[] = $taxonomy;
     }
   }
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
      $cat = get_the_category($post->ID);?>
       <div class="grid-item <?=$tab_array[$i];?> <?=$cat[0]->category_nicename;?>" data-category='transtition'>
       <h2><?php the_title(); ?></h2>

       	<?php the_excerpt(); ?>
       	<a href="<?php the_permalink(); ?>">Lire</a>
       </div>
     <?php
      }
      else{
        echo count($taxoFirst);

        for($j = 0; $j <count($taxoFirst);$j++){
          foreach ($taxoFirst as $taxo) {
              
              // $terms = get_the_terms( $post->ID, $taxo);
              // $termID[] = $taxo->term_id;
              // $termName[] = $taxo->name;
          }
      }
      // echo '<p>'.$termName[0].'</p>';
      // echo '<p>'.$termID[0].'</p>';
      //$child = get_term_children($termID[0],$termName[0]);
        ?>
          <div class="grid-item <?=$tab_array[$i];?>" data-category='transtition'>
          <h2><?php the_title(); ?></h2>
           <?php the_excerpt(); ?>
           <a href="<?php the_permalink(); ?>">Lire</a>
          </div>
        <?php
      }
endwhile;
endif;
}

echo '</div>';
get_footer();
