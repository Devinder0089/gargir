<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo html_escape($title); ?> - <?php echo html_escape($settings->site_title); ?></title>


<link rel="shortcut icon" type="image/png" href="<?php echo get_favicon($vsettings); ?>"/>

<!-- Font-awesome CSS -->
<link href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>

<!-- Simple-line-icons CSS -->
<link href="<?php echo base_url(); ?>assets/vendor/simple-line-icons/css/simple-line-icons.css"
rel="stylesheet"/>

<!-- Ionicons CSS -->
<link href="<?php echo base_url(); ?>assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet"/>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css"/>


<!-- Owl Carousel -->
<link href="<?php echo base_url(); ?>assets/vendor/owl-carousel/owl.carousel.min.css" rel="stylesheet"/>
<link href="<?php echo base_url(); ?>assets/vendor/owl-carousel/owl.theme.default.min.css" rel="stylesheet"/>

<!-- iCheck -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/icheck/minimal/green.css"/>

<!-- Jquery Confirm CSS -->
<link href="<?php echo base_url(); ?>assets/vendor/jquery-confirm/jquery-confirm.min.css" rel="stylesheet"/>

<!-- Magnific Popup-->
<link href="<?php echo base_url(); ?>assets/vendor/magnific-popup/magnific-popup.css" rel="stylesheet"/>

<!-- Style -->
<link href="<?php echo base_url(); ?>assets/css/style.min.css" rel="stylesheet"/>

<!-- Color CSS -->
<?php if ($vsettings->site_color == '') : ?>
<link href="<?php echo base_url(); ?>assets/css/colors/default.css" rel="stylesheet"/>
<?php else : ?>
<link href="<?php echo base_url(); ?>assets/css/colors/<?php echo html_escape($vsettings->site_color); ?>.css"
rel="stylesheet"/>
<?php endif; ?>

<!-- Responsive -->
<link href="<?php echo base_url(); ?>assets/css/responsive.min.css" rel="stylesheet"/>

<!--Include Font Style-->
<?php $this->load->view('partials/_font_style'); ?>

<!-- Style -->
<link href="<?php echo base_url(); ?>assets/css/public-style.css" rel="stylesheet"/>


</head>
<body>
