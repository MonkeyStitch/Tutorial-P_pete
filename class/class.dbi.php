<?php

	require_once(__DIR__.'/config.main.php');
class DBI extends mysqli {

	private static $db_host = MYSQL_HOST;
	private static $db_user = MYSQL_USER;
	private static $db_pass = MYSQL_PASS;
	private static $db_name = MYSQL_NAME;


	public function __construct($host=null, $username=null, $passwd=null, $dbname=null, $port=null, $socket=null) {
		parent::__construct($host, $username, $passwd, $dbname, $port, $socket);
	}

}