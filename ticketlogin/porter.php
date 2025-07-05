<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
$frmdate = date("Y-m-d");
$todate = date("Y-m-d");
if(isset($_REQUEST['frmdate']))
{
$frmdate = $_REQUEST['frmdate'];
}
if(isset($_REQUEST['todate']))
{
$todate = $_REQUEST['todate'];
}
if($_REQUEST['news']=="del")
{
$id=$_GET['event_id'];
$del_news=mysqli_query($objConn,"update power_ticket set luggage_status = 'Cancelled'  where id=".$id."") or die("Delete News Error:".mysql_error());
header("location:luggage_delivery.php?msg=3");
}

?><!DOCTYPE HTML>
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
<script LANGUAGE="JavaScript">
<!--
function confirmSubmit()
 {
var msg;
msg= "Are you sure you want to delete the data ";
var agree=confirm(msg);
if (agree)
return true ;
else
return false ;
}
// -->
</script>
<script language="JavaScript">
function selectDelete(check){
    cnt = document.frm.count.value;// no. of check boxes
    for( var i = 1, j; j = document.getElementById('delete_'+i),i <= cnt; i++ ) {
        if(j){
            if(check.checked == true)    
                j.checked = true;
            else
                j.checked = false;
        }
    }
}
function allchecked(nos,frm){
for(i=1;i<=nos+2;i++){
frm.elements(i).checked=frm.select.checked;
}

}
function deleteAll()
        {

            var proceed=false;
            for (var i = 0; i < document.frm.elements.length; i++) 
            {
                var e = document.frm.elements[i];
                if (e.name == "del[]") 
                {
                    if(e.checked == true)
                    {
                        proceed=true;
                        break;
                    }
                }//end if
            }//end for loop
                        
            if(proceed)
            {
                if(confirm("Are you sure? Do you want to delivered the selected item(s)."))
                    {
                        document.frm.action="luggage_delivery_all.php";
                          document.frm.submit();
                    }
            }
            else
            {
                alert("You must select items to proceed");
            }
            
        }


function checkAll() 
{
	
    if(document.getElementById('chkAll').checked==false)
    {
        uncheckAll();
    }//end if
    else
    {
        for (var i = 0; i < document.frm.elements.length; i++) 
        {
            var e = document.frm.elements[i];
            if (e.name == "del[]") 
            {
                e.checked = true;
            }//end if
        }//end for loop
    }//end else
}//end function    
function uncheckAll() 
{
    for (var i = 0; i < document.frm.elements.length; i++) 
    {
        var e = document.frm.elements[i];
        if (e.name == "del[]") 
        {
            e.checked = false;
        }//end if
    }//end for loop
}//end function    
 function CenterWindow(windowWidth, windowHeight, windowOuterHeight, url, wname, features) {
    var centerLeft = parseInt((window.screen.availWidth - windowWidth) / 2);
    var centerTop = parseInt(((window.screen.availHeight - windowHeight) / 2) - windowOuterHeight);
 
    var misc_features;
    if (features) {
      misc_features = ', ' + features;
    }
    else {
      misc_features = ', status=no, location=no, scrollbars=yes, resizable=yes';
    }
    var windowFeatures = 'width=' + windowWidth + ',height=' + windowHeight + ',left=' + centerLeft + ',top=' + centerTop + misc_features;
    var win = window.open(url, wname, windowFeatures);
    win.focus();
    return win;
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
 <li><a href="luggage_delivery.php"><span class="nav_icon create_write"></span> Delivery Statement</a></li>
<li><a href="luggage_deliverd_all.php"><span class="nav_icon truck"></span> <span class="menu_color_dis">Delivered Report</span> </a></li> 
 <li><a href="daysheet.php"><span class="nav_icon mobile_phone"></span>Day Sheet Entry</a></li>
 <li><a href="customer.php"><span class="nav_icon speech_bubbles_2"></span>Customer Management</a></li>
 <li><a href="porter.php"><span class="nav_icon file_cabinet"></span>Porter Charges</a></li>
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
				<div class="widget_wrap" style="overflow:auto;">
					<div class="widget_top">
						<span class="h_icon create_write"></span>
						<h6>Porter Charges (31-08-23 to 08-11-23)</h6>
                       
					</div>
                    
					<div class="widget_content">
                    <form name="frm" id="frm" method="post" action="">
    <div class="arrow_box">
    <table width="100%" class="arrow_box_content top_arrow">
      
      <tr>
        <td height="26" align="right" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt" style="text-transform:uppercase;">&nbsp;</td>
        <td align="right" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt">&nbsp;</td>
      </tr>
      
      
     
      <tr>
        <td height="26" align="right" valign="middle" class="label_txt">Porter Charges  (BOX):</td>
        <td align="center" class="label_txt" style="text-transform:uppercase;"><input type="text" name="porter_charges1" id="porter_charges" value="<?php echo $_POST['porter_charges1']?>"></td>
        <td align="right" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt"></td>
        <td align="center" class="label_txt">&nbsp;</td>
      </tr>
      <tr>
        <td  height="26" align="right" class="label_txt"></td>
        <td  align="center" class="label_txt" style="text-transform:uppercase;"></td>
        <td  align="right" class="label_txt">&nbsp;</td>
        <td  align="center" class="label_txt"></td>
        <td  align="center" class="label_txt">&nbsp;</td>
      </tr>
	  
	   <tr>
        <td height="26" align="right" valign="middle" class="label_txt">Porter Charges (SMALL BOX):</td>
        <td align="center" class="label_txt" style="text-transform:uppercase;"><input type="text" name="porter_charges2" id="porter_charges" value="<?php echo $_POST['porter_charges2']?>"></td>
        <td align="right" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt"></td>
        <td align="center" class="label_txt">&nbsp;</td>
      </tr>
      <tr>
        <td  height="26" align="right" class="label_txt"></td>
        <td  align="center" class="label_txt" style="text-transform:uppercase;"></td>
        <td  align="right" class="label_txt">&nbsp;</td>
        <td  align="center" class="label_txt"></td>
        <td  align="center" class="label_txt">&nbsp;</td>
      </tr>
	  
	   <tr>
        <td height="26" align="right" valign="middle" class="label_txt">Porter Charges (BIG BOX):</td>
        <td align="center" class="label_txt" style="text-transform:uppercase;"><input type="text" name="porter_charges3" id="porter_charges" value="<?php echo $_POST['porter_charges3']?>"></td>
        <td align="right" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt"></td>
        <td align="center" class="label_txt">&nbsp;</td>
      </tr>
      <tr>
        <td  height="26" align="right" class="label_txt"></td>
        <td  align="center" class="label_txt" style="text-transform:uppercase;"></td>
        <td  align="right" class="label_txt">&nbsp;</td>
        <td  align="center" class="label_txt"><input type="submit" class="btn_small btn_blue" name="Submit" value="Submit"></td>
        <td  align="center" class="label_txt">&nbsp;</td>
      </tr>
      <tr>
        <td  height="26" align="right" class="label_txt"></td>
        <td  align="center" class="label_txt" style="text-transform:uppercase;">
		
        </td>
        <td  align="right" class="label_txt">&nbsp;</td>
        <td  align="center" class="label_txt">&nbsp;</td>
        <td  align="center" class="label_txt">&nbsp;</td>
      </tr>
    </table>
	</div>
	
						
<br>

                    <div align="right"><div class="btn_40_blue ucase">
								
							</div></div><br>
					<div class="widget_content">
                
				 
                        
                        
	<?php if($_POST['Submit']!='')
					{
	echo '<br><span style=color:red;font-weight:bold;font-size:20px;>BOX</span><br>';
	echo '<table class=display><tr><td>S.No</td><td>Date</td><td>BOX Qty</td></tr>';
$sel = "select sum(a.luggage_qunty), b.create_date from power_ticket_prd a, power_ticket b where a.luggage_prd_name='BOX' and a.luggage_lrno=b.luggage_lrno and b.create_date between '2023-08-31' and '2023-11-08' group by b.create_date order by b.create_date ";
$sel1 = mysqli_query($objConn,$sel);
$i=1;$qty1 =0;$cnt=0;
while($sel2 = mysqli_fetch_array($sel1))
{
	$cnt++;
                            $css_set=$cnt%2;
   echo '<tr';
   if($css_set==0) echo " class=gradeX"; else  echo " class=gradeC";
   echo '>';
echo '<td>'.$i.'</td><td>'.date('d-M-Y',strtotime($sel2[1])).'</td><td>'.$sel2[0].'</td>';
echo '</tr>';
$i++;
$qty1+=$sel2[0];
}
$porter_charges1 = $_POST['porter_charges1'];
echo '<tr><td colspan=2><strong>Total Qty</strong></td><td><strong>'.$qty1.'</strong></td></tr>';
echo '<tr><td colspan=2><strong>Total Porter Charges</strong></td><td><strong>Rs. '.number_format($qty1*$porter_charges1,2).'</strong></td></tr>';
echo '</table>';
	echo '<br>';	




echo '<br><span style=color:red;font-weight:bold;font-size:20px;>SMALL BOX</span><br>';
echo '<table class=display><tr><td>S.No</td><td>Date</td><td>SMALL BOX Qty</td></tr>';
$sel = "select sum(a.luggage_qunty), b.create_date from power_ticket_prd a, power_ticket b where a.luggage_prd_name='BOX SMALL' and a.luggage_lrno=b.luggage_lrno and b.create_date between '2023-08-31' and '2023-11-08' group by b.create_date order by b.create_date ";
$sel1 = mysqli_query($objConn,$sel);
$i=1;$qty2 =0;$cnt=0;
while($sel2 = mysqli_fetch_array($sel1))
{
	$cnt++;
                            $css_set=$cnt%2;
   echo '<tr';
   if($css_set==0) echo " class=gradeX"; else  echo " class=gradeC";
   echo '>';
echo '<td>'.$i.'</td><td>'.date('d-M-Y',strtotime($sel2[1])).'</td><td>'.$sel2[0].'</td>';
echo '</tr>';
$i++;
$qty2+=$sel2[0];
}
$porter_charges2 = $_POST['porter_charges2'];
echo '<tr><td colspan=2><strong>Total Qty</strong></td><td><strong>'.$qty2.'</strong></td></tr>';
echo '<tr><td colspan=2><strong>Total Porter Charges</strong></td><td><strong>Rs. '.number_format($qty2*$porter_charges2,2).'</strong></td></tr>';
echo '</table>';	


echo '<br>';

echo '<br><span style=color:red;font-weight:bold;font-size:20px;>BIG BOX</span><br>';
echo '<table class=display><tr><td>S.No</td><td>Date</td><td>BIG BOX Qty</td></tr>';
$sel = "select sum(a.luggage_qunty), b.create_date from power_ticket_prd a, power_ticket b where a.luggage_prd_name='BOX BIG' and a.luggage_lrno=b.luggage_lrno and b.create_date between '2023-08-31' and '2023-11-08' group by b.create_date order by b.create_date ";
$sel1 = mysqli_query($objConn,$sel);
$i=1;$qty3 =0;$cnt=0;
while($sel2 = mysqli_fetch_array($sel1))
{
	$cnt++;
                            $css_set=$cnt%2;
   echo '<tr';
   if($css_set==0) echo " class=gradeX"; else  echo " class=gradeC";
   echo '>';
echo '<td>'.$i.'</td><td>'.date('d-M-Y',strtotime($sel2[1])).'</td><td>'.$sel2[0].'</td>';
echo '</tr>';
$i++;
$qty3+=$sel2[0];
}
$porter_charges3 = $_POST['porter_charges3'];
echo '<tr><td colspan=2><strong>Total Qty</strong></td><td><strong>'.$qty3.'</strong></td></tr>';
echo '<tr><td colspan=2><strong>Total Porter Charges</strong></td><td><strong>Rs. '.number_format($qty3*$porter_charges3,2).'</strong></td></tr>';
echo '</table>';


echo '<br>';

echo '<br><span style=color:red;font-weight:bold;font-size:20px;>Not Mentioned</span><br>';
echo '<table class=display><tr><td>S.No</td><td>Date</td><td>Qty</td></tr>';
$sel = "select sum(a.luggage_qunty), b.create_date from power_ticket_prd a, power_ticket b where a.luggage_prd_name='' and a.luggage_lrno=b.luggage_lrno and b.create_date between '2023-08-31' and '2023-11-08' group by b.create_date order by b.create_date ";
$sel1 = mysqli_query($objConn,$sel);
$i=1;$qty4 =0;$cnt=0;
while($sel2 = mysqli_fetch_array($sel1))
{
	$cnt++;
                            $css_set=$cnt%2;
   echo '<tr';
   if($css_set==0) echo " class=gradeX"; else  echo " class=gradeC";
   echo '>';
echo '<td>'.$i.'</td><td>'.date('d-M-Y',strtotime($sel2[1])).'</td><td>'.$sel2[0].'</td>';
echo '</tr>';
$i++;
$qty4+=$sel2[0];
}
$porter_charges3 = $_POST['porter_charges3'];
echo '<tr><td colspan=2><strong>Total Qty</strong></td><td><strong>'.$qty4.'</strong></td></tr>';
echo '<tr><td colspan=2><strong>Total Porter Charges</strong></td><td><strong>Rs. '.number_format($qty*$porter_charges3,2).'</strong></td></tr>';
echo '</table>';



echo '<br>';

echo '<br><span style=color:red;font-weight:bold;font-size:20px;>GIFT BOX</span><br>';
echo '<table class=display><tr><td>S.No</td><td>Date</td><td>Qty</td></tr>';
$sel = "select sum(a.luggage_qunty), b.create_date from power_ticket_prd a, power_ticket b where a.luggage_prd_name='GIFT BOX' and a.luggage_lrno=b.luggage_lrno and b.create_date between '2023-08-31' and '2023-11-08' group by b.create_date order by b.create_date ";
$sel1 = mysqli_query($objConn,$sel);
$i=1;$qty4 =0;$cnt=0;
while($sel2 = mysqli_fetch_array($sel1))
{
	$cnt++;
                            $css_set=$cnt%2;
   echo '<tr';
   if($css_set==0) echo " class=gradeX"; else  echo " class=gradeC";
   echo '>';
echo '<td>'.$i.'</td><td>'.date('d-M-Y',strtotime($sel2[1])).'</td><td>'.$sel2[0].'</td>';
echo '</tr>';
$i++;
$qty4+=$sel2[0];
}
$porter_charges3 = $_POST['porter_charges3'];
echo '<tr><td colspan=2><strong>Total Qty</strong></td><td><strong>'.$qty4.'</strong></td></tr>';
echo '<tr><td colspan=2><strong>Total Porter Charges</strong></td><td><strong>Rs. '.number_format($qty*$porter_charges3,2).'</strong></td></tr>';
echo '</table>';



echo '<br>';

echo '<br><span style=color:red;font-weight:bold;font-size:20px;>POLY BOX</span><br>';
echo '<table class=display><tr><td>S.No</td><td>Date</td><td>Qty</td></tr>';
$sel = "select sum(a.luggage_qunty), b.create_date from power_ticket_prd a, power_ticket b where a.luggage_prd_name='POLY BOX' and a.luggage_lrno=b.luggage_lrno and b.create_date between '2023-08-31' and '2023-11-08' group by b.create_date order by b.create_date ";
$sel1 = mysqli_query($objConn,$sel);
$i=1;$qty4 =0;$cnt=0;
while($sel2 = mysqli_fetch_array($sel1))
{
	$cnt++;
                            $css_set=$cnt%2;
   echo '<tr';
   if($css_set==0) echo " class=gradeX"; else  echo " class=gradeC";
   echo '>';
echo '<td>'.$i.'</td><td>'.date('d-M-Y',strtotime($sel2[1])).'</td><td>'.$sel2[0].'</td>';
echo '</tr>';
$i++;
$qty4+=$sel2[0];
}
$porter_charges3 = $_POST['porter_charges3'];
echo '<tr><td colspan=2><strong>Total Qty</strong></td><td><strong>'.$qty4.'</strong></td></tr>';
echo '<tr><td colspan=2><strong>Total Porter Charges</strong></td><td><strong>Rs. '.number_format($qty*$porter_charges3,2).'</strong></td></tr>';
echo '</table>';



	}



	?>
	</form>
					</div>
				</div>
			</div>
			
			
			
			
		</div>
		<span class="clear"></span>
	</div>
</div>
</body>
</html>