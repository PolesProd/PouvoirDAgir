<?php
/* template name: Posts by Category! */
?>
<?php get_header(); ?>

<div id="container">
    <div id="content" role="main">
        <div id="main" class=" large-10 medium-10 small-centered columns" role="main">
            <h1 class="page-title"><?php
            printf( __( 'Category Archives: %s', 'bakedwp' ), '<span>' . single_cat_title( '', false ) . '</span>' );
            ?></h1><?php
           $current_category = single_cat_title("", false);
                $cat_id = get_cat_ID( $current_category);
                $args = array('post_type'=>array('post'),
                    'cat'=> $cat_id,
                    'posts_per_page'=>12,
                    'order'=>'date'
                );
                query_posts( $args );
                if(have_posts()){
                while (have_posts() ) : the_post();
                    $id = get_the_ID();
                    $author = get_the_author();
                    $my_date = get_the_date( 'd/m/Y' );
            ?>
            <div class="ressource grid-item events small-3 columns">
                <div class="dateArt">
                    <?php echo '<div class="positionDate">'.$my_date.'</div>'; ?>
                    <?php echo '<div class="auteurArt"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ).'">'.get_the_author_link().'</a></div>'; ?>
                  </div>
                <div class="titreArt">
                    <a href="<?php the_permalink();?>" class="titreArt"><?php the_title(); ?></a>
                </div>
                <div class="tagArt">
                    <ul>
                      <li>Tag</li>
                      <li>Tag</li>
                      <li>Tag</li>
                    </ul>
                  </div>
                  <div class="shareImg">
                      <p><a href="">  <img src="<?php echo site_url() ?>/wp-content/themes/bakedwp/assets/images/pyctos/newsletter-black.png" alt="" /></a></p>
                      <p><a href=""><img src="<?php echo site_url() ?>/wp-content/themes/bakedwp/assets/images/pyctos/facebook-black.png" alt="" /></a></p>
                      <p><a href=""><img src="<?php echo site_url() ?>/wp-content/themes/bakedwp/assets/images/pyctos/twitter-grey.png" alt="" /></a></p>
                  </div>
            </div><!-- Fin de la div singleArticle -->
            <?php endwhile;
        }
        else{
            echo 'no post with your criteria';
        }
    wp_reset_query();?>
</div><!-- #content -->
</div><!-- #container -->
</div><!-- #main -->
<?php get_footer();?>
