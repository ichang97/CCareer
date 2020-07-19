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
<div class="container">
<form class="container-fluid" id="frmadduser" name="frmadduser" method="post" action="cmd/add_job">
  <div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">ตำแหน่งงานที่รับสมัคร</label>
    <div class="col-sm-10">
      <input name="txt_jobtitle" class="form-control" id="txt_jobtitle" type="text" required autofocus>
    </div>
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label" for="salutation">ประเภท</label>
    <div class="col-sm-10">
      <select class="form-control" id="txt_category" name="txt_category" type="text">
      <?
            //show category
            $sql_cate = "SELECT * FROM category";
            $qry_cate = mysqli_query($con,$sql_cate);

        ?>
      <option selected disabled>ระบุประเภท</option>
      <?
            while ($show_cate = mysqli_fetch_array($qry_cate)) {
      ?>
      <option value="<? echo $show_cate['id'] ?>"><? echo $show_cate['category_name']  ?></option>
      <?
            }
            ?>
      </select>
    </div> 
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label" for="salutation">สถานที่ปฏิบัติงาน</label>
    <div class="col-sm-10">
      <select class="form-control" id="txt_location" name="txt_location" type="text">
      <?
            //show location
            $sql_locate = "SELECT * FROM location";
            $qry_locate = mysqli_query($con,$sql_locate);

        ?>
      <option selected disabled>ระบุสถานที่ปฏิบัติงาน</option>
      <?
            while ($show_locate = mysqli_fetch_array($qry_locate)) {
      ?>
      <option value="<? echo $show_locate['id'] ?>"><? echo $show_locate['location_name']  ?></option>
      <?
            }
            ?>
      </select>
    </div> 
  </div>
  <div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">รายละเอียดงาน</label>
    <div class="col-sm-10">
        <textarea id="txt_jd" name="txt_jd"></textarea>
    </div>
  </div>
  <div class="form-group row">
    <label for="quantity" class="col-sm-2 col-form-label">จำนวนอัตรา</label>
    <div class="col-sm-10">
      <input name="txt_quantity" class="form-control" id="txt_quantity" type="text" required>
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

