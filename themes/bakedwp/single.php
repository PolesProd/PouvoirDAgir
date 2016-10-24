<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="row" style="max-width: none;">

					<div id="main" style="" class="large-10 medium-10 columns small-centered" role="main">

					    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					    	<?php get_template_part( 'parts/loop', 'single' ); ?>

					    <?php endwhile; else : ?>

					   		<?php get_template_part( 'parts/content', 'missing' ); ?>

					    <?php endif; ?>

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
					</div> <!-- end #main -->

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
