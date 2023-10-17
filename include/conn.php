<?php
$conn = new mysqli("localhost", "root", "root", "project");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->query("SET NAMES UTF8");
$conn->query("SET character_set_results=UTF8");
$conn->query("SET character_set_client=UTF8");
$conn->query("SET character_set_connection=UTF8");

date_default_timezone_set('Asia/Bangkok');
$thaiweek=array("วันอาทิตย์","วันจันทร์","วันอังคาร","วันพุธ","วันพฤหัส","วันศุกร์","วันเสาร์"); 
$thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"); 
//echo $thaiweek[date("w")] ,"ที่",date(" j "), $thaimonth[date(" m ")-1] , " พ.ศ. ",date(" Y ")+543; 

function date_convert($str_date)
{
    $str_date_exp = explode("/", $str_date);
    @$date_str = "$str_date_exp[2]-$str_date_exp[1]-$str_date_exp[0]";
    @$date = date_format(date_create($date_str), "Y-m-d");
    return $date;
}

function thai_day($str_date)
{	
	$thaimonth=array("มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"); 
    $str_date_exp = explode("-", $str_date);
    @$date_str = "$str_date_exp[2] / ".$thaimonth[($str_date_exp[1]-1)]." / $str_date_exp[0]";
    @$date = $date_str;
    return $date;
}

?>
