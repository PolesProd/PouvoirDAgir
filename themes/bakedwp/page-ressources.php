<?php
    /* Template Name: Ressources */
?>
<?php get_header(); ?>
  <div id="content">
     <div id="inner-content" class="row">
        <div id="main" class="large-10 medium-10 small-centered columns" role="main">
          <div class="temoignage" style='border:solid 1px #ccc;'>
        <?php
          //Témoignage
            $args = array( 'post_type' => 'analyse',
              'posts_per_page' => 2,
              );
            include get_template_directory().'/parts/loop-posts.php';?>
            <form action="?page_id=47" method="post">
              <input type="hidden" value="<?= $sqlTemoignage[0]->taxonomy; ?>" name="post_type">
              <input type="submit" value="En Voir plus">
            </form>
        </div>
        <!--Fin Div Méthodologie -->
        <div class="temoignage" style='border:solid 1px #ccc;'>
      <?php
        //Témoignage
          $args = array( 'post_type' => 'ressources',
            'posts_per_page' => 2,
          );
          include get_template_directory().'/parts/loop-posts.php';?>
        <form action="?page_id=47" method="post">
          <input type="hidden" value="<?= $sqlTemoignage[0]->taxonomy; ?>" name="post_type">
          <input type="submit" value="En Voir plus">
        </form>
      </div><!--Fin Div Méthodologie -->

      <div class="temoignage" style='border:solid 1px #ccc;'>

    <?php
      //Témoignage
        $args = array( 'post_type' => 'ressources',
        'posts_per_page' => 2,
          );
        include get_template_directory().'/parts/loop-posts.php';?>
            <form action="?page_id=47" method="post">
              <input type="hidden" value="<?= $sqlTemoignage[0]->taxonomy; ?>" name="post_type">
              <input type="submit" value="En Voir plus">
            </form>
        </div>
      </div> <!--Fin Div Méthodologie -->
    </div> <!-- end #main -->
  </div> <!-- end #inner-content -->
</div> <!-- end #content -->
<?php get_footer(); ?>
