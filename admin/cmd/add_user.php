<?php
include '../connect.php';   
header("content-type:text/html;charset=utf-8");

	$username = $_REQUEST["username"];
	$password = md5(md5(md5($_REQUEST["pass"])));
	$salutation = $_REQUEST["salutation"];
    $firstname = $_REQUEST["firstname"];
	$lastname = $_REQUEST["lastname"];
	$permission = '1';

	//table1
	$sql = "INSERT INTO admin(username, password, salutation, firstname, lastname, permission)
			 VALUES('$username', '$password', '$salutation','$firstname','$lastname','$permission')";
	$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());

	//ปิดการเชื่อมต่อ database
	mysqli_close($con);
	//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
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
	?>