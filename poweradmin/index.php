<?php
include_once('inc_setsession.php'); 
require_once('../Connections/objConn.php');
$date=date("Y-m-d");


/*// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}*/

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['loginchk']))
 {
  $loginUsername=$_POST['login_id'];
  $password=md5($_POST['login_pass']);
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "";
  $MM_redirectLoginFailed = "";
  $MM_redirecttoReferrer = true;
 
  
  $LoginRS__query="SELECT username, password FROM power_admin WHERE username='".$loginUsername."' AND password='".$password."'"; 
   
  $LoginRS = mysqli_query($objConn,$LoginRS__query) or die(mysqli_error());
  $loginFoundUser = mysqli_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && true) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: dashboard.php");
  }
  //else {
   // header("Location:index.php?err=1");
  //}
}
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width"/>
<title>:: Welcome to Power Play Imaging Solutions   - Admin Panel ::</title>
<link href="css/reset.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/layout.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/themes.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/typography.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/styles.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/jquery.jqplot.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/jquery-ui-1.8.18.custom.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/data-table.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/form.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/sprite.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/gradient.css" rel="stylesheet" type="text/css" media="screen">
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
<script src="js/jquery-1.7.1.min.js"></script>
<script src="js/jquery-ui-1.8.18.custom.min.js"></script>
<script src="js/jquery.ui.touch-punch.js"></script>
<script src="js/chosen.jquery.js"></script>
<script src="js/uniform.jquery.js"></script>
<script src="js/bootstrap-dropdown.js"></script>
<script src="js/bootstrap-colorpicker.js"></script>
<script src="js/sticky.full.js"></script>
<script src="js/jquery.noty.js"></script>
<script src="js/selectToUISlider.jQuery.js"></script>
<script src="js/fg.menu.js"></script>
<script src="js/jquery.tagsinput.js"></script>
<script src="js/jquery.cleditor.js"></script>
<script src="js/jquery.tipsy.js"></script>
<script src="js/jquery.peity.js"></script>
<script src="js/jquery.simplemodal.js"></script>
<script src="js/jquery.jBreadCrumb.1.1.js"></script>
<script src="js/jquery.colorbox-min.js"></script>
<script src="js/jquery.idTabs.min.js"></script>
<script src="js/jquery.multiFieldExtender.min.js"></script>
<script src="js/jquery.confirm.js"></script>
<script src="js/elfinder.min.js"></script>
<script src="js/accordion.jquery.js"></script>
<script src="js/autogrow.jquery.js"></script>
<script src="js/check-all.jquery.js"></script>
<script src="js/data-table.jquery.js"></script>
<script src="js/ZeroClipboard.js"></script>
<script src="js/TableTools.min.js"></script>
<script src="js/jeditable.jquery.js"></script>
<script src="js/duallist.jquery.js"></script>
<script src="js/easing.jquery.js"></script>
<script src="js/full-calendar.jquery.js"></script>
<script src="js/input-limiter.jquery.js"></script>
<script src="js/inputmask.jquery.js"></script>
<script src="js/iphone-style-checkbox.jquery.js"></script>
<script src="js/meta-data.jquery.js"></script>
<script src="js/quicksand.jquery.js"></script>
<script src="js/raty.jquery.js"></script>
<script src="js/smart-wizard.jquery.js"></script>
<script src="js/stepy.jquery.js"></script>
<script src="js/treeview.jquery.js"></script>
<script src="js/ui-accordion.jquery.js"></script>
<script src="js/vaidation.jquery.js"></script>
<script src="js/mosaic.1.0.1.min.js"></script>
<script src="js/jquery.collapse.js"></script>
<script src="js/jquery.cookie.js"></script>
<script src="js/jquery.autocomplete.min.js"></script>
<script src="js/localdata.js"></script>
<script src="js/excanvas.min.js"></script>
<script src="js/jquery.jqplot.min.js"></script>
<script src="js/custom-scripts.js"></script>



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
				<div class="logo_small">
					<img src="images/logo.png">
				</div><li>
				</ul>
				
		</div>
		<form id="login" name="login" method="POST" action="<?php echo $loginFormAction; ?>" onsubmit="return val()">
			<div class="login_form">
				<h3 class="blue_d">Admin Login</h3>
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

              
                 
