<?php 
session_start();
$user_id=$_SESSION['ses_id'];
require'../../include/conn.php';
if ($_POST['action']=="pay") {
  $table_no=$_POST['table_no'];
  $order_price=$_POST['all_price'];
  $order_bill=$conn->query("SELECT MAX(order_bill_no) FROM `order_bill`")->fetch_array()  or die($conn->error); 
  $order_bill_new = $order_bill[0]+1 ;
  $date_time=date("Y-m-d H:i:s");
  $order_quantity=$conn->query("SELECT SUM(order_quantity) FROM `order` WHERE order_table_no='$table_no' AND order_status='done';")->fetch_array() or die($conn->error);
  $conn->query("UPDATE `order` SET order_bill_no='$order_bill_new', order_status='paid' WHERE order_table_no='$table_no' AND order_status='done'") or die($conn->error) ;
  $conn->query("INSERT INTO `order_bill` (order_bill_no,order_datetime,order_table_no,order_quantity,order_price,user_id)VALUES('$order_bill_new','$date_time','$table_no','$order_quantity[0]','$order_price','$user_id');") or die($conn->error) ;

}
?>