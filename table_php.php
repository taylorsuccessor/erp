<?php
include("include/db_connect.php");

/*vacations_______________________________________________*/
if($_POST['title']=='vacations'){
    
    $page=$_POST['page']*10;
    
    
    $where_searsh=($_POST['search_text'] !='')? 'where id="'.$_POST['search_text'].'" or emploee_id="'.$_POST['search_text'].'" or note like "%'.$_POST['search_text'].'%"':'';
    $query_string='select * from vacation '.$where_searsh.' order by id desc limit '.$page.',10';
    $count_query='select count(id) rows_num from vacation  '.$where_searsh;
    
    $result=mysqli_query($con,$query_string)or die(mysqli_error($con));
    while($row=mysqli_fetch_array($result)){
        echo '<tr>'
        . '<td><input type="checkbox" id="'.$row['id'].'"></td>'
        . '<td>'.$row['id'].'</td>'
        . '<td>'.$row['emploee_id'].'</td>'
        . '<td>'.$row['from_date'].'</td>'
        . '<td>'.$row['to_date'].'</td>'
       . '<td><small class="label '.$status_label_arr[$row['status']].'"><i class="fa '.$status_icons_arr[$row['status']].'"></i> '.$default_status_arr[$row['status']].'</small></td>'
         . '<td>'.$row['note'].'</td>'
        . '<td>'.$row['order_date'].'</td>'
                . '</tr>';
                    
        
         
    }//while rows
    
    
    $rows_number=mysqli_fetch_array(mysqli_query($con,$count_query));
            
            echo '||=>||'.$rows_number['rows_num'];
}//vacationc

/*vacations___________________________________End____________*/
/*leaving_______________________________________________*/
if($_POST['title']=='leaving'){
    
    $page=$_POST['page']*10;
    
    
    $where_searsh=($_POST['search_text'] !='')? 'where id="'.$_POST['search_text'].'" or emploee_id="'.$_POST['search_text'].'" or note like "%'.$_POST['search_text'].'%"':'';
    $query_string='select * from leaving '.$where_searsh.' order by id desc limit '.$page.',10';
    $count_query='select count(id) rows_num from leaving  '.$where_searsh;

    
    $result=mysqli_query($con,$query_string)or die(mysqli_error($con));
    while($row=mysqli_fetch_array($result)){
        echo '<tr>'
        . '<td><input type="checkbox" id="'.$row['id'].'"></td>'
        . '<td>'.$row['id'].'</td>'
        . '<td>'.$row['emploee_id'].'</td>'
        . '<td>'.$row['date'].'</td>'
        . '<td>'.decode_time($row['from_hour']).'</td>'
        . '<td>'.decode_time($row['to_hour']).'</td>'
        . '<td><small class="label '.$status_label_arr[$row['status']].'"><i class="fa '.$status_icons_arr[$row['status']].'"></i> '.$default_status_arr[$row['status']].'</small></td>'
        . '<td>'.$row['note'].'</td>'
        . '<td>'.$row['order_date'].'</td>'
                . '</tr>';
                    
        
        
    }//while rows
    
    
    $rows_number=mysqli_fetch_array(mysqli_query($con,$count_query));
            
            echo '||=>||'.$rows_number['rows_num'];
}//leaving

/*leaving___________________________________End____________*/

/*quits_______________________________________________*/
if($_POST['title']=='quits'){
    
    $page=$_POST['page']*10;
    
    
    $where_searsh=($_POST['search_text'] !='')? 'where quits.id="'.$_POST['search_text'].'" or emploee.name like "%'.$_POST['search_text'].'%" or quits.title like "%'.$_POST['search_text'].'%"':'';
    $query_string='select quits.id,quits.title,quits.date_time,emploee.name emploee_name,quits.status  from quits left join emploee on quits.emploee_id=emploee.id '.$where_searsh.' order by id desc limit '.$page.',10';
    $count_query='select count(quits.id) rows_num from quits left join emploee on quits.emploee_id=emploee.id '.$where_searsh;
    
    $result=mysqli_query($con,$query_string)or die(mysqli_error($con));
    while($row=mysqli_fetch_array($result)){
        echo '<tr>'
        . '<td><input type="checkbox" id="'.$row['id'].'"></td>'
        . '<td>'.$row['id'].'</td>'
        . '<td>'.$row['emploee_name'].'</td>'
        . '<td>'.$row['title'].'</td>'
        . '<td>'.$row['date_time'].'</td>'
       . '<td><small class="label '.$status_label_arr[$row['status']].'"><i class="fa '.$status_icons_arr[$row['status']].'"></i> '.$default_status_arr[$row['status']].'</small></td>'

                . '</tr>';
                    
        
         
    }//while rows
    
    
    $rows_number=mysqli_fetch_array(mysqli_query($con,$count_query));
            
            echo '||=>||'.$rows_number['rows_num'];
}//quits

/*quits___________________________________End____________*/
/*managers_______________________________________________*/
if($_POST['title']=='managers'){
    
    $page=$_POST['page']*10;
    
    $where_searsh=($_POST['search_text'] !='')? 'where managers.id="'.$_POST['search_text'].'" or managers.name like "%'.$_POST['search_text'].'%" ':'';
    $query_string='select managers.id,managers.name,position.name position,managers.email,managers.phone from managers left join position on managers.position=position.id '.$where_searsh.' order by managers.id desc limit '.$page.',10';
    $count_query='select count(managers.id) rows_num from managers left join position on managers.position=position.id   '.$where_searsh;

    $result=mysqli_query($con,$query_string)or die(mysqli_error($con));
    while($row=mysqli_fetch_array($result)){
        echo '<tr>'
        . '<td><input type="checkbox" id="'.$row['id'].'"></td>'
        . '<td>'.$row['id'].'</td>'
        . '<td>'.$row['name'].'</td>'
        . '<td>'.$row['position'].'</td>'
       . '<td>'.$row['email'].'</td>'
        . '<td>'.$row['phone'].'</td>'
                . '</tr>';
                    
        
        
    }//while rows
    
    
    $rows_number=mysqli_fetch_array(mysqli_query($con,$count_query));
            
            echo '||=>||'.$rows_number['rows_num'];
}//managers

/*managers___________________________________End____________*/
/*department_______________________________________________*/
if($_POST['title']=='department'){
    
    $page=$_POST['page']*10;
    
    $where_searsh=($_POST['search_text'] !='')? 'where department.id="'.$_POST['search_text'].'" or department.name like "%'.$_POST['search_text'].'%" ':'';
    $query_string='select department.id,department.name,managers.name manager,department.start_work_hour,department.end_work_hour from department left join managers on department.manager_id=managers.id '.$where_searsh.' order by department.id desc limit '.$page.',10';
    $count_query='select count(department.id) rows_num from department left join managers on department.manager_id=managers.id '.$where_searsh;

    $result=mysqli_query($con,$query_string)or die(mysqli_error($con));
    while($row=mysqli_fetch_array($result)){
        echo '<tr>'
        . '<td><input type="checkbox" id="'.$row['id'].'"></td>'
        . '<td>'.$row['id'].'</td>'
        . '<td>'.$row['name'].'</td>'
        . '<td>'.$row['manager'].'</td>'
       . '<td>'.$row['start_work_hour'].'</td>'
        . '<td>'.$row['end_work_hour'].'</td>'
                . '</tr>';
                    
        
        
    }//while rows
    
    
    $rows_number=mysqli_fetch_array(mysqli_query($con,$count_query));
            
            echo '||=>||'.$rows_number['rows_num'];
}//department

/*department___________________________________End____________*/
/*emploee_______________________________________________*/
if($_POST['title']=='emploee'){
    
    $page=$_POST['page']*10;
    
    $where_searsh=($_POST['search_text'] !='')? 'where emploee.id="'.$_POST['search_text'].'" or emploee.name like "%'.$_POST['search_text'].'%" ':'';
    $query_string='select emploee.id,emploee.name,department.name department,emploee.email,emploee.phone from emploee left join department on emploee.department_id=department.id '.$where_searsh.' order by emploee.id desc limit '.$page.',10';
    $count_query='select count(emploee.id) rows_num  from emploee left join department on emploee.department_id=department.id '.$where_searsh;

    $result=mysqli_query($con,$query_string)or die(mysqli_error($con));
    while($row=mysqli_fetch_array($result)){
        echo '<tr>'
        . '<td><input type="checkbox" id="'.$row['id'].'"></td>'
        . '<td>'.$row['id'].'</td>'
        . '<td>'.$row['name'].'</td>'
        . '<td>'.$row['department'].'</td>'
       . '<td>'.$row['email'].'</td>'
        . '<td>'.$row['phone'].'</td>'
                . '</tr>';
                    
        
        
    }//while rows
    
    
    $rows_number=mysqli_fetch_array(mysqli_query($con,$count_query));
            
            echo '||=>||'.$rows_number['rows_num'];
}//emploee

/*emploee___________________________________End____________*/

/*________________________________________________________-email__*/
if($_POST["title"]=="email_inbox"){
    
    
    
    $page=$_POST['page']*10;
    
    $where_searsh=($_POST['search_text'] !='')? 'where  (email.id="'.$_POST['search_text'].'" or email.subject like "%'.$_POST['search_text'].'%" or email.message like "%'.$_POST['search_text'].'%" or emploee.name like "%'.$_POST['search_text'].'%")':'';

    if($_POST['type']==4){
    $where_searsh=($where_searsh =='')? 'where email.emploee_id="'.$_SESSION["e_id"].'" and not email.type="2" ':$where_searsh.' and  email.emploee_id="'.$_SESSION["e_id"].'" and  not email.type = "2"';
    }//if the email send list
    else if($_POST['type']==2){
    $where_searsh=($where_searsh =='')? 'where email.emploee_id="'.$_SESSION["e_id"].'" and  email.type="2" ':$where_searsh.' and  email.emploee_id="'.$_SESSION["e_id"].'" and  email.type = "2"';
    }//if the email send list
    else{
        $where_searsh=($where_searsh =='')? 'where email.send_to="'.$_SESSION["e_id"].'" and  email.type="'.$_POST['type'].'" ':$where_searsh.' and  email.send_to="'.$_SESSION["e_id"].'" and  email.type = "'.$_POST['type'].'"';
   
    }//not the send
    
    
    $query_string='select emploee.name,email.subject,email.id,email.message,email.status,email.date_time from email inner join emploee on emploee.id=email.emploee_id  '.$where_searsh.' order by email.id desc limit '.$page.',10';
    $count_query='select count(email.id) rows_num from email inner join emploee on emploee.id=email.emploee_id  '.$where_searsh;
    
    $result=mysqli_query($con,$query_string)or die(mysqli_error($con));
    if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_array($result)){
    
    echo ' <tr  >
                          <td><input type="checkbox" class="message_checkbox" message_id="'.$row["id"].'" /></td>
                          <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
                          <td class="mailbox-name"><a href="email_read.php?email_id='.$row['id'].'">'.$row['name'].'</a></td>
                          <td class="mailbox-subject"><b>'.$row['subject'].'</b> - '.str_split($row['message'], 40  )[0].'</td>
                          <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                          <td class="mailbox-date"><span class="date_time_span">'.$row['date_time'].'</span></td>
                        </tr>';
    }//while rows
    }//there is rows
    else{
        echo '<tr><th>no emails</th></tr>';
    }//no rows in sql
    
    $rows_number=mysqli_fetch_array(mysqli_query($con,$count_query));
            
            echo '||=>||'.$rows_number['rows_num'];
}//email_inbox
/*____________________________________________________END____-email__*/


/*________________________________________________________-task__*/
if($_POST["title"]=="task_list"){
    
    
    
    $page=$_POST['page']*10;
    
     $where_searsh='where ';
    
     
    if($_POST['type']==1){
    $where_searsh .= ' task.responsible="'.$_SESSION["e_id"].'" and ( task.status in(3,4,"",0) )';
    }//if runing nad pause
    else if($_POST['type']==2){
 
    $where_searsh .= ' task.emploee_id="'.$_SESSION["e_id"].'" ';
    }//set  by me
    else if($_POST['type']==3){
 
    $where_searsh .= ' task.assisting="'.$_SESSION["e_id"].'" ';
    }//assisting
    else if($_POST['type']==4){
 
    $where_searsh .= ' (task.emploee_id="'.$_SESSION["e_id"].'" or task.responsible="'.$_SESSION["e_id"].'"  or task.assisting="'.$_SESSION["e_id"].'" ) and  task.status="5" ';
    }//closed
    else if($_POST['type']==5){
 
    $where_searsh .= ' task.emploee_id="'.$_SESSION["e_id"].'" or task.responsible="'.$_SESSION["e_id"].'"  or task.assisting="'.$_SESSION["e_id"].'" ';
    }//all tasks

    
    
    
    $where_searsh.=($_POST['search_text'] !='')? ' and (task.id="'.$_POST['search_text'].'" or task.title like "%'.$_POST['search_text'].'%" or task.description like "%'.$_POST['search_text'].'%" or emploee.name like "%'.$_POST['search_text'].'%")':'';

    
    $query_string='select emploee.name,task.title,task.id,task.end_date_time,task.status,task.type,task.priority   from task inner join emploee on emploee.id=task.emploee_id  '.$where_searsh.' order by task.id desc limit '.$page.',10';
    $count_query='select count(task.id) rows_num from task inner join emploee on emploee.id=task.emploee_id  '.$where_searsh;
   
    $priority_arr=array('low','medium','high');
    $priority_icons_arr=array('fa-star-o','fa-star-half-full','fa-star');
   $priority_label_arr=array('label-success','label-warning','label-danger');
    
    $result=mysqli_query($con,$query_string)or die(mysqli_error($con));
    if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_array($result)){
    
    echo ' <tr  >
                          <td><input type="checkbox" class="message_checkbox" id="'.$row["id"].'" /></td>
                          <td class="mailbox-name"><a href="task_one_display.php?task_id='.$row['id'].'">'.$row['title'].'</a></td>
                          <td class="mailbox-subject"><b>'.$row['end_date_time'].'</b></td>
                          <td class="mailbox-attachment">'.$row['name'].'</td>
                          <td class="mailbox-date"><small class="label '.$priority_label_arr[$row['priority']].'"><i class="fa '.$priority_icons_arr[$row['priority']].'"></i> '.$priority_arr[$row['priority']].'</small></td>
                     <td><small class="label '.$status_label_arr[$row['status']].'"><i class="fa '.$status_icons_arr[$row['status']].'"></i> '.$default_status_arr[$row['status']].'</small></td>

</tr>';
    }//while rows
    }//there is rows
    else{
        echo '<tr><th>no tasks </th></tr>';
    }//no rows in sql
    
    $rows_number=mysqli_fetch_array(mysqli_query($con,$count_query));
            
            echo '||=>||'.$rows_number['rows_num'];
}//task_list
/*____________________________________________________END____-task__*/



?>