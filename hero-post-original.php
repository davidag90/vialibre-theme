<!-- .hero-post -->
            <div class="hero-post width-100 mb-5">
            	<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
					<div class="carousel-inner">
						<?php
						$args = array(
							'post_type' => 'page',
							'post_status' => 'publish',
							'post_parent' => 'expediciones',
							'posts_per_page' => 3
						);

						$posts = new WP_Query( $args );

						if ( $posts->have_posts() ) :
							$c = 0;
							while ( $posts->have_posts() ) : $posts->the_post(); ?>
								<div class="carousel-item <?php if ( $c == 0 ) { echo 'active'; } ?>">
									<?php the_post_thumbnail('full'); ?>
									
									<div class="carousel-caption-background"></div>
									<div class="carousel-caption d-block">
										<h2 class="display-6"><a class="text-decoration-none link-light" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
										<p><?php the_excerpt(); ?></p>
									</div>
								</div>
								<?php $c++; ?>
							<?php endwhile; ?>
						<?php endif; ?>

						<?php wp_reset_postdata(); ?>
							
						<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Previous</span>
						</button>
						
						<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="visually-hidden">Next</span>
						</button>
					</div>
            	</div>
        	</div>
        	<!-- .hero-post -->