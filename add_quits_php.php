<?php
include('include/db_connect.php');

extract($_POST);

if(isset($edit_id)){

mysqli_query($con,"insert into emploee_notefication(emploee_id,title,description,type_id,date_time,status,supervisor_id) values('".$_SESSION['e_id']."','emploee edit quit ','employee quit edited ','3','".gmdate('Y-m-d H:i:s')."','0','0')") or die('error||=>||'.mysqli_error($con));

mysqli_query($con,"update quits set title='$title',description='$description' where id=$edit_id") or die('error||=>||'.mysqli_error($con));

echo 'success||=>||<div style="padding:10px">the quit has been edited  </div>';
}//edit 

else if(isset($save)){

mysqli_query($con,"insert into emploee_notefication(emploee_id,title,description,type_id,date_time,status,supervisor_id) values('".$_SESSION['e_id']."','emploee quit ','please , see my quit ','3','".gmdate('Y-m-d H:i:s')."','0','0')") or die('error||=>||'.mysqli_error($con));

mysqli_query($con,"insert into quits(emploee_id,title,description,type_id,date_time,status,supervisor_id) values('".$_SESSION['e_id']."','$title','$description','3','".gmdate('Y-m-d H:i:s')."','0','0')") or die('error||=>||'.mysqli_error($con));

echo 'success||=>||<div style="padding:10px">the quit has been sent to manager successfully please wait manager ansower</div>';
}//save 
?>