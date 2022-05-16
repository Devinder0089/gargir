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
			<div class="main-first col-md-10">
			<div class="row">
					<div class="youtube-head col-md-6">
						<h6><i class="fa fa-youtube"></i> <a class="nav-link" href="#">introduction video</a></h6>
					</div>
					<div class="transcation-head col-md-6">
						<h6>1. Type of transaction + brokerage fee:</h6>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="checkbox" name="rent" id="inlineCheckbox1" value="1" checked>
						  <label class="form-check-label box1" for="inlineCheckbox1">Renting</label>
						  <input class="small-input rents" type="text" name="months_of_rent" value="1">
						  	<select class="form-select rents" aria-label="Default select example">
							  <option selected>Months of rent</option>
							  <option value="1">One</option>
							</select>
						</div>
						<div class="form-check form-check-inline">
						  <input class="form-check-input" type="checkbox" name="sale" id="inlineCheckbox2" value="1" checked>
						  <label class="form-check-label" for="inlineCheckbox2">sale</label>
						  <input class="small-input sales" type="text" name="percent" value="1">
						  	<select class="form-select sales" aria-label="Default select example">
							  <option selected>Percent</option>
							  <option value="1">One</option>
							</select>
						</div>
					</div>
				</div>
			</div><!-- main-first ends here -->


			<div class="main-sec col-md-10">
				<div class="row">
					<div class="trans-head col-md-6">
						<button type="button" id="newClient" class="btn btn-primary">?New client</button>
					</div>
					<div class="button-head col-md-6">
						<h6>2. Details of the owner of the property for stamping:</h6>
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
						<h6>3. Property details:</h6>
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
			<div class="main-first col-md-10">
			    <div class="row">
						<div class="youtube-head col-md-3">
						<!--<h6><i class="fa fa-youtube"></i> <a class="nav-link" href="#">introduction video</a></h6>-->
					</div>
					<div class="transcation-head col-md-9" style="text-align:right">
					    <h6>4. Exclusivity period (production of an exclusivity agreement):</h6>
					    <p>The system will send the property owner the exclusivity agreement in a separate document (as required by law) so that he will have to sign 2 documents. Both on the brokerage agreement, and also on the exclusivity agreement.</p>
					</div>
					<div class="youtube-head col-md-4">
						<!--<h6><i class="fa fa-youtube"></i> <a class="nav-link" href="#">introduction video</a></h6>-->
					</div>
					<div class="transcation-head col-md-8" style="text-align:right">
						
						<div class="form-check form-check-inline">
						  <input class="form-check-input untill" type="date" name="from_date" style="display:none">
						  <input class="form-check-input from" type="date" name="untill" style="display:none">
						  	<select class="form-select exclusivity" aria-label="Default select example" name="exclusivity">
							  <option value="0" selected>Without exclusivity</option>
							  <option value="6">month exclusivity 6</option>
							   <option value="5">month exclusivity 5</option>
							    <option value="4">month exclusivity 4</option>
							     <option value="3">Exclusive 3 months</option>
							     <option value="2">Exclusive 2 months</option>
							     <option value="1">month exclusivity 1</option>
							     <option value="7">Custom date</option>
							</select>
						</div>
					</div>
				</div>
			</div><!-- main-first ends here -->
        
			<div class="comment col-md-12">
				<div class="row">
					<div class="comment-box">
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
	<div class="modal-footer" style="display:none">
		<button type="button" class="btn btn-default closePreview" data-dismiss="modal">Close</button>
		<button type="button" class="btn btn-primary">Save changes</button>
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
      $('#inlineCheckbox1').on('click', function(){
        if($(this).is(":checked")){   
            $(".rents").show();
        }
        else{
            $(".rents").hide();
        }
      });
      
      $('#inlineCheckbox2').on('click', function(){
         if($(this).is(":checked")){   
            $(".sales").show();
        }
        else{
            $(".sales").hide();
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
   
    $('.exclusivity').on('click', function(){
        var valu = $(this).val();
        if(valu == 0){   
            $('.from').css('display','none');
             $('.from').val('');
            $('.untill').css('display','none');
             $('.untill').val('');
        }else if(valu == 1){
            $('.from').removeAttr('style');
            var date = new Date();
            var year = date.getFullYear();
            var month = (1 + date.getMonth()).toString();
            month = month.length > 1 ? month : '0' + month;
            var day = date.getDate().toString();
            day = day.length > 1 ? day : '0' + day;
            var current_date = year + '-' + month + '-' + day
            $('.from').val(current_date);
            
            $('.untill').removeAttr('style');
            var dates = new Date();
            dates.setDate(dates.getDate() + 30);
            var years = dates.getFullYear();
            var months = (1 + dates.getMonth()).toString();
            months = months.length > 1 ? months : '0' + months;
            var days = dates.getDate().toString();
            days = days.length > 1 ? days : '0' + days;
            var current_dates = years + '-' + months + '-' + days
            $('.untill').val(current_dates);
        }else if(valu == 2){
           $('.from').removeAttr('style');
            var date = new Date();
            var year = date.getFullYear();
            var month = (1 + date.getMonth()).toString();
            month = month.length > 1 ? month : '0' + month;
            var day = date.getDate().toString();
            day = day.length > 1 ? day : '0' + day;
            var current_date = year + '-' + month + '-' + day
            $('.from').val(current_date);
            
            $('.untill').removeAttr('style');
            var dates = new Date();
            dates.setDate(dates.getDate() + 60);
            var years = dates.getFullYear();
            var months = (1 + dates.getMonth()).toString();
            months = months.length > 1 ? months : '0' + months;
            var days = dates.getDate().toString();
            days = days.length > 1 ? days : '0' + days;
            var current_dates = years + '-' + months + '-' + days
            $('.untill').val(current_dates);
        }else if(valu == 3){
           $('.from').removeAttr('style');
            var date = new Date();
            var year = date.getFullYear();
            var month = (1 + date.getMonth()).toString();
            month = month.length > 1 ? month : '0' + month;
            var day = date.getDate().toString();
            day = day.length > 1 ? day : '0' + day;
            var current_date = year + '-' + month + '-' + day
            $('.from').val(current_date);
            
            $('.untill').removeAttr('style');
            var dates = new Date();
            dates.setDate(dates.getDate() + 90);
            var years = dates.getFullYear();
            var months = (1 + dates.getMonth()).toString();
            months = months.length > 1 ? months : '0' + months;
            var days = dates.getDate().toString();
            days = days.length > 1 ? days : '0' + days;
            var current_dates = years + '-' + months + '-' + days
            $('.untill').val(current_dates);
        }else if(valu == 4){
            $('.from').removeAttr('style');
            var date = new Date();
            var year = date.getFullYear();
            var month = (1 + date.getMonth()).toString();
            month = month.length > 1 ? month : '0' + month;
            var day = date.getDate().toString();
            day = day.length > 1 ? day : '0' + day;
            var current_date = year + '-' + month + '-' + day
            $('.from').val(current_date);
            
            $('.untill').removeAttr('style');
            var dates = new Date();
            dates.setDate(dates.getDate() + 120);
            var years = dates.getFullYear();
            var months = (1 + dates.getMonth()).toString();
            months = months.length > 1 ? months : '0' + months;
            var days = dates.getDate().toString();
            days = days.length > 1 ? days : '0' + days;
            var current_dates = years + '-' + months + '-' + days
            $('.untill').val(current_dates);
        }else if(valu == 5){
            $('.from').removeAttr('style');
            var date = new Date();
            var year = date.getFullYear();
            var month = (1 + date.getMonth()).toString();
            month = month.length > 1 ? month : '0' + month;
            var day = date.getDate().toString();
            day = day.length > 1 ? day : '0' + day;
            var current_date = year + '-' + month + '-' + day
            $('.from').val(current_date);
            
            $('.untill').removeAttr('style');
            var dates = new Date();
            dates.setDate(dates.getDate() + 150);
            var years = dates.getFullYear();
            var months = (1 + dates.getMonth()).toString();
            months = months.length > 1 ? months : '0' + months;
            var days = dates.getDate().toString();
            days = days.length > 1 ? days : '0' + days;
            var current_dates = years + '-' + months + '-' + days
            $('.untill').val(current_dates);
        }else if(valu == 6){
           $('.from').removeAttr('style');
            var date = new Date();
            var year = date.getFullYear();
            var month = (1 + date.getMonth()).toString();
            month = month.length > 1 ? month : '0' + month;
            var day = date.getDate().toString();
            day = day.length > 1 ? day : '0' + day;
            var current_date = year + '-' + month + '-' + day
            $('.from').val(current_date);
            
            $('.untill').removeAttr('style');
            var dates = new Date();
            dates.setDate(dates.getDate() + 180);
            var years = dates.getFullYear();
            var months = (1 + dates.getMonth()).toString();
            months = months.length > 1 ? months : '0' + months;
            var days = dates.getDate().toString();
            days = days.length > 1 ? days : '0' + days;
            var current_dates = years + '-' + months + '-' + days
            $('.untill').val(current_dates);
        }else if(valu == 7){
           $('.from').removeAttr('style');
           $('.from').val('');
            $('.untill').removeAttr('style');
            $('.untill').val('');
        }
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
                var comments = $("input[name='comments']").val();
                var agree_pro =$("[name=agree_pro]:checked").val();
        
            if($("#inlineCheckbox1").prop('checked') == false && $("#inlineCheckbox2").prop('checked') == false){
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
           $("#confirmModal").modal('hide');
            if($('#inlineCheckbox1').is(":checked")){
                var rent = 1;
                var months_of_rent = $("input[name='months_of_rent']").val();
                   
          }
          else{
              var rent = 0;
              var months_of_rent = " ";
          }
          if($('#inlineCheckbox2').is(":checked")){
              var sale = 1;
              var percent = $("input[name='percent']").val();
          }else{
              var sale = 0;
              var percent = " ";
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
                var client_id   = $("select[name='client_id[]']").val();
                var property_id   = $("select[name='property_id[]']").val();
                var comments = $("input[name='comments']").val();
                var agree_pro =$("[name=agree_pro]:checked").val();
                var exclusivity = $('.exclusivity').val();
                var from_date = $("input[name='from_date']").val();
                var untill = $("input[name='untill']").val();
                var type   = 'stamp_owner';
            $.ajax({
                url: 'https://zeroitsolutions.com/nandlanpro/panel/customer/ownerAgreement',
                method: 'post',
                data: {'rent':rent,'months_of_rent':months_of_rent,'sale':sale,'percent':percent,'client_id':client_id,'property_id':property_id,'asking_price':asking_price,'requested_rent':requested_rent,'comments':comments,'agree_pro':agree_pro,'exclusivity':exclusivity,'from_date':from_date,'untill':untill,'type':type},
                success: function(data) {
                    // console.log(data);
                    window.location.href = base_url + "admin/customer/agreement/success";
                }
               
            });
        }); 
        
        $("#display").on('click', function(){
             $(".contract-page").remove();
            var client_id   = $("select[name='client_id[]']").val();
            var property_id   = $("select[name='property_id[]']").val();
            var months_of_rent   = $("input[name='months_of_rent']").val();
            var percent   = $("input[name='percent']").val();
            var exclusivity = $('.exclusivity').val();
            var from_date = $("input[name='from_date']").val();
            var untill = $("input[name='untill']").val();
            var comments = $("textarea[name='comments']").val();
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
            if($("#inlineCheckbox1").prop('checked') == false && $("#inlineCheckbox2").prop('checked') == false){
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
                    var date = new Date();
                    var year = date.getFullYear();
                    var month = (1 + date.getMonth()).toString();
                    month = month.length > 1 ? month : '0' + month;
                    var day = date.getDate().toString();
                    day = day.length > 1 ? day : '0' + day;
                    var current_date = year + '-' + month + '-' + day
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
                              html  += '<img class="logo" style="width: auto; / width: 50%; / float: left; max-height: 90px; max-width: 50%; border-right: 5px solid white;" src=""><div class="con_header" style="padding-bottom:20px;"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">roee ben shushan	</font></font></b> <br><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 		Brokerage License No.: </font></font> <br><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">		Phone: 0523299587</font></font></div></div><h3 style="text-align:center;margin-top:0px;margin-bottom: 20px;"><font style="vertical-align: inherit;"><font class="" style="vertical-align: inherit;">Ordering brokerage services for the sale and / or rental of real estate</font></font>';
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
                              html += '<p>1. The client hereby declares that he is the legal holder and holder of the full and legal rights in the real estate property described in the appendix below and which forms an integral part of this agreement (hereinafter: "the property") or is authorized by the rights holder to sell and / or rent and / or deliver . The client declares that it has been clarified to him that the details of the property will be made known to buyers / tenants / realtors in order to promote the marketing of the property and that the details of the property provided to the realtor and listed in the appendix are material, correct and complete.</p>';
                              html += '<p>2. The client undertakes to immediately present to the broker a draft registration or approval of rights from the Israel Land Authority and / or the mortgage company, up to date.</p>';
                              html += '<p>3. The client will pay the broker for the brokerage operation, immediately upon signing a binding agreement for the sale or rental of the property at the rates specified in section 4 below.</p>';
                              html += '<p>4.  The brokerage fee that the client hereby undertakes to pay in accordance with the provisions of section 3 above shall be paid in cash as follows.</p>';
                              if($("#inlineCheckbox1").prop('checked') == true && $("#inlineCheckbox2").prop('checked') == true){
                                  html += '<p>4.1. On sale:' +percent+  'percent From the sale price as stipulated in the sale agreement of the property plus VAT.</p>';
                                  html += '<p>4.2 For rent: rent' +months_of_rent+ 'months rent (regardless of the rental period) plus VAT.</p>';
                                  html += '<p>4.3. Nothing in the foregoing shall derogate from the broker s right to charge a brokerage fee from the buyer / tenant.</p>';
                              }else if($("#inlineCheckbox1").prop('checked') == true && $("#inlineCheckbox2").prop('checked') == false){
                                  html += '<p>4.1 For rent: rent' +months_of_rent+ 'months rent (regardless of the rental period) plus VAT.</p>';
                                  html += '<p>4.2. Nothing in the foregoing shall derogate from the broker s right to charge a brokerage fee from the buyer / tenant.</p>';
                              }else if($("#inlineCheckbox1").prop('checked') == false && $("#inlineCheckbox2").prop('checked') == true){
                                  html += '<p>4.1. On sale:' +percent+  'percent From the sale price as stipulated in the sale agreement of the property plus VAT.</p>';
                                  html += '<p>4.2. Nothing in the foregoing shall derogate from the broker s right to charge a brokerage fee from the buyer / tenant.</p>';
                              }
                              
                                 html += '<p>5. The client confirms that he was recommended by the broker to seek the services of a lawyer and / or other experts as per the interest and need during the transaction.</p>';
                                 html += '<p>6. Customer acknowledges that the brokerage fees will be charged by the broker and to be invoiced by law mediator.</p>';
                                 html += '<p>7. No waiver, extension, discount or change any conditions of this Agreement shall not be valid unless made in writing. No delay in use The rights of any party shall not be construed as a waiver and he shall be entitled to exercise all or all of his rights separately, both under this Agreement and under any law, at any time he deems fit.</p>';
                                 html += '<p>8.  The parties shall be jointly and severally liable under this Agreement. Whenever one of the parties to the agreement signs any document, letter, letter, or certificate of any kind in any matter and matter related to this agreement, its execution or resulting therefrom, it shall require the signature of the other individuals certificate of any kind in any matter and matter related to this agreement, its execution or resulting therefrom, it shall require the signature of the other individuals.</p>';
                                 html += '<br><p>'+comments+'</p>';
                        if(exclusivity != 0){
                              html  += '<div class="contract-page" style=""><style>.logo{opacity:1}.one-contract{margin-bottom:25px}@media(min-width:1000px){.expandable-indicator>i:hover{transform:scale(1.2);transition:0.2s ease;opacity:0.8 }.expandable-indicator>i{transition:0.2s ease}}.contract-page{margin:20px auto;max-width:1000px;box-shadow:0px 0px 4px #00000026;border:1px solid #d1d1d1;background-color:#fff;margin-top:14px;padding:11px;padding-bottom:50px}</style><style>@media(max-width:499px){.con_header{font-size:13px}}@media(min-width:500px){.con_header{font-size:16px}}</style><div class="con_header" id="con_header1" style="padding-top:5px;text-align:right;margin-bottom:10px;margin-top:0px;color:#6e7882;min-height:99px; border-bottom: 1px solid #eeeeee;">'; 
                              html  += '<img class="logo" style="width: auto; / width: 50%; / float: left; max-height: 90px; max-width: 50%; border-right: 5px solid white;" src=""><div class="con_header" style="padding-bottom:20px;"><b><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">roee ben shushan	</font></font></b> <br><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> 		Brokerage License No.: </font></font> <br><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">		Phone: 0523299587</font></font></div></div><h3 style="text-align:center;margin-top:0px;margin-bottom: 20px;"><font style="vertical-align: inherit;"><font class="" style="vertical-align: inherit;">Ordering brokerage services exclusively</font></font>';
                              html  += '</h3><h3 style="text-align:center;margin-top:0px"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">No. </font></font><font style="color:#ff7e56"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">0000 </font></font></font><span style="font-size: 12px;font-weight: bold;color: #ff7e56;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">* Numbering will be displayed after production</font></font></span></h3><div style="text-align:center"><h4 style="font-size: 15px;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Customer Name: </font></font><u><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'+result[num][0].name+ ' ' + '</font></font></u><div style="display:inline-block"><font style="vertical-align: inherit;">';
                              html  += '<font style="vertical-align: inherit;">ID: </font></font><u><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'+result[num][0].id+ ' ' + '</font></font></u></div><div style="display:inline-block"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Mail: </font></font><div style="direction: ltr;display:inline-block;"><u>'+result[num][0].email+ ' ' + '</u></div></div><div style="display:inline-block"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Phone: </font></font><u><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'+result[num][0].phone+ ' ' + '</font></font></u></div></h4></div>';
                        f=0;
                        $.each(prop_address, function() {
                            if($("#inlineCheckbox1").prop('checked') == true && $("#inlineCheckbox2").prop('checked') == true){
                              html  += '<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Property Details: </font></font> <br><table class="table table-bordered table-hover assets_table2"><thead><tr style="background: whitesmoke!important;"><th style="text-align:right;width:25%;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Address</font></font></th><th style="text-align:right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Asking purchase price (₪)</font></font></th><th style="text-align:right;">';
                              html  += '<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Asking rental price (₪)</font></font></th><th style="text-align:right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Property Type</font></font></th></tr></thead><tbody><tr><td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'+prop_address[f]+'</font></font></td><td>'+asking_price[f]+'</td><td>'+requested_rent[f]+'</td><td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'+prop_type[f]+'</font></font></td></tr></tbody></table>';
                            }else if($("#inlineCheckbox1").prop('checked') == true && $("#inlineCheckbox2").prop('checked') == false){
                              html  += '<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Property Details: </font></font> <br><table class="table table-bordered table-hover assets_table2"><thead><tr style="background: whitesmoke!important;"><th style="text-align:right;width:25%;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Address</font></font></th><th style="text-align:right;">';
                              html  += '<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Asking rental price (₪)</font></font></th><th style="text-align:right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Property Type</font></font></th></tr></thead><tbody><tr><td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'+prop_address[f]+'</font></font></td><td>'+requested_rent[i]+'</td><td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'+prop_type[f]+'</font></font></td></tr></tbody></table>';
                            }else if($("#inlineCheckbox1").prop('checked') == false && $("#inlineCheckbox2").prop('checked') == true){
                              html  += '<font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Property Details: </font></font> <br><table class="table table-bordered table-hover assets_table2"><thead><tr style="background: whitesmoke!important;"><th style="text-align:right;width:25%;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Address</font></font></th><th style="text-align:right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Asking purchase price (₪)</font></font></th>';
                              html  += '<th style="text-align:right;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Property Type</font></font></th></tr></thead><tbody><tr><td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'+prop_address[f]+'</font></font></td><td>'+asking_price[f]+'</td><td><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">'+prop_type[f]+'</font></font></td></tr></tbody></table>';  
                            }
                        f++;    
                        });
                              html += '<p>1. This agreement and order relate to the property whose details are listed in the appendix below as well as to any other real estate transaction that will develop from this order, and is an integral part of the brokerage order agreement number 00000 dated'+' ' +current_date+ ' '+ 'Real estate brokerage and forms an integral part of this agreement (hereinafter: "the property") or is authorized by the owners of the rights in the property to the seller and / or to rent and / or deliver it at a key fee. The client declares that it has been clarified to him that the details of the property will be communicated to buyers / tenants / realtors in order to promote the marketing of the property and that the property details provided to the broker and listed in the appendix are the material, correct and complete details.</p>';
                              html += '<p>2 The client undertakes to present to the broker immediately the wording of a registration or approval of rights from the manager and / or the mortgage company up to date. The client hereby beautifies the power of the realtor or his inability to contact and receive in his name and for him all the knowledge necessary to market the property from any authority, office, municipality, person or body and pass it on to potential clients for marketing the property.</p>';
                              html += '<p>3. The client orders brokerage services from the broker and authorizes him to act exclusively for him to market the property for the period from'+' ' +from_date+' '+ 'to'+' ' +untill+' '+ '(hereinafter: "the exclusivity period"). At the end of the exclusivity period, this agreement will constitute an order, without the exclusive exclusivity, of the client from the intermediary. The broker will then be able to market the property and if the property is purchased as a result of the broker s treatment, the broker will be entitled to a brokerage fee as specified below in section 5.</p>';
                              html += '<p>4. The customer pays a broker for brokerage activities, immediately upon the signing of a binding agreement for the sale or rental property, brokerage fees at the rates specified in paragraph 5 below, in any case if the agreement is signed a) during the exclusivity period (even if sold / rented than through intermediary) in ) After the period of exclusivity with an entity, who became aware of the property, or the property was presented to him, during the period of exclusivity.</p>';
                              html += '<p>5. The brokerage fee that the client hereby undertakes to pay, in accordance with the provisions of section 4 above will be as detailed and agreed in the brokerage order agreement number 00000 dated'+' ' +current_date+' .</p>';
                              html += '<p>6. The client declares that he is aware that the brokerage fee will be charged by the broker On behalf of the real estate agent H.M.</p>';
                              html += '<p>7. The client confirms that he was recommended by the broker to seek the services of a lawyer and / or other experts before the matter and the need during the transaction.</p>';
                              html += '<p>8. The broker will coordinate all actions for the marketing of the property during the exclusivity period. The client undertakes that during this period he will not request and / or receive brokerage services for the marketing of the property from any other broker and that any contact and / or negotiations between him and other brokers and / or designated buyers and / or tenants will be made solely through and through the broker  The client declares that he is aware that a breach of this section may impair the broker s ability to act as the effective agent in the transaction, and that in the event of a breach the broker will be entitled to compensation for the full commission due to him, in addition to covering any other damages.</p>';
                              html += '<p>9. The client will bring the fact of his engagement in this agreement to the attention of those who apply to him directly and especially to any other broker and / or buyer and / or tenant with whom he was previously associated. It will also bring to an immediate termination any existing obligation that contradicts its obligations under this Agreement.</p>';
                              html += '<p>10. The realtor undertakes the client to give the marketing efforts of the property top priority, act diligently, with dedication and loyalty and share realtors and other real estate agencies in finding interested buyers and build and execute a marketing and advertising plan to promote the marketing of the property. All this in accordance with his professional judgment and in accordance with the specifications in the marketing actions form attached to this order.</p>';
                              html += '<p>11. It is understood and known to the client that the client appoints the broker to be the active and sole entity that will act to promote the sale and / or rental of the property, then any contact and / or transaction that he links is the result of the broker s activity and efficiency only.</p>';
                              html += '<br><p>'+comments+'</p>';
                            
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
        
        $('.closePreview').click(function(){
            $('#myModal').modal('hide');
        });
        
  </script>