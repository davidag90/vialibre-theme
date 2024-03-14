<?php
// style and scripts
add_action('wp_enqueue_scripts', 'bootscore_child_enqueue_styles');
function bootscore_child_enqueue_styles()
{
	// style.css
	wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');

	// Compiled Bootstrap
	$modified_bootscoreChildCss = date('YmdHi', filemtime(get_stylesheet_directory() . '/css/lib/bootstrap.min.css'));
	wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/css/lib/bootstrap.min.css', array('parent-style'), $modified_bootscoreChildCss);
	wp_enqueue_style('owlcarousel-css', get_stylesheet_directory_uri() . '/css/owlcarousel/owl.carousel.min.css');
	wp_enqueue_style('owlcarousel-theme', get_stylesheet_directory_uri() . '/css/owlcarousel/owl.theme.default.min.css');

	// Font personalizada con iconos adicionales no cubiertos por Font Awesome
	wp_enqueue_style('vialibre-font', get_stylesheet_directory_uri() . '/css/vialibre-font/vialibre-font.css');

	// Owl Carousel
	wp_enqueue_script('owl-carousel-js', get_stylesheet_directory_uri() . '/js/owlcarousel/owl.carousel.min.js', false, '', true);

	// Custom JS
	wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/js/custom.js', false, '', true);
}
