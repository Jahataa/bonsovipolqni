<?php
	include "api/config.php";
	session_start();
	session_destroy();
	session_start();
	header( 'Location: '.$SITEROOT.'/admin/login.php' ) ;
?>