
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
                     <a href="<?php echo base_url('admin');?>/contractor" class="btn btn-sm btn-success btn-add-new">
                        <i class="fa fa-bars"></i>
                        <?= trans('all_contractors');?>
                    </a>
                </div>
            </div><!-- /.box-header -->

            <div class="box-body">
                <!-- include message block -->
               <?php echo form_open_multipart('contractor/add_user_post'); ?>
                                       <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages'); ?>
                <div class="row">
                    <div class="col-md-12">
                         <div class="form-group">
                            <label class="control-label"><i class="red">*</i><?= trans('email');?></label>
                              <input type="email" class="form-control form-input email"
                                            name="email" required>
                                <div style="color:red; text-align:right" id="emailerror"></div>
                        </div>
                    </div>
                    <!--<div class="col-md-6">-->
                    <!--     <div class="form-group">-->
                    <!--        <label class="control-label"><i class="red">*</i><?= trans('username');?></label>-->
                    <!--         <input type="text" class="form-control form-input" name="username" required>-->
                    <!--    </div>-->
                    <!--</div>-->
                      <div class="col-md-6">
                         <div class="form-group">
                            <label class="control-label"><i class="red">*</i><?= trans('password');?></label>
                             <input type="password" class="form-control form-input"
                                        name="password" required>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                         <div class="form-group">
                            <label class="control-label"><i class="red">*</i><?= trans('confirm_password');?></label>
                            <input type="text" class="form-control form-input" name="confirm_password" required>
                        </div>
                    </div>
                   
                    <div class="col-md-6">
                         <div class="form-group">
                            <label class="control-label"><i class="red">*</i><?= trans('first_name');?></label>
                            <input type="text" class="form-control form-input"
                                        name="first_name" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                         <div class="form-group">
                            <label class="control-label"><?= trans('last_name');?></label>
                          <input type="text" class="form-control form-input"
                                        name="last_name">
                        </div>
                    </div>
                     <div class="col-md-6">
                         <div class="form-group">
                            <label class="control-label"><?= trans('profile_pic');?></label>
                            <input type="file" class="form-control form-file" name="file">
                        </div>
                    </div>
                    <div class="col-md-6">
                         <div class="form-group">
                            <label class="control-label"><i class="red">*</i><?= trans('phone_number');?></label>
                             <input type="text" class="form-control form-input phone"
                                        name="phone" required>
                            <div style="color:red; text-align:right" id="phoneerror"></div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-4">
                         <div class="form-group">
                            <label class="control-label"><i class="red">*</i><?= trans('project_allowed');?></label>
                             <input type="text" class="form-control form-input"
                                        name="projects_allowed" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                          <div class="form-group">
                            <label class="control-label"><i class="red">*</i><?= trans('monthly_price');?></label>
                             <input type="text" class="form-control form-input"
                                        name="monthly_price" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                          <div class="form-group">
                            <label class="control-label"><?= trans('payment_method');?></label>
                             <select name="payment_method" class="form-control  formselect">
                                <option value=""></option>
                                <option value="paypal">Paypal</option>
                                <option value="credit_card">Credit Card</option>
                                <option value="check">Check</option>
                                <option value="wire_transfer">Wire transfer</option>
                                <option value="cash">cash</option>
                            </select> 
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                            <label class="control-label"><i class="red">*</i><?= trans('payment_currency');?></label>
                             <select name="payment_currency" class="form-control  formselect" required>
                                <option value=""></option>
                                <option value="ILS">ILS</option>
                                <option value="USD">USD</option>
                                <option value="EUR">EUR</option>
                            </select> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label"><?= trans('user_role');?></label>
                             <select name="role" class="form-control  formselect">
                                <option value="contractor">Contractor</option>
                            </select> 
                        </div>
                    </div>
                </div>
                 <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="control-label"><?= trans('address');?></label>
                        <textarea name="address" class="form-control text-area formaddress" rows="4"></textarea> 
                    </div>
                    </div>
                 
                </div>
                <div class="row">
                    <div class="box-footer">
                        <button type="submit" name="projectbt" class="btn btn-primary btn-block pull-right"> <?= trans('add_user');?></button>
                    </div>
                </div>
         <?php echo form_close(); ?><!-- form end -->
    </div>
</div>
</div></div>
<script>
    $('.email').on('keyup',function(){
        var email = $('.email').val();
           $.ajax({
                type: "POST",
                url: base_url + 'contractor/emailPhoneCheck',
                data:{email:email},
                success:function(data){
                    var result = JSON.parse(data);
                    if(result.email){
                        $('#emailerror').text(result.email);
                    }if(result.success){
                        $('#emailerror').text(' ');
                    }
                }
            });
    });
    
    $('.phone').on('keyup',function(){
        var phone = $('.phone').val();
           $.ajax({
                type: "POST",
                url: base_url + 'contractor/emailPhoneCheck',
                data:{phone:phone},
                success:function(data){
                    var result = JSON.parse(data);
                    if(result.phone){
                        $('#phoneerror').text(result.phone);
                    }if(result.success){
                        $('#phoneerror').text(' ');
                    }
                }
            });
    });
</script>