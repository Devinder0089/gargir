<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header">
        <div class="left">
            <h3 class="box-title"><?=$title;?></h3>
             <br>
            <small class="pull-left">You can see all registered users here</small>
        </div>
    </div><!-- /.box-header -->

    <!-- include message block -->
    <div class="col-sm-12">
        <?php $this->load->view('admin/includes/_messages_form'); ?>
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
                            <th>Avatar</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th class="max-width-120">Options</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?php echo html_escape($user->id); ?></td>
                                <td>
                                    <img src="<?php echo get_user_avatar($user); ?>" alt="user" class="img-responsive" style="height: 50px;">
                                </td>
                                <td><?php echo html_escape($user->username); ?></td>
                                <td><?php echo html_escape($user->email); ?></td>
                                <td>
                                    <?php if($user->role == "admin"): ?>
                                        <label class="label bg-olive"><?=$user->role;?></label>
                                    <?php elseif ($user->role == "client"): ?>
                                        <label class="label label-warning"><?=$user->role;?></label>
                                     <?php elseif ($user->role == "contractor"): ?>
                                        <label class="label label-warning"><?=$user->role;?></label>
                                    
                                    <?php else: ?>
                                        <label class="label label-default"><?=$user->role;?></label>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($user->status == 1): ?>
                                        <label class="label label-success">Active</label>
                                    <?php else: ?>
                                        <label class="label label-danger">Banned</label>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo nice_date($user->created_at, 'd.m.Y'); ?></td>

                                <td>
                                    <!-- form delete user -->
                                    <?php echo form_open('auth/user_options_post'); ?>

                                    <input type="hidden" name="id" value="<?php echo html_escape($user->id); ?>">

                                    <div class="dropdown">
                                        <button class="btn bg-purple dropdown-toggle btn-select-option"
                                                type="button"
                                                data-toggle="dropdown">Select an option
                                            <span class="caret"></span>
                                        </button>

                                        <ul class="dropdown-menu">
                                            <!--<li>-->
                                            <!--    <a class="p0">-->
                                            <!--        <button type="button" class="btn-list-button" data-toggle="modal"-->
                                            <!--                data-target="#myModal"-->
                                            <!--                onclick="$('#modal_user_id').val('<?php echo html_escape($user->id); ?>');">-->
                                            <!--            <i class="fa fa-user i-edit"></i>Change User Role-->
                                            <!--        </button>-->
                                            <!--    </a>-->
                                            <!--</li>-->
                                             <?php if($user->role == 'contractor'):?>
                                                <li>
                                                    <a href="<?php echo base_url(); ?>admin/contractor-details/<?php echo $user->slug;?>">
                                                        <i class="fa fa-file i-edit"></i>
                                                    View user
                                                    </a>
                                                </li>
                                             <?php elseif($user->role == 'worker'):?>
                                                <li>
                                                    <a href="<?php echo base_url(); ?>admin/worker-details/<?php echo $user->slug;?>">
                                                        <i class="fa fa-file i-edit"></i>
                                                    View user
                                                    </a>
                                                </li>
                                            <?php elseif($user->role == 'client'):?>
                                               <li>
                                                    <a href="<?php echo base_url(); ?>admin/client-details/<?php echo $user->slug;?>">
                                                        <i class="fa fa-file i-edit"></i>
                                                    View user
                                                    </a>
                                                </li>
                                           <?php endif;?>
                                           
                                            <?php if ($user->status == "1"): ?>
                                                <li>
                                                    <a class="p0">
                                                        <button type="submit" name="option" value="ban" class="btn-list-button"
                                                                onclick="return confirm('Are you sure you want to ban <?php echo html_escape($user->username); ?>?');">
                                                            <i class="fa fa-stop-circle i-delete"></i>Ban User
                                                        </button>
                                                    </a>
                                                </li>
                                            <?php else: ?>
                                                <li>
                                                    <a class="p0">
                                                        <button type="submit" name="option" value="remove_ban" class="btn-list-button"
                                                                onclick="return confirm('Are you sure you want to remove ban for <?php echo html_escape($user->username); ?>?');">
                                                            <i class="fa fa-stop-circle i-delete"></i>Remove Ban
                                                        </button>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                            <?php if($user->role == 'contractor'):?>
                                                <li>
                                                    <a href="<?php echo base_url(); ?>admin/edit-contractor/<?php echo $user->slug;?>">
                                                        <i class="fa fa-edit i-edit"></i>
                                                        Edit
                                                    </a>
                                                </li>
                                             <?php elseif($user->role == 'worker'):?>
                                              <li>
                                                    <a href="<?php echo base_url(); ?>admin/worker-edit/<?php echo $user->slug;?>">
                                                        <i class="fa fa-edit i-edit"></i>
                                                        Edit
                                                    </a>
                                                </li>
                                            <?php elseif($user->role == 'client'):?>
                                              <li>
                                                    <a href="<?php echo base_url(); ?>admin/client-edit/<?php echo $user->slug;?>">
                                                        <i class="fa fa-edit i-edit"></i>
                                                        Edit
                                                    </a>
                                            </li>
                                           <?php endif;?>
                                            <li>
                                                <a class="p0">
                                                    <button type="submit" name="option" value="delete" class="btn-list-button"
                                                            onclick="return confirm('Are you sure you want to delete this user?');">
                                                        <i class="fa fa-trash i-delete"></i>Delete User
                                                    </button>
                                                </a>
                                            </li>
                                          
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
