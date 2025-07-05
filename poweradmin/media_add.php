<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');

if(isset($_POST['MM_Media_New']) && $_POST['MM_Media_New'] == 'Media New')
 {
	if($_FILES['thumb_image']['name'] != '')
	 {
		//upload the image file
		$gettime_img = mysqli_query($objConn,"select unix_timestamp(now())");
		$timeresult_img = mysql_result($gettime_img,0);
		
		$photoname_img = $timeresult_img.basename($_FILES['thumb_image']['name']);
		$target_path_img = "upload/media/thumb/";
		$designation_path_img = $target_path_img.$photoname_img; 
		move_uploaded_file ($_FILES["thumb_image"]['tmp_name'],$designation_path_img);
		
		//$designation_path_img = substr($designation_path_img, 3 , strlen($designation_path_img));
	}
	if($_FILES['flash_file2']['name'] != '') {
		//upload the video file
		$gettime_vid2 = mysqli_query($objConn,"select unix_timestamp(now())");
		$timeresult_vid2 = mysql_result($gettime_vid2,0);
		
		$photoname_vid2 = basename($_FILES['flash_file2']['name']);
		$target_path_vid2 = "upload/media/flash/";
		$designation_path_vid2 = $target_path_vid2.$photoname_vid2; 
		move_uploaded_file ($_FILES["flash_file2"]['tmp_name'],$designation_path_vid2);
		
		//$designation_path_vid2 = substr($designation_path_vid2, 3 , strlen($designation_path_vid2));
	}
	
	if($_FILES['flash_file']['name'] != '')
	 {
		//upload the video file
		$gettime_vid = mysqli_query($objConn,"select unix_timestamp(now())");
		$timeresult_vid = mysql_result($gettime_vid,0);
		
		$photoname_vid = $timeresult_vid.basename($_FILES['flash_file']['name']);
		$target_path_vid = "upload/media/flash/";
		$designation_path_vid = $target_path_vid.$photoname_vid; 
		move_uploaded_file ($_FILES["flash_file"]['tmp_name'],$designation_path_vid);
		
		//$designation_path_vid = substr($designation_path_vid, 3 , strlen($designation_path_vid));
	}
	$insert_SQL = 'INSERT INTO power_media (title, thumb_image, flash_file, swf_file, status) VALUES("'. $_POST['title']. '", "'. $designation_path_img. '", "'. $designation_path_vid2. '", "'. $designation_path_vid. '", "'. $_POST['status']. '")';
	//echo $insert_SQL;
	$Result = mysqli_query($objConn,$insert_SQL);
}
header('Location:media.php?msg=1');
exit;
?>
