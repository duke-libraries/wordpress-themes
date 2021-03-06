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

<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>

	<link href='https://fonts.googleapis.com/css?family=Libre+Baskerville:400,700,400italic' rel='stylesheet' type='text/css'>

	<?php if(is_front_page()): ?>

		<!-- include Cycle2 -->
		<script src="/wp-content/themes/dul-magazine-2015/includes/jquery.cycle2.min.js"></script>
		<script src="/wp-content/themes/dul-magazine-2015/includes/jquery.cycle2.swipe.min.js"></script>

	<?php endif; ?>

</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php if ( get_header_image() ) : ?>

	<div id="site-header">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img alt="Magazine" src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
		</a>
	</div>

	<div id="library_logo"><a href="https://library.duke.edu" title="Duke University Libraries"><img src="/wp-content/themes/dul-magazine-2015/images/library_logo_transparent.png" alt="Duke University Libraries" border="0"></a></div>

	<?php endif; ?>

	<?php if ( has_nav_menu( 'primary' ) ) : ?>

		<nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">
			<button class="menu-toggle"><?php _e( 'Primary Menu', 'twentyfourteen' ); ?></button>
			<a class="screen-reader-text skip-link" href="#content"><?php _e( 'Skip to content', 'twentyfourteen' ); ?></a>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
		</nav>

	<?php endif; ?>

	<?php

	if(is_front_page()):

		// include features

		include (ABSPATH. '/wp-content/themes/dul-magazine-2015/includes/features.php');

	endif;

	?>

	<div id="main" class="site-main">
