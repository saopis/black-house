<?php
session_start();
include '../../include/conn.php';
$order = $_SESSION['order'];
?>
<!-- Modal -->
  <div class="modal fade " id="order-details" data-keyboard="false" data-backdrop="static" role="dialog">
    <div class="modal-dialog modal-lg" style="margin-top:100px;">
      <!-- Modal content-->
      <div class="modal-content">
        <form action="" method="POST">
        <div class="modal-header bg-theme">
          <div style="margin: 0px; width: 100px; float: left;">
            <label for="table">โต๊ะที่ : </label>&nbsp;
            <input type="text" id="table" name="table" required style="width: 40%; border-bottom:1px solid white; " value="<?php echo $_SESSION["table"];?>">
          </div>
          <button type="button" class="close" data-dismiss="modal" id="times">&times;</button>
          <center><h4 class="modal-title " id="menu-name-madol" style="color: white;">รายการที่สั่ง</h4></center>
        </div>
        <div class="modal-body">
          <?php 
            if ($order=='') {
              echo '<center><h3>ไม่มีรายการที่สั่ง</h3></center>';
            }
            for ($i = 0; $i < count($order) ; $i++) {
              $id=$order[$i]['order_id'];
              $sql="SELECT * FROM menu WHERE menu_id='$id'";
              $menu_data=$conn->query($sql)->fetch_assoc();
              $menu_price=$menu_data['menu_price']*$order[$i]['order_quantity'];
              $fried_egg_price=$conn->query("SELECT menu_price FROM `menu` WHERE menu_id='1'")->fetch_assoc();
              $omelet_price=$conn->query("SELECT menu_price FROM `menu` WHERE menu_id='2'")->fetch_assoc();
              @$omelet=$order[$i]['order_omelet']*$omelet_price['menu_price'];
              @$fried_egg=$order[$i]['order_fried_egg']*$fried_egg_price['menu_price'];
              $all_price=$menu_price+$omelet+$fried_egg;
          ?>
          <div class="row myitem" style="border: 1px solid grey; margin: 10px; padding: 10px; position:relative; ">
            <span style="position: absolute; right: 0px; top: 0px; z-index: 1000;">
              <button type="button" class="btn btn-danger del-item" ><i class="fa fa-trash " ></i></button>
            </span>
            <div class="col-md-5">
              <img src="../../image/menu/<?php echo $menu_data['menu_img'] ;?>" id="img-order-dt" class="img-menu-modal" alt="" style="border: 1px solid grey; width: 100%; height: 200px; ">
            </div>
            <div class="col-md-7" style="padding: 10px;">
              <center><h3>=| <?php echo $menu_data['menu_name']; ?> |=</h3></center>
              <div class="row">
                <input type="hidden" id="order_id-dt" name="order_id-dt[]" value="<?php echo $id;?>">
                <input type="hidden" id="order_name-dt" name="order_name-dt[]" value="<?php echo $menu_data['menu_name'];?>">
                <input type="hidden" id="order_type-dt" name="order_type-dt[]" value="<?php echo $menu_data['menu_type'];?>">
                <div class="col-md-4">
                  <label for="quantity-dt">จำนวน : </label>&nbsp;
                  <input type="number" id="quantity-dt" autofocus name="quantity-dt[]" value="<?php echo $order[$i]['order_quantity'] ;?>" style="width: 49%;">
                </div>
              <?php if ($menu_data['menu_type']=='ข้าวจานเดียว') {?>
                <div class="col-md-4 ">
                  <label for="fried_egg-dt">ไข่ดาว : </label>&nbsp;
                  <input type="number" id="fried_egg-dt" name="fried_egg-dt[]" value="<?php echo $order[$i]['order_fried_egg'] ;?>" style="width: 49%;">
                </div>
                <div class="col-md-4">
                  <label for="omelet-dt">ไข่เจียว : </label>&nbsp;
                  <input type="number" id="omelet-dt" name="omelet-dt[]" value="<?php echo $order[$i]['order_omelet'] ;?>" style="width: 45%;">
                </div>
              <?php } ?>
              </div>
              
              <div class="row">
                <div class="col-md-6">
                  <label for="price_order-dt">ราคาเมนู : </label>
                  <input type="number" id="price_order-dt" name="price_order-dt[]" style="width: 40%;" 
                  value="<?php echo $menu_data['menu_price'] ;?>" readonly> บาท.
                </div>
                <div class="col-md-6">
                  <label for="price-dt">ราคารวม : </label>
                  <input type="number" id="price-dt" name="price-dt[]" style="width: 40%;" 
                  value="<?php echo $all_price ;?>" readonly>  บาท.
                </div>
                <div class="col-md-12">
                  <label for="note">หมายเหตุ : </label>
                  <textarea name="note-dt[]" id="note-dt" style="width: 100%; height: 100%;"><?php echo $order[$i]['order_note'] ;?></textarea>
                </div>
              </div>
              
            </div>
          </div>
          <?php } ?>
        </div>
        <div class="modal-footer" >
            <center>
                <button type="submit" class="btn btn-outline primary sent_cart">ส่งออเดอร์</button>
                <button type="submit" class="btn btn-outline success edit_cart">เลือกเมนูต่อ</button>
            </center>
        </div>
        </form>
      </div>
    </div>
  </div>
<script>
$(document).ready(function() {
  

  $(".del-item").click(function(event) {
    var con=confirm("คุณแน่ใจที่จะลบรายการนี้!!");
    var id=$(this).closest('.row').find('#order_id-dt').val();
    if (con) {
      $(this).closest('.row').remove();
      $.ajax({
          url: '../controller/manage_order.php',
          type: 'POST',
          //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
          data: {id:id , action:"del-order" },
        })
        .done(function(data) {
          console.log("success");
          //$(".result").html(data);
          var myarr = data.split(",");
          $("#cart-num").html(myarr[0]);
          $("#cart-quantity").html(myarr[1]);
          var r=0;
          $("#order-details .row").each(function(index, el) {
            r++;
          });
          if (r==0) {
            $("#order-details .modal-body").html("<center><h3>ไม่มีรายการที่สั่ง</h3></center>");
          }
        });
    }
      
  });

  $(document).on('click', '.edit_cart', function(event) {
    $("#order-details form").attr({
      action: '../controller/edit_order.php',
    });
  });
  $(document).on('click', '.sent_cart', function(event) {
    var count_item=0;
    $(".myitem").each(function(index, el) {
      count_item++

      ;
    });
    if (count_item!=0) {
      $("#order-details form").attr({
        action: '../controller/sent_order.php',
      });
    }else{
      alert("โปรดเลือกรายการก่อน");
    }
  });
  
});
</script>