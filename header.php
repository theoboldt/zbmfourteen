<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <link rel="shortcut icon" href="favicon.png" type="image/png" />
    <link rel="icon" href="favicon.png" type="image/png" />
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->

	<link href='http://fonts.googleapis.com/css?family=Boogaloo' rel='stylesheet' type='text/css'>
	<link href="<?php echo get_stylesheet_directory_uri(); ?>/bootstrap.min.css" rel="stylesheet" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header" role="banner">

		<div class="container-fluid">
			<section class="header-text">
				<div class="shadow">
					<div class="logo">
						<div id="site-title-description">
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Zeltlager Zimmerbergmühle Abschnitt 2</a></h1>
							<div class="site-title-m"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">Zeltlager ZBM Abschnitt 2</a></div>
							<div class="site-title-s"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">ZBM A2</a></div>
						</div>
						<div class="header-main">
							<!--
							<div class="search-toggle">
								<a href="#search-container" class="screen-reader-text"><?php _e( 'Search', 'twentyfourteen' ); ?></a>
							</div>
							-->
							<nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">
								<button class="menu-toggle" title="<?php _e( 'Primary Menu', 'twentyfourteen' ); ?>"><span>Menü</span></button>
								<a class="screen-reader-text skip-link" href="#content"><?php _e( 'Skip to content', 'twentyfourteen' ); ?></a>
								<?php
								require_once __DIR__.'/inc/walker.php';
								wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu', 'walker' => new zbmfourteen_walker_nav_menu() ) );
								?>
							</nav>
<!--
						<div id="search-container" class="search-box-wrapper hide">
							<div class="search-box">
								<?php get_search_form(); ?>
							</div>
						</div>
-->
						</div>
					</div>
				</div>
			</section>

			<section class="header-slider">
				<div id="header-carousel" class="carousel slide carousel-fade">
					<div class="carousel-inner">
						<div class="active item">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/slide_4_full.jpg" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" />
						</div>
						<div class="item">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/slide_5_full.jpg" alt="Slide2" />
						</div>
						<div class="item">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/slide_3_full.jpg" alt="Slide2" />
						</div>
						<div class="item">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/slide_1_full.jpg" alt="Slide3" />
						</div>
					</div>
					<a class="carousel-control left" href="#header-carousel" data-slide="prev">‹</a>
					<a class="carousel-control right" href="#header-carousel" data-slide="next">›</a>
				</div>
			</section>
		</div>

    </header><!-- #masthead -->

	<div class="container">
		<div id="main" class="site-main">
