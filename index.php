<?php
$title = "ระบบรับสมัครครู จนว.";

include 'header.php' ;
include 'main_menu.php';
?>
<br>
<?
//show jobs
$sql = "SELECT * FROM jobs WHERE status = 1 ORDER BY timestamp DESC";
$qry_job = mysqli_query($con,$sql);

$count = mysqli_num_rows($qry_job) ;

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
<div class="container">
<div class="alert alert-warning text-center" role="alert">
<i class="far fa-envelope"></i> ติดต่อผู้ดูแลระบบ : <a href="mailto:chamnongvidhaya@gmail.com">chamnongvidhaya@gmail.com</a>
</div>
    <h2 class="text-center">ตำแหน่งงานว่างล่าสุด</h2><br>
    <?
        $numcol = 3;
        $rowcount = 0;
    ?>
    <?php if ($count ==0) : ?>
    <div class="container">
<div class="alert alert-danger text-center" role="alert">
  ยังไม่มีตำแหน่งว่างในขณะนี้
</div>
</div>
<?php else: ?>
    <div class="row">
    <? while ($show_job = mysqli_fetch_array($qry_job)) { ?>
    <?
        //show location img
        $location_id = $show_job['location'];
        $sql_img = "SELECT logo FROM location WHERE id = '$location_id' ";
        $qry_img = mysqli_query($con,$sql_img);
        $show_img = mysqli_fetch_array($qry_img);
    ?>
    <div class="col-sm text-center">
    <div class="card border-danger">
            <div class="card-body">
            <img class="card-img" src="admin/uploads/logo/<? echo $show_img['logo']?>" style="width: 85px;display: block;margin-left: auto;margin-right: auto;">
            <h5 class="card-title"><? echo $show_job['title'] ?> (<? echo $show_job['quantity'] ?> อัตรา)</h5>
            <p class="card-text">
            <?php if ($show_job["location"] == 1): ?>
            <i class="fas fa-map-marker-alt" style="color:#dc3545"></i> วิทยาลัยอาชีวศึกษาพณิชยการจำนงค์
            <?php elseif ($show_job["location"] == 2): ?>
            <i class="fas fa-map-marker-alt"  style="color:#dc3545"></i> วิทยาลัยเทคโนโลยีบริหารธุรกิจจำนงค์
            <?php elseif ($show_job["location"] == 3): ?>
            <i class="fas fa-map-marker-alt"  style="color:#dc3545"></i> โรงเรียนจำนงค์วิทยา
            <?php else: ?>
            <i class="fas fa-map-marker-alt"  style="color:#dc3545"></i> โรงเรียนจำนงค์พิทยา
            <?php endif ?>
            </p>
            <p>
            <i class="fas fa-bullhorn" style="color:#007bff"></i> ลงประกาศเมื่อ <? echo datethai($show_job['timestamp']); ?>
            </p>
            <a href="view_job?id=<? echo $show_job['job_id'] ?>" class="btn btn-primary">ดูรายละเอียด</a>
            </div>
    </div>
    </div>
    <?
        $rowcount++;
        if($rowcount % $numcol == 0) echo '</div><br><div class="row">';
        }
    ?>
  </div>
</div>
<?php endif ?>
<br>

<?php include 'footer.php' ; ?>

