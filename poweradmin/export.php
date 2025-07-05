<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
$frmdate = date("Y-m-d");
$todate = date("Y-m-d");
if(isset($_REQUEST['frmdate']))
{
$frmdate = $_REQUEST['frmdate'];
}
if(isset($_REQUEST['todate']))
{
$todate = $_REQUEST['todate'];
}


?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="viewport" content="width=device-width"/>
<title>:: Welcome to Power Play Imaging Solutions   - Admin Panel ::</title>

</head>
<body id="theme-default" class="full_block">

            	
                
    
                
                
                
                <h2>Collection Details as on <?php echo date('d-m-Y h:i:sa')?></h2><br>
              <table class="display"><thead>
                
               </thead>
                
                <?php 
	$vecstr = '';
	$i=1;
	

	//if($_POST['Submit'] || (isset($_REQUEST['frmdate']) && isset($_REQUEST['todate'])))
//{
	
	?>
	
	<tr  style="color:red; font-size:16px;">
				<th align="center" >S. No</th>
				<th align="left" >Agent</th>
				<th align="left" >Phone no.</th>
                <!-- <th align="center" ><strong>Total Sales Amount </strong></th>
                
                <th align="center" colspan="9"><strong>Paid Commision</strong></th>
                
				 <th align="center" colspan="9"><strong>Topay  Commision</strong></th>-->
                 <th align="right"><strong>Collection Amount</strong></th><th align="center"><strong>&nbsp;</strong></th>
				 <th align="right"><strong>Recieved Amount</strong></th><th align="center"><strong>&nbsp;</strong></th>
				 <th align="right" ><strong>Balance Amount</strong></th><th align="center"><strong>&nbsp;</strong></th>
                </tr><?php
				
				  $i=1;
				   $cnt=0;$sno=1;
				   $tot_amt=0;$tot_amt1=0;$paid_amt=0;$topay_amt=0;$credit_amt=0;
					$ro ="select id,route,route_phone from power_route where route_status=0 order by route";
					$ro1 = mysqli_query($objConn,$ro);
					while($ro2 = mysqli_fetch_row($ro1)){
					
					//$luggage=mysqli_query($objConn,"select create_date,luggage_to,sum(luggage_fees),sum(luggage_charges),sum(unloading_charges) from power_luggage where luggage_paymethod<>'Expenses' group by luggage_to  order by create_date") or die("Vehicle error:".mysqli_error());
					$luggage=mysqli_query($objConn,"select create_date,luggage_to,luggage_fees,luggage_charges,unloading_charges,luggage_paymethod from power_luggage where luggage_paymethod<>'Expenses'  and luggage_to =".$ro2[0]."  order by create_date") or die("Vehicle error:".mysqli_error());
				   
				 
				   while($luggage_row=mysqli_fetch_row($luggage))
				   {
					   
				   ?>
                
                   
                  
                           
                        
                            <?php  $routeto =mysqli_query($objConn,"select route,route_delivery_topay,route_delivery_paid from power_route where id = ".$luggage_row[1]);
							$routeto1 = mysqli_fetch_row($routeto);
							//echo $routeto1[0].'//'.$luggage_row[5];?>
                           
							<?php /*<td align="left"><?php 
							
							$tot_amt_dash=$luggage_row[2]+$luggage_row[3]+$luggage_row[4];
							$tot_amt_tax = $tot_amt_dash *5/100;
							
							
							$tot_amt_tax = $tot_amt_dash *5/100;
							$tot_amt_dash += $tot_amt_tax;
							
							$tot_lug_charges +=$tot_amt_dash;
							echo number_format($tot_amt_dash,2);
							
							?></td>*/?>
							<?php 
							if($luggage_row[5]=='Paid'){
								 $com = $luggage_row[2]*$routeto1[1]/100;
								$paid_com +=$com;
								//$tot_lug_charges -=$com;
							}
							else{
							$tot_amt_dash=$luggage_row[2]+$luggage_row[3]+$luggage_row[4];
							$tot_amt_tax = $tot_amt_dash *5/100;
							$topay_com += $luggage_row[2]*$routeto1[1]/100;
							//$tot_amt_dash -=$com;
							//echo number_format($luggage_row[2],2);echo '+';echo number_format($luggage_row[3],2);echo '+';echo number_format($luggage_row[4],2);	echo '+';echo number_format($tot_amt_tax,2);
							
							$tot_amt_dash += $tot_amt_tax;
							
							$tot_lug_charges +=$tot_amt_dash;
							//echo $tot_amt_dash;
							}
							?>
							
							<?php /*<td align="left"><?php 
							
							//echo number_format($luggage_row[2],2);echo '+';echo number_format($luggage_row[3],2);echo '+';echo number_format($luggage_row[4],2);	echo '+';echo number_format($tot_amt_tax,2);
							//  $luggage_row[2].'+'.$luggage_row[3].'+'.$luggage_row[4]+$tax;
							
							// echo $tot =  $luggage_row[2].'+'.$luggage_row[3].'+'.$luggage_row[4]+$tax;
							
							//echo 	($tot+$tax);
							//echo $luggage_row[5];
							?></td>*/?>
							<?php $i++; $credit_amt=0;$paid_amt=0;$topay_amt =0;?>
                            
                 
				
				<?php
				   }
				   $cnt++;
                            $css_set=$cnt%2;
				// }?>
				
				
				
				<tr <?php if($css_set==0) echo "class=gradeX"; else  echo "class=gradeC"; ?> >
				<td align="center" ><?php echo $sno;?></td>
				<td align="left" ><?php echo ucfirst($ro2[1]);?>
				<td align="left" ><?php echo $ro2[2];?>
                
                 <?php /*<td  align="center"><strong><?php  echo number_format($tot_lug_charges,2);?></strong></td>
               
                 <td  align="center"><strong><?php  echo number_format($paid_com,2);?></strong></td>
				 
                 <td  align="center"><strong><?php  echo number_format($topay_com,2);?></strong></td>.*/?>
				 <td  align="right"><strong><?php  echo number_format($tot_lug_charges-$paid_com-$topay_com,2);
				 $total_lrcharge +=$tot_lug_charges-$paid_com-$topay_com;
				 ?></strong></td>
				 <td align="left"><strong>&nbsp;</strong></td>
				 <?php $rec = "select sum(collection_amount) from power_collections_ho where route_id = ".$ro2[0];
				 $rec1 = mysqli_query($objConn,$rec);
				 $rec2 = mysqli_fetch_row($rec1);
				 ?>
				 
				 <td  align="right"><strong><?php  echo number_format($rec2[0],2);
				 $total_recieved +=$rec2[0]; 
				 ?></strong></td>
				 <td align="center"><strong>&nbsp;</strong></td>
				 
				
				 <td  align="right"><strong><?php  echo number_format($tot_lug_charges-$paid_com-$topay_com-$rec2[0],2);
				 $total_balance +=$tot_lug_charges-$paid_com-$topay_com-$rec2[0];
				 ?></strong></td>
				 <td align="center"><strong>&nbsp;</strong></td>
				 </tr>
				
<?php $i++;$tot_lug_charges=0;$paid_com=0;$topay_com=0;$sno++;} ?>

					<tr style="color:red; font-size:16px;" >
				<td align="center" ></td><td align="center" ></td>
				<td align="left" >Total
				
                
                 <?php /*<td  align="center"><strong><?php  echo number_format($tot_lug_charges,2);?></strong></td>
               
                 <td  align="center"><strong><?php  echo number_format($paid_com,2);?></strong></td>
				 
                 <td  align="center"><strong><?php  echo number_format($topay_com,2);?></strong></td>.*/?>
				 <td  align="right"><strong><?php  echo '₹ '.number_format($total_lrcharge,2);
				 
				 ?></strong></td>
				 <td align="left"><strong>&nbsp;</strong></td>
				 <?php $rec = "select sum(collection_amount) from power_collections_ho where route_id = ".$ro2[0];
				 $rec1 = mysqli_query($objConn,$rec);
				 $rec2 = mysqli_fetch_row($rec1);
				 ?>
				 
				 <td  align="right"><strong><?php  echo'₹ '.number_format($total_recieved,2);
				 
				 ?></strong></td>
				 <td align="center"><strong>&nbsp;</strong></td>
				 
				
				 <td  align="right"><strong><?php  echo '₹ '.number_format($total_balance,2);
				 
				 ?></strong></td>
				 <td align="center"><strong>&nbsp;</strong></td>
				 </tr>
                </table>
                 
              <?php 	
    $data = $printrr;
  
    function filterData(&$str)
    {
        $str = preg_replace("/\t/", "\\t", $str);
        $str = preg_replace("/\r?\n/", "\\n", $str);
        if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
    }
    
    // file name for download
    $fileName = "collection_data" . date('d-m-Y') . ".xls";
  
    // headers for download
	header("Content-Type: application/xls"); 

  header("Content-Disposition: attachment; filename=\"$fileName\"");
  
    
    $flag = false;
    foreach($data as $row) {
        if(!$flag) {
            // display column names as first row
            echo implode("\t", array_keys($row)) . "\n";
            $flag = true;
        }
        // filter data
        array_walk($row, 'filterData');
        echo implode("\t", array_values($row)) . "\n";

    }
	
	?>
                
               
</body>
</html>