<?php
require_once('db.php');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";

$fname= $_POST["fname"];
$lname=$_POST["lname"];
$email=$_POST["email"];
$username=$_POST["username"];
$pw=md5($_POST["password"]);
$type= "user";


$sql = "INSERT INTO users(`fname`, `lname`, `email`, `uname`, `password`, `type`) VALUES ('$fname','$lname','$email','$username','$pw','$type');";

if ($conn->query($sql) === TRUE) {
    echo '<script language="javascript">';
	echo 'window.location.href="../index.php";';
	echo '</script>';

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

