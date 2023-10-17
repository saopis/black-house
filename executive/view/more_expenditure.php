<?php
session_start();
if ($_SESSION['ses_role'] == "ผู้จัดการ"||$_SESSION['ses_role_second'] != "") {
	include "../../include/header.php";
  $today=date("d/m/Y");
?>
<!-- datepicker -->
  <link type="text/css" rel="stylesheet" href="../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" />
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
              <h1 class="white-text">รายจ่ายต่างๆภายในร้าน</h1>
            </div>
          </div>
          <!-- /home content -->

        </div>
      </div>
    </div>
    <!-- /home wrapper -->

  </header>
  <!-- /Header -->
<div class="section sm-padding bg-grey">

    <!-- Container -->
    <div class="container">

      <center>
        <div class="data" style="margin: 40px;">
          <h2 class="black-text">คลิกปุม "เพิ่ม" เพือเพิ่มรายการ / "ลบ" เพื่อลบรายการ</h2>
          <form action="../controller/more_expenditure_ajax.php" method="POST">
            <div id='allInputContent'>
              <div class='inputContent row' style="margin: 5px;">
                <div class="col-md-2" style=" width: 120px; margin: 0px;">
                  <label>รายการที่ <span id='No' class="No">1</span></label>
                </div>
                <div class="col-md-3" style="margin: 0px;">
                  <label for="subject">ชื่อรายการ :</label>
                  <input type='text' class="input-line subject" name='subject[]' id="subject" required style="width: 140px;">
                </div>
                <div class="col-md-3" style="margin: 0px;">
                  <label for="price">จำนวนเงิน :</label>
                  <input type='number' class="input-line price" name='price[]' id="price" required style="width: 100px;">
                </div>
                <div class="col-md-3" style="margin: 0px;">
                  <label for="data_date">วันที่ใช้จ่าย :</label>
                  <input type='text' class="input-line datepicker" name='data_date[]' id="datepicker" value="<?php echo $today; ?>" required style="width: 100px;">
                </div>
                <div class="col-md-1" style="margin: 0px;">
                  <input type='button' class='btnDel btn btn-danger' name='btn' value='ลบ' >
                </div>
                
              </div>
            </div>
            <p id="check_name" style="color: red;"></p>
            <input type="hidden" name="action" value="add_obj">
            <br>
            <input type="button" class="btnAdd btn btn-primary" id="addrow" value="เพิ่มรายการ">
            <input type='submit' class="btn btn-success" value='บันทึกรายการ' id='btnSave'>
          </form>
        </div>
      </center>

    </div>
    <!-- /Container -->
  </div>
  <!-- /recommented --> 
<?php
include "../../include/footer.php";
} else {
	header("location:../../controller/manage_user.php");
}

?>
<!-- jQuery 3 -->
<script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="../../bower_components/bootstrap-datepicker/js/locales/bootstrap-datepicker.th.js"></script>
<script>
$(document).ready(function(){

  var addDiv=$("#allInputContent").html();
  onDinamic();
  $(document).on("click",".btnAdd",function(){
    $("#allInputContent").append(addDiv);
    onDinamic();
    mydate();
    });
  $(document).on("click",".btnDel",function(){
    var numRow=$(".inputContent").length;
    if(numRow>1){$(this).closest(".inputContent").remove();} 
    onDinamic();
    });
  function onDinamic(){
    $( ".No" ).each(function( index ) {
      $(this).html((index+1));
    });
  } 
  mydate();
  function mydate () {
    $(".datepicker").datepicker({
      format: 'dd/mm/yyyy',
      autoclose: true,
      "language":"th",
    });
  }
});

var subject = [
      "ค่าไฟ",
      "ค่าน้ำ",
      "ค่าแรงงาน"
    ]; 
  $(document).on('focusin', '.subject', function(event) {
    event.preventDefault();
    $(this).autocomplete({
      source: subject
    });
  });

  document.addEventListener("DOMContentLoaded", function() {
      var elements = $("INPUT[type=file]");
      for (var i = 0; i < elements.length; i++) {
          elements[i].oninvalid = function(e) {
              e.target.setCustomValidity("");
              if (!e.target.validity.valid) {
                  alert("กรุณาเลือกไฟล์รูปภาพเมนูด้วยครับ");
                  //e.target.setCustomValidity("กรุณาเลือกไฟล์ที่ต้องการอัปโหลดด้วยครับ");
              }
          };
          elements[i].oninput = function(e) {
              e.target.setCustomValidity("");
          };
      }
  })
</script>