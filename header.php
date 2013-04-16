<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>

<script type="text/javascript">
jQuery(document).ready(function(){
	<?php if( is_front_page() ): ?>
		jQuery('#featured-story-slider').UNCCSlider({url: "<?php echo get_stylesheet_directory_uri().'/images'; ?>"});
	<?php endif; ?>
});

</script>

</head>

<body <?php body_class(); ?>>


	<div id="masthead" class="site-header" role="banner">
	
		<div class="header-wrapper">
			<div class="header">
				<div class="header-logo"></div>
				<div class="header-title">
					<h1 class="site-title"><a href="http://localhost/wordpress-ms/test-themes/" title="Test Themes" rel="home">Test Themes</a></h1>
					<h2 class="site-description">Just another Multisite Wordpress Install Sites site</h2>
				</div>
			</div>
		</div>
		
		<div class="menu-wrapper">
			<div id="site-navigation" class="menu main-navigation" role="navigation">
				<h3 class="menu-toggle">Menu</h3>
				<a class="assistive-text" href="#content" title="Skip to content">Skip to content</a>
				<div class="nav-menu"><ul><li class="current_page_item"><a href="http://localhost/wordpress-ms/test-themes/" title="Home">Home</a></li><li class="page_item page-item-2"><a href="http://localhost/wordpress-ms/test-themes/sample-page/">Sample Page</a></li></ul></div>
			</div><!-- #site-navigation -->
		</div>
		
	</div><!-- #masthead -->

<div id="page" class="hfeed site">
	<div id="main" class="wrapper">