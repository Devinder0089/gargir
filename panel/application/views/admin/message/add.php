<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row secmaimessage">
    <div class="col-sm-12">
        <div class="box box-primary">

            <div class="box-header">
                <div class="left">
                    <h3 class="box-title"><?=$title;?></h3>
                    <br>
                    <small>You can <?=$title;?> a new from this form</small>
                </div>
                <div class="right">
                    <a href="<?=base_url('messages');?>" class="btn btn-sm btn-success btn-add-new">
                        <i class="fa fa-bars"></i>
                        <?=trans('all_message')?>
                    </a>
                </div>
            </div><!-- /.box-header -->

            <!-- form start -->
            <?php echo form_open_multipart('messages/send_message_post'); ?>

            <div class="box-body">
                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages'); ?>

                <div class="form-group">
                    <label class="control-label"><i class="red">*</i><?=trans('select_users')?></label>
                    <select id="userselect" name="userselect[]" class="selectformcontrol populate placeholder" multiple="multiple">
                        <?php 
                        $dataus =get_users();
                        if($dataus){
                        foreach($dataus as $vl):
                        if($user->role == "admin" && $user->id != $vl->id):
                        
                            ?>
                        <option value="<?=$vl->id;?>" data-mdb-icon="https://mdbootstrap.com/img/Photos/Avatars/avatar-3.jpg"><?=$vl->email;?></option>
                        <?php elseif($user->role == "contractor" && $user->id != $vl->id && $user->id == $vl->contractor_id):?>
                        
                        <option value="<?=$vl->id;?>" data-mdb-icon="https://mdbootstrap.com/img/Photos/Avatars/avatar-3.jpg"><?=$vl->email;?></option>
                        <?php elseif($user->role == "worker" && $user->id != $vl->id && $user->contractor_id == $vl->contractor_id || $user->contractor_id == $vl->id):?>
                        <option value="<?=$vl->id;?>" data-mdb-icon="https://mdbootstrap.com/img/Photos/Avatars/avatar-3.jpg"><?=$vl->email;?></option>
                         <?php elseif($user->role == "client" && $user->id != $vl->id && $user->contractor_id == $vl->contractor_id && $user->role != $vl->role && $vl->role != 'admin'):?>
                        <option value="<?=$vl->id;?>" data-mdb-icon="https://mdbootstrap.com/img/Photos/Avatars/avatar-3.jpg"><?=$vl->email;?></option>
                    <?php 
                    endif;
                    endforeach;  
                    } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label"><i class="red">*</i><?=trans('subject')?></label>
                    <input type="text" class="form-control" name="subject"required>
                </div>

                <div class="form-group">
                    <label class="control-label"><i class="red">*</i><?=trans('message')?></label>
                <textarea class="form-control text-area" name="content" placeholder="messages" required></textarea>
                </div>
                <div class="form-group docfile">
                <label class="control-label"><?=trans('file')?></label> 
                <input type="file" class="form-control" name="file" >
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right"><?=trans('send_message')?></button>
            </div>
            <!-- /.box-footer -->
            <?php echo form_close(); ?><!-- form end -->

        </div>
    </div>
</div>
<script>
$(document).ready(function(){ 

    $("#userselect").select2({
        allowClear: true
    });
    $(".selectformcontrol ul").on("click",function(){
        console.log('ssssss');
    });
});
</script>
