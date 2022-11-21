<?php

/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package amicrafts
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="entry-content contact-main-page">
        <div class="container mt-0 mt-lg-5">
            <?php the_content();  ?>
        </div>
    </div>

</article><!-- #post-<?php the_ID(); ?> -->