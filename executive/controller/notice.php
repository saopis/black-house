<?php
session_start();
include '../../include/conn.php';
$status="";
$new_user = $conn->query("SELECT  * FROM user WHERE user_status ='wait'")->num_rows;
if ($new_user > 0) {
	$status.="1,";
}
$new_user = $conn->query("SELECT  * FROM menu WHERE menu_status ='new'")->num_rows;
if ($new_user > 0) {
	$status.="2,";
}
echo $status;
?>