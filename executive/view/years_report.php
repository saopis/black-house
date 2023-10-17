<?php session_start();

if ($_SESSION['ses_role'] == "ผู้จัดการ"||$_SESSION['ses_role_second'] != "") {
	include "../../include/header.php";
	include "../../include/conn.php";

?>
<!-- datepicker -->
<link type="text/css" rel="stylesheet" href="../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css" />
<!-- highcharts -->
<link type="text/css" rel="stylesheet" href="../../plugins/Highcharts-6.1.0/code/css/highcharts.css" />
<!-- Background Image -->
<div class="bg-img " style="background-color: #FCFCFF;//background-image: url('../../image/gallery/1.jpg');">
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
	td{	
		padding: 5px;
		/*padding-left:5px;
		padding-right:5px;*/
	}
</style>
<div class="section sm-padding bg-grey">
	<center>
		<div class="title">
			<form action="years_report.php" method="POST">
            <div class="input-group col-md-3" style="margin: 10px;">
                <input type="text" class="form-control datepicker" name="get_date" autocomplete="off" id="table" placeholder="ป้อนปีที่ต้องการค้นหา :">
                <div class="input-group-btn">
                  <button class="btn btn-default" type="submit" id="search_tb">
                    <i class="glyphicon glyphicon-search"></i>
                  </button>
                </div>
            </div>
        	</form>
         </div>
	</center>.\
	<!-- Container -->
    <div id="container" class="container" style="background-color: white; padding:7%; padding-left: 5%;padding-right: 5%;">

    </div>
    <br>
    <!-- Container -->
    <div class="container" style="background-color: white; padding:7%; padding-left: 5%;padding-right: 5%;">
		<center>
			<h3> 
			<?php
			 $title='';
			 $title.='บัญชีรายรับรายจ่ายประจำปี ';
				$get_date=$_POST['get_date'];
				if ($_POST['get_date']) {
					$year=$get_date;
					$month=12;
				}else {
					$today=date("d"); 
					$year=date("Y");
					$month=date("m");
				}
				$title.= $year+543;
				echo $title;
			?>
			</h3>
			<br>
			<table class="table-bordered text-center ">
				<thead>
					<tr>
						<th style="width: 10%;">ลำดับ</th>
						<th>เดือน</th>
						<th style="width: 20%;">รายรับ</th>
						<th style="width: 20%;">รายจ่าย</th>
						<th style="width: 20%;">คงเหลือ</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$sum_get=0;
					$sum_give=0;
					$arr_month='';
					$all_epd_arr='';
					$all_get_arr='';
					$dif_total_arr='';
					for ($i = 1; $i <= $month; $i++) {
						if (strlen($i)==1) {
							$index = substr("00".$i, -2);
						}else {
							$index =$i;
						}
						$now=$year."-".$index;
						$order_price=$conn->query("SELECT SUM(order_price) FROM `order_bill` WHERE order_datetime LIKE '$now%'")->fetch_array() or die($conn->error);
						$sum_get+=$order_price[0];

						$row_material=$conn->query("SELECT SUM(bill_price) FROM `bill_material` WHERE bill_date_confirm LIKE '$now%';")->fetch_array() or die($conn->error);
						$more_expenditure=$conn->query("SELECT SUM(epd_price) FROM `expenditure` WHERE epd_date LIKE '$now%'")->fetch_array() or die($conn->error);
						$sum_give+=$row_material[0]+$more_expenditure[0];
						$give=$row_material[0]+$more_expenditure[0];
						$dif=$order_price[0]-$give;
						if ($give==0) {
							$give='';
						}
						if ($dif==0) {
							$dif='';
						}	

						$arr_month.=$thaimonth[($i-1)].",";

						if ($give=='') {
							$all_epd_arr.='0'.",";
						}else {
							$all_epd_arr.=$give.",";
						}
						if ($order_price[0]=='') {
							$all_get_arr.='0'.",";
						}else {
							$all_get_arr.=$order_price[0].",";
						}
						if ($dif=='') {
							$dif_total_arr.='0'.",";
						}else {
							$dif_total_arr.=$dif.",";
						}
							
							
							echo '<tr>';
							echo '<td>'.$i.'</td>';
							echo '<td style="text-align:left; padding-left:20px"><a href="months_report.php?get_date='.$index."-".$year.'">'.$thaimonth[($i-1)].'</a></td>
									<td>'.$order_price[0].'</td>
									<td>'.$give.'</td>';
							echo '<td>'.$dif.'</td>';
							echo '</tr>';
						
							} 
							$total=$sum_get-$sum_give
						 ?>
					<tr>
						<td colspan="2">รวม</td>
						<td><?php echo $sum_get;?></td>
						<td><?php echo $sum_give;?></td>
						<td><?php echo $total;?></td>
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
<script src="../../plugins/Highcharts-6.1.0/code/js/highcharts.js"></script>
<script src="../../plugins/Highcharts-6.1.0/code/js/modules/data.js"></script>
<script src="../../plugins/Highcharts-6.1.0/code/js/modules/series-label.js"></script>
<script src="../../plugins/Highcharts-6.1.0/code/js/modules/exporting.js"></script>
<script src="../../plugins/Highcharts-6.1.0/code/js/modules/export-data.js"></script>
<script>
$(document).ready(function() {
	$(".datepicker").datepicker({
		format: 'yyyy',
		"language":"th",
      	viewMode: "years", 
    	minViewMode: "years",
      	autoclose: true,
    });
    var title="<?php echo $title;?>";

	var month ='<?php echo $arr_month; ?>';
    var arrmonth = month.split(",");
    arrmonth.splice(arrmonth.length-1, 1);
	console.log(arrmonth);
	console.log(arrmonth.length);


	var all_epd ='<?php echo $all_epd_arr; ?>';
    var all_epd_arr = all_epd.split(",");
    all_epd_arr.splice(all_epd_arr.length-1, 1);
    var data_give=[];
    for (var i = 0; i < all_epd_arr.length; i++) {
    	data_give.push(parseInt(all_epd_arr[i]));
    }
	console.log(data_give);
	console.log(data_give.length);

	var all_get ='<?php echo $all_get_arr; ?>';
    var all_get_arr = all_get.split(",");
    all_get_arr.splice(all_get_arr.length-1, 1);
    var data_get=[];
    for (var i = 0; i < all_get_arr.length; i++) {
    	data_get.push(parseInt(all_get_arr[i]));
    }
	console.log(data_get);
	console.log(data_get.length);

	var dif_total ='<?php echo $dif_total_arr; ?>';
    var dif_total_arr = dif_total.split(",");
    dif_total_arr.splice(dif_total_arr.length-1, 1);
    var data_dif=[];
    for (var i = 0; i < dif_total_arr.length; i++) {
    	data_dif.push(parseInt(dif_total_arr[i]));
    }
	console.log(data_dif);
	console.log(data_dif.length);


     Highcharts.chart('container', {
    	chart: {
	        type: 'column'
	    },

	    title: {
	        text: title
	    },

	    subtitle: {
	        text: ''
	    },

	    yAxis: {
	        title: {
	            text: 'จำนวนเงิน'
	        }
	    },
	    xAxis: {
	        categories: arrmonth,
	        title: {
	            text: 'เดือน'
	        }
	    },
	    legend: {
	        layout: 'vertical',
	        align: 'right',
	        verticalAlign: 'middle'
	    },

	     plotOptions: {
	        line: {
	            dataLabels: {
	                enabled: false
	            },
	            enableMouseTracking: true
	        }
	        
	    },

	    series: [{
	        name: 'รายรับ',
	        data: data_get
	    }, {
	        name: 'รายจ่าย',
	        data: data_give
	    }, {
	        name: 'คงเหลือ',
	        data: data_dif
	    }],

	    responsive: {
	        rules: [{
	            condition: {
	                maxWidth: 500
	            },
	            chartOptions: {
	                legend: {
	                    layout: 'horizontal',
	                    align: 'center',
	                    verticalAlign: 'bottom'
	                }
	            }
	        }]
	    }

	});
});
</script>