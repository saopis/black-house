<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">

	<style>
		body{
			background-image: url("image/bg3.jpg");
			margin: 0;
			height: 2000px;
		}
		.pic {
			background-image: url("image/menu/food1.jpg");
			width: 671px;
			height: 400px;
		}
		.pic1 {
			background-image: url("image/menu/food2.jpg");
			width: 500px;
			height: 400px;
			margin-top: 50px;
		}
		div{
			background-size: 100% 100%;
			background-repeat: no-repeat;
			display: block;
		}
	</style>
</head>
<body>
	<div class="pic" data-stellar-background-ratio="0.5"></div>
	<div class="pic1" data-stellar-background-ratio="0.5"></div>
</body>
</html>
<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.stellar.min.js"></script>
<script>
	$("body").stellar();
</script>
					<li><a href="#home">หน้าหลัก</a></li>
					<li><a href="#about">เกียวกับเรา</a></li>
					<li><a href="#myBG">My Location</a></li>
					<li><a href="#portfolio">เกเลอรี่</a></li>
					<li><a href="#service">การให้บริการ</a></li>
					<li><a href="#pricing">ราคา</a></li>
					<li><a href="#team">ทีมงาน</a></li>
					<li class="has-dropdown"><a href="#blog">บล็อก</a>
						<ul class="dropdown">
							<li><a href="blog-single.php">บล็อก 1</a></li>
							<li><a href="blog-single.php">บล็อก 2</a></li>
							<li><a href="blog-single.php">บล็อก 3</a></li>
							<li><a href="blog-single.php">บล็อก 4</a></li>
						</ul>
					</li>
					<li><a href="#contact">ติดต่อเรา</a></li>
					<li><a href="controller/manage_user.php">เข้าสู่ระบบ</a></li>