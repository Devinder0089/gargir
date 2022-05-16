<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

    <!-- Small boxes (Stat box) -->
<div class="row rownaviationtop">
<?php

 if(is_admin()):
 ?>
 
       <div class="col-lg-4 col-md-4 col-sm-6 columnsidebar finance">
            <!-- small box -->
            <div class="small-box bg-white">
                <a href="<?php echo base_url(); ?>admin/finance/month" class="small-box-footer">
                    <div class="inner-sec">
                        <div class="inner-icon">
                            <img src="<?= base_url() ?>assets/admin/img/month-icon.png">
                        </div>
                        <div class="inner">
                            <h3>$<?=(isset($total_finance_this_month))?$total_finance_this_month:'0'; ?></h3>
                            <p><?= trans('total_income_of_this_month');?></p>
                        </div>
                    </div>
               </a>
            </div>
        </div><!-- ./col -->
       <div class="col-lg-4 col-md-4 col-sm-6 columnsidebar finance">
            <!-- small box -->
            <div class="small-box bg-white">
                <a href="<?php echo base_url(); ?>admin/finance/year" class="small-box-footer">
                    <div class="inner-sec">
                        <div class="inner-icon">
                            <img src="<?= base_url() ?>assets/admin/img/year-icon.png">
                        </div>
                        <div class="inner">
                            <h3>$<?=(isset($total_finance_this_year))?$total_finance_this_year:'0'; ?></h3>
                            <p><?= trans('total_income_of_this_year');?></p>
                        </div>
                    </div>
               </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-4 col-md-4 col-sm-6 columnsidebar finance">
            <!-- small box -->
            <div class="small-box bg-white">
                <a href="<?php echo base_url(); ?>admin/finance" class="small-box-footer">
                    <div class="inner-sec">
                        <div class="inner-icon">
                            <img src="<?= base_url() ?>assets/admin/img/now-icon.png">
                        </div>
                        <div class="inner">
                            <h3>$<?=(isset($total_finance))?$total_finance:'0'; ?></h3>
                            <p><?= trans('total_income_till_now');?></p>
                        </div>
                    </div>
               </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-4 col-md-4 col-sm-6 columnsidebar active-customer">
            <!-- small box -->
            <div class="small-box bg-white">
                <a href="<?php echo base_url('admin/contractor'); ?>" class="small-box-footer">
                    <div class="inner-sec">
                        <div class="inner-icon">
                            <img src="<?= base_url() ?>assets/admin/img/contract-icon.png">
                        </div>
                        <div class="inner">
                            <h3><?=(isset($total_contractor_count))?$total_contractor_count:'0'; ?></h3>
                            <p><?= trans('contractors');?></p>
                        </div>
                    </div>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-4 col-md-4 col-sm-6 columnsidebar active-customer">
            <!-- small box -->
            <div class="small-box bg-white">
                <a href="<?php echo base_url('admin/projects'); ?>" class="small-box-footer">
                    <div class="inner-sec">
                        <div class="inner-icon">
                            <img src="<?= base_url() ?>assets/admin/img/project-icon.png">
                        </div>
                        <div class="inner">
                            <h3><?=(isset($total_projects_count))?$total_projects_count:'0'; ?></h3>
                            <p><?= trans('projects');?></p>
                        </div>
                    </div>
                </a>
            </div>
        </div><!-- ./col -->
         <div class="col-lg-4 col-md-4 col-sm-6 columnsidebar finance">
            <!-- small box -->
            <div class="small-box bg-white">
                <a href="<?php echo base_url(); ?>admin/finance" class="small-box-footer">
                    <div class="inner-sec">
                        <div class="inner-icon">
                            <img src="<?= base_url() ?>assets/admin/img/total-money-icon.png">
                        </div>
                        <div class="inner">
                            <h3>$<?=(isset($total_money_raised_from_projects))?$total_money_raised_from_projects:'0'; ?></h3>
                            <p><?= trans('total_money_raised_from_projects');?></p>
                        </div>
                    </div>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="row alluserssec">
        <div class="col-sm-12 no-padding margin-bottom-20">
            <div class="col-lg-12 col-sm-12 col-xs-12">
                <!-- USERS LIST -->
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title"><?= trans('latest_users');?></h3>
                        <br>
                        <p><?= trans('you_can_see_last');?></p>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                        class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <ul class="users-list clearfix">
                            <?php foreach($last_users as $item):?>
                                <li>
                                    <a class="hypercl" href="javascript:avoid(0);">
                                        <img src="<?php echo get_user_avatar($item); ?>" alt="user" class="img-responsive">
                                    </a>
                                    <a class="users-list-name"><?php echo html_escape($item->username); ?></a>
                                    <span class="users-list-date"><?php echo nice_date($item->created_at, 'd.m.Y'); ?></span>
                                </li>

                            <?php endforeach; ?>

                        </ul>
                        <!-- /.users-list -->
                        <div class="box-footer text-center">
                            <a href="<?php echo base_url(); ?>admin/users" class="viewbtn-user"><?= trans('view_all_users');?> <i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    
                    <!-- /.box-footer -->
                </div>
                <!--/.box -->
            </div>
        </div>
    </div>
    <!-- /.row --> 
    <?php endif; ?>
<?php

 if(is_contractor()):
 ?>
        <div class="col-lg-4 col-md-4 col-sm-6 columnsidebar finance">
            <!-- small box -->
            <div class="small-box bg-white">
                <a href="<?php echo base_url(); ?>admin/invoices/<?php echo 'monthly' ?>" class="small-box-footer">
                    <div class="inner-sec">
                        <div class="inner-icon">
                            <img src="<?= base_url() ?>assets/admin/img/month-icon.png">
                        </div>
                        <div class="inner">
                            <h3>$<?=(isset($total_finance_this_month))?$total_finance_this_month:'0'; ?></h3>
                            <p><?= trans('total_income_of_this_month');?></p>
                        </div>
                    </div>
               </a>
            </div>
        </div><!-- ./col -->
       <div class="col-lg-4 col-md-4 col-sm-6 columnsidebar finance">
            <!-- small box -->
            <div class="small-box bg-white">
                <a href="<?php echo base_url(); ?>admin/invoices" class="small-box-footer">
                    <div class="inner-sec">
                        <div class="inner-icon">
                            <img src="<?= base_url() ?>assets/admin/img/year-icon.png">
                        </div>
                        <div class="inner">
                            <h3>$<?=(isset($total_finance_this_year))?$total_finance_this_year:'0'; ?></h3>
                            <p><?= trans('total_income_of_this_year');?></p>
                        </div>
                    </div>
               </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-4 col-md-4 col-sm-6 columnsidebar finance">
            <!-- small box -->
            <div class="small-box bg-white">
                <a href="<?php echo base_url(); ?>admin/invoices" class="small-box-footer">
                    <div class="inner-sec">
                        <div class="inner-icon">
                            <img src="<?= base_url() ?>assets/admin/img/now-icon.png">
                        </div>
                        <div class="inner">
                            <h3>$<?=(isset($total_finance))?$total_finance:'0'; ?></h3>
                            <p><?= trans('total_income_till_now');?></p>
                        </div>
                    </div>
               </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-4 col-md-4 col-sm-6 columnsidebar finance">
            <!-- small box -->
            <div class="small-box bg-white">
                <a href="<?php echo base_url(); ?>admin/projects" class="small-box-footer">
                    <div class="inner-sec">
                        <div class="inner-icon">
                            <img src="<?= base_url() ?>assets/admin/img/total-money-icon.png">
                        </div>
                        <div class="inner">
                             <h3>$<?=(isset($total_finance_in_debt) && $total_finance_in_debt != 0)?$total_finance_in_debt:'0'; ?></h3>
                             <p><?= trans('total_money_in_debt');?></p>
                        </div>
                    </div>
                </a>
            </div>
        </div><!-- ./col -->
         <div class="col-lg-4 col-md-4 col-sm-6 columnsidebar active-customer">
            <!-- small box -->
            <div class="small-box bg-white">
                <a href="<?php echo base_url('admin/projects'); ?>" class="small-box-footer">
                    <div class="inner-sec">
                        <div class="inner-icon">
                            <img src="<?= base_url() ?>assets/admin/img/project-icon.png">
                        </div>
                        <div class="inner">
                            <h3><?=(isset($total_projects_count))?$total_projects_count:'0'; ?></h3>
                            <p><?= trans('projects');?></p>
                        </div>
                    </div>
                </a>
            </div>
        </div><!-- ./col -->
         <div class="col-lg-4 col-md-4 col-sm-6 columnsidebar active-customer">
            <!-- small box -->
            <div class="small-box bg-white">
                <a href="<?php echo base_url('admin/workers'); ?>" class="small-box-footer">
                    <div class="inner-sec">
                        <div class="inner-icon">
                            <img src="<?= base_url() ?>assets/admin/img/contract-icon.png">
                        </div>
                        <div class="inner">
                            <h3><?=(isset($total_worker_count))?$total_worker_count:'0'; ?></h3>
                            <p><?= trans('workers');?></p>
                        </div>
                    </div>
                </a>
            </div>
        </div><!-- ./col -->
         <div class="col-lg-4 col-md-4 col-sm-6 columnsidebar active-customer">
            <!-- small box -->
            <div class="small-box bg-white">
                <a href="<?php echo base_url('admin/clients'); ?>" class="small-box-footer">
                    <div class="inner-sec">
                        <div class="inner-icon">
                            <img src="<?= base_url() ?>assets/admin/img/contract-icon.png">
                        </div>
                        <div class="inner">
                            <h3><?=(isset($total_client_count))?$total_client_count:'0'; ?></h3>
                           <p><?= trans('clients');?></p>
                        </div>
                    </div>
                </a>
            </div>
        </div><!-- ./col -->
    <?php endif; ?>
    
    <?php

 if(is_worker()):
 ?>
         <div class="col-lg-4 col-md-4 col-sm-6 columnsidebar active-customer">
            <!-- small box -->
            <div class="small-box bg-white">
                <a href="<?php echo base_url('admin/projects'); ?>" class="small-box-footer">
                    <div class="inner-sec">
                        <div class="inner-icon">
                            <img src="<?= base_url() ?>assets/admin/img/project-icon.png">
                        </div>
                        <div class="inner">
                            <h3><?=(isset($total_projects_count))?$total_projects_count:'0'; ?></h3>
                            <p><?= trans('projects');?></p>
                        </div>
                    </div>
                </a>
            </div>
        </div><!-- ./col -->
        
         <div class="col-lg-4 col-md-4 col-sm-6 columnsidebar active-customer">
            <!-- small box -->
            <div class="small-box bg-white">
                <a href="<?php echo base_url('admin/clients'); ?>" class="small-box-footer">
                    <div class="inner-sec">
                        <div class="inner-icon">
                            <img src="<?= base_url() ?>assets/admin/img/contract-icon.png">
                        </div>
                        <div class="inner">
                            <h3><?=(isset($total_client_count))?$total_client_count:'0'; ?></h3>
                           <p><?= trans('clients');?></p>
                        </div>
                    </div>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-4 col-md-4 col-sm-6 columnsidebar finance">
            <!-- small box -->
            <div class="small-box bg-white">
                <a href="<?php echo base_url(); ?>admin/projects" class="small-box-footer">
                    <div class="inner-sec">
                        <div class="inner-icon">
                            <img src="<?= base_url() ?>assets/admin/img/month-icon.png">
                        </div>
                        <div class="inner">
                            <h3>$<?=(isset($total_finance_this_month))?$total_finance_this_month:'0'; ?></h3>
                            <p><?= trans('total_income_of_this_month');?></p>
                        </div>
                    </div>
               </a>
            </div>
        </div><!-- ./col -->
       <div class="col-lg-4 col-md-4 col-sm-6 columnsidebar finance">
            <!-- small box -->
            <div class="small-box bg-white">
                <a href="<?php echo base_url(); ?>admin/projects" class="small-box-footer">
                    <div class="inner-sec">
                        <div class="inner-icon">
                            <img src="<?= base_url() ?>assets/admin/img/year-icon.png">
                        </div>
                        <div class="inner">
                            <h3>$<?=(isset($total_finance_this_year))?$total_finance_this_year:'0'; ?></h3>
                            <p><?= trans('total_income_of_this_year');?></p>
                        </div>
                    </div>
               </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-4 col-md-4 col-sm-6 columnsidebar finance">
            <!-- small box -->
            <div class="small-box bg-white">
                <a href="<?php echo base_url(); ?>admin/projects" class="small-box-footer">
                    <div class="inner-sec">
                        <div class="inner-icon">
                            <img src="<?= base_url() ?>assets/admin/img/now-icon.png">
                        </div>
                        <div class="inner">
                            <h3>$<?=(isset($total_finance))?$total_finance:'0'; ?></h3>
                            <p><?= trans('total_income_till_now');?></p>
                        </div>
                    </div>
               </a>
            </div>
        </div><!-- ./col -->
         <div class="col-lg-4 col-md-4 col-sm-6 columnsidebar finance">
            <!-- small box -->
            <div class="small-box bg-white">
                <a href="<?php echo base_url(); ?>admin/projects" class="small-box-footer">
                    <div class="inner-sec">
                        <div class="inner-icon">
                            <img src="<?= base_url() ?>assets/admin/img/total-money-icon.png">
                        </div>
                        <div class="inner">
                             <h3>$<?=(isset($total_finance_in_debt))?$total_finance_in_debt:'0'; ?></h3>
                             <p><?= trans('total_money_in_debt');?></p>
                        </div>
                    </div>
                </a>
            </div>
        </div><!-- ./col -->
    <?php endif; ?>
    <?php
    if(is_client()):
 ?>
         <div class="col-lg-4 col-md-4 col-sm-6 columnsidebar active-customer">
            <!-- small box -->
            <div class="small-box bg-white">
                <a href="<?php echo base_url('admin/projects'); ?>" class="small-box-footer">
                    <div class="inner-sec">
                        <div class="inner-icon">
                            <img src="<?= base_url() ?>assets/admin/img/project-icon.png">
                        </div>
                        <div class="inner">
                            <h3><?=(isset($total_projects_count))?$total_projects_count:'0'; ?></h3>
                            <p><?= trans('projects');?></p>
                        </div>
                    </div>
                </a>
            </div>
        </div><!-- ./col -->
         <div class="col-lg-4 col-md-4 col-sm-6 columnsidebar active-customer">
            <!-- small box -->
            <div class="small-box bg-white">
                <a href="<?php echo base_url('admin/project/apartments'); ?>" class="small-box-footer">
                    <div class="inner-sec">
                        <div class="inner-icon">
                            <img src="<?= base_url() ?>assets/admin/img/project-icon.png">
                        </div>
                        <div class="inner">
                            <h3><?=(isset($total_apartment_count))?$total_apartment_count:'0'; ?></h3>
                            <p><?= trans('apartments');?></p>
                        </div>
                    </div>
                </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-4 col-md-4 col-sm-6 columnsidebar finance">
            <!-- small box -->
            <div class="small-box bg-white">
                <a href="<?php echo base_url(); ?>admin/projects" class="small-box-footer">
                    <div class="inner-sec">
                        <div class="inner-icon">
                            <img src="<?= base_url() ?>assets/admin/img/month-icon.png">
                        </div>
                        <div class="inner">
                             <h3>$<?=(isset($total_finance_this_month))?$total_finance_this_month:'0'; ?></h3>
                             <p><?= trans('total_money_paid_this_month');?></p>
                        </div>
                    </div>
               </a>
            </div>
        </div><!-- ./col -->
       <div class="col-lg-4 col-md-4 col-sm-6 columnsidebar finance">
            <!-- small box -->
            <div class="small-box bg-white">
                <a href="<?php echo base_url(); ?>admin/projects" class="small-box-footer">
                    <div class="inner-sec">
                        <div class="inner-icon">
                            <img src="<?= base_url() ?>assets/admin/img/year-icon.png">
                        </div>
                        <div class="inner">
                            <h3>$<?=(isset($total_finance_this_year))?$total_finance_this_year:'0'; ?></h3>
                            <p><?= trans('total_money_paid_this_year');?></p>
                        </div>
                    </div>
               </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-4 col-md-4 col-sm-6 columnsidebar finance">
            <!-- small box -->
            <div class="small-box bg-white">
                <a href="<?php echo base_url(); ?>admin/projects" class="small-box-footer">
                    <div class="inner-sec">
                        <div class="inner-icon">
                            <img src="<?= base_url() ?>assets/admin/img/now-icon.png">
                        </div>
                        <div class="inner">
                            <h3>$<?=(isset($total_finance))?$total_finance:'0'; ?></h3>
                            <p><?= trans('total_money_paid_till_now');?></p>
                        </div>
                    </div>
               </a>
            </div>
        </div><!-- ./col -->
        <div class="col-lg-4 col-md-4 col-sm-6 columnsidebar finance">
            <!-- small box -->
            <div class="small-box bg-white">
                <a href="<?php echo base_url(); ?>admin/projects" class="small-box-footer">
                    <div class="inner-sec">
                        <div class="inner-icon">
                            <img src="<?= base_url() ?>assets/admin/img/total-money-icon.png">
                        </div>
                        <div class="inner">
                              <h3>$<?=(isset($total_finance_in_debt) && $total_finance_in_debt != 0 )?$total_finance_in_debt:'0'; ?></h3>
                              <p><?= trans('total_money_in_debt');?></p>
                        </div>
                    </div>
                </a>
            </div>
        </div><!-- ./col -->
         
    <?php endif; ?>
    </div><!-- /.row -->
<style>
    .customer-table {
    display: block;
    overflow-x: auto;
    white-space: nowrap;
}

</style>

<script>
    // $('.agree').change(function(){
    //     var parent = $(this).parent().parent();
    //     if($(this).prop('checked') == true){
    //         var client = parent.find('input[name^="client_id"]').prop("checked", true);
    //     }else{
    //         var client = parent.find('input[name^="client_id"]').prop("checked", false);
    //     }
        
    // });
    
    // $('.delete').click(function(){
        
    //     var agreementID = new Array();
    //     $('input[name^="agreement_id"]:checked').each(function() 
    //     {
    //         agreementID.push($(this).val());
    //     });
        
    //     var clientID = new Array();
    //     $('input[name^="client_id"]:checked').each(function() 
    //     {
    //         clientID.push($(this).val());
    //     });
    //     var url = base_url+'customer/deleteAgreement';
    //   $.ajax({
    //         url: url,
    //         method: 'post',
    //         data: {'clientID':clientID,'agreementID':agreementID},
    //         success: function(data) {
                
    //             location.reload(true);
    //         }
    //     });
    // });
</script>