<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="box secinvicedls">
    <div class="box-header">
        <div class="left">
            <h3 class="box-title"><?=$title;?></h3>
            <br>
            <small class="pull-left">You can see <?=$title;?> here</small>
        </div>
        <div class="right">
            <a href="<?php echo base_url(); ?>admin/invoices" class="btn btn-sm btn-success btn-add-new">
                <i class="fa fa-eye"></i>
               Invoice
            </a>
        </div>
    </div><!-- /.box-header -->
 
    <div class="box-body secinvoicedetails">  
              <?php
          if(isset($invoices)):              
           
            ?>
              <!--section start--> 
                <div class="row rowsecinvoice">
                    <div class="col-sm-6 col-lg-6 form-group inleft">
                            <h1>INVOICE</h1>
                    </div>
                <div class="col-sm-6 col-lg-6 control-label form-group inright">
                    <?php if($invoices->logo){?>            
                    <img src="<?= base_url().$invoices->logo;?>" class="img-responsive" style="width:150px;float:right">
                    <?php }else{ ?>
                    <img src="<?php echo base_url(); ?>uploads/images/pdf1.png" class="img-responsive" style="width:150px;float:right">
                    <?php } ?> 
                </div>
                </div>
           <!--section closed-->
            <div class="row rowsecmains">
                <div class="col-sm-6 col-lg-6 form-group">
                <div class="col-sm-6 col-lg-6 control-label titlesubms">
                <h4>Invoice Number:</h4>
                <p>              
                <?=$invoices->number;?>
                </p>
                </div>
                <div class="col-sm-6 col-lg-6 control-label titlesubms">
                <h4>Date Of Issue</h4>
                <p>              
                <?=$invoices->date_issue;?>
                </p>
                </div>
                </div>
                </div>
                </div>
             <div class="row rowsecfm invcmaincontent">
                <div class="col-sm-6 col-lg-6 form-group">
                    <h1 class="col-sm-12 col-lg-12 control-label titlesubms">From</h1>

                <div class="col-sm-12 col-lg-12 form-group invcleftcontent">
                <label class="control-label"><i class="red"></i>Company Name</label>
                <p>              
                <?=$invoices->company_name;?>
                </p>
                </div>
                 <div class="col-sm-12 col-lg-12 form-group invcleftcontent">
                <label class="control-label"><i class="red"></i>Email</label>
                <p>              
                <?=$invoices->email;?>
                </p>
                </div>
                
                <div class="col-sm-12 col-lg-12 form-group invcleftcontent">
                <label class="control-label"><i class="red"></i>Phone</label>
                 <p>              
                <?=$invoices->number;?>
                </p>
                </div>
                <div class="col-sm-12 col-lg-12 form-group invcleftcontent">
                <label class="control-label"><i class="red"></i>Country Name</label>
                 <p>              
                <?=$invoices->country;?>
                </p>
                </div>
                 <div class="col-sm-12 col-lg-12 form-group invcleftcontent">
                <label class="control-label"><i class="red"></i>Zip code</label>
                <p>              
                <?=$invoices->zipcode;?>
                </p>
                </div>
              
                <div class="col-sm-12 col-lg-12 form-group invcleftcontent">
                <label class="control-label">Address</label>
                <p>              
                <?=$invoices->address;?>
                </p>
                </div>

                </div>
            <!---// left------>
           
                 <div class="col-sm-6 col-lg-6 form-group invcrightcontent">
                    <h1 class="col-sm-12 col-lg-12 control-label titlesum">Bill To</h1>

                 <div class="col-sm-12 col-lg-12 form-group invcleftcontent">
                <label class="control-label"><i class="red"></i>Client Name</label>
              <p>              
                <?=$invoices->bill_name;?>
                </p>
                </div>


                 <div class="col-sm-12 col-lg-12 form-group invcleftcontent">
                <label class="control-label"><i class="red"></i>Email</label>
                     <p>              
                <?=$invoices->bill_email;?>
                </p>
                </div>               
                <div class="col-sm-12 col-lg-12 form-group invcleftcontent">
                <label class="control-label"><i class="red"></i>Phone</label>
                 <p>              
                <?=$invoices->bill_phone;?>
                </p>
                </div>
                  <div class="col-sm-12 col-lg-12 form-group invcleftcontent">
                <label class="control-label"><i class="red"></i>Country Name</label>
                  <p>              
                <?=$invoices->bill_country;?>
                </p>
                </div>
                 <div class="col-sm-12 col-lg-12 form-group invcleftcontent">
                <label class="control-label"><i class="red"></i>Zip code</label>
                   <p>              
                <?=$invoices->bill_zipcode;?>
                </p>
                </div>
       


            <!------------start ------------->
            <div class="col-sm-12 col-lg-12 form-group invcleftcontent">
            <label class="invoicetitle control-label">
            Address
            </label>
            <div class="invoicecontent">              
            <?=$invoices->bill_address;?>
            </div>
            </div>
    </div>

    <!------------start table------------->
    <table class="table rowsectable">
    <thead>
      <tr>
        <th>Membership Name</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?=$invoices->memb_name;?></td>
      </tr>

    </tbody>
  </table>
  <!------------end table------------->
    </div><!------------end row------------->


     <div class="row rowsecfm buttonsecin invcmaincontent">
        <div class="col-sm-6 col-lg-6  form-group invleftbuttom">
            <label class="col-sm-12 col-lg-12 invoicetitle incontrol-label">
            INVOICE TOTAL
            </label>
            <div class="col-sm-12 col-lg-12 invoicecontent">              
            <?=$invoices->invoice_total;?>
            </div>
             <label class="col-sm-12 col-lg-12 invoicetitle incontrol-label signatcherimgtitle">
            signatcherimg
            </label>
            <div class="col-sm-12 col-lg-12 invoicecontent signatcherimg">  
            <?php if($invoices->signatcherimg){?>            
             <img src="<?= base_url().$invoices->signatcherimg;?>" class="img-responsive" style="width:150px;float:left">
              <?php } ?>  
            </div>
            
        </div>
            <div class="col-sm-6 col-lg-6 form-group invrighttbttm">
            <!------------start ------------->
            <div class="col-sm-12 col-lg-12 form-group">
            <label class="invoicetitle control-label">
            GST Number
            </label>
            <div class="invoicecontent">              
            <?=$invoices->gst_number;?>
            </div>
            </div>
            <!------------end ------------->
            <!------------start ------------->
            <div class="col-sm-12 col-lg-12 form-group">
            <label class="invoicetitle control-label">
            Website
            </label>
            <div class="invoicecontent">              
            <?=$invoices->url;?>
            </div>
            </div>
            <!------------end ------------->        
            <!------------start ------------->
            <div class="col-sm-12 col-lg-12 form-group">
            <label class="invoicetitle control-label">
            SUBTOTAL
            </label>
            <div class="invoicecontent">              
            <?=$invoices->subtotal;?>
            </div>
            </div>
            <!------------end ------------->        
            <!------------start ------------->
            <div class="col-sm-12 col-lg-12 form-group">
            <label class="invoicetitle control-label">
            DISCOUNT
            </label>
            <div class="invoicecontent">              
            <?=$invoices->discount;?>
            </div>
            </div>
            <!------------end ------------->    
            <!------------start ------------->
            <div class="col-sm-12 col-lg-12 form-group">
            <label class="invoicetitle control-label">
            TAX RATE
            </label>
            <div class="invoicecontent">              
            <?=$invoices->total_tax;?>%
            </div>
            </div>
            <!------------end ------------->
            
            <!------------start ------------->
            <div class="col-sm-12 col-lg-12 form-group">
            <label class="invoicetitle control-label">
            TOTAL TAX
            </label>
            <div class="invoicecontent">              
            <?=$invoices->tax_rate;?>
            </div>
            </div>
            <!------------end ------------->
            
            <!------------start ------------->
            <div class="col-sm-12 col-lg-12 form-group">
            <label class="invoicetitle control-label">
            GST Charges
            </label>
            <div class="invoicecontent">              
            <?=$invoices->gst_charges;?>
            </div>
            </div>
            <!------------end ------------->

            <div class="col-sm-12 col-lg-12 form-group">
            <label class="invoicetitle control-label">
            Option
            </label>
            <div class="invoicecontent">              
            <?=$invoices->option;?>
            </div>
            </div>
            <!------------end ------------->
        </div>
    </div>
<!------------end row ------------->
            <?php
            endif;
            ?>
                                   
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div>