<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header">
        <div class="left">
            <h3 class="box-title"><?=$title;?></h3>
            <br>
            <small class="pull-left">You can see <?=$title;?> here</small>
        </div>
        <div class="right">
            <a href="<?php echo base_url(); ?>admin/membership" class="btn btn-sm btn-success btn-add-new">
                <i class="fa fa-eye"></i>
               Membership
            </a>
        </div>
    </div><!-- /.box-header -->
 
    <div class="box-body packgeecdt">
         <div class="row packgeecsecare">
            <?php
            if(isset($membership)):
            ?>
                    <a class="col-xs-12 col-lg-12 servicebt" href="#">
                     <div class="col-xs-12 col-lg-12 servicefeaturesicon">
                       <i class="fa fa-suitcase"></i>
                    </div>

                    <h4 class="col-xs-12 col-lg-12 title">$<?=$membership->price;?></h4>

                    <ul class="secservicepackg">
                        <?php
                        $membership_service=get_membership_service_by_allid($membership->membership_service);
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
                    </a>
                <?php 

            endif;
                ?>
             </div>
                                   
        </div>
    </div><!-- /.box-body -->
</div>