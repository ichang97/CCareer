<?php
include '../connect.php';
header("content-type:text/html;charset=utf-8");

    $username = $_POST["edit_username"];
	$password = mysqli_real_escape_string($con,md5(md5(md5($_POST["edit_pass"]))));
    $salutation = $_POST["edit_salutation"];
    $firstname = $_POST["edit_firstname"];
	$lastname = $_POST["edit_lastname"];
    $edit_id = $_POST['edit_id'];

    $sql_edit = "UPDATE admin SET username = '$username', password = '$password', salutation = '$salutation', firstname = '$firstname', lastname = '$lastname' WHERE admin_id = '$edit_id'";
    $result = mysqli_query($con, $sql_edit) or die ("Error in query: $sql_edit " . mysqli_error());

        if($result){
            echo "<script type='text/javascript' CHARSET='UTF-8'>";
            echo "alert('บันทึกข้อมูลสำเร็จ !');";
            echo "window.location = '../user_list'; ";
            echo "</script>";
                }
    else{
        echo "<script type='text/javascript' CHARSET='UTF-8'>";
        echo "alert('ไม่สามารถบันทึกข้อมูลได้ กรุณาตรวจสอบข้อมูลอีกครั้ง');";
        echo "</script>";
            }   


mysqli_close($con);




?>