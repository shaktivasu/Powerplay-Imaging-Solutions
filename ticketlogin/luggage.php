<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
$frmdate = date("Y-m-d");
$todate = date("Y-m-d");
if(isset($_POST['frmdate']))
{
$frmdate = $_POST['frmdate'];
}
if(isset($_POST['todate']))
{
$todate = $_POST['todate'];
}
if($_REQUEST['news']=="del")
{
$id=$_GET['event_id'];
$del_news=mysqli_query($objConn,"update power_ticket set luggage_status = 'Cancelled'  where id=".$id."") or die("Delete News Error:".mysql_error());
header("location:luggage.php?msg=3");
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
                
				
				
				if(confirm("Are you sure? Do you want to dispatch the selected item(s)."))
                    {
                        document.frm.action="luggage_dispatch_all.php";
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
    </script>

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

<script type="text/javascript" src="fancybox/jquery.min.js"></script>
	
	<script type="text/javascript" src="fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
	<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.4.css" media="screen" />
 	
	<script type="text/javascript">
		$(document).ready(function() {
			
			$("#various2").fancybox();

		});
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
 <li><a href="daysheet.php"><span class="nav_icon mobile_phone"></span>Day Sheet Entry</a></li>
 <li><a href="customer.php"><span class="nav_icon speech_bubbles_2"></span>Customer Management</a></li>

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
				<div >
					<div class="widget_top">
						<span class="h_icon blocks_images"></span>
						<h6>Dispatch  </h6>
                       <div class="print"><h6><a href="luggage_print.php?frmdate=<?php echo $frmdate?>&todate=<?php echo $todate?>&vehicle=<?php echo $_POST['vehicle']?>" target="_blank">Dispatch Statement</a></h6></div>
					</div>
                    
					<div class="widget_content">
                    <form name="frm" id="frm" method="post">
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
        <td width="233" height="26" align="right" class="label_txt">From Date :</td>
        <td width="272" align="center" class="label_txt" style="text-transform:uppercase;">
		<script>DateInput('frmdate', true, 'yyyy-mm-dd','<?php echo $frmdate; ?>')</script></td>
        <td width="161" align="right" class="label_txt">To Date : </td>
        <td width="257" align="center" class="label_txt">
          <script>DateInput('todate', true, 'yyyy-mm-dd','<?php echo $todate; ?>')</script>       </td>
        <td width="80" align="center" class="label_txt">&nbsp;</td>
      </tr>
      
      <tr>
        <td height="26" align="right" class="label_txt">Vehicle:</td>
        <td align="center" class="label_txt" style="text-transform:uppercase;"><select name="vehicle" class="limiterBox">
          <option value="all">Select All</option>
          <?php 
										$vehicl = mysqli_query($objConn,"select * from power_vehicle where vec_status=0");
										while($vehicl1 = mysqli_fetch_array($vehicl))
										{
											if($_POST['vehicle']==$vehicl1['id'])
											echo "<option value=".$vehicl1['id']." selected>".$vehicl1['vehicle']."</option>";
											else
											echo "<option value=".$vehicl1['id'].">".$vehicl1['vehicle']."</option>";
										}
										
										?>
        </select></td>
        <td align="right" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt">&nbsp;</td>
      </tr>
      <tr>
        <td height="26" align="right" valign="middle" class="label_txt">LR NO :</td>
        <td align="center" class="label_txt" style="text-transform:uppercase;"><input type="text" name="lrno" id="lrno"></td>
        <td align="right" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt"></td>
        <td align="center" class="label_txt">&nbsp;</td>
      </tr>
      <tr>
        <td height="26" align="right" class="label_txt"></td>
        <td align="center" class="label_txt" style="text-transform:uppercase;"></td>
        <td align="right" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt"><input type="submit" class="btn_small btn_blue" name="Submit" value="Search"></td>
        <td align="center" class="label_txt">&nbsp;</td>
      </tr>
      <tr>
        <td width="233" height="26" align="right" class="label_txt"></td>
        <td width="272" align="center" class="label_txt" style="text-transform:uppercase;">
		
        </td>
        <td width="161" align="right" class="label_txt">&nbsp;</td>
        <td width="257" align="center" class="label_txt">&nbsp;</td>
        <td width="80" align="center" class="label_txt">&nbsp;</td>
      </tr>
    </table></div>
    
	
	
						<h6 class="inline_code">luggage Booking : Vehicle Wise -
						<?php  
						$vecstr = '';
						
						if($_POST['vehicle']=='all' || $_POST['vehicle']== '')
						{
							echo "ALL";
							$vecstr = ' and luggage_from = '.$_SESSION['route'].'';
						}
						else
						{
							$vehname =mysqli_fetch_row(mysqli_query($objConn,'select vehicle from power_vehicle where id ='.$_POST['vehicle']));
							echo $vehname[0];
							$vecstr =' and luggage_vehicle = "'.$_POST['vehicle'].'"  and luggage_from = '.$_SESSION['route'].'';
						}
							if($_POST['lrno']!='')
							{
								echo '<span class="yellow_pro">(LR NO : '.$_POST['lrno'].' )</span>';
								$vecstr .= ' and luggage_lrno = "'.$_POST['lrno'].'"';
							}	
								?> [ <?php echo date('d-M-Y',strtotime($frmdate)).' To '.date('d-M-Y',strtotime($todate));?> ] </h6>
					<br>
<br>
                 
                    <div align="right"><div class="btn_40_blue ucase">
								<a href="javascript:deleteAll();"><span class="icon finished_work_sl"></span><span>Click to Luggage Dispatch</span></a>
							</div> </div>
				  <div class="widget_content">
                 
	<?php 
	
	if(isset($_POST['Submit']))
	{
	$vecstr = '';
	
	//if($_POST['vehicle']=='all')
	$vecstr = ' and luggage_from = '.$_SESSION['route'].'';
	//else
	//$vecstr =' and luggage_vehicle = "'.$_POST['vehicle'].'" and luggage_from = '.$_SESSION['route'].'';
	if($_POST['lrno']!='')
	{
		$vecstr .= ' and luggage_lrno = "'.$_POST['lrno'].'"';
	}
	?>
					 
                          <?php
					//Maximum of News & Events 
					
                   // echo "select * from power_ticket where luggage_status='New Arrival' and  create_date>='".$frmdate."' and create_date<='".$todate."' $vecstr";
					  $luggage=mysqli_query($objConn,"select * from power_ticket where create_date>='".$frmdate."' and create_date<='".$todate."' and  luggage_status='New Arrival' $vecstr") or die("Vehicle error:".mysql_error());
					$luggage_num=mysqli_num_rows($luggage);
					if($luggage_num==0)
					{
                    ?>
                        
                   <?php
				   }
				   else
				   {
				   ?>
				    <table class="display">
						<thead>
						<tr>
						 <th width="6%"><span class="yellow_pro">DISPATCH</span> 	 <input type="checkbox"  name="chkAll"  id="chkAll" onclick="checkAll();"></th>
							<th width="3%">
								 Sl No
							</th>
							<th width="4%">Date</th>
                            <th width="6%">LR No.</th>
                            <th width="9%">Sender Name &amp; Phone No.</th>
                            <th width="11%">Reciever Name &amp; Phone No.</th>
							<th width="11%">
								 Particular
							</th>
							<th width="4%">From</th>
							<th width="4%">To</th>
							<th width="4%">Fee</th>
							<th width="5%">Loading /Unloading Charges</th>
							
							<th width="5%">Door Delivery</th>
							<th width="5%">Door Delivery Charges</th>
							<th width="5%">Total Amount</th>
							<th width="4%">
								Paid / <br> To Pay
							</th>
							<th width="9%">Luggage Status</th>
							<th width="5%">
								 Action
							</th>
						</tr>
						</thead>
						<tbody>
				   
				   <?php
				   $i=1;
				   $cnt=0;
				   $tot_amt=0;$tot_amt1=0;$paid_amt=0;$topay_amt=0;$credit_amt=0;
				   while($luggage_row=mysqli_fetch_array($luggage))
				   {
					   $cnt++;
                            $css_set=$cnt%2;
				   ?>
						<tr <?php if($css_set==0) echo "class=gradeX"; else  echo "class=gradeC"; ?>>
						  <td align="center">
                           <?php if($luggage_row['luggage_status']=='New Arrival') 
						{
							?><input type="checkbox" name="del[]"  id="del[]" value="<?php echo $luggage_row['id']; ?>"  > 
							<?php
						}else
						{?>
						<div class="btn_30_light">
								<a href="#" title=".classname"><span class="icon cross_co"></span></a>
							</div>
						<?php
						}
						?>
                         
                          </td>
							<td align="center"><?php echo $i."."; ?></td>
                            
							<td align="center"><?php echo date('d-M-Y',strtotime($luggage_row['create_date']));?></td>
                            <td align="center"><?php echo $luggage_row['luggage_lrno']; 
							if($luggage_row['luggage_ref']!=0)
							{
								echo "<br><font color=red>( Ref. ".$luggage_row['luggage_ref'].")</font>";
							}
							
							?></td>
                            <td align="center"><?php echo $luggage_row['luggage_sender'].' & '.$luggage_row['luggage_sender_phone']; ?></td>
                            <td align="center"><?php echo $luggage_row['luggage_reciever'].' & '.$luggage_row['luggage_reciever_phone']; ?></td>
							<td align="center">
                            <?php 
							$luggage_prd = "select * from power_ticket_prd where luggage_lrno = '".$luggage_row['luggage_lrno']."'";
							$luggage_prd1 = mysqli_query($objConn,$luggage_prd);
							$luggage_prd_rows = mysqli_num_rows($luggage_prd1);
							$cn=0;
							$luggage_charge_sep =0;
							$luggage_uncharge_sep =0;
							while($luggage_prd2 = mysqli_fetch_array($luggage_prd1))
							{
							   echo $luggage_prd2['luggage_prd_name']." - ".$luggage_prd2['luggage_qunty'];
							   $cn++;
							   if($cn!=$luggage_prd_rows) echo " , ";
							   $luggage_charge_sep += $luggage_prd2['luggage_charge'];
							   $luggage_uncharge_sep += $luggage_prd2['luggage_uncharge'];
							}
							
							?>
                            
                            
								 
							</td>
							<td align="center">
							<?php 
							$routefrom = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where id = ".$luggage_row['luggage_from']));
							echo $routefrom1 = $routefrom[0];
							
							?></td>
							<td align="center"><font color="#FF0000"><?php 
							$routeto = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where id = ".$luggage_row['luggage_to']));
							echo $routeto1 = $routeto[0];
							
							?></font></strong></td>
							<td align="center"><?php echo $luggage_row['luggage_fees']?></td>
							<td align="center"><?php echo $luggage_row['luggage_charges']?></td>
							
							<td align="center"><?php echo $luggage_row['luggage_doordelivery']?></td>
							<td align="center"><?php echo $luggage_row['luggage_doorcharges']?></td>
							<td align="center"><?php echo $tot_amt=$luggage_row['luggage_fees']+$luggage_row['luggage_charges']+$luggage_row['luggage_doorcharges']?></td>
							<td align="center"><span class="center"><?php echo $luggage_row['luggage_paymethod']?></span></td>
                            <?php 
							if($luggage_row['luggage_status']=='New Arrival') $cls='class="badge_style b_pending"';
							if($luggage_row['luggage_status']=='Dispatched') $cls='class="badge_style b_dispatched"';
							if($luggage_row['luggage_status']=='Inward') $cls='class="badge_style b_high"';
							if($luggage_row['luggage_status']=='Delivered') $cls='class="badge_style b_done"';
							if($luggage_row['luggage_status']=='Cancelled') $cls='class="badge_style b_cancelled"';
							?>
							<td align="center" <?php echo $cls;?>>
							<?php
							if($luggage_row['luggage_status']=='New Arrival')
							{?>
							<a href="#" onclick="return CenterWindow(500,500,50,'print.php?lr=<?php echo $luggage_row['luggage_lrno']; ?>')"><img src="images/print.png"/></a>    <?php echo $luggage_row['luggage_status']; }
							else
							echo $luggage_row['luggage_status'];
							?></td>
							<td align="center" class="center">
                            <?php if($luggage_row['luggage_status']=='New Arrival') {
								?>
							 <?php /*?><span>
                           <a href="#" onclick="return CenterWindow(500,700,50,'luggage_edit.php?id=<?php echo $luggage_row['id']; ?>')"><br>
<img src="images/edit.png"/></a></span>
                           <span><a href="luggage.php?news=del&amp;event_id=<?php echo $luggage_row['id'];?>" onclick="return confirmSubmit();" title="delete"><img src="images/delete.png"/></a></span><?php */?><?php }?>
                            <a href="print.php?lr=<?php echo  $luggage_row['luggage_lrno']?>"  target="_blank"><br>
<img src="images/print.png"/></a>
							</td>
						</tr>
                        
						<?php 
						if($luggage_row['luggage_paymethod']=='Paid')
						 $paid_amt +=$tot_amt;
						if($luggage_row['luggage_paymethod']=='To Pay')
						 $topay_amt +=$tot_amt;
						if($luggage_row['luggage_paymethod']=='Credit')
						 $credit_amt +=$tot_amt;
						$i++;} } if($luggage_num!=0)
						{?>
                         <tr>
                        <td colspan="17" align="right" ><strong>Paid Amount : 
						<?php 
						
						 echo $paid_amt ?></strong></td>
                        </tr>
                         <tr>
                        <td colspan="17" align="right" ><strong>Topay Amount : 
						<?php 
						 echo $topay_amt; 
						 ?></strong></td>
                        </tr>
                         <tr>
                        <td colspan="17" align="right" ><strong>Credit Amount :
                        <?php 
						
						echo $credit_amt;?></strong></td>
                        </tr>
                        <tr>
                        <td colspan="17" align="right" ><strong>Total Amount : 
						<?php echo $tot_amt1 =$paid_amt +$topay_amt+$credit_amt;?></strong></td>
                        </tr><?php }?>
						</tbody>
					  </table>
                       <?php }?> 
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