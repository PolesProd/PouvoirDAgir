<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

	<header class="article-header">
		<?php get_template_part( 'parts/content', 'byline' ); ?>
    </header> <!-- end article header -->

    <section class="entry-content" itemprop="articleBody">
		<p><?php the_post_thumbnail('full'); ?></p>
		<?php the_content(); ?>
		</section> <!-- end article section -->
		<aside><footer class="article-footer">
			<?php joints_related_posts(); ?>
		</footer> <!-- end article footer --></aside>

	<footer class="article-footer">
	</footer> <!-- end article footer -->

	<?php comments_template(); ?>

</article> <!-- end article -->
