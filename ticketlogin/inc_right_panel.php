<table width="279" border="0" cellspacing="0" cellpadding="0">
                    <?php
			$id=$_REQUEST['par'];
            $cat="select * from power_menu where category_id=".$id." order by category_display";
			$cat1=mysqli_query($objConn,$cat);
			$cat2=mysqli_fetch_array($cat1);
			?>
                    <tr>
                      <td width="279" height="46" align="left" valign="middle" background="images/table_top.gif"><a href="sub_edit.php?id=<?php echo $cat2['category_id']?>" class="linkmain">
                        <?php echo $cat2['category_name']?>
                      </a></td>
                    </tr>
                    <tr>
                      <td align="center" valign="top" background="images/table_center.gif"><table width="96%"  border="0" cellpadding="0" cellspacing="0">
                          <?php   $total= substr_count(parentcat($cat2['category_id']), 'k');
			            $string=explode('k',parentcat($cat2['category_id']));
						if($total==0)
						{
						?>
                          <tr>
                            <td colspan="5"  align="center" valign="middle" class="text">No Subcategories Available.</td>
                          </tr>
                          <?php
						}
						else
						{
			            for($z=1;$z<=$total;$z++)
						{
						$catname="select category_name from power_menu where category_id=".$string[$z]." order by category_display";
						$catname1=mysqli_query($objConn,$catname);
						$catname2=mysqli_fetch_row($catname1);
						if( parenttot($string[$z])==1)
						{
						?>
                          <tr>
                            <?php
                    for($co=0;$co<=parenttot($string[$z]);$co++)
					echo "<td   width=5% align=left valign=middle>&nbsp;</td>";
					?>
                            <td  align="right" valign="middle"><img src="images/bullet1.gif" width="6" height="5" /></td>
                            <td  colspan="4"  align="left" valign="middle"><input name="par" type="hidden" value="<?php echo $id?>" />
                              <a href="sub_edit.php?id=<?php echo $string[$z]?>&amp;par=<?php echo $id?>" class="linksub"><?php echo $catname2[0]; ?></a></td>
                          </tr>
                          <?php  }
					else
					{
					?>
                          <tr>
                            <?php
                    for($co=0;$co<=parenttot($string[$z]);$co++)
					echo "<td    align=left valign=middle>&nbsp;</td>";
					?>
                            <td     align="right" valign="middle"><img src="images/bullet2.gif" width="9" height="9" /></td>
                            <td   align="left" valign="middle"><a href="sub_edit.php?id=<?php echo $string[$z]?>&amp;par=<?php echo $id?>" class="linksub"> <?php echo $catname2[0]; ?></a></td>
                          </tr>
                          <?php } 
				  }
				  }?>
                      </table></td>
                    </tr>
                    <tr>
                      <td><img src="images/table_bottom.gif" width="279" height="8" /></td>
                    </tr>
                </table>