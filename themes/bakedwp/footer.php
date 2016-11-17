
<footer class="footer" role="contentinfo">
	<div class="large-12 footershare">
		<div class="small-offset-2 small-4 columns">
			<div class="box-height btn-box box-height Back-Black-Light">
				<a href="#"><h5>Newsletter</h5></a>
				<!-- <p><i class="fi-social-myspace icon-size-small"></i></p> -->
				<?php  echo do_shortcode("[mc4wp_form id='s291']"); ?>
			</div>
		</div>
		<div class="small-1 columns box-height">
			<ul id="social-box-02" class="box-height btn-box text-White Back-Purple-Light text-Red-Light title-area">
				<li><a href="https://www.facebook.com/pouvoirdagir/?fref=ts" target="_blank"><span style="background-image:url('<?php echo site_url() ?>/wp-content/themes/bakedwp/assets/images/pyctos/facebook-white.png');"></span></a></li>
				<li><a href="https://twitter.com/collectif_pa" target="_blank"><span style="background-image:url('<?php echo site_url() ?>/wp-content/themes/bakedwp/assets/images/pyctos/twitter-white.png');"></span></a></li>
			</ul>
		</div>
		<div class="padding-stuff Back-Red-Light small-2 columns end adhererFooter">
			<div class="box-height margin-stuff colorBoxContours">
				<a href="#"><h5>Adherer</h5></a>
				<!-- <p><i class="fi-social-myspace icon-size-small"></i></p> -->
			</div>
		</div>
	</div>
	<div id="footer-widgets" >
		<div id="inner-footer-widgers" class="large-10 medium-10 small-centered columns">
				<?php get_sidebar('sidebar1'); ?>
				<?php get_sidebar('sidebar2'); ?>
				<?php get_sidebar('sidebar3'); ?>
		</div>
	</div>
	<div class="large-12 medium-12 ">
		<ul class="planSite">
		<li>mentions légales</li>
		<li>cookies</li>
		<li>plan du site</li>
		<li>contact</li>
		<li>adresse</li>
		<li>tel</li>
		</ul>
		
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