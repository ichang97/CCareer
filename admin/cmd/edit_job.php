<?php
include '../connect.php';
header("content-type:text/html;charset=utf-8");

    $jobtitle = $_POST["txt_jobtitle"];
    $category = $_POST["txt_category"];
    $location = $_POST["txt_location"];
    $jd = $_POST["txt_jd"];
    $quantity = $_POST["txt_quantity"];
    $status = $_POST["txt_status"];
    $edit_id = $_POST['edit_id'];

    $sql_edit = "UPDATE jobs SET title = '$jobtitle', category = '$category', location = '$location',
    description = '$jd', status = '$status' , quantity = '$quantity' WHERE job_id = '$edit_id'";
    $result = mysqli_query($con, $sql_edit) or die ("Error in query: $sql_edit " . mysqli_error());

        if($result){
            header("Location: ../view_jd?id=$edit_id");
                }
    else{
        echo "<script type='text/javascript' CHARSET='UTF-8'>";
        echo "alert('ไม่สามารถบันทึกข้อมูลได้ กรุณาตรวจสอบข้อมูลอีกครั้ง');";
        echo "</script>";
            }   


mysqli_close($con);




?>