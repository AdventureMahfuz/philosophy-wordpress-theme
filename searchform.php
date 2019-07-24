<form role="search" method="get" class="header__search-form" action="<?php echo home_url( '/' ); ?>">
	<label>
		<span class="hide-content"><?php _e( 'Search for:', 'philosophy' ) ?></span>
		<input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Type Keywords', 'philosophy' ) ?>" value="<?php echo get_search_query() ?>" name="s"
		       title="<?php _e( 'Search for:', 'philosophy' ) ?>" autocomplete="off">
	</label>
	<input type="submit" class="search-submit" value="<?php esc_attr_e( 'Search', 'submit button' ) ?>">
</form>

<a href="#0" title="Close Search" class="header__overlay-close"><?php _e("Close","philosophy"); ?></a>