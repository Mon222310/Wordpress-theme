<?php
/**
 * AKB Blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package AKB_Blog
 */

if (!defined('AKBLOG_VERSION')) {
  // Replace the version number of the theme on each release.
  define('AKBLOG_VERSION', '1.1.0');
}


/**
 * Theme Setup
 */
require_once get_template_directory() . '/inc/theme-setup.php';


/**
 * Theme Functions
 */
require_once get_template_directory() . '/inc/theme-functions.php';


/**
 * Theme Scripts
 */
require_once get_template_directory() . '/inc/theme-scripts.php';

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
require get_template_directory() . '/inc/customizer/customizer.php';

