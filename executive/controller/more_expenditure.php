<?php 
include"../../include/conn.php";
$subject = $_POST['subject'];
$price = $_POST['price'];
$data_date = $_POST['data_date'];
$id = $conn->query("SELECT MAX(epd_id) FROM expenditure ;")->fetch_array();
$new_id = $id[0]+1 ;
for ($i = 0; $i < count($subject); $i++) {
  $epd_id=$new_id+$i;
  $epd_date=date_convert($data_date[$i]);
  $conn->query("INSERT INTO `expenditure` (epd_id,epd_subject, epd_price, epd_date)VALUES('$epd_id','$subject[$i]','$price[$i]','$epd_date'); ") or die($conn->error) ;
}
header("location:../view/index.php");
?>