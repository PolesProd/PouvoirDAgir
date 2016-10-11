<?php
/*
Template Name: Contact
*/
?>

<?php get_header(); ?>
<div id="content">

   <div id="inner-content" class="row">

      <div id="main" class="large-10 medium-10 small-centered columns" role="main">
          <?php echo do_shortcode('[contact-form-7 id="24" title="Formulaire de contact 1"]');?>
        </div> <!-- end #main -->

    </div> <!-- end #inner-content -->

  </div> <!-- end #content -->

  <?php get_footer(); ?>
