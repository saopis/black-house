<?php  
  include "../../include/conn.php";
$table=$_POST['table']; 
$result=$conn->query("SELECT * FROM `order` WHERE order_table_no='$table' AND order_status!='paid'");
          if ($result->num_rows <=0) {
            echo "<center><h3>ไม่มีออเดอร์.</h3></center>";
          }else {

          while ($data = $result->fetch_assoc()) {
          
          if ($data['order_status']=='wait') {
        ?>
        <!-- blog -->
        <div class="col-md-4">
          <div class="blog" style="border: 3px solid gray;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.29);">
            <div class="blog-img">
              <img class="img-order" src="../../image/menu/<?php echo $data['order_img'] ; ?>" alt="">
            </div>
            <div class="blog-content">
              <center><h3>=| <?php echo $data['order_name']; ?> |=</h3></center>
              <div class="row">
                <div class="col-md-6">
                  <label for="">โต๊ะที่ : 
                  <i class="fa" style="color: #868F9B;">&nbsp;<?php echo $data['order_table_no']; ?></i>
                  </label>
                </div>
                <div class="col-md-6">
                  <input type="hidden" name="order_id" id="order_id" value="<?php echo $data['order_id']; ?>">
                  <label for="quantity">จำนวน : </label>
                  &nbsp;<input type="number" id="quantity" name="quantity" class="input-line" value="<?php echo $data['order_quantity']; ?>" style="color: #868F9B; width: 50px;">
                </div>
                <div class="col-md-6">
                  <label for="fried_egg">ไข่ดาว : </label>
                  &nbsp;<input type="number" id="fried_egg" name="fried_egg" class="input-line" value="<?php echo $data['order_fried_egg']; ?>" style="color: #868F9B; width: 50px;">
                </div>
                <div class="col-md-6">
                  <label for="omelet">ไข่เจียว : </label>
                  &nbsp;<input type="number" id="omelet" name="omelet" class="input-line" value="<?php echo $data['order_omelet']; ?>" style="color: #868F9B; width: 50px;">
                </div>
              </div> 
              <h4>หมายเหตุ</h4>
              <textarea name="note" id="note" cols="30" style="width: 100%;"><?php echo $data['order_note']; ?></textarea>
              <center><button class="btn btn-outline info save_edit">บันทึกการแก้ไข</button>&nbsp;<button class="btn btn-outline danger del">ยกเลิกออเดอร์</button></center>
            </div>
          </div>
        </div>
        <!-- /blog -->
        <?php }else {
          ?>
          <!-- blog -->
        <div class="col-md-4">
          <?php if ($data['order_status']=='doing') {
            echo '<div class="blog" style="border: 3px solid yellow;box-shadow: 0 4px 8px 0 rgba(255,255, 0, 0.5), 0 6px 20px 0 rgba(255,255, 0, 0.29);">';
          }else if ($data['order_status']=='done') {
            echo '<div class="blog" style="border: 3px solid green;box-shadow: 0 4px 8px 0 rgba(0,255, 0, 0.5), 0 6px 20px 0 rgba(0,255, 0, 0.29);">';
          } ?>
          
            <div class="blog-img">
              <img class="img-order" src="../../image/menu/<?php echo $data['order_img'] ; ?>" alt="">
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
              ?></p>
            </div>
          </div>
        </div>
        <!-- /blog -->
          <?php           
              }
            } 
          } 
        ?>
<script>
  $(document).ready(function() {
    $(".save_edit").click(function(event) {
      var id=$(this).closest('.blog-content').find('#order_id').val();
      var quantity=$(this).closest('.blog-content').find('#quantity').val();
      var fried_egg=$(this).closest('.blog-content').find('#fried_egg').val();
      var omelet=$(this).closest('.blog-content').find('#omelet').val();
      var note=$(this).closest('.blog-content').find('#note').val();
      var action="edit";
      $.ajax({
        url: '../controller/manage_order.php',
        type: 'POST',
        //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
        data: {id:id,quantity:quantity,fried_egg:fried_egg,omelet:omelet,note:note,action:action},
      })
      .done(function(data) {
        console.log("success");
      });
      
    });


    $(".del").click(function(event) {
      var id=$(this).closest('.blog-content').find('#order_id').val();
      var action="del";
      var con = confirm("คุณแน่ใจแล้วน่ะ");
      if (con) {
        $.ajax({
          url: '../controller/manage_order.php',
          type: 'POST',
          //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
          data: {id:id,action:action},
        })
        .done(function(data) {
          console.log("success");
        });
        $(this).closest('.blog').remove();
      }
      
    });
  });
</script>