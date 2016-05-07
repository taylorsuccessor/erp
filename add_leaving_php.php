<?php
include('include/db_connect.php');

extract($_POST);


if(isset($edit_id)){

    
mysqli_query($con,"insert into emploee_notefication(emploee_id,title,description,type_id,date_time,status,supervisor_id) values('".$_SESSION['e_id']."','edit leaving ','the leaving form edited','1','".gmdate('Y-m-d H:i:s')."','0','0')") or die('error||=>||'.mysqli_error($con));

mysqli_query($con,"update leaving set date='$date',from_hour='".incode_time($from_hour)."',to_hour='".incode_time($to_hour)."',note='$note' where id=$edit_id") or die('error||=>||'.mysqli_error($con));

echo 'success||=>||<div style="padding:10px">the data has been edited  </div>';
}//edit 

else if(isset($save)){
mysqli_query($con,"insert into emploee_notefication(emploee_id,title,description,type_id,date_time,status,supervisor_id) values('".$_SESSION['e_id']."','order leaving ','please , see my order ','1','".gmdate('Y-m-d H:i:s')."','0','0')") or die('error||=>||'.mysqli_error($con));

mysqli_query($con,"insert into leaving(emploee_id,date,from_hour,to_hour,note,order_date) values('".$_SESSION['e_id']."','$date','".incode_time($from_hour)."','".incode_time($to_hour)."','$note','".gmdate("Y-m-d")."')") or die('error||=>||'.mysqli_error($con));

echo 'success||=>||<div style="padding:10px">the leaving has been sent to manager successfully please wait manager ansower</div>';
}//save
?>