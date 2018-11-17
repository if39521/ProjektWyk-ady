<?php 
	// If there is no constant defined called __CONFIG__, do not load this file 
	define("DB_HOST", "serwer1803435.home.pl");  
	define("DB_USER", "27809920_lewa");  
	define("DB_PASS", "iyuAth9Y");  
	define("DB_NAME", "27809920_lewa");  
	// Sessions are always turned on
	if(!isset($_SESSION)) {
		session_start();
	}
	// Our config is below
	// Allow errors
	error_reporting(-1);
	ini_set('display_errors', 'On');
	
?>