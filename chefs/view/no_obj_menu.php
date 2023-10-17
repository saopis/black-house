<?php
session_start();
if ($_SESSION['ses_role'] == "พนักงานทำอาหาร"||$_SESSION['ses_role'] == "ผู้จัดการ") {
  include "../../include/header.php";
  include "../../include/conn.php";
  ?>
<link rel="stylesheet" type="text/css" href="../../assets/css/menu.css">
<style>
  .menu-no-obj-filter{
    z-index: 2;
    position: absolute;
    top: 0;
    right: 0;
    width: 100%;
    height: 100%;
    margin: 0px;
    background-color: rgba(0,0,0,0.5);
    color: white;
    font-size: 50px;
    text-align: center;
    padding-top: 100px;
  }
</style>
<link type="text/css" rel="stylesheet" href="../../assets/css/add_search.css" />
<!-- touch-to-search -->
  <div id="touch-to-search">
    <input type="text" id="search">
    <button type="button" class="btn-search" style="">
      <i class="fa fa-search"></i>
    </button>
  </div>
<!-- /touch-to-search -->
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
          <h1 class="white-text">รายการอาหารวัตถุดิบหมด</h1>
        </div>
      </div>
      <!-- /home content -->

    </div>
  </div>
</div>
<!-- /home wrapper -->

</header>
<!-- /Header -->
  
    <hr>
    <div class="data md-padding">
      <?php 
        $type;
        $result=$conn->query('SELECT * FROM menu WHERE menu_no_obj = 1 ORDER BY menu_type;');
        $i=1;

        while ($data=$result->fetch_array()) {
          if ($data['menu_type']!=$type) {
            $type=$data['menu_type'];
            echo '<br style="clear: both;"><br style="clear: both;"><div class="jumbotron text-center show-menu-type" style="clear: both;"><h1>'.$type.'</h1></div>';
          }
      ?>
      <div class="menu shadow-hover" style="">
        <div class="menu-header with-border text-center" >
          <b>=| </b><b id="view-name"><?php echo $data['menu_name']; ?></b><b> |=</b>
          <div class="pull-right"><button class="del-menu"><i class="fa fa-times"></i></button></div>
        </div>
        <div class="box-body menu-body bg-theme" id="menu-body" style="background-image: url('../../image/menu/<?php echo $data['menu_img'] ?>');">
          <div class="menu-filter"></div>
          <div class="menu-no-obj-filter" >วัตถุดิบหมด</div>
          <div style="display: none;">
            <div class="menu_id"><?php echo $data['menu_id']; ?></div>
            <div class="menu_name"><?php echo $data['menu_name']; ?></div>
            <div class="menu_type"><?php echo $data['menu_type']; ?></div>
            <div class="menu_img"><?php echo $data['menu_img']; ?></div>
          </div>
          <div class="menu-price shadow"><i>ราคา <b><span id="view-price"><?php echo $data['menu_price']; ?> </span> บ.</b></i></div>
          <div class="menu-footer  text-center" ><button class="have_obj" style="width: 100%;">วัตถุดิบมีแล้ว</button></div>
        </div>
      </div>
      <?php 
       $i++;
        }
      ?>
    </div>
    <br style="clear: both;">
    <?php 
    if ($i==1) {
      echo '<center><br><h2 class="black-text">== ไม่มี ==</2><br><br><br><br></center>';
    } ?>
    
    <hr>


<?php
include "../../include/footer.php";
} else {
  header("location:../../controller/manage_user.php");
}
?>
<script src="../../assets/js/menu.js" type="text/javascript" charset="utf-8" async defer></script>
<script>
  $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    var keyword = $(this).val().length;
    $(".data .menu").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
    if (keyword > 0) {
      $(".show-menu-type").fadeOut("slow");
    }else {
      $(".show-menu-type").fadeIn("slow");
    }
  });
  
  $(".have_obj").click(function(event) {
    var menu_id = $(this).closest('.menu').find('.menu_id').html();
    alert('ระบบได้แก้ไขสถานะแล้ว')
    $(this).closest('.menu').remove();
    $.ajax({
      url: '../controller/manage_menu.php',
      type: 'POST',
      data: {action: 'have_obj', menu_id , menu_id},
    })
    .done(function() {
      //console.log("success");
    })
  });
</script>