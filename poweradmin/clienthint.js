// JavaScript Document
var xmlHttp

function showHint(str)
{
if (str.length==0)
  { 
  document.getElementById("txtHint").innerHTML="Please enter the Old E-Mail ID"
  return
  }
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
  {
  alert ("Browser does not support HTTP Request")
  return
  } 
var url="gethint.php"
url=url+"?q="+str
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=stateChanged 
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
} 

function stateChanged() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 { 
 document.getElementById("email_exist_status").value=xmlHttp.responseText;
	if(document.getElementById("email_exist_status").value == 'notexist') {
			document.getElementById("oldmail").value = '';
			document.getElementById("txtHint").innerHTML = 'Email ID is not exist';
	} else {
		document.getElementById("txtHint").innerHTML = '';	
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