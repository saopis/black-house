<?php 
  session_start();
  $user_id=$_SESSION['ses_id'];
  include '../../include/conn.php';
  $id=$_POST['id'];
  $num=$_POST['num'];
  $price=$_POST['price'];
  $ext = pathinfo($_FILES['bill_img']['name'], PATHINFO_EXTENSION);
  $ext4check=array("png", "jpg", "jpeg","gif","PNG","JPG","JPEG","GIF");
  $n=count($id);
  $date_confirm=date("Y-m-d");
  $bill_no = $conn->query("SELECT MAX(bill_no) FROM bill_material WHERE bill_date_confirm !='';")->fetch_array();
  $bill_new_no = $bill_no[0]+1 ;
  $bill_img_id = $conn->query("SELECT MAX(bill_img_id) FROM bill_img ;")->fetch_array();
  $new_bill_img_id = $bill_img_id[0]+1 ;
  
  if (is_uploaded_file($_FILES['bill_img']['tmp_name'])) {
    if ($_FILES['bill_img']['error']!=0) {
      echo 'file error';
    }else {
      if (in_array($ext, $ext4check)) {
        $content=addslashes(file_get_contents($_FILES['bill_img']['tmp_name']));
        $name="bill_no_".$bill_new_no;
        $type=$_FILES['bill_img']['type'];
        $size=$_FILES['bill_img']['size'];
        $sql1="INSERT INTO bill_img (bill_img_id,file_name,file_type,file_size,file_content,user_id)VALUES('$new_bill_img_id','$name','$type','$size','$content','$user_id')";
        $conn->query($sql1)or die("update fale".$conn->error);

        for ($i = 0; $i < $n; $i++) {
          $sql="UPDATE bill_material SET material_num='$num[$i]', bill_price='$price[$i]',bill_no='$bill_new_no', bill_status='buy',bill_img_id='$new_bill_img_id',bill_date_confirm='$date_confirm' WHERE bill_id='$id[$i]'";
          $conn->query($sql)or die("update fale".$conn->error);
        }
        header("location:../view/order_list.php");
      }else {
        echo 'กรุณาเลือกไฟล์ประเภทรูปภาพ';
      }
      
    }
  }else {
    echo 'กรุณาเลือกไฟล์';
  }
?>