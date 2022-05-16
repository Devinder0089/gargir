<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-sm-12">
        <div class="box box-primary">

            <div class="box-header">
                <div class="left">
                    <h3 class="box-title"><?php echo $title; ?></h3>
                    <br>
                    <small>You can <?php echo $title; ?> a new  from this form</small>
                </div>
                <div class="right">
                    <a href="<?php echo base_url(); ?>admin/projects" class="btn btn-sm btn-success btn-add-new">
                        <i class="fa fa-bars"></i>
                        View Posts
                    </a>
                </div>
            </div><!-- /.box-header -->

            <!-- form start -->
            <?php echo form_open_multipart('projects/add_project_post'); ?>

            <div class="box-body">
                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages'); ?>

                <div class="form-group">
                    <label class="control-label">Project Title *</label>
                    <input type="text" class="form-control" name="title" required>
                </div>

                <div class="form-group">
                    <label class="control-label">Project Assign User *</label>
                    <select id="userselect" name="userselect[]" class="selectformcontrol populate placeholder" multiple="multiple">
                        <?php 
                        $dataus =get_users();
                        if($dataus){
                        foreach($dataus as $vl):
                        if($user->id != $vl->id):
                            ?>
                        <option value="<?=$vl->id;?>"><?=$vl->email;?></option>
                    <?php 
                    endif;
                    endforeach;  
                    } ?>
                    </select>
                </div>

            <div class="form-group">
                <label class="control-label">Project Type *</label>
                <select name="type" class="form-control max-800" required>
                      <option value="apartment">Apartment</option>
                      <option value="projects">Projects</option>
                </select>
            </div>

            <div class="form-group">
                <label class="control-label">Project Currency *</label>
                <select name="currency" class="form-control max-800" required>
                      <option value="$">$ USD</option>
                      <option value="Rs">Rs indian</option>
                </select>
            </div>

            <div class="form-group">
                    <label class="control-label">Project Price *</label>
                    <input type="number" class="form-control" name="price" value="0" required>
                </div>
                <div class="form-group">
                    <label class="control-label">Project Percentage Discount *</label>
                    <input type="number" class="form-control" name="discount" value="0" required>
                </div>

                <div class="form-group">
                    <label class="control-label">Project Url</label>
                    <input type="text" class="form-control" name="url">
                </div>

                <div class="form-group">
                    <label class="control-label">Content</label>
                    <textarea class="form-control text-area" name="content"></textarea>
                </div>

                <div class="form-group">
                    <label class="control-label">Main Image</label>
                    <div class="row">
                        <div class="col-sm-12">
                            <a class='btn btn-sm bg-purple'>
                                Select image
                                <input type="file" name="file" size="40" class="uploadFile">
                            </a>
                        </div>
                    </div>


            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            <button type="submit" name="projectbt" class="btn btn-primary pull-right">Add Projects</button>
            </div>
             <input type="hidden" name="uid" value="<?=$user->id;?>">
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