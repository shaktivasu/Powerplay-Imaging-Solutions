<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
$max=mysqli_fetch_row(mysqli_query($objConn,"select max(id) from power_ticket"));
$max1=$max[0]+1;
//$date = date_create();
//date_timestamp_get($date);
$rtn= "select route_phone from power_route where id= ".$_SESSION['route'];
$rtn1 = mysqli_query($objConn,$rtn);
$rtn2=mysqli_fetch_row($rtn1);
$dte=date('dmy',strtotime(date('Y-m-d')));
$max2=$rtn2[0].$max1;
$total_price = 0;
 $luggage_price = 0;
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
 if (e.keyCode == 13)
 val();
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
				var html = '<table width="100%" border="1" cellspacing="1"  cellpadding="20" style="padding-left:20px"><tr><td width="20%" height="20" align="center" bgcolor="#FFFFFF"  padding-right:30px;"> <select name="prd_name[]"  id="prd_name'+fileId+'" class="limiterBox"><option value="0">Select Any</option><?php 
										$route = mysqli_query($objConn,"select * from power_particulars where particulars_status=0");
										while($route1 = mysqli_fetch_array($route))
										{
											echo "<option value=".$route1['id'].">".$route1['particulars']."</option>";
										}
										
										?></select></td><td width="20%" height="20" align="center" bgcolor="#FFFFFF" style="padding-right:55px"><input name="prd_qunty[]" type="text" id="prd_qunty'+fileId+'" size="7" maxlength="10" class="large" onkeypress="if(enter_pressed(event)){ return false; } else { return numbersonly(this, event, false); }"></td><td width="21%" height="20" align="center" bgcolor="#FFFFFF" style="padding-left:30px;"><input name="prd_price[]" type="text" id="prd_price'+fileId+'" size="10" maxlength="10"  class="large1"  onKeyUp="particularcharge(this.value,'+str+')" onkeypress="if(enter_pressed(event)){ return false; } else { return numbersonly(this, event, false); }"></td><td width="21%" height="20" align="center" bgcolor="#FFFFFF" style="padding-left:30px;"><input name="prd_charge[]" type="text" id="prd_charge'+fileId+'" size="10" maxlength="10"  class="large1" onKeyUp="luggagecharge(this.value,'+str1+')" onkeypress="if(enter_pressed(event)){ return false; } else { return numbersonly(this, event, false); }"></td><td width="21%" height="20" align="center" bgcolor="#FFFFFF" style="padding-left:30px;"><input name="prd_uncharge[]" type="text" id="prd_uncharge'+fileId+'" size="10" maxlength="10"  class="large1 onKeyUp="luggageuncharge(this.value,'+str1+')" onkeypress="if(enter_pressed(event)){ return false; } else { return numbersonly(this, event, false); }"></td><td width="5%" height="20" align="center" bgcolor="#FFFFFF"><a href="" onclick="javascript:removeElement(\'file-' + fileId + '\'); return false;"><img src="images/remove.jpg" border="0"></a></td></tr></table>';
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
	
	function luggageuncharge(str,str1)
	{
		var luggagetotoal = 0;
	 var e = document.forms['bookingform'].elements;
	 var tot = e['totaltxt'].value;
	 for(i=1; i<=tot; i++) {
		var txtuncharge = 'prd_uncharge'+i;	
		luggagetotoal = parseInt(document.getElementById(txtuncharge).value) +parseInt(luggagetotoal);
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
		xmlhttp.open("GET","luggage_unchargeamt.php?q="+luggagetotoal,true);
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
	   
	   alert("Please enter the Vehicle No.");
	   document.bookingform.vehicle.focus();
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
				var txtuncharge = 'prd_uncharge'+i;		
				if(document.getElementById(txtname) || document.getElementById(txtqty) || document.getElementById(txtprice)  || document.getElementById(txtcharge)  || document.getElementById(txtuncharge))	
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
								if(document.getElementById(txtuncharge).value == '' || document.getElementById(txtuncharge).value <=0) {
									alert("Please enter the valid Luggage Unloading Charge for item number "+i);
									document.getElementById(txtuncharge).focus();
									return false;
								}
								else
								totcharge = totcharge + parseInt(document.getElementById(txtuncharge).value); 
				}
				else
				{
					alert("Invalid Input");
					return false;
				}
	}
				netamount = totprice + totcharge;
				door_charge = document.getElementById('delivery_charge').value
				totamount =  parseInt(netamount) + parseInt(door_charge)
				document.getElementById('particular_amount').value = totprice;
				document.getElementById('luggage_amount').value = totcharge;
				var retVal = confirm(' Sub Total                          :    '+totprice+'\n Loading& Unloading Charges              :    '+totcharge+'\n Door Delivery Charges     :    '+door_charge+'\n Total Amount                     :    '+totamount+' \n\n Do you want to continue?');
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
<body id="theme-default" class="full_block">
<input type="hidden" name="route_from2" id="route_from2" value="1" />
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
		      <div class="widget_content">
		      <form id="bookingform" name="bookingform" autocomplete="off" method="post"  class="form_container left_label" action="luggage_ins.php" onSubmit="return val();"  >
		      <div class="widget_top">
						<span class="h_icon list"></span>
						<h6>Add New Ticket</h6>
                       
				</div>
              
              
              
              <div class="widget_content">
               <table width="100%" border="1">
                      <tr>
                        <td width="20%"><div class="note_title1">Ticket Type</div></td>
                        <td width="50%" align="left">
                        
                      
                        <script>
                       function sales()
					   {
						   
						
						   window.location="power_ticket.php?type=sales";
						   
					   }
					    function service()
					   {
						  
							
						   window.location="power_ticket.php?type=service";
					   }
					   
					 
                       </script> 
                        <h4>
                        <input name="booking1" type="radio" value="SALES" onClick="document.location.href='ticket.php?type=Sales'">SALES&nbsp;&nbsp;&nbsp;
                        <input name="booking2" type="radio" value="SERVICE"  onClick="document.location.href='ticket.php?type=Service'" >SERVICE&nbsp;&nbsp;&nbsp;
                      
                        </h4>
                        </td>
                       
                        </tr>
                     
                    </table>
                <div align="center"></div>
                <p>
                
                </p>
              </div>
              
             
              
		      </form>
		      </div>
		    </div>
		  </div>
		</div>
		<span class="clear"></span>
		
		
		
		<?php 
					$date1 = date('Y-m-d', strtotime('-30 days'));
					$date2 = date('Y-m-d', strtotime('-1 day'));
					if($_SESSION['route']==54)
					 $sel = "select sum(luggage_fees),sum(luggage_charges),sum(unloading_charges),create_date from power_ticket where create_date>='".$date1."' and create_date<='".$date2."' and luggage_from='".$_SESSION['route']."' group by create_date order by create_date";
				    else
					 $sel = "select sum(luggage_fees),sum(luggage_charges),sum(unloading_charges),create_date from power_ticket where create_date>='".$date1."' and create_date<='".$date2."' and luggage_to='".$_SESSION['route']."' group by create_date order by create_date";	
					 
					$sel1 = mysqli_query($objConn,$sel);
					$sel3 = mysqli_num_rows($sel1);
					$total_sales_current= 0;
					$total_sales_current1 = 0;
					$cnt = 1;
					$sales_data = [];
				    while($sel2=mysqli_fetch_row($sel1))
				   {
					   
					  $total_sales_current =$sel2[0]+$sel2[1]+$sel2[2];
					   $tax  =($sel2[0]+$sel2[1]+$sel2[2])*5/100;
					   $total_sales_current += $tax;
					   $total_sales_current1 =$total_sales_current+$total_sales_current1;
					   $formatted_date = date('d-M-Y', strtotime($sel2[3]));
					    $sales_data[$formatted_date] = round($total_sales_current);
					$cnt++;
					}
				   
				  $months = json_encode(array_keys($sales_data));
				  $sales = json_encode(array_values($sales_data));
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<canvas id="salesChart" width="400" height="200"></canvas>

<script>
    // Get the data passed from PHP
    var months = <?php echo $months; ?>;
    var sales = <?php echo $sales; ?>;

    // Create the bar chart
    var ctx = document.getElementById('salesChart').getContext('2d');
    var salesChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: months,
            datasets: [{
                label: 'Sales',
                data: sales,
                backgroundColor: 'rgb(0,128,0)',
                borderColor: 'rgba(0, 0, 0, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>


		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	</div>
</div>
</body>
</html>