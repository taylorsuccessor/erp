<?php
/*________________email type
 * sent 0
 * junk 1
 * draft 2
 * trash 3
 * send=4
 */
include('include/db_connect.php');

extract($_POST);


if(isset($edit_id) && $edit_id > 0){

    $notefication_title='';
    if($type=='0'){ $notefication_title='send email';}else{$notefication_title='email has been edited';}
    
mysqli_query($con,"insert into emploee_notefication(emploee_id,title,description,type_id,date_time,status,supervisor_id) values('".$_SESSION['e_id']."','$notefication_title ','$subject','4','".gmdate('Y-m-d H:i:s')."','0','0')") or die('error||=>||3'.mysqli_error($con));

mysqli_query($con,"update email set send_to='$send_to',subject='$subject',message='$message',type='$type',date_time='".gmdate('Y-m-d H:i:s')."' where id=$edit_id") or die('error||=>||4'.mysqli_error($con));

echo 'success||=>||<div style="padding:10px">the data has been edited  </div>';
}//edit 

else if($edit_id==''){
    
    $notefication_title='';
    if($type=='0'){ $notefication_title='send email';}else{$notefication_title='email has been added to emails';}
mysqli_query($con,"insert into emploee_notefication(emploee_id,title,description,type_id,date_time,status,supervisor_id) values('".$_SESSION['e_id']."','$notefication_title','$subject ','1','".gmdate('Y-m-d H:i:s')."','0','0')") or die('error||=>||1'.mysqli_error($con));

mysqli_query($con,"insert into email (send_to,subject,message,type,date_time) values('$send_to','$subject','$message','$type','".gmdate('Y-m-d H:i:s')."')") or die('error||=>||2'.mysqli_error($con));

echo 'success||=>||<div style="padding:10px">the email has been sent  successfully </div>';
}//save
?>