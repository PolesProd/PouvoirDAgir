<<<<<<< HEAD
<?php
echo 'stuff';
 if (have_posts()) : while (have_posts()) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/WebPage">
		<header class="page-header">
			<h1 class="page-title"><?php the_title(); ?></h1>
		</header> <!-- end article header -->
    <section class="entry-content" itemprop="articleBody">
	    <?php the_content(); ?>
	    <?php wp_link_pages(); ?>
		</section> <!-- end article section -->
		<?php comments_template(); ?>
=======
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/WebPage">

		<header class="page-header">
			<h1 class="page-title"><?php the_title(); ?></h1>
		</header> <!-- end article header -->

	    <section class="entry-content" itemprop="articleBody">
		    <?php //the_excerpt(); ?>
		    <?php //wp_link_pages(); ?>
		</section> <!-- end article section -->

		<?php //comments_template(); ?>

>>>>>>> e3c70a52925841d0d4fdc9d0a5b313eceab1b9d9
	</article> <!-- end article -->

<?php endwhile; endif; ?>
