<?php
require_once "../inc/config.php";
class DB {
	protected static $connection;
	private $host = DB_HOST;  
	private $user = DB_USER;  
	private $pass = DB_PASS;  
	private $dbname = DB_NAME;  
	private $stmt;

	public function __construct() {
		$dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;  
		try {
			self::$connection = new PDO( $dsn, $this->user, $this->pass );
			self::$connection ->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			self::$connection ->setAttribute( PDO::ATTR_PERSISTENT, false );
		} catch (PDOException $e) {
			echo "Could not connect to database."; exit;
		}	
	}
	public static function getConnection() {
		if (!self::$connection ) {
			new DB();
		}
		return self::$connection;
	}

	public static function closeConnection() {
		self::$connection = null;
	}

}
?>