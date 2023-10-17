<?php 
session_start();
if ($_POST['action']=='get-order') {
	


      if(isset($_SESSION["order"]))
      {
           $item_array_id = array_column($_SESSION["order"], "order_id");
           if(!in_array($_POST["id"], $item_array_id))
           {
                $count = count($_SESSION["order"]);
                $item_array = array(
                     'order_id'            =>     $_POST["id"],
                     'order_quantity'      =>     $_POST["quantity"],
                     'order_fried_egg'     =>     $_POST["fried_egg"],
                     'order_omelet'        =>     $_POST["omelet"],
                     'order_note'          =>     $_POST["note"]
                );
                $_SESSION["order"][$count] = $item_array;
           }
           else
           {
                echo '<script>alert("สินค้านี้มีอยู่แล้วในรายการ")</script>';
           }
      }
      else
      {
           $item_array = array(
                     'order_id'             =>     $_POST["id"],
                     'order_quantity'       =>     $_POST["quantity"],
                     'order_fried_egg'      =>     $_POST["fried_egg"],
                     'order_omelet'         =>     $_POST["omelet"],
                     'order_note'           =>     $_POST["note"]
              	);
           $_SESSION["order"][0] = $item_array;
      }
}
if ($_POST['action']=='del-order') {
  	foreach ($_SESSION['order'] as $key => $value) {
      if($value['order_id']==$_POST['id']){
        unset($_SESSION['order'][$key]);
        //echo '<script>alert("ลบเรียบร้อย")</script>';
      }
    }
} 

if ($_POST['action']=='edit') {
  include"../../include/conn.php";
  $id=$_POST['id'];
  $quantity=$_POST['quantity'];
  $fried_egg=$_POST['fried_egg'];
  $omelet=$_POST['omelet'];
  $note=$_POST['note'];
  $conn->query("UPDATE `order` SET order_quantity='$quantity',order_fried_egg='$fried_egg',order_omelet='$omelet',order_note='$note' WHERE order_id='$id'");
}
if ($_POST['action']=='del') {
  include"../../include/conn.php";
  $id=$_POST['id'];
  $conn->query("DELETE FROM `order` WHERE order_id='$id'");
}

if ($_POST['action']=='del-allorder') {
	unset($_SESSION['order']);
  unset($_SESSION['table']);
}
      $all_quantity=0;
      for ($i = 0; $i < count($_SESSION["order"]) ; $i++) {
      	 $all_quantity += $_SESSION["order"][$i]['order_quantity'];
      }
      echo count($_SESSION["order"]).",".$all_quantity;
      //echo count($_SESSION['order']);
      
/*if(isset($_GET['action'])){
  if($_GET['action']=="delete"){
  foreach ($_SESSION['order'] as $key => $value) {
    if($value['item_id']==$_GET['id']){
        unset($_SESSION['order'][$key]);
        echo '<script>alert("ลบเรียบร้อย")</script>';
        echo '<script>window.location="index.php"</script>';
      }
    }
  }
}*/
 ?>