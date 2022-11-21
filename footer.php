<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package amicrafts
 */

?>


<!-- Footer Section Start -->
<?php if (!is_checkout()) : ?>
<div class="kenne-footer_area bg-smoke_color">
    <div class="footer-top_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="newsletter-area">
                        <div class="newsletter-logo">
                            <a href="javascript:void(0)">
                                <img src="<?php echo get_template_directory_uri(); ?>/html-v2/assets/img/ami-logo.png" width="100px" alt="Logo">
                            </a>
                        </div>
                        <p class="short-desc">Subscribe to our newsleter, Enter your email address</p>
                        <div class="newsletter-form_wrap">
                            <form action="#" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="newsletters-form validate" target="_blank" novalidate>
                                <div id="mc_embed_signup_scroll">
                                    <div id="mc-form" class="mc-form subscribe-form">
                                        <input id="mc-email" class="newsletter-input" type="email" autocomplete="off" placeholder="Enter email address" />
                                        <button class="newsletter-btn" id="mc-submit"><i class="ion-android-mail"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="row footer-widgets_wrap">
                        <div class="col-lg-6">
                            <div class="footer-widgets_title">
                                <h4>Browse</h4>
                            </div>
                            <div class="footer-widgets">
                                <?php
                                    wp_nav_menu(array(
                                        "theme_location" => "amicrafts_footer_menu_1",
                                        "menu" => "Footer Menu 1",
                                        "container" => "<div>",
                                        "container_class" => "footer-widgets",
                                        "items_wrap" => '<ul class="">%3$s</ul>',
                                    ))
                                    ?>
                                <!-- <ul>
                                    <li><a href="<?php echo site_url(); ?>">Home</a></li>
                                    <li><a href="<?php echo site_url(); ?>/about">About us</a></li>
                                    <li><a href="<?php echo site_url(); ?>/contact">Contact us</a></li>
                                    <li><a href="<?php echo site_url(); ?>">Terms</a></li>
                                </ul> -->
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="footer-widgets_title">
                                <h4>Categories</h4>
                            </div>
                            <div class="footer-widgets">
                                <?php
                                    wp_nav_menu(array(
                                        "theme_location" => "amicrafts_footer_menu_2",
                                        "menu" => "Footer Menu 2",
                                        "container" => "<div>",
                                        "container_class" => "footer-widgets",
                                        "items_wrap" => '<ul class="">%3$s</ul>',
                                    ))
                                    ?>
                                <!-- <ul>
                                    <li><a href="javascript:void(0)">Men</a></li>
                                    <li><a href="javascript:void(0)">Women</a></li>
                                    <li><a href="javascript:void(0)">Unisex</a></li>
                                </ul> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 m-auto text-center">
                    <div class="copyright">
                        <span> &copy;<?php echo date('Y'); ?> <a href="javascript:void(0)"><?php echo bloginfo('site_name'); ?>.</a> All rights reserved.</span>
                    </div>
                </div>
                <div class="col-md-6 d-none">
                    <div class="payment">
                        <img src="<?php echo get_template_directory_uri(); ?>/html-v2/assets/images/footer/payment/1.png" alt="Kenne's Payment Method">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>
<!-- Footer Section End -->

</div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>