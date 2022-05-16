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
                    <a href="<?php echo base_url(); ?>admin/project-reports/<?=$report->project_slug;?>" class="btn btn-sm btn-success btn-add-new">
                        <i class="fa fa-bars"></i>
                        <?=trans('project_reports');?>
                    </a>
                </div>
            </div><!-- /.box-header -->

            <!-- form start -->
            <form method="post" id="updateForm" enctype="multipart/form-data" action="<?php echo base_url('projects/projectReportEdit_post')?>">

            <div class="box-body">
                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages'); ?>
                <input type="hidden" name="id" value="<?= $report->id ?>"/>
                 <input type="hidden" name="project_id" value="<?= $report->project_id ?>"/>
                <div class="form-group">
                    <label class="control-label"><?=trans('title');?> *</label>
                    <input type="text" class="form-control" name="title" value="<?= $report->title ?>" required>
                    <div style="display:none; color:red;" class="titleError"><?=trans('this_field_is_required');?></div>
                </div>
                <div class="form-group">
                    <label class="control-label"><?=trans('content');?> *</label>
                    <textarea class="form-control text-area" name="description" required><?= $report->description ?></textarea>
                     <div style="display:none; color:red;" class="descirptionError"><?=trans('this_field_is_required');?></div>
                </div>

                <div class="form-group">
                    <label class="control-label"></label>
                    <div class="row">
                        <div class="col-sm-12" style="text-align:right">
                             <?php 
                                if($report->images):
                                $imgs = explode(',', $report->images);
                                foreach($imgs as $img):
                                    $image_explode =explode(".",$img);
                                      $image_type= end($image_explode);
                                      if($image_type == 'pdf' || $image_type == 'docs' || $image_type == 'doc'):
                                    ?>
                                       <a class="edituser" target="_blank" href="<?php echo base_url(); ?>uploads/project/<?=$img;?>">
                                            <i class="fa fa-book i-edit"><?=trans('click_to_view');?></i>
                                        </a>
                                    <?php else:?>
                                     <a class="edituser" target="_blank" href="<?php echo base_url(); ?>uploads/project/<?=$img;?>">
                                             <img width="200px" height="200px" src="<?= base_url();?>uploads/project/<?= $img ?>"/>
                                        </a>
                                       
                                   <?php endif; ?>
                            <?php endforeach;?>
                            <?php else:
                                echo "";
                                endif;
                            ?>
                        </div>
                        <div class="col-sm-12" style="margin-top:5px;">
                            <a class='btn btn-sm bg-purple'>
                                <?=trans('new_files');?>
                                <input type="file" name="files[]" size="40" multiple="multiple" class="uploadFile">
                            </a>
                        </div>
                    </div>
                 <div class="form-group">
                <label for="message-text" class="col-form-label"><?=trans('send_with_email');?>:</label>
                   <input type="checkbox" name="type" value="1">
                </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
            <button type="submit" name="projectbt" class="btn btn-primary pull-right"><?=trans('update');?></button>
            </div>
            <!-- /.box-footer -->
            </form><!-- form end -->

        </div>
    </div>
</div>

<script>
$(document).ready(function(){ 
    $('.update').on('click', function(){
             event.preventDefault();
            var title = $("input[name='title']").val();
            var description = $("textarea[name='description']").val();
            if(title == ""){
                $('.titleError').css('display','block');
            }
            else if(description == ""){
                $('.descirptionError').css('display','block');
            }else{
                $('.titleError').css('display','none');
                $('.descirptionError').css('display','none');
                $('#updateForm').submit();
            }
        });
});
</script>