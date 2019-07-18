<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="searchform" method="get" role="search">
	<div>
		<label for="s" class="screen-reader-text"><?php esc_html_e( 'Search for:', 'palermo' ); ?></label>
		<input id="s" name="s" type="search" placeholder="<?php echo esc_attr_x( 'Search', 'search box placeholder', 'palermo' ); ?>" value="<?php echo get_search_query(); ?>">
		<button class="searchsubmit" type="submit"><i class="fa fa-search"></i><span class="screen-reader-text"><?php echo esc_html_x( 'Search', 'submit button', 'palermo' ); ?></span></button>
	</div>
</form>
