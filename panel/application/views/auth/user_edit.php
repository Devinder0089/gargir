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
                                <?php echo form_open_multipart('auth/update_user_post'); ?>
                                       <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages'); ?>
                                <div class="col-sm-12 fullsecimg">
                                 <img src="<?php echo html_escape(get_user_avatar($user)); ?>" alt="avatar" class="imgupdate">
                             </div>
                                 <div class="col-sm-12 fullsec">
                                    <div class="col-sm-6 secimput">
                                        <div class="form-group has-feedback">
                                        <input type="text" class="form-control form-input"
                                        name="email" placeholder="Email"
                                        value="<?php echo html_escape($user->email); ?>" readonly>
                                         <span class=" glyphicon glyphicon-envelope form-control-feedback"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 secimput">
                                        <div class="form-group has-feedback">
                                        <input type="text" class="form-control form-input"
                                        name="username" placeholder="Username"
                                        value="<?php echo html_escape($user->username); ?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 fullsec">
                                    <div class="col-sm-6 secimput">
                                          <span>New Password</span>
                                        <div class="form-group has-feedback">
                                        <input type="password" class="form-control form-input" name="new_password">
                                         <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 secimput">
                                          <span>Confirm password</span>
                                        <div class="form-group has-feedback">
                                        <input type="text" class="form-control form-input" name="confirm_password">
                                         <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                                        </div>
                                    </div>
                                </div>

                                 <div class="col-sm-12 fullsec">
                                    <div class="col-sm-6 secimput">
                                        <div class="form-group has-feedback">
                                            <span>First name</span>
                                        <input type="text" class="form-control form-input"
                                        name="first_name" value="<?php echo html_escape($user->first_name); ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 secimput">
                                        <div class="form-group has-feedback">
                                              <span>Last name</span>
                                        <input type="text" class="form-control form-input"
                                        name="last_name" value="<?php echo html_escape($user->last_name); ?>">
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-sm-12 fullsec">
                                    <div class="col-sm-6 secimput">
                                        <div class="form-group has-feedback">
                                        <span>Upload Image</span>
                                        <input type="file" class="form-control form-file" name="file">
                                        </div>
                                    </div>

                                    <div class="col-sm-6 secimput">
                                        <div class="form-group has-feedback">
                                             <span>Phone number</span>
                                        <input type="text" class="form-control form-input"
                                        name="phone" value="<?php echo html_escape($user->phone); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 fullsec">
                                    <div class="form-group has-feedback">
                                    <span>Address</span>
                                    <textarea name="address" class="form-control text-area formaddress" rows="4"><?php echo html_escape($user->address); ?></textarea> 
                                    </div>
                                </div>


                                <div class="col-sm-12 col-update-profile">
                                    <button type="submit" class="btn btn-primary btn-custom pull-right">
                                        <?php echo trans("btn_update_profile"); ?>
                                    </button>
                                </div>
                                <input type="hidden" name="id" value="<?=$user->id;?>">
                                <?php echo form_close(); ?><!-- form end -->
                       
                    </div>
            </div>
    </div>
</section>
<!-- /.Section: wrapper -->