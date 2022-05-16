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
                <a href="<?php echo base_url('admin');?>/customer/property" class="btn btn-sm btn-success btn-add-new">
                <i class="fa fa-bars"></i>
                View Property
                </a>
                </div>
                </div>
           
                <?php echo validation_errors(); ?>
                <div class="row formcontentrow">
                        <div class="col-sm-12 loginbox">    
                        
                                <!-- form start -->
                                <?php echo form_open_multipart('customer/editProperty_post'); ?>
                                <!-- include message block -->
                                <?php $this->load->view('partials/_messages'); ?>
                                <input type="hidden" name="id" value="<?php echo $property->id ?>"/>
                                 <div class="col-sm-12 fullsec">
                                    <div class="col-sm-3 secimput">
                                          <span><i class="red">*</i> Street</span>
                                        <div class="form-group has-feedback">
                                        <input type="text" class="form-control form-input"
                                        name="street" value="<?php echo $property->street ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 secimput">
                                          <span><i class="red">*</i> Building No.</span>
                                        <div class="form-group has-feedback">
                                        <input type="text" class="form-control form-input" name="buil_number" value="<?php echo $property->buil_number ?>" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 secimput">
                                          <span>Apartment number</span>
                                        <div class="form-group has-feedback">
                                        <input type="text" class="form-control form-input"
                                        name="apart_number" value="<?php echo $property->apart_number ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-3 secimput">
                                          <span><i class="red">*</i> City</span>
                                        <div class="form-group has-feedback">
                                        <input type="text" class="form-control form-input"
                                        name="city" value="<?php echo $property->city ?>" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 fullsec">
                                    <div class="col-sm-3 secimput">
                                          <span> Property type (apartment / office ,etc)</span>
                                        <div class="form-group has-feedback">
                                        <input type="text" class="form-control form-input"
                                        name="prop_type" value="<?php echo $property->prop_type ?>">
                                        
                                        </div>
                                    </div>
                                    <div class="col-sm-3 secimput">
                                          <span> Floor (optional)</span>
                                        <div class="form-group has-feedback">
                                        <input type="text" class="form-control form-input" name="floor" value="<?php echo $property->floor ?>">
                                        
                                        </div>
                                    </div>
                                    <div class="col-sm-3 secimput">
                                          <span>Number of rooms(optional)</span>
                                        <div class="form-group has-feedback">
                                        <input type="text" class="form-control form-input"
                                        name="no_of_rooms" value="<?php echo $property->no_of_rooms ?>">
                                       
                                        </div>
                                    </div>
                                    <div class="col-sm-3 secimput">
                                          <span>Name of property owner</span>
                                        <div class="form-group has-feedback">
                                        <input type="text" class="form-control form-input"
                                        name="name_of_prop_owner" value="<?php echo $property->name_of_prop_owner ?>">
                                     
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12 fullsec">
                                        <div class="form-group has-feedback">
                                             <span>Additional details / free text (optional, will be displayed on the agreement at the time of signing)</span>
                                        <input type="text" class="form-control form-input"
                                        name="details" value="<?php echo $property->details ?>">
                                        </div>
                                   </div>

                                
                                 <div class="col-sm-12 fullsec">
                                        <div class="form-group has-feedback">
                                             <span> Rental price requested</span>
                                        <input type="text" class="form-control form-input"
                                        name="rental_price" value="<?php echo $property->rental_price ?>">
                                        </div>
                                   </div>
                                 <div class="col-sm-12 fullsec">
                                    <div class="form-group has-feedback">
                                         <span> Asking sale price</span>
                                    <input type="text" class="form-control form-input"
                                    name="ask_sale_price" value="<?php echo $property->ask_sale_price ?>">
                                    </div>
                                </div>

                               
                                <div class="col-sm-12 col-update-profile">
                                    <button name="addusers" type="submit" class="btn btn-primary btn-custom pull-right">
                                     Update
                                    </button>
                                </div>
                            
                                <?php echo form_close(); ?><!-- form end -->
                       
                    </div>
            </div>
    </div>
</section>
<!-- /.Section: wrapper -->