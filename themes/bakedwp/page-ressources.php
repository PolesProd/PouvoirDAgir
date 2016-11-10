<?php
    /* Template Name: Ressources */
?>
<?php get_header(); ?>
  <div id="content">
     <div id="inner-content" class="row">
        <div id="main" class="large-10 medium-10 small-centered columns" role="main">
          <div class="analyse" style='border:solid 1px #ccc;'>
        <?php

          //Analyse
          // $sqlTemoignage = $wpdb->get_results('SELECT * FROM  wp_term_taxonomy WHERE  taxonomy =  "analyse"');
          // $countTemoignage = count($sqlTemoignage);
          // for($i=0;$i <$countTemoignage;$i++){
            $args = array( 'post_type' => 'analyse',
              'posts_per_page' => 2,
              );
            include get_template_directory().'/parts/loop-posts.php';
          //}?>
            <form action="?page_id=47" method="post">
              <input type="hidden" value="<?= $taxo; ?>" name="post_type">
              <input type="submit" value="En Voir plus">
            </form>
        </div>
        <!--Fin Div Méthodologie -->

         <!-- METHODO LOOP -->
        <div id="methodologie" style='border:solid 1px #ccc;'>
        <?php
          $args = array( 'post_type' => 'methodologie', 'posts_per_page' => 3, );
          include get_template_directory().'/parts/loop-posts.php';
        // }?>
        <form action="?page_id=47" method="post">
          <input type="hidden" value="<?= $taxo; ?>" name="post_type">

          <input type="submit" value="En Voir plus">
        </form>
      </div><!--Fin Div Méthodologie -->

      <div class="temoignage" style='border:solid 1px #ccc;'>

        <?php
        //Témoignage
        // $sqlTemoignage = $wpdb->get_results('SELECT * FROM  wp_term_taxonomy WHERE  taxonomy =  "temoignage"');
        // $countTemoignage = count($sqlTemoignage);
        // for($i=0;$i <$countTemoignage;$i++){
          $args = array( 'post_type' => 'temoignage',
            'posts_per_page' => 2,
          );
          include get_template_directory().'/parts/loop-posts.php';
          echo $taxo;
      //  }?>
        <form action="?page_id=47" method="post">
          <input type="hidden" value="<?= $taxo; ?>" name="post_type">
          <input type="submit" value="En Voir plus">
        </form>

      </div>
    </div> <!--Fin Div Témoignage -->
    </div> <!-- end #main -->
  </div> <!-- end #inner-content -->
</div> <!-- end #content -->
<?php get_footer(); ?>
