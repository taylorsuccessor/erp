<?php include('include/header.php');?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            TASK
            <small>13 new messages</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">tasks</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-3">
                <a href="task_list.php?type=1" class="btn btn-primary btn-block margin-bottom">Back to task list</a>
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">taskes</h3>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                   <li  ><a href="task_list.php?type=1"><i class="fa fa-play"></i> runing task<span class="label label-primary pull-right">12</span></a></li>
                    <li  ><a href="task_list.php?type=2"><i class="fa fa-flag"></i> set by me</a></li>
                    <li  ><a href="task_list.php?type=3"><i class="fa fa-users"></i> assisting</a></li>
                     
                    <li ><a href="task_list.php?type=4"><i class="fa fa-stop"></i>  closed <span class="label label-waring pull-right">65</span></a></li>
                     <li ><a href="task_list.php?type=5"><i class="fa fa-bars"></i>  all tasks <span class="label label-waring pull-right">65</span></a></li>
                     
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
              my_ajax("task_php.php",sended_data,button_node,function(data){alert(data);
                  var data_arr=new Array();data_arr=data.split("||=>||");
                
             show_message(data_arr[0],data_arr[1]);
               
                     
    
    });
          }//function send_data(){}
          
                                  
          function send_edit_data(button_node,edit_id){
              var sended_data=get_form_value("#my_form");
              sended_data['edit_id']=edit_id;
              
              my_ajax("task_php.php",sended_data,button_node,function(data){
                  var data_arr=new Array();data_arr=data.split("||=>||");
                
             show_message(data_arr[0],data_arr[1]);
               
                     
    
    });
          }//function send_edit_data(button_node,edit_id)     
          </script>
   


              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Compose New Message</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <?php
  $title='';
  $selected_responsible_id=0;
  $selected_assisting_id=0;
  
  
 $description='';
 $note='';
 $deadline_date=gmdate('Y-m-d');
 $deadline_time=gmdate('H:m a');
   
if(isset($_GET['edit_id'])){
    $edit_result=mysqli_query($con,'select * from task where id='.$_GET['edit_id'])or die(mysqli_error($con));
    $edit_row=mysqli_fetch_array($edit_result);
   
    

      $title=$edit_row['title'];
  $selected_responsible_id=$edit_row['responsible'];
  $selected_assisting_id=$edit_row['assisting'];
  
  
 $description=$edit_row['description'];
 $note=$edit_row['note'];
 $deadline=$edit_row['end_date_time'];
 $deadline_date=date('Y-m-d',  strtotime($deadline));
 $deadline_time=date('H:i a',strtotime($deadline));
}//get files to edit


$managers_resutl=mysqli_query($con,'select * from emploee ')or die (mysqli_error());
$emploee_name_arr= [];$emploee_id_arr=[];$i=0;
while($row=  mysqli_fetch_array($managers_resutl)){$emploee_name_arr[$i]=$row['name'];$emploee_id_arr[$i]=$row['id'];$i++; }
$inputs_arr=    array(
    
   array('type'=>'text','name'=>'title','value'=>$title,'label'=>'task title'),
    array('type'=>'select','name'=>'responsible','value'=>$selected_responsible_id,'label'=>'responsoble','options'=>$emploee_name_arr,'options_value'=>$emploee_id_arr),
    array('type'=>'select','name'=>'assisting','value'=>$selected_assisting_id,'label'=>'assisting','options'=>$emploee_name_arr,'options_value'=>$emploee_id_arr),
   
    array('type'=>"customer",'html'=>'<h5>priority</h5>'),
    array('type'=>'radio','name'=>'priority','value'=>'0','label'=>'<span style="color:#ffff00;">&ensp;Low&ensp;&ensp;</span> ','checked'=>true),
    array('type'=>'radio','name'=>'priority','value'=>'1','label'=>'<span style="color:#00ff00;">&ensp;Average&ensp;&ensp;</span>'),
    array('type'=>'radio','name'=>'priority','value'=>'2','label'=>'<span style="color:#ff0000;">&ensp;High&ensp;&ensp;</span>'),
   
     
    array('type'=>"customer",'html'=>'<hr><h5>select yes if there is deadline : </h5>'),
    array('type'=>'radio','name'=>'yes_no_deadline','value'=>'0','label'=>'<span style="color:#ff0000;">&ensp;NO&ensp;&ensp;</span> ','checked'=>true),
    array('type'=>'radio','name'=>'yes_no_deadline','value'=>'1','label'=>'<span style="color:#00ff00;">&ensp;YES&ensp;&ensp;</span>'),
   
    array('type'=>'date','name'=>'deadline_date','value'=>$deadline_date,'label'=>'deadline date'),
    
    array('type'=>'time_pick','name'=>'deadline_time','value'=>$deadline_time,'label'=>'deadline time'),
    
    array('type'=>'edit_textarea','name'=>'description','value'=>$description,'label'=>'task description'),
    array('type'=>'edit_textarea','name'=>'note','value'=>$note,'label'=>' Note'),
    array('type'=>'customer','html'=>'<div style="border:1px solid #00ff00 ; display:none;" id="success_div"></div>'),
    array('type'=>'customer','html'=>'<div style="border:1px solid #ff0000; display:none;" id="error_div"></div>')
    
        
); //all_inputs



$form=get_form_html($inputs_arr);

echo $form['form_html'];
?>
                    <script >/*
                  $(document).ready(function(){
   $("input").change(function(){alert(1);
       var value=$("input[name='yes_no_deadline']:checked").val();
       
       if(value==0){$("#deadline_date,#deadline_time").parent().parent().hide();alert(1);}//no deadline
       else{$("#deadline_date,#deadline_time").parent().parent().show();}
   });//change select deadline yes or no  
    });//ready*/
                    </script>
     
                 <!-- <div class="form-group">
                    <div class="btn btn-default btn-file">
                      <i class="fa fa-paperclip"></i> Attachment
                      <input type="file" name="attachment"/>
                    </div>
                    <p class="help-block">Max. 32MB</p>
                  </div> -->
                </div><!-- /.box-body -->
                
                <div class="box-footer">
                  <div class="pull-right">
                      
                      <input type="hidden" name="type" id="type" value="0" >
                      <button type="rest" class="btn btn-default" onClick=""><i class="fa fa-pencil"></i> </button>
                      <?php
if(isset($_GET['edit_id'])){
    ?>
                       <button type="button" class="btn btn-primary" onclick="send_edit_data($(this),<?=$_GET['edit_id'];?>);"><i class="fa fa-pencil"></i> edit </button>
                       <?php
}else{?>
                        <button type="button" class="btn btn-primary" onclick="send_data($(this));"><i class="fa fa-plus"></i> Send</button>
                      
<?php }//select edit or send
?>
                   
                  </div>
                    <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> empty</button>
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
    <script src="<?=$main_path;?>bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- InputMask -->
    <script src="<?=$main_path;?>plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
    <script src="<?=$main_path;?>plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
    <script src="<?=$main_path;?>plugins/input-mask/jquery.inputmask.extensions.js" type="text/javascript"></script>
    <!-- date-range-picker -->
    <script src="<?=$main_path;?>plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- bootstrap color picker -->
    <script src="<?=$main_path;?>plugins/colorpicker/bootstrap-colorpicker.min.js" type="text/javascript"></script>
    <!-- bootstrap time picker -->
    <script src="<?=$main_path;?>plugins/timepicker/bootstrap-timepicker.min.js" type="text/javascript"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="<?=$main_path;?>plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- iCheck 1.0.1 -->
    <script src="<?=$main_path;?>plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='<?=$main_path;?>plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="<?=$main_path;?>dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?=$main_path;?>dist/js/demo.js" type="text/javascript"></script>
    <!-- Page script -->
    <script type="text/javascript">
      $(function () {
        //Datemask dd/mm/yyyy
        $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
        //Datemask2 mm/dd/yyyy
        $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

        //Date range picker
        $('#reservation').daterangepicker();
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
        //Date range as a button
        $('#daterange-btn').daterangepicker(
                {
                  ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                    'Last 7 Days': [moment().subtract('days', 6), moment()],
                    'Last 30 Days': [moment().subtract('days', 29), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
                  },
                  startDate: moment().subtract('days', 29),
                  endDate: moment()
                },
        function (start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
        );

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass: 'iradio_flat-green'
        });

        //Colorpicker
        $(".my-colorpicker1").colorpicker();
        //color picker with addon
        $(".my-colorpicker2").colorpicker();

        //Timepicker
        $(".timepicker").timepicker({showInputs: false});
      });
      
      
      
      
    </script>
    
     <!-- bootstrap wysihtml5 - text editor -->
    <link href="<?=$main_path;?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />

 <!-- Bootstrap WYSIHTML5 -->
    <script src="<?=$main_path;?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    
    <?php
echo '<script>'.$form['javascript'].'</script>';
            ?>
  </body>
</html>