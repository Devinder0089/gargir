<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Section: wrapper -->
<section id="wrapper">
        <div class="row contentrow">

            <!-- breadcrumb -->
            <div class="col-sm-12 page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="<?php echo base_url(); ?>"><?php echo trans("breadcrumb_home"); ?></a>
                    </li>
                    <li class="breadcrumb-item active"><?php echo $title; ?></li>
                </ol>
            </div>
                <div class="row formcontentrow">
                        <div class="col-sm-12 loginbox">
                        
                                <!-- form start -->
                                <?php echo form_open_multipart('auth/change_password_post'); ?>
                                <!-- include message block -->
                                <?php $this->load->view('partials/_messages'); ?>
                              
                                 <div class="col-sm-12 fullsec">
                                    <h4 class="auth-title text-center">
                                    <?=$title;?>
                                    </h4>
                                </br>
                                 </div>
                                 <div class="col-sm-12 fullsec">
                                    <div class="col-sm-6 secimput">
                                          <span>New Password *</span>
                                        <div class="form-group has-feedback">
                                        <input type="password" class="form-control form-input"
                                        name="new_password" required>
                                         <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 secimput">
                                          <span>Confirm password *</span>
                                        <div class="form-group has-feedback">
                                        <input type="text" class="form-control form-input" name="confirm_password" required>
                                         <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                        </div>
                                    </div>
                                </div>

                              
                                <div class="col-sm-12 colupdatele text-center">
                                    <button name="changepass" type="submit" class="btn btn-primary btn-custom text-center">
                                     change Password
                                    </button>
                                </div>
                            
                                <?php echo form_close(); ?><!-- form end -->
                       
                    </div>
            </div>
    </div>
</section>
<!-- /.Section: wrapper -->