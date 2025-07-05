<?php
include_once('inc_setsession.php'); 
include_once('../Connections/objConn.php');
$date=date("Y-m-d");
if (!function_exists("GetSQLValueString"))
{
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['loginchk']))
 {
  $loginUsername=$_POST['login_id'];
  $password=$_POST['login_pass'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "ticket_new.php";
  $MM_redirectLoginFailed = "index.php?err=1";
  $MM_redirecttoReferrer = true;
  
  
    $LoginRS__query="SELECT * FROM power_route WHERE route_username='".$loginUsername."' AND route_password='".$password."' and route_status = 0";
    $LoginRS = mysqli_query($objConn,$LoginRS__query);
    $LoginValue = mysqli_fetch_array($LoginRS); 
    $loginFoundUser = mysqli_num_rows($LoginRS);
  
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      
	$_SESSION['route'] = $LoginValue['id'];	
	$_SESSION['route_name'] = $LoginValue['route'];	
    if (isset($_SESSION['PrevUrl']) && true) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    header("Location: ". $MM_redirectLoginFailed );
  }
   header("Location: " . $MM_redirectLoginSuccess );
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width"/>
<title>Power Play Imaging Solutions :: Support</title>
<link href="css/reset.css" rel="stylesheet" type="text/css">
<link href="css/layout.css" rel="stylesheet" type="text/css">
<link href="css/themes.css" rel="stylesheet" type="text/css">
<link href="css/typography.css" rel="stylesheet" type="text/css">
<link href="css/styles.css" rel="stylesheet" type="text/css">
<link href="css/shCore.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/jquery.jqplot.css" rel="stylesheet" type="text/css">
<link href="css/jquery-ui-1.8.18.custom.css" rel="stylesheet" type="text/css">
<link href="css/data-table.css" rel="stylesheet" type="text/css">
<link href="css/form.css" rel="stylesheet" type="text/css">
<link href="css/ui-elements.css" rel="stylesheet" type="text/css">
<link href="css/wizard.css" rel="stylesheet" type="text/css">
<!--<link href="css/sprite.css" rel="stylesheet" type="text/css">-->
<link href="css/gradient.css" rel="stylesheet" type="text/css">
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="css/ie/ie7.css" />
<![endif]-->
<!--[if IE 8]>
<link rel="stylesheet" type="text/css" href="css/ie/ie8.css" />
<![endif]-->
<!--[if IE 9]>
<link rel="stylesheet" type="text/css" href="css/ie/ie9.css" />
<![endif]-->
<!-- Jquery -->

<script type="text/javascript">
$(function(){
	$(window).resize(function(){
		$('.login_container').css({
			position:'absolute',
			left: ($(window).width() - $('.login_container').outerWidth())/2,
			top: ($(window).height() - $('.login_container').outerHeight())/2
		});
	});
	// To initially run the function:
	$(window).resize();
});
</script>
<script type="text/javascript">
function resetform()
{
document.login.reset();

}
</script>
<script type="text/javascript">
function val()
{
   if(document.login.login_id.value=="")
	{
	document.login.login_id.focus();
	alert("Please Enter User Name");
	return false;
	}	
	if(document.login.login_pass.value=="")
	{
	document.login.login_pass.focus();
	alert("Please Enter Passsword");
	return false;
	}	



}
</script>

<script src="Scripts/AC_RunActiveContent.js" type="text/javascript"></script>
</head>
<body id="theme-default" class="full_block">
<div id="login_page">
	<div class="login_container">
		<div class="login_header blue_lgel">
			<ul class="login_branding">
				<li>
				
					<img src="images/logo.png" width="320px" height="100%" alt="Power Play Imaging Solutions">
				
				
				</li>
				
			</ul>
		</div>
		<form id="login" name="login" method="POST" action="<?php echo $loginFormAction; ?>" onsubmit="return val()">
			<div class="login_form">
				<h3 class="blue_d">Customer Login</h3>
				<ul> 
				<li><?php
                      if($_REQUEST['err']==1)
					  {
					  echo "Invalid user name or password";
					  }
					  if($_REQUEST['err']==2)
					  {
					  echo "Please fill username and password";
					  
					  }
					  if($_REQUEST['err']==3)
					  {
					  echo "Logout Successfully";
					  }
					  if($_REQUEST['err']==4)
					  {
					  echo "Please Login via login page";
					  }
					  ?> </li>
					<li class="login_user">
					<input name="login_id" type="text" id="login_id" onkeyup="lower(this)" size="30" maxlength="30"  value="Username" onClick="this.value=''"/>
					</li>
					<li class="login_pass">
					<input name="login_pass" type="password" id="login_pass" size="30" maxlength="30"  value="Password"  onClick="this.value=''" />
					</li>
				</ul>
			</div>
			<input class="login_btn blue_lgel" name="loginchk" value="Login" type="submit">
			<ul class="login_opt_link">
				<li><a href="forgot_pass.php">Forgot Password?</a></li>
				<li class="remember_me right">
				<input name="apdiv" class="rem_me" type="checkbox" value="checked">
				Remember Me</li>
			</ul>
		</form>
	</div>
</div>
</body>
</html>

              
                 
