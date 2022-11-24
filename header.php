<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package amicrafts
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class('template-color-1'); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">

        <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'amicrafts'); ?></a>

        <div class="main-wrapper">

            <!-- Begin Loading Area -->
            <div class="loading">
                <div class="text-center middle">
                    <span class="loader">
                        <span class="loader-inner"></span>
                    </span>
                </div>
            </div>
            <!-- Loading Area End Here -->


            <!-- Begin Main Header Area -->

            <header class="main-header_area">
                <div class="transparent-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="transparent-header_nav position-relative">

                                    <div class="header-right_area header-right_area-2 d-lg-none d-flex">
                                        <ul>
                                            <li class="mobile-menu_wrap d-inline-flex d-lg-none">
                                                <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn color--white">
                                                    <i class="ion-android-menu <?php if (is_front_page()) : echo 'text-white';
                                                                                endif; ?>"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="header-logo_area">
                                        <a href="<?php echo site_url(); ?>">
                                            <img class="d-none d-lg-block" src="<?php echo get_template_directory_uri(); ?>/html-v2/assets/img/ami-logo.png" width="100px" alt="Header Logo">
                                            <img class="d-block d-lg-none" src="<?php echo get_template_directory_uri(); ?>/html-v2/assets/img/ami-logo-white.png" width="85px" alt="Header Logo">
                                        </a>
                                    </div>

                                    <div class="main-menu_area d-none d-lg-block">

                                        <?php if (!is_checkout()) : ?>
                                        <nav class="main-nav d-flex justify-content-center">
                                            <?php
                                                wp_nav_menu(array(
                                                    "theme_location" => "amicrafts_primary_menu",
                                                    "menu" => "Primary Menu",
                                                    "menu_class" => "text-white",
                                                    "container" => "<nav>",
                                                    "container_class" => "main-nav d-flex justify-content-center",
                                                    "items_wrap" => '<ul>%3$s</ul>',
                                                    'list_item_class'  => 'text-white',
                                                    "link_class" => 'text-white'
                                                ))
                                                ?>
                                        </nav>
                                        <?php endif; ?>



                                        <!-- <nav class="main-nav d-flex justify-content-center">
                                            <ul>
                                                <li class="">
                                                    <a href="<?php echo site_url(); ?>">Home </a>
                                                </li>
                                                <li><a href="#">Shop</a></li>
                                                <li><a href="#">Blog</a></li>
                                                <li><a href="<?php echo site_url(); ?>/about">About Us</a></li>
                                                <li><a href="<?php echo site_url(); ?>/contact">Contact Us</a></li>
                                            </ul>
                                        </nav> -->
                                    </div>


                                    <div class="header-right_area header-right_area-2">
                                        <ul>
                                            <li class="minicart-wrap me-0 me-lg-3">
                                                <a href="<?php echo wc_get_cart_url(); ?>" class="minicart-btn">
                                                    <div class="minicart-count_area">
                                                        <span class="item-count"><?php echo wc()->cart->get_cart_contents_count(); ?></span>
                                                        <i class="ion-bag <?php if (is_front_page()) : echo 'text-white';
                                                                            endif; ?>"></i>
                                                    </div>
                                                </a>
                                            </li>

                                            <?php if (!is_checkout()) : ?>
                                            <li class="d-none d-lg-inline-block">
                                                <a href="#searchBar" class="search-btn toolbar-btn">
                                                    <i class="ion-ios-search <?php if (is_front_page()) : echo 'text-white';
                                                                                    endif; ?>"></i>
                                                </a>
                                            </li>

                                            <!-- <li>
                                                <a href="#offcanvasMenu" class="menu-btn toolbar-btn color--white d-none d-lg-block">
                                                    <i class="ion-android-menu"></i>
                                                </a>
                                            </li> -->
                                            <?php endif; ?>

                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="mobile-menu_wrapper" id="mobileMenu">
                    <div class="offcanvas-menu-inner">
                        <div class="container">
                            <a href="#" class="btn-close white-close_btn"><i class="ion-android-close"></i></a>
                            <div class="offcanvas-inner_logo">
                                <a href="<?php echo site_url(); ?>">
                                    <img src="<?php echo get_template_directory_uri(); ?>/html-v2/assets/img/ami-logo.png" width="100px" alt="Header Logo">
                                </a>
                            </div>
                            <nav class="offcanvas-navigation">

                                <?php
                                wp_nav_menu(array(
                                    "theme_location" => "amicrafts_side_menu_right",
                                    "menu" => "Side Menu Right",
                                    "container" => "<nav>",
                                    "container_class" => "offcanvas-navigation",
                                    "items_wrap" => '<ul class="mobile-menu">%3$s</ul>',
                                ))
                                ?>


                                <!-- <ul class="mobile-menu">
                                    <li class=""><a href="<?php echo site_url(); ?>">Home </a>
                                    </li>
                                    <li><a href="#">Shop</a></li>
                                    <li><a href="#">Blog</a></li>
                                    <li><a href="#">About Us</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                </ul> -->
                            </nav>

                        </div>
                    </div>
                </div>

                <div class="offcanvas-menu_wrapper" id="offcanvasMenu">
                    <div class="offcanvas-menu-inner">
                        <a href="#" class="btn-close"><i class="ion-android-close"></i></a>
                        <div class="offcanvas-inner_logo">
                            <a href="shop-left-sidebar.html">
                                <img src="<?php echo get_template_directory_uri(); ?>/html-v2/assets/img/ami-logo.png" width="100px" alt="">
                            </a>
                        </div>
                        <div class="short-desc">
                            <p>We are a team of designers and developers that create high quality shoes and slippers.
                            </p>
                        </div>

                        <div class="offcanvas-inner-social_link">
                            <div class="kenne-social_link">
                                <ul>
                                    <li class="facebook">
                                        <a href="https://www.facebook.com/" data-bs-toggle="tooltip" target="_blank" title="Facebook">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="twitter">
                                        <a href="https://twitter.com/" data-bs-toggle="tooltip" target="_blank" title="Twitter">
                                            <i class="fab fa-twitter-square"></i>
                                        </a>
                                    </li>
                                    <li class="youtube">
                                        <a href="https://www.youtube.com/" data-bs-toggle="tooltip" target="_blank" title="Youtube">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                    <li class="google-plus">
                                        <a href="https://www.plus.google.com/discover" data-bs-toggle="tooltip" target="_blank" title="Google Plus">
                                            <i class="fab fa-google-plus"></i>
                                        </a>
                                    </li>
                                    <li class="instagram">
                                        <a href="https://rss.com/" data-bs-toggle="tooltip" target="_blank" title="Instagram">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="offcanvas-search_wrapper" id="searchBar">
                    <div class="offcanvas-menu-inner">
                        <div class="container">
                            <a href="#" class="btn-close"><i class="ion-android-close"></i></a>
                            <!-- Begin Offcanvas Search Area -->
                            <div class="offcanvas-search">
                                <form action="/shop" class="hm-searchbox">
                                    <input type="text" name="s" placeholder="Search for item...">
                                    <button class="search_btn" type="submit"><i class="ion-ios-search-strong"></i></button>
                                </form>
                            </div>
                            <!-- Offcanvas Search Area End Here -->
                        </div>
                    </div>
                </div>
                <div class="global-overlay"></div>
            </header>
            <!-- Main Header Area End Here -->