<?php 
session_start();
include"../../include/conn.php";
$user_id=$_SESSION['ses_id'];
$id=$_GET['id'];
$action=$_GET['action'];
if ($action=='select') {
  $sql="UPDATE `order` SET order_status='doing', user_id='$user_id' WHERE order_id='$id'";
  $conn->query($sql)or die($conn->error);
  header("location:../view/my_order.php");
}
if ($action=='done') {
  $sql="UPDATE `order` SET order_status='done' WHERE order_id='$id'";
  $conn->query($sql)or die($conn->error);
  header("location:../view/all_order.php");
}

?>