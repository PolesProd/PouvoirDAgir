<?php
/*
Template Name: Ressources
*/
?>

<?php get_header(); ?>

  <div id="content">

     <div id="inner-content" class="row">

        <div id="main" class="large-10 medium-10 small-centered columns" role="main">
          <div class="temoignage" style='border:solid 1px #ccc;'>
                    <?php
          //Témoignage
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

            $loopy = new WP_Query( $args );
            if($loopy->have_posts()){
              while ( $loopy->have_posts() ) {
                  $loopy->the_post();
                  if (get_category($sqlTemoignage[$i]->term_id)->category_count > 0){
                  echo '<div class="ressoure">';
                      $id = get_the_ID();
                      $author = get_the_author();
                      $terms = wp_get_post_terms($id, 'analyse', $args );
                      $my_date = get_the_date( 'l j F  Y' );
                      $myterms = get_terms('analyse', array( 'parent' => 0, 'hide_empty' => 0 ) );
                      echo 'Ressources n<sup>o</sup>'.$id.' appartenant a la catégorie : <strong>'.$terms[0]->name.'</strong> dans <strong>'.$myterms[0]->taxonomy.'</strong><br>';
                      if(has_post_thumbnail()){
                      ?>
                        <div class="imgArticle" id="<?php echo 'post_thumbsnails-'. get_post_thumbnail_id(); ?>" style="font-family: 'Ruda', sans-serif;background-image:url('<?php if ( has_post_thumbnail() ) { echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) );} ;?>');width:300px;height:308px;background-size:cover;background-position: center;background-repeat: no-repeat;">
                        </div><!-- Fin de la div imgArticle --><br><?php
                      }
                      else{
                        ?>
                          <div class="imgArticle" style="font-family: 'Ruda', sans-serif;background-image:url('http://lorempixel.com/output/city-q-c-640-480-10.jpg');width:300px;height:308px;background-size:cover;background-position: center;background-repeat: no-repeat;">
                          </div><!-- Fin de la div imgArticle --><br><?php
                      }
                      ?>
                      <?php echo 'Date d\'écriture : <strong>'.$my_date.'</strong><br>'; ?>
                      <?php echo 'Par : <strong>'.$author.'</strong><br>'; ?>

                      <?php echo 'Lien vers la ressource externe : ';?><strong><a href="<?=implode(get_post_meta(get_the_ID(), 'ressources_externes'))?>" target="_blank"><?=implode(get_post_meta(get_the_ID(), 'ressources_externes'));?></a></strong><br>
                      <?php the_title(); ?><br>
                      <?php echo '<strong><em>'.implode(get_post_meta(get_the_ID(), 'ressources_chapeau')).'</em></strong><br>'; ?>
                      <?php the_excerpt().'<br>';
                  echo '</div>';

              }
              }
              }

            }
            echo '<form action="?page_id=47" method="post">
              <input type="hidden" value="'.$sqlTemoignage[0]->taxonomy.'" name="post_type">
              <input type="submit" value="En Voir plus">
            </form>';
          ?>
        </div> <!--Fin Div Méthodologie -->

        <div class="temoignage" style='border:solid 1px #ccc;'>
                  <?php
        //Témoignage
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
          $loopy = new WP_Query( $args );
          if($loopy->have_posts()){
            while ( $loopy->have_posts() ) {
              $loopy->the_post();
              if (get_category($sqlTemoignage[$i]->term_id)->category_count > 0){
                echo '<div class="ressoure">';
                  $id = get_the_ID();
                  $author = get_the_author();
                  $terms = wp_get_post_terms($id, 'methodologie', $args );
                  $my_date = get_the_date( 'l j F Y' );
                  $myterms = get_terms('methodologie', array( 'parent' => 0, 'hide_empty' => 0 ) );
                  echo 'Ressources n<sup>o</sup> '.$id.' appartenant a la catégorie : <strong>'.$terms[0]->name.'</strong> dans <strong>'.$myterms[0]->taxonomy.'</strong><br>';
                  if(has_post_thumbnail()){
                  ?>
                    <div class="imgArticle" id="<?php echo 'post_thumbsnails-'. get_post_thumbnail_id(); ?>" style="font-family: 'Ruda', sans-serif;background-image:url('<?php if ( has_post_thumbnail() ) { echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) );} ;?>');width:300px;height:308px;background-size:cover;background-position: center;background-repeat: no-repeat;">
                    </div><!-- Fin de la div imgArticle --><br><?php
                  }
                  ?>
                  <?php echo 'Date d\'écriture : <strong>'.$my_date.'</strong><br>'; ?>
                  <?php echo 'Par : <strong>'.$author.'</strong><br>'; ?>

                  <?php echo 'Lien vers la ressource externe : ';?><strong><a href="<?=implode(get_post_meta(get_the_ID(), 'ressources_externes'))?>" target="_blank"><?=implode(get_post_meta(get_the_ID(), 'ressources_externes'));?></a></strong><br>
                  <?php the_title(); ?><br>
                  <?php echo '<strong><em>'.implode(get_post_meta(get_the_ID(), 'ressources_chapeau')).'</em></strong><br>'; ?>
                  <?php the_excerpt().'<br>';
                echo '</div>';

              }
            }
          }

        }
        echo '<form action="?page_id=47" method="post">
          <input type="hidden" value="'.$sqlTemoignage[0]->taxonomy.'" name="post_type">
          <input type="submit" value="En Voir plus">
        </form>';
        ?>

      </div> <!--Fin Div Méthodologie -->

      <div class="temoignage" style='border:solid 1px #ccc;'>

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
      ) );
        $loopy = new WP_Query( $args );
        if($loopy->have_posts()){
          while ( $loopy->have_posts() ) {
              $loopy->the_post();
              if (get_category($sqlTemoignage[$i]->term_id)->category_count > 0){
              echo '<div class="ressoure">';
                  $id = get_the_ID();
                  $author = get_the_author();
                  $terms = wp_get_post_terms($id, 'temoignage', $args );
                  $my_date = get_the_date( 'l j F  Y' );
                  $myterms = get_terms('temoignage', array( 'parent' => 0, 'hide_empty' => 0 ) );
                  echo 'Ressources n<sup>o</sup> '.$id.' appartenant a la catégorie : <strong>'.$terms[0]->name.'</strong> dans <strong>'.$myterms[0]->taxonomy.'</strong><br>';
                  if(has_post_thumbnail()){
                  ?>
                    <div class="imgArticle" id="<?php echo 'post_thumbsnails-'. get_post_thumbnail_id(); ?>" style="font-family: 'Ruda', sans-serif;background-image:url('<?php if ( has_post_thumbnail() ) { echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) );} ;?>');width:300px;height:308px;background-size:cover;background-position: center;background-repeat: no-repeat;">
                    </div><!-- Fin de la div imgArticle --><br><?php
                  }
                  ?>
                  <?php echo 'Date d\'écriture : <strong>'.$my_date.'</strong><br>'; ?>
                  <?php echo 'Par : <strong>'.$author.'</strong><br>'; ?>

                  <?php echo 'Lien vers la ressource externe : ';?><strong><a href="<?=implode(get_post_meta(get_the_ID(), 'ressources_externes'))?>" target="_blank"><?=implode(get_post_meta(get_the_ID(), 'ressources_externes'));?></a></strong><br>
                  <?php the_title(); ?><br>
                  <?php echo '<strong><em>'.implode(get_post_meta(get_the_ID(), 'ressources_chapeau')).'</em></strong><br>'; ?>
                  <?php the_excerpt().'<br>';

              echo '</div>';

          }
        }

      }

      }
      echo '<form action="?page_id=47" method="post">
        <input type="hidden" value="'.$sqlTemoignage[0]->taxonomy.'" name="post_type">
        <input type="submit" value="En Voir plus">
      </form>';

      ?>
    </div> <!--Fin Div Méthodologie -->


        </div> <!-- end #main -->

    </div> <!-- end #inner-content -->

  </div> <!-- end #content -->

<?php get_footer(); ?>
