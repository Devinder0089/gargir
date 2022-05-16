<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header">
        <div class="left">
            <h3 class="box-title"><?= $title?></h3>
            <br>
            <small class="pull-left">You can see all <?= $title?> here</small>
        </div>
        <?php if(is_admin() || is_contractor() && contractor_project_check()):?>
         <div class="right">
            <a href="<?php echo base_url(); ?>admin/add-projects" class="btn btn-sm btn-success btn-add-new">
                <i class="fa fa-plus"></i>
                <?=trans('add_project')?>
            </a>
        </div>
        <?php endif; ?>
    </div><!-- /.box-header -->

    <!-- include message block -->
    <div class="col-sm-12">
        <?php $this->load->view('admin/includes/_messages'); ?>
    </div>

    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped dataTable" id="cs_datatable" role="grid"
                           aria-describedby="example1_info">
                        <thead>
                        <tr role="row">
                            <th width="20"><?=trans('id')?></th>
                            <th><?=trans('title')?></th>
                            <th><?=trans('building_number')?></th>
                            <th><?=trans('apartments')?></th>
                            <th><?=trans('reports')?></th>
                             <th><?=trans('expected_delivery_date')?></th>
                            <th><?=trans('added_date')?></th>
                             <th><?=trans('status')?></th>
                            <th class="max-width-120"><?=trans('options')?></th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($projects as $item): ?>
                            <tr>
                                <td><?=$item->id;?></td>
                                <td class="break-word"><?php echo html_escape($item->title); ?></td>
                                <td>
                                    <?=$item->building_no;?>
                                </td>
                                 <td>
                                    <a href="<?php echo base_url();?>admin/project/apartments/<?= $item->slug ?>"><i class="fa fa-home"></i></a>
                                </td>
                                <td>
                                    <a href="<?php echo base_url() ?>admin/project-reports/<?= $item->slug ?>"><i class="fa fa-book"></i></a>
                                </td>
                                <td><?=($item->expt_delvry_date);?></td>
                                <td><?=date('Y-m-d', strtotime($item->created_at));?></td>
                                 <td>
                                     <?php if(is_client()):?>
                                     <?php if($item->status == 1):?>
                                        <button class="label label-primary"><?=trans('building')?></button>
                                    <?php elseif($item->status == 0):?>
                                        <button class="label label-danger"><?=trans('planning')?></button>
                                    <?php else:?>
                                        <button class="label label-success"><?=trans('completed')?></button>
                                     <?php endif;?>
                                     
                                     <?php else:?>
                                        <?php if($item->status == 1):?>
                                        <button class="label label-primary changeStatus" data-id="<?= $item->id ?>"><?=trans('building')?></button>
                                    <?php elseif($item->status == 0):?>
                                        <button class="label label-danger changeStatus" data-id="<?= $item->id ?>"><?=trans('planning')?></button>
                                    <?php else:?>
                                        <button class="label label-success changeStatus" data-id="<?= $item->id ?>"><?=trans('completed')?></button>
                                     <?php endif;?>
                                     <?php endif;?>
                                 </td>
                               <td>
                                    <!-- form delete contact messages -->
                                    <?php echo form_open('projects/delete_project_post'); ?>

                                        <input type="hidden" name="id" value="<?php echo html_escape($item->id); ?>">

                                        <div class="dropdown">
                                            <button class="btn bg-purple dropdown-toggle btn-select-option"
                                                    type="button"
                                                    data-toggle="dropdown"><?=trans('select_an_option')?>
                                                <span class="caret"></span>
                                            </button>

                                            <ul class="dropdown-menu">
                                            <?php if(is_admin() || is_contractor()): ?>
                                            <li>
                                                <a class="edituser" href="<?php echo base_url() ?>admin/project/add-apartments/<?= $item->slug ?>">
                                                    <i class="fa fa-home i-edit"></i>
                                                <?=trans('add_apartment')?>
                                                </a>
                                            </li>
                                            <?php endif;?>
                                            <?php if(is_admin() || is_contractor() || is_worker()): ?>
                                             <li>
                                                <a class="edituser getPayments" href="javascript:void(0)" data-id="<?= $item->id ?>">
                                                    <i class="fa fa-money i-edit"></i>
                                                <?=trans('payment_history')?>
                                                </a>
                                            </li>
                                             <?php endif;?>
                                            <li>
                                                <a class="edituser"href="<?php echo base_url(); ?>admin/project-details/<?=$item->slug;?>">
                                                    <i class="fa fa-edit i-edit"></i>
                                                <?=trans('project_details')?>
                                                </a>
                                            </li>
                                              
                                            <?php if(is_admin() || is_contractor() || is_worker()): ?>
                                            <li>
                                            <a class="edituser"href="<?php echo base_url(); ?>admin/project-edit/<?=$item->slug;?>">
                                                    <i class="fa fa-edit i-edit"></i>
                                                <?=trans('edit')?>
                                            </a>
                                            </li>
                                         <?php endif;?>
                                                <?php if(is_admin() || is_contractor()): ?>
                                                <li>
                                                    <a class="p0">
                                                        <button type="submit" class="btn-list-button"
                                                                onclick="return confirm('<?= trans('are_you_sure_delete');?>');">
                                                            <i class="fa fa-trash i-delete"></i><?=trans('delete')?>
                                                        </button>
                                                    </a>
                                                </li>
                                            <?php endif; ?>

                                            </ul>
                                        </div>
                                        <?php echo form_close(); ?><!-- form end -->
                                </td>
                            </tr>

                        <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!-- /.box-body -->
</div>
<!-- Modal -->
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
                <button type="button" class="btn btn-default" data-dismiss="modal"><?=trans('close')?></button>
            </div>

        </div>

    </div>
</div>

<!-- Modal -->
<div id="changeStatus" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?=trans('change_status')?></h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                 <form method="post" id="changeForm" action="<?php echo base_url('projects/project_status_change')?>">
                    <input type="hidden" name="project_id" value=""/>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label"><?=trans('status')?>: *</label>
                    <select class="form-control" name="status" id="recipient-name" required>
                        <option value="1" <?php if($item->status == 1):?> selected <?php endif;?>><?=trans('building')?></option>
                        <option value="0" <?php if($item->status == 0):?> selected <?php endif;?>><?=trans('planning')?></option>
                        <option value="2" <?php if($item->status == 2):?> selected <?php endif;?>><?=trans('completed')?></option>
                    </select>
                    <div style="display:none; color:red;" class="statusError"><?=trans('this_field_is_required')?></div>
                  </div>
                 </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?=trans('close')?></button>
                <button type="button" class="btn btn-primary change"><?=trans('update')?></button>
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
        // $('.getUser').on('click', function(){
        //     var email = $(this).data('id');
        //     var type = $(this).data('type');
        //     $.ajax({
        //         type: "POST",
        //         url: base_url + 'projects/getUser',
        //         data:{email:email},
        //         success:function(data){
        //             // var result = JSON.parse(data);
        //             $('#myModal').modal('show');
        //             $('.modal-body').html(data);
        //         }
        //     });
        // });
        
        $('.changeStatus').on('click', function(){
            var id = $(this).data('id');
            if(id){
                 $('#changeStatus').modal('show');
                 $('input[name="project_id"]').val(id);
            }
        });
        
        $('.change').on('click', function(){
             event.preventDefault();
            var status = $("input[name='status']").val();
            if(status == ""){
                $('.statusError').css('display','block');
            }
           else{
                $('.statusError').css('display','none');
                $('#changeForm').submit();
            }
        });
        
         $('.getPayments').on('click', function(){
            var id = $(this).data('id');
            $.ajax({
                type: "POST",
                url: base_url + 'projects/getPayments',
                data:{id:id},
                success:function(data){
                    // var result = JSON.parse(data);
                    $('#myModal').modal('show');
                    $('.modal-bodys').html(data);
                }
            });
        });
    });
    
</script>