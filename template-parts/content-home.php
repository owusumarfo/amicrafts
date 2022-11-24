        <!-- Begin Slider Area -->
        <div class="slider-area border-bottom-1">

            <div class="kenne-element-carousel home-slider arrow-style" data-slick-options='{
                "slidesToShow": 1,
                "slidesToScroll": 1,
                "infinite": true,
                "arrows": true,
                "dots": false,
                "autoplay" : true,
                "fade" : true,
                "autoplaySpeed" : 7000,
                "pauseOnHover" : false,
                "pauseOnFocus" : false
                }'>



                <?php
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

                $args = array(
                    'post_type' => 'slides',
                    'post_status' => 'publish',
                    'posts_per_page' => 3,
                    'orderby' => 'date',
                    'order' => 'ASC',
                    'paged' => $paged,
                );
                $loop = new WP_Query($args);
                if ($loop->have_posts()) :
                    while ($loop->have_posts()) : $loop->the_post();
                ?>

                <!-- removed class:bg-1 -->
                <div class="slide-item slide-bg animation-style-01" style="background-image:url(<?php echo wp_get_attachment_image_url(get_post_meta($post->ID, 'slider_image', true)); ?>)">
                    <div class="slider-progress"></div>
                </div>
                <?php endwhile;
                    wp_reset_postdata();
                endif; ?>



                <!-- removed class:bg-1 -->
                <!-- <div class="slide-item slide-bg animation-style-01" style="background-image:url(<?php echo the_field('slide_1_image') ?>)">
                    <div class="slider-progress"></div>
                    <div class="container">
                        <div class="slide-content">
                            <span><?php echo the_field('slide_1_top_text'); ?></span>
                            <h2><?php echo the_field('slide_1_title') ?></h2>
                            <p class="short-desc"><?php echo the_field('slide_1_description') ?></p>
                            <div class="slide-btn">
                                <a class="kenne-btn" href="/shop">shop now</a>
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- removed class:bg-2 -->
                <!-- <div class="slide-item slide-bg animation-style-01" style="background-image:url(<?php echo the_field('slide_2_image') ?>)">
                    <div class="slider-progress"></div>
                    <div class="container">
                        <div class="slide-content">
                            <span><?php echo the_field('slide_2_top_text'); ?></span>
                            <h2><?php echo the_field('slide_2_title') ?></h2>
                            <p class="short-desc"><?php echo the_field('slide_2_description') ?></p>
                            <div class="slide-btn">
                                <a class="kenne-btn" href="/shop">shop now</a>
                            </div>
                        </div>
                    </div>
                </div> -->

            </div>

        </div>
        <!-- Slider Area End Here -->



        <!-- Begin Service Area -->
        <div class="service-area">
            <div class="container">
                <div class="service-nav">
                    <div class="row">

                        <div class="col-lg-4 col-md-4">
                            <div class="service-item">
                                <div class="content">
                                    <h4>Free Shipping</h4>
                                    <p>Free shipping on all order</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4">
                            <div class="service-item">
                                <div class="content">
                                    <h4>Money Return</h4>
                                    <p>30 days for free return</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4">
                            <div class="service-item">
                                <div class="content">
                                    <h4>Online Support</h4>
                                    <p>Support 24 hours a day</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- Service Area End Here -->

        <!-- Begin Banner Area Five -->
        <div class="banner-area-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-item img-hover_effect">
                            <!-- removed class:banner-img -->
                            <div class="ad-banner-image banner-img" style="background-image: url(<?php echo the_field('ad_banner_image') ?>);"></div>
                            <div class="banner-content">
                                <span><?php echo the_field('ad_banner_top_text'); ?></span>
                                <h3>
                                    <?php echo the_field('ad_banner_title'); ?>
                                </h3>
                                <div class="kenne-btn-ps_center">
                                    <a class="kenne-btn transparent-btn black-color square-btn" href="<?php echo the_field('ad_url'); ?>">Discover Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner Area Five End Here -->



        <!-- Begin Kenne's Content Wrapper Area -->
        <?php
        $query = new WC_Product_Query(array(
            'limit' => 3,
            'page' => 1,
            'status' => 'publish',
            'paginate' => false,
            'orderby' => 'date',
            'order' => 'DESC',
            'return' => 'data'
        ));
        $products = $query->get_products();


        if (count($products) > 0) :
        ?>
        <div class="kenne-content_wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="shop-product-wrap grid gridview-3 row">



                            <?php foreach ($products as $index => $product) : ?>
                            <div class="col-lg-4 col-md-4 col-sm-6">

                                <div class="product-item">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="<?php echo get_permalink($product->id); ?>">
                                                <?php
                                                        $product_image = $product->image_id ? wp_get_attachment_image_url($product->image_id) : "";
                                                        // echo $product_image;
                                                        $product_gallery = array();
                                                        if (count($product->gallery_image_ids) > 0) :
                                                            foreach ($product->gallery_image_ids as $id) :
                                                                array_push($product_gallery, wp_get_attachment_image_url($id));
                                                            endforeach;
                                                        endif;
                                                        ?>

                                                <?php if (count($product_gallery) <= 0) : ?>
                                                <img class="primary-img" src="<?php echo $product_image ? $product_image : get_template_directory_uri() . '/html-v2/assets/img/woocommerce-placeholder.png'; ?>" alt="" />
                                                <?php else : ?>

                                                <?php foreach ($product_gallery as $index => $image) : ?>

                                                <img class="<?php echo $index === 0 ? 'primary-img' : 'secondary-img'; ?>" src="<?php echo count($product_gallery) > 0 ? $image : $product_image; ?>" alt="" />

                                                <?php endforeach;
                                                        endif; ?>
                                            </a>
                                            <?php if ($product->sale_price) : ?>
                                            <span class="sticker">
                                                -<?php echo round(100 - (floatval($product->sale_price) / floatval($product->regular_price) * 100)); ?>%
                                            </span>
                                            <?php endif; ?>
                                        </div>

                                        <div class="product-content">
                                            <div class="product-desc_info">

                                                <h3 class="product-name">
                                                    <a href="<?php echo get_permalink($product->id); ?>"><?php echo $product->name; ?></a>
                                                </h3>

                                                <div class="price-box">
                                                    <?php if ($product->regular_price) : ?>
                                                    <span class="new-price">₵<?php echo number_format($product->sale_price ? $product->sale_price : $product->price, 2); ?></span>
                                                    <?php endif; ?>

                                                    <?php if ($product->regular_price) : ?>
                                                    <span class="old-price">₵<?php echo number_format($product->regular_price, 2); ?></span>
                                                    <?php endif; ?>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <?php endforeach;
                                // echo '<pre>';
                                // var_dump($products);
                                // echo '</pre>';

                                ?>
                            <!-- <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="product-item">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="#">
                                                <img class="primary-img" src="<?php echo get_template_directory_uri(); ?>/html-v2/assets/images/product/8-2.jpg" alt="">
                                                <img class="secondary-img" src="<?php echo get_template_directory_uri(); ?>/html-v2/assets/images/product/8-2.jpg" alt="">
                                            </a>
                                            <span class="sticker">-15%</span>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-desc_info">
                                                <h3 class="product-name"><a href="#">AMI Clippers Max II</a></h3>
                                                <div class="price-box">
                                                    <span class="new-price">$456.91</span>
                                                    <span class="old-price">$70.99</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="product-item">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="#">
                                                <img class="primary-img" src="<?php echo get_template_directory_uri(); ?>/html-v2/assets/images/product/8-1.jpg" alt="">
                                                <img class="secondary-img" src="<?php echo get_template_directory_uri(); ?>/html-v2/assets/images/product/8-1.jpg" alt="">
                                            </a>
                                            <span class="sticker">-15%</span>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-desc_info">
                                                <h3 class="product-name"><a href="#">AMI Short Airbrand 5</a></h3>
                                                <div class="price-box">
                                                    <span class="new-price">$116.91</span>
                                                    <span class="old-price">$500.99</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <!-- Kenne's Content Wrapper Area End Here -->