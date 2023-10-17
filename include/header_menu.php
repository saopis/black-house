<?php date_default_timezone_set('Asia/Bangkok'); ?>
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
  <style>
    a.home{
      cursor: pointer;
    }
  </style>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style>
    .logo{
      width: 100px; 
      margin: 5px;
    }
    .logo-alt{
      width: 100px; 
      margin: 5px;
    }
    @media screen and (max-width: 995px) {
      .logo{
        width: 60px; 
        margin: 10px;
      }
      .logo-alt{
        width: 60px; 
        margin: 10px;
      }
      }
    }

  </style>
</head>

<body>
  <?php include "../../include/edit_image_profile.php";?>
  <!-- Header -->
  <header class="myheader">
    
    <!-- Nav -->
    <nav id="nav" class="navbar nav-transparent ">
      <div class="container">

        <div class="navbar-header" >
          <!-- Logo -->
          <div class="navbar-brand">
            <a href="index.php">
              <img class="logo" src="../../image/gallery/logo.png" alt="logo" >
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
          
          <li class="<?php if (strpos($_SERVER['REQUEST_URI'], "index") !== false){echo 'active'; } ?>" ><a class="home">หน้าหลัก</a></li>
          <li><a href="#recommented">เมนูแนะนำ</a></li>
          <li><a href="#Rice_plate">ข้าวจานเดียว</a></li>
          <li><a href="#side_dish">เมนูกับข้าว</a></li>
          <li><a href="#snack">อาหารว่าง</a></li>
          <li><a href="#Dessert">ขนมหวาน</a></li>
          <li><a href="#Drink">เครื่องดื่ม</a></li>
        </ul>
        <!-- /Main navigation -->


      </div>
    </nav>
    <!-- /Nav -->

