<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin NandLan Pro</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="shortcut icon" type="image/png" href="https://zeroitsolutions.com/nandlanpro/panel/uploads/logo/favicon_6088014a4ceec.ico"/>
        <style>
             .new-modal{
                padding: 20px 0;
             }
            .new-modal .roee {
                    text-align: right;
                    border-bottom: 1px solid #ccc;
                    padding: 30px 30px;
                }
                .new-modal .roee h6,p{
                	margin: 0;
                }
                .new-modal .ordering {
                    text-align: center;
                    padding: 20px 30px 10px 30px;
                }
                .new-modal .ordering h4 span,small {
                    color: #f27d57;
                }
                .new-modal .ordering h4 small{
                	font-size: 14px;
                }
                .new-modal .ordering p{
                	margin: 0
                }
                .new-modal table{
                	margin: 0 auto;
                	width:96%;
                }
                p.text-lf{
                    padding:0 30px;
                }
                .new-modal table, th, td {
                  border: 1px solid #ccc;
                  padding: 10px;
                }
                .new-modal .roee-md{
                    padding:30px;
                }
                .new-modal .date-sign {
                    text-align: center;
                    padding: 60px 0 50px 0;
                }
                .new-modal .date-time {
                    text-align: center;
                    padding: 30px 0 50px 0 ;
                }
                .new-modal .date-time button {
                    border: 0;
                    background: #4ccc00;
                    color: #fff;
                    padding: 5px 20px;
                    border-radius: 5px;
                }
                
                .new-modal .modal-head h4{
                	color: #162028;
                	background: #ffc1076b;
                	font-size:25px;
                	padding:5px;
                	border-radius: 10px;
                	cursor: pointer;
                	width: 130px;
                	margin: 0 auto;
                	text-align: center;
                }
                
                .modal-foot {
                    display: flex;
                    align-items: center;
                    justify-content: space-between;
                    padding: 30px 0;
                }
                .main-pri-con{
                	padding: 20px;
                }
                .inner-pri.col-md-12 {
                    padding:30px;
                }
                .inner-form.col-md-6 {
                    padding: 0 30px 30px;
                }
                .main-pri-con .inner-pri input {
                    width: 100%;
                }
                #sig-canvas {
                  border: 2px dotted #CCCCCC;
                  border-radius: 15px;
                  cursor: crosshair;
                }
                .red{
                    color:red;
                }

        </style>
    </head>
    <body>
        <?php if($agreement->type == 'stamp_in'):?>
        <div class="new-modal">
        	<div class="container" style="background:white">
        		<div class="row">
        			<div class="roee">
        				<h6><?php echo $user->username; ?></h6>
        				<p>:Brokerage License No</p>
        				<p><?php echo $user->phone; ?></p>
        			</div>
        			<div class="ordering">
        				<h4>Ordering real estate services for buying / renting real estate</h4>
        				<h4>No. <span>0000</span><small> * Numbering will be displayed after production</small></h4>
        				<p>Customer Name:<u> <?php echo $client->name; ?></u> ID: <u><?php echo $client->id; ?></u> Mail:<u> <?php echo $client->email; ?></u> Phone:<u> <?php echo $client->phone; ?></u></p>
        			</div>
        			<table>
        				<p class="text-lf">Property Details:</p>
        				<?php
        				if($agreement->rent == 0):
        				?>
        				<?php 
        			
        				foreach($propert as $k=> $prop){
        				?>
        				<tr>
        					<th>Address</th>
    					    <th>Asking Purchase price (₪)</th>
    					    <th>Property Type</th>
        				</tr>
        				<tr>
        					<td><?php echo $prop[0]['street']; ?>, <?php echo $prop[0]['city']; ?></td>
        					<td><?php echo $asking_price[$k]; ?></td>
        					<td><?php echo $prop[0]['prop_type']; ?></td>
        				</tr>
        				<?php
        				
        				}
        				?>
        				<?php
        				elseif($agreement->buy == 0):
        				?>
        				<?php 
        			
        				foreach($propert as $k=> $prop){
        				?>
        				<tr>
        					<th>Address</th>
    					    <th>Asking rental price (₪)</th>
    					    <th>Property Type</th>
        				</tr>
        				<tr>
        					<td><?php echo $prop[0]['street']; ?>, <?php echo $prop[0]['city']; ?></td>
        					<td><?php echo $requested_rent[$k]; ?></td>
        					<td><?php echo $prop[0]['prop_type']; ?></td>
        				</tr>
        				<?php
        				
        				}
        				?>
        				<?php
        				else:
        				?>
        				<?php 
        			
        				foreach($propert as $k=> $prop){
        				?>
        				<tr>
        					<th>Address</th>
    					    <th>Asking rental price (₪)</th>
    					    <th>Asking Purchase price (₪)</th>
    					    <th>Property Type</th>
        				</tr>
        				<tr>
        					<td><?php echo $prop[0]['street']; ?>, <?php echo $prop[0]['city']; ?></td>
        					<td><?php echo $requested_rent[$k]; ?></td>
        					<td><?php echo $asking_price[$k]; ?></td>
        					<td><?php echo $prop[0]['prop_type']; ?></td>
        				</tr>
        				<?php
        				
        				}
        				?>
        				<?php endif; ?>
        				
        			</table>
        			<div class="roee-md">
        				<p>1. The client orders real estate brokerage services from the broker, in order to receive brokerage services in connection with the properties listed above.</p>
        				<p>2. The client confirms that the broker presented to him the assets listed below, and he undertakes to report to the broker immediately any negotiations conducted with him and / or his sender in connection with one or more of the properties, and immediately upon signing a binding agreement and / or commitment to execute the transaction, whichever is earlier , In relation to one or more of the properties below.</p>
        				<p>3. For the avoidance of doubt, the client declares that he understands and agrees that any agreement signed between the client and / or anyone on his behalf and the property owner, regarding any of the properties listed below, will charge the client the brokerage fee as specified in section 5 below. </p>
        				<p>4. The client undertakes not to provide to any party information received from the broker regarding the properties below and undertakes to compensate the broker for any damage caused to him if this obligation is breached.</p>
        				<p>5. The client undertakes to pay the broker the brokerage fee as specified below, immediately upon signing a binding agreement or with a commitment to execute the transaction, whichever is earlier, in respect of one or more of the assets listed below.</p>
    					<?php
        				if($agreement->rent == 0):
        				?>
        				<p>5.1. Purchase <u>.<?php echo $agreement->percent; ?> percent</u> of the total purchase price of the property plus VAT.</p>
        				<p>5.2. The brokerage fee will be paid to the broker in cash immediately upon signing a binding agreement and / or with a commitment to execute the transaction, whichever is earlier.</p>
        				<p>5.3. The above comes in addition to the broker's right to charge a brokerage fee from the seller / landlord.</p>
        				<?php
        				elseif($agreement->buy == 0):
        				?>
        				<p>5.1. In rent: rent of <u><?php echo $agreement->months_of_rent; ?> months</u> rent plus VAT.</p>
        				<p>5.2. The brokerage fee will be paid to the broker in cash immediately upon signing a binding agreement and / or with a commitment to execute the transaction, whichever is earlier.</p>
        				<p>5.3. The above comes in addition to the broker's right to charge a brokerage fee from the seller / landlord.</p>
        				<?php
        				else:
        				?>
        				<p>5.1. Purchase <u>.<?php echo $agreement->percent; ?> percent</u> of the total purchase price of the property plus VAT.</p>
        				<p>5.2. In rent: rent of <u><?php echo $agreement->months_of_rent; ?> months</u> rent plus VAT.</p>
        				<p>5.3. The brokerage fee will be paid to the broker in cash immediately upon signing a binding agreement and / or with a commitment to execute the transaction, whichever is earlier.</p>
        				<p>5.4. The above comes in addition to the broker's right to charge a brokerage fee from the seller / landlord.</p>
        				<?php endif; ?>
        				<p>6. The client confirms that upon the sale of the property, the broker will be able to notify the public that the property has been sold in any way the broker deems appropriate.</p>
        				<p>7. The client confirms that he was recommended by the broker to seek the services of a lawyer and / or other experts as per the interest and need during the transaction.</p>
        				<p>8. No waiver, extension, discount or change in any provision of this Agreement shall be effective unless made in writing. Any delay in the use of the rights of any party shall be deemed a waiver and he shall be entitled to use all or all of his rights separately, both under this Agreement and under any law, at any time he deems fit.</p>
        				<p>9. The parties shall be jointly and severally liable under this Agreement jointly and severally. Whenever one of the parties to the agreement signs any document, letter, letter, or certificate of any kind in any matter and thing related to this agreement, its execution or arising therefrom, its signature shall require the other individuals of that party.</p>
        			    <p><?php echo $agreement->comments ?></p>
        			</div>
        			
        			</div>
        			<div class="row">
        			    <div class="date-sign col-md-6">
        			    <?php echo date('Y-m-d', strtotime($signed->created_at))?>
        				<p>______________________________</p>
        				<p>date and time</p>
            			</div>
            			<div class="date-time col-md-6">
            				<img src="<?php echo base_url() ?>uploads/signature/<?php echo $signed->signature ?>" width="180px"/>
            				<p>______________________________</p>
            				<p>signature</p>
            			</div>
        			</div>
        		</div>
        		
        	</div>
        	 <?php elseif($agreement->type == 'stamp_owner'):?>
         <div class="new-modal">
        	<div class="container" style="background:white">
        		<div class="row">
        			<div class="roee">
        				<h6><?php echo $user->username; ?></h6>
        				<p>:Brokerage License No</p>
        				<p><?php echo $user->phone; ?></p>
        			</div>
        			<div class="ordering">
        				<h4>Ordering brokerage services for the sale and / or rental of real estate</h4>
        				<h4>No. <span>0000</span><small> * Numbering will be displayed after production</small></h4>
        				<p>Customer Name:<u> <?php echo $client->name; ?></u> ID: <u><?php echo $client->id; ?></u> Mail:<u> <?php echo $client->email; ?></u> Phone:<u> <?php echo $client->phone; ?></u></p>
        			</div>
        			<table>
        				<p class="text-lf">Property Details:</p>
        				<?php
        				if($agreement->rent == 0):
        				?>
        				<?php 
        			
        				foreach($propert as $k=> $prop){
        				?>
        				<tr>
        					<th>Address</th>
    					    <th>Asking Purchase price (₪)</th>
    					    <th>Property Type</th>
        				</tr>
        				<tr>
        					<td><?php echo $prop[0]['street']; ?>, <?php echo $prop[0]['city']; ?></td>
        					<td><?php echo $asking_price[$k]; ?></td>
        					<td><?php echo $prop[0]['prop_type']; ?></td>
        				</tr>
        				<?php
        				
        				}
        				?>
        				<?php
        				elseif($agreement->sale == 0):
        				?>
        				<?php 
        			
        				foreach($propert as $k=> $prop){
        				?>
        				<tr>
        					<th>Address</th>
    					    <th>Asking rental price (₪)</th>
    					    <th>Property Type</th>
        				</tr>
        				<tr>
        					<td><?php echo $prop[0]['street']; ?>, <?php echo $prop[0]['city']; ?></td>
        					<td><?php echo $requested_rent[$k]; ?></td>
        					<td><?php echo $prop[0]['prop_type']; ?></td>
        				</tr>
        				<?php
        				
        				}
        				?>
        				<?php
        				else:
        				?>
        				<?php 
        			
        				foreach($propert as $k=> $prop){
        				?>
        				<tr>
        					<th>Address</th>
    					    <th>Asking rental price (₪)</th>
    					    <th>Asking Purchase price (₪)</th>
    					    <th>Property Type</th>
        				</tr>
        				<tr>
        					<td><?php echo $prop[0]['street']; ?>, <?php echo $prop[0]['city']; ?></td>
        					<td><?php echo $requested_rent[$k]; ?></td>
        					<td><?php echo $asking_price[$k]; ?></td>
        					<td><?php echo $prop[0]['prop_type']; ?></td>
        				</tr>
        				<?php
        				
        				}
        				?>
        				<?php endif; ?>
        				
        			</table>
        			<div class="roee-md">
        				<p>1. The client hereby declares that he is the legal holder and holder of the full and legal rights in the real estate property described in the appendix below and which forms an integral part of this agreement (hereinafter: "the property") or is authorized by the rights holder to sell and / or rent and / or deliver . The client declares that it has been clarified to him that the details of the property will be made known to buyers / tenants / realtors in order to promote the marketing of the property and that the details of the property provided to the realtor and listed in the appendix are material, correct and complete.</p>
        				<p>2. The client undertakes to immediately present to the broker a draft registration or approval of rights from the Israel Land Authority and / or the mortgage company, up to date.</p>
        				<p>3. The client will pay the broker for the brokerage operation, immediately upon signing a binding agreement for the sale or rental of the property at the rates specified in section 4 below. </p>
        				<p>4. The brokerage fee that the client hereby undertakes to pay in accordance with the provisions of section 3 above shall be paid in cash as follows.</p>
    					<?php
        				if($agreement->rent == 0):
        				?>
        				<p>4.1. On sale: <?php echo $agreement->percent; ?> percent From the sale price as stipulated in the sale agreement of the property plus VAT.</p>
        				<p>4.2. Nothing in the foregoing shall derogate from the broker s right to charge a brokerage fee from the buyer / tenant.</p>
        				<?php
        				elseif($agreement->sale == 0):
        				?>
        				<p>4.1 For rent: rent <?php echo $agreement->months_of_rent; ?> months rent (regardless of the rental period) plus VAT.</p>
        				<p>4.2. Nothing in the foregoing shall derogate from the broker s right to charge a brokerage fee from the buyer / tenant.</p>
        				<?php
        				else:
        				?>
        				<p>4.1. On sale: <?php echo $agreement->percent; ?> percent From the sale price as stipulated in the sale agreement of the property plus VAT.</p>
        				<p>4.2 For rent: rent <?php echo $agreement->months_of_rent; ?> months rent (regardless of the rental period) plus VAT.</p>
        				<p>4.3. Nothing in the foregoing shall derogate from the broker s right to charge a brokerage fee from the buyer / tenant.</p>
        				<p>5.4. The above comes in addition to the broker's right to charge a brokerage fee from the seller / landlord.</p>
        				<?php endif; ?>
        				<p>5. The client confirms that he was recommended by the broker to seek the services of a lawyer and / or other experts as per the interest and need during the transaction.</p>
        				<p>6. Customer acknowledges that the brokerage fees will be charged by the broker and to be invoiced by law mediator.</p>
        				<p>7. No waiver, extension, discount or change any conditions of this Agreement shall not be valid unless made in writing. No delay in use The rights of any party shall not be construed as a waiver and he shall be entitled to exercise all or all of his rights separately, both under this Agreement and under any law, at any time he deems fit.</p>
        				<p>8. The parties shall be jointly and severally liable under this Agreement. Whenever one of the parties to the agreement signs any document, letter, letter, or certificate of any kind in any matter and matter related to this agreement, its execution or resulting therefrom, it shall require the signature of the other individuals certificate of any kind in any matter and matter related to this agreement, its execution or resulting therefrom, it shall require the signature of the other individuals.</p>
        			    <p><?php echo $agreement->comments ?></p>
        			</div>
        			
        			</div>
    				<div class="row">
        			    <div class="date-sign col-md-6">
        			    <?php echo date('Y-m-d', strtotime($signed->created_at))?>
        				<p>______________________________</p>
        				<p>date and time</p>
            			</div>
            			<div class="date-time col-md-6">
            				<img src="<?php echo base_url() ?>uploads/signature/<?php echo $signed->signature ?>" width="180px"/>
            				<p>______________________________</p>
            				<p>signature</p>
            			</div>
        			</div>
        		</div>
        		
        	</div>
	 <?php elseif($agreement->type == 'exclusive'):?>
         <div class="new-modal">
        	<div class="container" style="background:white">
        		<div class="row">
        			<div class="roee">
        				<h6><?php echo $user->username; ?></h6>
        				<p>:Brokerage License No</p>
        				<p><?php echo $user->phone; ?></p>
        			</div>
        			<div class="ordering">
        				<h4>Ordering brokerage services exclusively</h4>
        				<h4>No. <span>0000</span><small> * Numbering will be displayed after production</small></h4>
        				<p>Customer Name:<u> <?php echo $client->name; ?></u> ID: <u><?php echo $client->id; ?></u> Mail:<u> <?php echo $client->email; ?></u> Phone:<u> <?php echo $client->phone; ?></u></p>
        			</div>
        			<table>
        				<p class="text-lf">Property Details:</p>
        				<?php
        				if($agreement->rent == 0):
        				?>
        				<?php 
        			
        				foreach($propert as $k=> $prop){
        				?>
        				<tr>
        					<th>Address</th>
    					    <th>Asking Purchase price (₪)</th>
    					    <th>Property Type</th>
        				</tr>
        				<tr>
        					<td><?php echo $prop[0]['street']; ?>, <?php echo $prop[0]['city']; ?></td>
        					<td><?php echo $asking_price[$k]; ?></td>
        					<td><?php echo $prop[0]['prop_type']; ?></td>
        				</tr>
        				<?php
        				
        				}
        				?>
        				<?php
        				elseif($agreement->sale == 0):
        				?>
        				<?php 
        			
        				foreach($propert as $k=> $prop){
        				?>
        				<tr>
        					<th>Address</th>
    					    <th>Asking rental price (₪)</th>
    					    <th>Property Type</th>
        				</tr>
        				<tr>
        					<td><?php echo $prop[0]['street']; ?>, <?php echo $prop[0]['city']; ?></td>
        					<td><?php echo $requested_rent[$k]; ?></td>
        					<td><?php echo $prop[0]['prop_type']; ?></td>
        				</tr>
        				<?php
        				
        				}
        				?>
        				<?php
        				else:
        				?>
        				<?php 
        			
        				foreach($propert as $k=> $prop){
        				?>
        				<tr>
        					<th>Address</th>
    					    <th>Asking rental price (₪)</th>
    					    <th>Asking Purchase price (₪)</th>
    					    <th>Property Type</th>
        				</tr>
        				<tr>
        					<td><?php echo $prop[0]['street']; ?>, <?php echo $prop[0]['city']; ?></td>
        					<td><?php echo $requested_rent[$k]; ?></td>
        					<td><?php echo $asking_price[$k]; ?></td>
        					<td><?php echo $prop[0]['prop_type']; ?></td>
        				</tr>
        				<?php
        				
        				}
        				?>
        				<?php endif; ?>
        				
        			</table>
        			<div class="roee-md">
        				<p>1. This agreement and order relate to the property whose details are listed in the appendix below as well as to any other real estate transaction that will develop from this order, and is an integral part of the brokerage order agreement number 00000 dated <?php echo date("Y-m-d"); ?> Real estate brokerage and forms an integral part of this agreement (hereinafter: "the property") or is authorized by the owners of the rights in the property to the seller and / or to rent and / or deliver it at a key fee. The client declares that it has been clarified to him that the details of the property will be communicated to buyers / tenants / realtors in order to promote the marketing of the property and that the property details provided to the broker and listed in the appendix are the material, correct and complete details.</p>
                        <p>2 The client undertakes to present to the broker immediately the wording of a registration or approval of rights from the manager and / or the mortgage company up to date. The client hereby beautifies the power of the realtor or his inability to contact and receive in his name and for him all the knowledge necessary to market the property from any authority, office, municipality, person or body and pass it on to potential clients for marketing the property.</p>
                        <p>3. The client orders brokerage services from the broker and authorizes him to act exclusively for him to market the property for the period from <?php echo $agreement->from_date ?> to <?php echo $agreement->untill ?> (hereinafter: "the exclusivity period"). At the end of the exclusivity period, this agreement will constitute an order, without the exclusive exclusivity, of the client from the intermediary. The broker will then be able to market the property and if the property is purchased as a result of the broker s treatment, the broker will be entitled to a brokerage fee as specified below in section 5.</p>
                        <p>4. The customer pays a broker for brokerage activities, immediately upon the signing of a binding agreement for the sale or rental property, brokerage fees at the rates specified in paragraph 5 below, in any case if the agreement is signed a) during the exclusivity period (even if sold / rented than through intermediary) in ) After the period of exclusivity with an entity, who became aware of the property, or the property was presented to him, during the period of exclusivity.</p>
                        <p>5. The brokerage fee that the client hereby undertakes to pay, in accordance with the provisions of section 4 above will be as detailed and agreed in the brokerage order agreement number 00000 dated <?php echo date("Y-m-d"); ?>.</p>
                        <p>6. The client declares that he is aware that the brokerage fee will be charged by the broker On behalf of the real estate agent H.M.</p>
                        <p>7. The client confirms that he was recommended by the broker to seek the services of a lawyer and / or other experts before the matter and the need during the transaction.</p>
                        <p>8. The broker will coordinate all actions for the marketing of the property during the exclusivity period. The client undertakes that during this period he will not request and / or receive brokerage services for the marketing of the property from any other broker and that any contact and / or negotiations between him and other brokers and / or designated buyers and / or tenants will be made solely through and through the broker  The client declares that he is aware that a breach of this section may impair the broker s ability to act as the effective agent in the transaction, and that in the event of a breach the broker will be entitled to compensation for the full commission due to him, in addition to covering any other damages.</p>
                        <p>9. The client will bring the fact of his engagement in this agreement to the attention of those who apply to him directly and especially to any other broker and / or buyer and / or tenant with whom he was previously associated. It will also bring to an immediate termination any existing obligation that contradicts its obligations under this Agreement.</p>
                        <p>10. The realtor undertakes the client to give the marketing efforts of the property top priority, act diligently, with dedication and loyalty and share realtors and other real estate agencies in finding interested buyers and build and execute a marketing and advertising plan to promote the marketing of the property. All this in accordance with his professional judgment and in accordance with the specifications in the marketing actions form attached to this order.</p>
                        <p>11. It is understood and known to the client that the client appoints the broker to be the active and sole entity that will act to promote the sale and / or rental of the property, then any contact and / or transaction that he links is the result of the broker s activity and efficiency only.</p>
        			    <p><?php echo $agreement->comments ?></p>
        			</div>
        			
        			</div>
        			<div class="row">
        			    <div class="date-sign col-md-6">
            			    <?php echo date('Y-m-d', strtotime($signed->created_at))?>
            				<p>______________________________</p>
            				<p>date and time</p>
            			</div>
            			<div class="date-time col-md-6">
            				<img src="<?php echo base_url() ?>uploads/signature/<?php echo $signed->signature ?>" width="180px"/>
            				<p>______________________________</p>
            				<p>signature</p>
            			</div>
        			</div>
        		</div>
        		
        	</div>
	 <?php else:?>
	          <div class="new-modal">
        	<div class="container" style="background:white">
        		<div class="row">
        			<div class="roee">
        				<h6><?php echo $user->username; ?></h6>
        				<p>:Brokerage License No</p>
        				<p><?php echo $user->phone; ?></p>
        			</div>
        			<div class="ordering">
        				<h4>Cooperation agreement between brokers</h4>
        				<h4>No. <span>0000</span><small> * Numbering will be displayed after production</small></h4>
        				<p>Customer Name:<u> <?php echo $client->name; ?></u> ID: <u><?php echo $client->id; ?></u> Mail:<u> <?php echo $client->email; ?></u> Phone:<u> <?php echo $client->phone; ?></u></p>
        			</div>
        			<table>
        				<p class="text-lf">Property Details:</p>
        				<?php
        				if($agreement->rent == 0):
        				?>
        				<?php 
        			
        				foreach($propert as $k=> $prop){
        				?>
        				<tr>
        					<th>Address</th>
    					    <th>Asking Purchase price (₪)</th>
    					    <th>Property Type</th>
        				</tr>
        				<tr>
        					<td><?php echo $prop[0]['street']; ?>, <?php echo $prop[0]['city']; ?></td>
        					<td><?php echo $asking_price[$k]; ?></td>
        					<td><?php echo $prop[0]['prop_type']; ?></td>
        				</tr>
        				<?php
        				
        				}
        				?>
        				<?php
        				elseif($agreement->buy == 0):
        				?>
        				<?php 
        			
        				foreach($propert as $k=> $prop){
        				?>
        				<tr>
        					<th>Address</th>
    					    <th>Asking rental price (₪)</th>
    					    <th>Property Type</th>
        				</tr>
        				<tr>
        					<td><?php echo $prop[0]['street']; ?>, <?php echo $prop[0]['city']; ?></td>
        					<td><?php echo $requested_rent[$k]; ?></td>
        					<td><?php echo $prop[0]['prop_type']; ?></td>
        				</tr>
        				<?php
        				
        				}
        				?>
        				<?php
        				else:
        				?>
        				<?php 
        			
        				foreach($propert as $k=> $prop){
        				?>
        				<tr>
        					<th>Address</th>
    					    <th>Asking rental price (₪)</th>
    					    <th>Asking Purchase price (₪)</th>
    					    <th>Property Type</th>
        				</tr>
        				<tr>
        					<td><?php echo $prop[0]['street']; ?>, <?php echo $prop[0]['city']; ?></td>
        					<td><?php echo $requested_rent[$k]; ?></td>
        					<td><?php echo $asking_price[$k]; ?></td>
        					<td><?php echo $prop[0]['prop_type']; ?></td>
        				</tr>
        				<?php
        				
        				}
        				?>
        				<?php endif; ?>
        				
        			</table>
        			<div class="roee-md">
        			<?php if($agreement->commission_type == 'shared_pot'):?>
                              <p><b>Type of partnership</b> : joint fund (add together the seller's commission, and the buyer's commission, and each broker receives half)</p>
                              <p>1.The parties will act out of loyalty, fairness and transparency for cooperation.</p>
                              <p>2.The parties will not give the details of the property / buyer to another broker, unless they receive written approval.</p>
                              <p>3.All contact with the buyer / owner of property would be through a representative represents (unless agreed otherwise in writing).</p>
                              <p>4.This Agreement applies to any transaction, which will be created above the property with more involvement Mtoocntzig (third party).</p>
                              <p>5.This Agreement is effective on assets Above only.</p>
                              <p>6.VAT will be added to all amounts specified above as required by law.</p>
                              <p><?php echo $agreement->comments ?></p>
                        <?php elseif($agreement->commission_type == 'own_client'):?>
                              <p><b>Type of partnership</b> : Each of his client: (Each broker charges his client, what he agreed with his client)</p>
                              <p>1.The parties will act out of loyalty, fairness and transparency for cooperation.</p>
                              <p>2.The parties will not give the details of the property / buyer to another broker, unless they receive written approval.</p>
                              <p>3.All contact with the buyer / owner of property would be through a representative represents (unless agreed otherwise in writing).</p>
                              <p>4.This Agreement applies to any transaction, which will be created above the property with more involvement Mtoocntzig (third party).</p>
                              <p>5.This Agreement is effective on assets Above only.</p>
                              <p>6.VAT will be added to all amounts specified above as required by law.</p>
                              <p><?php echo $agreement->comments ?></p>
                        <?php elseif($agreement->commission_type == 'buyer_to_seller'):?>
                            <?php if($agreement->months_of_rent == null || $agreement->months_of_rent == ""):?>
                               <p><b>Type of partnership</b> : The buyer's broker transfers <?php echo $agreement->percent ?>% to the seller's broker</p> 
                            <?php else: ?>
                                <p><b>Type of partnership</b> : The buyer's broker transfers <?php echo $agreement->months_of_rent ?> month's rent to the seller's broker</p>
                            <?php endif; ?>
                              <p>1.The parties will act out of loyalty, fairness and transparency for cooperation.</p>
                              <p>2.The parties will not give the details of the property / buyer to another broker, unless they receive written approval.</p>
                              <p>3.All contact with the buyer / owner of property would be through a representative represents (unless agreed otherwise in writing).</p>
                              <p>4.This Agreement applies to any transaction, which will be created above the property with more involvement Mtoocntzig (third party).</p>
                              <p>5.This Agreement is effective on assets Above only.</p>
                              <p>6.VAT will be added to all amounts specified above as required by law.</p>
                              <p><?php echo $agreement->comments ?></p>
                        <?php elseif($agreement->commission_type == 'another_summary'): ?>
                              <p><b>Type of partnership</b> : <?php echo $agreement->another_summ ?> </p>
                              <p>1.The parties will act out of loyalty, fairness and transparency for cooperation.</p>
                              <p>2.The parties will not give the details of the property / buyer to another broker, unless they receive written approval.</p>
                              <p>3.All contact with the buyer / owner of property would be through a representative represents (unless agreed otherwise in writing).</p>
                              <p>4.This Agreement applies to any transaction, which will be created above the property with more involvement Mtoocntzig (third party).</p>
                              <p>5.This Agreement is effective on assets Above only.</p>
                              <p>6.VAT will be added to all amounts specified above as required by law.</p>
                              <p><?php echo $agreement->comments ?></p>
                        <?php endif; ?>
        			</div>
        		
        			</div>
    				<div class="row">
        			    <div class="date-sign col-md-6">
            			    <?php echo date('Y-m-d', strtotime($signed->created_at))?>
            				<p>______________________________</p>
            				<p>date and time</p>
            			</div>
            			<div class="date-time col-md-6">
            				<img src="<?php echo base_url() ?>uploads/signature/<?php echo $signed->signature ?>" width="180px"/>
            				<p>______________________________</p>
            				<p>signature</p>
            			</div>
        			</div>
        		</div>
        		
        	</div>
	 <?php endif;?>
       
    </body>
</html>