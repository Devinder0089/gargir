<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header">
        <div class="left">
            <h3 class="box-title"><?= $title ?></h3>
            <br>
            <small class="pull-left">You can see the <?= $title ?> here.</small>
        </div>
        <div class="right">
            <a href="<?php echo base_url(); ?>admin/add-page" class="btn btn-sm btn-success btn-add-new">
                <i class="fa fa-plus"></i>
                <?= trans('add_new_page') ?>
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
                            <th width="20"><?= trans('id') ?></th>
                            <th><?= trans('title') ?></th>
                            <th><?= trans('location') ?></th>
                            <th><?= trans('visibility') ?></th>
                            <th><?= trans('type') ?></th>
                            <th><?= trans('added_date') ?></th>
                            <th class="max-width-120"><?= trans('options') ?></th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($pages as $item): ?>
                            <tr>
                                <td><?php echo html_escape($item->id); ?></td>
                                <td><?php echo html_escape($item->title); ?></td>
                                <td>
                                    <?php
                                    if (html_escape($item->location) == "top"):
                                        echo "<?= trans('top_menu') ?>";
                                    elseif (html_escape($item->location) == "main"):
                                        echo "<?= trans('main_menu') ?>";
                                    elseif (html_escape($item->location) == "footer"):
                                        echo "<?= trans('footer') ?>";
                                    else:
                                        echo "-";
                                    endif;
                                    ?>
                                </td>
                                <td>
                                    <?php if ($item->visibility == 1): ?>
                                        <label class="label label-success"><i class="fa fa-eye"></i></label>
                                    <?php else: ?>
                                        <label class="label label-danger"><i class="fa fa-eye"></i></label>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($item->is_custom == 1): ?>
                                        <label class="label bg-teal"><?= trans('custom') ?></label>
                                    <?php else: ?>
                                        <label class="label label-default"><?= trans('default') ?></label>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo nice_date($item->created_at, 'd.m.Y'); ?></td>

                                <td>
                                    <!-- form delete page-->
                                    <?php echo form_open('page/delete_page_post'); ?>

                                    <input type="hidden" name="id" value="<?php echo html_escape($item->id); ?>">

                                    <div class="dropdown">
                                        <button class="btn bg-purple dropdown-toggle btn-select-option"
                                                type="button"
                                                data-toggle="dropdown"><?= trans('select_an_option') ?>
                                            <span class="caret"></span>
                                        </button>

                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="<?php echo base_url(); ?>admin/update-page/<?php echo html_escape($item->id); ?>">
                                                    <i class="fa fa-edit i-edit"></i><?= trans('edit') ?></a>
                                            </li>

                                            <li>
                                                <a class="p0">
                                                    <button type="submit" class="btn-list-button"
                                                            onclick="return confirm('Are you sure you want to delete this page?');">
                                                        <i class="fa fa-trash i-delete"></i><?= trans('delete') ?>
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
