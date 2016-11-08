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
				<div class=" large-6 columns">
					<div class="person-list">
					</div>
					<div class="list">
					</div>
				</div>
				<div class="large-6 columns calend-color">
					<div class="calendar hidden-print">
						<header>
							<h2 class="month"></h2>
							<a class="btn-prev fontawesome-angle-left" href="#"></a>
							<a class="btn-next fontawesome-angle-right" href="#"></a>
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
				<li>analyse</li>
				<li>methodologie</li>
				<li>temoignage</li>
			</ul>
			<ul class="barre-cate">
				<li class="barre-cate">categorie</li>
				<li>categorie</li>
				<li>categorie</li>
				<li>categorie</li>
			</ul>
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
									<div class="auteurArt"><?php the_author(); ?>
									</div>
									<div class="positionDate">
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
								</div>
							</div>
							<br>
							<div class="titreArt">
								<?php the_title(); ?>
								<?php the_category(); ?>
							</div>
							<div class="tagArt">
								<ul>
									<li>Tag</li>
									<li>Tag</li>
									<li>Tag</li>
								</ul>
							</div>
							<div class="partage">
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
