<?php
include('include/db_connect.php');

extract($_POST);

if(isset($edit_id)){

    
mysqli_query($con,"update emploee set name='$name',password='$password',position_id='$position_id',email='$email',department_id='$department_id',job_description='$job_description',salary='$salary',national_number='$national_number',manager_id='$manager_id',phone='$phone',img='$user_img' where id=$edit_id") or die('error||=>||'.mysqli_error($con));

echo 'success||=>||<div style="padding:10px">the data has been edited  </div>';
}//edit 

else if(isset($save)){
mysqli_query($con,"insert into emploee(name,password,email,department_id,position_id,job_description,salary,national_number,manager_id,phone,img) values('$name','$password','$email','$department_id','$position_id','$job_description','$salary','$national_number','$manager_id','$phone','$user_img')") or die('error||=>||'.mysqli_error($con));
echo 'success||=>||<div style="padding:10px">new emploee has been added successfuly</div>';
}//save
?>