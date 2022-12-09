        <!-- Begin Kenne's Breadcrumb Area -->
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content mt-4">
                    <h2>Contact Us</h2>
                    <ul>
                        <li><a href="<?php echo site_url(); ?>">Home</a></li>
                        <li class="active">Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Kenne's Breadcrumb Area End Here -->

        <!-- Begin Contact Main Page Area -->
        <div class="contact-main-page pt-0">
            <div class="container d-none">
                <div id="google-map"></div>
            </div>
            <div class="container">
                <div class="row">

                    <!-- Right   -->
                    <div class="col-lg-5 offset-lg-1 col-md-12 order-1 order-lg-2">
                        <div class="contact-page-side-content">
                            <h3 class="contact-page-title">Contact Us</h3>
                            <p class="contact-page-message"><?php the_field('short_description'); ?></p>

                            <?php if (!empty(get_post_meta($post->ID, 'address', true))) : ?>
                            <div class="single-contact-block">
                                <h4><i class="fa fa-fax"></i> Address</h4>
                                <p><a href="http://maps.google.com/maps?q=<?php the_field('address'); ?>" target="_blank"><?php the_field('address'); ?></a></p>
                            </div>
                            <?php endif; ?>

                            <?php if (!empty(get_post_meta($post->ID, 'mobile', true)) || !empty(get_post_meta($post->ID, 'hot_line', true))) : ?>
                            <div class="single-contact-block">
                                <h4><i class="fa fa-phone"></i> Phone</h4>

                                <?php if (!empty(get_post_meta($post->ID, 'mobile', true))) : ?>
                                <p>Mobile: <a href="tel:<?php the_field('mobile'); ?>"><?php the_field('mobile'); ?></a></p>
                                <?php endif; ?>

                                <?php if (!empty(get_post_meta($post->ID, 'hot_line', true))) : ?>
                                <p>Hotline: <a href="tel:<?php the_field('hot_line'); ?>"><?php the_field('hot_line'); ?></a></p>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>

                            <?php if (!empty(get_post_meta($post->ID, 'email_1', true)) || !empty(get_post_meta($post->ID, 'email_2', true))) : ?>
                            <div class="single-contact-block last-child">
                                <h4><i class="fa fa-envelope"></i> Email</h4>
                                <p><a href="mailto:<?php the_field('email_1'); ?>"><?php the_field('email_1'); ?></a></p>
                                <p><a href="mailto:<?php the_field('email_2'); ?>"><?php the_field('email_2'); ?></a></p>
                            </div>
                            <?php endif; ?>

                        </div>
                    </div>

                    <!-- Left -->
                    <div class="col-lg-6 col-md-12 order-2 order-lg-1">
                        <div class="contact-form-content">
                            <?php if (!empty(get_post_meta($post->ID, 'left_title', true))) : ?>
                            <h3 class="contact-page-title"><?php the_field('left_title'); ?></h3>
                            <?php endif; ?>
                            <div class="contact-form">
                                <!-- <?php the_content(); ?> -->

                                <form id="contact-form" action="#">
                                    <div class="form-group">
                                        <label>Your Name <span class="required">*</span></label>
                                        <input type="text" name="con_name" id="con_name" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Your Email <span class="required">*</span></label>
                                        <input type="email" name="con_email" id="con_email" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Subject</label>
                                        <input type="text" name="con_subject" id="con_subject">
                                    </div>
                                    <div class="form-group form-group-2">
                                        <label>Your Message</label>
                                        <textarea name="con_message" id="con_message"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" value="submit" id="submit" class="kenne-contact-form_btn" name="submit">send</button>
                                    </div>
                                </form>
                            </div>
                            <p class="form-message"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact Main Page Area End Here -->