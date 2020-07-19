<?php
include '../connect.php';
header("content-type:text/html;charset=utf-8");
//โฟลเดอร์ที่จะ upload file เข้าไป 
$path="../uploads/logo/";
$file_name = $_FILES['edit_logo']['name'];
$path_copy = $path.$file_name;
$path_link = "../uploads/logo/" . $file_name;

move_uploaded_file($_FILES['edit_logo']['tmp_name'],$path_copy);


    $loname = $_POST["edit_loname"];
    $edit_id = $_POST['edit_id'];

    $sql_edit = "UPDATE location SET location_name = '$loname', logo = '$file_name' WHERE id = '$edit_id'";
    $result = mysqli_query($con, $sql_edit) or die ("Error in query: $sql_edit " . mysqli_error());

        if($result){
            echo "<script type='text/javascript' CHARSET='UTF-8'>";
            echo "alert('บันทึกข้อมูลสำเร็จ !');";
            echo "window.location = '../location_list'; ";
            echo "</script>";
                }
    else{
        echo "<script type='text/javascript' CHARSET='UTF-8'>";
        echo "alert('ไม่สามารถบันทึกข้อมูลได้ กรุณาตรวจสอบข้อมูลอีกครั้ง');";
        echo "</script>";
            }   



mysqli_close($con);


?>