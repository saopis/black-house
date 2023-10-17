<?php 
session_start();
require'../../include/conn.php';
$table=$_POST['table'];
$id = $_POST['order_id-dt'];
$type = $_POST['order_type-dt'];
$quantity = $_POST['quantity-dt'];
$fried_egg = $_POST['fried_egg-dt'];
$omelet = $_POST['omelet-dt'];
$note = $_POST['note-dt'];
$name=$_POST['order_name-dt'];
$price=$_POST['price_order-dt'];

$n=0;
if ($id!='') {
  $omelet_price=$conn->query("SELECT menu_price FROM menu WHERE menu_id='2'")->fetch_array();
  $fried_egg_price=$conn->query("SELECT menu_price FROM menu WHERE menu_id='1'")->fetch_array();

for ($i = 0; $i < count($id); $i++) {
  $date_time=date("Y-m-d H:i:s");
  $j=0;
  if ($type[$i]=='ข้าวจานเดียว') {
  	$j=$i-$n;
  	$fried=$fried_egg[$j]+0;
  	$ome=$omelet[$j]+0;
    $img_arr=$conn->query("SELECT menu_img FROM menu WHERE menu_id='$id[$i]'")->fetch_array();
    $img=$img_arr[0];
    $sql="INSERT INTO `order` ( menu_id , order_name , order_price , order_quantity , order_fried_egg , order_omelet , order_note , order_table_no , order_status,order_datetime, omelet_price,fried_egg_price,order_img) VALUES ('$id[$i]','$name[$i]','$price[$i]','$quantity[$i]','$fried','$ome','$note[$i]','$table','wait','$date_time','$omelet_price[0]','$fried_egg_price[0]','$img');";
  }else {
    $n++;
    $sql="INSERT INTO `order` ( menu_id , order_name , order_price , order_quantity , order_fried_egg , order_omelet , order_note , order_table_no , order_status,order_datetime,order_img) VALUES ('$id[$i]','$name[$i]','$price[$i]','$quantity[$i]','0','0','$note[$i]','$table','wait','$date_time','$img');";
  }
  $conn->query($sql)or die ($conn->error);

}

header("location:../view/index.php");
unset($_SESSION['order']);
unset($_SESSION['table']);

}
?>