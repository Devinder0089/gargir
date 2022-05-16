<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo html_escape($title); ?> - <?php echo html_escape($settings->site_title); ?></title>
<link rel="shortcut icon" type="image/png" href="<?php echo get_favicon($vsettings); ?>"/>
<head>
    <style>
        body{
            background-color: #F6F6F6; 
            margin: 0;
            padding: 0;
        }
        h1,h2,h3,h4,h5,h6{
            margin: 0;
            padding: 0;
        }
        p{
            margin: 0;
            padding: 0;
        }
        .container{
            width: 80%;
            margin-right: auto;
            margin-left: auto;
        }
    .brand-section {
    background-color: #886c88;
    padding: 10px 40px;
}
        .logo{
            width: 50%;
        }

        .row{
            display: flex;
            flex-wrap: wrap;
        }
        .col-6{
            width: 50%;
            flex: 0 0 auto;
        }
        .text-white{
            color: #fff;
        }
        .company-details{
            float: right;
            text-align: right;
        }
        .body-section{
            padding: 16px;
            border: 1px solid gray;
        }
        .heading{
            font-size: 20px;
            margin-bottom: 08px;
        }
        .sub-heading{
            color: #262626;
            margin-bottom: 05px;
        }
        table{
            background-color: #fff;
            width: 100%;
            border-collapse: collapse;
        }
        table thead tr{
            border: 1px solid #111;
            background-color: #f2f2f2;
        }
        h2.headingg {
    color: white;
        }
        table td {
            vertical-align: middle !important;
            text-align: center;
        }
        table th, table td {
            padding-top: 08px;
            padding-bottom: 08px;
        }
        .table-bordered{
            box-shadow: 0px 0px 5px 0.5px gray;
        }
        .table-bordered td, .table-bordered th {
            border: 1px solid #dee2e6;
        }
        .text-right{
            text-align: end;
        }
        .w-20{
            width: 20%;
        }
        .float-right{
            float: right;
        }
        .colsecitonleft{
            width:100%;
             display:inline-block;
        } 
         .colsecitonleft>h5{
              width:50%;
            text-align:right;
            color:#fff;
            display:inline-block;
        }
           .colsecitonleft>p{
                width:50%;
            text-align:left;
            display:inline-block;
        }
        .invisimgresponsive>p{
           margin:0px;
           padding:10px 0 0 0;
        }
        
        .invisimgresponsive{
            width:50px;
            height:40px;
            margin:0px;
            padding:0px;
             display:inline-block;
        }
        
        tbody.abc {
            float: right;
            padding-right: 42px;
        }
        .secleft{
            text-align: left;
        }
        .secright{
            text-align: left;
        } 
        .secright>p{
            text-align: right;
            padding: 0 10px 0 0;
        }
         .secright>h5{
            text-align: left;
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="brand-section">
            <div class="row">
        <div class=" colsecitonleft seinvisimgresponsive">
                <p>
                <?php if($invoices->logo){?>            
                <img src="<?= base_url().$invoices->logo;?>" class="invisimgresponsive" style="width:50px;">
                <?php }else{ ?>
                <img src="<?php echo base_url(); ?>uploads/images/pdf1.png" class="invisimgresponsive" style="width:50px;">
                <?php } ?> 
                </p>
                <h5>Invoice No.: <?=$invoices->number;?></h5>
            </div>
              
            </div>
        </div>

        <div class="body-section">
            <div class="row">
                <div class="col-12">
                    <h2 class="heading">Invoice Date.:<?=$invoices->date_issue;?></h2>
                    <p class="sub-heading">Company Name: <?=$invoices->company_name;?></p>
                    <p class="sub-heading">Email Address: <?=$invoices->email;?> </p>
                    <p class="sub-heading">Phone: <?=$invoices->phone;?> </p>
                    <p class="sub-heading">Country Name: <?=$invoices->country;?> </p>
                    <p class="sub-heading">Zip Code: <?=$invoices->zipcode;?> </p>
                    <p class="sub-heading">Address: <?=$invoices->address;?> </p>
                    </div>
            </div>      
        </div>
         <div class="body-section">
            <div class="row">
                <div class="col-12">
                    <h2 class="heading">Bill To :.<?=$invoices->bill_name;?> </h2>
                    <p class="sub-heading">Date: <?=$invoices->created_at;?> </p>
                    <p class="sub-heading">Email Address: <?=$invoices->bill_email;?> </p>
                    <p class="sub-heading">Phone: <?=$invoices->bill_phone;?> </p>
                    <p class="sub-heading">Country Name: <?=$invoices->bill_country;?> </p>
                    <p class="sub-heading">Zip Code: <?=$invoices->bill_zipcode;?> </p>
                    <p class="sub-heading">Address: <?=$invoices->bill_address;?> </p>
                    </div>
            </div>      
        </div>
        <div class="body-section">
            <h3 class="heading"></h3>
            <br>
            <table class="table-bordered">
                <thead>
                    <tr>
                        <th>Discripation</th>
                        <th class="w-20">GST</th>
                        <th class="w-20"> GST Number</th>
                        <th class="w-20">Membeship Plan</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?=$invoices->bill_address;?></td>
                        <td><?=$invoices->gst_charges;?></td>
                        <td><?=$invoices->gst_number;?></td>
                        <td><?=$invoices->memb_name;?></td>
                    </tr>                                 
                </tbody>
            </table>
            <br>
            <table>
                    <tbody class="abc">
                     <tr>
                        <td class="secleft">
                        </td>
            
                        <td class="secright">
                        <h5>Sub Total</h5>
                        <p><?=$invoices->invoice_total;?></p>
                        </td>
                    </tr>
                        <tr>
                        <td class="secleft">
                        </td>
            
                        <td class="secright">
                        <h5>Tax</h5>
                        <p><?=$invoices->tax_rate;?></p>
                        </td>
                    </tr>
                                            <tr>
                        <td class="secleft">
                        </td>
            
                        <td class="secright">
                        <h5> Total Tax</h5>
                        <p><?=$invoices->total_tax;?></p>
                        </td>
                    </tr>
                        <tr>
                        <td class="secleft">
                        </td>
        
                        <td class="secright">
                        <h5>Disscount</h5>
                        <p><?=$invoices->discount;?></p>
                        </td>
                    </tr>
                        <tr>
                        <td class="secleft">
                      <img src="<?= base_url().$invoices->signatcherimg;?>" class="invisimgresponsive" style="width:50px;">
                        </td>
            
                        <td class="secright">
                        <h5>Invoice Total</h5>
                        <p><?=$invoices->invoice_total;?></p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>   
    </div>      

</body>
</html>
