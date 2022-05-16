<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row secfullrow">
    <div class="col-sm-12">
        <div class="box box-primary">

            <div class="box-header">
                <div class="left">
                    <h3 class="box-title"><?php echo $title; ?></h3>
                    <br>
                    <small>You can <?php echo $title; ?> from this form</small>
                </div>
                <div class="right">
                    <a href="<?php echo base_url(); ?>admin/finance" class="btn btn-sm btn-success btn-add-new">
                        <i class="fa fa-bars"></i>
                        <?= trans('finance') ?>
                    </a>
                </div>
            </div><!-- /.box-header -->

            <!-- form start -->
            <?php echo form_open_multipart('finance/add_post'); ?>

            <div class="box-body">
                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages'); ?>

            <div class="row rowsecfm">
                <div class="col-sm-6 col-lg-6 form-group">
                    <label class="control-label"><i class="red">*</i><?= trans('select_users') ?></label>
                    <select name="user_id" class="form-control max-800 inputtype" required>
                          <option value=""></option>
                          <?php if(isset($users)):
                                foreach($users as $user):
                          ?>
                          <option value="<?= $user->id;?>"><?= $user->email;?></option>
                          <?php endforeach; endif;?>
                    </select>
                </div>
                <div class="col-sm-6 col-lg-6 form-group">
                    <label class="control-label"><i class="red">*</i><?= trans('payment') ?></label>
                    <input type="text" class="form-control inputtitle" name="payment" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
                </div>
            </div>

            <div class="row rowsecfm">

                <div class="col-sm-6 col-lg-6 form-group">
                    <label class="control-label"><i class="red">*</i><?= trans('payment_method') ?></label>
                    <select name="payment_method" class="form-control max-800 validityoption" required>
                    <option value="check"><?= trans('check') ?></option>
                    <option value="wire_transfer"><?= trans('wire_transfer') ?></option>
                    <option value="cash"><?= trans('cash') ?></option>
                    <option value="credit_card"><?= trans('credit_card') ?></option>
                    <option value="paypal"><?= trans('paypal') ?></option>
                    </select>
                </div>

               
            <div class="col-sm-6 col-lg-6 form-group">
                <label class="control-label"><i class="red">*</i><?= trans('receive_date') ?></label>
                <input type="date" name="receive_date" class="form-control planvalidity" required>
            </div>
            </div>

            <!-- /.box-body -->
            <div class="box-footer">
            <button type="submit" name="savebt" class="btn btn-primary btn-block pull-right"><?= trans('add') ?></button>
            </div>
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