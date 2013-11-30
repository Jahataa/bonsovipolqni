<?php
	session_start();
	include "config.php";
	function authenticate($username , $password)
	{
		global $ACCOUNT;
		global $PASSWORD;
		$hash = sha1($password);
		if($username === $ACCOUNT && $hash === $PASSWORD)
		{
			$_SESSION["isLoggedIn"] = true;
			return true;
		}
		return false;
	}
	function authorize()
	{
		if(!isset($_SESSION))return false;
		if(!array_key_exists("isLoggedIn",$_SESSION))return false;
		if($_SESSION["isLoggedIn"] === true)return true;
		return false;
	}
	function tryAuthenticate()
	{
		global $ACCOUNT;
		global $SITEROOT;
		if(!authorize())
		{
			header( 'Location: '.$SITEROOT.'/admin/login.php' ) ;
		}
	}
?>