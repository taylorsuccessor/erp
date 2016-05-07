<?php include('include/header.php');?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Mailbox
            <small>13 new messages</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Mailbox</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-3">
                <a href="email_inbox.php?type=0" class="btn btn-primary btn-block margin-bottom">Back to Inbox</a>
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Folders</h3>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                     <li><a href="email_inbox.php?type=0"><i class="fa fa-inbox"></i> Inbox <span class="label label-primary pull-right">12</span></a></li>
                    <li ><a href="email_inbox.php?type=4"><i class="fa fa-envelope-o"></i> Sent</a></li>
                    <li ><a href="email_inbox.php?type=2"><i class="fa fa-file-text-o"></i> Drafts</a></li>
                    <li ><a href="email_inbox.php?type=1"><i class="fa fa-filter"></i> Junk <span class="label label-waring pull-right">65</span></a></li>
                    <li ><a href="email_inbox.php?type=3"><i class="fa fa-trash-o"></i> Trash</a></li>
                   </ul>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
         
            </div><!-- /.col -->
            <div class="col-md-9">
                
                
               
      <form id="my_form">  
           <?php
include('library/form_creator.php');
?>
          <script>
              function show_message(status,message){
                   if(status=='success'){
              $('#success_div').show();$('#success_div').html(message);
              $('#error_div').hide();
                  }//success
                  else{
                      
              $('#success_div').hide();$('#error_div').html(message);
              $('#error_div').show();
                      
                  }//else error
                  
              }//show_message(status,message){
              
          function send_data(button_node){
              var sended_data=get_form_value("#my_form");
              sended_data['save']=true;
              my_ajax("email_php.php",sended_data,button_node,function(data){
                  var data_arr=new Array();data_arr=data.split("||=>||");
                
             show_message(data_arr[0],data_arr[1]);
               
                     
    
    });
          }//function send_data(){}
          
                                  
          function send_edit_data(button_node,edit_id){
              var sended_data=get_form_value("#my_form");
              sended_data['edit_id']=edit_id;
              
              my_ajax("email_php.php",sended_data,button_node,function(data){
                  var data_arr=new Array();data_arr=data.split("||=>||");
                
             show_message(data_arr[0],data_arr[1]);
               
                     
    
    });
          }//function send_edit_data(button_node,edit_id)
          
          </script>
   
<?php
 $send_to='';
    $subject="";
    $message="";
 
   
if(isset($_GET['edit_id'])){
    $edit_result=mysqli_query($con,'select * from email where id='.$_GET['edit_id'])or die(mysqli_error($con));
    $edit_row=mysqli_fetch_array($edit_result);
   
    
    
 $send_to=$edit_row['send_to'];
    $subject=$edit_row['subject'];
    $message=$edit_row['message'];
   
}//get files to edit
?>

              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Compose New Message</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="form-group">
                      <input class="form-control" placeholder="To:" name="send_to" value="<?=$send_to;?>"/>
                  </div>
                  <div class="form-group">
                      <input class="form-control" placeholder="Subject:" name="subject" value="<?=$subject;?>"/>
                  </div>
                  <div class="form-group">
                      <textarea id="compose-textarea" class="form-control" name="message"style="height: 300px">
                     <?=$message;?>
                    </textarea>
                  </div>
                 <!-- <div class="form-group">
                    <div class="btn btn-default btn-file">
                      <i class="fa fa-paperclip"></i> Attachment
                      <input type="file" name="attachment"/>
                    </div>
                    <p class="help-block">Max. 32MB</p>
                  </div> -->
                </div><!-- /.box-body -->
                      <div style="border:1px solid #00ff00; display:none;" id="success_div"></div>
                      <div style="border:1px solid #ff0000; display:none;" id="error_div"></div>
                <div class="box-footer">
                  <div class="pull-right">
                      
                      <input type="hidden" name="type" id="type" value="0" >
                      <button type="button" class="btn btn-default" onClick="$('#type').val(2); send_edit_data($(this),'<?=@$_GET["edit_id"];?>');"><i class="fa fa-pencil"></i> Draft</button>
                    <button type="button" class="btn btn-primary" onclick="$('#type').val(0); send_edit_data($(this),'<?=@$_GET["edit_id"];?>');"><i class="fa fa-envelope-o"></i> Send</button>
                  </div>
                  <button class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
                </div><!-- /.box-footer -->
              </div><!-- /. box -->
            </div><!-- /.col -->
            
            </form>
                
                
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>
    </div><!-- ./wrapper -->

   <!-- Bootstrap 3.3.2 JS -->
    <script src="<?=main_path;?>bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="<?=main_path;?>plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='<?=main_path;?>plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="<?=main_path;?>dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?=main_path;?>dist/js/demo.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="<?=main_path;?>plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="<?=main_path;?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <!-- Page Script -->
     <!-- bootstrap wysihtml5 - text editor -->
    <link href="<?=$main_path;?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

 <!-- Bootstrap WYSIHTML5 -->
    <script src="<?=$main_path;?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    
    <script>
      $(function () {
        //Add text editor
        $("#compose-textarea").wysihtml5();
      });
    </script>
  </body>
</html>