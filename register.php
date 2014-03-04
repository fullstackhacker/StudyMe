<?php
session_start();

//database info
$server = "localhost"; 
$username = "root";
$password = "ToPsea906";
$database = "studyme";
$table = "Users";

//connect to the database
$con = mysqli_connect($server, $username, $password, $database); 

//check connection
if(mysqli_connect_errno()){
	echo "Failed to connect to sql server<br>"; 
}

$user->fname = $_SESSION['fname']; 
$user->lname = $_SESSION['lname']; 
$user->email = $_SESSION['email']; 
$user->passw = $_SESSION['pass']; 
$user->utype = $_SESSION['type']; 

if(!mysqli_query($con, $query)){
	die('ERROR ' . mysqli_error($con));
}

echo "<br>Registered Successfully!<br>";

mysqli_close($con);

header( "refresh:5;url='user.php'" ); 

?>
