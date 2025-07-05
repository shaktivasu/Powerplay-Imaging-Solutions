<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
 $bill_no = $_GET['lr'];
//check bill no already exist
$sqlstr = "select * from  power_luggage where luggage_lrno = '".$bill_no."'";
$res_get = mysqli_query($objConn,$sqlstr) or die(mysql_error());
$res = mysqli_fetch_array($res_get); 
?>
<html><body onLoad="window.print(); window.close();">
<table width="650" border="0">
  <tr>
    <td colspan="5" align="center"><strong>KMP Travels,</strong> <br>
311-B, Bharathiyar Road, <br>
Near R.V. Hotel, <br>
Coimbatore -641012.<br>
Mobile: 9943544485 / 9047044485. </td>
  </tr>
  <tr>
    <td align="right" valign="top"><strong>LR No :</strong></td>
    <td><?php echo $res['luggage_lrno']?></td>
    <td width="229" align="right"><strong>Date :</strong></td>
    <td colspan="2" ><?php echo date('d-M-Y',strtotime($res['create_date']));?></td>
  </tr>
  <tr>
    <td width="153" align="right" valign="top"><strong>Consigner From :</strong></td>
    <td width="95"><?php echo $res['luggage_sender']?><br>
      <?php echo $res['luggage_sender_phone']?></td>
      <td align="right" valign="top"><strong>Consigner To :</strong></td>
    <td colspan="2"><?php echo $res['luggage_reciever']?><br>
<?php echo $res['luggage_reciever_phone']?></td>
  </tr>
 
  <tr>
    <td align="right"><strong>From :</strong></td>
    <td><?php $fromname = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where id = ".$res['luggage_from']));
	echo $fromname[0];?></td>
    <td align="right"><strong>To :</strong></td>
    <td colspan="2"><?php $toname = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where id = ".$res['luggage_to']));
	echo $toname[0];?></td>
  </tr>
  <tr>
    <td><strong>Particulars:</strong></td>
    <td>&nbsp;</td>
    <td align="right"><strong>Vec.No :</strong></td>
    <td colspan="2"><?php $vecname = mysqli_fetch_row(mysqli_query($objConn,"select vehicle from power_vehicle where id = ".$res['luggage_vehicle']));
	echo $vecname[0];?></td>
  </tr>
  <tr>
    <td colspan="5"><table width="100%" border="0" align="center">
      <tr>
        <td width="29%" align="center"><strong>Item Type</strong></td>
        <td width="14%" align="center"><strong>Qty</strong></td>
        <td width="16%" align="center"><strong>Price</strong></td>
        <td width="24%" align="center"><strong>Loading</strong></td>
        <td width="17%" align="right"><strong>Total</strong></td>
      </tr>
       <?php $sqlstr1 = "select * from  power_luggage_prd where luggage_lrno = '".$bill_no."'";
$res1 = mysqli_query($objConn,$sqlstr1) or die(mysql_error());
$total = 0;
$subtotal = 0;
while($res2 = mysqli_fetch_array($res1))
{
?>
  <tr>
    <td align="center"><?php echo $res2['luggage_prd_name']?></td>
    <td align="center"><?php echo $res2['luggage_qunty']?></td>
    <td align="center"><?php echo number_format($res2['luggage_price'],2)?></td>
    <td align="center"><?php echo number_format($res2['luggage_charge'],2)?></td>
    <td align="right"><?php echo $total = number_format($res2['luggage_price'] + $res2['luggage_charge'],2);?></td>
  </tr>
 <?php $subtotal += $total;}?>
    </table></td>
  </tr>

  
  
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2" align="right">Sub Total</td>
    <td width="73" align="right"><?php echo number_format($subtotal,2)?></td>
  </tr>
  <?php if($res['luggage_doordelivery']=='Yes') {?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2" align="right">Door Delivery</td>
    <td align="right"><?php echo number_format($res['luggage_doorcharges'],2)?></td>
  </tr>
  <?php }?>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2" align="right"><strong>Grand Total&nbsp;</strong>(<?php echo $res['luggage_paymethod']?>)</td>
    <td align="right"><strong><?php echo $gradtotal = number_format($subtotal+$res['luggage_doorcharges'],2);?></strong></td>
  </tr>
</table>
<?php //header("location:luggage_new.php");?>
</body></html>