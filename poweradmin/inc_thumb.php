<?php
function admin_thumb($source, $designation, $height, $width, $img_id)
 {
	//THUMBNAIL GENERATOR
	$save_to_file = true;
	$image_quality = 300;
	$image_type = -1;
	
	$max_x = $width;
	$max_y = $height;
	$cut_x = 0;
	$cut_y = 0;
	$source_image = $source;
	$file_extn = explode(".", $source_image);
    $n = count($file_extn);
    $extn = $file_extn[$n-1];
	$image_name = $img_id.".".$extn; 
	$desi_image = $designation.$image_name;
	if (isset($_REQUEST['q'])) {
	  $image_quality = intval($_REQUEST['q']);
	}
	
	if (isset($_REQUEST['t'])) {
	  $image_type = intval($_REQUEST['t']);
	}
	
	if (isset($_REQUEST['x'])) {
	  $max_x = intval($_REQUEST['x']);
	}
	
	if (isset($_REQUEST['y'])) {
	  $max_y = intval($_REQUEST['y']);
	}
	
	if (!file_exists($source_image)) die('Images folder does not exist (update $images_folder in the script)');
	ini_set('memory_limit', '-1');
	$img = new Zubrag_image;
	$img->max_x        = $max_x;
	$img->max_y        = $max_y;
	$img->cut_x        = $cut_x;
	$img->cut_y        = $cut_y;
	$img->quality      = $image_quality;
	$img->save_to_file = $save_to_file;
	$img->image_type   = $image_type;
	$img->GenerateThumbFile($source_image, $desi_image);
	
	return $desi_image;
}

?>