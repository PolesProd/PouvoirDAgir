<?php
/*
Template Name: Réseaux Impliqués
*/
?>
<<<<<<< HEAD
<?php get_header(); ?>
  <div id="content">
     <div id="inner-content" class="row">
       <?php echo do_shortcode('[gallery]'); ?>
        <div id="main" class="large-10 medium-10 small-centered columns" role="main">
          <?php
            $args = array( 'post_type' => 'ressources', 'posts_per_page' => 6 );
=======

<?php get_header(); ?>

  <div id="content">

     <div id="inner-content" class="row">
       <?php dynamic_sidebar('Aside');?>
       <br>
       <?php echo do_shortcode('[map]'); ?>
        <div id="main" class="large-10 medium-10 small-centered columns" role="main">
            <?php
            $args = array( 'post_type' => 'partenaires', 'posts_per_page' => 6 );
>>>>>>> c8ac7e5e929a92d3a297c24e2f6a32bbfbad3b13
            $loopy = new WP_Query( $args );
            $count = 1;
            if($loopy->have_posts()){
              while ( $loopy->have_posts() ) {
                  $loopy->the_post();
<<<<<<< HEAD
                  echo '<div class="ressoure">';
                      $id = get_the_ID();
                      $author = get_the_author();
                      $terms = wp_get_post_terms($id, 'ressources', $args );
                      echo 'Ressources n<sup>o</sup> '.$count.' appartenant a la catégorie : '.$terms[0]->name.'<br>';
                      if(has_post_thumbnail()){
                      ?>
                      <div class="imgArticle" id="<?php echo 'post_thumbsnails-'. get_post_thumbnail_id(); ?>" style="font-family: 'Ruda', sans-serif;background-image:url('<?php if ( has_post_thumbnail() ) { echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) );} ;?>');width:300px;height:308px;background-size:cover;background-position: center;background-repeat: no-repeat;">
                      </div><!-- Fin de la div imgArticle --><br><?php
                        }
                      ?>
                      <?php echo 'Date d\'écriture : '.implode(get_post_meta(get_the_ID(), 'ressources_date')).'<br>'; ?>
                      <?php echo 'Par : <strong>'.$author.'</strong><br>'; ?>

                      <?php echo 'Lien vers la ressource externe :';?><a href="" target="_blank"><?=implode(get_post_meta(get_the_ID(), 'ressources_externes'));?></a><br>
                      <?php the_title(); ?><br>
                      <?php echo '<strong><em>'.implode(get_post_meta(get_the_ID(), 'ressources_chapeau')).'</em></strong><br>'; ?>
                      <?php the_excerpt().'<br>';
=======
                  echo '<div class="partenaire">';
                      $id = get_the_ID();
                      echo 'Partenaire n<sup>o</sup> '.$count.'<br>';
                      if(has_post_thumbnail()){
                      ?>
                      <div class="imgArticle" id="<?php echo 'post_thumbsnails-'. get_post_thumbnail_id(); ?>" style="font-family: 'Ruda', sans-serif;background-image:url('<?php if ( has_post_thumbnail() ) { echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) );} ;?>');width:300px;height:308px;background-size:cover;background-position: center;background-repeat: no-repeat;">
        							</div><!-- Fin de la div imgArticle --><br><?php
                        }
                       ?>
                      <?php the_title(); ?><br>
                      <?php the_excerpt();?>
                      <?php echo '<a href='.implode(get_post_meta(get_the_ID(), 'part_lien_du_site')).' target="__blank">'.implode(get_post_meta(get_the_ID(), 'part_lien_du_site')).'</a><br><br>';
>>>>>>> c8ac7e5e929a92d3a297c24e2f6a32bbfbad3b13
                      $count++;
                  echo '</div>';
              }
            }
            else{
              echo 'Sorry no post matched';
            }
<<<<<<< HEAD
            ?>
        </div> <!-- end #main -->
    </div> <!-- end #inner-content -->
  </div> <!-- end #content -->
=======
            joints_related_posts();
             ?>
        </div> <!-- end #main -->

    </div> <!-- end #inner-content -->

  </div> <!-- end #content -->

>>>>>>> c8ac7e5e929a92d3a297c24e2f6a32bbfbad3b13
<?php get_footer(); ?>
