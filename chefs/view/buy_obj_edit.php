<?php
session_start();
if ($_SESSION['ses_role'] == "พนักงานทำอาหาร"||$_SESSION['ses_role'] == "ผู้จัดการ") {
	include "../../include/header.php";
  include '../../include/conn.php';
  $id=$_GET['id'];
  $result=$conn->query("SELECT * FROM bill_material WHERE bill_id='$id'");
  $data=$result->fetch_assoc();
?>
<style>
  .list{
  cursor: pointer;
  width: 250px;
  }
  .list>li:hover{
    background-color: gray;
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
          <h1 class="white-text">แก้ไขสั่งซื้อรายการวัตถุดิบและอุปกรณ์</h1>
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
  <h2 class="black-text">แก้ไขรายการ</h2>
  <form action="../controller/manage_raw_material.php" class="form-horizontal" method="POST">
    <div id='allInputContent'>
      <div class='inputContent'>
        <div class="form-group">
          <label>ชื่อรายการ : </label>
          <input type='text' class="rmaterial_name" name='rmaterial_name' id="rmaterial_name" placeholder="ชื่อรายการ" required value="<?php echo $data['material_name']; ?>">
        </div>
        <div class="form-group">
          <label for="rmaterial_num">จำนวน : </label>
          <input type='number' class="rmaterial_num" name='rmaterial_num' id="rmaterial_num" placeholder="จำนวน" required value="<?php echo $data['material_num']; ?>">
        </div>
        <div class="form-group">
          <label for="units">หน่วย : </label>
          <input type='text' class="units" name='units' id="units" size="10" placeholder="หน่วยเป็น" required value="<?php echo $data['units']; ?>">
        </div>
      </div>
    </div>
    <p id="check_name" style="color: red;"></p>
    <input type="hidden" name="action" value="edit_bill">
    <input type="hidden" name="id" value="<?php echo $id ;?>">
    <br>
    <input type='submit' class="btn btn-success" value='บันทึกรายการ' id='btnSave'>
  </form>
</div>
</center>

<?php
include "../../include/footer.php";
} else {
	header("location:../../controller/manage_user.php");
}
?>
<script>

</script>