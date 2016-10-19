<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'bakedwp' ) ?></span>
<<<<<<< HEAD
		<input type="search" id="s" class="search-field" placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder', 'bakedwp' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'bakedwp' ) ?>" />
=======
		<input type="search" id="s" class="ui-autocomplete-input" placeholder="<?php echo esc_attr_x( 'Search...', 'placeholder', 'bakedwp' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'bakedwp' ) ?>" autocomplete="off"/>
>>>>>>> e3c70a52925841d0d4fdc9d0a5b313eceab1b9d9
	</label>
	<input type="submit" class="search-submit button" value="<?php echo esc_attr_x( 'Search', 'button', 'bakedwp' ) ?>" />
</form>
