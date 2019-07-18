<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div id="page">

	<div class="layout-sidebar">
		<div class="sidebar">
			<div class="sidebar-content">

				<header class="header">
					<h1 class="site-logo">
						<?php if ( function_exists( 'the_custom_logo' ) ) {
							the_custom_logo();
						} ?>

						<?php if ( get_theme_mod( 'logo_site_title', 1 ) ) : ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="site-logo-textual">
								<?php bloginfo( 'name' ); ?>
							</a>
						<?php endif; ?>
					</h1>

					<?php if ( get_theme_mod( 'logo_tagline' ) && get_bloginfo( 'description' ) ) : ?>
						<p class="site-tagline"><?php bloginfo( 'description' ); ?></p>
					<?php endif; ?>

					<a href="#" class="mobile-toggle">
						<span class="mobile-navicon">
							<b></b>
						</span>
						<span><?php esc_html_e( 'Menu', 'palermo' ); ?></span>
					</a>

				</header>

				<div class="sidebar-inner">
					<nav class="nav">
						<?php wp_nav_menu( array(
							'theme_location' => 'main_menu',
							'container'      => '',
							'menu_id'        => '',
							'menu_class'     => 'navigation-main',
						) ); ?>
					</nav>

					<div class="sidebar-widgets">
						<?php get_sidebar(); ?>
					</div>

					<?php if ( is_active_sidebar( 'sidebar-bottom' ) ) : ?>
						<div class="sidebar-widgets-bottom">
							<?php dynamic_sidebar( 'sidebar-bottom' ); ?>
						</div>
					<?php endif; ?>
				</div>

			</div>
		</div>
	</div>

	<div class="layout-content">
		<div class="content-wrap">
