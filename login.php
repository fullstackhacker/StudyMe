<?php
session_start(); 

//database info
$server = "localhost"; 
$username = "root"; 
$password = "ToPsea906"; 
$database = "studyme"; 
$table = "Users"; 

//connect to database
$con = mysqli_database($server, $username, $password, $database); 

//check connection 
if(mysqli_connect_errno()){
	echo "Failed to connect to server<br>"; 
}

//get user's email and pass
$email = $_SESSION['email']; 
$password = $_SESSION['pass']; 

$query = "SELECT *  FROM ". $table ." WHERE User.email = ". $email . ";";

$result = mysqli_query($con, $query); 

mysqli_close($con);

$row = mysqli_fetch_array($result); 

if(strcmp($password, $row['password']) != 0){ 
	die('ERROR: INVALID PASSWORD');
	header('Location: index.php');
}

$_SESSION['firstname'] = $row['firstname']; 
$_SESSION['lastname'] = $row['lastname']; 
$_SESSION['email'] = $row['email'];
$_SESSION['usertype'] = $row['usertype'];


?>
