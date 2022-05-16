<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header">
        <div class="left">
            <h3 class="box-title"><?= $title ?></h3>
            <br>
            <small class="pull-left">You can see <?= $title ?> here</small>
        </div>
        <div class="right">
            <a href="<?php echo base_url(); ?>admin/project/apartments/<?= $apartment->project_slug ?>" class="btn btn-sm btn-success btn-add-new">
                <i class="fa fa-bars"></i>
                <?=trans('all_apartments')?>
            </a>
        </div>
    </div><!-- /.box-header -->
    
    <div class="box-body projectsecdt">
       
                <div class="row prjtrow">
                    <div class="col-sm-3 col-xs-3 prtitle">
                       <?=trans('id')?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                    <?=$apartment->id;?>
                    </div>
                </div>
                <div class="row prjtrow">
                    <div class="col-sm-3 col-xs-3 prtitle">
                       <?=trans('title')?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                    <?=$apartment->title;?>
                    </div>
                </div>

                <div class="row prjtrow">
                    <div class="col-sm-3 col-xs-3 prtitle">
                     <?=trans('apartment_no')?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                    <?php echo html_escape($apartment->apartment_no); ?>
                    </div>
                </div>

                <div class="row prjtrow">
                    <div class="col-sm-3 col-xs-3 prtitle">
                     <?=trans('register_under_project')?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                    <?=$apartment->projectTitle;?>
                    </div>
                  </div>

                  <div class="row prjtrow">
                     <div class="col-sm-3 col-xs-3 prtitle">
                        <?=trans('assign_to_client')?>
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                      <?=$apartment->client;?>
                    </div>
                 </div> 
                  <div class="row prjtrow">
                     <div class="col-sm-3 col-xs-3 prtitle">
                       <?=trans('asking_sale_price')?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                      <?=$apartment->sale_price;?>
                    </div>
                 </div>
                  <div class="row prjtrow">
                     <div class="col-sm-3 col-xs-3 prtitle">
                       <?=trans('sale_in')?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                      <?=$apartment->saled_in;?>
                    </div>
                 </div>
                 <div class="row prjtrow">
                     <div class="col-sm-3 col-xs-3 prtitle">
                      <?=trans('price_paid_by_client')?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                      <?=$total;?>
                    </div>
                 </div>
                 <?php if($apartment->saled_in && $total):?>
                  <div class="row prjtrow">
                     <div class="col-sm-3 col-xs-3 prtitle">
                       <?=trans('price_left_to_pay')?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                      <?=$apartment->saled_in - $total;?>
                    </div>
                 </div>
                 <?php endif;?>
                <div class="row prjtrow">
                     <div class="col-sm-3 col-xs-3 prtitle">
                        <?=trans('property_percentage_discount')?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                     <?=$apartment->discount;?>%
                    </div>
                 </div>

                <div class="row prjtrow">
                     <div class="col-sm-3 col-xs-3 prtitle">
                    <?=trans('no_of_rooms')?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                     <?=$apartment->no_of_rooms;?>
                    </div>
                 </div>
                 
                  <div class="row prjtrow">
                     <div class="col-sm-3 col-xs-3 prtitle">
                  <?=trans('floor')?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                     <?=$apartment->floor;?>
                    </div>
                 </div> 
                 <div class="row prjtrow">
                     <div class="col-sm-3 col-xs-3 prtitle">
                  <?=trans('city')?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                     <?=$apartment->city;?>
                    </div>
                 </div>  
                 <div class="row prjtrow">
                     <div class="col-sm-3 col-xs-3 prtitle">
                   <?=trans('zip_code')?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                     <?=$apartment->zipcode;?>
                    </div>
                 </div>


                <div class="row prjtrow">
                     <div class="col-sm-3 col-xs-3 prtitle">
                      <?=trans('address')?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                     <?=$apartment->address;?>
                    </div>
                 </div>

                    <div class="row prjtrow">
                     <div class="col-sm-3 col-xs-3 prtitle">
                       <?=trans('content')?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                     <?=$apartment->additional;?>
                    </div>
                 </div>

                 <div class="row prjtrow">
                   <div class="col-sm-3 col-xs-3 prtitle">
                   <?=trans('added_date')?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                    <?=($apartment->created_at);?>
                    </div>
                  </div>
                <div class="row prjtrow">
                    <div class="ccol-sm-12 col-xs-12 prtitle">
                   <?=trans('images')?>:
                    </div>
                    <?php 
                    if($apartment->images):
                        $imgs = explode(',', $apartment->images);
                        foreach($imgs as $img):
                    ?>
                    <div class="col-sm-3 col-xs-3 prcontent" style="padding:2px; margin-top:5px">
                    <a href="<?php echo base_url() ?>uploads/project/apartment/<?= $img ?>" target="_blank"><img src="<?php echo base_url() ?>uploads/project/apartment/<?= $img ?>" width="150px" height="150px" class="prjtimg"></a>
                    </div>
                    <?php endforeach; else:
                    echo "";
                    endif;
                    ?>
                    
                </div>

                 
        </div>
    </div><!-- /.box-body -->
</div>