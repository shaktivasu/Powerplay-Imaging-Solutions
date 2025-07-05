<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
 $bill_no = $_GET['lr'];
//check bill no already exist
$sqlstr = "select * from  power_ticket where luggage_lrno = '".$bill_no."'";
$res_get = mysqli_query($objConn,$sqlstr) or die(mysql_error());
$res = mysqli_fetch_array($res_get); 
$luggage_prd = "select sum(luggage_qunty) from power_ticket_prd where luggage_lrno = '".$bill_no."'";
							$luggage_prd1 = mysqli_query($objConn,$luggage_prd);
						    $luggage_prd2 = mysqli_fetch_row($luggage_prd1);
						    $qty =$luggage_prd2[0];
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
<?php /*



<style type="text/css">

    #printable { display: none; }

    @media print
    {
		body {font-size: 12pt;}
    	#non-printable { display: none; }
    	#printable { display: block; }
    }
    </style>
<html><body  style="alignment-adjust:central;"  onLoad="window.print();">
<table >
<tr><td align="right"><div id="non-printable"><a href="print.php?lr=<?php echo $_REQUEST['lr']?>">Normal Printing</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="luggage_new.php">Back to Booking</a></div></td></tr>
<tr>
<td>

<table width="100%"  border="1" cellspacing="0" cellpadding="0">
 
  <tr>
    <td width="33%" align="center"><img src="images/kmp.jpg" style="width:100%"></td>
    <td width="33%"  align="center"><strong>Date :<?php echo date('d-M-Y',strtotime($res['create_date']));?>
	<?php echo date('g:i a',strtotime($res['luggage_time']));?></strong><br><br>
    <strong> <?php  if($res['luggage_invoice']!='') echo 'Customer Invoice No. '.$res['luggage_invoice']?></strong>
	
	<span style="font-size:13px; font-weight:bold;"><strong>GST No: 33AAUFK1187A1ZF<strong></span>
	<br><span style="font-size:12px; font-weight:bold;">SAC CODE : 996511</span>
	<br><span style="font-size:12px; font-weight:bold;">TAXABLE : Tax Payable Under RCM</span>
    </td>
    <td width="33%"  align="center"><strong><?php echo $res['luggage_paymethod']?>&nbsp;LR No :</strong><br>
      <?php //
		echo "<center><img alt='KMP' src='barcode.php?codetype=Code39&size=50&text=".$res['luggage_lrno']."&print=true'/></center>";
		//echo $res['luggage_lrno']?></td>
  </tr>
  
  
 
  <tr>
    <td colspan="3"><table width="100%" border="1" cellspacing="0" cellpadding="0"  style=" border-right:0; border-left:0; border-top:0; border-bottom:0;">
    
    <tr>
      <td width="15%"  align="left" valign="top"  style=" border-right:0; border-left:0; border-top:0; border-bottom:1;">&nbsp;From :</td>
        
        <td width="35%"  style=" border-right:0; border-left:0; border-top:0; border-bottom:0;"><strong><?php 
		
	$fromname = mysqli_fetch_row(mysqli_query($objConn,"select route,route_phone from power_route where id = ".$res['luggage_from']));echo ucfirst($fromname[0]);?></strong><br><?php echo $fromname[1];?></td>
        <td width="15%"  align="left" valign="top"  style=" border-right:0;border-top:0; border-bottom:1;">&nbsp;To:</td>
        <td width="35%" style=" border-right:0; border-left:0; border-top:0; border-bottom:0;"><strong><?php  $toname = mysqli_fetch_row(mysqli_query($objConn,"select route,route_phone from power_route where id = ".$res['luggage_to']));
	     echo ucfirst($toname[0]);?></strong><br><?php echo $toname[1];?>
       </td>
      </tr>
	  <tr>
    
    
    
   
      
      
     
    
     
 
     
    
 
    </table></td>
  </tr>
  
  <tr>
    <td colspan="3" style="border-color:#000; border-top:0; border-left:0; border-right:0; border-bottom:0;"><table width="100%" border="1" cellpadding="0" cellspacing="0" style="border-color:#000; border-top:0; border-left:0; border-right:0; border-bottom:0;" align="center">
      <tr>
        <td width="30%" align="center"><strong>No. of Article</strong></td>
        <td width="10%" align="center"><strong>Article No.</strong></td>
       
      
      </tr>
       <?php $sqlstr1 = "select * from  power_ticket_prd where luggage_lrno = '".$bill_no."'";
$res1 = mysqli_query($objConn,$sqlstr1) or die(mysql_error());
$i = 1;
$subtotal = 0;
while($res2 = mysqli_fetch_array($res1))
{
?>
  <tr>
    
    <td align="center"><?php echo $res2['luggage_qunty']?></td>
    
    <td align="center"><?php echo $i;?></td>
   
   
    
    
  </tr>
 <?php $i++; }?>
    </table></td>
  </tr>

 
  
  
  
  
  
   
 
  <?php //}?>
 
   
    
  <tr>
    <td  align="center" colspan="3"><!--KMP SPEED PARCEL SERVICE,-->Near by SNR College Bend, Nava India Road,, 
Coimbatore.
Mobile: 90470 44485 / 97519 44485. <br>www.kmpspeedparcelservice.com</td>
    </tr>
</table>



</td>

</tr>
</table>*/?>

<?php 

for($jj=1; $jj<=$qty; $jj++){ ?>
<div class="page-break-after">


<table width="100%" height="100%"  border="1" cellspacing="0" cellpadding="0" style="margin-left:0px; margin-top:0px;">
 <tr><td align="right" colspan="2"><div id="non-printable"><a href="print.php?lr=<?php echo $bill_no;?>">Normal Printing</a></div></div><div id="non-printable"><a href="luggage_new.php">Back to Booking</a></div></div></td></tr>
<tr>
  <tr>
    <td width="50%" align="center"><img src="images/kmp.jpg" style="width:100%"></td>
    
    <td width="50%"  align="center"><h1><?php echo $res['luggage_paymethod']?></h1><h2>LR No :</h2>
      <?php //
		echo "<center><img alt='KMP' src='barcode.php?codetype=Code128&size=50&text=".$res['luggage_lrno']."&print=true' style='width:100%'/></center>";
		//echo "<center><img src='/barcode.php?text=testing' alt='testing' />";
		//echo $res['luggage_lrno']?></td>
  </tr>
  
  
 
  <tr>
    <td colspan="2"><table width="100%" border="1" cellspacing="0" cellpadding="0"  >
    
    <tr style="font-size:25px;">
      <td width="15%"  align="left" valign="top"  style=" border-right:0; border-left:0; border-top:0; border-bottom:1;" ><strong>&nbsp;Booking Office :</strong></td>
        
        <td width="35%"  style=" border-right:0; border-left:0; border-top:0; border-bottom:0;"><strong><?php 
		
	$fromname = mysqli_fetch_row(mysqli_query($objConn,"select route,route_phone from power_route where id = ".$res['luggage_from']));echo ucfirst($fromname[0]);?></strong><br><?php echo $fromname[1];?></strong></td>      
        <td width="15%"  align="left" valign="top"  style=" border-right:0;border-top:0; border-bottom:1;"><strong>&nbsp;Delivery Office :</strong></td>
        <td width="35%" style=" border-right:0; border-left:0; border-top:0; border-bottom:0;"><strong><?php  $toname = mysqli_fetch_row(mysqli_query($objConn,"select route,route_phone from power_route where id = ".$res['luggage_to']));
	     echo ucfirst($toname[0]);?></strong><br><?php echo $toname[1];?></strong>
       </td>
      </tr>
	 <tr style="font-size:25px;">
      <td width="15%"  height="30px;"  align="left" valign="top" style=" border-right:0;  border-bottom:0;" >&nbsp;<strong>From :</strong></td>
        
        <td width="35%" style=" border-left:0;  border-bottom:0;" ><strong><?php 
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
        <td width="15%" height="30px;"  align="left" valign="top"  style=" border-right:0;  border-bottom:0;">&nbsp;<strong>To :</strong></td>
        <td width="35%" style=" border-left:0;  border-bottom:0;"><strong><?php echo ucfirst($res['luggage_reciever'])?></strong><br>
       <strong><?php if($res['luggage_paymethod']!='Credit') echo $res['luggage_reciever_phone']?>&nbsp;</strong>
       <br>
      
       </td>
      </tr>
    
    </table></td>
  </tr>
 
  <tr>
    <td  style="border-color:#000;" colspan="2">
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


}?>

</body></html>