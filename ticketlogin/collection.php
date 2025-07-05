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
<title>:: Welcome to Power Play Imaging Solutions  - Admin Panel ::</title>
<link href="css/reset.css" rel="stylesheet" type="text/css">
<link href="css/layout.css" rel="stylesheet" type="text/css">
<link href="css/themes.css" rel="stylesheet" type="text/css">
<link href="css/typography.css" rel="stylesheet" type="text/css">
<link href="css/styles.css" rel="stylesheet" type="text/css">
<link href="css/shCore.css" rel="stylesheet" type="text/css">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/jquery.jqplot.css" rel="stylesheet" type="text/css">
<link href="css/jquery-ui-1.8.18.custom.css" rel="stylesheet" type="text/css">
<link href="css/data-table.css" rel="stylesheet" type="text/css">
<link href="css/form.css" rel="stylesheet" type="text/css">
<link href="css/ui-elements.css" rel="stylesheet" type="text/css">
<link href="css/wizard.css" rel="stylesheet" type="text/css">
<link href="css/sprite.css" rel="stylesheet" type="text/css">
<link href="css/gradient.css" rel="stylesheet" type="text/css">
<!--[if IE 7]>
<link rel="stylesheet" type="text/css" href="css/ie/ie7.css" />
<![endif]-->
<!--[if IE 8]>
<link rel="stylesheet" type="text/css" href="css/ie/ie8.css" />
<![endif]-->
<!--[if IE 9]>
<link rel="stylesheet" type="text/css" href="css/ie/ie9.css" />
<![endif]-->
<!-- Jquery --><script type="text/javascript" src="images/calendarDateInput.js"></script>
           <script type="text/javascript">
<!--

var d_names = new Array("Sunday", "Monday", "Tuesday",
"Wednesday", "Thursday", "Friday", "Saturday");

var m_names = new Array("January", "February", "March", 
"April", "May", "June", "July", "August", "September", 
"October", "November", "December");

var d = new Date();
var curr_day = d.getDay();
var curr_date = d.getDate();
var sup = "";
if (curr_date == 1 || curr_date == 21 || curr_date ==31)
   {
   sup = "st";
   }
else if (curr_date == 2 || curr_date == 22)
   {
   sup = "nd";
   }
else if (curr_date == 3 || curr_date == 23)
   {
   sup = "rd";
   }
else
   {
   sup = "th";
   }
var curr_month = d.getMonth();
var curr_year = d.getFullYear();

//document.write(d_names[curr_day] + " " + curr_date + "<SUP>"
//+ sup + "</SUP> " + m_names[curr_month] + " " + curr_year);

//-->
</script>

<script>
$(function () {
    $.jqplot._noToImageButton = true;
    //var prevYear = [['2014-04-01',100],['2014-04-02',1200],['2014-04-03',149],['2014-04-04',500],['2014-04-05',50],['2014-04-06',213]];
  <?php $sel = "select create_date,sum(luggage_fees),sum(luggage_charges),sum(luggage_doorcharges),sum(unloading_charges) from power_ticket where luggage_from =".$_SESSION['route']. " and luggage_status<>'Cancelled' group by create_date";
   $sel1 = mysqli_query($objConn,$sel);
   $selnum = mysqli_num_rows($sel1);
   $selcou = 0;
   $strstr ='';
   while($sel2 = mysqli_fetch_row($sel1))
   {
	   $selcou++; 
	   $strdte = $sel2[0];
	   $stramt = $sel2[1]+$sel2[2]+$sel2[3]+$sel2[4];
	   if($selcou==$selnum)    $strstr .= "['".$strdte."',".$stramt."]";
	   else   $strstr .= "['".$strdte."',".$stramt."],";
   }
  ?>
    var prevYear = [<?php echo $strstr?>];
    var currYear = [];
    var plot1 = $.jqplot("chart1", [prevYear, currYear], {
        seriesColors: ["rgba(78, 135, 194, 0.7)", "rgb(211, 235, 59)"],
        title: 'Monthly Revenue',
        highlighter: {
            show: true,
            sizeAdjust: 1,
            tooltipOffset: 9
        },
        grid: {
            background: 'rgba(57,57,57,0.0)',
            drawBorder: false,
            shadow: false,
            gridLineColor: '#666666',
            gridLineWidth: 2
        },
        legend: {
            show: false,
            placement: 'outside'
        },
        seriesDefaults: {
            rendererOptions: {
                smooth: true,
                animation: {
                    show: true
                }
            },
            showMarker: false
        },
        series: [
            {
                fill: true,
                label: '2013'
            },
            {
                label: '2014'
            }
        ],
        axesDefaults: {
            rendererOptions: {
                baselineWidth: 1.5,
                baselineColor: '#444444',
                drawBaseline: false
            }
        },
        axes: {
            xaxis: {
                renderer: $.jqplot.DateAxisRenderer,
                tickRenderer: $.jqplot.CanvasAxisTickRenderer,
                tickOptions: {
                    formatString: "%b %e",
                    angle: -30,
                    textColor: '#dddddd'
                },
                min: "<?php echo date('Y-m-d',strtotime('-1 months'))?>",
                max: "<?php echo date('Y-m-d')?>",
                tickInterval: "1 day",
                drawMajorGridlines: false
            },
            yaxis: {
                renderer: $.jqplot.LogAxisRenderer,
                pad: 0,
                rendererOptions: {
                    minorTicks: 1
                },
                tickOptions: {
                    formatString: "Rs.%'d",
                    showMark: false
                }
            }
        }
    });
});
/*=================
CHART 3
===================*/	
$(function(){
    var s1 = [200, 600, 700, 1000];
    var s2 = [460, -210, 690, 820];
    var s3 = [-260, -440, 320, 200];
    // Can specify a custom tick Array.
    // Ticks should match up one for each y value (category) in the series.
    var ticks = ['May', 'June', 'July', 'August'];
    var plot1 = $.jqplot('chart3', [s1, s2, s3], {
        // The "seriesDefaults" option is an options object that will
        // be applied to all series in the chart.
        seriesDefaults:{
			shadow: false,   // show shadow or not.
            renderer:$.jqplot.BarRenderer,
            rendererOptions: {fillToZero: true}
        },
        // Custom labels for the series are specified with the "label"
        // option on the series option.  Here a series option object
        // is specified for each series.
        series:[
            {label:'Hotel'},
            {label:'Event Regristration'},
            {label:'Airfare'}
        ],
        // Show the legend and put it outside the grid, but inside the
        // plot container, shrinking the grid to accomodate the legend.
        // A value of "outside" would not shrink the grid and allow
        // the legend to overflow the container.
        legend: {
            show: true,
            placement: 'outsideGrid'
        },
        axes: {
            // Use a category axis on the x axis and use our custom ticks.
            xaxis: {
                renderer: $.jqplot.CategoryAxisRenderer,
                ticks: ticks
            },
            // Pad the y axis just a little so bars can get close to, but
            // not touch, the grid boundaries.  1.2 is the default padding.
            yaxis: {
                pad: 1.05,
                tickOptions: {formatString: '$%d'}
            }
        },
		grid: {
         borderColor: '#ccc',     // CSS color spec for border around grid.
        borderWidth: 2.0,           // pixel width of border around grid.
        shadow: false               // draw a shadow for grid.
    }
    });
	 // Bind a listener to the "jqplotDataClick" event.  Here, simply change
  // the text of the info3 element to show what series and ponit were
  // clicked along with the data for that point.
  $('#chart3').bind('jqplotDataClick',
    function (ev, seriesIndex, pointIndex, data) {
      $('#info3').html('series: '+seriesIndex+', point: '+pointIndex+', data: '+data);
    }
  );
});
</script>
<script LANGUAGE="JavaScript">
<!--
function confirmSubmit()
 {
var msg;
msg= "Are you sure you want to delete the data ";
var agree=confirm(msg);
if (agree)
return true ;
else
return false ;
}
// -->
</script>
<script language="JavaScript">
function selectDelete(check){
    cnt = document.frm.count.value;// no. of check boxes
    for( var i = 1, j; j = document.getElementById('delete_'+i),i <= cnt; i++ ) {
        if(j){
            if(check.checked == true)    
                j.checked = true;
            else
                j.checked = false;
        }
    }
}
function allchecked(nos,frm){
for(i=1;i<=nos+2;i++){
frm.elements(i).checked=frm.select.checked;
}

}
function deleteAll()
        {

            var proceed=false;
            for (var i = 0; i < document.frm.elements.length; i++) 
            {
                var e = document.frm.elements[i];
				
                if (e.name == "del[]") 
                {
                    if(e.checked == true)
                    {
                        proceed=true;
                        break;
                    }
                }//end if
            }//end for loop
                        
            if(proceed)
            {
                if(confirm("Are you sure? Do you want to delivered the selected item(s)."))
                    {
                        document.frm.action="luggage_delivery_all.php";
                          document.frm.submit();
                    }
            }
            else
            {
                alert("You must select items to proceed");
            }
            
        }


function checkAll() 
{
	
    if(document.getElementById('chkAll').checked==false)
    {
        uncheckAll();
    }//end if
    else
    {
        for (var i = 0; i < document.frm.elements.length; i++) 
        {
            var e = document.frm.elements[i];
            if (e.name == "del[]") 
            {
                e.checked = true;
            }//end if
        }//end for loop
    }//end else
}//end function    
function uncheckAll() 
{
    for (var i = 0; i < document.frm.elements.length; i++) 
    {
        var e = document.frm.elements[i];
        if (e.name == "del[]") 
        {
            e.checked = false;
        }//end if
    }//end for loop
}//end function    
 function CenterWindow(windowWidth, windowHeight, windowOuterHeight, url, wname, features) {
    var centerLeft = parseInt((window.screen.availWidth - windowWidth) / 2);
    var centerTop = parseInt(((window.screen.availHeight - windowHeight) / 2) - windowOuterHeight);
 
    var misc_features;
    if (features) {
      misc_features = ', ' + features;
    }
    else {
      misc_features = ', status=no, location=no, scrollbars=yes, resizable=yes';
    }
    var windowFeatures = 'width=' + windowWidth + ',height=' + windowHeight + ',left=' + centerLeft + ',top=' + centerTop + misc_features;
    var win = window.open(url, wname, windowFeatures);
    win.focus();
    return win;
  }
</script>
</head>
<body id="theme-default" class="full_block">
<div id="actionsBox" class="actionsBox">
	<div id="actionsBoxMenu" class="menu">
		<span id="cntBoxMenu">0</span>
		<a class="button box_action">Archive</a>
		<a class="button box_action">Delete</a>
		<a id="toggleBoxMenu" class="open"></a>
		<a id="closeBoxMenu" class="button t_close">X</a>
	</div>
	<div class="submenu">
		<a class="first box_action">Move...</a>
		<a class="box_action">Mark as read</a>
		<a class="box_action">Mark as unread</a>
		<a class="last box_action">Spam</a>
	</div>
</div>
<div id="left_bar">
	
	
	<div id="sidebar">
		<div id="secondary_nav">
			<?php include_once("menu.php");?>
		</div>
	</div>
</div>
<div id="container">
	<div id="header" class="blue_lin">
		<div class="header_left">
			<div class="logo">
				<img src="images/logo.png" alt="Power Play Imaging Solutions">
			</div>
			<div id="responsive_mnu">
				<a href="#responsive_menu" class="fg-button" id="hierarchybreadcrumb"><span class="responsive_icon"></span>Menu</a>
				<div id="responsive_menu" class="hidden">
					<ul>
				<li><a href="dashboard.php"><span class="nav_icon computer_imac"></span> Dashboard</a></li>
				<li><a href="luggage_new.php"><span class="nav_icon frames"></span> Booking</a></li>
				<li><a href="luggage.php"><span class="nav_icon blocks_images"></span> Dispatch Statement</a></li> 
 <li><a href="luggage_delivery.php"><span class="nav_icon create_write"></span> Delivery Statement</a></li> <li><a href="daysheet.php"><span class="nav_icon mobile_phone"></span>Day Sheet Entry</a></li><li><a href="customer.php"><span class="nav_icon speech_bubbles_2"></span>Customer Management</a></li>

                <li><a href="reports.php"><span class="nav_icon file_cabinet"></span>Reports</a></li>
<li><a href="settings.php"><span class="nav_icon cog"></span>Settings</a></li>
			</ul>
				</div>
			</div>
		</div>
		<div class="header_right">
			
			<div id="user_nav">
				<ul>
					<li class="user_thumb"><a href="#"><span class="icon"><img src="images/user_thumb.png" width="30" height="30" alt="User"></span></a></li>
					<li class="user_info"><span class="user_name"><?php echo $_SESSION['route_name']?></span><a href="logout.php" ><span class="user_name"><strong>Logout</strong> </span></a></li>
                    
                    
					<!--<li class="logout"><a href="#"><span class="icon"></span>Logout</a></li>-->
				</ul>
			</div>
		</div>
	</div>
	<div class="page_title">
		<span class="title_icon"><span class="computer_imac"></span></span>
		<h3>Collection Sheet</h3>
		
	</div>
    
   <div class="arrow_box no-print" >
    <form name="frm" id="frm" method="post" action="">
    <table width="100%" border="1" cellspacing="0" cellpadding="0" style="border-collapse:collapse;" class="arrow_box_content top_arrow">
      
       <?php /*?><tr>
        <td height="26" align="right" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt" style="text-transform:uppercase;">&nbsp;</td>
        <td align="right" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt">&nbsp;</td>
      </tr>
      <tr>
        <td width="233" height="26" align="right" class="label_txt">From Date :</td>
        <td width="272" align="center" class="label_txt" style="text-transform:uppercase;">
		<script>DateInput('frmdate', true, 'yyyy-mm-dd','<?php echo $frmdate; ?>')</script></td>
        <td width="161" align="right" class="label_txt">To Date : </td>
        <td width="257" align="center" class="label_txt">
          <script>DateInput('todate', true, 'yyyy-mm-dd','<?php echo $todate; ?>')</script>       </td>
        <td width="80" align="center" class="label_txt"></td>
      </tr>
	  <tr>
        <td height="26" align="right" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt" style="text-transform:uppercase;">&nbsp;</td>
        <td align="right" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt">&nbsp;</td>
      </tr><?php */?>
	  
	 
	  
	  
	 <?php /*?> <tr>
        <td height="26" align="right" class="label_txt">Select Any Hub</td>
        <td align="center" class="label_txt" style="text-transform:uppercase;"><?php /*?><input type="text"  name="lrno" id="lrno" value="<?php echo $_POST['lrno']?>">
        <select name="route_to" id="route_to" class="limiterBox" tabindex="2" >
                        <option value="0">Select Any</option>
                          <?php 
						                  $str = "select * from power_route where route_status=0 and id in (select route_to from power_ticket where luggage_paymethod<>'Expenses' and create_date between  '".$frmdate."' and '".$todate."')";
										
										 $route=mysqli_query($objConn,"select * from power_route where  route_status=0 and id in (select luggage_to from power_ticket where luggage_paymethod<>'Expenses' and create_date between  '".$frmdate."' and '".$todate."') order by route ") or die("Vehicle error:".mysql_error());
										//$route = mysqli_query($objConn,"select * from power_route where route_status=0 order by route");
										while($route1 = mysqli_fetch_array($route))
										{
											if($route1['id']==$_POST['route_to'])
											echo "<option value=".$route1['id']." selected>". strtoupper($route1['route'])."</option>";
											else
											echo "<option value=".$route1['id'].">".strtoupper($route1['route'])."</option>";
										}
										
										?>
                        </select>
        </td>
        <td align="right" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt"></td>
        <td align="center" class="label_txt"></td>
      </tr>
	  
      <tr>
        <td height="26" align="right" class="label_txt"></td>
        <td align="center" class="label_txt" style="text-transform:uppercase;"><?php /*?><input type="text"  name="lrno" id="lrno" value="<?php echo $_POST['lrno']?>">
       
        </td>
        <td align="right" class="label_txt">&nbsp;</td>
        <td align="center" class="label_txt"><input type="submit" class="btn_small btn_blue" name="Submit" value="Get Collections" onClick="return val();"></td>
        <td align="center" class="label_txt"></td>
      </tr>
	  
      <tr>
       <td colspan="5"><br></td>
      </tr><?php */?>
      
    </table></form></div>
	<div class="switch_bar">
    
   
           
		<div class="grid_12">
            	
                
    
                
                
                
                <h2>Collection Details</h2>
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
				<th  align="center" >Agent</th>
				
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
					$ro ="select id,route from power_route where route_status=0 and  (route_group = ".$_SESSION['route']."  or id = ".$_SESSION['route'].")order by route";
					$ro1 = mysqli_query($objConn,$ro);
					while($ro2 = mysqli_fetch_row($ro1)){
					
					//$luggage=mysqli_query($objConn,"select create_date,luggage_to,sum(luggage_fees),sum(luggage_charges),sum(unloading_charges) from power_ticket where luggage_paymethod<>'Expenses' group by luggage_to  order by create_date") or die("Vehicle error:".mysqli_error());
					$luggage=mysqli_query($objConn,"select create_date,luggage_to,luggage_fees,luggage_charges,unloading_charges,luggage_paymethod from power_ticket where luggage_paymethod<>'Expenses'  and luggage_to =".$ro2[0]."  order by create_date") or die("Vehicle error:".mysqli_error());
				   
				 
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
				<td align="center" ></td>
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
                 
              
                
                <div style="clear: both"></div>
            </div>
	</div>
	
</div>
</body>
</html>