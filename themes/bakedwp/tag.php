<?php
/*
Template Name: Tags
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
							<div class="columns" style="background:url(https://media.firerank.com/upload/dtl/982/54e49d5d0f70b_400.jpg) center;background-repeat:no-repeat;height:350px;">Expand!</div>
							<div class="row">
							  <?php wp_tag_cloud('number=0'); ?>
    				</div> <!-- end #main -->
				</div> <!-- end #inner-content -->
			</div> <!-- end #content -->
<?php get_footer(); ?>
