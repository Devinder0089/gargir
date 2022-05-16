<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header">
        <div class="left">
            <h3 class="box-title"><?= $title ?></h3>
            <br>
            <small class="pull-left">You can see <?= $title ?> here</small>
        </div>
        <div class="right">
            <a href="<?php echo base_url(); ?>admin/projects" class="btn btn-sm btn-success btn-add-new">
                <i class="fa fa-bars"></i>
               <?= trans('all_projects') ?>
            </a>
        </div>
    </div><!-- /.box-header -->
    
    <div class="box-body projectsecdt">
                <div class="row prjtrow">
                    <div class="col-sm-3 col-xs-3 prtitle">
                      <?= trans('id') ?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                    <?=$project->id;?>
                    </div>
                </div>

                <div class="row prjtrow">
                    <div class="col-sm-3 col-xs-3 prtitle">
                    <?= trans('title') ?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                    <?php echo html_escape($project->title); ?>
                    </div>
                </div>
                 <div class="row prjtrow">
                    <div class="col-sm-3 col-xs-3 prtitle">
                   <?= trans('project_assigned_to') ?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                        <?php if(isset($users)):
                              foreach($users as $user):
                        ?>
                        <button class="btn btn-primary getUser" data-id="<?= $user->email ?>"><?php echo html_escape($user->email); ?></button>
                        
                    <?php endforeach; endif;?>
                    </div>
                </div>
                <div class="row prjtrow">
                    <div class="col-sm-3 col-xs-3 prtitle">
                    <?= trans('type') ?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                    <?=$project->type;?>
                    </div>
                  </div>
                 <div class="row prjtrow">
                    <div class="col-sm-3 col-xs-3 prtitle">
                    Building Number:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                    <?=$project->building_no;?>
                    </div>
                  </div>
                  <div class="row prjtrow">
                    <div class="col-sm-3 col-xs-3 prtitle">
                   <?= trans('number_apartments') ?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                    <?=$project->no_of_apartments;?>
                    </div>
                  </div>

               <div class="row prjtrow">
                    <div class="col-sm-3 col-xs-3 prtitle">
                   <?= trans('city') ?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                    <?=$project->city;?>
                    </div>
                  </div>
                  <div class="row prjtrow">
                    <div class="col-sm-3 col-xs-3 prtitle">
                   <?= trans('zip_code') ?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                    <?=$project->zipcode;?>
                    </div>
                  </div>
                  <div class="row prjtrow">
                    <div class="col-sm-3 col-xs-3 prtitle">
                   <?= trans('address') ?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                    <?=$project->address;?>
                    </div>
                  </div>
                <div class="row prjtrow">
                     <div class="col-sm-3 col-xs-3 prtitle">
                       <?= trans('content') ?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                     <?=$project->content;?>
                    </div>
                 </div>
                <div class="row prjtrow">
                     <div class="col-sm-3 col-xs-3 prtitle">
                       <?= trans('manager_name') ?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                     <?=$project->project_manager_name;?>
                    </div>
                 </div>
                <div class="row prjtrow">
                     <div class="col-sm-3 col-xs-3 prtitle">
                       <?= trans('manager_email') ?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                     <?=$project->manager_email;?>
                    </div>
                 </div>
                 <div class="row prjtrow">
                     <div class="col-sm-3 col-xs-3 prtitle">
                       <?= trans('manager_phone') ?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                     <?=$project->manager_phone;?>
                    </div>
                 </div>
                  <div class="row prjtrow">
                   <div class="col-sm-3 col-xs-3 prtitle">
                    <?= trans('added_date') ?>:
                    </div>
                    <div class="col-sm-9 col-xs-9 prcontent">
                    <?=($project->created_at);?>
                    </div>
                  </div>
                <div class="row prjtrow">
                    <div class="ccol-sm-12 col-xs-12 prtitle">
                    <?= trans('images') ?>:
                    </div>
                   
                    <?php 
                    if($project->images):
                    $images = explode(',', $project->images);
                    foreach($images as $img):
                    ?>
                     <div class="col-sm-3 col-xs-3 prcontent" style="padding:2px; margin-top:5px">
                    <a href="<?= base_url()?>/uploads/project/<?= $img ?>" target="_blank"><img src="<?= base_url()?>/uploads/project/<?= $img ?>" width="150px" height="150px" class="prjtimg"></a>
                     </div>
                    <?php endforeach; else:
                    echo "";
                    endif;
                    ?>
                   
                     
                </div>

                 
        </div>
    </div><!-- /.box-body -->
</div>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialogs modal-dialog-scrollable">

        <!-- Modal content-->
        <div class="modal-content modal-contents">
            <div class="modal-header modal-headers">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body modal-bodys">
                
            </div>
            <div class="modal-footer modal-footers">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

        </div>

    </div>
</div>
<style>

    .modal-dialogs{
        height:calc(100% - 60px);
    }
    .modal-contents{
      height:100%;
     }
    .modal-headers{
            height:50px;
    
    }
    .model-footers{
            height:75px;
    }
    .modal-bodys {
    height:calc(100% - 125px);
    overflow-y: scroll;     /*give auto it will take based in content */
    }
</style>
<script>
    $(document).ready(function(){
        $('.getUser').on('click', function(){
            var email = $(this).data('id');
            $.ajax({
                type: "POST",
                url: base_url + 'projects/getUser',
                data:{email:email},
                success:function(data){
                    // var result = JSON.parse(data);
                    $('#myModal').modal('show');
                    $('.modal-body').html(data);
                }
            });
        });
        
    });
</script>