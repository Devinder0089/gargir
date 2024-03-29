<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Start Footer Section -->
<footer id="footer">

    <div class="container">
        <div class="row footer-widgets">

            <!-- footer widget about-->
            <div class="col-sm-4 col-xs-12">
                <div class="footer-widget f-widget-about">
                    <div class="col-sm-12">
                        <div class="row">
                            <p class="footer-logo">
                                <img src="<?php echo get_logo_footer($vsettings); ?>" alt="logo" class="logo">
                            </p>
                            <p>
                                <?php echo html_escape($settings->about_footer); ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div><!-- /.col-sm-4 -->


            <!-- footer widget random posts-->
            <div class="col-sm-4 col-xs-12">
                <!--Include footer random posts partial-->
                <?php $this->load->view('partials/_footer_random_posts'); ?>
            </div><!-- /.col-sm-4 -->


            <!-- footer widget follow us-->
            <div class="col-sm-4 col-xs-12">
                <div class="col-sm-12 footer-widget f-widget-follow">
                    <div class="row">
                        <h4 class="title"><?php echo html_escape(trans("footer_follow")); ?></h4>
                        <ul>
                            <!--Include social media links-->
                            <?php $this->load->view('partials/_social_media_links', ['rss_hide' => false]); ?>
                        </ul>
                    </div>
                </div>

                <!-- newsletter -->
                <div class="newsletter col-sm-12">
                    <div class="row">
                        <p><?php echo html_escape(trans("footer_newsletter")); ?></p>

                        <?php echo form_open('home/add_to_newsletter'); ?>
                        <input type="email" name="email" maxlength="199"
                               placeholder="<?php echo html_escape(trans("placeholder_email")); ?>" required>

                        <input type="submit" value="<?php echo html_escape(trans("btn_send")); ?>" class="newsletter-button">
                        <?php echo form_close(); ?>

                    </div>
                    <div class="row">
                        <p id="newsletter">
                            <?php
                            if ($this->session->flashdata('news_error')):
                                echo '<span class="text-danger">' . $this->session->flashdata('news_error') . '</span>';
                            endif;

                            if ($this->session->flashdata('news_success')):
                                echo '<span class="text-success">' . $this->session->flashdata('news_success') . '</span>';
                            endif;
                            ?>
                        </p>
                    </div>
                </div>
            </div>
            <!-- .col-md-3 -->
        </div>
        <!-- .row -->


        <!-- Copyright -->
        <div class="footer-bottom">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-bottom-left">
                        <p><?php echo html_escape(trans("footer_copyright")) . "&nbsp;" . html_escape($settings->application_name) . "&nbsp;-&nbsp;" . html_escape(trans("all_rights")); ?></p>
                    </div>

                    <div class="footer-bottom-right">
                        <ul class="nav-footer">
                            <?php foreach ($footer_pages as $page) : ?>
                                <?php if ($page->visibility == 1): ?>
                                    <li>
                                        <a href="<?php echo base_url() . html_escape($page->slug); ?>"><?php echo html_escape($page->title); ?> </a>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- .row -->
        </div>
    </div>
</footer>
<!-- End Footer Section -->

<script>
    var base_url = '<?php echo base_url(); ?>';
    var csfr_token_name = '<?php echo $this->security->get_csrf_token_name(); ?>';
    var csfr_cookie_name = '<?php echo $this->config->item('csrf_cookie_name'); ?>';
</script>

<canvas id="canvasC" width="200" height="50"></canvas>
<canvas id="canvasCc" width="200" height="50"></canvas>


<!-- Scroll Up Link -->
<a href="#" class="scrollup"><i class="fa fa-angle-up"></i></a>

<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets/js/jquery-1.12.4.min.js"></script>

<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Owl-carousel -->
<script src="<?php echo base_url(); ?>assets/vendor/owl-carousel/owl.carousel.min.js"></script>

<!--News Ticker-->
<script src="<?php echo base_url(); ?>assets/vendor/news-ticker/jquery.easy-ticker.min.js"></script>

<!-- iCheck js -->
<script src="<?php echo base_url(); ?>assets/vendor/icheck/icheck.min.js"></script>

<!-- Jquery Confirm -->
<script src="<?php echo base_url(); ?>assets/vendor/jquery-confirm/jquery-confirm.min.js"></script>

<!-- Cookie-->
<script src="<?php echo base_url(); ?>assets/js/jquery.cookie.js"></script>

<!-- Gallery -->
<script src="<?php echo base_url(); ?>assets/vendor/masonry-filter/imagesloaded.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/masonry-filter/masonry-3.1.4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/masonry-filter/masonry.filter.js"></script>

<!-- Magnific Popup-->
<script src="<?php echo base_url(); ?>assets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

<!-- Script -->
<script src="<?php echo base_url(); ?>assets/js/script.js"></script>

</body>
</html>