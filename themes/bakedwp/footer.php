					<div class="<?php if( !is_home() ){echo'display:none;';}?> ">
						<iframe width="100%" height="300px" frameBorder="0" src="https://umap.openstreetmap.fr/fr/map/carte-du-pouvoir-dagir_63384?scaleControl=false&miniMap=false&scrollWheelZoom=false&zoomControl=true&allowEdit=false&moreControl=true&searchControl=null&tilelayersControl=null&embedControl=null&datalayersControl=true&onLoadPanel=undefined&captionBar=false"></iframe>
						<div class="row"><a href="https://umap.openstreetmap.fr/fr/map/carte-du-pouvoir-dagir_63384" target="_blank" class="small-center columns button">Ouvrir sur OpenStreetMap</a></div>
					</div>

					<div id="footer-widgets" class="row">
						<div id="inner-footer-widgers" class="large-10 medium-10 small-centered columns">
							<div class="row">
								 	<?php get_sidebar('sidebar1'); ?>
								 	<?php get_sidebar('sidebar2'); ?>
									<?php get_sidebar('sidebar3'); ?>
							</div>
						</div>
					</div>

					<footer class="footer row" role="contentinfo">
			        	<div class="large-10 medium-10 small-centered columns">
							<p class="source-org copyright"><?php echo get_theme_mod( 'footer_text', 'BakedWP Theme. Custom par <a href="http://lepoles.org">LePoleS Prod.</a>' ); ?></p>
						</div>
					</footer> <!-- end .footer -->
				</div> <!-- end #container -->
			</div> <!-- end .inner-wrap -->
		</div> <!-- end .off-canvas-wrap -->
		<?php wp_footer(); ?>
	</body>
</html> <!-- end page -->
