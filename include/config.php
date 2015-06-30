<?php
/**
* @Programmer: AES
* @Created: 29 June 2015
* @Modified: 
* @Description: Database Connection
**/

$host = "localhost";
$database = "ss_poolspa_db";
$db_username = "root";
$db_password = "raspberry";

define('DB_HOST', $host);
define('DB_DATABASE', $database);
define('DB_USERNAME', $db_username);
define('DB_PASSWORD', $db_password);

/*

$host = "localhost";
$database = "ss_poolspa_db";
$db_username = "root";
$db_password = "";

*/
define('DB_HOST', $host);
define('DB_DATABASE', $database);
define('DB_USERNAME', $db_username);
define('DB_PASSWORD', $db_password);

mysql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD) or die("Error: Could not connect to the server.");
mysql_select_db(DB_DATABASE) or die("Error: Could not select database");

?>