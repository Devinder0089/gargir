<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row secfullrow secfullrowinvos">
    <div class="col-sm-12">
        <div class="box box-primary">

            <div class="box-header">
                <div class="left">
                    <h3 class="box-title"><?php echo $title; ?></h3>
                    <br>
                    <small>You can <?php echo $title; ?> a new  from this form</small>
                </div>
                <div class="right">
                    <a href="<?php echo base_url(); ?>admin/invoices" class="btn btn-sm btn-success btn-add-new">
                        <i class="fa fa-bars"></i>
                        View
                    </a>
                </div>
            </div><!-- /.box-header -->

            <!-- form start -->
            <?php echo form_open_multipart('admin/add-invoices-post',['class'=>'invoicesfm']); ?>

            <div class="box-body">
                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages'); ?>

               
            <div class="row rowsecfm">
                <h2 class="namefm">INVOICE</h2>
                 <input type="hidden"name="name" value="Invoice">
            </div>

            <div class="row rowsecfm">
                <div class="col-sm-6 col-lg-6 form-group">
                <label class="control-label"><i class="red">*</i>Invoice Number</label>
                <input type="text" class="form-control inputtitle" name="dnumber" value="#<?=rand(10,100000000);?>" disabled>
                     <input type="hidden" class="form-control inputtitle" name="number" value="<?=rand(10,100000000);?>">
                </div>
                <div class="col-sm-6 col-lg-6 form-group">
                <label class="control-label"><i class="red">*</i>
                Order Date</label>
                <input type="text" class="form-control inputtitle" name="date_issue" value="<?=date('d/m/Y');?>" required>
                </div>
            </div>
        
            <div class="row rowsecfm">
                <div class="col-sm-12 col-lg-12 form-group">
                 <label class="control-label">Select Membership</label>
                    <select name="pid" class="form-control selectformcontrol">
                        <?php 
                        if(isset($membership)){
                        foreach($membership as $vl):
                            ?>
                        <option value="<?=$vl->id;?>"><?=$vl->name;?></option>
                        <?php 
                    endforeach;  
                    } ?>
                    </select>
                </div>

            </div>
            
             <div class="row rowsecfm invcmaincontent">
                <div class="col-sm-6 col-lg-6 form-group">
                    <h2 class="col-sm-12 col-lg-12 control-label titlesubms">From</h2>

                <div class="col-sm-12 col-lg-12 form-group invcleftcontent">
                <label class="control-label"><i class="red">*</i>Company Name</label>
                <input type="text" class="form-control inputtitle" name="company_name" value="Nadlanpro" required>
                </div>

                 <div class="col-sm-12 col-lg-12 form-group invcleftcontent">
                <label class="control-label"><i class="red">*</i>Email</label>
                <input type="text" class="form-control inputtitle" name="email" required>
                </div>
                
                <div class="col-sm-12 col-lg-12 form-group invcleftcontent">
                <label class="control-label"><i class="red">*</i>Phone</label>
                <input type="text" class="form-control inputtitle" name="phone" required>
                </div>
                <div class="col-sm-12 col-lg-12 form-group invcleftcontent">
                <label class="control-label"><i class="red">*</i>Country Name</label>
                <input type="text" class="form-control inputtitle" name="country" required>
                </div>
                 <div class="col-sm-12 col-lg-12 form-group invcleftcontent">
                <label class="control-label"><i class="red">*</i>Zip code</label>
                <input type="text" class="form-control inputtitle" name="zipcode" required>
                </div>
              
                <div class="col-sm-12 col-lg-12 form-group">
                <label class="control-label">Address</label>
                <textarea class="form-control text-area input" name="address"></textarea>
                </div>

                </div>
            <!---// left------>
           
                 <div class="col-sm-6 col-lg-6 form-group invcrightcontent">
                    <h2 class="col-sm-12 col-lg-12 control-label titlesum">Bill To</h2>

                 <div class="col-sm-12 col-lg-12 form-group invcleftcontent">
                <label class="control-label"><i class="red">*</i>Client Name</label>
                <input type="text" class="form-control inputtitle" name="bill_name" required>
                </div>


                 <div class="col-sm-12 col-lg-12 form-group invcleftcontent">
                <label class="control-label"><i class="red">*</i>Email</label>
                <input type="text" class="form-control inputtitle" name="bill_email" required>
                </div>
                
                <div class="col-sm-12 col-lg-12 form-group invcleftcontent">
                <label class="control-label"><i class="red">*</i>Phone</label>
                <input type="text" class="form-control inputtitle" name="bill_phone" required>
                </div>
                  <div class="col-sm-12 col-lg-12 form-group invcleftcontent">
                <label class="control-label"><i class="red">*</i>Country Name</label>
                <input type="text" class="form-control inputtitle" name="bill_country" required>
                </div>
                 <div class="col-sm-12 col-lg-12 form-group invcleftcontent">
                <label class="control-label"><i class="red">*</i>Zip code</label>
                <input type="text" class="form-control inputtitle" name="bill_zipcode" required>
                </div>
        
                <div class="col-sm-12 col-lg-12 form-group">
                <label class="control-label">Address</label>
                <textarea class="form-control text-area input" name="bill_address"></textarea>
                </div>

                </div><!---// right------>
            </div>
      
      <div class="row rowsecfm">
                <div class="col-sm-6 col-lg-6 form-group">
                <label class="control-label"><i class="red">*</i>GST Number</label>
                <input type="text" class="form-control inputtitle" name="gst_number" value="10AABCU9603R1Z2" required>
                </div>

                
                  <div class="col-sm-6 col-lg-6 form-group">
                <label class="control-label"><i class="red">*</i>GST Charges</label>
                <input type="text" class="form-control inputtitle" name="gst_charges" value="0.00" required>
                </div>
            </div>  

      <div class="row rowsecfm">
           <div class="col-sm-6 col-lg-6 form-group">
                <label class="control-label"><i class="red">*</i>Invoice total</label>
                <input type="text" class="form-control inputtitle" name="invoice_total" value="0.00" required>
                </div>
                
                <div class="col-sm-6 col-lg-6 form-group">
                <label class="control-label"><i class="red">*</i>Sub Total</label>
                <input type="text" class="form-control inputtitle" name="subtotal" value="0.00" required>
                </div>

            </div> 

            <div class="row rowsecfm">
                <div class="col-sm-6 col-lg-6 form-group">
                <label class="control-label"><i class="red">*</i>Tax Rate %</label>
                <input type="text" class="form-control inputtitle" name="tax_rate" value="0.00" required>
                </div>
                <div class="col-sm-6 col-lg-6 form-group">
                <label class="control-label"><i class="red">*</i>Total Tax</label>
                <input type="text" class="form-control inputtitle" name="total_tax" value="0.00" required>
                </div>
            </div>

		
    <div class="row rowsecfm">
                  <div class="col-sm-12 col-lg-12 form-group">
                <label class="control-label"><i class="red">*</i>Discount</label>
                <input type="text" class="form-control inputtitle" name="discount" value="0.00" required>
                </div>
            
        </div>
            
	    <div class="row rowsecfm">
				<div class="col-sm-6 col-lg-6 form-group">
					<label class="control-label"><i class="red">*</i>Signature
						</label>
						<input type="file" class="form-control inputtitle" name="signatcherimg" required>
				</div>
			<div class="col-sm-6 col-lg-6 form-group">
			    <label class="control-label"><i class="red">*</i>Logo</label>
				<input type="file" class="form-control inputtitle" name="logo" required>
			</div>

            
		</div>

        <div class="col-sm-12 col-lg-12 form-group">
        <label class="control-label">Discription</label>
        <textarea class="form-control text-area input" name="option"></textarea>
        </div>

            <!-- /.box-body -->
            <div class="box-footer">
            <button type="submit" name="savebt" class="btn btn-primary pull-right">Keeping</button>
            </div>
             <input type="hidden" name="uid" value="<?=$user->id;?>">
            <!-- /.box-footer -->
            <?php echo form_close(); ?><!-- form end -->

        </div>
    </div>
</div>
