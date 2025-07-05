<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
if($_REQUEST['id'])
{
	
	 			  $max="select * from power_credit where id = ".$_REQUEST['id'];
			      $max1=mysqli_query($objConn,$max);
			      $max2=mysqli_fetch_array($max1);
	
 				  
}
if($_REQUEST['news']=="del")
{
$id=$_REQUEST['id'];
$del_news=mysqli_query($objConn,"delete from power_collections_credit  where id=".$id."") or die("Delete Collection Error:".mysql_error());
header("location:credit_customers.php?msg=3&id=".$_REQUEST['id']);
}
$balance="select sum(luggage_fees),sum(luggage_charges),sum(luggage_doorcharges) from power_luggage where luggage_paymethod='Credit' and luggage_status <> 'Cancelled' and (luggage_sender='".$max2['credit']."' and luggage_sender_phone = ".$max2['credit_phone'].")";
$balance1=mysqli_query($objConn,$balance);
$balance2=mysqli_fetch_row($balance1);
$balance3 = $balance2[0]+$balance2[1]+$balance2[2];
$balance4=mysqli_query($objConn,"select sum(collection_amount) from power_collections_credit where route_id='".$_REQUEST['id']."' ");
$balance5=mysqli_fetch_row($balance4);
$balance6=$balance5[0];
$total_bal_amt = $balance3 - $balance6;
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
					<li class="user_info"><span class="user_name">Administrator</span><span><a href="logout.php"><strong>Logout</strong></a> </span></li>
                    
                    
					<!--<li class="logout"><a href="#"><span class="icon"></span>Logout</a></li>-->
				</ul>
			</div>
		</div>
	</div>
	
	<div id="content">
		<div class="grid_container">
			
			
			
			<div class="grid_12">
				<div class="widget_wrap" style="overflow:auto">
					<div class="widget_top">
						<span class="h_icon user_comment"></span>
						<h6>Credit Customer  : <font color="red" style="font-size:22px"> <?php echo $max2['credit']?> </font>  &  Balance Amount : Rs.
                        <font color="red" style="font-size:22px">  <?php echo number_format($total_bal_amt,2)?></font></h6>
                        					<div class="widget_content">
								<div align="right"><div class="btn_40_blue ucase">
								<a href="credit.php"><span class="back"></span><span>Back</span></a>
							</div></div><br>
<strong>Booking Details : </strong>
						
						<br>	<br>					  <table class="display">
					    <thead>
					      <tr>
					        <th width="4%"> Sl No </th>
					        <th width="7%">Date</th>
					        <th width="13%">LR No.</th>
					        <th width="21%">Sender Name &amp; Phone No.</th>
					        <th width="21%">Reciever Name &amp; Phone No.</th>
					        <th width="21%"> Particular </th>
					        <th width="10%">From</th>
					        <th width="8%">To</th>
					        <th width="6%">Fee</th>
					        <th width="7%">Luggage Charges</th>
					        <th width="7%">Door Delivery</th>
					        <th width="7%">Door Delivery Charges</th>
					        <th width="7%">Total Amount</th>
					       
					        <th width="6%">Luggage Status</th>
					        <th width="18%"> Action </th>
				          </tr>
				        </thead>
					    <tbody>
					      <?php
					
				 	 $luggage="select * from power_luggage where luggage_paymethod='Credit' and luggage_status <> 'Cancelled' and (luggage_sender='".$max2['credit']."' or luggage_reciever='".$max2['credit']."')";
			      $luggage1=mysqli_query($objConn,$luggage);
			     
					$luggage_num=mysqli_num_rows($luggage1);
					if($luggage_num==0)
					{
                    ?>
					      <tr>
					        <td colspan="16" align="center" valign="middle" bgcolor="#F9C6F1">No Records.</td>
				          </tr>
					      <?php
				   }
				   else
				   {
				   
				   $i=1;
				   $cnt=0;
				   $tot_amt=0;$tot_amt1=0;$paid_amt=0;$topay_amt=0;$credit_amt=0;
				   while($luggage_row=mysqli_fetch_array($luggage1))
				   {
					   $cnt++;
                            $css_set=$cnt%2;
				   ?>
					      <tr <?php if($css_set==0) echo "class=gradeX"; else  echo "class=gradeC"; ?>>
					        <td align="center"><?php echo $i."."; ?></td>
					        <td align="center"><?php echo date('d-M-Y',strtotime($luggage_row['create_date']));?></td>
					        <td align="center"><?php echo $luggage_row['luggage_lrno']; ?></td>
					        <td align="center"><?php echo $luggage_row['luggage_sender'].' & '.$luggage_row['luggage_sender_phone']; ?></td>
					        <td align="center"><?php echo $luggage_row['luggage_reciever'].' & '.$luggage_row['luggage_reciever_phone']; ?></td>
					        <td align="center"><?php 
							$luggage_prd = "select * from power_luggage_prd where luggage_lrno = '".$luggage_row['luggage_lrno']."'";
							$luggage_prd1 = mysqli_query($objConn,$luggage_prd);
							$luggage_prd_rows = mysqli_num_rows($luggage_prd1);
							$cn=0;
							while($luggage_prd2 = mysqli_fetch_array($luggage_prd1))
							{
							   echo $luggage_prd2['luggage_prd_name']." - ".$luggage_prd2['luggage_qunty'];
							   $cn++;
							   if($cn!=$luggage_prd_rows) echo " , ";
							   
							}
							
							?></td>
					        <td align="center"><?php 
							$routefrom = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where id = ".$luggage_row['luggage_from']));
							echo $routefrom1 = $routefrom[0];
							
							?></td>
					        <td align="center"><?php 
							$routeto = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where id = ".$luggage_row['luggage_to']));
							echo $routeto1 = $routeto[0];
							
							?></td>
					        <td align="center"><?php echo $luggage_row['luggage_fees']?></td>
					        <td align="center"><?php echo $luggage_row['luggage_charges']?></td>
					        <td align="center"><?php echo $luggage_row['luggage_doordelivery']?></td>
					        <td align="center"><?php echo $luggage_row['luggage_doorcharges']?></td>
					        <td align="center">
							<?php echo $tot_amt=number_format(($luggage_row['luggage_fees']+$luggage_row['luggage_charges']+$luggage_row['luggage_doorcharges']),2);?>
                            </td>
					       
					        <?php 
							if($luggage_row['luggage_status']=='New Arrival') $cls='class="badge_style b_pending"';
							if($luggage_row['luggage_status']=='Dispatched') $cls='class="badge_style b_dispatched"';
							if($luggage_row['luggage_status']=='Inward') $cls='class="badge_style b_high"';
							if($luggage_row['luggage_status']=='Delivered') $cls='class="badge_style b_done"';
							if($luggage_row['luggage_status']=='Cancelled') $cls='class="badge_style b_cancelled"';
							?>
					        <td align="center" valign="middle" <?php echo $cls?>><?php echo $luggage_row['luggage_status']?></td>
					        <td align="center" class="center"><span> <a href="luggage_edit.php?id=<?php echo $luggage_row['id']; ?>" title="Edit"><img src="images/edit.png"/></a></span> <span><a href="credit_customer.php?news=del&amp;event_id=<?php echo $luggage_row['id'];?>" onclick="return confirmSubmit();" title="delete"><img src="images/delete.png"/></a></span></td>
				          </tr>
					      <?php 
						
						
						 $credit_amt +=$tot_amt;
						$i++;} } if($luggage_num!=0)
						{?>
					      
					      <tr>
					        <td colspan="16" align="right"  bgcolor="#F9C6F1"><font color="red" style="font-size:22px">Credit Amount :
					          <?php 
						
						echo 'Rs.'.number_format($credit_amt,2);?>
					          </font></td>
				          </tr>
					     
					      <?php }?>
				        </tbody>
				      </table>
                      
                      <br>
<strong>Collection Details : </strong>
						
						<br>	<br>
						<table class="display">
						  <thead>
						    <tr>
						      <th width="3%"> Sl No </th>
						      <th width="23%">Create Date</th>
						     
						      <th width="13%">Collection Amount</th>
						     
						    
						     
						      <th width="20%"> Action </th>
					        </tr>
					      </thead>
						  <tbody>
						    <?php
					//collection_date>='".date('Y-m-d')."' and collection_date<='".date('Y-m-d')."'
					$routestr=" route_id='".$_REQUEST['id']."' "; 
                   $news_events_flow=mysqli_query($objConn,"select * from power_collections_credit where $routestr ") or die("Collection error:".mysql_error());
					$news_events_flow_num=mysqli_num_rows($news_events_flow);
					if($news_events_flow_num==0)
					{
                    ?>
						    <tr>
						      <td colspan="12" align="center" valign="middle" bgcolor="#F9C6F1">No Collections.</td>
					        </tr>
						    <?php
				   }
				   else
				   {
				   
				   $i=1;
				   $cnt=0;
				   while($news_events_flow_row=mysqli_fetch_row($news_events_flow))
				   {
					   $cnt++;
                            $css_set=$cnt%2;
				   ?>
						    <tr <?php if($css_set==0) echo "class=gradeX"; else  echo "class=gradeC"; ?> >
						      <td><?php echo $i."."; ?></td>
						      <td align="center"><span class="center"><?php echo date('d-M-Y',strtotime($news_events_flow_row[4]));?></span></td>
						      <td class="center"><?php echo  $news_events_flow_row[2];
							  $tot_collection += $news_events_flow_row[2];
							  ?></td>
						      <td class="center"><span> <a href="collections_party_edit.php?id=<?php echo $news_events_flow_row[0]; ?>" title="Edit"><img src="images/edit.png"/></a></span> <span><a  href="credit_customer.php?news=del&id=<?php echo $news_events_flow_row[0];?>" onclick="return confirmSubmit();" title="delete"><img src="images/delete.png"/></a></span></td>
					        </tr>
						    <?php 
					$i++;
					}
					}
					if($news_events_flow_num!=0)
					{
					 ?><tr>
					        <td colspan="16" align="right"  bgcolor="#F9C6F1"><font color="red" style="font-size:22px">Collection Amount :
					          <?php 
						
						echo 'Rs.'.number_format($tot_collection,2);?>
					          </font></td>
				          </tr>
                          <?php }?>
					      </tbody>
						  </table>
       					</div>
				</div>
			</div>
			
			
			
			
		</div>
		<span class="clear"></span>
	</div>
</div>
</body>
</html>