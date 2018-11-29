<?php
require_once(__DIR__.'/../inc/config.php');

	$connection;
	$host = DB_HOST;  
	$user = DB_USER;  
	$pass = DB_PASS;  
	$dbname = DB_NAME;  

	$charset = 'utf8';

	$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
	$opt = [
		\PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
		\PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
		\PDO::ATTR_EMULATE_PREPARES   => false,
	];
	$pdo = new \PDO($dsn, $user, $pass, $opt);
?>