<?php
session_start();
if ($_SESSION['ses_role'] == "พนักงานทำอาหาร") {
	include "../../include/header.php";
  require "../../include/conn.php";
	?>
<!-- Background Image -->
<div class="bg-img" style="background-color: #FCFCFF;//background-image: url('../../image/gallery/1.jpg'); ">
  <div class="overlay"></div>
</div>
<!-- /Background Image -->
<!-- home wrapper -->
<div class="myheader-wrapper">
  <div class="container">
    <!--div class="row">

      <!-- home content -->
      <!--div class="col-md-10 col-md-offset-1">
        <div class="myheader-content">
          <h1 class="white-text">ออเดอร์ที่เราเลือกทำ</h1>
        </div>
      </div>
      <!-- /home content -->

    <!/div>
  </div>
</div>
<!-- /home wrapper -->

</header>
<!-- recommented -->
<?php 
  $user_id=$_SESSION['ses_id'];
  $result=$conn->query("SELECT * FROM `order` WHERE order_status='doing' AND user_id='$user_id' ORDER BY order_datetime"); 
?>
<!-- /Header -->
<div class="section sm-padding bg-grey">

    <!-- Container -->
    <div class="container">

      <!-- Row -->
      <div class="row">

        <!-- Section header -->
        <div class="section-header text-center">
          <h2 class="title">ออเดอร์ลูกค้า</h2>
        </div>
        <!-- /Section header -->
        <?php 
          if ($result->num_rows <=0) {
            echo "<center><h3>ไม่มีออเดอร์.</h3></center>";
          }else {

          while ($data = $result->fetch_assoc()) {
          
        ?>
        <!-- blog -->
        <div class="col-md-4">
          <div class="blog" style="border: 3px solid gray;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.29);">
            <div class="blog-img">
              <img class="img-order" src="../../image/menu/<?php echo $data['order_img'] ; ?>" alt="">
            </div>
            <div class="blog-content">
              <center><h3>=| <?php echo $data['order_name']; ?> |=</h3></center>
              <div class="row">
                <div class="col-md-6">
                  <h4 ><i class="fa">โต๊ะที่ : </i><i class="fa" style="color: #868F9B;">&nbsp;<?php echo $data['order_table_no']; ?></i> </h4>
                </div>
                <div class="col-md-6">
                  <h4><i class="fa">จำนวน : </i><i class="fa" style="color: #868F9B;">&nbsp;<?php echo $data['order_quantity']; ?></i></h4>
                </div>
                <div class="col-md-6">
                  <h4><i class="fa">ไข่ดาว : </i><i class="fa" style="color: #868F9B;">&nbsp;<?php echo $data['order_fried_egg']; ?></i></h4>
                </div>
                <div class="col-md-6">
                  <h4><i class="fa">ไข่เจียว : </i><i class="fa" style="color: #868F9B;">&nbsp;<?php echo $data['order_omelet']; ?></i></h4>
                </div>
              </div> 
              <h4>หมายเหตุ</h4>
              <p><?php 
                if ($data['order_note']=='') {
                  echo 'ไม่มี.';
                }else {
                  echo $data['order_note'];
                } 
              ?></p>
              <center><a href="../controller/manage_order.php?id=<?php echo $data['order_id']; ?>&action=done"><button class="btn btn-outline info">เสร็จพร้อมส่ง</button></a></center>
            </div>
          </div>
        </div>
        <!-- /blog -->
        <?php } } ?>
      </div>
      <!-- /Row -->

    </div>
    <!-- /Container -->
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
  </div>
  <!-- /recommented --> 
<?php
include "../../include/footer.php";
} else {
	header("location:../../controller/manage_user.php");
}
?>