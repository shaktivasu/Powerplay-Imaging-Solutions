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
<link href="css/reset.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/layout.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/themes.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/typography.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/styles.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/jquery.jqplot.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/jquery-ui-1.8.18.custom.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/data-table.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/form.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/sprite.css" rel="stylesheet" type="text/css" media="screen">
<link href="css/gradient.css" rel="stylesheet" type="text/css" media="screen">
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
<script src="js/jquery-1.7.1.min.js"></script>
<script src="js/jquery-ui-1.8.18.custom.min.js"></script>
<script src="js/jquery.ui.touch-punch.js"></script>
<script src="js/chosen.jquery.js"></script>
<script src="js/uniform.jquery.js"></script>
<script src="js/bootstrap-dropdown.js"></script>
<script src="js/bootstrap-colorpicker.js"></script>
<script src="js/sticky.full.js"></script>
<script src="js/jquery.noty.js"></script>
<script src="js/selectToUISlider.jQuery.js"></script>
<script src="js/fg.menu.js"></script>
<script src="js/jquery.tagsinput.js"></script>
<script src="js/jquery.cleditor.js"></script>
<script src="js/jquery.tipsy.js"></script>
<script src="js/jquery.peity.js"></script>
<script src="js/jquery.simplemodal.js"></script>
<script src="js/jquery.jBreadCrumb.1.1.js"></script>
<script src="js/jquery.colorbox-min.js"></script>
<script src="js/jquery.idTabs.min.js"></script>
<script src="js/jquery.multiFieldExtender.min.js"></script>
<script src="js/jquery.confirm.js"></script>
<script src="js/elfinder.min.js"></script>
<script src="js/accordion.jquery.js"></script>
<script src="js/autogrow.jquery.js"></script>
<script src="js/check-all.jquery.js"></script>
<script src="js/data-table.jquery.js"></script>
<script src="js/ZeroClipboard.js"></script>
<script src="js/TableTools.min.js"></script>
<script src="js/jeditable.jquery.js"></script>
<script src="js/duallist.jquery.js"></script>
<script src="js/easing.jquery.js"></script>
<script src="js/full-calendar.jquery.js"></script>
<script src="js/input-limiter.jquery.js"></script>
<script src="js/inputmask.jquery.js"></script>
<script src="js/iphone-style-checkbox.jquery.js"></script>
<script src="js/meta-data.jquery.js"></script>
<script src="js/quicksand.jquery.js"></script>
<script src="js/raty.jquery.js"></script>
<script src="js/smart-wizard.jquery.js"></script>
<script src="js/stepy.jquery.js"></script>
<script src="js/treeview.jquery.js"></script>
<script src="js/ui-accordion.jquery.js"></script>
<script src="js/vaidation.jquery.js"></script>
<script src="js/mosaic.1.0.1.min.js"></script>
<script src="js/jquery.collapse.js"></script>
<script src="js/jquery.cookie.js"></script>
<script src="js/jquery.autocomplete.min.js"></script>
<script src="js/localdata.js"></script>
<script src="js/excanvas.min.js"></script>
<script src="js/jquery.jqplot.min.js"></script>
<script src="js/chart-plugins/jqplot.dateAxisRenderer.min.js"></script>
<script src="js/chart-plugins/jqplot.cursor.min.js"></script>
<script src="js/chart-plugins/jqplot.logAxisRenderer.min.js"></script>
<script src="js/chart-plugins/jqplot.canvasTextRenderer.min.js"></script>
<script src="js/chart-plugins/jqplot.canvasAxisTickRenderer.min.js"></script>
<script src="js/chart-plugins/jqplot.highlighter.min.js"></script>
<script src="js/chart-plugins/jqplot.pieRenderer.min.js"></script>
<script src="js/chart-plugins/jqplot.barRenderer.min.js"></script>
<script src="js/chart-plugins/jqplot.categoryAxisRenderer.min.js"></script>
<script src="js/chart-plugins/jqplot.pointLabels.min.js"></script>
<script src="js/chart-plugins/jqplot.meterGaugeRenderer.min.js"></script>
<script src="js/custom-scripts.js"></script>
<script>
$(function () {
    $.jqplot._noToImageButton = true;
    //var prevYear = [['2014-04-01',100],['2014-04-02',1200],['2014-04-03',149],['2014-04-04',500],['2014-04-05',50],['2014-04-06',213]];
  <?php $sel = "select create_date,sum(luggage_fees),sum(luggage_charges),sum(luggage_doorcharges),sum(unloading_charges) from power_ticket where  luggage_status<>'Cancelled' group by create_date";
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
            
				<?php include("includes/menu.php");?>
                
                
			</ul>
		</div>
	</div>
</div>
<div id="container">
	<div id="header">
		<div class="header_left">
			<div class="logo">
				<img src="images/logo.png" alt="Kmp Travels">
			</div>
			<div id="responsive_mnu">
				<a href="#responsive_menu" class="fg-button" id="hierarchybreadcrumb"><span class="responsive_icon"></span>Menu</a>
				<div id="responsive_menu" class="hidden">
					<ul>
				<?php include("includes/menu.php");?>
			</ul>
				</div>
			</div>
		</div>
        
		<div class="header_right">
			
			<div id="user_nav">
				<ul>
					<li class="user_thumb"><a href="#"><span class="icon"><img src="images/user_thumb.png" width="30" height="30" alt="User"></span></a></li>
					<li class="user_info"><span class="user_name">Administrator</span><span><a href="logout.php"><strong>Logout</strong></a> </span></li>
                    
                    
					<!--<li class="logout"><a href="#"><span class="icon"></span>Logout</a></li>-->
				</ul>
			</div>
		</div>
	</div>
	<div class="page_title">
		<span class="title_icon"><span class="computer_imac"></span></span>
		<h3>Dashboard</h3>
		
	</div>
	<div class="switch_bar">
    <div class="social_activities">
				<div class="activities_s">
					<div class="block_label">
						<div class="icon3">Open Tickets</div>
                        
					</div>
                    <div class="title">
					<p><?php 
					$booking_from1 = date('Y-m-1');
					$booking_to1 = date('Y-m-d');
					$sel = "select * from power_ticket where luggage_paymethod<>'Expenses' and  create_date>='".$booking_from1."' and create_date<='".$booking_to1."' ";
					$sel1 = mysqli_query($objConn,$sel);
					echo $sel2=mysqli_num_rows($sel1);
					?></p></div>
				</div>
				<div class="activities_s">
					<div class="block_label">
						<div class="icon3">Closed Tickets</div>
					</div>
                    <div class="title">
					<p><?php 
					$sel = "select luggage_fees,luggage_charges,luggage_doordelivery,unloading_charges from power_ticket where luggage_paymethod<>'Expenses' and  create_date>='".$booking_from1."' and create_date<='".$booking_to1."' ";
					$sel1 = mysqli_query($objConn,$sel);
					$total_sales_current= 0;
					$total_sales_current1 = 0;
				    while($sel2=mysqli_fetch_row($sel1))
				   {
					   $tax = ($sel2[0]+$sel2[1]+$sel2[2]+$sel2[3])*5/100;
					   $total_sales_current +=$sel2[0]+$sel2[1]+$sel2[2]+$sel2[3]+$tax;
					   
				   }
					echo number_format($total_sales_current,2);
					
					?></p></div>
				</div>
                <div class="activities_s">
					<div class="block_label">
						<div class="icon3">No. Of Customers </div>
					</div>
                    <div class="title"><br>
					<p><?php 
					$sel = "select luggage_fees,luggage_charges,luggage_doordelivery,luggage_doorcharges,unloading_charges from power_ticket where luggage_paymethod = 'Paid' and  create_date>='".$booking_from1."' and create_date<='".$booking_to1."'  and luggage_status <> 'Cancelled'";
					$sel1 = mysqli_query($objConn,$sel);
					$total_sales_current= 0;
					$total_sales_current1 = 0;
				    while($sel2=mysqli_fetch_row($sel1))
				   {
					   $tax = ($sel2[0]+$sel2[1]+$sel2[2]+$sel2[3]+$sel2[4])*5/100;
					   $total_sales_current +=$sel2[0]+$sel2[1]+$sel2[2]+$sel2[3]+$sel2[4]+$tax;
					   
				   }
					echo number_format($total_sales_current,2);
					
					?></p></div>
				</div>
				 
                
                
                
                
                
                
              
                
                
               
				
			</div>
    <?php /*?><div class="social_activities">
				<div class="activities_s">
					<div class="block_label">
						<div class="icon1">New Arrivals</div>
                        
					</div>
                    <div class="title">
					<p>
					<?php 
					$sel = "select * from power_ticket where luggage_status = 'New Arrival'";
					$sel1 = mysqli_query($objConn,$sel);
					echo $sel2=mysqli_num_rows($sel1);
					
					?></p></div>
				</div>
				<div class="activities_s">
					<div class="block_label">
						<div class="icon2">Stock Despatch</div>
					</div>
                    <div class="title">
					<p><?php 
					$sel = "select * from power_ticket where luggage_status = 'Dispatched'";
					$sel1 = mysqli_query($objConn,$sel);
					echo $sel2=mysqli_num_rows($sel1);
					
					?></p></div>
				</div>
				<div class="activities_s">
					<div class="block_label">
						<div class="icon3">To Be Delivered</div>
					</div>
                    <div class="title">
					<p><?php 
					$sel = "select * from power_ticket where luggage_status = 'Inward'";
					$sel1 = mysqli_query($objConn,$sel);
					echo $sel2=mysqli_num_rows($sel1);
					
					?></p></div>
				</div>
				
				
			</div><?php */?>
    <?php /*?><div class="grid_container"><span class="clear"></span>
			<div class="grid_12 full_block">
				<div class="widget_wrap">
					<div class="widget_content">
						<div class="data_widget black_g chart_wrap">
							<div id="chart1">
							</div>
						</div>
					</div>
				</div>
			</div>
			
		<div class="grid_7">
            	<a href="luggage_new.php" class="dashboard-module">
                	<img src="images/icon/parcel.png" tppabs="images/icon/parcel.png" width="64" height="64" alt="parcel booking" />
                	<span class="tabletextbold2">Parcel Booking</span>
                </a>
                <a href="luggage.php" class="dashboard-module">
                	<img src="images/icon/dispatch.png" tppabs="images/icon/parcel.png" width="64" height="64" alt="parcel booking" />
                	<span class="tabletextbold2">Dispatch Statement</span>
                </a>
                 <a href="luggage_delivery.php" class="dashboard-module">
                	<img src="images/icon/delivery.png" tppabs="products.png" width="64" height="64" alt="User Management" />
                	<span class="tabletextbold2">Delivery Statement</span>
                </a>
                <a href="vehicle.php" class="dashboard-module">
                	<img src="images/icon/vehicle.png" tppabs="vehicle.png" width="64" height="64" alt="vehicle management" />
                	<span class="tabletextbold2">Vehicle Management</span>
                </a>
                
              
                
                
                
                
                
                <a href="route.php" class="dashboard-module">
                	<img src="images/icon/am.png" tppabs="products.png" width="64" height="64" alt="Location Management" />
                	<span class="tabletextbold2">Route Management</span>
                </a>
                 <a href="particulars.php" class="dashboard-module">
                	<img src="images/icon/reports.png" tppabs="products.png" width="64" height="64" alt="SMS Management" />
                	<span class="tabletextbold2">Particulars Management</span>
                </a>
                <a href="credit.php" class="dashboard-module">
                	<img src="images/icon/cc.png" tppabs="products.png" width="64" height="64" alt="SMS Management" />
                	<span class="tabletextbold2">Credit Customers</span>
                </a>
                  <a href="collections.php" class="dashboard-module">
                	<img src="images/icon/collections.png" tppabs="products.png" width="64" height="64" alt="SMS Management" />
                	<span class="tabletextbold2">Collections Management</span>
                </a>
                 <a href="route.php" class="dashboard-module">
                	<img src="images/icon/sms.png" tppabs="products.png" width="64" height="64" alt="SMS Management" />
                	<span class="tabletextbold2">SMS Management</span>
                </a>
                <a href="accounts.php" class="dashboard-module">
                	<img src="images/icon/account.png" tppabs="products.png" width="64" height="64" alt="Accounts" />
                	<span class="tabletextbold2">Accounts</span>
                </a>
                
                <a href="#" class="dashboard-module">
                	<img src="images/icon/reports.png" tppabs="products.png" width="64" height="64" alt="Reports" />
                	<span class="tabletextbold2">Reports</span>
                </a>
                
                <a href="settings.php" class="dashboard-module">
                	<img src="images/icon/settings.png" tppabs="products.png" width="64" height="64" alt="Settings" />
                	<span class="tabletextbold2">Settings</span>
                </a>
                
               <a href="#" class="dashboard-module">
                	<img src="images/icon/backup.jpg" tppabs="products.png" width="64" height="64" alt="Settings" />
                	<span class="tabletextbold2">Backup Database</span>
                </a> 
                
                <div style="clear: both"></div>
            </div>
            
	</div><?php */?>
    
   
                <div style="clear: both"></div></form>
	
</div>
</body>
</html>