<?php
session_start();
include 'connect.php';
$codeid = $_POST['codeid'];
$passwordentered = $_POST['password'];
$tohash = 'mystring'.$passwordentered;
$tocompare = sha1($tohash);
$query2 = "SELECT password,isadmin FROM users WHERE codeid = '$codeid'";
$result = mysql_query($query2);
$row = mysql_fetch_row($result,MYSQL_ASSOC);
$passwordToCheck = $row['password'];

if ($tocompare === $passwordToCheck)
{
//user session info, codeID
	$_SESSION['isadmin'] = $row['isadmin'];
	$_SESSION['codeid'] = $codeid;
	$printthis = $_SESSION['codeid'];
	header('Location: landing.php');
}
else
{
	print "Incorrect user or password!";
}
?>

