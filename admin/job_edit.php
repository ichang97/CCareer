<?php 
session_start();
if($_SESSION['admin_id']=="")
{
  echo "Access Denied !!";
  exit();
}

include 'header.php' ;
include 'main_menu.php';

if($_REQUEST['id'] != "")
{
$jobid = $_REQUEST['id'];
$sql_show = "select * from jobs where job_id = '$jobid'";
$result_show = mysqli_query($con,$sql_show) or die(mysqli_error());
$row_show = mysqli_fetch_array($result_show);
}
?>

<br>
<div class="container">
<form class="container-fluid" id="edit_job" name="edit_job" method="post" action="cmd/edit_job">
<div class="form-group row">
    <div class="col-sm-10">
      <input name="edit_id" class="form-control" id="edit_id" type="hidden" placeholder="ID" value="<?php echo $row_show['job_id']; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">ตำแหน่งงานที่รับสมัคร</label>
    <div class="col-sm-10">
      <input name="txt_jobtitle" class="form-control" id="txt_jobtitle" type="text" required autofocus value="<?php echo $row_show['title']; ?>">
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label" for="salutation">ประเภท</label>
    <div class="col-sm-10">
      <select class="form-control" id="txt_category" name="txt_category" type="text">
      <option selected disabled>ระบุประเภท</option>
      <option value="<? echo $row_show['category'] ?>" <?php if($row_show['category']=="1") echo 'selected' ?>>ครู</option>
      </select>
    </div> 
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label" for="salutation">สถานที่ปฏิบัติงาน</label>
    <div class="col-sm-10">
      <select class="form-control" id="txt_location" name="txt_location" type="text">
      <option selected disabled>ระบุสถานที่ปฏิบัติงาน</option>
      <option value="1" <?php if($row_show['location']=="1") echo 'selected' ?>>วิทยาลัยอาชีวศึกษาพณิชยการจำนงค์</option>
      <option value="2" <?php if($row_show['location']=="2") echo 'selected' ?>>วิทยาลัยเทคโนโลยีบริหารธุรกิจจำนงค์</option>
      <option value="3" <?php if($row_show['location']=="3") echo 'selected' ?>>โรงเรียนจำนงค์วิทยา</option>
      <option value="4" <?php if($row_show['location']=="4") echo 'selected' ?>>โรงเรียนจำนงค์พิทยา</option>
      </select>
    </div> 
  </div>
  <div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">รายละเอียดงาน</label>
    <div class="col-sm-10">
        <textarea id="txt_jd" name="txt_jd"><? echo $row_show['description'] ?></textarea>
    </div>
  </div>
  <div class="form-group row">
    <label for="quantity" class="col-sm-2 col-form-label">จำนวนอัตรา</label>
    <div class="col-sm-10">
      <input name="txt_quantity" class="form-control" id="txt_quantity" type="text" value="<? echo $row_show['quantity'] ?>" required>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label" for="salutation">สถานะการรับสมัคร</label>
    <div class="col-sm-10">
      <select class="form-control" id="txt_status" name="txt_status" type="text">
      <option selected disabled>ระบุสถานะ</option>
      <option value="1" <?php if($row_show['status']=="1") echo 'selected' ?>>เปิดรับสมัคร</option>
      <option value="0" <?php if($row_show['status']=="0") echo 'selected' ?>>ปิดรับสมัคร</option>
      </select>
    </div> 
  </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" name="submit" id="submit" class="btn btn-success"><i class="fas fa-save"></i> บันทึกข้อมูล</button>
    </div>
  </div>

</form>

	
</div>


<?php include 'footer.php' ; ?>

