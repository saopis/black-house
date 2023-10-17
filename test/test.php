<?php
include "../include/conn.php";
$result = $conn->query("SELECT user_id FROM  user");
$i = 1;
$new_id;
while ($dt = $result->fetch_array()) {

	if ($dt['user_id'] != $i) {
		$new_id = $i;
		echo "<br>new id n : " . $new_id;
		break;
	}
	echo $dt['user_id'] . "_";
	$i++;
}
if (is_null($new_id)) {
	$new_id = $i;
	echo "<br>new id : " . $new_id;
}

echo "<br>".thai_day(date("Y-m-d"))."<br>";
$name=[];
$rs=$conn->query("SELECT emp_name FROM `order_bill` WHERE emp_name!=''");
while ($epm_sr=$rs->fetch_assoc()) {
    array_push($name, $epm_sr['emp_name']);
}
foreach ($name as $x) {
	echo $x.'<br>';
}
?>