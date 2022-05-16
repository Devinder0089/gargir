<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header">
        <div class="left">
            <h3 class="box-title"><?=trans('project_payments')?></h3>
            <br>
        </div>
    </div><!-- /.box-header -->
    <!-- include message block -->
    <div class="col-sm-12">
        <h5 class="message"></h5>
    </div>

    <div class="box-body">
        <div class="row">
              <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped dataTable" id="cs_datatable" role="grid"
                           aria-describedby="example1_info">
                        <tbody>
                        <tr role="row">
                            <th width="20"><?=trans('total_project_payment')?></th>
                            <td width="20"><button class="bt btn-primary">$<?= $total_project_payment; ?></button></td>
                        </tr>
                         <tr role="row">
                             <th width="20"><?=trans('total_paid_by_clients')?></th>
                            <td width="20"><button class="bt btn-success">$<?= $total_paid; ?></button></td>
                        </tr>
                        <tr role="row">
                             <th width="20"><?=trans('total_debt')?></th>
                            <td width="20"><button class="bt btn-danger">$<?= $total_debt; ?></button></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!-- /.box-body -->
</div>
<style>
    .success{
        color:green;
    }
    .error{
        color:red;
    }
</style>

