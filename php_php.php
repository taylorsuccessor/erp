<?php

include('include/db_connect.php');
/* _________________________________________________________________________________delete */
if (isset($_POST['delete_arr'])) {
    $query_strig = '';
    if (is_array($_POST['delete_arr'])) {
        $query_strig = 'delete from ' . $_POST['table'] . ' where id in (' . implode(',', $_POST['delete_arr']) . ')';
    }//delete_arr is arr
    else {
        $query_strig = 'delete from ' . $_POST['table'] . ' where id="' . $_POST['delete_arr'] . '"';
    }//one to delete
    if (mysqli_query($con, $query_strig)) {
        echo 'success||=>||data has been deleted successfully';
    } else {
        echo 'error||=>||error the data not sent';
    }//not deleted error
}//if isset delete_arr

/* _____________________________________________________________________________ENd____delete */


/* __________________________________________________________________________________change_status */
if (isset($_POST['change_status_arr'])) {
    $query_strig = '';
    if (is_array($_POST['change_status_arr'])) {
        $query_strig = 'update  ' . $_POST['table'] . ' set ' . $_POST['edited_field'] . '="' . $_POST['status'] . '" where id in (' . implode(',', $_POST['change_status_arr']) . ')';
    }//delete_arr is arr
    else {
        $query_strig = 'update  ' . $_POST['table'] . ' set ' . $_POST['edited_field'] . '="' . $_POST['status'] . '" where id="' . $_POST['change_status_arr'] . '"';
    }//one to delete

    if (mysqli_query($con, $query_strig)) {

        /* ____________________-notefication */
        $now_time = gmdate('Y-m-d H:i:s');

        if ($_POST['table'] == 'task') {
            //we while make it limit count($_POST['change_status_arr']) because all what we can change his status is count($_POST['change_status_arr']) rows
            $task_query = mysqli_query($con, 'select id,emploee_id,responsible,assisting from task where id in (' . implode(',', $_POST['change_status_arr']) . ')')or die(mysqli_error($con));
            while ($row = mysqli_fetch_array($task_query)) {
                mysqli_query($con, "insert into notefication(emploee_id,table_name,note_id,row_id,date_time)"
                                . " values('" . $_SESSION['e_id'] . "','" . $_POST['table'] . "','" . $_POST['status'] . "','" . $row["id"] . "','$now_time')")or die('error||=>||' . mysqli_error($con));

                $note_id = mysqli_insert_id($con);
                mysqli_query($con, "insert into note_emploee(e_id,note) values('" . $row['responsible'] . "','$note_id'),('" . $row['assisting'] . "','$note_id')")or die(mysqli_error($con));
            }//while rows
        }//table is task
        else {
            //we while make it limit count($_POST['change_status_arr']) because all what we can change his status is count($_POST['change_status_arr']) rows
            $task_query = mysqli_query($con, 'select id,emploee_id  from  ' . $_POST['table'] . '  where id in (' . implode(',', $_POST['change_status_arr']) . ')')or die(mysqli_error($con));
            while ($row = mysqli_fetch_array($task_query)) {
                mysqli_query($con, "insert into notefication(emploee_id,table_name,note_id,row_id,date_time)"
                                . " values('" . $_SESSION['e_id'] . "','" . $_POST['table'] . "','" . $_POST['status'] . "','" . $row["id"] . "','$now_time')")or die('error||=>||' . mysqli_error($con));

                $note_id = mysqli_insert_id($con);
                mysqli_query($con, "insert into note_emploee(e_id,note) values('" . $row['emploee_id'] . "','$note_id')")or die(mysqli_error($con));
            }//while rows
        }//not task vacation,leaving,quits
        /* _________________END___-notefication */
        echo 'success||=>||the status has been changed successfully';
    } else {
        echo 'error||=>||error the status not change';
    }//not change status error
}//if isset change_status_arr
/* _______________________________________________________________________________END___change_status */
?>