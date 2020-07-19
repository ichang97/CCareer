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
<?php

if($_REQUEST['id'] != "")
{
$edit_id = $_REQUEST['id'];
$sql_show = "select * from location where id = '$edit_id'";
$result_show = mysqli_query($con,$sql_show) or die(mysqli_error());
$row_show = mysqli_fetch_array($result_show);
}

?>
<br>
<div class="container">
<form class="container-fluid" id="edit_lo" name="edit_lo" method="post" action="cmd/edit_location" enctype="multipart/form-data">
<div class="form-group row">
    <div class="col-sm-10">
      <input name="edit_id" class="form-control" id="edit_id" type="hidden" placeholder="ID" value="<?php echo $row_show['id']; ?>">
    </div>
  </div>
  <div class="form-group row">
  <label class="col-sm-2 col-form-label">ชื่อสถานที่ปฏิบัติงาน</label>
    <div class="col-sm-10">
      <input name="edit_loname" class="form-control" id="edit_loname"  value="<?php echo $row_show['location_name']; ?>">
    </div>
  </div>
  <div class="form-group row">
  <label class="col-sm-2 col-form-label">LOGO</label>
    <div class="col-sm-10">
        <input type="file" name="edit_logo" id="edit_logo">
    </div>
  </div>
    <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" name="submit" id="submit" class="btn btn-success"><i class="fas fa-save"></i> บันทึกข้อมูล</button>
    </div>
  </div>

</form>

	
</div>

<? include 'footer.php' ?>


