<?php
/**
 * Twenty Seventeen functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 */
/**
 * Twenty Seventeen only works in WordPress 4.7 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
	return;
}
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function twentyseventeen_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentyseventeen
	 * If you're building a theme based on Twenty Seventeen, use a find and replace
	 * to change 'twentyseventeen' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'twentyseventeen' );
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
	add_image_size( 'twentyseventeen-featured-image', 2000, 1200, true );
	add_image_size( 'twentyseventeen-thumbnail-avatar', 100, 100, true );
	// Set the default content width.
	$GLOBALS['content_width'] = 525;
	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'top'    => __( 'Top Menu', 'twentyseventeen' ),
		'social' => __( 'Social Links Menu', 'twentyseventeen' ),
	) );
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'audio',
	) );
	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
	) );
	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
	 */
	add_editor_style( array( 'assets/css/editor-style.css', twentyseventeen_fonts_url() ) );
	// Define and register starter content to showcase the theme on new sites.
	$starter_content = array(
		'widgets' => array(
			// Place three core-defined widgets in the sidebar area.
			'sidebar-1' => array(
				'text_business_info',
				'search',
				'text_about',
			),
			// Add the core-defined business info widget to the footer 1 area.
			'sidebar-2' => array(
				'text_business_info',
			),
			// Put two core-defined widgets in the footer 2 area.
			/*'sidebar-3' => array(
				'text_about',
				'search',
			),*/
		),
		// Specify the core-defined pages to create and add custom thumbnails to some of them.
		'posts' => array(
			'home',
			'about' => array(
				'thumbnail' => '{{image-sandwich}}',
			),
			'contact' => array(
				'thumbnail' => '{{image-espresso}}',
			),
			'blog' => array(
				'thumbnail' => '{{image-coffee}}',
			),
			'homepage-section' => array(
				'thumbnail' => '{{image-espresso}}',
			),
		),
		// Create the custom image attachments used as post thumbnails for pages.
		'attachments' => array(
			'image-espresso' => array(
				'post_title' => _x( 'Espresso', 'Theme starter content', 'twentyseventeen' ),
				'file' => 'assets/images/espresso.jpg', // URL relative to the template directory.
			),
			'image-sandwich' => array(
				'post_title' => _x( 'Sandwich', 'Theme starter content', 'twentyseventeen' ),
				'file' => 'assets/images/sandwich.jpg',
			),
			'image-coffee' => array(
				'post_title' => _x( 'Coffee', 'Theme starter content', 'twentyseventeen' ),
				'file' => 'assets/images/coffee.jpg',
			),
		),
		// Default to a static front page and assign the front and posts pages.
		'options' => array(
			'show_on_front' => 'page',
			'page_on_front' => '{{home}}',
			'page_for_posts' => '{{blog}}',
		),
		// Set the front page section theme mods to the IDs of the core-registered pages.
		'theme_mods' => array(
			'panel_1' => '{{homepage-section}}',
			'panel_2' => '{{about}}',
			'panel_3' => '{{blog}}',
			'panel_4' => '{{contact}}',
		),
		// Set up nav menus for each of the two areas registered in the theme.
		'nav_menus' => array(
			// Assign a menu to the "top" location.
			'top' => array(
				'name' => __( 'Top Menu', 'twentyseventeen' ),
				'items' => array(
					'link_home', // Note that the core "home" page is actually a link in case a static front page is not used.
					'page_about',
					'page_blog',
					'page_contact',
				),
			),
			// Assign a menu to the "social" location.
			'social' => array(
				'name' => __( 'Social Links Menu', 'twentyseventeen' ),
				'items' => array(
					'link_yelp',
					'link_facebook',
					'link_twitter',
					'link_instagram',
					'link_email',
				),
			),
		),
	);
	/**
	 * Filters Twenty Seventeen array of starter content.
	 *
	 * @since Twenty Seventeen 1.1
	 *
	 * @param array $starter_content Array of starter content.
	 */
	$starter_content = apply_filters( 'twentyseventeen_starter_content', $starter_content );
	add_theme_support( 'starter-content', $starter_content );
}
add_action( 'after_setup_theme', 'twentyseventeen_setup' );
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function twentyseventeen_content_width() {
	$content_width = $GLOBALS['content_width'];
	// Get layout.
	$page_layout = get_theme_mod( 'page_layout' );
	// Check if layout is one column.
	if ( 'one-column' === $page_layout ) {
		if ( twentyseventeen_is_frontpage() ) {
			$content_width = 644;
		} elseif ( is_page() ) {
			$content_width = 740;
		}
	}
	// Check if is single post and there is no sidebar.
	if ( is_single() && ! is_active_sidebar( 'sidebar-1' ) ) {
		$content_width = 740;
	}
	/**
	 * Filter Twenty Seventeen content width of the theme.
	 *
	 * @since Twenty Seventeen 1.0
	 *
	 * @param int $content_width Content width in pixels.
	 */
	$GLOBALS['content_width'] = apply_filters( 'twentyseventeen_content_width', $content_width );
}
add_action( 'template_redirect', 'twentyseventeen_content_width', 0 );
/**
 * Register custom fonts.
 */
function twentyseventeen_fonts_url() {
	$fonts_url = '';
	/*
	 * Translators: If there are characters in your language that are not
	 * supported by Libre Franklin, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$libre_franklin = _x( 'on', 'Libre Franklin font: on or off', 'twentyseventeen' );
	if ( 'off' !== $libre_franklin ) {
		$font_families = array();
		$font_families[] = 'Libre Franklin:300,300i,400,400i,600,600i,800,800i';
		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}
	return esc_url_raw( $fonts_url );
}
/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array  $urls           URLs to print for resource hints.
 * @param string $relation_type  The relation type the URLs are printed.
 * @return array $urls           URLs to print for resource hints.
 */
function twentyseventeen_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'twentyseventeen-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		$urls[] = array(
			'href' => 'https://fonts.gstatic.com',
			'crossorigin',
		);
	}
	return $urls;
}
add_filter( 'wp_resource_hints', 'twentyseventeen_resource_hints', 10, 2 );
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function twentyseventeen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'twentyseventeen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Language', 'twentyseventeen' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets language bar.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => __( 'Footer 2', 'twentyseventeen' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
		'before_widget' => '<section id="%1$s" class="lang widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'twentyseventeen_widgets_init' );
/**
 * Replaces "[...]" (appended to automatically generated excerpts) with ... and
 * a 'Continue reading' link.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $link Link to single post/page.
 * @return string 'Continue reading' link prepended with an ellipsis.
 */
function twentyseventeen_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}
	$link = sprintf( '<p class="link-more"><a href="%1$s" class="more-link">%2$s</a></p>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentyseventeen' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
}
add_filter( 'excerpt_more', 'twentyseventeen_excerpt_more' );
/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Seventeen 1.0
 */
function twentyseventeen_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'twentyseventeen_javascript_detection', 0 );
/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function twentyseventeen_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", get_bloginfo( 'pingback_url' ) );
	}
}
add_action( 'wp_head', 'twentyseventeen_pingback_header' );
/**
 * Display custom color CSS.
 */
function twentyseventeen_colors_css_wrap() {
	if ( 'custom' !== get_theme_mod( 'colorscheme' ) && ! is_customize_preview() ) {
		return;
	}
	require_once( get_parent_theme_file_path( '/inc/color-patterns.php' ) );
	$hue = absint( get_theme_mod( 'colorscheme_hue', 250 ) );
?>
	<style type="text/css" id="custom-theme-colors" <?php if ( is_customize_preview() ) { echo 'data-hue="' . $hue . '"'; } ?>>
		<?php echo twentyseventeen_custom_colors_css(); ?>
	</style>
<?php }
add_action( 'wp_head', 'twentyseventeen_colors_css_wrap' );
/**
 * Enqueue scripts and styles.
 */
function twentyseventeen_scripts() {
	// Add custom fonts, used in the main stylesheet.
	//wp_enqueue_style( 'twentyseventeen-fonts', twentyseventeen_fonts_url(), array(), null );
	// Theme stylesheet.
	//wp_enqueue_style( 'twentyseventeen-style', get_stylesheet_uri() );
	// Load the dark colorscheme.
	if ( 'dark' === get_theme_mod( 'colorscheme', 'light' ) || is_customize_preview() ) {
		//wp_enqueue_style( 'twentyseventeen-colors-dark', get_theme_file_uri( '/assets/css/colors-dark.css' ), array( 'twentyseventeen-style' ), '1.0' );
	}
	// Load the Internet Explorer 9 specific stylesheet, to fix display issues in the Customizer.
	if ( is_customize_preview() ) {
		wp_enqueue_style( 'twentyseventeen-ie9', get_theme_file_uri( '/assets/css/ie9.css' ), array( 'twentyseventeen-style' ), '1.0' );
		wp_style_add_data( 'twentyseventeen-ie9', 'conditional', 'IE 9' );
	}
	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'twentyseventeen-ie8', get_theme_file_uri( '/assets/css/ie8.css' ), array( 'twentyseventeen-style' ), '1.0' );
	wp_style_add_data( 'twentyseventeen-ie8', 'conditional', 'lt IE 9' );
	// Load the html5 shiv.
	wp_enqueue_script( 'html5', get_theme_file_uri( '/assets/js/html5.js' ), array(), '3.7.3' );
	wp_enqueue_style( 'font-awesome', get_theme_file_uri( '/css/font-awesome.min.css' ));
	//wp_enqueue_style( 'stylein', get_theme_file_uri( '/assets/css/style.css' ) );
	//wp_enqueue_script( 'jquery.jInvertScroll.min', get_theme_file_uri( '/js/jquery.jInvertScroll.min.js', array(), '1' ) );
	//wp_enqueue_script( 'jquery-3.3.1.min', get_theme_file_uri( '/assets/js/jquery-3.3.1.min.js' , array(), '1') );
	//wp_enqueue_script( 'mainht', get_theme_file_uri( '/js/main.js', array(), '1' ) );
	//wp_enqueue_script( 'mainht', get_theme_file_uri( '/js/skrollr.min.js', array(), '1' ) );
	//skrollr.min
	wp_script_add_data( 'html5', 'conditional', 'lt IE 9' );
	//wp_enqueue_script( 'twentyseventeen-skip-link-focus-fix', get_theme_file_uri( '/assets/js/skip-link-focus-fix.js' ), array(), '1.0', true );
	$twentyseventeen_l10n = array(
		'quote'          => twentyseventeen_get_svg( array( 'icon' => 'quote-right' ) ),
	);
	if ( has_nav_menu( 'top' ) ) {
		wp_enqueue_script( 'twentyseventeen-navigation', get_theme_file_uri( '/assets/js/navigation.js' ), array( 'jquery' ), '1.0', true );
		$twentyseventeen_l10n['expand']         = __( 'Expand child menu', 'twentyseventeen' );
		$twentyseventeen_l10n['collapse']       = __( 'Collapse child menu', 'twentyseventeen' );
		$twentyseventeen_l10n['icon']           = twentyseventeen_get_svg( array( 'icon' => 'angle-down', 'fallback' => true ) );
	}
	//wp_enqueue_script( 'twentyseventeen-global', get_theme_file_uri( '/assets/js/global.js' ), array( 'jquery' ), '1.0', true );
	//wp_enqueue_script( 'jquery-scrollto', get_theme_file_uri( '/assets/js/jquery.scrollTo.js' ), array( 'jquery' ), '2.1.2', true );
	wp_localize_script( 'twentyseventeen-skip-link-focus-fix', 'twentyseventeenScreenReaderText', $twentyseventeen_l10n );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'twentyseventeen_scripts' );
/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
function twentyseventeen_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];
	if ( 740 <= $width ) {
		$sizes = '(max-width: 706px) 89vw, (max-width: 767px) 82vw, 740px';
	}
	if ( is_active_sidebar( 'sidebar-1' ) || is_archive() || is_search() || is_home() || is_page() ) {
		if ( ! ( is_page() && 'one-column' === get_theme_mod( 'page_options' ) ) && 767 <= $width ) {
			 $sizes = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
		}
	}
	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'twentyseventeen_content_image_sizes_attr', 10, 2 );
/**
 * Filter the `sizes` value in the header image markup.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $html   The HTML image tag markup being filtered.
 * @param object $header The custom header object returned by 'get_custom_header()'.
 * @param array  $attr   Array of the attributes for the image tag.
 * @return string The filtered header image HTML.
 */
function twentyseventeen_header_image_tag( $html, $header, $attr ) {
	if ( isset( $attr['sizes'] ) ) {
		$html = str_replace( $attr['sizes'], '100vw', $html );
	}
	return $html;
}
add_filter( 'get_header_image_tag', 'twentyseventeen_header_image_tag', 10, 3 );
/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param array $attr       Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size       Registered image size or flat array of height and width dimensions.
 * @return array The filtered attributes for the image markup.
 */
function twentyseventeen_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( is_archive() || is_search() || is_home() ) {
		$attr['sizes'] = '(max-width: 767px) 89vw, (max-width: 1000px) 54vw, (max-width: 1071px) 543px, 580px';
	} else {
		$attr['sizes'] = '100vw';
	}
	return $attr;
}
//add_filter( 'wp_get_attachment_image_attributes', 'twentyseventeen_post_thumbnail_sizes_attr', 10, 3 );
/**
 * Use front-page.php when Front page displays is set to a static page.
 *
 * @since Twenty Seventeen 1.0
 *
 * @param string $template front-page.php.
 *
 * @return string The template to be used: blank if is_home() is true (defaults to index.php), else $template.
 */
function twentyseventeen_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
//add_filter( 'frontpage_template',  'twentyseventeen_front_page_template' );
/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since Twenty Seventeen 1.4
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function twentyseventeen_widget_tag_cloud_args( $args ) {
	$args['largest']  = 1;
	$args['smallest'] = 1;
	$args['unit']     = 'em';
	$args['format']   = 'list';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'twentyseventeen_widget_tag_cloud_args' );
/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );
/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );
/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );
/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );
/**
 * SVG icons functions and filters.
 */
require get_parent_theme_file_path( '/inc/icon-functions.php' );
 //*------- ACF Theme Option  --------------*/
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title'     => 'Theme Option',
		'menu_title'    => 'Theme Option',
		'menu_slug'     => 'theme-option',
		'capability'    => 'edit_posts',
		'redirect'  => false
	));
	acf_add_options_sub_page(array(
		'page_title'  => 'Header Option',
		'menu_title' => 'Header',
		'menu_slug'  => 'general-settings',
		'parent_slug'    => 'theme-option',
		'redirect'  => false
	));
	acf_add_options_sub_page(array(
		'page_title'     => 'Footer Settings',
		'menu_title'    => 'Footer',
		'parent_slug'    => 'theme-option',
	));
}
/*--- end --- button shortcode home page*/
//[CTAButton title="Apply now!" url="/php-developer/#apply-now" id="php-developer-cta" class="classname" target="_blank"]
add_shortcode('CTAButton','more_button_link');
function more_button_link($args)
{
	if(!$args['title'])
	{
	$args['title'] = 	'Tell me more!';
	}
	$html='';
	   $html.='<a target="'.$args['target'].'" href="'.$args['url'].'" title="'.$args['title'].'" id="'.$args['id'].'" class="'.$args['id'].' btn btn--solid  '.$args['class'] .'">'.$args['title'].' <img src="'. get_template_directory_uri().'/assets/images/arrow-small.svg" alt="arrow" class="btn-icn"></a>';
	return $html;
}
/******SVG allow**************/
function add_svg_to_upload_mimes( $upload_mimes ) {
	$upload_mimes['svg'] = 'image/svg+xml';
	$upload_mimes['svgz'] = 'image/svg+xml';
	return $upload_mimes;
}
add_filter( 'upload_mimes', 'add_svg_to_upload_mimes', 10, 1 );
//custom blog pagination code start here
// Receive the Request post that came from AJAX
add_action( 'wp_ajax_demo-pagination-load-posts', 'cvf_demo_pagination_load_posts' );
// We allow non-logged in users to access our pagination
add_action( 'wp_ajax_nopriv_demo-pagination-load-posts', 'cvf_demo_pagination_load_posts' );
function cvf_demo_pagination_load_posts() {
	global $wpdb;
	// Set default variables
	$msg = '';
	if(isset($_POST['page'])){
		// Sanitize the received page
		$page = sanitize_text_field($_POST['page']);
		$cur_page = $page;
		$page -= 1;
		// Set the number of results to display
		$per_page = 6;
		$previous_btn = true;
		$next_btn = true;
		$first_btn = true;
		$last_btn = true;
		$start = $page * $per_page;
		// Set the table where we will be querying data
		$table_name = $wpdb->prefix . "posts";
		// Query the necessary posts
		// $all_blog_posts = $wpdb->get_results($wpdb->prepare(" SELECT * FROM " . $table_name . " WHERE post_type = 'post' AND post_status = 'publish' ORDER BY post_date DESC LIMIT %d, %d", $start, $per_page ) );
		/*$all_blog_posts = $wpdb->get_results($wpdb->prepare(" SELECT *
		FROM wp_posts wposts, wp_postmeta wpostmeta, $wpdb->icl_translations wicl_translations
		WHERE wposts.ID = wpostmeta.post_id,
		AND post_type = 'post',
		AND wposts.post_status = 'publish'
		AND wicl_translations.element_id = wposts.ID
		AND wicl_translations.language_code = 'en'
		AND wposts.post_type = 'post'  ORDER BY post_date DESC LIMIT %d, %d", $start, $per_page ));
		// At the same time, count the number of queried posts*/
		//$count = $wpdb->get_var($wpdb->prepare("SELECT COUNT(ID) FROM " . $table_name . " WHERE post_type = 'post' AND post_status = 'publish'", array() ) );
		$all_blog_posts = new WP_Query(
			array(
				'post_type'         => 'post',
				'post_status '      => 'publish',
				'orderby'           => 'post_date',
				'order'             => 'DESC',
				'posts_per_page'    => $per_page,
				'offset'            => $start
			)
		);
		$count = new WP_Query(
			array(
				'post_type'         => 'post',
				'post_status '      => 'publish',
				'posts_per_page'    => -1
			)
		);
		//echo '<pre>';
		$count = count($count->posts);
	   // foreach($all_blog_posts as $key => $post):
		while ( $all_blog_posts ->have_posts() ) : $all_blog_posts->the_post();
			// Set the desired output into a variable
			 $terms = wp_get_post_terms( $post->ID, 'brands', $args );
			 $term_id = $terms[0]->term_id;
			 $small_brand_image = get_field('small_brand_image','brands_'. $term_id);
			 $term_name = $terms[0]->name;
			 $string = preg_replace('/\s+/', '_', get_the_title($post->ID));
			 $string  = strtolower($string );
			 $msg.= '<div class="auto-width--child content-img--child">
						<a href="'.get_the_permalink($post->ID).'" title="'.get_the_title($post->ID).'" class="blog-listing-link" id="blog_'.$string.'">
							<figure class="blog-listing-img bg-img" style="background-image: url('.get_the_post_thumbnail_url($post->ID).')">
								<img src="'.$small_brand_image['url'].'" alt="" class="blog-listing-brand svg-convert">
							</figure>
							<div class="blog-listing-detail">
								<h5>'.get_the_title($post->ID).'</h5>
								<span class="btn btn--hollow">Tell me more! <img src="'.get_template_directory_uri().'/assets/images/arrow-small.svg" alt="arrow" class="btn-icn"></span>
							</div>
						</a>
					</div>';
		endwhile;
		//endforeach;
		// Optional, wrap the output into a container
		$msg = "<div class='content-img--parent auto-width--parent'>" . $msg . "</div><br class = 'clear' />";
		// This is where the magic happens
		$no_of_paginations = ceil($count / $per_page);
		if ($cur_page >= 7) {
			$start_loop = $cur_page - 3;
			if ($no_of_paginations > $cur_page + 3)
				$end_loop = $cur_page + 3;
			else if ($cur_page <= $no_of_paginations && $cur_page > $no_of_paginations - 6) {
				$start_loop = $no_of_paginations - 6;
				$end_loop = $no_of_paginations;
			} else {
				$end_loop = $no_of_paginations;
			}
		} else {
			$start_loop = 1;
			if ($no_of_paginations > 7)
				$end_loop = 7;
			else
				$end_loop = $no_of_paginations;
		}
	   /// echo $no_of_paginations;
		// Pagination Buttons logic
		$pag_container .= "
		<div class='cvf-universal-pagination'>
			";
		/*if ($first_btn && $cur_page > 1) {
			$pag_container .= "<!--<li p='1' class='active'>First</li>-->";
		} else if ($first_btn) {
			$pag_container .= "<!--<li p='1' class='inactive'>First</li>-->";
		}*/
		if ($previous_btn && $cur_page > 1) {
			$pre = $cur_page - 1;
			$pag_container .= "<span p='$pre' class='active pagination-button pagi-prev'> </span>";
		} else if ($previous_btn) {
			$pag_container .= "<span class='inactive pagination-button pagi-prev'> </span>";
		}
		for ($i = $start_loop; $i <= $end_loop; $i++) {
			if ($cur_page == $i)
				$pag_container .= "<span p='$i' class = 'selected pagination-button page-num' >{$i}</span>";
			else
				$pag_container .= "<span p='$i' class='active pagination-button page-num'>{$i}</span>";
		}
		if ($next_btn && $cur_page < $no_of_paginations) {
			$nex = $cur_page + 1;
			$pag_container .= "<span p='$nex' class='active pagination-button pagi-next'> </span>";
		} else if ($next_btn) {
			$pag_container .= "<span class='inactive pagination-button pagi-next'> </span>";
		}
	   /* if ($last_btn && $cur_page < $no_of_paginations) {
			$pag_container .= "<!---<li p='$no_of_paginations' class='active'>Last</li>--->";
		} else if ($last_btn) {
			$pag_container .= "<!---<li p='$no_of_paginations' class='inactive'>Last</li>--->";
		}*/
		$pag_container = $pag_container . "
		</div>";
		// We echo the final output
		if($no_of_paginations == 1){}else{
		echo '<div class="pagination">' . $pag_container . '</div>'; }
		echo '<div class = "cvf-pagination-content">' . $msg . '</div>';
	}
	// Always exit to avoid further execution
	exit();
}
// Custom pagination close here
 $labels = array(
	'name' => _x( 'Brand', 'taxonomy general name' ),
	'singular_name' => _x( 'Brand', 'taxonomy singular name' ),
	'search_items' =>  __( 'Search Brands' ),
	'popular_items' => __( 'Popular Brand' ),
	'all_items' => __( 'All Brands' ),
	'parent_item' => null,
	'parent_item_colon' => null,
	'edit_item' => __( 'Edit Brand' ),
	'update_item' => __( 'Update Brand' ),
	'add_new_item' => __( 'Add New Brand' ),
	'new_item_name' => __( 'New Brand Name' ),
	'separate_items_with_commas' => __( 'Separate Brands with commas' ),
	'add_or_remove_items' => __( 'Add or remove brands' ),
	'choose_from_most_used' => __( 'Choose from the most used brands' ),
	'menu_name' => __( 'Brands' ),
  );
register_taxonomy('brands','post',array(
	'hierarchical' => false,
	'labels' => $labels,
	'show_ui' => true,
	'show_admin_column' => true,
	'update_count_callback' => '_update_post_term_count',
	'query_var' => true,
	'rewrite' => array( 'slug' => 'brands' ),
  ));
/******************salesforce******************************
add_action( 'wpcf7_before_send_mail', 'my_conversion' );
function my_conversion( $cf7 )
{
  $email = 'ketan';
  $first_name  = 'fnames';
  $last_name  = 'umrt';
  $phone = '5698785688';
  //$phone = $cf7->posted_data["your-phone"];
  //$best_time = $cf7->posted_data["best-time-to-call"];
  $post_items[] = 'oid=01Z7F000000InNl';
  $post_items[] = 'first_name=' . $first_name;
  $post_items[] = 'last_name=' . $last_name;
  $post_items[] = 'email=' . $email;
  $post_items[] = 'phone=' . $phone;
  $post_items[] = '00NU00000031VX4='.$best_time;
  if(!empty($first_name) && !empty($last_name) && !empty($email) )
  {
	$post_string = implode ('&', $post_items);
	// Create a new cURL resource
	$ch = curl_init();
	if (curl_error($ch) != "")
	{
	  // error handling
	}
	$con_url = 'https://www.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8';
	curl_setopt($ch, CURLOPT_URL, $con_url);
	// Set the method to POST
	curl_setopt($ch, CURLOPT_POST, 1);
	// Pass POST data
	curl_setopt( $ch, CURLOPT_POSTFIELDS, $post_string);
	curl_exec($ch); // Post to Salesforce
	curl_close($ch); // close cURL resource
  }
}*/
define('ICL_DONT_LOAD_NAVIGATION_CSS', true);
define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);
// include custom jQuery
function shapeSpace_include_custom_jquery() {
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), null, false);
}
add_action('wp_enqueue_scripts', 'shapeSpace_include_custom_jquery');

function cache_bust_css() {
	$cache_buster = filemtime( get_template_directory() . '/style.css' );
	wp_enqueue_style( 'main', get_stylesheet_directory_uri() . '/style.css', array(), $cache_buster, 'all' );
}

add_action( 'wp_enqueue_scripts', 'cache_bust_css', 1);


function nav_vlue_count_section($count_nav)
{
	if(count($count_nav) > 1 )
	{
		
		$nvincrg = 1;
	?>
	
		   <ul class="nav-list">
		   <?php  foreach($count_nav as $count_val)
			   {  
			   if($nvincrg == 1)
			   {
				   echo '<li class="active-num"><a href="#sec-'.$nvincrg.'"><span class="nav-num">0'.$nvincrg.'</span></a> <span class="nav-title">'.$count_val.'</span> </li>';
				   }else{
					   $strng = $count_val;
					   
					   if($nvincrg<10)
					   {
						$strng = '0'.$nvincrg;   
					   }
					   
				   echo '<li><a href="#sec-'.$nvincrg.'"><span class="nav-num">'.$strng.'</span></a> <span class="nav-title">'.$count_val.'</span></li> ';
			   }
				   $nvincrg++;
			   }?>
			</ul>
	<?php
	}
}