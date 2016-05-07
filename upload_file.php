<?php

/*___________________________________________________upload_file*/
if(isset($_POST['upload_files'])){
   
if(!empty($_FILES['file'])){
 
$rand_1=rand();$rand_2=rand();
        if($_FILES['file']['error'] == 0 && move_uploaded_file($_FILES['file']['tmp_name'],'upload_files/'.$rand_1.'_'.$rand_2.'_'.iconv( "utf-8","windows-1256",$_FILES['file']['name']))){
		echo 'success||=>||'.$rand_1.'_'.$rand_2.'_'.$_FILES['file']['name'];
		}// if file moved whith out error 
else{echo 'error||=>||the file not uploaded!';}//file not uploaded
//}//for each file in the files


}//if files not empty
else{echo 'error||=>||no selected file to upload!';}//the file input

}//temp file to server
/*_______________________________________________end____upload_file*/

?>