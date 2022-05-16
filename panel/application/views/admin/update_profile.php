<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-sm-8">
        <div class="box box-primary">

            <div class="box-header">
                <div class="left">
                    <h3 class="box-title">Update Profile</h3>
                    <br>
                    <small>You can update your profile from this form</small>
                </div>
            </div><!-- /.box-header -->

            <!-- form start -->
            <?php echo form_open_multipart('admin/update_profile_post'); ?>

            <input type="hidden" name="id" value="<?php echo html_escape($user->id); ?>">

            <div class="box-body">
                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages'); ?>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-12 col-profile">
                            <img src="<?php echo html_escape(get_user_avatar($user)); ?>" alt="avatar" class="thumbnail img-responsive img-update">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-profile">
                            <p>
                                <a class="btn btn-success btn-sm">
                                    Change Avatar
                                    <input name="file" size="40" class="uploadFile" accept=".png, .jpg, .jpeg" onchange="$('#upload-file-info').html($(this).val());" type="file">
                                </a>
                            </p>
                            <p class='label label-info' id="upload-file-info"></p>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control form-input"
                           name="username" placeholder="Username"
                           value="<?php echo html_escape($user->username); ?>">
                </div>

                <div class="form-group">
                    <label class="control-label">About Me</label>
                    <textarea class="form-control text-area"
                              name="about_me" placeholder="About Me"><?php echo html_escape($user->about_me); ?></textarea>
                </div>


            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Save Changes</button>
            </div>
            <!-- /.box-footer -->
            <?php echo form_close(); ?><!-- form end -->
        </div>
    </div>
</div>