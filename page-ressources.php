<?php
/*
Template Name: Ressources
*/
?>

<?php get_header(); ?>

  <div id="content">

     <div id="inner-content" class="row" style="max-width: none;">     
      <div id="main" style="" class="large-10 medium-10 columns small-centered" role="main">
        <div class="row">
          <div class="large-8 columns">

            <div class="ressource__analyse">
              <?php
          //Analyse
              $sqlTemoignage = $wpdb->get_results('SELECT * FROM  wp_term_taxonomy WHERE  taxonomy =  "analyse"');
              $countTemoignage = count($sqlTemoignage);
              for($i=0;$i <$countTemoignage;$i++){
              $args = array( 'post_type' => 'ressources',
                'posts_per_page' => 2,
                'tax_query' => array(
                  array(
                    'taxonomy' => 'analyse',
                    'terms' => $sqlTemoignage[$i]->term_id,
                  )
                )
              );
              include get_template_directory().'/parts/loop-posts.php';
              }?>

              <form action="?page_id=47" method="post">
                <input type="hidden" value="<?= $sqlTemoignage[0]->taxonomy; ?>" name="post_type">
                <input type="submit" class="ressource__button button" value="En Voir plus">
              </form>
            </div>
            <!-- Fin Analyse -->


            <div class="ressource__methodologie">
              <?php
        //methodologie
              $sqlTemoignage = $wpdb->get_results('SELECT * FROM  wp_term_taxonomy WHERE  taxonomy =  "methodologie"');
              $countTemoignage = count($sqlTemoignage);
              for($i=0;$i <$countTemoignage;$i++){
              $args = array( 'post_type' => 'ressources',
                'posts_per_page' => 2,
                'tax_query' => array(
                  array(
                    'taxonomy' => 'methodologie',
                    'terms' => $sqlTemoignage[$i]->term_id,
                  )
                )
              );
              include get_template_directory().'/parts/loop-posts.php';
              }?>

              <form action="?page_id=47" method="post">
                <input type="hidden" value="<?= $sqlTemoignage[0]->taxonomy; ?>" name="post_type">
                <input type="submit"  class="ressource__button button" value="En Voir plus">
              </form>
            </div><!--Fin Div Méthodologie -->

            <div class="ressource__temoignage">
              <?php
        //Témoignage
                $sqlTemoignage = $wpdb->get_results('SELECT * FROM  wp_term_taxonomy WHERE  taxonomy =  "temoignage"');
                $countTemoignage = count($sqlTemoignage);
                for($i=0;$i <$countTemoignage;$i++){
                $args = array( 'post_type' => 'ressources',
                  'posts_per_page' => 2,
                  'tax_query' => array(
                    array(
                      'taxonomy' => 'temoignage',
                      'terms' => $sqlTemoignage[$i]->term_id,
                    )
                  )
                );
                include get_template_directory().'/parts/loop-posts.php';
                }?>
            
                <form action="?page_id=47" method="post">
                  <input type="hidden" value="<?= $sqlTemoignage[0]->taxonomy; ?>" name="post_type">
                  <input type="submit" class="ressource__button button" value="En Voir plus">
                </form>            
              </div><!-- Fin div Temoignage -->

            </div><!-- Fin Colonne Ressource -->

            <!-- Colonne Sidebar -->
            <div class="large-4 columns ressource__sidebar">
              <h5>SIDEBAR</h5>   
            </div><!-- Fin colonne Sidebar -->

          </div><!-- Fin row -->
        </div><!-- end #main -->
      </div> <!-- end #inner-content -->
    </div> <!-- end #content -->

<?php get_footer(); ?>