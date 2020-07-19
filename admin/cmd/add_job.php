<?php
session_start();
include '../connect.php';   
header("content-type:text/html;charset=utf-8");

	$job_title = $_REQUEST["txt_jobtitle"];
	$category = $_REQUEST["txt_category"];
    $location = $_REQUEST["txt_location"];
	$jd = $_REQUEST["txt_jd"];
	$quantity = $_REQUEST["txt_quantity"];
	$status = 1;
    $admin_id = $_SESSION['admin_id'];
    
    date_default_timezone_set('Asia/Bangkok');
    $log_timestamp = date("Y-m-d H:i:s");

	//table1
	$sql = "INSERT INTO jobs(admin_id,title, category, description, location, timestamp,status,quantity)
			 VALUES('$admin_id', '$job_title', '$category','$jd','$location','$log_timestamp','$status','$quantity')";
	$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());

	//ปิดการเชื่อมต่อ database
	mysqli_close($con);
	//จาวาสคริปแสดงข้อความเมื่อบันทึกเสร็จและกระโดดกลับไปหน้าฟอร์ม
	
	if($result){
		echo "<script type='text/javascript' CHARSET='UTF-8'>";
		echo "alert('บันทึกข้อมูลสำเร็จ !');";
		echo "window.location = '../view_job'; ";
		echo "</script>";
		}
		else{
		echo "<script type='text/javascript' CHARSET='UTF-8'>";
		echo "alert('ไม่สามารถบันทึกข้อมูลได้ กรุณาตรวจสอบข้อมูลอีกครั้ง');";
		echo "</script>";
	}
	?>