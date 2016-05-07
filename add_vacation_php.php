<?php
include('include/db_connect.php');

extract($_POST);


if(isset($edit_id)){

    mysqli_query($con,"insert into emploee_notefication(emploee_id,title,description,type_id,date_time,status,supervisor_id) values('".$_SESSION['e_id']."','edit vacation ','the vacation has been edited','2','".gmdate('Y-m-d H:i:s')."','0','0')") or die('error||=>||'.mysqli_error($con));
$date=get_from_to_date($date);
mysqli_query($con,"update vacation set from_date='".$date['from']."',to_date='".$date['to']."',note='$note' where id=$edit_id") or die('error||=>||'.mysqli_error($con));

echo 'success||=>||<div style="padding:10px">the data has been edited  </div>';
}//edit 

else if(isset($save)){
mysqli_query($con,"insert into emploee_notefication(emploee_id,title,description,type_id,date_time,status,supervisor_id) values('".$_SESSION['e_id']."','order vacation ','please , see my order ','2','".gmdate('Y-m-d H:i:s')."','0','0')") or die('error||=>||'.mysqli_error($con));
$date=get_from_to_date($date);
mysqli_query($con,"insert into vacation(emploee_id,from_date,to_date,status,note,order_date) values('".$_SESSION['e_id']."','".$date['from']."','".$date['to']."','0','$note','".gmdate("Y-m-d")."')") or die('error||=>||'.mysqli_error($con));

echo 'success||=>||<div style="padding:10px">the vacation has been sent to manager successfully please wait manager ansower</div>';
}//save
?>