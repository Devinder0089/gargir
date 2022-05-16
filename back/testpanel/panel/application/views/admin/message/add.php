<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
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
                        View Messages
                    </a>
                </div>
            </div><!-- /.box-header -->

            <!-- form start -->
            <?php echo form_open_multipart('messages/send_message_post'); ?>

            <div class="box-body">
                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages'); ?>

                <div class="form-group">
                    <label class="control-label">Select Users</label>
                    <select id="userselect" name="userselect[]" class="selectformcontrol populate placeholder" multiple="multiple">
                        <?php 
                        $dataus =get_users();
                        if($dataus){
                        foreach($dataus as $vl):
                        if($user->id != $vl->id):
                            ?>
                        <option value="<?=$vl->id;?>" data-mdb-icon="https://mdbootstrap.com/img/Photos/Avatars/avatar-3.jpg"><?=$vl->email;?></option>
                    <?php 
                    endif;
                    endforeach;  
                    } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label class="control-label">subject</label>
                    <input type="text" class="form-control" name="subject"required>
                </div>

                <div class="form-group">
                    <label class="control-label">Message</label>
                <textarea class="form-control text-area" name="content" placeholder="messages"></textarea>

                  
                </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <button type="submit" class="btn btn-primary pull-right">Send Message</button>
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
