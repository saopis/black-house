<?php
session_start();
if ($_SESSION['ses_role'] == "พนักงานซื้อวัตถุดิบ"||$_SESSION['ses_role'] == "ผู้จัดการ") {
	include "../../include/header.php";
  include "../../include/conn.php";
  $result=$conn->query("SELECT * FROM bill_material WHERE bill_status = 'not buy' ORDER BY material_name ") or die("ไม่สำเร็จ".$conn->error);
   $i=1;
?>
<style>
.m-10{
  margin: 10px;
  padding: 5px;
}
@media screen and (max-width: 988px) {
  .m-10{
    border: 1px solid black;
  }
}
</style>

<!-- Background Image -->
<div class="bg-img" style="background-image: url('../../image/gallery/1.jpg'); ">
  <div class="overlay"></div>
</div>
<!-- /Background Image -->
<!-- home wrapper -->
<div class="myheader-wrapper">
  <div class="container">
    <div class="row">

      <!-- home content -->
      <div class="col-md-10 col-md-offset-1">
        <div class="myheader-content">
          <h1 class="white-text">รายการการสั่งซื้อวัตถุดิบและอุปกรณ์ทั้งหมด</h1>
        </div>
      </div>
      <!-- /home content -->

    </div>
  </div>
</div>
<!-- /home wrapper -->

</header>
<!-- /Header -->

<center>
<div class="data" style="margin: 40px;">
  <h3 class="black-text">รายการสั่งซื้อทั้งหมด</h3>
  
  <?php 
    if ($result->num_rows<1) {
      echo 'ไม่มีรายการ';
    }
    while ($bill=$result->fetch_array()) {
  ?>
  <div class="row text-left m-10">
    <div class="col-md-offset-3 col-md-2 "><?php echo "รายการที่ $i : ".$bill['material_name']; ?></div>
    <div class="col-md-2 "><?php echo 'จำนวน : '.$bill['material_num'].'&nbsp;'.$bill['units']; ?></div>
    <div class="col-md-2 "><?php echo 'วันที่สั่งซื้อ : '.date_format(date_create($bill['bill_date']),"d/m/Y"); ?></div>
  </div>
  <?php
    $i++;} 
  ?>
  
</div>
</center>

<?php
include "../../include/footer.php";
} else {
	header("location:../../controller/manage_user.php");
}
?>
<script>

$(document).ready(function(){
  
});

</script>