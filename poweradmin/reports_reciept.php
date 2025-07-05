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
$routestr='';

if($_REQUEST['Submit'] or isset($_REQUEST['frmdate']))
{
	$news_events_flow=mysqli_query($objConn,"select * from power_collections_ho where collection_date between  '".$frmdate."' and '".$todate."' and collection_date > '2019-03-31'");
	$news_events_flow_total=mysqli_query($objConn,"select sum(collection_amount) from power_collections_ho where collection_date between  '".$frmdate."' and '".$todate."' and collection_date > '2019-03-31'");
}
if($_REQUEST['del']=='expenses')
{
	 $news_events_flow=mysqli_query($objConn,"delete from power_collections_ho where  id =   ".$_REQUEST['id']) or die("Collection error:".mysql_error());
	  header("location:reports_reciept.php?frmdate=".$_REQUEST['frmdate']."&todate=".$_REQUEST['todate']);
}

?><!DOCTYPE HTML>
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


function enter_pressed(e){
var keycode;
if (window.event) keycode = window.event.keyCode;
else if (e) keycode = e.which;
else return false;
return (keycode == 13);
}

//NUMBERS ONLY
function numbersonly(myfield, e, dec)
{
	var key;
	var keychar;
	
	if (window.event)
	   key = window.event.keyCode;
	else if (e)
	   key = e.which;
	else
	   return true;
	keychar = String.fromCharCode(key);

	// control keys
	if ((key==null) || (key==0) || (key==8) || (key==9) || (key==13) || (key==27)  ){
	   return true;
	}
	// numbers
	else {	
		if ((("0123456789").indexOf(keychar) > -1)){
		   
			return true;
		  
		} 
		else {
			 
			// decimal point jump
			if (dec && (keychar == "."))	{				
				myfield.form.elements[dec].focus();
				return false;
			} else {
				return false;
			}
		}
	}
}
//NUMBERS ONLY

</script>

<script LANGUAGE="JavaScript">
<!--
function confirmSubmit()
 {
var msg;
msg= "Please Confirm again";
var agree=confirm(msg);
if (agree)
return true ;
else
return false ;
}
// -->
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
			<ul id="sidenav" class="accordion_mnu collapsible">
               <?php include("includes/menu.php");?>
			</ul>
		</div>
	</div>
</div>
<div id="container">
	<div id="header" class="blue_lin">
		<div class="header_left">
			<div class="logo">
				<img src="images/logo.png" alt="Kmp Travels">
			</div>
			<div id="responsive_mnu">
			<a href="#responsive_menu" class="fg-button" id="hierarchybreadcrumb"><span class="responsive_icon"></span>Menu</a>
				<div id="responsive_menu" class="hidden">
					<ul>
				<?php include("includes/menu.php");?>
			</ul>
				</div>
			</div>
		</div>
		<div class="header_right">
			
			<div id="user_nav">
				<ul>
					<li class="user_thumb"><a href="#"><span class="icon"><img src="images/user_thumb.png" width="30" height="30" alt="User"></span></a></li>
					<li class="user_info"><span class="user_name"><?php echo $_SESSION['route_name']?></span><span><a href="logout.php"><strong>Logout</strong></a> </span></li>
                    
                    
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
						<span class="h_icon file_cabinet"></span>
						<h6>Agent Collections</h6>
                        <!--<div class="print"><h6>Print</h6></div>-->
					</div>
                    
					<div class="widget_content">
                          <form name="frm" id="frm" method="post" action="">
                    <div class="arrow_box">
    <table width="100%" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;" class="arrow_box_content top_arrow">
      
      <tr>
        <td height="26" align="right" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt" style="text-transform:uppercase;">&nbsp;</td>
        <td align="right" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt">&nbsp;</td>
      </tr>
      <tr>
        <td width="246" height="26" align="right" class="label_txt">From Date :</td>
        <td width="285" align="center" class="label_txt" style="text-transform:uppercase;">
		<script>DateInput('frmdate', true, 'yyyy-mm-dd','<?php echo $frmdate; ?>')</script></td>
        <td width="169" align="right" class="label_txt">To Date : </td>
        <td width="271" align="center" class="label_txt">
          <script>DateInput('todate', true, 'yyyy-mm-dd','<?php echo $todate; ?>')</script>       </td>
        <td width="87" align="center" class="label_txt">&nbsp;</td>
      </tr>
      
    
      <tr>
        <td width="246" height="26" align="right" class="label_txt">&nbsp;</td>
        <td width="285" align="center" class="label_txt" style="text-transform:uppercase;"><input type="submit" class="btn_small btn_blue" name="Submit" value="Search"></td>
        <td width="169" align="right" class="label_txt">&nbsp;</td>
        <td width="271" align="center" class="label_txt">&nbsp;</td>
        <td width="87" align="center" class="label_txt">&nbsp;</td>
      </tr>
    </table></div>
	
 
    
                        
                        
                    
                       
                       
                       
                       <div align="right"><div class="btn_40_blue ucase">
								<a href="expenses.php"><span class="icon billing_sl"></span><span>ADDNEW RECIEPT FROM AGENT</span></a><br>
							</div></div>
    
    <span style="font-size:12px; color:red; font-weight:bold;">Total Recieved Amount : <?php $news_events_flow_row_total =mysqli_fetch_row($news_events_flow_total);
	echo number_format($news_events_flow_row_total[0],2);
	?></span><br><br><div class="clearfix"></div>
						<table class="display">
						<thead>
                        
						<tr>
							<th>Sl No</th>
                            
                            <th>Reciept Date</th><th>Route</th>
                            <th>Recipt No.</th>
                            <th>Collection Amount</th>
 							<th>Comments</th>
							 
							
                           
						</tr>
						</thead>
						<tbody>
                       
                        <?php
					//Maximum of News & Events
					$totalcreditchq =0;
					$totalcreditcash=0;
					$totalucbcash =0;
					$totalucbchq =0;
                   $totalucb = 0;
					$news_events_flow_num=mysqli_num_rows($news_events_flow);
					if($news_events_flow_num==0)
					{
                    ?>
                        <tr>
                        <td colspan="5" align="center" valign="middle" bgcolor="#F9C6F1">No Records.</td>
                        </tr>
                   <?php
				   }
				   else
				   {
				   
				   $i=1;
				   $cnt=0;
				   while($news_events_flow_row=mysqli_fetch_array($news_events_flow))
				   {
					   $cnt++;
                            $css_set=$cnt%2;
						
								
				   ?>
						
						<tr <?php if($css_set==0) echo "class=gradeX"; else  echo "class=gradeC"; ?> >
							<td><?php echo $i."."; ?><input type="hidden" name="del[]" value="<?php echo $news_events_flow_row['id']?>"></td>
                            <td class="center"><?php echo date('d-M-Y',strtotime($news_events_flow_row['collection_date']));?></td>
                                                       
							<td align="left">
							<?php 
							
							$routename = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where id = ".$news_events_flow_row['route_id']));
							 $routename1 = '  (<font color=red>From : '.$routename[0].'</font>)';
				   echo $routename1;
							?>
							</td>
                             <td class="center"><?php echo $news_events_flow_row['id'];?></td>
                             <td class="center"><?php echo number_format($news_events_flow_row['collection_amount'],2);?></td>
                            <td class="center"><?php echo $news_events_flow_row['particulars'];?></td>
                            <?php /*?><td align="justify"><?php 
							if($news_events_flow_row['luggage_paymethod']=='To Pay')
							{ $routename = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where id = ".$news_events_flow_row['luggage_from']));
							 $routename1 = 'From : '.$routename[0];
				   echo $routename1;
							}
							else
							{
				   $routename = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where id = ".$news_events_flow_row['luggage_to']));
							 $routename1 = $routename[0];
				   echo $routename1;}
							?></td>
							<td align="right"><input type="text" name="<?php echo $news_events_flow_row['id']?>" value="<?php echo $news_events_flow_row['luggage_fees']?>" onkeypress="if(enter_pressed(event)){ return false; } else { return numbersonly(this, event, false); }">
							
							</td>
							<td align="right"><?php 
							if($news_events_flow_row['luggage_paymethod']!='Expenses')
							{
								if($news_events_flow_row['luggage_paymethod']=='To Pay')
							{
								$topay_total = $news_events_flow_row['luggage_fees']+$news_events_flow_row['luggage_doorcharges']+$news_events_flow_row['luggage_charges']+$news_events_flow_row['unloading_charges'];
							echo number_format($topay_total,2);
							}
							else
							{
								$topay_total = $news_events_flow_row['luggage_fees']+$news_events_flow_row['luggage_doorcharges']+$news_events_flow_row['luggage_charges']+$news_events_flow_row['unloading_charges'];
							echo number_format($topay_total,2);
							}
							$totalcredit+=$topay_total;
							}
							?>
							</td>
                            <td  align="center" valign="middle"><a href="daysheet.php?del=expenses&id=<?php echo $news_events_flow_row['id'] ?>&frmdate=<?php echo $frmdate?>&todate=<?php echo $frmdate?>" onclick="return confirmSubmit();"><img src="images/edit.png"></a></td>
							 <td  align="center" valign="middle"><a href="reports_reciept.php?del=reciept&id=<?php echo $news_events_flow_row['id'] ?>&frmdate=<?php echo $frmdate?>&todate=<?php echo $frmdate?>" onclick="return confirmSubmit();"><img src="images/delete.png"></a></td><?php */?>
							
							
						</tr>
						
						<?php 
					$i++;
						}
							
					
					}
					
					 ?> <?php /*?> 
                     <tr>
                        <td colspan="8" align="left" valign="middle" >  <div align="right"><input type="submit" value="Update Credit Client Collections" name="update2" class="btn_small btn_blue"></div></td>
                        </tr>
                     <thead>
                          <tr>
                        <td colspan="8" align="left" valign="middle" bgcolor="#F9C6F1"><h2>Credit Client Collections</h2></td>
                        </tr>
                        
                        
                       
                         <tr>
							<th width="3%">Sl No</th>
                            <th width="10%">Create Date</th>
                            <th width="7%">Particulars</th>
							 <th width="7%">Bank Details</th>
							<th width="15%" align="right"><?php  
							echo "Debit [ Rs.]";?></th>
							<th width="15%" align="right"><?php  
							echo "Credit[ Rs.]";?></th>
                             <th width="15%" align="center">Edit</th>
						</tr>
                        </thead>
                          <tr  >
                          
                          
                           <?php
						   
						   $news_events_flow=mysqli_query($objConn,"select * from power_collections_credit where  collection_date between  '".$frmdate."' and '".$todate."'  and collection_date > '2019-03-30'     order by collection_date  ") or die("Collection error:".mysql_error());
					//Maximum of News & Events
					$totalcreditchq =0;
					$totalcreditcash=0;
					$totalucbcash =0;
					$totalucbchq =0;
                   $totalucb = 0;
					$news_events_flow_num=mysqli_num_rows($news_events_flow);
					if($news_events_flow_num==0)
					{
                    ?>
                        <tr>
                        <td colspan="6" align="center" valign="middle" bgcolor="#F9C6F1">No Records.</td>
                        </tr>
                   <?php
				   }
				   else
				   {
				   
				  
				   $cnt=0;
				   while($news_events_flow_row=mysqli_fetch_array($news_events_flow))
				   {
					   $cnt++;
                            $css_set=$cnt%2;
							
								
				   ?>
						
						<tr <?php if($css_set==0) echo "class=gradeX"; else  echo "class=gradeC"; ?> >
							<td><?php echo $i."."; ?><input type="hidden" name="del1[]" value="<?php echo $news_events_flow_row['id']?>"></td>
                            <td class="center"><?php echo date('d-M-Y',strtotime($news_events_flow_row['collection_date']));?></td>
                                                        <td class="center"><?php 
										 $roname = "select * from power_credit where id = ".$news_events_flow_row['route_id'];	
										$roname1 = 	mysqli_query($objConn,$roname);	
										$roname2 = 	mysqli_fetch_array($roname1);
										echo $roname2['credit'];
														
														echo ' ('.$news_events_flow_row['particulars'].')';?></td>
							
                            <td align="justify"><?php 
							echo $news_events_flow_row['bank_name'].' '.$news_events_flow_row['branch_name'].' '.$news_events_flow_row['chq_no'].' '.$news_events_flow_row['chq_date'];
							?></td>
							<td align="right">
							
							</td>
							<td align="right"><input type="text" name="<?php echo $news_events_flow_row['id']?>" value="<?php echo $news_events_flow_row['collection_amount']?>" onkeypress="if(enter_pressed(event)){ return false; } else { return numbersonly(this, event, false); }">
							</td>
							<td width="15%" align="center"><a href="daysheet.php?del=credit&id=<?php echo $news_events_flow_row['id'] ?>&frmdate=<?php echo $frmdate?>&todate=<?php echo $frmdate?>" onclick="return confirmSubmit();"><img src="images/delete.png"></a></td>
							
							
						</tr>
						
						<?php 
					$i++;
								 }
							
					
					
				   }
					
					 ?><tr>
                        <td colspan="8" align="left" valign="middle" >  <div align="right"><input type="submit" value="Update Agent Collections" name="update3" class="btn_small btn_blue"></div></td>
                        </tr>
                     <thead>
                     <tr>
                        <td colspan="8" align="left" valign="middle" bgcolor="#F9C6F1"><h2>Agent Collections</h2></td>
                        </tr>
                         <tr>
							<th width="3%">Sl No</th>
                            <th width="10%">Create Date</th>
                            <th width="7%">Particulars</th>
 							<th width="7%">Paymethod</th>
							 <th width="7%">Bank Details</th>
							<th width="15%" align="right"><?php  
							echo "Debit [ Rs.]";?></th>
							<th width="15%" align="right"><?php  
							echo "Credit[ Rs.]";?></th>
                             <th width="15%" align="center">Edit</th>
						</tr>
                          <tr  >
                         <thead> 
                          
                           <?php
						   
						   $news_events_flow=mysqli_query($objConn,"select * from power_collections where  collection_date between  '".$frmdate."' and '".$todate."'    and collection_date > '2019-03-30'     order by collection_date  ") or die("Collection error:".mysql_error());
					
					$totalcreditchq =0;
					$totalcreditcash=0;
					$totalucbcash =0;
					$totalucbchq =0;
                   $totalucb = 0;
					$news_events_flow_num=mysqli_num_rows($news_events_flow);
					if($news_events_flow_num==0)
					{
                    ?>
                        <tr>
                        <td colspan="7" align="center" valign="middle" bgcolor="#F9C6F1">No Records.</td>
                        </tr>
                   <?php
				   }
				   else
				   {
				   
				  
				   $cnt=0;
				   while($news_events_flow_row=mysqli_fetch_array($news_events_flow))
				   {
					   $cnt++;
                            $css_set=$cnt%2;
							
								
				   ?>
						
						<tr <?php if($css_set==0) echo "class=gradeX"; else  echo "class=gradeC"; ?> >
							<td><?php echo $i."."; ?><input type="hidden" name="del2[]" value="<?php echo $news_events_flow_row['id']?>"></td>
                            <td class="center"><?php echo date('d-M-Y',strtotime($news_events_flow_row['collection_date']));?></td>
                                                        <td class="center"><?php 
										$roname = "select * from power_route where id = ".$news_events_flow_row['route_id'];	
										$roname1 = 	mysqli_query($objConn,$roname);	
										$roname2 = 	mysqli_fetch_array($roname1);
										echo $roname2['route'];
														
														echo ' ('.$news_events_flow_row['particulars'].')';?></td>
							<td align="center">
							<?php 
							echo $news_events_flow_row['pay_mode'];
							?>
							</td>
                            <td align="justify"><?php 
							echo $news_events_flow_row['bank_name'].' '.$news_events_flow_row['branch_name'].' '.$news_events_flow_row['chq_no'].' '.$news_events_flow_row['chq_date'];
							?></td>
							<td align="right">
							
							</td>
							<td align="right"><input type="text" value="<?php echo $news_events_flow_row['collection_amount']?>" name="<?php echo $news_events_flow_row['id']?>">
						
							
							</td>
							
							<td width="15%" align="center"><a href="daysheet.php?del=agent&id=<?php echo $news_events_flow_row['id'] ?>&frmdate=<?php echo $frmdate?>&todate=<?php echo $frmdate?>" onclick="return confirmSubmit();"><img src="images/delete.png"></a></td>
							
						</tr>
						
						<?php 
					$i++;
								 }
							
					
					}
					
					 ?> 
                     <tr>
                        <td colspan="8" align="left" valign="middle" >  <div align="right"><input type="submit" value="Update Bank Transfer" name="update4" class="btn_small btn_blue"></div></td>
                        </tr>
                          <thead>
                          <tr>
                        <td colspan="8" align="left" valign="middle" bgcolor="#F9C6F1"><h2>Bank Transfer</h2></td>
                        </tr>
                         <tr>
							<th width="3%">Sl No</th>
                            <th width="10%">Transfer Date</th>
                            <th width="7%">Particulars</th>
 							<th width="7%">Paymethod</th>
							 <th width="7%">Bank Details</th>
							<th width="15%" align="right"><?php  
							echo "Debit [ Rs.]";?></th>
							<th width="15%" align="right"><?php  
							echo "Credit[ Rs.]";?></th>
                             <th width="15%" align="center">Edit</th>
						</tr>
                        <thead>
                          <tr  >
                          
                          
                           <?php
						   
						   $news_events_flow=mysqli_query($objConn,"select * from power_transfer where  collection_date between  '".$frmdate."' and '".$todate."'     and collection_date > '2019-03-30'    order by collection_date  ") or die("Collection error:".mysql_error());
					//Maximum of News & Events
					$totalcreditchq =0;
					$totalcreditcash=0;
					$totalucbcash =0;
					$totalucbchq =0;
                   $totalucb = 0;
					$news_events_flow_num=mysqli_num_rows($news_events_flow);
					if($news_events_flow_num==0)
					{
                    ?>
                        <tr>
                        <td colspan="7" align="center" valign="middle" bgcolor="#F9C6F1">No Records.</td>
                        </tr>
                   <?php
				   }
				   else
				   {
				   
				   
				   $cnt=0;
				   while($news_events_flow_row=mysqli_fetch_array($news_events_flow))
				   {
					   $cnt++;
                            $css_set=$cnt%2;
							
								
				   ?>
						
						<tr <?php if($css_set==0) echo "class=gradeX"; else  echo "class=gradeC"; ?> >
							<td><?php echo $i."."; ?><input type="hidden" name="del3[]" value="<?php echo $news_events_flow_row['id']?>"></td>
                            <td class="center"><?php echo date('d-M-Y',strtotime($news_events_flow_row['collection_date']));?></td>
                                                        <td class="center"><?php echo $news_events_flow_row['particulars'];?></td>
							<td align="center">
							Cheque
							</td>
                            <td align="justify"><?php 
							echo $news_events_flow_row['bank_name'].' '.$news_events_flow_row['branch_name'].' '.$news_events_flow_row['chq_no'].' '.$news_events_flow_row['chq_date'];
							?></td>
							<td align="right"><input type="text" value="<?php echo $news_events_flow_row['collection_amount']?>" name="<?php echo $news_events_flow_row['id']?>">
							
							</td>
							<td align="right">
							</td>
							
							 <td width="15%" align="center"><a href="daysheet.php?del=transfer&id=<?php echo $news_events_flow_row['id'] ?>&frmdate=<?php echo $frmdate?>&todate=<?php echo $frmdate?>" onclick="return confirmSubmit();"><img src="images/delete.png"></a></td>
							
						</tr>
						
						<?php 
					$i++;
								 }
							
					
					}
					
					
					
					 ?> <?php */?>
                    
                          
						</tbody>
						</table>
                       
                       
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