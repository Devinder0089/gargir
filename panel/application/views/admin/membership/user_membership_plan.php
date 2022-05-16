<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header">
        <div class="left">
            <h3 class="box-title"><?=$title;?></h3>
            <br>
            <small class="pull-left">You can see <?=$title;?> here</small>
        </div>
       <div class="right">
            <a href="<?=base_url();?>admin/add-membership-plan" class="btn btn-sm btn-success btn-add-new">
                <i class="fa fa-plus"></i>
                Add New <?=$title;?>
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
                            <th width="20">Id</th>
                            <th>Membership Plan</th>
                             <th>Package Price</th>
                             <th>Package Discount</th>
                            <th>Date</th>
                            <th class="max-width-120">Options</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        if(isset($membership)):
                         foreach ($membership as $item): ?>
                            <tr>
                                <td><?=$item->id;?></td>
                                <td class="break-word"><?=$item->name;?></td>
                                <td><?=$item->price;?></td>
                                <td><?=$item->discount;?></td>
                                <td><?=($item->created_at);?></td>
                               <td>
                                        <div class="dropdown">
                                            <button class="btn bg-purple dropdown-toggle btn-select-option"
                                                    type="button"
                                                    data-toggle="dropdown">Select an option
                                                <span class="caret"></span>
                                            </button>

                                            <ul class="dropdown-menu">
                                            <li>
                                                <a class="edituser" href="<?php echo base_url(); ?>admin/membership-details/<?=$item->id;?>">
                                            <i class="fa fa-eye"></i>
                                                Views
                                            </a>
                                            </li>
                                             
                                            </ul>
                                        </div>
                                </td>
                            </tr>

                        <?php 
                        endforeach; 
                    endif;
                        ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!-- /.box-body -->
</div>