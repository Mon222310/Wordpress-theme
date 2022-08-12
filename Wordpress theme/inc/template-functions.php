<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package AKB_Blog
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function akblog_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'akblog_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function akblog_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'akblog_pingback_header' );



/**

 * Limit excerpt to a number of characters

 *

 * @param string $excerpt

 * @return string

 */

function akblog_short_excerpt($excerpt){

return substr($excerpt, 0, 200);

}

add_filter('the_excerpt', 'akblog_short_excerpt');
