<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header">
        <div class="left">
            <h3 class="box-title"><?= $title ?></h3>
            <br>
            <small class="pull-left">You can see <?= $title ?> here</small>
        </div>
        <div class="right">
            <a href="<?php echo base_url(); ?>admin/messages" class="btn btn-sm btn-success btn-add-new">
                <i class="fa fa-eye"></i>
              <?= trans('all_message') ?>
            </a>
        </div>
    </div><!-- /.box-header -->
    
    <div class="box-body projectsecdt">
      
                <?php if(isset($messages)): ?>
                <div class="row prjtrow">
                    <div class="col-sm-3 col-xs-3 prtitle">
                      <?= trans('id') ?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                    <?=$messages->id;?>
                    </div>
                </div>

                <div class="row prjtrow">
                    <div class="col-sm-3 col-xs-3 prtitle">
                    <?= trans('title') ?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                    <?php echo html_escape($messages->name); ?>
                    </div>
                </div>

                <div class="row prjtrow">
                    <div class="col-sm-3 col-xs-3 prtitle">
                   <?= trans('type') ?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                    <?=$messages->type;?>
                    </div>
                  </div>

                <div class="row prjtrow">
                     <div class="col-sm-3 col-xs-3 prtitle">
                      <?= trans('receiver_email') ?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                    <?php  
                    $snd_user=get_user($messages->parent_id);
                    ?>
                     <?=(isset($snd_user))?$snd_user->email:'';?>
                    </div>
                 </div>

                <div class="row prjtrow">
                     <div class="col-sm-3 col-xs-3 prtitle">
                      <?= trans('sender_email') ?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                    <?php  
                    $snduser=get_user($messages->user_id);
                    ?>
                     <?=(isset($snduser))?$snduser->email:'';?>
                    </div>
                 </div>

                <div class="row prjtrow">
                     <div class="col-sm-3 col-xs-3 prtitle">
                     <?= trans('mail_status') ?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                        <?php 
                    if($messages->send_mail == '1'):?>
                        <label class="label label-success">
                         <?= trans('success') ?>:
                        </label>
                    <?php else:?>
                    <label class="label label-warning">
                    <?= trans('failed') ?>:
                    </label>
                    <?php endif; ?>
                    
                    </div>
                 </div>

                <div class="row prjtrow">
                     <div class="col-sm-3 col-xs-3 prtitle">
                       <?= trans('content') ?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                     <?=$messages->content;?>
                    </div>
                 </div>

                    <?php 
                    if($messages->file):?>
                <div class="row prjtrow">
                    <div class="ccol-sm-3 col-xs-3 prtitle">
                     <?= trans('file') ?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                    <iframe class="docfile" src="<?= base_url() .$messages->file;?>" title="description"></iframe>
                    </div>
                </div>
            <?php endif; ?>
                  <div class="row prjtrow">
                   <div class="col-sm-3 col-xs-3 prtitle">
                     <?= trans('send_date') ?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                    <?=($messages->created);?>
                    </div>
                  </div>
                <?php endif; ?>
                                   
        </div>
    </div><!-- /.box-body -->
</div>