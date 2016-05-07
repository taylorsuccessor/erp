<?php 
    include('include/header.php'); ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            add new department
            <small>please fill the form</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">add department</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
                  <div class="box box-info">
                <div class="box-body">

            
               
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
              my_ajax("add_department_php.php",sended_data,button_node,function(data){
                  var data_arr=new Array();data_arr=data.split("||=>||");
                
             show_message(data_arr[0],data_arr[1]);
               
                     
    
    });
          }//function send_data(){}
          
          
                                
          function send_edit_data(button_node,edit_id){
              var sended_data=get_form_value("#my_form");
              sended_data['edit_id']=edit_id;
              
              my_ajax("add_department_php.php",sended_data,button_node,function(data){alert(data);
                  var data_arr=new Array();data_arr=data.split("||=>||");
                
             show_message(data_arr[0],data_arr[1]);
               
                     
    
    });
          }//function send_edit_data(button_node,edit_id)
          
          </script>
   
<?php
//name,manager_id,description,start_work_hour,end_work_hour
  $name='';
    $selected_manager_id=0;
 $description='';
    $start_work_hour="08:00 am";
    $end_work_hour="04:00 pm";
   
if(isset($_GET['edit_id'])){
    $edit_result=mysqli_query($con,'select * from department where id='.$_GET['edit_id'])or die(mysqli_error($con));
    $edit_row=mysqli_fetch_array($edit_result);
   
    $name=$edit_row['name']; 
    
    $selected_manager_id=$edit_row['manager_id'];
 $description=$edit_row['description'];
    $start_work_hour=  decode_time($edit_row['start_work_hour']);
    $end_work_hour= decode_time($edit_row['end_work_hour']);
   
}//get files to edit


$managers_resutl=mysqli_query($con,'select * from managers ')or die (mysqli_error());
$managgers_name= [];$managers_id=[];$i=0;
while($row=  mysqli_fetch_array($managers_resutl)){$managers_name[$i]=$row['name'];$managers_id[$i]=$row['id'];$i++; }
$inputs_arr=    array(
    
   array('type'=>'text','name'=>'name','value'=>$name,'label'=>'department name'),
    array('type'=>'select','name'=>'manager_id','value'=>$selected_manager_id,'label'=>'manager','options'=>$managers_name,'options_value'=>$managers_id),
    array('type'=>'edit_textarea','name'=>'description','value'=>$description,'label'=>'department description'),
    array('type'=>'time_pick','name'=>'start_work_hour','value'=>$start_work_hour,'label'=>'start work hout'),
    array('type'=>'time_pick','name'=>'end_work_hour','value'=>$end_work_hour,'label'=>'end work hout'),
    array('type'=>'customer','html'=>'<div style="border:1px solid #00ff00 ; display:none;" id="success_div"></div>'),
    array('type'=>'customer','html'=>'<div style="border:1px solid #ff0000; display:none;" id="error_div"></div>')
    
        
); //all_inputs

if(isset($_GET['edit_id'])){
     $inputs_arr[count($inputs_arr)]=array('type'=>'button','button_text'=>'save edit','onclick'=>' send_edit_data($(this),'.$_GET['edit_id'].');');
}else{
   $inputs_arr[count($inputs_arr)]=array('type'=>'submit','button_text'=>'add','onclick'=>'send_data($(this));');
}//select edit or send


$form=get_form_html($inputs_arr);

echo $form['form_html'];
 echo $form['footer'];  
?>
                            
                
      </form>
                 </div> 
              </div><!-- /.box -->

            
            </div><!-- /.col (left) -->
            </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     <?php include('include/footer.php');?>
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
