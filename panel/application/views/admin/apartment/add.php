<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="row secfullrow">
    <div class="col-sm-12">
        <div class="box box-primary">

            <div class="box-header">
                <div class="left">
                    <h3 class="box-title"><?php echo $title; ?></h3>
                    <br>
                    <small>You can <?php echo $title; ?> a new  from this form</small>
                </div>
                <div class="right">
                    <a href="<?php echo base_url(); ?>admin/project/apartments/<?= $project->slug ?>" class="btn btn-sm btn-success btn-add-new">
                        <i class="fa fa-bars"></i>
                       <?=trans('all_apartments')?>
                    </a>
                </div>
            </div><!-- /.box-header -->

            <!-- form start -->
            <?php echo form_open_multipart('apartment/add_apartment_post'); ?>
            <div class="box-body">
                <!-- include message block -->
                <?php $this->load->view('admin/includes/_messages'); ?>

            <div class="row rowsecfm">

                <div class="col-sm-6 col-lg-6 form-group">
                    <label class="control-label"><i class="red">*</i><?=trans('title')?> </label>
                    <input type="text" class="form-control inputtitle" name="title" required>
                </div>
                 <div class="col-sm-6 col-lg-6 form-group">
                    <label class="control-label"><i class="red">*</i><?=trans('apartment_no')?></label>
                    <input type="text" class="form-control inputapartment_number" name="apartment_no" required>
                </div>
            </div>
            <div class="row rowsecfm">
                <div class="col-sm-6 col-lg-6 form-group">
                    <label class="control-label"><i class="red">*</i><?=trans('select_sold_status')?></label>
                    <select name="sold_status" class="form-control sold_status" required>
                         <option value=""></option>
                        <option value="unsold"><?=trans('un_sold')?></option>
                        <option value="sold"><?=trans('sold')?></option>
                        
                    </select>
                </div>
                <div class="col-sm- col-lg-6 form-group">
                    <label class="control-label"><i class="red">*</i><?=trans('asking_sale_price')?></label>
                    <input type="text" name="sale_price" class="form-control sale_price" required oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"/>
                </div>
            </div>
             
              <div class="row rowsecfm sold" style="display:none">
                  
                <div class="col-sm-12 col-lg-12 form-group">
                    <label class="control-label"><i class="red">*</i><?=trans('assign_to_client')?></label>
                    <select name="client_id" class="form-control required requireds">
                        <option value=""></option>
                    <?php 
                        $dataus =get_users();
                        if($dataus){
                        foreach($dataus as $vl):
                        if($user->id == $vl->contractor_id && $vl->role == 'client'):
                            ?>
                        <option value="<?=$vl->id;?>"><?=$vl->email;?></option>
                    <?php endif; endforeach; } ?>
                    </select>
                </div>
                  <div class="col-sm-6 col-lg-6 form-group">
                    <label class="control-label"><?=trans('prop_owner_name')?></label>
                    <input type="text" class="form-control inputproperty_owner requireds" name="owner_name">
                </div>
                

                 <div class="col-sm-6 col-lg-6 form-group">
                    <label class="control-label"><i class="red">*</i><?=trans('sale_in')?></label>
                    <input type="text" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" class="form-control inputprice required requireds" name="saled_in" value="">
                </div>
                <div class="col-sm-6 col-lg-6 form-group">
                    <label class="control-label"><i class="red">*</i><?=trans('price_paid_by_client')?></label>
                    <input type="text" name="price_paid" class="form-control sale_price required requireds" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"/>
                </div> 

                 <div class="col-sm-6 col-lg-6 form-group">
                  <label class="control-label"><?=trans('payment_mode')?></label>
                     <select name="payment_mode" class="form-control requireds">
                         <option value=""></option>
                        <option value="check"><?=trans('check')?></option>
                        <option value="wire_transfer"><?=trans('wire_transfer')?></option>
                        <option value="cash"><?=trans('cash')?></option>
                        <option value="credit_card"><?=trans('credit_card')?></option>
                        <option value="paypal"><?=trans('paypal')?></option>
                    </select>
                </div>
            </div>
        
    
            <div class="row rowsecfm">
                <div class="col-sm-6 col-lg-6 form-group">
                    <label class="control-label"><?=trans('property_percentage_discount')?></label>
                    <input type="number" class="form-control inputdiscount" name="discount" value="0">
                </div>

                <div class="col-sm-6 col-lg-6 form-group">
                    <label class="control-label"><i class="red">*</i><?=trans('no_of_rooms')?></label>
                    <input type="text" class="form-control inputnumber_rooms" name="no_of_rooms">
                </div>              
            </div> 

             <div class="row rowsecfm">
                <div class="col-sm-6 col-lg-6 form-group">
                    <label class="control-label"><?=trans('floor')?></label>
                    <input type="text" class="form-control floor_option" name="floor">
                </div>
                <div class="col-sm-6 col-lg-6 form-group">
                    <label class="control-label"><?=trans('property_url')?></label>
                    <input type="url" class="form-control inputurl" name="url">
                </div>               
            </div> 
        <div class="row rowsecfm">
                
            <div class="col-sm-6 col-lg-6 form-group">
                <label class="control-label"><?=trans('city')?></label>
                <input type="text" class="form-control inputcity" name="city">
            </div> 

            <div class="col-sm-6 col-lg-6 form-group">
                <label class="control-label"><?=trans('zip_code')?></label>
                <input type="text" name="zipcode" class="form-control inputpincode">
            </div> 
        </div> 

        <div class="row rowsecfm">
            <div class="col-sm-12 col-lg-12 form-group">
                <label class="control-label"><?=trans('images')?></label>
                <div class="col-sm-12 colmninputfile">
                <a class='btn btn-sm bg-purple'>
                Select image
                <input type="file" name="images[]" size="40" accept="image/*"  multiple="multiple">
                </a>
                </div>
            </div> 
        </div> 

        <div class="row rowsecfm">
            <div class="col-sm-12 col-lg-12 form-group">
                <label class="control-label"><?=trans('content')?></label>
                <textarea class="form-control text-area inputcontent" name="additional"></textarea>
            </div>
            </div>
     <div class="row rowsecfm">
            <div class="col-sm-12 col-lg-12 form-group">
                <label class="control-label"><?=trans('address')?></label>
                <textarea class="form-control text-area input" name="address"></textarea>
            </div>
        </div>
            <!-- /.box-body -->
            <div class="box-footer">
            <button type="submit" name="projectbt" class="btn btn-primary btn-block"><?=trans('add_apartment')?></button>
            </div>
             <input type="hidden" name="project_id" value="<?=$project->id;?>">
            <!-- /.box-footer -->
            </form><!-- form end -->

        </div>
    </div>
</div>
<script>
    $('.sold_status').change(function(){
        var value = $(this).val();
        if(value == "sold"){
            $('.sold').css('display','block');
            $(".required").prop('required',true);
        }else{
            $('.sold').css('display','none');
            $(".required").prop('required',false);
             $('.requireds').val(' ');
        }
    });
</script>