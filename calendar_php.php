<?php include('include/db_connect.php');
/*________________________type
 * 1=leaving
 * 2=vacation
 * 3=break
 * 4=meeting
 * 
 */

if(isset($_POST["edit_events_arr"]) && $_POST["edit_events_arr"]!=0){
    $insert_rows=[];
    foreach($_POST["edit_events_arr"]  as $i=>$one_event){
      mysqli_query($con,'update events set'
              . ' emploee_id="'.$_SESSION['e_id'].'",'
              . 'type="'.$one_event["type"].'",'
              . 'title="'.$one_event["title"].'",'
              . 'start_date="'.$one_event["start_date"].'",'
              . 'start_hour="'.$one_event["start_hour"].'",'
              . 'end_date="'.$one_event["end_date"].'",'
              . 'end_hour="'.$one_event["end_hour"].'",'
              . 'real_id="real_id",url="url" '
              . ''
              . 'where id="'.$one_event['id'].'"')or die(mysqli_error($con));
        
    }//for each
    
    
        echo "success||=>||the events have been edited successfully";

    
}//if($_POST["edit_events_arr"] !=0){}



if(isset($_POST["new_events_arr"]) && $_POST["new_events_arr"]!=0){
    $insert_rows=[];
    foreach($_POST["new_events_arr"]  as $i=>$one_event){
       $insert_rows[$i]= '("'.$_SESSION['e_id'].'","'.$one_event["type"].'","'.$one_event["title"].'","'.$one_event["start_date"].'","'.$one_event["start_hour"].'","'.$one_event["end_date"].'","'.$one_event["end_hour"].'","real_id","url")';
        
    }//for each
    
    if(count($insert_rows)>0){
        mysqli_query($con,'insert into events(emploee_id,type,title,start_date,start_hour,end_date,end_hour,real_id,url) values'.implode(',', $insert_rows))or die(mysqli_error($con));
        echo "success||=>||new events has been added successfully";
    }//there is rros
    
}//if($_POST["new_events_arr"] !=0){}

?>