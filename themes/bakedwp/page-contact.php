<<<<<<< HEAD
<?php
/*
Template Name: Contact
*/
?>
<?php get_header(); ?>
<div class="hero">
  <div class="row">
    <div class="large-12 columns">
      <h1><?php the_title(); ?></h1>
    </div>
  </div>
</div>
<div id="content">
  <div id="inner-content" class="row">
    <div id="main" class="large-10 medium-10 small-centered columns" role="main">
      <br><br>
      <iframe id="haWidget" src="https://www.helloasso.com/associations/pouvoir-d-agir/adhesions/pouvoir-d-agir/widget" style="width:800px;height:750px;border:none;" onload="scroll(0,0);"></iframe>
    </div> <!-- end #main -->
  </div> <!-- end #inner-content -->
</div> <!-- end #content -->
<?php get_footer(); ?>
=======
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
          <br><br>
          <iframe id="haWidget" src="https://www.helloasso.com/associations/pouvoir-d-agir/adhesions/pouvoir-d-agir/widget" style="width:800px;height:750px;border:none;" onload="scroll(0,0);"></iframe>
        </div> <!-- end #main -->

    </div> <!-- end #inner-content -->

  </div> <!-- end #content -->

  <?php get_footer(); ?>
>>>>>>> e3c70a52925841d0d4fdc9d0a5b313eceab1b9d9
