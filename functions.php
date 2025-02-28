<?php
// style and scripts
add_action('wp_enqueue_scripts', 'bootscore_child_enqueue_styles');
function bootscore_child_enqueue_styles()
{
	// style.css
	wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');

	// Compiled Bootstrap
	$modified_bootscoreChildCss = date('YmdHi', filemtime(get_parent_theme_file_path() . '/css/main.css'));
	wp_enqueue_style('main', get_stylesheet_directory_uri() . '/css/main.css', array('parent-style'), $modified_bootscoreChildCss);
	wp_enqueue_style('owlcarousel-css', get_stylesheet_directory_uri() . '/css/owlcarousel/owl.carousel.min.css');
	wp_enqueue_style('owlcarousel-theme', get_stylesheet_directory_uri() . '/css/owlcarousel/owl.theme.default.min.css');

	// Font personalizada con iconos adicionales no cubiertos por Font Awesome
	wp_enqueue_style('vialibre-font', get_stylesheet_directory_uri() . '/css/vialibre-font/vialibre-font.css');

	// Owl Carousel
	wp_enqueue_script('owl-carousel-js', get_stylesheet_directory_uri() . '/js/owlcarousel/owl.carousel.min.js', false, '', true);

	// Custom JS
	wp_enqueue_script('custom-js', get_stylesheet_directory_uri() . '/js/custom.js', false, '', true);
}

function add_frontpage_highlight_column($columns)
{
	$new_column = array(
		"destacar-home" => 'Página principal?'
	);

	return array_merge($columns, $new_column);
}

add_filter('manage_pages_columns', 'add_frontpage_highlight_column', 10, 1);

function frontpage_highlight_column_content($column, $post_id = 0) {
	switch($column) {
		case 'destacar-home':
			$meta = get_field('destacar-home', $post_id);
			if($meta) {
				echo 'Destacado';
			} else {
				echo 'No destacado';
			}
		break;
	}
}

add_action('manage_pages_custom_column', 'frontpage_highlight_column_content', 10, 1);
