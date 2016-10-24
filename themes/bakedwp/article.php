<div class="post">
	<?php
	$args = array( 'post_type' => 'events', 'posts_per_page' => -1 );
	$loopy = new WP_Query( $args );
	$count = 1;
	if($loopy->have_posts()){
		while ( $loopy->have_posts() ) {
			$loopy->the_post();
			echo '<div class="events">';
			$id = get_the_ID();
			?>
			<div class="img" id="<?php echo 'post_thumbsnails-'. get_post_thumbnail_id(); ?>" style="font-family: 'Ruda', sans-serif;background-image:url('<?php if ( has_post_thumbnail() ) { echo wp_get_attachment_url( get_post_thumbnail_id($post->ID) );} ;?>');width:300px;height:308px;background-size:cover;background-position: center;background-repeat: no-repeat;">
			</div><!-- Fin de la div imgArticle --><br>
			<?php the_title(); ?><br>
			<?php the_category(); ?>
			<?php the_excerpt(10);?>
			<?php the_author(); ?>
			<div class="meta">
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
		<?php echo '</div>';
	}
}
else{
	echo 'Sorry no post matched';
}
?>
</div>
