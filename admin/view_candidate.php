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

if ($_REQUEST['job'] != "")
{
    $jobid = $_REQUEST['job'];
    $sql_show = "select * from candidates where job_id = '$jobid' ORDER BY timestamp ASC";
    $result_show = mysqli_query($con,$sql_show) or die(mysqli_error());

    $row_count = mysqli_num_rows($result_show) ;

    $sql_show_name = "select title from jobs where job_id = '$jobid'";
    $result_show_name = mysqli_query($con,$sql_show_name) or die(mysqli_error());
    $row_show_name = mysqli_fetch_array($result_show_name);


}

date_default_timezone_set('Asia/Bangkok');

function datethai($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
    return "$strDay $strMonthThai $strYear $strHour:$strMinute น.";
  }
?>
<div class="jumbotron jumbotron-fluid text-center" style="background-color: #360587">
  <div class="container">
    <h1 style="color: #ffffff"><? echo $row_show_name['title'] ?></h1><br>
    <a class="btn btn-primary" href="view_job"><i class="fas fa-arrow-left"></i> กลับ</a>
  </div>
</div>

<?php if ($row_count ==0) : ?>
<div class="container">
<div class="alert alert-danger text-center" role="alert">
  ไม่พบข้อมูล
</div>
</div>
<?php else: ?>
<div class="container">
<? while ($row_show = mysqli_fetch_array($result_show)) { ?>
<div class="card border-danger mb-3">
  <div class="card-header"><? echo $row_show['salutation'] ?><? echo $row_show['firstname'] ?> <? echo $row_show['lastname'] ?>  
  || <i class="far fa-clock"></i> <? echo datethai($row_show['timestamp']) ?></div>
  <div class="card-body">
    <p class="card-text">
    <style>
      .avatar{
        width : 100px;
        display : block;
        margin-left: auto;
        margin-right: auto;
      }
    </style>
    <img class="avatar" src="../uploads/profile/<?php echo $row_show['img_path'] ?>"><br>
    <center>
    วุฒิการศึกษาที่จบ : <? echo $row_show['graduated_cert'] ?><br>
    ใบประกอบวิชาชีพครู : <?php if ($row_show["teach_cert_chk"] == 1): ?><i class="fas fa-check" style="color:#11AC15"></i> มีใบประกอบวิชาชีพครู<?php else: ?>
            <i class="fas fa-times" style="color:#AC1311"></i> ไม่มีใบประกอบวิชาชีพครู<?php endif ?></center><br><br>
    <hr>
    แนะนำตัว : <br>
    <? echo $row_show['bio'] ?><br><br>
    <hr>
    เบอร์โทรศัพท์ : <? echo $row_show['tel'] ?><br>
    อีเมล : <? echo $row_show['email'] ?><br><br>
    <a class="btn btn-primary" href="../uploads/doc/<?php echo $row_show['resume_path'] ?>"><i class="fas fa-download"></i> ดาวน์โหลดเรซูเม่</a>
    </p>
  </div>
</div><br>
<?
}
?>
</div>
<?php endif ?>

<? include 'footer.php' ?>
