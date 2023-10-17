<?php
$id = $_GET['img_id'];
require "../../include/conn.php";
$img=$conn->query("SELECT * FROM bill_img WHERE bill_img_id='$id'")->fetch_assoc();
$type=$img['file_type'];

header("Content-type: $type");
echo $img['file_content'];

?>
