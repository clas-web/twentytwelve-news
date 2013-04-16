<?php

/* Disable the Admin Bar. */
add_filter( 'show_admin_bar', '__return_false' );



/**
 * // ---
 *
 * @return string Excerpt with "Read More" link.
 */
function twentytwelvenews_news_setup()
{
	remove_filter( 'excerpt_more', 'twentytwelvenews_excerpt_more' );
	remove_filter( 'get_the_excerpt', 'twentytwelvenews_get_the_excerpt' );
}
add_action( 'after_setup_theme', 'twentytwelvenews_news_setup' );


/**
 * // ---
 *
 * @return string Excerpt with "Read More" link.
 */
function twentytwelvenews_news_get_the_excerpt( $output ) {
	global $post;
	return $output;
}
add_filter( 'get_the_excerpt', 'twentytwelvenews_news_get_the_excerpt' );


function twentytwelvenews_enqueue_scripts()
{
	if( is_front_page() )
	{
		wp_register_style('frontpage', get_stylesheet_directory_uri() . '/front-page.css');
		wp_enqueue_style('frontpage');

		wp_enqueue_script('jquery');
		
		wp_register_script('uncc-slider', get_stylesheet_directory_uri() . '/unccslider.js');
		wp_enqueue_script('uncc-slider');
	}
}
add_action( 'wp_enqueue_scripts', 'twentytwelvenews_enqueue_scripts' );

