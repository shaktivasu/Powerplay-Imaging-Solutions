<?php 
include_once('inc_setsession.php');
include_once('../Connections/objConn.php');
include_once('inc_admin_logincheck.php');
session_destroy();
header("location:index.php?err=3");
?>