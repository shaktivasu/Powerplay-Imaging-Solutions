<table width="100%" height="100%" border="0" cellspacing="1" bordercolor="#" bgcolor="#ffffff">
  <tr>
    <td height="17" align="center" bordercolor="#" border="1" valign="top" class="style12"></td>
  </tr>
  <tr>
    <td valign="top" align="center" bgcolor="#FFFFFF"><!--<form name="frm" id="frm" method="post" action="">-->
      
      <table width="82%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td width="92%" height="32" class="bigtitle">&nbsp;</td>
          <td width="8%" class="label_edit_txt"><div id="non-printable">&gt;&gt; <a href="sales_list.php" class="label_edit_txt">Back</a></div></td>
        </tr>
      </table>
      
        <table width="800" border="0" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
          <tr>
            <td height="16" align="left"><b>TIN NO : 33381884156</b></td>
            <td height="16" align="right" style="padding-right:5px;"><b>Bill No. :</b></td>
            <td><?php echo $bill_dtls2['bill_no']; ?></td>
          </tr>
          
          <tr>
            <td width="190" height="14" align="left"><strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CST :&nbsp;730746</strong></td>
            <td width="105" align="right" style="padding-right:5px;"><b>Date &amp; Time :</b> </td>
            <td width="105"><?php echo date("d/m/y H:i",strtotime($bill_dtls2['bill_dtetme'])); ?></td>
          </tr>
           <tr>
             <td height="14" align="left">&nbsp;</td>
             <td align="right" style="padding-right:5px;">&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
           <tr>
             <td height="14" align="left">To</td>
             <td align="right" style="padding-right:5px;">&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
           <tr>
             <td height="14" align="left">M/s.<?php echo $bill_dtls2['custmr_nme']; ?></td>
             <td align="right" style="padding-right:5px;">&nbsp;</td>
             <td>&nbsp;</td>
           </tr>
           <tr>
            <td height="14" align="left"><?php echo $bill_dtls2['custmr_mble']; ?></td>
            <td align="right" style="padding-right:5px;">&nbsp;</td>
            <td>&nbsp;</td>
          </tr>     
          <tr>
            <td height="131" colspan="3" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="3" colspan="6" align="center" bgcolor="#FFFFFF" class="dashed">&nbsp;</td>
                </tr>
                <tr>
                  <td height="30" align="center" bgcolor="#FFFFFF"><b>Product</b></td>
                  <td align="center" bgcolor="#FFFFFF"><b>Price</b></td>
                  <td height="30" align="center" bgcolor="#FFFFFF"><b>Qunty</b></td>
                  <td align="center" bgcolor="#FFFFFF"><b>Discount[%]</b></td>
                  <td align="center" bgcolor="#FFFFFF"><b>Tax[%]</b></td>
                  <td height="30" align="center" bgcolor="#FFFFFF"><b>Total</b></td>
                </tr>
                <tr>
                  <td height="3" colspan="6" align="center" bgcolor="#FFFFFF" class="dashed_1">&nbsp;</td>
                </tr>
	          <tr>
    	        <td height="19" colspan="3">&nbsp;</td>
	          </tr>                          
                <?php
				$total_price = 0;
				$prd_list = "select * from sales_prd_dtls where bill_id = '".$bid."'";
				$prd_list1 = mysqli_query($objConn,$prd_list) or die(mysql_error());
				$prd_num = mysqli_num_rows($prd_list1);
				
				if($prd_num!=0)
				{
				while($prd_list2 = mysqli_fetch_array($prd_list1))
				{
				  $total_price+=$prd_list2['tot_amt'];
				?>
                <tr>
                  <td width="143" height="37" align="center" bgcolor="#FFFFFF" style="text-transform:uppercase;">
				  <?php 
				  if($prd_list2['bill_prd_id']==0)
				  echo $prd_list2['created_dte'];
				  else
				  echo prd_nme($prd_list2['bill_prd_id']); ?></td>
                  <td width="96" align="center" bgcolor="#FFFFFF"><?php echo $prd_list2['prd_price']; ?></td>
                  <td width="71" height="37" align="center" bgcolor="#FFFFFF">
				  <?php if($prd_list2['bill_prd_id']==0) echo "-"; else echo $prd_list2['prd_qunty']; ?></td>
                  <td width="90" align="center" bgcolor="#FFFFFF" style="padding-right:10px;"><?php echo $prd_list2['prd_discount']; ?></td>
                  <td width="90" align="center" bgcolor="#FFFFFF" style="padding-right:10px;"><?php echo $prd_list2['prd_tax_per']; ?></td>
                  <td width="90" height="37" align="right" bgcolor="#FFFFFF" style="padding-right:10px;"><?php echo number_format($prd_list2['tot_amt'],2); ?></td>
                </tr>
                <?php } ?>
                <tr>
                  <td height="3" colspan="6" align="right" bgcolor="#FFFFFF">-----------------------------------------------------------------------------------------------------------------------------------------------------</td>
                </tr>
                <tr>
                  <td height="50" colspan="6" align="right" bgcolor="#FFFFFF" style="text-transform:uppercase; padding-right:10px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                      <tr>
                        <td>
                      <tr>
                        <td height="19" align="right" bgcolor="#FFFFFF" style="text-transform:uppercase; padding-right:10px;">&nbsp;</td>
                        <td height="19" align="left" bgcolor="#FFFFFF" style="text-transform:uppercase; padding-left:10px;">&nbsp;</td>
                        <td height="19" align="right" bgcolor="#FFFFFF" style="text-transform:uppercase; padding-right:10px;">&nbsp;</td>
                        <td align="right" bgcolor="#FFFFFF" style="padding-right:10px;">&nbsp;</td>
                        <td align="right" bgcolor="#FFFFFF" style="padding-right:10px;"><span style="text-transform:uppercase; padding-right:10px;">Sub Total :</span></td>
                        <td height="19" align="right" bgcolor="#FFFFFF" style="padding-right:10px;"><?php echo number_format($total_price,2); ?></td>
                      </tr>
                      <tr>
                        <td height="19" align="right" bgcolor="#FFFFFF" style="text-transform:uppercase; padding-right:10px;">&nbsp;</td>
                        <td height="19" align="left" bgcolor="#FFFFFF" style="text-transform:uppercase; padding-left:10px;">&nbsp;</td>
                        <td height="19" align="right" bgcolor="#FFFFFF" style="text-transform:uppercase; padding-right:10px;">&nbsp;</td>
                        <td align="right" bgcolor="#FFFFFF" style="padding-right:10px;">&nbsp;</td>
                        <td align="right" bgcolor="#FFFFFF" style="padding-right:10px;"><span style="text-transform:uppercase; padding-right:10px;">[+] Transport Charges :</span></td>
                        <td height="19" align="right" bgcolor="#FFFFFF" style="padding-right:10px;"><?php 
			  $disco= "select * from sales_dtls where bill_id= '".$bid."'";
			  $disco1=mysqli_fetch_array(mysqli_query($objConn,$disco));
			  echo  $tot_bill_trans = number_format($disco1['trans_charge'],2); ?></td>
                      </tr>
                      <tr>
                        <td height="19" align="right" bgcolor="#FFFFFF" style="text-transform:uppercase; padding-right:10px;">&nbsp;</td>
                        <td height="19" align="left" bgcolor="#FFFFFF" style="text-transform:uppercase; padding-left:10px;">&nbsp;</td>
                        <td height="19" align="right" bgcolor="#FFFFFF" style="text-transform:uppercase; padding-right:10px;">&nbsp;</td>
                        <td align="right" bgcolor="#FFFFFF" style="padding-right:10px;">&nbsp;</td>
                        <td align="right" bgcolor="#FFFFFF" style="padding-right:10px;"><span style="text-transform:uppercase; padding-right:10px;">[-] Discount price :</span></td>
                        <td height="19" align="right" bgcolor="#FFFFFF" style="padding-right:10px;"><?php echo $tot_bill_dis = number_format($disco1['bill_dscnt'],2); ?></td>
                      </tr>
                      <tr>
                        <td height="19" align="right" bgcolor="#FFFFFF" style="text-transform:uppercase; padding-right:10px;">&nbsp;</td>
                        <td height="19" align="left" bgcolor="#FFFFFF" style="text-transform:uppercase; padding-left:10px;">&nbsp;</td>
                        <td height="19" align="right" bgcolor="#FFFFFF" style="text-transform:uppercase; padding-right:10px;">&nbsp;</td>
                        <td align="right" bgcolor="#FFFFFF" style="padding-right:10px;">&nbsp;</td>
                        <td align="right" bgcolor="#FFFFFF" style="padding-right:10px;">Total :</td>
                        <td height="19" align="right" bgcolor="#FFFFFF" style="padding-right:10px;"><?php echo $tot_bill =number_format($total_price-$disco1['bill_dscnt']+$disco1['trans_charge'],2); ?></td>
                      </tr>
                      <?php if($disco1['bill_type']=='credit')
					  {?>
                      <tr>
                        <td height="19" align="right" bgcolor="#FFFFFF" style="text-transform:uppercase; padding-right:10px;">&nbsp;</td>
                        <td height="19" align="left" bgcolor="#FFFFFF" style="text-transform:uppercase; padding-left:10px;">&nbsp;</td>
                        <td height="19" align="right" bgcolor="#FFFFFF" style="text-transform:uppercase; padding-right:10px;">&nbsp;</td>
                        <td align="right" bgcolor="#FFFFFF" style="padding-right:10px;">&nbsp;</td>
                        <td align="right" bgcolor="#FFFFFF" style="padding-right:10px;">Balance Amount :</td>
                        <td height="19" align="right" bgcolor="#FFFFFF" style="padding-right:10px;"><?php echo number_format($disco1['bill_balance'],2)?>
						</td>
                      </tr>
                      <?php }?>
                    </table></td>
                </tr>
                <?php  } else { ?>
                <tr>
                  <td height="20" colspan="6" align="center" bgcolor="#FFFFFF" class="label_txt">No Products..</td>
                </tr>
                <?php } ?>
              </table></td>
          </tr>
         
        </table>