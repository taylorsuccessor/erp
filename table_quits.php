<?php include('include/header.php');?>
      
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            add new manager
            <small>please fill the form</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">add manager</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-12">
                  <div class="box box-info">
                      <div class="box-header">
                  <h3 class="box-title">Responsive Hover Table</h3>
                  <div class="box-tools">
                    <div class="input-group">
                      <input type="text" name="search_text" id="search_text" onchange="get_this_page_rows($(this).attr('page'));" page=""class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="box-body no-padding">
<!-- _________________________________________________________________________table_________________________________________ -->
<!-- Table Page -->
<style type="text/css">.active_page a,.active_page { background-color:#3C8DBC !important; color:#ffffff !important;}</style>
							<div class="page-tables">
								<!-- Table -->
								<div class="table-responsive">
                                                                      <?php

 
   //  echo great_status(array('','check all','uncheck all','pause','play','stop','agree','disagree','need more info','delete'));
  echo great_status('add_quits.php','quits',array('check all','uncheck all','agree','disagree','need more info','edit','delete'));
                                                        ?>
                                                                    <table class="table table-striped" cellpadding="0" cellspacing="0" border="0" id="data-table" width="100%">
										<thead>
											<tr><th><i class="fa fa-fw fa-cog"></i></th>
												<th>id</th>
												<th>employee</th>
												<th> title</th>
												<th>order date</th>
												<th>status</th>
											</tr>
										</thead>
										<tbody>
                                                                                    
										
										
										</tbody>
										<tfoot>
											
										</tfoot>
									</table>
									<div class="clearfix"></div>
								</div>
								</div><!-- table all influencer -->
                                                              <?php

 
   //  echo great_status(array('','check all','uncheck all','pause','play','stop','agree','disagree','need more info','edit','delete'));
  echo great_status('add_quits.php','quits',array('check all','uncheck all','agree','disagree','need more info','edit','delete'));
                                                        ?>
                                <div id="pages_number_all_div"></div>
                                
<script language="javascript">


function get_this_page_rows(page){

$("#search_text").attr('page',page);
    var data={
        "page":page,
        "title":"quits",
        "search_text":$("#search_text").val()
        
    }
    
get_rows('./table_php.php','#data-table tbody','get_this_page_rows',data);

}//get_influencer(page)
 get_this_page_rows(0);
 
 
 

</script>
<!-- __________________________________________________________________END_______table_________________________________________ -->
            
          
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
    
    
  </body>
</html>
