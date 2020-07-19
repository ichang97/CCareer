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
$sql = "SELECT * FROM location ORDER BY id ASC";
$query = mysqli_query($con,$sql);
?>
<div class="container">
<table class="container-fluid table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">สถานที่ปฏิบัติงาน</th>
      <th scope="col">LOGO</th>
      <th scope="col">แก้ไข</th>
    </tr>
  </thead>
  <tbody>
<?php
while($show_lo = mysqli_fetch_array($query))
{
?>
    <tr>
      <td><?php echo $show_lo["id"]; ?></td>
      <td><?php echo $show_lo["location_name"]; ?></td>
      <td><img src="uploads/logo/<? echo $show_lo["logo"]; ?>" width=80px height=80px></td>
      <td>
      <a class="btn btn-warning" href="edit_location?id=<? echo $show_lo["id"]; ?>"><i class="fas fa-edit"></i></a>
  </td>
    </tr>
<?php
        }
        ?>
  </tbody>
</table>

	
</div>



