<?php
session_start();
if ($_SESSION['order']=='') {
  if ($_SESSION['ses_role'] == "พนักงานบริการ") {
  include "../../include/header.php";
  ?>
  <style>
    .dt-tb{
      background-color: white; 
      padding: 50px; 
    }
    @media screen and (max-width: 798px) {
      .dt-tb{
        background-color: rgba(0,0,0,0); 
        padding: 0px; 
      }
    }
  </style>
<!-- Background Iunset($_SESSION["var"]);mage -->
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
          <h2 class="white-text">สวัสดี</h2><h1 class="white-text"> >> <?php echo $_SESSION['ses_fullname']; ?> <<</h1>
              <p class="white-text"> ยินดีต้อนรับเข้าสู้ระบบ วันนี้ขอให้โชคดี </p>
        </div>
      </div>
      <!-- /home content -->

    <!/div>
  </div>
</div>
<!-- /home wrapper -->

</header>
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
                <input type="text" class="form-control" id="table" placeholder="โต๊ะที่ :" autofocus>
                <div class="input-group-btn">
                  <button class="btn btn-default" type="submit" id="search_tb">
                    <i class="glyphicon glyphicon-search"></i>
                  </button>
                </div>
              </div>
            </div>
            
          </center>
          <br>
          <div class="newdata text-left">

          </div>

        </div>
        <!-- /Section header -->
        
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
    <br>
  </div>


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
        url: '../controller/manage_receipt.php',
        type: 'GET',
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