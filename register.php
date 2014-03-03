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

$query = "INSERT INTO $table (firstname, lastname, email, password, usertype) VALUES ('$_POST[fname]','$_POST[lname]','$_POST[email]', 'dick' ,'$_POST[type]');";

if(!mysqli_query($con, $query)){
	die('ERROR ' . mysqli_error($con));
}

echo "<br>Registered Successfully!<br>";

mysqli_close($con);

header( "refresh:5;url='user.php'" ); 

?>
