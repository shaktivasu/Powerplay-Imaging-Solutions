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
$time = strtotime($frmdate.' -1 day');
    					 $fromdatesr = date("Y-m-d", $time);
					$time = strtotime($todate.' -1 day');
    					 $todatesr = date("Y-m-d", $time);


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
                if(confirm("Are you sure? Do you want to inward the selected item(s)."))
                    {
                        document.frm.action="luggage_edit_all.php";
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
				<div class="widget_wrap" style="overflow:auto;">
					<div class="widget_top">
						<span class="h_icon create_write"></span>
						<h6>luggage Delivered Consignments </h6>
                       
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
        <td  height="26" align="right" class="label_txt">From Date :</td>
        <td  align="center" class="label_txt" style="text-transform:uppercase;">
		<script>DateInput('frmdate', true, 'yyyy-mm-dd','<?php echo $frmdate; ?>')</script></td>
        <td  align="right" class="label_txt">To Date : </td>
        <td  align="center" class="label_txt">
          <script>DateInput('todate', true, 'yyyy-mm-dd','<?php echo $todate; ?>')</script>       </td>
        <td  align="center" class="label_txt">&nbsp;</td>
      </tr>
      
      
      <tr>
        <td height="26" align="right" valign="middle" class="label_txt">LR NO :</td>
        <td align="center" class="label_txt" style="text-transform:uppercase;"><input type="text" name="lrno" id="lrno"></td>
        <td align="right" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt"></td>
        <td align="center" class="label_txt">&nbsp;</td>
      </tr>
      <tr>
        <td  height="26" align="right" class="label_txt"></td>
        <td  align="center" class="label_txt" style="text-transform:uppercase;"></td>
        <td  align="right" class="label_txt">&nbsp;</td>
        <td  align="center" class="label_txt"><input type="submit" class="btn_small btn_blue" name="Submit" value="Search"></td>
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

                  
					<div class="widget_content">
                
				 
                        
                        
	<?php 
	$vecstr = '';
	if($_POST['Submit'] || (isset($_REQUEST['frmdate']) && isset($_REQUEST['todate'])))
{
	if($_POST['vehicle']=='all' || $_POST['vehicle']=='')
	$vecstr = ' and luggage_to = '.$_SESSION['route'].'';
	else
	$vecstr =' and luggage_to = '.$_SESSION['route'].'';
	if($_POST['lrno']!='')
	{
		$vecstr .= ' and (luggage_lrno = "'.$_POST['lrno'].'" or  luggage_sender_phone = "'.$_POST['lrno'].'" or luggage_reciever_phone = "'.$_POST['lrno'].'")';
	}
	?>
						<table class="display">
						<thead>
						<tr>
						
							<th width="4%">
								 Sl No
							</th>
							<th width="7%">Booking Date</th><th width="7%">Inward Date</th><th width="7%">Delivered Date</th>
                            <th width="13%">LR No.</th>
                            <th width="21%">Sender Name &amp; Phone No.</th>
                            <th width="21%">Reciever Name &amp; Phone No.</th>
							<th width="21%">
								 Particular
							</th>
							<th width="10%">From</th>
							<th width="8%">To</th>
							<th width="6%">Fee</th>
							<th width="7%">Loading Charges</th>
							<th width="7%">Door Delivery</th>
							<th width="7%">Door Delivery Charges</th>
							<th width="7%">Unloading Charges</th>
							<th width="7%">GST</th>
							<th width="7%">Total Amount</th>
							<th width="7%">
								Paid / <br> To Pay
							</th>
							<th width="6%">Luggage Status</th>
							<?php /*?><th width="18%">
								 Action
							</th><?php */?>
						</tr>
						</thead>
						<tbody>
                          <?php
					
					if($_POST['lrno']!='')
					{
                 	 $vecstr = substr($vecstr,4,strlen($vecstr));
					 $luggage=mysqli_query($objConn,"select * from power_ticket where $vecstr   and luggage_status = 'Delivered'  order by id asc") or die("Vehicle error:".mysql_error());
					$luggage_num=mysqli_num_rows($luggage);
					}
					else
					{
					$luggage=mysqli_query($objConn,"select * from power_ticket where delivered_date>='".$frmdate."' and delivered_date<='".$todate."' $vecstr   and luggage_status = 'Delivered'  order by id asc") or die("Vehicle error:".mysql_error());
					$luggage_num=mysqli_num_rows($luggage);	
					}
					if($luggage_num==0)
					{
                    ?>
                        <tr>
                        <td colspan="18" align="center" valign="middle" bgcolor="#F9C6F1">No Records.</td>
                        </tr>
                   <?php
				   }
				   else
				   {
				   
				   $i=1;
				   $cnt=0;
				   $tot_amt=0;$tot_amt1=0;$paid_amt=0;$topay_amt=0;$credit_amt=0;
				   while($luggage_row=mysqli_fetch_array($luggage))
				   {
					   $cnt++;
                            $css_set=$cnt%2;
				   ?>
						<tr <?php if($css_set==0) echo "class=gradeX"; else  echo "class=gradeC"; ?>>
						 
							<td align="center"><?php echo $i."."; ?></td>
                            
							<td align="center"><?php echo date('d-M-Y',strtotime($luggage_row['create_date']));?></td>
							<td align="center">
							<?php if($luggage_row['inward_date']!=NULL) echo date('d-M-Y',strtotime($luggage_row['inward_date'])); else echo 'Nil'; ?></td>
							<td align="center"><?php if($luggage_row['delivered_date']!=NULL) echo date('d-M-Y',strtotime($luggage_row['delivered_date'])); else  echo 'Nil'; ?></td>
                            <td align="center"><?php echo $luggage_row['luggage_lrno']; 
							if($luggage_row['luggage_ref']!=0)
							{
								echo "<br><font color=red>( Ref. ".$luggage_row['luggage_ref'].")</font>";
							}?></td>
                            <td align="center"><?php echo $luggage_row['luggage_sender'].' & '.$luggage_row['luggage_sender_phone']; ?></td>
                            <td align="center"><?php echo $luggage_row['luggage_reciever'].' & '.$luggage_row['luggage_reciever_phone']; ?></td>
							<td align="center">
                            <?php 
							$luggage_prd = "select * from power_ticket_prd where luggage_lrno = '".$luggage_row['luggage_lrno']."'";
							$luggage_prd1 = mysqli_query($objConn,$luggage_prd);
							$luggage_prd_rows = mysqli_num_rows($luggage_prd1);
							$cn=0;
							while($luggage_prd2 = mysqli_fetch_array($luggage_prd1))
							{
							   echo $luggage_prd2['luggage_prd_name']." - ".$luggage_prd2['luggage_qunty'];
							   $cn++;
							   if($cn!=$luggage_prd_rows) echo " , ";
							   
							}
							
							?>
                            
                            
								 
							</td>
							<td align="center">
							<?php 
							$routefrom = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where id = ".$luggage_row['luggage_from']));
							echo $routefrom1 = $routefrom[0];
							
							?></td>
							<td align="center"><?php 
							$routeto = mysqli_fetch_row(mysqli_query($objConn,"select route,route_group,route_type from power_route where id = ".$luggage_row['luggage_to']));
							echo $routeto1 = $routeto[0];
							
							?></td>
							<td align="center"><?php echo $luggage_row['luggage_fees'];
							if($routeto[1]==0 && $routeto[2]==0 )
							$basic_amt += $luggage_row['luggage_fees'];
							
							?></td>
							<td align="center"><?php echo $luggage_row['luggage_charges']?></td>
							<td align="center"><?php echo $luggage_row['luggage_doordelivery']?></td>
							<td align="center"><?php echo $luggage_row['luggage_doorcharges']?></td>
							<td align="center"><?php echo $luggage_row['unloading_charges']?></td>
							<td align="right"><?php 
					
					   $both_loading = $luggage_row['luggage_charges']+$luggage_row['unloading_charges'];
					   $tot_unloa+=$luggage_row['luggage_charges']+$luggage_row['unloading_charges'];
				   					
				 
				  $tax_topay =($luggage_row['luggage_fees'] +$both_loading) *5/100;
				  $tot_tax_topay+=$tax_topay;
				  
				   echo number_format($tax_topay,2);
				  
				   
				  ?></td>
							<td align="center"><?php  $tot_amt=$luggage_row['luggage_fees']+$luggage_row['luggage_charges']+$luggage_row['luggage_doorcharges']+$luggage_row['unloading_charges']+$tax_topay;
							echo number_format($tot_amt,2);
							?></td>
							<td align="center"><span class="center"><?php echo $luggage_row['luggage_paymethod']?></span></td>
							<?php 
							if($luggage_row['luggage_status']=='New Arrival') $cls='class="badge_style b_pending"';
							if($luggage_row['luggage_status']=='Dispatched') $cls='class="badge_style b_confirmed"';
							if($luggage_row['luggage_status']=='Inward') $cls='class="badge_style b_high"';
							if($luggage_row['luggage_status']=='Delivered') $cls='class="badge_style b_done"';
							if($luggage_row['luggage_status']=='Cancelled') $cls='class="badge_style b_cancelled"';
							?>
							<td align="center" <?php echo $cls;?>>
                             <?php if($luggage_row['luggage_status']=='Inward'){?>
							<a href="#" onclick="return CenterWindow(500,500,50,'print_delivery.php?id=<?php echo $luggage_row['id']; ?>')"><img src="images/print.png"/></a>
							<?php  }
							echo $luggage_row['luggage_status'];
							?></td>
							<?php /*?><td align="center" class="center"><?php if($luggage_row['luggage_status']=='Inward') {
								?>
							<span>
                          <a href="#" onclick="return CenterWindow(500,500,50,'luggage_edit.php?id=<?php echo $luggage_row['id']; ?>')"><br>
<img src="images/edit.png"/></a></span>
                            <span><a href="luggage_delivery.php?news=del&amp;event_id=<?php echo $luggage_row['id'];?>" onclick="return confirmSubmit();" title="delete"><img src="images/delete.png"/></a></span><span><a href="luggage_edit.php?news=del&amp;event_id=<?php echo $luggage_row['id'];?>" onclick="return confirmSubmit();" title="delete"></a></span><?php }?>
							</td><?php */?>
						</tr>
                        
						<?php 
						if($luggage_row['luggage_paymethod']=='Paid')
						 $paid_amt +=$tot_amt;
						if($luggage_row['luggage_paymethod']=='To Pay')
						 $topay_amt +=$tot_amt;
						if($luggage_row['luggage_paymethod']=='Credit')
						 $credit_amt +=$tot_amt;
						$i++;} } 
						?>
					<tr style="color:red; font-size:16px;"><td colspan="20" align="right"   bgcolor="#F9C6F1"><strong>Opening Balance : </strong>
                        <strong><?php  
				    $timeop = strtotime($todate.' -1 day');
    				$fromdatesrop = date("Y-m-d", $timeop);
					//echo "select * from power_ticket where delivered_date<='".$fromdatesr."' and luggage_from =".$_SESSION['route']."  and luggage_status<>'Cancelled'   order by delivered_date";
				   $luggage=mysqli_query($objConn,"select * from power_ticket where delivered_date<='".$fromdatesr."' and luggage_from =".$_SESSION['route']."  and luggage_status<>'Cancelled'   order by delivered_date") or die("Vehicle error:".mysql_error());
							
							$luggage_row4=mysqli_num_rows($luggage);
							if($luggage_row4>0)
							{
							while($luggage_row=mysqli_fetch_array($luggage))
				   			{
								
								if($luggage_row['luggage_paymethod']=='Paid'){
								$booking_lug_feesop +=$luggage_row['luggage_fees'];
								$booking_lug_feesop +=$luggage_row['luggage_charges']; 
								$booking_lug_feesop +=$luggage_row['unloading_charges'];
								$door_delivery_charges_paid =$luggage_row['luggage_doorcharges'];
								}
								if($luggage_row['luggage_paymethod']!='Expenses')
								{
				           		$get_com = mysqli_query($objConn,"select * from power_route where id =".$_SESSION['route']);
								$get_com1 = mysqli_fetch_array($get_com);
								}
								if(($luggage_row['luggage_paymethod']=='To Pay'))
								{
								 $topay_amt1 = $luggage_row['luggage_fees']*$get_com1['route_comission_topay']/100;
								 $agent_amt1 =$topay_amt1;
								}
								if(($luggage_row['luggage_paymethod']=='Paid') )
								{
								 $paid_amt1 = $luggage_row['luggage_fees']*$get_com1['route_comission_paid']/100;
								  $agent_amt1 +=$paid_amt1;
								}
								if(($luggage_row['luggage_paymethod']=='Credit') )
								{
								 $credit_amt1 = $luggage_row['luggage_fees']*$get_com1['route_comission_credit']/100;
								 $agent_amt1 =$credit_amt1+$luggage_row['luggage_charges'];
								}
								  $tot_agtop1+=$agent_amt1;
								  $topay_amt1 = 0;$paid_amt1=0;$credit_amt1=0; $agent_amt1 =0;
								  
							}
				   			
							}
							
						//echo "select * from power_ticket where delivered_date<='$fromdatesrop'   and luggage_to =".$_SESSION['route']." and luggage_status<>'Cancelled'  order by delivered_date";
							$luggage2=mysqli_query($objConn,"select * from power_ticket where delivered_date<='".$fromdatesr."'   and luggage_to =".$_SESSION['route']." and luggage_status<>'Cancelled'  order by delivered_date") or die("Vehicle111 error:".mysql_error());
							$luggage_row3=mysqli_num_rows($luggage2);
							if($luggage_row3>0)
							{
							while($luggage_row2=mysqli_fetch_array($luggage2))
				   			{
								
								if($luggage_row2['luggage_paymethod']=='To Pay'){
								$lug_feesop +=$luggage_row2['luggage_fees'];
								$lug_feesop +=$luggage_row2['luggage_charges']; 
								$lug_feesop +=$luggage_row2['unloading_charges']; 
								$door_delivery_charges =$luggage_row2['luggage_doorcharges']; 
								}
				           		$get_com = mysqli_query($objConn,"select * from power_route where id =".$_SESSION['route']);
								$get_com1 = mysqli_fetch_array($get_com);
								if($luggage_row2['luggage_paymethod']=='To Pay')
								$topay_amt2 = $luggage_row2['luggage_fees']*$get_com1['route_delivery_topay']/100;
								if($luggage_row2['luggage_paymethod']=='Paid')
								$paid_amt2 = $luggage_row2['luggage_fees']*$get_com1['route_delivery_paid']/100;
								if($luggage_row2['luggage_paymethod']=='Credit')
								 $credit_amt2 = $luggage_row2['luggage_fees']*$get_com1['route_delivery_credit']/100;
								 $luggage_paymethod = $luggage_row2['luggage_paymethod'];
								
								 //if($luggage_paymethod=='To Pay'){
								$agent_amt2 =$topay_amt2 +$paid_amt2+$credit_amt2+$door_delivery_charges;
							    $tot_agtop2+=$agent_amt2;
								
								//}
								 $topay_amt2 = 0;$paid_amt2=0;$credit_amt2=0; $agent_amt2 =0;
								
				   			}
							
							}
				   
				   
				   
				   
				   
				   
				   
				   
				   
				   
				   
				   
				   $day_collection_op=mysqli_query($objConn,"select sum(collection_amount) from power_daysheet where    create_date<='".$fromdatesr."' and  route_id = '".$_SESSION['route']."' and collection_status=0 ") or die("Collection error1:".mysql_error());
				  $day_collection_op1=mysqli_fetch_row($day_collection_op);
				  
				  $day_collection=mysqli_query($objConn,"select sum(collection_amount) from power_daysheet where  create_date>='".$frmdate."' and create_date<='".$todate."' and route_id = '".$_SESSION['route']."' and collection_status=0 ") or die("Collection error:".mysql_error());
				  $day_collection1=mysqli_fetch_row($day_collection);
					  
					 $day_exp_op=mysqli_query($objConn,"select sum(collection_amount) from power_daysheet where     create_date<='".$fromdatesr."' and route_id = '".$_SESSION['route']."' and collection_status=1 ") or die("Collection error2:".mysql_error());
				  $day_exp_op1=mysqli_fetch_row($day_exp_op); 
				   
				   $day_exp=mysqli_query($objConn,"select sum(collection_amount) from power_daysheet where  create_date>='".$fromdatesr."' and create_date<='".$todate."' and route_id = '".$_SESSION['route']."' and collection_status=1 ") or die("Collection error:".mysql_error());
				  $day_exp1=mysqli_fetch_row($day_exp);  
				 
				   $fin_recp_op=mysqli_query($objConn,"select sum(collection_amount) from power_collections_ho where    collection_date<='".$fromdatesr."' and  route_id = '".$_SESSION['route']."' ") or die("Collection error3:".mysql_error());
				  $fin_recp_op1=mysqli_fetch_row($fin_recp_op);
					
				     $fin_recp=mysqli_query($objConn,"select sum(collection_amount) from power_collections_ho where  collection_date>='".$fromdatesr."' and collection_date<='".$todate."' and route_id = '".$_SESSION['route']."' ") or die("Collection error:".mysql_error());
				  $fin_recp1=mysqli_fetch_row($fin_recp);
				  
				  // echo '('.$booking_lug_feesop.'+'.$lug_feesop.'-'.$tot_agtop1.'-'.$tot_agtop2.'+'.$day_collection_op1[0].'-'.$day_exp_op1[0].'-'.$fin_recp_op1[0].')';$final_op=0;
				  $tax_op = ($booking_lug_feesop+$lug_feesop)*5/100;
				  //$final_op = $booking_lug_feesop+$lug_feesop+$tax_op+$door_delivery_charges+$door_delivery_charges_paid;;
				  $final_op = $booking_lug_feesop+$lug_feesop-$tot_agtop1-$tot_agtop2+$day_collection_op1[0]-$day_exp_op1[0]-$fin_recp_op1[0]+$tax_op+$door_delivery_charges+$door_delivery_charges_paid;
					  
				  echo number_format($final_op,2);
				  
				  ?></strong></td>
                </tr>
                        
                          <tr style="color:red; font-size:16px;">
                        <td colspan="20" align="right"  bgcolor="#F9C6F1"><strong>Topay Amount : 
						<?php 
						
						  echo number_format($topay_amt,2); 
						 ?></strong></td>
                        </tr>
                         
                         <tr style="color:red; font-size:16px;">
                        <td colspan="20" align="right"  bgcolor="#F9C6F1"><strong>Agent Commision :
                        <?php 
						
						echo $com = number_format(($basic_amt*5/100),2);
						?></strong></td>
                        </tr>
                        <tr style="color:red; font-size:16px;">
                        <td colspan="20" align="right" bgcolor="#F9C6F1" ><strong>Reciept Amount :
                       <?php 
					     
						 
						 
					        
							// if($_POST['agent_type']=='Own Agent')							 						 
							$user_route = "select * from power_route where id =   ".$_SESSION['route']." or route_group = ".$_SESSION['route']." ";								 
							 //if($_POST['agent_type']=='Agent')						 
							 // $user_route = "select * from power_route where  id =   ".$_POST['route_agent'];
							 
							$rec3=0;
							$user_route1=mysqli_query($objConn,$user_route);
							$user_route3=mysqli_num_rows($user_route1);
							while($user_route2=mysqli_fetch_array($user_route1))
							{
								$rec = "select sum(collection_amount) from power_collections_ho where (route_id =".$user_route2['id']." or  route_id  in (select id from power_route where route_group = ".$user_route2['id'].")) and collection_date between '".$frmdate."' and '".$todate."'";
							    $rec1 = mysqli_query($objConn,$rec);
							    $rec2 = mysqli_fetch_row($rec1);
								$rec3 +=  $rec2[0];															
							}
							 
					         
							 echo number_format($rec3,2);
							 
				 ?></strong></td>
                        </tr>
                        <tr style="color:red; font-size:16px;">
                        <td colspan="20" align="right"  bgcolor="#F9C6F1"><strong>Balance Payable : 
						<?php echo $tot_amt1 =number_format(($final_op+$topay_amt-$com-$rec3),2) ;?></strong></td>
                        </tr>
						</tbody>
						</table>
                        
                        <?php }
						else
						{?>
						
						<table class="display">
						<thead>
						<tr>
						 
							<th width="4%">
								 Sl No
							</th>
							<th width="7%">Booking Date</th><th width="7%">Inward Date</th><th width="7%">Delivered Date</th>
                            <th width="13%">LR No.</th>
                            <th width="21%">Sender Name &amp; Phone No.</th>
                            <th width="21%">Reciever Name &amp; Phone No.</th>
							<th width="21%">
								 Particular
							</th>
							<th width="10%">From</th>
							<th width="8%">To</th>
							<th width="6%">Fee</th>
							<th width="7%">Loading Charges</th>
							<th width="7%">Door Delivery</th>
							<th width="7%">Door Delivery Charges</th>
							<th width="7%">Unloading Charges</th>
							<th width="7%">GST</th>
							<th width="7%">Total Amount</th>
							<th width="7%">
								Paid / <br> To Pay
							</th>
							<th width="6%">Luggage Status</th>
							<th width="18%">
								 Action
							</th>
						</tr>
						</thead>
						<tbody>
                          <?php
					//Maximum of News & Events
					//echo "select * from power_ticket where luggage_to = '".$_SESSION['route']."' and create_date>='".$frmdate."' and create_date<='".$todate."' ";
                    $luggage=mysqli_query($objConn,"select * from power_ticket where luggage_to = '".$_SESSION['route']."' and delivered_date>='".$frmdate."' and delivered_date<='".$todate."'   and luggage_status = 'Delivered'  order by id asc ") or die("Vehicle error:".mysql_error());
					$luggage_num=mysqli_num_rows($luggage);
					if($luggage_num==0)
					{
                    ?>
                        <tr>
                        <td colspan="18" align="center" valign="middle" bgcolor="#F9C6F1">No Records.</td>
                        </tr>
                   <?php
				   }
				   else
				   {
				   
				   $i=1;
				   $cnt=0;
				   $tot_amt=0;$tot_amt1=0;$paid_amt=0;$topay_amt=0;$credit_amt=0;
				   while($luggage_row=mysqli_fetch_array($luggage))
				   {
					   $cnt++;
                            $css_set=$cnt%2;
				   ?>
						<tr <?php if($css_set==0) echo "class=gradeX"; else  echo "class=gradeC"; ?>>
						 
							<td align="center"><?php echo $i."."; ?></td>
                            
							<td align="center"><?php echo date('d-M-Y',strtotime($luggage_row['create_date']));?></td>
							<td align="center">
							<?php if($luggage_row['inward_date']!=NULL) echo date('d-M-Y',strtotime($luggage_row['inward_date'])); else echo 'Nil'; ?></td>
							<td align="center"><?php if($luggage_row['delivered_date']!=NULL) echo date('d-M-Y',strtotime($luggage_row['delivered_date'])); else  echo 'Nil'; ?></td>
                            <td align="center"><?php echo $luggage_row['luggage_lrno']; 
							if($luggage_row['luggage_ref']!=0)
							{
								echo "<br><font color=red>( Ref. ".$luggage_row['luggage_ref'].")</font>";
							}?></td>
                            <td align="center"><?php echo $luggage_row['luggage_sender'].' & '.$luggage_row['luggage_sender_phone']; ?></td>
                            <td align="center"><?php echo $luggage_row['luggage_reciever'].' & '.$luggage_row['luggage_reciever_phone']; ?></td>
							<td align="center">
                            <?php 
							$luggage_prd = "select * from power_ticket_prd where luggage_lrno = '".$luggage_row['luggage_lrno']."'";
							$luggage_prd1 = mysqli_query($objConn,$luggage_prd);
							$luggage_prd_rows = mysqli_num_rows($luggage_prd1);
							$cn=0;
							while($luggage_prd2 = mysqli_fetch_array($luggage_prd1))
							{
							   echo $luggage_prd2['luggage_prd_name']." - ".$luggage_prd2['luggage_qunty'];
							   $cn++;
							   if($cn!=$luggage_prd_rows) echo " , ";
							   
							}
							
							?>
                            
                            
								 
							</td>
							<td align="center">
							<?php 
							$routefrom = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where id = ".$luggage_row['luggage_from']));
							echo $routefrom1 = $routefrom[0];
							
							?></td>
							<td align="center"><?php 
							$routeto = mysqli_fetch_row(mysqli_query($objConn,"select route,route_group,route_type from power_route where id = ".$luggage_row['luggage_to']));
							echo $routeto1 = $routeto[0];
							
							?></td>
							<td align="center"><?php echo $luggage_row['luggage_fees'];
							if($routeto[1]==0 && $routeto[2]==0 )
							$basic_amt += $luggage_row['luggage_fees'];
							?></td>
							<td align="center"><?php echo $luggage_row['luggage_charges']?></td>
							<td align="center"><?php echo $luggage_row['luggage_doordelivery']?></td>
							<td align="center"><?php echo $luggage_row['luggage_doorcharges']?></td>
							<td align="center"><?php echo $luggage_row['unloading_charges']?></td>
							<td align="right"><?php 
					if($luggage_row['luggage_paymethod']=='To Pay'){
					   $both_loading = $luggage_row['luggage_charges']+$luggage_row['unloading_charges'];
					   $tot_unloa+=$luggage_row['luggage_charges']+$luggage_row['unloading_charges'];
				   }
				   else
				   {
				   $tot_unloa+=0;
				   $both_loading = 00;
				   }							
				  if($luggage_row['luggage_paymethod']=='To Pay'){
				  $tax_topay =($luggage_row['luggage_fees'] +$both_loading) *5/100;
				  $tot_tax_topay+=$tax_topay;
				   echo number_format($tax_topay,2);
				  }
				    else
				   {
					    $tax_topay =0;
				  $tot_tax_topay+=$tax_topay;
				   echo number_format($tax_topay,2);
				   }
				   
				  ?></td>
							<td align="center"><?php $tot_amt=$luggage_row['luggage_fees']+$luggage_row['luggage_charges']+$luggage_row['luggage_doorcharges']+$luggage_row['unloading_charges']+$tax_topay;
							echo number_format($tot_amt,2);?></td>
							
							<td align="center"><span class="center"><?php echo $luggage_row['luggage_paymethod']?></span></td>
							<?php 
							if($luggage_row['luggage_status']=='New Arrival') $cls='class="badge_style b_pending"';
							if($luggage_row['luggage_status']=='Dispatched') $cls='class="badge_style b_confirmed"';
							if($luggage_row['luggage_status']=='Inward') $cls='class="badge_style b_high"';
							if($luggage_row['luggage_status']=='Delivered') $cls='class="badge_style b_done"';
							if($luggage_row['luggage_status']=='Cancelled') $cls='class="badge_style b_cancelled"';
							?>
							<td align="center" <?php echo $cls;?>>
                            <?php if($luggage_row['luggage_status']=='Inward'){?>
							<a href="#" onclick="return CenterWindow(500,500,50,'print_delivery.php?id=<?php echo $luggage_row['id']; ?>')"><img src="images/print.png"/></a>
							<?php  }
							echo $luggage_row['luggage_status'];
							?></td>
							<td align="center" class="center">
                            <?php if($luggage_row['luggage_status']=='Inward') {
								?>
							<span>
                           <a href="#" onclick="return CenterWindow(500,500,50,'luggage_edit.php?id=<?php echo $luggage_row['id']; ?>')">
<img src="images/edit.png"/></a></span>
                            <span><a href="luggage_delivery.php?news=del&amp;event_id=<?php echo $luggage_row['id'];?>" onclick="return confirmSubmit();" title="delete"><img src="images/delete.png"/></a></span><span><a href="luggage_edit.php?news=del&amp;event_id=<?php echo $luggage_row['id'];?>" onclick="return confirmSubmit();" title="delete"></a></span><?php }?>
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
					<tr><td colspan="19" align="right" style="color:red; font-size:16px;"  bgcolor="#F9C6F1"><strong>OOOOOpening Balance : </strong>
                        <strong><?php  
				    $timeop = strtotime($frmdate.' -2 day');
    				$fromdatesrop = date("Y-m-d", $timeop);
				   $luggage=mysqli_query($objConn,"select * from power_ticket where delivered_date<='".$frmdate."' and luggage_from =".$_SESSION['route']."  and luggage_status<>'Cancelled'   order by delivered_date") or die("Vehicle error:".mysql_error());
							
							$luggage_row4=mysqli_num_rows($luggage);
							if($luggage_row4>0)
							{
							while($luggage_row=mysqli_fetch_array($luggage))
				   			{
								
								if($luggage_row['luggage_paymethod']=='Paid'){
								$booking_lug_feesop +=$luggage_row['luggage_fees'];
								$booking_lug_feesop +=$luggage_row['luggage_charges']; 
								$booking_lug_feesop +=$luggage_row['unloading_charges'];
								$door_delivery_charges_paid =$luggage_row['luggage_doorcharges'];
								}
								if($luggage_row['luggage_paymethod']!='Expenses')
								{
				           		$get_com = mysqli_query($objConn,"select * from power_route where id =".$_SESSION['route']);
								$get_com1 = mysqli_fetch_array($get_com);
								}
								if(($luggage_row['luggage_paymethod']=='To Pay'))
								{
								 $topay_amt1 = $luggage_row['luggage_fees']*$get_com1['route_comission_topay']/100;
								 $agent_amt1 =$topay_amt1;
								}
								if(($luggage_row['luggage_paymethod']=='Paid') )
								{
								 $paid_amt1 = $luggage_row['luggage_fees']*$get_com1['route_comission_paid']/100;
								  $agent_amt1 +=$paid_amt1;
								}
								if(($luggage_row['luggage_paymethod']=='Credit') )
								{
								 $credit_amt1 = $luggage_row['luggage_fees']*$get_com1['route_comission_credit']/100;
								 $agent_amt1 =$credit_amt1+$luggage_row['luggage_charges'];
								}
								  $tot_agtop1+=$agent_amt1;
								  $topay_amt1 = 0;$paid_amt1=0;$credit_amt1=0; $agent_amt1 =0;
								  
							}
				   			
							}
							
						
							$luggage2=mysqli_query($objConn,"select * from power_ticket where delivered_date<='".$frmdate."'   and luggage_to =".$_SESSION['route']." and luggage_status<>'Cancelled'  order by delivered_date") or die("Vehicle111 error:".mysql_error());
							$luggage_row3=mysqli_num_rows($luggage2);
							if($luggage_row3>0)
							{
							while($luggage_row2=mysqli_fetch_array($luggage2))
				   			{
								
								if($luggage_row2['luggage_paymethod']=='To Pay'){
								$lug_feesop +=$luggage_row2['luggage_fees'];
								$lug_feesop +=$luggage_row2['luggage_charges']; 
								$lug_feesop +=$luggage_row2['unloading_charges']; 
								$door_delivery_charges =$luggage_row2['luggage_doorcharges']; 
								}
				           		$get_com = mysqli_query($objConn,"select * from power_route where id =".$_SESSION['route']);
								$get_com1 = mysqli_fetch_array($get_com);
								if($luggage_row2['luggage_paymethod']=='To Pay')
								$topay_amt2 = $luggage_row2['luggage_fees']*$get_com1['route_delivery_topay']/100;
								if($luggage_row2['luggage_paymethod']=='Paid')
								$paid_amt2 = $luggage_row2['luggage_fees']*$get_com1['route_delivery_paid']/100;
								if($luggage_row2['luggage_paymethod']=='Credit')
								 $credit_amt2 = $luggage_row2['luggage_fees']*$get_com1['route_delivery_credit']/100;
								 $luggage_paymethod = $luggage_row2['luggage_paymethod'];
								
								 //if($luggage_paymethod=='To Pay'){
								$agent_amt2 =$topay_amt2 +$paid_amt2+$credit_amt2+$door_delivery_charges;
							    $tot_agtop2+=$agent_amt2;
								
								//}
								$topay_amt2 = 0;$paid_amt2=0;$credit_amt2=0; $agent_amt2 =0;
								
				   			}
							
							}
				   
				   
				   
				   
				   
				   
				   
				   
				   
				   
				   
				   
				   $day_collection_op=mysqli_query($objConn,"select sum(collection_amount) from power_daysheet where    create_date<='".$fromdatesr."' and  route_id = '".$_SESSION['route']."' and collection_status=0 ") or die("Collection error1:".mysql_error());
				  $day_collection_op1=mysqli_fetch_row($day_collection_op);
				  
				  $day_collection=mysqli_query($objConn,"select sum(collection_amount) from power_daysheet where  create_date>='".$frmdate."' and create_date<='".$todate."' and route_id = '".$_SESSION['route']."' and collection_status=0 ") or die("Collection error:".mysql_error());
				  $day_collection1=mysqli_fetch_row($day_collection);
					  
					 $day_exp_op=mysqli_query($objConn,"select sum(collection_amount) from power_daysheet where     create_date<='".$fromdatesr."' and route_id = '".$_SESSION['route']."' and collection_status=1 ") or die("Collection error2:".mysql_error());
				  $day_exp_op1=mysqli_fetch_row($day_exp_op); 
				   
				   $day_exp=mysqli_query($objConn,"select sum(collection_amount) from power_daysheet where  create_date>='".$frmdate."' and create_date<='".$todate."' and route_id = '".$_SESSION['route']."' and collection_status=1 ") or die("Collection error:".mysql_error());
				  $day_exp1=mysqli_fetch_row($day_exp);  
				 
				   $fin_recp_op=mysqli_query($objConn,"select sum(collection_amount) from power_collections_ho where    collection_date<='".$fromdatesr."' and  route_id = '".$_SESSION['route']."' ") or die("Collection error3:".mysql_error());
				  $fin_recp_op1=mysqli_fetch_row($fin_recp_op);
					
				     $fin_recp=mysqli_query($objConn,"select sum(collection_amount) from power_collections_ho where  collection_date>='".$frmdate."' and collection_date<='".$todate."' and route_id = '".$_SESSION['route']."' ") or die("Collection error:".mysql_error());
				  $fin_recp1=mysqli_fetch_row($fin_recp);
				  
				  // echo '('.$booking_lug_feesop.'+'.$lug_feesop.'-'.$tot_agtop1.'-'.$tot_agtop2.'+'.$day_collection_op1[0].'-'.$day_exp_op1[0].'-'.$fin_recp_op1[0].')';$final_op=0;
				  $tax_op = ($booking_lug_feesop+$lug_feesop)*5/100;
				  $final_op = $booking_lug_feesop+$lug_feesop-$tot_agtop1-$tot_agtop2+$day_collection_op1[0]-$day_exp_op1[0]-$fin_recp_op1[0]+$tax_op+$door_delivery_charges+$door_delivery_charges_paid;
					  
				  echo number_format($final_op,2);
				  
				  ?></strong></td>
                </tr>
                 
                 
                 
					
					<?php/*<tr><td colspan="19" align="right"  bgcolor="#F9C6F1"><strong>Paid Amount : 
                        <?php 
						
						 echo $paid_amt ?></strong></td>
                        </tr>*/?>
                         <tr style="color:red; font-size:16px;">
                        <td colspan="19" align="right"  bgcolor="#F9C6F1"><strong>Topay Amount : 
						<?php 
						
						  echo number_format($topay_amt,2); 
						 ?></strong></td>
                        </tr>
                        <?/* <tr>
                        <td colspan="19" align="right"  bgcolor="#F9C6F1"><strong>Credit Amount :
                        <?php echo $credit_amt;
						?></strong></td>
                        </tr>*/?>
                         <tr style="color:red; font-size:16px;">
                        <td colspan="19" align="right"  bgcolor="#F9C6F1"><strong>Agent Commision :
                        <?php 
						
						echo $com = number_format(($basic_amt*5/100),2);
						?></strong></td>
                        </tr>
                        <tr style="color:red; font-size:16px;">
                        <td colspan="19" align="right" bgcolor="#F9C6F1" ><strong>Reciept Amount :
                       <?php 
					   
					        
							// if($_POST['agent_type']=='Own Agent')							 						 
							  $user_route = "select * from power_route where id =   ".$_SESSION['route']." or route_group = ".$_SESSION['route']." ";								 
							 //if($_POST['agent_type']=='Agent')						 
							 // $user_route = "select * from power_route where  id =   ".$_POST['route_agent'];
							 
							$rec3=0;
							$user_route1=mysqli_query($objConn,$user_route);
							$user_route3=mysqli_num_rows($user_route1);
							while($user_route2=mysqli_fetch_array($user_route1))
							{
								$rec = "select sum(collection_amount) from power_collections_ho where route_id =".$user_route2['id'];
							    $rec1 = mysqli_query($objConn,$rec);
							    $rec2 = mysqli_fetch_row($rec1);
								$rec3 +=  $rec2[0];															
							}
							 
					         
							 echo number_format($rec3,2);
							 
				 ?></strong></td>
                        </tr>
                        <tr style="color:red; font-size:16px;">
                        <td colspan="19" align="right"  bgcolor="#F9C6F1"><strong>Balance Payable : 
						<?php echo $tot_amt1 =number_format(($final_op +$topay_amt-$com-$rec3),2) ;?></strong></td>
                        </tr><?php }?>
						</tbody>
						</table>
						<?php
						}
						?>  </form>
					</div>
				</div>
			</div>
			
			
			
			
		</div>
		<span class="clear"></span>
	</div>
</div>
</body>
</html>