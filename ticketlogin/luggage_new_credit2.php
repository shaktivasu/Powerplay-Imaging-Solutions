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
if($_REQUEST['type']=='manual')
$max2=$rtn2[0].'-MC-'.$max1;
else
$max2=$rtn2[0].'-C-'.$max1;
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
// if (e.keyCode == 112)
// addFile();
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
										}
										
										?></select></td><td  height="20" align="center" bgcolor="#FFFFFF"><input name="prd_qunty[]" type="text" id="prd_qunty'+fileId+'" size="7" maxlength="10" class="large"  value="1"  onKeyUp="qtycount()" onkeypress="if(enter_pressed(event)){ return false; } else { return numbersonly(this, event, false); }"></td><td  align="left" bgcolor="#FFFFFF" > <table><tr><td><input type="radio" name="item_type'+fileId+'" id="item_type'+fileId+'" value="Items" checked  onClick="return enadis(this.value,'+fileId+')">ITEMS&nbsp;</td><td><input type="radio" name="item_type'+fileId+'" id="item_type'+fileId+'" value="Kg"  onClick="return enadis(this.value,'+fileId+')" >KG </td><td><input name="prd_weight'+fileId+'" type="text" class="large" id="prd_weight'+fileId+'" size="3" maxlength="3" value="1"   onKeyUp="qtycount()" onkeypress="if(enter_pressed(event)){ return false; } else { return numbersonly(this, event, false); }" tabindex="11" disabled style="border-color:#FF8484; visibility:hidden;"></td></tr></table></td><td  align="left" bgcolor="#FFFFFF"><input name="prd_unitprice[]" type="text" class="large1" id="prd_unitprice'+fileId+'" size="10" maxlength="10" value="1"   onKeyUp="qtycount()" onkeypress="if(enter_pressed(event)){ return false; } else { return numbersonly(this, event, false); }" tabindex="11"></td><td height="20" align="center" bgcolor="#FFFFFF" style="padding-left:30px;"><input name="prd_price[]" type="text" id="prd_price'+fileId+'" size="10" maxlength="10"  class="large1"  onKeyUp="particularcharge()" onkeypress="if(enter_pressed(event)){ return false; } else { return numbersonly(this, event, false); }"></td><td height="20" align="center" bgcolor="#FFFFFF" style="padding-left:30px;"><input name="prd_charge[]" type="text" id="prd_charge'+fileId+'" size="10" maxlength="10"  class="large1" onKeyUp="luggagecharge()" onkeypress="if(enter_pressed(event)){ return false; } else { return numbersonly(this, event, false); }"></td><td height="20" align="center" bgcolor="#FFFFFF" style="padding-left:30px;"><input name="prd_uncharge[]" type="text" id="prd_uncharge'+fileId+'" size="10" maxlength="10"  class="large1" onKeyUp="luggageuncharge()" onkeypress="if(enter_pressed(event)){ return false; } else { return numbersonly(this, event, false); }"></td><td width="5%" height="20" align="center" bgcolor="#FFFFFF"><a href="" onclick="javascript:removeElement(\'file-' + fileId + '\'); return false;"><img src="images/remove.jpg" border="0"></a></td></tr></table>';
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
		var txttype = 'item_type'+i;	
		
		var txtweight = 'prd_weight'+i;	
		var txtunitprice = 'prd_unitprice'+i;	
		var txtprice = 'prd_price'+i;	
		luggagetotoal = parseInt(document.getElementById(txtqty).value) +parseInt(luggagetotoal);
		 if ( document.getElementById(txttype).checked )
		 document.getElementById(txtprice).value =  parseInt(document.getElementById(txtqty).value) * parseInt(document.getElementById(txtunitprice).value)
		 else 
		 document.getElementById(txtprice).value =  parseInt(document.getElementById(txtweight).value) * parseInt(document.getElementById(txtunitprice).value)
		
		
		totpricevalue = parseInt( document.getElementById(txtprice).value ) +parseInt(totpricevalue)
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
	
  
   if(document.bookingform.credit_code.value=='')
    {
	   document.bookingform.credit_code.focus();
	   alert("Please enter the Credit Code.");
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
</head>
<body id="theme-default" class="full_block">
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
		<h3>Parcel Booking&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="luggage_new_paid.php"><input name="paid" type="button" class="orange_block" value="   Paid   "></a>&nbsp;&nbsp;&nbsp;&nbsp; <a href="luggage_new_topay.php"><input type="button" class="not_valid"  value="To Pay"></a>&nbsp;&nbsp;&nbsp;&nbsp; <a href="luggage_new_credit1.php"><input type="button"  value="Credit"  class="green_block"></a>&nbsp;&nbsp;&nbsp;&nbsp; <a href="luggage_new_manual.php"><input type="button"  value="Manual"  class="ac_over"></a>&nbsp;&nbsp;&nbsp;&nbsp; <a href="luggage_new_credit2.php"><input type="button"  value="Manual Credit"  class="gradeX"></a></h3>
		<div class="top_search">
			
		</div>
	</div>
	<div id="content">
		<div class="grid_container">
		  <div class="grid_12">
		    <div class="widget_wrap">
		      <div class="widget_content">
		      <form id="bookingform" name="bookingform" autocomplete="off" method="post"  class="form_container left_label" action="luggage_new_credit_manual.php" onSubmit="return val();"  >
		      <div class="widget_top">
						<span class="h_icon list"></span>
						<h6>Add New luggage <font color="red" style="font-size:22px">
						[MANUAL CREDIT]
                         </font></h6>
                       
					</div>
              
              <h3>Credit Code <input type="text" name="credit_code" id="credit_code"  class="large"> &nbsp;  &nbsp; Location To &nbsp;  &nbsp; <select name="route_to" class="limiterBox" tabindex="2">
                        <option value="0">Select Any</option>
                          <?php 
										$route = mysqli_query($objConn,"select * from power_route where route_status=0 order by route");
										while($route1 = mysqli_fetch_array($route))
										{
											if($_SESSION['route']!=$route1['id'])
											echo "<option value=".$route1['id'].">".$route1['route']."</option>";
										}
										
										?>
                        </select>
          <font color="red" style="font-size:22px">  <input type="hidden" name="manualtype" value="<?php $_REQUEST['type']?>">
           <input type="submit" name="cc_sub" class="not_valid" value="Get Customer"></font></h3>
              
              
              
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