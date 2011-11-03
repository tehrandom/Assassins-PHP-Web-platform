<?php
$enteredpin = $_POST['Pin'];
$defence = $_POST['defense'];
include(connect.php);

//finds VICTIM codeid from pin
$query2 = "SELECT codeid FROM users WHERE pin = '$enteredpin'";
$result = mysql_query($query2);
$row = mysql_fetch_row($result,MYSQL_ASSOC);
$victims_codeid = $row['codeid'];

	
	//checks VICTIM exists
if (!$victims_codeid)
{
	die('Could not find Target in database!'. mysql_error());
}
	
else
{
	//sets VICTIM dead
	$query = "update users set dead = 1 where pin = '$enteredpin'";
	mysql_query($query);
	
	//codeid of VICTIMS assassin
	$query2 = "SELECT codeid FROM users WHERE targetcodeid = '$victims_codeid'";
	$result = mysql_query($query2);
	$row = mysql_fetch_row($result,MYSQL_ASSOC);
	$victims_assassin_codeid = $row['codeid'];
	print_r($victims_codeid);
	print_r($victims_assassin_codeid);
	//this finds the TARGET of the VICTIM
	$query2 = "SELECT targetcodeid FROM users WHERE pin = '$enteredpin'";
	$result = mysql_query($query2);
		$row = mysql_fetch_row($result,MYSQL_ASSOC);
	$victims_target = $row['targetcodeid'];
	print_r($victims_target);
	//now we update the VICTIMS ASSASSINS target with the TARGET of the victim, oh yeah
	$query2 = "UPDATE users SET targetcodeid = '$victims_target' WHERE codeid = '$victims_assassin_codeid'";
	mysql_query($query2);
	

	print "Death Noted.";
}
	include 'disconnect.php';
?>
