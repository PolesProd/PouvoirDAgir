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
															<?php the_category(); ?>
				                      <?php the_excerpt();?>
															 <?php the_author(); ?>
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
																	echo $date;
																	echo "<br/>";
																	if( isset( $time ) )
																		echo $time;
																?>
																</p>
															</div><!-- Fin de la div metaArticle -->
				                      <?php echo '<a href='.implode(get_post_meta(get_the_ID(), part_lien_du_site)).' target="__blank">'.implode(get_post_meta(get_the_ID(), part_lien_du_site)).'</a><br><br>';
				                      $count++;
				                  echo '</div>';
				              }
				            }
				            else{
				              echo 'Sorry no post matched';
				            }
				             ?>
								</div>
							</div>
    				</div> <!-- end #main -->
				</div> <!-- end #inner-content -->
			</div> <!-- end #content -->
<?php get_footer(); ?>
