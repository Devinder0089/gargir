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
               Invoice
            </a>
        </div>
    </div><!-- /.box-header -->
 
    <div class="box-body packgeecdt">
         <div class="row packgeecsecare">
            <?php
            if(isset($invoices)):
               
               var_dump($invoices);
            ?>
                   

           <?php

            endif;
                ?>
             </div>
                                   
        </div>
    </div><!-- /.box-body -->
</div>