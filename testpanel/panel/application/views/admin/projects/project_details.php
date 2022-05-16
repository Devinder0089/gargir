<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header">
        <div class="left">
            <h3 class="box-title">Projects details</h3>
            <br>
            <small class="pull-left">You can see Projects details here</small>
        </div>
        <div class="right">
            <a href="<?php echo base_url(); ?>admin/projects" class="btn btn-sm btn-success btn-add-new">
                <i class="fa fa-eye"></i>
               Projects
            </a>
        </div>
    </div><!-- /.box-header -->
    
    <div class="box-body projectsecdt">
         <div class="row prjrescept">
                <h2 class="col-sm-12 col-xs-12 text-center">
                  Project Receipt
                </h2>
            </div>

                <?php foreach ($projects as $item): ?>
                <div class="row prjtrow">
                    <div class="col-sm-3 col-xs-3 prtitle">
                      Project Id:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                    <?=$item->id;?>
                    </div>
                </div>

                <div class="row prjtrow">
                    <div class="col-sm-3 col-xs-3 prtitle">
                    Project Title:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                    <?php echo html_escape($item->title); ?>
                    </div>
                </div>

                <div class="row prjtrow">
                    <div class="col-sm-3 col-xs-3 prtitle">
                    Project Type:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                    <?=$item->type;?>
                    </div>
                  </div>

                <div class="row prjtrow">
                     <div class="col-sm-3 col-xs-3 prtitle">
                       Project Assign Id:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                     <?=$item->pid;?>
                    </div>
                 </div>

                <div class="row prjtrow">
                     <div class="col-sm-3 col-xs-3 prtitle">
                       Project by Assign Email:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                     <?=$item->email;?>
                    </div>
                 </div>

                <div class="row prjtrow">
                     <div class="col-sm-3 col-xs-3 prtitle">
                       Project Price:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                     <?=$item->currency;?><?=$item->price;?>
                    </div>
                 </div>

                <div class="row prjtrow">
                     <div class="col-sm-3 col-xs-3 prtitle">
                       Project Discount:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                     <?=$item->discount;?>%
                    </div>
                 </div>

                <div class="row prjtrow">
                     <div class="col-sm-3 col-xs-3 prtitle">
                       Project Content:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                     <?=$item->content;?>
                    </div>
                 </div>


                <div class="row prjtrow">
                    <div class="ccol-sm-3 col-xs-3 prtitle">
                    Images:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                    <?php 
                    if($item->images):?>
                    <img src="<?= base_url() . html_escape($item->images);?>" class="prjtimg">
                    <?php else:
                    echo "";
                    endif;
                    ?>
                    </div>
                </div>

                  <div class="row prjtrow">
                   <div class="col-sm-3 col-xs-3 prtitle">
                    Project created :
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                    <?=($item->created_at);?>
                    </div>
                  </div>

                <?php endforeach; ?>
                                   
        </div>
    </div><!-- /.box-body -->
</div>