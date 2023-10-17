<?php 
	include"../include/conn.php";
	include"../lib/IMager/imager.php";
	session_start();
	$id=$_SESSION['ses_id'];
	$pad_x=$_POST['x'];
	$pad_y=$_POST['y'];
	$img_width=$_POST['w'];
	$img_height=$_POST['h'];
	$fileName = basename($_FILES['fileUpload']['name']);
	$filetype = pathinfo($fileName, PATHINFO_EXTENSION);
	$name =  $_SESSION['ses_nikname'].".".$filetype;
	$target_dir = "../image/profile";
	$upload_path = $target_dir ."/". $name;
	$fileacept = array("png", "jpg", "jpeg","gif","PNG","JPG","JPEG","GIF");

	if ($_FILES['fileUpload']['error']) {
		echo ("<script>alert(".$_FILES['fileUpload']['error'].");  window.location='../index.php';</script>");
	}else {
	
		if (in_array($filetype, $fileacept)) {
			$img= image_upload('fileUpload');
			$new_img=image_crop($img,TOP_LEFT,$img_width,$img_height,$pad_x,$pad_y);
			//image_echo($new_img);
			image_save($new_img,$upload_path);
			/*if (file_exists($upload_path)) {

				//$newName="../upload/".$name[0]."_copy".".".$filetype;
				//chmod($newName,0755); //Change the file permissions if allowed
				unlink($upload_path); //remove the file
				//$check=move_uploaded_file($_FILES['fileUpload']['tmp_name'], $newName);
			}

			$check = move_uploaded_file($_FILES['fileUpload']['tmp_name'], $upload_path);
			chmod($upload_path, 0755); //Change the file permissions if allowed
			if ($check == false) {
				echo ("can not move");
			}*/

			$conn->query("UPDATE user SET user_image='$name' WHERE user_id= $id");
			$_SESSION['ses_image']=$name;
			header("location:manage_user.php");
		}
		echo ("<script>alert('กรุณาเลือกไฟล์รูปภาพ'); window.location='../index.php';</script>");
	}
	
 ?>
