<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="box box-primary secpermissinseca">
    <div class="box-header">
        <div class="left">
            <h3 class="box-title"><?php echo $title; ?></h3>
            <br>
            <small>You can <?php echo $title; ?> a new  from this form</small>
        </div>
        <div class="right">
            <a href="<?php echo base_url(); ?>admin/permission" class="btn btn-sm btn-success btn-add-new">
                <i class="fa fa-bars"></i>
                View permission
            </a>
        </div>
    </div><!-- /.box-header -->

    <div class="box-body permissinsecareafm">
          <!-- include message block -->
        <?php $this->load->view('admin/includes/_messages'); ?>  

        <!-- form start -->
        <?php echo form_open_multipart('admin/add-permission-post',['class'=>'secareafm']); ?>
        <div class="row rowsecfm">
        <div class="col-sm-12 col-lg-12 form-group">
        <label class="control-label">Select user</label>
        <select id="userselect" name="userselect[]" class="selectformcontrol populate placeholder" multiple="multiple">
        <?php 
        if(isset($all_users)){
        foreach($all_users as $vl):
         if($vl->id == $user_id):
        ?>
        <option value="<?=$vl->id;?>" selected>
        <?=$vl->email;?> (<?=$vl->role;?>)
        </option>
        <?php  else: ?>
        <option value="<?=$vl->id;?>">
        <?=$vl->email;?> (<?=$vl->role;?>)
        </option>
        <?php 
        endif;
        endforeach;  
        } ?>
        </select>
        </div>
        </div>

    <div class="row rowsecfm">
        <div class="col-sm-3 col-lg-3 titleformgroup">
        <label class="col-sm-12 col-lg-12 control-label">Show sub-admin</label>
            <label class="switch">
            <?php 
            $subadin =get_permission('sub_admin_show',$user_id);
            if(!empty($subadin) && $subadin->meta_value == '1'):?>
            <input type="checkbox" name="sub_admin_show" value="1" checked>
            <?php else:?>
            <input type="checkbox" name="sub_admin_show" value="1">
            <?php endif;?>
            <span class="slider round"></span>
            </label>
        </div>

  
      
    </div> <!-- end row -->


<div class="row rowsecfm">
        <div class="col-sm-3 col-lg-3 titleformgroup">
        <label class="col-sm-12 col-lg-12 control-label">Show Projects</label>
            <label class="switch">
            <?php 
            $prject =get_permission('project_show',$user_id);
            if(!empty($prject) && $prject->meta_value == '1'):?>
            <input type="checkbox" name="project_show" value="1" checked>
            <?php else:?>
            <input type="checkbox" name="project_show" value="1">
            <?php endif;?>
            <span class="slider round"></span>
            </label>
        </div>

        <div class="col-sm-3 col-lg-3 titleformgroup">
        <label class="col-sm-12 col-lg-12 control-label">Show Clients</label>
            <label class="switch">
            <?php 
            $clints =get_permission('client_show',$user_id);
            if(!empty($clints) && $clints->meta_value == '1'):?>
            <input type="checkbox" name="client_show" value="1" checked>
            <?php else:?>
            <input type="checkbox" name="client_show" value="1">
            <?php endif;?>
            <span class="slider round"></span>
            </label>
        </div>

<div class="col-sm-3 col-lg-3 titleformgroup">
        <label class="col-sm-12 col-lg-12 control-label">Show calendar management</label>
            <label class="switch">
            <?php 
            $calndmnaent =get_permission('calendar_management_show',$user_id);
            if(!empty($calndmnaent) && $calndmnaent->meta_value == '1'):?>
            <input type="checkbox" name="calendar_management_show" value="1" checked>
            <?php else:?>
            <input type="checkbox" name="calendar_management_show" value="1">
            <?php endif;?>
            <span class="slider round"></span>
            </label>
        </div>

<div class="col-sm-3 col-lg-3 titleformgroup">
        <label class="col-sm-12 col-lg-12 control-label">Show Graph Revenue Overview</label>
            <label class="switch">
            <?php 
            $revnueovvw =get_permission('revenue_overview_show',$user_id);
            if(!empty($revnueovvw) && $revnueovvw->meta_value == '1'):?>
            <input type="checkbox" name="revenue_overview_show" value="1" checked>
            <?php else:?>
            <input type="checkbox" name="revenue_overview_show" value="1">
            <?php endif;?>
            <span class="slider round"></span>
            </label>
        </div>


        
    </div> <!-- end row -->
<div class="row rowsecfm">
        <div class="col-sm-3 col-lg-3 titleformgroup">
        <label class="col-sm-12 col-lg-12 control-label">Show Sms Reports</label>
            <label class="switch">
            <?php 
            $sms_report=get_permission('sms_report_show',$user_id);
            if(!empty($sms_report) && $sms_report->meta_value == '1'):?>
            <input type="checkbox" name="sms_report_show" value="1" checked>
            <?php else:?>
            <input type="checkbox" name="sms_report_show" value="1">
             <?php endif;?>
      
            <span class="slider round"></span>
            </label>
        </div>
        <div class="col-sm-3 col-lg-3 titleformgroup">
        <label class="col-sm-12 col-lg-12 control-label">Show Permission</label>
            <label class="switch">
            <?php 
            $permission=get_permission('permission_show',$user_id);
            if(!empty($permission) && $permission->meta_value == '1'):?>
            <input type="checkbox" name="permission_show" value="1" checked>
            <?php else:?>
            <input type="checkbox" name="permission_show" value="1">
            <?php endif;?>
           
            <span class="slider round"></span>
            </label>
        </div>
          <div class="col-sm-3 col-lg-3 titleformgroup">
            <label class="col-sm-12 col-lg-12 control-label">Show Finance</label>
            <label class="switch">
             <?php 
            $finance=get_permission('finance_show',$user_id);
            if(!empty($finance) && $finance->meta_value == '1'):?>
            <input type="checkbox" name="finance_show" value="1" checked>
            <?php else:?>
            <input type="checkbox" name="finance_show" value="1">
             <?php endif;?>
          
            <span class="slider round"></span>
            </label>
        </div>
         
        </div> 

<div class="row rowsecfm">
       
          <div class="col-sm-3 col-lg-3 titleformgroup">
        <label class="col-sm-12 col-lg-12 control-label">Show worker</label>
            <label class="switch">
            <?php 
            $worker=get_permission('worker_show',$user_id);
            if(!empty($worker) && $worker->meta_value == '1'):?>
            <input type="checkbox" name="worker_show" value="1" checked>
            <?php else:?>
            <input type="checkbox" name="worker_show" value="1">
         <?php endif;?>
         
            <span class="slider round"></span>
            </label>
        </div>
          <div class="col-sm-3 col-lg-3 titleformgroup">
            <label class="col-sm-12 col-lg-12 control-label">Show contractor</label>
            <label class="switch">
             <?php 
            $contractor=get_permission('contractor_show',$user_id);
            if(!empty($contractor) && $contractor->meta_value == '1'):?>
            <input type="checkbox" name="contractor_show" value="1" checked>
            <?php else:?>
            <input type="checkbox" name="contractor_show" value="1">
            <?php endif;?>
            <span class="slider round"></span>
            </label>
        </div>
          <div class="col-sm-3 col-lg-3 titleformgroup">
        <label class="col-sm-12 col-lg-12 control-label">Show file history</label>
            <label class="switch">
            <?php 
            $file_history=get_permission('file_history_show',$user_id);
            if(!empty($file_history) && $file_history->meta_value == '1'):?>
            <input type="checkbox" name="file_history_show" value="1" checked>
            <?php else:?>
            <input type="checkbox" name="file_history_show" value="1">
              <?php endif;?>
        
            <span class="slider round"></span>
            </label>
        </div>
</div> 

        <div class="row rowsecfm">
            <div class="col-sm-3 col-lg-3 titleformgroup">
            <label class="col-sm-12 col-lg-12 control-label prmsbgtitl">
            Worker Permission Allow</label>
                <ul class="secserviceul">
                <li>
                <p>worker create 
                <?php 
                $workercreate=get_permission('worker_create',$user_id);
                $worker_create =($workercreate)?$workercreate->meta_value:'0';
                if($worker_create == '1'):?>
                <input type="checkbox"  name="worker_create" class="formcontinput" value="1" checked>
                <?php else:?>
                <input type="checkbox" name="worker_create" class="formcontinput" value="1">
                <?php endif;?>
                </p>
                </li>
               <li>
                <p>worker delete
                 <?php 
                $workerdelete=get_permission('worker_delete',$user_id);
               $worker_delete =($workerdelete)?$workerdelete->meta_value:'0';
                if($worker_delete == '1'):?>
                <input type="checkbox"  name="worker_delete" class="formcontinput" value="1" checked>
                <?php else:?>
                <input type="checkbox" name="worker_delete" class="formcontinput" value="1">
                 <?php endif;?>
                </p>
                </li> 
                <li>
                <p>worker change password 
                <?php 
                $workerpassword=get_permission('worker_password',$user_id);
                $worker_password =($workerpassword)?$workerpassword->meta_value:'0';
                if($worker_password == '1'):?>
                <input type="checkbox"  name="worker_password" class="formcontinput" value="1" checked>
                <?php else:?>
                <input type="checkbox" name="worker_password" class="formcontinput" value="1">
                 <?php endif;?>
              
                </p>
                </li>
                 <li>
                <p>worker view
                 <?php 
                $workerview=get_permission('worker_view',$user_id);
                 $worker_view =($workerview)?$workerview->meta_value:'0';
                if($worker_view == '1'):?>
                <input type="checkbox"  name="worker_view" class="formcontinput" value="1" checked>
                <?php else:?>
                <input type="checkbox" name="worker_view" class="formcontinput" value="1">
                <?php endif;?>
                </p>
                </li>
                <li>
                <p>worker edit
                <?php 
                $workeredit=get_permission('worker_edit',$user_id);
                $worker_edit =($workeredit)?$workeredit->meta_value:'0';
                if($worker_edit == '1'):?>
                <input type="checkbox"  name="worker_edit" class="formcontinput" value="1" checked>
                <?php else:?>
                <input type="checkbox" name="worker_edit" class="formcontinput" value="1">
                <?php endif;?>
               
                </p>
                </li>
                <li>
                <p>worker change role
                 <?php 
                $workerrole=get_permission('worker_role',$user_id);
                  $worker_role =($workerrole)?$workerrole->meta_value:'0';
                if($worker_role == '1'):?>
                <input type="checkbox"  name="worker_role" class="formcontinput" value="1" checked>
                <?php else:?>
                <input type="checkbox" name="worker_role" class="formcontinput" value="1">
                <?php endif;?>
                
                </p>
                </li>
                <li>
                <p>worker login ban or unban
                <?php 
                $workerban=get_permission('worker_ban',$user_id);
                $worker_ban =($workerban)?$workerban->meta_value:'0';
                if($worker_ban == '1'):?>
                <input type="checkbox"  name="worker_ban" class="formcontinput" value="1" checked>
                <?php else:?>
                <input type="checkbox" name="worker_ban" class="formcontinput" value="1">
                  <?php endif;?>
               
                </p>
                </li>
                </ul>
                <div class="col-sm-12 col-lg-12 allperminformgroup">
                Click and All Select
               <?php 
                if($worker_password == '1' && $worker_edit == '1' && $worker_view == '1' && $worker_role == '1' && $worker_ban == '1' && $worker_create == '1' && $worker_delete == '1'):?>
                <input type="checkbox" class="permissbt" checked>
                <?php else:?>
                <input type="checkbox" class="permissbt">
                <?php endif;?>

                </div>
            </div>
            <div class="col-sm-3 col-lg-3 titleformgroup">
            <label class="col-sm-12 col-lg-12 control-label prmsbgtitl">
            Contractor Permission Allow</label>
                <ul class="secserviceul">
                <li>
                <p>contractor create 
                <?php 
                $contractorcreate=get_permission('contractor_create',$user_id);
                $contractor_create =($contractorcreate)?$contractorcreate->meta_value:'0';
                if($contractor_create == '1'):?>
                <input type="checkbox"  name="contractor_create" class="formcontinput" value="1" checked>
                <?php else:?>
                <input type="checkbox" name="contractor_create" class="formcontinput" value="1">
            <?php endif;?>
             
                </p>
                </li>
                <li>
                <p>contractor change password 
                <?php 
                $contractorpassword=get_permission('contractor_password',$user_id);
               $contractor_password =($contractorpassword)?$contractorpassword->meta_value:'0';
                if($contractor_password == '1'):?>
                <input type="checkbox"  name="contractor_password" class="formcontinput" value="1" checked>
                <?php else:?>
                <input type="checkbox" name="contractor_password" class="formcontinput" value="1">
                 <?php endif;?>
              
                </p>
                </li>
               <li>
                <p>contractor delete 
                 <?php 
                $contractordelete=get_permission('contractor_delete',$user_id);
                $contractor_delete =($contractordelete)?$contractordelete->meta_value:'0';
                if($contractor_delete == '1'):?>
                <input type="checkbox"  name="contractor_delete" class="formcontinput" value="1" checked>
                <?php else:?>
                <input type="checkbox" name="contractor_delete" class="formcontinput" value="1">
                 <?php endif;?>
                </p>
                </li>
                <li>
                <p>contractor change role
                 <?php 
                $contractorrole=get_permission('contractor_role',$user_id);
                $contractor_role =($contractorrole)?$contractorrole->meta_value:'0';
                if($contractor_role == '1'):?>
                <input type="checkbox"  name="contractor_role" class="formcontinput" value="1" checked>
                <?php else:?>
                <input type="checkbox" name="contractor_role" class="formcontinput" value="1">
                  <?php endif;?>
                
                </p>
                </li>
                <li>
                <p>contractor view
                <?php 
                $contractorview=get_permission('contractor_view',$user_id);
                 $contractor_view =($contractorview)?$contractorview->meta_value:'0';
                if($contractor_view == '1'):?>
                <input type="checkbox"  name="contractor_view" class="formcontinput" value="1" checked>
                <?php else:?>
                <input type="checkbox" name="contractor_view" class="formcontinput" value="1">
                <?php endif;?>
                </p>
                </li>
                <li>
                <p>contractor edit
                 <?php 
                $contractoredit=get_permission('contractor_edit',$user_id);
               $contractor_edit =($contractoredit)?$contractoredit->meta_value:'0';
                if($contractor_edit == '1'):?>
                <input type="checkbox"  name="contractor_edit" class="formcontinput" value="1" checked>
                <?php else:?>
                <input type="checkbox" name="contractor_edit" class="formcontinput" value="1">
                <?php endif;?>
                </p>
                </li>
                <li>
                <p>contractor login ban or unban
                    <?php 
                $contractorban=get_permission('contractor_ban',$user_id);
               $contractor_ban =($contractorban)?$contractorban->meta_value:'0';
                if($contractor_ban == '1'):?>
                <input type="checkbox"  name="contractor_ban" class="formcontinput" value="1" checked>
                <?php else:?>
                <input type="checkbox" name="contractor_ban" class="formcontinput" value="1">
                <?php endif;?>
                </p>
                </li>
                </ul>
                <div class="col-sm-12 col-lg-12 allperminformgroup">
                Click and All Select
                <?php 
                if($contractor_create == '1' && $contractor_password == '1' && $contractor_delete == '1' && $contractor_role == '1' && $contractor_view == '1' && $contractor_edit == '1' && $contractor_ban == '1'):?>
                <input type="checkbox" class="permissbt" checked>
                <?php else:?>
                <input type="checkbox" class="permissbt">
                <?php endif;?>
                </div>
            </div>
            <div class="col-sm-3 col-lg-3 titleformgroup">
            <label class="col-sm-12 col-lg-12 control-label prmsbgtitl">
            invoice Permission Allow</label>
                <ul class="secserviceul">
                <li>
                <p>invoice create 
                  <?php 
                $invoicecreate=get_permission('invoice_create',$user_id);
              $invoice_create =($invoicecreate)?$invoicecreate->meta_value:'0';
                if($invoice_create == '1'):?>
                <input type="checkbox"  name="invoice_create" class="formcontinput" value="1" checked>
                <?php else:?>
                <input type="checkbox" name="invoice_create" class="formcontinput" value="1">
                  <?php endif;?>
                </p>
                </li>
               <li>
                <p>invoice delete 
                <?php 
                $invoicedelete=get_permission('invoice_delete',$user_id);
               $invoice_delete =($invoicedelete)?$invoicedelete->meta_value:'0';
                if($invoice_delete == '1'):?>
                <input type="checkbox"  name="invoice_delete" class="formcontinput" value="1" checked>
                <?php else:?>
                <input type="checkbox" name="invoice_delete" class="formcontinput" value="1">
                 <?php endif;?>
            
                </p>
                </li>
                <li>
                <p>invoice send mail 
                <?php 
                $invoicesendmail=get_permission('invoice_send_mail',$user_id);
                 $invoice_send_mail =($invoicesendmail)?$invoicesendmail->meta_value:'0';
                if($invoice_send_mail == '1'):?>
                <input type="checkbox"  name="invoice_send_mail" class="formcontinput" value="1" checked>
                <?php else:?>
                <input type="checkbox" name="invoice_send_mail" class="formcontinput" value="1">
                <?php endif;?>

                </p>
                </li>
                <li>
                <p>invoice view details
                <?php 
                $invoiceview=get_permission('invoice_view',$user_id);
                 $invoice_view =($invoiceview)?$invoiceview->meta_value:'0';
                if($invoice_view == '1'):?>
                <input type="checkbox"  name="invoice_view" class="formcontinput" value="1" checked>
                <?php else:?>
                <input type="checkbox" name="invoice_view" class="formcontinput" value="1">
                <?php endif;?>

                </p>
                </li>
                </ul>
               <div class="col-sm-12 col-lg-12 allperminformgroup">
                Click and All Select
                <?php 
                if($invoice_create == '1' && $invoice_delete == '1' && $invoice_send_mail == '1' && $invoice_view == '1'):?>
                <input type="checkbox" class="permissbt" checked>
                <?php else:?>
                <input type="checkbox" class="permissbt">
                <?php endif;?>
                </div>
            </div>
        </div> 

            <div class="row rowsecfm">
            <div class="col-sm-3 col-lg-3 titleformgroup">
            <label class="col-sm-12 col-lg-12 control-label prmsbgtitl">
            Permission Allow</label>
                <ul class="secserviceul">
                <li>
                <p>Permission add 
                <?php 
                $permissionadd=get_permission('permission_add',$user_id);
               $permission_add =($permissionadd)?$permissionadd->meta_value:'0';
                if($permission_add == '1'):?>
                <input type="checkbox"  name="permission_add" class="formcontinput" value="1" checked>
                <?php else:?>
                  <input type="checkbox"  name="permission_add" class="formcontinput" value="1">
                  <?php endif;?>
                </p>
                
                </p>
                </li>
               <li>
                <p>Permission delete 
                <?php 
                $permissiondelete=get_permission('permission_delete',$user_id);
                $permission_delete =($permissiondelete)?$permissiondelete->meta_value:'0';
                if($permission_delete == '1'):?>
                <input type="checkbox"  name="permission_delete" class="formcontinput" value="1" checked>
                <?php else:?>
                  <input type="checkbox"  name="permission_delete" class="formcontinput" value="1">
                 <?php endif;?>
                </p>
                </li>
                <li>
                <p>Permission view details
                 <?php 
                $permissionview=get_permission('permission_view',$user_id);
                $permission_view =($permissionview)?$permissionview->meta_value:'0';
                if($permission_view == '1'):?>
                <input type="checkbox"  name="permission_view" class="formcontinput" value="1" checked>
                <?php else:?>
                  <input type="checkbox"  name="permission_view" class="formcontinput" value="1">
                  <?php endif;?>
                </p>
                </li>
                <li>
                <p>Permission edit
                 <?php 
                $permissionedit=get_permission('permission_edit',$user_id);
                 $permission_edit =($permissionedit)?$permissionedit->meta_value:'0';
                if($permission_edit == '1'):?>
                <input type="checkbox"  name="permission_edit" class="formcontinput" value="1" checked>
                <?php else:?>
                  <input type="checkbox"  name="permission_edit" class="formcontinput" value="1">
                <?php endif;?>
                </p>
                </li>
                </ul>
                <div class="col-sm-12 col-lg-12 allperminformgroup">
                Click and All Select
                 <?php 
                if($permission_add == '1' && $permission_delete == '1' && $permission_view == '1' && $permission_edit == '1'):?>
                <input type="checkbox" class="permissbt" checked>
                <?php else:?>
                <input type="checkbox" class="permissbt">
                <?php endif;?>
                </div>
            </div>

            <div class="col-sm-3 col-lg-3 titleformgroup">
            <label class="col-sm-12 col-lg-12 control-label prmsbgtitl">
            Clients Permission Allow</label>
                <ul class="secserviceul">
                <li>
                <p>Client create 
                <?php 
                $clientcreate=get_permission('client_create',$user_id);
                $client_create =($clientcreate)?$clientcreate->meta_value:'0';
                if($client_create == '1'):?>
                <input type="checkbox"  name="client_create" class="formcontinput" value="1" checked>
                <?php else:?>
                <input type="checkbox" name="client_create" class="formcontinput" value="1">
                <?php endif;?>
                </p>
                </li>
               <li>
                <p>Client delete
                 <?php 
                $clientdelete=get_permission('client_delete',$user_id);
               $client_delete =($clientdelete)?$clientdelete->meta_value:'0';
                if($client_delete == '1'):?>
                <input type="checkbox"  name="client_delete" class="formcontinput" value="1" checked>
                <?php else:?>
                <input type="checkbox" name="client_delete" class="formcontinput" value="1">
                 <?php endif;?>
                </p>
                </li> 
                <li>
                <p>Client change password 
                <?php 
                $clientpassword=get_permission('client_password',$user_id);
                $client_password =($clientpassword)?$clientpassword->meta_value:'0';
                if($client_password == '1'):?>
                <input type="checkbox"  name="client_password" class="formcontinput" value="1" checked>
                <?php else:?>
                <input type="checkbox" name="client_password" class="formcontinput" value="1">
                 <?php endif;?>
              
                </p>
                </li>
                 <li>
                <p>Client view
                 <?php 
                $clientview=get_permission('client_view',$user_id);
                 $client_view =($clientview)?$clientview->meta_value:'0';
                if($client_view == '1'):?>
                <input type="checkbox"  name="client_view" class="formcontinput" value="1" checked>
                <?php else:?>
                <input type="checkbox" name="client_view" class="formcontinput" value="1">
                <?php endif;?>
                </p>
                </li>
                <li>
                <p>Client edit
                <?php 
                $clientdit=get_permission('client_edit',$user_id);
                $client_edit =($clientdit)?$clientdit->meta_value:'0';
                if($client_edit == '1'):?>
                <input type="checkbox"  name="client_edit" class="formcontinput" value="1" checked>
                <?php else:?>
                <input type="checkbox" name="client_edit" class="formcontinput" value="1">
                <?php endif;?>
               
                </p>
                </li>
                <li>
                <p>Client change role
                 <?php 
                $clientrole=get_permission('client_role',$user_id);
                  $client_role =($clientrole)?$clientrole->meta_value:'0';
                if($client_role == '1'):?>
                <input type="checkbox"  name="client_role" class="formcontinput" value="1" checked>
                <?php else:?>
                <input type="checkbox" name="client_role" class="formcontinput" value="1">
                <?php endif;?>
                
                </p>
                </li>
                <li>
                <p>Client login ban or unban
                <?php 
                $clientban=get_permission('client_ban',$user_id);
                $client_ban =($clientban)?$clientban->meta_value:'0';
                if($client_ban == '1'):?>
                <input type="checkbox"  name="client_ban" class="formcontinput" value="1" checked>
                <?php else:?>
                <input type="checkbox" name="client_ban" class="formcontinput" value="1">
                  <?php endif;?>
               
                </p>
                </li>
                </ul>
                <div class="col-sm-12 col-lg-12 allperminformgroup">
                Click and All Select
               <?php 
                if($client_password == '1' && $client_edit == '1' && $client_view == '1' && $client_role == '1' && $client_ban == '1' && $client_create == '1' && $client_delete == '1'):?>
                <input type="checkbox" class="permissbt" checked>
                <?php else:?>
                <input type="checkbox" class="permissbt">
                <?php endif;?>

                </div>
            </div>

             <div class="col-sm-3 col-lg-3 titleformgroup">
            <label class="col-sm-12 col-lg-12 control-label prmsbgtitl">
            Sub-admins Permission Allow</label>
                <ul class="secserviceul">
                <li>
                <p>Sub-admin create 
                <?php 
                $sub_admincreate=get_permission('sub_admin_create',$user_id);
                $sub_admin_create =($sub_admincreate)?$sub_admincreate->meta_value:'0';
                if($sub_admin_create == '1'):?>
                <input type="checkbox"  name="sub_admin_create" class="formcontinput" value="1" checked>
                <?php else:?>
                <input type="checkbox" name="sub_admin_create" class="formcontinput" value="1">
                <?php endif;?>
                </p>
                </li>
               <li>
                <p>Sub-admin delete
                 <?php 
                $sub_admindelete=get_permission('sub_admin_delete',$user_id);
               $sub_admin_delete =($sub_admindelete)?$sub_admindelete->meta_value:'0';
                if($sub_admin_delete == '1'):?>
                <input type="checkbox"  name="sub_admin_delete" class="formcontinput" value="1" checked>
                <?php else:?>
                <input type="checkbox" name="sub_admin_delete" class="formcontinput" value="1">
                 <?php endif;?>
                </p>
                </li> 
                <li>
                <p>Sub-admin change password 
                <?php 
                $sub_adminpassword=get_permission('sub_admin_password',$user_id);
                $sub_admin_password =($sub_adminpassword)?$sub_adminpassword->meta_value:'0';
                if($sub_admin_password == '1'):?>
                <input type="checkbox"  name="sub_admin_password" class="formcontinput" value="1" checked>
                <?php else:?>
                <input type="checkbox" name="sub_admin_password" class="formcontinput" value="1">
                 <?php endif;?>
              
                </p>
                </li>
                 <li>
                <p>Sub-admin view
                 <?php 
                $sub_adminview=get_permission('sub_admin_view',$user_id);
                 $sub_admin_view =($sub_adminview)?$sub_adminview->meta_value:'0';
                if($sub_admin_view == '1'):?>
                <input type="checkbox"  name="sub_admin_view" class="formcontinput" value="1" checked>
                <?php else:?>
                <input type="checkbox" name="sub_admin_view" class="formcontinput" value="1">
                <?php endif;?>
                </p>
                </li>
                <li>
                <p>Sub-admin edit
                <?php 
                $sub_admindit=get_permission('sub_admin_edit',$user_id);
                $sub_admin_edit =($sub_admindit)?$sub_admindit->meta_value:'0';
                if($sub_admin_edit == '1'):?>
                <input type="checkbox"  name="sub_admin_edit" class="formcontinput" value="1" checked>
                <?php else:?>
                <input type="checkbox" name="sub_admin_edit" class="formcontinput" value="1">
                <?php endif;?>
               
                </p>
                </li>
                <li>
                <p>Sub-admin change role
                 <?php 
                $sub_adminrole=get_permission('sub_admin_role',$user_id);
                  $sub_admin_role =($sub_adminrole)?$sub_adminrole->meta_value:'0';
                if($sub_admin_role == '1'):?>
                <input type="checkbox"  name="sub_admin_role" class="formcontinput" value="1" checked>
                <?php else:?>
                <input type="checkbox" name="sub_admin_role" class="formcontinput" value="1">
                <?php endif;?>
                
                </p>
                </li>
                <li>
                <p>Sub-admin login ban or unban
                <?php 
                $sub_adminban=get_permission('sub_admin_ban',$user_id);
                $sub_admin_ban =($sub_adminban)?$sub_adminban->meta_value:'0';
                if($sub_admin_ban == '1'):?>
                <input type="checkbox"  name="sub_admin_ban" class="formcontinput" value="1" checked>
                <?php else:?>
                <input type="checkbox" name="sub_admin_ban" class="formcontinput" value="1">
                  <?php endif;?>
               
                </p>
                </li>
                </ul>
                <div class="col-sm-12 col-lg-12 allperminformgroup">
                Click and All Select
               <?php 
                if($sub_admin_password == '1' && $sub_admin_edit == '1' && $sub_admin_view == '1' && $sub_admin_role == '1' && $sub_admin_ban == '1' && $sub_admin_create == '1' && $sub_admin_delete == '1'):?>
                <input type="checkbox" class="permissbt" checked>
                <?php else:?>
                <input type="checkbox" class="permissbt">
                <?php endif;?>

                </div>
            </div>
            <div class="col-sm-3 col-lg-3 titleformgroup">
            <label class="col-sm-12 col-lg-12 control-label prmsbgtitl">
            Projects Permission Allow</label>
                <ul class="secserviceul">
                <li>
                <p>Project create 
                 <?php 
                $projectcreate=get_permission('project_create',$user_id);
               $project_create =($projectcreate)?$projectcreate->meta_value:'0';
                if($project_create == '1'):?>
                <input type="checkbox"  name="project_create" class="formcontinput" value="1" checked>
                <?php else:?>
                <input type="checkbox" name="project_create" class="formcontinput" value="1">
                 <?php endif;?>
                </p>
                </li>
               <li>
                <p>Project delete 
                <?php 
                $projectdelete=get_permission('project_delete',$user_id);
                  $project_delete =($projectdelete)?$projectdelete->meta_value:'0';
                if($project_delete == '1'):?>
                <input type="checkbox"  name="project_delete" class="formcontinput" value="1" checked>
                <?php else:?>
                <input type="checkbox" name="project_delete" class="formcontinput" value="1">
                 <?php endif;?>
                </p>
                </li>
                <li>
                <p>Project view details
                 <?php 
                $projectview=get_permission('project_view',$user_id);
                $project_view =($projectview)?$projectview->meta_value:'0';
                if($project_view == '1'):?>
                <input type="checkbox"  name="project_view" class="formcontinput" value="1" checked>
                <?php else:?>
                <input type="checkbox" name="project_view" class="formcontinput" value="1">
                <?php endif;?>
                </p>
                </li>
                <li>
                <p>Project edit
                  <?php 
                $projectedit=get_permission('project_edit',$user_id);
                $project_edit =($projectedit)?$projectedit->meta_value:'0';
                if($project_edit == '1'):?>
                <input type="checkbox"  name="project_edit" class="formcontinput" value="1" checked>
                <?php else:?>
                <input type="checkbox" name="project_edit" class="formcontinput" value="1">
                <?php endif;?>
                </p>
                </li>
                </ul>
                <div class="col-sm-12 col-lg-12 allperminformgroup">
                Click and All Select
                <?php 
                if($project_create == '1' && $project_delete == '1' && $project_view == '1' && $project_edit == '1'):?>
                <input type="checkbox" class="permissbt" checked>
                <?php else:?>
                <input type="checkbox" class="permissbt">
                <?php endif;?>
                </div>
            </div>
        </div> 
        <button type="submit" name="savebt" class="btn btn-primary pull-right">add permission</button>

        <input type="hidden" name="uid" value="<?=$user->id;?>">
 
        <?php echo form_close(); ?><!-- form end -->

    </div>
    <!-- /.box-body -->
</div>
<script>
$(document).ready(function(){ 

    $("#userselect").select2({
        allowClear: true
    });


     $(".permissinsecareafm .formcontinput").on("click",function(e){
    
       let parents=$(this).parent().parent().parent().parent();
       let parentsul=parents.find('.secserviceul>li>p>.formcontinput');
       let parentsulchecked=parents.find('.secserviceul>li>p>.formcontinput:checked');
       let permissbt=parents.find('.allperminformgroup>.permissbt');

      if(parentsul.length == parentsulchecked.length){ 
       
       permissbt.prop('checked', true);
      }else{
       
        permissbt.prop('checked', false);
      }

     });

     $(".permissinsecareafm .permissbt").on("click",function(e){

        let parents=$(this).parent().parent();
        let slefchecked=$(this).is(':checked')
        let secul=parents.find('.secserviceul>li>p>.formcontinput');
      
       if(slefchecked){
        secul.prop('checked', true);
       }else{
        secul.prop('checked', false);
       }
        
    });
});
</script>