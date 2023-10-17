<?php
session_start();
if ($_SESSION['ses_role'] == "พนักงานทำอาหาร") {
	include "../../include/header.php";
	?>
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
          <h2 class="white-text">สวัสดี</h2><h1 class="white-text"> >> <?php echo $_SESSION['ses_fullname']; ?> <<</h1>
              <p class="white-text"> ยินดีต้อนรับเข้าสู้ระบบ วันนี้ขอให้โชคดี </p>
        </div>
      </div>
      <!-- /home content -->

    </div>
  </div>
</div>
<!-- /home wrapper -->

</header>
<!-- /Header -->

<?php
include "../../include/footer.php";
} else {
	header("location:../../controller/manage_user.php");
}
?>