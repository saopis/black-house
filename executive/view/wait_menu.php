<?php
session_start();
if ($_SESSION['ses_role'] == "ผู้จัดการ"||$_SESSION['ses_role_second'] != "") {
	include "../../include/header.php";
  include "../../include/conn.php";
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
              <h1 class="white-text"> รายการเมนูอาหารที่รอการอนุมัติ</h1>
            </div>
          </div>
          <!-- /home content -->

        </div>
      </div>
    </div>
    <!-- /home wrapper -->

  </header>
  <!-- /Header -->
  <?php $result_rcm=$conn->query("SELECT * FROM menu WHERE menu_status='new' AND menu_id>2 ORDER BY menu_id"); ?>
  <div id="" class="box-menu section sm-padding bg-grey">

    <!-- Container -->
    <div class="container">

      <!-- Row -->
      <div class="row">

        <!-- Section header -->
        <div class="section-header text-center">
          <h2 class="title"></h2>
        </div>
        <!-- /Section header -->

        <!-- Work -->
        <?php 
          while ($data_rcm=$result_rcm->fetch_assoc()) {
        ?>
        <div class="col-md-4 col-xs-6 menu">
          <img class="img-responsive menu-img" src="../../image/menu/<?php echo $data_rcm['menu_img']; ?>" alt="" >
          <div class="overlay">
            <div class="menu-social">
              <p class="white-text" style="margin: 23px;">NO.<span  class="menu_id" style="display: inline; color: white;"><?php echo $data_rcm['menu_id']; ?></span></p>
              <!a href="#"><!i class="fa fa-google-plus"></i></a>
              <!a href="#"><!i class="fa fa-twitter"></i></a>
            </div>
          </div>
          <div class="menu-content">
            <div style="display: none;">
              <div class="menu_name"><?php echo $data_rcm['menu_name']; ?></div>
              <div class="menu_type"><?php echo $data_rcm['menu_type']; ?></div>
              <div class="menu_img"><?php echo $data_rcm['menu_img']; ?></div>
            </div>
            <h3 class="">=| <?php echo $data_rcm['menu_name']; ?> |=</h3>
            <span ><p style="font-size: 45px;" class="white-text"><?php echo $data_rcm['menu_price']; ?> ฿</p></span>
            <div class="menu-link"> 
              <a href="add_menu.php?menu_id=<?php echo $data_rcm['menu_id']; ?>"><i class="fa fa-edit"></i></a>
              <a class="lightbox" href="../../image/menu/<?php echo $data_rcm['menu_img']; ?>"><i class="fa fa-search"></i></a>
              <span style="display: inline;" class="btn-allow">
                <?php 
                if ($data_rcm['menu_status']=='new') {
                  echo '<a href="#" class="allow-menu"><i class="fa fa-toggle-off"></i></a>';
                }else {
                  echo '<a href="#" class="dont-allow-menu"><i class="fa fa-toggle-on"></i></a>';
                } ?>
                
              </span>
              <a href="#" style="background-color: red;" class="del-menu"><i class="fa fa-trash " ></i></a>
            </div>
          </div>
        </div>
        <?php 
          }
        ?>
        <!-- /Work -->

      </div>
      <!-- /Row -->

    </div>
    <!-- /Container -->

  </div>
  <!-- /recommented -->


<?php
include "../../include/footer.php";
} else {
	header("location:../../chefs/controller/manage_user.php");
}
?>
<script src="../../assets/js/menu.js"></script>
<script>

  $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $(".data .menu").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
  ////delete menu //////
  $(document).on('click', '.del-menu', function(event) {
    event.preventDefault();
    var menu_id = $(this).closest('.menu').find('.menu_id').html();
    var menu_img = $(this).closest('.menu').find('.menu_img').html();
    var issure= confirm("คุณแน่ใจว่าจะลบรายการอาหารนี้หรือไม !!");
    if (issure==true) {
      $(this).closest('.menu').remove();
      $.ajax({
        url: '../controller/manage_menu.php',
        type: 'POST',
        data: {menu_id: menu_id, menu_img:menu_img ,action:'delete'},
      })
      .done(function(data) {
        if(data=='success'){

          alert("ระบบได้ทำการลบเมนูดังกล่าวแล้ว !!");
          
        }
      })
    }
  });

  ////allow menu //////
  $(document).on('click', '.allow-menu', function(event) {
    event.preventDefault();
    var menu_id = $(this).closest('.menu').find('.menu_id').html();
    $(this).closest('.menu').remove();
    $.ajax({
      url: '../controller/manage_menu.php',
      type: 'POST',
      data: {menu_id: menu_id,action:'allow'},
    })
    .done(function(data) {
      if(data=='success'){
        //alert("ระบบได้ทำการอนุมัติเมนูดังกล่าวแล้ว !!");
        
      }
    });
  });
</script>