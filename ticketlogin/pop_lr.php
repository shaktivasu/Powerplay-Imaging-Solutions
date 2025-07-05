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
			<ul id="sidenav" class="accordion_mnu collapsible">
                <li><a href="dashboard.php"><span class="nav_icon computer_imac"></span> Dashboard</a></li>
                <li><a href="luggage_new.php"><span class="nav_icon note_book"></span> Booking</a></li>
                <li><a href="luggage_new_manual.php"><span class="nav_icon user"></span> Manual Entry</a></li>
                <li><a href="luggage.php"><span class="nav_icon truck"></span> <span class="menu_color_dis">Dispatch </span>Statement</a></li>                
                <li><a href="luggage_inward.php"><span class="nav_icon bended_arrow_left"></span><span class="menu_color_inw"> Inward</span> Statement</a></li>
		<li><a href="luggage_delivery.php"><span class="nav_icon box_outgoing"></span>Pending <span class="menu_color_del"> Delivery</span> </a></li>
                <li><a href="luggage_cancelled.php"><span class="nav_icon go_back_from_screen"></span><span class="menu_color_cal"> Cancelled</span> Statement</a></li>
                <li><a href="daysheet.php"><span class="nav_icon mobile_phone"></span>Day Sheet Entry</a></li>
                <li><a href="customer.php"><span class="nav_icon admin_user_2"></span>Customer Management</a></li>
                
                <li><a href="reports.php"><span class="nav_icon file_cabinet"></span>Reports</a></li>
                <li><a href="settings.php"><span class="nav_icon cog"></span>Settings</a></li>
			</ul>
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
		<h3>LUGGAGE DETAILS OF  <span style="color:red">'<?php echo $_REQUEST['lr_no']?>'</span></h3>
		
	</div>
    
   
	
    
             
		<div class="grid_12">
            	
                
    
                
                
                
              
                <table class="display"><thead>
                
                <tr><th>S.No.</th>
                 <th>DATE</th>
                <th>LR NO</th>
                <th>TYPE</th>
                <th>FROM CONSIGNEE</th>
                <th>TO  CONSIGNOR</th>
                <th>TO</th>
              <th>ITEMS</th>
                <th>QTY</th>
                <th>AMOUNT</th>
                <th>TOPAY COMMN(%)</th>
                 <th>PAID COMMN(%)</th>
                  <th>CREDIT COMMN(%)</th>
                  <th>AUTO(OR)DOOR DLY CHARGE</th>
                  <th>HANDLING CHARGE</th>
                  </tr></thead>
                
                <?php 
	$vecstr = '';
	
	
					
					
					$luggage=mysqli_query($objConn,"select * from power_ticket where  	luggage_lrno ='".$_REQUEST['lr_no']."'") or die("Vehicle error:".mysql_error());
					$luggage_num=mysqli_num_rows($luggage);	
					
					if($luggage_num==0)
					{
                    ?> <tr>
                        <td colspan="15" align="center" valign="middle" bgcolor="#F9C6F1">No Records.</td>
                        </tr>
                   <?php
				   }
				   else
				   {
				   
				   $i=1;
				   $cnt=0;
				   $tot_amt=0;$tot_amt1=0;$paid_amt=0;$topay_amt=0;$credit_amt=0;
				   $luggage_row=mysqli_fetch_array($luggage);
				  
					   $cnt++;
                            $css_set=$cnt%2;
							if($luggage_row['luggage_paymethod']!='Expenses')
							{
				   ?>
                <tr <?php if($css_set==0) echo "class=gradeX"; else  echo "class=gradeC"; ?>>
                  <td align="center"><?php echo $i."."; ?></td>
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
							<td align="center">
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
                            
                            
								 
							</td>
							<td align="center">
                            <?php 
							$luggage_prd = "select sum(luggage_qunty) from power_ticket_prd where luggage_lrno = '".$luggage_row['luggage_lrno']."'";
							$luggage_prd1 = mysqli_query($objConn,$luggage_prd);
						
						    $luggage_prd2 = mysqli_fetch_row($luggage_prd1);
							
							   echo $luggage_prd2[0];
							
							   
							
							
							?>
                            
                            
								 
							</td>
							
							<td align="center"><?php 
							
							echo number_format($luggage_row['luggage_fees'],2);
							if($luggage_row['luggage_paymethod']=='Paid')
						{
							$lug_fees +=$luggage_row['luggage_fees'];
						}
							?></td>
                            
                  <td align="right"><?php 
						$get_com = mysqli_query($objConn,"select * from power_route where id =".$_SESSION['route']);
						$get_com1 = mysqli_fetch_array($get_com);
						
						if($luggage_row['luggage_paymethod']=='To Pay')
						{
						echo $topay_amt = $luggage_row['luggage_fees']*$get_com1['route_comission_topay']/100;
						$tot_topay  +=$topay_amt;
						}
						else echo '-';
						?></td>
                  <td align="right"><?php 
						if($luggage_row['luggage_paymethod']=='Paid')
						{
						echo  $paid_amt= $luggage_row['luggage_fees']*$get_com1['route_comission_paid']/100;
						$tot_paid1  +=$paid_amt;
						}
						else echo '-';
						?></td>
                  <td align="right"><?php 
						if($luggage_row['luggage_paymethod']=='Credit')
						echo  $credit_amt = $luggage_row['luggage_fees']*$get_com1['route_comission_credit']/100;
						 else echo '-';
						 $tot_credit  +=$credit_amt;
						?></td>
                  <td align="right"><?php echo $luggage_row['luggage_doorcharges'];
				  $tot_door  +=$luggage_row['luggage_doorcharges'];
				  ?></td>
                  <td align="right"><?php echo $luggage_row['luggage_charges'];
				  $tot_unloa  +=$luggage_row['luggage_charges'];
				  ?></td>
                  
                </tr>
                <?php }
				   }
				 
				  
				 
				 ?>
                </table>
                 
              
            </div>
	</div>
	
</div>
</body>
</html>