<?php
if ( ! function_exists( 'palermo_get_customizer_css' ) ) :
	function palermo_get_customizer_css() {
		ob_start();

		//
		// Logo
		//
		if ( get_theme_mod( 'logo_padding_top' ) || get_theme_mod( 'logo_padding_bottom' ) ) {
			?>
			.site-logo {
				<?php if ( get_theme_mod( 'logo_padding_top' ) ) : ?>
					padding-top: <?php echo intval( get_theme_mod( 'logo_padding_top' ) ); ?>px;
				<?php endif; ?>
				<?php if ( get_theme_mod( 'logo_padding_bottom' ) ) : ?>
					padding-bottom: <?php echo intval( get_theme_mod( 'logo_padding_bottom' ) ); ?>px;
				<?php endif; ?>
			}
			<?php
		}

		//
		// Sidebar Colors
		//
		echo palermo_get_background_styles( 'sidebar', '.sidebar-content' );

		if ( get_theme_mod( 'sidebar_accent_color' ) ) {
			$sidebar_accent_color = get_theme_mod( 'sidebar_accent_color' );
			?>
			.navigation-main > li a:hover.sf-with-ul::after,
			.navigation-main > li.sfHover > a.sf-with-ul::after,
			.navigation-main li > a:hover.sf-with-ul::after,
			.navigation-main li.sfHover > a.sf-with-ul::after,
			.navigation-main li.current-menu-item > a.sf-with-ul::after,
			.navigation-main li.current-menu-ancestor > a.sf-with-ul::after {
				color: <?php echo $sidebar_accent_color; ?>;
			}

			.sidebar .btn,
			.sidebar input[type="button"],
			.sidebar button {
				background-color: <?php echo $sidebar_accent_color; ?>;
			}
			<?php
		}

		if ( get_theme_mod( 'navigation_color' ) ) {
			$nav_color = get_theme_mod( 'navigation_color' );
			?>
			.navigation-main a {
				color: <?php echo $nav_color; ?>;
			}

			@media ( max-width: 1023px ) {
				.navigation-main a {
					border-bottom-color: <?php echo palermo_hex2rgba( $nav_color, .4); ?>
				}
			}
			<?php
		}

		if ( get_theme_mod( 'navigation_color_hover' ) ) {
			$nav_color_hover = get_theme_mod( 'navigation_color_hover' );
			?>
			.navigation-main > li a:hover,
			.navigation-main > li.sfHover > a,
			.navigation-main > li > a:hover,
		  .navigation-main > li.sfHover > a,
		  .navigation-main > li.sfHover > a:active,
		  .navigation-main > li.current_page_item > a,
		  .navigation-main > li.current-menu-item > a,
		  .navigation-main > li.current-menu-ancestor > a,
		  .navigation-main > li.current-menu-parent > a,
		  .navigation-main > li.current > a,
			.navigation-main ul li > a:hover,
			.navigation-main ul li.sfHover > a,
			.navigation-main ul li.current-menu-item > a,
			.navigation-main ul li.current-menu-ancestor > a {
				color: <?php echo $nav_color_hover; ?>;
			}
			<?php
		}

		if ( get_theme_mod( 'navigation_submenu_background' ) ) {
			$nav_submenu_bg = get_theme_mod( 'navigation_submenu_background' );
			?>
			.navigation-main ul {
				background-color: <?php echo $nav_submenu_bg; ?>;
			}
			<?php
		}

		if ( get_theme_mod( 'navigation_submenu_color' ) ) {
			$nav_submenu_color = get_theme_mod( 'navigation_submenu_color' );
			?>
			.navigation-main ul li a {
				color: <?php echo $nav_submenu_color; ?>;
			}
			<?php
		}

		if ( get_theme_mod( 'navigation_submenu_color_hover' ) ) {
			$nav_submenu_color_hover = get_theme_mod( 'navigation_submenu_color_hover' );
			?>
			.navigation-main ul li > a:hover,
			.navigation-main ul li.sfHover > a,
			.navigation-main ul li.current-menu-item > a,
			.navigation-main ul li.current-menu-ancestor > a {
				color: <?php echo $nav_submenu_color_hover; ?>;
			}
			<?php
		}

		if ( get_theme_mod( 'sidebar_text_color' ) ) {
			$sidebar_text_color = get_theme_mod( 'sidebar_text_color' );
			?>
			.sidebar-content,
			.sidebar-content .widget-title,
			.mobile-toggle,
			.mobile-toggle:hover,
			.mobile-toggle:focus {
				color: <?php echo $sidebar_text_color; ?>;
			}

			.mobile-navicon b,
			.mobile-navicon b::before,
			.mobile-navicon b::after {
				background-color: <?php echo $sidebar_text_color; ?>;
			}

			.mobile-toggled-active .mobile-navicon b {
				background-color: transparent;
			}

			.navigation-main a.sf-with-ul::after,
			.widget .social-icon {
				color: <?php echo palermo_hex2rgba( $sidebar_text_color, .4 ) ?>
			}
			<?php
		}

		if ( get_theme_mod( 'sidebar_widget_title_color' ) ) {
			$sidebar_widget_title_color = get_theme_mod( 'sidebar_widget_title_color' );
			?>
			.sidebar .widget-title {
				color: <?php echo $sidebar_widget_title_color; ?>;
			}
			<?php
		}

		if ( get_theme_mod( 'sidebar_link_color' ) ) {
			$sidebar_link_color = get_theme_mod( 'sidebar_link_color' );
			?>
			.sidebar-widgets a,
			.sidebar-widgets-bottom a,
			.widget .social-icon:hover {
				color: <?php echo $sidebar_link_color; ?>;
			}
			<?php
		}

		if ( get_theme_mod( 'sidebar_link_hover_color' ) ) {
			$sidebar_link_hover_color = get_theme_mod( 'sidebar_link_hover_color' );
			?>
			.sidebar-widgets a:hover,
			.sidebar-widgets-bottom a:hover {
				color: <?php echo $sidebar_link_hover_color; ?>;
			}
			<?php
		}

		if ( get_theme_mod( 'sidebar_widget_title_color' ) ) {
			$sidebar_widget_title_color = get_theme_mod( 'sidebar_widget_title_color' );
			?>
			.sidebar .widget-title {
				color: <?php echo $sidebar_widget_title_color; ?>;
			}
			<?php
		}

		//
		// Content Colors
		//
		echo palermo_get_background_styles( 'content', '.content-wrap' );

		if ( get_theme_mod( 'content_text_color' ) ) {
			$content_text_color = get_theme_mod( 'content_text_color' );
			?>
			.main,
			.main blockquote cite,
			.form-allowed-tags,
			.comment-notes {
				color: <?php echo $content_text_color; ?>;
			}

			.entry-intro,
			.entry-subtitle,
			.room-amenities li::before {
				color: <?php echo palermo_hex2rgba( $content_text_color, .7 ); ?>;
			}
			<?php
		}

		if ( get_theme_mod( 'content_heading_color' ) ) {
			$content_heading_color = get_theme_mod( 'content_heading_color' );
			?>
			.main h1,
			.main h2,
			.main h3,
			.main h4,
			.main h5,
			.main h6,
			.item-entry-title a {
				color: <?php echo $content_heading_color; ?>;
			}
			<?php
		}

		if ( get_theme_mod( 'content_link_color' ) ) {
			$content_link_color = get_theme_mod( 'content_link_color' );
			?>
			.entry-content a,
			.item-entry-title a:hover {
				color: <?php echo $content_link_color; ?>;
			}
			<?php
		}

		if ( get_theme_mod( 'content_link_color_hover' ) ) {
			$content_link_color_hover = get_theme_mod( 'content_link_color_hover' );
			?>
			.entry-content a:hover {
				color: <?php echo $content_link_color_hover; ?>;
			}
			<?php
		}

		if ( get_theme_mod( 'content_accent_color' ) ) {
			$content_accent_color = get_theme_mod( 'content_accent_color' );
			?>
			.entry-content blockquote::before,
			.main .btn:hover i,
			.main .comment-reply-link:hover i,
			.main input[type="submit"]:hover i,
			.main input[type="reset"]:hover i,
			.main button:hover i {
				color: <?php echo $content_accent_color; ?>;
			}
			<?php
		}

		if ( get_theme_mod( 'content_section_background' ) ) {
			$content_section_background = get_theme_mod( 'content_section_background' );
			?>
			.entry-content blockquote,
			.entry-content table tr:nth-child(2n) {
				background-color: <?php echo $content_section_background; ?>;
			}
			<?php
		}

		if ( get_theme_mod( 'content_border_color' ) ) {
			$content_border_color = get_theme_mod( 'content_border_color' );
			?>
			.main input,
			.main textarea,
			.entry-content table {
				border-color: <?php echo $content_border_color; ?>;
			}

			blockquote {
				border-left-color: <?php echo $content_border_color; ?>;
			}

			.entry-content table th,
			.entry-content table td {
				border-right-color: <?php echo $content_border_color; ?>
			}

			.entry-content table th,
			.entry-content table td {
				border-bottom-color: <?php echo $content_border_color; ?>
			}
			<?php
		}

		if ( get_theme_mod( 'button_background' ) ) {
			$button_background = get_theme_mod( 'button_background' );
			?>
			.main .btn,
			.main .comment-reply-link,
			.main input[type="submit"],
			.main input[type="reset"],
			.main button,
			.slide-control,
			.pagination a,
			.posts-navigation a,
			.pagination span,
			.posts-navigation span {
				border-color: transparent;
				background-color: <?php echo $button_background; ?>;
			}
			<?php
		}

		if ( get_theme_mod( 'button_background_hover' ) ) {
			$button_background_hover = get_theme_mod( 'button_background_hover' );
			?>
			.main .btn:hover,
			.main .comment-reply-link:hover,
			.main input[type="submit"]:hover,
			.main input[type="reset"]:hover,
			.main button:hover,
			.slide-control:hover,
			.pagination a:hover,
			.posts-navigation a:hover,
			.pagination .current,
			.posts-navigation .current {
				border-color: transparent;
				background-color: <?php echo $button_background_hover; ?>;
			}
			<?php
		}

		if ( get_theme_mod( 'button_text_color' ) ) {
			$button_text_color = get_theme_mod( 'button_text_color' );
			?>
			.main .btn,
			.main .comment-reply-link,
			.main input[type="submit"],
			.main input[type="reset"],
			.main button,
			.slide-control,
			.pagination a,
			.posts-navigation a,
			.pagination span,
			.posts-navigation span {
				color: <?php echo $button_text_color; ?>;
			}
			<?php
		}

		if ( get_theme_mod( 'button_text_color_hover' ) ) {
			$button_text_color_hover = get_theme_mod( 'button_text_color_hover' );
			?>
			.main .btn:hover,
			.main .comment-reply-link:hover,
			.main input[type="submit"]:hover,
			.main input[type="reset"]:hover,
			.main button:hover,
			.slide-control:hover,
			.pagination a:hover,
			.posts-navigation a:hover,
			.pagination .current,
			.posts-navigation .current {
				color: <?php echo $button_text_color_hover; ?>;
			}
			<?php
		}

		//
		// Typography
		//
		if ( get_theme_mod( 'h1_size' ) ) {
			?>
			.main h1,
			.entry-content h1 {
				font-size: <?php echo intval( get_theme_mod( 'h1_size' ) ); ?>px;
			}
			<?php
		}

		if ( get_theme_mod( 'h2_size' ) ) {
			?>
			.entry-content h2 {
				font-size: <?php echo intval( get_theme_mod( 'h2_size' ) ); ?>px;
			}
			<?php
		}

		if ( get_theme_mod( 'h3_size' ) ) {
			?>
			.entry-content h3 {
				font-size: <?php echo intval( get_theme_mod( 'h3_size' ) ); ?>px;
			}
			<?php
		}

		if ( get_theme_mod( 'h4_size' ) ) {
			?>
			.entry-content h4 {
				font-size: <?php echo intval( get_theme_mod( 'h4_size' ) ); ?>px;
			}
			<?php
		}

		if ( get_theme_mod( 'h5_size' ) ) {
			?>
			.entry-content h5 {
				font-size: <?php echo intval( get_theme_mod( 'h5_size' ) ); ?>px;
			}
			<?php
		}

		if ( get_theme_mod( 'h6_size' ) ) {
			?>
			.entry-content h6 {
				font-size: <?php echo intval( get_theme_mod( 'h6_size' ) ); ?>px;
			}
			<?php
		}

		if ( get_theme_mod( 'body_text_size' ) ) {
			?>
			.entry-content {
				font-size: <?php echo intval( get_theme_mod( 'body_text_size' ) ); ?>px;
			}
			<?php
		}

		if ( get_theme_mod( 'widgets_text_size' ) ) {
			?>
			.widget,
			.widget_meta ul li a,
			.widget_pages ul li a,
			.widget_categories ul li a,
			.widget_archive ul li a,
			.widget_nav_menu ul li a,
			.widget_recent_entries ul li a {
				font-size: <?php echo intval( get_theme_mod( 'widgets_text_size' ) ); ?>px;
			}
			<?php
		}

		if ( get_theme_mod( 'widgets_title_size' ) ) {
			?>
			.widget-title {
				font-size: <?php echo intval( get_theme_mod( 'widgets_title_size' ) ); ?>px;
			}
			<?php
		}

		if ( get_theme_mod( 'uppercase_widget_titles' ) ) {
			?>
			.widget-title {
				text-transform: uppercase;
			}
			<?php
		}

		if ( get_theme_mod( 'uppercase_content_titles' ) ) {
			?>
			.main h1,
			.main h2,
			.main h3,
			.main h4,
			.main h5,
			.main h6 {
				text-transform: uppercase;
			}
			<?php
		}


		if ( get_theme_mod( 'custom_css' ) ) {
			echo get_theme_mod( 'custom_css' );
		}

		$css = ob_get_clean();
		return apply_filters( 'palermo_customizer_css', $css );
	}
endif;

if ( ! function_exists( 'palermo_custom_background_cb' ) ) :
function palermo_custom_background_cb() {
	// $background is the saved custom image, or the default image.
	$background = set_url_scheme( get_background_image() );

	// $color is the saved custom color.
	// A default has to be specified in style.css. It will not be printed here.
	$color = get_background_color();

	if ( $color === get_theme_support( 'custom-background', 'default-color' ) ) {
		$color = false;
	}

	if ( ! $background && ! $color ) {
		if ( is_customize_preview() ) {
			echo '<style type="text/css" id="custom-background-css"></style>';
		}
		return;
	}

	$style = $color ? "background-color: #$color;" : '';

	if ( $background ) {
		$image = " background-image: url(" . wp_json_encode( $background ) . ");";

		// Background Position.
		$position_x = get_theme_mod( 'background_position_x', get_theme_support( 'custom-background', 'default-position-x' ) );
		$position_y = get_theme_mod( 'background_position_y', get_theme_support( 'custom-background', 'default-position-y' ) );

		if ( ! in_array( $position_x, array( 'left', 'center', 'right' ), true ) ) {
			$position_x = 'left';
		}

		if ( ! in_array( $position_y, array( 'top', 'center', 'bottom' ), true ) ) {
			$position_y = 'top';
		}

		$position = " background-position: $position_x $position_y;";

		// Background Size.
		$size = get_theme_mod( 'background_size', get_theme_support( 'custom-background', 'default-size' ) );

		if ( ! in_array( $size, array( 'auto', 'contain', 'cover' ), true ) ) {
			$size = 'auto';
		}

		$size = " background-size: $size;";

		// Background Repeat.
		$repeat = get_theme_mod( 'background_repeat', get_theme_support( 'custom-background', 'default-repeat' ) );

		if ( ! in_array( $repeat, array( 'repeat-x', 'repeat-y', 'repeat', 'no-repeat' ), true ) ) {
			$repeat = 'repeat';
		}

		$repeat = " background-repeat: $repeat;";

		// Background Scroll.
		$attachment = get_theme_mod( 'background_attachment', get_theme_support( 'custom-background', 'default-attachment' ) );

		if ( 'fixed' !== $attachment ) {
			$attachment = 'scroll';
		}

		$attachment = " background-attachment: $attachment;";

		$style .= $image . $position . $size . $repeat . $attachment;
	}

	// If there's a more involved background applied (slider, video, etc), skip the native WP bg.
	ob_start();
	palermo_wp_footer_background_markup();
	$bg = ob_get_clean();
	if ( ! empty( $bg ) ) {
		return;
	}

	?>
	<style type="text/css" id="custom-background-css">
		body.custom-background {
			<?php echo trim( $style ); ?>
		}
	</style>
	<?php
}
endif;
