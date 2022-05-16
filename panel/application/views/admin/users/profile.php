<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Section: wrapper -->
<section id="wrapper userprofilesec">
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
                                    <div class="col-sm-12 secimput">
                                        <div class="form-group has-feedback">
                                        <span><?= trans("email"); ?></span>
                                        <input type="text" class="form-control form-input"
                                        name="email" placeholder="Email"
                                        value="<?php echo html_escape($user->email); ?>" readonly>
                                         
                                        </div>
                                    </div>
                                    <!--<div class="col-sm-6 secimput">-->
                                    <!--    <div class="form-group has-feedback">-->
                                    <!--    <input type="text" class="form-control form-input"-->
                                    <!--    name="username" placeholder="Username"-->
                                    <!--    value="<?php echo html_escape($user->username); ?>" required>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                </div>
                                

                                 <div class="col-sm-12 fullsec">
                                    <div class="col-sm-6 secimput">
                                        <div class="form-group has-feedback">
                                            <span><?= trans("first_name"); ?></span>
                                        <input type="text" class="form-control form-input"
                                        name="first_name" value="<?php echo html_escape($user->first_name); ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 secimput">
                                        <div class="form-group has-feedback">
                                              <span><?= trans("last_name"); ?></span>
                                        <input type="text" class="form-control form-input"
                                        name="last_name" value="<?php echo html_escape($user->last_name); ?>">
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-sm-12 fullsec">
                                    <div class="col-sm-6 secimput">
                                        <div class="form-group has-feedback">
                                        <span><?= trans("profile_pic"); ?></span>
                                        <input type="file" class="form-control form-file" name="file">
                                        </div>
                                    </div>

                                    <div class="col-sm-6 secimput">
                                        <div class="form-group has-feedback">
                                             <span><?= trans("phone_number"); ?></span>
                                        <input type="text" class="form-control form-input"
                                        name="phone" readonly value="<?php echo html_escape($user->phone); ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 fullsec">
                                    <div class="form-group has-feedback">
                                    <span><?= trans("address"); ?></span>
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