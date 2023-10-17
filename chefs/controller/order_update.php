<?php
  include "../../include/conn.php";
  $result=$conn->query("SELECT * FROM `order` WHERE order_status='wait' ORDER BY order_datetime"); 
?>
    <?php 
      if ($result->num_rows <=0) {
        echo "<center><h3>ไม่มีออเดอร์.</h3></center>";
      }else {

      while ($data = $result->fetch_assoc()) {
        $id=$data['menu_id'];
        $img=$conn->query("SELECT menu_img FROM `menu` WHERE menu_id='$id'")->fetch_assoc();
      ?>
    <!-- blog -->
    <div class="col-md-4">
      <div class="blog">
        <div class="blog-img">
          <img class="img-order" src="../../image/menu/<?php echo $img['menu_img'] ; ?>" alt="">
        </div>
        <div class="blog-content">
          <center><h3>=| <?php echo $data['order_name']; ?> |=</h3></center>
          <div class="row">
            <div class="col-md-6">
              <h4 ><i class="fa">โต๊ะที่ : </i><i class="fa" style="color: #868F9B;">&nbsp;<?php echo $data['order_table_no']; ?></i> </h4>
            </div>
            <div class="col-md-6">
              <h4><i class="fa">จำนวน : </i><i class="fa" style="color: #868F9B;">&nbsp;<?php echo $data['order_quantity']; ?></i></h4>
            </div>
            <div class="col-md-6">
              <h4><i class="fa">ไข่ดาว : </i><i class="fa" style="color: #868F9B;">&nbsp;<?php echo $data['order_fried_egg']; ?></i></h4>
            </div>
            <div class="col-md-6">
              <h4><i class="fa">ไข่เจียว : </i><i class="fa" style="color: #868F9B;">&nbsp;<?php echo $data['order_omelet']; ?></i></h4>
            </div>
          </div>
          
          <h4>หมายเหตุ</h4>
          <p><?php 
                if ($data['order_note']=='') {
                  echo 'ไม่มี.';
                }else {
                  echo $data['order_note'];
                } 
              ?>
          </p>
          <center><a href="../controller/manage_order.php?id=<?php echo $data['order_id']; ?>&action=select"><button class="btn btn-outline info">เลือกทำออเดอร์นี้</button></a></center>
        </div>
      </div>
    </div>
  <!-- /blog -->
<?php } } ?>
