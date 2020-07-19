<?php 
session_start();
if($_SESSION['admin_id']=="")
{
  echo "Access Denied !!";
  exit();
}

include 'header.php' ;
include 'main_menu.php';
include 'connect.php';
?>
<br>
<?php
//แสดงแอดมิน
$sql = "SELECT * FROM admin ORDER BY admin_id ASC";
$query = mysqli_query($con,$sql);

?>
<div class="container">
<div class="container-fluid">
        <a class="btn btn-danger" href="add_user"><i class="fas fa-plus"></i> เพิ่มผู้ใช้งาน</a>
    </div><br>
<table class="container-fluid table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">ชื่อ-สกุล</th>
      <th scope="col">ชื่อผู้ใช้งาน</th>
      <th scope="col">สิทธิ์การใช้งาน</th>
      <th scope="col">แก้ไข/ลบ</th>
    </tr>
  </thead>
  <tbody>
<?php
while($show_admin = mysqli_fetch_array($query))
{
?>
    <tr>
      <td><?php echo $show_admin["admin_id"]; ?></td>
      <td><?php echo $show_admin["firstname"]; ?> <?php echo $show_admin["lastname"]; ?></td>
      <td><?php echo $show_admin["username"]; ?></td>
      <td><?php if ($show_admin["permission"] == 1): ?>
      <i class="fas fa-check" style="color:#11AC15"></i> ผู้ดูแลระบบ
  <?php endif ?></td>
      <td>
      <a class="btn btn-warning" href="edit_user?edit_id=<? echo $show_admin["admin_id"]; ?>"><i class="fas fa-edit"></i></a>
      <a class="btn btn-danger" href="JavaScript:if(confirm('คุณต้องการลบหรือไม่ ?') == true){window.location='cmd/delete_user?id=<?php echo $show_admin["admin_id"]; ?>';}"><i class="fas fa-trash-alt"></i></a>
  </td>
    </tr>
<?php
        }
        ?>
  </tbody>
</table>

	
</div>



