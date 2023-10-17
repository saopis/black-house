<?php session_start();
if (@$_SESSION['ses_role'] == null) {
	?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Big Food | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">
  <link rel="stylesheet" href="plugins/iCheck/polaris/polaris.css">
  <link rel="stylesheet" href="assets/css/main.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <style>
    body{
      margin: 0px;
      padding: 0px;
    }
    .c-body{
      background-color: black;
    }
    .bg{
      z-index: -1010;
      position: absolute;
      position: fixed;
      width: 100%;
      height: 100%;
      background-image: url('image/gallery/bg-login.jpg');
      background-repeat: no-repeat;
      background-attachment: fixed;
      background-size: cover;
      margin: 0px;
      padding: 0px;
      opacity: 0.8;
    }

    .c-box{
      background-color:rgba(255, 255, 255, 0.7);
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5), 0 6px 20px 0 rgba(0, 0, 0, 0.29);

    }

    .shadow-focus:focus ,#status_login{
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    #login-box-msg{
      text-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);

    }
    .btn-c{
      border-radius: 0px;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      background-color: #337ab7; /* Green */
      border: none;
      color: white;
      padding: 8px 12px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      margin: 4px 2px;
      cursor: pointer;
    }
    .btn-c:hover{
      box-shadow: 0px 0px 0px 0px;
      background-color: #286090 ;
    }
    .btn-c:hover{
      box-shadow: 0px 0px 0px 0px;
      background-color: #286090 ;
    }
    .r-btn{
      width: 90%;
      padding: 10px 12px;
    }
    .pis-note{
      margin: 0px;
      margin-top: 5px;
      width: 100%;
      padding: 10px;
      margin-bottom:10px
    }
    .header-login ,.header-register{
      float: left;
      position: relative;
      margin:0px;
      padding: 20px;
      padding-bottom;
      width: 50%;
      text-align: center;
      font-size: 16px;

    }
    .no_active{
      background-color:rgba(0, 0, 0, 0.5);
      color: white;
      cursor: pointer;
    }
    .no_active:hover{
      background-color:rgba(0, 0, 0, 0.3);
    }
    .tab_active{
      background-color:rgba(255, 255, 255, 0);
    }
    .login-box{
      margin-top: 20px;
    }
    #register{
      display: none;

    }
  </style>
</head>
<body class="c-body hold-transition login-page">
<div class="bg"></div><br><br>
<div class="login-box">
  <div class="login-logo" >
    <img src="image/gallery/logo.png" alt="" style="width: 150px;height: 150px;">
    <p><a><b style="color: white;">= BLACK_HOUSE =</b></a></p>
  </div>
  <div class="header-login tab_active">เข้าสู่ระบบ</div>
  <div class="header-register no_active">ลงทะเบียน</div>
  <!-- /.login-logo -->
  <div class="c-box login-box-body " id="login">
      <br><br><br><br>
    <p class="login-box-msg" style="color: black; font-size: 16px; "><!i class="fa fa-user-circle-o" style="font-size: 150px; "></i></p>
    <form>
      <div id="div_em " class="form-group has-feedback">
        <input type="email" id="user_em" name="user_em" class="form-control shadow-focus" required placeholder="อีเมล" >
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div id="div_pwd" class="form-group has-feedback">
        <input type="password" id="user_pwd" name="user_pwd" class="form-control shadow-focus" required placeholder="รหัสผ่าน">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <p id="status_login" style="color: red;"></p>
      <div class="row">
        <!-- /.col -->
        <div id="div_btn_login" class="col-xs-offset-8">
          <button type="submit" class="btn-c btn_login">เข้าสู่ระบบ</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->

  <!-- /.register-logo -->
  <div class="c-box login-box-body " id="register">
      <br><br><br><br>
    <p class="login-box-msg" style="color: black; font-size: 16px; display: none;">ล็อกอินเข้าสู่ระบบ</p>
    <!form>
      <div id="div_add_fullname" class="form-group has-feedback">
        <input type="text" id="add_fullname" name="add_fullname" class="form-control shadow-focus" required placeholder="ชื่อ-นามสกุล" >
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <p id="status_fullname" style="color: red;"></p>
      </div>
      <div id="div_add_nikname" class="form-group has-feedback">
        <input type="text" id="add_nikname" name="add_nikname" class="form-control shadow-focus" required placeholder="ชื่อเล่น" >
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <p id="status_nikname" style="color: red;"></p>
      </div>
      <div id="div_add_em" class="form-group has-feedback">
        <input type="email" id="add_em" name="add_em" class="form-control shadow-focus" required placeholder="อีเมล" >
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <p id="status_email" style="color: red;"></p>
      </div>
      <div id="div_add_pwd" class="form-group has-feedback">
        <input type="password" id="add_pwd" name="add_pwd" class="form-control shadow-focus" required placeholder="รหัสผ่าน">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <p id="status_pwd1" style="color: red;"></p>
      </div>
      <div id="div_add_pwd_con" class="form-group has-feedback">
        <input type="password" id="add_pwd_con" name="add_pwd_con" class="form-control shadow-focus" required placeholder="ยืนยันรหัสผ่าน">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <p id="status_pwd" style="color: red;"></p>
      </div>
      <div id="div_add_numphone" class="form-group has-feedback">
        <input type="text" id="add_numphone" name="add_numphone" class="form-control shadow-focus" placeholder="เบอร์โทรศัพท์" required data-inputmask='"mask": "999-999-9999"' data-mask>
        <i class="fa fa-phone-square form-control-feedback"></i>
        <p id="status_phone" style="color: red;"></p>
      </div>
      <div class="form-group" >
        <select class="form-control shadow-focus" id="add_role"  style="width: 100%;" name="add_role" required>
          <option disabled selected>ตำแหน่ง/หน้าที่...</option>
          <option value="พนักงานทำอาหาร">พนักงานทำอาหาร</option>
          <option value="พนักงานซื้อวัตถุดิบ">พนักงานซื้อวัตถุดิบ</option>
          <option value="พนักงานบริการ">พนักงานบริการ</option>
        </select>
        <p id="status_role" style="color: red;"></p>
      </div>
      <div id="div_add_sex" class="form-group has-feedback ">
        <div class="checkbox icheck">
            <label style="color: black;">
              <input type="radio" name="add_sex" class="sex" id="boy" value="ชาย" checked> ชาย
            </label>
            <label style="color: black;">
              <input type="radio" name="add_sex" class="sex" id="girl" value="หญิง"> หญิง
            </label>
          </div>
      </div>
      <div id="div_address" class="form-group has-feedback">
        <textarea class="form-control shadow-focus" rows="5" id="user_address" name="user_address" class="form-control" required placeholder="ที่อยู่" ></textarea>
      </div>
      <p id="status_address" style="color: red;"></p><br>
      <div class="row">
        <!-- /.col -->
        <div id="div_btn_register" class="">
          <center><button type="submit" class="btn-c btn-register">ยืนยันการลงทะเบียน</button></center>
        </div>
        <!-- /.col -->
      </div>
    <!/form>

  </div>
  <!-- /.register-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script>
//valiable
var datafull=true;
var confirm =false;
var pwd_num_l=false;
var role = true;
var email=true;



//Datemask dd/mm/yyyy
$('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
//Datemask2 mm/dd/yyyy
$('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
//Money Euro
$('[data-mask]').inputmask();


$(document).on('click', '.header-login', function(event) {
  $(".header-login").addClass('tab_active');
  $(".header-login").removeClass('no_active');
  $(".header-register").addClass('no_active');
  $(".header-register").removeClass('tab_active');
  $("#register").hide();
  $("#login").show();
});

//tab login clicked
$(document).on('click', '.header-register', function(event) {
  $("#register").css('display', 'block');
  $(".header-login").addClass('no_active');
  $(".header-login").removeClass('tab_active');
  $(".header-register").addClass('tab_active');
  $(".header-register").removeClass('no_active');
  $("#login").hide();
  $("#register").show();
  $("#div_em").removeClass('has-error');
  $("#div_pwd").removeClass('has-error');
  $("#status_login").removeClass('pis-note note-danger');
  $("#status_login").html("");
  $("#user_em").val("");
  $("#user_pwd").val("");
});

//icheck
$('input').iCheck({
  checkboxClass: 'icheckbox_polaris',
  radioClass: 'iradio_polaris',
  increaseArea: '-10%' // optional
});

//login
$(document).on('click', '.btn_login', function action(event) {
  var email_user=$("#user_em").val();
  var pass_user=$("#user_pwd").val();

  if (email_user!=0&&pass_user!="") {
    $("#div_btn_login").html("<img src='image/loading.gif' width='50px'>");
    $.post('controller/check_login.php', { user_em:email_user , user_pwd:pass_user })
      .done(function data(data){
        if(data=="success"){
          window.location='controller/manage_user.php';
        }else if(data=="false"){
          $("#div_em").addClass('has-error');
          $("#div_pwd").addClass('has-error');
          $("#status_login").addClass('pis-note note-danger');
          $("#status_login").html(" คุณป้อนอีเมลหรือรหัสผ่านผิด กรุณาป้อนอีกครั้ง");
          $("#div_btn_login").html("<button type='submit' class='btn-c btn_login'>เข้าสู่ระบบ</button>");
        }else if(data=="blocked"){
          $("#div_em").addClass('has-error');
          $("#div_pwd").addClass('has-error');
          $("#status_login").addClass('pis-note note-danger');
          $("#status_login").html(" บัญชีคุณถูกบล็อก กรุณาติดต่อผู้จัดการร้าน");
          $("#div_btn_login").html("<button type='submit' class='btn-c btn_login'>เข้าสู่ระบบ</button>");
        }else if(data=="unconfirmed"){
          $("#div_em").addClass('has-error');
          $("#div_pwd").addClass('has-error');
          $("#status_login").addClass('pis-note note-danger');
          $("#status_login").html(" บัญชีคุณยังไม่ผ่านการอนุมัติ กรุณาติดต่อผู้จัดการร้าน");
          $("#div_btn_login").html("<button type='submit' class='btn-c btn_login'>เข้าสู่ระบบ</button>");
        }
    });
  }else{
    $("#status_login").addClass('pis-note note-danger');
    $("#status_login").html("* กรุณาป้อนอีเมลหรื่อรหัสผ่าน");
  }
});

//check invalid
document.addEventListener("DOMContentLoaded", function() {
    var elements = $("INPUT");
    for (var i = 0; i < elements.length; i++) {
        elements[i].oninvalid = function(e) {
            e.target.setCustomValidity("");

            if (!e.target.validity.valid) {
                e.target.setCustomValidity("กรุณากรอกข้อมูลด้วยครับ");
            }
        };
        elements[i].oninput = function(e) {
            e.target.setCustomValidity("");
        };
    }
})

//check input email
$("#add_em").on("input",function(event) {
  var check_email=$("#add_em").val();
  if (validateEmail(check_email)) {
    $("#status_email").removeClass('pis-note note-warning');
    $("#status_email").html("");

    $.post('controller/check_email.php', {check_email:check_email }).done(function data(data) {
      if(data=="1"){
        $("#div_add_em").addClass('has-error');
        $("#status_email").addClass('pis-note note-danger');
        $("#status_email").html("* อีเมลนี้ถูกลงทะเบียนแล้ว");
        email=false;
      }else{
        $("#div_add_em").removeClass('has-error');
        $("#status_email").removeClass('pis-note note-danger');
        $("#status_email").html("");
        email=true;
      }
    });
  }else{
    $("#status_email").addClass('pis-note note-warning');
    $("#status_email").html("* อีเมลต้องมี @gmail.com หรือ @gmail.com");
    email=false;
  }
});

//pwd
$("#add_pwd").on("input",function(e){
  var pwd= $("#add_pwd").val().length;
  var pwd1= $("#add_pwd").val();
  var pwd_con = $("#add_pwd_con").val();
  if (pwd>=8) {
    $("#status_pwd1").removeClass('pis-note note-warning');
    $("#status_pwd1").html("");
    if (pwd_con!=="") {
      if(pwd1!==pwd_con){
        //$(this).closest('div .form-group').addClass( "has-error" );
        $("#status_pwd").addClass('pis-note note-danger');
        $("#status_pwd").html("* รหัสผ่านยังไม่ตรงกัน");
        $("#status_pwd").css('color', 'red');
        confirm=false;
      }else{
        //$(this).closest('div .form-group').removeClass( "has-error" );
        //$(this).closest('div .form-group').addClass( "has-success" );
        $("#status_pwd").removeClass('pis-note note-danger');
        $("#status_pwd").addClass('pis-note note-success');
        $("#status_pwd").css('color', 'green');
        $("#status_pwd").html("* รหัสผ่านตรงกันแล้ว");
        confirm=true;
        pwd_num_l=true;
      }

    }
  }else{
    $("#status_pwd1").addClass('pis-note note-warning');
    $("#status_pwd1").html("* รหัสผ่านต้องมากกว่า 8 ตัว");
    //$("#status_pwd").css('color', 'yellow');
  }
});

//confirm
$("#add_pwd_con").on("input",function(e){
    var pwd= $("#add_pwd").val();
    var pwd_con= $("#add_pwd_con").val();

    if(pwd_con!==pwd){
      $("#status_pwd").addClass('pis-note note-danger');
      $("#status_pwd").html("* รหัสผ่านยังไม่ตรงกัน");
      $("#status_pwd").css('color', 'red');
      confirm=false;
    }else{
      $("#status_pwd").removeClass('pis-note note-danger');
      $("#status_pwd").addClass('pis-note note-success');
      $("#status_pwd").css('color', 'green');
      $("#status_pwd").html("* รหัสผ่านตรงกันแล้ว");
      confirm=true;
    }
});

//email spell
function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

//check data full
function checkdata(){
  /////////full name////////////
  if($("#add_fullname").val()==""){
    $("#status_fullname").addClass('pis-note note-danger');
    $("#status_fullname").html("* กรุณากรอกข้อมูลด้วยครับ");
    $("#status_fullname").css('color', 'red');
    datafull=false;
  }else{
    $("#status_fullname").removeClass('pis-note note-danger');
    $("#status_fullname").html("");
    datafull=true;
  }
  /////////full name////////////
  if($("#add_nikname").val()==""){
    $("#status_nikname").addClass('pis-note note-danger');
    $("#status_nikname").html("* กรุณากรอกข้อมูลด้วยครับ");
    $("#status_nikname").css('color', 'red');
    datafull=false;
  }else{
    $("#status_nikname").removeClass('pis-note note-danger');
    $("#status_nikname").html("");
    datafull=true;
  }
  /////////email////////////
  if($("#add_em").val()==""){
    $("#status_email").removeClass('pis-note note-warning');
    $("#status_email").addClass('pis-note note-danger');
    $("#status_email").html("* กรุณากรอกข้อมูลด้วยครับ");
    $("#status_email").css('color', 'red');
    datafull=false;
  }else{
    if (validateEmail($("#add_em").val())) {
      $("#status_email").removeClass('pis-note note-danger');
      $("#status_email").html("");
      datafull=true;
    }else{
      $("#status_email").addClass('pis-note note-warning');
      $("#status_email").html("* อีเมลต้องมี @gmail.com หรือ @gmail.com");
    }
  }
  /////////pwd////////////
  if($("#add_pwd").val()==""){
    $("#status_pwd1").addClass('pis-note note-danger');
    $("#status_pwd1").html("* กรุณากรอกข้อมูลด้วยครับ");
    $("#status_pwd1").css('color', 'red');
    datafull=false;
  }else{
    if (pwd_num_l=true) {
      $("#status_pwd1").removeClass('pis-note note-danger');
      $("#status_pwd1").html("");
      datafull=true;
    }else{
      $("#status_pwd1").addClass('pis-note note-warning');
      $("#status_pwd1").html("* รหัสผ่านต้องมากกว่า 8 ตัว");
    }
  }
  /////////pwd////////////
  if ($("#add_pwd").val()!="") {
    if($("#add_pwd_con").val()==""){
      $("#status_pwd").addClass('pis-note note-danger');
      $("#status_pwd").html("* กรุณากรอกข้อมูลด้วยครับ");
      $("#status_pwd").css('color', 'red');
      datafull=false;
    }else{
      $("#status_pwd").removeClass('pis-note note-danger');
      $("#status_pwd").html("");
      datafull=true;
    }
  }
   /////////num phone////////////
  if($("#add_numphone").val()==""){
    $("#status_phone").addClass('pis-note note-danger');
    $("#status_phone").html("* กรุณากรอกข้อมูลด้วยครับ");
    $("#status_phone").css('color', 'red');
    datafull=false;
  }else{
    $("#status_phone").removeClass('pis-note note-danger');
    $("#status_phone").html("");
    datafull=true;
  }
   /////////role////////////
  if ($("#add_role").val()==null) {
    $("#status_role").addClass('pis-note note-danger');
    $("#status_role").html("* กรุณาเลื่อกตำแหน่ง");
    var role = false;
  }else{
    $("#status_role").removeClass('pis-note note-danger');
    $("#status_role").html("");
    var role = true;
  }
  /////////address////////////
  if($("#user_address").val()==''){
    $("#status_address").addClass('pis-note note-danger');
    $("#status_address").html("* กรุณากรอกข้อมูลด้วยครับ");
    $("#status_address").css('color', 'red');
    datafull=false;
  }else{
    $("#status_address").removeClass('pis-note note-danger');
    $("#status_address").html("");
    datafull=true;
  }
}

//register submit
$(document).on('click', '.btn-register', function(event) {
  checkdata();

    if (email==true && confirm==true && role == true && pwd_num_l==true && datafull==true) {
      $.post('controller/register.php',{
        fullname : $("#add_fullname").val(),
        nikname : $("#add_nikname").val(),
        email : $("#add_em").val(),
        pwd : $("#add_pwd").val(),
        num_phone : $("#add_numphone").val(),
        role : $("#add_role").val(),
        sex : $('input[type="radio"]:checked').val(),
        address : $("#user_address").val()
      })
      .done(function data(data) {
        if (data=='work') {
          $("#register").html("<br><br><br><div class='pis-note note-success text-center' style='color: green;'><h2>สมัครเรียบร้อยแล้ว</h2><h3>* รอผู้จัดการอนุมัติ</h3><h4>หากล้าช้ากรุณาติดต่อผู้จัดการโดยตรง</h4></div>");
          window.setTimeout('location.reload()', 7000);
        }else{
          console.log(data);
        }
      });
    }
});

</script>
</body>
</html>
<?php

} else {
	header("location:controller/manage_user.php");
}
?>