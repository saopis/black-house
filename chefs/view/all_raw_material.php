<?php
session_start();
if ($_SESSION['ses_role'] == "พนักงานทำอาหาร"||$_SESSION['ses_role'] == "ผู้จัดการ") {
	include "../../include/header.php";
?>
<style>
  .materialList{
    padding: 5px;
    margin: 5px;
    margin-left:10px;
    margin-right:10px;
    position: relative;
  }
  .Del{
    position: absolute;
    right: 5px;
    top: -3px;
    border-width: 0px;
    font-size: 25px;
    background-color: rgba(0,0,0,0);
  }
  .Del:hover{
    color: black;
  }
</style>
<!-- Background Image -->
<div class="bg-img" style="background-image: url('../../image/gallery/1.jpg');">
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
          <h1 class="white-text">อุปกรณ์และวัตถุดิบทั้งหมด</h1>
        </div>
      </div>
      <!-- /home content -->

    </div>
  </div>
</div>
<!-- /home wrapper -->

</header>
<!-- /Header -->
  
<div id="data" class="data" style="margin: 30px;">
  <center>
      <div id="div_search" class="input-group search" >
        <input type="text" class="form-control" id="search" name="cheque" placeholder="ค้นหา : ">
        <div class="input-group-btn">
          <button id="btn-search" class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
        </div>
      </div><br>
    </center>
    <?php include '../../include/conn.php';
      $result=$conn->query("SELECT * FROM raw_material");
      echo '<div class="row">';
      while ($data=$result->fetch_array()) {
          echo '<div class="col-md-2 text-center materialList bg-theme" ><span class="mr_name">'.$data['material_name'].'</span><button class="Del">&times</button></div>';
      }
      echo '</div>';
    ?>
</div> 



<?php
include "../../include/footer.php";
} else {
	header("location:../../controller/manage_user.php");
}
?>
<script>
$(document).ready(function() {
  $('.Del').click(function(event) {
    var material_name = $(this).closest('.materialList').find('.mr_name').html();
    var c = confirm("คุณแน่ใจที่จะลบ"+material_name+" !!");
    if (c) {
      $(this).closest('.materialList').remove();
      $.ajax({
         url: '../controller/manage_raw_material.php',
         type: 'POST',
         data: {action: 'del',material_name : material_name},
       })
       .done(function(data) {
        console.log(data);
       })
    }
  });

  $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    var keyword = $(this).val().length;
    $(".data .materialList").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
  });

});

</script>