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
$posttags = get_the_tags();
?>

<div class="barre medium-12 large-12 " id="pageDisplay">
<div class='button-group float-center'>
  <p class="btn-barre">
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
 <p class="barre-cate">
  <button  data-filter="*">Tous Les Post Type</button><?php
  foreach($tab_array as $menu){
    if($menu === 'page' || $menu === 'attachment' || $menu === 'revision' || $menu === 'nav_menu_item' || $menu === 'ressources' || $menu === 'wpcf7_contact_form'){
    }else{
     //var_dump($ajax_query);
     echo '<button  data-filter=".'.$menu.'">'.$menu.'</button>';
    }
  }
echo '</p></div></div>';

echo '<div class="isotope large-12 centerArt  ">';

for($i = 0; $i<count($tab_array);$i++){
  $args = array(
      'post_type' => $tab_array[$i],
      'posts_per_page' => 10
  );
  $ajax_query = new WP_Query($args);
  if ( $ajax_query->have_posts() ) : while ( $ajax_query->have_posts() ) : $ajax_query->the_post();
    $author = get_the_author();
    $my_date = get_the_date( 'd/m/Y' );
    if($args['post_type'] === 'page' || $args['post_type'] === 'attachment' || $args['post_type'] === 'revision' || $args['post_type'] === 'nav_menu_item' || $args['post_type'] === 'ressources' || $args['post_type'] === 'wpcf7_contact_form'){
    }else if($args['post_type'] === 'post'){
      // echo '<p> Type Post :';
      // print_r($post);
      // echo '</p>';
      $cat = get_the_category($post->ID);?>
       <div class="grid-item <?=$tab_array[$i];?> <?=$cat[0]->category_nicename;?> events medium-3" data-category='transtition' style="height: 240px !important;">
          <div class="dateArt">
            <?php echo '<div class="positionDate">'.$my_date.'</div>'; ?>
            <?php echo '<div class="auteurArt">'.$author.'</div>'; ?>
          </div>
          <div class="titreArt">
            <a href="<?php the_permalink();?>" class="titreArt"><?php the_title(); ?></a>
          </div>
          <div class="tagArt">
            <?php the_tags( '<ul><li>', '</li><li>', '</li></ul>' ); ?>
          </div>
          <div class="shareImg">
            <p><a href="">  <img src="<?php echo site_url() ?>/wp-content/themes/bakedwp/assets/images/pyctos/newsletter-black.png" alt="" /></a></p>
            <p><a href=""><img src="<?php echo site_url() ?>/wp-content/themes/bakedwp/assets/images/pyctos/facebook-black.png" alt="" /></a></p>
            <p><a href=""><img src="<?php echo site_url() ?>/wp-content/themes/bakedwp/assets/images/pyctos/twitter-grey.png" alt="" /></a></p>
          </div>
       </div>
     <?php
    }else{
        $terms = '';
        if($post->post_type == 'events'){
          $termsFirst = wp_get_post_terms( $post->ID, 'wpsccategory');
          $termsSecond = wp_get_post_terms( $post->ID, 'wpsclocation');
          $terms = $termsFirst[0]->slug . ' ';
          $terms .= $termsSecond[0]->slug;
          //echo '<p>'.$terms.'</p>';
        }else if($post->post_type == 'analyse'){
          $termsFirst = wp_get_post_terms( $post->ID, 'analyse' );
          if(!empty($termsFirst)){
            $terms = $termsFirst[0]->slug;
          }
          //echo '<p>'.$terms.'</p>';
        }else if($post->post_type == 'methodologie'){
          $termsFirst = wp_get_post_terms( $post->ID, 'methodologie' );
           if(!empty($termsFirst)){
            $terms = $termsFirst[0]->slug;
          }
        }else if($post->post_type == 'temoignage'){
          $termsFirst = wp_get_post_terms( $post->ID, 'temoignage' );
           if(!empty($termsFirst)){
            $terms = $termsFirst[0]->slug;
          }
        }
          ?>
        
      <div class="grid-item <?=$tab_array[$i] .' '. $terms;?> events medium-3" data-category='transtition' style="height: 240px !important;">
        <div class="dateArt">
          <?php echo '<div class="positionDate">'.$my_date.'</div>'; ?>
          <?php echo '<div class="auteurArt">'.$author.'</div>'; ?>
        </div>
        <div class="titreArt">
          <a href="<?php the_permalink();?>" class="titreArt"><?php the_title(); ?></a>
        </div>
        <div class="tagArt">
          <ul>
            <?php the_tags( '<ul><li>', '</li><li>', '</li></ul>' ); ?>
          </ul>
        </div>
        <div class="shareImg">
          <p><a href="">  <img src="<?php echo site_url() ?>/wp-content/themes/bakedwp/assets/images/pyctos/newsletter-black.png" alt="" /></a></p>
          <p><a href=""><img src="<?php echo site_url() ?>/wp-content/themes/bakedwp/assets/images/pyctos/facebook-black.png" alt="" /></a></p>
          <p><a href=""><img src="<?php echo site_url() ?>/wp-content/themes/bakedwp/assets/images/pyctos/twitter-grey.png" alt="" /></a></p>
        </div>
      </div>
<?php }
endwhile;
endif;
}
echo '</div>';

get_footer();