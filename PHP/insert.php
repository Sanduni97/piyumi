<?php
// //mysql datbase connection
$servername = "localhost";
$username = "root";
$password = "";
$db = "hw";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
$SELECT = "SELECT email From contact Where email = ? Limit 1";
$sql = "INSERT into  contact (firstname,email,phone,comment) VALUES('".$_REQUEST['firstname']."','".$_REQUEST['email']."','".$_REQUEST['phone']."','".$_REQUEST['comment']."')";
$result = $conn->query($sql);

   
		 
if($result)
{
	$message = "Data has been saved  <h1> </h1>";
}
else
{
	$message = "Error Occured";
}
echo $message;
}
?>	