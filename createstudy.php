<?php
//database info
$host = "localhost"; 
$user = ""; 
$password = ""; 
$database = ""; 

//start the session
session_start(); 

//get the session vars
$studyname = $_SESSION['studyname']; 
$studresearcher = $_SESSION['studyreseacher']; 
$studyfunding = $_SESSION['studyfunding'];
$studystartdate = $_SESSION['studystartdate']; 
$studyenddate = $_SESSION['studyenddate']; 
$studystarttime = $_SESSION['studystarttime']; 
$studyendtime = $_SESSION['studyendtime']; 
$studyquestionairre = $_SESSION['studyquestionairreid'];
$studydetails = $_SESSION['studydetails'];

//end the session 
session_destroy(); 

//connect to the database
$con = mysqli_connect($host, $user, $password, $database); 

//query the database
$query = "INSERT INTO " . $table . "(studyname, studyreseacher, studyfunding, studystartdate, studyenddate, studystarttime, studyendtime, studydetails, studyquestionairre) VALUES ('$studyname', '$studyreseacher', '$studyfunding', '$studystartdate', '$studyenddate', '$studystarttime', '$studyendtime', '$studyquestionairre', '$studydetails');"; 

//query the database
if(!mysqli_query($con, $query)){
	die("There was an error"); 
}

header('Location: reseacher.php'); 
?>
