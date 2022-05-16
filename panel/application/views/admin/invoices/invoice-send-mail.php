<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row secfullrow">
    <div class="col-sm-12">
        <div class="box box-primary">

            <div class="box-header">
                <div class="left">
                    <h3 class="box-title"><?php echo $title; ?></h3>
                    <br>
                    <small>You can <?php echo $title; ?> a new  from this form</small>
                </div>
                <div class="right">
                    <a href="<?php echo base_url(); ?>admin/invoices" class="btn btn-sm btn-success btn-add-new">
                        <i class="fa fa-bars"></i>
                        View invoices
                    </a>
                </div>
            </div><!-- /.box-header -->

            <!-- form start -->
            <?php echo form_open_multipart('admin/invoice-send-mail-post',['class'=>'invoicesfm']); ?>

            <div class="box-body">
                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages'); ?>

               
         
            <div class="row rowsecfm">
                <div class="col-sm-12 col-lg-12 form-group">
                 <label class="control-label">Select Users</label>
                    <select id="userselect" name="userselect[]" class="selectformcontrol populate placeholder" multiple="multiple">
                        <?php 
                       
                        if(isset($users_membership)){

                        foreach($users_membership as $vl):
                        
                           $users=get_user($vl->user_id);
                            if($user->id != $vl->user_id):
                            ?>
                        <option value="<?=$vl->user_id;?>"><?=$users->email;?></option>
                        <?php 
                        endif;
                    endforeach;  
                    } ?>
                    </select>

                </div>

            </div>
        
            <!-- /.box-body -->
            <div class="box-footer">
            <button type="submit" name="savebt" class="btn btn-primary pull-right">Send Mail</button>
            </div>
          <input type="hidden" name="invid" value="<?= $id;?>">
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