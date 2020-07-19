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
<?
//show name
$sql_name = "SELECT firstname,lastname FROM admin WHERE admin_id = '".$_SESSION['admin_id']."' ";
$qry_name = mysqli_query($con,$sql_name);
$show_name = mysqli_fetch_array($qry_name);

//show_num_job
$sql_job = "SELECT count(*) as countjob FROM jobs WHERE admin_id = '".$_SESSION['admin_id']."' AND status = 1";
$qry_job = mysqli_query($con,$sql_job);
$show_numjob = mysqli_fetch_array($qry_job);
?>
<div class="container">
<div class="alert alert-success text-center" role="alert">
  <? echo $show_name['firstname'] ?> <? echo $show_name['lastname'] ?> ได้เข้าสู่ระบบแล้ว
</div>
<div class="row">
    <div class="col-sm">
    <div class="card text-white mb-3">
        <? if ($show_numjob['countjob'] == 0): ?>
        <div class="card-body bg-danger">
        <h3 class="card-title  text-center"><i class="far fa-times-circle"></i> ไม่มีตำแหน่งที่เปิดรับสมัคร</h3>
        <? else : ?>
        <div class="card-body bg-success">
        <h3 class="card-title  text-center"><i class="fas fa-list-alt"></i> มีตำแหน่งที่เปิดรับสมัคร <? echo $show_numjob['countjob'] ?> ตำแหน่ง</h3>
        <? endif ?>
        </div>
    </div>
    </div>
    </div>
    <br>


	
</div>
<br>
<? include 'footer.php' ?>

