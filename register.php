<?php
//take inputs from register.html
$userNameInput = $_POST['Name'];
$userEmailInput = $_POST['Email'];
$userPasswordInput = $_POST['Password'];
$userWaterInput = $_POST['Water'];
$userImageInput = $_POST['Image'];
$userLocationInput = $_POST['Location'];
$userCourseInput = $_POST['Course'];
$codeID = rand(100, 999);

//database connection jazz
include('connect.php');

//checks if codeid is taken
$checker = 1;
while($checker==1){
$query2 = "SELECT name FROM users WHERE codeid = '$codeid'";
$result = mysql_query($query2);
$row = mysql_fetch_row($result,MYSQL_ASSOC);
$codeidcheck = $row['codeid'];

if(!$codeidcheck) break;
else $codeID = rand(100, 999);
}

$password = 'mystring'.$userPasswordInput;
$hashedpassword = sha1($password);

$query = "INSERT INTO users (codeid,name,email,password,water,image,location,course) VALUES ('$codeID','$userNameInput','$userEmailInput','$hashedpassword','$userWaterInput','$userImageInput','$userLocationInput','$userCourseInput')";
$result = mysql_query($query);

if ($result)
{
echo "Data entered!";
echo "<br>";
echo "Your CodeID (login) is ";
print $codeID;
echo " and should be saved.";
}
else echo "Failed!";

//closes database connection
include 'disconnect.php';

?>

