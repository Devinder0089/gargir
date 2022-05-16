<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="selection-box">
		<ul class="nav justify-content-center">
		  <li class="nav-item">
		    <a class="nav-link <?php if($title =="stamping is interested"):?> active <?php endif;?>" aria-current="page" href="<?php echo base_url('admin/stamp_in'); ?>">Stamping is interested</a>
		  </li>
		  <li class="nav-item">
		    <a class="nav-link <?php if($title =="stamping property owner"):?> active <?php endif;?>" href="<?php echo base_url('admin/stamp_owner'); ?>">Stamping a property owner</a>
		  </li>
		  <li class="nav-item">
		     <a class="nav-link <?php if($title =="Collaborators"):?> active <?php endif;?>" href="<?php echo base_url('admin/collaborators'); ?>">Co</a>
		  </li>
		</ul>
	</div><!-- selection-box ends here -->

	<div class="main">
		<div class="container">
		    <div class="radio-panel main-first col-md-10 commission_typeError" style="text-align:right">
					<div class="radio-heading">
						<h4><u>Type of cooperation and distribution of commission:</u></h4>
					</div>
					<div class="radio-inputs">
						<div class="form-check">
						  <input class="form-check-input position-static sharedPot" type="radio" name="commission_type" id="blankRadio1" value="shared_pot" aria-label="...">
						  <label class="form-check-label" for="exampleRadios1">shared pot</label>
						</div>
						<div class="radio-inner-con sharedPots" style="display: none;">
							<p>Add together the seller's commission, and the buyer's commission, and each broker gets half</p>
						</div>
					</div>
					<div class="radio-inputs">
						<div class="form-check">
						  <input class="form-check-input position-static ownClient" type="radio" name="commission_type" id="blankRadio1" value="own_client" aria-label="...">
						  <label class="form-check-label" for="exampleRadios1">Each from his own client </label>
						</div>
						<div class="radio-inner-con ownClients" style="display:none">
							<p>Each broker charges his client, what he agreed with his client </p>
						</div>
					</div>
					<div class="radio-inputs">
						<div class="form-check">
						  <input class="form-check-input position-static buyertoSeller" type="radio" name="commission_type" id="blankRadio1" value="buyer_to_seller" aria-label="...">
						  <label class="form-check-label" for="exampleRadios1">The buyer broker transfers to the seller broker</label>
						</div>
						<div class="radio-inner-con buyertoSellers" style="display: none;">
							<div id="shatap_seller_to_buyer_details" style="display: block;">

							<input onblur="rollback_if_empty(this)" autocomplete="off" data-rollback="1" onfocus="this.value=&quot;&quot;" style="width: 120px;display: inline-block;" required="" class="clean-input form-control autosave inliner" type="text" placeholder="A commission" id="shatap_seller_to_buyer_fee" name="buyer_to_seller" value="1">
							
							<select class="clean-input form-control autosave inliner" name="buyer_to_seller_type" id="shatap_seller_to_buyer_fee_type" style="display:inline;width:initial;box-shadow:initial;border:none;border-bottom: 1px solid #000 !important; border-radius: inherit;-webkit-appearance: ;appearance: ;cursor:pointer;">
							  <option value="percent"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Percent (%)</font></font></option>
							  <option value="₪">₪</option>
							  <option value="months_of_rent"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Months of rent</font></font></option>
							</select>		
							
							</div>
						</div>
					</div>
					<div class="radio-inputs">
						<div class="form-check">
						  <input class="form-check-input position-static anotherSummary" type="radio" name="commission_type" id="blankRadio1" value="another_summary" aria-label="...">
						  <label class="form-check-label" for="exampleRadios1">Another summary</label>
						</div>
						<div class="radio-inner-con anotherSummarys another_summError" style="display: none;">
							<textarea name="another_summ" placeholder="The agreed cooperation should be specified" onclick="$('#shatap_other').click();" style="border: 1px solid rgb(152, 152, 152); display: block;" id="shatap_extra_notes" class="form-control" rows="2"></textarea>
						</div>
					</div>
					
				</div>
			<div class="main-first col-md-10">
			<div class="row">
					<div class="youtube-head col-md-6">
					</div>
					<div class="transcation-head col-md-6">
						<h6>1. Type of transaction + brokerage fee:</h6>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="checkbox" name="rent" id="inlineCheckbox1" value="1" checked>
						  <label class="form-check-label box1" for="inlineCheckbox1">Rent</label>
						  
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="checkbox" name="buy" id="inlineCheckbox2" value="1" checked>
						  <label class="form-check-label" for="inlineCheckbox2">Buy</label>
						 
						</div>
					</div>
				</div>
			</div><!-- main-first ends here -->


			<div class="main-sec col-md-10">
				<div class="row">
					<div class="trans-head col-md-6">
						<button type="button" id="newClient" class="btn btn-primary">?New broker</button>
					</div>
					<div class="button-head col-md-6">
						<h6>2. Selection of interested parties for stamping:</h6>
					</div>
					<div class="select-full-box col-md-12">
					    <div class="clientError">
						 <select class="add_on_client chosen-select1" id="search-select" name="client_id[]" multiple="multiple">
						    <option value="">Select client...</option>
						    <?php
						        foreach($clients as $client):?>
						        <option value="<?php echo $client->id ?>"><?php echo $client->name ?></option>
						    <?php endforeach; ?>
						  </select>
						  </div>
					</div>
				</div>
			</div><!-- main-second ends here -->


			<div class="main-inner-con col-md-10" id="newClients" style="display:none">
				<div class="row">
					<div class="inner-head col-md-12">
						<h5>Quick customer addition</h5>
						<p>Tip for quick stamping : It is enough to fill in only a mobile number, or only an email (of course it is recommended to fill in both).</p>
						<p>Tip 2 for quick stamping : You do not have to fill in your ID number (If not filled in, the customer will be asked to fill in himself, at the time of signing).</p>
					</div>
					<form method="post" id="add_client" action="<?php echo base_url('customer/addClient_post');?>">
					<div class="inner-form col-md-6">
						<div class="inner-input form">
							<label for="test"><i class="red">*</i> Full name</label>
							<input type="text" name="name" required>
						</div>
						<div class="inner-input form">
							<label for="test"><i class="red">*</i> email</label>
							<input type="email" name="email" required>
						</div>
					</div>
					<div class="inner-form col-md-6">
						<div class="inner-input form">
							<label for="test">cellular</label>
							<input type="text" name="phone">
						</div>
						<div class="inner-input form">
							<label for="test">ID number (optional)</label>
							<input type="text" name="id_no">
						</div>
					</div>
					<div class="inner-form col-md-6">
						<div class="inner-button">
							<button type="submit" class="btn-keeping">Keeping</button>
						</div>
					</div>
					<div class="inner-form col-md-6">
						<div class="inner-button">
							<button type="button" id="cancleClient" class="btn-cancel">Cancelation</button>
						</div>
					</div>
			    </form>
				</div><!-- row -->
			</div><!-- main inner ends here -->



			<div class="main-third col-md-10">
				<div class="row">
					<div class="trans-head col-md-6">
						<button type="button" id="newProperty" class="btn btn-primary">?New Property</button>
					</div>
					<div class="button-head col-md-6">
						<h6>Proposed Properties:</h6>
					</div>
					<div class="select-full-box col-md-12">
					     <div class="propertyError">
					    <select id="search-sel" multiple class="chosen-select js-example-disabled-results add_on_property" name="property_id[]">
						  <option value="">Select Property</option>
						<?php
						foreach($property as $property):
						?>
						<option class="numbers" value="<?php echo $property->id ?>"><?php echo $property->street?>, <?php echo $property->city ?></option>
						<?php endforeach;?>
						</select>
						</div>
					</div>
				</div>
			</div><!-- main-third ends here -->
        	<div class="main-third col-md-10">
        	    <div class="row">
        	    	<div class="asking-md col-md-4 asking-sale-price">
						<h6>Asking price (₪)</h6>
						<div class="after-add-sale-price"></div>
					</div>
					<div class="asking-md col-md-4 asking-rent-price">
						<h6>Requested rent (NIS)</h6>
						<div class="after-add-rent-price"></div>
					</div>
					<div class="asking-md col-md-4 property-address">
						<h6>Property address</h6>
						<div class="after-add-address"></div>
					</div>
					
				</div>
				 
    	    </div>
    	    <div class="after-add-more"></div>
    	    
			<div class="main-inner-con col-md-10" id="newPropertys" style="display:none">
				<div class="row">
					<div class="inner-head col-md-12">
						<h5>Quick Property addition</h5>
					</div>
					<form method="post" id="add_property" action="<?php echo base_url('customer/addProperty_post');?>">
    					<div class="inner-ful-form">
    					    <div class="inner-form col-md-4">
    					        <div class="in-form">
    					            <label for="test"><i class="red">*</i> Street</label>
    					        </div>
    					    </div>
    					    <div class="inner-form col-md-8">
    					        <div class="in-form">
        							<input type="text" name="street" required>
    						    </div>
    					    </div>
    					    <div class="inner-form col-md-4">
    					        <div class="in-form">
    				        	    <label for="test"><i class="red">*</i> Building</label>
				        	    </div>
    					    </div>
    					    <div class="inner-form col-md-8">
    					        <div class="in-form">
    							    <input type="text" name="buil_number" required>
    						    </div>
    					    </div>
    					    <div class="inner-form col-md-4">
    					        <div class="in-form">
    				        	    <label for="test">Apartment number</label>
    				        	</div>
    					    </div>
    					    <div class="inner-form col-md-8">
    					        <div class="in-form">
    							    <input type="text" name="apart_number">
    						    </div>
    					    </div>
    					    <div class="inner-form col-md-4">
    					        <div class="in-form">
    					            <label for="test"><i class="red">*</i> City</label>
    					       </div>
    					    </div>
    					    <div class="inner-form col-md-8">
    					        <div class="in-form">
    							    <input type="text" name="city" required>
    						    </div>
    					    </div>
    					    <div class="inner-form col-md-4">
    					        <div class="in-form">
    					            <label for="test">Name of property owner</label>
				                </div>
    					    </div>
    					    <div class="inner-form col-md-8">
    					        <div class="in-form">
    							    <input type="text" name="name_of_prop_owner">
    						    </div>
    					    </div>
    					   <div class="inner-form col-md-4">
    					        <div class="in-form">
    					            <label for="test">Type of property</label>
				                </div>
    					    </div>
    					    <div class="inner-form col-md-8">
    					        <div class="in-form">
    							    <input type="text" name="prop_type">
    						    </div>
    					    </div>
    						  <div class="inner-form col-md-4">
    					        <div class="in-form">
    					            <label for="test"><i class="red">*</i> Asking rental price</label>
				                </div>
    					    </div>
    					    <div class="inner-form col-md-8">
    					        <div class="in-form">
    							    <input type="text" name="rental_price">
    						    </div>
    					    </div>
    						<div class="inner-form col-md-4">
    					        <div class="in-form">
    					            <label for="test"><i class="red">*</i> Asking sale price</label>
				                </div>
    					    </div>
    					    <div class="inner-form col-md-8">
    					        <div class="in-form">
    							    <input type="text" name="ask_sale_price">
    						    </div>
    					    </div>
    					</div>
    					<div class="inner-form col-md-6">
    						<div class="inner-button">
    							<button type="submit" class="btn-keeping">Keeping</button>
    						</div>
    					</div>
				
    					<div class="inner-form col-md-6">
    						<div class="inner-button">
    							<button type="button" id="cancleProperty" class="btn-cancel">Cancelation</button>
    						</div>
    					</div>
					</form>
				</div>
			</div><!-- main-inner-con ends here -->

			<div class="comment main-first col-md-10">
				<div class="row">
					<div class="comment-box col-md-12">
						<h6>comments(optional)</h6>
						<textarea id="w3review" name="comments" rows="4" cols="109" placeholder="Comments and additions to the agreement can be added here, and they will be added at the bottom of the agreement"></textarea>
					</div>
					<div class="form-check col-md-4">
						  <input class="form-check-input" type="radio" name="agree_pro" value="0" id="flexRadioDefault2">
						  <label class="form-check-label" for="flexRadioDefault2">
						    Production without sending
						  </label>
						</div>
						<div class="form-check col-md-4">
						  <input class="form-check-input" type="radio" name="agree_pro" value="1" id="flexRadioDefault2" checked>
						  <label class="form-check-label" for="flexRadioDefault2">
						    Send for signature by SMS and email
						  </label>
						</div>
						<div class="inner-form col-md-6">
							<div class="inner-button">
								<button type="submit" id="agreementConfirm" class="btn-product">Production of an agreement  <i class="fa fa-check"></i></button>
							</div>
						</div>
						<div class="inner-form col-md-6">
							<div class="inner-button">
								<button type="button" id="display" class="btn-display">display  <i class="fa fa-eye"></i></button>
							</div>
						</div>
				</div><!-- row -->
			</div><!-- comment ends here -->
		</div><!-- container-->
	</div><!-- main ends here -->
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
		<div class="footer_menu" style="position: fixed;bottom: 0;left: 0;right: 0;z-index: 2;margin: 0;padding:10px 20px 10px 20px ;background: white;border-top:1px solid #c3c3c3;box-shadow: 0px 0px 10px 0px #00000038;">
			<button style="float:right;opacity: 0.8" class="btn btn-basic btn-lg closePreview"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Close Preview </font></font>
			</button>
			<button style="float:left" class="btn btn-success btn-lg agreementButton"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Send!</font></font>
			</button>
		</div>
		<div id="htmlData"></div>
	</div>
</div>

    </div>
</div>

<!-- Modal -->
<div class="modal fade modalss" id="confirmModal" role="dialog">
    <div class="modal-dialog modal-md">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
            <div class="col-md-12">
                <h4 id="titles"></h4>
        		    
    		</div>
    		
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-success agreementButton">Yes</button>
          <button type="button" id="" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
</div>
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<style>
    .highlight{
        border:1px solid red;
    }
    .highlightInput{
         outline: 1px solid red;
    }
    
    .modalss {
      text-align: center;
      padding: 0!important;
    }
    .modalss:before {
      content: '';
      display: inline-block;
      height: 100%;
      vertical-align: middle;
      margin-right: -4px;
    }
    .modal-md {
      display: inline-block;
      text-align: left;
      vertical-align: middle;
    }
</style>
<script>
   $('#newClients').css('display','none');
   $('#newPropertys').css('display','none');
   $(document).ready(function () {
       var num = 0;
      $('.sharedPot').on('click', function(){
         if($(this).is(":checked")){   
            $(".sharedPots").show();
            $(".buyertoSellers").hide();
             $(".anotherSummarys").hide();
             $(".ownClients").hide();
        }
      });
      
      $('.buyertoSeller').on('click', function(){
         if($(this).is(":checked")){   
            $(".buyertoSellers").show();
             $(".sharedPots").hide();
             $(".anotherSummarys").hide();
             $(".ownClients").hide();
        }
      });
      
      $('.anotherSummary').on('click', function(){
         if($(this).is(":checked")){   
            $(".anotherSummarys").show();
             $(".buyertoSellers").hide();
             $(".sharedPots").hide();
             $(".ownClients").hide();
        }
      });
      
      $('.ownClient').on('click', function(){
         if($(this).is(":checked")){   
            $(".ownClients").show();
             $(".anotherSummarys").hide();
             $(".buyertoSellers").hide();
             $(".sharedPots").hide();
        }
      });
      
      $("#newClient").on('click', function(){
           $('#newClients').css('display','block');
      });
      
      $("#newProperty").on('click', function(){
           $('#newPropertys').css('display','block');
      });
      
      $("#cancleClient").on('click', function(){
           $('#newClients').css('display','none');
      });
      
      $("#cancleProperty").on('click', function(){
           $('#newPropertys').css('display','none');
      });
      
  
   }); 
   $('#add_client').on('submit', function() {
        event.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: 'post',
            data: $('#add_client').serialize(),
            success: function(data) {
                var result = JSON.parse(data);
                $('.add_on_client').append("<option value="+result[0].id+" selected>"+result[0].name+"</option>").trigger("chosen:updated");
                 $('#add_client')[0].reset();
                $('#newClients').css('display','none');
            }
           
        });
    });
    
    $('#add_property').on('submit', function() {
        event.preventDefault();
        $.ajax({
            url: $(this).attr('action'),
            method: 'post',
            data: $('#add_property').serialize(),
            success: function(data) {
                var result = JSON.parse(data);
                $('.add_on_property').append("<option value="+result[0].id+" selected>"+result[0].street , result[0].city+"</option>").trigger("chosen:updated");
                $('.add_on_property').trigger('change');
                $('#add_property')[0].reset();
                $('#newPropertys').css('display','none');
            }
           
        });
    });
    
     $(".add_on_property").on('change',function(){
              var options = [];
                $.each($(".chosen-select option:selected"), function(){            
                options.push($(this).val());
            });
            if(options){
                $.ajax({
                    url: 'https://zeroitsolutions.com/nandlanpro/panel/customer/getProperty',
                    method: 'post',
                    data: {'options': options},
                    success: function(data) {
                         $("input[name='asking_price[]']").remove();
                          $("input[name='requested_rent[]']").remove();
                           $(".prop_add").remove();
                           $("input[name='prop_address[]']").remove();
                           $("input[name='prop_type[]']").remove();
                        var result = JSON.parse(data);
                        num=0;
                       if($('#inlineCheckbox1').is(":checked") && $('#inlineCheckbox2').is(":checked")){
                            $.each(result, function() {
                                $(".asking-sale-price").css('display','block');
                                $(".asking-rent-price").css('display','block');
                                 html1 = '<input type="text" class="saleError" name="asking_price[]" style="margin-left:150px; margin-top:20px;" value="'+result[num][0].ask_sale_price+'">';
                                 html2 = '<input type="text" class="rentalError" name="requested_rent[]" style="margin-left:150px; margin-top:20px;" value="'+result[num][0].rental_price+'">';
                                 html3 = '<p class="prop_add" style="text-align:right; margin-top:20px;">'+result[num][0].street+', '+result[num][0].city+'</p><div style="display:none"><input name="prop_address[]" value="'+result[num][0].street+', '+result[num][0].city+'"/><input name="prop_type[]" value="'+result[num][0].prop_type+'"/></div>';
                                  $(".after-add-sale-price").before(html1);
                                  $(".after-add-rent-price").before(html2);
                                  $(".after-add-address").before(html3);
                                  num++;
                        }); 
                        }else if($('#inlineCheckbox1').is(":checked")){
                                $(".asking-sale-price").css('display','none');
                                $(".asking-rent-price").css('display','block');
                                $.each(result, function() {
                                 html1 = '<input type="text" class="saleError" style="margin-left:150px; margin-top:20px;" name="asking_price[]" value="'+result[num][0].ask_sale_price+'">';
                                 html2 = '<input type="text" class="rentalError" style="margin-left:150px; margin-top:20px;" name="requested_rent[]" value="'+result[num][0].rental_price+'">';
                                 html3 = '<p class="prop_add" style="text-align:right; margin-top:20px;">'+result[num][0].street+', '+result[num][0].city+'</p><div style="display:none"><input name="prop_address[]" value="'+result[num][0].street+', '+result[num][0].city+'"/><input name="prop_type[]" value="'+result[num][0].prop_type+'"/></div>';
                                  $(".after-add-sale-price").before(html1);
                                  $(".after-add-rent-price").before(html2);
                                  $(".after-add-address").before(html3);
                                  num++;
                            });
                        }else{
                            $(".asking-sale-price").css('display','block');
                            $(".asking-rent-price").css('display','none');
                                $.each(result, function() {
                                 html1 = '<input type="text" class="saleError" style="margin-left:150px; margin-top:20px;" name="asking_price[]" value="'+result[num][0].ask_sale_price+'">';
                                 html2 = '<input type="text" class="rentalError" style="margin-left:150px; margin-top:20px;" name="requested_rent[]" value="'+result[num][0].rental_price+'">';
                                 html3 = '<p class="prop_add" style="text-align:right; margin-top:20px;">'+result[num][0].street+', '+result[num][0].city+'</p><div style="display:none"><input name="prop_address[]" value="'+result[num][0].street+', '+result[num][0].city+'"/><input name="prop_type[]" value="'+result[num][0].prop_type+'"/></div>';
                                  $(".after-add-sale-price").before(html1);
                                  $(".after-add-rent-price").before(html2);
                                  $(".after-add-address").before(html3);
                                  num++;
                            });
                        }
                         
                    },
                    error : function(data) {
                        console.log('error');
                    }
                   
                });
            }else{
                console.log('kk');
            }
        });
    
    $(".chosen-select").chosen({
      no_results_text: "Oops, nothing found!"
    });
   
    $(".chosen-select1").chosen({
      no_results_text: "Oops, nothing found!"
    });
    
   $('#inlineCheckbox1').click(function(){
       if($('#inlineCheckbox1').is(":checked")){
            $(".asking-rent-price").css('display','block');
       }else{
            $(".asking-rent-price").css('display','none');
       }
   });
   
   $('#inlineCheckbox2').click(function(){
       if($('#inlineCheckbox2').is(":checked")){
            $(".asking-sale-price").css('display','block');
       }else{
            $(".asking-sale-price").css('display','none');
       }
   });
   
   $('#agreementConfirm').click(function(){
         var requested_rent= new Array();
            $('input[name^="requested_rent"]').each(function() 
                {
                requested_rent.push($(this).val());
                });
        var asking_price = new Array();
            $('input[name^="asking_price"]').each(function() 
                {
            asking_price.push($(this).val());
            });
            var client_id   = $("select[name='client_id[]']").val();
            var property_id   = $("select[name='property_id[]']").val();
            var agree_pro =$("[name=agree_pro]:checked").val();
            var commission_type = $("[name=commission_type]:checked").val();
            var another_summ = $("textarea[name='another_summ']").val();
        if(commission_type == null) {
         $('.commission_typeError').addClass('highlight');
             $('html,body').animate({
                    scrollTop: $('.commission_typeError').position().top
                }, 1000);
            setTimeout(
                function() { $('.commission_typeError').removeClass('highlight'); },
                4000
            );
         }
          else if(commission_type == 'another_summary' && another_summ == "") {
             $('.another_summError').addClass('highlight');
                 $('html,body').animate({
                        scrollTop: $('.another_summError').position().top
                    }, 1000);
                setTimeout(
                    function() { $('.another_summError').removeClass('highlight'); },
                    4000
                );
         }
        else if($("#inlineCheckbox1").prop('checked') == false && $("#inlineCheckbox2").prop('checked') == false){
                $('.main-first').addClass('highlight');
              $('html, body').animate({ scrollTop: 0 }, 1000);
                setTimeout(
                    function() { $('.main-first').removeClass('highlight'); },
                    4000
                );
        }
        else if(client_id == null) {
             $('.clientError').addClass('highlight');
                 $('html,body').animate({
                        scrollTop: $('.clientError').position().top
                    }, 1000);
                setTimeout(
                    function() { $('.clientError').removeClass('highlight'); },
                    4000
                );
         }
         else if(property_id == null){
              $('.propertyError').addClass('highlight');
                setTimeout(
                    function() { $('.propertyError').removeClass('highlight'); },
                    4000
                );
        }
        else if($('#inlineCheckbox1').is(":checked") && requested_rent == 0 || $('#inlineCheckbox1').is(":checked") && requested_rent == ""){
             $('.rentalError').addClass('highlight');
                setTimeout(
                    function() { $('.rentalError').removeClass('highlight'); },
                    4000
                );
         }else if($('#inlineCheckbox2').is(":checked") && asking_price == 0 || $('#inlineCheckbox2').is(":checked") && asking_price == ""){
              $('.saleError').addClass('highlight');
                setTimeout(
                    function() { $('.saleError').removeClass('highlight'); },
                    4000
                );
         }else{
                 if(agree_pro == 0){
                     $('#titles').text('Do you approve the production of the agreement? (Without sending to customers)');
                 }else{
                     $('#titles').text('Do you approve the production of the agreement? (sending it to customers)');
                 }
                 
                 $("#confirmModal").modal('show');
             }
        
    });
   
       $('.agreementButton').on('click', function() {
            if($('#inlineCheckbox1').is(":checked")){
                    var rent = 1;
              }
              else{
                  var rent = 0;
              }
              if($('#inlineCheckbox2').is(":checked")){
                  var buy = 1;
              }else{
                  var buy = 0;
              }
            var requested_rent= new Array();
                $('input[name^="requested_rent"]').each(function() 
                    {
                    requested_rent.push($(this).val());
                    });
            var asking_price = new Array();
                $('input[name^="asking_price"]').each(function() 
                    {
                asking_price.push($(this).val());
                });
                var commission_type = $("[name=commission_type]:checked").val();
                var buyer_to_seller_type   = $("select[name='buyer_to_seller_type']").val();
                var buyer_to_seller   = $("input[name='buyer_to_seller']").val();
                var another_summ = $("textarea[name='another_summ']").val();
                var client_id   = $("select[name='client_id[]']").val();
                var property_id   = $("select[name='property_id[]']").val();
                var comments = $("input[name='comments']").val();
                var agree_pro =$("[name=agree_pro]:checked").val();
                var type = 'collaborator';
                var percent = "";
                var months_of_rent = "";
                if(commission_type == 'buyer_to_seller'){
                    if(buyer_to_seller_type == 'percent'){
                        var percent = buyer_to_seller;
                    }else{
                        var months_of_rent = buyer_to_seller;
                    }
                    
                }
            $.ajax({
                url: 'https://zeroitsolutions.com/nandlanpro/panel/customer/agreement',
                method: 'post',
                data: {'type':type,'commission_type':commission_type,'another_summ':another_summ,'rent':rent,'months_of_rent':months_of_rent,'buy':buy,'percent':percent,'client_id':client_id,'property_id':property_id,'asking_price':asking_price,'requested_rent':requested_rent,'comments':comments,'agree_pro':agree_pro},
                success: function(data) {
                  window.location.href = base_url + "admin/customer/agreement/success";
                }
               
            });
             
         
        }); 
        
        $("#display").on('click', function(){
             $(".contract-page").remove();
            var commission_type = $("[name=commission_type]:checked").val();
            var client_id   = $("select[name='client_id[]']").val();
            var property_id   = $("select[name='property_id[]']").val();
            var buyer_to_seller_type   = $("select[name='buyer_to_seller_type']").val();
            var buyer_to_seller   = $("input[name='buyer_to_seller']").val();
            var another_summ = $("textarea[name='another_summ']").val();
            var prop_address= new Array();
                $('input[name^="prop_address"]').each(function() 
                    {
                    prop_address.push($(this).val());
                    });
            var prop_type= new Array();
                $('input[name^="prop_type"]').each(function() 
                {
                prop_type.push($(this).val());
                });
            var requested_rent= new Array();
                $('input[name^="requested_rent"]').each(function() 
                    {
                    requested_rent.push($(this).val());
                    });
            var asking_price = new Array();
                $('input[name^="asking_price"]').each(function() 
                    {
                asking_price.push($(this).val());
                });
      if(commission_type == null) {
             $('.commission_typeError').addClass('highlight');
                 $('html,body').animate({
                        scrollTop: $('.commission_typeError').position().top
                    }, 1000);
                setTimeout(
                    function() { $('.commission_typeError').removeClass('highlight'); },
                    4000
                );
         }
          else if(commission_type == 'another_summary' && another_summ == "") {
             $('.another_summError').addClass('highlight');
                 $('html,body').animate({
                        scrollTop: $('.another_summError').position().top
                    }, 1000);
                setTimeout(
                    function() { $('.another_summError').removeClass('highlight'); },
                    4000
                );
         }
        else if($("#inlineCheckbox1").prop('checked') == false && $("#inlineCheckbox2").prop('checked') == false){
            $('.main-first').addClass('highlight');
          $('html, body').animate({ scrollTop: 0 }, 1000);
            setTimeout(
                function() { $('.main-first').removeClass('highlight'); },
                4000
            );
        }
            else if(client_id == null) {
                 $('.clientError').addClass('highlight');
                     $('html,body').animate({
                            scrollTop: $('.clientError').position().top
                        }, 1000);
                    setTimeout(
                        function() { $('.clientError').removeClass('highlight'); },
                        4000
                    );
             }
             else if(property_id == null){
                  $('.propertyError').addClass('highlight');
                    setTimeout(
                        function() { $('.propertyError').removeClass('highlight'); },
                        4000
                    );
            }
            else if($('#inlineCheckbox1').is(":checked") && requested_rent == 0 || $('#inlineCheckbox1').is(":checked") && requested_rent == ""){
                 $('.rentalError').addClass('highlight');
                    setTimeout(
                        function() { $('.rentalError').removeClass('highlight'); },
                        4000
                    );
             }else if($('#inlineCheckbox2').is(":checked") && asking_price == 0 || $('#inlineCheckbox2').is(":checked") && asking_price == ""){
                  $('.saleError').addClass('highlight');
                    setTimeout(
                        function() { $('.saleError').removeClass('highlight'); },
                        4000
                    );
             }
             else{
                 var options = [];
                    $.each($(".chosen-select1 option:selected"), function(){            
                    options.push($(this).val());
                    });
                 $.ajax({
                    url: 'https://zeroitsolutions.com/nandlanpro/panel/customer/getClients',
                    method: 'post',
                    data: {'options': options},
                    success: function(data) {
                      var result = JSON.parse(data);
                        num=0;
                        $('#myModal').modal('show');
                        $.each(result, function() {
                          var html  = '<div class="contract-page" style=""><style>.logo{opacity:1}.one-contract{margin-bottom:25px}@media(min-width:1000px){.expandable-indicator>i:hover{transform:scale(1.2);transition:0.2s ease;opacity:0.8 }.expandable-indicator>i{transition:0.2s ease}}.contract-page{margin:20px auto;max-width:1000px;box-shadow:0px 0px 4px #00000026;border:1px solid #d1d1d1;background-color:#fff;margin-top:14px;padding:11px;padding-bottom:50px}</style><style>@media(max-width:499px){.con_header{font-size:13px}}@media(min-width:500px){.con_header{font-size:16px}}</style><div class="con_header" id="con_header1" style="padding-top:5px;text-align:right;margin-bottom:10px;margin-top:0px;color:#6e7882;min-height:99px; border-bottom: 1px solid #eeeeee;">'; 
                              html  += '<img class="logo" style="width: auto; / width: 50%; / float: left; max-height: 90px; max-width: 50%; border-right: 5px solid white;" src=""><div class="con_header" style="padding-bottom:20px;"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">roee ben shushan	</font></font></b> <br><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 		Brokerage License No.: </font></font> <br><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">		Phone: 0523299587</font></font></div></div><h3 style="text-align:center;margin-top:0px;margin-bottom: 20px;"><font style="vertical-align: inherit;"><font class="" style="vertical-align: inherit;">Cooperation agreement between brokers</font></font>';
                              html  += '</h3><h3 style="text-align:center;margin-top:0px"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">No. </font></font><font style="color:#ff7e56"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">0000 </font></font></font><span style="font-size: 12px;font-weight: bold;color: #ff7e56;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">* Numbering will be displayed after production</font></font></span></h3><div style="text-align:center"><h4 style="font-size: 15px;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Customer Name: </font></font><u><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'+result[num][0].name+ ' ' + '</font></font></u><div style="display:inline-block"><font style="vertical-align: inherit;">';
                              html  += '<font style="vertical-align: inherit;">ID: </font></font><u><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'+result[num][0].id+ ' ' + '</font></font></u></div><div style="display:inline-block"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Mail: </font></font><div style="direction: ltr;display:inline-block;"><u>'+result[num][0].email+ ' ' + '</u></div></div><div style="display:inline-block"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Phone: </font></font><u><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'+result[num][0].phone+ ' ' + '</font></font></u></div></h4></div>';
                        i=0;
                        $.each(prop_address, function() {
                            if($("#inlineCheckbox1").prop('checked') == true && $("#inlineCheckbox2").prop('checked') == true){
                              html  += '<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Property Details: </font></font> <br><table class="table table-bordered table-hover assets_table2"><thead><tr style="background: whitesmoke!important;"><th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Address</font></font></th><th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Asking purchase price (₪)</font></font></th><th>';
                              html  += '<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Asking rental price (₪)</font></font></th><th><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Property Type</font></font></th></tr></thead><tbody><tr><td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'+prop_address[i]+'</font></font></td><td>'+asking_price[i]+'</td><td>'+requested_rent[i]+'</td><td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'+prop_type[i]+'</font></font></td></tr></tbody></table>';
                            }else if($("#inlineCheckbox1").prop('checked') == true && $("#inlineCheckbox2").prop('checked') == false){
                              html  += '<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Property Details: </font></font> <br><table class="table table-bordered table-hover assets_table2"><thead><tr style="background: whitesmoke!important;"><th style="text-align:right;width:25%;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Address</font></font></th><th style="text-align:right;">';
                              html  += '<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Asking rental price (₪)</font></font></th><th style="text-align:right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Property Type</font></font></th></tr></thead><tbody><tr><td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'+prop_address[i]+'</font></font></td><td>'+requested_rent[i]+'</td><td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'+prop_type[i]+'</font></font></td></tr></tbody></table>';
                            }else if($("#inlineCheckbox1").prop('checked') == false && $("#inlineCheckbox2").prop('checked') == true){
                              html  += '<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Property Details: </font></font> <br><table class="table table-bordered table-hover assets_table2"><thead><tr style="background: whitesmoke!important;"><th style="text-align:right;width:25%;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Address</font></font></th><th style="text-align:right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Asking purchase price (₪)</font></font></th>';
                              html  += '<th style="text-align:right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Property Type</font></font></th></tr></thead><tbody><tr><td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'+prop_address[i]+'</font></font></td><td>'+asking_price[i]+'</td><td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'+prop_type[i]+'</font></font></td></tr></tbody></table>';  
                            }
                        i++;    
                        });
                        if(commission_type == 'shared_pot'){
                              html += "<p><b>Type of partnership</b> : joint fund (add together the seller's commission, and the buyer's commission, and each broker receives half)</p>";
                              html += '<p>1.The parties will act out of loyalty, fairness and transparency for cooperation.</p>';
                              html += '<p>2.The parties will not give the details of the property / buyer to another broker, unless they receive written approval.</p>';
                              html += '<p>3.All contact with the buyer / owner of property would be through a representative represents (unless agreed otherwise in writing).</p>';
                              html += '<p>4.This Agreement applies to any transaction, which will be created above the property with more involvement Mtoocntzig (third party).</p>';
                              html += '<p>5.This Agreement is effective on assets Above only.</p>';
                              html += '<p>6.VAT will be added to all amounts specified above as required by law.</p>';
                        }else if(commission_type == 'own_client'){
                              html += "<p><b>Type of partnership</b> : Each of his client: (Each broker charges his client, what he agreed with his client)</p>";
                              html += '<p>1.The parties will act out of loyalty, fairness and transparency for cooperation.</p>';
                              html += '<p>2.The parties will not give the details of the property / buyer to another broker, unless they receive written approval.</p>';
                              html += '<p>3.All contact with the buyer / owner of property would be through a representative represents (unless agreed otherwise in writing).</p>';
                              html += '<p>4.This Agreement applies to any transaction, which will be created above the property with more involvement Mtoocntzig (third party).</p>';
                              html += '<p>5.This Agreement is effective on assets Above only.</p>';
                              html += '<p>6.VAT will be added to all amounts specified above as required by law.</p>';
                        }else if(commission_type == 'buyer_to_seller'){
                            if(buyer_to_seller_type == 'percent'){
                              html += "<p><b>Type of partnership</b> : The buyer's broker transfers" +" " +buyer_to_seller+"% to the seller's broker</p>";  
                            }else{
                                html += "<p><b>Type of partnership</b> : The buyer's broker transfers" +" " +buyer_to_seller+ " " + "month's rent to the seller's broker</p>";  
                            }
                              html += '<p>1.The parties will act out of loyalty, fairness and transparency for cooperation.</p>';
                              html += '<p>2.The parties will not give the details of the property / buyer to another broker, unless they receive written approval.</p>';
                              html += '<p>3.All contact with the buyer / owner of property would be through a representative represents (unless agreed otherwise in writing).</p>';
                              html += '<p>4.This Agreement applies to any transaction, which will be created above the property with more involvement Mtoocntzig (third party).</p>';
                              html += '<p>5.This Agreement is effective on assets Above only.</p>';
                              html += '<p>6.VAT will be added to all amounts specified above as required by law.</p>';
                        }else if(commission_type == 'another_summary'){
                              html += "<p><b>Type of partnership</b> :" +another_summ+ "</p>";
                              html += '<p>1.The parties will act out of loyalty, fairness and transparency for cooperation.</p>';
                              html += '<p>2.The parties will not give the details of the property / buyer to another broker, unless they receive written approval.</p>';
                              html += '<p>3.All contact with the buyer / owner of property would be through a representative represents (unless agreed otherwise in writing).</p>';
                              html += '<p>4.This Agreement applies to any transaction, which will be created above the property with more involvement Mtoocntzig (third party).</p>';
                              html += '<p>5.This Agreement is effective on assets Above only.</p>';
                              html += '<p>6.VAT will be added to all amounts specified above as required by law.</p>';
                        }
                              $('#htmlData').before(html);
                          num++;
                        }); 
                     
                 },
                    error : function(data) {
                        console.log('error');
                    }
                   
                });  
             }
            
        });
        
        $('.closePreview').on('click', function(){
             $('#myModal').modal('hide');
        });
    
  </script>