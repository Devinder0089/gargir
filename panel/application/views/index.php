<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
   <head>
      <title></title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      	<link rel="icon" href="/gargir/favicon.ico">
	<link rel="apple-touch-icon" href="/gargir/nadlanpro-logo.png">
      <link rel="stylesheet" href="<?= base_url() ?>assets/web/home/css/bootstrap.min.css">
      <link rel="stylesheet" href="<?= base_url() ?>assets/web/home/css/style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   <script>
        var csfr_token_name = '<?php echo $this->security->get_csrf_token_name(); ?>';
        var csfr_cookie_name = '<?php echo $this->config->item('csrf_cookie_name'); ?>';
        var csfr_token = '<?php echo $this->security->get_csrf_hash(); ?>';
        var base_url = '<?php echo base_url(); ?>';
    </script>
   </head>
   <body>
      <header id="header-one">
         <div class="container">
            <nav class="navbar navbar-expand-lg ">
               <div class="logo-header">
                  <a class="navbar-brand" href="#"><img src="<?= base_url() ?>assets/web/home/images/logo.png"></a>
               </div>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
               <span class="navbar-toggler-icon"></span>
               <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                  <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                     <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#">About Us</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                     </li>
                     <li class="nav-item login-nv">
                        <a class="nav-link" href="#"  data-toggle="modal" data-target="#exampleModalCenter">Login</a>
                     </li>                    
                     <!-- Modal -->
                     <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                       <div class="modal-dialog modal-dialog-centered" role="document">                           
                         <div class="modal-content">
                           <div class="modal-header">
                             <h5 class="modal-title" id="exampleModalLongTitle">LogIn Here!</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                           </button>                            
                           </div>
                           <div class="modal-body">
                            <form class="row g-3" id="loginfrom">
                                <div class="errors" style="color:red"></div>
                              <div class="col-md-12">
                                 <input type="text" class="form-control" name="email" id="inputPassword4" placeholder="Email">
                              </div>
                              <div class="col-md-12">
                                 <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="Password">
                              </div>
                              <div class="frame col-12 mt-4">       
                                 <button type="button" class="custom-btn btn-6 submit" id="sign-in"><span>Submit</span></button>
                              </div>
                           </form>
                           </div>
                           
                         </div>
                       </div>
                     </div>
                  </ul>
               </div>
            </nav>
         </div>
      </header>
      <!-- header ends here -->
      <section class="banner">
         <video autoplay="" muted="" loop="" id="myVideo">
            <source src="<?= base_url() ?>assets/web/home/images/hro-video.mp4" type="video/mp4">
         </video>
         <div class="container">
            <div class="row">
               <div class="banner-content col-md-12 text-center">
                  <h1>Where does <span>it come from?</span></h1>
                  <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard.</p>
                  <div class="frame">
                     <button type="button" class="custom-btn btn-6"><span>Learn More</span></button>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- banner ends here -->
      <section class="leading">
         <div class="container">
            <div class="row">
               <div class="lead-l col-md-6">
                  <div class="lead-img">
                     <img src="<?= base_url() ?>assets/web/home/images/img2.jpg">
                  </div>
                  <div class="leadp-img">
                     <img src="<?= base_url() ?>assets/web/home/images/img3.png">
                     <a id="play-video" class="video-play-button" href="#">
                     <span></span>
                     </a>
                     <div id="video-overlay" class="video-overlay">
                        <a class="video-overlay-close">&times;</a>
                     </div>
                  </div>
               </div>
               <div class="lead-r col-md-6">
                  <h2 class="heading-style-one">Interested?</h2>
                  <p>The software that puts you in the jungle of the real estate world</p>
                  <form class="row g-3">
                     <div class="col-md-12">
                        <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                     </div>
                     <div class="col-md-12">
                        <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
                     </div>
                     <div class="col-12">
                        <input type="text" class="form-control" id="inputAddress" placeholder="Address">
                     </div>
                     <div class="col-md-12">
                        <input type="text" class="form-control" id="inputCity" placeholder="City">
                     </div>
                     <div class="frame col-12 mt-4">		  
                        <button type="submit" class="custom-btn btn-6" id="sign-in"><span>Sign in</span></button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </section>
      <section class="trans-md">
         <div class="container">
            <div class="row">
               <div class="bold-head col-md-12">
                  <h2 class="heading-style-one">Features</h2>
               </div>
               <div class="buy-coin-md col-md-4">
                  <div class="coin-icon">
                     <div class="co-image">
                        <img src="<?= base_url() ?>assets/web/home/images/icon-1.png">
                     </div>
                     <div class="co-content-md">
                        <h4>Digital signature with a click</h4>
                        <p>Signing an "ordering brokerage services" form or an "exclusivity agreement" is an integral and necessary part </p>
                        <div class="frame">
                           <button type="button" class="custom-btn btn-6" id="read-more"><span>Read More</span></button>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="buy-coin-md col-md-4">
                  <div class="coin-icon">
                     <div class="co-image">
                        <img src="<?= base_url() ?>assets/web/home/images/icon-2.png">
                     </div>
                     <div class="co-content-md">
                        <h4>Real estate software also in mobile</h4>
                        <p>Signing an "ordering brokerage services" form or an "exclusivity agreement" is an integral and necessary part </p>
                        <div class="frame">
                           <button type="button" class="custom-btn btn-6" id="read-more"><span>Read More</span></button>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="buy-coin-md col-md-4">
                  <div class="coin-icon">
                     <div class="co-image">
                        <img src="<?= base_url() ?>assets/web/home/images/icon-3.png">
                     </div>
                     <div class="co-content-md">
                        <h4>Brokerage software</h4>
                        <p>Signing an "ordering brokerage services" form or an "exclusivity agreement" is an integral and necessary part </p>
                        <div class="frame">
                           <button type="button" class="custom-btn btn-6" id="read-more"><span>Read More</span></button>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="buy-coin-md col-md-4">
                  <div class="coin-icon">
                     <div class="co-image">
                        <img src="<?= base_url() ?>assets/web/home/images/icon-4.png">
                     </div>
                     <div class="co-content-md">
                        <h4>Website</h4>
                        <p>Signing an "ordering brokerage services" form or an "exclusivity agreement" is an integral and necessary part </p>
                        <div class="frame">
                           <button type="button" class="custom-btn btn-6" id="read-more"><span>Read More</span></button>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="buy-coin-md col-md-4">
                  <div class="coin-icon">
                     <div class="co-image">
                        <img src="<?= base_url() ?>assets/web/home/images/icon-5.png">
                     </div>
                     <div class="co-content-md">
                        <h4>Click advertising</h4>
                        <p>Signing an "ordering brokerage services" form or an "exclusivity agreement" is an integral and necessary part </p>
                        <div class="frame">
                           <button type="button" class="custom-btn btn-6" id="read-more"><span>Read More</span></button>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="buy-coin-md col-md-4">
                  <div class="coin-icon">
                     <div class="co-image">
                        <img src="<?= base_url() ?>assets/web/home/images/icon-6.png">
                     </div>
                     <div class="co-content-md">
                        <h4>Database of apartments</h4>
                        <p>Signing an "ordering brokerage services" form or an "exclusivity agreement" is an integral and necessary part </p>
                        <div class="frame">
                           <button type="button" class="custom-btn btn-6" id="read-more"><span>Read More</span></button>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="buy-coin-md col-md-4">
                  <div class="coin-icon">
                     <div class="co-image">
                        <img src="<?= base_url() ?>assets/web/home/images/icon-7.png">
                     </div>
                     <div class="co-content-md">
                        <h4>Data Security</h4>
                        <p>Signing an "ordering brokerage services" form or an "exclusivity agreement" is an integral and necessary part </p>
                        <div class="frame">
                           <button type="button" class="custom-btn btn-6" id="read-more"><span>Read More</span></button>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="buy-coin-md col-md-4">
                  <div class="coin-icon">
                     <div class="co-image">
                        <img src="<?= base_url() ?>assets/web/home/images/icon-8.png">
                     </div>
                     <div class="co-content-md">
                        <h4>HOMELY-MLS</h4>
                        <p>Signing an "ordering brokerage services" form or an "exclusivity agreement" is an integral and necessary part </p>
                        <div class="frame">
                           <button type="button" class="custom-btn btn-6" id="read-more"><span>Read More</span></button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- TRANS-MD ENDS HERE -->
      <section class="contact-form">
         <div class="container">
            <div class="row">
               <div class="half-form col-md-6">
                  <div class=" col-md-12">
                     <h2 class="heading-style-one">Contact Us</h2>
                  </div>
                  <form class="row g-3">
                     <div class="col-md-12">
                        <input type="text" class="form-control" id="inputEmail4" placeholder="Name">
                     </div>
                     <div class="col-md-12">
                        <input type="email" class="form-control" id="inputPassword4" placeholder="Email">
                     </div>
                     <div class="col-md-12">
                        <textarea type="text" class="form-control message-form" id="inputCity" placeholder="Message..."></textarea>
                     </div>
                     <div class="frame col-12 mt-4">		  
                        <button type="submit" class="custom-btn btn-6" id="sign-in"><span>Submit</span></button>
                     </div>
                  </form>
               </div>
               <div class="vid-md col-md-6">
                  <!-- <div class="img-cls">	
                     <img src="images/img1.jpg">
                     </div>
                     <div class="img-cls">	
                     	<div class="img-subcls">	
                     		<img src="images/img3.jpg">
                     	</div>
                     	<div class="img-subcls">
                     		<img src="images/img4.jpg">	
                     	</div>
                     </div> -->
               </div>
            </div>
         </div>
      </section>
      <!-- contact-form ends here -->
      <footer id="footer">
         <div class="container-fluid">
            <div class="row">
               <div class="foot-pages col-md-5">
                  <div class="foot-col">
                     <div class="footer-logo">
                        <img src="<?= base_url() ?>assets/web/home/images/logo.png">
                     </div>
                     <p>This website is owned and operated and is a subsidiary of APHEX CPITAL PUBLIC LIMITED COMPANY</p>
                     <div class="social-footer-icon">
                        <ul>
                           <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                           <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                           <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                           <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="foot-pages col-md-2">
                  <div class="foot-col">
                     <h2>Support</h2>
                     <ul>
                        <li><a href="#">Terms & conditions</a></li>
                        <li><a href="#">Security & Privacy</a></li>
                        <li><a href="#">AML</a></li>
                        <li><a href="#">CoinMarketCap</a></li>
                     </ul>
                  </div>
               </div>
               <div class="foot-pages col-md-2">
                  <div class="foot-col">
                     <h2>pages</h2>
                     <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Account Types</a></li>
                        <li><a href="#">Contact Us</a></li>
                     </ul>
                  </div>
               </div>
               <div class="foot-pages col-md-3">
                  <div class="foot-col foot-cols">
                     <h2>Address</h2>
                     <p><i class="fa fa-map-marker"></i>3 GEORGE'S DOCK, IFSC 3 GEORGE'S DOCK, Ireland</p>
                     <p><i class="fa fa-phone"></i>+01-234-567-8</p>
                     <p><i class="fa fa-envelope"></i>webexample@gmail.com</p>
                  </div>
               </div>
            </div>
            <hr class="rule-one">
            <div class="copyright">
               <p>All rights reserved to APHEX CAPITAL PUBLIC LIMITED COMPANY 2003 &#169;</p>
            </div>
         </div>
      </footer>
      <script src="<?= base_url() ?>assets/web/home/js/jquery.js"></script>
      <script src="<?= base_url() ?>assets/web/home/js/bootstrap.min.js"></script>
      <script type="text/javascript">
      $('.submit').click(function(){
	        var email = $('input[name=email]').val();
	        var password = $('input[name=password]').val();
	        
	        if(email && password){
	            $.ajax({
                type: "POST",
                url: base_url + 'auth/login_ajax_post',
                data:{email:email,password:password},
                success:function(data){
                    if(data == 'success'){
                        window.location.href= base_url+'admin';
                    }else{
                        $('.errors').html(data);
                    }
                }
            });
	        }
	    });
         $('#play-video').on('click', function(e){
         e.preventDefault();
         $('#video-overlay').addClass('open');
         $("#video-overlay").append('<iframe width="560" height="315" src="https://www.youtube.com/embed/ngElkyQ6Rhs" frameborder="0" allowfullscreen></iframe>');
         });
         
         $('.video-overlay, .video-overlay-close').on('click', function(e){
         e.preventDefault();
         close_video();
         });
         
         $(document).keyup(function(e){
         if(e.keyCode === 27) { close_video(); }
         });
         
         function close_video() {
         $('.video-overlay.open').removeClass('open').find('iframe').remove();
         };
      </script>
      	
   </body>
</html>

<!--    <!DOCTYPE html>-->
<!--    <html lang="en">-->
<!--    <head>-->
<!--        <meta charset="utf-8">-->
<!--        <meta http-equiv="X-UA-Compatible" content="IE=edge">-->
<!--        <meta name="viewport" content="width=device-width, initial-scale=1">-->
<!--        <title>admin</title>-->
    
<!--        <link rel="shortcut icon" type="image/png" href="<?php echo get_favicon($vsettings); ?>"/>-->

        <!-- Font-awesome CSS -->
<!--        <link href="<?php echo base_url(); ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>-->

        <!-- Bootstrap CSS -->
<!--        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css"/>-->

       

        <!-- Style -->
<!--        <link href="<?php echo base_url(); ?>assets/css/style.min.css" rel="stylesheet"/>-->
<!--        <link href="<?php echo base_url(); ?>assets/css/custom-style.css" rel="stylesheet"/>-->

        <!-- Responsive -->
<!--        <link href="<?php echo base_url(); ?>assets/css/responsive.min.css" rel="stylesheet"/>-->

     
<!--    </head>-->
<!--<body>-->
<!-- Section: wrapper -->
<!--<section id="wrapper">-->
<!--    <div class="container">-->
<!--        <div class="row">-->
    
<!--            <div class="col-sm-12 page-login">-->
<!--                <div class="row">-->
<!--                    <div class="col-sm-6 col-xs-12 login-box-cnt center-box">-->
<!--                        <div class="loginbox formsec">-->
<!--                            <div class="box-head">-->
<!--                                <h1 class="auth-title font-1">-->
<!--                                    Login-->
<!--                                </h1>-->
<!--                            </div>-->
<!--                            <div class="box-body">-->
                              
                                <!-- form start -->
<!--                                <?php echo form_open("auth/login_post"); ?>-->

                                <!-- include message block -->
<!--                                <?php $this->load->view('partials/_messages'); ?>-->

<!--                                <div class="form-group has-feedback">-->
<!--                                    <input type="text" name="email" class="form-control form-input"-->
<!--                                           placeholder="<?php echo trans("placeholder_email"); ?>"-->
<!--                                           value="<?php echo old('email'); ?>" required>-->
<!--                                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>-->
<!--                                </div>-->
<!--                                <div class="form-group has-feedback">-->
<!--                                <input type="password" name="password" class="form-control form-input"-->
<!--                                           placeholder="<?php echo trans("placeholder_password"); ?>"-->
<!--                                           value="<?php echo old('password'); ?>" required>-->
<!--                                    <span class=" glyphicon glyphicon-lock form-control-feedback"></span>-->
<!--                                </div>-->

<!--                                <div class="row">-->
<!--                                    <div class="col-sm-12 col-xs-12 loginsec">-->
<!--                                        <button type="submit" class="btn btn-primary btn-custom">-->
<!--                                       Login-->
<!--                                        </button>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <?php echo form_close(); ?><!-- form end -->-->

<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!-- /.Section: wrapper -->


<!--</body>-->
<!--</html>-->