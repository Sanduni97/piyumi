<?php
session_start();
unset($_SESSION["user"]);
unset($_SESSION['pw']);
unset($_SESSION['type']);
require_once('db.php');

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "";

$logname = $_POST["uname"];
$logpass = md5($_POST["password"]);



$sql = "SELECT type,fname,uname,id FROM users where uname='" . $logname . "' && password='" . $logpass . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $_SESSION['user'] = $row['fname'];
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['useraccount'] = $row['username'];
		$_SESSION['type'] = $row['type'];
        $_SESSION['pw'] = $logpass;
        $id = $row['type'];

        if ($id == 'admin') {
            header("Location: http://localhost/accident/admin/index.php", true, 301);
        } else if ($id == 'police') {
            header("Location: http://localhost/accident/police.php", true, 301);
        } else if ($id == 'staf') {
            header("Location: http://localhost/accident/rdaStaff.php", true, 301);
        } else if ($id == 'insuarance') {
            header("Location: http://localhost/accident/insurance.php", true, 301);
        }
        else if ($id == 'user') {
            header("Location: ../user.php", true, 301);
        }
    }
} else {
    echo '<script language="javascript">';
    // echo 'alert("Username Or Password not valid");';
    echo 'alert("'.$sql.'");';

    echo 'window.location.href="../index.php";';
    echo '</script>';
}
$conn->close();
