<!doctype html>

  <html class="no-js"  <?php language_attributes(); ?>>

	<head>
		<meta charset="utf-8">

		<!-- Force IE to use the latest rendering engine available -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <!-- <link rel="stylesheet" href="assets/typo/foundation-icons/foundation-icons.css"> -->

		<?php wp_head(); ?>

	</head>
<!-- $class = 'Back-White-Light' -->
	<body <?php body_class(); ?> >
		<div class="off-canvas-wrap" data-offcanvas>
			<div class="inner-wrap">
				<div id="container">
					<header id="Wrap-Header"class="header" role="banner">
						 <?php get_template_part( 'parts/nav', 'top-topbar' ); ?>
					</header> <!-- end .header -->
