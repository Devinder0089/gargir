<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header">
        <div class="left">
            <h3 class="box-title">Projects</h3>
            <br>
            <small class="pull-left">You can see Projects here</small>
        </div>
       <!--  <div class="right">
            <a href="<?php echo base_url(); ?>admin/add-project" class="btn btn-sm btn-success btn-add-new">
                <i class="fa fa-plus"></i>
                Add New Projects
            </a>
        </div> -->
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
                            <th width="20">Id</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>type</th>
                            <th>Date Added</th>
                            <th class="max-width-120">Options</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($projects as $item): ?>
                            <tr>
                                <td><?=$item->id;?></td>
                                <td>
                                    <?php 
                                    if($item->images):?>
                                     <img src="<?= base_url() . html_escape($item->images);?>" class="imgprj">
                                    <?php else:
                                        echo "";
                                    endif;
                                    ?>
                                   
                                </td>
                                <td class="break-word"><?php echo html_escape($item->title); ?></td>
                                <td>
                                    <?=$item->type;?>
                                </td>
                               
                                <td><?=($item->created_at);?></td>
                               <td>
                                    <!-- form delete contact messages -->
                                    <?php echo form_open('projects/delete_project_post'); ?>

                                        <input type="hidden" name="id" value="<?php echo html_escape($item->id); ?>">

                                        <div class="dropdown">
                                            <button class="btn bg-purple dropdown-toggle btn-select-option"
                                                    type="button"
                                                    data-toggle="dropdown">Select an option
                                                <span class="caret"></span>
                                            </button>

                                            <ul class="dropdown-menu">
                                                <li>
                                                <a class="edituser"href="<?php echo base_url(); ?>admin/project-details/<?=$item->pid;?>">
                                                    <i class="fa fa-edit i-edit"></i>
                                                Projects details
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

                        <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!-- /.box-body -->
</div>