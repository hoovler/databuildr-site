<?php
/**
 * Editor functions and definitions
 *
 * @package Editor
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 730; /* pixels */
}

if ( ! function_exists( 'editor_setup' ) ) :
/**
 * Sets up Editor's defaults and registers support for various WordPress features.
 */
function editor_setup() {

	/*
	 * Make theme available for translation.
	 */
	load_theme_textdomain( 'editor', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head.
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Add styles to post editor (editor-style.css)
	 */
	add_editor_style();

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 150, 150, true ); // Default Thumb
	add_image_size( 'featured-post-image', 600, 400, true ); // Featured Post Image
	add_image_size( 'large-image', 1200, 9999, false ); // Large Post Image

	/**
	 * Register Navigation menu
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'editor' ),
		'social'  => __( 'Social Links', 'editor' ),
	) );

	/**
	 * Enable support for Post Formats.
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	/**
	 * Custom background feature
	 */
	add_theme_support( 'custom-background', apply_filters( 'editor_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	/**
	 * Enable HTML5 markup. Yes!
	 */
	add_theme_support( 'html5', array(
		'comment-list',
		'search-form',
		'comment-form',
		'gallery',
	) );
}
endif; // editor_setup
add_action( 'after_setup_theme', 'editor_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function editor_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'editor' ),
		'id'            => 'sidebar-1',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'editor_widgets_init' );

/**
 * Return the Google font stylesheet URL
 */
function editor_fonts_url() {

	$fonts_url = '';

	/* Translators: If there are characters in your language that are not
	 * supported by Source Sans Pro, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$source_sans_pro = _x( 'on', 'Source Sans Pro font: on or off', 'editor' );

	/* Translators: If there are characters in your language that are not
	 * supported by Roboto Condensed, translate this to 'off'. Do not translate
	 * into your own language.
	 */
	$roboto_condensed = _x( 'on', 'Roboto Condensed font: on or off', 'editor' );

	if ( 'off' !== $source_sans_pro || 'off' !== $roboto_condensed ) {
		$font_families = array();

		if ( 'off' !== $source_sans_pro )
			$font_families[] = 'Source Sans Pro:400,600,700,400italic,600italic,700italic';

		if ( 'off' !== $roboto_condensed )
			$font_families[] = 'Roboto Condensed:300,400,700,300italic,400italic,700italic';

		$query_args = array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( 'latin,latin-ext' ),
		);
		$fonts_url = add_query_arg( $query_args, "https://fonts.googleapis.com/css" );
	}

	return $fonts_url;
}

/**
 * Enqueue scripts and styles.
 */
function editor_scripts() {
	wp_enqueue_style( 'editor-style', get_stylesheet_uri() );

	/**
	 * FontAwesome Icons Stylesheet
	 */
	wp_enqueue_style( 'editor-font-awesome-css', get_template_directory_uri() . "/inc/fontawesome/font-awesome.css", array(), '4.1.0', 'screen' );

	/**
	 * Load skip link focus fix javascript
	 */
	wp_enqueue_script( 'editor-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	/**
	 * Load Editor's javascript
	 */
	wp_enqueue_script( 'editor-js', get_template_directory_uri() . '/js/editor.js', array('jquery'), '20120206', true );

	/**
	 * Load Roboto Condensed and Sans Source Pro from Google
	 */
	wp_enqueue_style( 'editor-fonts', editor_fonts_url(), array(), null );

	/**
	 * Load the comment reply script
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'editor_scripts' );

/* Enqueue Google fonts style to admin for editor styles */
function editor_admin_fonts( $hook_suffix ) {
	wp_enqueue_style( 'editor-fonts', editor_fonts_url(), array(), null );
}
add_action( 'admin_enqueue_scripts', 'editor_admin_fonts' );

/**
 * Custom template tags for Editor.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer theme options.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Add button class to next/previous post links
 */
function editor_posts_link_attributes() {
	return 'class="button"';
}
add_filter( 'next_posts_link_attributes', 'editor_posts_link_attributes' );
add_filter( 'previous_posts_link_attributes', 'editor_posts_link_attributes' );


// updater for WordPress.com themes
if ( is_admin() )
	include dirname( __FILE__ ) . '/inc/updater.php';
