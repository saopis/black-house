<?php 
  include '../../include/conn.php';
  $result=$conn->query("SELECT * FROM `order` WHERE order_status = 'wait'") or die("ไม่สำเร็จ".$conn->error);
  if ($result->num_rows>0) {
    echo '1';    
  }else {
    echo '0';
  }
?>