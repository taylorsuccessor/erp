<?php 
session_start();
$con=mysqli_connect("localhost","root","") or die ("not connection");//connect to the server
mysqli_query($con,"set character_set_server='utf8'");//
mysqli_query($con,"set names 'utf8'");               //arabic code
mysqli_select_db($con,"erp") or die ("data base not set"); //select database

function incode_time($time){
    return strtotime($time);
  $time_arr=explode(' ',$time);  
  $h_m_arr=explode(':',$time_arr[0]);
  $h=(trim(strtolower($time_arr[1]))=='pm')? $h_m_arr[0]+12:$h_m_arr[0];
  
  $h=($h==24)? '00':$h;
  return  $h.':'.$h_m_arr[1];
}//incode_time

function decode_time($time){
    if(is_long($time )){
        return  date('h:i a',$time);
        
    }else if($time==''){
        return '00:00';
        
    }else{  return  date('h:i a',  strtotime($time));}
 
    
  $time_arr=explode(':',$time);
  $time_arr[0]=intval($time_arr[0]);
  
  $a=($time_arr[0]>12 || $time_arr[0]==0)?  'pm':'am';
  $h=($time_arr[0]==0)? 12:$time_arr[0];
  $h=($time_arr[0]>12)? $time_arr[0]-12:$h;
 
   return $h.':'.$time_arr[1].' '.$a;
    
}//decode_time

function get_from_to_date($date_range){
    
            $date_arr=  explode('| - |',$date_range);
    
    $from_date=  trim(str_replace('|','',$date_arr[0]));
    $to_date=  trim(str_replace('|','',$date_arr[1]));
    
    return array('from'=>$from_date,'to'=>$to_date);
}//get_from_to_date($date_range)


$default_status_arr=array('','check all','uncheck all','pause','play','stop','agree','disagree','need more info','edit','delete');
 $status_index=array(''=>0,'check all'=>1,'uncheck all'=>2,'pause'=>3,'play'=>4,'stop'=>5,'agree'=>6,'disagree'=>7,'need more info'=>8,'edit'=>9,'delete'=>10);
 $status_icons_arr=array('','fa-check-square-o','fa-square-o','fa-pause','fa-play','fa-stop','fa-check','fa-ban','fa-info','fa-edit','fa-trash-o');
 $status_label_arr=array('','label-primary','label-primary','label-warning','label-success','label-danger','label-success','label-danger','label-warning','label-primary','label-danger');
 function great_status($edit_page,$table,$status_arr){
     global $status_index,$status_icons_arr;
     $status_functions_arr=array("","check_all('.table');","uncheck_all('.table');","change_checked_status('$table',3);","change_checked_status('$table',4);","change_checked_status('$table',5);","change_checked_status('$table',6);","change_checked_status('$table',7);","change_checked_status('$table',8);","go_to_edit_page('$edit_page');","delete_checked('$table');");                                                       

     $html=' <div class="status_buttons_all_div">';
     for($i=0;$i<count($status_arr);$i++){$html.='<a href="#" onclick="'.$status_functions_arr[$status_index[$status_arr[$i]]].' return false;">   <i class="fa fa-fw '.$status_icons_arr[$status_index[$status_arr[$i]]].'"></i>'.$status_arr[$i].'</a>';}
     $html.=' </div>';
     return $html;
 }//great_status
include('include/array_php.php');
 ?>