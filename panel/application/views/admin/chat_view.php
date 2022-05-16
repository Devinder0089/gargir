

  <script src="https://zeroitsolutions.com/gargir/panel/assets/admin/plugins/jQuery/jQuery-2.1.4.min.js"></script>
  <script src="https://zeroitsolutions.com/gargir/panel/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
  <link href="https://zeroitsolutions.com/gargir/panel/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> 
  <style type="text/css">
   
   #chat_message_area {
    width: 100%;
    height: 45px;
    min-height: 45px;
    overflow: auto;
    padding: 10px 24px 10px 24px;
    border: 1px solid #474796;
    border-radius: 50px;
    font-size: 18px;
   }

   .notification_circle {
    width: 16px;
    height: 16px;
    border-radius: 50%;
    background-color: #FF0000;
    text-align: center;
    color:#fff;
    padding:3px 6px;
   }
   .online
   {
    width: 16px;
    height: 16px;
    border-radius: 50%;
    background-color: #5cb85c;
    text-align: center;
    color:#fff;
    padding:3px 6px;
   }
   .offline
   {
    width: 16px;
    height: 16px;
    border-radius: 50%;
    background-color: #ccc;
    text-align: center;
    color:#fff;
    padding:3px 6px;
   }
    .image-upload > input
    {
        visibility:hidden;
    }
    
    .image-upload i   {
        width: auto;
        cursor: pointer;
        font-size: 28px !important;
        color: #474796;
    }
    .col-md-3.type-msg-dv {
    margin: 0px !important;
    display: block;
    }
    .image-upload {
    display: inline-flex;
    width: 30px;
    }
button#send_chat {
    background: #ffffff;
    color: #474796;
    opacity: 1;
    border: none;
    font-size: 26px;
    line-height: 1px;
    padding: 4px;
    margin: 0px !important;
    height: 30px;
    width: 30px;
    text-align: center;
}
.enter-msg-btn {
    display: inline-flex;
    width: 30px;
}

div#chat_message_area input {
    width: 100%;
    border: none;
    outline:none;
}

[contentEditable=true]:empty:not(:focus):before{
        content:attr(data-text)
    }


.panel.panel-default.style-chat {
    height: 575px;
    margin: 0px !important;
}

.content-wrapper {
    height: auto !important;
    min-height: auto !important;
}
hr.rulestyleone {
    border-top: 1px solid #47479657;
}

.recieve-message p {
    background: #474796;
    color: #fff;
    padding: 8px 18px;
    border-radius: 3px;
    word-break: break-word;
    width: fit-content;
    position: relative;
    margin-left: 20px;
    margin-top: 10px;
    margin-bottom: 0px;
}
.recieve-message>div {
    background: #474796;
    color: #fff;
    padding: 8px 18px;
    border-radius: 3px;
    word-break: break-word;
    width: fit-content;
    position: relative;
    margin-left: 20px;
    margin-top: 10px;
    margin-bottom: 0px;
}
.send-message p, .send-message>div {
    background: #cccccc;
    color: #301934;
    padding: 8px 18px;
    border-radius: 3px;
    word-break: break-all;
    width: fit-content;
    position: relative;
    margin-right: 20px;
    margin-top: 10px;
    margin-bottom: 0px;
}
.recieve-message br, .send-message br {
    display: none !important;
}
.recieve-message {
    float: left;
    width: 90%;
    text-align: left;
    text-align: -webkit-left;
}

.send-message {
    float: right;
    width: 90%;
    text-align: right;
    text-align: -webkit-right;
}
.message-time {
    background: transparent !important;
    color: #8c8c8c !important;
    margin: 6px 20px !important;
    padding: 0 !important;
    font-weight: 600 !important;
    font-size: 12px !important;
}
.message-time:before, .time-dv:before {
    display: none;
}
.recieve-message p:before, .recieve-message>div:before {
    content: "";
    width: 0;
    height: 0;
    border-top: 0px solid transparent;
    border-left: 14px solid #474796;
    border-bottom: 14px solid transparent;
    left: -12px;
    position: absolute;
    top: 0;
    transform: rotateY(180deg);
}
.send-message p:before, .send-message>div:before {
    content: "";
    width: 0;
    height: 0;
    border-top: 0px solid transparent;
    border-left: 14px solid #cccccc;
    border-bottom: 14px solid transparent;
    right: -12px;
    position: absolute;
    top: 0;
    transform: rotateY(-360deg);
}
div#chat_body::-webkit-scrollbar, .panel.panel-default::-webkit-scrollbar, div#chat_message_area::-webkit-scrollbar {
    width: 0;
}
div#chat_header h2 {
    font-size: 24px;
    text-transform: capitalize;
    color: #474796;
    font-weight: 500;
}
.style-chat .panel-heading {
    font-size: 18px;
    color: #301934;
    font-weight: 600;
}
.time-dv {
    background: transparent !important;
    padding: 0 !important;
    margin: 0 !important;
}

.mesage-img {
    background: #bfbfbf;
    width: 100px;
    padding: 10px;
    margin: 10px 20px 0px 20px;
    height: 100px;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
}
.mesage-img img {
    width: 100% !important;
    height: auto;
}
.mesage-img i{
   color:#474796;
}

  </style>

  <div clas="container-fluid">
  
   <div class="col-md-4" style="padding-right:0;">
    <div class="panel panel-default" style="height: 575px;    overflow-y: scroll;    margin: 0px;">
     <div class="panel-heading">Chat with User</div>
     <div class="panel-body" id="chat_user_area">

     </div>
     <input type="hidden" name="hidden_receiver_id_array" id="hidden_receiver_id_array" />
    </div>
   </div>
   <div class="col-md-8" style="padding-left:0; padding-right: 0;">
    <div class="panel panel-default style-chat" style="">
     <div class="panel-heading">Chat Area</div>
     <div class="panel-body">
      <div id="chat_header">
       <h2 align="center" style="margin:0; padding-bottom:16px;"><span id="dynamic_title">Welcome <?php echo $this->session->userdata('username'); ?></span></h2>
      </div>
      <div id="chat_body" style="height:380px; overflow-y: scroll;">
          
      </div>
      <div id="chat_footer" style="">
       <hr class="rulestyleone">
       <div class="form-group">
        <div class="row">
            <div class="col-md-10">
                 <div id="chat_message_area" contenteditable class="form-control" data-text="Type a message here..."></div>
            </div>
            <div class="col-md-2 type-msg-dv" style="">
             <div class="image-upload">
                  <label for="file-input">
                    <i class="fa fa-file-photo-o" style="font-size: 20px;"></i>
                  </label>
                <input id="file-input" type="file" name="file" class="videoUploadFile"/>
            </div>
            <div class="enter-msg-btn" align="right">
                <button type="button" name="send_chat" id="send_chat" class="btn btn-success btn-xs" disabled><i class="fa fa-paper-plane"></i></button>
             </div>
            </div>
        </div>
       
       
       </div>
       
      </div>
     </div>
    </div>
   </div>
   
  </div>
<div id="imageModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-scrollable">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 showData" style="text-align:center">
                        
                    </div>
                </div>
            </div>
            <div class="modal-footer modal-footers">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?=trans('close')?></button>
            </div>

        </div>

    </div>
</div>

<script>

$(document).ready(function(){

 function loading()
 {
  var output = '<div align="center"><br /><br /><br />';
  output += '<img src="<?php echo base_url(); ?>asset/loading.gif" /> Please wait...</div>';
  return output;
 }


 load_chat_user();

 function load_chat_user()
 {
  $.ajax({
   url:"<?php echo base_url(); ?>chat/load_chat_user",
   method:"POST",
   data:{action:'load_chat_user'},
   dataType:'json',
   beforeSend:function()
   {
    $('#chat_user_area').html(loading());
   },
   success:function(data)
   {
    var output = '<div class="list-group">';
    if(data.length > 0)
    {
     var receiver_id_array = '';
     for(var count = 0; count < data.length; count++)
     {
      output += '<a href="javascript:void(0)" class="list-group-item user_chat_list" data-name="'+data[count].first_name + ' ' + data[count].last_name+'" data-receiver_id="'+data[count].id+'">';

      output += '<img src="<?= base_url() ?>/'+data[count].avatar+'" class="img-circle" width="35" />';

      output += ' ' + data[count].first_name + ' ' + data[count].last_name;

      output += '&nbsp;<span id="chat_notification_'+data[count].id + '"></span>';
      ///
      output += '&nbsp;<span id="type_notifitcation_'+data[count].id+'"></span>';
      
      ///

      output += ' <i class="offline" id="online_status_'+data[count].id+'" style="float:right;">&nbsp;</i></a>';

      receiver_id_array += data[count].id + ',';
     }
     $('#hidden_receiver_id_array').val(receiver_id_array);
    }
    else
    {
     output += '<div align="center"><b>No Data Found</b></div>';
    }
    output += '</div>';
    $('#chat_user_area').html(output);
   }
  })
 }

 var receiver_id;

 $(document).on('click', '.user_chat_list', function(){
  $('#send_chat').attr('disabled', false);
  receiver_id = $(this).data('receiver_id');
  var receiver_name = $(this).data('name');
  $('#dynamic_title').text('You Chat with ' + receiver_name);
  load_chat_data(receiver_id, 'yes');
 });

 $(document).on('click', '#send_chat', function(){
    // $("#videoUploadFile").css('display', 'block');
    var chat_message = $.trim($('#chat_message_area').html());

    formdata = new FormData();
    formdata.append("receiver_id", receiver_id);
    formdata.append("chat_message", chat_message);
    if($(".videoUploadFile").prop('files').length > 0)
    {
        file =$(".videoUploadFile").prop('files')[0];
        formdata.append("file", file);
    }
  if(chat_message != '' && chat_message != '<br>' || $(".videoUploadFile").prop('files').length > 0)
  {
  $.ajax({
    url:"<?php echo base_url(); ?>chat/send_chat",
    method:"POST",
    processData: false,
    contentType: false,
    data:formdata,
    beforeSend:function()
    {
     $('#send_chat').attr('disabled','disabled');
    },
    success:function(data)
    {
     $('#send_chat').attr('disabled', false);
     $('#chat_message_area').html('');
     $(".videoUploadFile").val(null);

    //  var html = '<div class="col-md-10 alert alert-warning">';
    //  html += chat_message;
    //  html += '</div>';
    //  $('#chat_body').append(html);
     $('#chat_body').scrollTop($('#chat_body')[0].scrollHeight);
    }
  });
  }
  else
  {
  alert('Type Something in chat box');
  }
 });

 function load_chat_data(receiver_id, update_data)
 {
  $.ajax({
   url:"<?php echo base_url(); ?>chat/load_chat_data",
   method:"POST",
   data:{receiver_id:receiver_id, update_data:update_data},
   dataType:"json",
   success:function(data)
    {
    var html = '';
    for(var count = 0; count < data.length; count++)
    {
     html += '<div class="row" style="margin-left:0; margin-right:0">';
     if(data[count].message_direction == 'right')
     {
      if(data[count].chat_messages_text != null){
          html += '<div class="send-message"><div>' + data[count].chat_messages_text + '</div></div>';
          
      }else{
          if(data[count].file_type == 'pdf' || data[count].file_type == 'doc' || data[count].file_type == 'docs'){
              var img = '<a target="_blank" href="'+base_url+'/'+data[count].file+'"><i class="fa fa-file-pdf-o" style="font-size: 50px;"></i></a>';
              html += '<div class="send-message mesage-img">' + img + '</div></div>';
          }else{
              var img = '<a href="javascript:void(0)" class="showImage" data-image="'+base_url+'/'+data[count].file+'"><img src="'+base_url+'/'+data[count].file+'" width="50px" height="50px"/></a>';
              html += '<div class="send-message mesage-img">' + img + '</div></div>';
          }
          
      }
      html += '<div class="send-message time-dv"><div class="message-time">'+data[count].chat_messages_datetime+'</div></div></div>';
     }
     else
     {
     
      if(data[count].chat_messages_text != null){
      html += '<div class="recieve-message"><div>'+data[count].chat_messages_text + '</div></div>';
      }else{
          if(data[count].file_type == 'pdf' || data[count].file_type == 'doc' || data[count].file_type == 'docs'){
               var img = '<a target="_blank" href="'+base_url+'/'+data[count].file+'"><i class="fa fa-file-pdf-o" style="font-size: 50px;"></i></a>';
              html += '<div class="recieve-message mesage-img">' + img + '</div></div>';
          }else{
              var img = '<a href="javascript:void(0)" class="showImage" data-image="'+base_url+'/'+data[count].file+'"><img src="'+base_url+'/'+data[count].file+'" width="50px" height="50px"/></a>';
              html += '<div class="recieve-message mesage-img">' + img + '</div></div>';
          }
          html += '<div class="recieve-message time-dv"><div class="message-time">'+data[count].chat_messages_datetime+'</div></div></div>';
      }
     }
   
    }
    $('#chat_body').html(html);
    // $('#chat_body').scrollTop($('#chat_body')[0].scrollHeight);
   }
  })
 }

 setInterval(function(){
  if(receiver_id > 0)
  {
   load_chat_data(receiver_id, 'yes');
  }
  check_chat_notification(receiver_id);
 }, 3000);

 function check_chat_notification(receiver_id)
 {
  var user_id_array = $('#hidden_receiver_id_array').val();

  ///
  var is_type = 'no';
  if(receiver_id > 0)
  {
   if($.trim($('#chat_message_area').text()) != '')
   {
    is_type = 'yes';
   }
  }
  ///

  $.ajax({
   url:"<?php echo base_url(); ?>chat/check_chat_notification",
   method:"POST",
   data:{user_id_array:user_id_array, is_type:is_type, receiver_id:receiver_id},
   dataType:"json",
   success:function(data)
   {
    if(data.length > 0)
    {
     for(var count = 0; count < data.length; count++)
     {
      var html = '';
      if(data[count].total_notification > 0)
      {
       if(data[count].user_id != receiver_id)
       {
        html = '<span class="notification_circle">'+data[count].total_notification+'</span>';
       }
      }
    //   console.log(data[count].status);

      if(data[count].status == 'online')
      {
    //   console.log('online_status_'+data[count].user_id);
       $('#online_status_'+data[count].user_id).addClass('online');
       $('#online_status_'+data[count].user_id).removeClass('offline');
       //
       if(data[count].is_type == 'yes')
       {
        $('#type_notifitcation_'+data[count].user_id).html('<i><small>Typing</small></i>');
       }
       else
       {
        $('#type_notifitcation_'+data[count].user_id).html('');
       }
      }
      else
      {
       $('#online_status_'+data[count].user_id).addClass('offline');

       $('#online_status_'+data[count].user_id).removeClass('online');

       //
       $('#type_notifitcation_'+data[count].user_id).html('');
      }

      $('#chat_notification_'+data[count].user_id).html(html);
     }
    }
   }
  })
 }
 
 $(document).on('click', '.showImage', function(){
  var image = $(this).data('image');
  if(image != ''){
      $('#imageModal').modal('show');
      $('.showData').html('<img src="'+image+'" width="400px" height="400px"/>')
  }
 });

});

</script>

