<?php session_start();
include "../include/conn.php";
$email = $_POST['user_em'];
$pwd = md5($_POST['user_pwd']);

$sql = "SELECT * FROM user WHERE user_email='$email' AND md5(user_pwd)='$pwd' AND user_status='activated' ";
$result = $conn->query($sql);
if ($result->num_rows <= 0) {
	$sql = "SELECT * FROM user WHERE user_email='$email' AND md5(user_pwd)='$pwd' AND user_status='blocked' ";
	$result = $conn->query($sql);
	if ($result->num_rows <= 0) {
		$sql = "SELECT * FROM user WHERE user_email='$email' AND md5(user_pwd)='$pwd' AND user_status= 'wait' ";
		$result = $conn->query($sql);
		if ($result->num_rows <= 0) {
			echo "false";
		} else {
			echo "unconfirmed";
		}
	} else {
		echo "blocked";
	}

} else {
	$user = $result->fetch_array();
	$_SESSION['ses_id'] = $user['user_id'];
	$_SESSION['ses_sex'] = $user['user_sex'];
	$_SESSION['ses_titlename'] = $user['user_titlename'];
	$_SESSION['ses_fullname'] = $user['user_fullname'];
	$_SESSION['ses_nikname'] = $user['user_nikname'];
	@$_SESSION['theme'] = $user['user_theme'];
	$_SESSION['ses_role'] = $user['user_role'];
	$_SESSION['ses_role_second'] = $user['user_second_role'];
	$_SESSION['ses_image'] = $user['user_image'];
	echo "success";
}
$conn->close();

?>