<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header">
        <div class="left">
            <h3 class="box-title"><?=$title;?></h3>
            <br>
            <small class="pull-left">You can see all <?=$title;?> here</small>
        </div>
            <div class="right">
             <!--<a href="" class="btn btn-sm btn-success btn-add-new">-->
             <!--   <i class="fa fa-bars"></i>-->
             <!--   View Customers</a>-->
            </div>
            
    </div><!-- /.box-header -->

    <!-- include message block -->
   
    <div class="box-body">
      
        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped dataTable" id="cs_datatable" role="grid"
                           aria-describedby="example1_info">
                        <thead>
                        <tr role="row">
                            <th>The customer's name</th>
                            <th>Signed?</th>
                            <th>Agreement</th>
                            <th>Property</th>
                            <th>Production time</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        if(isset($agreements) && count($agreements)>0):
                         foreach ($agreements as $agreement):
                         
                         ?>
                            <tr>
                                <td><input class="agree" type="checkbox" name="agreement_id" value="<?php echo $agreement->id; ?>"/> <input type="checkbox" style="display:none" name="client_id" value="<?php echo $agreement->clientID; ?>"/> <?php echo html_escape($agreement->name); ?></td>
                                <td>
                                    <?php
                                        $signed = $this->db->get_where('customer_signed_agreements', array('agreement_id' => $agreement->id, 'client_id' => $agreement->clientID))->row();
                                    if(empty($signed)):
                                    ?>
                                        <label class="label label-warning">Not signed</label>
                                    <?php else: ?>
                                        <label class="label label-success">signed</label>
                                    <?php endif; ?>
                                </td>
                               
                                <?php if($agreement->type == 'stamp_in'):?>
                                    <td>Buying/renting a real estate property</td>
                                <?php elseif($agreement->type == 'stamp_owner'):?>
                                    <td>Sale and / or rental of real estate</td>
                                <?php elseif($agreement->type == 'exclusive'):?>
                                    <td>exclusivity</td>
                                <?php else:?>
                                    <td>Cooperation agreement between brokers</td>
                                <?php endif; ?>
                                <td>
                                    <?php foreach($property as $pro):
                                        $prop = explode(",", $agreement->property_id);
                                        if(in_array($pro['id'],$prop)):
                                    ?>
                                    <li><?php echo $pro['street']; ?>, <?php echo $pro['city']; ?></li>
                                    <?php endif; endforeach;?>
                                </td>
                                <td>
                                   <?php echo date('Y-m-d', strtotime($agreement->created_at)); ?>
                                </td>
                            </tr>
                        <?php
                        endforeach; else:?>
                        <tr><td colspan="6" style="text-align:center">No result found</td></tr>
                        <?php endif; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div><!-- /.box-body -->
     <div class="box-header">
         <div class="right">
            <a href="javascript:void(0)" class="btn btn-sm btn-primary btn-add-new reconstruct">
            <i class="fa fa-check"></i>
          Reconstruction marked
            </a>
        </div>
    </div>
</div>

<script>
    $('.agree').change(function(){
        var parent = $(this).parent().parent();
        if($(this).prop('checked') == true){
            parent.find('input[name^="client_id"]').prop("checked", true);
        }else{
            parent.find('input[name^="client_id"]').prop("checked", false);
        }
        
    });
    
    $('.reconstruct').click(function(){
        
        var agreement_id = new Array();
        $('input[name^="agreement_id"]:checked').each(function() 
        {
            agreement_id.push($(this).val());
        });
        
        var client_id = new Array();
        $('input[name^="client_id"]:checked').each(function() 
        {
            client_id.push($(this).val());
        });
        var url = base_url+'customer/reconstructAgreement';
      $.ajax({
            url: url,
            method: 'post',
            data: {'client_id':client_id,'agreement_id':agreement_id},
            success: function(data) {
                location.reload(true);
            }
        });
    });
</script>