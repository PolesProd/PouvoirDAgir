<?php
    /* Template Name: Category-events */
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
      <?php
        /*$args = array('taxonomy' => 'wpsccategory');
        $loop = new WP_Query($args);
        while ($loop->have_posts()) : $loop->the_post();*/
        /*wp_list_cats('sort_order=desc&optioncount=1');*/
				wp_list_categories(array(
					'taxonomy'=>'wpsccategory',
					'show_count'=>1,
					'order'=>'DESC'
				));
        /*endwhile;*/
			?>
    </div> <!-- end #main -->
	</div> <!-- end #inner-content -->
</div> <!-- end #content -->

<?php get_footer(); ?>