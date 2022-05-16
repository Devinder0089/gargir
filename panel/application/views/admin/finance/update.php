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
                    <a href="<?php echo base_url(); ?>admin/finance" class="btn btn-sm btn-success btn-add-new">
                        <i class="fa fa-bars"></i>
                        View finance
                    </a>
                </div>
            </div><!-- /.box-header -->

            <!-- form start -->
            <?php echo form_open_multipart('finance/edit_post'); ?>

            <div class="box-body">
                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages'); ?>

            <div class="row rowsecfm">
                <div class="col-sm-6 col-lg-6 form-group">
                    <label class="control-label"><i class="red">*</i>Select user</label>
                    <select name="user_id" class="form-control max-800 inputtype" required>
                          <option value=""></option>
                          <?php if(isset($users)):
                                foreach($users as $user):
                          ?>
                          <option value="<?= $user->id;?>" <?php if($payment->user_id == $user->id):?> selected <?php endif;?>><?= $user->email;?></option>
                          <?php endforeach; endif;?>
                    </select>
                </div>
                <div class="col-sm-6 col-lg-6 form-group">
                    <label class="control-label"><i class="red">*</i>Payment</label>
                    <input type="text" class="form-control inputtitle" name="payment" value="<?= $payment->payment ?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" required>
                </div>
            </div>

            <div class="row rowsecfm">

                <div class="col-sm-6 col-lg-6 form-group">
                    <label class="control-label"><i class="red">*</i>Payment method</label>
                    <select name="payment_method" class="form-control max-800 validityoption" required>
                    <option value="card" <?php if($payment->payment_method == 'card'):?> selected <?php endif;?>>Card</option>
                    <option value="paypal" <?php if($payment->payment_method == 'paypal'):?> selected <?php endif;?>>Paypal</option>
                     <option value="wire_transfer" <?php if($payment->payment_method == 'wire_transfer'):?> selected <?php endif;?>>Wire transfer</option>
                    <option value="credit_card" <?php if($payment->payment_method == 'credit_card'):?> selected <?php endif;?>>Credit card</option>
                    <option value="cash" <?php if($payment->payment_method == 'cash'):?> selected <?php endif;?>>Cash</option>
                    </select>
                </div>

               
            <div class="col-sm-6 col-lg-6 form-group">
                <label class="control-label"><i class="red">*</i>Payment receive date</label>
                <input type="date" name="receive_date" value="<?= $payment->receive_date ?>" class="form-control planvalidity" required>
            </div>
            </div>

            <!-- /.box-body -->
            <div class="box-footer">
            <button type="submit" name="savebt" class="btn btn-primary btn-block pull-right">Update</button>
            <input type="hidden" name="id" value="<?= $payment->id ?>"/>
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