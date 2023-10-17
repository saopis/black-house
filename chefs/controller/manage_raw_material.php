<?php 
session_start();
$user_id=$_SESSION['ses_id'];
include"../../include/conn.php";
$wait4buy=array();
$isSame=array();
$data=$conn->query("SELECT material_name FROM bill_material WHERE bill_status='not buy'");
while ($x=$data->fetch_array()) {
  array_push($wait4buy, $x['material_name']);
}
/////////////// no obj menu /////////////////////
if ($_POST['action']=='add_obj') {
  $name=$_POST['rmaterial_name'];
  $obj_num=count($name);
  for ($j = 0; $j < $obj_num; $j++) {
    $conn->query("INSERT INTO raw_material (material_name) VALUES ('$name[$j]')")or die("ไม่สามารถเพิ่มได้");

  }
  echo "<script> window.location='../view/add_raw_material.php'; alert('เพิ่มตัววัตถุดิบ');</script>";
}

if ($_POST['action']=='check') {
  $name=$_POST['name_material'];
  $result=$conn->query("SELECT material_name FROM raw_material WHERE material_name='$name'");
  if ($result->num_rows>=1) {
    echo 'same';
  }
}
if ($_POST['action']=='del') {
  $name=$_POST['material_name'];
  $result=$conn->query("DELETE FROM raw_material WHERE material_name='$name'");
  echo 'Del success';
}
if ($_POST['action']=='delBill') {
  $id=$_POST['id'];
  $result=$conn->query("DELETE FROM bill_material WHERE bill_id='$id'");
  //echo 'Del success';
  header("location:../view/buy_obj_list.php");
}


//////////buy obj///////////////
if ($_POST['action']=='buy_obj') {
  $material_name=$_POST['rmaterial_name']; 
  $material_num=$_POST['rmaterial_num'];
  $units=$_POST['units'];
  $obj_num=count($material_name);
  //$bill_no = $conn->query("SELECT MAX(bill_no) FROM bill_material WHERE bill_date_confirm !='';")->fetch_array();
  //$bill_new_no = $bill_no[0]+1 ;
  //echo $bill_new_no;
  $bill_date=date("Y-m-d");
  //echo $bill_date;
  for ($i = 0; $i < $obj_num; $i++) {
    if (in_array($material_name[$i], $wait4buy)) {
      array_push($isSame, $material_name[$i]);
    }else {
      $result=$conn->query("INSERT INTO bill_material (bill_date,material_name,material_num,bill_status,units,user_id)VALUES('$bill_date','$material_name[$i]','$material_num[$i]','not buy','$units[$i]','$user_id');") or die("ไม่สำเร็จ". $conn->error);
    }
  }
  if (count($isSame)<1) {
    header("location:../view/buy_obj_list.php");
  }else {
    ?>
    <script>
      var same=<?php echo json_encode($isSame); ?>;
      console.log(same);
      alert('รายการ : '+same+' มีในรายการสั่งซื้อแล้ว'); 
      window.location='../view/buy_obj_list.php';
    </script>
    <?php
  }
  
}
if ($_POST['action']=='edit_bill') {
  $id=$_POST['id'];
  $material_name=$_POST['rmaterial_name']; 
  $material_num=$_POST['rmaterial_num'];
  $units=$_POST['units'];
  $bill_date=date("Y-m-d");
  $result=$conn->query("UPDATE bill_material SET material_name='$material_name',material_num='$material_num',
  units='$units', bill_date='$bill_date', user_id='$user_id' WHERE bill_id='$id'")or die('error'.$conn->error);
  header("location:../view/buy_obj_list.php");
}
?>