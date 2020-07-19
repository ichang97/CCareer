<?php
session_start();
include '../connect.php';
header("content-type:text/html;charset=utf-8");

$sql = "SELECT * FROM admin WHERE username =
'".mysqli_real_escape_string($con,$_POST['txtusername'])."'
and password = '".md5(md5(md5(mysqli_real_escape_string($con,$_POST['txtpass']))))."'";

$query = mysqli_query($con,$sql);
$result = mysqli_fetch_array($query);

if ($result)
{
    $_SESSION["admin_id"] = $result["admin_id"];
    $_SESSION["permission"] = $result["permission"];

    session_write_close();

    if($result["permission"]==1)
    {
        header("location:../dashboard");
    }

}
else
{
        echo "<script type='text/javascript' CHARSET='UTF-8'>";
        echo "alert('ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง');";
        echo "window.location.replace('https://career.dekcom-chamnong.com/admin');";
        echo "</script>";
}
mysqli_close($con);

?>