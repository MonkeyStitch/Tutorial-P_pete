<?php
	require_once ('config.main.php');
class DB extends PDO{

	private static $db_host = MYSQL_HOST;
	private static $db_user = MYSQL_USER;
	private static $db_pass = MYSQL_PASS;
	private static $db_name = MYSQL_NAME;


	public function __construct($host=null, $db=null, $user=null, $pass=null, $options=null) {
		try {
			if((!empty($host) || isset($host) || $host != '') && (!empty($db) || isset($db) || $db != '')){
				parent::__construct("mysql:host=$host;dbname=$db", $user, $pass);
				echo $host . ' => if';
			} else {
				parent::__construct("mysql:host=".self::$db_host.";dbname=".self::$db_name, self::$db_user, self::$db_pass);
				echo self::$db_host . ' => else';
			}
		} catch(PDOEXception $e) {
			echo 'ERROR' . $e->getMessage();
		}
	}

	public function close(){

	}
}

//echo DB_HOST;
//echo DB::test();

$conn = new DB(MYSQL_HOST, MYSQL_NAME, MYSQL_USER, MYSQL_PASS);
//$conn = new DB();
//$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
