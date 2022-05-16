<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box">
    <div class="box-header">
           <div class="right">
            <a href="javascript:void(0)" class="btn btn-sm btn-success btn-add-new">
                <i class="fa fa-plus"></i>
                <?= trans('add_payment') ?>
            </a>
        </div>
    </div><!-- /.box-header -->

    <!-- include message block -->
    <div class="col-sm-12">
        <h5 class="message"></h5>
    </div>

    <div class="box-body">
        <div class="row">
              <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped dataTable" id="cs_datatable" role="grid"
                           aria-describedby="example1_info">
                        <tbody>
                        <tr role="row">
                            <th width="20"><?= trans('sale_in') ?></th>
                            <td width="20"><button class="bt btn-primary">$<?= $saled_in ?></button></td>
                        </tr>
                         <tr role="row">
                             <th width="20"><?= trans('total_paid_by_client') ?></th>
                            <td width="20"><button class="bt btn-success">$<?= $total_paid ?></button></td>
                        </tr>
                        <tr role="row">
                             <th width="20"><?= trans('total_debt') ?></th>
                            <td width="20"><button class="bt btn-danger">$<?= $total_debt ?></button></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped dataTable" id="cs_datatable" role="grid"
                           aria-describedby="example1_info">
                        <thead>
                        <tr role="row">
                            <th width="20"><?= trans('id') ?></th>
                            <th><?= trans('payment') ?></th>
                            <th><?= trans('payment_mode') ?></th>
                            <th><?= trans('added_date') ?></th>
                            <th><?= trans('status') ?></th>
                            <th class="max-width-120"><?= trans('options') ?></th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($payments as $k => $item): ?>
                            <tr>
                                <td><?=$item->id;?></td>
                                <td><?=$item->payment;?></td>
                                 <td><?=str_replace('_', ' ', $item->payment_mode);?></td>
                                <td><?=date('Y-m-d', strtotime($item->created_at));?></td>
                                 <td>
                                     <?php if($item->status == 1):?>
                                        <button class="label label-success"><?= trans('paid') ?></button>
                                    <?php elseif($item->status == 0):?>
                                        <button class="label label-danger"><?= trans('pending') ?></button>
                                     <?php endif;?>
                                 </td>
                               <td>
                                    <!-- form delete contact messages -->
                                        <input type="hidden" name="apartment_ids" value="<?= $item->apartment_id ?>"/>
                                        <div class="dropdown">
                                            <button class="btn bg-purple dropdown-toggle btn-select-option"
                                                    type="button"
                                                    data-toggle="dropdown"><?= trans('select_an_option') ?>
                                                <span class="caret"></span>
                                            </button>

                                            <ul class="dropdown-menu">
                                            <?php if(!is_client()):?>
                                            <li>
                                                <a class="edituser editPayment" href="javascript:void(0)" data-mode="<?= $item->payment_mode ?>" data-id="<?= $item->id?>" data-value="<?= $item->payment?>" data-status="<?= $item->status;?>">
                                                        <i class="fa fa-edit i-edit"></i>
                                                    <?= trans('edit') ?>
                                                </a>
                                            </li>
                                            <?php endif; ?>
                                                <?php if(is_admin() || is_contractor() || is_worker()): ?>
                                                <?php if($k != 0):?>
                                                <li>
                                                    <a class="p0">
                                                        <button type="button" data-id="<?=$item->id;?>" class="btn-list-button deletePayment"
                                                                onclick="return confirm('<?= trans('are_you_sure_delete') ?>');">
                                                            <i class="fa fa-trash i-delete"></i><?= trans('delete') ?>
                                                        </button>
                                                    </a>
                                                </li>
                                                <?php endif; ?>
                                            <?php endif; ?>

                                            </ul>
                                        </div>
                                </td>
                            </tr>

                        <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
           
        </div>
        <div class="row addpayment" style="display:none">
            <form id="addpaymentform">
                <h5 style="text-align:center"><b><?= trans('add_payment') ?></b></h5><hr>
                 <div class="col-sm-12">
                        <h5 class="messages"></h5>
                    </div>
                <div class="col-sm-6 form-group">
                    <label class="control-label"><?= trans('payment_received') ?> *</label>
                    <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control inputprice" name="payment" value="">
                     <div style="display:none; color:red;" class="paymentError"><?= trans('this_field_is_required') ?></div>
                </div>
                <div class="col-sm-6 form-group">
                    <label class="control-label"><?= trans('payment_mode') ?></label>
                     <select name="payment_mode" class="form-control requireds">
                         <option value=""></option>
                        <option value="check"><?= trans('check') ?></option>
                        <option value="wire_transfer"><?= trans('wire_transfer') ?></option>
                        <option value="cash"><?= trans('cash') ?></option>
                        <option value="credit_card"><?= trans('credit_card') ?></option>
                        <option value="paypal"><?= trans('paypal') ?></option>
                    </select>
                </div>
                <?php if(!is_client()):?>
                <div class="col-sm-12 form-group">
                    <label class="control-label"><?= trans('status') ?> *</label>
                     <select class="form-control" name="status" id="recipient-name" required>
                       <option value="0"><?= trans('pending') ?></option>
                       <option value="1"><?= trans('paid') ?></option>
                    </select>
                </div>
                <?php endif; ?>
                <div class="col-sm-12 form-group">
                    <div class="col-sm-6">
                        <button type="button" data-type="add" class="btn btn-warning btn-block not_now"><?= trans('not_now') ?></button>
                    </div>
                    <div class="col-sm-6">
                        <button type="submit" name="projectbt" class="btn btn-primary btn-block add_payment"><?= trans('add') ?></button>
                    </div>
                </div>
            </form>
        </div>
        
         <div class="row paymentedit" style="display:none">
            <form id="editForm">
                <h5 style="text-align:center"><b><?= trans('edit_payment') ?></b></h5><hr>
                 <input type="hidden" name="paymentid" class="paymentID" value=""/>
                   <div class="col-sm-12">
                        <h5 class="messagess"></h5>
                    </div>
                <div class="col-sm-6 form-group">
                    <label class="control-label"><?= trans('payment_received') ?> *</label>
                    <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control inputprice paymentvalue" name="payments" value="">
                     <div style="display:none; color:red;" class="paymentError"><?= trans('this_field_is_required') ?></div>
                </div>
                <div class="col-sm-6 form-group">
                    <label class="control-label"><?= trans('payment_mode') ?></label>
                     <select name="payment_modes" class="form-control payment_mode">
                         <option value=""></option>
                        <option value="check"><?= trans('check') ?></option>
                        <option value="wire_transfer"><?= trans('wire_transfer') ?></option>
                        <option value="cash"><?= trans('cash') ?></option>
                        <option value="credit_card"><?= trans('credit_card') ?></option>
                        <option value="paypal"><?= trans('paypal') ?></option>
                    </select>
                </div>
                 <div class="col-sm-12 form-group">
                    <label class="control-label"><?= trans('status') ?> *</label>
                     <select class="form-control status" name="statuss" id="recipient-name" required>
                        <option value="0"><?= trans('pending') ?></option>
                       <option value="1"><?= trans('paid') ?></option>
                    </select>
                     <div style="display:none; color:red;" class="paymentError"><?= trans('this_field_is_required') ?></div>
                </div>
                <div class="col-sm-12">
                    <div class="col-sm-6">
                        <button type="button" data-type="edit" class="btn btn-warning btn-block not_now"><?= trans('not_now') ?></button>
                    </div>
                    <div class="col-sm-6 form-group">
                        <button type="submit" name="projectbt" class="btn btn-primary btn-block edit_payment"><?= trans('update') ?></button>
                    </div>
                </div>
            </form>
        </div>
    </div><!-- /.box-body -->
</div>
<style>
    .success{
        color:green;
    }
    .error{
        color:red;
    }
</style>

<script>
    $(document).ready(function(){
        $('.getUser').on('click', function(){
            var email = $(this).data('id');
            var type = $(this).data('type');
            $.ajax({
                type: "POST",
                url: base_url + 'apartment/getUser',
                data:{email:email},
                success:function(data){
                    // var result = JSON.parse(data);
                    $('#myModal').modal('show');
                    $('.modal-bodys').html(data);
                }
            });
        });
        
        $('.btn-add-new').click(function(){
            $('.paymentedit').css('display', 'none');
            $('.addpayment').toggle();
        });
        
    $('.add_payment').on('click', function(){
             event.preventDefault();
            var payment = $("input[name='payment']").val();
            var apartment_ids = $("input[name='apartment_ids']").val();
            var status = $("select[name='status']").val();
             var payment_mode = $("select[name='payment_mode']").val();
            if(payment == ""){
                $('.paymentError').css('display','block');
            }
           else{
                $('.paymentError').css('display','none');
                $.ajax({
                type: "POST",
                url: base_url + 'apartment/addPayment',
                data:{payment:payment,apartment_ids:apartment_ids,status:status, payment_mode:payment_mode},
                success:function(data){
                         var result = JSON.parse(data);
                        if(result.error){
                            $('.messages').addClass('error');
                             $('.messages').text(result.error);
                                setTimeout(
                                    function() { 
                                        $('.messages').text(' '); 
                                        $('.messages').removeClass('error');
                                    },
                                    5000
                                );
                        }else if(result.success){
                            var id = apartment_ids;
                            $.ajax({
                                type: "POST",
                                url: base_url + 'apartment/getPayments',
                                data:{id:id},
                                success:function(data){
                                    $('.modal-bodys').html(data);
                                     $('.message').addClass('success');
                                     $('.message').text(result.success);
                                        setTimeout(
                                            function() { 
                                                $('.message').text(' '); 
                                                 $('.message').removeClass('success');
                                            },
                                            5000
                                        );
                                }
                            });
                        }else{
                            $('.message').addClass('error');
                            $('.message').text(result.problem);
                                setTimeout(
                                    function() { 
                                        $('.message').text(' '); 
                                         $('.message').removeClass('error');
                                    },
                                    5000
                                );
                        }
                    }
                });
            }
        });
        
        $('.editPayment').click(function(){
            $('.addpayment').css('display','none');
            $('.paymentedit').css('display','none');
            var id = $(this).data('id');
            var payment = $(this).data('value');
            var status = $(this).data('status');
            var mode = $(this).data('mode');
            if(id && payment){
                $('.paymentedit').css('display','block');
                $('.paymentvalue').val(payment);
                $('.paymentID').val(id);
                $('.status').val(status);
                $('.payment_mode').val(mode);
            }else{
                $('.message').addClass('error');
                $('.message').text('There is problem');
                    setTimeout(
                        function() { 
                            $('.message').text(' '); 
                             $('.message').removeClass('error');
                        },
                        5000
                    );
            }
        });
        
        $('.edit_payment').on('click', function(){
             event.preventDefault();
            var id = $("input[name='apartment_ids']").val();
            var payment = $("input[name='payments']").val();
            var paymentid = $("input[name='paymentid']").val();
            var status = $("select[name='statuss']").val();
            var payment_mode = $("select[name='payment_modes']").val();
            if(payment == ""){
                $('.paymentError').css('display','block');
            }
           else{
                $('.paymentError').css('display','none');
                $.ajax({
                type: "POST",
                url: base_url + 'apartment/editPayment',
                data:{payment:payment,paymentid:paymentid,id:id,status:status, payment_mode:payment_mode},
                success:function(data){
                         var result = JSON.parse(data);
                        if(result.error){
                            $('.messagess').addClass('error');
                             $('.messagess').text(result.error);
                                setTimeout(
                                    function() { 
                                        $('.messagess').text(' '); 
                                        $('.messagess').removeClass('error');
                                    },
                                    5000
                                );
                        }else if(result.success){
                            
                            $.ajax({
                                type: "POST",
                                url: base_url + 'apartment/getPayments',
                                data:{id:id},
                                success:function(data){
                                    $('.modal-bodys').html(data);
                                     $('.message').addClass('success');
                                     $('.message').text(result.success);
                                        setTimeout(
                                            function() { 
                                                $('.message').text(' '); 
                                                 $('.message').removeClass('success');
                                            },
                                            5000
                                        );
                                }
                            });
                        }else{
                            $('.message').addClass('error');
                            $('.message').text(result.problem);
                                setTimeout(
                                    function() { 
                                        $('.message').text(' '); 
                                         $('.message').removeClass('error');
                                    },
                                    5000
                                );
                        }
                    }
                });
            }
        });
        
        $('.not_now').click(function(){
            var val = $(this).data('type');
            if(val == 'add'){
                $('#addpaymentform').trigger("reset");
                $('.addpayment').css('display', 'none');
            }else if(val == 'edit'){
                ('#editForm').reset;
                $('.paymentedit').css('display', 'none');
            }
        });
        
        $('.deletePayment').on('click', function(){
            var ids = $(this).data('id');
             var apartment_ids = $("input[name='apartment_ids']").val();
                $.ajax({
                type: "POST",
                url: base_url + 'apartment/delete_apartment_payment',
                data:{ids:ids},
                success:function(data){
                         var result = JSON.parse(data);
                        if(result.error){
                            $('.message').addClass('error');
                             $('.message').text(result.error);
                                setTimeout(
                                    function() { 
                                        $('.message').text(' '); 
                                        $('.message').removeClass('error');
                                    },
                                    5000
                                );
                        }else if(result.success){
                            var id = apartment_ids;
                            $.ajax({
                                type: "POST",
                                url: base_url + 'apartment/getPayments',
                                data:{id:id},
                                success:function(data){
                                    $('.modal-bodys').html(data);
                                     $('.message').addClass('success');
                                     $('.message').text(result.success);
                                        setTimeout(
                                            function() { 
                                                $('.message').text(' '); 
                                                 $('.message').removeClass('success');
                                            },
                                            5000
                                        );
                                }
                            });
                        }
                    }
                });
        });
});
  
</script>