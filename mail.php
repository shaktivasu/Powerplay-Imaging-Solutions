<?php
if(isset($_REQUEST['Submit'])){
$name= $_POST['full_name'];
$contact = $_POST['msg_subject'];
$mail = $_POST['contact_email'];
$contact_no = $_POST['contact_no'];
$message = $_POST['message'];
$to = "info@powerplayimagingsolutions.com";
$subject="Enquiry From Powerplay Imaging Solutions";
$headers = "From: ".$mail."" ;	
$message = "\nName : ".$name."\n\nSubject : ".$contact."\n\Contact No. : ".$contact_no."\n\nE Mail ID: ".$mail."\n\nMessage :".$message."";
mail($to, $subject, $message, $headers);
header("location:contact.php?msg=send");
}
?>