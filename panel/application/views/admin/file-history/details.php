<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header">
        <div class="left">
            <h3 class="box-title"><?=$title;?></h3>
            <br>
            <small class="pull-left">You can see <?=$title;?> here</small>
        </div>
        <div class="right">
            <a href="<?php echo base_url(); ?>admin/finance" class="btn btn-sm btn-success btn-add-new">
                <i class="fa fa-eye"></i>
               Finance
            </a>
        </div>
    </div><!-- /.box-header -->
 
    <div class="box-body packgeecdt">
         <div class="row packgeecsecare">
            <?php
            if(isset($finance)):
                $membr=get_membership_row_by_id($finance->membership_id);
                if(!empty($membr)):
            ?>
                    <a class="col-xs-12 col-lg-12 servicebt" href="#">
                     <div class="col-xs-12 col-lg-12 servicefeaturesicon">
                        <h2 class="col-xs-12 col-lg-12 title">
                        <?=$membr->name;?>
                       <i class="fa fa-suitcase"></i>
                       </h2>
                    </div>

                    <h3 class="col-xs-12 col-lg-12 type title"><?=$membr->type;?></h3>
                    <h4 class="col-xs-12 col-lg-12 mmbrprice title">$<?=$membr->price;?></h4>
                    <ul class="secservicepackg">
                    <li>
                    <p>create | edit | view invoice<i class="green fa fa-check"></i></p>
                    </li>
                    <li>
                    <p>invoce run number decided by client<i class="green fa fa-check"></i></p>
                    </li>
                    <li>
                    <p>receipts<i class="green fa fa-check"></i></p>
                    </li>
                    <li>
                    <p>full invoce generation process<i class="green fa fa-check"></i></p>
                    </li>
                    <li>
                    <p>unlimited documents<i class="green fa fa-check"></i></p>
                    </li>
                    </ul>


                    <ul class="secservicepackg">
                        <?php
                        $membership_service=get_membership_service_by_allid($membr->membership_service);
                        if($membership_service):
                        foreach($membership_service as $vl): 
                        ?>
                        <li>
                        <p><?=$vl->name;?><i class="green fa fa-check"></i></p>
                        </li>
                        <?php
                        endforeach;
                        endif;
                        ?>
                    </ul>
                    
                    <div class="secservicepaccontent">
                    <?=$membr->content;?>
                    </div>

                    </a>
                <?php 
            endif;

            endif;
                ?>
             </div>
                                   
        </div>
    </div><!-- /.box-body -->
</div>