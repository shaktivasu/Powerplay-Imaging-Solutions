// JavaScript Document
var xmlHttp

function valofferpro(str)
{
	//return false;
	//product_id :: category_id
if (str.length==0)
  { 
  document.getElementById("offernewHint").innerHTML=""
  return
  }
  var act = document.getElementById("Action").value
  if(act != 'New') {
	  	//alert("not in New form")
		var oldid = document.getElementById("old_offer_code").value
		
		var splt = str.split("::");
		var cid = splt[1];
		var pid = splt[0];
		if(document.getElementById("offer_flag")){
			//document.offer_new.offer_flag[0].checked 
			var ol = document.offer_edit.offer_flag.length
			var oftyp;
			for(i=0; i<ol; i++) {
				if(document.offer_edit.offer_flag[i].checked == true) {
					oftyp = document.offer_edit.offer_flag[i].value
					break;
				}
			}
			if(oftyp == 'category') {
				if(oldid == cid) {
						//alert(oldid+" -- "+cid)
						return false;
				}
			} 
			if(oftyp == 'product') {
				if(oldid == pid) {
					//alert(oldid+" -- "+pid)
						return false;
				}
			}
		}
  }
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
  {
  alert ("Browser does not support HTTP Request")
  return
  } 
var oid = -1 ;
if(document.getElementById("oid") && act == 'Edit') oid = document.getElementById("oid").value;
var url="offervalforprodcut.php"
url=url+"?q="+str
url=url+"&action="+act
url=url+"&id="+oid
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=stateChanged 
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
} 

function stateChanged() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 { 
 var res = xmlHttp.responseText;
 document.getElementById("offer_valid_status").value=res;
	if(document.getElementById("offer_valid_status").value == 'notexist') {
		document.getElementById("offernewHint").innerHTML = '';	
	} else {
		var offer_type = res.split("_");
		var itm;
		if(offer_type[1] == 'product') itm = 'Product'; else itm = 'Category' 
		if(document.getElementById("product_group")) document.getElementById("product_group").value = '';
		if(document.getElementById("category_group")) document.getElementById("category_group").value = '';
		
		document.getElementById("offernewHint").innerHTML = ' Selected '+itm+' Item already have Offer value';
	}
 } 
}

function GetXmlHttpObject()
{
var xmlHttp=null;
try
 {
 // Firefox, Opera 8.0+, Safari
 xmlHttp=new XMLHttpRequest();
 }
catch (e)
 {
 // Internet Explorer
 try
  {
  xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
  }
 catch (e)
  {
  xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
 }
return xmlHttp;
}