<?php
session_start();
$codeid = $_SESSION['codeid'];
$isadmin = $_SESSION['isadmin'];
echo $isadmin;
include 'connect.php';

//checks if dead
$query2 ="SELECT dead FROM users WHERE codeid = '$codeid'";
$result = mysql_query($query2);
$row = mysql_fetch_row($result,MYSQL_ASSOC);
$dead = $row['dead'];

if($dead)
{
header('Location: dead.html');
}
else

?>
<html>
<title>Assassins Guild Web Interface</title>
<body>
<center>
Welcome Number <?php print $codeid ?><br>
<br>
<br>
Your target is currently 
<?php 
$query2 = "SELECT targetcodeid FROM users WHERE codeid = '$codeid'";
$result = mysql_query($query2);
$row = mysql_fetch_row($result,MYSQL_ASSOC);
$targetcodeid = $row['targetcodeid'];

$query2 = "SELECT name From users WHERE codeid = '$targetcodeid'";
if($result = mysql_query($query2))
{
$row = mysql_fetch_row($result,MYSQL_ASSOC);
$name = $row['name'];
print $name;
}
else echo "Unable to find target!";
?>
<br>
They can often be found in or around
<?php
$query2 = "SELECT location FROM users WHERE codeid = '$targetcodeid'";
$result = mysql_query($query2);
$row = mysql_fetch_row($result,MYSQL_ASSOC);
$location = $row['location'];
echo $location;
?>
<br>
And their degree of choice is
<?php
$query2 = "SELECT course FROM users WHERE codeid = '$targetcodeid'";
$result = mysql_query($query2);
$row = mysql_fetch_row($result,MYSQL_ASSOC);
$course = $row['course'];
echo $course;
?>
<br>
<?php
$query2 = "SELECT image FROM users WHERE codeid = '$targetcodeid'";
$result = mysql_query($query2);
$row = mysql_fetch_row($result,MYSQL_ASSOC);
$image = $row['image'];
?>
<br>
<img src="<?php echo $image ?>" alt="God speed">
<br>
<br>
<a href = "kill.html">Submit Kill</a>
</body>
</html>
