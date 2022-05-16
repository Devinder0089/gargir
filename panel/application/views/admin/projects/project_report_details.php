<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box">

    <div class="box-body projectsecdt">
         <div class="row prjrescept">
                <h2 class="col-sm-12 col-xs-12 text-center">
                  <?=trans('report_details');?>
                </h2>
            </div>

                <div class="row prjtrow">
                    <div class="col-sm-3 col-xs-3 prtitle">
                      <?=trans('id');?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                    <?=$report->id;?>
                    </div>
                </div>
                 <div class="row prjtrow">
                     <div class="col-sm-3 col-xs-3 prtitle">
                      <?=trans('submit_by');?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                     <?php echo html_escape($report->user); ?>
                    </div>
                 </div>
             
                <div class="row prjtrow">
                    <div class="col-sm-3 col-xs-3 prtitle">
                    <?=trans('title');?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                    <?php echo html_escape($report->title); ?>
                    </div>
                </div>

                <div class="row prjtrow">
                    <div class="col-sm-3 col-xs-3 prtitle">
                    <?=trans('content');?>
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                    <?=$report->description;?>
                    </div>
                  </div>

                <div class="row prjtrow">
                    <div class="ccol-sm-3 col-xs-3 prtitle">
                     <?=trans('images');?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                    <?php 
                    if($report->images):
                    $imgs = explode(',', $report->images);
                    foreach($imgs as $img):
                      $image_explode =explode(".",$img);
                      $image_type= end($image_explode);
                      if($image_type == 'pdf' || $image_type == 'docs' || $image_type == 'doc'):
                    ?>
                       <a class="edituser" target="_blank" href="<?php echo base_url(); ?>uploads/project/<?=$img;?>">
                            <i class="fa fa-book i-edit"><?=trans('click_to_view');?></i>
                        </a>
                    <?php else:?>
                     <a class="edituser" target="_blank" href="<?php echo base_url(); ?>uploads/project/<?=$img;?>">
                             <img width="200px" height="200px" src="<?= base_url();?>uploads/project/<?= $img ?>"/>
                        </a>
                       
                   <?php endif; ?>
                    <?php endforeach;?>
                    <?php else:
                    echo "";
                    endif;
                    ?>
                    </div>
                </div>

                  <div class="row prjtrow">
                   <div class="col-sm-3 col-xs-3 prtitle">
                    <?=trans('report_date');?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                    <?=($report->created_at);?>
                    </div>
                  </div>
        </div>
    </div><!-- /.box-body -->
</div>