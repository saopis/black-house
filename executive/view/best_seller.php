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
<div class="bg-img" style="background-image: url('../../image/gallery/1.jpg'); ">
	<div class="overlay"></div>
</div>
<!-- /Background Image -->
<!-- home wrapper -->
<div class="myheader-wrapper">
	<div class="container">
		<div class="row">

			<!-- home content -->
			<div class="col-md-10 col-md-offset-1">
				<div class="myheader-content">
					<h1 class="white-text">รายการอาหารยอดนิยม</h1>
				</div>
			</div>
			<!-- /home content -->

		</div>
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
	.img-pop{
		width: 300px; 
		height: 250px;
		margin: 10px;
	}
	@media screen and (max-width: 985px) {
		.img-pop{
			width: 180px; 
			height: 120px;
		}
	}
</style>
<div class="section sm-padding bg-grey">
	<center>
		<div class="title">
			<form action="best_seller.php" method="POST">
            <div class="input-group col-md-3" style="margin: 10px;">
                <input type="text" class="form-control datepicker" name="get_date" id="table" autocomplete="off" placeholder="ป้อนเดือนที่ต้องการค้นหา :">
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
    <!--div id="container" class="container" style="background-color: white; padding:7%; padding-left: 5%;padding-right: 5%;">

    </div>
    <br>
    <!-- Container -->
    <div class="container" style="background-color: white; padding:7%; padding-left: 5%;padding-right: 5%;">
		<center>
			<h3>
			<?php

				 $title="";
				 $title.="รายการอาหารยอดนิยมประจำเดือน ";
				 $menu_name="";
				
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
				
				$title.= $thaimonth[$month-1]." ".($year+543);
				echo $title ;
			?>
			</h3>
			<br>
			<table class="table-bordered text-center">
				<thead>
					<th style="width: 70px;">ลำดับ</th>
					<th>รายการอาหาร</th>
					<th style="width: 100px;">ยอดการสั่ง</th>
				</thead>
				<tbody>
					<?php 
						$date=$year."-".$month;
						$sql="	SELECT menu_id,order_quantity,order_name,order_img ,SUM(order_quantity) AS sum_quantity  FROM `order`
								WHERE order_status='paid' AND order_datetime LIKE '$date%' 
								GROUP BY menu_id ORDER BY sum_quantity DESC ;";
						$i=1;
						$result=$conn->query($sql);
						if ($result->num_rows==0) {
							echo '<tr><td colspan="3"><h3>ไม่มีข้อมูล</h3></td></tr>';
						}
						while ($data=$result->fetch_array()) {
							if ($i>20) {
								continue;
							}
					 ?>
					<tr>
						<td><h1><?php echo $i; ?></h1></td>
						<td><img class="img-pop" src="../../image/menu/<?php echo $data['order_img']; ?>" alt=""><br><h3><?php echo $data['order_name']; ?></h3></td>
						<td><h3><?php echo $data['sum_quantity']; ?></h3></td>
					</tr>
				<?php 
					 $i++;
					} 
				?>
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
		format: 'mm-yyyy',
      	viewMode: "months", 
    	minViewMode: "months",
      	autoclose: true,
      	"language":"th",
    });
    /*var title="<?php echo $title ;?>";
    var menu ='<?php echo $menu_name; ?>';
    var arrmenu = menu.split(",");
    arrmenu.splice(arrmenu.length-1, 1);
	console.log(arrmenu);
	console.log(arrmenu.length);
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
	            text: 'ยอดการสั่ง'
	        }
	    },
	    xAxis: {
	        categories: arrmenu,
	        title: {
	            text: 'รายการอาหาร'
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

	});*/
});
</script>