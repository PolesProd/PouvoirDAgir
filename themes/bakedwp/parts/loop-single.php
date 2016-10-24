<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

	<header class="article-header">
		<?php get_template_part( 'parts/content', 'byline' ); ?>
    </header> <!-- end article header -->

    <section class="entry-content" itemprop="articleBody">
		<p><?php the_post_thumbnail('full'); ?></p>
		<?php the_content(); ?>
<<<<<<< HEAD
	</section> <!-- end article section -->

	<footer class="article-footer">
		<p class="tags">
			<?php the_tags('<span class="tags-title">' . __('Tags:', 'bakedwp') . '</span> ', ', ', ''); ?></p>
	</footer> <!-- end article footer -->

	<footer class="article-footer">
		<?php joints_related_posts(); ?>
	</footer> <!-- end article footer -->

=======
		</section> <!-- end article section -->
		<aside><footer class="article-footer">
			<?php joints_related_posts(); ?>
		</footer> <!-- end article footer --></aside>

	<footer class="article-footer">
	</footer> <!-- end article footer -->

>>>>>>> e3c70a52925841d0d4fdc9d0a5b313eceab1b9d9
	<?php comments_template(); ?>

</article> <!-- end article -->
