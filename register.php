<?php
session_start();

//database info
$server = "localhost"; 
$username = "";
$password = "";
$database = "studyme";
$studenttable = "Students";
$reseachertable = "Reseachers";

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

session_destroy();

if(strcmp($user->utype, "student")==0){
	$studentquery = "INSERT INTO " . $studenttable . "(firstname, lastname, email, password, usertype) VALUES ('$user->fname', '$user->lname', '$user->email', '$user->passw', '$user->utype');";
	if(!mysqli_query($con, $studentquery)){
		die('ERROR ' . mysqli_error($con));
	}
}
elseif(strcmp($user->utype, "reseacher")==0){
	$researcherquery = "INSERT INTO " . $reseachertable . "(firstname, lastname, emal, password, validated) VALUES ('$user->fname', '$user->lname', '$user->email', '$user->passw', 'false');";
	if(!mysqli_query($con, $researcherquery)){
		die('ERROR ' . mysqli_error($con)); 
	}
}

mysqli_close($con);

session_start();

$_SESSION['firstname'] = $user->fname; 
$_SESSION['lastname'] = $user->lname; 
$_SESSION['email'] = $user->email; 



if(strcmp($user->utype, "student")==0){
	echo "Registered Successfully!<br>";
	header( "refresh:2;url='student.php'" ); 
}
elseif(strcmp($user->type, "researcher")==0){
	echo "We will email you when your account has been verified"; 
	header('Location: index.php');
?>
