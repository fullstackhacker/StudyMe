<?php
require('scrypt.php');

session_start(); 

//database info
$server = "localhost"; 
$username = "root"; 
$password = "ToPsea906"; 
$database = "studyme"; 
$table = "Users"; 

//connect to database
$con = mysqli_connect($server, $username, $password, $database); 

//check connection 
if(mysqli_connect_errno()){
	echo "Failed to connect to server<br>"; 
}

//get user's email and pass
$email = $_SESSION['email']; 
$lpassword = $_SESSION['pass']; 

session_destroy();

$query = "SELECT * FROM ". $table ." WHERE Users.email = '$email';";

echo $query . "<br>";

//query the database
$result = mysqli_query($con, $query); 
if($result->num_rows == 0){
	header('Location: index.php');
}

//get the array. password is stored in array location 3
$row = mysqli_fetch_array($result);

//check if the password inputted matches the hash
if(!Password::check($lpassword, $row[3])){
	echo "scrypt is gay";
}

mysqli_close($con);

session_start();

echo $row[0] . "<br>";
echo $row[1] . "<br>";
echo $row[2] . "<br>"; 

$_SESSION['firstname'] = $row[0]; 
$_SESSION['lastname'] = $row[1]; 
$_SESSION['email'] = $row[2];
$_SESSION['usertype'] = $row[4];

header('Location: user.php');

?>
