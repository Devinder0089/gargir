<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

</section><!-- /.content -->
</div><!-- /.content-wrapper -->
</div><!-- ./wrapper -->

<!--Category Colors-->
<?php foreach ($categories as $item): ?>
    <script>
        $('.category-color-<?php echo $item->id; ?>').css("background-color", '<?php echo $item->color; ?>');
    </script>
<?php endforeach; ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-slimScroll/1.3.8/jquery.slimscroll.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/jQueryUI/jquery-ui.min.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>

<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/admin/js/app.min.js"></script>

<!-- DataTables js -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/admin/plugins/datatables/dataTables.bootstrap.min.js"></script>

<!-- iCheck js -->
<script src="<?php echo base_url(); ?>assets/vendor/icheck/icheck.min.js"></script>

<!-- Ckeditor js -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/ckeditor/ckeditor.js"></script>

<!-- Pace -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/pace/pace.min.js"></script>

<script src="<?php echo base_url(); ?>assets/admin/plugins/tagsinput/bootstrap-tagsinput.min.js"></script>

<!-- Bootstrap Toggle js -->
<script src="<?php echo base_url(); ?>assets/admin/js/bootstrap-toggle.min.js"></script>

<!-- Cookie js -->
<script src="<?php echo base_url(); ?>assets/js/jquery.cookie.js"></script>

<!-- Color Picker js -->
<script src="<?php echo base_url(); ?>assets/admin/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>

<script src="https://html.psdtohtmlexpert.com/admin/aqua-admin-template/html/assets/vendor_components/apexcharts-bundle/dist/apexcharts.js"></script>

<script src="https://html.psdtohtmlexpert.com/admin/aqua-admin-template/html/main-rtl/js/pages/dashboard2.js"></script>

<!-- Custom js  -->
<script src="<?php echo base_url(); ?>assets/admin/js/custom.js"></script>

<!-- <script src="https://html.psdtohtmlexpert.com/admin/aqua-admin-template/html/main-rtl/js/template.js"></script> -->

<!-- Ck editor -->
<script>

   var ckEditorscheck = document.getElementById("ckEditor");
   
   if(ckEditorscheck){
    CKEDITOR.replace('ckEditor',{
        language: 'en',
        filebrowserImageUploadUrl: "<?php echo base_url(); ?>post/upload_ckimage_post?key=kgh764hdj990sghsg46r",
    });
    
   }
   
</script>
     <script>

$(document).ready(function(){
  
 function total_check_chat_notification()
 {
  var type = 'yes';
  $.ajax({
  url:"<?php echo base_url(); ?>chat/total_check_chat_notification",
  method:"POST",
  data: {type:type},
  dataType:"json",
  success:function(data)
  {
      if(data.total_notification != ''){
         
          $('.usermsg').html('<i class="fa fa-envelope" aria-hidden="true"></i><span class="countmsg">'+data.total_notification+'</span>');
          if(data.sound > 0){
              var mp3 = '<source src="'+base_url+'/uploads/alert_bell" type="audio/mpeg">';
              document.getElementById("sound").innerHTML ='<audio autoplay="autoplay">' + mp3 + "</audio>";
              $.ajax({
                  url:"<?php echo base_url(); ?>chat/message_update",
                  method:"POST",
                  data: {type:type},
                  dataType:"json",
                  success:function(data)
                  {
                      console.log('updated');
                  }
                  
              });
          }
          
      }else{
          $('.usermsg').html('<i class="fa fa-envelope" aria-hidden="true"></i>');
      }
      
  }
  });
 }
setInterval(function(){

  total_check_chat_notification();
 }, 5000);
 

});

</script>
</body>
</html>

