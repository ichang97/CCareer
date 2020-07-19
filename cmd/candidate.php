<?php
session_start();

include '../connect.php';   
header("content-type:text/html;charset=utf-8");
//โฟลเดอร์ที่จะ upload file เข้าไป 
$pathdoc="../uploads/doc/";
$file_namedoc = $_FILES['fileresume']['name'];
$filedoc = strtolower($_FILES['fileresume']['name']);
$path_copydoc = $pathdoc.$file_namedoc;
$path_linkdoc = "../uploads/doc/" . $file_namedoc;

$alloweddoc =  array('doc','docx' ,'pdf');
$extdoc = pathinfo($file_namedoc, PATHINFO_EXTENSION);
if(!in_array($extdoc,$alloweddoc) ) {
    echo "<script type='text/javascript' CHARSET='UTF-8'>";
    echo "alert('กรุณาอัพโหลดไฟล์เอกสารนามสกุล .doc .docx .pdf เท่านั้น');";
    echo "window.location = 'https://career.dekcom-chamnong.com'; ";
    echo "</script>";
}

$pathimg="../uploads/profile/";
$file_nameimg = $_FILES['fileimg']['name'];
$fileimg = strtolower($_FILES['fileimg']['name']);
$path_copyimg = $pathimg.$file_nameimg;
$path_linkimg = "../uploads/profile/" . $file_nameimg;

$allowedimg =  array('jpg','png','jpeg');
$extimg = pathinfo($file_nameimg, PATHINFO_EXTENSION);
if(!in_array($extimg,$allowedimg) ) {
    echo "<script type='text/javascript' CHARSET='UTF-8'>";
    echo "alert('กรุณาอัพโหลดไฟล์ภาพผู้สมัครนามสกุล .jpg .jpeg และ .png เท่านั้น');";
    echo "window.location = 'https://career.dekcom-chamnong.com'; ";
    echo "</script>";
}
else {


move_uploaded_file($_FILES['fileresume']['tmp_name'],$path_copydoc);
move_uploaded_file($_FILES['fileimg']['tmp_name'],$path_copyimg);

$salutation = mysqli_real_escape_string($con,$_POST["txt_salutation"]);
$firstname = mysqli_real_escape_string($con,$_POST["txt_firstname"]);
$lastname = mysqli_real_escape_string($con,$_POST["txt_lastname"]);
$gradcert = mysqli_real_escape_string($con,$_POST["txt_gradcert"]);
$teachcert = mysqli_real_escape_string($con,$_POST["txt_teachcert"]);
$bio = mysqli_real_escape_string($con,$_POST["txt_bio"]);
$tel = mysqli_real_escape_string($con,$_POST["txt_tel"]);
$email = mysqli_real_escape_string($con,$_POST["txt_email"]);

  $ref = $_SESSION['job_id'];
 
date_default_timezone_set('Asia/Bangkok');
    $log_timestamp = date("Y-m-d H:i:s");
  
  	$sql = "INSERT INTO candidates(salutation,firstname,lastname,graduated_cert,teach_cert_chk,bio,tel,email,job_id,timestamp,resume_path,img_path)
			 VALUES('$salutation', '$firstname', '$lastname','$gradcert','$teachcert','$bio','$tel','$email','$ref','$log_timestamp',
             '$file_namedoc','$file_nameimg')";
	$result = mysqli_query($con, $sql) or die ("Error in query: $sql " . mysqli_error());
  

//ปิดการเชื่อมต่อ database
mysqli_close($con);

//kill session
unset($_SESSION['job_id']);

if($result){
    echo "<script type='text/javascript' CHARSET='UTF-8'>";
    echo "alert('บันทึกข้อมูลสำเร็จ ! เจ้าหน้าที่จะติดต่อกลับหลังจากได้รับข้อมูล');";
    echo "window.location = 'https://career.dekcom-chamnong.com'; ";
    echo "</script>";
    }
    else{
    echo "<script type='text/javascript' CHARSET='UTF-8'>";
    echo "alert('ไม่สามารถบันทึกข้อมูลได้ กรุณาตรวจสอบข้อมูลอีกครั้ง');";
    echo "</script>";
}

}
?>