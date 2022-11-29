<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package amicrafts
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('blog-item'); ?>>


    <div class="mb-4">
        <?php amicrafts_post_thumbnail(); ?>
    </div>

    <header class="entry-header blog-content">
        <?php
		if (is_singular()) :
			the_title('<h3 class="entry-title heading pt-0">', '</h3>');
		else :
			the_title('<h2 class="entry-title"><a href="' . esc_url(get_permalink()) . '" rel="bookmark">', '</a></h2>');
		endif;

		if ('post' === get_post_type()) :
		?>
        <!-- <p class="short-desc"><?php echo get_the_excerpt(); ?></p> -->
        <div class="entry-meta blog-meta">
            <ul>
                <li> <?php amicrafts_posted_on(); ?></li>
                <!-- <li><?php amicrafts_posted_by(); ?></li> -->
                <li>
                    <?php $comments =  get_comments_number(); ?>
                    <span><?php echo $comments; ?></span>
                    <span><?php echo $comments > 1 ? 'Comments' : 'Comment'; ?></span>
                </li>
            </ul>
            <!-- <?php
						amicrafts_posted_on();
						amicrafts_posted_by();
						?> -->
        </div>
        <!-- .entry-meta -->
        <?php endif; ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__('Continue reading<span class="screen-reader-text"> "%s"</span>', 'amicrafts'),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post(get_the_title())
			)
		);

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__('Pages:', 'amicrafts'),
				'after'  => '</div>',
			)
		);
		?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php amicrafts_entry_footer(); ?>
    </footer>
    <!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->