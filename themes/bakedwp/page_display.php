<?php
/*
Template Name: Category
*/
get_header();
//$post_type = $_POST['post_type'];
//echo $post_type;
?>
<<<<<<< d0d7adb991fd457914d01ae1124bdae4a823abdb
  <div class="temoignage" style='border:solid 1px #ccc;'>
            <?php
  //Témoignage
  // $sqlTemoignage = $wpdb->get_results('SELECT * FROM  wp_term_taxonomy WHERE  taxonomy = "'.$post_type.'"');
  // $countTemoignage = count($sqlTemoignage);
  // for($i=0;$i <$countTemoignage;$i++){
    $args = array( 'post_type' => 'analyse',
      'posts_per_page' => 5,
    );
    $loopy = new WP_Query( $args );
    if($loopy->have_posts()){
      while ( $loopy->have_posts() ) {
        $loopy->the_post();
          echo '<div class="ressoure">';
            $id = get_the_ID();
            $author = get_the_author();
            $terms = wp_get_post_terms($id, 'analyse', $args );
            $my_date = get_the_date( 'l j F Y' );
            $myterms = get_terms('analyse', array( 'parent' => 0, 'hide_empty' => 0 ) );
            echo 'Ressources n<sup>o</sup> '.$id.' appartenant a la catégorie : <strong>'.$terms[0]->name.'</strong> dans <strong>'.$myterms[0]->taxonomy.'</strong><br>';
            if(has_post_thumbnail()){
            ?>
              <div class="imgArticle" id="<?php echo 'post_thumbsnails-'. get_post_thumbnail_id(); ?>" style="font-family: 'Ruda', sans-serif;background-image:url('<?php if ( has_post_thumbnail() ) { echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) );} ;?>');width:300px;height:308px;background-size:cover;background-position: center;background-repeat: no-repeat;">
              </div><!-- Fin de la div imgArticle --><br><?php
            }
            ?>
            <?php echo 'Date d\'écriture : <strong>'.$my_date.'</strong><br>'; ?>
            <?php echo 'Par : <strong>'.$author.'</strong><br>'; ?>
            <?php if(get_post_type($id) === 'analyse'){?>
              <?php echo 'Lien vers la ressource externe : ';?><strong><a href="<?=implode(get_post_meta(get_the_ID(), 'analyse_externes'))?>" target="_blank"><?=implode(get_post_meta(get_the_ID(), 'analyse_externes'));?></a></strong><br>
              <?php the_title(); ?><br>
              <?php echo '<strong><em>'.implode(get_post_meta(get_the_ID(), 'analyse_chapeau')).'</em></strong><br>'; ?>
              <?php the_excerpt().'<br>';
              if(is_user_logged_in()){?>
                <form action="wp-admin/post-new.php?post_type=analyse" method="post">
                  <input type="submit" value="Créer une Analyse">
                </form>
                <?php
              }
            }
            if(get_post_type($id) === 'methodologie'){?>
              <?php echo 'Lien vers la ressource externe : ';?><strong><a href="<?=implode(get_post_meta(get_the_ID(), 'methodologie_externes'))?>" target="_blank"><?=implode(get_post_meta(get_the_ID(), 'methodologie_externes'));?></a></strong><br>
              <?php the_title(); ?><br>
              <?php echo '<strong><em>'.implode(get_post_meta(get_the_ID(), 'methodologie_chapeau')).'</em></strong><br>'; ?>
              <?php the_excerpt().'<br>';
              if(is_user_logged_in()){
                ?>
                <form action="wp-admin/post-new.php?post_type=methodologie" method="post">
                  <input type="submit" value="Créer une methodologie">
                </form>
                <?php
              }
            }
              if(get_post_type($id) === 'temoignage'){?>
                <?php echo 'Lien vers la ressource externe : ';?><strong><a href="<?=implode(get_post_meta(get_the_ID(), 'temoignage_externes'))?>" target="_blank"><?=implode(get_post_meta(get_the_ID(), 'temoignage_externes'));?></a></strong><br>
                <?php the_title(); ?><br>
                <?php echo '<strong><em>'.implode(get_post_meta(get_the_ID(), 'temoignage_chapeau')).'</em></strong><br>'; ?>
                <?php the_excerpt().'<br>';
                if(is_user_logged_in()){
                  ?>
                  <form action="wp-admin/post-new.php?post_type=temoignage" method="post">
                    <input type="submit" value="Créer un temoignage">
                  </form>
                  <?php
                }
              }
          echo '</div>';
      }
      //print_r($post_array);
      for($x = 0;$x <count($post_array);$x++){
            echo '<article>';
            echo '<p><h2>'.$post_array[$x]->post_title.'</h2></p>';
            echo '<p>'.$post_array[$x]->post_content.'</p>';
            echo '</article><hr>';
      }
=======
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
>>>>>>> Ajout isotope & template category

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
