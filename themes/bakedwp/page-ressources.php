<?php
/*
Template Name: Événements
*/
?>

<?php get_header(); ?>
    <!-- sous header titre page -->
    <div class="hero">
      <div class="large-12 columns">
        <h1><?php the_title(); ?></h1>
      </div>
    </div>
  <!--FIN sous header titre page -->  
    <!-- Barre de navigation des evenemnt "TAG ET CATEGORIE" -->
    <div class="barre medium-12 large-12 columns">
      <ul class="btn-barre">
        <li><img src="<?php echo site_url() ?>/wp-content/themes/bakedwp/assets/images/pyctos/analyse-purple.png" alt="" />analyse</li>
        <li><img src="<?php echo site_url() ?>/wp-content/themes/bakedwp/assets/images/pyctos/methodologie-purple.png" alt="" />methodologie</li>
        <li><img src="<?php echo site_url() ?>/wp-content/themes/bakedwp/assets/images/pyctos/temoignage-purple.png" alt="" />
        temoignage</li>
        <div class="plus"><a href="">+</a></div>
      </ul>
      <ul class="barre-cate">
        <li class="barre-cate">categorie</li>
        <li>categorie</li>
        <li>categorie</li>
        <li>categorie</li>
      </ul>
    </div>
    <!-- FIN Barre de navigation des evenemnt "TAG ET CATEGORIE" -->
    <!-- Les tuiles devenement -->
    <div id="inner-content" class="centerArt">
      <div id="main" class="large-12 medium-10 small-centered columns" role="main">
        <div class="columns">
            <div class="relativArt">
              <?php
                $args = array( 'post_type' => 'events', 'posts_per_page' => 10 );
                $loopy = new WP_Query( $args );
                $count = 1;
                if($loopy->have_posts()){
                  while ( $loopy->have_posts() ) {
                  $loopy->the_post();
                  echo '<div class="events large-3 medium-3 columns small-centered">';
                  $id = get_the_ID();
                ?>
                <div class="dateArt">
                  <div class="positionDate">
                    <?php
                      if( !strlen( get_post_meta( get_the_ID(), 'wpsc_end_date', true ) ) ) {
                        // single day event
                        $date = date_i18n( get_option('date_format'), strtotime( get_post_meta( get_the_ID(), 'wpsc_start_date', true ) ), 'dd-mm-Y');
                      } else {
                        $date = date_i18n( get_option('date_format'), strtotime( get_post_meta( get_the_ID(), 'wpsc_start_date', true ) ) );
                        $date .= ' / ';
                        $date .= date_i18n( get_option('date_format'), strtotime( get_post_meta( get_the_ID(), 'wpsc_end_date', true ) ) );
                      }
                      echo $date;
                    ?>
                </div>
                <div class="auteurArt"><?php the_author(); ?>
                  </div>
              </div>
              <br>
              <div class="titreArt">
                <?php the_title(); ?>
                <?php the_category(); ?>
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
            </div>
          <?php $count++;
            }
            }
            else{
            echo 'Sorry no post matched';
            }
          ?>
        </div>
         <button class="btnArt">voir plus d'article</button>
      </div>
    </div>
    <!--FIN Les tuiles devenement -->
<?php get_footer(); ?>