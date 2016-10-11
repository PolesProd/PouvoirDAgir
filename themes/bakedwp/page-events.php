<?php
/*
Template Name: Événements
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
				    <div id="main" class="large-12 medium-10 small-centered columns" role="main">
							<div class="columns">
								<div class="row">
								  <div class="small-6 columns">
										<?php the_title('<h3>','</h3>'); ?>
										<?php
		                $args = array( 'post_type'=>'events','category_name'=>'Actions','posts_per_page'=> 10);
		                $loop = new WP_Query( $args );
		                while ( $loop->have_posts() ) : $loop->the_post();
		                  the_title();
		                  echo '<div class="entry-content">';
											echo '<div class="">';
												the_post_thumbnail();
											echo '</div>';
		                    the_content();
		                  echo '</div>';
		                endwhile;
							    	?>
									</div>
								  <div class="small-6 columns">
										<?php the_title('<h3>','</h3>'); ?>
										<?php
										$args = array( 'post_type'=>'events','category_name'=>'Communiqués','posts_per_page'=> 10);
		                $loop = new WP_Query( $args );
		                while ( $loop->have_posts() ) : $loop->the_post();
		                  the_title();
		                  echo '<div class="entry-content">';
											echo '<div class="">';
												the_post_thumbnail();
											echo '</div>';
		                    the_content();
		                  echo '</div>';
		                endwhile;
										?>
									</div>
								</div>
							</div>
    				</div> <!-- end #main -->
				</div> <!-- end #inner-content -->
			</div> <!-- end #content -->
<?php get_footer(); ?>
