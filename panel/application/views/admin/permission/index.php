<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header">
        <div class="left">
            <h3 class="box-title"><?=$title;?></h3>
            <br>
            <small class="pull-left">You can see <?=$title;?> here</small>
        </div>
        <?php if(is_admin() || is_permission_user('permission_show') && is_permission_user('permission_add')): ?>
       <div class="right">
            <a href="<?=base_url();?>admin/add-permission" class="btn btn-sm btn-success btn-add-new">
                <i class="fa fa-plus"></i>
                Add New permission
            </a>
        </div>
    <?php endif;?>

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
                        <th>Allwo Permission Email</th>
                        <th>Allwo Permission by Email</th>
                        <th class="max-width-120">Options</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        if(isset($permission)):
                         foreach($permission as $item):
                            $usrp=get_user($item->parent);
                            
                          ?>
                            <tr>
                                <td><?=$item->id;?></td>
                                <td><?=$item->email;?></td>
                                <td><?=($usrp)?$usrp->email:'';?></td>
                               
                               <td>
                                    <!-- form delete contact messages -->
                                    <?php echo form_open('permission/delete_post_user_id'); ?>

                                        <input type="hidden" name="uid" value="<?php echo html_escape($item->user_id); ?>">

                                        <div class="dropdown">
                                            <button class="btn bg-purple dropdown-toggle btn-select-option"
                                                    type="button"
                                                    data-toggle="dropdown">Select an option
                                                <span class="caret"></span>
                                            </button>

                                            <ul class="dropdown-menu">
                                        <?php if(is_admin() || is_permission_user('permission_show') && is_permission_user('permission_view')): ?>
                                             <li>
                                            <a class="edituser" href="<?php echo base_url(); ?>admin/permission-details/<?=$item->user_id;?>">
                                            <i class="fa fa-eye"></i>
                                                Views
                                            </a>
                                            </li>
                                    <?php endif; ?>

                                        <?php if(is_admin() || is_permission_user('permission_show') && is_permission_user('permission_edit')): ?>
                                            <li>
                                            <a class="edituser" href="<?php echo base_url(); ?>admin/permission-edit/<?=$item->user_id;?>">
                                            <i class="fa fa-eye"></i>
                                                Edit
                                            </a>
                                            </li>
                                        <?php endif; ?>

                                        <?php if(is_admin() || is_permission_user('permission_show') && is_permission_user('permission_delete')): ?>
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