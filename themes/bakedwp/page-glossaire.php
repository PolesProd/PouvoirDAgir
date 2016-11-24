<?php
/*
Template Name: Glossaire
*/
?>

<?php get_header(); ?>

  <div id="content">


     <div id="inner-content" class="row">
        <div id="main" class="large-12 medium-12 small-centered columns" role="main">
        	<?php
        		$args = array(
        			'post_type'=> 'glossary',
        			'post_per_page' => -1
        			);

        		$queryGlossary = new WP_Query( $args );
  				if($queryGlossary->have_posts()){
   					while ($queryGlossary->have_posts() ) {
   						echo '<div class="events large-3">'.
   						//$id = get_the_ID();
                    	//$author = get_the_author();
                    	 
        				$queryGlossary->the_post();?>
        				<div class="dateArt">
                    		<?php echo '<div class="positionDate">'.get_the_date( 'd/m/Y' ).'</div>'; ?>
                    		<?php echo '<div class="auteurArt"><a href="'.get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ).'">'.get_the_author_link().'</a></div>'; ?>
                  		</div>
                		<div class="titreArt">
                    		<a href="<?php the_permalink();?>" class="titreArt"><?php the_title(); ?></a>
                		</div><?php
        				the_excerpt();
        				echo '</div>';
        			}
        		}
        	?>

        </div> <!-- end #main -->

    </div> <!-- end #inner-content -->

  </div> <!-- end #content -->

<?php get_footer(); ?>
