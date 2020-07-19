<?php
session_start();
if($_SESSION['admin_id']=="")
{
  echo "Access Denied !!";
  exit();
}
 
include 'header.php' ;
include 'main_menu.php';
?>
<br>
<?
//show my detail
$sql = "SELECT * FROM admin WHERE admin_id ='".$_SESSION['admin_id']."'";
$query = mysqli_query($con,$sql);
$result = mysqli_fetch_array($query);
?>

<div class="container">
<h3>ข้อมูลส่วนตัว</h3>
<table class="table">
<tbody>
    <tr>
      <th scope="row">ID</th>
      <td><? echo $result['admin_id'] ?></td>
    </tr>
    <tr>
      <th scope="row">ชื่อ-สกุล</th>
      <td><? echo $result['salutation'] ?><? echo $result['firstname'] ?> <? echo $result['lastname'] ?></td>
    </tr>
    <tr>
      <th scope="row">ชื่อผู้ใช้งาน</th>
      <td><? echo $result['username'] ?></td>
    </tr>
    <tr>
      <th scope="row">สิทธิ์การใช้งาน</th>
      <td>
      <?php if ($result["permission"] == 1): ?>
      <i class="fas fa-check" style="color:#11AC15"></i> ผู้ดูแลระบบ
        <?php else: ?>
            <i class="fas fa-minus" style="color:#AC1311"></i> ผู้ใช้งานทั่วไป
        <?php endif ?>
    </td>
    </tr>
</table><br>
<a class="btn btn-warning" href="edit_myuser?edit_id=<? echo $result["admin_id"]; ?>"><i class="fas fa-edit"></i> แก้ไขข้อมูล</a>

	
</div>


<?php include 'footer.php' ; ?>

