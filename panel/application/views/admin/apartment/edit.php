<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row secfullrow">
    <div class="col-sm-12">
        <div class="box box-primary">

            <div class="box-header">
                <div class="left">
                    <h3 class="box-title"><?php echo $title; ?></h3>
                    <br>
                    <small>You can <?php echo $title; ?> from this form</small>
                </div>
                <div class="right">
                    <a href="<?php echo base_url(); ?>admin/project/apartments/<?= $apartment->project_slug ?>" class="btn btn-sm btn-success btn-add-new">
                        <i class="fa fa-bars"></i>
                        <?=trans('all_apartments')?>
                    </a>
                </div>
            </div><!-- /.box-header -->

            <!-- form start -->
            <?php echo form_open_multipart('apartment/apartment_edit_post'); ?>
            <div class="box-body">
                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages'); ?>
             <input type="hidden" name="apartment_id" value="<?= $apartment->id?>"/>
            <div class="row rowsecfm">

                <div class="col-sm-6 col-lg-6 form-group">
                    <label class="control-label"><i class="red">*</i><?=trans('title')?></label>
                    <input type="text" class="form-control inputtitle" name="title" readonly value="<?= $apartment->title ?>" required>
                </div>
                 <div class="col-sm-6 col-lg-6 form-group">
                    <label class="control-label"><i class="red">*</i><?=trans('apartment_no')?></label>
                    <input type="text" class="form-control inputapartment_number" name="apartment_no" value="<?= $apartment->apartment_no ?>" required>
                </div>
            </div>
             <div class="row rowsecfm">
                <div class="col-sm-6 col-lg-6 form-group">
                    <label class="control-label"><i class="red">*</i><?=trans('select_sold_status')?></label>
                    <select name="sold_status" class="form-control sold_status" required>
                        <option value="sold" <?php if($apartment->sold_status == 'sold'):?> selected <?php endif; ?>><?=trans('sold')?></option>
                        <option value="unsold" <?php if($apartment->sold_status == 'unsold'):?> selected <?php endif; ?>><?=trans('un_sold')?></option>
                    </select>
                </div>
               <div class="col-sm-6 col-lg-6 form-group">
                    <label class="control-label"><i class="red">*</i><?=trans('asking_sale_price')?></label>
                    <input type="text" class="form-control inputapartment_number" name="sale_price" value="<?= $apartment->sale_price;?>" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
                </div>
            </div>
              <div class="row rowsecfm sold">
                <div class="col-sm-12 col-lg-12 form-group">
                    <label class="control-label"><i class="red">*</i><?=trans('assign_to_client')?></label>
                    <select name="client_id" class="form-control required requireds">
                        <option value=""></option>
                    <?php 
                        $dataus =get_users();
                        if($dataus){
                        foreach($dataus as $vl):
                        if($user->id == $vl->contractor_id && $vl->role == 'client' || $user->contractor_id == $vl->contractor_id && $vl->role == 'client'):
                            ?>
                        <option value="<?=$vl->id;?>" <?php if($vl->email == $apartment->client):?> selected <?php endif; ?>><?=$vl->email;?></option>
                    <?php endif; endforeach; } ?>
                    </select>
                </div>
                <div class="col-sm-6 col-lg-6 form-group">
                    <label class="control-label"><?=trans('prop_owner_name')?></label>
                    <input type="text" class="form-control inputproperty_owner requireds" name="owner_name" value="<?= $apartment->owner_name ?>">
                </div>
                 <div class="col-sm-6 col-lg-6 form-group">
                    <label class="control-label"><i class="red">*</i><?=trans('sale_in')?></label>
                    <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"  class="form-control inputprice required requireds" name="saled_in" value="<?= $apartment->saled_in ?>">
                </div>
                  <div class="col-sm-6 col-lg-6 form-group">
                    <label class="control-label"><i class="red">*</i><?=trans('price_paid_by_client')?></label>
                    <input type="text" name="price_paid" class="form-control sale_price required requireds" value="<?php if(isset($payment)):?> <?=$payment->payment?> <?php endif;?>" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"/>
                </div> 

                 <div class="col-sm-6 col-lg-6 form-group">
                    <label class="control-label"><?=trans('payment_mode')?></label>
                     <select name="payment_mode" class="form-control requireds">
                         <option value=""></option>
                        <?php if(isset($payment)):?>
                        <option value="check" <?php if($payment->payment_mode == 'check'):?> selected <?php endif; ?>><?=trans('check')?></option>
                        <option value="wire_transfer" <?php if($payment->payment_mode == 'wire_transfer'):?> selected <?php endif; ?>><?=trans('wire_transfer')?></option>
                        <option value="cash" <?php if($payment->payment_mode == 'cash'):?> selected <?php endif; ?>><?=trans('cash')?></option>
                        <option value="credit_card" <?php if($payment->payment_mode == 'credit_card'):?> selected <?php endif; ?>><?=trans('credit_card')?></option>
                        <option value="paypal" <?php if($payment->payment_mode == 'paypal'):?> selected <?php endif; ?>><?=trans('paypal')?></option>
                        <?php else:?>
                        <option value="check"><?=trans('check')?></option>
                        <option value="wire_transfer"><?=trans('wire_transfer')?></option>
                        <option value="cash"><?=trans('cash')?></option>
                        <option value="credit_card"><?=trans('credit_card')?></option>
                        <option value="paypal"><?=trans('paypal')?></option>
                        <?php endif;?>
                    </select>
                </div>
           </div>
            <div class="row rowsecfm">
                <div class="col-sm-6 col-lg-6 form-group">
                    <label class="control-label"><?=trans('property_percentage_discount')?></label>
                    <input type="number" class="form-control inputdiscount" name="discount" value="<?= $apartment->discount ?>" required>
                </div>

                <div class="col-sm-6 col-lg-6 form-group">
                    <label class="control-label"><i class="red">*</i><?=trans('no_of_rooms')?></label>
                    <input type="text" class="form-control inputnumber_rooms" name="no_of_rooms" value="<?= $apartment->no_of_rooms ?>" required>
                </div>              
            </div> 

             <div class="row rowsecfm">
                <div class="col-sm-6 col-lg-6 form-group">
                    <label class="control-label"><?=trans('floor')?></label>
                    <input type="text" class="form-control floor_option" name="floor" value="<?= $apartment->floor ?>">
                </div>
                <div class="col-sm-6 col-lg-6 form-group">
                    <label class="control-label"><?=trans('property_url')?></label>
                    <input type="url" class="form-control inputurl" value="<?= $apartment->url ?>" name="url">
                </div>               
            </div> 
        <div class="row rowsecfm">
                
            <div class="col-sm-6 col-lg-6 form-group">
                <label class="control-label"><?=trans('city')?></label>
                <input type="text" class="form-control inputcity" value="<?= $apartment->city ?>" name="city">
            </div> 

            <div class="col-sm-6 col-lg-6 form-group">
                <label class="control-label"><?=trans('zip_code')?></label>
                <input type="text" name="zipcode" value="<?= $apartment->zipcode ?>" class="form-control inputpincode">
            </div> 
        </div> 
        <div class="row rowsecfm">
            <div class="col-sm-12 col-lg-12 form-group">
             <?php 
                if($apartment->images):
                $imgs = explode(',', $apartment->images);
                foreach($imgs as $img):
            ?>
                <a href="<?= base_url();?>uploads/project/apartment/<?= $img ?>" target="_blank"><img src="<?= base_url();?>uploads/project/apartment/<?= $img ?>" width:"100px;" height="100px;" style="margin-top:20px;"></a>
            <?php endforeach;?>
            <?php else:
                echo "";
                endif;
            ?>
            </div>
        </div>
        <div class="row rowsecfm">
            <div class="col-sm-12 col-lg-12 form-group">
                <label class="control-label"><?=trans('images')?></label>
                <div class="col-sm-12 colmninputfile">
                <a class='btn btn-sm bg-purple'>
                Select image
                <input type="file" name="images[]" size="40" multiple="multiple" accept="image/*">
                </a>
                </div>
            </div> 
        </div> 

        <div class="row rowsecfm">
            <div class="col-sm-12 col-lg-12 form-group">
                <label class="control-label"><?=trans('content')?></label>
                <textarea class="form-control text-area inputcontent" name="additional"><?= $apartment->additional ?></textarea>
            </div>
            </div>
        <div class="row rowsecfm">
            <div class="col-sm-12 col-lg-12 form-group">
            <label class="control-label"><?=trans('address')?></label>
                <textarea class="form-control text-area input" name="address"><?= $apartment->address ?></textarea>
            </div>
        </div>
        
            <!-- /.box-body -->
            <div class="box-footer" id="submitButton">
            <button type="submit" id="submitButton" name="projectbt" class="btn btn-primary btn-block"><?=trans('update')?></button>
            </div>
            <!-- /.box-footer -->
            </form><!-- form end -->

        </div>
    </div>
</div>
</div>
<script>
$(document).ready(function(){
    var val = $('.sold_status').val();
    if( val == "sold"){
        $('.sold').css('display', 'block');
    }else{
        $('.sold').css('display', 'none');
    }
    
    $('.sold_status').on('change',function(){
        var value = $(this).val();
        if(value == "sold"){
            $('.sold').css('display', 'block');
            $(".required").prop('required',true);
        }else{
            $('.sold').css('display', 'none');
            $(".required").prop('required',false);
             $('.requireds').val(' ');
       
    
        }
    });
    
    $('#submitButton').click(function(){
            $( ".sold_status" ).trigger( "change" );
    });
});
    
</script>