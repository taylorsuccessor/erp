<?php
/*________________task
 * runing 1
 * pause 2
 * closed 3
 * set_by_me 4
 * assisting 5
 * all 6
 */
include('include/db_connect.php');

extract($_POST);


if(isset($edit_id) && $edit_id > 0){

    $now_time=gmdate('Y-m-d H:i:s');
    $deadline=($yes_no_deadline != 0)? $deadline_date." " .date('H:i',  strtotime($deadline_time)):0;

    
mysqli_query($con,"update task set responsible='$responsible',assisting='$assisting',title='$title',priority='$priority',end_date_time='".$deadline."',description='$description',note='$note' where id=".$edit_id ) or die('error||=>||'.mysqli_error($con));

/*____________________-notefication*/
mysqli_query($con,"insert into notefication(emploee_id,table_name,note_id,row_id,date_time)"
        . " values('".$_SESSION['e_id']."','task','1','$edit_id','$now_time')")or die('error||=>||'.mysqli_error($con));

$note_id=  mysqli_insert_id($con);
         mysqli_query($con, "insert into note_emploee(e_id,note) values('$responsible','$note_id'),('$assisting','$note_id')")or die(mysqli_error($con));

/*_________________End___-notefication*/         
         

echo 'success||=>||<div style="padding:10px">the task has been edited  </div>';
}//edit 

else if(isset($save)){
    
    $now_time=gmdate('Y-m-d H:i:s');
    $deadline=($yes_no_deadline != 0)? $deadline_date." " .date('H:i',  strtotime($deadline_time)):0;

mysqli_query($con,"insert into task (emploee_id,responsible,assisting,title,priority,start_date_time,end_date_time,description,note) values"
        . "('".$_SESSION["e_id"]."','$responsible','$assisting','$title','$priority','$now_time','".$deadline."','$description','$note')") or die('error||=>||'.mysqli_error($con));
$id=  mysqli_insert_id($con);


/*____________________-notefication*/
mysqli_query($con,"insert into notefication(emploee_id,table_name,note_id,row_id,date_time)"
        . " values('".$_SESSION['e_id']."','task','0','$id','$now_time')")or die('error||=>||'.mysqli_error($con));

$note_id=  mysqli_insert_id($con);
         mysqli_query($con, "insert into note_emploee(e_id,note) values('$responsible','$note_id'),('$assisting','$note_id')")or die(mysqli_error($con));

/*_________________END___-notefication*/         
         
echo 'success||=>||<div style="padding:10px">the task has been added  successfully </div>';
}//save
?>