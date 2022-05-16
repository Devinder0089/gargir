
<aside class="main-sidebar panelmainsidebar">
<!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <div class="user-panel">
                <div class="user-info">
                <a class="col-lg-2 col-xs-2 pullleft pullleftcollpse collapsed" data-toggle="collapse" href="#collapseExample"  aria-expanded="false">
                <span class="caret"></span>
                <?= trans('option');?>
                </a>
                <a title="<?=(user())?user()->role:""; ?>" class="col-lg-10 col-xs-10 pullleft hypinfo" href="<?php echo base_url(); ?>admin/profile">
                <div class="col-lg-10 col-xs-10 leftpull info">
                <p><?=(user())?user()->role:""; ?></p>
                </span>
                </div>
                <div class="col-lg-2 col-xs-2 pullright image">
                <img src="<?php echo base_url(); ?><?=(user()->avatar)?user()->avatar:"assets/admin/img/user.jpg"; ?>" class="img-circle" alt="User Image">
                </div>
                </a>
                </div>
            </div>
            <div class="pullleftcollapse collapse" id="collapseExample" style="">
              <ul class="nav">

                <li class="nav-item">
                     <a href="<?php echo base_url(); ?>admin/profile" class="nav-link">
                    <i class="fa fa-user"></i>&nbsp;
                     <span class="sidebar-normal"><?= trans('edit_profile');?></span>
                    </a>
                </li>
                <li class="nav-item">
                     <a href="<?php echo base_url(); ?>admin/change-password" class="nav-link">
                    <i class="fa fa-unlock-alt"></i>&nbsp;
                     <span class="sidebar-normal"><?= trans('change_password');?></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('logout'); ?>" class="nav-link">
                    <i class="fa fa-sign-out"></i>&nbsp;
                     <span class="sidebar-normal"><?= trans('logout');?></span>
                    </a>
                </li>
              </ul>
            </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
        <li class="header"><?= trans('main_navigation');?></li>
        <li class="<?php if($this->uri->segment(1) === 'admin' && $this->uri->segment(2) === NULL):?> active <?php endif?>">
        <a href="<?php echo base_url(); ?>admin">
        <i class="fa fa-home"></i>
        <span><?= trans('home');?></span>
        </a>
        </li>
       <?php if(is_admin()):?>
            <li class="treeview">
            <a href="#">
            <i class="fa fa-users">
            </i> <span><?= trans('all_contractors');?></span>
            <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
            <li>
            <a href="<?php echo base_url(); ?>admin/contractor">
            <i class="fa fa-users"></i> <?= trans('contractors');?>
            </a>
            </li>
            <?php if(is_admin() || is_permission_user('contractor_create')): ?>
             <li>
            <a href="<?php echo base_url(); ?>admin/add-contractor">
                <i class="fa fa-users"></i> <?= trans('add_contractor');?>
            </a>
            </li>
            <?php endif; ?>
            </ul>
            </li>
        <?php endif; ?>
        <?php if(!is_client()): ?>
            <li class="treeview <?php if($this->uri->segment(2) === 'clients' || $this->uri->segment(2) === 'add-client'):?> active <?php endif?>">
            <a href="#">
            <i class="fa fa-users">
            </i> <span><?= trans('all_clients');?></span>
            <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
            <li class="<?php if($this->uri->segment(2) === 'clients'):?> active <?php endif?>">
            <a href="<?php echo base_url(); ?>admin/clients">
            <i class="fa fa-users"></i> <?= trans('clients');?>
            </a>
            </li>
            <li class="<?php if($this->uri->segment(2) === 'add-client'):?> active <?php endif?>">
            <a href="<?php echo base_url(); ?>admin/add-client">
            <i class="fa fa-users"></i> <?= trans('add_client');?>
            </a>
            </li>
            </ul>
            </li>
           <?php endif; ?> 
            <?php if(is_admin() || is_contractor()): ?>
            <li class="treeview">
            <a href="#">
            <i class="fa fa-users">
            </i> <span><?= trans('all_workers');?></span>
            <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
            <li>
            <a href="<?php echo base_url(); ?>admin/workers">
            <i class="fa fa-users"></i><?= trans('workers');?>
            </a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>admin/add-worker">
                    <i class="fa fa-users"></i> <?= trans('add_worker');?>
                </a>
            </li>
            </ul>
            </li>
        <?php endif; ?>  
        
            <li class="treeview">
            <a href="#">
            <i class="fa fa-folder-open"></i> <span><?= trans('projects');?></span>
            <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
            <?php if(is_admin() || is_contractor() && contractor_project_check()): ?>
            <li>
            <a href="<?php echo base_url(); ?>admin/add-projects">
            <i class="fa fa-folder-open"></i> <?= trans('add_project');?>
            </a>
            </li>
            <?php endif; ?>
            <li>
            <a href="<?php echo base_url(); ?>admin/projects">
            <i class="fa fa-folder-open"></i> <?= trans('projects');?>
            </a>
            </li>
            <!-- <li>-->
            <!--    <a href="admin/apartments">-->
            <!--    <i class="fa fa-folder-open"></i> Apartments-->
            <!--    </a>-->
            <!--</li>-->
            </ul>
            </li>
            
            <li class="treeview">
                <a href="<?php echo base_url(); ?>admin/project/apartments">
                <i class="fa fa-home"></i> <span><?= trans('apartments');?></span>
                </a>
            </li>
    
         <?php if(is_admin()): ?>
            <li class="treeview">
            <a href="#">
            <i class="fa fa-users">
            </i> <span><?= trans('sub_admin');?></span>
            <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
            <li>
            <a href="<?php echo base_url(); ?>admin/sub-admin">
            <i class="fa fa-users"></i> <?= trans('sub_admin');?>
            </a>
            </li>
            <?php if(is_admin() || is_permission_user('sub_admin_create')): ?>
            <li>
            <a href="<?php echo base_url(); ?>admin/add-sub-admin">
            <i class="fa fa-users"></i> <?= trans('add_sub_admin');?>
            </a>
            </li>
            <?php endif; ?>
            </ul>
            </li>
            <?php endif; ?>
        
        <!--<?php if(is_admin() || is_permission_user('permission_show')): ?>-->
        <!--    <li class="treeview">-->
        <!--    <a href="#">-->
        <!--    <i class="fa fa-lock">-->
        <!--    </i> <span>Permission</span>-->
        <!--    <i class="fa fa-angle-left pull-right"></i>-->
        <!--    </a>-->
        <!--    <ul class="treeview-menu">-->
        <!--    <li>-->
        <!--    <a href="<?php echo base_url(); ?>admin/add-permission">-->
        <!--        <i class="fa fa-lock"></i> Add Permission-->
        <!--    </a>-->
        <!--    </li>-->
        <!--    <li>-->
        <!--    <a href="<?php echo base_url(); ?>admin/permission">-->
        <!--        <i class="fa fa-lock"></i> Permission-->
        <!--    </a>-->
        <!--    </li>-->
        <!--    </ul>-->
        <!--    </li>-->
        <!--<?php endif; ?>-->
      
   

    <!--<?php if(is_admin() || is_permission_user('sms_report_show')):?>-->
    <!--    <li class="treeview">-->
    <!--    <a href="#">-->
    <!--    <i class="fa fa-commenting-o">-->
    <!--    </i> <span>Sms Reports</span>-->
    <!--    <i class="fa fa-angle-left pull-right"></i>-->
    <!--    </a>-->
    <!--    <ul class="treeview-menu">-->
    <!--    <li>-->
    <!--    <a href="<?php echo base_url(); ?>admin/add-sms-reports">-->
    <!--    <i class="fa fa-mobile"></i> Send SMS Reports-->
    <!--    </a>-->
    <!--    </li>-->
    <!--    <li>-->
    <!--    <a href="<?php echo base_url(); ?>admin/sms-reports">-->
    <!--            <i class="fa fa-commenting-o"></i>-->
    <!--            Sms Reports-->
    <!--        </a>-->
    <!--    </li>-->
    <!--    </ul>-->
    <!--    </li>-->
    <!--<?php endif;?> -->

   

    <?php if(is_admin()):?>
      <li class="treeview">
            <a href="<?php echo base_url(); ?>admin/finance">
                <i class="fa fa-handshake-o"></i>
                <?= trans('finance');?>
            </a>
        </li>
    <?php endif;?> 
     <?php if(is_contractor() || is_worker() || is_client()):?>
      <li class="treeview">
            <a id="invoice" href="<?php echo base_url(); ?>admin/invoices/all">
                <i class="fa fa-handshake-o"></i>
                <?= trans('invoice');?>
            </a>
        </li>
    <?php endif;?>
    
     <?php if(is_contractor() || is_worker() || is_client()):?>
      <li class="treeview">
            <a id="files" href="<?php echo base_url(); ?>admin/files">
                <i class="fa fa-file"></i>
                <?= trans('files');?>
            </a>
        </li>
    <?php endif;?>
    <!--<li class="treeview">-->
    <!--    <a href="#">-->
    <!--    <i class="fa fa-paper-plane"></i> <span><?= trans('messages');?></span>-->
    <!--    <i class="fa fa-angle-left pull-right"></i>-->
    <!--    </a>-->
    <!--    <ul class="treeview-menu">-->
    <!--    <li>-->
    <!--    <a href="<?php echo base_url(); ?>send-messages">-->
    <!--    <i class="fa fa-paper-plane"></i> <?= trans('send_message');?>-->
    <!--    </a>-->
    <!--    </li>-->
    <!--    <li>-->
    <!--    <a href="<?php echo base_url(); ?>messages">-->
    <!--    <i class="fa fa-paper-plane"></i> <?= trans('messages');?>-->
    <!--    </a>-->
    <!--    </li>-->

    <!--    <li>-->
    <!--    <a href="<?php echo base_url(); ?>receive-messages">-->
    <!--    <i class="fa fa-paper-plane"></i><?= trans('received_messages');?>-->
    <!--    </a>-->
    <!--    </li>-->

    <!--    </ul>-->
    <!--</li>-->

        <li class="treeview">
        <a href="<?php echo base_url(); ?>admin/profile">
        <i class="fa fa-users"></i> 
        <span><?= trans('profile');?></span>
        </a>
        </li>
     <?php if(is_admin()): ?>
        <li class="treeview">
        <a href="#">
        <i class="fa fa-leaf">
        </i> <span><?= trans('pages');?></span>
        <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
        <li>
        <a href="<?php echo base_url(); ?>admin/add-page">
            <i class="fa fa-leaf"></i> <?= trans('add_page');?>
        </a>
        </li>
        <li>
        <a href="<?php echo base_url(); ?>admin/pages">
            <i class="fa fa-leaf"></i> <?= trans('pages');?>
        </a>
        </li>
        </ul>
        </li>
        <li class="treeview">
        <a href="#">
        <i class="fa fa-cogs">
        </i> <span><?= trans('web_site_setting');?></span>
        <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li>
            <a href="<?php echo base_url(); ?>admin/visual-settings">
            <i class="fa fa-paint-brush"></i><?= trans('logo_setting');?>
            </a>
            </li>
            <li>
            <a href="<?php echo base_url(); ?>admin/settings">
            <i class="fa fa-cogs"></i><?= trans('setting');?>
            </a>
            </li>
        </ul>

        </li>
         
    <?php endif; ?>
  
        
        </ul>
     </section>
        <!-- /.sidebar -->
 </aside> 
