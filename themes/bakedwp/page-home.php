<?php
/*
Template Name: Accueil
*/
?>

<?php get_header(); ?>
			<!-- <div class="hero">
				<div class="row">
					<div class="large-12 columns">
						<h1><?php the_title(); ?></h1>
					</div>
				</div>
			</div> -->

			<div id="content">
				<div id="inner-content" class="">
				    <div id="main" class="small-centered" role="main">
							<div class="" style="background:#67B7CF;"><!-- height:350px; -->
								<?php include get_template_directory().'/parts/include_caroussel.php'; ?>
							</div>
							<!-- RESSOURCES -->
							<div>
							  <div class="text-center small-12 medium-6 large-8 columns">
									<h3>ressources</h3>
									<dl class="small-4 columns">
										<dt>Analyses</dt>
										<dd><i class="fi-heart icon-size-small"></i></dd>
									</dl>
									<dl class="small-4 columns">
										<dt>Methodologie</dt>
										<dd><i class="fi-guide-dog icon-size-small"></i></dd>
									</dl>
									<dl class="small-4 columns">
										<dt>Temoignages</dt>
										<dd><i class="fi-social-myspace icon-size-small"></i></dd>
									</dl>
									<dl class="small-6 columns ">
										<dt>Glossaire</dt>
										<dd><i class="fi-book icon-size-small"></i></dd>
									</dl>
									<dl class="small-6 columns end">
										<dt>Galeries</dt>
										<dd><i class="fi-photo icon-size-small"></i></dd>
									</dl>
								</div>

							  <div class="small-12 medium-6 large-4 columns" style="background:#0388af;height:100%;">
									<?php
	                $args = array( 'post_type' => 'events', 'posts_per_page' => 1);
	                $loop = new WP_Query( $args );
	                while ( $loop->have_posts() ) : $loop->the_post();
	                  the_title();?>
										<div class="row">
										  <div class="small-4 columns">
												<?php the_post_thumbnail(); ?>
											</div>
										  <div class="columns">
												<?php the_excerpt();?>
											</div>
										</div>
            			<?php endwhile; ?>
						  	</div>
							</div>
    				</div> <!-- end #main -->
				</div> <!-- end #inner-content -->
			</div> <!-- end #content -->
<?php get_footer(); ?>
