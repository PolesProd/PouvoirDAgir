<form id="headSearch" role="search" method="get" class="search-form" action="<?php echo esc_url(home_url( '/' ) ); ?>">
	<!-- <label>
		<span class="screen-reader-text"><?php //echo _x( 'Search for:', 'label', 'bakedwp' ) ?></span>
	</label> -->
	<input type="search" id="s" class="ui-autocomplete-input" placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder', 'bakedwp' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'bakedwp' ) ?>" autocomplete="off"/>
	<input type="submit" class="search-submit button" value="<?php echo esc_attr_x( 'Search', 'button', 'bakedwp' ) ?>" />
</form>
