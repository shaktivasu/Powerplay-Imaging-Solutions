<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
$max=mysqli_fetch_row(mysqli_query($objConn,"select max(id) from power_ticket"));
$max1=$max[0]+1;
$max2='LR'.$max1.time();
$total_price = 0;
 $luggage_price = 0;
 if($_GET['invoice']=='succ')
 {
	 ?><script>
	 
	var openWin = window.open('print.php?lr=<?php echo $_GET['lr']?>','_blank');
     if (!openWin) {
    alert("A popup blocker was detected. Please Remove popupblocker for this site");
    } else {
    //openWin.close();
     //alert("No popup blocker dectected");
   }
	 
    
    </script>
	 <?php
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

<!-------------  Alert Box  ----------------------------->

<link rel="stylesheet" href="alert/themes/base/jquery.ui.all.css">
	<script src="alert/jquery-1.10.2.js"></script>
	<script src="alert/ui/jquery.ui.core.js"></script>
	<script src="alert/ui/jquery.ui.widget.js"></script>
	<script src="alert/ui/jquery.ui.position.js"></script>
	<script src="alert/ui/jquery.ui.menu.js"></script>
	<script src="alert/ui/jquery.ui.autocomplete.js"></script>
	<link rel="stylesheet" href="../demos.css">
	<script>
	$(function() {
		var availableTags = [
			"ActionScript",
			"AppleScript",
			"Asp",
			"BASIC",
			"C",
			"C++",
			"Clojure",
			"COBOL",
			"ColdFusion",
			"Erlang",
			"Fortran",
			"Groovy",
			"Haskell",
			"Java",
			"JavaScript",
			"Lisp",
			"Perl",
			"PHP",
			"Python",
			"Ruby",
			"Scala",
			"Scheme"
		];
		$( "#tags" ).autocomplete({
			source: availableTags
		});
	});
	</script>
<!--------------  Alert Box  ------------------------------>

<script type="text/javascript">
 document.onkeypress=function(e){
 var e=window.event || e
 //alert("CharCode value: "+e.keyCode )
 //alert("Character: "+String.fromCharCode(e.charCode))
 if (e.keyCode == 112)
 addFile();
}
		function addElement(parentId, elementTag, elementId, html) {
				// Adds an element to the document
				var p = document.getElementById(parentId);
				var newElement = document.createElement(elementTag);
				newElement.setAttribute('id', elementId);
				newElement.innerHTML = html;
				p.appendChild(newElement);
		}
		function removeElement(elementId) {
				// Removes an element from the document
				
				str = elementId
				
				
				
				
				var fields = document.getElementById('totaltxt').value;
				if(fields!="none"){
					var fileId = fields; 
				}else{
					var fileId = 0; 
				}	
				var element = document.getElementById(elementId);
				element.parentNode.removeChild(element);
				fileId--;
				//alert(fileId);
				document.getElementById('totaltxt').value=fileId;
				
				
				
		}
		
function addFile() {
				//
				// Example function showing how to add a file input box to an existing form
				//
				//str = document.getElementById('particular_amount').value;
				//str1 = document.getElementById('luggage_amount').value;
				str =1;
				str1 = 2;
				var fields = document.getElementById('totaltxt').value;
				
				if(fields!="none"){
					var fileId = fields; 
				}else{
					var fileId = 0; 
				}	
				//alert(fileId);
				fileId++; // increment fileId to get a unique ID for the new element<input name="prd_name[]" type="text" class="large1" id="prd_name<?php //echo ($i+1); ?>" size="7" maxlength="10">
				var html = '<table width="100%" border="1" cellspacing="1"  cellpadding="20"><tr><td width="20%" height="20" align="center" bgcolor="#FFFFFF"  padding-right:30px;"> <select name="prd_name[]"  id="prd_name'+fileId+'" class="limiterBox"><option value="0">Select Any</option><?php 
										$route = mysqli_query($objConn,"select * from power_particulars where particulars_status=0");
										while($route1 = mysqli_fetch_array($route))
										{
											echo "<option value=".$route1['id'].">".$route1['particulars']."</option>";
										}
										
										?></select></td><td width="20%" height="20" align="center" bgcolor="#FFFFFF" style="padding-right:55px"><input name="prd_qunty[]" type="text" id="prd_qunty'+fileId+'" size="7" maxlength="10" class="large1" onkeypress="if(enter_pressed(event)){ return false; } else { return numbersonly(this, event, false); }"></td><td width="21%" height="20" align="center" bgcolor="#FFFFFF" style="padding-left:30px;"><input name="prd_price[]" type="text" id="prd_price'+fileId+'" size="10" maxlength="10"  class="large1"  onKeyUp="particularcharge(this.value,'+str+')" onkeypress="if(enter_pressed(event)){ return false; } else { return numbersonly(this, event, false); }"></td><td width="21%" height="20" align="center" bgcolor="#FFFFFF" style="padding-left:30px;"><input name="prd_charge[]" type="text" id="prd_charge'+fileId+'" size="10" maxlength="10"  class="large1" onKeyUp="luggagecharge(this.value,'+str1+')" onkeypress="if(enter_pressed(event)){ return false; } else { return numbersonly(this, event, false); }"></td><td width="5%" height="20" align="center" bgcolor="#FFFFFF"><a href="" onclick="javascript:removeElement(\'file-' + fileId + '\'); return false;"><img src="images/remove.jpg" border="0"></a></td></tr></table>';
				addElement('files', 'p', 'file-' + fileId, html);
				document.getElementById('totaltxt').value=fileId; 
				
			}	
			
	function particularcharge(str,str1)
{
	
	 var particulartotoal = 0;
	 var e = document.forms['bookingform'].elements;
	 var tot = e['totaltxt'].value;
	 for(i=1; i<=tot; i++) {
		var txtprice = 'prd_price'+i;	
		particulartotoal = parseInt(document.getElementById(txtprice).value) +parseInt(particulartotoal);
		}
			if (str=="")
				  {
				  document.getElementById("txttransHint").innerHTML="";
				  return;
				  }
				if (window.XMLHttpRequest)
				  {// code for IE7+, Firefox, Chrome, Opera, Safari
				  xmlhttp=new XMLHttpRequest();
				  }
				else
				  {// code for IE6, IE5
				  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
				  }
				xmlhttp.onreadystatechange=function()
				  {
				  if (xmlhttp.readyState==4 && xmlhttp.status==200)
					{
					document.getElementById("txttransHint").innerHTML=xmlhttp.responseText;
					}
				  }
				xmlhttp.open("GET","luggage_totamt.php?q="+particulartotoal,true);
				xmlhttp.send();
}
	function luggagecharge(str,str1)
	{
		var luggagetotoal = 0;
	 var e = document.forms['bookingform'].elements;
	 var tot = e['totaltxt'].value;
	 for(i=1; i<=tot; i++) {
		var txtcharge = 'prd_charge'+i;	
		luggagetotoal = parseInt(document.getElementById(txtcharge).value) +parseInt(luggagetotoal);
		}
		
		if (str=="")
		  {
		  document.getElementById("txtluggage").innerHTML="";
		  return;
		  }
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			document.getElementById("txtluggage").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("GET","luggage_chargeamt.php?q="+luggagetotoal,true);
		xmlhttp.send();
	}
</script>
<script type="text/javascript">
function val()
{
   
    if(document.bookingform.lrno.value=='')
    {
	   document.bookingform.lrno.focus();
	   alert("Please enter the LR No.");
       return false;
    }
	if(document.bookingform.vehicle.value==0)
    {
	   document.bookingform.vehicle.focus();
	   alert("Please enter the Vehicle No.");
       return false;
    }
	if(document.bookingform.route_from.value==0)
	{
		document.bookingform.route_from.focus();
		alert("Please select any Valid Route");
		return false;
	}
	if(document.bookingform.route_to.value==0)
	{
		document.bookingform.route_to.focus();
		alert("Please select any Valid Route");
		return false;
	}
	if(document.bookingform.route_from.value==document.bookingform.route_to.value)
	{
		document.bookingform.route_from.focus();
		alert("Please select any Valid Route");
		return false;
	}
	if(document.bookingform.pay_method[2].checked && document.bookingform.sendercredit.value==0)
	{
		document.bookingform.sendercredit.focus();
		alert("Please select any Credit Customers");
		return false;
	}
	
    if(document.bookingform.sender.value=='' && document.bookingform.pay_method[0].checked)
    {
	   document.bookingform.sender.focus();
	   alert("Please enter the Sender name");
       return false;
    }
	 if(document.bookingform.sender.value=='' && document.bookingform.pay_method[1].checked)
    {
	   document.bookingform.sender.focus();
	   alert("Please enter the Sender name");
       return false;
    }
    if(document.bookingform.sender_phone.value=="")
	{
		document.bookingform.sender_phone.focus();
		alert("Please enter the Sender phone.no");
		return false;
	}	
	if(document.bookingform.reciever.value=="")
	{
		document.bookingform.reciever.focus();
		alert("Please enter the Reciever name");
		return false;
	}	
	if(document.bookingform.reciever_phone.value=="")
	{
		document.bookingform.reciever_phone.focus();
		alert("Please enter the Reciever phone.no");
		return false;
	}
	    var totprice = 0;
		var totcharge = 0;
		var netamount = 0;
	var e = document.forms['bookingform'].elements;
	var tot = e['totaltxt'].value;
	for(i=1; i<=tot; i++) {
				var txtname = 'prd_name'+i;
				var txtqty = 'prd_qunty'+i;	
				var txtprice = 'prd_price'+i;
				var txtcharge = 'prd_charge'+i;		
				if(document.getElementById(txtname) || document.getElementById(txtqty) || document.getElementById(txtprice)  || document.getElementById(txtcharge))	
				{
								if(document.getElementById(txtname).value == 0 ) {
									alert("Please check the Particular Name for item number "+i);
									document.getElementById(txtname).focus();
									return false;
								}
								
								
								if(document.getElementById(txtqty).value == '' || document.getElementById(txtqty).value <=0) {
									alert("Please check the Quantity for item number "+i);
									document.getElementById(txtqty).value =1;
									return false;
								}
								
								if(document.getElementById(txtprice).value == '' || document.getElementById(txtprice).value <=0) {
									alert("Please enter the valid Price for item number "+i);
									document.getElementById(txtprice).focus();
									return false;
								}
								else
								totprice = totprice + parseInt(document.getElementById(txtprice).value); 
								
								if(document.getElementById(txtcharge).value == '' || document.getElementById(txtcharge).value <=0) {
									alert("Please enter the valid Luggage Charge for item number "+i);
									document.getElementById(txtcharge).focus();
									return false;
								}
								else
								totcharge = totcharge + parseInt(document.getElementById(txtcharge).value); 
				}
				else
				{
					alert("Invalid Input");
					return false;
				}
	}
				netamount = totprice + totcharge;
				document.getElementById('particular_amount').value = totprice;
				document.getElementById('luggage_amount').value = totcharge;
				
				var retVal = confirm(' Sub Total                 :    '+totprice+'\n Loading Charges     :    '+totcharge+'\n Total Amount            :    '+netamount+' \n\n Do you want to continue?');
				   if( retVal == true ){
					  return true;
							   }else{
								  return false;
							   }
}


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


function showHide() {
    var ele = document.getElementById("sendercredit");
	var ele1 = document.getElementById("sender");
   
            ele.style.display = "block";
			 ele1.style.display = "none";
      
}
function HideShow() {
    var ele = document.getElementById("sendercredit");
	var ele1 = document.getElementById("sender");
    
            ele1.style.display = "block";
			 ele.style.display = "none";
     
}

</script>

</head>
<body id="theme-default" class="full_block" onkeydown="GetChar(event);">
<input type="hidden" name="route_from2" id="route_from2" value="1" />
<div id="left_bar">
	
	
	<div id="sidebar">
		<div id="secondary_nav">
			<ul id="sidenav" class="accordion_mnu collapsible">
                <li><a href="dashboard.php"><span class="nav_icon computer_imac"></span> Dashboard</a></li>
                <li><a href="luggage_new.php"><span class="nav_icon note_book"></span> Booking</a></li>
                <li><a href="luggage_new_manual.php"><span class="nav_icon user"></span> Manual Entry</a></li>
                <li><a href="luggage.php"><span class="nav_icon truck"></span> <span class="menu_color_dis">Dispatch </span>Statement</a></li>                
                <li><a href="luggage_inward.php"><span class="nav_icon bended_arrow_left"></span><span class="menu_color_inw"> Inward</span> Statement</a></li>
		<li><a href="luggage_delivery.php"><span class="nav_icon box_outgoing"></span>Pending <span class="menu_color_del"> Delivery</span> </a></li>
                <li><a href="luggage_cancelled.php"><span class="nav_icon go_back_from_screen"></span><span class="menu_color_cal"> Cancelled</span> Statement</a></li>
                <li><a href="daysheet.php"><span class="nav_icon mobile_phone"></span>Day Sheet Entry</a></li>
                <li><a href="customer.php"><span class="nav_icon admin_user_2"></span>Customer Management</a></li>
                
                <li><a href="reports.php"><span class="nav_icon file_cabinet"></span>Reports</a></li>
                <li><a href="settings.php"><span class="nav_icon cog"></span>Settings</a></li>
			</ul>
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
	<div class="page_title">
		<span class="title_icon"><span class="coverflow"></span></span>
		<h3>Parcel Booking</h3>
		<div class="top_search">
			
		</div>
	</div>
	<div id="content">
    
    
    
    <div class="button-wrapper">
					<a href="luggage_new_paid.php" class="a-btn">
						<span class="a-btn-slide-text"></span>
						<img src="images/icons/8.png" alt="Paid" />
						<span class="a-btn-text">Paid</span> 
						<span class="a-btn-icon-right"><span></span></span>
					</a>
                    </div>
                    
                    <div class="button-wrapper">
					<a href="luggage_new_topay.php" class="a-btn">
						<span class="a-btn-slide-text"></span>
						<img src="images/icons/9.png" alt="To Pay" />
						<span class="a-btn-text">To Pay</span> 
						<span class="a-btn-icon-right"><span></span></span>
					</a>
                    </div>
                    
                    <div class="button-wrapper">
					<a href="luggage_new_credit.php" class="a-btn">
						<span class="a-btn-slide-text"></span>
						<img src="images/icons/16.png" alt="Credit" />
						<span class="a-btn-text">Credit</span> 
						<span class="a-btn-icon-right"><span></span></span>
					</a>
					
				</div>
                
                
                <div class="clearfix"></div>
                
                <div class="button-wrapper">
					<a href="luggage_new_manual.php" class="a-btn">
						<span class="a-btn-slide-text"></span>
						<img src="images/icons/12.png" alt="Manual Entry" />
						<span class="a-btn-text">Manual Entry</span> 
						<span class="a-btn-icon-right"><span></span></span>
					</a>
					
				</div>
                
    
    
   
		<!--&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>
		<br>
		&nbsp;&nbsp;&nbsp; <a href="luggage_new_paid.php"><input name="paid" type="button" class="orange_block" value="   Paid   " ></a>&nbsp;&nbsp;&nbsp;&nbsp; <a href="luggage_new_topay.php"><input type="button" class="not_valid"  value="To Pay"></a>&nbsp;&nbsp;&nbsp;&nbsp; <a href="luggage_new_credit.php"><input type="button"  value="Credit"  class="green_block"></a>-->
		<span class="clear"></span>
	</div>
</div>
</body>
</html>