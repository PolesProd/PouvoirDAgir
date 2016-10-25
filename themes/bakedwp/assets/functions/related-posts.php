<?php
// Related Posts Function, matches posts by tags - call using joints_related_posts(); )
function joints_related_posts() {
	global $post;
	$tags = wp_get_post_tags( $post->ID );
	if($tags) {
		foreach( $tags as $tag ) {
			$tag_arr = '';
		}
		$args = array(
			'tag' => $tag_arr,
			'numberposts' => 3, /* you can change this to show more */
			'post__not_in' => array($post->ID)
		);
		$related_posts = get_posts( $args );
		if($related_posts) {
		echo '<h4>Articles récent</h4>';
		echo '<div id="joints-related-posts" style="display:inline-block;">';
			foreach ( $related_posts as $post ) : setup_postdata( $post ); ?>

	    <div class="row">
          	<div class="large-4 columns">
            	<div class="primary callout">
              		<div class="row">

              		    <!-- Titre -->
          				<div class="large-6 medium-6 columns">
            				<div class="primary callout related__title">
              					<a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
            				</div>
          				</div>

          				<!-- Image -->
          				<div class="large-6 medium-6 columns related__colonne--image">
            				<div class="primary callout related__image">
             					<?php
                            		if(has_post_thumbnail()){
                        		?>
                        			<div class="imgArticle" id="<?php echo 'post_thumbsnails-'. get_post_thumbnail_id(); ?>" style="font-family: 'Ruda', sans-serif;background-image:url('<?php if ( has_post_thumbnail() ) { echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) );} ;?>');width:100%;height:200px;background-size:cover;background-position: center;background-repeat: no-repeat;">
                            		</div><!-- Fin de la div imgArticle -->
                        		<?php
                           			}                             
                           			else{
                        		?>
                            		<div class="imgArticle" style="font-family: 'Ruda', sans-serif;background-image:url('http://suplugins.com/podium/images/placeholder-02.jpg');width:100%;height:200px;background-size:cover;background-position: center;background-repeat: no-repeat;">
                           			</div><!-- Fin de la div imgArticle -->
                        		<?php
                        			}                              
                        		?>
            				</div>
        				</div>

        				<!-- Légende -->
          				<div class="large-6 medium-6 columns related__colonne--legende">
            				<div class="primary callout">
            					<ul>
                    				<li>Posté le <?php the_time('j F, Y') ?></li>				
									<li>Par <?php the_author_posts_link(); ?></li>
									<li>Dans <?php the_category(', ') ?></li>
								</ul>
            				</div>            
        				</div>

        				<!-- Texte -->
        				<div class="large-12 columns">
            				<div class="primary callout">
            					<?php the_excerpt();?>
           					</div>
          				</div>	
        			</div>
    			</div>
			</div>		
			<?php endforeach; }
			}			
	wp_reset_postdata();
	echo '</div';
} /* end joints related posts function */
?>