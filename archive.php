<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package amicrafts
 */

get_header();
?>

<div class="blog-details_area pb-0">
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-3 order-lg-1 order-2">
                <?php get_sidebar(); ?>
            </div>
            <div class="col-lg-9 order-lg-2 order-1">
                <main id="primary" class="site-main">

                    <?php if (have_posts()) : ?>
                    <header class="page-header">
                        <?php
							the_archive_title('<h3 class="page-title heading pt-0">', '</h3>');
							the_archive_description('<div class="archive-description">', '</div>');
							?>
                    </header><!-- .page-header -->

                    <?php
						/* Start the Loop */
						while (have_posts()) :
							the_post();

							/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
							get_template_part('template-parts/content', get_post_type());

						endwhile;

						the_posts_navigation();

					else :

						get_template_part('template-parts/content', 'none');

					endif;
					?>

                </main><!-- #main -->
            </div>
        </div>
    </div>
</div>

<?php
get_footer();