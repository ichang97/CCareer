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
$sql = "SELECT * FROM jobs WHERE admin_id = '".$_SESSION['admin_id']."' ORDER BY job_id ASC";
$query = mysqli_query($con,$sql);


date_default_timezone_set('Asia/Bangkok');

function DateThai($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear, $strHour:$strMinute น.";
  }
  
?>
<div class="container">
<table class="container-fluid table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">ตำแหน่ง</th>
      <th scope="col">สถานที่ปฏิบัติงาน</th>
      <th scope="col">วันที่ลงประกาศ</th>
      <th scope="col">สถานะ</th>
      <th scope="col">ดูประกาศ</th>
      <th scope="col">ผู้สมัคร</th>
    </tr>
  </thead>
  <tbody>
<?php
while($show_job = mysqli_fetch_array($query))
{
?>
    <tr>
      <td><?php echo $show_job["job_id"]; ?></td>
      <td><?php echo $show_job["title"]; ?></td>
      <td>
      <?php if ($show_job["location"] == 1): ?>
      วิทยาลัยอาชีวศึกษาพณิชยการจำนงค์
        <?php elseif ($show_job["location"] == 2): ?>
        วิทยาลัยเทคโนโลยีบริหารธุรกิจจำนงค์
        <?php elseif ($show_job["location"] == 3): ?>
        โรงเรียนจำนงค์วิทยา
        <?php else: ?>
        โรงเรียนจำนงค์พิทยา
        <?php endif ?>
      </td>
      <td><?php echo DateThai($show_job["timestamp"]) ?></td>
      <td>
      <?php if ($show_job["status"] == 1): ?>
      <i class="fas fa-check" style="color:#11AC15"></i> เปิดรับสมัคร
        <?php else: ?>
            <i class="fas fa-times" style="color:#AC1311"></i> ปิดรับสมัคร
        <?php endif ?>
    </td>
      </td>
      <td>
      <a class="btn btn-primary" href="view_jd?id=<? echo $show_job["job_id"]; ?>"><i class="fas fa-eye"></i></a>
  </td>
  <td>
      <a class="btn btn-success" href="view_candidate?job=<? echo $show_job["job_id"]; ?>"><i class="fas fa-users"></i></a>
  </td>
    </tr>
<?php
        }
        ?>
  </tbody>
</table>

	
</div>



