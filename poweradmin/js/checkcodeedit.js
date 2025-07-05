// JavaScript Document
var xmlHttp

function codecheck(str)
{

if (str.length==0)
  { 
  document.getElementById("codeHint").innerHTML=""
  return
  }
  //old_code
  //alert(document.getElementById("code").value+" -- "+document.getElementById("old_code").value)
  if(document.getElementById("code").value == document.getElementById("old_code").value) {
	  return 
  }
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
  {
  alert ("Browser does not support HTTP Request")
  return
  } 
var url="codecheckedit.php"
var pid = document.getElementById("id").value
url=url+"?q="+str
url=url+"&sid="+Math.random()
url=url+"&pid="+pid
xmlHttp.onreadystatechange=stateChanged 
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
} 

function stateChanged() 
{ 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
 { 
 //document.getElementById("email_exist_status").value=xmlHttp.responseText;
	if(xmlHttp.responseText == 'exist') {
			document.getElementById("code").value = '';
			document.getElementById("codeHint").innerHTML = 'Code is already exist.';
	} else {
		document.getElementById("codeHint").innerHTML = '';	
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