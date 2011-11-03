<?php
session_start();
$isadmin = $_SESSION['isadmin'];
echo $isadmin;
if($_SESSION['isadmin'])
{
	include('connect.php');
	$query="SELECT codeid FROM users WHERE 1 ORDER BY rand()";
	$result=mysql_query($query);
	$names=array();
	$i=0;
	while($row = mysql_fetch_assoc($result,MYSQL_ASSOC))
	{
		$names[$i]=$row['codeid'];
		$i++;
	}

	shuffle($names);
	foreach($names as $name)
	{
		echo $name.' ';
	}
	$length = count($names);
	$i=0;
	while($i<($length-1))
	{
		$assigner = $names[$i];
		echo $assigner.' - ';
		$j = $i+1;
		$assignee = $names[$j];
		echo $assignee.' ';
		$query='UPDATE users SET targetcodeid="'.$assignee.'" WHERE codeid="'.$assigner.'"';
		//echo $query;
		$update=mysql_query($query);
		$i++;
	}
	$lastperson=$names[($length-1)];
	echo $lastperson.' - ';
	$firstperson=$names[0];
	echo $firstperson;
	$query ='UPDATE users SET targetcodeid="'.$firstperson.'" WHERE codeid="'.$lastperson.'"';
	//echo $query;
}	
else echo "Admins only!";
?>
