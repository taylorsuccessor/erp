<?php include("include/header.php");?>
<script >
var type=0;</script>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Task list
            <small>13 new task </small>
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
                <a href="task_add.php" class="btn btn-primary btn-block margin-bottom">add task</a>
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">tasks</h3>
                </div>
                <div class="box-body no-padding">
                  <ul class="nav nav-pills nav-stacked">
                  
                    <li <?=($_GET['type']==1)? 'class="active"':'';?>><a href="task_list.php?type=1"><i class="fa fa-play"></i> runing task<span class="label label-primary pull-right">12</span></a></li>
                    <li <?=($_GET['type']==2)? 'class="active"':'';?> ><a href="task_list.php?type=2"><i class="fa fa-flag"></i> set by me</a></li>
                    <li <?=($_GET['type']==3)? 'class="active"':'';?> ><a href="task_list.php?type=3"><i class="fa fa-users"></i> assisting</a></li>
                     
                    <li  <?=($_GET['type']==4)? 'class="active"':'';?>><a href="task_list.php?type=4"><i class="fa fa-stop"></i>  closed <span class="label label-waring pull-right">65</span></a></li>
                     <li  <?=($_GET['type']==5)? 'class="active"':'';?>><a href="task_list.php?type=5"><i class="fa fa-bars"></i>  all tasks <span class="label label-waring pull-right">65</span></a></li>
                   </ul>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
             
              
              
            </div><!-- /.col -->
            <div class="col-md-9">
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Task</h3>
                  <div class="box-tools pull-right">
                    <div class="has-feedback">
                        <input type="text" class="form-control input-sm" name="search_text" id="search_text" page="0" onchange="get_this_page_rows(0);" placeholder="Search Mail"/>
                      <span class="glyphicon glyphicon-search form-control-feedback"></span>
                    </div>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body no-padding">
                  <div class="mailbox-controls">
                  
                      
                        <!-- Check all button -->
                  
                    <button class="btn btn-default btn-sm checkbox-toggle" onClick="check_all('.table');"><i class="fa fa-check-square-o"></i></button>                    
                  
                    
                    <div class="btn-group">
                      <button class="btn btn-default btn-sm" onClick="change_checked_status('task',4);"><i class="fa fa-play"></i></button>
                      <button class="btn btn-default btn-sm" onClick="change_checked_status('task',3);"><i class="fa fa-pause"></i></button>
                      <button class="btn btn-default btn-sm" onClick="change_checked_status('task',5);"><i class="fa fa-stop"></i></button>
                      
                    </div><!-- /.btn-group -->
                    
                    
                    <div class="btn-group">
                      <button class="btn btn-default btn-sm"onClick="go_to_edit_page('task_add.php');"><i class="fa fa-edit"></i></button>
                     <button class="btn btn-default btn-sm"onClick="window.location.reload();"><i class="fa fa-refresh"></i></button>
                 
                    </div><!-- /.btn-group -->
                    
                    
                    <button class="btn btn-default btn-sm"onClick="delete_checked('task');"><i class="fa fa-trash-o"></i></button>
                      
                                        <div class="pull-right">
                        <span class="curent_count_span">0-0</span>/<span class="result_count_span">0</span>
                      <div class="btn-group">
                          <button class="next_page_button btn btn-default btn-sm" onclick="get_this_page_rows('pre');"><i class="fa fa-chevron-left"></i></button>
                        <button class=" pre_page_button btn btn-default btn-sm" onclick="get_this_page_rows('next');"><i class="fa fa-chevron-right"></i></button>
                      </div><!-- /.btn-group -->
                    </div><!-- /.pull-right -->
                  </div>
                  <div class="table-responsive mailbox-messages">
                    <table class="table table-hover table-striped" id="main_table">
                        <thead>
                            <tr >
                                <th>id</th>
                                <th>title</th>
                                <th>deadline</th>
                                <th>created by</th>
                                <th>priority</th>
                            </tr>
                        </thead>
                      <tbody>
                        <tr><th>wait</th></tr>
                      </tbody>
                    </table><!-- /.table -->
                  </div><!-- /.mail-box-messages -->
                </div><!-- /.box-body -->
                <div class="box-footer no-padding">
                  <div class="mailbox-controls">
                    <!-- Check all button -->
                  
                    <button class="btn btn-default btn-sm checkbox-toggle" onClick="check_all('.table');"><i class="fa fa-check-square-o"></i></button>                    
                  
                    
                    <div class="btn-group">
                      <button class="btn btn-default btn-sm" onClick="change_checked_status('task',4);"><i class="fa fa-play"></i></button>
                      <button class="btn btn-default btn-sm" onClick="change_checked_status('task',3);"><i class="fa fa-pause"></i></button>
                      <button class="btn btn-default btn-sm" onClick="change_checked_status('task',5);"><i class="fa fa-stop"></i></button>
                      
                    </div><!-- /.btn-group -->
                    
                    
                    <div class="btn-group">
                      <button class="btn btn-default btn-sm"onClick="go_to_edit_page('task_add.php');"><i class="fa fa-edit"></i></button>
                     <button class="btn btn-default btn-sm"onClick="window.location.reload();"><i class="fa fa-refresh"></i></button>
                 
                    </div><!-- /.btn-group -->
                    
                    
                    <button class="btn btn-default btn-sm"onClick="delete_checked('task');"><i class="fa fa-trash-o"></i></button>
                    <div class="pull-right">
                        <span class="curent_count_span">1-50</span>/<span class="result_count_span">200</span>
                      <div class="btn-group">
                          <button class="next_page_button btn btn-default btn-sm" onclick="get_this_page_rows('pre');"><i class="fa fa-chevron-left"></i></button>
                        <button class=" pre_page_button btn btn-default btn-sm" onclick="get_this_page_rows('next');"><i class="fa fa-chevron-right"></i></button>
                      </div><!-- /.btn-group -->
                    </div><!-- /.pull-right -->
                  </div>
                </div>
              </div><!-- /. box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
         
          
          <script language="javascript">




/*_________________________________pagination_click*/
var page_num=0;
var stop_next=false;
function get_email_rows(target_page,destination,destination_f,sended_data){
	var page=sended_data['page'];
        
       if(page=='pre' && page_num==0){return false;}else if(page=='pre' && page_num > 0){page=page_num-1;}else if(page=='next'){page=page_num+1; if(stop_next==true) {return false;}}
        sended_data['page']=page;
$.ajax({type:"post",url:target_page,data:sended_data,success:function(data,statue){
        page_num=page;
	var data_arr=new Array(); data_arr=data.split('||=>||');
	
        
	$(destination).html(data_arr[0]);
	//creat_pagination_ul(totale,selected) rows||=>||totale||=>|| selected
        
        var last= page * 10 - data_arr[1];
        stop_next=( last >=  -10 )? true:false;
        var curent_count_text=(page * 10 ) +'- ' ;
        curent_count_text+=(stop_next == true)? data_arr[1]: page * 10 +10;
        $(".curent_count_span").html(curent_count_text);
        $(".result_count_span").html(data_arr[1]);
        
}});//ajax	
	
	}//get_rows()

/*_____________________________END____pagination_click*/
/*__________________________________________________________*/
function get_this_page_rows(page){

$("#search_text").attr('page',page);
    var data={
        "page":page,
        "type":"<?=$_GET['type'];?>",
        "title":"task_list",
        "search_text":$("#search_text").val()
        
    }
    
get_email_rows('./table_php.php','#main_table tbody','get_this_page_rows',data);

}//get_influencer(page)
 get_this_page_rows(0);
 

</script>
          
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="<?=$main_path;?>plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?=$main_path;?>bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="<?=$main_path;?>plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='<?=$main_path;?>plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="<?=$main_path;?>dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?=$main_path;?>dist/js/demo.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="<?=$main_path;?>plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- Page Script -->
    <script>
      $(function () {
        //Enable iCheck plugin for checkboxes
        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"]').iCheck({
          checkboxClass: 'icheckbox_flat-blue',
          radioClass: 'iradio_flat-blue'
        });

        //Enable check and uncheck all functionality
        $(".checkbox-toggle").click(function () {
          var clicks = $(this).data('clicks');
          if (clicks) {
            //Uncheck all checkboxes
            $("input[type='checkbox']", ".mailbox-messages").iCheck("uncheck");
          } else {
            //Check all checkboxes
            $("input[type='checkbox']", ".mailbox-messages").iCheck("check");
          }
          $(this).data("clicks", !clicks);
        });

        //Handle starring for glyphicon and font awesome
        $(".mailbox-star").click(function (e) {
          e.preventDefault();
          //detect type
          var $this = $(this).find("a > i");
          var glyph = $this.hasClass("glyphicon");
          var fa = $this.hasClass("fa");          

          //Switch states
          if (glyph) {
            $this.toggleClass("glyphicon-star");
            $this.toggleClass("glyphicon-star-empty");
          }

          if (fa) {
            $this.toggleClass("fa-star");
            $this.toggleClass("fa-star-o");
          }
        });
      });
      
    </script>
  </body>
</html>