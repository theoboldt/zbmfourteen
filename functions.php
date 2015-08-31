<?php

// Custom template tags for this theme.
require get_stylesheet_directory() . '/inc/template-tags.php';

if ( ! isset( $content_width ) ) {
	$content_width = 850;
}

add_filter( 'comments_open', 'filter_media_comment_status', 10 , 2 );
function filter_media_comment_status( $open, $post_id ) {
    $post = get_post( $post_id );
    if( $post->post_type == 'attachment' ) {
        return false;
    }
    return $open;
}

/**
 * Enqueue scripts and styles for the front end.
 *
 * @since Twenty Fourteen 1.0
 */
function zbmfourteen_scripts() {
	$version	= '20150603';

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
	wp_dequeue_script('twentyfourteen-style');

	if (WP_DEBUG) {
		wp_enqueue_style( 'zbmfourteen-style', get_stylesheet_uri(), array('zbmfourteen-font') );
	} else {
		wp_enqueue_style( 'zbmfourteen-style', get_stylesheet_directory_uri().'/style.php', array('zbmfourteen-font'), filemtime(dirname(__FILE__).'/style.min.css') );
	}

	if (WP_DEBUG) {
		wp_enqueue_script( 'zbmfourteen-countdown', get_stylesheet_directory_uri() . '/js/jquery.countdown.min.js', array( 'jquery' ), $version, true );
		wp_enqueue_script( 'zbmfourteen-carousel', get_stylesheet_directory_uri() . '/js/bootstrap/carousel.js', array( 'jquery' ), $version, true );
		wp_enqueue_script( 'zbmfourteen-transition', get_stylesheet_directory_uri() . '/js/bootstrap/transition.js', array( 'jquery' ), $version, true );
		wp_enqueue_script( 'zbmfourteen-functions', get_stylesheet_directory_uri() . '/js/functions.js', array( 'jquery', 'zbmfourteen-transition', 'zbmfourteen-carousel' ), $version, true );
/*
		//tiled gallery
		wp_enqueue_script( 'zbmfourteen-gallery-spin', get_stylesheet_directory_uri() . '/js/tiled-gallery/spin.js', array(), $version, true );
		wp_enqueue_script( 'zbmfourteen-gallery-jqspin', get_stylesheet_directory_uri() . '/js/tiled-gallery/jquery.spin.js', array( 'jquery', 'zbmfourteen-gallery-spin' ), $version, true );
		wp_enqueue_script( 'zbmfourteen-gallery-carousel', get_stylesheet_directory_uri() . '/js/tiled-gallery/jetpack-carousel.js', array( 'jquery', 'zbmfourteen-gallery-jqspin' ), $version, true );
		wp_enqueue_script( 'zbmfourteen-gallery-tiled', get_stylesheet_directory_uri() . '/js/tiled-gallery/tiled-gallery.js', array( 'jquery' ), $version, true );
*/
	} else {
		wp_enqueue_script( 'zbmfourteen-all', get_stylesheet_directory_uri() . '/script.php', array( 'jquery' ), filemtime(dirname(__FILE__).'/script.min.js'), true );
	}

	remove_action( 'wp_enqueue_scripts', 'twentyfourteen_scripts' );
}
add_action( 'wp_enqueue_scripts', 'zbmfourteen_scripts', 1 );


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

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

/**
 * Remove tiled gallery styles
*/
if (WP_DEBUG) {
	function tweakjp_rm_tiledcss(){
    	wp_dequeue_style( 'tiled-gallery' );
	}
	add_action( 'wp_footer', 'tweakjp_rm_tiledcss' );
	function changejp_dequeue_styles() {
    	wp_dequeue_style( 'jetpack-carousel' );
	}
	add_action( 'post_gallery', 'changejp_dequeue_styles', 1001 );
}


/*
			wp_register_script( 'spin', plugins_url( 'spin.js', __FILE__ ), false, '1.3' );
			wp_register_script( 'jquery.spin', plugins_url( 'jquery.spin.js', __FILE__ ) , array( 'jquery', 'spin' ) );

			wp_enqueue_script( 'jetpack-carousel', plugins_url( 'jetpack-carousel.js', __FILE__ ), array( 'jquery.spin' ), $this->asset_version( '20130109' ), true );
*/

function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/style-login.css' );
}
add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );

/**
 * Register the impressum widget
 *
 */
function zbmfourteen_widgets_init() {
	require get_stylesheet_directory() . '/inc/widgets.php';
}
add_action( 'widgets_init', 'zbmfourteen_widgets_init' );
