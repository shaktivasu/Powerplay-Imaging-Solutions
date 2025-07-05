<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
 $bill_no = $_GET['lr'];
//check bill no already exist
$sqlstr = "select * from  power_ticket where luggage_lrno = '".$bill_no."'";
$res_get = mysqli_query($objConn,$sqlstr) or die(mysql_error());
$res = mysqli_fetch_array($res_get); 
?>
<style type="text/css">

    #printable { display: none; }

    @media print
    {
		body {font-size: 12pt;}
		table, table td {
		border: #000 solid 2px;
		padding: 0px;
		border-spacing: 0px;}
    	#non-printable { display: none; }
    	#printable { display: block; }
    }
    
        @media print {
            
            .page-break-before {
                page-break-before: always;
            }
           
            .page-break-after {
                page-break-after: always;
            }
        }
    </style>
<html><body onLoad="window.print();openWindow(); " style="alignment-adjust:central; font-weight:bold;">
<table style="margin-left:0px; margin-top:0px;" >
<tr><td align="right"><div id="non-printable"><a href="print1.php?lr=<?php echo $bill_no;?>">Lable Printing</a></div></div><div id="non-printable"><a href="luggage_new.php">Back to Booking</a></div></div></td></tr>
<tr>
<td>
 <div class="page-break-after">
<table width="100%"  border="1" cellspacing="0" cellpadding="0" style="margin-left:0px; margin-top:0px;">
 
  <tr>
    <td width="50%" align="center"><img src="images/kmp.jpg" style="width:100%"></td>
    
    <td width="50%"  align="center"><h1><?php echo $res['luggage_paymethod']?></h1><h2>LR No :</h2>
      <?php //
		echo "<center><img alt='KMP' src='barcode.php?codetype=Code128&size=50&text=".$res['luggage_lrno']."&print=true' style='width:100%'/></center>";
		//echo $res['luggage_lrno']?></td>
  </tr>
  
 <tr><td colspan="4">
 <table width="100%" cellspacing="0" cellpadding="0"  style=" border-right:0; border-left:0; border-top:0; border-bottom:0;">
 <tr><td><strong>Date :<?php echo date('d-M-Y',strtotime($res['create_date']));?>
	<?php echo date('g:i a',strtotime($res['luggage_time']));?></td>
	<td><span style="font-size:13px; font-weight:bold;"><strong>GST No: 33AAUFK1187A1ZF<strong></span></td>
	<td><span style="font-size:12px; font-weight:bold;">SAC CODE : 996511</span></td>
	<td><span style="font-size:12px; font-weight:bold;">TAXABLE : Tax Payable Under RCM</span></td>
	</tr>
 </table>
 </td></tr>
 
  <tr>
    <td colspan="3"><table width="100%" border="1" cellspacing="0" cellpadding="0"  style=" border-right:0; border-left:0; border-top:0; border-bottom:0;">
    
    <tr>
      <td width="18%"  align="left" valign="top"  style=" border-right:0; border-left:0; border-top:0; border-bottom:1;">&nbsp;<strong>Booking Office :</strong></td>
        
        <td width="32%"  style=" border-right:0; border-left:0; border-top:0; border-bottom:0;"><strong><?php 
		
	$fromname = mysqli_fetch_row(mysqli_query($objConn,"select route,route_address from power_route where id = ".$res['luggage_from']));echo ucfirst($fromname[0]);?><br><?php echo ucfirst(wordwrap($fromname[1],35,"<br>\n"));?></strong></td>
        <td width="18%"  align="left" valign="top"  style=" border-right:0;border-top:0; border-bottom:0;">&nbsp;<strong>Delivery Office :</strong></td>
        <td width="32%" style=" border-right:0; border-left:0; border-top:0; border-bottom:0;"><strong><?php  $toname = mysqli_fetch_row(mysqli_query($objConn,"select route,route_address from power_route where id = ".$res['luggage_to']));
	     echo ucfirst($toname[0]);?><br><?php echo ucfirst(wordwrap($toname[1],35,"<br>\n"));?>
       </strong></td>
      </tr>
	  <tr>
    
    
    <tr>
      <td width="18%"  height="0px" align="left" valign="top"  style="border-color:#000; border-top:1; border-left:0; border-right:0; border-bottom:0;"></td>
        
        <td width="32%"  style="border-color:#000; border-top:1; border-left:0; border-right:0; border-bottom:0;"></td>
        <td width="18%"  style="border-color:#000; border-top:1; border-left:0; border-right:0; border-bottom:0;"></td>
        <td width="32%" style="border-color:#000; border-top:1; border-left:0; border-right:0; border-bottom:0;"></td>
      </tr>
    <tr>
      <td width="18%"  align="left" valign="top"  style=" border-right:0; border-left:0; border-top:0; border-bottom:0;font-size:20px;">&nbsp;<strong>From :</strong></td>
        
        <td width="32%"  style=" border-right:0; border-left:0; border-top:0; border-bottom:0;font-size:20px;"><strong><?php 
		if($res['luggage_paymethod']!='Credit'){echo ucfirst($res['luggage_sender']);} else { 
		if($_SESSION['route_name']==$res['luggage_ref'])
		echo $res['luggage_sender'];
		else
		echo $res['luggage_sender'];
	    echo '</strong>';
		if($res['luggage_ref']!=0)echo $res['luggage_ref'];}?><br>
       <strong><?php echo $res['luggage_sender_phone']?>
       <br>
       </strong></td>
        <td width="18%"  align="left" valign="top"  style=" border-right:0;border-top:0; border-bottom:0;font-size:20px;">&nbsp;<strong>To :</strong></td>
        <td width="32%" style=" border-right:0; border-left:0; border-top:0; border-bottom:0;font-size:20px;"><strong><?php echo ucfirst($res['luggage_reciever'])?></strong><br>
       <strong><?php if($res['luggage_paymethod']!='Credit') echo $res['luggage_reciever_phone']?>&nbsp;</strong>
       <br>
      
       </td>
      </tr>
      
      
     
    
    </table></td>
  </tr>
 
  <tr>
    <td colspan="3" style="border-color:#000; border-top:0; border-left:0; border-right:0; border-bottom:0;"><table width="100%" border="1" cellpadding="0" cellspacing="0" style="border-color:#000; border-top:0; border-left:0; border-right:0; border-bottom:0;" align="center">
      <tr>
        <td width="30%" align="center"><strong>Article Name</strong></td>
        <td width="10%" align="center"><strong>Qty</strong></td>
       
        <td width="10%" align="center"><strong>Unit Price</strong></td>
        
       
        <td width="20%" align="right"><strong>Total&nbsp;</strong></td>
      </tr>
       <?php $sqlstr1 = "select * from  power_ticket_prd where luggage_lrno = '".$bill_no."'";
$res1 = mysqli_query($objConn,$sqlstr1) or die(mysql_error());
$total = 0;
$subtotal = 0;
while($res2 = mysqli_fetch_array($res1))
{
?>
  <tr>
    <td align="center"><strong><?php echo $res2['luggage_prd_name']?></strong></td>
    <td align="center"><strong><?php echo $qty = $res2['luggage_qunty']?></strong></td>
    
    <td align="center"><strong><?php //if($res['luggage_paymethod']!='Credit'){
		echo number_format($res2['unit_price'],2);//} else echo '-';?></strong></td>
   
   
    
    <td align="right"><strong><?php  //if($res['luggage_paymethod']!='Credit'){
		$total = $res2['luggage_price'] + $res2['luggage_charge'] + $res2['luggage_uncharge'];
	echo number_format($total,2);//} else echo '-';
	?>&nbsp;</strong></td>
  </tr>
 <?php $subtotal += $total;}?>
    </table></td>
  </tr>
<tr> 
    <td colspan="3"   align="right" style="border-bottom:none;"><strong> Sub Total    :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo number_format($subtotal,2)?></strong>&nbsp;</td>
    </tr>
 
  <tr> 
    <td colspan="3"   align="right" style="border-bottom:none;font-size:25px;"> <strong>Loading Charges    :&nbsp;&nbsp;&nbsp; <?php 
	$loading = $subtotal*10/100;
	echo number_format($loading,2)?></strong>&nbsp;</td>
    </tr>
	<tr> 
    <td colspan="3"   align="right" style="border-bottom:none;font-size:25px;"><strong> Unloading Charges    :&nbsp; <?php 
	$unloading = $subtotal*5/100;
	echo number_format($unloading,2)?></strong>&nbsp;</td>
    </tr>
 <tr> 
    <td colspan="3"   align="right" style="border-bottom:none;font-size:25px;"> <strong>SGST (2.5%)   :&nbsp; <?php echo number_format(($subtotal+$loading+$unloading)*2.5/100,2)?></strong>&nbsp;</td>
    </tr>
	<tr> 
    <td colspan="3"   align="right" style="border-bottom:none;font-size:25px;"> <strong>CGST (2.5%)   :&nbsp; <?php echo number_format(($subtotal+$loading+$unloading)*2.5/100,2)?></strong>&nbsp;</td>
    </tr>
  <?php if($res['luggage_doorcharges']>0) {?>
  <tr> 
    <td colspan="3"  align="right" style="border-bottom:none;border-top:none;font-size:25px;"><strong>Door Delivery    :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $door_chrg = number_format($res['luggage_doorcharges'],2)?></strong>&nbsp;</td>
    </tr>
  <?php }?>
  
   <?php if($res['luggage_doorcollections']>0) {?>
  <tr>
    <td colspan="3"  align="right" style="border-bottom:none;border-top:none;"><strong>Door Collection Charges    :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $door_col = number_format($res['luggage_doorcollections'],2)?></strong>&nbsp;</td>
    </tr>
  <?php }?>
  
   <?php //if($res['luggage_lrcharges']>0) {?>
 
  <?php //}?>
 
   
     <tr  style="border-color:#000; border-top:0; border-left:0; border-right:0; border-bottom:0;">
    
    <td colspan="3"    align="right" valign="top" style="font-size:25px;"><strong>Grand Total&nbsp;</strong><?php /*?>(<strong><?php echo $res['luggage_paymethod']?></strong>) <?php */?>   :&nbsp; <strong>
      <?php 
	  $subtotal = $subtotal + $res['luggage_charges']+$res['unloading_charges'];
	  $tax = $subtotal * 5/100;
	$gradtotal = $subtotal+$res['luggage_doorcharges']+$res['luggage_doorcollections']+$res['luggage_lrcharges']+$res['luggage_odacharges']+$tax;
	echo $gradtotal = number_format(ceil($gradtotal),2);?></strong>&nbsp;</td>
    </tr>
  <tr>
    <td  align="center" colspan="3" style="font-size:25px;"><!--KMP SPEED PARCEL SERVICE,--><strong>Near by SNR College Bend, Nava India Road,, 
Coimbatore.
Mobile: 90470 44485 / 97519 44485.</strong></td>
    </tr>
</table>
</div>
<script>
let openedWindow;


// openedWindow = window.open("http://whatsappsms.creativepoint.in/api/sendText?token=65265e6372692504ac177d1b&phone=919698403555&message=Thanks for Booking. Your Lr No is <?php echo $bill_no?>. Booking Charges : Rs.  <?php echo $gradtotal?> \n KMP SPEED PARCEL SERVICE.");
//  setTimeout("openedWindow.close()",300);



</script>
 
<?php 
/*
for($jj=1; $jj<=$qty; $jj++){ ?>
<div class="page-break-after">


<table width="100%"  border="1" cellspacing="0" cellpadding="0" style="margin-left:0px; margin-top:0px;">
 
  <tr>
    <td width="33%" align="center"><img src="images/kmp.jpg" style="width:100%"></td>
    
    <td width="33%"  align="center"><strong><?php echo $res['luggage_paymethod']?>&nbsp;LR No :</strong><br>
      <?php //
		echo "<center><img alt='KMP' src='barcode.php?codetype=Code39&size=100&text=".$res['luggage_lrno']."&print=true'/></center>";
		?></td>
  </tr>
  
  
 
  <tr>
    <td colspan="2"><table width="100%" border="1" cellspacing="0" cellpadding="0"  style=" border-right:0; border-left:0; border-top:0; border-bottom:0;">
    
    <tr style="font-size:25px;">
      <td width="15%"  align="left" valign="top"  style=" border-right:0; border-left:0; border-top:0; border-bottom:1;" ><strong>&nbsp;From :</strong></td>
        
        <td width="35%"  style=" border-right:0; border-left:0; border-top:0; border-bottom:0;"><strong><?php 
		
	$fromname = mysqli_fetch_row(mysqli_query($objConn,"select route,route_phone from power_route where id = ".$res['luggage_from']));echo ucfirst($fromname[0]);?></strong><br><?php echo $fromname[1];?></strong></td>      
        <td width="15%"  align="left" valign="top"  style=" border-right:0;border-top:0; border-bottom:1;"><strong>&nbsp;To:</strong></td>
        <td width="35%" style=" border-right:0; border-left:0; border-top:0; border-bottom:0;"><strong><?php  $toname = mysqli_fetch_row(mysqli_query($objConn,"select route,route_phone from power_route where id = ".$res['luggage_to']));
	     echo ucfirst($toname[0]);?></strong><br><?php echo $toname[1];?></strong>
       </td>
      </tr>
	 <tr style="font-size:25px;">
      <td width="15%"  align="left" valign="top"  style=" border-right:0; border-left:0; border-top:0; border-bottom:0;">&nbsp;<strong>Consignor :</strong></td>
        
        <td width="35%"  style=" border-right:0; border-left:0; border-top:0; border-bottom:0;"><strong><?php 
		if($res['luggage_paymethod']!='Credit'){echo ucfirst($res['luggage_sender']);} else { 
		if($_SESSION['route_name']==$res['luggage_ref'])
		echo $res['luggage_sender'];
		else
		echo $res['luggage_sender'];
	    echo '</strong>';
		if($res['luggage_ref']!=0)echo $res['luggage_ref'];}?><br>
       <strong><?php echo $res['luggage_sender_phone']?>
       <br>
       </strong></td>
        <td width="15%"  align="left" valign="top"  style=" border-right:0;border-top:0; border-bottom:0;">&nbsp;<strong>Consignee:</strong></td>
        <td width="35%" style=" border-right:0; border-left:0; border-top:0; border-bottom:0;"><strong><?php echo ucfirst($res['luggage_reciever'])?></strong><br>
       <strong><?php if($res['luggage_paymethod']!='Credit') echo $res['luggage_reciever_phone']?>&nbsp;</strong>
       <br>
      
       </td>
      </tr>
    
    </table></td>
  </tr>
 
  <tr>
    <td  style="border-color:#000; border-top:0; border-left:0; border-right:0; border-bottom:0;" colspan="2">
	<table width="100%" border="1" cellpadding="0" cellspacing="0" style="border-color:#000; border-top:0; border-left:0; border-right:0; border-bottom:0;" align="center">
      <tr>
        <td  align="center" style="font-size:45px;"><strong>No. of Article</strong></td>
        <td  align="center" style="font-size:45px;"><strong>Article No.</strong></td>
       
      
      </tr>
       
  <tr >
    
    <td align="center" style="font-size:60px;"><strong><?php echo $qty?></strong></td>
    
    <td align="center" style="font-size:60px;"><strong><?php echo $jj;?>/<?php echo $qty;?></strong></td>
   
   
    
    
  </tr>
 
    </table></td>
  </tr>

  <tr style="font-size:25px;">
    <td  align="center" colspan="2" style="font-size:25px;"><strong><!--KMP SPEED PARCEL SERVICE,Near by SNR College Bend, Nava India Road,, 
Coimbatore.
Mobile: 90470 44485 / 97519 44485.-->  Customer Care No. 90470 44485 / 97519 44485</strong></td>
    </tr>
</table>
</div>
<?php 


}*/?>
</tr></td></table>
</body></html>