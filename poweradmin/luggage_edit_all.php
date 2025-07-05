<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
for($i=0;$i<count($_POST['del']);$i++)
				{
					
					if(isset($_POST['del'][$i]))
					{		
						$qry = mysqli_query($objConn,"update power_luggage set luggage_status='Inward' where id='".$_POST['del'][$i]."' ");
					}
				}
				//header("location:luggage_delivery.php?msg=inwrd");
			header("location:luggage_delivery.php?msg=inwrd&frmdate=".$_POST['frmdate']."&todate=".$_POST['todate']);
?>