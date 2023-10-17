<?php  
  include "../../include/conn.php";
if (!$_GET['table']) {
  echo "<center><h3>กรุณาป้อนเลขโต๊ะก่อนครัง.</h3></center>";
}else {

$table=$_GET['table'];
$order_bill=$conn->query("SELECT MAX(order_bill_no) FROM `order_bill`")->fetch_array(); 
$order_bill_new = $order_bill[0]+1 ;
if (strlen($order_bill_new)<=6) {
  $order_bill_no = substr("000000".$order_bill_new, -6);
}
$name=[];
$rs=$conn->query("SELECT DISTINCT emp_name FROM `order_bill` WHERE emp_name!=''");
while ($epm_sr=$rs->fetch_array()) {
    array_push($name, $epm_sr['emp_name']);
}


$fried_egg_price=$conn->query("SELECT menu_price FROM `menu` WHERE menu_id='1'")->fetch_assoc();
$omelet_price=$conn->query("SELECT menu_price FROM `menu` WHERE menu_id='2'")->fetch_assoc();
$result=$conn->query("SELECT * FROM `order` WHERE order_table_no='$table' AND (order_status='wait' OR order_status='doing') ");
$month=$thaimonth[(date("m")-1)];
$year=date("Y")+543;
if ($result->num_rows >0) {
  echo "<center><h3>มีรายการที่ยังไม่ได้.</h3></center>";
}else {
  $result=$conn->query("SELECT * FROM `order` WHERE order_table_no='$table' AND order_status!='paid'");
  if ($result->num_rows <=0) {
    echo "<center><h3>ไม่มีออเดอร์.</h3></center>";
  }else {
    echo "<style>
    th{
      text-align:center;
      padding:5px;
      border:1px solid gray;
    }
    td{
      text-align:center;
      padding:5px;
      border:1px solid gray;
      color:black;
    }
    tr{
      
    }
    </style>";
    echo '<div class="dt-tb" ">
          <center>
          <h3>ใบเสร็จ</h3>
          <img src="../../image/gallery/logo.png" style="width:100px;">
          <h4>ร้าน BLACKHOUSE</h4>
          </center>
          <div style="margin-left:10%;">
            <input type="hidden" id="bill_no" value="'.$order_bill_new.'">
            <p>เลขที่ใบเสร็จ : '.$order_bill_no.'</p>
            <p>วันที่ออกใบเสร็จ : '.date("d ".$month." ".$year).'</p>
          </div>
          <center>
          <hr width="90%">
            <table style="width:100%;">
              <thead>
                <tr style="background-color:#008080; color:white;">
                  <th style="width:80px;">ลำดับ</th>
                  <th style="width:300px;">รายการ</th>
                  <th style="width:80px;">จำนวน</th>
                  <th style="width:80px;">ราคา</th>
                  <th style="width:150px;">ราคารวมหน่วย</th>
                </tr>
              </thead>
                <tbody>';
    $i=1;
    $fried_egg=0;
    $omelet=0;
    $all_price=0;
    while ($data=$result->fetch_assoc()) {
      if ($data['order_fried_egg']!=0) {
        $fried_egg+=$data['order_fried_egg'];
      }
      if ($data['order_omelet']!=0) {
        $omelet+=$data['order_omelet'];
      }
      $cal_price=$data['order_quantity']*$data['order_price'];
      $all_price+=$cal_price;
      echo '    <tr>
                  <td>'.$i.'</td>
                  <td style="text-align:left;">'.$data['order_name'].'</td>
                  <td>'.$data['order_quantity'].'</td>
                  <td>'.$data['order_price'].'</td>
                  <td>'.$cal_price.'</td>
                </tr>';
      $i++;
    }
      if ($fried_egg!=0) {
        $cal_fried_egg=$fried_egg*$fried_egg_price['menu_price'];
        $all_price+=$cal_fried_egg;
        echo '   <tr>
                  <td>'.($i).'</td>
                  <td style="text-align:left;">เพิ่มไข่ดาว</td>
                  <td>'.$fried_egg.'</td>
                  <td>'.$fried_egg_price['menu_price'].'</td>
                  <td>'.$cal_fried_egg.'</td>
                </tr>';
      }
      if ($omelet!=0) {
        $cal_omelet=$omelet*$omelet_price['menu_price'];
        $all_price+=$cal_omelet;
        echo '   <tr>
                  <td>'.($i+1).'</td>
                  <td style="text-align:left;">เพิ่มไขเจียว</td>
                  <td>'.$omelet.'</td>
                  <td>'.$omelet_price['menu_price'].'</td>
                  <td>'.$cal_omelet.'</td>
                </tr>';
      }
      echo '    <tr>
                  <td colspan="4">จำนวนเงินทั้งสิ้น</td>
                  <td>'.$all_price.' บาท.</td>
                  <input type="hidden" id="all_price" value="'.$all_price.'">
                </tr>
              </tbody>
            </table>
          </center>
          <br>
          </div>
          <br>
          <div id="dt-add" style="display:none;">
            
          </div>
          <center><button class="btn btn-info" style="font-size:25px;" id="payment"> ชำระ</button><br><br>
          <div id="div-receipt" class="" style="width:100%; padding:0px; display:none;">';
          ?>
            <form action="../controller/print_receipt.php" method="POST" accept-charset="utf-8" target="_blank">
              <div class="row" style="width:100%;">
                <div class="form-group ">
                  <div class="col-md-offset-3 col-md-2"><label for="emp_name" class="">ชื่อลูกค้า : </label></div>
                  <div class="col-md-3"><input class="form-control" type="text" name="emp_name" id="emp_name"></div>
                </div>
                <br>
                <div class="form-group">
                   <div class="col-md-offset-3 col-md-2 "><label for="emp_address" class="">ที่อยู่ลูกค้า : </label></div>
                  <div class="col-md-3 "><textarea class="form-control" name="emp_address" id="emp_address"></textarea></div>
                </div>
                <input type="hidden" name="bill_no" value="<?php echo $order_bill_new; ?>">   
              </div>        
              <br>
              <button class="btn btn-success" id="print" style="font-size:25px;"><i class="fa fa-print" style="font-size:35px;"></i> ปริ้น</button>&nbsp;
            </form>
            <?php
            echo '<a target="_blank" href="../controller/down_receipt.php?bill_no='.$order_bill_new.'"><button class="btn btn-success" id="down" style="font-size:25px; display:none;"><i class="fa fa-download" style="font-size:35px;"></i> โหลดเป็นไฟล์ PDF</button></a>
          </div></center>';
    
    } 
  } 
}
?>
<script>
  $(document).ready(function() {

    $("#payment").click(function(event) {
      var table_no = $("#table").val();
      var all_price = $("#all_price").val();
      $("#div-receipt").show();
      $("#payment").hide();
      $.ajax({
        url: '../controller/manage_payment.php',
        type: 'POST',
        //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
        data: {action: 'pay',table_no:table_no,all_price:all_price},
      })
      .done(function(data) {
        console.log("payment success");
        //console.log(data);
      });
      
    });
    /*$("#down").click(function(event) {
      var bill_no=$("#bill_no").val();
      $.ajax({
        url: '../controller/down_receipt.php',
        type: 'GET',
        //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
        data: {bill_no:bill_no},
      })
      .done(function() {
        console.log("print success");
      });
    });*/
    var name = <?php echo json_encode($name); ?>;
    var ch=false;
    $(document).on('focusin', '#emp_name', function(event) {
      event.preventDefault();
      $(this).autocomplete({
        source: name
      });
      ch=false;
    });
    $(document).on('change', '#emp_name', function(event) {
      event.preventDefault();
      var index_name=$("#emp_name").val();
      $.ajax({
        url: '../controller/emp.php',
        type: 'POST',
        //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
        data: {index_name:index_name},
      })
      .done(function add_emp(data) {
        $("#dt-add").html(data);
        var add = data.split(",");
        //console.log(add);
        $("#emp_address").val(add[0]);
      });
      ch=true;
    });

    $(document).on('input', '#emp_address', function(event) {
      event.preventDefault();
      var dataadd=$("#dt-add").html();
      var add = dataadd.split(",");
      $(this).autocomplete({
        source: add
      });
    });
    $(document).on('mouseover', '#print', function(event) {
      event.preventDefault();
      var index_name=$("#emp_name").val();
      if (ch==false) {
        
        $.ajax({
          url: '../controller/emp.php',
          type: 'POST',
          //dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
          data: {index_name:index_name},
        })
        .done(function add_emp(data) {
          $("#dt-add").html(data);
          var add = data.split(",");
          //console.log(add);
          $("#emp_address").val(add[0]);
        });

      }
    });
  });
</script>  