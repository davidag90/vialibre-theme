<?php
// style and scripts
add_action('wp_enqueue_scripts', 'bootscore_child_enqueue_styles');
function bootscore_child_enqueue_styles()
{
	// style.css
	wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');

	// Compiled Bootstrap
	$modified_bootscoreChildCss = date('YmdHi', filemtime(get_stylesheet_directory() . '/css/main.css'));
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
		"destacar-home" => 'Destacado'
	);

	return array_merge($columns, $new_column);
}

add_filter('manage_pages_columns', 'add_frontpage_highlight_column', 10, 1);

function frontpage_highlight_column_content($column, $post_id = 0) {
	switch($column) {
		case 'destacar-home':
			$meta = get_field('destacar-home', $post_id);
			if($meta) {
				echo 'Sí';
			} else {
				echo 'No';
			}
		break;
	}
}

add_action('manage_pages_custom_column', 'frontpage_highlight_column_content', 10, 1);

/**
 * Shortcode [paginas_hijas]
 * Muestra una grilla de cards con las páginas hijas de la página actual.
 *
 * Atributos opcionales:
 * - boton:   texto del botón CTA (por defecto "Ver más detalles")
 * - orderby: criterio de orden (por defecto "menu_order")
 * - order:   ASC o DESC (por defecto "ASC")
 */
function vialibre_child_pages_shortcode($atts)
{
	$atts = shortcode_atts(array(
		'boton'   => __('Ver más detalles', 'bootscore'),
		'orderby' => 'menu_order',
		'order'   => 'ASC',
	), $atts, 'paginas_hijas');

	$parent_id = get_the_ID();

	if (!$parent_id) {
		return '';
	}

	$child_pages = get_posts(array(
		'post_type'      => 'page',
		'post_status'    => 'publish',
		'post_parent'    => $parent_id,
		'posts_per_page' => -1,
		'orderby'        => $atts['orderby'],
		'order'          => $atts['order'],
	));

	if (empty($child_pages)) {
		return '';
	}

	ob_start(); ?>
	<div class="child-pages-grid row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 mb-5">
		<?php foreach ($child_pages as $child_page) : ?>
			<div class="col">
				<div class="card h-100">
					<?php if (has_post_thumbnail($child_page)) : ?>
						<a href="<?php echo esc_url(get_permalink($child_page)); ?>">
							<?php echo get_the_post_thumbnail($child_page, 'medium_large', array('class' => 'card-img-top')); ?>
						</a>
					<?php endif; ?>

					<div class="card-body d-flex flex-column">
						<h3 class="card-title h5"><?php echo esc_html(get_the_title($child_page)); ?></h3>
						<a href="<?php echo esc_url(get_permalink($child_page)); ?>" class="btn btn-primary mt-auto align-self-start"><?php echo esc_html($atts['boton']); ?></a>
					</div>
				</div><!-- .card -->
			</div>
		<?php endforeach; ?>
	</div><!-- .child-pages-grid -->
	<?php
	return ob_get_clean();
}

add_shortcode('paginas_hijas', 'vialibre_child_pages_shortcode');
