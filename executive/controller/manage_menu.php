<?php 
include"../../include/conn.php";
///////////////  recommented /////////////////
if ($_POST['action']=='recom') {
  $menu_id=$_POST['menu_id'];
  $result=$conn->query("UPDATE menu SET menu_recommented='1' WHERE menu_id='$menu_id'");
  echo 'success';

}
///////////////  not recommented /////////////////
if ($_POST['action']=='not-recom') {
  $menu_id=$_POST['menu_id'];
  $result=$conn->query("UPDATE menu SET menu_recommented=null WHERE menu_id='$menu_id'");
  echo 'success';

}
/////////////// delete menu /////////////////////
if ($_POST['action']=='delete') {
  $menu_id=$_POST['menu_id'];
  $menu_img=$_POST['menu_img'];

  $conn->query("DELETE FROM menu WHERE menu_id='$menu_id'");
  if ($menu_img!='') {
    //unlink('../../image/menu/'.$menu_img);
  }
  echo 'success';

}
/////////////// check neme menu /////////////////
if ($_POST['action']=='check_mname') {
  $mname=$_POST['mname'];
  $result=$conn->query("SELECT menu_name FROM menu WHERE menu_name='$mname'");
  if ($result->num_rows>0) {
    echo 'the same';
  }
}
/////////////// allow menu /////////////////
if ($_POST['action']=='allow') {
  $menu_id=$_POST['menu_id'];
  $result=$conn->query("UPDATE menu SET menu_status='activated' WHERE menu_id='$menu_id'");
  echo 'success';
}
///////////////  dont allow menu /////////////////
if ($_POST['action']=='dont-allow') {
  $menu_id=$_POST['menu_id'];
  $result=$conn->query("UPDATE menu SET menu_status='wait' WHERE menu_id='$menu_id'");
  echo 'success';

}
///////////////// save menu //////////////////////
if ($_POST) {
  @$mname=$_POST['mname'];
  @$mprice=$_POST['mprice'];
  @$mtype=$_POST['mtype'];
  @$action=$_POST['action'];
  @$edit_id=$_POST['edit_id'];
  @$imgname=$_POST['edit_img'];
  if (is_uploaded_file($_FILES['mimg']['tmp_name'])) {
    $fileName = basename($_FILES['mimg']['name']);
    $filetype = pathinfo($fileName, PATHINFO_EXTENSION);
    $imgname =  $mname.".".$filetype;
    $target_dir = "../../image/menu";
    $upload_path = $target_dir ."/". $imgname;
    $fileacept = array("png", "jpg", "jpeg","gif","PNG","JPG","JPEG","GIF");

    if ($_FILES['mimg']['error']) {
      header("location:../index.php?msg=".$_FILES['mimg']['error']);
      //echo ("<script>alert(".$_FILES['mimg']['error'].");  window.location='../index.php';</script>");
    }else {
     
      if (in_array($filetype, $fileacept)) {
         
        if (file_exists($upload_path)) {
          @unlink($upload_path); //remove the file
        }
        @$check = move_uploaded_file($_FILES['mimg']['tmp_name'], $upload_path);
        @chmod($upload_path, 0755); //Change the file permissions if allowed
        if ($check == false) {
          echo ("can not move");
        }
        
      }else {
        //echo "<script>alert('โปรดเลือกไฟล์รูปภาพ'); window.location='../view/add_menu.php';</script>";
        header("location:../view/add_menu.php?msg=โปรดเลือกไฟล์รูปภาพ");
      }
    }
  }
  ///////////////id////////////////////////////
  if ($action=='add') {
    $result = $conn->query("SELECT menu_id FROM  menu");
    $i = 1;
    $new_id;
    while ($dt = $result->fetch_array()) {
      if ($dt['menu_id'] != $i) {
        $new_id = $i;
        break;
      }
      $i++;
    }
    if (is_null($new_id)) {
      $new_id = $i;
    }
      ////////////////////////////////////////////
      $conn->query("INSERT INTO menu (menu_id,menu_name,menu_price,menu_img,menu_type,menu_status) VALUES ('$new_id','$mname','$mprice','$imgname','$mtype','activated');");
      //echo "<script>alert('ระบบได้ทำการเพิ่มเมนูเรียบร้อยแล้ว'); window.location='../view/add_menu.php';</script>";
      header("location:../view/add_menu.php?msg=ระบบได้ทำการเพิ่มเมนูเรียบร้อยแล้ว".$conn->error);
  }elseif($action=='edit') {
    $conn->query("UPDATE menu SET menu_name='$mname',menu_price='$mprice',menu_type='$mtype',menu_img='$imgname' WHERE menu_id='$edit_id'") or die('<script>alert("1");</script>');
    //echo "<script>alert('ระบบได้ทำการแก้ไขเมนูเรียบร้อยแล้ว'); window.location='../view/all_menu.php';</script>";
    header("location:../view/all_menu.php?msg=ระบบได้ทำการแก้ไขเมนูเรียบร้อยแล้ว");
  }
}
  

?>