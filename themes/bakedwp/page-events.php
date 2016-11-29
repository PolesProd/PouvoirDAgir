<?php
/*
Template Name: Événements
*/
?>

<?php get_header(); ?>
  	<!-- sous header titre page -->
		<div class="hero">
			<div class="large-12 columns">
				<h1><?php the_title(); ?></h1>
			</div>
		</div>
	<!--FIN sous header titre page -->
	<!-- Calendrier evenement -->
		<div id="content">
			<div id="inner-content" >
				<div class="derArt text-center small-12 medium-6 large-6 columns">
					<div class="person-list">
					</div>
					<div class="list">
					</div>
				</div>
				<div class="small-12 medium-6 large-6 columns">
					<div class="calendar hidden-print">
						<header>
							<h2 class="month"></h2>
							<a class="btn-prev" href="#"></a>
							<a class="btn-next" href="#"></a>
						</header>
					<table>
						<thead class="event-days">
							<tr></tr>
						</thead>
						<tbody class="event-calendar">
							<tr class="1"></tr>
							<tr class="2"></tr>
							<tr class="3"></tr>
							<tr class="4"></tr>
							<tr class="5"></tr>
						</tbody>
					</table>
					</div>
				</div>
			</div>
		</div>
		<!-- FIN Calendrier evenement -->
		<!-- Barre de navigation des evenemnt "TAG ET CATEGORIE" -->
		<div class="barre medium-12 large-12 columns">
			<ul class="btn-barre">
				<li><img src="<?php echo site_url() ?>/wp-content/themes/bakedwp/assets/images/pyctos/analyse-purple.png" alt="" />analyse</li>
				<li><img src="<?php echo site_url() ?>/wp-content/themes/bakedwp/assets/images/pyctos/methodologie-purple.png" alt="" />methodologie</li>
				<li><img src="<?php echo site_url() ?>/wp-content/themes/bakedwp/assets/images/pyctos/temoignage-purple.png" alt="" />
				temoignage</li>
				<div class="plus"><a href="">+</a></div>
			</ul>
			<?php
				$args = array( 'hide_empty=0' );
				$terms = get_terms( 'wpsccategory', $args );
				if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
					$count = count( $terms );
					$i = 0;
					$term_list = '<ul class="categoryList">';
					foreach ( $terms as $term ) {
						$i++;
						$term_list .= '<li><a href="' . esc_url( get_term_link( $term ) ) . '" alt="' . esc_attr( sprintf( __( 'View all post filed under %s', 'bakedwp' ), $term->name ) ) . '">' . $term->name . '</a></li>';
					}
					echo $term_list;
				}
			?>
		</div>
		<!-- FIN Barre de navigation des evenemnt "TAG ET CATEGORIE" -->
		<!-- Les tuiles devenement -->
		<div id="inner-content" class="centerArt">
			<div id="main" class="large-12 medium-10 small-centered columns" role="main">
				<div class="columns">
						<div class="relativArt">
							<?php
								$args = array( 'post_type' => 'events', 'posts_per_page' => 10 );
								$loopy = new WP_Query( $args );
								$count = 1;
								if($loopy->have_posts()){
									while ( $loopy->have_posts() ) {
									$loopy->the_post();
									echo '<div class="events large-3 medium-3 columns small-centered">';
									$id = get_the_ID();
								?>
								<div class="dateArt">
										<p class="auteurArt"><?php the_author_posts_link(); ?></p>
										<p class="lieu">
											<?php
												// Lieu
												$locations = get_the_terms( get_the_ID(), 'wpsclocation' );

												if( isset( $locations ) && is_array( $locations ) ) {
													foreach ( $locations as $loc ) {
														$location = $loc->name;
														if ( strlen( $loc->description ) ) {
															$location .= '<br />' . $loc->description;
														}
													}
													echo '<a href="' . get_term_link($loc->name, $loc->taxonomy) . '" alt="' . esc_attr(sprintf(__('View all posts in %s', 'textdomain'), $loc->name)) . '">' . esc_html($loc->name) . '</a>';

												}
											?>
										</p>

										<p class="positionDate">
											<?php
												if( !strlen( get_post_meta( get_the_ID(), 'wpsc_end_date', true ) ) ) {
													// single day event
													$date = date_i18n( get_option('date_format'), strtotime( get_post_meta( get_the_ID(), 'wpsc_start_date', true ) ) );
												} else {
													$date = date_i18n( get_option('date_format'), strtotime( get_post_meta( get_the_ID(), 'wpsc_start_date', true ) ) );
													$date .= ' - ';
													$date .= date_i18n( get_option('date_format'), strtotime( get_post_meta( get_the_ID(), 'wpsc_end_date', true ) ) );
												}
												echo $date;
											?>
										</p>
								</div>

							<div class="titreArt">
								<h3><a href="<?php echo get_permalink($post); ?>"><?php the_title(); ?></a><br></h3>
								<p class="categorieArt">
									<?php
										$categories = get_the_terms( $post->ID, 'wpsccategory' );
										// now you can view your category in array:
										// using var_dump( $categories );
										// or you can take all with foreach:
										foreach( $categories as $category ) {
										  echo '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '" alt="' . esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ) . '">' . esc_html( $category->name ) . '</a>' . $separator;
										}
									?>
								</p>
							</div>
							<div class="tagArt">
								<ul class="evenTag">
									<li><?php the_tags('', ', ', ''); ?></li>
								</ul>
							</div>
								<div class="shareImg">
									<p><a href="">	<img src="<?php echo site_url() ?>/wp-content/themes/bakedwp/assets/images/pyctos/newsletter-black.png" alt="" /></a></p>
									<p><a href=""><img src="<?php echo site_url() ?>/wp-content/themes/bakedwp/assets/images/pyctos/facebook-black.png" alt="" /></a></p>
									<p><a href=""><img src="<?php echo site_url() ?>/wp-content/themes/bakedwp/assets/images/pyctos/twitter-grey.png" alt="" /></a></p>
								</div>
						</div>
					<?php $count++;
						}
						}
						else{
						echo 'Sorry no post matched';
						}
					?>
				</div>
 				 <button class="btnArt">voir plus d'article</button>
			</div>
		</div>
		<!--FIN Les tuiles devenement -->
<?php get_footer(); ?>

