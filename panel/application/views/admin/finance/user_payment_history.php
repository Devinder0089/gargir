<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header">
        <div class="left">
            <h3 class="box-title"><?=$title;?></h3>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped dataTable" id="cs_datatable" role="grid"
                           aria-describedby="example1_info">
                        <thead>
                        <tr role="row">
                            <th width="20">Monthy charges set for user</th>
                             <td><?= $user->monthly_price ?></td>
                        </tr>
                        <tr role="row">
                            <th width="20">Total income paid this year</th>
                             <td><?= $pay_year_sum ?></td>
                        </tr>
                        <tr role="row">
                            <th width="20">Total income paid life time</th>
                            <td><?= $pay_life_sum ?></td>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm-12" style="margin-top:10px;">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped dataTable" id="cs_datatable" role="grid"
                           aria-describedby="example1_info">
                        <thead>
                        <tr role="row">
                            <th width="20">Id</th>
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
