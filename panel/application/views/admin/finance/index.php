<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header">
        <div class="left">
            <h3 class="box-title"><?=$title;?></h3>
            <br>
            <small class="pull-left">You can see <?=$title;?> here</small>
        </div>
       <div class="right">
            <a href="<?php echo base_url('admin');?>/finance/add-payment" class="btn btn-sm btn-success btn-add-new">
            <i class="fa fa-plus"></i>
            Add Payment
            </a>
            </div>
    </div>
    <!-- /.box-header -->

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
                            <th width="20">Id</th>
                            <th>User Email(click to view all history)</th>
                             <th>Payment</th>
                             <th>Payment method</th>
                              <th>Date</th>
                              <th>Expire Date</th>
                              <th>Status</th>
                            <th class="max-width-120">Options</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        if(isset($finance)):
                         foreach($finance as $vl):
                                                      ?>
                            <tr>
                                <td><?=$vl->id;?></td>
                                <td class="break-word">
                                    <a class="btn btn-sm btn-primary getuserpayments" data-id="<?=$vl->user;?>" href="javascript:void(0)"><?=$vl->user;?></a>
                               </td>
                                <td>
                                <label class="label label-warning">
                                $<?=$vl->payment;?>
                                </label>
                                </td>
                                <td>
                               
                                <?= str_replace('_', ' ', $vl->payment_method);?>
                                </td>
                                <td><?=$vl->receive_date; ?></td>
                                <td><?=$vl->end_date; ?></td>
                                <td>
                                    <?php if($now < $vl->end_date):?>
                                     <label class="label label-success">Active</label>
                                    <?php else: ?>
                                    <label class="label label-danger">Expire</label>
                                    <?php endif; ?>
                                </td>
                               <td>
                                    <!-- form delete contact messages -->
                                    <?php echo form_open('finance/delete_post'); ?>

                                        <input type="hidden" name="id" value="<?=$vl->id;?>">

                                        <div class="dropdown">
                                            <button class="btn bg-purple dropdown-toggle btn-select-option"
                                                    type="button"
                                                    data-toggle="dropdown">Select an option
                                                <span class="caret"></span>
                                            </button>
                                            
                                            <ul class="dropdown-menu">
                                                <?php if(is_admin()): ?>
                                                 <li>
                                                    <a class="edituser"href="<?php echo base_url(); ?>admin/finance/edit-payment/<?=$vl->id;?>">
                                                            <i class="fa fa-file i-edit"></i>
                                                        Edit
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="p0">
                                                        <button type="submit" class="btn-list-button"
                                                                onclick="return confirm('Are you sure you want to delete this message?');">
                                                            <i class="fa fa-trash i-delete"></i>Delete
                                                        </button>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                            </ul>
                                        </div>
                                        <?php echo form_close(); ?><!-- form end -->
                                </td>
                            </tr>

                        <?php 
                        endforeach; 
                    else:
                        echo "No Found Data.";
                    endif;
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!-- /.box-body -->
</div>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialogs modal-lg modal-dialog-scrollable">

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
        $('.getuserpayments').on('click', function(){
            var email = $(this).data('id');
            $.ajax({
                type: "POST",
                url: base_url + 'finance/get_user_payment_record',
                data:{email:email},
                success:function(data){
                    $('#myModal').modal('show');
                    $('.modal-bodys').html(data);
                }
            });
        });
   });    
    
</script>