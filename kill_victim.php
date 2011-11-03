<?php
//this needs to be on the login page as well as on all others.
//user session info, codeid
session_start();
$codeid = $_SESSION['codeid'];

$enteredpin = $_POST['Pin'];
include 'connect.php';

//finds supposid targetcodeid
$query2 = "SELECT targetcodeid FROM users WHERE pin = '$enteredpin'";
$result = mysql_query($query2);
$row = mysql_fetch_row($result,MYSQL_ASSOC);
$targetcodeid_found = $row['targetcodeid'];

if (!$targetcodeid_found)
{
die('Could not find Target in database!'. mysql_error());
}
else
{

$query = "update users set dead = 1 where pin = '$enteredpin'";
mysql_query($query);

//update target
$query2 = "SELECT targetcodeid FROM users WHERE pin = '$enteredpin'";
$result = mysql_query($query2);
$row = mysql_fetch_row($result,MYSQL_ASSOC);
$victims_target_codeid = $row['targetcodeid'];
$query3 = "UPDATE users SET targetcodeid = '".$victims_target_codeid."' WHERE codeid = '$codeid'";
mysql_query($query3);
print "Death Noted.";
}


include 'disconnect.php';
?>
