<?php
/**
 * DevCongress eXchange functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package DevCongress eXchange
 */

if ( ! function_exists( 'dc_exchange_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function dc_exchange_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on DevCongress eXchange, use a find and replace
	 * to change 'dc_exchange' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'dc_exchange', get_template_directory() . '/languages' );

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
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'dc_exchange' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'dc_exchange_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // dc_exchange_setup
add_action( 'after_setup_theme', 'dc_exchange_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dc_exchange_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'dc_exchange_content_width', 640 );
}
add_action( 'after_setup_theme', 'dc_exchange_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function dc_exchange_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'dc_exchange' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'dc_exchange_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function dc_exchange_scripts() {
	wp_enqueue_style( 'dc-exchange-style', get_stylesheet_uri() );

	wp_enqueue_script( 'dc-exchange-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array( 'jquery' ), 'v3.3.5', true );
}
add_action( 'wp_enqueue_scripts', 'dc_exchange_scripts' );


/*
* Creating a function to create our CPT
*/
function custom_post_type_exchange() {

    $labels = array(
        'name'                       => _x( 'eXchanges', 'Post Type General Name', 'dc_exchange' ),
        'singular_name'              => _x( 'eXchange', 'Post Type Singular Name', 'dc_exchange' ),
        'add_new'                    => __( 'Add New eXchange', 'dc_exchange' ),
        'add_new_item'               => __( 'Add New eXchange', 'dc_exchange' ),
        'edit_item'                  => __( 'Edit eXchange', 'dc_exchange' ),
        'new_item'                   => __( 'New eXchange', 'dc_exchange' ),
        'view_item'                  => __( 'View eXchange', 'dc_exchange' ),
        'search_items'               => __( 'Search eXchange', 'dc_exchange' ),
        'not_found'                  => __( 'eXchange Not Found', 'dc_exchange' ),
        'not_found_in_trash'         => __( 'eXchange Not found in Trash', 'dc_exchange' ),
        'parent_item_colon'          => __( 'Parent eXchange', 'dc_exchange' ),
        'all_items'                  => __( 'All eXchanges', 'dc_exchange' ),
        'archives'                   => __( 'eXchange Archives', 'dc_exchange' ),
        'inesrt_into_item'           => __( 'Insert into eXchange', 'dc_exchange' ),
        'uploaded_to_this_item'      => __( 'Uploaded to this eXchange', 'dc_exchange' ),
        'featured_image'             => __( 'eXchange Featured Image', 'dc_exchange' ),
        'set_featured_image'         => __( 'Set eXchange Featured Image', 'dc_exchange' ),
        'remove_featured_image'      => __( 'Remove eXchange Featured image', 'dc_exchange' ),
        'use_featured_image'         => __( 'Use as eXchange Featured image', 'dc_exchange' ),
        'menu_name'                  => __( 'eXchanges', 'dc_exchange' )
    );

    $args = array(
        'label'               => __( 'eXchanges', 'dc_exchange' ),
        'description'         => __( 'eXchanges', 'dc_exchange' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'comments', 'thumbnail', 'custom-fields', 'revisions'),
        'taxonomies'          => array( '' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 6,
        'menu_icon'           => 'dashicons-format-video',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );

    register_post_type( 'exchange', $args );
 }

add_action( 'init', 'custom_post_type_exchange');


/*
* Creating a function to create our CPT
*/
function custom_post_type_quote() {

    $labels = array(
        'name'                       => _x( 'Quotes', 'Post Type General Name', 'dc_exchange' ),
        'singular_name'              => _x( 'Quote', 'Post Type Singular Name', 'dc_exchange' ),
        'add_new'                    => __( 'Add New Quote', 'dc_exchange' ),
        'add_new_item'               => __( 'Add New Quote', 'dc_exchange' ),
        'edit_item'                  => __( 'Edit Quote', 'dc_exchange' ),
        'new_item'                   => __( 'New Quote', 'dc_exchange' ),
        'view_item'                  => __( 'View Quote', 'dc_exchange' ),
        'search_items'               => __( 'Search Quote', 'dc_exchange' ),
        'not_found'                  => __( 'Quote Not Found', 'dc_exchange' ),
        'not_found_in_trash'         => __( 'Quote Not found in Trash', 'dc_exchange' ),
        'parent_item_colon'          => __( 'Parent Quote', 'dc_exchange' ),
        'all_items'                  => __( 'All Quotes', 'dc_exchange' ),
        'archives'                   => __( 'Quote Archives', 'dc_exchange' ),
        'inesrt_into_item'           => __( 'Insert into Quote', 'dc_exchange' ),
        'uploaded_to_this_item'      => __( 'Uploaded to this Quote', 'dc_exchange' ),
        'featured_image'             => __( 'eXchange Featured Quote', 'dc_exchange' ),
        'set_featured_image'         => __( 'Set Quote Featured Image', 'dc_exchange' ),
        'remove_featured_image'      => __( 'Remove Quote Featured image', 'dc_exchange' ),
        'use_featured_image'         => __( 'Use as Quote Featured image', 'dc_exchange' ),
        'menu_name'                  => __( 'Quotes', 'dc_exchange' )
    );

    $args = array(
        'label'               => __( 'Quotes', 'dc_exchange' ),
        'description'         => __( 'Quotes', 'dc_exchange' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'custom-fields', 'revisions'),
        'taxonomies'          => array( '' ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 6,
        'menu_icon'           => 'dashicons-format-quote',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'post',
    );

    register_post_type( 'quote', $args );
 }

add_action( 'init', 'custom_post_type_quote');




// Done creating Custom Post Type fo eXchange


/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
* Bootstrap integration
*/
require get_template_directory() . '/inc/functions-strap.php';

