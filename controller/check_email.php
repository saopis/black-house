<?php 
	include("../include/conn.php");
	$email=@$_POST['check_email'];
	$result=$conn->query("select user_email from user where user_email = '$email' ");
	if ($result->num_rows>0) {
		echo '1';
	}
?>