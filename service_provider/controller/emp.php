<?php 
	require '../../include/conn.php';
	$name=$_POST['index_name'];
	$rs=$conn->query("SELECT DISTINCT emp_address FROM order_bill WHERE emp_name='$name' ORDER BY order_bill_no");
	$arr_add="";
	while ($data=$rs->fetch_array()) {
	    $arr_add.= $data['emp_address'].",";
	}
	echo $arr_add;
?>