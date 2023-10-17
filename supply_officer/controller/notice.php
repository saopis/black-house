<?php 
  include '../../include/conn.php';
  $result=$conn->query("SELECT * FROM bill_material WHERE bill_status = 'not buy'") or die("ไม่สำเร็จ".$conn->error);
  if ($result->num_rows>0) {
    echo '1';    
  }else {
    echo '0';
  }
?>