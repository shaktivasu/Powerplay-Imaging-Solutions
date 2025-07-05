<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
$all_ids = '';
for($i=1; $i<=$_POST['totcnt']; $i++)
 {
	$chk = 'check_'.$i;
	if(isset($_POST[$chk]) && $_POST[$chk] != '') {
		$all_ids .= $_POST[$chk].",";
		$thumb_file = '';
		$flash_file = '';
		
		//get the files thumb_image flash_file
		$query_get_list = "SELECT thumb_image, flash_file FROM power_media WHERE id = ".$_POST[$chk];
		$get_list = mysqli_query($objConn,$query_get_list) or die(mysql_error());
		$row_get_list = mysql_fetch_assoc($get_list);
		
		$thumb_file = $row_get_list['thumb_image'];
		$flash_file = $row_get_list['flash_file'];
		
		if(isset($thumb_file) && $thumb_file != '' && file_exists('../'.$thumb_file)) unlink('../'.$thumb_file);
		if(isset($flash_file) && $flash_file != '' && file_exists('../'.$flash_file)) unlink('../'.$flash_file);
		
	}
}
$all_ids = substr($all_ids, 0, strlen($all_ids)-1);
//echo $all_ids;

$delete_SQL = "DELETE FROM power_media WHERE id IN(".$all_ids.")";
$Result = mysqli_query($objConn,$delete_SQL);

header('Location:media.php?res=deleted');
exit;

?>