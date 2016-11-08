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

							<!-- CAROUSSEL -->
							<div class=""><!-- height:350px; -->
								<?php include get_template_directory().'/parts/include_caroussel.php'; ?>
							</div>

							<!-- RESSOURCES -->
							<div>
							  <div id="encartRessource" class="Back-Purple-Light ext-center small-12 medium-6 large-7 columns">
									<h3>ressources</h3>
									<div class="small-4 columns">
										<div class="btn-box ressources-box">
											<img src="<?php echo site_url() ?>/wp-content/themes/bakedwp/assets/images/pyctos/analyse-purple.png" alt="" />
											<!-- <h5>Analyses</h5> -->
											<!-- <p><i class="fi-heart icon-size-small"></i></p> -->
										</div>
									</div>
									<div class="small-4 columns">
										<div class="btn-box ressources-box">
											<img src="<?php echo site_url() ?>/wp-content/themes/bakedwp/assets/images/pyctos/methodologie-purple.png" alt="" />
											<!-- <p><i class="fi-guide-dog icon-size-small"></i></p> -->
										</div>
									</div>
									<div class="small-4 columns">
										<div class="btn-box ressources-box">
											<img src="<?php echo site_url() ?>/wp-content/themes/bakedwp/assets/images/pyctos/temoignage-purple.png" alt="" />

											<!-- <p><i class="fi-social-myspace icon-size-small"></i></p> -->
										</div>
									</div>
									<div class="small-offset-2 small-4 columns margin-top-17px ">
										<div class="btn-box ressources-box">
											<img src="<?php echo site_url() ?>/wp-content/themes/bakedwp/assets/images/pyctos/glossaire-purple.png" alt="" />

											<!-- <p><i class="fi-book icon-size-small"></i></p> -->
										</div>
									</div>
									<div class="small-4 columns end margin-top-17px ">
										<div class="btn-box ressources-box">
											<img src="<?php echo site_url() ?>/wp-content/themes/bakedwp/assets/images/pyctos/galerie-purple.png" alt="" />

											<!-- <p><i class="fi-photo icon-size-small"></i></p> -->
										</div>
									</div>
								</div>

							  <div class="small-12 medium-6 large-5 columns">
									<?php include get_template_directory().'/parts/calendar-links.php';
									?>
							  </div>
							</div>

							<!-- CARTE -->
							<div> <!--style="<?php //if( !is_home() ){echo'display:none;';}?> -->
								<iframe width="100%" height="730px" frameBorder="0" src="https://umap.openstreetmap.fr/fr/map/carte-du-pouvoir-dagir_63384?scaleControl=false&miniMap=false&scrollWheelZoom=false&zoomControl=true&allowEdit=false&moreControl=true&searchControl=null&tilelayersControl=null&embedControl=null&datalayersControl=true&onLoadPanel=undefined&captionBar=false#7/47.964/2.834"></iframe>
							</div>
    				</div> <!-- end #main -->
				</div> <!-- end #inner-content -->
			</div> <!-- end #content -->
<?php get_footer(); ?>
