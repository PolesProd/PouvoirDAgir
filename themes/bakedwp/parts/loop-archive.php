<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article">
		<header class="article-header">
			<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			</h2>
			<?php get_template_part( 'parts/content', 'byline' ); ?>
		</header> <!-- end article header -->

		<section class="entry-content" itemprop="articleBody">
			<p><a href="<?php the_permalink() ?>"><?php the_post_thumbnail('full'); ?></a></p>
			<p><?php the_excerpt();?></p>
			<?php //the_content('<button class="tiny">' .__( 'Read more...', 'bakedwp') .'</button>');
				// Si vous avez besoin d'accéder à $post->ID par exemple
        global $post;

        get_template_part('article');

       	// OU
      	include(locate_template('article.php'));
      	// si vous avez besoin d'accéder aux variables dans le template
			?>
		</section> <!-- end article section -->

	</article> <!-- end article -->

<?php endwhile; ?>

<?php joints_page_navi(); ?>

<?php else : ?>
	<?php get_template_part( 'parts/content', 'missing' ); ?>
<?php endif; ?>
