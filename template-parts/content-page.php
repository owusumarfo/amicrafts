<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package amicrafts
 */

?>
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content mt-4">
            <h2><?php the_title(); ?></h2>
            <ul>
                <li><a href="<?php echo site_url(); ?>">Home</a></li>
                <li class="active"><?php the_title(); ?></li>
            </ul>
        </div>
    </div>
</div>

<div class="about-us-area mb-5">
    <div class="container">
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

            <?php amicrafts_post_thumbnail(); ?>

            <div class="entry-content">
                <?php
				the_content();

				wp_link_pages(
					array(
						'before' => '<div class="page-links">' . esc_html__('Pages:', 'amicrafts'),
						'after'  => '</div>',
					)
				);
				?>
            </div><!-- .entry-content -->

            <?php if (get_edit_post_link()) : ?>
            <footer class="entry-footer">
                <?php
					edit_post_link(
						sprintf(
							wp_kses(
								/* translators: %s: Name of current post. Only visible to screen readers */
								__('Edit <span class="screen-reader-text">%s</span>', 'amicrafts'),
								array(
									'span' => array(
										'class' => array(),
									),
								)
							),
							wp_kses_post(get_the_title())
						),
						'<span class="edit-link">',
						'</span>'
					);
					?>
            </footer><!-- .entry-footer -->
            <?php endif; ?>
        </article><!-- #post-<?php the_ID(); ?> -->
    </div>
</div>