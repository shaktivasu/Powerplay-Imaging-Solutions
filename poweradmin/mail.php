<?php
include("../Connections/objConn.php");
/*$target_path2 = "upload/egreeting/";
$target_path =$target_path2.basename($_FILES['F1']['name']); 
move_uploaded_file ($_FILES["F1"]['tmp_name'],$target_path);
*/
//error_reporting(E_ALL);
error_reporting(E_STRICT);

date_default_timezone_set('America/Toronto');

include("../class.phpmailer.php");
//include("class.smtp.php"); // optional, gets called from within class.phpmailer.php if not already loaded
$mail             = new PHPMailer();
if($_POST['choosesend']==1)
{
$get_alluser_mailid=mysqli_query($objConn,"select * from power_user");
while($get_alluser_mailid_row=mysqli_fetch_array($get_alluser_mailid))
{
$to = $get_alluser_mailid_row['user_mailid'];
$toname = $get_alluser_mailid_row['user_name'];
$body             = "Dear,<br><br>".$_POST['message'];
$image            = $_POST['greeting_image'];
$mail->IsSMTP();
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 465;                   // set the SMTP port for the GMAIL server

$mail->Username   = "laxdev86@gmail.com";  // GMAIL username
$mail->Password   = "laxlaxlax";            // GMAIL password

$mail->AddReplyTo("laxdev86@gmail.com","First Last");

$mail->From       = "lakshman@blackandwhite.in";
$mail->FromName   = "Ramesh Tinker Works";

$mail->Subject    = "Greetings From Ramesh Tinker Works";

//$mail->Body       = "Hi,<br>This is the HTML BODY<br>";                      //HTML Body
$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
$mail->WordWrap   = 50; // set word wrap

$mail->MsgHTML($body);

$mail->AddAddress($to, $toname);
}
}
else if($_POST['choosesend']==2)
{
$get_alluser_mailid=mysqli_query($objConn,"select * from power_user where user_mailid='".$_POST['usermailid']."'");
$get_alluser_mailid_row=mysqli_fetch_array($get_alluser_mailid);
$body             = "Dear"." "."<strong>".$get_alluser_mailid_row['user_name']."</strong><br><br>".$_POST['message'];
/*$body             = $mail->getFile('');
$body             = eregi_replace("[\]",'',$body);
*/
$image            = $_POST['greeting_image'];
$mail->IsSMTP();
$mail->SMTPAuth   = true;                  // enable SMTP authentication
$mail->SMTPSecure = "ssl";                 // sets the prefix to the servier
$mail->Host       = "smtp.gmail.com";      // sets GMAIL as the SMTP server
$mail->Port       = 465;                   // set the SMTP port for the GMAIL server

$mail->Username   = "laxdev86@gmail.com";  // GMAIL username
$mail->Password   = "laxlaxlax";            // GMAIL password

$mail->AddReplyTo("laxdev86@gmail.com","First Last");

$mail->From       = "lakshman@blackandwhite.in";
$mail->FromName   = "Ramesh Tinker Works";

$mail->Subject    = "Greetings From Ramesh Tinker Works";

//$mail->Body       = "Hi,<br>This is the HTML BODY<br>";                      //HTML Body
$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
$mail->WordWrap   = 50; // set word wrap

$mail->MsgHTML($body);

$to = $get_alluser_mailid_row['user_mailid'];
$toname = $get_alluser_mailid_row['user_name'];
$mail->AddAddress($to, $toname);
}
else
{

}
$mail->AddAttachment($image);             // attachment
$mail->IsHTML(true); // send as HTML
if(!$mail->Send())
 {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
  header("location:egreetings_send.php?id=".$_POST['id']."&msg=greeting");
}
?>
