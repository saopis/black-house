<?php
date_default_timezone_set('Asia/Bangkok'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<link rel="shortcut icon" type="image/png" href="../../image/gallery/logo.png" />
	<title>BLACK HOUSE</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">

	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">

	<!-- Jquery UI -->
	<link rel="stylesheet" href="../../bower_components/jquery-ui/jquery-ui.min.css">
	<!-- Owl Carousel -->
	<link type="text/css" rel="stylesheet" href="../../assets/css/owl.carousel.css" />
	<link type="text/css" rel="stylesheet" href="../../assets/css/owl.theme.default.css" />

	<!-- Magnific Popup -->
	<link type="text/css" rel="stylesheet" href="../../assets/css/magnific-popup.css" />

	<!-- Select2 -->
	<link rel="stylesheet" href="../../bower_components/select2/dist/css/select2.min.css">

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="../../assets/css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="../../assets/css/style.css" />
	<!-- Cropper -->
	<link rel="stylesheet" href="../../plugins/cropper/cropper.min.css">
	<link type="text/css" rel="stylesheet" href="../../assets/css/main.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
	<style>
		.no-img {
			height: 70px;
		}

		@media screen and (max-width: 995px) {
			.no-img {
				height: 200px;
			}
		}

		@media screen and (max-width: 767px) {
			.no-img {
				height: 0px;
			}
		}

		.logo {
			width: 100px;
			margin: 5px;
		}

		.logo-alt {
			width: 100px;
			margin: 5px;
		}

		@media screen and (max-width: 995px) {
			.logo {
				width: 60px;
				margin: 10px;
			}

			.logo-alt {
				width: 60px;
				margin: 10px;
			}

		}

		.btn , button {
			border-radius: 5px !important;
			overflow: hidden !important;
		}
	</style>
</head>

<body>
	<!-- Header -->
	<?php
	include "../../include/edit_image_profile.php";
	if ($_GET) {
		$role_second = @$_GET['role_second'];
		$_SESSION['ses_role_second'] = $role_second;
	}

	?>
	<?php if (strpos($_SERVER['REQUEST_URI'], "detail") || strpos($_SERVER['REQUEST_URI'], "report") || strpos($_SERVER['REQUEST_URI'], "all_order") || strpos($_SERVER['REQUEST_URI'], "my_order") || strpos($_SERVER['REQUEST_URI'], "receipt")) {
		echo '<header class="myheader no-img">';
	} else {
		echo '<header class="myheader">';
	} ?>



	<!-- Nav -->
	<nav id="nav" class="navbar nav-transparent ">
		<div class="container">

			<div class="navbar-header">
				<!-- Logo -->
				<div class="navbar-brand">
					<a href="index.php">
						<img class="logo" src="../../image/gallery/logo.png" alt="logo">
						<img class="logo-alt" src="../../image/gallery/logo.png" alt="logo">
					</a>
				</div>
				<!-- /Logo -->


				<!-- Collapse nav button -->
				<div class="nav-collapse">
					<span></span>
				</div>
				<!-- /Collapse nav button -->
			</div>

			<!--  Main navigation  -->
			<ul class="main-nav nav navbar-nav navbar-right">

				<li class="<?php if (strpos($_SERVER['REQUEST_URI'], "index") !== false) {
								echo 'active';
							} ?>"><a href="../../executive/view/index.php">หน้าหลัก</a></li>
				<?php
				if ($_SESSION['ses_role_second'] == '') {
					if ($_SESSION['ses_role'] == "ผู้จัดการ") {

						include "../../executive/include/navbar.php";
					}
					if ($_SESSION['ses_role'] == "พนักงานทำอาหาร") {

						include "../../chefs/include/navbar.php";
					}
					if ($_SESSION['ses_role'] == "พนักงานซื้อวัตถุดิบ") {

						include "../../supply_officer/include/navbar.php";
					}
					if ($_SESSION['ses_role'] == "พนักงานบริการ") {

						include "../../service_provider/include/navbar.php";
					}
				} elseif ($_SESSION['ses_role_second'] == '2') {
					include "../../executive/include/navbar.php";
				} elseif ($_SESSION['ses_role_second'] == '1') {
					if ($_SESSION['ses_role'] == "พนักงานทำอาหาร") {

						include "../../chefs/include/navbar.php";
					}
					if ($_SESSION['ses_role'] == "พนักงานซื้อวัตถุดิบ") {

						include "../../supply_officer/include/navbar.php";
					}
					if ($_SESSION['ses_role'] == "พนักงานบริการ") {

						include "../../service_provider/include/navbar.php";
					}
				}



				?>
				<?php if ($_SESSION['ses_role_second'] != '') {
					echo '<li class="has-dropdown"><a>เปลียนตำแหน่ง</a>
									<ul class="dropdown">
										<li><a href="../../executive/view/index.php?role_second=2"><span>เปลียนเป็นผู้จัดการร้าน</span></a></li>';

					if ($_SESSION['ses_role'] == "พนักงานทำอาหาร") {
						echo '<li><a href="../../chefs/view/index.php?role_second=1"><span>พนักงานทำอาหาร</span></a></li>';
					}
					if ($_SESSION['ses_role'] == "พนักงานซื้อวัตถุดิบ") {
						echo '<li><a href="../../supply_officer/view/index.php?role_second=1"><span>พนักงานซื้อวัตถุดิบ</span></a></li>';
					}
					if ($_SESSION['ses_role'] == "พนักงานบริการ") {
						echo '<li><a href="../../service_provider/view/index.php?role_second=1"><span>พนักงานบริการ</span></a></li>';
					}
					echo '
									</ul>
								</li>';
				} ?>
				<li class="li-hide"><span data-toggle="modal" data-target="#edit_image_profile"><a style="padding-left: 12px;">เปลียนรูปโปรไฟล์</a></span></li>
				<li class="li-hide"><a href="../../controller/log_out.php">ออกระบบ</a></li>
				<li class="has-dropdown user">
					<img src="<?php if ($_SESSION['ses_image'] == null && $_SESSION['ses_sex'] == "ชาย") {
									echo "../../image/user_icon.svg";
								} elseif ($_SESSION['ses_image'] == null && $_SESSION['ses_sex'] == "หญิง") {
									echo "../../image/user_icon_female.svg";
								} else {
									echo "../../image/profile/" . $_SESSION['ses_image'];
								} ?>" class="user-img img-circle" alt="User Image" style="width: 40px; height: 40px; ">
					<span>&nbsp; <?php echo $_SESSION['ses_nikname']; ?></span>
					<ul class="dropdown">
						<li><span data-toggle="modal" data-target="#edit_image_profile"><a>เปลียนรูปโปรไฟล์</a></span></li>
						<li><a href="../../controller/log_out.php"><span>ออกจากระบบ</span></a></li>
					</ul>
				</li>


			</ul>
			<!-- /Main navigation -->


		</div>
	</nav>
	<!-- /Nav -->