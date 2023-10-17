<?php
session_start();
if ($_SESSION['ses_role'] == "พนักงานทำอาหาร"||$_SESSION['ses_role'] == "ผู้จัดการ") {
	include "../../include/header.php";
  include '../../include/conn.php';
  $result=$conn->query("SELECT material_name FROM raw_material ORDER BY material_name");
  $rmaterial=array();
  while ($material=$result->fetch_array()) {
    array_push($rmaterial, $material['material_name']);
  }
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
          <h1 class="white-text">สั่งซื้อรายการวัตถุดิบและอุปกรณ์</h1>
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
  <form action="../controller/manage_raw_material.php" class="form-inline" method="POST">
    <div id='allInputContent'>
      <div class='inputContent'>
        <div class="form-group">
          <label>รายการที่ <span id='No' class="No">1</span> &nbsp;&nbsp; </label>
          <input type='text' class="rmaterial_name" name='rmaterial_name[]' id="rmaterial_name" placeholder="ชื่อรายการ" required>
        </div>
        <div class="form-group">
          <input type='number' class="rmaterial_num" name='rmaterial_num[]' id="rmaterial_num" placeholder="จำนวน" required >
        </div>
        <div class="form-group">
          <input type='text' class="units" name='units[]' id="units" size="10" placeholder="หน่วยเป็น" required>
          <input type='button' class='btnDel btn btn-danger' name='btn' value='ลบ' >
        </div>
      </div>
    </div>
    <p id="check_name" style="color: red;"></p>
    <input type="hidden" name="action" value="buy_obj">
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
  var asSame=false;
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

  var rmaterialList = <?php echo json_encode($rmaterial); ?>; 
  $(document).on('focusin', '.rmaterial_name', function(event) {
    event.preventDefault();
    $(this).autocomplete({
      source: rmaterialList
    });
  });
  var unitslist = [
      "กีโลกรัม",
      "กรัม",
      "ตัว",
      "ลูก",
      "แพ็ก",
      "ขวด",
      "ใบ",
      "ถัง",
      "ถุง",
      "อัน"
      
    ]; 
  $(document).on('focusin', '.units', function(event) {
    event.preventDefault();
    $(this).autocomplete({
      source: unitslist
    });
  });
  
  $(document).on('input', '.rmaterial_name', function(event) {
    event.preventDefault();
    //isSame();
    
  });
  setInterval(
  function isSame(){
    var oldText='';
    var newText='';
    $( ".rmaterial_name" ).each(function( index ) {
      newText=$(this).val();
      if($(this).val()!=''){
        if(oldText== newText){
          asSame=true;
        }else {
          oldText=newText;
          asSame=false;
        } 
      }
       
    });

    if (asSame) {
      $('#btnSave').prop('disabled' , true);
      $('#addrow').prop('disabled' , true);
      $("#check_name").addClass('pis-note note-danger');
      $("#check_name").html('มีรายการที่ซ้ำกัน');
    }else {
      $('#btnSave').prop('disabled' , false);
      $('#addrow').prop('disabled' , false);
      $("#check_name").removeClass('pis-note note-danger');
      $("#check_name").html('');
    }
  } 
  );
});

</script>