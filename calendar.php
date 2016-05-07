<?php include('include/header.php');?>
    <link href="<?=$main_path;?>plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
    <link href="<?=$main_path;?>plugins/fullcalendar/fullcalendar.print.css" rel="stylesheet" type="text/css" media='print' />
       
<!-- Theme style -->
    <link href="<?=$main_path;?>dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />    <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Calendar
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Calendar</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-md-3">
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h4 class="box-title">Draggable Events</h4>
                </div>
                <div class="box-body">
                  <!-- the events -->
                  <?php
                  /*________________________type
 * 1=leaving
 * 2=vacation
 * 3=break
 * 4=meeting
 * 
 */
                  ?>
                  <div id='external-events'>
                    <div class='external-event bg-green'>Lunch</div>
                    <div class='external-event bg-yellow'>Go home</div>
                    <div class='external-event bg-aqua'>Do homework</div>
                    <div class='external-event bg-light-blue'>Work on UI design</div>
                    <div class='external-event bg-red'>Sleep tight</div>
                    <div class='external-event bg-red' type="leaving"  >leaving</div>
                    <div class="checkbox">
                      <label for='drop-remove'>
                        <input type='checkbox' id='drop-remove' />
                        remove after drop
                      </label>
                    </div>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
              <div class="box box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Create Event</h3>
                </div>
                <div class="box-body">
                  <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                    <!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
                    <ul class="fc-color-picker" id="color-chooser">
                      <li><a class="text-aqua" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-blue" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-light-blue" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-teal" href="#"><i class="fa fa-square"></i></a></li>																						
                      <li><a class="text-yellow" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-orange" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-green" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-lime" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-red" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-purple" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-fuchsia" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-muted" href="#"><i class="fa fa-square"></i></a></li>
                      <li><a class="text-navy" href="#"><i class="fa fa-square"></i></a></li>
                    </ul>
                  </div><!-- /btn-group -->
                  <div class="input-group">
                    <input id="new-event" type="text" class="form-control" placeholder="Event Title">
                    <div class="input-group-btn">
                      <button id="add-new-event" type="button" class="btn btn-primary btn-flat">Add</button>
                    </div><!-- /btn-group -->
                  </div><!-- /input-group -->
                </div>
              </div>
            </div><!-- /.col -->
            <div class="col-md-9">
              <div class="box box-primary">
                <div class="box-body no-padding">
                  <!-- THE CALENDAR -->
                  <div id="calendar"></div>
                </div><!-- /.box-body -->
              </div><!-- /. box -->
            </div><!-- /.col -->
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

    <!-- jQuery 2.1.3 -->
    <script src="<?=$main_path;?>plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?=$main_path;?>bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- jQuery UI 1.11.1 -->
    <script src="<?=$main_path;?>js/jquery-ui.min.js" type="text/javascript"></script>
    <!-- Slimscroll -->
    <script src="<?=$main_path;?>plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='<?=$main_path;?>plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="<?=$main_path;?>dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?=$main_path;?>dist/js/demo.js" type="text/javascript"></script>
    <!-- fullCalendar 2.2.5 -->
    <script src="<?=$main_path;?>js/mo.js" type="text/javascript"></script>
    <script src="<?=$main_path;?>js/fullcalendar.min.js" type="text/javascript"></script>
    <!-- Page specific script -->
     <script>
    var new_events_arr=[];
    var edit_events_arr=[];
    
    
    var index_of_new=0;var new_index_arr=[];
    var index_of_edit=0;var edit_index_arr=[];
    function add_new_event(event){
              
        var d =new Date(event.start); d=d.toISOString();
        var end_date=0;var end_hour=0;
        if(event.end != null){
        var end =new Date(event.end);end=end.toISOString();
        end_date=end.slice(0,10);end_hour=end.slice(11,16);
    }
        var one_event={
            
            "index":index_of_new,
                        'edit_new':'new',
                        "id":index_of_new,
                        "type":event.type,
                        "title":event.title,
                        "start_date":d.slice(0,10),
                        "start_hour":d.slice(11,16),
                        "end_date":end_date,
                        "end_hour":end_hour,
                        'url':event.url,
//                        'allDay':event.allDay,
                        'borderColor':event.borderColor,
                        'backgroundColor':event.backgroundColor
                      }//one event object 
         new_events_arr[index_of_new]=one_event;
         new_index_arr.push(index_of_new);
        index_of_new++;
        
    }//add_new_event(event){}
        function edit_new_event(event,index){
              
        var d =new Date(event.start); d=d.toISOString();
        var end_date=0;var end_hour=0;
        if(event.end != null){
        var end =new Date(event.end);end=end.toISOString();
        end_date=end.slice(0,10);end_hour=end.slice(11,16);
    }
    
        new_events_arr[index_of_new]={
            "index":index_of_new,
                        'edit_new':'new',
                        "id":index_of_new,
                        "type":event.type,
                        "title":event.title,
                        "start_date":d.slice(0,10),
                        "start_hour":d.slice(11,16),
                        "end_date":end_date,
                        "end_hour":end_hour,
                        'url':event.url,
//                        'allDay':event.allDay,
                        'borderColor':event.borderColor,
                        'backgroundColor':event.backgroundColor
                      }//one event object 
     
        
    }//edit_new_event(event,index){}
    
    function add_edit_event(event){
      
        var d =new Date(event.start); d=d.toISOString();
        var end_date=0;var end_hour=0;
        if(event.end != null){
        var end =new Date(event.end);end=end.toISOString();
        end_date=end.slice(0,10);end_hour=end.slice(11,16);
    }
        var one_event={"index":index_of_edit,
                        "edit_new":"edit",
                        "id":event.id,
                        "type":event.type,
                        "title":event.title,
                        "start_date":d.slice(0,10),
                        "start_hour":d.slice(11,16),
                        "end_date":end_date,
                        "end_hour":end_hour,
                        'url':event.url,
//                        'allDay':event.allDay,
                        'borderColor':event.borderColor,
                        'backgroundColor':event.backgroundColor
                      }//one event object 
        
        
          edit_events_arr[index_of_edit]=one_event;
         edit_index_arr.push(index_of_edit);
        index_of_edit++;
    }//add_edit_event(event){}    
    function edit_edit_event(event,index){
              
        var d =new Date(event.start); d=d.toISOString();
        var end_date=0;var end_hour=0;
        if(event.end != null){
        var end =new Date(event.end);end=end.toISOString();
        end_date=end.slice(0,10);end_hour=end.slice(11,16);
    }
    
        edit_events_arr[index]={"index":index,
                        "edit_new":"edit",
                        "id":event.id,
                        "type":event.type,
                        "title":event.title,
                        "start_date":d.slice(0,10),
                        "start_hour":d.slice(11,16),
                        "end_date":end_date,
                        "end_hour":end_hour,
                        'url':event.url,
//                        'allDay':event.allDay,
                        'borderColor':event.borderColor,
                        'backgroundColor':event.backgroundColor
                      }//one event object 
        
        
    }//edit_edit_event(event){}
    
    
    function send_events_to_php(){
        
      edit_events_arr=(edit_events_arr.length>-1)? edit_events_arr:0;
      new_events_arr=(new_events_arr.length>-1)? new_events_arr:0;
       my_ajax('calendar_php.php',{"edit_events_arr":edit_events_arr,"new_events_arr":new_events_arr},$("#send_button"),function(data){alert(data);});
        
        
    }//send_events_to_php(){}//
    
    </script>
    <buton onclick="send_events_to_php();" id="send_button">send</button>
    <script type="text/javascript">
      $(function () {

        /* initialize the external events
         -----------------------------------------------------------------*/
        function ini_events(ele) {
          ele.each(function () {

            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            var eventObject = {
              title: $.trim($(this).text()) // use the element's text as the event title
            };

            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);

            // make the event draggable using jQuery UI
            $(this).draggable({
              zIndex: 1070,
              revert: true, // will cause the event to go back to its
              revertDuration: 0  //  original position after the drag
            });

          });
        }
        ini_events($('#external-events div.external-event'));

        /* initialize the calendar
         -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
        var date = new Date();
        var d = date.getDate(),
                m = date.getMonth(),
                y = date.getFullYear();
        $('#calendar').fullCalendar({
          header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
          },
          buttonText: {
            today: 'today',
            month: 'month',
            week: 'week',
            day: 'day'
          },
          //Random default events
          events: [
              <?php
              $result=mysqli_query($con,"select * from events ")or die(mysqli_error($con));
              $events_arr=[];$i=0;
              if(mysqli_num_rows($result)>0){
              while($row=mysqli_fetch_array($result)){
                  $events_arr[$i]='
                          
                 {
              title: "'.$row['title'].'",
              start:new Date("'.$row['start_date'].' '.decode_time($row['start_hour']).'") ,
              end:new Date("'.$row['end_date'].' '.decode_time($row['end_hour']).'" ),
              new_edit:"edit",
              backgroundColor: "#f56954", //red
              borderColor: "#f56954", //red
              id:"'.$row['id'].'",
              url:"'.$row['url'].'",
              type:"'.$row['type'].'",
              real_id:"'.$row['real_id'].'",
              index:'.$i.'
            } ';
                  $i++;
              }
              echo implode(',',$events_arr);
              
              }//there is rows
              ?>
              
          ],
          editable: true,
          droppable: true, // this allows things to be dropped onto the calendar !!!
          
          drop: function (date, allDay) { // this function is called when something is dropped
/*______________________________________________________________________________________--add_new_event___*/

            // retrieve the dropped element's stored Event Object
            var originalEventObject = $(this).data('eventObject');

            // we need to copy it, so that multiple events don't have a reference to the same object
            var copiedEventObject = $.extend({}, originalEventObject);

            // assign it the date that was reported
            copiedEventObject.start = date;
            copiedEventObject.allDay = allDay;
           copiedEventObject.type=$(this).attr("type");
       
            copiedEventObject.backgroundColor = $(this).css("background-color");
            copiedEventObject.borderColor = $(this).css("border-color");

            // render the event on the calendar
            // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
            $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
add_new_event(copiedEventObject);
            // is the "remove after drop" checkbox checked?
            if ($('#drop-remove').is(':checked')) {
              // if so, remove the element from the "Draggable Events" list
              $(this).remove();
            }
/*_____________________________________________________________________________END_________--add_new_event___*/
          },
          eventDrop: function(event, delta, revertFunc) {
/*_____________________________________________________________________________________________move_event___*/              
if(event.new_edit=="new"){edit_new_event(event,event.index);console.log(new_events_arr);}else{
    if(edit_index_arr.indexOf(event.index)> -1){edit_edit_event(event,event.index);}else{add_edit_event(event,event.index);}
            console.log(edit_events_arr);}
     
       
 
/*_______________________________________________________________________________________END______move_event___*/      
        }//eventDrop
        ,
    eventResize: function(event, delta, revertFunc) {
/*_________________________________________________________________________________________resize_event_______*/
       if(event.new_edit=="new"){edit_new_event(event,event.index);console.log(new_events_arr);}else{edit_edit_event(event,event.index);console.log(edit_events_arr);}


/*_____________________________________________________________________________________end____resize_event_______*/
    }//eventResize
        });

        /* ADDING EVENTS */
        var currColor = "#3c8dbc"; //Red by default
        //Color chooser button
        var colorChooser = $("#color-chooser-btn");
        $("#color-chooser > li > a").click(function (e) {
          e.preventDefault();
          //Save color
          currColor = $(this).css("color");
          //Add color effect to button
          $('#add-new-event').css({"background-color": currColor, "border-color": currColor});
        });
        $("#add-new-event").click(function (e) {
          e.preventDefault();
          //Get value and make sure it is not null
          var val = $("#new-event").val();
          if (val.length == 0) {
            return;
          }

          //Create events
          var event = $("<div />");
          event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
          event.html(val);
          $('#external-events').prepend(event);

          //Add draggable funtionality
          ini_events(event);

          //Remove event from text input
          $("#new-event").val("");
        });
      });
      
      
  
    </script>
   
  </body>
</html>