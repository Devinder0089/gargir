<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header">
        <div class="left">
            <h3 class="box-title"><?=$title;?></h3>
            <br>
            <small class="pull-left">You can see <?=$title;?> here</small>
        </div>
       <div class="right">
            <a href="<?=base_url();?>admin/add-sms-reports" class="btn btn-sm btn-success btn-add-new">
                <i class="fa fa-plus"></i>
                Send New <?=$title;?>
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
                            <th>User</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>SMS Send</th>
                            <th>Send SMS Status</th>
                            <th>Date</th>
                            <th class="max-width-120">Options</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        if(isset($sms_reports)):
                         foreach($sms_reports as $item):
                           $user=get_user($item->parent);
                           $users=get_user($item->user_id);
                          ?>
                            <tr>
                                <td><?=$item->id;?></td>
                                <td><?=($user)?$user->email:'no found';?></td>
                                <td><?=$item->name;?></td>
                                <td><?=$item->phone;?></td>
                               <td><?=($users)?$users->email:'no found';?></td>
                                <td>
                                    <?php if($item->sms_status == '0'): ?>
                                    <label class="label label-success">Done Send SMS</label>
                                    <?php else: ?>
                                      <label class="label label-danger">No Send SMS</label>
                                    <?php endif; ?>
                                </td>
                                <td><?=$item->created;?></td>
                               <td>
                                    <!-- form delete contact messages -->
                                    <?php echo form_open('sms_reports/delete_post'); ?>

                                        <input type="hidden" name="id" value="<?php echo html_escape($item->id); ?>">

                                        <div class="dropdown">
                                            <button class="btn bg-purple dropdown-toggle btn-select-option"
                                                    type="button"
                                                    data-toggle="dropdown">Select an option
                                                <span class="caret"></span>
                                            </button>

                                            <ul class="dropdown-menu">
                                            <li>
                                            <a class="edituser" href="<?php echo base_url(); ?>admin/sms-reports-details/<?=$item->id;?>">
                                            <i class="fa fa-eye"></i>
                                                Views
                                            </a>
                                            </li>
                                            <li>
                                            <a class="edituser" href="<?php echo base_url(); ?>admin/sms-reports-send/<?=$item->id;?>">
                                            <i class="fa fa-mobile"></i>
                                                SMS Send
                                            </a>
                                            </li>
                                                <?php if(is_admin()): ?>
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