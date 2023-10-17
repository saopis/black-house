<style>
 .edit_i1{
  position: absolute;
  top:5px;
  right: 50px;
 }

</style>
  <!-- Modal -->
  <div class="modal fade " id="edit_image_profile" role="dialog">
    <div class="modal-dialog modal-md" style="margin-top:100px;">

      <!-- Modal content-->
      
      <div class="modal-content">
        <form method="POST" action="../../controller/save_user_img.php" enctype="multipart/form-data" >
        <div class="modal-header bg-theme">
          <button type="button" class="close" data-dismiss="modal" id="times">&times;</button>
          <h4 class="modal-title">เปลียนรูปภาพ</h4>
        </div>
        <div class="modal-body bg-theme">
            <center>
              
                <div style="width: 70%; height: 70%; padding: 5px;">
                  <img src="<?php if ($_SESSION['ses_image'] == null && $_SESSION['ses_sex'] == "ชาย") {echo "../../image/user_icon.svg";} elseif ($_SESSION['ses_image'] == null && $_SESSION['ses_sex'] == "หญิง") {echo "../../image/user_icon_female.svg";} else {echo "../../image/profile/" . $_SESSION['ses_image'];}?>" class=" image_profile edit shadow img-circle" alt="User Image" id="ex_img_pro" style="width: 100%; height: 100%; border:3px solid #ffff;">
                  
                </div>
            
              <label for="img-profile"><br>
                <input type="file" class="img-profile" name="fileUpload" id="img-profile" style="display: none;" accept="image/*">
                <div class="btn btn-outline btn-theme" style="font-size: 16px;"><i class="fa fa-cloud-upload" style="font-size: 30px;"></i> เลือกรูปภาพ</div>
              </label>
              <input type="hidden" name="x" id="x">
              <input type="hidden" name="y" id="y">
              <input type="hidden" name="w" id="w">
              <input type="hidden" name="h" id="h">
            </center>
            <br>
        </div>
        <div class="modal-footer">
            <center>
                <button type="submit" class="btn btn-outline primary">บันทึก</button>
                <button type="button" class="btn btn-outline danger" data-dismiss="modal">ยกเลิก</button>
            </center>
        </div>
        </form>
      </div>
      

    </div>
  </div>
</form>