<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Admin <?php echo html_escape($settings->site_title); ?></title>
	<link rel="shortcut icon" type="image/png" href="<?php echo get_favicon($vsettings); ?>"/>
		<!-- Latest compiled and minified CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
        <style>
            .sub-full-page{
            	background: #e2e2e2;
            }
            .agree-sec {
                padding: 50px;
            }
            .agree-sec-pro {
                background: #fff;
                padding: 20px;
                text-align: right;
            }
            .agree-sec-pro h5 {
                color: #3a9c00;
            }
            .agree-sec-pro p{
            	padding: 10px 0 20px 0;
            }
            button.btn-customers {
                color: #fff;
                border: 0;
                background: #ff9000;
                padding: 3px 20px;
                border-radius: 5px;
                outline: none;
            }
            button.btn-cr-agree {
                color: #fff;
                border: 0;
                background:#436efd;
                padding: 3px 20px;
                border-radius: 5px;
                outline: none;
            }
            button.btn-back {
                color: #fff;
                border: 0;
                background: #436efd;
                padding: 3px 20px;
                border-radius: 5px;
                outline: none;
            }
            .new-modals {
                padding: 0 0 30px 0;
            }
            .new-modals .roees {
                background: #fff;
                text-align: right;
                padding: 20px;
            }
            .new-modals .orderings {
                background: #fff;
                text-align: center;
            }
            .more-options {
                text-align: right;
            }
            .buttons-more-btn {
                padding: 5px 0;
            }
            .btn-cr-whats{
                background: #3a9c00;
                color: #fff;
                border: 0;
                padding: 3px 20px;
                border-radius: 5px;
                outline: none;
            }
            .btn-cr-red{
                background: #f00;
                color: #fff;
                border: 0;
                padding: 3px 20px;
                border-radius: 5px;
                outline: none;
            }
            .btn-cre{
            	border: 0;
                padding: 3px 20px;
                border-radius: 5px;
                outline: none
            }
            a.btn-back {
                color: #fff;
                border: 0;
                background: #436efd;
                padding: 3px 20px;
                border-radius: 5px;
                outline: none;
            }
        </style>
    </head>
    <body style="background:#dedede">
        <div class="sub-full-page">
            <div class="agree-sec">
            	<div class="container">
            	    <div style="text-align:center"><h3> <?php echo count($unsigned) ;?> documents are waiting for you to sign</h3></div>
            	    <?php foreach($unsigned as $unsign):?>
                		<div class="row" style="margin-top:7px;">
                			<div class="agree-sec-pro">
                			    <?php if($unsign['type'] == 'stamp_in'):?>
                			        <h5><span style="color:black">Name of agreement:</span>   Ordering real estate services for the buy and / or rental of a real estate property</h5>
                			    <?php elseif($unsign['type'] == 'stamp_owner'):?>
                			        <h5><span style="color:black">Name of agreement:</span>   Ordering real estate services for the sale and / or rental of a real estate property</h5>
                			    <?php elseif($unsign['type'] == 'exclusive'):?>
                			        <h5><span style="color:black">Name of agreement:</span> Ordering brokerage services exclusively Exclusive</h5>
            			        <?php elseif($unsign['type'] == 'collaborator'):?>
                			        <h5><span style="color:black">Name of agreement:</span> Cooperation agreement between brokers</h5>
                			    <?php endif;?>
                				<h5><span style="color:black">Properties:</span></h5>
                				<?php foreach($property as $pro):
                                        $prop = explode(",", $unsign['property_id']);
                                        if(in_array($pro['id'],$prop)):
                                    ?>
                                    <h5><?php echo $pro['street']; ?>, <?php echo $pro['city']; ?></h5>
                                <?php endif; endforeach;?>
                				
                				<a class="btn-back" href="<?php echo base_url()?>client/agreement/sign/<?php echo $client ;?>/<?php echo $unsign['id'] ;?>">To view the agreement click here</a>
                			</div>
                		</div>
            		<?php endforeach; ?>
            	</div>
            </div>
            
            
            
        </div>
    </body>
</html>
