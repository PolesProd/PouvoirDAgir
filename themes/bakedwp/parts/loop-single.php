<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

<!-- Auteur, date, caté -->
	<header class="article-header">
<!-- Titre -->
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			</h2>
		<?php get_template_part( 'parts/content', 'byline' ); ?>
    </header> <!-- end article header -->

<!-- Contenu de l'article -->
    <section class="entry-content" itemprop="articleBody">
		<div class="columns" style="background:#67B7CF;"><!-- height:350px; -->
		<p><?php the_post_thumbnail('full'); ?></p>
		</div>
		<?php the_content(); ?>
	</section> <!-- end article section -->

	<footer class="article-footer">
		<p class="tags">
			<?php the_tags('<span class="tags-title">' . __('Tags:', 'bakedwp') . '</span> ', ', ', ''); ?></p>
	</footer> <!-- end article footer -->

	<footer class="article-footer">
		<?php joints_related_posts(); ?>
	</footer> <!-- end article footer -->

<!-- Commentaire -->
	<?php comments_template(); ?>

</article> <!-- end article -->
