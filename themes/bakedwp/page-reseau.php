<?php
/*
Template Name: Réseaux Impliqués
*/
?>

<?php get_header(); ?>

  <div id="content">

     <div id="inner-content" class="row">
       <?php dynamic_sidebar('Aside');?>
       <?php echo do_shortcode('[my_gallery]'); ?>
       <br>
       <?php echo do_shortcode('[map]'); ?>
       <?php echo do_shortcode('[my_fb]'); ?>
        <div id="main" class="large-10 medium-10 small-centered columns" role="main">
            <?php
            $args = array( 'post_type' => 'partenaires', 'posts_per_page' => 6 );
            $loopy = new WP_Query( $args );
            $count = 1;
            if($loopy->have_posts()){
              while ( $loopy->have_posts() ) {
                  $loopy->the_post();
                  echo '<div class="partenaire">';
                      $id = get_the_ID();
                      echo 'Partenaire n<sup>o</sup> '.$count.'<br>';
                      ?>
                      <div class="imgArticle" id="<?php echo 'post_thumbsnails-'. get_post_thumbnail_id(); ?>" style="font-family: 'Ruda', sans-serif;background-image:url('<?php if ( has_post_thumbnail() ) { echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) );} ;?>');width:300px;height:308px;background-size:cover;background-position: center;background-repeat: no-repeat;">
        							</div><!-- Fin de la div imgArticle --><br>
                      <?php the_title(); ?><br>
                      <?php the_excerpt();?>
                      <?php echo '<a href='.implode(get_post_meta(get_the_ID(), part_lien_du_site)).' target="__blank">'.implode(get_post_meta(get_the_ID(), part_lien_du_site)).'</a><br><br>';
                      $count++;
                  echo '</div>';
              }
            }
            else{
              echo 'Sorry no post matched';
            }
             ?>
        </div> <!-- end #main -->

    </div> <!-- end #inner-content -->

  </div> <!-- end #content -->

<?php get_footer(); ?>
