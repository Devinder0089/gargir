<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header">
        <div class="left">
            <h3 class="box-title"><?=$title;?></h3>
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
                            <th width="20"><?= trans('id');?></th>
                            <th><?= trans('avatar');?></th>
                            <th><?= trans('email');?></th>
                            <th><?= trans('phone_number');?></th>
                            <th><?= trans('role');?></th>
                            <th><?= trans('status');?></th>
                            <th><?= trans('added_date');?></th>
                            <th class="max-width-120"><?= trans('options');?></th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?php echo html_escape($user->id); ?></td>
                                <td>
                                    <img src="<?php echo get_user_avatar($user); ?>" alt="user" class="img-responsive" style="height: 50px;">
                                </td>
                                <td><?php echo html_escape($user->email); ?></td>
                                 <td><?php echo html_escape($user->phone); ?></td>
                                <td>
                                    <label class="label label-warning"><?= trans('contractor');?></label>
                                </td>
                                <td>
                                    <?php if ($user->status == 1): ?>
                                        <label class="label label-success"><?= trans('active');?></label>
                                    <?php else: ?>
                                        <label class="label label-danger"><?= trans('banned');?></label>
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
                                                data-toggle="dropdown"><?= trans('select_an_option');?>
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
                                            <li>
                                                <a href="<?php echo base_url(); ?>admin/contractor-details/<?php echo $user->slug;?>">
                                                    <i class="fa fa-file i-edit"></i>
                                                <?= trans('user_details');?>
                                            </a>
                                            </li>
                                            <?php if ($user->status == "1"): ?>
                                                <li>
                                                    <a class="p0">
                                                        <button type="submit" name="option" value="ban" class="btn-list-button"
                                                                onclick="return confirm('<?= trans('are_you_sure_ban');?> <?php echo html_escape($user->username); ?>?');">
                                                            <i class="fa fa-stop-circle i-delete"></i><?= trans('ban_user');?>
                                                        </button>
                                                    </a>
                                                </li>
                                            <?php else: ?>
                                                <li>
                                                    <a class="p0">
                                                        <button type="submit" name="option" value="remove_ban" class="btn-list-button"
                                                                onclick="return confirm('<?= trans('are_you_sure_remove_ban');?> <?php echo html_escape($user->username); ?>?');">
                                                            <i class="fa fa-stop-circle i-delete"></i><?= trans('remove_ban');?>
                                                        </button>
                                                    </a>
                                                </li>
                                            <?php endif; ?>
                                            <li>
                                                <a href="<?php echo base_url(); ?>admin/edit-contractor/<?php echo $user->slug;?>">
                                                    <i class="fa fa-edit i-edit"></i>
                                                <?= trans('edit_user');?>
                                            </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url(); ?>admin/contractor/payment/history/<?php echo $user->slug;?>">
                                                    <i class="fa fa-money i-edit"></i>
                                                <?= trans('payment_history');?>
                                            </a>
                                            </li>
                                            <li>
                                                <a class="p0">
                                                    <button type="submit" name="option" value="delete" class="btn-list-button"
                                                            onclick="return confirm('<?= trans('are_you_sure_delete');?>');">
                                                        <i class="fa fa-trash i-delete"></i><?= trans('delete_user');?>
                                                    </button>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url(); ?>admin/contractor-clients/<?php echo $user->slug;?>">
                                                    <i class="fa fa-user i-edit"></i>
                                                <?= trans('clients');?>
                                            </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url(); ?>admin/contractor-workers/<?php echo $user->slug;?>">
                                                    <i class="fa fa-user i-edit"></i>
                                                <?= trans('workers');?>
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

