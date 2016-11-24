<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="row">

				    <div id="main" class="large-10 medium-10 small-centered columns" role="main">
	        					<?php
	          						$args = array( 'post_type' => 'post', 'posts_per_page' => -1,'orderby' => 'date' );
	            					$loopy = new WP_Query( $args );
	             					?>
						  <?php
						   if($loopy->have_posts()){
              				while ( $loopy->have_posts() ) {
                  			$loopy->the_post();
                  			$id = get_the_ID();
				            $author = get_the_author();
				            $my_date = get_the_date( 'd/m/Y' );?>
						  <div class="ressource grid-item events large-5 medium-5 " data-category="transtition" >
				           
	            		
	              		<div class="dateArt">
	                		<?php echo '<div class="positionDate">'.$my_date.'</div>'; ?>
	                		<?php echo '<div class="auteurArt"><a href="'.get_author_posts_url( get_the_author_meta( "ID" ), get_the_author_meta( "user_nicename" ) ).'">'.$author.'</a></div>'; ?>
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
	              		</div>
	              		<?php
	              		  }
            			}
            			else{
              				echo 'Sorry no post matched';
            			}?>
				 </div> <!-- end #main -->

			</div> <!-- end #inner-content -->
			</div>
<?php get_footer(); ?>
