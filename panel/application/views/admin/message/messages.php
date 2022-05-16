<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header">
        <div class="left">
            <h3 class="box-title"><?=$title;?></h3>
            <br>
            <small class="pull-left">You can see <?=$title;?> here.</small>
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
                            <th width="20"><?= trans('id') ?></th>
                            <th><?= trans('name') ?></th>
                            <th><?= trans('sender_email') ?></th>
                            <th><?= trans('message') ?></th>
                            <th><?= trans('mail_status') ?></th>
                            <th><?= trans('receiver_email') ?></th>
                            <th style="min-width: 10%"><?= trans('send_date') ?></th>
                            <th class="max-width-120"><?= trans('options') ?></th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php 
                        foreach ($messages as $item):
                            $snd_user=get_user($item->parent_id);
                         ?>
                            <tr>
                                <td><?php echo html_escape($item->id); ?></td>
                                <td><?php echo html_escape($item->name); ?></td>
                                <td><?php echo html_escape($item->email); ?></td>
                                <td><?php echo html_escape($item->content); ?></td>
                                <td>
                                <?php if($item->send_mail == "1"): ?>
                                <label class="label label-success">
                                <?= trans('success') ?>
                                </label>
                                <?php else: ?>
                                <label class="label label-warning">
                                <?= trans('failed') ?>
                                </label>
                                <?php endif; ?>
                                </td>

                                <td class="break-word"><?=($snd_user?$snd_user->email:"");?></td>
                                <td><?php echo $item->created; ?></td>

                                <td>
                                    <!-- form delete contact messages -->
                                    <?php echo form_open('messages/delete_message_post'); ?>

                                        <input type="hidden" name="id" value="<?php echo html_escape($item->id); ?>">

                                        <div class="dropdown">
                                            <button class="btn bg-purple dropdown-toggle btn-select-option"
                                                    type="button"
                                                    data-toggle="dropdown"> <?= trans('select_an_option') ?>
                                                <span class="caret"></span>
                                            </button>

                                            <ul class="dropdown-menu">
                                            <li>
                                            <a class="edituser"href="<?php echo base_url(); ?>admin/message/sentmail/<?=$item->id;?>">
                                            <i class="fa fa-eye i-view"></i>
                                            <?= trans('send_mail') ?>
                                            </a>
                                            </li>

                                            <li>
                                            <a class="edituser"href="<?php echo base_url(); ?>admin/message/details/<?=$item->id;?>">
                                            <i class="fa fa-eye i-view"></i>
                                             <?= trans('view') ?>
                                            </a>
                                            </li>

                                                <li>
                                                    <a class="p0">
                                                        <button type="submit" class="btn-list-button"
                                                                onclick="return confirm(' <?= trans('are_you_sure_delete') ?>');">
                                                            <i class="fa fa-trash i-delete"></i> <?= trans('delete') ?>
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