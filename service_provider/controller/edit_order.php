<?php 
session_start();
$table=$_POST['table'];
$id = $_POST['order_id-dt'];
$type = $_POST['order_type-dt'];
$quantity = $_POST['quantity-dt'];
$fried_egg = $_POST['fried_egg-dt'];
$omelet = $_POST['omelet-dt'];
$note = $_POST['note-dt'];
$n=0;
if(!isset($_SESSION["table"])){
	$_SESSION["table"]=$table;
}
for ($i = 0; $i < count($id); $i++) {
	$item_array=array();
	if ($type[$i]=='ข้าวจานเดียว') {
		$item_array = array(
                     'order_id'             =>     $id[$i],
                     'order_quantity'       =>     $quantity[$i],
                     'order_fried_egg'      =>     $fried_egg[($i-$n)],
                     'order_omelet'         =>     $omelet[($i-$n)],
                     'order_note'           =>     $note[$i]
              	);
	}else {
		$n++;
		$item_array = array(
                     'order_id'             =>     $id[$i],
                     'order_quantity'       =>     $quantity[$i],
                     'order_fried_egg'      =>     '',
                     'order_omelet'         =>     '',
                     'order_note'           =>     $note[$i]
              	);
	}
	
	foreach ($_SESSION['order'] as $key => $value) {
	    if($value['order_id']==$id[$i]){
	        $_SESSION['order'][$key]=$item_array;
	        //echo '<script>alert("ลบเรียบร้อย")</script>';
	    }
	}
}
header("location:../view/order.php");

?>