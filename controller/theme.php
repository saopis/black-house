<?php 
	session_start();
	include("../include/conn.php");
	@$theme=$_POST['theme'];
	$id=$_SESSION['ses_id'];
	$_SESSION['theme']=$theme;
	$conn->query("UPDATE user SET user_theme='$theme' WHERE user_id='$id'");
	$conn->close();
?>