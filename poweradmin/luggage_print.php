<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
$frmdate = date("Y-m-d");
$todate = date("Y-m-d");
if(isset($_POST['frmdate']))
{
$frmdate = $_POST['frmdate'];
}
if(isset($_POST['todate']))
{
$todate = $_POST['todate'];
}
if($_REQUEST['news']=="del")
{
$id=$_GET['event_id'];
$del_news=mysqli_query($objConn,"update power_luggage set luggage_status = 'Cancelled'  where id=".$id."") or die("Delete News Error:".mysql_error());
header("location:luggage.php?msg=3");
}

?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width"/>
<title>:: Welcome to Power Play Imaging Solutions   - Admin Panel ::</title>
<style>   
div.page { page-break-after: always }
</style>
<style type="text/css"media="print">@media print 
 {
 body { margin: 0; background-image: none; font-size: 16pt; }
 }
 </style>
</head>
<body onLoad="window.print();"  >

					
                    
					
                  <?php 
				  $routewise = "select * from power_route where id in (select luggage_to from power_luggage where create_date>='".$_GET['frmdate']."' and create_date<='".$_GET['todate']."' $vecstr".")";
				  $routewise1 = mysqli_query($objConn,$routewise);
				   $routewise2 = mysqli_num_rows($routewise1);
				  if($routewise2>0)
				  {
					while($routewise3 = mysqli_fetch_array($routewise1))
					{
				  ?>
						<div class="page">
                        <h6>luggage Booking : Vehicle Wise -
						<?php  
						$vecstr = '';
						if($_GET['vehicle']=='all' || $_GET['vehicle']== '')
						{
							echo "ALL";
							$vecstr = '';
						}
						else
						{
							$vehname =mysqli_fetch_row(mysqli_query($objConn,'select vehicle from power_vehicle where id ='.$_GET['vehicle']));
							echo $vehname[0];
							$vecstr =' and luggage_vehicle = "'.$_GET['vehicle'].'"';
						}
								
								?> [ <?php echo date('d-M-Y',strtotime($_GET['frmdate'])).' To '.date('d-M-Y',strtotime($_GET['todate']));?> ] </h6>
					
                        <strong><?php echo $routewise3['route']?></strong><br><br>
                        <table class="display" >
						<thead>
						<tr>
							<th width="4%" bgcolor="#F4F4F4">	 Sl No</th>
							<th width="4%" bgcolor="#F4F4F4">Date</th>
                            <th width="8%" bgcolor="#F4F4F4">LR No.</th>
                            <th width="15%" bgcolor="#F4F4F4">Sender Name &amp; Phone No.</th>
                            <th width="13%" bgcolor="#F4F4F4">Reciever Name &amp; Phone No.</th>
							<th width="15%" bgcolor="#F4F4F4"> Particular</th>
							<th width="8%" bgcolor="#F4F4F4">From</th>
							<th width="6%" bgcolor="#F4F4F4">To</th>
							<th width="6%" bgcolor="#F4F4F4">Door Delivery</th>
							<th width="6%" bgcolor="#F4F4F4"> Amount</th>
							<th width="7%" bgcolor="#F4F4F4">Paid /  To Pay</th>
							
                        </tr>
						</thead>
						<tbody>
                          <?php
					$luggage=mysqli_query($objConn,"select * from power_luggage where ((luggage_to = ".$routewise3[0]." and luggage_paymethod = 'Paid') or (luggage_to = ".$routewise3[0]." and luggage_paymethod = 'To Pay')) and create_date>='".$_GET['frmdate']."' and create_date<='".$_GET['todate']."' $vecstr") or die("Vehicle error:".mysql_error());
					$luggage_num=mysqli_num_rows($luggage);
					if($luggage_num==0)
					{
                    ?>
                        <tr>
                        <td colspan="11" align="center" valign="middle" >No Records.</td>
                        </tr>
                   <?php
				   }
				   else
				   {
				   
				   $i=1;
				   $cnt=0;
				   $tot_amt=0;$tot_amt1=0;$paid_amt=0;$topay_amt=0;$credit_amt=0;
				   while($luggage_row=mysqli_fetch_array($luggage))
				   {
					   $cnt++;
                            $css_set=$cnt%2;
				   ?>
						<tr>
							<td align="center"><?php echo $i."."; ?></td>
							<td align="center"><?php echo date('d-M-Y',strtotime($luggage_row['create_date']));?></td>
                            <td align="center"><?php echo $luggage_row['luggage_lrno']; ?></td>
                            <td align="left"><?php echo $luggage_row['luggage_sender'].' & '.$luggage_row['luggage_sender_phone']; ?></td>
                            <td align="left"><?php echo $luggage_row['luggage_reciever'].' & '.$luggage_row['luggage_reciever_phone']; ?></td>
							<td align="left">
                            <?php 
							$luggage_prd = "select * from power_luggage_prd where luggage_lrno = '".$luggage_row['luggage_lrno']."'";
							$luggage_prd1 = mysqli_query($objConn,$luggage_prd);
							$luggage_prd_rows = mysqli_num_rows($luggage_prd1);
							$cn=0;
							while($luggage_prd2 = mysqli_fetch_array($luggage_prd1))
							{
							   echo $luggage_prd2['luggage_prd_name']." - ".$luggage_prd2['luggage_qunty'];
							   $cn++;
							   if($cn!=$luggage_prd_rows) echo " , ";
							}
							?>
							</td>
							<td align="left">
							<?php 
							$routefrom = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where id = ".$luggage_row['luggage_from']));
							echo $routefrom1 = $routefrom[0];
							?></td>
							<td align="left"><?php 
							$routeto = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where id = ".$luggage_row['luggage_to']));
							echo $routeto1 = $routeto[0];
							?></td>
							<td align="center"><?php echo $luggage_row['luggage_doordelivery']?></td>
							<td align="right"><?php echo $tot_amt=number_format(($luggage_row['luggage_fees']+$luggage_row['luggage_charges']+$luggage_row['luggage_doorcharges']),2);?></td>
							<td align="right"><span class="center"><?php echo $luggage_row['luggage_paymethod']?></span></td>
							
						</tr>
                       <?php 
						if($luggage_row['luggage_paymethod']=='Paid')
						 $paid_amt +=$tot_amt;
						if($luggage_row['luggage_paymethod']=='To Pay')
						 $topay_amt +=$tot_amt;
						if($luggage_row['luggage_paymethod']=='Credit')
						 $credit_amt +=$tot_amt;
						$i++;} } if($luggage_num!=0)
						{?>
                        
                        <tr>
                          <td colspan="10" align="right" >&nbsp;</td>
                          <td align="right"  >&nbsp;</td>
                        </tr>
                        <tr>
                        <td colspan="10" align="right" ><strong>Paid Amount :</strong></td>
                        <td align="right"  > 
                          <strong>
                          <?php 
						 echo number_format($paid_amt,2); ?>
                          </strong></td>
                        </tr>
                         <tr>
                         <td colspan="10" align="right"><strong>Topay Amount :</strong></td>
                        <td align="right"  > 
						  <strong>
						  <?php 
						  echo number_format($topay_amt,2); 
						 ?>
						  </strong></td>
                        </tr>
                         <tr>
                         <td colspan="10" align="right"><strong>Credit Amount :</strong></td>
                        <td align="right"  >
                          <strong>
                          <?php 
						echo number_format($credit_amt,2);?>
                          </strong></td>
                        </tr>
                        <tr>
                        <td colspan="10" align="right"><strong>Total Amount :</strong></td>
                        <td align="right"  >
						  <strong><?php echo $tot_amt1 =number_format(($paid_amt +$topay_amt+$credit_amt),2);;?></strong></td>
                        </tr><?php }?>
						</tbody>
</table></div>
                        
                        <?php }}?>
					
</body>
</html>