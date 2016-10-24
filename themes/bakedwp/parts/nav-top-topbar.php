
<div class=""> <!-- class="fixed contain-to-grid" -->
	<nav class="top-bar" data-topbar data-options="scrolltop : false">
			<?php if( is_user_logged_in() ){
     			$current_user = wp_get_current_user();?>
					<ul class="medium-4 medium-offset-8 row text-center">
						<li class="medium-4 columns"><a href="#">Espace collaboratif</a></li>
	    			<li id="" class="menu-item menu-item-type-post_type menu-item-object-page medium-4 columns"><a href="/wp-admin/profile.php"><?php echo $current_user->user_login; ?></a></li>
						<li id="" class="menu-item menu-item-type-post_type menu-item-object-page medium-4 columns"><a href="<?php echo wp_logout_url(); ?>">Déconnexion</a></li><?php
			  } else {?>
					<ul class="medium-2 medium-offset-10 row text-center">
						<li class="medium-6 columns"><a href="#">Espace collaboratif</a></li>
			      <li id="menu-item-178" class="menu-item menu-item-type-post_type menu-item-object-page medium-6 columns"><a href="<?php echo get_site_url() . '/wp-login.php'; ?>">connexion</a></li><?php
			  }?>
		</ul>

		<section class="expanded row align-top text-center">
			<!-- partie concernant le log et le titre -->
			<ul class="title-area medium-6 columns">
				<!-- Title Area -->
				<li class="name">
					<h1 class="site-title"> <a href="<?php echo home_url(); ?>" rel="nofollow"><img src="" alt="<?php bloginfo('name'); ?>"/></a></h1>
				</li>
				<li class="menu-text">
					<h3 class="site-title"><?php bloginfo('description'); ?></h3>
				</li>
				<li class="toggle-topbar menu-icon">
					<a href="#"><span>Menu</span></a>
				</li>
			</ul>
			<ul class="medium-4 columns title-area">
				<li><a href="<?php echo esc_url(home_url()); ?>/?page_id=5">contact</a></li>
				<li><a href="https://www.facebook.com/pouvoirdagir/?fref=ts" target="_blank">Facebook</a></li>
				<li><a href="https://twitter.com/collectif_pa" target="_blank">Twitter</a></li>
				<li><a href="*">Newsletter</a></li>
			</ul>
			<div class="medium-2 columns">
				<button><i class="fi-magnifying-glass large"></i></button>
				<?php get_search_form();?>
			</div>
		</section>
		<section class="top-bar-section">
			<?php joints_top_nav(); ?>
		</section>
	</nav>
</div>
