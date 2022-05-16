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
                        <?= trans('all_projects')?>
                    </a>
                </div>
            </div><!-- /.box-header -->

            <!-- form start -->
            <?php echo form_open_multipart('projects/add_project_post'); ?>

            <div class="box-body">
                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages'); ?>
                <div class="row">
                    <div class="col-md-6">
                         <div class="form-group">
                            <label class="control-label"><i class="red">*</i><?= trans('title')?></label>
                            <input type="text" class="form-control" name="title" required>
                        </div>
                    </div>
                    <div class="col-md-4" style="display:none">
                         <div class="form-group">
                            <label class="control-label"><i class="red">*</i><?= trans('type')?></label>
                            <select name="type" class="form-control max-800" required>
                                  <option value="apartment"><?= trans('apartments')?></option>
                            </select>
                        </div>
                    </div>
                      <div class="col-md-6">
                         <div class="form-group">
                            <label class="control-label"><i class="red">*</i><?= trans('number_apartments')?></label>
                            <input type="text" class="form-control" name="no_of_apartments" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"  required>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                         <div class="form-group">
                            <label class="control-label"><i class="red">*</i><?= trans('building_number')?></label>
                            <input type="text" class="form-control" name="building_no" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                          <div class="form-group">
                            <label class="control-label"><i class="red">*</i> <?= trans('project_currency')?></label>
                            <select name="currency" class="form-control max-800">
                                  <option value=""></option>
                                  <option value="ILS">ILS</option>
                                  <option value="USD">USD</option>
                                  <option value="EUR">EUR</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                            <label class="control-label"><i class="red">*</i><?= trans('city')?></label>
                             <input type="text" class="form-control" name="city" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label"><i class="red">*</i><?= trans('zip_code')?></label>
                             <input type="text" class="form-control" name="zipcode" required>
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="control-label"><i class="red">*</i><?= trans('address')?></label>
                        <textarea class="form-control text-area" name="address" required></textarea>
                    </div>
                    </div>
                 
                </div>
                <div class="row" style="margin-top:20px">
                    <div class="col-md-6">
                      <div class="form-group">
                            <label class="control-label"><?= trans('project_url')?></label>
                            <input type="text" class="form-control" name="url">
                        </div>

                    </div>
                    <div class="col-md-6">
                         <div class="form-group">
                            <label class="control-label"><i class="red">*</i><?= trans('images')?></label>
                            <div class="row">
                                <div class="col-sm-12">
                                    <a class='btn btn-sm bg-purple'>
                                        <?= trans('select_images')?>
                                        <input type="file" name="files[]" accept="image/*"  multiple="multiple">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                         <div class="form-group">
                            <label class="control-label"><i class="red">*</i><?= trans('assign_to_worker')?></label>
                            <select name="assign_user_id[]" class="form-control max-800 add_on_client chosen-select" id="search-select" multiple="multiple" required>
                                  <?php if(isset($workers)):
                                        foreach($workers as $worker):
                                  ?>
                                        <option value="<?= $worker->id; ?>"><?= $worker->email;?></option>
                                  <?php endforeach; endif;?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                         <div class="form-group">
                            <label class="control-label"><?= trans('expected_delivery_date')?></label>
                            <input type="date" name="expt_delvry_date" class="form-control">
                        </div>
                    </div>
                </div>
              <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="control-label"><i class="red">*</i><?= trans('content')?></label>
                        <textarea class="form-control text-area" name="content" required></textarea>
                    </div>
                    </div>
                </div>
                 <div class="row" style="margin-top:20px">
                    <div class="col-md-4">
                         <div class="form-group">
                            <label class="control-label"><i class="red">*</i><?= trans('manager_name')?></label>
                            <input type="text" class="form-control" name="project_manager_name" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                         <div class="form-group">
                            <label class="control-label"><i class="red">*</i><?= trans('manager_email')?></label>
                            <input type="text" class="form-control" name="manager_email" required>
                        </div>
                    </div>
                      <div class="col-md-4">
                         <div class="form-group">
                            <label class="control-label"><i class="red">*</i><?= trans('manager_phone')?></label>
                            <input type="text" class="form-control" name="manager_phone" required>
                        </div>
                    </div>
                </div>
            <!-- /.box-body -->
            <div class="box-footer">
            <button type="submit" name="projectbt" class="btn btn-primary btn-block pull-right"><?= trans('add_project')?></button>
            </div>
             <input type="hidden" name="uid" value="<?=$user->id;?>">
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