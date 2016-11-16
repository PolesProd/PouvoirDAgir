<?php
/*
Template Name: Réseaux Impliqués
*/
?>
<?php get_header(); ?>
  <div id="content">
     <div id="inner-content" class="row">
     <?php echo '<h1>'.get_post_field('post_title', $post->ID).'</h1>'; ?>
      <?php echo get_post_field('post_content', $post->ID); ?>
        <hr>
        <h2>Reseaux Impliqués</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis delectus officiis vero doloremque hic quia odio voluptatem maiores quidem. Itaque fugiat laborum hic odit cumque officia iste natus, libero aspernatur.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa sapiente qui, quos eos quam placeat cupiditate, architecto! Facilis nam amet nulla voluptates, rerum harum minus totam officia culpa quod esse!</p>
            <div id="main" class="large-12 medium-12 small-centered columns" role="main">
            <?php
            $args = array( 'post_type' => 'partenaires', 'posts_per_page' => 3 );
            $loopy = new WP_Query( $args );
            $count = 1;
            if($loopy->have_posts()){
              while ( $loopy->have_posts() ) {
                  $loopy->the_post();
                  echo '<div class="partenaire events large-3 medium-3">';
                      $id = get_the_ID();
                      echo 'Partenaire n<sup>o</sup> '.$count.'<br>';
                      ?>
                      <!-- Fin de la div imgArticle --><br>
                      <a href="<?php the_permalink();?>" class="titreArt"><?php the_title(); ?></a><br>
                      <?php the_excerpt();?>
                      <?php echo '<a href='.implode(get_post_meta(get_the_ID(), 'part_lien_du_site')).' target="__blank">'.implode(get_post_meta(get_the_ID(), 'part_lien_du_site')).'</a><br><br>';
                      $count++;
                  echo '</div>';
              }
            }
            else{
              echo 'Sorry no post matched';
            }
             ?>
        </div> <!-- end #main -->
        <div>
        <h2>Actions</h2>
        <?php
          $args = array( 'post_type' => 'post', 'posts_per_page' => 3,'orderby' => 'date' );
            $loopy = new WP_Query( $args );
             include get_template_directory().'/parts/loop-posts.php';?>
        </div>
    </div> <!-- end #inner-content -->
  </div> <!-- end #content -->
<?php get_footer(); ?>
