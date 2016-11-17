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
    <div>
      <?php echo do_shortcode('[contact-form-7 id="52" title="Formulaire de contact 1"]');?>
    </div>
   <br><br><br><br><br><br><br><br>
   <div id="tag"></div>
   <br><br>
      <iframe id="haWidget" src="https://www.helloasso.com/associations/collectif-pouvoir-d-agir/adhesions/adherez-au-collectif-pouvoir-d-agir/widget" style="width:800px;height:750px;border:none;" onload="scroll(0,0);"></iframe>
    </div> <!-- end #main -->
  </div> <!-- end #inner-content -->
</div> <!-- end #content -->
<?php get_footer(); ?>
