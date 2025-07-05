<?php
function mail_attachment ($from , $to, $subject, $message, $attachment)
{
    $fileatt = $attachment; // Path to the file                  
	$fileatt_type = "application/octet-stream"; // File Type 
    $start=	strrpos($attachment, '/') == -1 ? strrpos($attachment, '//') : strrpos($attachment, '/')+1;
	$fileatt_name = substr($attachment, $start, strlen($attachment)); // Filename that will be used for the file as the 	attachment 

	$email_from = $from; // Who the email is from 
	$email_subject =  $subject; // The Subject of the email 
	$email_txt = $message;   // Message that the email has in it 
	
	$email_to = $to; // Who the email is to

	$headers = "From: ".$email_from;

	$file = fopen($fileatt,'rb'); 
	$data = fread($file,filesize($fileatt)); 
	fclose($file); 
	//$msg_txt="\n\nMail created using free code from 4word systems : http://4wordsystems.com";

	$semi_rand = md5(time()); 
	$mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 
	//$headers = 'From: Carrer  form Arsha vidhya Mandir' . "\r\n" ;

    
	$headers .= "\nMIME-Version: 1.0\n" . 
            "Content-Type: multipart/mixed;\n" . 
            " boundary=\"{$mime_boundary}\"";

	//$email_txt .= $msg_txt;
	
	$email_message .= "This is a multi-part message in MIME format.\n\n" . 
                "--{$mime_boundary}\n" . 
                "Content-Type:text/html; charset=\"iso-8859-1\"\n" . 
               "Content-Transfer-Encoding: 7bit\n\n" . 
	$email_txt . "\n\n"; 

	$data = chunk_split(base64_encode($data)); 

	$email_message .= "--{$mime_boundary}\n" . 
                  "Content-Type: {$fileatt_type};\n" . 
                  " name=\"{$fileatt_name}\"\n" . 
                  //"Content-Disposition: attachment;\n" . 
                  //" filename=\"{$fileatt_name}\"\n" . 
                  "Content-Transfer-Encoding: base64\n\n" . 
                 $data . "\n\n" . 
                  "--{$mime_boundary}--\n"; 

	$ok = 0;
	$ok = @mail($email_to, $email_subject, $email_message, $headers); 

	return $ok;
}

?>
