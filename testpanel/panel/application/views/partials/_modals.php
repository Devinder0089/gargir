<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="modal fade auth-modal" id="modal-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div id="menu-login" class="tab-pane fade in active">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><i class="ion-close-round" aria-hidden="true"></i></button>
                    <h4 class="modal-title font-1"><?php echo trans("title_login"); ?></h4>
                </div>

                <div class="modal-body">
                    <div class="auth-box">

                        <p class="p-auth-modal">
                            <?php echo trans("login_with_social"); ?>
                        </p>

                        <div class="row row-login-ext">
                            <div class="col-sm-6 col-xs-6">
                                <a href="<?php echo $facebook_login_url; ?>" class="btn-login-ext btn-login-facebook">
                                    <span class="icon"><i class="ion-social-facebook"></i></span>
                                    <span class="text"><?php echo trans("facebook"); ?></span>
                                </a>
                            </div>
                            <div class="col-sm-6 col-xs-6">
                                <a href="<?php echo $google_plus_login_url; ?>" class="btn-login-ext btn-login-google">
                                    <span class="icon"> <i class="ion-social-googleplus"></i> </span>
                                    <span class="text"><?php echo trans("google"); ?></span>
                                </a>
                            </div>
                        </div>

                        <p class="p-auth-modal-or">
                            <span><?php echo trans("or"); ?></span>
                        </p>

                        <!-- include message block -->
                        <div id="result-login"></div>

                        <!-- form start -->
                        <form id="form-login">
                            <div class="form-group has-feedback">
                                <input type="email" name="email" class="form-control form-input"
                                       placeholder="<?php echo trans("placeholder_email"); ?>"
                                       value="<?php echo old('email'); ?>" required>
                                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            </div>

                            <div class="form-group has-feedback">
                                <input type="password" name="password" class="form-control form-input"
                                       placeholder="<?php echo trans("placeholder_password"); ?>"
                                       value="<?php echo old('password'); ?>" required>
                                <span class=" glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>

                            <div class="row">
                                <div class="col-sm-7 col-xs-7">
                                    <a href="<?php echo base_url(); ?>reset-password" class="link-forget">
                                        <?php echo trans("title_forgot_password"); ?>
                                    </a>
                                </div>
                                <div class="col-sm-5 col-xs-5">
                                    <button type="submit" class="btn btn-primary btn-custom pull-right">
                                        <?php echo trans("btn_login"); ?>
                                    </button>
                                </div>
                            </div>
                        </form><!-- form end -->

                    </div>
                </div>

                <div class="modal-footer">
                    <a href="<?php echo base_url(); ?>register" class="link-forget">
                        <?php echo trans("create_account"); ?>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>


