<?php
	$title = '';

	if ( is_home() ) {
		$title = get_theme_mod( 'title_blog', esc_html__( 'From the blog', 'palermo' ) );
	} elseif ( is_singular() ) {
		$title = single_post_title( '', false );
	} elseif ( is_archive() ) {
		$title = get_the_archive_title();
	} elseif ( is_search() ) {
		$title = get_theme_mod( 'title_search', esc_html__( 'Search results', 'palermo' ) );
	} elseif ( is_404() ) {
		$title = get_theme_mod( 'title_404', esc_html__( 'Page not found', 'palermo' ) );
	} else {
		$title = '';
	}

	$title = apply_filters( 'palermo_hero_title', $title );
?>
<?php if ( ! empty( $title ) ) : ?>
	<h1 class="page-title"><?php echo $title; ?></h1>
<?php endif; ?>
