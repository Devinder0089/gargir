<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header">
        <div class="left">
            <h3 class="box-title"><?=$title;?></h3>
            <br>
            <small class="pull-left">You can see all registered <?=$title;?> here</small>
        </div>
            <div class="right">
            <a href="<?php echo base_url('admin');?>/customer/client/add" class="btn btn-sm btn-success btn-add-new">
            <i class="fa fa-plus"></i>
            add Client
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
                            <th width="20">Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Agreements</th>
                            <th>Edit</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        if(isset($clients)):
                         foreach ($clients as $client): ?>
                            <tr>
                                <td><input type="checkbox" name="delete_selected" value="<?php echo $client->id; ?>"/> <?php echo html_escape($client->id); ?></td>
                                <td><?php echo html_escape($client->name); ?></td>
                                <td><?php echo html_escape($client->email); ?></td>
                                <td><?php echo html_escape($client->phone); ?></td>
                               <td><a href="<?php echo base_url('admin') ?>/customer/client/agreements/<?php echo $client->id; ?>"><i class="fa fa-file-text-o"></i></a></td>
                               <td><a href="<?php echo base_url('admin') ?>/customer/client/edit/<?php echo $client->id; ?>"><i class="fa fa-pencil"></i></a></td>
                            </tr>

                        <?php endforeach; 
                    endif;
                        ?>

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
<script>
    $('.delete').click(function(){
        var clientID = new Array();
        $('input[name^="delete_selected"]:checked').each(function() 
        {
            clientID.push($(this).val());
        });
        var url = base_url+'customer/deleteClient';
      $.ajax({
            url: url,
            method: 'post',
            data: {'clientID':clientID},
            success: function(data) {
                // console.log(data);
                location.reload(true);
            }
        });
    });
</script>