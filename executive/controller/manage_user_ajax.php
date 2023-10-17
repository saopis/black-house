<?php
session_start();
$id = $_POST['user_id'];
$action = $_POST['action'];
@$role_data = $_POST['role_data'];
@$status = $_POST['status'];
@$view = $_POST['view'];
include "../../include/conn.php";

if ($action == 'del') {
	$result=$conn->query("SELECT user_image FROM user WHERE user_id= $id ");
	$dt=$result->fetch_array();
	$img=$dt['user_image'];
	$conn->query("DELETE FROM user WHERE user_id= $id ");
	if ($img != '') {
		unlink('../../image/profile/'.$img);
	}
	echo 'ลบบีญชีนี้จากระบบแล้ว';
}

if ($action == 'allow') {
	$conn->query("UPDATE user SET user_status='activated' WHERE user_id= $id");
}
if ($action == 'change') {
	$conn->query("UPDATE user SET user_status = '$status' WHERE user_id= $id");
}

if ($view != "") {
	$user_id = $_SESSION['ses_id'];
	$_SESSION['view'] = $view;
	$conn->query("UPDATE user SET user_view='$view' WHERE user_id= $user_id ");
}
if ($action == 'chane_role') {
	$conn->query("UPDATE user SET user_role = '$role_data' WHERE user_id= $id");
}
if ($action=="remove-admin") {
	$conn->query("UPDATE user SET user_second_role = '' WHERE user_id= $id");
	if ($conn->error) {
		echo $conn->error;
	}
}
if ($action=="add-admin") {
	$conn->query("UPDATE user SET user_second_role = '1' WHERE user_id= $id");
	if ($conn->error) {
		echo $conn->error;
	}
}
?>
