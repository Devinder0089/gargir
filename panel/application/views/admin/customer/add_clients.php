
<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Section: wrapper -->
<section id="wrapper">
            <div class="row contentrow">
                <div class="box-header">
                <div class="left">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                    <a href="<?php echo base_url(); ?>"><?php echo trans("breadcrumb_home"); ?></a>
                    </li>
                    <li class="breadcrumb-item active"><?php echo $title; ?></li>
                    </ol>

                </div>
                <div class="right">
                <a href="<?php echo base_url('admin');?>/customer/clients" class="btn btn-sm btn-success btn-add-new">
                <i class="fa fa-bars"></i>
                View Customers
                </a>
                </div>
                </div>
              
                <div class="row formcontentrow">
                        <div class="col-sm-12 loginbox">    
                        
                                <!-- form start -->
                                <?php echo form_open_multipart('customer/addClient_post'); ?>
                                <!-- include message block -->
                            <?php $this->load->view('admin/includes/_messages'); ?>

                                 <div class="col-sm-12 fullsec">
                                    <div class="col-sm-12 secimput">
                                         <span><i class="red">*</i> First name</span>
                                        <div class="form-group has-feedback">
                                        <input type="text" class="form-control form-input"
                                        name="name" required>
                                         <span class=" glyphicon glyphicon-user form-control-feedback"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 fullsec">
                                    <div class="col-sm-12 secimput">
                                          <span><i class="red">*</i> Email</span>
                                        <div class="form-group has-feedback">
                                        <input type="email" class="form-control form-input"
                                        name="email" required>
                                         <span class=" glyphicon glyphicon-envelope form-control-feedback"></span>
                                        </div>
                                    </div>
                                  
                                </div>
                                 <div class="col-sm-12 fullsec">
                                    <div class="col-sm-12 secimput">
                                        <div class="form-group has-feedback">
                                             <span><i class="red">*</i> Phone number</span>
                                        <input type="text" class="form-control form-input"
                                        name="phone" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 fullsec">
                                    <div class="form-group has-feedback">
                                    <span>Address</span>
                                    <textarea name="address" class="form-control text-area formaddress" rows="4"></textarea> 
                                    </div>
                                </div>


                                <div class="col-sm-12 col-update-profile">
                                    <button name="addusers" type="submit" class="btn btn-primary btn-custom pull-right">
                                     Create
                                    </button>
                                </div>
                            
                                <?php echo form_close(); ?><!-- form end -->
                       
                    </div>
            </div>
    </div>
</section>
<!-- /.Section: wrapper -->