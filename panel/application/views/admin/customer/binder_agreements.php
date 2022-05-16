<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header">
        <div class="left">
            <h3 class="box-title"><?=$title;?></h3>
            <br>
            <small class="pull-left">You can see all registered <?=$title;?> here</small>
        </div>
            <div class="right">
             <!--<a href="" class="btn btn-sm btn-success btn-add-new">-->
             <!--   <i class="fa fa-bars"></i>-->
             <!--   View Customers</a>-->
            </div>
            
    </div><!-- /.box-header -->

    <!-- include message block -->
    <div class="col-sm-12">
        <?php $this->load->view('admin/includes/_messages_form'); ?>
    </div>
    <div class="container">
            <div class="alert alert-success" style="width:70%; text-align:center; display:none;">
                <strong id="msg"></strong>
            </div>
    </div>
       <div class="row">
           <div class="col-md-12" style="text-align:center">
              <select name="month" id="mon">
                  <?php for($i=1; $i<=12; $i++):?>
                  <option value="<?php echo $i ?>" <?php if($i == $m):?> selected <?php endif;?>><?php echo $i ?></option>
                  <?php endfor;?>
              </select>
               <select name="year" id="yea">
                   <?php $z = date('Y');?>
                  <?php for($x=2020; $x<=$z; $x++):?>
                  <option value="<?php echo $x ?>" <?php if($x == $y):?> selected <?php endif;?>><?php echo $x ?></option>
                  <?php endfor;?>
              </select>:Monthly Agreements
           </div>
           <div class="col-md-12" style="text-align:center;margin-top:10px;">
              <a href="<?php echo base_url() ?>admin/customer/deleted/agreements" style="font-size:15px;">Recycle bin <i class="fa fa-trash"></i></a>
               <a href="<?php echo base_url() ?>admin/customer/agreements" style="margin-left:10px; font-size:15px;">Fresh <i class="fa fa-refresh"></i></a>
           </div>
       </div>
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
                            <th>Viewing</th>
                            <th>Agreement</th>
                            <th>Property</th>
                            <th>Production time</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php
                        if(isset($agreements) && count($agreements)>0):
                         foreach ($agreements as $agreement):
                          $deleted = $this->db->get_where('deleted_agreements', array('agreement_id' => $agreement['id'], 'client_id' => $agreement['client_id']))->row();
                           if(empty($deleted)):
                         ?>
                            <tr>
                                <td><input class="agree" type="checkbox" name="agreement_id" value="<?php echo $agreement['id']; ?>"/> <input type="checkbox" style="display:none" name="client_id" value="<?php echo $agreement['client_id']; ?>"/> <?php echo html_escape($agreement['client_name']); ?></td>
                                <td>
                                    <?php
                                        $signed = $this->db->get_where('customer_signed_agreements', array('agreement_id' => $agreement['id'], 'client_id' => $agreement['client_id']))->row();
                                    if(empty($signed)):
                                    ?>
                                        <label class="label label-warning">Not signed</label>
                                    <?php else: ?>
                                        <label class="label label-success">signed</label>
                                    <?php endif; ?>
                                </td>
                                <td>
                                   <?php
                                       $signed = $this->db->get_where('customer_signed_agreements', array('agreement_id' => $agreement['id'], 'client_id' => $agreement['client_id']))->row();
                                       if(empty($signed)):
                                   ?>
                                        <a data-href="<?php echo $agreement['id'] ?>" data-id="<?php echo $agreement['clientID'] ?>" class="sendReminder" href="javascript:void(0)">Send a reminder to Customer<i class="fa fa-envelope"></i></a>
                                    <?php else: ?>
                                        <a href="<?php echo base_url('admin')?>/customer/view/agreement/<?php echo $agreement['id']?>/<?php echo $agreement['clientID']?>/<?php echo $signed->id?>" target="_blank" style="color:red">View the agreement</a>
                                    <?php endif; ?>
                                </td>
                                <?php if($agreement['type'] == 'stamp_in'):?>
                                    <td>Buying/renting a real estate property</td>
                                <?php elseif($agreement['type'] == 'stamp_owner'):?>
                                    <td>Sale and / or rental of real estate</td>
                                <?php elseif($agreement['type'] == 'exclusive'):?>
                                    <td>exclusivity</td>
                                <?php else:?>
                                    <td>Cooperation agreement between brokers</td>
                                <?php endif; ?>
                                <td>
                                    <?php foreach($property as $pro):
                                        $prop = explode(",", $agreement['property_id']);
                                        if(in_array($pro['id'],$prop)):
                                    ?>
                                    <li><?php echo $pro['street']; ?>, <?php echo $pro['city']; ?></li>
                                    <?php endif; endforeach;?>
                                </td>
                                <td>
                                   <?php echo date('Y-m-d', strtotime($agreement['created_at'])); ?>
                                </td>
                            </tr>
                           <?php else: continue; endif;?>
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
            <a href="javascript:void(0)" class="btn btn-sm btn-danger btn-add-new delete">
            <i class="fa fa-trash"></i>
           Delete Selected
            </a>
        </div>
    </div>
</div>
	<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

<div class="modal-content">
	<div class="modal-header">
		<button type="button" class="close closePreview" aria-label="Close"><span aria-hidden="true">×</span>
		</button>
		<h4 class="modal-title" id="myModalLabel" style="text-align: center;"><span style="color: #162028;background: #ffc1076b;font-size:25px;padding:5px;border-radius: 10px;cursor: pointer;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">  preview </font></font></span></h4>
	</div>
	<div class="modal-body" id="modal-preview" style="background:#efefef">
		<style>
			.st-content-inner{
				padding-bottom:50px;
			}
			
			/*
			@media(min-width:768px){
				.footer_menu {
					right:200px!important;
				}
			}
			*/
			
			
		.preview_btn:hover, .preview_btn:focus {
		    color: #000000;
		    text-decoration: none;
		}
		</style>
		
		<div id="htmlData"></div>
	</div>
	
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
    $(document).ready(function(){
        $(".sendReminder").click(function(){
            var agreement_id = $(this).attr('data-href');
            var client_id    = $(this).attr('data-id');
            if(agreement_id && client_id){
                var url = base_url+'customer/sendReminder';
                $.ajax({
                    url: url,
                    method: 'post',
                    data: {'agreement_id':agreement_id, 'client_id':client_id},
                    success: function(data) {
                        var result = JSON.parse(data);
                        $('.alert-success').css('display','block');
                        $("#msg").text(result.success);
                        setTimeout(
                        function() { $('.alert-success').css('display','none'); },
                        4000
                    );
                    }
                });
            }else{
                console.log('error');
            }
        });
        
    });
    
    $('#mon, #yea').on('change',function(){
        var mon = $('#mon').val();
        var yea = $('#yea').val();
        var url = base_url+'customer/binderAgreements_ajax';
        $.ajax({
            url: url,
            method: 'post',
            data: {'mon':mon, 'yea':yea},
            success: function(data) {
               window.location.href = base_url + "admin/customer/agreements/months/year";
            }
        });
    });
    
    $('.agree').change(function(){
        var parent = $(this).parent().parent();
        if($(this).prop('checked') == true){
            var client = parent.find('input[name^="client_id"]').prop("checked", true);
        }else{
            var client = parent.find('input[name^="client_id"]').prop("checked", false);
        }
        
    });
    
    $('.delete').click(function(){
        
        var agreementID = new Array();
        $('input[name^="agreement_id"]:checked').each(function() 
        {
            agreementID.push($(this).val());
        });
        
        var clientID = new Array();
        $('input[name^="client_id"]:checked').each(function() 
        {
            clientID.push($(this).val());
        });
        var url = base_url+'customer/deleteAgreement';
      $.ajax({
            url: url,
            method: 'post',
            data: {'clientID':clientID,'agreementID':agreementID},
            success: function(data) {
                // console.log(data);
                location.reload(true);
            }
        });
    });
</script>