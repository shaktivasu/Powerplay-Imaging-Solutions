<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
$id=$_POST['login_id'];
$password=md5($_POST['login_pass']);
if($id!=''&& $password!='')
{
	$query="select * from power_admin where username='".$id."' and password='".$password."'";
	$result=mysqli_query($objConn,$query)or die("Query Failed : ".mysql_error());
	$row=mysqli_fetch_row($result);
	$num=mysqli_num_rows($result);
	if($num==1)
	{
		$_SESSION['aid']=$row[0];
		?>
		<script language="javascript">window.location="adminhome.php";</script>
		<?php
	}
	else
	{
		?>
		<script language="javascript">window.location="index.php?err=1";</script><?php
	}
}
else
{
?>
		<script language="javascript">window.location="index.php";</script>
        <?php
        }
		?>

