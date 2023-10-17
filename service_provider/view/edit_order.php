<?php
session_start();
if ($_SESSION['order']=='') {
  if ($_SESSION['ses_role'] == "พนักงานบริการ") {
  include "../../include/header.php";

  ?>
<!-- Background Iunset($_SESSION["var"]);mage -->
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
          <h2 class="white-text">แก้ไขรายการสั่งซื้อ</h2>
        </div>
      </div>
      <!-- /home content -->

    </div>
  </div>
</div>
<!-- /home wrapper -->

</header>
<!-- /Header -->

<!-- recommented -->

<!-- /Header -->
<div class="section sm-padding bg-grey">

    <!-- Container -->
    <div class="container">

      <!-- Row -->
      <div class="row">

        <!-- Section header -->
        <div class="section-header text-center">
          <center>
            <div class="title">
              <div class="input-group col-md-3" style="margin: 10px;">
                <input type="text" class="form-control" id="table" placeholder="โต๊ะที่ :">
                <div class="input-group-btn">
                  <button class="btn btn-default" type="submit" id="search_tb">
                    <i class="glyphicon glyphicon-search"></i>
                  </button>
                </div>
              </div>
            </div>
            <br>
            <div class="col-md-offset-3 col-md-2"><div style="width: 15px;height: 15px; border:3px solid green;"></div>ทำเสร็จแล้ว</div>
            <div class="col-md-2"><div style="width: 15px;height: 15px; border:3px solid yellow;"></div>กำลังทำ</div>
            <div class="col-md-2"><div style="width: 15px;height: 15px; border:3px solid gray;"></div>ยังไม่ได้ทำ</div>
            
          </center>
          <br style="clear: both;">
          <br>
          <div class="newdata text-left" >
            
          </div>

        </div>
        <!-- /Section header -->
        
      </div>
      <!-- /Row -->

    </div>
    <!-- /Container -->
  </div>
  <!-- /recommented --> 

<?php
  include "../../include/footer.php";
  } else {
    header("location:../../controller/manage_user.php");
  }
}else {
  header("location:order.php");
}
?>
<script>
  $(document).ready(function() {
    $("#search_tb").click(function(event) {
      var table=$("#table").val();
      $.ajax({
        url: '../controller/edit_all_order.php',
        type: 'POST',
        //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
        data: {table : table},
      })
      .done(function(data) {
        console.log("success");
        $(".newdata").html(data);
      });
      
    });
  });
</script>