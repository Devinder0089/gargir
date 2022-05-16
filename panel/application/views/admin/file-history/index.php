<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header">
        <div class="left">
            <h3 class="box-title"><?= $title ?></h3>
            <br>
            <small class="pull-left">You can see <?= $title ?> here</small>
        </div>
     
         <div class="right">
            <a href="javascript:void(0)" class="btn btn-sm btn-success btn-add-new">
                <i class="fa fa-plus"></i>
                <?=trans('add_file')?>
            </a>
        </div>
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
                            <th><?=trans('title')?></th>
                            <th><?=trans('file')?></th>
                            <th><?=trans('uploaded_by')?></th>
                            <th><?=trans('added_date')?></th>
                             <th><?=trans('status')?></th>
                            <th class="max-width-120"><?=trans('options')?></th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($files as $item): ?>
                            <tr>
                                <td class="break-word"><?php echo html_escape($item->title); ?></td>
                                <td>
                                    <?php if($item->files == ""):?>
                                        <p><?=trans('no_file')?></p>
                                    <?php else:?>
                                        <a class="edituser" target="_blank" href="<?php echo base_url(); ?>uploads/project/files/<?=$item->files;?>">
                                            <i class="fa fa-book i-edit"></i>
                                        </a>
                                    <?php endif;?>
                                   
                                </td>
                                <td>
                                    <button type="button" class="label label-success"><?php echo $item->user;?></button>
                                </td>
                                <td><?= date('Y-m-d', strtotime($item->created_at));?></td>
                                 <td>
                                   
                                     <?php if($item->status == 1):?>
                                        <button class="label label-primary changeStatus" data-id="<?= $item->id ?>"><?=trans('approved')?></button>
                                    <?php elseif($item->status == 0):?>
                                        <button class="label label-danger changeStatus" data-id="<?= $item->id ?>"><?=trans('not_approved')?></button>
                                     <?php endif;?>
                                     
                                     
                                 </td>
                               <td>
                                    <!-- form delete contact messages -->
                                    <?php echo form_open('file_history/delete_file'); ?>

                                        <input type="hidden" name="id" value="<?= $item->id ?>"/>

                                        <div class="dropdown">
                                            <button class="btn bg-purple dropdown-toggle btn-select-option"
                                                    type="button"
                                                    data-toggle="dropdown"><?=trans('select_an_option')?>
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                            <!--<li>-->
                                            <!--    <a class="edituser sendfiles" href="javascript:void(0)" data-id="<?= $item->id;?>">-->
                                            <!--            <i class="fa fa-edit i-edit"></i>-->
                                            <!--        <?=trans('send_file')?>-->
                                            <!--    </a>-->
                                            <!--</li>-->
                                                <?php if(is_contractor() || is_worker()): ?>
                                                <li>
                                                    <a class="p0">
                                                        <button type="submit" class="btn-list-button"
                                                                onclick="return confirm('<?=trans('are_you_sure_delete')?>');">
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
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?=trans('add_file')?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" id="addForm" action="<?php echo base_url('file_history/files_post')?>" enctype="multipart/form-data">
      <div class="modal-body">
        
          <div class="form-group">
            <label for="recipient-name" class="col-form-label"><?=trans('title')?>: *</label>
            <input type="text" class="form-control" name="title" id="recipient-name">
            <div style="display:none; color:red;" class="titleError"><?=trans('this_field_is_required')?></div>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label"><?=trans('file')?>:</label>
            <input type="file" class="form-control" name="files" accept = "application/pdf,.csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" id="recipient-name">
            <div style="display:none; color:red;" class="fileError"><?=trans('this_field_is_required')?></div>
          </div>
           <div class="form-group">
            <label for="recipient-name" class="col-form-label"><?=trans('users')?>:</label>
            <?php if(is_contractor() || is_worker()):?>
                <select class="form-control" name="client_id" required>
                    <option></option>
                    <?php foreach($clients as $cli): ?>
                        <option value="<?= $cli->id ?>"><?= $cli->email ?></option>
                    <?php endforeach;?>
                </select>
            <?php endif; ?>
          </div>  
      </div>
      <div class="modal-footer" style="margin-top:20px;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?=trans('close')?></button>
        
        <button type="submit" class="btn btn-primary addFiles"><?=trans('add')?></button>
      </div>
       </form>
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
                 <form method="post" id="changeForm" action="<?php echo base_url('file_history/file_status_change')?>">
                    <input type="hidden" name="file_id" value=""/>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label"><?=trans('status')?>: *</label>
                    <select class="form-control" name="status" id="recipient-name" required>
                        <option value="1" <?php if($item->status == 1):?> selected <?php endif;?>><?=trans('approved')?></option>
                        <option value="0" <?php if($item->status == 0):?> selected <?php endif;?>><?=trans('not_approved')?></option>
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
<div class="modal fade" id="sendfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><?=trans('send_file')?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" id="sendfiles" action="<?php echo base_url('apartment/send_files_post')?>">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label"><?=trans('to')?>: *</label>
            <input type="email" class="form-control" name="email" id="recipient-name" required>
            <div style="display:none; color:red;" class="emailError"><?=trans('this_field_is_required')?></div>
          </div>
           <div class="form-group">
            <label for="recipient-name" class="col-form-label"><?=trans('subject')?>: *</label>
            <input type="text" class="form-control" name="subject" id="recipient-name" required>
            <div style="display:none; color:red;" class="subjectError"><?=trans('this_field_is_required')?></div>
          </div>
           <div class="form-group">
            <label for="recipient-name" class="col-form-label"><?=trans('message')?>: *</label>
            <textarea class="form-control" name="message" required></textarea>
            <div style="display:none; color:red;" class="messageError"><?=trans('this_field_is_required')?></div>
          </div>
          <input type="hidden" value="" name="file_id"/>
        </form>
      </div>
      <div class="modal-footer" style="margin-top:20px;">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?=trans('close')?></button>
        
        <button type="button" class="btn btn-primary sendfile"><?=trans('add')?></button>
      </div>
    </div>
  </div>
</div>
<script>
    $(document).ready(function(){
        $('.btn-add-new').on('click', function(){
            $('#exampleModal').modal('show');
        });
        
        $('.addFiles').on('click', function(){
             event.preventDefault();
            var title = $("input[name='title']").val();
            var file = $("input[name='files']").val();
            if(title == ""){
                $('.titleError').css('display','block');
            }else if(file == ""){
                $('.fileError').css('display','block');
            }
            else{
                $('.titleError').css('display','none');
                $('.fileError').css('display','none');
                $('#addForm').submit();
            }
        });
        
        $('.changeStatus').on('click', function(){
            var id = $(this).data('id');
            if(id){
                 $('#changeStatus').modal('show');
                 $('input[name="file_id"]').val(id);
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
        
         $('.sendfiles').on('click', function(){
             var id = $(this).data('id');
             $("input[name='file_id']").val(id);
            $('#sendfile').modal('show');
        });
        
        $('.sendfile').on('click', function(){
             event.preventDefault();
            var email = $("input[name='email']").val();
            var subject = $("input[name='subject']").val();
            var message = $("textarea[name='message']").val();
            if(email == ""){
                $('.emailError').css('display','block');
            }else if(subject == ""){
                $('.subjectError').css('display','block');
            }else if(message == ""){
                $('.messageError').css('display','block');
            }
            else{
                $('.emailError').css('display','none');
                $('.subjectError').css('display','none');
                $('.messageError').css('display','none');
                $('#sendfiles').submit();
            }
        });
    });
    
</script>