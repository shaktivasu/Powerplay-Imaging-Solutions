<?php
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');


//Add News & Events
if(isset($_POST['signupsubmit']))
{
	
	$create_date = date('Y-m-d');
	$creditname = $_POST['journal'];
	
	$already = mysqli_query($objConn,"select * from power_journal where journal='".$creditname."'");
	$already1 = mysqli_num_rows($already);
	if($already1==0)
	{
	echo $news_ins = "INSERT INTO power_journal (journal,journal_type,journal_category,journal_sub_category,ledger_type,journal_status, create_date) VALUES('".$creditname."','".$_POST['journal_type']."','".$_POST['journal_category']."','".$_POST['journal_sub_category']."','".$_POST['ledger_type']."','0', '".$create_date."')";
	$news_ins1 = mysqli_query($objConn,$news_ins);
	header('Location:journal.php?msg=1');
	}
	else
	header('Location:journal_new.php?msg=already');
	

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
<!-- Jquery -->



<script type="text/javascript">
function newsval()
{
	if(document.signupform.journal.value=="")
	{
	document.signupform.journal.focus();
	alert("Enter the journal Name");
	return false;
	}
	

	return true;	
}
</script>
</head>
<body id="theme-default" class="full_block">
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
	<div id="header" class="blue_lin">
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
		<span class="title_icon"><span class="coverflow"></span></span>
		<h3>Journal Management</h3>
		
	</div>
	<div id="content">
		<div class="grid_container">
			<div class="grid_12">
				<div class="widget_wrap">
					<div class="widget_top">
						<span class="h_icon list"></span>
						<h6>Add New Journal</h6>
                       
                        <font color="red"><?php if($_GET['msg']=='already') echo "Credit Customer details are already exists.";?></font>
					</div>
                     <div align="right"><div class="btn_40_blue ucase"><a href="journal.php"><span class="back"></span><span>Back</span></a></div></div> 
					<div class="widget_content">
						<form id="frm1" name="frm1"  autocomplete="off" method="post" action="#" class="form_container left_label" onsubmit="return newsval();">
                         
							<ul>
                            <?php if($_POST['journal_category']==1)
								 {?>
                            <li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname">Journal Category<span class="req">*</span></label>
									<div class="form_input">
                                   <input name="journal_category" type="radio" id="journal_category" value="1" checked onClick="this.form.submit()"/>Liability 
                                   <input type="radio" name="journal_category" id="journal_category" value="2"  onClick="this.form.submit()" />Assets
                                   </div>
								</div>
								</li>
                            <?php }
							else if($_POST['journal_category']==2)
							{
							?>
                            <li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname">Journal Category<span class="req">*</span></label>
									<div class="form_input">
                                   <input name="journal_category" type="radio" id="journal_category" value="1" onClick="this.form.submit()"/>Liability 
                                   <input type="radio" name="journal_category" id="journal_category" value="2" checked  onClick="this.form.submit()" />Assets
                                   </div>
								</div>
								</li>
                            <?php }else {?>
                            <li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname">Journal Category<span class="req">*</span></label>
									<div class="form_input">
                                   <input name="journal_category" type="radio" id="journal_category" value="1" onClick="this.form.submit()"/>Liability 
                                   <input type="radio" name="journal_category" id="journal_category" value="2"  onClick="this.form.submit()" />Assets
                                   </div>
								</div>
								</li>
                                <?php } ?>
                                 <?php if($_POST['journal_category']!='')
								 {
									
								 ?>
                                  <li>
								<div class="form_grid_12">
                               
									<label class="field_title" id="lfirstname" for="firstname">Journal Sub Category<span class="req">*</span></label>
									<div class="form_input">
                                  <select name="journal_sub_category" onChange="this.form.submit();">
                                  <option value="0">Select Any</option>
                                  <?php $sub = "select * from power_journal_sub_category  where category_id = ".$_POST['journal_category'];
                                        $sub1 = mysqli_query($objConn,$sub);
										while($sub2 = mysqli_fetch_array($sub1))
										{
											if($sub2['id']==$_POST['journal_sub_category'])
											{
											?><option value="<?php echo $sub2['id']?>" selected><?php echo $sub2['sub_category']?></option><?php
											}
											else
											{
												?>
											<option value="<?php echo $sub2['id']?>" ><?php echo $sub2['sub_category']?></option>	
												<?php
											}
										}
										?>
                                  </select>
                                   </div>
								</div>
								</li>
                                
                                <?php $journal_type = "select * from power_journal_type  where sub_category_id = ".$_POST['journal_sub_category']." and category_id = ".$_POST['journal_category'];
								      $journal_type1 = mysqli_query($objConn,$journal_type);
									  $journal_type3 = mysqli_num_rows($journal_type1);
									  if($journal_type3==0)
									  {?>
									   <li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname">Ledger Name.<span class="req">*</span></label>
									<div class="form_input">
										<input id="journal" name="journal" type="text" value="" maxlength="100" class="large"/>
									</div>
								</div>
								</li>
									   <li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname">Ledger Type.<span class="req">*</span></label>
									<div class="form_input">
                                    <?php if($_POST['journal_category']==1) $ty ='Expenses'; if($_POST['journal_category']==2) $ty ='Income';?>
										<input id="ledger_type" name="ledger_type" type="radio" value="Direct" />&nbsp; Direct <?php echo $ty?> 
                                        <input id="ledger_type" name="ledger_type" type="radio" value="InDirect" />&nbsp; InDirect <?php echo $ty?> 
									</div>
								</div>
								</li>
									  <?php
									  }
									  else
									  {
                                       ?>
									     <li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname">Journal Type.<span class="req">*</span></label>
									<div class="form_input">
                                    <select name="journal_type" >
                                  <option value="0">Select Any</option>
									   <?php
									  while($journal_type2 = mysqli_fetch_array($journal_type1))
									  {
										  
										  if($journal_type2['id']==$_POST['journal_type'])
											{
											?><option value="<?php echo $journal_type2['id']?>" selected>
											<?php echo $journal_type2['journal_type']?></option><?php
											}
											else
											{
												?>
											<option value="<?php echo $journal_type2['id']?>" ><?php echo $journal_type2['journal_type']?></option>	
												<?php
											}
									  }
											?>
                                            
                                        </select>
									</div>
								</div>
								</li>
                                      
									   <li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname">Ledger Name.<span class="req">*</span></label>
									<div class="form_input">
										<input id="journal" name="journal" type="text" value="" maxlength="100" class="large"/>
									</div>
								</div>
								</li>
									  
                                      
                                      <li>
								<div class="form_grid_12">
									<label class="field_title" id="lfirstname" for="firstname">Ledger Type.<span class="req">*</span></label>
									<div class="form_input">
										 <?php if($_POST['journal_category']==1) {$ty ='Expenses';} else if($_POST['journal_category']==2){ $ty ='Income';} else {$ty ='';}?>
										<input id="ledger_type" name="ledger_type" type="radio" value="Direct" />&nbsp; Direct <?php echo $ty?> 
                                        <input id="ledger_type" name="ledger_type" type="radio" value="Indirect" />&nbsp; Indirect <?php echo $ty?> 
									</div>
								</div>
								</li>
									  <?php
									  }
								
								?>
                               
                           
                              
								<li>
								<div class="form_grid_12">
									<div class="form_input">
										<button id="signupsubmit" name="signupsubmit" type="submit" class="btn_small btn_blue"><span>Add</span></button>
									</div>
								</div>
								</li>
                                <?php }?>
							</ul>
						</form>
					</div>
				</div>
			</div>
		</div>
		<span class="clear"></span>
	</div>
</div>
</body>
</html>