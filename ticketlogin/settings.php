<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
$oldpass=$_POST['oldpass'];
$newpass=$_POST['newpass'];
$newpass1=$_POST['newpass1'];
if(isset($_POST['Submit']))
        
{
		
		 $query="select * from power_route where id='".$_SESSION['route']."' and route_password='".$oldpass."'";
		$result=mysqli_query($objConn,$query)or die("Query Failed : ".mysql_error());
		$row=mysqli_fetch_row($result);
		echo $num=mysqli_num_rows($result);
		
		if($num==1)
		{
		$query="update power_route set route_password='".$newpass."' where route_password='".$oldpass."'";
		$result=mysqli_query($objConn,$query)or die("Query Failed : ".mysql_error());
		header("location:settings.php?msg=1");
		}
		
		else
		{
			header("location:settings.php?err=1");
		}
	
}
?>


<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width"/>
<title>:: Welcome to Power Play Imaging Solutions  - Admin Panel ::</title>
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



<script type="text/javascript" src="images/calendarDateInput.js"></script>
           <script type="text/javascript">
<!--

var d_names = new Array("Sunday", "Monday", "Tuesday",
"Wednesday", "Thursday", "Friday", "Saturday");

var m_names = new Array("January", "February", "March", 
"April", "May", "June", "July", "August", "September", 
"October", "November", "December");

var d = new Date();
var curr_day = d.getDay();
var curr_date = d.getDate();
var sup = "";
if (curr_date == 1 || curr_date == 21 || curr_date ==31)
   {
   sup = "st";
   }
else if (curr_date == 2 || curr_date == 22)
   {
   sup = "nd";
   }
else if (curr_date == 3 || curr_date == 23)
   {
   sup = "rd";
   }
else
   {
   sup = "th";
   }
var curr_month = d.getMonth();
var curr_year = d.getFullYear();

//document.write(d_names[curr_day] + " " + curr_date + "<SUP>"
//+ sup + "</SUP> " + m_names[curr_month] + " " + curr_year);

//-->
</script>
<script type="text/javascript">
function val()
{
   if(document.form1.oldpass.value=="")
	{
	document.form1.oldpass.focus();
	alert("Please Enter Old Password");
	return false;
	}
	
	
	 if(document.form1.newpass.value=="")
	{
	document.form1.newpass.focus();
	alert("Please Enter New Password");
	return false;
	}
	
	
	 if(document.form1.newpass1.value=="")
	{
	document.form1.newpass1.focus();
	alert("Please Enter Retype New Password");
	return false;
	}
	
	if(document.form1.newpass.value!=document.form1.newpass1.value)
	{
	document.form1.newpass.focus();
	alert("Mismatch Password and Retype Password");
	return false;
	}
	
}
</script>
</head>
<body id="theme-default" class="full_block">
<div id="actionsBox" class="actionsBox">
	<div id="actionsBoxMenu" class="menu">
		<span id="cntBoxMenu">0</span>
		<a class="button box_action">Archive</a>
		<a class="button box_action">Delete</a>
		<a id="toggleBoxMenu" class="open"></a>
		<a id="closeBoxMenu" class="button t_close">X</a>
	</div>
	<div class="submenu">
		<a class="first box_action">Move...</a>
		<a class="box_action">Mark as read</a>
		<a class="box_action">Mark as unread</a>
		<a class="last box_action">Spam</a>
	</div>
</div>
<div id="left_bar">
	
	
	<div id="sidebar">
		<div id="secondary_nav">
			<?php include_once("menu.php");?>
		</div>
	</div>
</div>
<div id="container">
	<div id="header" class="blue_lin">
		<div class="header_left">
			<div class="logo">
				<img src="images/logo.png" alt="Power Play Imaging Solutions">
			</div>
			<div id="responsive_mnu">
			<a href="#responsive_menu" class="fg-button" id="hierarchybreadcrumb"><span class="responsive_icon"></span>Menu</a>
				<div id="responsive_menu" class="hidden">
					<ul>
				<li><a href="dashboard.php"><span class="nav_icon computer_imac"></span> Dashboard</a></li>
				<li><a href="luggage_new.php"><span class="nav_icon frames"></span> Booking</a></li>
				<li><a href="luggage.php"><span class="nav_icon blocks_images"></span> Dispatch Statement</a></li> 
 <li><a href="luggage_delivery.php"><span class="nav_icon create_write"></span> Delivery Statement</a></li> <li><a href="daysheet.php"><span class="nav_icon mobile_phone"></span>Day Sheet Entry</a></li><li><a href="customer.php"><span class="nav_icon speech_bubbles_2"></span>Customer Management</a></li>

                <li><a href="reports.php"><span class="nav_icon file_cabinet"></span>Reports</a></li>
<li><a href="settings.php"><span class="nav_icon cog"></span>Settings</a></li>
			</ul>
				</div>
			</div>
		</div>
		<div class="header_right">
			
			<div id="user_nav">
				<ul>
					<li class="user_thumb"><a href="#"><span class="icon"><img src="images/user_thumb.png" width="30" height="30" alt="User"></span></a></li>
					<li class="user_info"><span class="user_name"><?php echo $_SESSION['route_name']?></span><a href="logout.php" ><span class="user_name"><strong>Logout</strong> </span></a></li>
                    
                    
					<!--<li class="logout"><a href="#"><span class="icon"></span>Logout</a></li>-->
				</ul>
			</div>
		</div>
	</div>
	
	<div id="content">
		<div class="grid_container">
			
			
			
			<div class="grid_12">
				<div class="widget_wrap">
					<div class="widget_top">
						<span class="h_icon blocks_images"></span>
						<h6>SETTINGS</h6>
                        <div class="print"><h6>Print</h6></div>
					</div>
					<div class="widget_content">
                    
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><div class="pay_title">Change Password 
    
    
    </div><br>

    <form name="form1" id="form1" method="post" action=""  onsubmit="return val();">
      <table width="90%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td align="left" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="1" bgcolor="#FFFFFF">
            <tr>
              <td height="5" colspan="3" align="left" valign="top" class="username"></td>
            </tr>
            <tr>
              <td colspan="3" align="center" valign="middle" class="username">&nbsp;<span class="error">
                <strong>
                <?php
                          if($_REQUEST['msg']==1)
						  {
						  echo "Updated Successfully";
						  }
						   if($_REQUEST['err']==1)
						  {
						  echo "Wrong Old password";
						  }
						  
						  
						  
						  ?>
                </strong>              </span></td>
            </tr>
            <tr>
              <td align="right" valign="middle" class="username">&nbsp;</td>
              <td align="left" valign="top" class="username">&nbsp;</td>
              <td align="left" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td width="49%" align="right" valign="middle" class="username">Old Password</td>
              <td width="2%" align="left" valign="top" class="username">:</td>
              <td width="49%" align="left" valign="top"><input name="oldpass" type="password" id="oldpass" size="23" maxlength="23"  onblur="showHint(this.value)"  />
                &nbsp;<span id="txtHint" class="error"></span></td>
            </tr>
            <tr>
              <td align="right" valign="middle" class="username">&nbsp;</td>
              <td align="left" valign="top" class="username">&nbsp;</td>
              <td align="left" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td align="right" valign="middle" class="username">New Password</td>
              <td align="left" valign="top" class="username">:</td>
              <td align="left" valign="top"><input name="newpass" type="password" id="newpass" size="23" maxlength="23" /></td>
            </tr>
            <tr>
              <td height="20" align="right" valign="top">&nbsp;</td>
              <td align="left" valign="top">&nbsp;</td>
              <td align="left" valign="bottom">&nbsp;</td>
            </tr>
            <tr>
              <td height="20" align="right" valign="top">Retype New Password</td>
              <td align="left" valign="top">:</td>
              <td align="left" valign="bottom"><input name="newpass1" type="password" id="newpass1" size="23" maxlength="23" />
                <input type="hidden" name="pass_exist_status" id="pass_exist_status" /></td>
            </tr>
            <tr>
              <td height="20" align="right" valign="top">&nbsp;</td>
              <td align="left" valign="top">&nbsp;</td>
              <td align="left" valign="bottom">&nbsp;</td>
            </tr>
            <tr>
              <td height="20" align="left" valign="top">&nbsp;</td>
              <td align="left" valign="top">&nbsp;</td>
              <td align="left" valign="bottom">
                <input name="Submit"  id="Submit"  type="submit"   />
              </td>
            </tr>
          </table></td>
        </tr>
      </table>
    </form></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
</div>
				</div>
			</div>
			
			
			
			
		</div>
	<span class="clear"></span></div>
</div>
</body>
</html>