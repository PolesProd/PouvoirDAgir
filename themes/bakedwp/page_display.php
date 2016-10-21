<?php
/*
Template Name: Display
*/
?>

<?php get_header();
$post_type = $_POST['post_type'];
if(is_user_logged_in()){
  ?>
  <form action="wp-admin/post-new.php?post_type=ressources" method="post">
    <input type="submit" value="Créer une Ressource">
  </form>
  <?php
}
?>

  <div class="temoignage row" style='border:solid 1px #ccc;'>
            <?php
  //Témoignage
  $sqlTemoignage = $wpdb->get_results('SELECT * FROM  wp_term_taxonomy WHERE  taxonomy = "'.$post_type.'"');
  $countTemoignage = count($sqlTemoignage);
  for($i=0;$i <$countTemoignage;$i++){
    $args = array( 'post_type' => 'ressources',
      'posts_per_page' => 5,
      'tax_query' => array(
        array(
            'taxonomy' => $post_type,
            'terms' => $sqlTemoignage[$i]->term_id,
        )
      )
    );
    $loopy = new WP_Query( $args );
    if($loopy->have_posts()){
      while ( $loopy->have_posts() ) {
        $loopy->the_post();
        if (get_category($sqlTemoignage[$i]->term_id)->category_count > 0){
          echo '<div class="ressoure row">';
            $id = get_the_ID();
            $author = get_the_author();
            $terms = wp_get_post_terms($id, $post_type, $args );
            $my_date = get_the_date( 'l j F Y' );
            $myterms = get_terms($post_type, array( 'parent' => 0, 'hide_empty' => 0 ) );
            echo 'Ressources n<sup>o</sup>'.$id.' appartenant a la catégorie : <strong>'.$terms[0]->name.'</strong> dans <strong>'.$myterms[0]->taxonomy.'</strong><br>';
            if(has_post_thumbnail()){
            ?>
              <div class="imgArticle row" id="<?php echo 'post_thumbsnails-'. get_post_thumbnail_id(); ?>" style="font-family: 'Ruda', sans-serif;background-image:url('<?php if ( has_post_thumbnail() ) { echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) );} ;?>');width:300px;height:308px;background-size:cover;background-position: center;background-repeat: no-repeat;">
              </div><!-- Fin de la div imgArticle --><?php
            }
            else{
              ?>
                <div class="imgArticle row" style="font-family: 'Ruda', sans-serif;background-image:url('http://lorempixel.com/output/city-q-c-640-480-10.jpg');width:300px;height:308px;background-size:cover;background-position: center;background-repeat: no-repeat;">
                </div><!-- Fin de la div imgArticle --><?php
            }
            ?>
            <?php echo '<div class="row">Date d\'écriture : <strong>'.$my_date.'</strong></div>'; ?>
            <?php echo '<div class="row">Par : <strong>'.$author.'</strong></div>'; ?>

            <?php echo '<div class="row">Lien vers la ressource externe : ';?><strong><a href="<?=implode(get_post_meta(get_the_ID(), 'ressources_externes'))?>" target="_blank"><?=implode(get_post_meta(get_the_ID(), 'ressources_externes'));?></a></strong></div>
            <div class="row"><?php the_title(); ?></div>
            <?php echo '<div class="row"><strong><em>'.implode(get_post_meta(get_the_ID(), 'ressources_chapeau')).'</em></strong></div>'; ?>
            <div class="row"><?php the_excerpt().'</div>';
          echo '</div>';
        }
      }
    }
  }?>

</div> <!--Fin Div Méthodologie --><?php get_footer();?>
