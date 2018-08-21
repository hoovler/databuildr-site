<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package Editor
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function editor_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
		'render'    => 'editor_render_infinite_posts'
	) );

/**
* Add support for featured content.
* See: http://jetpack.me/support/featured-content/
*/
	add_theme_support( 'featured-content', array(
		'filter'     => 'editor_get_featured_posts',
		'max_posts'  => 10,
		'post_types' => array( 'post', 'page' ),
	) );

/**
* Add support for responsive videos.
*/
	add_theme_support( 'jetpack-responsive-videos' );

/**
* Add support for site logo.
*/
	add_image_size( 'editor-logo', 800, 800 );
	add_theme_support( 'site-logo', array( 'size' => 'editor-logo' ) );
}
add_action( 'after_setup_theme', 'editor_jetpack_setup' );

/* Render infinite posts by using template parts */
function editor_render_infinite_posts() {
	while ( have_posts() ) {
		the_post();

		get_template_part( 'content', get_post_format() );
	}
}

/* Get/return featured content posts. */
function editor_has_featured_posts( $minimum = 1 ) {
	if ( is_paged() )
		return false;

	$minimum = absint( $minimum );
	$featured_posts = apply_filters( 'editor_get_featured_posts', array() );

	if ( ! is_array( $featured_posts ) )
		return false;

	if ( $minimum > count( $featured_posts ) )
		return false;

	return true;
}

function editor_get_featured_posts() {
	return apply_filters( 'editor_get_featured_posts',  array() );
}

/**
 * Return early if Site Logo is not available.
 */
function editor_the_site_logo() {
	if ( ! function_exists( 'jetpack_the_site_logo' ) ) {
		return;
	} else {
		jetpack_the_site_logo();
	}
}
