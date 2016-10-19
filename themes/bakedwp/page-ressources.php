<?php
/*
Template Name: Ressources
*/
?>

<?php get_header(); ?>

  <div id="content">
    
     <div id="inner-content" class="row">

        <div id="main" class="large-10 medium-10 small-centered columns" role="main">
          <?php
          $args = array( 'post_type' => 'ressources', 'posts_per_page' => 6 );
          $loopy = new WP_Query( $args );
          $count = 1;
          if($loopy->have_posts()){
            while ( $loopy->have_posts() ) {
                $loopy->the_post();
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

                    <?php echo 'Lien vers la ressource externe :';?><a href="<?=implode(get_post_meta(get_the_ID(), 'ressources_externes'))?>" target="_blank"><?=implode(get_post_meta(get_the_ID(), 'ressources_externes'));?></a><br>
                    <?php the_title(); ?><br>
                    <?php echo '<strong><em>'.implode(get_post_meta(get_the_ID(), 'ressources_chapeau')).'</em></strong><br>'; ?>
                    <?php the_excerpt().'<br>';
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
