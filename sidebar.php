<?php

/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package amicrafts
 */

if (!is_active_sidebar('sidebar-1')) {
	return;
}
?>

<div id="secondary" class="widget-area kenne-blog-sidebar-wrapper">
    <div class="kenne-blog-sidebar">
        <?php dynamic_sidebar('sidebar-2'); ?>
    </div>
</div><!-- #secondary -->