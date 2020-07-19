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
if($_REQUEST['id'] != "")
{
$jobid = $_REQUEST['id'];
$sql_show = "select * from jobs where job_id = '$jobid'";
$result_show = mysqli_query($con,$sql_show) or die(mysqli_error());
$row_show = mysqli_fetch_array($result_show);
}

?>
<meta property="og:url"           content="https://career.dekcom-chamnong.com/view_job?id=<? echo $jobid ?>" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="<? echo $row_show['title'] ?> :: ระบบรับสมัครครู จนว." />

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId            : '397699977373012',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v3.0'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<div class="container">
<h3>รายละเอียดงาน : <? echo $row_show['title'] ?></h3>
<table class="table">
<tbody>
    <tr>
      <th scope="row">สถานที่ทำงาน</th>
      <td>
      <?php if ($row_show["location"] == 1): ?>
      วิทยาลัยอาชีวศึกษาพณิชยการจำนงค์
        <?php elseif ($row_show["location"] == 2): ?>
        วิทยาลัยเทคโนโลยีบริหารธุรกิจจำนงค์
        <?php elseif ($row_show["location"] == 3): ?>
        โรงเรียนจำนงค์วิทยา
        <?php else: ?>
        โรงเรียนจำนงค์พิทยา
        <?php endif ?>
      </td>
    </tr>
    <tr>
      <th scope="row">รายละเอียดงาน</th>
      <td><? echo $row_show['description'] ?></td>
    </tr>
    <tr>
      <th scope="row">จำนวนอัตรา</th>
      <td><? echo $row_show['quantity'] ?></td>
    </tr>
    <tr>
      <th scope="row">สถานะ</th>
      <td>
      <?php if ($row_show["status"] == 1): ?>
      <i class="fas fa-check" style="color:#11AC15"></i> เปิดรับสมัคร
        <?php else: ?>
            <i class="fas fa-times" style="color:#AC1311"></i> ปิดรับสมัคร
        <?php endif ?>
      </td>
    </tr>
</table><br>
<a class="btn btn-warning" href="job_edit?id=<? echo $row_show["job_id"]; ?>"><i class="fas fa-edit"></i> แก้ไขข้อมูล</a>
<!-- Your share button code -->
<div class="fb-share-button" 
    data-href="https://career.dekcom-chamnong.com/view_job?id=<? echo $jobid ?>" 
    data-layout="button_count" 
    data-size="large">
  </div>
	
</div>


<?php include 'footer.php' ; ?>

