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
     <link rel="stylesheet" href="https://zeroitsolutions.com/nandlanpro/panel/assets/admin/css/style.css">
</head>
<body>
<div class="sub-full-page">
    <div class="agree-sec">
    	<div class="container">
    		<div class="row">
    		    <?php if(!empty($unsigned)):?>
    		        <div style="text-align:center; margin-top:20px; font-size: 24px;"><a href="<?php echo base_url()?>client/unsigned/agreements/<?php echo $client ?>"><?php echo $unsigned ?> Documents are awaiting signing</a></div>
    			<?php endif; ?>
    			<div class="agree-sec-pro col-md-10">
    				<?php if(isset($alreadySubmit)):?>
    		            <h4><?php echo $alreadySubmit ?> <i class="fa fa-check"></i></h4>
    				<?php elseif(isset($success)):?>
    		            <h4><?php echo $success ?> <i class="fa fa-check"></i></h4>
    				<?php endif; ?>
    			</div>
    		</div>
    	</div>
    </div>
   
   
    
</div>
</body>
</html>