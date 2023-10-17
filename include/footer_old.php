    </section>
<br>
</div>
  <!-- /.content-wrapper -->
<footer class="main-footer">
  <div class="pull-right hidden-xs">
    <b>Version</b> beta
  </div>
  Create by :
  <strong>Masaopis Soowae</strong>
</footer>
</div>
<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>

<!-- Select2 -->
<script src="../../bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- bootstrap Select -->
<script src="../../bower_components/bootstrap-select/dist/js/bootstrap-select.js"></script>
<script>
	$('.select2').select2()
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
<!-- DataTables -->
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- cropper -->
<script src="../../plugins/cropper/cropper.min.js"></script>

<!-- custom js -->
<script src="../../assets/js/theme_select.js"></script>
<!-- filer -->

</body>
</html>
<script>
  function open_edit_image_profile() {
  	document.getElementById("edit_image_profile").style.width = "100%";
  }

  function close_edit_image_profile() {
  	document.getElementById("edit_image_profile").style.width = "0%";
  }
  $(".edit").mouseover(function(){
      $(".edit_i_t").css('display', 'block');
      $(".edit_i").css('display', 'inline');
      $("#user_name").css('margin-top','0px');
   });

  $(".edit").mouseout(function(){
      $(".edit_i_t").css('display', 'none');
      $(".edit_i").css('display', 'none');
      $("#user_name").css('margin-top','5px');
  });

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
</script>
<script>
  $.AdminLTESidebarTweak = {};

$.AdminLTESidebarTweak.options = {
    EnableRemember: true,
    NoTransitionAfterReload: false
    //Removes the transition after page reload.
};

$(function () {
    "use strict";

    $("body").on("collapsed.pushMenu", function(){
        if($.AdminLTESidebarTweak.options.EnableRemember){
            document.cookie = "toggleState=closed";
        } 
    });
    $("body").on("expanded.pushMenu", function(){
        if($.AdminLTESidebarTweak.options.EnableRemember){
            document.cookie = "toggleState=opened";
        } 
    });

    if($.AdminLTESidebarTweak.options.EnableRemember){
        var re = new RegExp('toggleState' + "=([^;]+)");
        var value = re.exec(document.cookie);
        var toggleState = (value != null) ? unescape(value[1]) : null;
        if(toggleState == 'closed'){
            if($.AdminLTESidebarTweak.options.NoTransitionAfterReload){
                $("body").addClass('sidebar-collapse hold-transition').delay(100).queue(function(){
                    $(this).removeClass('hold-transition'); 
                });
            }else{
                $("body").addClass('sidebar-collapse');
            }
        }
    } 
    
});
</script>