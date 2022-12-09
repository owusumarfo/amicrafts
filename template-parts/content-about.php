        <!-- Begin Kenne's Breadcrumb Area -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content mt-4">
                    <h2>About Us</h2>
                    <ul>
                        <li><a href="<?php echo site_url(); ?>">Home</a></li>
                        <li class="active">About Us</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Kenne's Breadcrumb Area End Here -->

        <!-- Begin Kenne's About Us Area -->
        <div class="about-us-area">
            <div class="container">

                <div class="row">

                    <?php if (!empty(get_post_meta($post->ID, 'banner', true))) : ?>
                    <div class="col-lg-6 col-md-5">
                        <div class="overview-img text-center img-hover_effect">
                            <!-- <a href="#"> -->
                            <img class="img-full" src="<?php echo the_field('banner'); ?>" alt="">
                            <!-- </a> -->
                        </div>
                    </div>
                    <?php endif; ?>

                    <div class="col-lg-6 col-md-7 d-flex align-items-center">
                        <div class="overview-content">
                            <h2><?php echo the_field('title'); ?></h2>
                            <p class="short_desc"><?php echo the_field('short_description'); ?></p>
                            <div class="kenne-about-us_btn-area">
                                <a class="about-us_btn" href="<?php echo the_field('button_url'); ?>"><?php echo the_field('button_text'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="my-5">
                    <?php echo the_content(); ?>
                </div>
            </div>
        </div>
        <!-- Kenne's About Us Area End Here -->