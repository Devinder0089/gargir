<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header">
        <div class="left">
            <h3 class="box-title"><?= trans('contractor')?> <?= trans('details')?></h3>
            <br>
            <!--<small class="pull-left">You can see Contractor details here</small>-->
        </div>
        <div class="right">
            <a href="<?php echo base_url(); ?>admin/contractor" class="btn btn-sm btn-success btn-add-new">
                <i class="fa fa-bars"></i>
              <?= trans('all_contractors')?>
            </a>
        </div>
    </div><!-- /.box-header -->
    
    <div class="box-body projectsecdt">
              <?php if(isset($user)):?>
                <div class="row prjtrow">
                    <div class="col-sm-3 col-xs-3 prtitle">
                       <?= trans('id')?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                    <?=$user->id;?>
                    </div>
                </div>
               
               <div class="row prjtrow">
                    <div class="col-sm-3 col-xs-3 prtitle">
                    <?= trans('name')?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                    <?php echo html_escape($user->first_name)?>  <?php echo html_escape($user->last_name)?>
                    </div>
                </div>
                
                <div class="row prjtrow">
                    <div class="col-sm-3 col-xs-3 prtitle">
                    <?= trans('email')?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                    <?php echo html_escape($user->email); ?>
                    </div>
                </div>
                <!--<div class="row prjtrow">-->
                <!--    <div class="col-sm-3 col-xs-3 prtitle">-->
                <!--    <?= trans('username')?>:-->
                <!--    </div>-->
                <!--    <div class="col-sm-9 col-xs-9 prcontent">-->
                <!--    <?php echo html_escape($user->username); ?>-->
                <!--    </div>-->
                <!--</div>-->
                <div class="row prjtrow">
                    <div class="col-sm-3 col-xs-3 prtitle">
                    <?= trans('phone_number')?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                    <?=$user->phone;?>
                    </div>
                  </div>
                
                 <div class="row prjtrow">
                    <div class="col-sm-3 col-xs-3 prtitle">
                    <?= trans('address')?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                    <?=$user->address;?>
                    </div>
                  </div>
                <div class="row prjtrow">
                    <div class="col-sm-3 col-xs-3 prtitle">
                    Projects allowed:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                    <?=$user->projects_allowed;?>
                    </div>
                  </div>
                 <div class="row prjtrow">
                    <div class="col-sm-3 col-xs-3 prtitle">
                    <?= trans('monthly_price')?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                    <?=$user->monthly_price;?>
                    </div>
                  </div>
                  
                   <div class="row prjtrow">
                    <div class="col-sm-3 col-xs-3 prtitle">
                    <?= trans('payment_method')?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                    <?=$user->payment_method;?>
                    </div>
                  </div>
                  <div class="row prjtrow">
                    <div class="col-sm-3 col-xs-3 prtitle">
                    <?= trans('payment_currency')?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                    <?=$user->payment_currency;?>
                    </div>
                  </div>
                <div class="row prjtrow">
                    <div class="ccol-sm-3 col-xs-3 prtitle">
                    <?= trans('profile_pic')?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                    <?php 
                    if($user->avatar):?>
                    <img src="<?=base_url() . html_escape($user->avatar);?>" class="prjtimg">
                    <?php else:
                    echo "";
                    endif;
                    ?>
                    </div>
                </div>
                
                  <div class="row prjtrow">
                   <div class="col-sm-3 col-xs-3 prtitle">
                    <?= trans('added_date')?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                    <?=($user->created_at);?>
                    </div>
                  </div>
                  
                <div class="row prjtrow">
                   <div class="col-sm-3 col-xs-3 prtitle">
                   <?= trans('status')?>
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                    <?php if ($user->status == 1): ?>
                        <label class="label label-success"><?= trans('active')?></label>
                    <?php else: ?>
                        <label class="label label-danger"><?= trans('banned')?></label>
                    <?php endif; ?>
                    </div>
                  </div>
                <?php 
            endif;
                ?>
                                   
        </div>
    </div><!-- /.box-body -->
</div>