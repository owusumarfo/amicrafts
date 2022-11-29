<?php

/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package amicrafts
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required()) {
	return;
}
?>

<div id="comments" class="comments-area kenne-comment-section">

    <?php
	// You can start editing here -- including this comment!
	if (have_comments()) :
	?>
    <h3 class="comments-title">
        <?php
			$amicrafts_comment_count = get_comments_number();
			if ('1' === $amicrafts_comment_count) {
				printf(
					/* translators: 1: title. */
					esc_html__('One thought on &ldquo;%1$s&rdquo;', 'amicrafts'),
					'<span>' . wp_kses_post(get_the_title()) . '</span>'
				);
			} else {
				printf(
					/* translators: 1: comment count number, 2: title. */
					// esc_html(_nx('%1$s COMMENT &ldquo;%2$s&rdquo;', '%1$s COMMENTS &ldquo;%2$s&rdquo;', $amicrafts_comment_count, 'comments title', 'amicrafts')),
					esc_html(_nx(
						'%1$s COMMENT',
						'%1$s COMMENTS',
						$amicrafts_comment_count,
						'comments title',
						'amicrafts'
					)),
					number_format_i18n($amicrafts_comment_count), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					'<span>' . wp_kses_post(get_the_title()) . '</span>'
				);
			}
			?>
    </h3><!-- .comments-title -->

    <?php the_comments_navigation(); ?>

    <ul class="comment-list">
        <?php
			wp_list_comments(
				array(
					'style'      => 'ul',
					'short_ping' => true,
				)
			);
			?>
    </ul><!-- .comment-list -->

    <?php
		the_comments_navigation();

		// If comments are closed and there are comments, let's leave a little note, shall we?
		if (!comments_open()) :
		?>
    <p class="no-comments"><?php esc_html_e('Comments are closed.', 'amicrafts'); ?></p>
    <?php
		endif;

	endif; // Check for have_comments().

	$comment_args = array(
		'class_container' => 'kenne-blog-comment-wrapper',
		'title_reply' => 'Leave a Reply',
		'submit' => 'Post Comment',
		'submit_button' => '<input name="%1$s" type="submit" id="%2$s" class="kenne-btn transparent-btn transparent-btn-2" value="%4$s" />',
		'cancel_reply_before' => '<span class="ms-4 cancel-reply">',
		'cancel_reply_after' => '</span>'
	);
	comment_form($comment_args);
	?>

</div><!-- #comments -->