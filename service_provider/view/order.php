<?php
session_start();
if ($_SESSION['ses_role'] == "พนักงานบริการ") {
include "../../include/header_menu.php";
include '../../include/conn.php';
  ?>
<style>
  
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
          <h1 class="white-text">ขอให้สนุกกับการสั่งอาหาร</h1>
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
<?php $result_rcm=$conn->query("SELECT * FROM menu WHERE menu_status='activated' AND menu_recommented='1' ORDER BY menu_id"); ?>
<div id="recommented" class="nosearch section md-padding bg-grey">

    <!-- Container -->
    <div class="container">

      <!-- Row -->
      <div class="row">

        <!-- Section header -->
        <div class="section-header text-center">
          <h2 class="title">รายการอาหารแนะนำ</h2>
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
              <!a href="#"><!i class="fa fa-facebook"></i></a>
              <!a href="#"><!i class="fa fa-google-plus"></i></a>
              <!a href="#"><!i class="fa fa-twitter"></i></a>
            </div>
          </div>
          <div class="menu-content">
            
            <h3 class="">=| <span class="val-name"><?php echo $data_rcm['menu_name']; ?></span> |=</h3>
            <span ><p style="font-size: 45px;" class="white-text"><?php echo $data_rcm['menu_price']; ?> ฿</p></span>
            <div style="display: none;" class="munu_type"><?php echo $data_rcm['menu_type']; ?></div>
            <div class="menu-link">
              <a class="add_order"><i class="fa fa-cart-plus"></i></a>
              <a class="lightbox" href="../../image/menu/<?php echo $data_rcm['menu_img']; ?>"><i class="fa fa-search"></i></a>
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

  <!-- Rice_plate -->
  <?php $result_rp=$conn->query("SELECT * FROM menu WHERE menu_status='activated' AND menu_type='ข้าวจานเดียว' ORDER BY menu_id"); ?>
  <div id="Rice_plate" class=" nosearch section md-padding">

    <!-- Background Image -->
    <div class="bg-img" style="background-image: url('../../image/gallery/8.jpg');">
      <div class="overlay"></div>
    </div>
    <!-- /Background Image -->

    <!-- Container -->
    <div class="container">

      <!-- Row -->
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="center home-content">
              <h1 class="white-text">ข้าวจานเดียว</h1>
              <p class="white-text">เป็นอาหารเรียบง่ายแต่เต็มไปด้วยความอร่อย</p>
            </div>
          </div>
      </div>
      <!-- /Row -->

    </div>
    <!-- /Container -->

  </div>
  
  <div class="Rice_plate section sm-padding">

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
          while ($data_rp=$result_rp->fetch_assoc()) {
        ?>
        <div class="col-md-4 col-xs-6 menu">
          <img class="img-responsive menu-img" src="../../image/menu/<?php echo $data_rp['menu_img']; ?>" alt="">
          <div class="overlay">
            <div class="menu-social">
              <p class="white-text" style="margin: 23px;">NO.<span  class="menu_id" style="display: inline; color: white;"><?php echo $data_rp['menu_id']; ?></span></p>
            </div>
          </div>
          <div class="menu-content">
            <h3 class="">=| <span class="val-name"><?php echo $data_rp['menu_name']; ?></span> |=</h3>
            <span ><p style="font-size: 45px;" class="white-text"><?php echo $data_rp['menu_price']; ?> ฿</p></span>
            <div style="display: none;" class="munu_type"><?php echo $data_rp['menu_type']; ?></div>
            <div class="menu-link"> 
              <a class="add_order"><i class="fa fa-cart-plus"></i></a>
              <a class="lightbox" href="../../image/menu/<?php echo $data_rp['menu_img']; ?>"><i class="fa fa-search"></i></a>
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
  <!-- /Rice_plate -->
  
  <!-- side_dish -->
  <?php $result_sd=$conn->query("SELECT * FROM menu WHERE menu_status='activated' AND menu_type='เมนูกับข้าว' ORDER BY menu_id"); ?>
  <div id="side_dish" class=" nosearch section md-padding">

    <!-- Background Image -->
    <div class="bg-img" style="background-image: url('../../image/gallery/8.jpg');">
      <div class="overlay"></div>
    </div>
    <!-- /Background Image -->

    <!-- Container -->
    <div class="container">

      <!-- Row -->
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="center home-content">
              <h1 class="white-text">เมนูกับข้าว</h1>
              <p class="white-text">การที่มีรายการเมนูลากหลายบนโต๊ะ ได้ลองชิมหลายรส บอกเลยว่าฟินเวอร์</p>
            </div>
          </div>
      </div>
      <!-- /Row -->

    </div>
    <!-- /Container -->

  </div>
  
  <div class="side_dish section sm-padding bg-grey">

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
          while ($data_sd=$result_sd->fetch_assoc()) {
        ?>
        <div class="col-md-4 col-xs-6 menu">
          <img class="img-responsive menu-img" src="../../image/menu/<?php echo $data_sd['menu_img']; ?>" alt="">
          <div class="overlay">
            <div class="menu-social">
              <p class="white-text" style="margin: 23px;">NO.<span  class="menu_id" style="display: inline; color: white;"><?php echo $data_sd['menu_id']; ?></span></p>
            </div>
          </div>
          <div class="menu-content">
            <h3 class="">=| <span class="val-name"><?php echo $data_sd['menu_name']; ?></span> |=</h3>
            <span ><p style="font-size: 45px;" class="white-text"><?php echo $data_sd['menu_price']; ?> ฿</p></span>
            <div style="display: none;" class="munu_type"><?php echo $data_sd['menu_type']; ?></div>
            <div class="menu-link"> 
              <a class="add_order"><i class="fa fa-cart-plus"></i></a>
              <a class="lightbox" href="../../image/menu/<?php echo $data_sd['menu_img']; ?>"><i class="fa fa-search"></i></a>
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
  <!-- /side_dish -->

  <!-- snack -->
  <?php $result_snack=$conn->query("SELECT * FROM menu WHERE menu_status='activated' AND menu_type='อาหารว่าง' ORDER BY menu_id"); ?>
  <div id="snack" class=" nosearch section md-padding">

    <!-- Background Image -->
    <div class="bg-img" style="background-image: url('../../image/gallery/8.jpg');">
      <div class="overlay"></div>
    </div>
    <!-- /Background Image -->

    <!-- Container -->
    <div class="container">

      <!-- Row -->
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="center home-content">
              <h1 class="white-text">อาหารว่าง</h1>
              <p class="white-text">หลังกินข้าวอาหารว่างเป็นอีกทางเลือกที่จะทำให้คุณฟินเวอร์</p>
            </div>
          </div>
      </div>
      <!-- /Row -->

    </div>
    <!-- /Container -->

  </div>
  
  <div class="snack section sm-padding">

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
          while ($data_snack=$result_snack->fetch_assoc()) {
        ?>
        <div class="col-md-4 col-xs-6 menu">
          <img class="img-responsive menu-img" src="../../image/menu/<?php echo $data_snack['menu_img']; ?>" alt="" >
          <div class="overlay">
            <div class="menu-social">
              <p class="white-text" style="margin: 23px;">NO.<span  class="menu_id" style="display: inline; color: white;"><?php echo $data_snack['menu_id']; ?></span></p>
            </div>
          </div>
          <div class="menu-content">
            <h3 class="">=| <span class="val-name"><?php echo $data_snack['menu_name']; ?></span> |=</h3>
            <span ><p style="font-size: 45px;" class="white-text"><?php echo $data_snack['menu_price']; ?> ฿</p></span>
            <div style="display: none;" class="munu_type"><?php echo $data_snack['menu_type']; ?></div>
            <div class="menu-link"> 
              <a class="add_order"><i class="fa fa-cart-plus"></i></a>
              <a class="lightbox" href="../../image/menu/<?php echo $data_snack['menu_img']; ?>"><i class="fa fa-search"></i></a>
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
  <!-- /snack -->

  <!-- Dessert -->
  <?php $result_ds=$conn->query("SELECT * FROM menu WHERE menu_status='activated' AND menu_type='ขนมหวาน' ORDER BY menu_id"); ?>
  <div id="Dessert" class=" nosearch section md-padding">

    <!-- Background Image -->
    <div class="bg-img" style="background-image: url('../../image/gallery/8.jpg');">
      <div class="overlay"></div>
    </div>
    <!-- /Background Image -->

    <!-- Container -->
    <div class="container">

      <!-- Row -->
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="center home-content">
              <h1 class="white-text">ขนมหวาน</h1>
              <p class="white-text">หลังกินข้าวตบท้ายด้วยขนมหวานนี้แหละ บอกเลยฟินเวอร์</p>
            </div>
          </div>
      </div>
      <!-- /Row -->

    </div>
    <!-- /Container -->

  </div>
  
  <div class="Dessert section sm-padding bg-grey">

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
          while ($data_ds=$result_ds->fetch_assoc()) {
        ?>
        <div class="col-md-4 col-xs-6 menu">
          <img class="img-responsive menu-img" src="../../image/menu/<?php echo $data_ds['menu_img']; ?>" alt="" >
          <div class="overlay">
            <div class="menu-social">
              <p class="white-text" style="margin: 23px;">NO.<span  class="menu_id" style="display: inline; color: white;"><?php echo $data_ds['menu_id']; ?></span></p>
            </div>
          </div>
          <div class="menu-content">
            <h3 class="">=| <span class="val-name"><?php echo $data_ds['menu_name']; ?></span> |=</h3>
            <span ><p style="font-size: 45px;" class="white-text"><?php echo $data_ds['menu_price']; ?> ฿</p></span>
            <div style="display: none;" class="munu_type"><?php echo $data_ds['menu_type']; ?></div>
            <div class="menu-link"> 
              <a class="add_order"><i class="fa fa-cart-plus"></i></a>
              <a class="lightbox" href="../../image/menu/<?php echo $data_ds['menu_img']; ?>"><i class="fa fa-search"></i></a>
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
  <!-- /Dessert -->
  
    <!-- Drink -->
  <?php $result_drink=$conn->query("SELECT * FROM menu WHERE menu_status='activated' AND menu_type='เครื่องดื่ม' ORDER BY menu_id"); ?>
  <div id="Drink" class=" nosearch section md-padding">

    <!-- Background Image -->
    <div class="bg-img" style="background-image: url('../../image/gallery/8.jpg');">
      <div class="overlay"></div>
    </div>
    <!-- /Background Image -->

    <!-- Container -->
    <div class="container">

      <!-- Row -->
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="center home-content">
              <h1 class="white-text">เครื่องดืม</h1>
              <p class="white-text">เครื่องดืมเป็นสิงที่ขาดไม่ได้ และเรามีหลายรายการให้ท่านเลือก รออะไรจัดไปเลย</p>
            </div>
          </div>
      </div>
      <!-- /Row -->

    </div>
    <!-- /Container -->

  </div>
  <div class="Drink section sm-padding">

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
          while ($data_drink=$result_drink->fetch_assoc()) {
        ?>
        <div class="col-md-4 col-xs-6 menu">
          <img class="img-responsive menu-img" src="../../image/menu/<?php echo $data_drink['menu_img']; ?>" alt="" >
          <div class="overlay">
            <div class="menu-social">
              <p class="white-text" style="margin: 23px;">NO.<span  class="menu_id" style="display: inline; color: white;"><?php echo $data_drink['menu_id']; ?></span></p>
            </div>
          </div>
          <div class="menu-content">
            <h3 class="">=| <span class="val-name"><?php echo $data_drink['menu_name']; ?></span> |=</h3>
            <span ><p style="font-size: 45px;" class="white-text"><?php echo $data_drink['menu_price']; ?> ฿</p></span>
            <div style="display: none;" class="munu_type"><?php echo $data_drink['menu_type']; ?></div>
            <div class="menu-link"> 
              <a class="add_order"><i class="fa fa-cart-plus"></i></a>
              <a class="lightbox" href="../../image/menu/<?php echo $data_drink['menu_img']; ?>"><i class="fa fa-search"></i></a>
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
  <!-- /Drink -->

  <!-- Modal -->
  <div class="modal fade " id="order-modal" role="dialog">
    <div class="modal-dialog modal-md" style="margin-top:100px;">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header bg-theme">
          <button type="button" class="close" data-dismiss="modal" id="times">&times;</button>
          <center><h4 class="modal-title " id="menu-name-madol" style="color: white;"></h4></center>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-7">
              <img src="" id="img-order" class="img-menu-modal" alt="" style="">
            </div>
            <div class="col-md-5" style="padding: 10px;">
              
              <div>
                <label for="quantity">จำนวน : </label>
                &nbsp;<input type="number" id="quantity" autofocus name="quantity" style="width: 30%;">
                <input type="hidden" id="order_id">
              </div>
              <div>
                <label for="fried_egg">ไข่ดาว : </label>
                &nbsp;<input type="number" id="fried_egg" name="fried_egg" style="width: 30%;">
              </div>
              <div>
                <label for="omelet">ไข่เจียว : </label>
                <input type="number" id="omelet" name="omelet" style="width: 30%;">
              </div>
              <div>
                <label for="note">หมายเหตุ : </label>
                <textarea name="note" id="note"  style="width: 100%; height: 100%;"></textarea>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer" >
            <center>
                <button type="button" class="btn btn-outline primary" id="add_cart">ยืนยัน</button>
                <button type="button" class="btn btn-outline danger" data-dismiss="modal">ยกเลิก</button>
            </center>
        </div>
        </form>
      </div>
    </div>
  </div>

  <!-- cart -->
  <div class="cart" style="">
    <p id="cart-num"><?php echo @count($_SESSION['order']); ?></p><i class="fa fa-cart-plus"> </i><hr>
    <p id="cart-quantity">
      <?php $all_quantity=0;
        for ($i = 0; $i < @count($_SESSION["order"]) ; $i++) {
           $all_quantity += $_SESSION["order"][$i]['order_quantity'];
        }
        echo $all_quantity; 
      ?>
    </p><i class="fa fa-eercast"> </i>
  </div>

  <!-- /cart -->
  <div class="result"></div>
<?php
include "../../include/footer.php";
} else {
  header("location:../../controller/manage_user.php");
}
?>
<script>
  $(document).ready(function() {
    $("#search").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      var keyword = $(this).val().length;
      $(".container .menu").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
      });
      
      if (keyword > 0) {
        $(".nosearch").fadeOut("slow");
      }else {
        $(".nosearch").fadeIn("slow");
      }
    });

    $(".home").click(function(event) {
      var confirmed=confirm("คุณแน่น่ะ ที่จะยกเลิกการสังซื้อ");
      if (confirmed) {
        $.ajax({
          url: '../controller/manage_order.php',
          type: 'POST',
          //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
          data: {action:"del-allorder" },
        })
        .done(function() {
          window.location="../../controller/manage_user.php";
        });
        
      }
    });

    $(".add_order").click(function(event) {
      var id = $(this).closest('.menu').find('.menu_id').html();
      var name = $(this).closest('.menu').find('.val-name').html();
      var type = $(this).closest('.menu').find('.munu_type').html();
      $('#order-modal').modal('show');
      $("input").val("");
      $("textarea").val("");
      var src= $(this).closest('.menu').find('img').attr('src');
      $('#img-order').attr('src',src) ;
      $("#order_id").val(id);
      $("#menu-name-madol").html("=| "+name+" |=");
      if (type=='ข้าวจานเดียว') {
        $("#fried_egg").prop({
          disabled: false
        });
        $("#omelet").prop({
          disabled: false
        });
        $("#fried_egg").attr('placeholder','');
        $("#omelet").attr('placeholder','');
      }else {
        $("#fried_egg").prop({
          disabled: true
        });
        $("#omelet").prop({
          disabled: true
        });
        $("#fried_egg").attr('placeholder','-');
        $("#omelet").attr('placeholder','-');
      }
      //alert(src);
      /*var num=$(this).closest('.menu').find('.order_num').val();
      $.ajax({
        url: '../controller/manage_order.php',
        type: 'POST',
        data: {id: id , num: num},
      })
      .done(function(data) {
        console.log('success');
        $(".result").html(data);
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });*/
      
    });

    $("#add_cart").click(function(event) {
      var id = $("#order_id").val();
      var quantity = $("#quantity").val();
      var fried_egg = $("#fried_egg").val();
      var omelet = $("#omelet").val();
      var note = $("#note").val();

      if (quantity=='') {
        alert("กรุณาระบุจำนวนที่ต้องการ");
        $("#quantity").focus();
      }else {
        $('#order-modal').modal('hide');
        //alert("เพิ่มในรายการสังซื้อเรียบร้อย");
        $.ajax({
          url: '../controller/manage_order.php',
          type: 'POST',
          //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
          data: {id:id , quantity:quantity , fried_egg:fried_egg ,omelet:omelet , note:note ,action:"get-order" },
        })
        .done(function(data) {
          console.log("success");
          //$(".result").html(data);
          var myarr = data.split(",");
          $("#cart-num").html(myarr[0]);
          $("#cart-quantity").html(myarr[1]);
        });
        
      }
    });

    $(".cart").click(function(event) {
      $.ajax({
        url: 'order_details.php',
        type: 'POST',
        //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
        //data: {id:id , quantity:quantity , fried_egg:fried_egg ,omelet:omelet , note },
      })
      .done(function(data) {
        console.log("success");
        $(".result").html(data);
        $("#order-details").modal('show');
        var r=0;
        $("#order-details .row").each(function(index, el) {
          r++;
        });
        if (r==0) {
          $("#order-details .modal-body").html("<center><h3>ไม่มีรายการที่สั่ง</h3></center>");
        }
      });
      
    });

  });
</script>