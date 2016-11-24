<?php
/*
Template Name: Tags
*/
get_header();
$tag = wp_tag_cloud( 'format=array' ); ?>
			<div id="content">
				<div id="inner-content" class="row">
				    <div id="main" class="large-12 medium-10 small-centered columns" role="main">
							<div class="row">
								<div class="tags">
									<?php
									for($i=0;$i < count($tag);$i++){?>
							  		<span class="large-2 columns"><h3><?php echo $tag[$i];?></h3></span>
							  		<?php }?>
							  	</div>
							  	<div>
							  		<?php
							  		$brand_name = $_GET['tag'];
									$args=array(
										'posts_per_page'=>5, 
										'tag' => $brand_name,
										'post_type' => array('post','events','partenaires','analyse','methodologie','temoignage')
										);
									$wp_query = new WP_Query( $args );
									if ( have_posts() ) :
									    while (have_posts()) : the_post();
									        echo '<li>';?>
									        <a href="<?php the_permalink();?>"><?php the_title();?></a>
									        <?php echo '</li>';
									    endwhile;
									endif;
									wp_reset_postdata();
							  		?>
							  	</div>
    				</div> <!-- end #main -->
				</div> <!-- end #inner-content -->
			</div> <!-- end #content -->
<?php get_footer(); ?>
