<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin <?php echo html_escape($settings->site_title); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="shortcut icon" type="image/png" href="<?php echo get_favicon($vsettings); ?>"/>

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

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>assets/admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>

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
                <b><?php echo html_escape($settings->application_name); ?> Panel</b>
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
                <a href="<?php echo base_url('admin'); ?>" class="sidebartitle">
                Dashboard
                </a>
             </div>
            <div class="navbar-custom-menu">
                <a class="btn btn-sm btn-success pull-left btn-site-prev" href="<?php echo get_home_url(); ?>"><i
                            class="fa fa-eye"></i> View Site</a>
                <ul class="nav navbar-nav liusermsgsec">
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="usermenu">
                        <a href="<?php echo base_url(); ?>" class="userimga">
                            <img src="<?php echo base_url(); ?>assets/admin/img/user.jpg" class="user-image"
                                 alt="User Image">
                        </a>
                    </li>
                    <li class="usermenu liusermsg">
                        <a href="<?php echo base_url('messages'); ?>" class="usermsg">
                        <i class="fa fa-bell" aria-hidden="true"></i>
                        <span class="countmsg">0</span>
                        </a>
                       
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="user-info">
            <a class="col-lg-2 col-xs-2 pullleft pullleftcollpse collapsed" data-toggle="collapse" href="#collapseExample"  aria-expanded="false">
              <span class="caret"></span>
            </a>
            <a class="col-lg-10 col-xs-10 pullleft hypinfo" href="<?php echo base_url('profile'); ?>">
                <div class="col-lg-10 col-xs-10 leftpull info">
                    <p><?php echo html_escape(user()->username); ?></p>
                </span>
                </div>
                 <div class="col-lg-2 col-xs-2 pullright image">
                    <img src="<?php echo base_url(); ?>assets/admin/img/user.jpg" class="img-circle" alt="User Image">
                </div>
            </a>
            <div class="pullleftcollapse collapse" id="collapseExample" style="">
              <ul class="nav">
                <li class="nav-item">
                  <a href="<?php echo base_url('profile'); ?>" class="nav-link">
                    <i class="fa fa-user"></i>&nbsp;
                     <span class="sidebar-normal">Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                     <a href="<?php echo base_url('profile-edit'); ?>" class="nav-link">
                    <i class="fa fa-user"></i>&nbsp;
                     <span class="sidebar-normal">Edit Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                     <a href="<?php echo base_url('change-password'); ?>" class="nav-link">
                    <i class="fa fa-unlock-alt"></i>&nbsp;
                     <span class="sidebar-normal">Change Password</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?php echo base_url('logout'); ?>" class="nav-link">
                    <i class="fa fa-sign-out"></i>&nbsp;
                     <span class="sidebar-normal">Logout</span>
                    </a>
                </li>
              </ul>
            </div>
          </div>
                
            </div>


            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <li>
                    <a href="<?php echo base_url(); ?>admin">
                        <i class="fa fa-home"></i>
                        <span>Home</span>
                    </a>
                </li>

                <?php if (is_admin()): ?>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-leaf"></i> <span>Pages</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active">
                                <a href="<?php echo base_url(); ?>admin/add-page">
                                    <i class="fa fa-circle-o"></i> Add Page
                                </a>
                            </li>
                            <li class="active">
                                <a href="<?php echo base_url(); ?>admin/pages">
                                    <i class="fa fa-circle-o"></i> Pages
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-file"></i> <span>Posts</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active">
                                <a href="<?php echo base_url(); ?>admin/add-post"> <i class="fa fa-circle-o"></i> Add Post</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/posts"><i class="fa fa-circle-o"></i> Posts</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/featured-posts"><i class="fa fa-circle-o"></i> Featured Posts</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/featured-slider-posts"><i class="fa fa-circle-o"></i> Featured Slider Posts</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/breaking-news"><i class="fa fa-circle-o"></i> Breaking News</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/recommended-posts"><i class="fa fa-circle-o"></i> Recommended Posts</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/pending-posts"><i class="fa fa-circle-o"></i> Pending Posts</a>
                            </li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-youtube-play"></i> <span>Videos</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active">
                                <a href="<?php echo base_url(); ?>admin/add-video">
                                    <i class="fa fa-circle-o"></i> Add Video
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/videos"><i class="fa fa-circle-o"></i> Videos </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/pending-videos"><i class="fa fa-circle-o"></i> Pending Videos </a>
                            </li>
                        </ul>
                    </li>


                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-folder-open"></i> <span>Categories</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active">
                                <a href="<?php echo base_url(); ?>admin/categories">
                                    <i class="fa fa-circle-o"></i> Categories
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/subcategories"><i class="fa fa-circle-o"></i> Subcategories
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-th"></i> <span>Widgets</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active">
                                <a href="<?php echo base_url(); ?>admin/add-widget">
                                    <i class="fa fa-circle-o"></i> Add Widget
                                </a>
                            </li>
                            <li class="active">
                                <a href="<?php echo base_url(); ?>admin/widgets">
                                    <i class="fa fa-circle-o"></i> Widgets
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-list"></i> <span>Polls</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active">
                                <a href="<?php echo base_url(); ?>admin/add-poll">
                                    <i class="fa fa-circle-o"></i> Add Poll
                                </a>
                            </li>
                            <li class="active">
                                <a href="<?php echo base_url(); ?>admin/polls">
                                    <i class="fa fa-circle-o"></i> Polls
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-image"></i> <span>Gallery</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="<?php echo base_url(); ?>admin/gallery-categories">
                                    <i class="fa fa-circle-o"></i> Categories
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/gallery">
                                    <i class="fa fa-circle-o"></i> Images
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="<?php echo base_url(); ?>admin/contact-messages">
                            <i class="fa fa-paper-plane" aria-hidden="true"></i>
                            <span>Contact Messages</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>admin/comments">
                            <i class="fa fa-comments"></i>
                            <span>Comments</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo base_url(); ?>admin/newsletter">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <span>Newsletter</span>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo base_url(); ?>admin/ads">
                            <i class="fa fa-dollar" aria-hidden="true"></i>
                            <span>Ad Spaces</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>admin/users"><i class="fa fa-users"></i>
                            <span>Users</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>admin/update-profile">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span>Update Profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>admin/font-options"><i class="fa fa-font" aria-hidden="true"></i>
                            <span>Font Options</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>admin/seo-tools"><i class="fa fa-wrench"></i>
                            <span>Seo Tools</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>admin/social-login-configuration"><i class="fa fa-share-alt"></i>
                            <span>Social Login Configuration</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>admin/visual-settings">
                            <i class="fa fa-paint-brush"></i>
                            <span>Visual Settings</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>admin/settings">
                            <i class="fa fa-cogs"></i>
                            <span>Settings</span>
                        </a>
                    </li>

                <?php endif; ?>

                <?php if (is_author()): ?>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-file"></i> <span>Posts</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active">
                                <a href="<?php echo base_url(); ?>admin/add-post"> <i class="fa fa-circle-o"></i> Add Post</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/author-posts"><i class="fa fa-circle-o"></i> Posts</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/pending-posts"><i class="fa fa-circle-o"></i> Pending Posts</a>
                            </li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-youtube-play"></i> <span>Videos</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active">
                                <a href="<?php echo base_url(); ?>admin/add-video">
                                    <i class="fa fa-circle-o"></i> Add Video
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url(); ?>admin/videos"><i class="fa fa-circle-o"></i> Videos </a>
                            </li>

                            <li>
                                <a href="<?php echo base_url(); ?>admin/pending-videos"><i class="fa fa-circle-o"></i> Pending Videos </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>admin/update-profile">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span>Update Profile</span>
                        </a>
                    </li>

                <?php endif; ?>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
