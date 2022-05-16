
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-sm-12">
        <div class="box box-primary">

            <div class="box-header">
                <div class="left">
                    <h3 class="box-title"><?php echo $title; ?></h3>
                    <br>
                </div>
                <div class="right">
                     <a href="<?php echo base_url('admin');?>/clients" class="btn btn-sm btn-success btn-add-new">
                        <i class="fa fa-bars"></i>
                        <?= trans('all_clients');?>
                    </a>
                </div>
            </div><!-- /.box-header -->

            <!-- form start -->
            
            <div class="box-body">
             <?php echo form_open_multipart('clients/user_edit_post'); ?>

                <?php $this->load->view('admin/includes/_messages'); ?>
                <input type="hidden" name="id" value="<?= $user->id ?>"/>
                <div class="row">
                     <div class="col-sm-12 fullsecimg">
                         <img src="<?php echo html_escape(get_user_avatar($user)); ?>" alt="avatar" class="imgupdate">
                     </div>
                 </div>
                  <?php if(is_admin()):?>
                    <div class="row">
                        <div class="col-md-12">
                           <label class="control-label"><i class="red">*</i><?= trans('contractor');?></label>
                            <select name="contractor_id" class="form-control  formselect" required>
                                    <option value=""></option>
                                <?php if(isset($contractor)): foreach($contractor as $con ):?>
                                    <option value="<?php echo $con->id ?>" <?php if($user->contractor_id == $con->id):?> selected <?php endif?>><?php echo $con->email ?></option>
                                <?php endforeach; endif;?>
                            </select> 
                        </div>
                    </div>
                <?php endif; ?>
                <div class="row" style="margin-top:20px">
                    <div class="col-md-12">
                         <div class="form-group">
                            <label class="control-label"><i class="red">*</i><?= trans('email');?></label>
                              <input type="email" class="form-control form-input"
                                            name="email" readonly required value="<?php echo html_escape($user->email); ?>">
                        </div>
                    </div>
                    <!--<div class="col-md-6">-->
                    <!--     <div class="form-group">-->
                    <!--        <label class="control-label"><i class="red">*</i><?= trans('username');?></label>-->
                    <!--         <input type="text" class="form-control form-input" name="username" required value="<?php echo html_escape($user->username); ?>">-->
                    <!--    </div>-->
                    <!--</div>-->
                      <div class="col-md-6">
                         <div class="form-group">
                            <label class="control-label"><?= trans('new_password');?></label>
                             <input type="password" class="form-control form-input"
                                        name="password">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                         <div class="form-group">
                            <label class="control-label"><?= trans('confirm_password');?></label>
                            <input type="text" class="form-control form-input" name="confirm_password">
                        </div>
                    </div>
                   
                    <div class="col-md-6">
                         <div class="form-group">
                            <label class="control-label"><i class="red">*</i><?= trans('first_name');?></label>
                            <input type="text" class="form-control form-input"
                                        name="first_name" required value="<?php echo html_escape($user->first_name); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                         <div class="form-group">
                            <label class="control-label"><?= trans('last_name');?></label>
                          <input type="text" class="form-control form-input"
                                        name="last_name" value="<?php echo html_escape($user->last_name); ?>">
                        </div>
                    </div>
                     <div class="col-md-6">
                         <div class="form-group">
                            <label class="control-label"><?= trans('profile_pic');?></label>
                            <input type="file" class="form-control form-file" name="file">
                        </div>
                    </div>
                    <div class="col-md-6">
                         <div class="form-group">
                            <label class="control-label"><i class="red">*</i><?= trans('phone_number');?></label>
                             <input type="text" class="form-control form-input"
                                        name="phone" required value="<?php echo html_escape($user->phone); ?>" readonly>
                        </div>
                    </div>
                </div>
                
               
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label"><?= trans('user_role');?></label>
                             <select name="role" class="form-control  formselect">
                                <option value="client"><?=trans('client')?></option>
                            </select> 
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="control-label"><?= trans('address');?></label>
                        <textarea name="address" class="form-control text-area formaddress" rows="4"><?php echo html_escape($user->address); ?></textarea> 
                    </div>
                    </div>
                 
                </div>
                <div class="row">
               
               
             
            <div class="box-footer">
            <button type="submit" name="projectbt" class="btn btn-primary btn-block pull-right"> <?= trans('update_user');?></button>
            </div>
            
        </div>
        <?php echo form_close(); ?><!-- form end -->

    </div>
</div>
</div></div>
