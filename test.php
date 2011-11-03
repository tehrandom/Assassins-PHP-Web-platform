<?php
include 'connect.php';
$password = "password";
$query = "sha('$passwordtostore')";
$result = mysql_query($query);
$row = mysql_fetch_row($result);
$passwordToStore = $row[0];
print $passwordToStore;
include 'disconnect.php';
?>
