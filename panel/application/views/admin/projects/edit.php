<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row">
    <div class="col-sm-12">
        <div class="box box-primary">

            <div class="box-header">
                <div class="left">
                    <h3 class="box-title"><?php echo $title; ?></h3>
                    <br>
                    <small>You can <?php echo $title; ?> from this form</small>
                </div>
                <div class="right">
                    <a href="<?php echo base_url(); ?>admin/projects" class="btn btn-sm btn-success btn-add-new">
                        <i class="fa fa-bars"></i>
                       <?= trans('all_projects') ?>
                    </a>
                </div>
            </div><!-- /.box-header -->

            <!-- form start -->
            <?php echo form_open_multipart('projects/project_edit_post'); ?>

            <div class="box-body">
                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages'); ?>
              <div class="row">
                    <div class="col-md-6">
                         <div class="form-group">
                            <label class="control-label"><i class="red">*</i><?= trans('title')?></label>
                            <input type="text" class="form-control" name="title" value="<?= $project->title ?>" readonly required>
                        </div>
                    </div>
                    <div class="col-md-4" style="display:none">
                         <div class="form-group">
                            <label class="control-label"><i class="red">*</i><?= trans('type')?></label>
                            <select name="type" class="form-control max-800" required>
                                  <option value="apartment" <?php if($project->type == "apartment"):?> selected <?php endif; ?>>Apartment</option>
                            </select>
                        </div>
                    </div>
                      <div class="col-md-6">
                         <div class="form-group">
                            <label class="control-label"><i class="red">*</i><?= trans('number_apartments')?></label>
                            <input type="text" class="form-control" name="no_of_apartments" value="<?= $project->no_of_apartments ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"  required>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                         <div class="form-group">
                            <label class="control-label"><i class="red">*</i><?= trans('building_number')?></label>
                            <input type="text" class="form-control" name="building_no" value="<?= $project->building_no ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                          <div class="form-group">
                            <label class="control-label"><i class="red">*</i><?= trans('project_currency')?></label>
                            <select name="currency" class="form-control max-800">
                               <option value="ILS" <?php if($project->currency == "ILS"):?> selected <?php endif; ?>>ILS</option>
                                <option value="USD" <?php if($project->currency == "USD"):?> selected <?php endif; ?>>USD</option>
                                <option value="EUR" <?php if($project->currency == "EUR"):?> selected <?php endif; ?>>EUR</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                            <label class="control-label"><i class="red">*</i><?= trans('city')?></label>
                             <input type="text" class="form-control" name="city" value="<?= $project->city ?>" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label"><i class="red">*</i><?= trans('zip_code')?></label>
                             <input type="text" class="form-control" name="zipcode" value="<?= $project->zipcode ?>" required>
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="control-label"><i class="red">*</i><?= trans('address')?></label>
                        <textarea class="form-control text-area" name="address" required><?= $project->address ?> </textarea>
                    </div>
                    </div>
                 
                </div>
                <div class="row" style="margin-top:20px">
                    <div class="col-md-6">
                      <div class="form-group">
                            <label class="control-label"><?= trans('project_url')?></label>
                            <input type="text" class="form-control" name="url" value="<?= $project->url ?>">
                        </div>

                    </div>
                    <div class="col-sm-6">
                        <a class='btn btn-sm bg-purple'>
                            <?= trans('new_files')?>
                            <input type="file" name="files[]" accept="image/*"  multiple="multiple" size="40">
                        </a>
                    </div>
                    
                </div>
                <div class="row" style="margin-top:20px">
                     <?php 
                        if($project->images):
                            $images = explode(',', $project->images);
                        foreach($images as $img):
                    ?>
                    <div class="col-sm-3" style="padding:2px; margin-top:5px">
                        <a href="<?= base_url()?>/uploads/project/<?= $img ?>" target="_blank"><img src="<?= base_url()?>/uploads/project/<?= $img ?>" width="50px" height="50px" class="prjtimg"></a>
                    </div>
                    <?php 
                        endforeach; else:
                        echo "";
                        endif;
                    ?>          
                </div>
                <div class="row" style="margin-top:20px">
                    <div class="col-md-6">
                         <div class="form-group">
                            <label class="control-label"><i class="red">*</i><?= trans('assign_to_worker')?></label>
                            <select name="assign_user_id[]" class="form-control max-800 add_on_client chosen-select" id="search-select" multiple="multiple" required>
                                  <?php if(isset($workers)):
                                       $assign = explode(',', $project->assign);
                                        foreach($workers as $worker):
                                  ?>
                                        <option value="<?= $worker->id; ?>" <?php if(in_array($worker->id,$assign)):?> selected <?php endif;?>><?= $worker->email;?></option>
                                  <?php endforeach; endif;?>
                            </select>
                        </div>
                    </div>
                     <div class="col-md-6">
                         <div class="form-group">
                            <label class="control-label"><?= trans('expected_delivery_date')?></label>
                            <input type="date" name="expt_delvry_date" value="<?= $project->expt_delvry_date ?>" class="form-control">
                        </div>
                    </div>
                </div>
              <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="control-label"><i class="red">*</i><?= trans('content')?></label>
                        <textarea class="form-control text-area" name="content" required><?= $project->content ?></textarea>
                    </div>
                    </div>
                </div>
               <div class="row" style="margin-top:20px">
                    <div class="col-md-4">
                         <div class="form-group">
                            <label class="control-label"><i class="red">*</i><?= trans('manager_name')?></label>
                            <input type="text" class="form-control" name="project_manager_name" value="<?=$project->project_manager_name;?>" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                         <div class="form-group">
                            <label class="control-label"><i class="red">*</i><?= trans('manager_email')?></label>
                            <input type="text" class="form-control" name="manager_email" value="<?=$project->manager_email;?>" required>
                        </div>
                    </div>
                      <div class="col-md-4">
                         <div class="form-group">
                            <label class="control-label"><i class="red">*</i><?= trans('manager_phone')?></label>
                            <input type="text" class="form-control" name="manager_phone" value="<?=$project->manager_phone;?>" required>
                        </div>
                    </div>
                </div>
            <!-- /.box-body -->
            <div class="box-footer">
            <button type="submit" name="projectbt" class="btn btn-primary btn-block pull-right"><?= trans('update')?></button>
            </div>
             <input type="hidden" name="project_id" value="<?=$project->id;?>">
            <!-- /.box-footer -->
            <?php echo form_close(); ?><!-- form end -->

        </div>
    </div>
</div>
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<script>
$(document).ready(function(){ 

    $("#userselect").select2({
        allowClear: true
    });
    $(".selectformcontrol ul").on("click",function(){
        console.log('ssssss');
    });
});

  $(".chosen-select").chosen({
      no_results_text: "Oops, nothing found!"
    });
</script>
