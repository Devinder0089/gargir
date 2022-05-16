<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin <?php echo html_escape($settings->site_title); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="shortcut icon" type="image/png" href="<?php echo get_favicon($vsettings); ?>"/>

    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/_boxes.css">

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/AdminLTE.min.css">
    <!-- AdminLTE Skins -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/_all-skins.min.css">
    <!-- Datatables -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet"
          href="<?php echo base_url(); ?>assets/admin/plugins/datatables/jquery.dataTables_themeroller.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/icheck/square/purple.css">

    <!-- Tags Input -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/tagsinput/bootstrap-tagsinput.css">

    <!-- Bootstrap Toggle  css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/bootstrap-toggle.min.css">

    <!-- Color Picker css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/plugins/colorpicker/bootstrap-colorpicker.min.css">

    <!-- Custom css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/custom.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/select2.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/custom-style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/admin/css/style.css">
    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>assets/admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/select2.js"></script>
   
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script>
        var csfr_token_name = '<?php echo $this->security->get_csrf_token_name(); ?>';
        var csfr_cookie_name = '<?php echo $this->config->item('csrf_cookie_name'); ?>';
        var csfr_token = '<?php echo $this->security->get_csrf_hash(); ?>';
        var base_url = '<?php echo base_url(); ?>';
    </script>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="<?php echo get_home_url(); ?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>I</b>n</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">
                <!--<b><?php echo html_escape($settings->application_name); ?> Panelsssssssssssssss</b>-->
                <img src="<?= base_url() ?>assets/admin/img/Nadlanpro-logo.png">
            </span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
             <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <!--  <i class="fa fa-ellipsis-v"></i> -->
            </a>
            
            <div class="navbarcustom-right">
              <select class="form-control" onchange="javascript:window.location.href='<?php echo base_url(); ?>LanguageSwitcher/switchLang/'+this.value;">
                <option value="english" <?php if($this->session->userdata('site_lang') == 'english') echo 'selected="selected"'; ?>>English</option>
                <option value="hebrew" <?php if($this->session->userdata('site_lang') == 'hebrew') echo 'selected="selected"'; ?>>Hebrew</option>   
            </select>
             </div>

              <div class="navbarcustom-right">
                <a href="<?php echo base_url('admin'); ?>" class="sidebartitle">
                <?= trans('dashboard');?>
                </a>
             </div>
            <div class="navbar-custom-menu">
                <!--<a class="btn btn-sm btn-success pull-left btn-site-prev" href="<?php echo get_home_url(); ?>"><i-->
                <!--            class="fa fa-eye"></i> View Site</a>-->
                <ul class="nav navbar-nav liusermsgsec">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="usermenu">
                        <a href="<?php echo base_url(); ?>" class="userimga">
                            <img src="<?php echo base_url(); ?><?=(user()->avatar)?user()->avatar:"assets/admin/img/user.jpg"; ?>" class="user-image"
                                 alt="User Image">
                            <span class="fulluserrol"><?=(user())?user()->role:"user"; ?></span>
                        </a>

                    </li>
                    <li class="usermenu liusermsg">
                      
                         <a href="<?php echo base_url(); ?>admin/chat" class="usermsg">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                         </a>
                        <div id="sound"></div>
                    </li>
                </ul>
            </div>
        </nav>
       
    </header>

<!-- sidebar: style can be found in sidebar.less -->

 <?php include('sidebar.php'); ?>

<!-- /.sidebar -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
