<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header">
        <div class="left">
            <h3 class="box-title">Users</h3>
            <!-- <br>
            <small class="pull-left">You can see all registered users here</small> -->
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
                                            <li>
                                                <a class="p0">
                                                    <button type="button" class="btn-list-button" data-toggle="modal"
                                                            data-target="#myModal"
                                                            onclick="$('#modal_user_id').val('<?php echo html_escape($user->id); ?>');">
                                                        <i class="fa fa-user i-edit"></i>Change User Role
                                                    </button>
                                                </a>
                                            </li>
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
                                            <li>
                                                <a class="edituser"href="<?php echo base_url(); ?>admin/user-edit/<?=$user->id;?>">
                                                    <i class="fa fa-edit i-edit"></i>
                                                Edit
                                            </a>
                                            </li>
                                           
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


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Change User Role</h4>
            </div>
            <?php echo form_open('auth/change_user_role_post'); ?>
            <div class="modal-body">
                <div class="form-group">
                    <label class="control-label">Select New Role</label>
                    <div class="row">

                        <input type="hidden" name="user_id" id="modal_user_id" value="">

                        <div class="col-sm-4 titlerol">
                            <input type="radio" name="role" value="client" id="role_admin"
                                   class="square-purple" required>
                            <label for="role_admin" class="option-label">Client</label>
                        </div>
                        <div class="col-sm-4 titlerol">
                            <input type="radio" name="role" value="contractor" id="role_editor"
                                   class="square-purple" required>
                            <label for="role_editor" class="option-label">Contractor</label>

                        </div>
                        <div class="col-sm-4 titlerol">
                            <input type="radio" name="role" value="customer" id="role_user"
                                   class="square-purple" required>
                            <label for="role_user" class="option-label">Customer</label>
                        </div>
                        <div class="col-sm-4 titlerol">
                            <input type="radio" name="role" value="worker" id="role_user"
                                   class="square-purple" required>
                            <label for="role_user" class="option-label">Worker</label>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Save</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

            <?php echo form_close(); ?><!-- form end -->
        </div>

    </div>
</div>