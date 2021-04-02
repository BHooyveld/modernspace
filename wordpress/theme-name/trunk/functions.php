<?php
/**
 * Modernspace functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Modernspace
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'modernspace_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function modernspace_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Modernspace, use a find and replace
		 * to change 'modernspace' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'modernspace', get_template_directory() . '/languages' );

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

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-primary' => esc_html__( 'Primary Menu', 'modernspace' ),
				'menu-footer-col-1' => esc_html__( 'Footer Col 1 Menu', 'modernspace' ),
				'menu-footer-col-2' => esc_html__( 'Footer Col 2 Menu', 'modernspace' ),
			)
		);

		//add_action( 'after_setup_theme', 'register_modernspace_menus' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'caption',
				'style',
				'script',
			)
		);

		/**
		 * Register support for Gutenberg wide images in your theme
		*/

		add_theme_support( 'align-wide' );


		add_theme_support( 'disable-custom-colors' );
		add_theme_support( 'editor-color-palette', array(
			array(
				'name'  => __( 'White gray', 'modernspace' ),
				'slug'  => 'white',
				'color'	=> '#ffffff',
			),
			array(
				'name'  => __( 'Black', 'modernspace' ),
				'slug'  => 'black',
				'color' => '#000000',
			),
			array(
				'name'  => __( 'Dark gray', 'modernspace' ),
				'slug'  => 'dark-gray',
				'color' => '#272727',
			),
			array(
				'name'  => __( 'Gray', 'modernspace' ),
				'slug'  => 'gray',
				'color' => '#8c8c8c',
			),
			array(
				'name'  => __( 'Light Gray', 'modernspace' ),
				'slug'  => 'light-gray',
				'color' => '#c2c2c2',
			),
			array(
				'name'  => __( 'Red', 'modernspace' ),
				'slug'  => 'red',
				'color' => '#f54241',
			),
			array(
				'name'  => __( 'Beige', 'modernspace' ),
				'slug'  => 'beige',
				'color' => '#e0c7b6',
			),
			array(
				'name'  => __( 'Rose Gold', 'modernspace' ),
				'slug'  => 'rose-gold',
				'color' => '#efe3da',
			),
			array(
				'name'  => __( 'Light Blue', 'modernspace' ),
				'slug'  => 'light-blue',
				'color' => '#dfede8',
			),
			array(
				'name'  => __( 'Green', 'modernspace' ),
				'slug'  => 'green',
				'color' => '#3D543A',
			),
			array(
				'name'  => __( 'Light Green', 'modernspace' ),
				'slug'  => 'light-green',
				'color' => '#c1dcc0',
			),

		) );

		// Editor Styles
		add_theme_support( 'editor-styles' );
		add_editor_style( 'editor-styles.css' );

	}
endif;

add_action( 'after_setup_theme', 'modernspace_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function modernspace_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'modernspace_content_width', 1140 );
}
add_action( 'after_setup_theme', 'modernspace_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function modernspace_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer', 'modernspace' ),
			'id'            => 'footer-widget',
			'description'   => esc_html__( 'Add widgets here.', 'modernspace' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'modernspace_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function modernspace_scripts() {
	wp_enqueue_style( 'modernspace-style', get_stylesheet_uri() );
	wp_enqueue_script( 'modernspace-popper', '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'modernspace-vendor-scripts', get_template_directory_uri() . '/assets/js/vendor.min.js', array('jquery'), '20151215', true );
	wp_enqueue_script( 'modernspace-custom-scripts', get_template_directory_uri() . '/assets/js/custom.min.js', array('customize-preview'), '20151215', true );

	wp_enqueue_style( 'slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), '1.8.1' );
	wp_enqueue_style( 'slick-theme', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css', array(), '1.8.1' );
	wp_enqueue_script( 'slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), '1.8.1', true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'modernspace_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom Bootstrap navwalker .
 */

require get_template_directory() . '/inc/bs4navwalker.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Add this to the functions.php file of your WordPress theme
// It filters the mime types using the upload_mimes filter hook
// Add as many keys/values to the $mimes Array as needed

function modernspace_custom_upload_mimes($mimes = array()) {

	// Add a key and value for the CSV file type
	$mimes['csv'] = "text/csv";
	$mimes['svg'] = 'image/svg+xml';

	return $mimes;
}
add_action('upload_mimes', 'modernspace_custom_upload_mimes');


function modernspace_remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'modernspace_remove_admin_login_header');

// unregister all widgets
function unregister_default_widgets() {
	unregister_widget('WP_Widget_Pages');
	unregister_widget('WP_Widget_Calendar');
	unregister_widget('WP_Widget_Archives');
	unregister_widget('WP_Widget_Links');
	unregister_widget('WP_Widget_Meta');
	unregister_widget('WP_Widget_Search');
	unregister_widget('WP_Widget_Text');
	unregister_widget('WP_Widget_Categories');
	unregister_widget('WP_Widget_Recent_Posts');
	unregister_widget('WP_Widget_Recent_Comments');
	unregister_widget('WP_Widget_RSS');
	unregister_widget('WP_Widget_Tag_Cloud');
	unregister_widget('WP_Nav_Menu_Widget');
	unregister_widget('Twenty_Eleven_Ephemera_Widget');
	unregister_widget('WP_Widget_Media_Audio');
	unregister_widget('WP_Widget_Media_Image');
	unregister_widget('WP_Widget_Media_Video');
	unregister_widget('WP_Widget_Media_Gallery');
	unregister_widget('WPForms');
}
	add_action('widgets_init', 'unregister_default_widgets', 11);



	function wpb_filter_query( $query, $error = true ) {
		if ( is_search() ) {
		$query->is_search = false;
		$query->query_vars[s] = false;
		$query->query[s] = false;
		if ( $error == true )
		$query->is_404 = true;
		}
	}
	add_action( 'parse_query', 'wpb_filter_query' );
	add_filter( 'get_search_form', create_function( '$a', "return null;" ) );

	function remove_search_widget() {
		unregister_widget('WP_Widget_Search');
	}
	add_action( 'widgets_init', 'remove_search_widget' );