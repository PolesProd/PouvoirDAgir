<?php
    /* Template Name: Ressources */
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
                $args = array( 'post_type' => 'ressources', 'posts_per_page' => 10);
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post();
                  the_title();
									the_post_thumbnail();
									the_content();
									the_author();
                endwhile;
					    	?>
    				</div> <!-- end #main -->
				</div> <!-- end #inner-content -->
			</div> <!-- end #content -->
<?php get_footer(); ?>
