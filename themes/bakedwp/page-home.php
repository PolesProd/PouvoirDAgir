<?php
/*
Template Name: Accueil
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
							<div class="columns" style="background:#67B7CF;height:350px;">Expand!</div>
							<div class="row">
							  <div class="medium-6 large-4 columns" style="background:#05C3FB;height:200px;">12/6/4 columns</div>
							  <div class="medium-6 large-8 columns" style="background:#0388af;height:200px;">
									<?php
	                $args = array( 'post_type' => 'events', 'posts_per_page' => 1);
	                $loop = new WP_Query( $args );
	                while ( $loop->have_posts() ) : $loop->the_post();
	                  the_title();
										echo '<div class="row">';
										  echo '<div class="small-4 columns">';
												the_post_thumbnail();
											echo '</div>';
										  echo '<div class="columns">';
												the_excerpt();
											echo '</div>';
										echo '</div>';
	                endwhile;
						    	?>
							  </div>
							</div>
							<div class="large-12 medium-10 small-centrered columns" style="background:#002834;height:400px;">

							</div>
    				</div> <!-- end #main -->
				</div> <!-- end #inner-content -->
			</div> <!-- end #content -->
<?php get_footer(); ?>
