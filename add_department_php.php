<?php
include('include/db_connect.php');

extract($_POST);

if(isset($edit_id)){

    
mysqli_query($con,"update department set name='$name',manager_id='$manager_id',description='$description',start_work_hour='".incode_time($start_work_hour)."',end_work_hour='".incode_time($end_work_hour)."' where id=$edit_id") or die('error||=>||'.mysqli_error($con));

echo 'success||=>||<div style="padding:10px">the data has been edited  </div>';
}//edit 

else if(isset($save)){
mysqli_query($con,"insert into department(name,manager_id,description,start_work_hour,end_work_hour) values('$name','$manager_id','$description','".incode_time($start_work_hour)."','".incode_time($end_work_hour)."')") or die('error||=>||'.mysqli_error());
echo 'success||=>||<div style="padding:10px">new department has been added successfuly</div>';
}//save
?>