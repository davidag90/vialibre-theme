<?php get_header();	?>

<div id="content" class="site-content container">
	<div id="primary" class="content-area">
		<?php the_post(); ?>
		<main id="main" class="site-main">
			<!-- .hero-post -->
			<div class="hero-post width-100 mb-5">
				<div class="owl-carousel owl-theme">
					<?php
					$args = array(
						'post_type' => 'page',
						'post_status' => 'publish',
						'post_parent' => array('expediciones'),
						'posts_per_page' => 3
					);

					$posts = new WP_Query($args);

					if ($posts->have_posts()) :
						$c = 0;
						while ($posts->have_posts()) : $posts->the_post(); ?>
							<div class="owl-slide d-flex align-items-end cover" style="background-image: url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full') ?>)">

								<div class="container">
									<div class="row justify-content-center justify-content-md-start">
										<div class="col-12 col-md-6 static pb-5">
											<div class="owl-slide-text mb-5 p-1 bg-dark bg-opacity-50">
												<h2 class="owl-slide-animated owl-slide-title mb-0">
													<a class="text-decoration-none link-light" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
												</h2>

												<div class="owl-slide-animated owl-slide-subtitle text-light mb-0">
													<?php the_excerpt(); ?>
												</div>
											</div><!-- .owl-slide-text -->
										</div><!-- col-10 col-md-6 static -->
									</div><!-- row -->
								</div><!-- container -->
							</div>
							<?php $c++; ?>
						<?php endwhile; ?>
					<?php endif; ?>

					<?php wp_reset_postdata(); ?>
				</div>
			</div>
			<!-- .hero-post -->

			<div class="row">
				<div class="col order-first">
					<div class="entry-content">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- #content -->
<?php
get_footer();
