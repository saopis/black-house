<?php session_start();

if ($_SESSION['ses_role'] == "ผู้จัดการ"||$_SESSION['ses_role_second'] != "") {
	include "../../include/header.php";
	include "../../include/conn.php";

?>
<!-- datepicker -->
<link type="text/css" rel="stylesheet" href="../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" />

<!-- Background Image -->
<div class="bg-img" style="background-color: #FCFCFF;//background-image: url('../../image/gallery/1.jpg');">
	<div class="overlay"></div>
</div>
<!-- /Background Image -->
<!-- home wrapper -->
<div class="myheader-wrapper">
	<div class="container">
		
	</div>
</div>
<!-- /home wrapper -->

</header>
<!-- /Header -->

<style>
	table{
		width: 100%;
	}
	th{
		text-align: center;
		background-color: #008080;
		color: white;
		padding: 5px;

	}
	td{	padding: 5px;
		/*padding-left:5px;
		padding-right:5px;*/
	}
</style>
<div class="section sm-padding bg-grey">
	
    <!-- Container -->
    <div class="container material" style="background-color: white; padding:7%; padding-left: 5%;padding-right: 5%;">
		<center>
			<h2>รายงานการสั่งซื้อวัตถุดิบและอุปกรณ์ 
			<?php
				
				if ($_POST['get_date']) {
					$get_date=explode("-", $_POST['get_date']);
					$year=$get_date[2];
					$month=$get_date[1];
					$day=$get_date[0];
					$now=$year."-".$month."-".$day;
				}elseif ($_GET['get_date']) {
					$get_date=explode("-", $_GET['get_date']);
					$year=$get_date[0];
					$month=$get_date[1];
					$day=$get_date[2];
					$now=$year."-".$month."-".$day;
				}else{
					$today=date("d"); 
					$year=date("Y");
					$month=date("m");
				}

				//$today=date("d");
				
				echo '<p><span style="font-size:30px;">'.$day." ".$thaimonth[$month-1]." ".($year+543)."</span></p>";
			?>
			</h2>
			<br>
			<table class="table-bordered text-center ">
				<thead>
					<tr>
						<th style="width: 10%;">ลำดับ</th>
						<th>รายการ</th>
						<th style="width: 20%;">จำนวน</th>
						<th style="width: 20%;">ราคา</th>
						<th style="width: 20%;">ดูใบเสร็จ</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$sum_num=0;
					$sum_price=0;
					$i=1;
					$result=$conn->query("SELECT * FROM `bill_material` WHERE bill_date_confirm LIKE '$now%';");
					while ($data=$result->fetch_array()) {
						$sum_num+=$data['material_num'];
						$sum_price+=$data['bill_price'];
					    echo '<tr>';
						echo '	<td>'.$i.'</td>';
						echo '	<td style="text-align:left; padding-left:20px;">'.$data['material_name'].'</td>
								<td>'.$data['material_num']." ".$data['units'].'</td>
								<td>'.$data['bill_price'].'</td>';
						echo '	<td><a class="lightbox" href="../../image/bill/bill_img.php?img_id='.$data['bill_img_id'].'"><button type="button" class="btn btn-info view_bill"><i class="fa fa-file-text"></i></button></a></td>';
						echo '</tr>';
						$i++;
					}
						
					?>
					<tr>
						<td colspan="3">รวม</td>
						<td><?php echo $sum_price; ?></td>
						<td><?php echo $dif_total; ?></td>
					</tr>
				</tbody>
			</table>
		</center>
    </div>
</div>
<?php
include "../../include/footer.php";
} else {
	header("location:../../controller/manage_user.php");
}
?>
<!-- jQuery 3 -->
<script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="../../bower_components/bootstrap-datepicker/js/locales/bootstrap-datepicker.th.js"></script>
<script>
$(document).ready(function() {
	$(".datepicker").datepicker({
		format: 'dd-mm-yyyy',
      	autoclose: true,
      	"language":"th",
    });
    $(document).on('focusin', '.datepicker', function(event) {
    	event.preventDefault();
    	$(".datepicker").datepicker('setDate', new Date())
    });
    $('.material').magnificPopup({
		delegate: '.lightbox',
		type: 'image'
	});
});
</script>