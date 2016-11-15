					<footer class="footer" role="contentinfo">
						<div class="Back-Red-Light small-12 comlomns text-center">
							<div class="small-4 columns">
								<div class="btn-box box-height Back-Black-Light">
									<a href="#"><h5>Newsletter</h5></a>
									<!-- <p><i class="fi-social-myspace icon-size-small"></i></p> -->
								</div>
								</div>
							<div class="small-4 columns">
								<ul id="social-box" class="box-height Back-Purple-Light medium-1 columns title-area">
									<li style="background-image:url('<?php echo site_url() ?>/wp-content/themes/bakedwp/assets/images/pyctos/twitter-white.png');"><a class="box-height" href="https://www.facebook.com/pouvoirdagir/?fref=ts" target="_blank"></a></li>
									<li style="background-image:url('<?php echo site_url() ?>/wp-content/themes/bakedwp/assets/images/pyctos/twitter-white.png');"><a class="box-height" href="https://twitter.com/collectif_pa" target="_blank"></a></li>
								</ul>
							</div>
							<div class="Back-Red-Light small-4 columns">
								<div class="btn-box colorBoxContours ">
									<a href="#"><h5>Adherer</h5></a>
									<!-- <p><i class="fi-social-myspace icon-size-small"></i></p> -->
								</div>
							</div>
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
	        	<div class="large-10 medium-10 small-centered columns">
							<p class="source-org copyright"><?php echo get_theme_mod( 'footer_text', 'BakedWP Theme. Custom by <a href="http://lepoles.org">LePoleS Prod.</a>' ); ?></p>
						</div>
					</footer> <!-- end .footer -->
				</div> <!-- end #container -->
			</div> <!-- end .inner-wrap -->
		</div> <!-- end .off-canvas-wrap -->
		<?php wp_footer(); ?>
	</body>
</html> <!-- end page -->
