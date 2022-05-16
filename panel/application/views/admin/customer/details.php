<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box sectuserdetails">
    <div class="box-header">
        <div class="left">
            <h3 class="box-title">customer details</h3>
            <br>
            <small class="pull-left">You can see customer details here</small>
        </div>
        <div class="right">
            <a href="<?php echo base_url(); ?>admin/customer" class="btn btn-sm btn-success btn-add-new">
                <i class="fa fa-eye"></i>
               customer
            </a>
        </div>
    </div><!-- /.box-header -->
    
    <div class="box-body userdetails">
       <div class="row prjtrow sechyperprcontent">
            <a href="#" class="hyperprcontent">
                <?php 
                if($customer->avatar):?>
                <img src="<?= base_url() . $customer->avatar;?>" class="athoroimg">
                <?php else:
                echo "";
                endif;
                ?>
            </a>
        </div>
                <?php if(isset($customer)): ?>
                <div class="row prjtrow">
                    <div class="col-sm-3 col-xs-3 prtitle">
                      Id:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                    <?=$customer->id;?>
                    </div>
                </div>

                <div class="row prjtrow">
                    <div class="col-sm-3 col-xs-3 prtitle">
                    Username:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                    <?=$customer->username; ?>
                    </div>
                </div>

                <div class="row prjtrow">
                    <div class="col-sm-3 col-xs-3 prtitle">
                    Email:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                  <?=$customer->email; ?>
                    </div>
                  </div>

                <div class="row prjtrow">
                     <div class="col-sm-3 col-xs-3 prtitle">
                       First Name:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                     <?=$customer->first_name; ?>
                    </div>
                 </div>

                <div class="row prjtrow">
                     <div class="col-sm-3 col-xs-3 prtitle">
                        Last Name:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                     <?=$customer->last_name; ?>
                    </div>
                 </div>

                <div class="row prjtrow">
                     <div class="col-sm-3 col-xs-3 prtitle">
                       Address:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                     <?=$customer->address; ?>
                    </div>
                 </div>

                <div class="row prjtrow">
                     <div class="col-sm-3 col-xs-3 prtitle">
                       Phone:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                     <?=$customer->phone; ?>
                    </div>
                 </div>
        <?php  if($customer->country):?>
                <div class="row prjtrow">
                     <div class="col-sm-3 col-xs-3 prtitle">
                      Country:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                     <?=$customer->country; ?>
                    </div>
                 </div>
        <?php endif;?>

                <?php  if($customer->avatar):?>
                <div class="row prjtrow">
                <div class="col-sm-3 col-xs-3 prtitle">
                Gender:
                </div>
                <div class="col-sm-9 col-xs-9 prcontent">
                <?=$customer->gender; ?>
                </div>
                </div>
                <?php endif;?>

                <?php  if($customer->birthday):?>
                <div class="row prjtrow">
                <div class="col-sm-3 col-xs-3 prtitle">
                birthday:
                </div>
                <div class="col-sm-9 col-xs-9 prcontent">
                <?=$customer->birthday; ?>
                </div>
                </div>
                <?php endif;?>

                

                  <div class="row prjtrow">
                   <div class="col-sm-3 col-xs-3 prtitle">
                    created :
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
               <?=$customer->created_at; ?>
                    </div>
                  </div>

                <?php endif; ?>
                                   
        </div>
    </div><!-- /.box-body -->
</div>