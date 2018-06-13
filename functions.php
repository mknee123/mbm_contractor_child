<?php

function contractor_child_setup() {
  // Prepare theme for translation
  load_child_theme_textdomain( 'contractor-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme' , 'contractor_child_setup' );
// Enqueues necessary CSS

// Removes unneccessary scripts and enqueues proper ones
function theme_enqueue_scripts() {
	wp_deregister_script('jquery');   // We do this so we can enqueue a more recent version
	wp_enqueue_script('jquery',    ('https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js'), '', '', false);

}
add_action('wp_enqueue_scripts', 'theme_enqueue_scripts');
// Add theme support for featured images
add_theme_support('post-thumbnails');

// Add theme support for shortcodes in widgets
add_filter('widget_text', 'do_shortcode');


// Initiates CPTs, CMB2, etc...
require_once('murkat-library/murkat.php');
