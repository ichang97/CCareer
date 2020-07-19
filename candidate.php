<?php
$title = "กรอกใบสมัครครู";

include 'header.php' ;
include 'main_menu.php';
?>
<br>
<div class="container">
<form class="container-fluid" id="candidate" name="candidate" method="post" action="cmd/candidate" enctype="multipart/form-data">
  <div class="form-group row">
    <label class="col-sm-2 col-form-label" for="salutation">คำนำหน้าชื่อ</label>
    <div class="col-sm-10">
      <select class="form-control" id="txt_salutation" name="txt_salutation" type="text" required>
      <option selected disabled>ระบุคำนำหน้าชื่อ</option>
      <option>นาย</option>
      <option>นาง</option>
      <option>นางสาว</option>
      <option>ว่าที่ร้อยตรี</option>
      </select>
    </div> 
  </div>
  <div class="form-group row">
  <label class="col-sm-2 col-form-label">ชื่อ-สกุล</label>
  <div class="col-sm-10">
  <div class="input-group">  
  <div class="input-group-prepend">
      <input type="text" class="form-control" id="txt_firstname" name="txt_firstname" placeholder="ชื่อ" required>
      <input type="text" class="form-control" id="txt_lastname" name="txt_lastname" placeholder="สกุล" required>
    </div>
    </div>
    </div>
    </div>
    <div class="form-group row">
    <label class="col-sm-2 col-form-label" for="salutation">วุฒิที่จบการศึกษา</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="txt_gradcert" name="txt_gradcert" required>
    </div> 
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label" for="salutation">มีใบประกอบวิชาชีพหรือไม่</label>
    <div class="col-sm-10">
      <select class="form-control" id="txt_teachcert" name="txt_teachcert" type="text" required>
      <option selected disabled>โปรดระบุ</option>
      <option value="1">มี</option>
      <option value="0">ไม่มี</option>
      </select>
    </div> 
  </div>
  <div class="form-group row">
    <label class="col-sm-2 col-form-label" for="salutation">แนะนำเกี่ยวกับตัวคุณมาอย่างคร่าว ๆ</label>
    <div class="col-sm-10">
    <textarea id="txt_bio" name="txt_bio"></textarea>
    </div> 
  </div>
  <div class="form-group row">
  <label class="col-sm-2 col-form-label">อัพโหลดเรซูเม่ (จำเป็น) .pdf .doc .docx เท่านั้น</label>
    <div class="col-sm-10">
        <input type="file" name="fileresume" id="fileresume" required>
    </div>
  </div><div class="form-group row">
  <label class="col-sm-2 col-form-label">อัพโหลดภาพผู้สมัคร .jpg .jpeg .png เท่านั้น</label>
    <div class="col-sm-10">
        <input type="file" name="fileimg" id="fileimg" required>
    </div>
  </div>
  <div class="form-group row">
  <label class="col-sm-2 col-form-label">ข้อมูลการติดต่อกลับ</label>
  <div class="col-sm-10">
  <div class="input-group">  
  <div class="input-group-prepend">
      <input type="text" class="form-control" id="txt_tel" name="txt_tel" placeholder="เบอร์โทรศัพท์" required>
      <input type="text" class="form-control" id="txt_email" name="txt_email" placeholder="อีเมล" required>
    </div>
    </div>
    </div>
    </div>
  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" name="submit" id="submit" class="btn btn-success"><i class="fas fa-save"></i> บันทึกข้อมูล</button>
    </div>
  </div>

</form>

</div>
