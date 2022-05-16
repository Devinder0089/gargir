<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>admin</title>
    
        <link rel="shortcut icon" type="image/png" href="<?php echo get_favicon($vsettings); ?>"/>

        <!-- Font-awesome CSS -->
        <link href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css"/>

       

        <!-- Style -->
        <link href="<?php echo base_url(); ?>assets/css/style.min.css" rel="stylesheet"/>
        <link href="<?php echo base_url(); ?>assets/css/custom-style.css" rel="stylesheet"/>

        <!-- Responsive -->
        <link href="<?php echo base_url(); ?>assets/css/responsive.min.css" rel="stylesheet"/>

     
    </head>
<body>
<!-- Section: wrapper -->
<section id="wrapper">
    <div class="container">
        <div class="row">
    
            <div class="col-sm-12 page-login">
                <div class="row">
                    <div class="col-sm-6 col-xs-12 login-box-cnt center-box">
                        <div class="loginbox formsec">
                            <div class="box-head">
                                <h1 class="auth-title font-1">
                                    Login
                                </h1>
                            </div>
                            <div class="box-body">
                              
                                <!-- form start -->
                                <?php echo form_open(base_url()."admin/login-post"); ?>

                                <!-- include message block -->
                                <?php $this->load->view('partials/_messages'); ?>

                                <div class="form-group has-feedback">
                                    <input type="email" name="email" class="form-control form-input"
                                           placeholder="<?php echo trans("placeholder_email"); ?>"
                                           value="<?php echo old('email'); ?>" required>
                                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                </div>
                                <div class="form-group has-feedback">
                                <input type="password" name="password" class="form-control form-input"
                                           placeholder="<?php echo trans("placeholder_password"); ?>"
                                           value="<?php echo old('password'); ?>" required>
                                    <span class=" glyphicon glyphicon-lock form-control-feedback"></span>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12 col-xs-12 loginsec">
                                        <button type="submit" class="btn btn-primary btn-custom">
                                       Login
                                        </button>
                                    </div>
                                </div>
                                <?php echo form_close(); ?><!-- form end -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.Section: wrapper -->


</body>
</html>