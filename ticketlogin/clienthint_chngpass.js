// JavaScript Document
var xmlHttp

function showHint(str)
{
if (str.length==0)
  { 
  document.getElementById("txtHint").innerHTML="Please enter the Old Password";
  return
  }
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null)
  {
  alert ("Browser does not support HTTP Request")
  return
  } 
var url="getpass.php"
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
 document.getElementById("pass_exist_status").value=xmlHttp.responseText;
	if(document.getElementById("pass_exist_status").value == 'notexist') {
			document.getElementById("oldpass").value = '';
			document.getElementById("txtHint").innerHTML = 'Password is Incorrect';
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