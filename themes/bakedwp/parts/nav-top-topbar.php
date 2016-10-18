<div class="contain-to-grid"> /*Class = fixed*/
	<nav class="top-bar" data-topbar data-options="scrolltop : false">

			<!-- Espace Collaboratif -->
			<ul class="row text-center">
				<li class="medium-6 columns"><a href="#">espace collaboratif</a></li>
				<?php if( is_user_logged_in() ){
		      $current_user = wp_get_current_user();?>
		      <li class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-4 current_page_item medium-3 columns"><a href="/wp-admin/profile.php"><?php echo $current_user->user_login; ?></a></li><li class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-4 current_page_item medium-3 columns"><a href="<?php echo wp_logout_url(); ?>">Déconnexion</a></li><?php
		  	} else {
		      ?><li class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-4 current_page_item medium-6 columns"><a href="/wp-admin/profile.php"><a href="/wp-login.php">connexion</a></li><?php
			  }
				?>
		</ul>
		<ul class="title-area">
			<!-- Title Area -->
			<li class="name">
				<h1 class="site-title"> <a href="<?php echo home_url(); ?>" rel="nofollow"><?php bloginfo('name'); ?></a></h1>
			</li>
			<li>
				<h3 class="menu-text"><?php bloginfo('description'); ?></h3>
			</li>
			<li class="toggle-topbar menu-icon">
				<a href="#"><span>Menu</span></a>
			</li>
		</ul>
		<section class="top-bar-section row medium-12 columns">
			<?php joints_top_nav(); ?>
		</section>
	</nav>
</div>
