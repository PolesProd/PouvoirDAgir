<?php get_header(); ?>
			
			<div id="content">
			
				<div id="inner-content" class="row">
			
				    <div id="main" class="large-10 medium-10 small-centered columns" role="main">
					 
					  <!-- To see additional archive styles, visit the /parts directory -->
					    <?php get_template_part( 'parts/loop', 'archive' ); ?>
								
				    </div> <!-- end #main -->
    				    
				</div> <!-- end #inner-content -->
    
			</div> <!-- end #content -->

<?php get_footer(); ?>