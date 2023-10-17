<?php

session_start();

if ($_SESSION['ses_role'] == "ผู้จัดการ"||$_SESSION['ses_role_second'] != "") {
	include "../../include/header.php";
	$user_id = $_GET['id'];
  include "../../include/conn.php";
  $sql="SELECT * FROM user WHERE user_id='$user_id'";
  $data=$conn->query($sql)->fetch_array();
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
              <h2 class="white-text">โปรไฟล์ของ <span style="font-size: 60px;"><?php echo 'นาย'.$data['user_fullname']; ?></span></h2>
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
    <div id="data" class=" data">
      <?php echo $user_id; ?>
    </div>
  </center>
	

<?php
include "../../include/footer.php";
} else {
	header("location:../../controller/manage_user.php");
}
?>