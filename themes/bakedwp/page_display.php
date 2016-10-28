<?php
/*
Template Name: Category
*/
get_header();
//$post_type = $_POST['post_type'];
//echo $post_type;
?>
<?php
get_header();

$post_type = get_post_types();
$string_arr = implode(',',$post_type);
$tab_array = explode(',',$string_arr);
?>
<div class='button-group float-center'>
  <button  data-filter="*">Tous</button><?php
  foreach($tab_array as $menu){
    if($menu === 'page' || $menu === 'attachment' || $menu === 'revision' || $menu === 'nav_menu_item' || $menu === 'ressources' || $menu === 'wpcf7_contact_form'){
    }else{
     //var_dump($ajax_query);
     echo '<button  data-filter=".'.$menu.'">'.$menu.'</button>';
   }
  }
echo '</div>';
echo '<div class="isotope">';
for($i = 0; $i<count($tab_array);$i++){
  $args = array(
      'post_type' => $tab_array[$i],
      'posts_per_page' => 10
  );

  $ajax_query = new WP_Query($args);
  if ( $ajax_query->have_posts() ) : while ( $ajax_query->have_posts() ) : $ajax_query->the_post();

    if($args['post_type'] === 'page' || $args['post_type'] === 'attachment' || $args['post_type'] === 'revision' || $args['post_type'] === 'nav_menu_item' || $args['post_type'] === 'ressources' || $args['post_type'] === 'wpcf7_contact_form'){
    }else{
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
