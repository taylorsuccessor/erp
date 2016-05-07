<?php
include('include/db_connect.php');

extract($_POST);


if(isset($edit_id)){

    
mysqli_query($con,"update managers set name='$name',password='$password',position='$position',email='$email',phone='$phone' where id=$edit_id") or die('error||=>||'.mysqli_error($con));

echo 'success||=>||<div style="padding:10px">the data has been edited  </div>';
}//edit 

else if(isset($save)){

mysqli_query($con,"insert into managers(name,password,position,email,phone) values('$name','$password','$position','$email','$phone')") or die('error||=>||'.mysqli_error());
echo 'success||=>||<div style="padding:10px">new manager has been added successfuly</div>';
}//save
?>