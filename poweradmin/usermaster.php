<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
if(isset($_GET['page']))
{
  $page=$_GET['page'];
}
else
{
 $page=1;
}
$limit=10;
if(isset($_GET['usermail']))
{
  $usermail=$_GET['usermail'];
}

$asc="asc";
$desc="desc";
if($_GET['order']=='')
$order="user_serialno";
else
$order=$_GET['order'];
if($_GET['order']=='user_name_asc')
$order="user_name ".$asc;
else if($_GET['order']=='user_name_desc')
$order="user_name ".$desc;
else
$order="user_serialno";

$count=(isset($_GET['del']))?$_GET['del']:NULL; 
$count1=count($count);
for($i=0;$i<=$count1;$i++)
{
$del="delete from power_user where user_serialno=".$_GET['del'][$i];
$del1=mysqli_query($objConn,$del);
}
if($count1>0) {
header("location:usermaster.php?delres=1");
exit;
}


 $sql='';
 if(isset($_REQUEST['search']))
  {
  if($_GET['usermail']=='')
  $qry="1=1";
  else
  $qry="user_mailid='".$_GET['usermail']."'";
  
  if($qry=="1=1")
  {
    $total="Select COUNT(*) FROM power_user where $qry ";
	$total1=mysqli_query($objConn,$total);
	$total2=mysql_result($total1, 0);
	$from=$limit*($page-1);
    $sql='';
	$user="select * from power_user where $qry order by $order limit $from,$limit";
    $user1 = mysqli_query($objConn,$user);
  }
  else
   {
    $total="Select COUNT(*) FROM power_user where $qry";
	$total1=mysqli_query($objConn,$total);
	$total2=mysql_result($total1, 0);
	$from=$limit*($page-1);

    $user="select * from power_user where $qry order by $order limit $from,$limit";
    $user1 = mysqli_query($objConn,$user);
   }
 }
 else
 {
    $total="Select COUNT(*) FROM power_user";
	$total1=mysqli_query($objConn,$total);
	$total2=mysql_result($total1, 0);
	$from=$limit*($page-1);

    $user="select * from power_user order by $order limit $from,$limit";
    $user1 = mysqli_query($objConn,$user);
 
 }

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>:: Welcome to KMP Travels  Admin Panel ::</title>
<script type="text/javascript">
function popup(url)
{
window.open(url,"msg","height=500,width=500,left=300,right=300");
}
</script>
<script type="text/javascript" src="../js/checkForm.js"></script>
<script language="javascript">
function val()
{
	getForm("form1");
    dml1=document.form1;
	len1 = dml1.elements.length;
	var j=0;
	
	delselect=0;
	for( j=0 ; j<len1 ; j++)
	 {
		if (dml1.elements[j].name=='del[]')
		 {
				if((dml1.elements[j].checked))
				{
				delselect=1;
				}
		}
	}
  if(delselect==0)
	{
		alert("Select atleast one Detail");
		return false;
	}
	if(!confirm('Are you sure you want to delete the Register User?, hit OK\n- otherwise, hit Cancel'))
		return false;
  document.form1.submit();
}
  function clearDefault(el) {
  if (el.defaultValue==el.value) el.value = ""
}

</script>
<style type="text/css">
<!--
@import url("stylesheet.css");
-->
</style>
</head>

<body>
<table width="921" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="bottom"><?php include("includes/menu_link.php");?></td>
      </tr>
      <tr>
        <td height="300" align="left" valign="top" bgcolor="#FFFFFF">
        <form id="form1" name="form1" method="get" action="usermaster.php">
          <table width="95%" border="0" align="center" cellpadding="0" cellspacing="0">
            <tr>
              <td height="25" align="right" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                  <tr>
                    <td height="20" align="left" valign="middle">&nbsp;</td>
                    <td align="right" valign="middle">&nbsp;</td>
                  </tr>
                  <tr>
                    <td colspan="2" align="center" valign="middle" class="pagehead">User List Page</td>
                    </tr>
                  <tr>
                    <td align="left" valign="middle">&nbsp;</td>
                    <td align="right" valign="middle"><span class="content_heading">Email id:</span>
                        <input type="text" name="usermail" id="usermail"  value="<?php if($usermail!='')
			{
			 echo $usermail ;
			 }
			 else
			 {
			 
			 echo "Enter the Search Text";
			 
			 }?>" ONFOCUS="clearDefault(this)"  />
                      &nbsp;&nbsp;
                      <input type="submit" value="search"  name="search" class="FORMBTTN" /></td>
                  </tr>
                  <tr>
                    <td colspan="2" align="center" valign="middle"  class="error"><?php if($_REQUEST['resdel']==1) echo "Deleted Successfully";?></td>
                    </tr>
                  <tr>
                    <td align="left" valign="middle">&nbsp;</td>
                    <td align="right" valign="middle"><table width="50%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td width="226" align="right" valign="middle"><a href="usermaster.php" class="add_delete">Back To Search</a></td>
                        <td width="30" align="left" valign="middle" class="devid1">&nbsp;</td>
                        <td width="52" height="20" align="left" valign="middle"><a href="#" class="add_delete" onclick="return val();">Delete</a></td>
                      </tr>
                    </table></td>
                  </tr>
              </table></td>
              <td align="left" valign="top">&nbsp;</td>
            </tr>
            <tr>
              <td height="5" colspan="2" align="left" valign="top"></td>
            </tr>
            <tr>
              <td align="left" valign="top"><table width="98%" border="0" cellpadding="1" cellspacing="1" bgcolor="#E3C277">
                  <tr>
                    <td width="4%" height="25" bgcolor="#e1ad45">&nbsp;</td>
                    <td width="37%" height="25" align="center" valign="middle" bgcolor="#e1ad45" class="tablehead">
                   <?php
				   if($_GET['order']=='user_name_asc')
				   {?>
                    <a href="usermaster.php?order=user_name_desc" class="hotlnk">User Name</a>&nbsp;&nbsp;<img src="images/asc.gif" border="0" />
                    <?php 
					}
					else if($_GET['order']=='user_name_desc')
					{?>
                   <a href="usermaster.php?order=user_name_asc" class="hotlnk">User Name</a>&nbsp;&nbsp;<img src="images/dsc.gif" border="0" />
                  <?php }
				  
				  else
				  {?>
                   <a href="usermaster.php?order=user_name_desc" class="hotlnk">User Name</a>&nbsp;&nbsp;<img src="images/asc.gif" border="0" />
				  <?php } ?>                    </td>
                    <td width="15%" height="25" align="center" valign="middle" bgcolor="#e1ad45" class="tablehead">Address</td>
                    <td width="9%" align="center" valign="middle" bgcolor="#e1ad45" class="tablehead">City</td>
                    <td width="8%" align="center" valign="middle" bgcolor="#e1ad45" class="tablehead">Country</td>
                    <td width="13%" height="25" align="center" valign="middle" bgcolor="#e1ad45" class="tablehead">State</td>
                    <td width="14%" height="25" align="center" valign="middle" bgcolor="#e1ad45" class="tablehead">Email id</td>
                    <td width="14%" align="center" valign="middle" bgcolor="#e1ad45" class="tablehead">Active Status</td>
                  </tr>
                  <?php
                 //$user="select * from power_user limit $from,$limit";
				 //$user1=mysqli_query($objConn,$user);
				 $num=mysqli_num_rows($user1);
				  if($num==0)
				  {?>
                  <tr>
                    <td width="4%" height="25" colspan="8" align="center" bgcolor="#f9f2e2">No Users</td>
                  </tr>
                  <?php 
				 }
				 else
				 {
				 while($user2=mysqli_fetch_array($user1))
				 {
				  ?>
                  <tr>
                    <td width="4%" height="25" bgcolor="#f9f2e2" class="tabletext"><input type="checkbox" name="del[]" id="del[]"  value="<?php echo $user2['user_serialno'];?>"/></td>
                    <td width="37%" height="25" align="center" valign="middle" bgcolor="#f9f2e2" class="tabletext"><a href='javascript:popup("change_ustatus.php?id=<?php echo $user2['user_serialno'];?>")' class="hotlnk"><?php echo $user2['user_name'];?></a></td>
                    <td width="15%" height="25" align="center" valign="middle" bgcolor="#f9f2e2" ><?php echo $user2['user_address_1'];?></td>
                    <td width="9%" align="center" valign="middle" bgcolor="#f9f2e2" ><?php echo $user2['user_city'];?></td>
                    <td width="8%" align="center" valign="middle" bgcolor="#f9f2e2" ><?php echo $user2['user_country'];?></td>
                    <td width="13%" height="25" align="center" valign="middle" bgcolor="#f9f2e2" ><?php echo $user2['user_state'];?></td>
                    <td width="14%" height="25" align="center" valign="middle" bgcolor="#f9f2e2"><?php echo $user2['user_mailid'];?></td>
                    <td width="14%" align="center" valign="middle" bgcolor="#f9f2e2">
					<?php
					if($user2['user_status']=='Active')
					{?>
                    <img src="images/true.png" border="0" />
                    <?php }
					else
					{?>
					
               <img src="images/false.png" border="0" />

	<?php }?></td>
                  </tr>
                  <?php } ?>
                  <?php } ?>
              </table>
                <p>&nbsp;</p>
                <p align="right">
                
                       <?php
					 /* Paging Start */
                      
                      $previousPage=$page-1;
                      $nextPage=$page+1;
                      $last=ceil($total2/$limit); 
                      if($page != 1)
                       {
                            
                            echo "<a href='usermaster.php?order=".$_GET['order']."&page=".$previousPage."' class=add_delete>Back</a> ";
							echo "&nbsp;";
							echo "&nbsp;";
							echo "&nbsp;";
                       }
                     
                     
                     for($pageCount=1; $pageCount <= $last; $pageCount++)
                      {
                            if ($pageCount!=$page)
							
                        {
                                  echo "<a href='usermaster.php?order=".$_GET['order']."&page=".$pageCount."' class=add_delete> ".$pageCount."</a> ";
								  echo "&nbsp;";
							echo "&nbsp;";
							echo "&nbsp;";
                        }
                            else
                        {
                                  echo "<font class=textblue size=2>[" .$pageCount. "] </font>";
								  echo "&nbsp;";
							echo "&nbsp;";
							echo "&nbsp;";
                        }
                      }
                     
                     
                     
                      if($total2 > ($from+$limit)) 
                      {
                            echo "<a href='usermaster.php?order=".$_GET['order']."&page=". $nextPage ."' class=add_delete>Next</a> ";
							echo "&nbsp;";
                           
                      }
                      
                     
                    
					  
                    
					 /* paging End */
                      ?>
                
                
                </p></td>
              <td align="right" valign="top"><?php //include_once('inc_right_panel.php');?></td>
            </tr>
          </table>
                </form>
        </td>
      </tr>
      <tr>
        <td align="left" valign="top"><?php include("includes/footer.php");?> </td>
      </tr>
    </table></td>
  </tr>
</table>
</body>

</html>
