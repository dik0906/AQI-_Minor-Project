<?php


if (isset($_GET['hum']) ) {
 
 $hum = $_GET['hum'];

    $filepath = realpath (dirname(__FILE__));
	require_once($filepath."/db_connect.php");

 
    // Connecting to database 
    $db = new DB_CONNECT();
$result = mysql_query("INSERT INTO sensor_value(aqi_value) VALUES('$hum')");
}

?>