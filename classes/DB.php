<?php
if(!defined('__CONFIG__')) {
	exit('You do not have a config file');
}
class DB {
	protected static $con;
	private function __construct() {
		try {
			self::$con = new PDO( 'mysql:charset=utf8mb4;host=serwer1803435.home.pl;dbname=27809920_lewa', '27809920_lewa', 'iyuAth9Y' );
			self::$con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			self::$con->setAttribute( PDO::ATTR_PERSISTENT, false );
		} catch (PDOException $e) {
			echo "Could not connect to database."; exit;
		}
	}
	public static function getConnection() {
		if (!self::$con) {
			new DB();
		}
		return self::$con;
	}
}
?>