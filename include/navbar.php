<style>
  .edit_image_profile:hover {
    cursor: pointer;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  }

  .edit_i{
    position: absolute;
  }
  .edit_i ,.edit_i_t{
    display: none;
  }
@media screen and (min-width:768px) {
  .notice-nav{
    display: none;
  }
}
</style>

  <?php include "../../include/edit_image_profile.php";?>

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini c-zoom"><b>BF</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg c-zoom"><b>= Big || Food =</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" style="position: relative;">
        <span class="sr-only">Toggle navigation</span>
        <div class="bg-red shadow " id="notice" ></div>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown">
            <a href="#" id="theme" onclick="opentheme()">
              <i class="fa fa-connectdevelop"></i> THEME
            </a>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php if ($_SESSION['ses_image'] == null && $_SESSION['ses_sex'] == "ชาย") {echo "../../image/user_icon.svg";} elseif ($_SESSION['ses_image'] == null && $_SESSION['ses_sex'] == "หญิง") {echo "../../image/user_icon_female.svg";} else {echo "../../image/profile/" . $_SESSION['ses_image'];}?>" class="user-image" alt="User Image">
              <span class="hidden-xs"> <?php echo $_SESSION['ses_nikname']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header img">
              
                  <img src="<?php if ($_SESSION['ses_image'] == null && $_SESSION['ses_sex'] == "ชาย") {echo "../../image/user_icon.svg";} elseif ($_SESSION['ses_image'] == null && $_SESSION['ses_sex'] == "หญิง") {echo "../../image/user_icon_female.svg";} else {echo "../../image/profile/" . $_SESSION['ses_image'];}?>" class="img-circle edit_image_profile edit" alt="User Image" data-toggle="modal" data-target="#edit_image_profile" style="">
                  <i class="fa fa-edit edit_i" style="font-size: 25px; color: white"></i>
                  <div class="edit_i_t" style="background-color: black; color: white; margin-top:5px; margin-bottom:0px; width: 60%; margin-left:20%;"> คลิกเพื่อเปลียนรูปภาพ</div>
                <p id="user_name" style=" ">
                  <?php echo $_SESSION['ses_fullname']; ?>
                  <small><?php echo ">> " . $_SESSION['ses_role'] . " <<"; ?></small>
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">โปรไฟล์</a>
                </div>
                <div class="pull-right">
                  <a href="../../controller/log_out.php" class="btn btn-default btn-flat">ออกจากระบบ</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
