<?php

/**
 * Enqueue scripts and styles.
 */
function akblog_scripts()
{
  // // bootstrap stylesheet.
  wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', [], null);

  // // Fontawesome V5 stylesheet.
  wp_enqueue_style('fontawesome-5', get_template_directory_uri() . '/assets/css/all.min.css', [], null);

    // Web font loaded.
    wp_enqueue_style('akblog-fonts', 'https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap', [], null );

  // Theme stylesheet.
  wp_enqueue_style('akblog-style', get_stylesheet_uri(), [], AKBLOG_VERSION);

  // Add main stylesheet
  wp_enqueue_style('akblog-main-style', get_template_directory_uri() . '/assets/css/akblog-style.css', [], AKBLOG_VERSION);

  // Add responsive stylesheet
  wp_enqueue_style('akblog-responsive', get_template_directory_uri() . '/assets/css/responsive.css', [], null);


  /**
   * Load All jQuery Library
   */
  wp_enqueue_script('akblog-navigation', get_template_directory_uri() . '/assets/js/navigation.js', [], AKBLOG_VERSION, true);

  wp_enqueue_script('akblog-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', [], AKBLOG_VERSION, true);

  wp_enqueue_script('akblog-popper', get_template_directory_uri() . '/assets/js/popper.min.js', [], AKBLOG_VERSION, true);

  // Add akblog-main js library
  wp_enqueue_script('akblog-scripts-js', get_template_directory_uri() . '/assets/js/akblog-scripts.js', ['jquery'], '', true);

  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}

add_action('wp_enqueue_scripts', 'akblog_scripts');