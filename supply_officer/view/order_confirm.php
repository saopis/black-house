<?php
session_start();
if ($_SESSION['ses_role'] == "พนักงานซื้อวัตถุดิบ"||$_SESSION['ses_role'] == "ผู้จัดการ") {
	include "../../include/header.php";
  include "../../include/conn.php";
  $result=$conn->query("SELECT * FROM bill_material WHERE bill_status = 'not buy' ORDER BY material_name ") or die("ไม่สำเร็จ".$conn->error);
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
          <h1 class="white-text">ยืนยันรายการการสั่งซื้อวัตถุดิบ</h1>
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
<form action="../controller/confirm_bill.php" method="POST" enctype="multipart/form-data">
<div class="data" style="margin: 40px;">
  <h3 class="black-text">รายการสั่งซื้อทั้งหมด</h3>
  
  <?php 
    if ($result->num_rows<1) {
      echo 'ไม่มีรายการ';
    }
    while ($bill=$result->fetch_array()) {
  ?>
  <div class="row text-left m-10">
    <div class="col-md-offset-3 col-md-2 "><?php echo "รายการที่ <span class='no'></span> : ".$bill['material_name']; ?></div>
    <div class="col-md-2 ">
      <label for="">จำนวน : </label>
      <input type="number" name="num[]" value="<?php echo $bill['material_num']; ?>" style="width: 80px;" required><?php echo " ".$bill['units']; ?>
      <input type="hidden" name="id[]" value="<?php echo $bill['bill_id']; ?>" style="width: 80px;">
      </div>
    <div class="col-md-2 ">
      <label for="">ราคา : </label>
      <input type="number" name="price[]" style="width: 80px;" required> บาท
    </div>
    <div class="col-md-1 ">
      <button type="button" class="btn btn-danger no_obj">ไม่มี</button>
    </div>
  </div>
  <?php
    } 
  ?>
<center>
  <div class="bill-img bg-theme" style="border-width: 3px; border-style: dashed; text-align: center; border-radius: 0px; width: 90%; height: 150px; display: table; ">
    <span style="display: table-cell; vertical-align: middle;"><br>
      <p>อัปโหลดรูปภาพใบเสร็จ</p>
      <label for="bill_img">
        <input type="file" name="bill_img" id="bill_img" style="display: none;" accept="image/*" required>
        <div class="btn btn-outline btn-theme" style="font-size: 16px;"><i class="fa fa-cloud-upload" style="font-size: 30px;"></i> อัปโหลด</div>
        <br>
        <img src="" alt="" id="exsample_bill" style="width: 90%; margin:20px;">
      </label>

    </span>
  </div><br>
  <input type="submit" class="btn btn-info" value="บันทึก">
</center>
  
</div>
</form>
</center>

<?php
include "../../include/footer.php";
} else {
	header("location:../../controller/manage_user.php");
}
?>
<script>

$(document).ready(function(){
  onDinamic();
  $("#bill_img").on("change",function(e){
    var output = document.getElementById('exsample_bill');
    output.src = URL.createObjectURL(event.target.files[0]);
  });
  $(".no_obj").click(function(event) {
    $(this).closest('.row').remove();
    onDinamic();
  });
  function onDinamic(){
    $( ".no" ).each(function( index ) {
      $(this).html((index+1));
    });
  } 
});

document.addEventListener("DOMContentLoaded", function() {
    var elements = $("INPUT[type='file']");
    for (var i = 0; i < elements.length; i++) {
        elements[i].oninvalid = function(e) {
            e.target.setCustomValidity("");
            if (!e.target.validity.valid) {
                e.target.setCustomValidity("กรุณารูปภาพด้วยครับ");
                alert("กรุณารูปภาพด้วยครับ");
            }
        };
        elements[i].oninput = function(e) {
            e.target.setCustomValidity("");
        };
    }
  })
</script>