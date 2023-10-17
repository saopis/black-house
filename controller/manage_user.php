<?php
session_start();
if ($_SESSION['ses_role'] == "ผู้จัดการ") {

	header("location:../executive/view/index.php");

} elseif ($_SESSION['ses_role'] == "พนักงานทำอาหาร") {

	header("location:../chefs/view/index.php");

} elseif ($_SESSION['ses_role'] == "พนักงานซื้อวัตถุดิบ") {

	header("location:../supply_officer/view/index.php");

} elseif ($_SESSION['ses_role'] == "พนักงานบริการ") {

	header("location:../service_provider/view/index.php");

} else {
	header("location:../login.php");
}

?>