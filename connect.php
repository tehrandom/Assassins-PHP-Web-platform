<?php
//database connection jazz
$username="tp_web";
$password="startup99";
$database="assassin";
//connection line
$connected = mysql_connect(localhost,$username,$password);
if (!$connected) {
	die('Could not connect: ' . mysql_error());
}

//selects database
mysql_select_db($database, $connected) or die('Unable to select database: ' . $mysql_error());
?>
