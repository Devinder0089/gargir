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
                    <a href="<?php echo base_url(); ?>admin/membership" class="btn btn-sm btn-success btn-add-new">
                        <i class="fa fa-bars"></i>
                        View
                    </a>
                </div>
            </div><!-- /.box-header -->

            <!-- form start -->
            <?php echo form_open_multipart('admin/membership/add-post'); ?>

            <div class="box-body">
                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages'); ?>

            <div class="row rowsecfm">

                <div class="col-sm-6 col-lg-6 form-group">
                    <label class="control-label"><i class="red">*</i>Package Name</label>
                    <input type="text" class="form-control inputtitle" name="name" required>
                </div>

               
            <div class="col-sm-6 col-lg-6 form-group">
                <label class="control-label"><i class="red">*</i>Package Plan</label>
                <select name="type" class="form-control max-800 inputtype" required>
                      <option value="basic">Basic</option>
                      <option value="standard">Standard</option>
                      <option value="premium">Premium</option>
                </select>
            </div>
            </div>

            <div class="row rowsecfm">

                <div class="col-sm-6 col-lg-6 form-group">
                    <label class="control-label"><i class="red">*</i>Package validity option</label>
                    <select name="validity_option" class="form-control max-800 validityoption" required>
                   <!--  <option value="days">days</option>
                    <option value="week">week</option> -->
                    <option value="month">Month</option>
                    <!-- <option value="year">year</option> -->
                    <option value="full">Full</option>
                    </select>
                </div>

               
            <div class="col-sm-6 col-lg-6 form-group">
                <label class="control-label"><i class="red">*</i>Package Assing Agent</label>
                <input type="number" name="plan_validity" class="form-control planvalidity" value="1" required>
            </div>
            </div>

        
             <div class="row rowsecfm">
                <div class="col-sm-6 col-lg-6 form-group">
                    <label class="control-label"><i class="red">*</i>Price</label>
                    <input type="number" class="form-control inputprice" name="price" value="0" required>
                </div>
                 <div class="col-sm-6 col-lg-6 form-group">
                    <label class="control-label"><i class="red">*</i>Discount</label>
                    <input type="number" class="form-control option" name="discount" value="0" required>
                </div>
            </div>
      

            <div class="row rowsecfm">
                <div class="col-sm-12 col-lg-12 form-group">
                <label class="control-label">Package Plan Service</label>
                <ul class="secserviceul">
                <?php
                if(isset($membership_service)):
                    foreach($membership_service as $vl): 
                ?>
                <li>
                <p><?=$vl->name;?>
                <input type="checkbox" class="formcontrol membershipservice" name="membership_service[]" value="<?=$vl->id;?>">
                </p>
                </li>
                <?php
                endforeach;
                endif;
                ?>
                </ul>
                </div>
            </div>

            <div class="row rowsecfm">
                <div class="col-sm-12 col-lg-12 form-group">
                <label class="control-label">Content</label>
                <textarea class="form-control text-area input" name="content"></textarea>
                </div>
            </div>


            <!-- /.box-body -->
            <div class="box-footer">
            <button type="submit" name="savebt" class="btn btn-primary pull-right">Keeping</button>
            </div>
             <input type="hidden" name="uid" value="<?=$user->id;?>">
            <!-- /.box-footer -->
            <?php echo form_close(); ?><!-- form end -->

        </div>
    </div>
</div>

<script>
      $('#dateTime').ejDateTimePicker({
       dayHeaderFormat: "showHeaderShort",
       width: '200px',
    });
</script>