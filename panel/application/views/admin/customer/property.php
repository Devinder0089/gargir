<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header">
        <div class="left">
            <h3 class="box-title"><?=$title;?></h3>
            <br>
            <small class="pull-left">You can see all registered <?=$title;?> here</small>
        </div>
            <div class="right">
            <a href="<?php echo base_url('admin');?>/customer/property/add" class="btn btn-sm btn-success btn-add-new">
            <i class="fa fa-plus"></i>
            add Property
            </a>
            </div>
    </div><!-- /.box-header -->

    <!-- include message block -->
    <div class="col-sm-12">
        <?php $this->load->view('admin/includes/_messages_form'); ?>
    </div>

    <div class="box-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped dataTable" id="cs_datatable" role="grid"
                           aria-describedby="example1_info">
                        <thead>
                        <tr role="row">
                            <th>Street</th>
                            <th>House No.</th>
                            <th>City</th>
                            <th>Floor</th>
                            <th>Apartment No.</th>
                            <th>More Details</th>
                            <th>Property Type</th>
                            <th>Name of owner</th>
                            <th>Asking Rental Price</th>
                            <th>Asking Sale Price</th>
                            <th>Property Agreements</th>
                            <th>Edit</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        if(isset($property) && count($property)>0):
                         foreach ($property as $pro): ?>
                            <tr>
                                <td><input type="checkbox" name="delete_selected" value="<?php echo html_escape($pro->id); ?>"/> <?php echo html_escape($pro->street); ?></td>
                                <td><?php echo html_escape($pro->buil_number); ?></td>
                                <td><?php echo html_escape($pro->city); ?></td>
                                <td><?php echo html_escape($pro->floor); ?></td>
                                <td><?php echo html_escape($pro->apart_number); ?></td>
                                 <td><?php echo html_escape($pro->details); ?></td>
                                <td><?php echo html_escape($pro->prop_type); ?></td>
                                <td><?php echo html_escape($pro->name_of_prop_owner); ?></td>
                                <td><?php echo html_escape($pro->rental_price); ?></td>
                                <td><?php echo html_escape($pro->ask_sale_price); ?></td>
                                <td><a href="<?php echo base_url('admin')?>/customer/property/agreements/<?php echo $pro->id ?>"><i class="fa fa-file-text-o"></i></a></td>
                                <td><a href="<?php echo base_url('admin')?>/customer/property/edit/<?php echo $pro->id ?>"><i class="fa fa-pencil"></i></a></td>
                            </tr>

                           <?php endforeach; else:?>
                                <tr><td style="text-align:center" colspan="12">No data found</td></tr>
                            <?php endif;?>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!-- /.box-body -->
     <div class="box-header">
         <div class="right">
            <a href="javascript:void(0)" class="btn btn-sm btn-danger btn-add-new delete">
            <i class="fa fa-trash"></i>
           Delete Selected
            </a>
        </div>
    </div>
</div>
<style>
    table {
    display: block;
    overflow-x: auto;
    white-space: nowrap;
}
</style>

<script>
    $('.delete').click(function(){
        var propertyID = new Array();
        $('input[name^="delete_selected"]:checked').each(function() 
        {
            propertyID.push($(this).val());
        });
        var url = base_url+'customer/deleteProperty';
      $.ajax({
            url: url,
            method: 'post',
            data: {'propertyID':propertyID},
            success: function(data) {
                // console.log(data);
                location.reload(true);
            }
        });
    });
</script>