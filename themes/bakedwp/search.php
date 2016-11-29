<?php get_header(); ?>
			
			<div id="content">

				<div id="inner-content" class="row">
			
					<div id="main" class="large-12 medium-12 columns first" role="main">
						<header class="page-header">
							<h1 class="archive-title text-center"><span><?php _e('Search Results for:', 'bakedwp'); ?></span> <?php echo esc_attr(get_search_query()); ?></h1>
						</header>
						<?php
						
						$post_type = array('post','events','partenaires','analyse','methodologie','temoignage','glossary');
						$args = array(
							'post_type'=>$post_type,
							's' => $_GET['s'],
							'post_per_page'=>-1,
							);						
						$query = new WP_Query($args);
						if($query->have_posts()){
                			while ($query->have_posts() ) : $query->the_post();
			                    $id = get_the_ID();
			                    $author = get_the_author();
			                    $my_date = get_the_date( 'd/m/Y' );
            			?>
            					<div class="ressource grid-item events small-3 columns">
					                <div class="dateArt">
					                    <?php echo '<div class="positionDate">'.$my_date.'</div>'; ?>
					                    <?php echo '<div class="auteurArt"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ).'">'.get_the_author_link().'</a></div>'; ?>
					                </div>
					                <div class="titreArt">
					                    <a href="<?php the_permalink();?>" class="titreArt"><?php the_title(); ?></a>
					                </div>
					               <div class="tagArt">
				          				<ul>
				            				<?php the_tags( '<ul><li>', '</li><li>', '</li></ul>' ); ?>
				          				</ul>
				        			</div>
					                  <div class="shareImg">
					                      <p><a href="">  <img src="<?php echo site_url() ?>/wp-content/themes/bakedwp/assets/images/pyctos/newsletter-black.png" alt="" /></a></p>
					                      <p><a href=""><img src="<?php echo site_url() ?>/wp-content/themes/bakedwp/assets/images/pyctos/facebook-black.png" alt="" /></a></p>
					                      <p><a href=""><img src="<?php echo site_url() ?>/wp-content/themes/bakedwp/assets/images/pyctos/twitter-grey.png" alt="" /></a></p>
					                  </div>
            					</div><!-- Fin de la div singleArticle -->
            				<?php endwhile;
        				}else{
            				echo 'no post with your criteria';
        				}
    					wp_reset_query();?>
						
			
				    </div> <!-- end #main -->
    			    			
    			</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>

