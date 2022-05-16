<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="sub-full-page">
    <div class="agree-sec">
    	<div class="container">
    		<div class="row">
    			<div class="agree-sec-pro col-md-10">
    				
    				<?php if(isset($agreement_id) && isset($exclusiveAgeementID)):?>
    		            <h4>The agreement were successfully produced <i class="fa fa-check"></i></h4>
        				<p>you can sign the agreement at the meeting. or send to the customer at any time</p>
        				<a class="btn-customers sendReminder" href="javascript:void(0)" data-id="<?php echo $agreement_id ?>" data-href="<?php echo $exclusiveAgeementID ?>">send to customers to sign in SMS + EMAIL <i class="fa fa-envelope"></i></a>
    				<?php elseif(isset($agreement_id)):?>
    		            <h4>The agreement were successfully produced <i class="fa fa-check"></i></h4>
        				<p>you can sign the agreement at the meeting. or send to the customer at any time</p>
        				<a class="btn-customers sendReminder" href="javascript:void(0)" data-id="<?php echo $agreement_id ?>" data-href="0">send to customers to sign in SMS + EMAIL <i class="fa fa-envelope"></i></a>
    				<?php else:?>
    				<h4>The agreement successfully send to customers <i class="fa fa-check"></i></h4>
    				<?php endif; ?>
        				<a class="btn-cr-agree" href="<?php echo base_url()?>admin/stamp_in">Creating another agreement</a>
        				<a href="<?php echo base_url()?>admin" class="btn-back">Back to my head <i class="fa fa-home"></i></a>
    			</div>
    		</div>
    	</div>
    </div>
   
    <div class="new-modals">
    	<div class="container">
    		<div class="row">
    			<div class="roees col-md-10">
    				<h6>roee ben shushan</h6>
    				<p>:Brokerage License No</p>
    				<p>Phone: 0523299587</p>
    			</div>
    			<div class="orderings col-md-10">
    				<h4>Ordering real estate services for buying / renting real estate</h4>
    			</div>
    			</div>
    		</div>
    	</div>
    
    <div class="buttons-more">
    	<div class="container">
    		<div class="rows">
    			<div class="more-options col-md-10">
    				<h5>:More options</h5>
    				<div class="buttons-more-btn">
    					<button type="button" class="btn-cr-whats">Submit for signature on WhatsApp(sharing on WhatsApp) <i class="fa fa-whatsapp"></i> <i class="fa fa-share-alt"></i></button>
    				</div>
    				<div class="buttons-more-btn">
    					<button type="button" class="btn-cr-whats">Send for signature on WhatsApp (send to customer page) <i class="fa fa-whatsapp"></i> <i class="fa fa-user"></i></button>
    				</div>
    				<div class="buttons-more-btn">
    					<button type="button" class="btn-cr-red">Beyond signing this device (customerwith you) <i class="fa fa-pencil-alt"></i></button>
    				</div>
    				<div class="buttons-more-btn">
    					<button type="button" class="btn-cr-agree">Copy link <i class="fa fa-copy"></i></button>
    					<input type="text" name="fname" placeholder="text">
    				</div>
    				<div class="buttons-more-btn">
    					<button type="button" class="btn-cre">Print the document,for plain stamping on paper <i class="fa fa-copy"></i></button>
    				</div>	
    			</div>
    		</div>
    	</div>
    </div>
</div>
<script>
    $('.sendReminder').click(function(){
        var agreement_id = $(this).attr('data-id');
        var exclusive_agreement_id = $(this).attr('data-href');
        $.ajax({
                url: base_url + 'customer/reminderSend',
                method: 'post',
                data: {'agreement_id':agreement_id,'exclusive_agreement_id':exclusive_agreement_id},
                success: function(data) {
                    // console.log(data);
                    window.location.href = base_url + "admin/customer/agreement/success";
                }
               
            });
    });
</script>