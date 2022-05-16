<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header">
        <div class="left">
            <h3 class="box-title"><?=$title;?></h3>
            <span style="padding:10px"><a href="javascript:void(0)" class="getrecord" <?php if(!isset($monthly)):?>style="color: #fff;background: #58aada;padding: 8px 15px;border-radius: 4px;" <?php endif ?> data-type="yearly">Yearly</a></span>
            <span style="padding:10px"><a href="javascript:void(0)" class="getrecord monthly" <?php if(isset($monthly)):?>style="color: #fff;background: #58aada;padding: 8px 15px;border-radius: 4px;" <?php endif ?> data-type="monthly">Monthly</a></span>
            <span style="padding:10px"><a href="javascript:void(0)" class="getrecord custom" data-type="custom">Custom</a></span>
        </div>
       <div class="right">
           <div class="form-group" style="margin-right:50px;">
               
                <input type="text" readonly class="yearpicker" <?php if(isset($monthly)):?>style="display:none" <?php endif ?> name="from_date">
                <input type="text" readonly value="<?= date("m-Y") ?>"  class="monthYear" <?php if(!isset($monthly)):?>style="display:none" <?php endif ?>>
                <div class="row">
                    <div class="col-md-6">
                        <input type="date" value="<?= date('Y-m-d'); ?>" name="custom1" class="custom1 getrecords" style="display:none">
                    </div>
                    <div class="col-md-6">
                        <input type="date" value="<?= date('Y-m-d'); ?>" name="custom2" class="custom2 getrecords" style="display:none">
                    </div>
                </div>
           </div>
        </div>
    </div><hr>
    <!-- /.box-header -->

    <!-- include message block -->
    <div class="col-sm-12">
        <?php $this->load->view('admin/includes/_messages'); ?>
    </div>

    <div class="box-body">
       
        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    
                    <table class="table table-bordered table-striped dataTable" id="cs_datatable" role="grid"
                           aria-describedby="example1_info">
                        <thead>
                        <tr role="row">
                            <th width="20"><?= trans('id') ?></th>
                             <th width="20">Apartment name</th>
                             <th>Client email</th>
                             <th><?= trans('payment') ?></th>
                              <th><?= trans('added_date') ?></th>
                             <!--<th>Invoice Send</th>-->
                             <!-- <th>Mail</th>-->
                            <th class="max-width-120">Options</th>
                        </tr>
                        </thead>
                        <tbody id="firstTable">

                        <?php
                        if(isset($invoices)):
                         foreach($invoices as $item):
                            
                          ?>
                            <tr>
                                <td><?=$item->id;?></td>
                                <td><?=$item->title;?></td>
                                <td><?=$item->email;?></td>
                                <td><?=$item->payment;?></td>
                                <td><?=$item->created_at;?></td>
                                <!--<td>-->
                                <!--<a class="label label-success snedmilbt" href="<?php echo base_url(); ?>admin/invoice-sendmail/<?=$item->id;?>">-->
                                <!--Invoice Send-->
                                <!--</a>-->
                                <!--</td>-->
                                <!--<td>-->
                                <!--    <?php if ($item->send_mail == 1): ?>-->
                                <!--       <label class="label label-danger">No Send Mail</label>-->
                                <!--    <?php else: ?>-->
                                <!--          <label class="label label-success">Done Send Mail</label>-->
                                <!--    <?php endif; ?>-->
                                <!--</td>-->
                               <td>
                                    <!-- form delete contact messages -->
                                    <?php echo form_open('invoices/delete_post'); ?>

                                        <input type="hidden" name="id" value="<?php echo html_escape($item->id); ?>">

                                        <div class="dropdown">
                                            <button class="btn bg-purple dropdown-toggle btn-select-option"
                                                    type="button"
                                                    data-toggle="dropdown">Select an option
                                                <span class="caret"></span>
                                            </button>

                                            <ul class="dropdown-menu">
                                            <!--<li>-->
                                            <!--<a class="edituser" href="<?php echo base_url(); ?>admin/invoice-send-mail/<?=$item->id;?>">-->
                                            <!--<i class="fa fa-envelope"></i>-->
                                            <!--    Send Mail-->
                                            <!--</a>-->
                                            <!--</li>-->
                                            <!-- <li>-->
                                            <!--<a class="edituser" href="<?php echo base_url(); ?>admin/invoice-details/<?=$item->id;?>">-->
                                            <!--<i class="fa fa-eye"></i>-->
                                            <!--    Views-->
                                            <!--</a>-->
                                            <!--</li>-->
                                            <!--    <?php if(is_admin()): ?>-->
                                            <!--    <li>-->
                                            <!--        <a class="p0">-->
                                            <!--            <button type="submit" class="btn-list-button"-->
                                            <!--                    onclick="return confirm('Are you sure you want to delete this message?');">-->
                                            <!--                <i class="fa fa-trash i-delete"></i>Delete-->
                                            <!--            </button>-->
                                            <!--        </a>-->
                                            <!--    </li>-->
                                            <!--<?php endif; ?>-->
                                            </ul>
                                        </div>
                                        <?php echo form_close(); ?><!-- form end -->
                                </td>
                            </tr>

                        <?php 
                        endforeach; 
                    else:
                        echo "No Found Data.";
                    endif;
                        ?>

                        </tbody>
                    </table>
                    
                   
                </div>
            </div>
        </div>
    </div><!-- /.box-body -->
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<!-- Moment Js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<!-- Year Picker CSS -->
<link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/yearpicker.css" />
<!-- Year Picker Js -->
<script src="<?= base_url() ?>assets/admin/js/yearpicker.js"></script>

<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.js"></script>-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/base/jquery-ui.css">
   
<style>
      .ui-datepicker-calendar{
        display: none;
        }
        .ui-datepicker select.ui-datepicker-month,
        .ui-datepicker select.ui-datepicker-year {
            color:red!important;
        }
        
</style>
<script>
 
     $('.getrecord').on('click',function(){
        var type = $(this).data('type');
       $('.getrecord').css('color','#72afd2');
        $(this).css('color','red');
        if(type == 'yearly'){
            // $('.yearly').addClass('active');
            var year = $('.yearpicker').val();
            $('.yearpicker').css('display','block');
            $('.monthYear').css('display','none');
            $('.custom1').css('display','none');
            $('.custom2').css('display','none');
        }
        else if(type == "monthly"){
            // $('.monthly').addClass("active");
            $('.yearpicker').css('display','none');
            $('.monthYear').css('display','block');
            $('.custom1').css('display','none');
            $('.custom2').css('display','none');
            var monthYear = $('.monthYear').val();
        }
        else if(type == "custom"){
            //  $('.custom').addClass('active');
            $('.yearpicker').css('display','none');
            $('.monthYear').css('display','none');
            $('.custom1').css('display','block');
            $('.custom2').css('display','block');
            var custom1 = $('.custom1').val();
            var custom2 = $('.custom2').val();
            if(new Date(custom1) > new Date(custom2))
            {
                var custom1 = custom2;
                $('.custom1').val(custom2);
            }
        }else{
            
        }
        $.ajax({
                type: "POST",
                url: base_url + 'invoices/index/'+type,
                data:{type:type, year:year,monthYear:monthYear,custom1:custom1,custom2:custom2},
                success:function(data){
                  var result = JSON.parse(data);
                $('#firstTable').html(' ');
                    if(result.length > 0){
                        $.each(result, function (key, value) 
                      {
                         $('#firstTable').append('<tr> <td>' + value.id + '</td> <td>' + value.title + '</td> <td>' + value.email + '</td> <td>' + value.payment + '</td> <td>' + value.created_at + '</td> <td> <input type="hidden" name="id" value=""><div class="dropdown"> <button class="btn bg-purple dropdown-toggle btn-select-option" type="button" data-toggle="dropdown">Select an option <span class="caret"></span> </button><ul class="dropdown-menu"><li> <a class="edituser" href=""> <i class="fa fa-envelope"></i> Send Mail </a></li><li> <a class="edituser" href=""> <i class="fa fa-eye"></i> Views </a></li><li> <a class="p0"> <button type="submit" class="btn-list-button" onclick="return confirm("Are you sure you want to delete this message?");"> <i class="fa fa-trash i-delete"></i>Delete </button> </a></li> </ul></div> </td> </tr>');
                      })
                    }else{
                        $('#firstTable').html('<tr><td style="text-align:center" colspan="6">No record found<td><tr>');
                    }
                
                }
            });
    });
    
    $(".yearpicker").yearpicker({
      year:new Date().getFullYear(),
      startYear: 2021,
      endYear : new Date().getFullYear() + 10,
    });
        
     $('.yearpicker').on('change',function(){
        var type = $('.getrecord').data('type');
        var year = $('.yearpicker').val();
        // var monthYear = $('.monthYear').val();
        $.ajax({
                type: "POST",
                url: base_url + 'invoices/index/'+type,
                data:{type:type, year:year},
                success:function(data){
                  var result = JSON.parse(data);
                 $('#firstTable').html(' ');
                    if(result.length > 0){
                        $.each(result, function (key, value) 
                      {
                         $('#firstTable').append('<tr> <td>' + value.id + '</td> <td>' + value.title + '</td> <td>' + value.email + '</td> <td>' + value.payment + '</td> <td>' + value.created_at + '</td> <td> <input type="hidden" name="id" value=""><div class="dropdown"> <button class="btn bg-purple dropdown-toggle btn-select-option" type="button" data-toggle="dropdown">Select an option <span class="caret"></span> </button><ul class="dropdown-menu"><li> <a class="edituser" href=""> <i class="fa fa-envelope"></i> Send Mail </a></li><li> <a class="edituser" href=""> <i class="fa fa-eye"></i> Views </a></li><li> <a class="p0"> <button type="submit" class="btn-list-button" onclick="return confirm("Are you sure you want to delete this message?");"> <i class="fa fa-trash i-delete"></i>Delete </button> </a></li> </ul></div> </td> </tr>');
                      })
                    }else{
                        $('#firstTable').html('<tr><td style="text-align:center" colspan="6">No record found<td><tr>');
                    }
                }
            });
    });
    $('.getrecords').on('change',function(){
        var type = 'custom';
        var custom1 = $('.custom1').val();
        var custom2 = $('.custom2').val();
        if(new Date(custom1) > new Date(custom2))
        {
            var custom1 = custom2;
            $('.custom1').val(custom2);
        }
        $.ajax({
                type: "POST",
                url: base_url + 'invoices/index/'+type,
                data:{type:type, custom1:custom1,custom2:custom2},
                success:function(data){
                  var result = JSON.parse(data);
                 $('#firstTable').html(' ');
                    if(result.length > 0){
                        $.each(result, function (key, value) 
                      {
                         $('#firstTable').append('<tr> <td>' + value.id + '</td> <td>' + value.title + '</td> <td>' + value.email + '</td> <td>' + value.payment + '</td> <td>' + value.created_at + '</td> <td> <input type="hidden" name="id" value=""><div class="dropdown"> <button class="btn bg-purple dropdown-toggle btn-select-option" type="button" data-toggle="dropdown">Select an option <span class="caret"></span> </button><ul class="dropdown-menu"><li> <a class="edituser" href=""> <i class="fa fa-envelope"></i> Send Mail </a></li><li> <a class="edituser" href=""> <i class="fa fa-eye"></i> Views </a></li><li> <a class="p0"> <button type="submit" class="btn-list-button" onclick="return confirm("Are you sure you want to delete this message?");"> <i class="fa fa-trash i-delete"></i>Delete </button> </a></li> </ul></div> </td> </tr>');
                      })
                    }else{
                        $('#firstTable').html('<tr><td style="text-align:center" colspan="6">No record found<td><tr>');
                    }
                }
            });
    });

 $(function() {
        $('.monthYear').datepicker( {
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            dateFormat: 'mm-yy',
           
            onClose: function(dateText, inst) { 
                var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                $(this).datepicker('setDate', new Date(year, month, 1));
                var type = 'monthly';
                var monthYear = $('.monthYear').val();
                $.ajax({
                        type: "POST",
                        url: base_url + 'invoices/index/'+type,
                        data:{type:type,monthYear:monthYear},
                        success:function(data){
                          var result = JSON.parse(data);
                         $('#firstTable').html(' ');
                               if(result.length > 0){
                                $.each(result, function (key, value) 
                                  {
                                     $('#firstTable').append('<tr> <td>' + value.id + '</td> <td>' + value.title + '</td> <td>' + value.email + '</td> <td>' + value.payment + '</td> <td>' + value.created_at + '</td> <td> <input type="hidden" name="id" value=""><div class="dropdown"> <button class="btn bg-purple dropdown-toggle btn-select-option" type="button" data-toggle="dropdown">Select an option <span class="caret"></span> </button><ul class="dropdown-menu"><li> <a class="edituser" href=""> <i class="fa fa-envelope"></i> Send Mail </a></li><li> <a class="edituser" href=""> <i class="fa fa-eye"></i> Views </a></li><li> <a class="p0"> <button type="submit" class="btn-list-button" onclick="return confirm("Are you sure you want to delete this message?");"> <i class="fa fa-trash i-delete"></i>Delete </button> </a></li> </ul></div> </td> </tr>');
                                  })
                                }else{
                                    $('#firstTable').html('<tr><td style="text-align:center" colspan="6">No record found<td><tr>');
                                }
                        }
                    });
            },
           
        });
    });

</script>