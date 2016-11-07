
<div class=""> <!-- class="fixed contain-to-grid" -->
	<nav class="top-bar" data-topbar data-options="scrolltop : false">
			<?php if( is_user_logged_in() ){
     			$current_user = wp_get_current_user();?>
					<ul id="topConnexion" class="medium-3 medium-offset-9 row text-center">
						<li class="text-White btn-box Back-Black-Dark medium-6 columns"><a href="#">Espace membre</a></li>
	    			<li id="profil" class="btn-box Back-White-Mid menu-item menu-item-type-post_type menu-item-object-page medium-3 columns"><a class="text-Red-Light" href="/wp-admin/profile.php"><?php echo $current_user->user_login; ?></a></li>
						<li id="" class="text-White btn-box Back-Black-Dark menu-item menu-item-type-post_type menu-item-object-page medium-3 columns"><a href="<?php echo wp_logout_url(); ?>">Déconnexion</a></li><?php
			  } else {?>
					<ul id="topConnexion" class="medium-3 medium-offset-9 row text-center">
						<li class="text-White btn-box Back-Black-Dark medium-6 columns"><a href="#">Espace membre</a></li>
			      <li id="menu-item-178" class="text-White btn-box Back-Black-Dark menu-item menu-item-type-post_type menu-item-object-page medium-6 columns"><a href="<?php echo get_site_url() . '/wp-login.php'; ?>">connexion</a></li><?php
			  }?>
		</ul>

		<section class="text-center align-middle row">
			<!-- partie concernant le log et le titre -->

				<!-- Title Area -->
				<div class="title-area medium-6 columns">
					<ul>
						<li class="name medium-4 columns">
							<h1 class="site-title"><a href="<?php echo home_url(); ?>" rel="nofollow"><img class="thumbnail" src="<?=get_site_url().'/wp-content/uploads/2016/10/logo-gf-vectorisé.png'?>" alt="<?php bloginfo('name'); ?>"/></a></h1>
						</li>
						<li class="menu-text medium-8 columns text-left">
							<h3 class="text-purple-Dark site-title"><?php bloginfo('description'); ?></h3>
						</li>
					</ul>
				</div>
				<div class="show-for-small-only toggle-topbar menu-icon end">
					<a href="#"><span>Menu</span></a>
				</div>
				<div class="text-White small-offset-3 Back-Black-Dark btn-box medium-1 columns">
					<a href="*">Newsletter</a>
				</div>
				<ul id="social-box" class="text-White Back-Purple-Light text-Red-Light medium-1 columns title-area">
					<li><a href="https://www.facebook.com/pouvoirdagir/?fref=ts" target="_blank">Facebook</a></li>
					<li><a href="https://twitter.com/collectif_pa" target="_blank">Twitter</a></li>
				</ul>
				<div class="Back-White-Mid btn-box medium-1 columns">
					<button><i class="text-Red-Light fi-magnifying-glass large"></i></button>
					<?php get_search_form();?>
				</div>
		</section>
		<section class="text-White top-bar-section">
			<?php joints_top_nav(); ?>
		</section>
	</nav>
</div>
