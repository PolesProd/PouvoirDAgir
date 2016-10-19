<?php
/*
Template Name: Événements
*/
?>

<?php get_header(); ?>
			<div class="hero">
				<div class="row">
					<div class="large-12 columns">
						<h1><?php the_title(); ?></h1>
					</div>
				</div>
			</div>

			<div id="content">
				<div id="inner-content" class="row">
				    <div id="main" class="large-12 medium-10 small-centered columns" role="main">
							<div class="columns">
								<div class="row">
								  <div class="small-6 columns">
										<?php
				            $args = array( 'post_type' => 'events', 'posts_per_page' => 10 );
				            $loopy = new WP_Query( $args );
				            $count = 1;
				            if($loopy->have_posts()){
				              while ( $loopy->have_posts() ) {
				                  $loopy->the_post();
				                  echo '<div class="events">';
				                      $id = get_the_ID();
				                      /*echo 'Evenement n<sup>o</sup> '.$count.'<br>';*/
				                      ?>
				                      <div class="imgArticle" id="<?php echo 'post_thumbsnails-'. get_post_thumbnail_id(); ?>" style="font-family: 'Ruda', sans-serif;background-image:url('<?php if ( has_post_thumbnail() ) { echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) );} ;?>');width:300px;height:308px;background-size:cover;background-position: center;background-repeat: no-repeat;">
				        							</div><!-- Fin de la div imgArticle --><br>
				                      <?php the_title(); ?><br>
				                      <?php the_excerpt();?>
				                      <?php //echo '<a href='.implode(get_post_meta(get_the_ID(), part_lien_du_site)).' target="__blank">'.implode(get_post_meta(get_the_ID(), part_lien_du_site)).'</a><br><br>';
				                      $count++;
				                  echo '</div>';
				              }
				            }
				            else{
				              echo 'Sorry no post matched';
				            }
				             ?>
									</div>
								  <div class="small-6 columns">
										<?php the_title('<h3>','</h3>'); ?>
										<?php
										$args = array( 'post_type'=>'events','category_name'=>'Communiqués','posts_per_page'=> 10);
		                $loop = new WP_Query( $args );
		                while ( $loop->have_posts() ) : $loop->the_post();
		                  the_title();
		                  echo '<div class="entry-content">';
											echo '<div class="">';
												the_post_thumbnail();
											echo '</div>';
		                    the_content();
		                  echo '</div>';
		                endwhile;
										?>
									</div>
								</div>
							</div>
    				</div> <!-- end #main -->
				</div> <!-- end #inner-content -->
			</div> <!-- end #content -->
<?php get_footer(); ?>
