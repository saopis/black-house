<?php 
	$data1=$_POST['text1'];
	$data2=$_POST['text2'];
	$i=1;
	foreach ($data1 as $x) {
		foreach ($data2 as $y) {
		echo "Textbox #".$i." : "."text1 : ".$x."&nbsp;&nbsp; text2 : ".$y."<br>";	$i++;
		}	
	}
 ?>