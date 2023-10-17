<?php
session_start();
if ($_SESSION['ses_role'] == "พนักงานทำอาหาร"||$_SESSION['ses_role'] == "ผู้จัดการ") {
	include "../../include/header.php";
?>
<link rel="stylesheet" href="../../assets/css/exsample-menu.css">
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
          <h1 class="white-text">เสนอรายการอาหาร</h1>
        </div>
      </div>
      <!-- /home content -->

    </div>
  </div>
</div>
<!-- /home wrapper -->

</header>
<!-- /Header -->

    <div id="data" class="" style="margin-top: 30px;">
      <form class="form-horizontal" method="POST" action="../controller/manage_menu.php" enctype="multipart/form-data">
      <div class="box-left">
        <center>
          <h3>เพิ่มเมนูอาหารใหม่</h3>
        </center>
        <hr width="90%">
        <div class="form-group" id="div_mname">
          <label class="control-label col-sm-4" for="mname">ชื่อ :</label>
          <div class="col-sm-6"> 
            <input type="text" class="form-control" id="mname" name="mname" placeholder="ชื่ออาหาร" required>
            <p id="status_mname" style="color: red;"></p>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-4" for="mprice">ราคา :</label>
          <div class="col-sm-6"> 
            <input type="text" class="form-control" id="mprice" name="mprice" placeholder="ราคาอาหาร" required>
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-4" for="mtype">ประเภท :</label>
          <div class="col-sm-6"> 
            <select id="mtype" name="mtype" class="form-control select2" data-minimum-results-for-search="Infinity" style="width: 100%;" required>
              <option value="" disabled selected>เลือกประเภคอาหาร...</option>
              <option value="ข้าวจานเดียว">ข้าวจานเดียว</option>
              <option value="เมนูกับข้าว">เมนูกับข้าว</option>
              <option value="อาหารว่าง">อาหารว่าง</option>
              <option value="ขนมหวาน">ขนมหวาน</option>
              <option value="เครี่องดืม">เครี่องดืม</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-6 col-sm-offset-4"> 
            <div class="menu-img bg-theme" style="border-width: 3px; border-style: dashed; text-align: center; border-radius: 0px; width: 100%; height: 150px; display: table; ">
              <span style="display: table-cell; vertical-align: middle;">
                <p>อัปโหลดรูปภาพ</p>
                <label for="menu-img">
                  <input type="file" name="mimg" id="menu-img" style="display: none;" accept="image/*" required>
                  <div class="btn btn-outline btn-theme" style="font-size: 16px;"><i class="fa fa-cloud-upload" style="font-size: 30px;"></i> เลือกรูปภาพ</div>
                </label>
              </span>
              
            </div>
          </div>
        </div>
        
      </div>   
      <div class="box-right">
        <center><h1>ตัวอย่างเมนู</h1></center>
        <div class="box-shadow menu" style="">
          <div class="menu-header with-border text-center" ><b>=| </b><b id="view-name">ชื่ออาหาร</b><b> |=</b></div>
          <div class="box-body menu-body bg-theme" id="menu-body" style="">
            
            <div class="menu-filter" style="background-color: rgba(0,0,0,0.0);"></div>
            <div class="menu-price shadow" style="display: block;"><i>ราคา <b><span id="view-price">_ </span> บ.</b></i></div>
            <div class="menu-footer shadow text-center" style="display: block;">ดูรายละเอียดเพิ่มเติม</div>
          </div>
        </div>
      </div>    
    </div>
    <br style="clear: both;"><br>
    <center><button type="submit" id="save_menu" class="btn btn-outline primary">บันทึก</button></center>
  </div> 
<br>
  </form>


<?php
include "../../include/footer.php";
} else {
	header("location:../../controller/manage_user.php");
}
?>
<script>
  $("#menu-img").on("change",function(e){
    $('#menu-body').css('background-image', 'url('+URL.createObjectURL(event.target.files[0])+')');
    $('#menu-body').css('background-size', '100% 100%');
  });

  $(document).on('input', '#mname', function(event) {
    var name='ชื่ออาหาร';
    if ($('#mname').val()=='') {
      name='ชื่ออาหาร';
    }else {
      name=$('#mname').val();
      $.ajax({
        url: '../controller/manage_menu.php',
        type: 'POST',
        data: {action: 'check_mname',mname:name},
      })
      .done(function(data) {
        if (data=='1') {
          $("#div_mname").addClass('has-error');
          $("#status_mname").addClass('pis-note note-danger');
          $("#status_mname").html("* ชื่อเมนูนี้มีอยู่แล้ว");
          $('#save_menu').prop('disabled', true);
        }else {
          $("#div_mname").removeClass('has-error');
          $("#status_mname").removeClass('pis-note note-danger');
          $("#status_mname").html("");
          $('#save_menu').prop('disabled', false);
        }
      })
    }
    $('#view-name').html(name);
  });

  $(document).on('input', '#mprice', function(event) {
    var input= $('#mprice').val();
    var price='_';

    if ($.isNumeric(input)) {
      if (input=='') {
        price='_';
      }else {
        price=input;
      }
      $('#view-price').html(price);
    }else {
      if (input!='') {
        alert('กรุณาป้อนเป็นตัวเลข !! ');
      $('#mprice').val('');
      }else {
        $('#view-price').html(price);
      }
    }

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