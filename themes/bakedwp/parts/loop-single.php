<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

<!-- Header -->
	<header class="article-header">
	<!-- Catégorie -->
			<h2 class="article--cat">
			<?php the_category(', ') ?>
			</h2>

    </header> <!-- end article header -->

<!-- Contenu de l'article -->
    <section class="entry-content" itemprop="articleBody">
    	<div class="row">
			<div class="columns">

	<!-- Image, Vidéo à la une-->
		<?php
            if(has_post_thumbnail()){
        ?>
        	<div class="imgArticle" id="<?php echo 'post_thumbsnails-'. get_post_thumbnail_id(); ?>" style="font-family: 'Ruda', sans-serif;background-image:url('<?php if ( has_post_thumbnail() ) { echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) );} ;?>');width:100%;height:300px;background-size:cover;background-position: center;background-repeat: no-repeat;">
            </div><!-- Fin de la div imgArticle -->
        <?php
            }
            else{
        ?>
            <div class="imgArticle" style="font-family: 'Ruda', sans-serif;background-image:url('http://suplugins.com/podium/images/placeholder-02.jpg');width:100%;height:300px;background-size:cover;background-position: center;background-repeat: no-repeat;">
            </div><!-- Fin de la div imgArticle -->
       <?php
            }
        ?>

			<!-- Légende -->
				<ul class="image_entete--legende">
					<li><?php echo do_shortcode('[ssba]'); ?></li>
					<li>Posté le <?php the_time('j F, Y') ?></li>
					<li>à <?php the_time('H:i') ?></li>
					<li>Par <?php the_author_posts_link(); ?></li>
					<li>Dans <?php the_category(', ') ?></li>
					<li><?php the_tags('<span class="tags-title">' . __('Tags:', 'bakedwp') . '</span> ', ', ', ''); ?></li>
				</ul>
			</div>
		</div>

	<!-- Titre -->
		<h2 class="article-title">
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
		</h2>

	<!-- Chapeau Article -->
		<p class="article-chapeau"><?=implode(get_post_meta(get_the_ID(), 'post_chapeau'))?></p>

	<!-- Contenu Article -->
		<?php the_content(); ?>
	</section> <!-- end article section -->

    <!-- TAG
	<footer class="article-footer">
		<p class="tags">
			<?php/* the_tags('<span class="tags-title">' . __('Tags:', 'bakedwp') . '</span> ', ', ', ''); */?></p>
	</footer> --><!-- end article footer -->

	<!-- Article récent -->
	<footer class="article-footer">
		<?php joints_related_posts(); ?>

	</footer>
	<!-- end article footer -->
	<!-- Commentaire -->
	<div class="expanded row">
		<?php comments_template(); ?>
	</div>


</article> <!-- end article -->
