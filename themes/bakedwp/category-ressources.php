<?php
    /* Template Name: Category-ressources */
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
                $args = array( 'post_type' => 'ressources', 'posts_per_page' => 6 );
                $loop = new WP_Query( $args );
                while ( $loop->have_posts() ) : $loop->the_post();
                  the_title();
                  echo '<div class="entry-content">';
									echo '<div class="">';
										the_post_thumbnail();
									echo '</div>';
                    the_content();
										the_category();
                  echo '</div>';
                endwhile;
					    	?>
    				</div> <!-- end #main -->
				</div> <!-- end #inner-content -->
			</div> <!-- end #content -->
<?php get_footer(); ?>
