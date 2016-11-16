<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

<!-- Header -->
	<header class="article-header">
	<!-- Catégorie -->
			<h2 class="article--cat">
			<?php the_category(', ') ?>
			</h2>

    </header> <!-- end article header -->
<?php if($post->post_type === 'events'){?>
<!-- Contenu de l'article -->
    <section class="entry-content" itemprop="articleBody">
    	<div class="row">
			<div class="columns">

	<!-- Image, Vidéo à la une-->
		<?php
		$taxo = $post->post_type;
		$args = array( 'post_type' => $taxo,'posts_per_page' => 9);
		$id = get_the_ID();
        $author = get_the_author();
        $terms = wp_get_post_terms( $id, $taxo , $args );
        $my_date = get_the_date( 'l j F  Y' );
        $myterms = get_terms($taxo, array( 'parent' => 0, 'hide_empty' => 0 ) );
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
					<li>Dans <?php echo '<strong>'.$terms[0]->slug.'</strong> / <strong>'.$myterms[0]->taxonomy.'</strong>'; ?></li>
					<li><?php the_tags('<span class="tags-title">' . __('Tags:', 'bakedwp') . '</span> ', ', ', ''); ?></li>
				</ul>
			</div>
		</div>

	<!-- Titre -->
		<h2 class="article-title">
			<?php the_title(); ?>
		</h2>

	<!-- Chapeau Article -->
		<p class="article-chapeau"><?=implode(get_post_meta(get_the_ID(), $taxo.'_chapeau'))?></p>
		<div class="">
								<?php
									// date
									// See if event is single day or multiple day
									if( !strlen( get_post_meta( get_the_ID(), 'wpsc_end_date', true ) ) ) {
										// single day event
										$date = date_i18n( get_option('date_format'), strtotime( get_post_meta( get_the_ID(), 'wpsc_start_date', true ) ) );
										// echo date_i18n(get_option('date_format') ,strtotime("11/15-1976"));?
									} else {
										// multi day event
										$date = date_i18n( get_option('date_format'), strtotime( get_post_meta( get_the_ID(), 'wpsc_start_date', true ) ) );
										$date .= ' - ';
										$date .= date_i18n( get_option('date_format'), strtotime( get_post_meta( get_the_ID(), 'wpsc_end_date', true ) ) );
									}
									// time
									// see if there's a time
									if( strlen( get_post_meta( get_the_ID(), 'wpsc_start_time', true ) ) ) {
										$time = '<br />' . date( 'G:i', strtotime( get_post_meta( get_the_ID(), 'wpsc_start_time', true ) ) );
									}
									// see if there's a time
									if( strlen( get_post_meta( get_the_ID(), 'wpsc_end_time', true ) ) ) {
										$time .= ' - ' . get_post_meta( get_the_ID(), 'wpsc_end_time', true );
									}
									// see if there is a registration URL
									if( strlen( get_post_meta( get_the_ID(), 'wpsc_url', true ) ) ) {
										$rsvp = '<br />';
										// see if there is reg text
										if( !strlen( get_post_meta( get_the_ID(), 'wpsc_reg_text', true ) ) ) {
											$rsvp .= '<a href="'. get_post_meta( get_the_ID(), 'wpsc_url', true ) .'" target="_blank">Click Here</a>';
										} else {
											$rsvp .= '<a href="'. get_post_meta( get_the_ID(), 'wpsc_url', true ) .'" target="_blank">' . get_post_meta( get_the_ID(), 'wpsc_reg_text', true ) . '</a>';
										}
									}

									echo '<p><strong>' . $date . '</strong>';
									if( isset( $time ) )
										echo $time;

									if( isset( $rsvp ) )
										echo $rsvp;
									echo '</p>';

									echo $date;
									echo "<br/>";
									if( isset( $time ) )
										echo $time;
								?>
								</p>
							</div><!-- Fin de la div metaArticle -->
	<!-- Contenu Article -->
		<?php the_content(); ?>
	</section> <!-- end article section -->
<?php }?>
<?php if($post->post_type !== 'events'){?>
<!-- Contenu de l'article -->
    <section class="entry-content" itemprop="articleBody">
    	<div class="row">
			<div class="columns">

	<!-- Image, Vidéo à la une-->
		<?php
		$taxo = $post->post_type;
		$args = array( 'post_type' => $taxo,'posts_per_page' => 9);
		$id = get_the_ID();
        $author = get_the_author();
        $terms = wp_get_post_terms( $id, $taxo , $args );
        $my_date = get_the_date( 'l j F  Y' );
        $myterms = get_terms($taxo, array( 'parent' => 0, 'hide_empty' => 0 ) );
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
					<li>Dans <?php echo '<strong>'.$terms[0]->slug.'</strong> / <strong>'.$myterms[0]->taxonomy.'</strong>'; ?></li>
					<li><?php the_tags('<span class="tags-title">' . __('Tags:', 'bakedwp') . '</span> ', ', ', ''); ?></li>
				</ul>
			</div>
		</div>

	<!-- Titre -->
		<h2 class="article-title">
			<?php the_title(); ?>
		</h2>

	<!-- Chapeau Article -->
		<p class="article-chapeau"><?=implode(get_post_meta(get_the_ID(), $taxo.'_chapeau'))?></p>

	<!-- Contenu Article -->
		<?php the_content(); ?>
	</section> <!-- end article section -->
<?php }?>
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
