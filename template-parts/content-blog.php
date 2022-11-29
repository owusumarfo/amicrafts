<div class="row blog-item_wrap">
    <?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 10,
        'orderby' => 'date',
        'order' => 'ASC',
        'paged' => $paged,
    );
    $loop = new WP_Query($args);
    if ($loop->have_posts()) :
        while ($loop->have_posts()) : $loop->the_post();
    ?>

    <div class="col-lg-6">
        <div class="blog-item">

            <?php if (has_post_thumbnail()) : ?>
            <div class="blog-img">
                <a href="<?php echo the_permalink(); ?>">
                    <img src="<?php echo the_post_thumbnail_url(); ?>" alt="Blog Image">
                </a>
            </div>
            <?php endif; ?>

            <div class="blog-content">
                <h3 class="heading">
                    <a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a>
                </h3>
                <p class="short-desc">
                    <?php echo the_excerpt(); ?>
                </p>
                <div class="blog-meta">
                    <ul>
                        <li><?php echo get_the_date(); ?></li>
                        <li>
                            <a href="javascript:void(0)"><?php echo get_comments_number(); ?> Comments</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <?php endwhile; ?>
    <div class="col-lg-12">
        <div class="kenne-paginatoin-area">
            <?php wp_paginate($loop); ?>
        </div>
    </div>
    <?php wp_reset_postdata();
    endif; ?>
</div>