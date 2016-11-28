<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/WebPage">
		<header class="page-header">
			<h1 class="page-title"><?php the_title(); ?></h1>
		</header> <!-- end article header -->

	    <section class="entry-content" itemprop="articleBody">
		    <?php //the_excerpt(); ?>
		    <?php //wp_link_pages(); ?>
		     query_posts('cat=29'); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
   <?php the_title(); ?>
<?php endwhile; endif; ?>
<?php wp_reset_query(); ?>
		</section> <!-- end article section -->

		<?php //comments_template(); ?>

	</article> <!-- end article -->

<?php endwhile; endif; ?>
