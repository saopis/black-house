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
		<!--div class="row">

			<!-- home content -->
			<!--div class="col-md-10 col-md-offset-1">
				<div class="myheader-content">
					<h1 class="white-text">บันชีรายรับรายจ่ายประจำเดือน</h1>
				</div>
			</div>
			<!-- /home content -->

		<!/div>
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
	<center>
		<div class="title">
			<form action="months_report.php" method="POST">
            <div class="input-group col-md-3" style="margin: 10px;">
                <input type="text" class="form-control datepicker" name="get_date" id="table" placeholder="ป้อนเดือนที่ต้องการค้นหา :">
                <div class="input-group-btn">
                  <button class="btn btn-default" type="submit" id="search_tb">
                    <i class="glyphicon glyphicon-search"></i>
                  </button>
                </div>
            </div>
        	</form>
         </div>
	</center>
    <!-- Container -->
    <div class="container" style="background-color: white; padding:7%; padding-left: 5%;padding-right: 5%;">
		<center>
			<h3>บันชีรายรับรายจ่ายประจำเดือน 
			<?php
				
				if ($_POST['get_date']) {
					$get_date=explode("-", $_POST['get_date']);
					$year=$get_date[1];
					$month=$get_date[0];
					$today=cal_days_in_month( CAL_GREGORIAN , $month , $year ) ;
				}elseif ($_GET['get_date']) {
					$get_date=explode("-", $_GET['get_date']);
					$year=$get_date[1];
					$month=$get_date[0];
					$today=cal_days_in_month( CAL_GREGORIAN , $month , $year ) ;
				}else{
					$today=date("d"); 
					$year=date("Y");
					$month=date("m");
				}
				//$today=date("d");
				
				echo $thaimonth[$month-1]." ".($year+543);
			?>
			</h3>
			<br>
			<table class="table-bordered text-center ">
				<thead>
					<tr>
						<th style="width: 10%;">ลำดับ</th>
						<th>รายการ</th>
						<th style="width: 20%;">จำนวน</th>
						<th style="width: 20%;">ราคา</th>
						<th style="width: 20%;">คงเหลือ</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$sum_get=0;
					$sum_give=0;
					for ($i = 1; $i <= $today; $i++) {
						$day="";
						if (strlen($i)==1) {
							$day = substr("00".$i, -2);
						}else {
							$day =$i;
						}
						$data=array();
						$now=$year."-".$month."-".$day;
						$order_price=$conn->query("SELECT SUM(order_price) FROM `order_bill` WHERE order_datetime LIKE '$now %'")->fetch_array() or die($conn->error);

						$sum_get+=$order_price[0];

						$row_material=$conn->query("SELECT SUM(bill_price) FROM `bill_material` WHERE bill_date_confirm LIKE '$now%';")->fetch_array() or die($conn->error);

						$more_expenditure=$conn->query("SELECT SUM(epd_price) FROM `expenditure` WHERE epd_date LIKE '$now%'")->fetch_array() or die($conn->error);

						$sum_give+=$row_material[0]+$more_expenditure[0];
						if ($order_price[0]!='') {
							$item=array(
										'tablename'=>     "detail_order_bill.php",
										'subject'  =>     "จำนวนเงินที่ได้จากการขาย",
                     					'get'      =>    $order_price[0],
                     					'give'     =>     "-"
                     					);
							if (count($data)==0) {
								$data[0]=$item;
							}else {
								$num=count($data);
								$data[$num]=$item;
							}	
						}

						if ($row_material[0]!='') {
							$item1=array(
										'tablename'=>     "detail_bill_material.php",
										'subject'  =>     "ซื้อวัตถุดิบและอุปกรณ์",
                     					'get'      =>    "-",
                     					'give'     =>     $row_material[0]
                     					);
							if (count($data)==0) {
								$data[0]=$item1;
							}else {
								$num=count($data);
								$data[$num]=$item1;
							}
						}

						if ($more_expenditure[0]!='') {
							$item1=array(
										'tablename'=>     "detail_expenditure.php",
										'subject'  =>     "ค่าใช้จ่ายต่างๆในร้าน",
                     					'get'      =>    "-",
                     					'give'     =>     $more_expenditure[0]
                     					);
							if (count($data)==0) {
								$data[0]=$item1;
							}else {
								$num=count($data);
								$data[$num]=$item1;
							}
						}

						$subject="";
						$get="";
						$give="";

						if (count($data)==0) {
							echo '<tr>';
							echo '<td>'.$i.'</td>';
							echo '<td style="text-align: left;color:red;">ไม่มีรายการ</td>
									<td></td>
									<td></td>';
							echo '<td></td>';
							echo '</tr>';
						}else {
							$dif=($order_price[0]-$row_material[0])-$more_expenditure[0];
							for ($j = 0; $j < count($data); $j++) {
								
								echo '<tr>';
								if ($j==0) {
									echo '<td rowspan="'.count($data).'">'.$i.'</td>';
								}
								
								echo '<td style="text-align: left;"><a href="'.$data[$j]['tablename'].'?get_date='.$now.'">'.$data[$j]['subject'].'</a></td>
								<td>'.$data[$j]['get'].'</td>
								<td>'.$data[$j]['give'].'</td>';
								if ($j==0) {
									echo '<td rowspan="'.count($data).'">'.$dif.'</td>';
								}
								echo '</tr>';
							}
						}
						unset($data); 
					} 
					$dif_total=$sum_get-$sum_give;
					?>
					<tr>
						<td colspan="2">รวม</td>
						<td><?php echo $sum_get; ?></td>
						<td><?php echo $sum_give; ?></td>
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
		format: 'mm-yyyy',
      	viewMode: "months", 
    	minViewMode: "months",
      	autoclose: true,
      	"language":"th",
    });
});
</script>