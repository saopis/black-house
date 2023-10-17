<?php  
session_start();
  // Require composer autoload
require_once '../../vendor/autoload.php';
// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf([
  'default_font_size' => 16,
  'default_font' => 'sarabun'
]);

include "../../include/conn.php";

$bill_no=$_GET['bill_no'];
if (strlen($bill_no)<=6) {
  $order_bill_no = substr("000000".$bill_no, -6);
}
$table=$conn->query("SELECT DISTINCT order_table_no FROM `order` WHERE order_bill_no='$bill_no'")->fetch_assoc();
$fried_egg_price=$conn->query("SELECT menu_price FROM `menu` WHERE menu_id='1'")->fetch_assoc();
$omelet_price=$conn->query("SELECT menu_price FROM `menu` WHERE menu_id='2'")->fetch_assoc();
$result=$conn->query("SELECT * FROM `order` WHERE order_bill_no='$bill_no'");
$month=$thaimonth[(date("m")-1)];
$year=date('Y')+543;

  $html='<div style="text-align:right;">เลขที่ใบเสร็จ : '.$order_bill_no.'<br></div>
        <div style="text-align:center;">
          <h1>ใบเสร็จ</h1>
          <img src="../../image/logo.png" style="width:150px;">
          <h2 style="margin:0px;">ร้าน BLACKHOUSE</h2>
          <p style="margin-top:0px;">หมู.6 ต.ควน อ.ปะนาเระ จ.ปัตตานี 94190.</p>
          </div>
          <div style="margin-left:0;">
            โต๊ะที่นั่ง : '.$table['order_table_no'].'&nbsp; เวลา &nbsp;'.date("H:i").'&nbsp;น.<br>
            วันที่ออกใบเสร็จ : '.date("d ".$month." ".$year).'
          </div>
          <center>
          <hr width="100%">
        </div>
        <table style="text-align:center;">
              <thead>
                <tr style="">
                  <th style="width:80px; border-bottom:1px solid gray;">ลำดับ</th>
                  <th style="width:300px; border-bottom:1px solid gray;">รายการ</th>
                  <th style="width:80px; border-bottom:1px solid gray;">จำนวน</th>
                  <th style="width:80px; border-bottom:1px solid gray;">ราคา</th>
                  <th style="width:150px; border-bottom:1px solid gray;">ราคารวมหน่วย</th>
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
    ///////
    $cal_price=$data['order_quantity']*$data['order_price'];
    $all_price+=$cal_price;
    $html.='    <tr>
                  <td>'.$i.'</td>
                  <td style="text-align:left;">'.$data['order_name'].'</td>
                  <td>'.$data['order_quantity'].'</td>
                  <td>'.$data['order_price'].'</td>
                  <td>'.$cal_price.'</td>
                </tr>';
    $i++;
    /////////
  }
    if ($fried_egg!=0) {
      $cal_fried_egg=$fried_egg*$fried_egg_price['menu_price'];
      $all_price+=$cal_fried_egg;
      $html.='   <tr>
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
      $html.='   <tr>
                  <td>'.($i+1).'</td>
                  <td style="text-align:left;">เพิ่มไขเจียว</td>
                  <td>'.$omelet.'</td>
                  <td>'.$omelet_price['menu_price'].'</td>
                  <td>'.$cal_omelet.'</td>
                </tr>';
    }
    $html.='   <tr>
                  <td colspan="4" style="border-top:1px solid gray;">จำนวนเงินทั้งสิ้น</td>
                  <td style="border-top:1px solid gray;">'.$all_price.' บาท.</td>
                </tr>
              </tbody>
            </table>
          </center>
          <br>
          </div>
          <br>
          <div style="position:absolute; bottom:20px; right:10px; text-align:center; width:200px;">
            <p>( '.$_SESSION['ses_titlename'].' '.$_SESSION['ses_fullname'].' )</p>
            <p>พนักงาน</p>
          </div>
          ';

  // Write some HTML code:
  $mpdf->WriteHTML($html);
  $file_name=$order_bill_no.".pdf";
  // Output a PDF file directly to the browser
  $mpdf->Output($file_name,"I");
 

?>