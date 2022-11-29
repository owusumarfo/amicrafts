<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package amicrafts
 */

get_header();
?>
<div class="blog-details_area">
    <div class="container pt-5">
        <div class="row">
            <div class="col-lg-3 order-lg-1 order-2">
                <?php get_sidebar(); ?>
            </div>
            <div class="col-lg-9 order-lg-2 order-1">
                <main id="primary" class="site-main">
                    <?php
					while (have_posts()) :
						the_post();

						get_template_part('template-parts/content', get_post_type());
					?>
                    <div class="mt-4">
                        <?php
							the_post_navigation(
								array(
									'prev_text' => '<span class="nav-subtitle">' . esc_html__('Previous:', 'amicrafts') . '</span> <span class="nav-title">%title</span>',
									'next_text' => '<span class="nav-subtitle">' . esc_html__('Next:', 'amicrafts') . '</span> <span class="nav-title">%title</span>',
								)
							);
							?>
                    </div>
                    <?php

						// If comments are open or we have at least one comment, load up the comment template.
						if (comments_open() || get_comments_number()) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>

                </main><!-- #main -->
            </div>
        </div>
    </div>
</div>

<?php
get_footer();