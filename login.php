<?php
require('scrypt.php');

session_start(); 

//database info
$server = "localhost"; 
$username = "root"; 
$password = "ToPsea906"; 
$database = "studyme"; 
$studenttable = "Students"; 
$reseachertable = "Reseachers";

//connect to database
$con = mysqli_connect($server, $username, $password, $database); 

//check connection 
if(mysqli_connect_errno()){
	echo "Failed to connect to server<br>"; 
}

//find out if user is a reseacher or a student
$studentacc = false; 
$researcheracc = false; 

//get user's email and pass
$email = $_SESSION['email']; 
$lpassword = $_SESSION['pass']; 

session_destroy();

$query = "SELECT * FROM ". $studenttable ." WHERE Users.email = '$email';";

//query the database
$result = mysqli_query($con, $query); 
if($result->num_rows == 0){ //check if student 
	$studentacc = false; 
	$query2 = "SELECT * FROM ". $researchertable ." WHERE Users.email = '$email';";
	$result2 =  mysqli_query($con, $query2); 
	if($result2->num_rows == 0){ //check if reseacher
		header('Location: index.php'); 
	}
	elseif($result2[4] == 0){
		die("PLEASE WAIT TO BE VERIFIED BY A MODERATOR"); 
	}
	else{
		$researcheracc = true; 
	}
}
else{
	$studentacc = true; 
}

//get the array. password is stored in array location 3
$row;
if($studentacc){
	$row = mysqli_fetch_array($result);
}
elseif($researcheracc){
	$row = mysqli_fetch_array($result2); 
}

//check if the password inputted matches the hash
if(!Password::check($lpassword, $row[3])){
	header('Location: index.php');
}

mysqli_close($con);

session_start();

echo $row[0] . "<br>";
echo $row[1] . "<br>";
echo $row[2] . "<br>"; 

$_SESSION['firstname'] = $row[0]; 
$_SESSION['lastname'] = $row[1]; 
$_SESSION['email'] = $row[2];

if(strcmp($row[4], "student")==0){
	header('Location: student.php');
elseif(strcmp($row[4], "researcher")==0){
	header('Location: researcher.php'); 
}
else{
	die("Unfortunate error. Submit a bug to: admin@rustudy.me");
}

?>
