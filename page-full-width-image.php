<?php

/**
 * Template Name: Full Width Image
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bootscore
 */

get_header();
?>

<div id="content" class="site-content">
  <div id="primary" class="content-area">

    <main id="main" class="site-main">

      <?php $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full'); ?>
      <header class="entry-header featured-full-width-img height-75 bg-dark text-light mb-5" style="background-image: url('<?php echo $thumb['0']; ?>'); background-position: center center;">
        <div class="w-100 h-100 d-flex align-items-end pb-3">
          <div class="post-header-wrapper bg-dark bg-opacity-75 p-3 w-100 mb-4">
            <h1 class="entry-title p-0 m-0"><?php echo the_title(); ?></h1>
            <p class="mb-0"><?php echo get_the_excerpt(); ?></p>
          </div><!-- .post-header-wrapper -->
        </div>
      </header>

      <div class="container pb-5">
        <!-- Hook to add something nice -->
        <?php bs_after_primary(); ?>

        <div class="entry-content">
          <?php the_content(); ?>
        </div>

      </div><!-- container -->

    </main><!-- #main -->

  </div><!-- #primary -->
</div><!-- #content -->
<?php
get_footer();
