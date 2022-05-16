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
                    <a href="<?php echo base_url(); ?>admin/package" class="btn btn-sm btn-success btn-add-new">
                        <i class="fa fa-bars"></i>
                        View
                    </a>
                </div>
            </div><!-- /.box-header -->

            <!-- form start -->
            <?php echo form_open_multipart('admin/package-edit-post'); ?>

            <div class="box-body">
                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages'); ?>

            <div class="row rowsecfm">
                <div class="col-sm-12 col-lg-12 form-group">
                    <label class="control-label"><i class="red">*</i>Package service name</label>
                    <input type="text" class="form-control inputtitle" name="name" value="<?=(isset($package))?$package->name:'';?>" required>
                </div>
            </div>

        <input type="hidden" name="id" value="<?= (isset($package))?$package->id:'0';?>">
            <!-- /.box-body -->
            <div class="box-footer">
            <button type="submit" name="savebt" class="btn btn-primary pull-right">Keeping</button>
            </div>
            <!-- /.box-footer -->
            <?php echo form_close(); ?><!-- form end -->

        </div>
    </div>
</div>
