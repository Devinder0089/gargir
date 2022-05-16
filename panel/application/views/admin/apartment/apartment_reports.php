<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header">
        <div class="left">
            <h3 class="box-title"><?= $title ?></h3>
            <br>
            <small class="pull-left">You can see all <?= $title ?> here</small>
        </div>
        <?php if(!is_client()):?>
        <div class="right">
            <a href="javascript:void(0)" class="btn btn-sm btn-success add_new_report">
                <i class="fa fa-plus"></i>
                <?=trans('add_report');?>
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
                            <th width="20"><?=trans('id');?></th>
                            <th><?=trans('report_time');?></th>
                            <th><?=trans('report_date');?></th>
                            <th><?=trans('submit_by');?></th>
                            <th><?=trans('title');?></th>
                            <th><?=trans('content');?></th>
                            <th class="max-width-120"><?=trans('options');?></th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($apartment_reports as $item): ?>
                            <tr>
                                <td><?=$item->id;?></td>
                                <td><?=date('h:i a', strtotime($item->created_at));?></td>
                                <td><?=date('Y/m/d', strtotime($item->created_at));?></td>
                               <td class="break-word"><?=$item->user;?></td>
                                <td class="break-word"><?=$item->title;?></td>
                                <td class="break-word">
                                    <button type="button" class="label label-success getDetails" data-id="<?= $item->id ?>"><?=trans('click_to_view');?></button>
                                </td>
                                <td>
                                    <!-- form delete contact messages -->
                                    <?php echo form_open('apartment/delete_apartment_report_post'); ?>

                                        <input type="hidden" name="id" value="<?php echo html_escape($item->id); ?>">

                                        <div class="dropdown">
                                            <button class="btn bg-purple dropdown-toggle btn-select-option"
                                                    type="button"
                                                    data-toggle="dropdown"><?=trans('select_an_option');?>
                                                <span class="caret"></span>
                                            </button>

                                            <ul class="dropdown-menu">
                                            <?php if(is_admin() || is_contractor() || is_worker()): ?>
                                                <li>
                                                <a class="edituser"href="<?php echo base_url(); ?>admin/project/apartment/report/<?=$item->id;?>">
                                                        <i class="fa fa-edit i-edit"></i>
                                                    <?=trans('edit');?>
                                                </a>
                                                </li>
                                                <li>
                                                    <a class="p0">
                                                        <button type="submit" class="btn-list-button"
                                                                onclick="return confirm('<?=trans('are_you_sure_delete');?>');">
                                                            <i class="fa fa-trash i-delete"></i><?=trans('delete');?>
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?=trans('add_report');?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" id="addForm" action="<?php echo base_url('apartment/apartmentReports_post')?>" enctype="multipart/form-data">
            <input type="hidden" name="apartment_id" value="<?php echo $apartment->id; ?>"/>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label"><?=trans('title');?>: *</label>
            <input type="text" class="form-control" name="title" id="recipient-name" required>
            <div style="display:none; color:red;" class="titleError"><?=trans('this_field_is_required');?></div>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label"><?=trans('images');?>:</label>
            <input type="file" class="form-control" name="files[]" multiple="multiple" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label"><?=trans('content');?>: *</label>
            <textarea class="form-control" name="description" id="message-text" required></textarea>
            <div style="display:none; color:red;" class="descirptionError"><?=trans('this_field_is_required');?></div>
          </div>
           <div class="form-group">
            <label for="message-text" class="col-form-label"><?=trans('send_with_email');?>:</label>
           <input type="checkbox" name="type" value="1">
          </div>
        </form>
      </div>
      <div class="modal-footer" style="margin-top:20px;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?=trans('close');?></button>
        <button type="button" class="btn btn-primary add"><?=trans('add');?></button>
      </div>
    </div>
  </div>
</div>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">

        <!-- Modal content-->
        <div class="modal-content modal-contents">
            <div class="modal-header modal-headers">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body modal-bodys">
                
            </div>
            <div class="modal-footer modal-footers">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?=trans('close');?></button>
            </div>

        </div>

    </div>
</div>
<style>
    .modal-dialog{
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
        $('.add_new_report').on('click', function(){
            $('#exampleModal').modal('show');
        });
        $('.add').on('click', function(){
             event.preventDefault();
            var title = $("input[name='title']").val();
            var description = $("textarea[name='description']").val();
            if(title == ""){
                $('.titleError').css('display','block');
            }
            else if(description == ""){
                $('.descirptionError').css('display','block');
            }else{
                $('.titleError').css('display','none');
                $('.descirptionError').css('display','none');
                $('#addForm').submit();
            }
        });
        
        $('.getDetails').on('click', function(){
            var id = $(this).data('id');
            $.ajax({
                type: "POST",
                url: base_url + 'apartment/getDetails',
                data:{id:id},
                success:function(data){
                    $('#myModal').modal('show');
                    $('#myModal .modal-body').html(data);
                }
            });
        });
    });
    
    
</script>