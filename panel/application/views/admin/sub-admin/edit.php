<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Section: wrapper -->
<section id="wrapper">
    <div class="row contentrow">
        <div class="box-header">
            <div class="left">
                <ol class="breadcrumb">
                <li class="breadcrumb-item">
                <a href="<?php echo base_url(); ?>"><?php echo trans("breadcrumb_home"); ?></a>
                </li>
                <li class="breadcrumb-item active"><?php echo $title; ?></li>
                </ol>
            </div>
            <div class="right">
                <a href="<?php echo base_url('admin');?>/sub-admin" class="btn btn-sm btn-success btn-add-new">
                <i class="fa fa-bars"></i>
                View all sub-admins
                </a>
            </div>
    </div>
           

    <div class="row formcontentrow">
        <!-- include message block -->
        <?php $this->load->view('admin/includes/_messages'); ?>

        <div class="col-sm-12 loginbox">    
        <!-- form start -->
        <?php echo form_open_multipart('sub_admin/user_edit_post'); ?>

        <div class="col-sm-12 fullsec">
            <div class="col-sm-6 secimput">
            <span>Email *</span>
            <div class="form-group has-feedback">
            <input type="email" class="form-control form-input"
            name="email" value="<?=$user->email;?>" required>
            <span class=" glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            </div>
            <div class="col-sm-6 secimput">
            <span>Username *</span>
            <div class="form-group has-feedback">
            <input type="text"  name="username" value="<?=$user->username;?>" class="form-control form-input" required>
            <span class=" glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            </div>
            </div>
            <?php if(is_admin() || is_permission_user('sub_admin_password')): ?>
            <div class="col-sm-12 fullsec">
            <div class="col-sm-6 secimput">
            <span>Password</span>
            <div class="form-group has-feedback">
            <input type="password" class="form-control form-input"
            name="password">
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
        <?php endif; ?>
            <div class="col-sm-12 fullsec">
            <div class="col-sm-6 secimput">
            <span>First name</span>
            <div class="form-group has-feedback">
            <input type="text"  value="<?=$user->first_name;?>" class="form-control form-input"
            name="first_name">
            <span class=" glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            </div>
            <div class="col-sm-6 secimput">
            <span>Last name</span>
            <div class="form-group has-feedback">
            <input type="text" value="<?=$user->last_name;?>" class="form-control form-input"
            name="last_name">
            <span class=" glyphicon glyphicon-user form-control-feedback"></span>
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
            <span>Phone number *</span>
            <input type="text" value="<?=$user->phone;?>" class="form-control form-input"
            name="phone" required>
            </div>
            </div>
            </div>

            <div class="col-sm-12 fullsec">
            <div class="form-group has-feedback">
            <span>User Role *</span>
            <select name="role" class="form-control  formselect">
            <option value="sub-admin">sub-admin</option>
            </select> 
            </div>
            </div>

            <div class="col-sm-12 fullsec">
            <div class="form-group has-feedback">
            <span>Address</span>
            <textarea name="address" class="form-control text-area formaddress" rows="4"><?=($user->address)?$user->address:'';?></textarea> 
            </div>
            </div>


            <div class="col-sm-12 col-update-profile">
            <button name="addusers" type="submit" class="btn btn-primary btn-custom pull-right">
            Add User
            </button>
            </div>
            <input type="hidden" value="<?=$user->id;?>" name="id">
            <?php echo form_close(); ?><!-- form end -->

            </div>
        </div>
    </div>
</section>
<!-- /.Section: wrapper -->