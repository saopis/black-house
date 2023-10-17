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
          <h1 class="white-text">เพิ่มรายการวัตถุดิบในการทำอาหาร</h1>
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
  <h2 class="black-text">คลิกปุม "เพิ่ม" เพือเพิ่มรายการ / "ลบ" เพื่อลบรายการ</h2>
  <form action="../controller/manage_raw_material.php" method="POST">
    <div id='allInputContent'>
      <div class='inputContent' style="margin: 5px;">
        <label>รายการที่ <span id='No' class="No">1</span> </label>
        <label for="obj_name">ชื่อรายการ :</label>
        <input type='text' class="input-line rmaterial_name" name='rmaterial_name[]' id="rmaterial_name" required>&nbsp;
        <input type='button' class='btnDel btn btn-danger' name='btn' value='ลบ' >
        
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

<?php
include "../../include/footer.php";
} else {
	header("location:../../controller/manage_user.php");
}
?>
<script>

$(document).ready(function(){
  var addDiv=$("#allInputContent").html();
  onDinamic();
  $(document).on("click",".btnAdd",function(){
    $("#allInputContent").append(addDiv);
    onDinamic();
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

   $(document).on('input', '.rmaterial_name', function(event) {
     event.preventDefault();
     var name_material = $(this).val();
     $.ajax({
       url: '../controller/manage_raw_material.php',
       type: 'POST',
       data: {action: 'check',name_material:name_material},
     })
     .done(function(data) {
       if(data=='same'){
        $("#check_name").html("ชื่อวัตถุดิบนี้มีอยู่แล้ว");
        $("#check_name").addClass('pis-note note-danger');
        $("#btnSave").prop('disabled', true);
       }else{
        $("#check_name").html('');
        $("#check_name").removeClass('pis-note note-danger');
        $("#btnSave").prop('disabled', false);
       }
     }) 
   });
});
</script>