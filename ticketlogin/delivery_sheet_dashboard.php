 <h2> DELIVERY SHEET</h2>
                
                <div align="right"><div class="btn_40_blue ucase">
								<a href="javascript:deleteAll();"><span class="icon finished_work_sl"></span><span>Click to Delivery</span></a><br>
							</div></div>
                
               <table class="display"><thead>
                
                <tr><th>S.No.</th>
                 <th>DATE</th>
                <th>LR NO</th>
                <th>TYPE</th>
                <th>FROM CONSIGNEE</th>
                <th>TO  CONSIGNOR</th>
                <th>TO</th>
               <!-- <th>ITEMS</th>-->
                <th>QTY</th>
                <th>AMOUNT</th>
                <th>TOPAY DEL.COMMN(%)</th>
                <th>PAID DEL.COMMN(%)</th>
                  <th>CREDIT DEL.COMMN(%)</th>
                  <th>AUTO(OR)DOOR DLY CHARGE</th>
                  <th>HANDLING CHARGE</th>
				  <th>GST</th>
                   <th>AGENT AMOUNT</th>
                    <th>HO AMOUNT</th></tr></thead>
                <?php /*?> <tr style="color:red; font-size:16px;">
                  <td align="right" colspan="15"><strong>Opening Balance : </strong></td>
                 
                  <td  align="right"><strong><?php  
				 
				  echo number_format($tot_agt1,2);?></strong></td>
                  <td  align="right"><strong><?php  echo number_format($tot_ho,2);?></strong></td>
                 
                </tr><?php */?>
                <?php 
	$vecstr = '';
	//if($_POST['Submit'] || (isset($_REQUEST['frmdate']) && isset($_REQUEST['todate'])))
//{
	
	
				    $time = strtotime($frmdate.' -1 day');
    					 $fromdatesr = date("Y-m-d", $time);
					$time = strtotime($todate.' -1 day');
    					 $todatesr = date("Y-m-d", $time);
						// echo "select * from power_ticket where create_date>='".$fromdatesr."' and create_date<='".$todatesr."' and luggage_to =".$_SESSION['route']." order by create_date";
					$luggage=mysqli_query($objConn,"select * from power_ticket where create_date>='".$fromdatesr."' and create_date<='".$todatesr."' and luggage_to =".$_SESSION['route']." order by create_date") or die("Vehicle error:".mysql_error());
					$luggage_num=mysqli_num_rows($luggage);	
					
					if($luggage_num==0)
					{
                    ?> <tr>
                        <td colspan="16" align="center" valign="middle" bgcolor="#F9C6F1">No Records.</td>
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
                <tr <?php if($css_set==0) echo "class=gradeX"; else  echo "class=gradeC"; ?>> 
                  <td align="center"><?php echo $i."."; ?><?php /*?><?php if($luggage_row['luggage_status']!='Delivered'){?><input type="checkbox" name="del[]"  id="del[]" value="<?php echo $luggage_row['id']; ?>"  > <?php } else {?><input type="checkbox" checked> <?php echo $i."."; ?><?php }?><?php */?></td>
                   <td align="center"><?php echo date('d-M-Y',strtotime($luggage_row['create_date']));?></td>
                   <td align="center"><?php echo $luggage_row['luggage_lrno']; 
							if($luggage_row['luggage_ref']!=0)
							{
								echo "<br><font color=red>( Ref. ".$luggage_row['luggage_ref'].")</font>";
							}?></td>
                            <td align="center"><?php echo $luggage_row['luggage_paymethod'];?></td>
                            <td align="center"><?php echo $luggage_row['luggage_sender'].' & '.$luggage_row['luggage_sender_phone']; ?></td>
                            <td align="center"><?php echo $luggage_row['luggage_reciever'].' & '.$luggage_row['luggage_reciever_phone']; ?></td>
                            <td align="center"><?php 
							$routeto = mysqli_fetch_row(mysqli_query($objConn,"select route from power_route where id = ".$luggage_row['luggage_to']));
							echo $routeto1 = $routeto[0];
							
							?></td>
							<?php /*?><td align="center">
                            <?php 
							$luggage_prd = "select * from power_ticket_prd where luggage_lrno = '".$luggage_row['luggage_lrno']."'";
							$luggage_prd1 = mysqli_query($objConn,$luggage_prd);
							$luggage_prd_rows = mysqli_num_rows($luggage_prd1);
							$cn=0;
							while($luggage_prd2 = mysqli_fetch_array($luggage_prd1))
							{
							   echo $luggage_prd2['luggage_prd_name'];
							   $cn++;
							   if($cn!=$luggage_prd_rows) echo " , ";
							   
							}
							
							?>
                            
                            
								 
							</td><?php */?>
							
							<td align="center">
                           <?php 
							$luggage_prd = "select sum(luggage_qunty) from power_ticket_prd where luggage_lrno = '".$luggage_row['luggage_lrno']."'";
							$luggage_prd1 = mysqli_query($objConn,$luggage_prd);
						
						    $luggage_prd2 = mysqli_fetch_row($luggage_prd1);
							
							   echo $luggage_prd2[0];
							  // $cn++;
							  // if($cn!=$luggage_prd_rows) echo " , ";
							   
							
							
							?>
                            
                            
								 
							</td>
							<td align="center"><?php 
							//if($luggage_row['luggage_status']=='Delivered'){
								
							echo number_format($luggage_row['luggage_fees'],2);
							if($luggage_row['luggage_paymethod']=='To Pay'){
							$lug_fees +=$luggage_row['luggage_fees'];}//}
							//else
							//{?>
                            
                            <?php //}?></td>
                            
                           
                            
                  <td align="right"><?php 
						$get_com = mysqli_query($objConn,"select * from power_route where id =".$_SESSION['route']);
						$get_com1 = mysqli_fetch_array($get_com);
						
						 
						if($luggage_row['luggage_paymethod']=='To Pay'){
						echo $topay_amt = $luggage_row['luggage_fees']*$get_com1['route_delivery_topay']/100;
						$tot_topay2  +=$topay_amt;
						}
						else echo '-';
						
						?></td>
                        
                  <td align="right"><?php 
						$get_com = mysqli_query($objConn,"select * from power_route where id =".$_SESSION['route']);
						$get_com1 = mysqli_fetch_array($get_com);
						if($luggage_row['luggage_paymethod']=='Paid')
						{
						echo  $paid_amt = $luggage_row['luggage_fees']*$get_com1['route_delivery_paid']/100;
						$tot_paid1  +=$paid_amt;
						}
						else echo '-';
						
						?></td>
                  <td align="right"><?php 
						if($luggage_row['luggage_paymethod']=='Credit')
						{
						echo  $credit_amt1 = $luggage_row['luggage_fees']*$get_com1['route_delivery_credit']/100;
						$tot_credit2  +=$credit_amt1;
						}
						 else echo '-';
						 
						?></td>
                  <td align="right"><?php echo $luggage_row['luggage_doorcharges'];
				  $tot_door=$luggage_row['luggage_doorcharges'];
				  ?></td>
                  <td align="right"><?php 
				   
				   if($luggage_row['luggage_paymethod']=='To Pay'){
					   $both_loading = $luggage_row['luggage_charges']+$luggage_row['unloading_charges'];
					   $tot_unloa+=$luggage_row['luggage_charges']+$luggage_row['unloading_charges'];
				   }
				   else
				   {
				   $tot_unloa+=0;
				   $both_loading = 00;
				   }
				   echo $both_loading;
				  ?></td>
				  <td align="right"><?php  
				  if($luggage_row['luggage_paymethod']=='To Pay'){
				  $tax_topay =($luggage_row['luggage_fees'] +$both_loading) *5/100;
				  $tot_tax_topay+=$tax_topay;
				   echo number_format($tax_topay,2);
				  }
				    else
				   {
					    $tax_topay =0;
				  $tot_tax_topay+=$tax_topay;
				   echo number_format($tax_topay,2);
				   }
				   
				  ?></td>
                  <td align="right"><?php  $agent_amt =$topay_amt +$paid_amt+$credit_amt1+$luggage_row['luggage_doorcharges'];
				  $tot_agt2+=$agent_amt;
				   echo number_format($agent_amt,2);
				   
				   
				  ?></td>
                  <td align="right"><?php  //if($luggage_row['luggage_status']=='Delivered'){
				  if($luggage_row['luggage_paymethod']=='Paid' || $luggage_row['luggage_paymethod']=='Credit')
				   $ho_amt = 0 ;
				   else
				   $ho_amt =$luggage_row['luggage_fees'] +$both_loading+$tax_topay+$tot_door - ($agent_amt);
				    echo number_format($ho_amt,2);
				  $tot_ho2+=$ho_amt;
				 
				  //}
				  ?></td>
				   </tr><?php   $i++; $credit_amt=0;$paid_amt=0;$topay_amt =0;$topay_amt=0;$paid_amt=0;$credit_amt1=0;} }?>
                <tr style="color:red; font-size:16px;">
                  <td align="right" colspan="8"><strong>Total Amount : </strong></td>
                  <td  align="right"><strong><?php  echo number_format($lug_fees,2);?></strong></td>
                  <td  align="right"><strong><?php  echo number_format($tot_topay2,2);?></strong></td>
                  <td  align="right"><strong><?php  echo number_format($tot_paid1,2);?></strong></td>
                  <td  align="right"><strong><?php  
				  $tot_credit2+=$tot_credit;
				  echo number_format($tot_credit2,2);?></strong></td>
                  <td  align="right"><strong><?php  echo number_format($tot_door,2);?></strong></td>
                 <td  align="right"><strong><?php  echo number_format($tot_unloa,2);?></strong></td>
				  <td  align="right"><strong><?php  echo number_format($tot_tax_topay,2);?>
                  <td  align="right"><strong><?php $tot_agt2= $tot_agt2 + $tot_agt1;
				  echo number_format($tot_agt2,2);?></strong></td>
                  <td  align="right"><strong><?php  
				  
				  echo number_format($tot_ho2,2);?></strong></td>
                  <td  align="right"><?php /*?><strong><?php  echo number_format($tot_ho2,2);?><?php */?></strong></td>
                 
                </tr><?php //}
				 ?>
                  <tr ><td align="right" colspan="16"></td></tr>
                 <tr ><td align="right" colspan="16"></td></tr>
                 <tr style="color:red; font-size:16px;">
                  <td align="right" colspan="15"><strong>Opening Balance :  </strong></td>
                  <td  align="right"><strong><?php  
				    $timeop = strtotime($frmdate.' -2 day');
    				$fromdatesrop = date("Y-m-d", $timeop);
				   $luggage=mysqli_query($objConn,"select * from power_ticket where create_date<='".$fromdatesr."'  and create_date>'2021-12-31' and luggage_from =".$_SESSION['route']."   order by create_date") or die("Vehicle error:".mysql_error());
							
							$luggage_row4=mysqli_num_rows($luggage);
							if($luggage_row4>0)
							{
							while($luggage_row=mysqli_fetch_array($luggage))
				   			{
								
								if($luggage_row['luggage_paymethod']=='Paid'){
								$booking_lug_feesop +=$luggage_row['luggage_fees'];
								$booking_lug_feesop +=$luggage_row['luggage_charges']; 
								$booking_lug_feesop +=$luggage_row['unloading_charges'];
								$door_delivery_charges_paid =$luggage_row['luggage_doorcharges'];
								}
								if($luggage_row['luggage_paymethod']!='Expenses')
								{
				           		$get_com = mysqli_query($objConn,"select * from power_route where id =".$_SESSION['route']);
								$get_com1 = mysqli_fetch_array($get_com);
								}
								if(($luggage_row['luggage_paymethod']=='To Pay'))
								{
								 $topay_amt1 = $luggage_row['luggage_fees']*$get_com1['route_comission_topay']/100;
								 $agent_amt1 =$topay_amt1;
								}
								if(($luggage_row['luggage_paymethod']=='Paid') )
								{
								 $paid_amt1 = $luggage_row['luggage_fees']*$get_com1['route_comission_paid']/100;
								  $agent_amt1 +=$paid_amt1;
								}
								if(($luggage_row['luggage_paymethod']=='Credit') )
								{
								 $credit_amt1 = $luggage_row['luggage_fees']*$get_com1['route_comission_credit']/100;
								 $agent_amt1 =$credit_amt1+$luggage_row['luggage_charges'];
								}
								  $tot_agtop1+=$agent_amt1;
								  $topay_amt1 = 0;$paid_amt1=0;$credit_amt1=0; $agent_amt1 =0;
								  
							}
				   			
							}
							
						
							$luggage2=mysqli_query($objConn,"select * from power_ticket where create_date<='$fromdatesrop'    and create_date>'2021-12-31' and luggage_to =".$_SESSION['route']." order by create_date") or die("Vehicle111 error:".mysql_error());
							$luggage_row3=mysqli_num_rows($luggage2);
							if($luggage_row3>0)
							{
							while($luggage_row2=mysqli_fetch_array($luggage2))
				   			{
								
								if($luggage_row2['luggage_paymethod']=='To Pay'){
								$lug_feesop +=$luggage_row2['luggage_fees'];
								$lug_feesop +=$luggage_row2['luggage_charges']; 
								$lug_feesop +=$luggage_row2['unloading_charges']; 
								$door_delivery_charges =$luggage_row2['luggage_doorcharges']; 
								}
				           		$get_com = mysqli_query($objConn,"select * from power_route where id =".$_SESSION['route']);
								$get_com1 = mysqli_fetch_array($get_com);
								if($luggage_row2['luggage_paymethod']=='To Pay')
								$topay_amt2 = $luggage_row2['luggage_fees']*$get_com1['route_delivery_topay']/100;
								if($luggage_row2['luggage_paymethod']=='Paid')
								$paid_amt2 = $luggage_row2['luggage_fees']*$get_com1['route_delivery_paid']/100;
								if($luggage_row2['luggage_paymethod']=='Credit')
								 $credit_amt2 = $luggage_row2['luggage_fees']*$get_com1['route_delivery_credit']/100;
								 $luggage_paymethod = $luggage_row2['luggage_paymethod'];
								
								 //if($luggage_paymethod=='To Pay'){
								$agent_amt2 =$topay_amt2 +$paid_amt2+$credit_amt2+$door_delivery_charges;
							    $tot_agtop2+=$agent_amt2;
								
								//}
								$topay_amt2 = 0;$paid_amt2=0;$credit_amt2=0; $agent_amt2 =0;
								
				   			}
							
							}
				   
				   
				   
				   
				   
				   
				   
				   
				   
				   
				   
				   
				   $day_collection_op=mysqli_query($objConn,"select sum(collection_amount) from power_daysheet where   create_date>='2022-01-01'  and  create_date<='".$fromdatesr."' and  route_id = '".$_SESSION['route']."' and collection_status=0 ") or die("Collection error1:".mysql_error());
				  $day_collection_op1=mysqli_fetch_row($day_collection_op);
				  
				  $day_collection=mysqli_query($objConn,"select sum(collection_amount) from power_daysheet where  create_date>='".$frmdate."' and create_date<='".$todate."' and route_id = '".$_SESSION['route']."' and collection_status=0 ") or die("Collection error:".mysql_error());
				  $day_collection1=mysqli_fetch_row($day_collection);
					  
					 $day_exp_op=mysqli_query($objConn,"select sum(collection_amount) from power_daysheet where    create_date>='2022-01-01'  and  create_date<='".$fromdatesr."' and route_id = '".$_SESSION['route']."' and collection_status=1 ") or die("Collection error2:".mysql_error());
				  $day_exp_op1=mysqli_fetch_row($day_exp_op); 
				   
				   $day_exp=mysqli_query($objConn,"select sum(collection_amount) from power_daysheet where  create_date>='".$frmdate."' and create_date<='".$todate."' and route_id = '".$_SESSION['route']."' and collection_status=1 ") or die("Collection error:".mysql_error());
				  $day_exp1=mysqli_fetch_row($day_exp);  
				 
				   $fin_recp_op=mysqli_query($objConn,"select sum(collection_amount) from power_collections_ho where    collection_date>='2022-01-01'  and  collection_date<='".$fromdatesr."' and  route_id = '".$_SESSION['route']."' ") or die("Collection error3:".mysql_error());
				  $fin_recp_op1=mysqli_fetch_row($fin_recp_op);
					
				     $fin_recp=mysqli_query($objConn,"select sum(collection_amount) from power_collections_ho where  collection_date>='".$frmdate."' and collection_date<='".$todate."' and route_id = '".$_SESSION['route']."' ") or die("Collection error:".mysql_error());
				  $fin_recp1=mysqli_fetch_row($fin_recp);
				  
				  // echo '('.$booking_lug_feesop.'+'.$lug_feesop.'-'.$tot_agtop1.'-'.$tot_agtop2.'+'.$day_collection_op1[0].'-'.$day_exp_op1[0].'-'.$fin_recp_op1[0].')';$final_op=0;
				  $tax_op = ($booking_lug_feesop+$lug_feesop)*5/100;
				  $final_op = $booking_lug_feesop+$lug_feesop-$tot_agtop1-$tot_agtop2+$day_collection_op1[0]-$day_exp_op1[0]-$fin_recp_op1[0]+$tax_op+$door_delivery_charges+$door_delivery_charges_paid;
					  
				  echo number_format($final_op,2);
				  
				  ?></strong></td>
                </tr>
                 
                 <tr ><td align="right" colspan="15"></td></tr>
                 <tr style="color:red; font-size:16px;">
                  <td align="right" colspan="15"><strong>Paid & Topay Amount :  </strong></td>
                  <td  align="right"><strong><?php  
				  
				   $lug_fees+=$tot_unloa;
				   //$tot_agt2+=$tot_door;
				   $route_type = mysqli_query($objConn,"select route_type,route_nature from power_route where id = ".$_SESSION['route']);
				   $route_type1=mysqli_fetch_row($route_type);
				   if($route_type1[0]==1) $lug_fees+=$tot_agt2;
				  
				  echo   number_format(($lug_fees+$lug_fees_booking+$tot_tax_topay+$tot_door),2);
				  
				  ?></strong></td>
                </tr>
                  <tr style="color:red; font-size:16px;">
                  <td align="right" colspan="15"><strong>Daysheet Collections :  </strong></td>
                  <td  align="right"><strong><?php  
				  echo number_format($day_collection1[0],2);
				  ?></strong></td>
                </tr>
                <tr style="color:red; font-size:16px;">
                  <td align="right" colspan="15"><strong> Agent Commission Amount :  </strong></td>
                  <td  align="right"><strong><?php 
				  if($route_type1[1]=='Booking')  $tot_agt2=$tot_agt1;
				   if($route_type1[0]==0)
				   echo number_format($tot_agt2,2);else  echo '0.00';
				  ?></strong></td>
                </tr>
               
                 <tr ><td align="right" colspan="16"></td></tr>
                
                
               
                 
                 <tr style="color:red; font-size:16px;">
                  <td align="right" colspan="15"><strong>Daysheet Expenses :  </strong></td>
                  <td  align="right"><strong><?php  
				  echo number_format($day_exp1[0],2);
				  ?></strong></td>
                </tr>
                 <tr style="color:red; font-size:16px;">
                  <td align="right" colspan="15"><strong>HO Amount :  </strong></td>
                  <td  align="right"><strong><?php 
				   if($route_type1[0]==1) $lug_fees+=$tot_agt2;
				  $bal_pay = ($lug_fees+$lug_fees_booking+$tot_tax_topay+$tot_door) - $tot_agt2+$day_collection1[0]-$day_exp1[0];
				  echo number_format($bal_pay,2);?></strong></td>
                </tr>
               
                 <tr ><td align="right" colspan="16"></td></tr>
                 <tr style="color:red; font-size:16px;">
                  <td align="right" colspan="15"><strong>Reciepts :  </strong></td>
                  <td  align="right"><strong><?php  
				  echo number_format($fin_recp1[0],2);
				  ?></strong></td>
                </tr>
                 <tr style="color:red; font-size:16px;">
                  <td align="right" colspan="15"><strong>Closing Balance :  </strong></td>
                  <td  align="right"><strong><?php 
				  $final_clp = $final_op +$bal_pay-$fin_recp1[0];
				  echo number_format($final_clp,2);?></strong></td>
                </tr>
               
                </table>