<style>
body{
  font-style: yellow;
}
.glyphicon-tower:hover{
  cursor: pointer;
}
</style>

<?php
  $action = $_POST['action'];
  include '../../include/conn.php';
  $str = "";
  
    if ($action == 'all') {
      $str = "SELECT * FROM user ORDER BY user_role;";
    } elseif ($action == 'wait') {
      $str = "SELECT * FROM user WHERE user_status ='wait' ORDER BY user_role;";
    } elseif ($action == 'blocked') {
      $str = "SELECT * FROM user WHERE user_status ='blocked' ORDER BY user_role;";
    }


  $result = $conn->query($str);
  $i = 1;
  while ($dt = $result->fetch_array()) {
  	$img;
  	
  	if ($dt['user_image'] == "" && $dt['user_sex'] == "ชาย") {
  		$img = "../../image/user_icon.svg";
      //$img = "../../image/user_icon_white.svg";
  	} elseif ($dt['user_image'] == "" && $dt['user_sex'] == "หญิง") {
  		$img = "../../image/user_icon_female.svg";
      //$img = "../../image/user_icon_female_white.svg";
  	} else {
  		$img = "../../image/profile/" . $dt['user_image'];
  	}
?>


<div class=" member zoom-in shadow-hover" style="border-radius: 10px; overflow: hidden;">

  <div class="member-img bg-theme">
    <a <?php //href="view_profile.php?id=php echo $dt['user_id']; " ?> ><img src="<?php echo $img; ?>" class="img-circle" alt="User Image"<?php 
    if ($dt['user_role']=="พนักงานทำอาหาร") {
      echo 'style="border: 3px solid #ffff66;"';
    }elseif ($dt['user_role']=="พนักงานซื้อวัตถุดิบ") {
      echo 'style="border: 3px solid #00ff7f;"';
    }elseif ($dt['user_role']=="พนักงานบริการ") {
      echo 'style="border: 3px solid #ff7f50;"';
    } ?> ></a>
    <hr style="margin: 5px;">
    <p id="nikname" class="white-text"><?php echo $dt['user_nikname']; ?></p>
    <hr style="margin: 2px;">
  </div>

  <div class="member-content ">
    <center>
      <span id="user_name" class=""><?php echo $dt['user_titlename'] . "" . $dt['user_fullname']; ?></span>
      <i class="pull-right" id="block-status" style="font-size: 25px;">
      <?php 
      /////////second role
      if ($dt['user_role']=='ผู้จัดการ') {
        echo '<span class="glyphicon glyphicon-tower" style="color:#ffa500;"><span>';
      }elseif ($dt['user_role']!='ผู้จัดการ'&&$dt['user_status']=="activated" && $dt['user_second_role']=="" ) {
        echo '<span class="glyphicon glyphicon-tower second_no" style="color:gray;"><span>';
      }elseif ($dt['user_role']!='ผู้จัดการ'&&$dt['user_status']=="activated" && $dt['user_second_role']!="" ) {
        echo '<span class="glyphicon glyphicon-tower second" style="color:#ff00ff;"><span>';
      } ?>
      <?php if ($dt['user_status']=='blocked') {  echo '<i class="fa fa-expeditedssl "></i>';  } ?><?php if ($dt['user_status']=='blocked') {  echo '<i class="fa fa-expeditedssl "></i>';  } ?>
      </i>
    </center>

    <hr style="margin: 10px;">
      <span id="user_id" style="display: none;"><?php echo $dt['user_id']; ?></span>
      <p><i class="fa fa-envelope"></i>&nbsp; <span><?php echo $dt['user_email']; ?></span></p>
      <p><i class="fa fa-phone-square"></i>&nbsp; <span><?php echo $dt['user_numphone']; ?></span></p>
      <p id="role"><i class="fa fa-gavel"></i>&nbsp; <span ><?php echo $dt['user_role']; ?><?php if ($dt['user_role'] != 'ผู้จัดการ') {echo '<a class="edit">&nbsp;<i class="fa fa-edit"></i></a>';}?></span></p>
    <hr id="hr-footer" style="margin : 10px;">

    <center class="container-fluid">
      <?php if ($dt['user_role']!='ผู้จัดการ') {?>
      <span id="status">
      <?php if ($dt['user_status'] == 'activated') {?>
        <label class="switch">
          <input type="checkbox" checked>
          <span class="slider"></span>
        </label>
      <?php } elseif ($dt['user_status'] == 'blocked') {?>
        <label class="switch">
          <input type="checkbox">
          <span class="slider"></span>
        </label>
      <?php } elseif ($dt['user_status'] == 'wait') {?>
        <button class="btn btn-success btn-sm" id="activate">
          <span class=" glyphicon glyphicon-plus"></span>
          <span class="btn-text"> | อนุมัติ</span>
        </button>
      <?php }?>
      </span>
      <button class="btn btn-danger btn-sm " id="remove">
        <span class=" glyphicon glyphicon-trash"></span>
        <span class="btn-text"> | ลบบัญชี</span>
      </button>
      <?php } ?>
    </center>

  </div>
</div>

<?php
  $i++;
  }
  if ($i==1) {
    echo '<center><br><h2 class="black-text">== ไม่มีข้อมูล ==</2><br><br><br><br></center>';
  }
  $conn->close();
?>
<script>
  //del user
  $(document).on('click', '#remove', function(event) {
    var id = $(this).closest('.member').find('#user_id').html();
    var role = $(this).closest('.member').find('#role').html();
    var name = $(this).closest('.member').find('#user_name').html();
    if (role != 'ผู้จัดการ') {
      var delcon=confirm("คุณแน่ใจน่ะ !! ที่จะลบบัญชีของ "+name);
      if (delcon==true) {
        $(this).closest('.member').remove();
        $.ajax({
          method: "POST",
          url: "../controller/manage_user_ajax.php",
          data: {user_id: id , action: 'del'}
        })
        .done(function( data ) {
          alert( data );
        });
      }
    }else{
      alert( 'ไม่สามารถลบบัญชีผู้จัดการ' );
    }

  });

  //switch status
  $(document).on('change', 'input[type=checkbox]', function(event) {
    var id = $(this).closest('.member').find('#user_id').html();
    var role = $(this).closest('.member').find('#role').html();
    var status;
    if($(this).is(':checked')){
      status='activated';
    }else {
      status='blocked';
    }
     if (status=='activated') {
           $(this).closest('.member').find("#block-status").html("");
        }else {
           $(this).closest('.member').find("#block-status").html('<i class="fa fa-expeditedssl "></i>');
        }
    if (role != 'ผู้จัดการ') {
    $.ajax({
        method: "POST",
        url: "../controller/manage_user_ajax.php",
        data: {user_id: id, status : status , action: 'change'}
      })
      .done(function( data ) {

      });
    }else{
      alert( 'ไม่สามารถเปลียนสถานะบัญชีผู้จัดการ' );
      $(this).closest('.member').find('#status').html('<label class="switch"><input type="checkbox" checked><span class="slider"></span></label></center>');
    }
  });

  //all
  if (action=='all') {
    //activate
    $(document).on('click', '#activate', function(event) {
      var id = $(this).closest('.member').find('#user_id').html();
      $(this).closest('.member').find('#status').html('<label class="switch"><input type="checkbox" checked><span class="slider"></span></label>');
        $.ajax({
          method: "POST",
          url: "../controller/manage_user_ajax.php",
          data: {user_id: id , action: 'allow'}
        })
        .done(function( data ) {
          //alert( data );
        });
    });
  }
  
  //add dialog change role
  $(document).on('click', '.edit', function(event) {
    var id = $(this).closest('.member').find('#user_id').html();
    var role_dialog ='<div class=" style="width:80px" ><select class="form-control box-shadow select" id="add_role"  style="width: 100%; height:25px; margin:0px; padding:0px;" name="add_role" required><option disabled selected>ตำแหน่ง/หน้าที่...</option><option value="พนักงานทำอาหาร">พนักงานทำอาหาร</option><option value="พนักงานซื้อวัตถุดิบ">พนักงานซื้อวัตถุดิบ</option><option value="พนักงานบริการ">พนักงานบริการ</option></select></div>';
    $(this).closest('.member').find('#hr-footer').css('margin', '0px');
    $(this).closest('.member').find('#role').html(role_dialog);
  });

  //change role
  $(document).on('change', '#add_role', function(event) {
    var role_data=$(this).val();
    var id = $(this).closest('.member').find('#user_id').html();
    $(this).closest('.member').find('#role').html('<i class="fa fa-gavel"></i>&nbsp;'+role_data+'<a href="#" class="edit">&nbsp;<i class="fa fa-edit"></i></a>');
    $.ajax({
          method: "POST",
          url: "../controller/manage_user_ajax.php",
          data: {user_id: id, role_data: role_data , action: 'chane_role'}
        })
        .done(function( data ) {
          
        });
  });

  //wait
  if (action=='wait') {
    //activate
    $(document).on('click', '#activate', function(event) {
      var id = $(this).closest('.member').find('#user_id').html();
      $(this).closest('.member').remove();
        $.ajax({
          method: "POST",
          url: "../controller/manage_user_ajax.php",
          data: {user_id: id , action: 'allow'}
        })
        .done(function( data ) {
          //alert( data );
        });

    });

  }
   //del user
  if (my_role=="ผู้จัดการ") {
    $(document).on('click', '.second', function(event) {
      var id = $(this).closest('.member').find('#user_id').html();
      var role = $(this).closest('.member').find('#role').html();
      var name = $(this).closest('.member').find('#user_name').html();
      $.ajax({
            method: "POST",
            url: "../controller/manage_user_ajax.php",
            data: {user_id: id , action: 'remove-admin'}
          })
          .done(function( data ) {
            console.log(data);
          });
        $(this).closest('.member').find('#block-status').html('<span class="glyphicon glyphicon-tower second_no" style="color:gray;"><span>');
    });
     //del user
    $(document).on('click', '.second_no', function(event) {
      var id = $(this).closest('.member').find('#user_id').html();
      var role = $(this).closest('.member').find('#role').html();
      var name = $(this).closest('.member').find('#user_name').html();
      $.ajax({
            method: "POST",
            url: "../controller/manage_user_ajax.php",
            data: {user_id: id , action: 'add-admin'}
          })
          .done(function( data ) {
            console.log(data);
          });
          $(this).closest('.member').find('#block-status').html('<span class="glyphicon glyphicon-tower second" style="color:#ff00ff;"><span>');
    });
  }


</script>