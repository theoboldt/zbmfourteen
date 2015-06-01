<?php

// Custom template tags for this theme.
require get_stylesheet_directory() . '/inc/template-tags.php';

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since Twenty Fourteen 1.0
 */
function zbmfourteen_scripts() {
	$version	= '20150601';

	//dequeue unused files
	wp_dequeue_style('twentyfourteen-lato');
	wp_dequeue_style('genericons');
	wp_dequeue_style('twentyfourteen-style');

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_dequeue_script( 'comment-reply' );
	}
	if ( is_singular() && wp_attachment_is_image() ) {
		wp_dequeue_script( 'twentyfourteen-keyboard-image-navigation');
	}
	if ( is_active_sidebar( 'sidebar-3' ) ) {
		wp_dequeue_script( 'jquery-masonry' );
	}
	if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) ) {
		wp_dequeue_script( 'twentyfourteen-slider');
	}
	wp_dequeue_script('twentyfourteen-script');

	// Load our main stylesheet.
	wp_enqueue_style( 'zbmfourteen-font', 'http://fonts.googleapis.com/css?family=Boogaloo' );
	if (WP_DEBUG) {
		wp_enqueue_style( 'zbmfourteen-style', get_stylesheet_uri(), array('zbmfourteen-font') );
	} else {
		wp_enqueue_style( 'zbmfourteen-style', get_stylesheet_directory_uri().'/style.min.css', array('zbmfourteen-font') );
	}

	if (WP_DEBUG) {
		wp_enqueue_script( 'zbmfourteen-countdown', get_stylesheet_directory_uri() . '/js/jquery.countdown.min.js', array( 'jquery' ), $version, true );
		wp_enqueue_script( 'zbmfourteen-carousel', get_stylesheet_directory_uri() . '/js/bootstrap/carousel.js', array( 'jquery' ), $version, true );
		wp_enqueue_script( 'zbmfourteen-transition', get_stylesheet_directory_uri() . '/js/bootstrap/transition.js', array( 'jquery' ), $version, true );
		wp_enqueue_script( 'zbmfourteen-functions', get_stylesheet_directory_uri() . '/js/functions.js', array( 'jquery', 'zbmfourteen-transition', 'zbmfourteen-carousel' ), $version, true );
	} else {
		wp_enqueue_script( 'zbmfourteen-all', get_stylesheet_directory_uri() . '/script.min.js', array( 'jquery' ), $version, true );
	}
}
add_action( 'wp_enqueue_scripts', 'zbmfourteen_scripts', 100 );


/**
 * Deregister WordPress default jQuery
 * Register and Enqueue Google CDN jQuery
 */
function textdomain_jquery_enqueue() {
   wp_deregister_script( 'jquery' );
   wp_register_script( 'jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://code.jquery.com/jquery-2.1.4.min.js", false, null );
//   wp_register_script( 'jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js", false, null );
   wp_enqueue_script( 'jquery' );
}
if ( !is_admin() ) {
	add_action( 'wp_enqueue_scripts', 'textdomain_jquery_enqueue', 11 );
}
