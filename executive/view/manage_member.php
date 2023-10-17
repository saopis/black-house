<?php
session_start();
if ($_SESSION['ses_role'] == "ผู้จัดการ"||$_SESSION['ses_role_second'] != "") {
	include "../../include/header.php";

	?>
<style>
  
</style>
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
            <div class="myheader-content"  style="">
              <?php
                $action = $_GET['action'];
                  

                  if ($action == 'all') {
                    echo '<h1 class="white-text">รายชื่อพนักงานทั้งหมด</h1>';
                  } elseif ($action == 'wait') {
                    echo '<h1 class="white-text">รายชื่อพนักงานรอการอนุมัติ</h1>';
                  } elseif ($action == 'blocked') {
                    echo '<h1 class="white-text">รายชื่อพนักงานที่ถูกบล็อก</h1>';
                  }
                  
                  ?>
            </div>
          </div>
          <!-- /home content -->

        </div>
      </div>
    </div>
    <!-- /home wrapper -->

  </header>
  <!-- /Header -->

<!-- Default box -->

    <center>
      <?php 
        echo "<br><span id='span-search'>";
        $search='<div id="div_search" class="input-group search" >
              <input type="text" class="form-control" id="search" name="cheque" placeholder="ค้นหา : ชื่อ อีเมล ตำแหน่ง เพศ เบอร์โทร.">
              <div class="input-group-btn">
                <button id="btn-search" class="btn btn-default" type="submit">
                  <i class="glyphicon glyphicon-search"></i>
                </button>
              </div>
            </div>';

          echo $search;
        
        echo '</span>';
      ?>
    
    <hr>
    </center>
    <div id="data" class=" data">
    
    </div>

    <br style="clear: both;">
    <hr>
    

<?php
include "../../include/footer.php";
} else {
  header("location:../../controller/manage_user.php");
}
?>
<script>
  var action = '<?php echo $action; ?>';
  var my_role ="<?php echo $_SESSION['ses_role']; ?>";
  var search = '<div id="div_search" class="input-group search" ><input type="text" class="form-control" id="search" name="cheque" placeholder="ค้นหา : ชื่อ อีเมล ตำแหน่ง เพศ เบอร์โทร."><div class="input-group-btn"><button id="btn-search" class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button></div></div>';

  $("#data").html("<br><br><center><img src='../../image/loading4.gif' width='20%'></center><br><br>");

  
    $.ajax({
        method: "POST",
        url: "../controller/customer_large_ajax.php",
        data: {action: action}
      })
      .done(function( data ) {
        if (data!='') {
          $("#data").html(data);
        }else {
          $("#data").html('<center><h4>== ไม่รายชื่อพนักงานรอการอนุมัติ ==</h4></center>');
        }
      });

  //search
 /* $("#search").on("input",function(e){
      var search_data = $("#search").val();
      $.ajax({
        method: "POST",
        url: "../controller/customer_large_ajax.php",
        data: {search_data: search_data,action: action}
      })
      .done(function( data ) {
        $("#data").html(data);
        $('.table').DataTable();
      });
  });*/
  $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#data .member").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
</script>