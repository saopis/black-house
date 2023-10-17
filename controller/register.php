<?php
include "../include/conn.php";
$user_fullname = $_POST['fullname'];
$user_email = $_POST['email'];
$user_pwd = $_POST['pwd'];
$user_nikname = $_POST['nikname'];
$user_sex = $_POST['sex'];
$user_role = $_POST['role'];
$user_numphone = $_POST['num_phone'];
$user_address = $_POST['address'];
if ($user_sex=='ชาย') {
	$user_titlename='นาย';
}elseif ($user_sex=='หญิง') {
	$user_titlename='นางสาว';
}
///////////////id////////////////////////////
$result = $conn->query("SELECT user_id FROM  user");
$i = 1;
$new_id;
while ($dt = $result->fetch_array()) {
	if ($dt['user_id'] != $i) {
		$new_id = $i;
		break;
	}
	$i++;
}
if (is_null($new_id)) {
	$new_id = $i;
}
////////////////////////////////////////////////

$str = "INSERT INTO user ( user_id,user_fullname,user_email,user_pwd,user_status,user_nikname,user_sex,user_role,user_numphone,user_address,user_titlename ) VALUES ( '$new_id','$user_fullname','$user_email','$user_pwd','wait','$user_nikname','$user_sex','$user_role','$user_numphone','$user_address','$user_titlename' ) ";

if ($conn->query($str)) {
	echo 'work';
} else {
	echo $conn->error;
}
?>