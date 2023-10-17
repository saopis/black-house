<!-- Footer -->
	<footer id="footer" class="sm-padding bg-dark">

		<!-- Container -->
		<div class="container">

			<!-- Row -->
			<div class="row">

				<div class="col-md-12">

					<!-- footer logo -->
					<div class="footer-logo">
						<a href="index.php"><img src="../../image/gallery/logo.png" alt="logo" style="width: 200px;"></a>
					</div>
					<!-- /footer logo -->

					<!-- footer follow -->
					<ul class="footer-follow">
						<li><a href="#"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="#"><i class="fa fa-instagram"></i></a></li>
						<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="#"><i class="fa fa-youtube"></i></a></li>
					</ul>
					<!-- /footer follow -->

					<!-- footer copyright -->
					<div class="footer-copyright">
						<p>Copyright © 2017. All Rights Reserved. Designed by <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
					</div>
					<!-- /footer copyright -->

				</div>

			</div>
			<!-- /Row -->

		</div>
		<!-- /Container -->

	</footer>
	<!-- /Footer -->
	
	<!-- Back to top -->
	<div id="back-to-top"></div>
	<!-- /Back to top -->

	<!-- Preloader -->
	<div id="preloader">
		<div class="preloader">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
<!-- /Preloader -->

<!-- jQuery Plugins -->
<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI -->
<script src="../../bower_components/jquery-ui/external/jquery/jquery.js"></script>
<script src="../../bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../../assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="../../assets/js/jquery.magnific-popup.js"></script>
<script type="text/javascript" src="../../assets/js/main.js"></script>

<!-- Select2 -->
<script src="../../bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- bootstrap Select -->
<script src="../../bower_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
<script>
	$('.select2').select2();
</script>
<!-- cropper -->
<script src="../../plugins/cropper/cropper.min.js"></script>

<!-- custom js -->
<script src="../../assets/js/theme_select.js"></script>
<?php if ($_GET) {
	$msg=$_GET['msg'];
} ?>
</body>

</html>
<script>

  document.addEventListener("DOMContentLoaded", function() {
  	var elements = $("INPUT[type='text']");
  	for (var i = 0; i < elements.length; i++) {
  	    elements[i].oninvalid = function(e) {
  	        e.target.setCustomValidity("");
  	        if (!e.target.validity.valid) {
  	            e.target.setCustomValidity("กรุณากรอกข้อมูลด้วยครับ");
  	        }
  	    };
  	    elements[i].oninput = function(e) {
  	        e.target.setCustomValidity("");
  	    };
  	}
  })
  
  $(".img-profile").on("change",function(e){
    var output = document.getElementById('ex_img_pro');
    output.src = URL.createObjectURL(event.target.files[0]);
    var img_x;
    var img_y;
    var img_w;
    var img_h;
    $("#ex_img_pro").cropper({
      aspectRatio: 1 / 1,
      crop: function(e) {
        // Output the result data for cropping image.
        /*console.log(e.x);
        console.log(e.y);
        console.log(e.width);
        console.log(e.height);
        console.log(e.rotate);
        console.log(e.scaleX);
        console.log(e.scaleY);*/
        $("#x").val(e.x);
        $("#y").val(e.y);
        $("#w").val(e.width);
        $("#h").val(e.height);
      }
    });
  });


</script>
<script>
	var ses_role ="<?php echo $_SESSION['ses_role']; ?>";
	if (ses_role=='ผู้จัดการ') {
		setInterval("executive()",1000);
		function executive() {
			$.ajax({
				url: '../../executive/controller/notice.php',
				type: 'POST',
			})
			.done(function(data) {
				$("#new-user").html(data);
		        if (data!="") {
		          var dt =data.split(",");
		          dt.splice(dt.length-1, 1);
		          for (var i = 0; i < dt.length; i++) {
		          	if (dt[i]==1) {
		          		$(".notice_user").show();
		          	}else {
		          		$(".notice_menu").hide();
		          	}
		          	if (dt[i]==2) {
		          		$(".notice_menu").show();
		          	}else{
		          		$(".notice_menu").hide();
		          	}
		          }
		        }else {
		          $(".notice").hide();
		        }
			});
		}
    	

		/*setInterval("executive()",500);
		function executive() {
			$.ajax({
				url: '../../executive/controller/notice.php',
				type: 'POST',
			})
			.done(function(data) {
				$("#new-user").html(data);
		        if (data!="") {
		          $("#notice").addClass('notice-nav');
		        }else {
		          $("#notice").removeClass('notice-nav');
		        }
			});
		}*/
	}
	if (ses_role=='พนักงานซื้อวัตถุดิบ') {
		setInterval("supply()",500);
		function supply() {
			$.ajax({
				url: '../../supply_officer/controller/notice.php',
				type: 'POST',
			})
			.done(function(data) {
		        if (data=="1") {
		          $(".notice").show();
		        }else {
		          $(".notice").hide();
		        }
			});
		}
	}

	if (ses_role=='พนักงานทำอาหาร') {
		setInterval("chefs()",500);
		function chefs() {
			$.ajax({
				url: '../../chefs/controller/notice.php',
				type: 'POST',
			})
			.done(function(data) {
		        if (data=="1") {
		          $(".notice_order").show();
		        }else {
		          $(".notice_order").hide();
		        }
			});
		}
	}
	$(document).ready(function($) {
		var msg="<?php echo $msg; ?>";
		if (msg!="") {
			setTimeout(function() {
  				alert(msg)
  			}, 1000);

		}
 		
	});	
</script>
