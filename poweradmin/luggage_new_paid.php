<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
$max=mysqli_fetch_row(mysqli_query($objConn,"select max(id) from power_luggage"));
$max1=$max[0]+1;
//$date = date_create();
//date_timestamp_get($date);
$max2='LR'.$max1.time();
$total_price = 0;
 $luggage_price = 0;
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


<!-------------  Alert Box  ----------------------------->

        <link rel="stylesheet" type="text/css" href="autocomplete/jquery-ui.css">
						<script type='text/javascript' src='autocomplete/jquery-1.5.2.js'></script>
                        <script type="text/javascript" src="autocomplete/jquery-ui.js"></script>
                        
                        <style>
                        .ui-widget {
                            font-size: 12px;
                        }
                        
                        .frame {
                            left: 150px;
                            top: 150px;
                            width: 500px;
                            border: #e6e6e6 solid 1px;
                            position: absolute;
                            align: center;
                            padding: 10px;
                        }
                        </style>
                        
                        <script type="text/javascript">
                        
                            $(function() {
                                $.extend($.ui.autocomplete.prototype, {
                                    _renderItem : function(ul, item) {
                                        var term = this.element.val(), html = item.label.replace(term,
                                                "<b>" + term + "</b>");
                                        return $("<li></li>").data("item.autocomplete", item).append(
                                                $("<a></a>").html(html)).appendTo(ul);
                                    }
                                });
                        
                                var availableTags = [];
                                var tagsWithValues = [];
                        
                                $("#sender option").each(function() {
                                    availableTags.push($(this).text());
                                    tagsWithValues.push($(this).val() + "=" + $(this).text());
                                });
                        
                                $("#sender_suggestions").autocomplete({
                                    source : availableTags,
                                    select : function(event, ui) {
                                        var value = "";
                                        for ( var i = 0; i < tagsWithValues.length; i++) {
                                            values = null;
                                            values = tagsWithValues[i].split("=");
                                            if (values[1] == ui.item.value) {
                                                value = values[0];
                                                break;
                                            }
                                        }
                                        //alert("You have selected : " + ui.item.value + ".\n Its value is " + value);
                                        $("#sender_suggestions").val(ui.item.value);
										takeDetails(value);
										
                                        return false;
                                    },
                                    delay : 0
                                });
                            });
							
							
	 					$(function() {
                                $.extend($.ui.autocomplete.prototype, {
                                    _renderItem : function(ul, item) {
                                        var term = this.element.val(), html = item.label.replace(term,
                                                "<b>" + term + "</b>");
                                        return $("<li></li>").data("item.autocomplete", item).append(
                                                $("<a></a>").html(html)).appendTo(ul);
                                    }
                                });
                        
                                var availableTags = [];
                                var tagsWithValues = [];
                        
                                $("#reciever option").each(function() {
                                    availableTags.push($(this).text());
                                    tagsWithValues.push($(this).val() + "=" + $(this).text());
                                });
                        
                                $("#reciever_suggestions").autocomplete({
                                    source : availableTags,
                                    select : function(event, ui) {
                                        var value = "";
                                        for ( var i = 0; i < tagsWithValues.length; i++) {
                                            values = null;
                                            values = tagsWithValues[i].split("=");
                                            if (values[1] == ui.item.value) {
                                                value = values[0];
                                                break;
                                            }
                                        }
                                        //alert("You have selected : " + ui.item.value + ".\n Its value is " + value);
                                        $("#reciever_suggestions").val(ui.item.value);
										takeDetails1(value);
										
                                        return false;
                                    },
                                    delay : 0
                                });
                            });						
	function takeDetails(str)
	{
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
			document.getElementById("txtphone").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("GET","luggage_phone.php?q="+str,true);
		xmlhttp.send();
	}
	
    function takeDetails1(str)
	{
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
			document.getElementById("txtphone1").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("GET","luggage_phone1.php?q="+str,true);
		xmlhttp.send();
	}                    </script>
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
	if(document.bookingform.sender_suggestions.value=='')
	{
		document.bookingform.sender_suggestions.focus();
		alert("Please enter the Customer Name");
		return false;
	}
    if(document.bookingform.reciever_suggestions.value=='')
	{
		document.bookingform.reciever_suggestions.focus();
		alert("Please enter the Customer Name");
		return false;
	}
	if(document.bookingform.sender_phone.value=='')
	{
		document.bookingform.sender_phone.focus();
		alert("Please enter the Phone No.");
		return false;
	}
	if(document.bookingform.reciever_phone.value=='')
	{
		document.bookingform.reciever_phone.focus();
		alert("Please enter the Phone No.");
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
function enableField(){
	document.getElementById("delivery_charge").value='';
	document.getElementById("delivery_charge").value=0;
	document.getElementById("delivery_charge").focus();
document.getElementById("delivery_charge").readOnly = false;  
}
function disableField(){
	document.getElementById("delivery_charge").value=0;
document.getElementById("delivery_charge").readOnly = true;  
}
</script>

</head>
<body id="theme-default" class="full_block" onkeydown="GetChar(event);">
<input type="hidden" name="route_from2" id="route_from2" value="1" />
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
	<div class="page_title">
		<span class="title_icon"><span class="coverflow"></span></span>
		<h3>Parcel Booking&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="luggage_new_paid.php"><input name="paid" type="button" class="orange_block" value="   Paid   "></a>&nbsp;&nbsp;&nbsp;&nbsp; <a href="luggage_new_topay.php"><input type="button" class="not_valid"  value="To Pay"></a>&nbsp;&nbsp;&nbsp;&nbsp; <a href="luggage_new_credit.php"><input type="button"  value="Credit"  class="green_block"></a></h3>
		<div class="top_search">
			
		</div>
	</div>
	<div id="content">
		<div class="grid_container">
		  <div class="grid_12">
		    <div class="widget_wrap">
		      <div class="widget_content">
		      <form id="bookingform" name="bookingform" autocomplete="off" method="post"  class="form_container left_label" action="luggage_ins.php" onSubmit="return val();"  >
		      <div class="widget_top">
						<span class="h_icon list"></span>
						<h6>Add New luggage <font color="red"> [Paid]</font></h6>
                       
					</div>
              
              
              
              <div class="widget_content">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="5%">&nbsp;</td>
                    <td width="79%"><table width="100%" border="1">
                      <tr>
                        <td width="10%"><div class="note_title1">Vechile</div></td>
                        <td width="20%"><select name="vehicle" class="limiterBox1">
                        <option value="0">Select Any</option>
                          <?php 
										$vehicl = mysqli_query($objConn,"select * from power_vehicle where vec_status=0");
										while($vehicl1 = mysqli_fetch_array($vehicl))
										{
											echo "<option value=".$vehicl1['id'].">".$vehicl1['vehicle']."</option>";
										}
										
										?>
                        </select></td>
                        <td width="20%" class="new_title"></td>
                        </tr>
                      <tr>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        </tr>
                    </table></td>
                    <td width="16%">&nbsp;</td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td><table width="100%" height="178" border="0" align="center" cellpadding="0" cellspacing="5" class="widget_wrap">
                      <tr>
                        <td width="4%">&nbsp;</td>
                        <td width="20%">&nbsp;</td>
                        <td width="34%"></td>
                        <td width="21%">&nbsp;</td>
                        <td width="21%">&nbsp;</td>
                        </tr>
                      <tr>
                        <td height="33" class="new_title">&nbsp;</td>
                        <td class="new_title">LR No</td>
                        <td>
                        <input name="pay_method" id="pay_method" type="hidden" value="Paid"  >
                          <input name="sendercredit" id="sendercredit" type="hidden" value="0"  >
                        <input id="lrno" name="lrno" type="text"  maxlength="100" class="large" value="<?php echo $max2;?>" /></td>
                        <td class="new_title"><!--Vechile--></td>
                        <td><?php /*?><select name="vehicle" class="limiterBox">
                        <option value="0">Select Any</option>
                          <?php 
										$vehicl = mysqli_query($objConn,"select * from power_vehicle where vec_status=0");
										while($vehicl1 = mysqli_fetch_array($vehicl))
										{
											echo "<option value=".$vehicl1['id'].">".$vehicl1['vehicle']."</option>";
										}
										
										?>
                        </select><?php */?></td>
                        </tr>
                      
                      <tr>
                        <td height="33" class="new_title">&nbsp;</td>
                        <td class="new_title">Route From</td>
                        <td><select name="route_from" class="limiterBox" tabindex="1">
                        <option value="0">Select Any</option>
                          <?php 
										$route = mysqli_query($objConn,"select * from power_route where route_status=0  order by route");
										while($route1 = mysqli_fetch_array($route))
										{
											echo "<option value=".$route1['id'].">".$route1['route']."</option>";
										}
										
										?>
                        </select>                        </td>
                        <td class="new_title">Route To</td>
                        <td><select name="route_to" class="limiterBox" tabindex="2">
                        <option value="0">Select Any</option>
                          <?php 
										$route = mysqli_query($objConn,"select * from power_route where route_status=0 order by route");
										while($route1 = mysqli_fetch_array($route))
										{
											echo "<option value=".$route1['id'].">".$route1['route']."</option>";
										}
										
										?>
                        </select></td>
                        </tr>
                       
                      <tr>
                        <td height="33" class="new_title">&nbsp;</td>
                        <td  class="new_title">Sender Name</td>
                        <td>  <div>
                                <select id="sender" style="display: none;" onChange="this.value();" >
                                   <?php $sel = "select * from power_customers";
			  $sel1 = mysqli_query($objConn,$sel);
			  $sel3 = mysqli_num_rows($sel1);
			  $co=0;
			  while($sel2 = mysqli_fetch_array($sel1))
			  {
				  echo '<option value="'.$sel2['id'].'">'.$sel2['cust_name'].'</option>';;
				  
			  }
		?>
                                </select>
                        
                                <div>
                                    <input
                                        id="sender_suggestions" name="sender_suggestions"  >
                                </div>
                            </div>
                        
                       
                        
                       
                        </td>
                        <td class="new_title">Reciever Name </td>
                        <td>
                         <div>
                                <select id="reciever" style="display: none;" >
                                   <?php $sel = "select * from power_customers";
			  $sel1 = mysqli_query($objConn,$sel);
			  $sel3 = mysqli_num_rows($sel1);
			  $co=0;
			  while($sel2 = mysqli_fetch_array($sel1))
			  {
				  echo '<option value="'.$sel2['id'].'">'.$sel2['cust_name'].'</option>';;
				  
			  }
		?>
                                </select>
                        
                                <div>
                                    <input
                                        id="reciever_suggestions" name="reciever_suggestions">
                                </div>
                            </div>
                        </td>
                        </tr>
                    
                      <tr>
                        <td height="33" class="new_title">&nbsp;</td>
                        <td class="new_title">Sender Phone No &amp; Address</td>
                        <td><div id="txtphone"><input id="sender_phone" name="sender_phone" type="text"  maxlength="100" class="large"  onkeypress="if(enter_pressed(event)){ return false; } else { return numbersonly(this, event, false); }" tabindex="7"/>
                            <br>
                            <br>
<input id="sender_address" name="sender_address" type="text"  maxlength="100" class="large"   tabindex="7"/>
                        </div></td>
                        <td class="new_title">Reciever Phone No &amp; Address</td>
                        <td><div id="txtphone1"><input id="reciever_phone" name="reciever_phone" type="text"  maxlength="100" class="large"onkeypress="if(enter_pressed(event)){ return false; } else { return numbersonly(this, event, false); }" tabindex="9"/>
                          <br><br>
                          <input id="reciever_address" name="reciever_address" type="text"  maxlength="100" class="large" tabindex="9"/>
</div></td>
                      </tr>
                      
                        <tr>
                          <td height="15" class="new_title">&nbsp;</td>
                          <td class="new_title">&nbsp;</td>
                          <td>&nbsp;</td>
                          <td class="new_title">&nbsp;</td>
                          <td>&nbsp;</td>
                        </tr>
                        <tr>
                        <td height="33" class="new_title">&nbsp;</td>
                        <td class="new_title">Door Delivery</td>
                        <td>
                        <input type="radio" name="door_delivery" id="door_delivery" value="No" checked onClick="disableField()">No
                        <input type="radio" name="door_delivery" id="door_delivery" value="Yes" onClick="enableField()">Yes
                        </td>
                        <td class="new_title">Door Delivery Charges</td>
                        <td><input type="text" name="delivery_charge" id="delivery_charge" value="0" readonly class="large" onkeypress="if(enter_pressed(event)){ return false; } else { return numbersonly(this, event, false); }"></td>
                      </tr>
                      
                      
                    </table></td>
                    <td>&nbsp;</td>
                  </tr>
                </table>
                
                <div class="note_title">Particular</div>
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="6%">&nbsp;</td>
                    <td width="78%"><table width="100%" height="100" border="0" align="center" cellpadding="0" cellspacing="0" class="widget_wrap">
                      <tr>
                        <td width="1%" height="5"></td>
                        <td width="23%" ></td>
                        <td width="25%" ></td>
                        <td width="27%" ></td>
                        <td width="13%" ></td>
                        <td width="7%" ></td>
                      </tr>
                      <tr>
                        <td  height="10"></td>
                        <td  align="center"><strong>Products Name</strong></td>
                        <td align="center"><strong>Quantity</strong></td>
                        <td  align="center"><strong>Price</strong></td>
                         <td  align="center"><strong>Luggage Charges</strong></td>
                        <td  align="center" valign="middle"><strong><img src="images/list-icons/plus.png"  onClick="addFile();" style="cursor:pointer;"  alt="plus"></strong></td>
                        
                      </tr>
                      <tr>
                        <td height="10"></td>
                        <td colspan="5">&nbsp;</td>
                        
                      </tr>
                      <tr>
                        <td height="10"></td>
                        <td colspan="5" align="right"><?php 
				$vals=1;
				if($vals>0){
				for($i=0;$i<$vals;$i++){
				?>
				<div id="files">
				<div id="file-<?php echo ($i+1); ?>">
			    
			   
			    <table width="100%" border="1" cellspacing="1" cellpadding="20">
			 
			  <tr>
                    <td  height="20" align="center" bgcolor="#FFFFFF"   >
                    
                    <select name="prd_name[]"  id="prd_name<?php echo ($i+1);?>" class="limiterBox" tabindex="10">
                    <option value="0">Select Any</option>
                      <?php 
										$route = mysqli_query($objConn,"select * from power_particulars where particulars_status=0  order by particulars");
										while($route1 = mysqli_fetch_array($route))
										{
											echo "<option value=".$route1['id'].">".$route1['particulars']."</option>";
										}
										
										?>
                    </select>
                     <?php /*?> <input name="prd_name[]" type="text" class="large1" id="prd_name<?php echo ($i+1); ?>" size="7" maxlength="10"><?php */?></td>
                   
                    <td  align="left" bgcolor="#FFFFFF" width="25%"><input name="prd_qunty[]" type="text" class="large1" id="prd_qunty<?php echo ($i+1); ?>" size="7" maxlength="10" value="1" onkeypress="if(enter_pressed(event)){ return false; } else { return numbersonly(this, event, false); }" tabindex="11"></td>
                    
                    <td  height="20" align="center" bgcolor="#FFFFFF"><input name="prd_price[]" type="text"  class="large1" id="prd_price<?php echo ($i+1); ?>" size="10" maxlength="10"  onKeyUp="particularcharge(this.value,<?php echo $total_price; ?>)" onkeypress="if(enter_pressed(event)){ return false; } else { return numbersonly(this, event, false); }" tabindex="12"></td>
                    <td  height="20" align="center" bgcolor="#FFFFFF"><input name="prd_charge[]" type="text"  class="large1" id="prd_charge<?php echo ($i+1); ?>" size="10" maxlength="10"  onKeyUp="luggagecharge(this.value,<?php echo $total_price; ?>)"  onkeypress="if(enter_pressed(event)){ return false; } else { return numbersonly(this, event, false); }" tabindex="13"></td>
                    <input type="hidden" name="totaltxt" id="totaltxt" value="<?php echo @$vals; ?>" />
                    <td  height="20" align="center" bgcolor="#FFFFFF">&nbsp;</td>
                    </tr> <tr>
			    <td height="20" align="center" bgcolor="#FFFFFF" style="text-transform:uppercase;" >&nbsp;</td>
			   
			    <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
			    <td height="20" align="center" bgcolor="#FFFFFF">&nbsp;</td>
			    <td height="20" align="center" bgcolor="#FFFFFF">&nbsp;</td>
                <td height="20" align="center" bgcolor="#FFFFFF">&nbsp;</td>
			    </tr>
			  </table>
			  </div>
			   <?php } }?>
			   
				</div>
			    </td>
                        <td width="4%"></td>
                        </tr>
                      
                    </table></td>
                    <td width="16%"></td>
                  </tr>
                </table>
                <?php /*?><table width="50%" height="81" border="0" align="right" cellpadding="0" cellspacing="0" >
			     <tr>
			      
			       <td></td>
			       <td>&nbsp;</td>
			       </tr>
			     <tr>
			       <td height="33" class="new_title">Particulars Charge</td>
			       <td><div id="txttransHint">
			         <input name="particular_amount" type="hidden" id="particular_amount"  value="<?php echo $total_price?>" maxlength="50"  class="large">
			         <?php echo number_format($total_price,2); ?> </div></td>
			       </tr>
			     <tr>
			       <td width="19%" height="33" class="new_title">Luggage Charges</td>
			       <td width="19%"><div id="txtluggage">
			         <input id="luggage_amount" name="luggage_amount" type="hidden"  value="<?php echo $luggage_price?>" maxlength="50"  class="large" />
			         <?php echo number_format($luggage_price,2); ?></div></td>
			       </tr>
			     </table><?php */?>
            
             
			<div align="center">					<div class="form_grid_12">
									<div class="form_input">
									  
									  <br>
                                    <input name="particular_amount" type="hidden" id="particular_amount"  value="" maxlength="50"  class="large"><input id="luggage_amount" name="luggage_amount" type="hidden"  value="" maxlength="50"  class="large" />
		<input id="signupsubmit" name="signup" type="submit" class="btn_small btn_blue" value="Calculate & Confirm">
									</div>
								</div>
				</div>
                <p>
                
                </p>
              </div>
              
             
              
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