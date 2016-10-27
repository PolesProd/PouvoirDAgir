
<div class="Back-Black-Dark text-White"> <!-- class="fixed contain-to-grid" -->
	<nav class="top-bar" data-topbar data-options="scrolltop : false">
			<?php if( is_user_logged_in() ){
     			$current_user = wp_get_current_user();?>
					<ul id="topConnexion" class="medium-6 medium-offset-6 row text-center">
						<li class="colorBoxContours btn-box Back-Red-Dark medium-4 columns"><a href="#">Espace membre</a></li>
	    			<li id="" class="colorBoxContours btn-box Back-Red-Light menu-item menu-item-type-post_type menu-item-object-page medium-4 columns"><a href="/wp-admin/profile.php"><?php echo $current_user->user_login; ?></a></li>
						<li id="" class="colorBoxContours btn-box Back-Red-Dark menu-item menu-item-type-post_type menu-item-object-page medium-4 columns"><a href="<?php echo wp_logout_url(); ?>">Déconnexion</a></li><?php
			  } else {?>
					<ul id="topConnexion" class="medium-4 medium-offset-8 row text-center">
						<li class="colorBoxContours btn-box Back-Red-Dark medium-6 columns"><a href="#">Espace membre</a></li>
			      <li id="menu-item-178" class="colorBoxContours btn-box Back-Red-Light menu-item menu-item-type-post_type menu-item-object-page medium-6 columns"><a href="<?php echo get_site_url() . '/wp-login.php'; ?>">connexion</a></li><?php
			  }?>
		</ul>

		<section class="text-center align-middle row">
			<!-- partie concernant le log et le titre -->

				<!-- Title Area -->
				<div class="title-area medium-6 columns">
					<ul>
						<li class="name medium-4 columns">
							<h1 class="site-title"><a class="" href="<?php echo home_url(); ?>" rel="nofollow"><img class="thumbnail" src="<?=get_site_url().'/wp-content/uploads/2016/10/logo-gf.png'?>" alt="<?php bloginfo('name'); ?>"/></a></h1>
						</li>
						<li class="menu-text medium-8 columns text-left">
							<h3 class="text-White site-title"><?php bloginfo('description'); ?></h3>
						</li>
					</ul>
				</div>
				<div class="show-for-small-only toggle-topbar menu-icon end">
					<a href="#"><span>Menu</span></a>
				</div>
				<div class="Back-Red-Light btn-box colorBoxContours medium-2 columns">
					<a href="*">Newsletter</a>
				</div>
				<ul id="social-box" class="Back-Red-Dark colorBoxContours medium-2 columns title-area">
					<li><a href="https://www.facebook.com/pouvoirdagir/?fref=ts" target="_blank">Facebook</a></li>
					<li><a href="https://twitter.com/collectif_pa" target="_blank">Twitter</a></li>
				</ul>
				<div class="Back-Red-Light btn-box colorBoxContours medium-2 columns">
					<button><i class="fi-magnifying-glass large"></i></button>
					<?php get_search_form();?>
				</div>
		</section>
		<section class="top-bar-section">
			<?php joints_top_nav(); ?>
		</section>
	</nav>
</div>
