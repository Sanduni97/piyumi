<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "hw";


$connection = mysqli_connect($servername, $username, $password, $db);

if(mysqli_connect_errno()){
	die('Connection failed');
}

if(isset($_POST['submit'])){
	
	     $uname = mysqli_real_escape_string($connection,$_POST['uname']);
	    
	     $email = mysqli_real_escape_string($connection,$_POST['email']);
	     $check_duplicate_email = "SELECT email FROM login WHERE email = '$email' ";
         $result = mysqli_query($connection, $check_duplicate_email);
         $count = mysqli_num_rows($result);
         if($count>0){
         echo "<h1>email already taken!</h1>";
         return false;
         }
	
	     $phone = mysqli_real_escape_string($connection,$_POST['phone']);	
	     $check_duplicate_name = "SELECT phone FROM login WHERE phone = '$phone' ";
         $result = mysqli_query($connection,$check_duplicate_name);
         $count = mysqli_num_rows($result);
            if($count>0){
         echo "<h1>Phone already taken!<h1>";
         return false;
         }
		
	     $password = mysqli_real_escape_string($connection,$_POST['password']);
	
	$insert_login_q = "INSERT into login(uname,email,phone,password) valuse('$uname','$email','$phone','$password')";
	mysqli_query($connection, $insert_login_q);
	
     if($insert_login_q){
	   echo"Data has been saved";
      }
	
}   
?>