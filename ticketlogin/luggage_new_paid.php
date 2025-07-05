<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
$todate = date("Y-m-d");
$max=mysqli_num_rows(mysqli_query($objConn,"select * from power_ticket where luggage_paymethod='Paid'"));
$max1=$max+1+1001;
//$date = date_create();
//date_timestamp_get($date);
$rtn= "select route_phone from power_route where id= ".$_SESSION['route'];
$rtn1 = mysqli_query($objConn,$rtn);
$rtn2=mysqli_fetch_row($rtn1);
$dte=date('dmy',strtotime(date('Y-m-d')));
$max2='KMP'.'-P-'.$max1;
$total_price = 0;
 $luggage_price = 0;
 $unluggage_price = 0;
 $total_qty =1;
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
		q2 = document.getElementById("route_to").value;
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
		xmlhttp.open("GET","luggage_phone1.php?q="+str+"q1="+q2,true);
		xmlhttp.send();
	}                    </script>
<!--------------  Alert Box  ------------------------------>

<script type="text/javascript">
 document.onkeypress=function(e){
 var e=window.event || e
 //alert("CharCode value: "+e.keyCode )
 //alert("Character: "+String.fromCharCode(e.charCode))
 //if (e.keyCode == 112)
 //addFile();
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
				document.getElementById('totaltxt').value=fileId;
				rowscheck();
				
				
		}
		function rowscheck()
		{
			var luggagetotoal = 0;
			var luggagetotoal1 = 0;
			var particulartotoal = 0;
			var luggagetotoalqty = 0;
	 var e = document.forms['bookingform'].elements;
	 var tot = e['totaltxt'].value;
	 for(i=1; i<=tot; i++) {
		var txtcharge = 'prd_charge'+i;	
		luggagetotoal = parseInt(document.getElementById(txtcharge).value) +parseInt(luggagetotoal);
		var txtuncharge = 'prd_uncharge'+i;	
		luggagetotoal1 = parseInt(document.getElementById(txtuncharge).value) +parseInt(luggagetotoal1);
		var txtprice = 'prd_price'+i;	
		particulartotoal = parseInt(document.getElementById(txtprice).value) +parseInt(particulartotoal);
		var txtqty = 'prd_qunty'+i;	
		luggagetotoalqty = parseInt(document.getElementById(txtqty).value) +parseInt(luggagetotoalqty);
		
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
			document.getElementById("txtluggagetotal").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("GET","luggage_totalamt.php?q="+luggagetotoal+"&q1="+luggagetotoal1+"&q2="+particulartotoal+"&q3="+luggagetotoalqty,true);
		xmlhttp.send();
		
		
		
		
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
				var html = '<table width="100%" border="1" cellspacing="1"  cellpadding="20" style="padding-left:20px"><tr><td height="20" align="center" bgcolor="#FFFFFF"  padding-right:30px;"> <select name="prd_name[]"  id="prd_name'+fileId+'" class="limiterBox"><option value="0">Select Any</option><?php 
										$route = mysqli_query($objConn,"select * from power_particulars where particulars_status=0");
										while($route1 = mysqli_fetch_array($route))
										{
											echo "<option value=".$route1['id'].">".$route1['particulars']."</option>";
										}?><?php /*?><table><tr><td><input type="radio" name="item_type'+fileId+'" id="item_type'+fileId+'" value="Items" checked  onClick="return enadis(this.value,'+fileId+')">ITEMS&nbsp;</td><td><input type="radio" name="item_type'+fileId+'" id="item_type'+fileId+'" value="Kg"  onClick="return enadis(this.value,'+fileId+')" >KG </td><td><input name="prd_weight'+fileId+'" type="text" class="large" id="prd_weight'+fileId+'" size="4" maxlength="4" value="1"   onKeyUp="qtycount()" onkeypress="if(enter_pressed(event)){ return false; } else { return numbersonly(this, event, false); }" tabindex="11" disabled style="border-color:#FF8484; visibility:hidden;"></td></tr></table><?php */?>
										?></select></td><td  height="20" align="center" bgcolor="#FFFFFF"><input name="prd_qunty[]" type="text" id="prd_qunty'+fileId+'" size="7" maxlength="10" class="large"  value="1"  onKeyUp="qtycount()" onkeypress="if(enter_pressed(event)){ return false; } else { return numbersonly(this, event, false); }"></td><td  align="left" bgcolor="#FFFFFF" ><input name="prd_weight'+fileId+'" type="text" class="large" id="prd_weight'+fileId+'" size="4" maxlength="4" value="0"   onKeyUp="qtycount()" onkeypress="if(enter_pressed(event)){ return false; } else { return numbersonly(this, event, false); }" tabindex="11"  > </td><td  align="left" bgcolor="#FFFFFF"><input name="prd_unitprice[]" type="text" class="large1" id="prd_unitprice'+fileId+'" size="10" maxlength="10" value="1"   onKeyUp="qtycount()" onkeypress="if(enter_pressed(event)){ return false; } else { return numbersonly(this, event, false); }" tabindex="11"></td><td height="20" align="center" bgcolor="#FFFFFF" style="padding-left:30px;"><input name="prd_price[]" type="text" id="prd_price'+fileId+'" size="10" maxlength="10"  class="large1"  onKeyUp="particularcharge()" onkeypress="if(enter_pressed(event)){ return false; } else { return numbersonly(this, event, false); }"></td><td height="20" align="center" bgcolor="#FFFFFF" style="padding-left:30px;"><input name="prd_charge[]" type="text" id="prd_charge'+fileId+'" size="10" maxlength="10"  class="large1" onKeyUp="luggagecharge()" onkeypress="if(enter_pressed(event)){ return false; } else { return numbersonly(this, event, false); }"></td><td height="20" align="center" bgcolor="#FFFFFF" style="padding-left:30px;"><input name="prd_uncharge[]" type="text" id="prd_uncharge'+fileId+'" size="10" maxlength="10"  class="large1" onKeyUp="luggageuncharge()" onkeypress="if(enter_pressed(event)){ return false; } else { return numbersonly(this, event, false); }"></td><td width="5%" height="20" align="center" bgcolor="#FFFFFF"><a href="" onclick="javascript:removeElement(\'file-' + fileId + '\'); return false;"><img src="images/remove.jpg" border="0"></a></td></tr></table>';
										//alert(html)
				addElement('files', 'p', 'file-' + fileId, html);
				document.getElementById('totaltxt').value=fileId; 
				
			}	
			
			
			
	function particularcharge()
{
	
	 var particulartotoal = 0;
	 var e = document.forms['bookingform'].elements;
	 var tot = e['totaltxt'].value;
	 //alert(tot)
	 for(i=1; i<=tot; i++) {
		var txtprice = 'prd_price'+i;	
		particulartotoal = parseInt(document.getElementById(txtprice).value) +parseInt(particulartotoal);
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


function qtycount()
	{
		var luggagetotoal = 0;totpricevalue=0;
	 var e = document.forms['bookingform'].elements;
	 var tot = e['totaltxt'].value;
	 
	 
	 
	 for(i=1; i<=tot; i++) {
		
		var txtqty = 'prd_qunty'+i;	
		//var txttype = 'item_type'+i;	
		
		var txtweight = 'prd_weight'+i;	
		var txtunitprice = 'prd_unitprice'+i;	
		var txtprice = 'prd_price'+i;	
		luggagetotoal = parseFloat(document.getElementById(txtqty).value) +parseFloat(luggagetotoal);
		luggageloading = parseFloat(luggagetotoal) * 10 /100;
		luggageunloading = parseFloat(luggagetotoal) * 5 /100;
		luggagetax = parseFloat(luggagetotoal) * 5 /100;
		 
		document.getElementById(txtprice).value =  (parseInt(document.getElementById(txtqty).value) * parseFloat(document.getElementById(txtunitprice).value));
		if ( document.getElementById(txtweight).value!=0 )
		 document.getElementById(txtprice).value =  parseFloat(document.getElementById(txtweight).value) * parseFloat(document.getElementById(txtunitprice).value);
		
		 
		
		totpricevalue = parseFloat( document.getElementById(txtprice).value ) +parseInt(totpricevalue)
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
			document.getElementById("txttransQTY").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("GET","luggage_qty.php?q="+luggagetotoal,true);
		xmlhttp.send();particularcharge()
	}
	
	
	function luggagecharge()
	{
		var luggagetotoal = 0;
	 var e = document.forms['bookingform'].elements;
	 var tot = e['totaltxt'].value;
	 for(i=1; i<=tot; i++) {
		var txtcharge = 'prd_charge'+i;	
		luggagetotoal = parseInt(document.getElementById(txtcharge).value) +parseInt(luggagetotoal);
		
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
	
	function luggageuncharge()
	{
		
		var luggagetotoal = 0;
	 var e = document.forms['bookingform'].elements;
	 var tot = e['totaltxt'].value;
	 //alert(tot)
	 for(i=1; i<=tot; i++) {
		var txtuncharge = 'prd_uncharge'+i;	
		luggagetotoal = parseInt(document.getElementById(txtuncharge).value) +parseInt(luggagetotoal);
		//alert(luggagetotoal)
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
			document.getElementById("txtluggage1").innerHTML=xmlhttp.responseText;
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
	
	/*if(document.bookingform.vehicle.value==0)
    {
	   
	   alert("Please enter the Vehicle No.");
	   document.bookingform.vehicle.focus();
       return false;
    }*/
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
		alert("Please enter the sender Name");
		return false;
	}
    if(document.bookingform.reciever_suggestions.value=='')
	{
		document.bookingform.reciever_suggestions.focus();
		alert("Please enter the reciever Name");
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
	if(document.bookingform.vehicle_no.value==0)
	{
		document.bookingform.vehicle_no.focus();
		alert("Please enter the vehicle No.");
		return false;
	}
	if(document.bookingform.driver_name.value=='')
	{
		document.bookingform.driver_name.focus();
		alert("Please enter the Driver Name.");
		return false;
	}
	    var totprice = 0;
		var totcharge = 0;var totuncharge = 0;
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
								
								if(document.getElementById(txtcharge).value == '') {
									alert("Please enter the valid Luggage Charge for item number "+i);
									document.getElementById(txtcharge).focus();
									return false;
								}
								else
								totcharge = totcharge + parseInt(document.getElementById(txtcharge).value);
								if(document.getElementById(txtuncharge).value == '') {
									alert("Please enter the valid Luggage Unloading Charge for item number "+i);
									document.getElementById(txtuncharge).focus();
									return false;
								}
								else
								totuncharge = totuncharge + parseInt(document.getElementById(txtuncharge).value); 
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
				document.getElementById('unluggage_amount').value = totuncharge;
				//var retVal = confirm(' Sub Total                          :    '+totprice+'\n Loading& Unloading Charges              :    '+totcharge+'\n Door Delivery Charges     :    '+door_charge+'\n Total Amount                     :    '+totamount+' \n\n Do you want to continue?');
				  // if( retVal == true ){
					 // return true;
							  // }else{
								 // return false;
							  // }
}
function recieveraddress(a)
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
			document.getElementById("reciever_address1").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("GET","luggage_recieveraddress.php?q="+a,true);
		xmlhttp.send();
	
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
		if ((("0123456789.").indexOf(keychar) > -1)){
		   
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

function enadis(e,f){
	
	if(e=='Kg'){
	document.getElementById("prd_weight"+f).disabled = false ;  
	document.getElementById("prd_weight"+f).style.visibility = "visible";
	document.getElementById("prd_price"+f).value =  parseInt(document.getElementById("prd_weight"+f).value) * parseInt(document.getElementById("prd_unitprice"+f).value)
	}
	else
	{
	document.getElementById("prd_weight"+f).disabled = true  ; 
	document.getElementById("prd_weight"+f).style.visibility = "hidden";
	document.getElementById("prd_price"+f).value =  parseInt(document.getElementById("prd_qunty"+f).value) * parseInt(document.getElementById("prd_unitprice"+f).value)
	}
	
	if(e=='Items')
	{
	document.getElementById("prd_weight"+f).disabled = true ;
	document.getElementById("prd_weight"+f).style.visibility = "hidden";
	document.getElementById("prd_price"+f).value =  parseInt(document.getElementById("prd_qunty"+f).value) * parseInt(document.getElementById("prd_unitprice"+f).value)
	}
	else
	{
	document.getElementById("prd_weight"+f).disabled = false  ;  
	document.getElementById("prd_weight"+f).style.visibility = "visible";
	document.getElementById("prd_price"+f).value =  parseInt(document.getElementById("prd_weight"+f).value) * parseInt(document.getElementById("prd_unitprice"+f).value)
	}
}
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
	<div class="page_title">
		<span class="title_icon"><span class="coverflow"></span></span>
		<h3>Parcel Booking&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="luggage_new_paid.php"><input name="paid" type="button" class="orange_block" value="   Paid   "></a>&nbsp;&nbsp;&nbsp;&nbsp; <a href="luggage_new_topay.php"><input type="button" class="not_valid"  value="To Pay"></a>&nbsp;&nbsp;&nbsp;&nbsp; <!-- <a href="luggage_new_credit1.php"><input type="button"  value="Credit"  class="green_block"></a>&nbsp;&nbsp;&nbsp;&nbsp; <a href="luggage_new_manual.php"><input type="button"  value="Manual"  class="ac_over"></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="luggage_new_credit2.php"><input type="button"  value="Manual Credit"  class="gradeX"></a>--></h3>
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
						<h6>Add New luggage <font color="red" style="font-size:22px"> [Paid]</font></h6>
                       
					</div>
              
              
              
              <div class="widget_content">
                <table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td width="5%">&nbsp;</td>
                    <td width="79%"><table width="100%" border="1">
                      <?php /*?><tr>
                        <td width="10%"><div class="note_title1">Vechile</div></td>
                        <td width="20%"><select name="vehicle" class="limiterBox1" tabindex="1">
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
                        </tr><?php */?>
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
                        <input id="lrno" name="lrno" type="text"  maxlength="100" class="large" value="<?php echo $max2;?>" readonly />
                        <input id="luggage_ref" name="luggage_ref" type="text"  maxlength="100" class="large" value="0" hidden /></td>
                        <td class="new_title"><!--Vechile-->Booking Date</td>
                        <td><?php /*?><select name="vehicle" class="limiterBox">
                        <option value="0">Select Any</option>
                          <?php 
										$vehicl = mysqli_query($objConn,"select * from power_vehicle where vec_status=0");
										while($vehicl1 = mysqli_fetch_array($vehicl))
										{
											echo "<option value=".$vehicl1['id'].">".$vehicl1['vehicle']."</option>";
										}
										
										?>
                        </select><?php */?><?php echo date("d-M-Y h:i:s a"); ?></td>
                        </tr>
                     
                     <tr>
                        <td height="33" class="new_title">&nbsp;</td>
                        <td class="new_title">Route From</td>
                        <td><?php /*?><select name="route_from" class="limiterBox" tabindex="1">
                        <option value="0">Select Any</option>
                          <?php 
										$route = mysqli_query($objConn,"select * from power_route where route_status=0  order by route");
										while($route1 = mysqli_fetch_array($route))
										{
											echo "<option value=".$route1['id'].">".$route1['route']."</option>";
										}
										
										?>
                        </select><?php */?>
                        <input type="hidden" name="route_from" id="route_from" value="<?php echo $_SESSION['route']?>"/> 
                        <?php echo $_SESSION['route_name'];?>                       </td>
                        <td class="new_title">Route To</td>
                        <td><select name="route_to" id="route_to" class="limiterBox" tabindex="2" onChange="recieveraddress(this.value);">
                        <option value="0">Select Any</option>
                          <?php 
										$route = mysqli_query($objConn,"select * from power_route where route_status=0 and (route_nature = 'Booking & Delivery' or route_nature = 'Delivery') order by route");
										while($route1 = mysqli_fetch_array($route))
										{
											if($_SESSION['route']!=$route1['id'])
											echo "<option value=".$route1['id'].">".$route1['route']."</option>";
										}
										
										?>
                        </select></td>
                        </tr>
                       
                      <tr>
                        <td height="33" class="new_title">&nbsp;</td>
                        <td  class="new_title">Sender Name</td>
                        <td>  <div>
                                <select id="sender" style="display: none;" onChange="this.value();" tabindex="3" >
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
                                        id="sender_suggestions" name="sender_suggestions"   tabindex="3">
                               </div>
                            </div>
                        
                       
                        
                       
                        </td>
                        <td class="new_title">Reciever Name </td>
                        <td>
                        <div>
                                <select id="reciever" style="display: none;" tabindex="4">
                                  <?php $sel = "select * from power_customers";
			  $sel1 = mysqli_query($objConn,$sel);
			  $sel3 = mysqli_num_rows($sel1);
			  $co=0;
			  while($sel2 = mysqli_fetch_array($sel1))
			  {
				  echo '<option value="'.$sel2['id'].'">'.$sel2['cust_name'].'</option>';
				  
			  }
		?>
                                </select>
                        
                                <div>
                                    <input
                                        id="reciever_suggestions" name="reciever_suggestions" tabindex="4">
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
<input id="sender_address" name="sender_address" type="text"  maxlength="100" class="large"   tabindex="8" value="<?php echo $_SESSION['route_name'];?>"/>
                        </div></td>
                        <td class="new_title">Reciever Phone No &amp; Address</td>
                        <td><div id="txtphone1"><input id="reciever_phone" name="reciever_phone" type="text"  maxlength="100" class="large"onkeypress="if(enter_pressed(event)){ return false; } else { return numbersonly(this, event, false); }" tabindex="9"/>
                          <br><br></div>
                         <div id="reciever_address1"> <input id="reciever_address" name="reciever_address" type="text"  maxlength="100" class="large" tabindex="9"/></div>
</td>
                      </tr>
                      
                        <?php /*<tr>
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
                      
                       <tr>
                        <td height="33" class="new_title">&nbsp;</td>
                        <td class="new_title">Door Collection</td>
                        <td>
                        <input type="text" name="door_collection" id="door_collection" value="0"  class="large" onkeypress="if(enter_pressed(event)){ return false; } else { return numbersonly(this, event, false); }">
                        </td>
                        <td class="new_title">LR Charges</td>
                        <td> <input type="text" name="lr_charges" id="lr_charges" value="0"  class="large" onkeypress="if(enter_pressed(event)){ return false; } else { return numbersonly(this, event, false); }"></td>
                      </tr>
                      
                      <tr>
                        <td height="33" class="new_title">&nbsp;</td>
                        <td class="new_title">ODA Charges</td>
                        <td>
                        <input type="text" name="oda_charges" id="oda_charges" value="0"  class="large" onkeypress="if(enter_pressed(event)){ return false; } else { return numbersonly(this, event, false); }">
                        </td>
                        <td class="new_title"></td>
                        <td> </td>
                      </tr>
                     <?php /* <tr>
                        <td  height="33" class="new_title">&nbsp;</td>
                        <td  class="new_title">Vechile No</td>
                        <td >
                        <select name="vehicle_no" class="limiterBox1" tabindex="1">
                        <option value="0">Select Any</option>
                          <?php 
										$vehicl = mysqli_query($objConn,"select * from power_vehicle where vec_status=0");
										while($vehicl1 = mysqli_fetch_array($vehicl))
										{
											if($_SESSION['vehicle_no']==$vehicl1['id'])
											echo "<option value=".$vehicl1['id']." selected>".$vehicl1['vehicle']."</option>";
											else
											echo "<option value=".$vehicl1['id'].">".$vehicl1['vehicle']."</option>";
										}
										
										?>
                        </select>
                        </td>
                        <td class="new_title">Driverr Name & Contact No.</td>
                        <td ><input type="text" name="driver_name" id="driver_name" value="<?php echo $_SESSION['driver_name']?>"  class="large" > </td>
                      </tr>*/?>
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
                        <td  height="5"></td>
                        <td ></td>
                         <td ></td>
                          <td ></td>
                        <td ></td>
                        <td  ></td>
                        <td ></td>
                        <td ></td>
                      </tr>
                      <tr>
                        <td  height="10"></td>
                        <td  align="center"><strong>Article Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  </strong></td>
                        <td align="center"><strong>Qty&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>
                         <td align="center"><strong>Weight&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>
                          <td align="center"><strong>Unit Price</strong></td>
                        <td  align="center"><strong>Total Price&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></td>
                         <td  align="center"><strong>Loading Charges</strong></td>
                          <td  align="center"><strong>Unloading Charges</strong></td>
                        <td  align="center" valign="middle"><strong><img src="images/list-icons/plus.png"  onClick="addFile();" style="cursor:pointer;"  alt="plus"></strong></td>
                        
                      </tr>
                      <tr>
                        <td height="10"></td>
                        <td colspan="7">&nbsp;</td>
                        
                      </tr>
                      <tr>
                        <td height="10"></td>
                        <td colspan="7" align="right"><?php 
				$vals=1;
				if($vals>0){
				for($i=0;$i<$vals;$i++){
				?>
				<div id="files">
				<div id="file-<?php echo ($i+1); ?>">
			    
			   
			    <table width="100%" border="1" cellspacing="1" cellpadding="20" >
			 
			  <tr>
                    <td   height="20" align="center" bgcolor="#FFFFFF"   >
                    
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
                 
                    <td  align="left" bgcolor="#FFFFFF" ><input name="prd_qunty[]" type="text" class="large" id="prd_qunty<?php echo ($i+1); ?>" size="4" maxlength="4" value="1"   onKeyUp="qtycount()" onkeypress="if(enter_pressed(event)){ return false; } else { return numbersonly(this, event, false); }" tabindex="11"></td>
                     <td  align="left" bgcolor="#FFFFFF" >
                     <?php /*?><table><tr><td><input type="radio" name="item_type<?php echo ($i+1); ?>" id="item_type<?php echo ($i+1); ?>" value="Items" checked  onClick="return enadis(this.value,<?php echo ($i+1); ?>)">ITEMS &nbsp;</td><td><input type="radio" name="item_type<?php echo ($i+1); ?>" id="item_type<?php echo ($i+1); ?>" value="Kg"  onClick="return enadis(this.value,<?php echo ($i+1); ?>)" >KG&nbsp;</td></tr></table>
                     <?php */?><input name="prd_weight<?php echo ($i+1); ?>" type="text" class="large" id="prd_weight<?php echo ($i+1); ?>" size="4" maxlength="4" value="0"   onKeyUp="qtycount()" onkeypress="if(enter_pressed(event)){ return false; } else { return numbersonly(this, event, false); }" tabindex="11"  readOnly>
                     </td>
                      <td  align="left" bgcolor="#FFFFFF"><input name="prd_unitprice[]"type="text"  class="large1" id="prd_unitprice<?php echo ($i+1); ?>" size="10" maxlength="10"  value="1" tabindex="14" onKeyUp="qtycount()"></td>
                    <td  height="20" align="center" bgcolor="#FFFFFF"><input name="prd_price[]" type="text"  class="large1" id="prd_price<?php echo ($i+1); ?>" size="10" maxlength="10"  onKeyUp="particularcharge()"  readonly tabindex="14"></td>
                    <td height="20" align="center" bgcolor="#FFFFFF"><input name="prd_charge[]" type="text"  class="large1" id="prd_charge<?php echo ($i+1); ?>" size="10" maxlength="10"  onKeyUp="luggagecharge()"  onkeypress="if(enter_pressed(event)){ return false; } else { return numbersonly(this, event, false); }" tabindex="16" readOnly></td>
                    <td   height="20" align="center" bgcolor="#FFFFFF"><input name="prd_uncharge[]" type="text"  class="large1" id="prd_uncharge<?php echo ($i+1); ?>" size="10" maxlength="10"  onKeyUp="luggageuncharge()"  onkeypress="if(enter_pressed(event)){ return false; } else { return numbersonly(this, event, false); }" tabindex="17" readOnly></td>
                    <input type="hidden" name="totaltxt" id="totaltxt" value="<?php echo @$vals; ?>" />
                    <td   height="20" align="center" bgcolor="#FFFFFF">&nbsp;</td>
                    </tr> <tr>
			    <td height="20" align="center" bgcolor="#FFFFFF" style="text-transform:uppercase;" >&nbsp;</td>
			   
			    <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
                 <td align="center" bgcolor="#FFFFFF">&nbsp;</td>
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
                <div id="txtluggagetotal">
                
                <table width="50%" height="81" border="0" align="right" cellpadding="0" cellspacing="0" >
			     <tr>
			      
			       <td></td>
			       <td>&nbsp;</td>
			       </tr>
			    <?php /*?> <tr>
			       <td height="33" class="new_title">Total Quantity</td>
			       <td><div id="txttransQTY">
			         <input name="tot_qty" type="hidden" id="tot_qty"  value="<?php echo $total_qty?>" maxlength="50"  class="large">
			         <?php echo "<span class=new_title>".number_format($total_qty,2)."</span>"; ?> </div></td>
		          </tr><?php */?>
			     <tr>
			       <td colspan="2" height="33" class="new_title"><div id="txttransHint">Total Fright Charges : 
			       
			         <input name="particular_amount" type="hidden" id="particular_amount"  value="<?php echo $total_price?>" maxlength="50"  class="large" readOnly >
			         <?php echo "<span class=new_title>".number_format($total_price,2)."</span>"; ?> </div></td>
			       </tr>
			     <?php /*<tr>
			       <td width="19%" height="33" class="new_title">Loading Charges</td>
			       <td width="19%"><div id="txtluggage">
			         <input id="luggage_amount" name="luggage_amount" type="text"  value="<?php echo $luggage_price?>" maxlength="50"  class="large" readOnly />
			         <?php echo "<span class=new_title>".number_format($luggage_price,2)."</span>"; ?></div></td>
			       </tr>
                   	
 					<tr>
			       <td width="19%" height="33" class="new_title">Unloading Charges</td>
			       <td width="19%"><div id="txtluggage1">
			         <input id="unluggage_amount" name="unluggage_amount" type="text"  value="<?php echo $unluggage_price?>" maxlength="50"  class="large" readOnly />
			         <?php echo "<span class=new_title>".number_format($unluggage_price,2)."</span>"; ?></div></td>
			       </tr>*/?>
			     </table>
            </div>
             
			<div align="center">					<div class="form_grid_12">
									<div class="form_input">
									  
									  <br>
                                    <!--<input name="particular_amount" type="hidden" id="particular_amount"  value="" maxlength="50"  class="large"><input id="luggage_amount" name="luggage_amount" type="hidden"  value="" maxlength="50"  class="large" /><input id="unluggage_amount" name="unluggage_amount" type="hidden"  value="" maxlength="50"  class="large" />-->
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