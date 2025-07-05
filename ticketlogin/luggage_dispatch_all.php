<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
for($i=0;$i<count($_POST['del']);$i++)
				{
					
					if(isset($_POST['del'][$i]))
					{		
						
						//echo "update power_ticket set luggage_status='Dispatched' , luggage_to = '".$_POST['route_to']."',luggage_vehicle = '".$_POST['vehicle']."' where id=".$_POST['del'][$i];
						$qry = mysqli_query($objConn,"update power_ticket set luggage_status='Dispatched'  where id=".$_POST['del'][$i]);
					}
				}
				//header("location:luggage_print.php?vehicle=".$_POST['vehicle']."&frmdate");
			//header("location:luggage_delivery.php?msg=inwrd&frmdate=".$_POST['frmdate']."&todate=".$_POST['todate']);
			header("location:luggage.php");
			
?>
<?php /*?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width"/>
<title>:: Welcome to Power Play Imaging Solutions  - Admin Panel ::</title>
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

		<div id="non-printable"><a href="luggage.php">Back to Booking</a></div>			
                  
					
                 
						
                      				<div class="page">
                                   <?php
								    $test=$_POST['location'];
					if ($test){
	 foreach ($test as $t){
		echo $rounme = "select route from power_route where id = ".$t;
		 $rounme1 = mysqli_query($objConn,$rounme);
		 $rounme2 = mysqli_fetch_row($rounme1);
		 echo '<h6 class="inline_code">'.$rounme2[0].'</h6>';?> 
                                    
                                    
                        <h6>luggage Booking : Vehicle Number -
						[ <?php  $vehicl = mysqli_query($objConn,"select * from power_vehicle where id=".$_POST['vehicle']);
										$vehicl1 = mysqli_fetch_array($vehicl);
										
											echo $vehicl1['vehicle'];
										?> ] </h6>
					
                        <strong>Driver Name & Contact Details : <?php echo $_POST['driver_name']?></strong><br><br>
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
//echo count($_POST['del']);
 
				   $cnt=0;
				   $sno=0;
				   $tot_amt=0;$tot_amt1=0;$paid_amt=0;$topay_amt=0;$credit_amt=0;
				  
				    for($i=0;$i<count($_POST['del']);$i++)
				{
					
					if(isset($_POST['del'][$i]))
					{	
				    $routewise = "select * from power_ticket where id= ".$_POST['del'][$i]." ";
				  $routewise1 = mysqli_query($objConn,$routewise);
				 
				 
					$luggage_row = mysqli_fetch_array($routewise1);
					
				  
					   $cnt++;$sno++;
                            $css_set=$cnt%2;
				   ?>
						<tr>
							<td align="center"><?php echo $sno."."; ?></td>
							<td align="center"><?php echo date('d-M-Y',strtotime($luggage_row['create_date']));?></td>
                            <td align="center"><?php echo $luggage_row['luggage_lrno'];
							if($luggage_row['luggage_ref']!=0)
							{
								echo "<br><font color=red>( Ref. ".$luggage_row['luggage_ref'].")</font>";
							} ?></td>
                            <td align="left"><?php echo $luggage_row['luggage_sender'].' & '.$luggage_row['luggage_sender_phone']; ?></td>
                            <td align="left"><?php echo $luggage_row['luggage_reciever'].' & '.$luggage_row['luggage_reciever_phone']; ?></td>
							<td align="left">
                            <?php 
							$luggage_prd = "select * from power_ticket_prd where luggage_lrno = '".$luggage_row['luggage_lrno']."'";
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
							<td align="right"><?php echo $tot_amt=($luggage_row['luggage_fees']+$luggage_row['luggage_charges']+$luggage_row['luggage_doorcharges']);?></td>
							<td align="right"><span class="center"><?php echo $luggage_row['luggage_paymethod']; ?></span></td>
							
						</tr>
                       <?php 
						if($luggage_row['luggage_paymethod']=='Paid')
						 $paid_amt +=$tot_amt;
						if($luggage_row['luggage_paymethod']=='To Pay')
						 $topay_amt +=$tot_amt;
						if($luggage_row['luggage_paymethod']=='Credit')
						 $credit_amt +=$tot_amt;
						} }  if($luggage_num!=0)
						?>
                        
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
                        </tr>
						</tbody>
</table></div>
                        
                        <?php }
					}?>
					
</body>
</html><?php */?>