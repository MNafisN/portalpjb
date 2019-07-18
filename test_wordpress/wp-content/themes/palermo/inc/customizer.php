<?php
add_action( 'customize_register', 'palermo_customize_register', 100 );
/**
 * Registers all theme-related options to the Customizer.
 *
 * @param WP_Customize_Manager $wpc Reference to the customizer's manager object.
 */
function palermo_customize_register( $wpc ) {
	$wpc->add_section( 'layout', array(
		'title'    => esc_html_x( 'Layout Options', 'customizer section title', 'palermo' ),
		'priority' => 20,
	) );

	$wpc->add_section( 'single_post', array(
		'title'       => esc_html_x( 'Posts Options', 'customizer section title', 'palermo' ),
		'description' => esc_html__( 'These options affect your individual posts.', 'palermo' ),
		'priority'    => 40,
	) );

	$wpc->add_panel( 'appearance', array(
		'title'    => esc_html_x( 'Appearance', 'customizer section title', 'palermo' ),
		'priority' => 60,
	) );

	$wpc->get_section( 'colors' )->title    = esc_html_x( 'Global Background', 'customizer section title', 'palermo' );
	$wpc->get_section( 'colors' )->priority = 60;
	$wpc->get_section( 'colors' )->panel    = 'appearance';

	$wpc->add_section( 'colors_sidebar', array(
		'title' => esc_html_x( 'Sidebar', 'customizer section title', 'palermo' ),
		'panel' => 'appearance',
	) );

	$wpc->add_section( 'colors_content', array(
		'title' => esc_html_x( 'Content', 'customizer section title', 'palermo' ),
		'panel' => 'appearance',
	) );

	$wpc->add_section( 'typography', array(
		'title' => esc_html_x( 'Typography', 'customizer section title', 'palermo' ),
		'panel' => 'appearance',
	) );

	$wpc->add_section( 'social', array(
		'title'       => esc_html_x( 'Social Networks', 'customizer section title', 'palermo' ),
		'description' => esc_html__( 'Enter your social network URLs. Leaving a URL empty will hide its respective icon.', 'palermo' ),
		'priority'    => 80,
	) );

	$wpc->add_section( 'titles', array(
		'title'    => esc_html_x( 'Titles', 'customizer section title', 'palermo' ),
		'priority' => 90,
	) );

	$wpc->add_section( 'other', array(
		'title'       => esc_html_x( 'Other', 'customizer section title', 'palermo' ),
		'description' => esc_html__( 'Other options affecting the whole site.', 'palermo' ),
		'priority'    => 120,
	) );


	//
	// Group options by registering the setting first, and the control right after.
	//



	//
	// Layout
	//
	$wpc->add_setting( 'excerpt_length', array(
		'default'           => 55,
		'sanitize_callback' => 'absint',
	) );
	$wpc->add_control( 'excerpt_length', array(
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 10,
			'step' => 1,
		),
		'section'     => 'layout',
		'label'       => esc_html__( 'Automatically generated excerpt length (in words)', 'palermo' ),
	) );

	$wpc->add_setting( 'pagination_method', array(
		'default'           => 'numbers',
		'sanitize_callback' => 'palermo_sanitize_pagination_method',
	) );
	$wpc->add_control( 'pagination_method', array(
		'type'    => 'select',
		'section' => 'layout',
		'label'   => esc_html__( 'Pagination method', 'palermo' ),
		'choices' => array(
			'numbers' => esc_html_x( 'Numbered links', 'pagination method', 'palermo' ),
			'text'    => esc_html_x( '"Previous - Next" links', 'pagination method', 'palermo' ),
		),
	) );



	//
	// Global colors
	//
	$wpc->get_control( 'background_image' )->section      = 'colors';
	$wpc->get_control( 'background_repeat' )->section     = 'colors';
	$wpc->get_control( 'background_attachment' )->section = 'colors';
	if ( ! is_null( $wpc->get_control( 'background_position_x' ) ) ) {
		$wpc->get_control( 'background_position_x' )->section = 'colors';
	} else {
		$wpc->get_control( 'background_position' )->section = 'colors';
		$wpc->get_control( 'background_preset' )->section   = 'colors';
		$wpc->get_control( 'background_size' )->section     = 'colors';
	}

	$bg_types = palermo_get_page_background_type_choices();
	unset( $bg_types['color'] );
	$wpc->add_setting( 'background_type', array(
		'default'           => '',
		'sanitize_callback' => 'palermo_sanitize_page_background_type',
	) );
	$wpc->add_control( 'background_type', array(
		'type'    => 'select',
		'section' => 'colors',
		'label'   => esc_html__( 'Background type', 'palermo' ),
		'choices' => $bg_types,
	) );


	$post_type = 'maxslider_slide';
	if ( function_exists( 'MaxSlider' ) ) {
		$post_type = MaxSlider()->post_type;
	}
	$wpc->add_setting( 'background_slider_id', array(
		'default'           => '',
		'sanitize_callback' => 'palermo_sanitize_intval_or_empty',
	) );
	$wpc->add_control( new Palermo_Customize_Dropdown_Posts_Control( $wpc, 'background_slider_id', array(
		'section'     => 'colors',
		'label'       => esc_html__( 'MaxSlider slideshow', 'palermo' ),
		'description' => wp_kses( __( 'Applies only when <strong>Background type</strong> is set to <strong>MaxSlider Slideshow</strong>', 'palermo' ), palermo_get_allowed_tags( 'guide' ) ),
	), array(
		'post_type' => $post_type,
	) ) );

	$wpc->add_setting( 'background_video_url', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wpc->add_control( 'background_video_url', array(
		'type'        => 'text',
		'section'     => 'colors',
		'label'       => esc_html__( 'Video URL (YouTube or Vimeo)', 'palermo' ),
		'description' => wp_kses( __( 'Applies only when <strong>Background type</strong> is set to <strong>Video</strong>', 'palermo' ), palermo_get_allowed_tags( 'guide' ) ),
	) );



	//
	// Sidebar colors
	//
	$wpc->add_setting( 'sidebar_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'palermo_sanitize_hex_color',
	) );
	$wpc->add_control( new WP_Customize_Color_Control( $wpc, 'sidebar_bg_color', array(
		'section'     => 'colors_sidebar',
		'label'       => esc_html__( 'Sidebar background color', 'palermo' ),
	) ) );

	$wpc->add_setting( 'sidebar_image', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wpc->add_control( new WP_Customize_Image_Control( $wpc, 'sidebar_image', array(
		'section'     => 'colors_sidebar',
		'label'       => esc_html__( 'Sidebar background image', 'palermo' ),
	) ) );

	$wpc->add_setting( 'sidebar_image_repeat', array(
		'default'           => 'no-repeat',
		'sanitize_callback' => 'palermo_sanitize_image_repeat',
	) );
	$wpc->add_control( 'sidebar_image_repeat', array(
		'type'    => 'radio',
		'section' => 'colors_sidebar',
		'label'   => esc_html__( 'Sidebar background image repeat', 'palermo' ),
		'choices' => palermo_get_image_repeat_choices(),
	) );

	$wpc->add_setting( 'sidebar_image_position_x', array(
		'default'           => 'center',
		'sanitize_callback' => 'palermo_sanitize_image_position_x',
	) );
	$wpc->add_control( 'sidebar_image_position_x', array(
		'type'    => 'radio',
		'section' => 'colors_sidebar',
		'label'   => esc_html__( 'Sidebar image horizontal position', 'palermo' ),
		'choices' => palermo_get_image_position_x_choices(),
	) );

	$wpc->add_setting( 'sidebar_image_position_y', array(
		'default'           => 'center',
		'sanitize_callback' => 'palermo_sanitize_image_position_y',
	) );
	$wpc->add_control( 'sidebar_image_position_y', array(
		'type'    => 'radio',
		'section' => 'colors_sidebar',
		'label'   => esc_html__( 'Sidebar background image vertical position', 'palermo' ),
		'choices' => palermo_get_image_position_y_choices(),
	) );

	$wpc->add_setting( 'sidebar_image_attachment', array(
		'default'           => 'scroll',
		'sanitize_callback' => 'palermo_sanitize_image_attachment',
	) );
	$wpc->add_control( 'sidebar_image_attachment', array(
		'type'    => 'radio',
		'section' => 'colors_sidebar',
		'label'   => esc_html__( 'Sidebar background image attachment', 'palermo' ),
		'choices' => palermo_get_image_attachment_choices(),
	) );

	$wpc->add_setting( 'sidebar_image_cover', array(
		'default'           => 1,
		'sanitize_callback' => 'palermo_sanitize_checkbox',
	) );
	$wpc->add_control( 'sidebar_image_cover', array(
		'type'    => 'checkbox',
		'section' => 'colors_sidebar',
		'label'   => esc_html__( 'Scale the image to cover the visible sidebar area', 'palermo' ),
	) );

	$wpc->add_setting( 'sidebar_accent_color', array(
		'default'           => '',
		'sanitize_callback' => 'palermo_sanitize_hex_color',
	) );
	$wpc->add_control( new WP_Customize_Color_Control( $wpc, 'sidebar_accent_color', array(
		'section' => 'colors_sidebar',
		'label'   => esc_html__( 'Sidebar accent color', 'palermo' ),
		'description'   => esc_html__( 'Elements like navigation arrows, buttons on the sidebar, etc', 'palermo' ),
	) ) );

	$wpc->add_setting( 'navigation_color', array(
		'default'           => '',
		'sanitize_callback' => 'palermo_sanitize_hex_color',
	) );
	$wpc->add_control( new WP_Customize_Color_Control( $wpc, 'navigation_color', array(
		'section' => 'colors_sidebar',
		'label'   => esc_html__( 'Menu text color', 'palermo' ),
	) ) );

	$wpc->add_setting( 'navigation_color_hover', array(
		'default'           => '',
		'sanitize_callback' => 'palermo_sanitize_hex_color',
	) );
	$wpc->add_control( new WP_Customize_Color_Control( $wpc, 'navigation_color_hover', array(
		'section' => 'colors_sidebar',
		'label'   => esc_html__( 'Menu text hover & active color', 'palermo' ),
	) ) );

	$wpc->add_setting( 'navigation_submenu_background', array(
		'default'           => '',
		'sanitize_callback' => 'palermo_sanitize_hex_color',
	) );
	$wpc->add_control( new WP_Customize_Color_Control( $wpc, 'navigation_submenu_background', array(
		'section' => 'colors_sidebar',
		'label'   => esc_html__( 'Sub-menu background color', 'palermo' ),
	) ) );

	$wpc->add_setting( 'navigation_submenu_color', array(
		'default'           => '',
		'sanitize_callback' => 'palermo_sanitize_hex_color',
	) );
	$wpc->add_control( new WP_Customize_Color_Control( $wpc, 'navigation_submenu_color', array(
		'section' => 'colors_sidebar',
		'label'   => esc_html__( 'Sub-menu text color', 'palermo' ),
	) ) );

	$wpc->add_setting( 'navigation_submenu_color_hover', array(
		'default'           => '',
		'sanitize_callback' => 'palermo_sanitize_hex_color',
	) );
	$wpc->add_control( new WP_Customize_Color_Control( $wpc, 'navigation_submenu_color_hover', array(
		'section' => 'colors_sidebar',
		'label'   => esc_html__( 'Sub-menu text hover & active color', 'palermo' ),
	) ) );

	$wpc->add_setting( 'sidebar_text_color', array(
		'default'           => '',
		'sanitize_callback' => 'palermo_sanitize_hex_color',
	) );
	$wpc->add_control( new WP_Customize_Color_Control( $wpc, 'sidebar_text_color', array(
		'section' => 'colors_sidebar',
		'label'   => esc_html__( 'Text color', 'palermo' ),
	) ) );

	$wpc->add_setting( 'sidebar_widget_title_color', array(
		'default'           => '',
		'sanitize_callback' => 'palermo_sanitize_hex_color',
	) );
	$wpc->add_control( new WP_Customize_Color_Control( $wpc, 'sidebar_widget_title_color', array(
		'section' => 'colors_sidebar',
		'label'   => esc_html__( 'Widget titles color', 'palermo' ),
	) ) );

	$wpc->add_setting( 'sidebar_link_color', array(
		'default'           => '',
		'sanitize_callback' => 'palermo_sanitize_hex_color',
	) );
	$wpc->add_control( new WP_Customize_Color_Control( $wpc, 'sidebar_link_color', array(
		'section' => 'colors_sidebar',
		'label'   => esc_html__( 'Link color', 'palermo' ),
	) ) );

	$wpc->add_setting( 'sidebar_link_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'palermo_sanitize_hex_color',
	) );
	$wpc->add_control( new WP_Customize_Color_Control( $wpc, 'sidebar_link_hover_color', array(
		'section' => 'colors_sidebar',
		'label'   => esc_html__( 'Link hover color', 'palermo' ),
	) ) );



	//
	// Content
	//
	$wpc->add_setting( 'content_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'palermo_sanitize_hex_color',
	) );
	$wpc->add_control( new WP_Customize_Color_Control( $wpc, 'content_bg_color', array(
		'section'     => 'colors_content',
		'label'       => esc_html__( 'Content background color', 'palermo' ),
	) ) );

	$wpc->add_setting( 'content_image', array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wpc->add_control( new WP_Customize_Image_Control( $wpc, 'content_image', array(
		'section'     => 'colors_content',
		'label'       => esc_html__( 'Content background image', 'palermo' ),
	) ) );

	$wpc->add_setting( 'content_image_repeat', array(
		'default'           => 'no-repeat',
		'sanitize_callback' => 'palermo_sanitize_image_repeat',
	) );
	$wpc->add_control( 'content_image_repeat', array(
		'type'    => 'radio',
		'section' => 'colors_content',
		'label'   => esc_html__( 'Content background image repeat', 'palermo' ),
		'choices' => palermo_get_image_repeat_choices(),
	) );

	$wpc->add_setting( 'content_image_position_x', array(
		'default'           => 'center',
		'sanitize_callback' => 'palermo_sanitize_image_position_x',
	) );
	$wpc->add_control( 'content_image_position_x', array(
		'type'    => 'radio',
		'section' => 'colors_content',
		'label'   => esc_html__( 'Content image horizontal position', 'palermo' ),
		'choices' => palermo_get_image_position_x_choices(),
	) );

	$wpc->add_setting( 'content_image_position_y', array(
		'default'           => 'center',
		'sanitize_callback' => 'palermo_sanitize_image_position_y',
	) );
	$wpc->add_control( 'content_image_position_y', array(
		'type'    => 'radio',
		'section' => 'colors_content',
		'label'   => esc_html__( 'Content background image vertical position', 'palermo' ),
		'choices' => palermo_get_image_position_y_choices(),
	) );

	$wpc->add_setting( 'content_image_attachment', array(
		'default'           => 'scroll',
		'sanitize_callback' => 'palermo_sanitize_image_attachment',
	) );
	$wpc->add_control( 'content_image_attachment', array(
		'type'    => 'radio',
		'section' => 'colors_content',
		'label'   => esc_html__( 'Content background image attachment', 'palermo' ),
		'choices' => palermo_get_image_attachment_choices(),
	) );

	$wpc->add_setting( 'content_image_cover', array(
		'default'           => 1,
		'sanitize_callback' => 'palermo_sanitize_checkbox',
	) );
	$wpc->add_control( 'content_image_cover', array(
		'type'    => 'checkbox',
		'section' => 'colors_content',
		'label'   => esc_html__( 'Scale the image to cover the visible content area', 'palermo' ),
	) );

	$wpc->add_setting( 'content_text_color', array(
		'default'           => '',
		'sanitize_callback' => 'palermo_sanitize_hex_color',
	) );
	$wpc->add_control( new WP_Customize_Color_Control( $wpc, 'content_text_color', array(
		'section' => 'colors_content',
		'label'   => esc_html__( 'Text color', 'palermo' ),
	) ) );

	$wpc->add_setting( 'content_heading_color', array(
		'default'           => '',
		'sanitize_callback' => 'palermo_sanitize_hex_color',
	) );
	$wpc->add_control( new WP_Customize_Color_Control( $wpc, 'content_heading_color', array(
		'section' => 'colors_content',
		'label'   => esc_html__( 'Titles color', 'palermo' ),
	) ) );

	$wpc->add_setting( 'content_link_color', array(
		'default'           => '',
		'sanitize_callback' => 'palermo_sanitize_hex_color',
	) );
	$wpc->add_control( new WP_Customize_Color_Control( $wpc, 'content_link_color', array(
		'section' => 'colors_content',
		'label'   => esc_html__( 'Link color', 'palermo' ),
	) ) );

	$wpc->add_setting( 'content_link_color_hover', array(
		'default'           => '',
		'sanitize_callback' => 'palermo_sanitize_hex_color',
	) );
	$wpc->add_control( new WP_Customize_Color_Control( $wpc, 'content_link_color_hover', array(
		'section' => 'colors_content',
		'label'   => esc_html__( 'Link color hover', 'palermo' ),
	) ) );

	$wpc->add_setting( 'content_border_color', array(
		'default'           => '',
		'sanitize_callback' => 'palermo_sanitize_hex_color',
	) );
	$wpc->add_control( new WP_Customize_Color_Control( $wpc, 'content_border_color', array(
		'section' => 'colors_content',
		'label'   => esc_html__( 'Border color', 'palermo' ),
	) ) );

	$wpc->add_setting( 'content_accent_color', array(
		'default'           => '',
		'sanitize_callback' => 'palermo_sanitize_hex_color',
	) );
	$wpc->add_control( new WP_Customize_Color_Control( $wpc, 'content_accent_color', array(
		'section'     => 'colors_content',
		'label'       => esc_html__( 'Accent color', 'palermo' ),
		'description' => esc_html__( 'Applies to minor elements like arrows or icons', 'palermo' ),
	) ) );

	$wpc->add_setting( 'content_section_background', array(
		'default'           => '',
		'sanitize_callback' => 'palermo_sanitize_hex_color',
	) );
	$wpc->add_control( new WP_Customize_Color_Control( $wpc, 'content_section_background', array(
		'section'     => 'colors_content',
		'label'       => esc_html__( 'Light backgrounds', 'palermo' ),
		'description' => esc_html__( 'Applies to elements like tables and blockquotes', 'palermo' ),
	) ) );

	$wpc->add_setting( 'button_background', array(
		'default'           => '',
		'sanitize_callback' => 'palermo_sanitize_hex_color',
	) );
	$wpc->add_control( new WP_Customize_Color_Control( $wpc, 'button_background', array(
		'section' => 'colors_content',
		'label'   => esc_html__( 'Button background color', 'palermo' ),
	) ) );

	$wpc->add_setting( 'button_text_color', array(
		'default'           => '',
		'sanitize_callback' => 'palermo_sanitize_hex_color',
	) );
	$wpc->add_control( new WP_Customize_Color_Control( $wpc, 'button_text_color', array(
		'section' => 'colors_content',
		'label'   => esc_html__( 'Button text color', 'palermo' ),
	) ) );

	$wpc->add_setting( 'button_background_hover', array(
		'default'           => '',
		'sanitize_callback' => 'palermo_sanitize_hex_color',
	) );
	$wpc->add_control( new WP_Customize_Color_Control( $wpc, 'button_background_hover', array(
		'section' => 'colors_content',
		'label'   => esc_html__( 'Button background hover color', 'palermo' ),
	) ) );

	$wpc->add_setting( 'button_text_color_hover', array(
		'default'           => '',
		'sanitize_callback' => 'palermo_sanitize_hex_color',
	) );
	$wpc->add_control( new WP_Customize_Color_Control( $wpc, 'button_text_color_hover', array(
		'section' => 'colors_content',
		'label'   => esc_html__( 'Button text hover color', 'palermo' ),
	) ) );



	//
	// Typography
	//
	$wpc->add_setting( 'h1_size', array(
		'default'           => '',
		'sanitize_callback' => 'palermo_sanitize_intval_or_empty',
	) );
	$wpc->add_control( 'h1_size', array(
		'type'    => 'number',
		'section' => 'typography',
		'label'   => esc_html__( 'Content H1 size', 'palermo' ),
	) );

	$wpc->add_setting( 'h2_size', array(
		'default'           => '',
		'sanitize_callback' => 'palermo_sanitize_intval_or_empty',
	) );
	$wpc->add_control( 'h2_size', array(
		'type'    => 'number',
		'section' => 'typography',
		'label'   => esc_html__( 'Content H2 size', 'palermo' ),
	) );

	$wpc->add_setting( 'h3_size', array(
		'default'           => '',
		'sanitize_callback' => 'palermo_sanitize_intval_or_empty',
	) );
	$wpc->add_control( 'h3_size', array(
		'type'    => 'number',
		'section' => 'typography',
		'label'   => esc_html__( 'Content H3 size', 'palermo' ),
	) );

	$wpc->add_setting( 'h4_size', array(
		'default'           => '',
		'sanitize_callback' => 'palermo_sanitize_intval_or_empty',
	) );
	$wpc->add_control( 'h4_size', array(
		'type'    => 'number',
		'section' => 'typography',
		'label'   => esc_html__( 'Content H4 size', 'palermo' ),
	) );

	$wpc->add_setting( 'h5_size', array(
		'default'           => '',
		'sanitize_callback' => 'palermo_sanitize_intval_or_empty',
	) );
	$wpc->add_control( 'h5_size', array(
		'type'    => 'number',
		'section' => 'typography',
		'label'   => esc_html__( 'Content H5 size', 'palermo' ),
	) );

	$wpc->add_setting( 'h6_size', array(
		'default'           => '',
		'sanitize_callback' => 'palermo_sanitize_intval_or_empty',
	) );
	$wpc->add_control( 'h6_size', array(
		'type'    => 'number',
		'section' => 'typography',
		'label'   => esc_html__( 'Content H6 size', 'palermo' ),
	) );

	$wpc->add_setting( 'body_text_size', array(
		'default'           => '',
		'sanitize_callback' => 'palermo_sanitize_intval_or_empty',
	) );
	$wpc->add_control( 'body_text_size', array(
		'type'    => 'number',
		'section' => 'typography',
		'label'   => esc_html__( 'Content body text size', 'palermo' ),
	) );

	$wpc->add_setting( 'widgets_title_size', array(
		'default'           => '',
		'sanitize_callback' => 'palermo_sanitize_intval_or_empty',
	) );
	$wpc->add_control( 'widgets_title_size', array(
		'type'    => 'number',
		'section' => 'typography',
		'label'   => esc_html__( 'Widgets title size', 'palermo' ),
	) );

	$wpc->add_setting( 'widgets_text_size', array(
		'default'           => '',
		'sanitize_callback' => 'palermo_sanitize_intval_or_empty',
	) );
	$wpc->add_control( 'widgets_text_size', array(
		'type'    => 'number',
		'section' => 'typography',
		'label'   => esc_html__( 'Widgets text size', 'palermo' ),
	) );

	$wpc->add_setting( 'uppercase_content_titles', array(
		'default'           => '',
		'sanitize_callback' => 'palermo_sanitize_checkbox',
	) );
	$wpc->add_control( 'uppercase_content_titles', array(
		'type'    => 'checkbox',
		'section' => 'typography',
		'label'   => esc_html__( 'Uppercase all content titles', 'palermo' ),
	) );

	$wpc->add_setting( 'uppercase_widget_titles', array(
		'default'           => '',
		'sanitize_callback' => 'palermo_sanitize_checkbox',
	) );
	$wpc->add_control( 'uppercase_widget_titles', array(
		'type'    => 'checkbox',
		'section' => 'typography',
		'label'   => esc_html__( 'Uppercase widget titles', 'palermo' ),
	) );



	//
	// Social
	//
	$wpc->add_setting( 'social_target', array(
		'default'           => 1,
		'sanitize_callback' => 'palermo_sanitize_checkbox',
	) );
	$wpc->add_control( 'social_target', array(
		'type'    => 'checkbox',
		'section' => 'social',
		'label'   => esc_html__( 'Open social and sharing links in a new tab.', 'palermo' ),
	) );

	$networks = palermo_get_social_networks();

	foreach ( $networks as $network ) {
		$wpc->add_setting( 'social_' . $network['name'], array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		) );
		$wpc->add_control( 'social_' . $network['name'], array(
			'type'    => 'url',
			'section' => 'social',
			'label'   => esc_html( sprintf( _x( '%s URL', 'social network url', 'palermo' ), $network['label'] ) ),
		) );
	}

	$wpc->add_setting( 'rss_feed', array(
		'default'           => get_bloginfo( 'rss2_url' ),
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wpc->add_control( 'rss_feed', array(
		'type'    => 'url',
		'section' => 'social',
		'label'   => esc_html__( 'RSS Feed', 'palermo' ),
	) );



	//
	// Single Post
	//
	$wpc->add_setting( 'single_date', array(
		'default'           => 1,
		'sanitize_callback' => 'palermo_sanitize_checkbox',
	) );
	$wpc->add_control( 'single_date', array(
		'type'    => 'checkbox',
		'section' => 'single_post',
		'label'   => esc_html__( 'Show date.', 'palermo' ),
	) );

	$wpc->add_setting( 'single_categories', array(
		'default'           => 1,
		'sanitize_callback' => 'palermo_sanitize_checkbox',
	) );
	$wpc->add_control( 'single_categories', array(
		'type'    => 'checkbox',
		'section' => 'single_post',
		'label'   => esc_html__( 'Show categories.', 'palermo' ),
	) );

	$wpc->add_setting( 'single_featured', array(
		'default'           => 1,
		'sanitize_callback' => 'palermo_sanitize_checkbox',
	) );
	$wpc->add_control( 'single_featured', array(
		'type'        => 'checkbox',
		'section'     => 'single_post',
		'label'       => esc_html__( 'Show featured image.', 'palermo' ),
	) );

	$wpc->add_setting( 'single_tags', array(
		'default'           => 1,
		'sanitize_callback' => 'palermo_sanitize_checkbox',
	) );
	$wpc->add_control( 'single_tags', array(
		'type'    => 'checkbox',
		'section' => 'single_post',
		'label'   => esc_html__( 'Show tags.', 'palermo' ),
	) );

	$wpc->add_setting( 'single_comments', array(
		'default'           => 1,
		'sanitize_callback' => 'palermo_sanitize_checkbox',
	) );
	$wpc->add_control( 'single_comments', array(
		'type'    => 'checkbox',
		'section' => 'single_post',
		'label'   => esc_html__( 'Show comments.', 'palermo' ),
	) );



	//
	// Titles
	//
	$wpc->add_setting( 'title_blog', array(
		'default'           => esc_html__( 'From the blog', 'palermo' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wpc->add_control( 'title_blog', array(
		'type'    => 'text',
		'section' => 'titles',
		'label'   => esc_html__( 'Blog section title', 'palermo' ),
	) );

	$wpc->add_setting( 'title_search', array(
		'default'           => esc_html__( 'Search results', 'palermo' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wpc->add_control( 'title_search', array(
		'type'    => 'text',
		'section' => 'titles',
		'label'   => esc_html__( 'Search title', 'palermo' ),
	) );

	$wpc->add_setting( 'title_404', array(
		'default'           => esc_html__( 'Page not found', 'palermo' ),
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wpc->add_control( 'title_404', array(
		'type'    => 'text',
		'section' => 'titles',
		'label'   => esc_html__( '404 (page not found) title', 'palermo' ),
	) );



	//
	// Other
	//
	$wpc->add_setting( 'custom_css', array(
		'default'              => '',
		'sanitize_callback'    => 'palermo_sanitize_custom_css',
		'sanitize_js_callback' => 'palermo_sanitize_custom_css',
	) );
	$wpc->add_control( 'custom_css', array(
		'type'    => 'textarea',
		'section' => 'other',
		'label'   => esc_html__( 'Custom CSS', 'palermo' ),
	) );

	$wpc->add_setting( 'google_anaytics_tracking_id', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	) );
	$wpc->add_control( 'google_anaytics_tracking_id', array(
		'type'        => 'text',
		'section'     => 'other',
		'label'       => esc_html__( 'Google Analytics Tracking ID', 'palermo' ),
		'description' => wp_kses( sprintf( __( 'Tracking is enabled only for the non-admin portion of your website. If you need fine-grained control of the tracking code, you are strongly adviced to <a href="%s" target="_blank">use a specialty plugin</a> instead.', 'palermo' ), 'https://wordpress.org/plugins/search.php?q=analytics' ), palermo_get_allowed_tags( 'guide' ) ),
	) );


	$sample_content_url = apply_filters( 'palermo_sample_content_url',
		sprintf( 'https://www.cssigniter.com/sample_content/%s.zip', PALERMO_NAME ),
		'https://www.cssigniter.com/sample_content/',
		PALERMO_NAME
	);

	if ( ! empty( $sample_content_url ) && ( ! defined( 'PALERMO_WHITELABEL' ) || PALERMO_WHITELABEL == false ) ) {
		$wpc->add_setting( 'sample_content_link', array(
			'default' => '',
		) );
		$wpc->add_control( new Palermo_Customize_Static_Text_Control( $wpc, 'sample_content_link', array(
			'section'     => 'other',
			'label'       => esc_html__( 'Resources', 'palermo' ),
			'description' => array(
				wp_kses(
					sprintf( __( '<a href="%s" target="_blank">Download the theme\'s sample content</a> to get things moving.', 'palermo' ),
						esc_url( $sample_content_url )
					),
					palermo_get_allowed_tags( 'guide' )
				),
			),
		) ) );
	}



	//
	// Title + Tagline Section
	//
	$wpc->add_setting( 'limit_logo_size', array(
		'default'           => '',
		'sanitize_callback' => 'palermo_sanitize_checkbox',
	) );
	$wpc->add_control( 'limit_logo_size', array(
		'type'        => 'checkbox',
		'section'     => 'title_tagline',
		'priority'    => 8,
		'label'       => esc_html__( 'Limit logo size (for Retina display)', 'palermo' ),
		'description' => esc_html__( 'This option will limit the image size to half its width. You will need to upload your image in 2x the dimension you want to display it in.', 'palermo' ),
	) );

	$wpc->add_setting( 'logo_site_title', array(
		'default'           => 1,
		'sanitize_callback' => 'palermo_sanitize_checkbox',
	) );
	$wpc->add_control( 'logo_site_title', array(
		'type'    => 'checkbox',
		'section' => 'title_tagline',
		'label'   => esc_html__( 'Show site title below the logo.', 'palermo' ),
	) );

	$wpc->add_setting( 'logo_tagline', array(
		'default'           => '',
		'sanitize_callback' => 'palermo_sanitize_checkbox',
	) );
	$wpc->add_control( 'logo_tagline', array(
		'type'    => 'checkbox',
		'section' => 'title_tagline',
		'label'   => esc_html__( 'Show the tagline below the logo.', 'palermo' ),
	) );

	$wpc->add_setting( 'logo_padding_top', array(
		'default'           => '',
		'sanitize_callback' => 'palermo_sanitize_intval_or_empty',
	) );
	$wpc->add_control( 'logo_padding_top', array(
		'type'    => 'number',
		'section' => 'title_tagline',
		'label'   => esc_html__( 'Logo top padding', 'palermo' ),
	) );

	$wpc->add_setting( 'logo_padding_bottom', array(
		'default'           => '',
		'sanitize_callback' => 'palermo_sanitize_intval_or_empty',
	) );
	$wpc->add_control( 'logo_padding_bottom', array(
		'type'    => 'number',
		'section' => 'title_tagline',
		'label'   => esc_html__( 'Logo bottom padding', 'palermo' ),
	) );
}

add_action( 'customize_register', 'palermo_customize_register_custom_controls', 9 );
/**
 * Registers custom Customizer controls.
 *
 * @param WP_Customize_Manager $wpc Reference to the customizer's manager object.
 */
function palermo_customize_register_custom_controls( $wpc ) {
	require get_template_directory() . '/inc/customizer-controls/static-text.php';
	require get_template_directory() . '/inc/customizer-controls/dropdown-posts.php';
}
